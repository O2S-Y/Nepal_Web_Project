<?php
$page_title = "Index des villes";
require_once '../includes/header.php';
?>

<main class="main-content">
    <div class="page-header">
        <h1 class="page-title"><i class="fas fa-city"></i> Index des villes</h1>
        <p class="page-description">Découvrez les principales villes du Népal avec leurs caractéristiques et galeries photo</p>
    </div>
    
    <div class="cities-container">
        <!-- Ville 1: Katmandou -->
        <div class="city-card" id="katmandou">
            <div class="city-header">
                <div class="city-title">
                    <h2>Katmandou</h2>
                    <div class="city-meta">
                        <span class="meta-item"><i class="fas fa-users"></i> 1.5 million</span>
                        <span class="meta-item"><i class="fas fa-ruler-combined"></i> 49.45 km²</span>
                        <span class="meta-item"><i class="fas fa-mountain"></i> 1,400 m</span>
                    </div>
                </div>
                <div class="city-badge">
                    <span class="badge capital">Capitale</span>
                    <span class="badge unesco">UNESCO</span>
                </div>
            </div>
            
            <div class="city-content">
                <div class="city-description">
                    <p>Katmandou, la capitale et plus grande ville du Népal, est le centre culturel, économique et politique du pays. Située dans la vallée de Katmandou à 1 400 mètres d'altitude, elle abrite 7 sites classés au patrimoine mondial de l'UNESCO. La ville mélange harmonieusement traditions ancestrales et modernité.</p>
                    
                    <div class="city-details">
                        <div class="detail-item">
                            <h4><i class="fas fa-landmark"></i> Sites principaux</h4>
                            <p>Durbar Square, Swayambhunath, Boudhanath, Pashupatinath</p>
                        </div>
                        <div class="detail-item">
                            <h4><i class="fas fa-plane"></i> Accès</h4>
                            <p>Aéroport international Tribhuvan (KTM)</p>
                        </div>
                        <div class="detail-item">
                            <h4><i class="fas fa-temperature-high"></i> Climat</h4>
                            <p>Tempéré subtropical, moyenne annuelle: 18°C</p>
                        </div>
                    </div>
                </div>
                
                <div class="city-gallery">
                    <h3><i class="fas fa-images"></i> Galerie photo</h3>
                    <div class="gallery-grid">
                        <div class="gallery-item">
                            <img src="../assets/images/cities/Katmandou1.jpg" alt="Katmandou 1">
                            <div class="gallery-overlay">Durbar Square</div>
                        </div>
                        <div class="gallery-item">
                            <img src="../assets/images/cities/Katmandou2.jpg" alt="Katmandou 2">
                            <div class="gallery-overlay">Temple de Shiva</div>
                        </div>
                        <div class="gallery-item">
                            <img src="../assets/images/cities/Katmandou3.jpg" alt="Katmandou 3">
                            <div class="gallery-overlay">Swayambhunath</div>
                        </div>
                        <div class="gallery-item">
                            <img src="../assets/images/cities/Katmandou4.jpg" alt="Katmandou 4">
                            <div class="gallery-overlay">Boudhanath</div>
                        </div>
                        <div class="gallery-item">
                            <img src="../assets/images/cities/Katmandou5.jpg" alt="Katmandou 5">
                            <div class="gallery-overlay">Rues typiques</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Ville 2: Pokhara -->
        <div class="city-card" id="pokhara">
            <div class="city-header">
                <div class="city-title">
                    <h2>Pokhara</h2>
                    <div class="city-meta">
                        <span class="meta-item"><i class="fas fa-users"></i> 525,000</span>
                        <span class="meta-item"><i class="fas fa-ruler-combined"></i> 464.24 km²</span>
                        <span class="meta-item"><i class="fas fa-mountain"></i> 822-1,740 m</span>
                    </div>
                </div>
                <div class="city-badge">
                    <span class="badge tourism">Tourisme</span>
                    <span class="badge trekking">Trekking</span>
                </div>
            </div>
            
            <div class="city-content">
                <div class="city-description">
                    <p>Pokhara, située à 200 km à l'ouest de Katmandou, est la deuxième ville du Népal et la porte d'entrée des treks dans la région des Annapurnas. La ville est célèbre pour son lac Phewa, ses vues spectaculaires sur les sommets enneigés (Annapurna, Dhaulagiri, Machhapuchhre) et ses activités de plein air.</p>
                    
                    <div class="city-details">
                        <div class="detail-item">
                            <h4><i class="fas fa-water"></i> Caractéristiques</h4>
                            <p>Lac Phewa, grottes, cascades, panorama himalayen</p>
                        </div>
                        <div class="detail-item">
                            <h4><i class="fas fa-hiking"></i> Activités</h4>
                            <p>Trekking, parapente, rafting, VTT, escalade</p>
                        </div>
                        <div class="detail-item">
                            <h4><i class="fas fa-road"></i> Distance de KTM</h4>
                            <p>200 km (6-7h en bus, 25 min en avion)</p>
                        </div>
                    </div>
                </div>
                
                <div class="city-gallery">
                    <h3><i class="fas fa-images"></i> Galerie photo</h3>
                    <div class="gallery-grid">
                        <div class="gallery-item">
                            <img src="../assets/images/cities/Pokhara1.jpg" alt="Pokhara 1">
                            <div class="gallery-overlay">Lac Phewa</div>
                        </div>
                        <div class="gallery-item">
                            <img src="../assets/images/cities/Pokhara2.jpg" alt="Pokhara 2">
                            <div class="gallery-overlay">Vue Annapurna</div>
                        </div>
                        <div class="gallery-item">
                            <img src="../assets/images/cities/Pokhara3.jpg" alt="Pokhara 3">
                            <div class="gallery-overlay">Parapente</div>
                        </div>
                        <div class="gallery-item">
                            <img src="../assets/images/cities/Pokhara4.jpg" alt="Pokhara 4">
                            <div class="gallery-overlay">World Peace Stupa</div>
                        </div>
                        <div class="gallery-item">
                            <img src="../assets/images/cities/Pokhara5.jpg" alt="Pokhara 5">
                            <div class="gallery-overlay">Lever de soleil</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Ville 3: Bhaktapur -->
        <div class="city-card" id="bhaktapur">
            <div class="city-header">
                <div class="city-title">
                    <h2>Bhaktapur</h2>
                    <div class="city-meta">
                        <span class="meta-item"><i class="fas fa-users"></i> 81,000</span>
                        <span class="meta-item"><i class="fas fa-ruler-combined"></i> 6.88 km²</span>
                        <span class="meta-item"><i class="fas fa-mountain"></i> 1,401 m</span>
                    </div>
                </div>
                <div class="city-badge">
                    <span class="badge heritage">Patrimoine</span>
                    <span class="badge unesco">UNESCO</span>
                </div>
            </div>
            
            <div class="city-content">
                <div class="city-description">
                    <p>Bhaktapur, la "Ville des Dévots", est l'une des trois anciennes capitales de la vallée de Katmandou. Réputée pour sa préservation exceptionnelle de l'architecture et de la culture Newar, la ville offre un voyage dans le temps avec ses places médiévales, temples en brique et bois sculpté.</p>
                    
                    <div class="city-details">
                        <div class="detail-item">
                            <h4><i class="fas fa-archway"></i> Architecture</h4>
                            <p>Style Newar, temples pagodes, sculptures sur bois</p>
                        </div>
                        <div class="detail-item">
                            <h4><i class="fas fa-palette"></i> Artisanat</h4>
                            <p>Poterie, tissage, sculptures sur bois, Thanka</p>
                        </div>
                        <div class="detail-item">
                            <h4><i class="fas fa-history"></i> Fondation</h4>
                            <p>XIIe siècle par le roi Ananda Malla</p>
                        </div>
                    </div>
                </div>
                
                <div class="city-gallery">
                    <h3><i class="fas fa-images"></i> Galerie photo (5 photos)</h3>
                    <div class="gallery-grid">
                        <div class="gallery-item">
                            <img src="https://images.unsplash.com/photo-1592210454359-9043f067919b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Bhaktapur 1">
                            <div class="gallery-overlay">Durbar Square</div>
                        </div>
                        <div class="gallery-item">
                            <img src="../assets/images/cities/Bhaktapur2.jpg" alt="Bhaktapur 2">
                            <div class="gallery-overlay">Temple Nyatapola</div>
                        </div>
                        <div class="gallery-item">
                            <img src="https://images.unsplash.com/photo-1528181304800-259b08848526?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Bhaktapur 3">
                            <div class="gallery-overlay">Potiers au travail</div>
                        </div>
                        <div class="gallery-item">
                            <img src="../assets/images/cities/Bhaktapur4.jpg" alt="Bhaktapur 4">
                            <div class="gallery-overlay">Détail architectural</div>
                        </div>
                        <div class="gallery-item">
                            <img src="../assets/images/cities/Bhaktapur5.jpg" alt="Bhaktapur 5">
                            <div class="gallery-overlay">Rues pavées</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Tableau comparatif -->
        <div class="comparison-table">
            <h3><i class="fas fa-chart-bar"></i> Tableau comparatif des villes</h3>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Ville</th>
                        <th>Population</th>
                        <th>Superficie</th>
                        <th>Altitude</th>
                        <th>Fondation</th>
                        <th>Spécialité</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Katmandou</strong></td>
                        <td>1.5 million</td>
                        <td>49.45 km²</td>
                        <td>1,400 m</td>
                        <td>Ve siècle</td>
                        <td>Capitale, UNESCO</td>
                    </tr>
                    <tr>
                        <td><strong>Pokhara</strong></td>
                        <td>525,000</td>
                        <td>464.24 km²</td>
                        <td>822-1,740 m</td>
                        <td>XVIIe siècle</td>
                        <td>Trekking, tourisme</td>
                    </tr>
                    <tr>
                        <td><strong>Bhaktapur</strong></td>
                        <td>81,000</td>
                        <td>6.88 km²</td>
                        <td>1,401 m</td>
                        <td>XIIe siècle</td>
                        <td>Patrimoine, artisanat</td>
                    </tr>
                    <tr>
                        <td><strong>Lumbini</strong></td>
                        <td>25,000</td>
                        <td>42.5 km²</td>
                        <td>150 m</td>
                        <td>623 av. J.-C.</td>
                        <td>Pèlerinage bouddhiste</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>

<aside class="right-sidebar">
    <div class="cities-nav">
        <h3 class="sidebar-title"><i class="fas fa-list"></i> Navigation par ville</h3>
        <div class="cities-list">
            <a href="#katmandou" class="city-nav-item">
                <div class="city-nav-icon">
                    <i class="fas fa-city"></i>
                </div>
                <div class="city-nav-info">
                    <h4>Katmandou</h4>
                    <p>Capitale - 1.5M hab.</p>
                </div>
            </a>
            
            <a href="#pokhara" class="city-nav-item">
                <div class="city-nav-icon">
                    <i class="fas fa-water"></i>
                </div>
                <div class="city-nav-info">
                    <h4>Pokhara</h4>
                    <p>Tourisme - 525K hab.</p>
                </div>
            </a>
            
            <a href="#bhaktapur" class="city-nav-item">
                <div class="city-nav-icon">
                    <i class="fas fa-archway"></i>
                </div>
                <div class="city-nav-info">
                    <h4>Bhaktapur</h4>
                    <p>Patrimoine - 81K hab.</p>
                </div>
            </a>
            
            <a href="#lumbini" class="city-nav-item">
                <div class="city-nav-icon">
                    <i class="fas fa-peace"></i>
                </div>
                <div class="city-nav-info">
                    <h4>Lumbini</h4>
                    <p>Pèlerinage - 25K hab.</p>
                </div>
            </a>

        </div>
    </div>
    
    <div class="population-chart">
        <h3 class="sidebar-title"><i class="fas fa-chart-pie"></i> Répartition de la population</h3>
        <div class="chart-container">
            <div class="chart-visual">
                <div class="chart-item" style="width: 70%; background-color: var(--primary-color);">
                    <div class="chart-label">Katmandou</div>
                    <div class="chart-value">70%</div>
                </div>
                <div class="chart-item" style="width: 25%; background-color: var(--secondary-color);">
                    <div class="chart-label">Pokhara</div>
                    <div class="chart-value">25%</div>
                </div>
                <div class="chart-item" style="width: 4%; background-color: var(--accent-color);">
                    <div class="chart-label">Autres</div>
                    <div class="chart-value">4%</div>
                </div>
            </div>
            <p class="chart-note">* Population urbaine des 5 principales villes</p>
        </div>
    </div>
    
    <div class="weather-widget">
        <h3 class="sidebar-title"><i class="fas fa-temperature-high"></i> Météo par ville</h3>
        <div class="weather-list">
            <div class="weather-item">
                <div class="weather-city">Katmandou</div>
                <div class="weather-info">
                    <i class="fas fa-sun"></i>
                    <span class="weather-temp">22°C</span>
                </div>
            </div>
            <div class="weather-item">
                <div class="weather-city">Pokhara</div>
                <div class="weather-info">
                    <i class="fas fa-cloud-sun"></i>
                    <span class="weather-temp">20°C</span>
                </div>
            </div>
            <div class="weather-item">
                <div class="weather-city">Bhaktapur</div>
                <div class="weather-info">
                    <i class="fas fa-sun"></i>
                    <span class="weather-temp">23°C</span>
                </div>
            </div>
        </div>
    </div>
</aside>

<style>
    .cities-container {
        padding: 20px;
    }
    
    .city-card {
        background-color: white;
        border-radius: 15px;
        padding: 30px;
        margin-bottom: 40px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        border-left: 4px solid var(--primary-color);
    }
    
    .city-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.12);
    }
    
    .city-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 25px;
        padding-bottom: 25px;
        border-bottom: 2px solid #eee;
    }
    
    .city-title h2 {
        color: var(--secondary-color);
        font-size: 2rem;
        margin-bottom: 15px;
    }
    
    .city-meta {
        display: flex;
        gap: 20px;
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
    
    .city-badge {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }
    
    .badge {
        padding: 8px 15px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        color: white;
    }
    
    .badge.capital {
        background-color: var(--primary-color);
    }
    
    .badge.unesco {
        background-color: var(--secondary-color);
    }
    
    .badge.tourism {
        background-color: #28a745;
    }
    
    .badge.trekking {
        background-color: #17a2b8;
    }
    
    .badge.heritage {
        background-color: #ffc107;
        color: var(--dark-color);
    }
    
    .city-content {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
    }
    
    @media (max-width: 1100px) {
        .city-content {
            grid-template-columns: 1fr;
        }
    }
    
    .city-description p {
        line-height: 1.8;
        color: #666;
        margin-bottom: 25px;
        font-size: 1.1rem;
    }
    
    .city-details {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-top: 25px;
    }
    
    .detail-item {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        padding: 20px;
        border-radius: 10px;
        border-left: 3px solid var(--accent-color);
    }
    
    .detail-item h4 {
        color: var(--dark-color);
        margin-bottom: 10px;
        font-size: 1rem;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .detail-item p {
        color: #666;
        font-size: 0.95rem;
        margin-bottom: 0;
    }
    
    .city-gallery {
        background: linear-gradient(135deg, #f8f9fa, white);
        padding: 25px;
        border-radius: 10px;
        border: 1px solid #eee;
    }
    
    .city-gallery h3 {
        color: var(--secondary-color);
        margin-bottom: 20px;
        font-size: 1.3rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 15px;
    }
    
    .gallery-item {
        position: relative;
        border-radius: 8px;
        overflow: hidden;
        height: 150px;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .gallery-item:hover {
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }
    
    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .gallery-item:hover img {
        transform: scale(1.1);
    }
    
    .gallery-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
        color: white;
        padding: 10px;
        font-size: 0.85rem;
        text-align: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .gallery-item:hover .gallery-overlay {
        opacity: 1;
    }
    
    .comparison-table {
        background-color: white;
        border-radius: 15px;
        padding: 30px;
        margin-top: 40px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    }
    
    .comparison-table h3 {
        color: var(--secondary-color);
        margin-bottom: 25px;
        font-size: 1.5rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .data-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    
    .data-table th {
        background: linear-gradient(to right, var(--secondary-color), var(--primary-color));
        color: white;
        padding: 15px;
        text-align: left;
        font-weight: 600;
        font-size: 1rem;
    }
    
    .data-table td {
        padding: 15px;
        border-bottom: 1px solid #eee;
        color: #666;
    }
    
    .data-table tr:nth-child(even) {
        background-color: #f8f9fa;
    }
    
    .data-table tr:hover {
        background-color: rgba(220, 20, 60, 0.05);
    }
    
    .data-table td:first-child {
        font-weight: 600;
        color: var(--dark-color);
    }
    
    /* Sidebar spécifique */
    .cities-nav {
        background-color: white;
        border-radius: 10px;
        padding: 25px;
        margin-bottom: 25px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .cities-list {
        margin-top: 20px;
        display: flex;
        flex-direction: column;
        gap: 15px;
    }
    
    .city-nav-item {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 15px;
        background-color: #f8f9fa;
        border-radius: 8px;
        text-decoration: none;
        color: var(--dark-color);
        transition: all 0.3s ease;
        border-left: 4px solid transparent;
    }
    
    .city-nav-item:hover {
        background-color: var(--primary-color);
        color: white;
        transform: translateX(10px);
        border-left-color: var(--accent-color);
    }
    
    .city-nav-item:hover h4,
    .city-nav-item:hover p {
        color: white;
    }
    
    .city-nav-icon {
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
    
    .city-nav-info h4 {
        color: var(--dark-color);
        margin-bottom: 5px;
        font-size: 1.1rem;
        transition: color 0.3s ease;
    }
    
    .city-nav-info p {
        color: #666;
        font-size: 0.9rem;
        transition: color 0.3s ease;
    }
    
    .population-chart {
        background-color: white;
        border-radius: 10px;
        padding: 25px;
        margin-bottom: 25px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .chart-container {
        margin-top: 20px;
    }
    
    .chart-visual {
        height: 40px;
        display: flex;
        border-radius: 20px;
        overflow: hidden;
        margin-bottom: 15px;
    }
    
    .chart-item {
        position: relative;
        height: 100%;
        transition: width 1s ease;
    }
    
    .chart-label {
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        color: white;
        font-weight: 600;
        font-size: 0.85rem;
        white-space: nowrap;
    }
    
    .chart-value {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        color: white;
        font-weight: 700;
        font-size: 0.9rem;
    }
    
    .chart-note {
        font-size: 0.85rem;
        color: #666;
        text-align: center;
        font-style: italic;
    }
    
    .weather-widget {
        background-color: white;
        border-radius: 10px;
        padding: 25px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .weather-list {
        margin-top: 20px;
    }
    
    .weather-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 0;
        border-bottom: 1px solid #eee;
    }
    
    .weather-item:last-child {
        border-bottom: none;
    }
    
    .weather-city {
        font-weight: 600;
        color: var(--dark-color);
    }
    
    .weather-info {
        display: flex;
        align-items: center;
        gap: 15px;
    }
    
    .weather-info i {
        font-size: 1.5rem;
        color: var(--accent-color);
    }
    
    .weather-temp {
        font-weight: 700;
        color: var(--primary-color);
        font-size: 1.2rem;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animation des cartes de ville
        const cityCards = document.querySelectorAll('.city-card');
        cityCards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            
            setTimeout(() => {
                card.style.transition = 'all 0.5s ease';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 200);
        });
        
        // Animation des éléments du tableau
        const tableRows = document.querySelectorAll('.data-table tr');
        tableRows.forEach((row, index) => {
            row.style.opacity = '0';
            row.style.transform = 'translateX(-20px)';
            
            setTimeout(() => {
                row.style.transition = 'all 0.5s ease';
                row.style.opacity = '1';
                row.style.transform = 'translateX(0)';
            }, 600 + index * 100);
        });
        
        // Animation du graphique
        const chartItems = document.querySelectorAll('.chart-item');
        chartItems.forEach(item => {
            const originalWidth = item.style.width;
            item.style.width = '0%';
            
            setTimeout(() => {
                item.style.transition = 'width 1.5s ease';
                item.style.width = originalWidth;
            }, 800);
        });
        
        // Navigation fluide vers les villes
        const cityNavItems = document.querySelectorAll('.city-nav-item');
        cityNavItems.forEach(item => {
            item.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if(targetElement) {
                    e.preventDefault();
                    
                    // Animation sur l'élément cible
                    targetElement.style.boxShadow = '0 0 0 3px var(--primary-color), 0 15px 40px rgba(0,0,0,0.12)';
                    targetElement.style.transform = 'translateY(-10px)';
                    
                    setTimeout(() => {
                        targetElement.style.boxShadow = '0 15px 40px rgba(0,0,0,0.12)';
                        targetElement.style.transform = 'translateY(-5px)';
                    }, 2000);
                    
                    // Scroller vers l'élément
                    window.scrollTo({
                        top: targetElement.offsetTop - 100,
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        // Lightbox pour les galeries
        const galleryItems = document.querySelectorAll('.gallery-item');
        galleryItems.forEach(item => {
            item.addEventListener('click', function() {
                const imgSrc = this.querySelector('img').src;
                const imgAlt = this.querySelector('img').alt;
                
                // Créer lightbox
                const lightbox = document.createElement('div');
                lightbox.className = 'lightbox';
                lightbox.style.cssText = `
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-color: rgba(0,0,0,0.9);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    z-index: 10000;
                    opacity: 0;
                    transition: opacity 0.3s ease;
                `;
                
                lightbox.innerHTML = `
                    <div class="lightbox-content" style="position: relative;">
                        <img src="${imgSrc}" alt="${imgAlt}" style="max-width: 90vw; max-height: 90vh; border-radius: 10px;">
                        <button class="lightbox-close" style="
                            position: absolute;
                            top: -40px;
                            right: 0;
                            background: none;
                            border: none;
                            color: white;
                            font-size: 2rem;
                            cursor: pointer;
                        ">&times;</button>
                    </div>
                `;
                
                document.body.appendChild(lightbox);
                
                // Animation d'entrée
                setTimeout(() => {
                    lightbox.style.opacity = '1';
                }, 10);
                
                // Fermer lightbox
                const closeBtn = lightbox.querySelector('.lightbox-close');
                closeBtn.addEventListener('click', function() {
                    lightbox.style.opacity = '0';
                    setTimeout(() => {
                        document.body.removeChild(lightbox);
                    }, 300);
                });
                
                lightbox.addEventListener('click', function(e) {
                    if(e.target === lightbox) {
                        lightbox.style.opacity = '0';
                        setTimeout(() => {
                            document.body.removeChild(lightbox);
                        }, 300);
                    }
                });
            });
        });
        
        // Simulation de mise à jour météo
        function updateWeather() {
            const weatherItems = document.querySelectorAll('.weather-item');
            weatherItems.forEach(item => {
                const tempElement = item.querySelector('.weather-temp');
                const iconElement = item.querySelector('i');
                
                if(tempElement && iconElement) {
                    // Température aléatoire entre 18 et 25
                    const newTemp = Math.floor(Math.random() * 7) + 18;
                    
                    // Animation
                    tempElement.style.transform = 'scale(1.2)';
                    tempElement.style.color = 'var(--accent-color)';
                    
                    setTimeout(() => {
                        tempElement.textContent = `${newTemp}°C`;
                        tempElement.style.transform = 'scale(1)';
                        tempElement.style.color = 'var(--primary-color)';
                        
                        // Changer l'icône aléatoirement
                        const icons = ['fa-sun', 'fa-cloud-sun', 'fa-cloud'];
                        const currentIcon = iconElement.className.split(' ')[1];
                        let newIcon;
                        
                        do {
                            newIcon = icons[Math.floor(Math.random() * icons.length)];
                        } while(newIcon === currentIcon);
                        
                        iconElement.className = `fas ${newIcon}`;
                    }, 300);
                }
            });
        }
        
        // Mettre à jour la météo toutes les 20 secondes
        setInterval(updateWeather, 20000);
    });
</script>

<?php require_once '../includes/footer.php'; ?>