<?php
$page_title = "Sites et Monuments";
require_once '../includes/header.php';
?>

<main class="main-content">
    <div class="page-header">
        <h1 class="page-title"><i class="fas fa-landmark"></i> Sites et Monuments</h1>
        <p class="page-description">Découvrez les sites historiques et monuments emblématiques du Népal</p>
    </div>
    
    <div class="monuments-container">
        <!-- Monument 1 -->
        <div class="monument-card">
            <div class="monument-image">
                <img src="../assets/images/monuments/Swayambhunath.jpg" alt="Swayambhunath">
            </div>
            <div class="monument-content">
                <h3>Swayambhunath (Temple des Singes)</h3>
                <div class="monument-meta">
                    <span class="meta-item"><i class="fas fa-map-marker-alt"></i> Katmandou</span>
                    <span class="meta-item"><i class="fas fa-calendar"></i> Ve siècle</span>
                    <span class="meta-item"><i class="fas fa-star"></i> UNESCO</span>
                </div>
                <p class="monument-description">
                    Swayambhunath, également connu sous le nom de Temple des Singes, est l'un des plus anciens sites religieux du Népal. Perché sur une colline à l'ouest de Katmandou, il offre une vue panoramique sur la vallée. Le stupa est surmonté d'une tour dorée avec les yeux de Bouddha regardant dans les quatre directions.
                </p>
                <div class="monument-details">
                    <h4><i class="fas fa-info-circle"></i> Caractéristiques</h4>
                    <ul>
                        <li>Stupa bouddhiste parmi les plus anciens au monde</li>
                        <li>365 marches menant au sommet</li>
                        <li>Population de singes sacrés</li>
                        <li>Complexe de temples et monastères</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- Monument 2 -->
        <div class="monument-card">
            <div class="monument-image">
                <img src="../assets/images/monuments/Boudhanath.jpg" alt="Boudhanath">
            </div>
            <div class="monument-content">
                <h3>Boudhanath</h3>
                <div class="monument-meta">
                    <span class="meta-item"><i class="fas fa-map-marker-alt"></i> Katmandou</span>
                    <span class="meta-item"><i class="fas fa-calendar"></i> Ve siècle</span>
                    <span class="meta-item"><i class="fas fa-star"></i> UNESCO</span>
                </div>
                <p class="monument-description">
                    Boudhanath est l'un des plus grands stupas bouddhistes au monde et un centre important du bouddhisme tibétain au Népal. Entouré de monastères et d'échoppes, le stupa est un lieu de pèlerinage majeur. Les pèlerins circumambulent le stupa dans le sens des aiguilles d'une montre en faisant tourner les moulins à prières.
                </p>
                <div class="monument-details">
                    <h4><i class="fas fa-info-circle"></i> Caractéristiques</h4>
                    <ul>
                        <li>Stupa de 36 mètres de haut</li>
                        <li>Mandala géant représentant l'univers bouddhiste</li>
                        <li>Centre de la communauté tibétaine au Népal</li>
                        <li>Festivals colorés toute l'année</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- Monument 3 -->
        <div class="monument-card">
            <div class="monument-image">
                <img src="../assets/images/monuments/Pashupatinath.jpg" alt="Pashupatinath">
            </div>
            <div class="monument-content">
                <h3>Pashupatinath</h3>
                <div class="monument-meta">
                    <span class="meta-item"><i class="fas fa-map-marker-alt"></i> Katmandou</span>
                    <span class="meta-item"><i class="fas fa-calendar"></i> 400 ap. J.-C.</span>
                    <span class="meta-item"><i class="fas fa-star"></i> UNESCO</span>
                </div>
                <p class="monument-description">
                    Pashupatinath est le temple hindou le plus sacré du Népal, dédié à Shiva. Situé sur les rives de la rivière Bagmati, c'est un site de crémation important où les hindous viennent accomplir les derniers rites pour leurs défunts. Le complexe comprend 492 temples, ashrams et images sculptées.
                </p>
                <div class="monument-details">
                    <h4><i class="fas fa-info-circle"></i> Caractéristiques</h4>
                    <ul>
                        <li>Style architectural pagode à deux niveaux</li>
                        <li>Portes dorées et toits argentés</li>
                        <li>Site de crémation sacré</li>
                        <li>Rassemblement pendant Maha Shivaratri</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- Monument 4 -->
        <div class="monument-card">
            <div class="monument-image">
                <img src="../assets/images/monuments/Lumbini.jpg" alt="Lumbini">
            </div>
            <div class="monument-content">
                <h3>Lumbini</h3>
                <div class="monument-meta">
                    <span class="meta-item"><i class="fas fa-map-marker-alt"></i> Province de Lumbini</span>
                    <span class="meta-item"><i class="fas fa-calendar"></i> 623 av. J.-C.</span>
                    <span class="meta-item"><i class="fas fa-star"></i> UNESCO</span>
                </div>
                <p class="monument-description">
                    Lumbini est le lieu de naissance de Siddhartha Gautama, qui devint plus tard Bouddha. C'est l'un des sites les plus sacrés du bouddhisme, attirant des pèlerins du monde entier. Le site comprend le temple Maya Devi, le pilier d'Ashoka, et de nombreux monastères construits par différents pays bouddhistes.
                </p>
                <div class="monument-details">
                    <h4><i class="fas fa-info-circle"></i> Caractéristiques</h4>
                    <ul>
                        <li>Jardin sacré et étang</li>
                        <li>Pilier d'Ashoka du IIIe siècle av. J.-C.</li>
                        <li>Temple Maya Devi avec le marqueur de naissance</li>
                        <li>Monastères internationaux</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>

<aside class="right-sidebar">
    <div class="monuments-map">
        <h3 class="sidebar-title"><i class="fas fa-map-marked-alt"></i> Carte des monuments</h3>
        <div class="map-container">
            <!-- Google Maps Embed -->
            <div class="google-map-wrapper">
                <iframe 
                    id="monumentsMap"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d452965.3478531287!2d84.82469!3d27.7172!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb198a307baabf%3A0xb5137c1bf18db1ea!2sKathmandu%2C%20Nepal!5e0!3m2!1sfr!2s!4v1702000000000!5m2!1sfr!2s"
                    width="100%" 
                    height="300" 
                    style="border:0; border-radius: 10px;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
            <div class="map-links">
                <a href="#" class="map-link-item" data-map="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3531.6!2d85.2903882!3d27.7148992!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb198a307baabf%3A0xb5137c1bf18db1ea!2sSwayambhunath!5e0!3m2!1sfr!2s!4v1702000000000!5m2!1sfr!2s" onclick="changeMap(this); return false;">
                    <i class="fas fa-map-marker-alt"></i> Swayambhunath
                </a>
                <a href="#" class="map-link-item" data-map="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3531.5!2d85.3620!3d27.7215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1b019d2e8e7f%3A0x8a3a6e4c4d7a0e0a!2sBoudhanath%20Stupa!5e0!3m2!1sfr!2s!4v1702000000000!5m2!1sfr!2s" onclick="changeMap(this); return false;">
                    <i class="fas fa-map-marker-alt"></i> Boudhanath
                </a>
                <a href="#" class="map-link-item" data-map="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.2!2d85.3485!3d27.7107!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19c6f8b5b9a1%3A0x6895d6f0f25c9a1e!2sPashupatinath%20Temple!5e0!3m2!1sfr!2s!4v1702000000000!5m2!1sfr!2s" onclick="changeMap(this); return false;">
                    <i class="fas fa-map-marker-alt"></i> Pashupatinath
                </a>
                <a href="#" class="map-link-item" data-map="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14218.5!2d83.2667!3d27.4833!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3996864442c09c2d%3A0x4e85e3a5a3d0c18e!2sLumbini!5e0!3m2!1sfr!2s!4v1702000000000!5m2!1sfr!2s" onclick="changeMap(this); return false;">
                    <i class="fas fa-map-marker-alt"></i> Lumbini
                </a>
            </div>
        </div>
    </div>
    
    <div class="monuments-info">
        <h3 class="sidebar-title"><i class="fas fa-lightbulb"></i> Conseils de visite</h3>
        <div class="tips-list">
            <div class="tip-item">
                <i class="fas fa-clock"></i>
                <div>
                    <h4>Meilleur moment</h4>
                    <p>Visitez tôt le matin pour éviter la foule</p>
                </div>
            </div>
            <div class="tip-item">
                <i class="fas fa-camera"></i>
                <div>
                    <h4>Photographie</h4>
                    <p>Demandez la permission avant de photographier les personnes</p>
                </div>
            </div>
            <div class="tip-item">
                <i class="fas fa-shoe-prints"></i>
                <div>
                    <h4>Tenue vestimentaire</h4>
                    <p>Portez des vêtements modestes dans les lieux religieux</p>
                </div>
            </div>
            <div class="tip-item">
                <i class="fas fa-hands"></i>
                <div>
                    <h4>Respect</h4>
                    <p>Circumambulez les stupas dans le sens des aiguilles d'une montre</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="unesco-info">
        <h3 class="sidebar-title"><i class="fas fa-award"></i> Sites UNESCO au Népal</h3>
        <div class="unesco-list">
            <div class="unesco-item">
                <div class="unesco-year">1979</div>
                <div class="unesco-content">
                    <h4>Vallée de Katmandou</h4>
                    <p>7 groupes de monuments et bâtiments</p>
                </div>
            </div>
            <div class="unesco-item">
                <div class="unesco-year">1979</div>
                <div class="unesco-content">
                    <h4>Parc national de Sagarmatha</h4>
                    <p>Région de l'Everest</p>
                </div>
            </div>
            <div class="unesco-item">
                <div class="unesco-year">1984</div>
                <div class="unesco-content">
                    <h4>Parc national de Chitwan</h4>
                    <p>Réserve de faune sauvage</p>
                </div>
            </div>
            <div class="unesco-item">
                <div class="unesco-year">1997</div>
                <div class="unesco-content">
                    <h4>Lumbini</h4>
                    <p>Lieu de naissance de Bouddha</p>
                </div>
            </div>
        </div>
    </div>
</aside>

<style>
    .monuments-container {
        padding: 20px;
        display: flex;
        flex-direction: column;
        gap: 40px;
    }
    
    .monument-card {
        background-color: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        display: grid;
        grid-template-columns: 350px 1fr;
    }
    
    @media (max-width: 1100px) {
        .monument-card {
            grid-template-columns: 1fr;
        }
    }
    
    .monument-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.12);
    }
    
    .monument-image {
        height: 100%;
        min-height: 300px;
        overflow: hidden;
    }
    
    .monument-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .monument-card:hover .monument-image img {
        transform: scale(1.05);
    }
    
    .monument-content {
        padding: 30px;
        display: flex;
        flex-direction: column;
    }
    
    .monument-content h3 {
        color: var(--secondary-color);
        margin-bottom: 15px;
        font-size: 1.8rem;
        line-height: 1.3;
    }
    
    .monument-meta {
        display: flex;
        gap: 20px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }
    
    .meta-item {
        display: flex;
        align-items: center;
        gap: 8px;
        color: var(--primary-color);
        font-weight: 500;
        font-size: 0.95rem;
    }
    
    .meta-item i {
        font-size: 0.9rem;
    }
    
    .monument-description {
        line-height: 1.8;
        color: #666;
        margin-bottom: 25px;
        flex: 1;
    }
    
    .monument-details {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        padding: 20px;
        border-radius: 10px;
        border-left: 4px solid var(--accent-color);
    }
    
    .monument-details h4 {
        color: var(--dark-color);
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 1.2rem;
    }
    
    .monument-details ul {
        list-style: none;
        padding-left: 0;
    }
    
    .monument-details li {
        margin-bottom: 10px;
        padding-left: 25px;
        position: relative;
        color: #555;
    }
    
    .monument-details li:before {
        content: '✓';
        position: absolute;
        left: 0;
        color: var(--primary-color);
        font-weight: bold;
    }
    
    /* Sidebar monuments */
    .monuments-map {
        background-color: white;
        border-radius: 10px;
        padding: 25px;
        margin-bottom: 25px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .map-container {
        margin-top: 20px;
    }
    
    .google-map-wrapper {
        border-radius: 10px;
        overflow: hidden;
        margin-bottom: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .google-map-wrapper iframe {
        display: block;
    }
    
    .map-links {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }
    
    .map-link-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 15px;
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        border-radius: 8px;
        text-decoration: none;
        color: var(--dark-color);
        font-weight: 500;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }
    
    .map-link-item:hover,
    .map-link-item.active {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        transform: translateX(5px);
    }
    
    .map-link-item i {
        color: var(--primary-color);
    }
    
    .map-link-item:hover i,
    .map-link-item.active i {
        color: white;
    }
    
    .map-point {
        position: absolute;
        width: 30px;
        height: 30px;
        background-color: var(--primary-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        cursor: pointer;
        transition: all 0.3s ease;
        transform: translate(-50%, -50%);
    }
    
    .map-point:hover {
        transform: translate(-50%, -50%) scale(1.3);
        background-color: var(--secondary-color);
    }
    
    .map-point .map-tooltip {
        position: absolute;
        bottom: 100%;
        left: 50%;
        transform: translateX(-50%);
        background-color: var(--dark-color);
        color: white;
        padding: 8px 12px;
        border-radius: 6px;
        font-size: 0.9rem;
        white-space: nowrap;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.3s ease;
        margin-bottom: 10px;
    }
    
    .map-point:hover .map-tooltip {
        opacity: 1;
    }
    
    .map-note {
        font-size: 0.9rem;
        color: #666;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }
    
    .monuments-info {
        background-color: white;
        border-radius: 10px;
        padding: 25px;
        margin-bottom: 25px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .tips-list {
        margin-top: 20px;
    }
    
    .tip-item {
        display: flex;
        gap: 15px;
        margin-bottom: 20px;
        padding-bottom: 20px;
        border-bottom: 1px solid #eee;
    }
    
    .tip-item:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }
    
    .tip-item i {
        font-size: 1.5rem;
        color: var(--primary-color);
        width: 40px;
        text-align: center;
        flex-shrink: 0;
    }
    
    .tip-item h4 {
        color: var(--dark-color);
        margin-bottom: 5px;
        font-size: 1.1rem;
    }
    
    .tip-item p {
        color: #666;
        font-size: 0.95rem;
    }
    
    .unesco-info {
        background-color: white;
        border-radius: 10px;
        padding: 25px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .unesco-list {
        margin-top: 20px;
    }
    
    .unesco-item {
        display: flex;
        gap: 15px;
        margin-bottom: 20px;
        padding-bottom: 20px;
        border-bottom: 1px solid #eee;
    }
    
    .unesco-item:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }
    
    .unesco-year {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: 1.1rem;
        flex-shrink: 0;
    }
    
    .unesco-content h4 {
        color: var(--dark-color);
        margin-bottom: 5px;
        font-size: 1.1rem;
    }
    
    .unesco-content p {
        color: #666;
        font-size: 0.95rem;
    }
</style>

<script>
    // Fonction pour changer la carte Google Maps
    function changeMap(element) {
        const mapUrl = element.getAttribute('data-map');
        const iframe = document.getElementById('monumentsMap');
        
        if(iframe && mapUrl) {
            iframe.src = mapUrl;
            
            // Retirer la classe active de tous les liens
            document.querySelectorAll('.map-link-item').forEach(link => {
                link.classList.remove('active');
            });
            
            // Ajouter la classe active au lien cliqué
            element.classList.add('active');
        }
    }
    
    document.addEventListener('DOMContentLoaded', function() {
        // Interaction avec les marqueurs de la carte
        const mapPoints = document.querySelectorAll('.map-point');
        const monumentCards = document.querySelectorAll('.monument-card');
        
        mapPoints.forEach(point => {
            point.addEventListener('click', function() {
                const monumentId = this.getAttribute('data-monument');
                
                // Animation sur le marqueur
                this.style.transform = 'translate(-50%, -50%) scale(1.5)';
                setTimeout(() => {
                    this.style.transform = 'translate(-50%, -50%) scale(1.3)';
                }, 300);
                
                // Trouver et mettre en évidence la carte correspondante
                monumentCards.forEach(card => {
                    const cardTitle = card.querySelector('h3').textContent.toLowerCase();
                    if(cardTitle.includes(monumentId)) {
                        // Animation de mise en évidence
                        card.style.boxShadow = '0 0 0 3px var(--primary-color), 0 20px 40px rgba(0,0,0,0.12)';
                        card.style.transform = 'translateY(-15px)';
                        
                        // Scroller vers la carte
                        card.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                        
                        // Retirer la mise en évidence après 3 secondes
                        setTimeout(() => {
                            card.style.boxShadow = '0 20px 40px rgba(0,0,0,0.12)';
                            card.style.transform = 'translateY(-10px)';
                        }, 3000);
                    }
                });
            });
        });
        
        // Animation des cartes au chargement
        monumentCards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            
            setTimeout(() => {
                card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 200);
        });
        
        // Animation des années UNESCO
        const unescoYears = document.querySelectorAll('.unesco-year');
        unescoYears.forEach((year, index) => {
            year.style.opacity = '0';
            year.style.transform = 'scale(0)';
            
            setTimeout(() => {
                year.style.transition = 'all 0.5s ease';
                year.style.opacity = '1';
                year.style.transform = 'scale(1)';
            }, 500 + index * 100);
        });
    });
</script>

<?php require_once '../includes/footer.php'; ?>