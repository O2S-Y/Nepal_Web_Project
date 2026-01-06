<?php
$page_title = "Plan du site";
require_once '../includes/header.php';
?>

<main class="main-content">
    <div class="page-header">
        <h1 class="page-title"><i class="fas fa-sitemap"></i> Plan du site</h1>
        <p class="page-description">Naviguez facilement à travers toutes les sections de notre site sur le Népal</p>
    </div>
    
    <div class="sitemap-container">
        <div class="sitemap-section">
            <h2 class="section-title"><i class="fas fa-home"></i> Navigation principale</h2>
            <div class="sitemap-links">
                <a href="../index.php" class="sitemap-link main">
                    <i class="fas fa-home"></i>
                    <div>
                        <h3>Accueil</h3>
                        <p>Page d'accueil avec galerie, actualités et newsletter</p>
                    </div>
                </a>
                
                <a href="plan.php" class="sitemap-link main">
                    <i class="fas fa-sitemap"></i>
                    <div>
                        <h3>Plan du site</h3>
                        <p>Cette page - Vue d'ensemble de toutes les sections</p>
                    </div>
                </a>
                
                <a href="about.php" class="sitemap-link main">
                    <i class="fas fa-users"></i>
                    <div>
                        <h3>Qui sommes-nous ?</h3>
                        <p>Informations sur l'équipe et le projet</p>
                    </div>
                </a>
                
                <a href="contact.php" class="sitemap-link main">
                    <i class="fas fa-envelope"></i>
                    <div>
                        <h3>Contact</h3>
                        <p>Formulaire de contact et informations</p>
                    </div>
                </a>
            </div>
        </div>
        
        <div class="sitemap-section">
            <h2 class="section-title"><i class="fas fa-compass"></i> Navigation latérale</h2>
            <div class="sitemap-grid">
                <div class="sitemap-category">
                    <h3><i class="fas fa-landmark"></i> Sites et Monuments</h3>
                    <ul>
                        <li><a href="monuments.php#swayambhunath">Swayambhunath (Temple des Singes)</a></li>
                        <li><a href="monuments.php#boudhanath">Boudhanath</a></li>
                        <li><a href="monuments.php#pashupatinath">Pashupatinath</a></li>
                        <li><a href="monuments.php#lumbini">Lumbini</a></li>
                    </ul>
                </div>
                
                <div class="sitemap-category">
                    <h3><i class="fas fa-city"></i> Index des villes</h3>
                    <ul>
                        <li><a href="cities.php#katmandou">Katmandou</a></li>
                        <li><a href="cities.php#pokhara">Pokhara</a></li>
                        <li><a href="cities.php#bhaktapur">Bhaktapur</a></li>
                        <li><a href="cities.php#lumbini">Lumbini</a></li>
                        <li><a href="cities.php#nagarkot">Nagarkot</a></li>
                    </ul>
                </div>
                
                <div class="sitemap-category">
                    <h3><i class="fas fa-map-marked-alt"></i> Carte du Népal</h3>
                    <ul>
                        <li><a href="map.php">Carte interactive</a></li>
                        <li><a href="map.php#regions">Régions géographiques</a></li>
                        <li><a href="map.php#trekking">Sentiers de trekking</a></li>
                        <li><a href="map.php#transport">Transport et accès</a></li>
                    </ul>
                </div>
                
                <div class="sitemap-category">
                    <h3><i class="fas fa-external-link-alt"></i> Liens utiles</h3>
                    <ul>
                        <li><a href="links.php#tourisme">Tourisme officiel</a></li>
                        <li><a href="links.php#culture">Culture et patrimoine</a></li>
                        <li><a href="links.php#education">Éducation et recherche</a></li>
                        <li><a href="links.php#transport">Transport et voyages</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="sitemap-section">
            <h2 class="section-title"><i class="fas fa-newspaper"></i> Actualités & Newsletter</h2>
            <div class="sitemap-links">
                <a href="../index.php#newsletter" class="sitemap-link">
                    <i class="fas fa-envelope-open-text"></i>
                    <div>
                        <h3>Inscription newsletter</h3>
                        <p>Recevez les actualités mensuelles sur le Népal</p>
                    </div>
                </a>
                
                <a href="all_news.php" class="sitemap-link">
                    <i class="fas fa-list"></i>
                    <div>
                        <h3>Toutes les actualités</h3>
                        <p>Archive complète des articles publiés</p>
                    </div>
                </a>
            </div>
        </div>
        
        <div class="sitemap-section">
            <h2 class="section-title"><i class="fas fa-images"></i> Galeries & Multimédia</h2>
            <div class="sitemap-grid">
                <div class="sitemap-category">
                    <h3><i class="fas fa-heart"></i> Coups de cœur</h3>
                    <ul>
                        <li><a href="../index.php#gallery">Mont Everest</a></li>
                        <li><a href="../index.php#gallery">Katmandou</a></li>
                        <li><a href="../index.php#gallery">Pokhara</a></li>
                        <li><a href="../index.php#gallery">Lumbini</a></li>
                        <li><a href="../index.php#gallery">Parc de Chitwan</a></li>
                    </ul>
                </div>
                
                <div class="sitemap-category">
                    <h3><i class="fas fa-video"></i> Vidéos</h3>
                    <ul>
                        <li><a href="../index.php#video">Documentaire sur le Népal</a></li>
                        <li><a href="cities.php#video">Diaporama des villes</a></li>
                        <li><a href="monuments.php#video">Visite virtuelle des monuments</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="sitemap-section">
            <h2 class="section-title"><i class="fas fa-info-circle"></i> Informations pratiques</h2>
            <div class="info-grid">
                <div class="info-card">
                    <i class="fas fa-plane"></i>
                    <h3>Voyage</h3>
                    <p>Conseils pour visiter le Népal</p>
                </div>
                
                <div class="info-card">
                    <i class="fas fa-utensils"></i>
                    <h3>Gastronomie</h3>
                    <p>Cuisine népalaise traditionnelle</p>
                </div>
                
                <div class="info-card">
                    <i class="fas fa-calendar-alt"></i>
                    <h3>Festivals</h3>
                    <p>Événements culturels et religieux</p>
                </div>
                
                <div class="info-card">
                    <i class="fas fa-hiking"></i>
                    <h3>Trekking</h3>
                    <p>Meilleurs sentiers et saisons</p>
                </div>
            </div>
        </div>
    </div>
</main>

<aside class="right-sidebar">
    <div class="quick-nav">
        <h3 class="sidebar-title"><i class="fas fa-bolt"></i> Navigation rapide</h3>
        <div class="quick-links">
            <a href="../index.php" class="quick-link">
                <i class="fas fa-home"></i>
                <span>Accueil</span>
            </a>
            <a href="monuments.php" class="quick-link">
                <i class="fas fa-landmark"></i>
                <span>Monuments</span>
            </a>
            <a href="cities.php" class="quick-link">
                <i class="fas fa-city"></i>
                <span>Villes</span>
            </a>
            <a href="map.php" class="quick-link">
                <i class="fas fa-map"></i>
                <span>Carte</span>
            </a>
            <a href="contact.php" class="quick-link">
                <i class="fas fa-envelope"></i>
                <span>Contact</span>
            </a>
        </div>
    </div>
    
    <div class="site-stats">
        <h3 class="sidebar-title"><i class="fas fa-chart-bar"></i> Statistiques du site</h3>
        <div class="stats-list">
            <div class="stat-item">
                <div class="stat-value">12</div>
                <div class="stat-label">Pages principales</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">25+</div>
                <div class="stat-label">Images & galeries</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">5</div>
                <div class="stat-label">Vidéos intégrées</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">50+</div>
                <div class="stat-label">Liens internes</div>
            </div>
        </div>
    </div>
    
    <div class="last-update">
        <h3 class="sidebar-title"><i class="fas fa-history"></i> Dernières mises à jour</h3>
        <div class="update-list">
            <div class="update-item">
                <div class="update-date">15/06/2023</div>
                <div class="update-content">Ajout de la galerie des villes</div>
            </div>
            <div class="update-item">
                <div class="update-date">10/06/2023</div>
                <div class="update-content">Mise à jour des actualités</div>
            </div>
            <div class="update-item">
                <div class="update-date">01/06/2023</div>
                <div class="update-content">Optimisation responsive</div>
            </div>
        </div>
    </div>
</aside>

<style>
    .sitemap-container {
        padding: 20px;
    }
    
    .sitemap-section {
        background-color: white;
        border-radius: 15px;
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        border-left: 4px solid var(--primary-color);
    }
    
    .sitemap-section .section-title {
        color: var(--secondary-color);
        margin-bottom: 25px;
        font-size: 1.8rem;
        display: flex;
        align-items: center;
        gap: 15px;
        border-bottom: 2px solid #eee;
        padding-bottom: 15px;
    }
    
    .sitemap-links {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
    
    .sitemap-link {
        display: flex;
        align-items: flex-start;
        gap: 20px;
        padding: 20px;
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        border-radius: 10px;
        text-decoration: none;
        color: var(--dark-color);
        transition: all 0.3s ease;
        border: 1px solid transparent;
    }
    
    .sitemap-link:hover {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        transform: translateX(10px);
        border-color: var(--primary-color);
    }
    
    .sitemap-link:hover h3 {
        color: white;
    }
    
    .sitemap-link:hover p {
        color: rgba(255,255,255,0.9);
    }
    
    .sitemap-link i {
        font-size: 2rem;
        color: var(--primary-color);
        width: 60px;
        text-align: center;
        flex-shrink: 0;
    }
    
    .sitemap-link:hover i {
        color: white;
    }
    
    .sitemap-link h3 {
        color: var(--secondary-color);
        margin-bottom: 10px;
        font-size: 1.4rem;
        transition: color 0.3s ease;
    }
    
    .sitemap-link p {
        color: #666;
        line-height: 1.6;
        transition: color 0.3s ease;
    }
    
    .sitemap-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
    }
    
    .sitemap-category {
        background: linear-gradient(135deg, #f8f9fa, white);
        border-radius: 10px;
        padding: 25px;
        border: 1px solid #eee;
        transition: all 0.3s ease;
    }
    
    .sitemap-category:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        border-color: var(--primary-color);
    }
    
    .sitemap-category h3 {
        color: var(--secondary-color);
        margin-bottom: 20px;
        font-size: 1.3rem;
        display: flex;
        align-items: center;
        gap: 10px;
        padding-bottom: 15px;
        border-bottom: 2px solid #eee;
    }
    
    .sitemap-category ul {
        list-style: none;
        padding-left: 0;
    }
    
    .sitemap-category li {
        margin-bottom: 12px;
        padding-bottom: 12px;
        border-bottom: 1px dashed #eee;
    }
    
    .sitemap-category li:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }
    
    .sitemap-category a {
        color: #666;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s ease;
        padding: 5px 0;
    }
    
    .sitemap-category a:hover {
        color: var(--primary-color);
        padding-left: 10px;
    }
    
    .sitemap-category a:before {
        content: '→';
        color: var(--primary-color);
        font-weight: bold;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .sitemap-category a:hover:before {
        opacity: 1;
    }
    
    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 25px;
        margin-top: 20px;
    }
    
    .info-card {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        border-radius: 10px;
        padding: 25px;
        text-align: center;
        transition: all 0.3s ease;
        border: 1px solid transparent;
    }
    
    .info-card:hover {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        transform: translateY(-10px);
        border-color: var(--primary-color);
    }
    
    .info-card:hover h3,
    .info-card:hover p {
        color: white;
    }
    
    .info-card i {
        font-size: 2.5rem;
        color: var(--primary-color);
        margin-bottom: 15px;
        transition: color 0.3s ease;
    }
    
    .info-card:hover i {
        color: white;
    }
    
    .info-card h3 {
        color: var(--dark-color);
        margin-bottom: 10px;
        font-size: 1.3rem;
        transition: color 0.3s ease;
    }
    
    .info-card p {
        color: #666;
        font-size: 0.95rem;
        line-height: 1.6;
        transition: color 0.3s ease;
    }
    
    /* Sidebar spécifique */
    .quick-nav {
        background-color: white;
        border-radius: 10px;
        padding: 25px;
        margin-bottom: 25px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .quick-links {
        display: flex;
        flex-direction: column;
        gap: 15px;
        margin-top: 20px;
    }
    
    .quick-link {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 15px;
        background-color: #f8f9fa;
        border-radius: 8px;
        text-decoration: none;
        color: var(--dark-color);
        transition: all 0.3s ease;
    }
    
    .quick-link:hover {
        background-color: var(--primary-color);
        color: white;
        transform: translateX(5px);
    }
    
    .quick-link i {
        font-size: 1.2rem;
        width: 30px;
        text-align: center;
    }
    
    .site-stats {
        background-color: white;
        border-radius: 10px;
        padding: 25px;
        margin-bottom: 25px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .stats-list {
        margin-top: 20px;
    }
    
    .stat-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px 0;
        border-bottom: 1px solid #eee;
    }
    
    .stat-item:last-child {
        border-bottom: none;
    }
    
    .stat-value {
        font-size: 2rem;
        font-weight: 700;
        color: var(--primary-color);
    }
    
    .stat-label {
        color: #666;
        font-size: 0.95rem;
        text-align: right;
    }
    
    .last-update {
        background-color: white;
        border-radius: 10px;
        padding: 25px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .update-list {
        margin-top: 20px;
    }
    
    .update-item {
        padding: 15px 0;
        border-bottom: 1px solid #eee;
    }
    
    .update-item:last-child {
        border-bottom: none;
    }
    
    .update-date {
        font-weight: 600;
        color: var(--primary-color);
        font-size: 0.9rem;
        margin-bottom: 5px;
    }
    
    .update-content {
        color: #666;
        font-size: 0.95rem;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animation des cartes d'information
        const infoCards = document.querySelectorAll('.info-card');
        infoCards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                card.style.transition = 'all 0.5s ease';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 100);
        });
        
        // Animation des liens
        const sitemapLinks = document.querySelectorAll('.sitemap-link');
        sitemapLinks.forEach((link, index) => {
            link.style.opacity = '0';
            link.style.transform = 'translateX(-20px)';
            
            setTimeout(() => {
                link.style.transition = 'all 0.5s ease';
                link.style.opacity = '1';
                link.style.transform = 'translateX(0)';
            }, index * 50);
        });
        
        // Animation des catégories
        const sitemapCategories = document.querySelectorAll('.sitemap-category');
        sitemapCategories.forEach((category, index) => {
            category.style.opacity = '0';
            category.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                category.style.transition = 'all 0.5s ease';
                category.style.opacity = '1';
                category.style.transform = 'translateY(0)';
            }, 300 + index * 100);
        });
        
        // Navigation fluide vers les ancres
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');
                if(targetId !== '#') {
                    const targetElement = document.querySelector(targetId);
                    if(targetElement) {
                        e.preventDefault();
                        window.scrollTo({
                            top: targetElement.offsetTop - 100,
                            behavior: 'smooth'
                        });
                    }
                }
            });
        });
    });
</script>

<?php require_once '../includes/footer.php'; ?>