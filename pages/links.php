<?php
$page_title = "Liens utiles";
require_once '../includes/header.php';
?>

<main class="main-content">
    <div class="page-header">
        <h1 class="page-title"><i class="fas fa-external-link-alt"></i> Liens utiles</h1>
        <p class="page-description">Accédez aux ressources officielles et aux établissements publics du Népal</p>
    </div>
    
    <div class="links-container">
<!-- Section 3: Éducation & Recherche -->
        <div class="links-section" id="education">
            <h2 class="section-title">
                <i class="fas fa-graduation-cap"></i> Éducation & Recherche
            </h2>
            <div class="links-grid">
                <a href="https://www.tribhuvan-university.edu.np" target="_blank" class="link-card">
                    <div class="link-logo">
                        <img src="../assets/images/logos/logo1.jpg" alt="Tribhuvan University">
                    </div>
                    <div class="link-content">
                        <h3>Tribhuvan University</h3>
                        <p>Première et plus grande université du Népal - Fondée en 1959</p>
                        <div class="link-meta">
                            <span class="meta-item"><i class="fas fa-globe"></i> tribhuvan-university.edu.np</span>
                            <span class="meta-item"><i class="fas fa-university"></i> Université</span>
                        </div>
                    </div>
                    <div class="link-arrow">
                        <i class="fas fa-external-link-alt"></i>
                    </div>
                </a>
                
                <a href="https://www.ku.edu.np" target="_blank" class="link-card">
                    <div class="link-logo">
                        <img src="../assets/images/logos/logo2.jpg" alt="Kathmandu University">
                    </div>
                    <div class="link-content">
                        <h3>Kathmandu University</h3>
                        <p>Université autonome - Programmes en sciences, ingénierie, médecine</p>
                        <div class="link-meta">
                            <span class="meta-item"><i class="fas fa-globe"></i> ku.edu.np</span>
                            <span class="meta-item"><i class="fas fa-flask"></i> Recherche</span>
                        </div>
                    </div>
                    <div class="link-arrow">
                        <i class="fas fa-external-link-alt"></i>
                    </div>
                </a>
                
                <a href="https://www.nast.gov.np" target="_blank" class="link-card">
                    <div class="link-logo">
                        <img src="../assets/images/logos/logo3.jpg" alt="Nepal Academy of Science & Technology">
                    </div>
                    <div class="link-content">
                        <h3>Nepal Academy of Science & Technology</h3>
                        <p>Académie nationale des sciences - Recherche et développement</p>
                        <div class="link-meta">
                            <span class="meta-item"><i class="fas fa-globe"></i> nast.gov.np</span>
                            <span class="meta-item"><i class="fas fa-atom"></i> Sciences</span>
                        </div>
                    </div>
                    <div class="link-arrow">
                        <i class="fas fa-external-link-alt"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
</main>

<aside class="right-sidebar">
    <div class="quick-links-sidebar">
        <h3 class="sidebar-title"><i class="fas fa-bolt"></i> Accès rapide</h3>
        <div class="quick-links-nav">
            <a href="#tourisme" class="quick-nav-link">
                <i class="fas fa-suitcase-rolling"></i>
                <span>Tourisme</span>
            </a>
            <a href="#culture" class="quick-nav-link">
                <i class="fas fa-landmark"></i>
                <span>Culture</span>
            </a>
            <a href="#education" class="quick-nav-link">
                <i class="fas fa-graduation-cap"></i>
                <span>Éducation</span>
            </a>
            <a href="#transport" class="quick-nav-link">
                <i class="fas fa-plane"></i>
                <span>Transport</span>
            </a>
        </div>
    </div>
    
    <div class="link-statistics">
        <h3 class="sidebar-title"><i class="fas fa-chart-line"></i> Statistiques</h3>
        <div class="stats-container">
            <div class="stat-item">
                <div class="stat-number">12</div>
                <div class="stat-label">Liens principaux</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">4</div>
                <div class="stat-label">Catégories</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">9+</div>
                <div class="stat-label">Ressources additionnelles</div>
            </div>
        </div>
    </div>
    
    <div class="external-tools">
        <h3 class="sidebar-title"><i class="fas fa-tools"></i> Outils utiles</h3>
        <div class="tools-list">
            <a href="https://www.xe.com/currencyconverter/convert/?Amount=1&From=EUR&To=NPR" target="_blank" class="tool-item">
                <i class="fas fa-money-bill-wave"></i>
                <div>
                    <h4>Convertisseur de devises</h4>
                    <p>Euro → Roupie népalaise</p>
                </div>
            </a>
            
            <a href="https://www.timeanddate.com/worldclock/nepal" target="_blank" class="tool-item">
                <i class="fas fa-clock"></i>
                <div>
                    <h4>Fuseau horaire</h4>
                    <p>UTC+5:45 (Népal Standard Time)</p>
                </div>
            </a>
            
            <a href="https://translate.google.com/?sl=ne&tl=fr" target="_blank" class="tool-item">
                <i class="fas fa-language"></i>
                <div>
                    <h4>Traducteur</h4>
                    <p>Népalais → Français</p>
                </div>
            </a>
        </div>
    </div>
</aside>

<style>
    .links-container {
        padding: 20px;
    }
    
    .links-section {
        background-color: white;
        border-radius: 15px;
        padding: 30px;
        margin-bottom: 40px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        border-left: 4px solid var(--primary-color);
        transition: all 0.3s ease;
    }
    
    .links-section:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    
    .links-section .section-title {
        color: var(--secondary-color);
        margin-bottom: 30px;
        font-size: 1.8rem;
        display: flex;
        align-items: center;
        gap: 15px;
        padding-bottom: 15px;
        border-bottom: 2px solid #eee;
    }
    
    .links-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 25px;
    }
    
    .link-card {
        display: flex;
        align-items: center;
        gap: 20px;
        padding: 25px;
        background: linear-gradient(135deg, #f8f9fa, white);
        border-radius: 10px;
        text-decoration: none;
        color: var(--dark-color);
        border: 1px solid #eee;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .link-card:before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.5s ease;
    }
    
    .link-card:hover:before {
        left: 100%;
    }
    
    .link-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        border-color: var(--primary-color);
        background: linear-gradient(135deg, white, #f8f9fa);
    }
    
    .link-card:hover .link-arrow {
        color: var(--primary-color);
        transform: translateX(5px);
    }
    
    .link-logo {
        width: 70px;
        height: 70px;
        flex-shrink: 0;
        border-radius: 10px;
        background-color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        border: 1px solid #eee;
        padding: 10px;
    }
    
    .link-logo img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }
    
    .logo-placeholder {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
    }
    
    .link-content {
        flex: 1;
    }
    
    .link-content h3 {
        color: var(--secondary-color);
        margin-bottom: 10px;
        font-size: 1.3rem;
        line-height: 1.3;
    }
    
    .link-content p {
        color: #666;
        font-size: 0.95rem;
        line-height: 1.5;
        margin-bottom: 15px;
    }
    
    .link-meta {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }
    
    .meta-item {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 0.85rem;
        color: var(--primary-color);
        font-weight: 500;
    }
    
    .meta-item i {
        font-size: 0.8rem;
    }
    
    .link-arrow {
        color: #ccc;
        font-size: 1.2rem;
        transition: all 0.3s ease;
    }
    
    .resources-list {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        margin-top: 20px;
    }
    
    .resource-category {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        border-radius: 10px;
        padding: 25px;
        border-left: 4px solid var(--accent-color);
    }
    
    .resource-category h3 {
        color: var(--dark-color);
        margin-bottom: 20px;
        font-size: 1.3rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .resource-category ul {
        list-style: none;
        padding-left: 0;
    }
    
    .resource-category li {
        margin-bottom: 15px;
        padding-bottom: 15px;
        border-bottom: 1px dashed #ccc;
    }
    
    .resource-category li:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }
    
    .resource-category a {
        color: #666;
        text-decoration: none;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s ease;
    }
    
    .resource-category a:hover {
        color: var(--primary-color);
        padding-left: 10px;
    }
    
    .resource-category a:before {
        content: '→';
        color: var(--primary-color);
        font-weight: bold;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .resource-category a:hover:before {
        opacity: 1;
    }
    
    /* Sidebar spécifique */
    .quick-links-sidebar {
        background-color: white;
        border-radius: 10px;
        padding: 25px;
        margin-bottom: 25px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .quick-links-nav {
        display: flex;
        flex-direction: column;
        gap: 15px;
        margin-top: 20px;
    }
    
    .quick-nav-link {
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
    
    .quick-nav-link:hover {
        background-color: var(--primary-color);
        color: white;
        transform: translateX(10px);
    }
    
    .quick-nav-link i {
        font-size: 1.2rem;
        width: 30px;
        text-align: center;
    }
    
    .link-statistics {
        background-color: white;
        border-radius: 10px;
        padding: 25px;
        margin-bottom: 25px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .stats-container {
        margin-top: 20px;
    }
    
    .stat-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 0;
        border-bottom: 1px solid #eee;
    }
    
    .stat-item:last-child {
        border-bottom: none;
    }
    
    .stat-number {
        font-size: 2rem;
        font-weight: 700;
        color: var(--primary-color);
    }
    
    .stat-label {
        color: #666;
        font-size: 0.95rem;
        text-align: right;
    }
    
    .external-tools {
        background-color: white;
        border-radius: 10px;
        padding: 25px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .tools-list {
        margin-top: 20px;
    }
    
    .tool-item {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 8px;
        text-decoration: none;
        color: var(--dark-color);
        transition: all 0.3s ease;
        margin-bottom: 15px;
    }
    
    .tool-item:last-child {
        margin-bottom: 0;
    }
    
    .tool-item:hover {
        background-color: var(--secondary-color);
        color: white;
        transform: translateX(5px);
    }
    
    .tool-item:hover h4,
    .tool-item:hover p {
        color: white;
    }
    
    .tool-item i {
        font-size: 1.5rem;
        color: var(--primary-color);
        width: 40px;
        text-align: center;
        flex-shrink: 0;
    }
    
    .tool-item:hover i {
        color: white;
    }
    
    .tool-item h4 {
        color: var(--dark-color);
        margin-bottom: 5px;
        font-size: 1.1rem;
        transition: color 0.3s ease;
    }
    
    .tool-item p {
        color: #666;
        font-size: 0.9rem;
        transition: color 0.3s ease;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animation des cartes de liens
        const linkCards = document.querySelectorAll('.link-card');
        linkCards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                card.style.transition = 'all 0.5s ease';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 100);
        });
        
        // Animation des catégories de ressources
        const resourceCategories = document.querySelectorAll('.resource-category');
        resourceCategories.forEach((category, index) => {
            category.style.opacity = '0';
            category.style.transform = 'translateX(-20px)';
            
            setTimeout(() => {
                category.style.transition = 'all 0.5s ease';
                category.style.opacity = '1';
                category.style.transform = 'translateX(0)';
            }, 300 + index * 150);
        });
        
        // Navigation fluide vers les sections
        const quickNavLinks = document.querySelectorAll('.quick-nav-link');
        quickNavLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if(targetElement) {
                    e.preventDefault();
                    
                    // Animation sur la section cible
                    targetElement.style.boxShadow = '0 0 0 3px var(--primary-color), 0 10px 25px rgba(0,0,0,0.1)';
                    targetElement.style.transform = 'translateY(-10px)';
                    
                    setTimeout(() => {
                        targetElement.style.boxShadow = '0 10px 25px rgba(0,0,0,0.1)';
                        targetElement.style.transform = 'translateY(-5px)';
                    }, 2000);
                    
                    // Scroller vers la section
                    window.scrollTo({
                        top: targetElement.offsetTop - 100,
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        // Simulation de statistiques en temps réel
        function updateLinkStats() {
            const statNumbers = document.querySelectorAll('.stat-number');
            statNumbers.forEach(stat => {
                if(stat.textContent.includes('+')) {
                    const currentValue = parseInt(stat.textContent);
                    const newValue = currentValue + Math.floor(Math.random() * 2);
                    stat.textContent = newValue + '+';
                    
                    // Animation
                    stat.style.transform = 'scale(1.2)';
                    stat.style.color = 'var(--accent-color)';
                    
                    setTimeout(() => {
                        stat.style.transform = 'scale(1)';
                        stat.style.color = 'var(--primary-color)';
                    }, 300);
                }
            });
        }
        
        // Mettre à jour les statistiques toutes les 30 secondes
        setInterval(updateLinkStats, 30000);
        
        // Vérification des liens externes
        const externalLinks = document.querySelectorAll('a[target="_blank"]');
        externalLinks.forEach(link => {
            link.addEventListener('click', function() {
                // Animation de confirmation
                const originalColor = this.style.backgroundColor;
                this.style.backgroundColor = 'var(--accent-color)';
                this.style.color = 'white';
                
                setTimeout(() => {
                    this.style.backgroundColor = originalColor;
                    this.style.color = '';
                }, 300);
                
                // Simulation d'ouverture dans un nouvel onglet
                console.log(`Ouverture du lien: ${this.href}`);
            });
        });
        
        // Effet de parallaxe sur les sections
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const sections = document.querySelectorAll('.links-section');
            
            sections.forEach(section => {
                const rate = scrolled * 0.1;
                section.style.backgroundPositionY = `${rate}px`;
            });
        });
    });
</script>

<?php require_once '../includes/footer.php'; ?>