<?php
require_once __DIR__ . '/../config.php';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title . ' - ' : ''; ?><?php echo SITE_NAME; ?></title>
    
    <!-- Styles et polices -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>style.css">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo SITE_URL; ?>assets/images/favicon.ico">
</head>
<body>
    <!-- Arrière-plan animé -->
    <div class="background-animation"></div>
    
    <!-- Bannière -->
    <header class="banner">
        <div class="banner-content">
            <h1><i class="fas fa-mountain"></i> NÉPAL</h1>
            <p>Terre des Himalayas, berceau du Bouddha et pays aux mille couleurs</p>
        </div>
    </header>
    
    <!-- Menu principal -->
    <nav class="main-menu">
        <div class="menu-container">
            <a href="<?php echo SITE_URL; ?>" class="menu-item"><i class="fas fa-home"></i> Accueil</a>
            <a href="<?php echo SITE_URL; ?>pages/plan.php" class="menu-item"><i class="fas fa-sitemap"></i> Plan de site</a>
            <a href="<?php echo SITE_URL; ?>pages/about.php" class="menu-item"><i class="fas fa-users"></i> Qui sommes-nous ?</a>
            <a href="<?php echo SITE_URL; ?>pages/contact.php" class="menu-item"><i class="fas fa-envelope"></i> Contact</a>
            
            <?php if(isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true): ?>
                <a href="<?php echo SITE_URL; ?>admin/dashboard.php" class="menu-item" style="color: #FFD700;">
                    <i class="fas fa-cog"></i> Admin
                </a>
                <a href="<?php echo SITE_URL; ?>admin/logout.php" class="menu-item" style="color: #FF6B6B;">
                    <i class="fas fa-sign-out-alt"></i> Déconnexion
                </a>
            <?php else: ?>
                <a href="<?php echo SITE_URL; ?>admin/login.php" class="menu-item">
                    <i class="fas fa-sign-in-alt"></i> Se connecter
                </a>
            <?php endif; ?>
        </div>
    </nav>
    
    <!-- Conteneur principal -->
    <div class="main-container">
        <!-- Sidebar gauche -->
        <?php include __DIR__ . '/sidebar.php'; ?>