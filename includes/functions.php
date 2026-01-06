<?php
/**
 * Fonctions utilitaires pour le site web
 */

/**
 * Affiche les messages d'alerte
 */
function displayAlert($type, $message) {
    $alert_class = '';
    switch($type) {
        case 'success':
            $alert_class = 'alert-success';
            break;
        case 'error':
            $alert_class = 'alert-error';
            break;
        case 'warning':
            $alert_class = 'alert-warning';
            break;
        case 'info':
            $alert_class = 'alert-info';
            break;
    }
    
    return '<div class="alert ' . $alert_class . '">' . htmlspecialchars($message) . '</div>';
}

/**
 * Valide une adresse email
 */
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

/**
 * Raccourcit un texte
 */
function shortenText($text, $length = 100) {
    if (strlen($text) <= $length) {
        return $text;
    }
    
    $shortened = substr($text, 0, $length);
    $lastSpace = strrpos($shortened, ' ');
    
    if ($lastSpace !== false) {
        $shortened = substr($shortened, 0, $lastSpace);
    }
    
    return $shortened . '...';
}

/**
 * Formate une date
 */
function formatDate($date, $format = 'd/m/Y') {
    $timestamp = strtotime($date);
    return date($format, $timestamp);
}

/**
 * Estime le temps de lecture d'un texte (en minutes)
 */
function estimateReadingTime($text) {
    $wordsPerMinute = 200;
    $wordCount = str_word_count(strip_tags($text));
    $minutes = ceil($wordCount / $wordsPerMinute);
    return max(1, $minutes); // Minimum 1 minute
}

/**
 * Upload d'image
 */
function uploadImage($file, $target_dir = "../assets/uploads/") {
    $errors = [];
    $file_name = basename($file["name"]);
    $target_file = $target_dir . $file_name;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Vérifier si c'est une vraie image
    $check = getimagesize($file["tmp_name"]);
    if($check === false) {
        $errors[] = "Le fichier n'est pas une image.";
    }
    
    // Vérifier la taille du fichier (max 2MB)
    if ($file["size"] > 2000000) {
        $errors[] = "L'image est trop volumineuse (max 2MB).";
    }
    
    // Autoriser certains formats
    $allowed_types = ["jpg", "jpeg", "png", "gif"];
    if(!in_array($imageFileType, $allowed_types)) {
        $errors[] = "Seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.";
    }
    
    // Générer un nom unique
    if(empty($errors)) {
        $new_file_name = uniqid() . '.' . $imageFileType;
        $target_file = $target_dir . $new_file_name;
        
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return $new_file_name;
        } else {
            $errors[] = "Une erreur s'est produite lors du téléchargement.";
        }
    }
    
    return ['errors' => $errors];
}
?>