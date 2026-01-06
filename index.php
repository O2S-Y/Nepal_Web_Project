<?php
$page_title = "Accueil";
require_once 'includes/header.php';
require_once 'includes/functions.php';

// Récupérer les dernières actualités
try {
    $stmt = $conn->prepare("SELECT * FROM news ORDER BY date_publication DESC LIMIT 3");
    $stmt->execute();
    $news = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    $error = "Erreur lors de la récupération des actualités: " . $e->getMessage();
}

// Traitement de l'inscription à la newsletter
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['subscribe'])) {
    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $email = trim($_POST['email']);
    
    // Validation
    if(empty($nom) || empty($prenom) || empty($email)) {
        $error_msg = "Tous les champs sont obligatoires.";
    } elseif(!validateEmail($email)) {
        $error_msg = "Adresse email invalide.";
    } else {
        try {
            // Vérifier si l'email existe déjà
            $stmt = $conn->prepare("SELECT id FROM internaute WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            
            if($stmt->rowCount() > 0) {
                $error_msg = "Cet email est déjà inscrit à la newsletter.";
            } else {
                // Insérer le nouvel abonné
                $stmt = $conn->prepare("INSERT INTO internaute (nom, prenom, email) VALUES (:nom, :prenom, :email)");
                $stmt->bindParam(':nom', $nom);
                $stmt->bindParam(':prenom', $prenom);
                $stmt->bindParam(':email', $email);
                
                if($stmt->execute()) {
                    $success_msg = "Merci pour votre inscription à la newsletter !";
                    // Réinitialiser les champs
                    $nom = $prenom = $email = '';
                }
            }
        } catch(PDOException $e) {
            $error_msg = "Erreur lors de l'inscription: " . $e->getMessage();
        }
    }
}
?>

<main class="main-content">
    <h2 class="section-title">Découvrez le Népal</h2>
    <p class="section-description">Bienvenue au pays des Himalayas, une terre de contrastes, de spiritualité et de beautés naturelles époustouflantes.</p>
    
    <!-- Galerie des coups de cœur -->
    <div class="section-gallery">
        <h3 class="section-subtitle"><i class="fas fa-heart"></i> Nos coups de cœur</h3>
        <div class="gallery">
            <div class="gallery-item" data-location="everest">
                <img src="assets/images/everest.png" alt="Everest" class="gallery-img">
                <div class="gallery-overlay">
                    <h3>Mont Everest</h3>
                    <p>Le toit du monde, 8,848 mètres</p>
                </div>
            </div>
            <div class="gallery-item" data-location="katmandou">
                <img src="assets\images\Accueil\katmandou.jpg" alt="Katmandou" class="gallery-img">
                <div class="gallery-overlay">
                    <h3>Katmandou</h3>
                    <p>La capitale vibrante et spirituelle</p>
                </div>
            </div>
            <div class="gallery-item" data-location="pokhara">
                <img src="assets\images\Accueil\Pokhara.jpg" alt="Pokhara" class="gallery-img">
                <div class="gallery-overlay">
                    <h3>Pokhara</h3>
                    <p>Porte d'entrée des Himalayas</p>
                </div>
            </div>
            <div class="gallery-item" data-location="lumbini">
                <img src="assets\images\Accueil\lumbini.jpg" alt="Lumbini" class="gallery-img">
                <div class="gallery-overlay">
                    <h3>Lumbini</h3>
                    <p>Lieu de naissance de Bouddha</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Détail du lieu sélectionné -->
    <div class="location-detail" id="locationDetail">
        <h3 class="section-subtitle">Détails du lieu</h3>
        <div class="detail-content">
            <p>Sélectionnez un lieu dans la galerie pour voir plus de détails.</p>
        </div>
    </div>
    
    <!-- Section Newsletter -->
    <div class="newsletter-section">
        <h3 class="section-subtitle"><i class="fas fa-newspaper"></i> Dernières actualités</h3>
        
        <?php if(isset($error_msg)): ?>
            <div class="alert alert-error"><?php echo $error_msg; ?></div>
        <?php endif; ?>
        
        <?php if(isset($success_msg)): ?>
            <div class="alert alert-success"><?php echo $success_msg; ?></div>
        <?php endif; ?>
        
        <div class="news-list">
            <?php if(isset($news) && count($news) > 0): ?>
                <?php foreach($news as $item): ?>
                    <div class="news-item">
                        <div class="news-date"><?php echo formatDate($item['date_publication'], 'd/m/Y'); ?></div>
                        <div class="news-title"><?php echo htmlspecialchars($item['titre']); ?></div>
                        <div class="news-resume"><?php echo shortenText($item['resume'], 150); ?></div>
                        <a href="news_details.php?id=<?php echo $item['news_id']; ?>" class="news-link">Cliquez ici pour plus de détails</a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucune actualité pour le moment.</p>
            <?php endif; ?>
        </div>
        
        <div class="news-actions">
            <a href="all_news.php" class="btn btn-primary"><i class="fas fa-list"></i> Toutes les actualités</a>
            <button class="btn btn-secondary" id="showSubscribeForm"><i class="fas fa-envelope"></i> S'inscrire à la newsletter</button>
        </div>
        
        <!-- Formulaire d'inscription (caché par défaut) -->
        <div class="subscribe-form" id="subscribeForm" style="display: none;">
            <h4><i class="fas fa-user-plus"></i> Inscription à la newsletter</h4>
            <form method="POST" action="">
                <div class="form-row">
                    <div class="form-group">
                        <label for="nom">Nom *</label>
                        <input type="text" id="nom" name="nom" value="<?php echo isset($nom) ? $nom : ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom *</label>
                        <input type="text" id="prenom" name="prenom" value="<?php echo isset($prenom) ? $prenom : ''; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>" required>
                </div>
                <button type="submit" name="subscribe" class="btn btn-primary">
                    <i class="fas fa-paper-plane"></i> S'inscrire
                </button>
                <button type="button" id="hideSubscribeForm" class="btn btn-secondary">Annuler</button>
            </form>
            <p class="form-note">* Champs obligatoires. Vous recevrez un email mensuel avec les actualités du Népal.</p>
        </div>
    </div>
</main>

<aside class="right-sidebar">
    <!-- Vidéo -->
    <div class="video-container">
        <h3 class="video-title"><i class="fas fa-video"></i> Découvrez le Népal</h3>
        <div class="video-wrapper">
            <video id="nepalVideo" width="100%" height="300" poster="https://images.unsplash.com/photo-1528181304800-259b08848526?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" controls>
                <source src="assets/videos/nepal-documentaire.mp4" type="video/mp4">
                Votre navigateur ne supporte pas la balise vidéo.
            </video>
            <div class="video-controls">
                <button id="playPauseBtn" class="video-btn"><i class="fas fa-play"></i></button>
                <button id="muteBtn" class="video-btn"><i class="fas fa-volume-up"></i></button>
                <input type="range" id="volumeSlider" min="0" max="1" step="0.1" value="1">
            </div>
        </div>
        <p class="video-description">
            <i class="fas fa-info-circle"></i> Documentaire sur les Himalayas et la culture népalaise (5:42)
        </p>
    </div>
    
    <!-- Statistiques -->
    <div class="stats-container">
        <h3 class="stats-title"><i class="fas fa-chart-bar"></i> Népal en chiffres</h3>
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-value">8</div>
                <div class="stat-label">Des 14 sommets de +8000m</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">123</div>
                <div class="stat-label">Langues parlées</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">80%</div>
                <div class="stat-label">De territoire montagneux</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">10</div>
                <div class="stat-label">Sites UNESCO</div>
            </div>
        </div>
    </div>
    
    <!-- Météo (simulée) -->
    <div class="weather-container">
        <h3 class="weather-title"><i class="fas fa-cloud-sun"></i> Météo à Katmandou</h3>
        <div class="weather-info">
            <div class="weather-icon">
                <i class="fas fa-sun" style="color: #FFD700; font-size: 2rem;"></i>
            </div>
            <div class="weather-details">
                <div class="weather-temp">22°C</div>
                <div class="weather-desc">Ensoleillé</div>
                <div class="weather-date"><?php echo date('d/m/Y'); ?></div>
            </div>
        </div>
    </div>
</aside>

<?php require_once 'includes/footer.php'; ?>