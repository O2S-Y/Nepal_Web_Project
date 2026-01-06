<?php
$page_title = "Contact";
require_once '../config.php';
require_once '../includes/header.php';

$success = '';
$error = '';

// Traitement du formulaire de contact
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = trim($_POST['nom']);
    $email = trim($_POST['email']);
    $sujet = trim($_POST['sujet']);
    $message = trim($_POST['message']);
    
    // Validation
    if(empty($nom) || empty($email) || empty($sujet) || empty($message)) {
        $error = "Tous les champs sont obligatoires.";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Adresse email invalide.";
    } else {
        try {
            // Insérer le message dans la base de données
            $stmt = $conn->prepare("INSERT INTO contact (nom, email, sujet, message) VALUES (:nom, :email, :sujet, :message)");
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':sujet', $sujet);
            $stmt->bindParam(':message', $message);
            
            if($stmt->execute()) {
                $success = "Votre message a été envoyé avec succès ! Nous vous répondrons dans les plus brefs délais.";
                
                // Réinitialiser les champs
                $nom = $email = $sujet = $message = '';
            }
        } catch(PDOException $e) {
            $error = "Une erreur s'est produite lors de l'envoi du message: " . $e->getMessage();
        }
    }
}
?>

<main class="main-content">
    <div class="page-header">
        <h1 class="page-title"><i class="fas fa-envelope"></i> Contactez-nous</h1>
        <p class="page-description">Une question, une suggestion ou besoin d'informations sur le Népal ? N'hésitez pas à nous contacter.</p>
    </div>
    
    <div class="contact-container">
        <div class="contact-form-container">
            <div class="form-header">
                <h3><i class="fas fa-paper-plane"></i> Formulaire de contact</h3>
                <p>Remplissez ce formulaire et nous vous répondrons dans les plus brefs délais.</p>
            </div>
            
            <?php if($error): ?>
                <div class="alert alert-error"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <?php if($success): ?>
                <div class="alert alert-success"><?php echo $success; ?></div>
            <?php endif; ?>
            
            <form method="POST" action="" class="contact-form" id="contactForm">
                <div class="form-row">
                    <div class="form-group">
                        <label for="nom">Nom complet *</label>
                        <input type="text" id="nom" name="nom" value="<?php echo isset($nom) ? htmlspecialchars($nom) : ''; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Adresse email *</label>
                        <input type="email" id="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="sujet">Sujet *</label>
                    <select id="sujet" name="sujet" required>
                        <option value="">Sélectionnez un sujet</option>
                        <option value="Information générale" <?php echo (isset($sujet) && $sujet == 'Information générale') ? 'selected' : ''; ?>>Information générale</option>
                        <option value="Question sur le Népal" <?php echo (isset($sujet) && $sujet == 'Question sur le Népal') ? 'selected' : ''; ?>>Question sur le Népal</option>
                        <option value="Problème technique" <?php echo (isset($sujet) && $sujet == 'Problème technique') ? 'selected' : ''; ?>>Problème technique</option>
                        <option value="Collaboration" <?php echo (isset($sujet) && $sujet == 'Collaboration') ? 'selected' : ''; ?>>Collaboration</option>
                        <option value="Autre" <?php echo (isset($sujet) && $sujet == 'Autre') ? 'selected' : ''; ?>>Autre</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="message">Votre message *</label>
                    <textarea id="message" name="message" rows="6" required><?php echo isset($message) ? htmlspecialchars($message) : ''; ?></textarea>
                    <div class="char-counter">
                        <span id="charCount">0</span> / 1000 caractères
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="checkbox-group">
                        <input type="checkbox" id="newsletter" name="newsletter">
                        <label for="newsletter">Je souhaite m'inscrire à la newsletter pour recevoir les actualités sur le Népal</label>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-paper-plane"></i> Envoyer le message
                </button>
            </form>
        </div>
        
        <div class="contact-info-container">
            <div class="contact-info-card">
                <h3><i class="fas fa-info-circle"></i> Informations de contact</h3>
                
                <div class="contact-details">
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-text">
                            <h4>Adresse</h4>
                            <p>Faculté des Sciences et Techniques<br>Route d'Imouzzer, Fès, Maroc</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-text">
                            <h4>Téléphone</h4>
                            <p>+212 5 35 60 05 00</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-text">
                            <h4>Email</h4>
                            <p>contact@projet-nepal.ma</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="contact-text">
                            <h4>Heures d'ouverture</h4>
                            <p>Lun - Ven: 9h00 - 18h00<br>Samedi: 9h00 - 13h00</p>
                        </div>
                    </div>
                </div>
                
                <div class="contact-map">
                    <h4><i class="fas fa-map"></i> Localisation</h4>
                    <div class="map-placeholder">
                        <div class="map-marker">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <p>Faculté des Sciences et Techniques de Fès</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<style>
    .contact-container {
        display: grid;
        grid-template-columns: 1fr 400px;
        gap: 40px;
        padding: 20px;
    }
    
    @media (max-width: 1100px) {
        .contact-container {
            grid-template-columns: 1fr;
        }
    }
    
    .form-header {
        margin-bottom: 30px;
    }
    
    .form-header h3 {
        color: var(--secondary-color);
        margin-bottom: 10px;
        font-size: 1.5rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .contact-form-container {
        background-color: white;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .contact-form {
        margin-top: 20px;
    }
    
    .char-counter {
        text-align: right;
        font-size: 0.9rem;
        color: #666;
        margin-top: 5px;
    }
    
    .checkbox-group {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .checkbox-group input[type="checkbox"] {
        width: auto;
    }
    
    .checkbox-group label {
        margin: 0;
        font-size: 0.95rem;
    }
    
    .contact-info-container {
        position: sticky;
        top: 100px;
    }
    
    .contact-info-card {
        background-color: white;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .contact-info-card h3 {
        color: var(--secondary-color);
        margin-bottom: 25px;
        font-size: 1.5rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .contact-details {
        margin-bottom: 30px;
    }
    
    .contact-item {
        display: flex;
        gap: 20px;
        margin-bottom: 25px;
        padding-bottom: 25px;
        border-bottom: 1px solid #eee;
    }
    
    .contact-item:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }
    
    .contact-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.2rem;
        flex-shrink: 0;
    }
    
    .contact-text h4 {
        color: var(--dark-color);
        margin-bottom: 8px;
        font-size: 1.1rem;
    }
    
    .contact-text p {
        color: #666;
        line-height: 1.6;
    }
    
    .contact-map {
        margin-top: 30px;
    }
    
    .contact-map h4 {
        color: var(--dark-color);
        margin-bottom: 15px;
        font-size: 1.2rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .map-placeholder {
        height: 200px;
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }
    
    .map-marker {
        width: 60px;
        height: 60px;
        background-color: var(--primary-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        margin-bottom: 15px;
        animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.1); }
        100% { transform: scale(1); }
    }
    
    .map-placeholder p {
        color: var(--dark-color);
        font-weight: 500;
        text-align: center;
        padding: 0 20px;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Compteur de caractères
        const messageTextarea = document.getElementById('message');
        const charCount = document.getElementById('charCount');
        
        if(messageTextarea && charCount) {
            messageTextarea.addEventListener('input', function() {
                const count = this.value.length;
                charCount.textContent = count;
                
                if(count > 1000) {
                    charCount.style.color = 'var(--error-color)';
                } else if(count > 800) {
                    charCount.style.color = 'var(--warning-color)';
                } else {
                    charCount.style.color = 'inherit';
                }
            });
            
            // Initialiser le compteur
            charCount.textContent = messageTextarea.value.length;
        }
        
        // Validation du formulaire
        const contactForm = document.getElementById('contactForm');
        if(contactForm) {
            contactForm.addEventListener('submit', function(e) {
                const message = document.getElementById('message');
                if(message && message.value.length > 1000) {
                    e.preventDefault();
                    alert('Le message ne doit pas dépasser 1000 caractères.');
                    message.focus();
                }
            });
        }
        
        // Animation des icônes de contact
        const contactIcons = document.querySelectorAll('.contact-icon');
        contactIcons.forEach(icon => {
            icon.addEventListener('mouseenter', function() {
                this.style.transform = 'rotate(10deg) scale(1.1)';
            });
            
            icon.addEventListener('mouseleave', function() {
                this.style.transform = 'rotate(0) scale(1)';
            });
        });
    });
</script>

<?php require_once '../includes/footer.php'; ?>