<?php
// Déterminer le chemin de base selon le fichier actuel
$current_file = basename($_SERVER['PHP_SELF']);
$is_in_pages = (strpos($_SERVER['PHP_SELF'], '/pages/') !== false);
$base_path = $is_in_pages ? '../' : '';
$pages_path = $is_in_pages ? '' : 'pages/';
?>
<!-- Barre latérale gauche - Navigation -->
<aside class="left-sidebar">
    <h3 class="sidebar-title"><i class="fas fa-compass"></i> Navigation</h3>
    <ul class="sidebar-menu">
        <li class="sidebar-item">
            <a href="<?php echo $base_path; ?>index.php" class="sidebar-link <?php echo $current_file == 'index.php' ? 'active' : ''; ?>">
                <i class="fas fa-home"></i>
                Accueil
            </a>
        </li>
        <li class="sidebar-item">
            <a href="<?php echo $base_path . $pages_path; ?>monuments.php" class="sidebar-link <?php echo $current_file == 'monuments.php' ? 'active' : ''; ?>">
                <i class="fas fa-landmark"></i>
                Sites et Monuments
            </a>
        </li>
        <li class="sidebar-item">
            <a href="<?php echo $base_path . $pages_path; ?>cities.php" class="sidebar-link <?php echo $current_file == 'cities.php' ? 'active' : ''; ?>">
                <i class="fas fa-city"></i>
                Index des Villes
            </a>
        </li>
        <li class="sidebar-item">
            <a href="<?php echo $base_path . $pages_path; ?>map.php" class="sidebar-link <?php echo $current_file == 'map.php' ? 'active' : ''; ?>">
                <i class="fas fa-map-marked-alt"></i>
                Carte du Népal
            </a>
        </li>
        <li class="sidebar-item">
            <a href="<?php echo $base_path . $pages_path; ?>links.php" class="sidebar-link <?php echo $current_file == 'links.php' ? 'active' : ''; ?>">
                <i class="fas fa-external-link-alt"></i>
                Liens Utiles
            </a>
        </li>
        <li class="sidebar-item">
            <a href="<?php echo $base_path . $pages_path; ?>plan.php" class="sidebar-link <?php echo $current_file == 'plan.php' ? 'active' : ''; ?>">
                <i class="fas fa-sitemap"></i>
                Plan du site
            </a>
        </li>
        <li class="sidebar-item">
            <a href="<?php echo $base_path . $pages_path; ?>about.php" class="sidebar-link <?php echo $current_file == 'about.php' ? 'active' : ''; ?>">
                <i class="fas fa-users"></i>
                Qui sommes-nous ?
            </a>
        </li>
        <li class="sidebar-item">
            <a href="<?php echo $base_path . $pages_path; ?>contact.php" class="sidebar-link <?php echo $current_file == 'contact.php' ? 'active' : ''; ?>">
                <i class="fas fa-envelope"></i>
                Contact
            </a>
        </li>
    </ul>
    
    <div class="sidebar-info">
        <h4><i class="fas fa-lightbulb"></i> Le saviez-vous ?</h4>
        <p>Le Népal abrite 8 des 14 plus hauts sommets du monde, dont le mythique Mont Everest culminant à 8 849 mètres.</p>
    </div>
</aside>
