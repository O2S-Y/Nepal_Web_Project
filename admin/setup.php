<?php
/**
 * Script de configuration initiale de la base de données
 * Exécutez ce script une seule fois pour créer les tables et l'admin par défaut
 */

require_once '../config.php';

$messages = [];
$errors = [];

// Créer les tables si elles n'existent pas
$tables = [
    'news' => "CREATE TABLE IF NOT EXISTS news (
        news_id INT AUTO_INCREMENT PRIMARY KEY,
        titre VARCHAR(255) NOT NULL,
        resume TEXT NOT NULL,
        contenu TEXT NOT NULL,
        date_publication DATETIME DEFAULT CURRENT_TIMESTAMP,
        image_url VARCHAR(500) NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8",
    
    'internaute' => "CREATE TABLE IF NOT EXISTS internaute (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nom VARCHAR(100) NOT NULL,
        prenom VARCHAR(100) NOT NULL,
        email VARCHAR(255) NOT NULL UNIQUE,
        date_inscription TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        actif TINYINT(1) DEFAULT 1
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8",
    
    'admin' => "CREATE TABLE IF NOT EXISTS admin (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8",
    
    'contact' => "CREATE TABLE IF NOT EXISTS contact (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nom VARCHAR(100) NOT NULL,
        email VARCHAR(255) NOT NULL,
        sujet VARCHAR(200) NOT NULL,
        message TEXT NOT NULL,
        date_envoi TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        lu TINYINT(1) DEFAULT 0
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8"
];

try {
    foreach($tables as $name => $sql) {
        $conn->exec($sql);
        $messages[] = "✅ Table '$name' créée ou déjà existante.";
    }
} catch(PDOException $e) {
    $errors[] = "❌ Erreur lors de la création des tables: " . $e->getMessage();
}

// Vérifier si l'admin existe
try {
    $stmt = $conn->query("SELECT COUNT(*) as count FROM admin WHERE username = 'admin'");
    $adminCount = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
    
    // Créer un nouveau hash pour admin123
    $password = password_hash('admin123', PASSWORD_DEFAULT);
    $email = 'admin@nepal-website.com';
    
    if($adminCount == 0) {
        // Créer l'admin par défaut
        $stmt = $conn->prepare("INSERT INTO admin (username, password, email) VALUES ('admin', :password, :email)");
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        $messages[] = "✅ Administrateur par défaut créé (login: admin, mot de passe: admin123)";
    } else {
        // Réinitialiser le mot de passe de l'admin existant
        $stmt = $conn->prepare("UPDATE admin SET password = :password WHERE username = 'admin'");
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        
        $messages[] = "✅ Mot de passe admin réinitialisé (login: admin, mot de passe: admin123)";
    }
} catch(PDOException $e) {
    $errors[] = "❌ Erreur lors de la création de l'admin: " . $e->getMessage();
}

// Insérer des données de démonstration si les tables sont vides
try {
    // Vérifier les news
    $stmt = $conn->query("SELECT COUNT(*) as count FROM news");
    $newsCount = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
    
    if($newsCount == 0) {
        $conn->exec("INSERT INTO news (titre, resume, contenu) VALUES 
            ('Festival de Dashain à Katmandou', 
             'Le plus grand festival hindou du Népal célébré avec ferveur', 
             'Le festival de Dashain, également connu sous le nom de Vijaya Dashami, est le festival le plus important et le plus attendu du Népal. Pendant 15 jours, les Népalais rendent hommage à la déesse Durga. Les familles se réunissent, les aînés bénissent les plus jeunes avec du tika (pâte de riz rouge) et du jamara (herbe de riz). C\\'est une période de joie, de retrouvailles et de célébration.'),
            ('Nouvelle saison de trekking dans l\\'Annapurna', 
             'Les sentiers de l\\'Annapurna rouvrent après la mousson', 
             'La saison automnale marque le début de la période idéale pour le trekking dans la région de l\\'Annapurna. Les conditions météorologiques sont optimales avec un ciel dégagé offrant des vues spectaculaires sur les sommets enneigés. Le sentier de l\\'Annapurna Base Camp est l\\'un des plus populaires, offrant une expérience inoubliable aux randonneurs.'),
            ('Exposition d\\'art Newar à Patan', 
             'Découverte de l\\'art traditionnel de la vallée de Katmandou', 
             'Le musée de Patan accueille une exposition exceptionnelle sur l\\'art Newar, mettant en valeur les compétences artistiques ancestrales de cette communauté. Sculptures sur bois, peintures Thanka, et artefacts religieux sont présentés dans un cadre magnifique. Cette exposition permet de découvrir la richesse culturelle unique du Népal.')");
        $messages[] = "✅ 3 actualités de démonstration ajoutées.";
    }
    
    // Vérifier les internautes
    $stmt = $conn->query("SELECT COUNT(*) as count FROM internaute");
    $subCount = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
    
    if($subCount == 0) {
        $conn->exec("INSERT INTO internaute (nom, prenom, email) VALUES 
            ('Dupont', 'Jean', 'jean.dupont@email.com'),
            ('Martin', 'Sophie', 'sophie.martin@email.com')");
        $messages[] = "✅ 2 abonnés de démonstration ajoutés.";
    }
    
} catch(PDOException $e) {
    $errors[] = "❌ Erreur lors de l'insertion des données de démo: " . $e->getMessage();
}

// Créer les indexes
try {
    $conn->exec("CREATE INDEX IF NOT EXISTS idx_news_date ON news(date_publication)");
    $conn->exec("CREATE INDEX IF NOT EXISTS idx_internaute_email ON internaute(email)");
} catch(PDOException $e) {
    // Ignorer les erreurs d'index
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuration - <?php echo SITE_NAME; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .setup-container {
            background: white;
            border-radius: 20px;
            padding: 40px;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        }
        h1 {
            color: #003893;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .subtitle {
            color: #666;
            margin-bottom: 30px;
        }
        .message-list {
            list-style: none;
            margin-bottom: 30px;
        }
        .message-list li {
            padding: 12px 15px;
            margin-bottom: 10px;
            border-radius: 8px;
            background: #f8f9fa;
        }
        .message-list li.error {
            background: #f8d7da;
            color: #721c24;
        }
        .message-list li.success {
            background: #d4edda;
            color: #155724;
        }
        .credentials {
            background: linear-gradient(135deg, #003893, #DC143C);
            color: white;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 30px;
        }
        .credentials h3 {
            margin-bottom: 15px;
        }
        .credentials p {
            margin-bottom: 8px;
            font-size: 1.1rem;
        }
        .credentials strong {
            background: rgba(255,255,255,0.2);
            padding: 3px 10px;
            border-radius: 5px;
        }
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 15px 30px;
            background: #003893;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn:hover {
            background: #DC143C;
            transform: translateY(-3px);
        }
        .btn-group {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }
    </style>
</head>
<body>
    <div class="setup-container">
        <h1><i class="fas fa-cog"></i> Configuration</h1>
        <p class="subtitle">Initialisation de la base de données du site Népal</p>
        
        <ul class="message-list">
            <?php foreach($messages as $msg): ?>
                <li class="success"><?php echo $msg; ?></li>
            <?php endforeach; ?>
            <?php foreach($errors as $err): ?>
                <li class="error"><?php echo $err; ?></li>
            <?php endforeach; ?>
        </ul>
        
        <?php if(count($errors) == 0): ?>
            <div class="credentials">
                <h3><i class="fas fa-key"></i> Identifiants administrateur</h3>
                <p>Nom d'utilisateur: <strong>admin</strong></p>
                <p>Mot de passe: <strong>admin123</strong></p>
            </div>
        <?php endif; ?>
        
        <div class="btn-group">
            <a href="login.php" class="btn">
                <i class="fas fa-sign-in-alt"></i> Se connecter
            </a>
            <a href="../index.php" class="btn" style="background: #6c757d;">
                <i class="fas fa-home"></i> Voir le site
            </a>
        </div>
    </div>
</body>
</html>
