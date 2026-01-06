<?php
$page_title = "Carte du Népal";
require_once '../includes/header.php';
?>

<main class="main-content">
    <div class="page-header">
        <h1 class="page-title"><i class="fas fa-map-marked-alt"></i> Carte du Népal</h1>
        <p class="page-description">Explorez la géographie, les régions et les points d'intérêt du Népal sur cette carte interactive</p>
    </div>
    
    <div class="map-container">
        <!-- Conteneur principal de la carte -->
        <div class="map-wrapper">
            <div id="nepalMap" class="map-visual">
                <!-- La carte Google Maps sera chargée ici via JavaScript -->
                <div class="map-loading">
                    <div class="loading-spinner">
                        <i class="fas fa-compass fa-spin"></i>
                    </div>
                    <p>Chargement de la carte...</p>
                </div>
            </div>
            
            <div class="map-controls">
                <button id="zoomIn" class="map-control-btn">
                    <i class="fas fa-plus"></i>
                </button>
                <button id="zoomOut" class="map-control-btn">
                    <i class="fas fa-minus"></i>
                </button>
                <button id="resetView" class="map-control-btn">
                    <i class="fas fa-home"></i>
                </button>
                <button id="currentLocation" class="map-control-btn">
                    <i class="fas fa-location-arrow"></i>
                </button>
            </div>
            
            <div class="map-legend">
                <h4><i class="fas fa-key"></i> Légende</h4>
                <div class="legend-items">
                    <div class="legend-item">
                        <span class="legend-color capital"></span>
                        <span class="legend-text">Capitales régionales</span>
                    </div>
                    <div class="legend-item">
                        <span class="legend-icon"><i class="fas fa-mountain"></i></span>
                        <span class="legend-text">Sommets</span>
                    </div>
                    <div class="legend-item">
                        <span class="legend-icon"><i class="fas fa-tree"></i></span>
                        <span class="legend-text">Parcs nationaux</span>
                    </div>
                    <div class="legend-item">
                        <span class="legend-icon"><i class="fas fa-archway"></i></span>
                        <span class="legend-text">Sites UNESCO</span>
                    </div>
                    <div class="legend-item">
                        <span class="legend-icon"><i class="fas fa-hiking"></i></span>
                        <span class="legend-text">Sentiers de trekking</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Informations sur le point sélectionné -->
        <div class="map-info" id="mapInfo">
            <div class="info-header">
                <h3><i class="fas fa-info-circle"></i> Informations</h3>
                <button id="closeInfo" class="close-btn">&times;</button>
            </div>
            <div class="info-content">
                <p>Sélectionnez un point sur la carte pour voir les détails.</p>
            </div>
        </div>
        
        <!-- Filtres de la carte -->
        <div class="map-filters">
            <h3><i class="fas fa-filter"></i> Filtres</h3>
            <div class="filter-options">
                <label class="filter-checkbox">
                    <input type="checkbox" id="filterCities" checked>
                    <span class="checkmark"></span>
                    <span class="filter-label">Villes</span>
                </label>
                
                <label class="filter-checkbox">
                    <input type="checkbox" id="filterMountains" checked>
                    <span class="checkmark"></span>
                    <span class="filter-label">Montagnes</span>
                </label>
                
                <label class="filter-checkbox">
                    <input type="checkbox" id="filterParks" checked>
                    <span class="checkmark"></span>
                    <span class="filter-label">Parcs nationaux</span>
                </label>
                
                <label class="filter-checkbox">
                    <input type="checkbox" id="filterHeritage" checked>
                    <span class="checkmark"></span>
                    <span class="filter-label">Sites UNESCO</span>
                </label>
                
                <label class="filter-checkbox">
                    <input type="checkbox" id="filterTrekking" checked>
                    <span class="checkmark"></span>
                    <span class="filter-label">Sentiers de trekking</span>
                </label>
            </div>
        </div>
        
        <!-- Données géographiques -->
        <div class="geography-info" id="regions">
            <h3><i class="fas fa-globe-asia"></i> Géographie du Népal</h3>
            
            <div class="geography-grid">
                <div class="geo-card">
                    <div class="geo-icon">
                        <i class="fas fa-mountain"></i>
                    </div>
                    <div class="geo-content">
                        <h4>Himalaya</h4>
                        <p>Région nord - Altitude: 4,000-8,848m</p>
                        <p class="geo-desc">Contient 8 des 14 sommets de plus de 8,000m</p>
                    </div>
                </div>
                
                <div class="geo-card">
                    <div class="geo-icon">
                        <i class="fas fa-hills"></i>
                    </div>
                    <div class="geo-content">
                        <h4>Collines (Pahad)</h4>
                        <p>Région centrale - Altitude: 600-4,000m</p>
                        <p class="geo-desc">Vallées fertiles et forêts subtropicales</p>
                    </div>
                </div>
                
                <div class="geo-card">
                    <div class="geo-icon">
                        <i class="fas fa-trees"></i>
                    </div>
                    <div class="geo-content">
                        <h4>Teraï</h4>
                        <p>Région sud - Altitude: 60-600m</p>
                        <p class="geo-desc">Plaines fertiles et parcs nationaux</p>
                    </div>
                </div>
            </div>
            
            <div class="geo-stats">
                <h4><i class="fas fa-chart-bar"></i> Statistiques</h4>
                <div class="stats-grid">
                    <div class="stat-box">
                        <div class="stat-value">147,516</div>
                        <div class="stat-label">km² de superficie</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-value">885 km</div>
                        <div class="stat-label">Est-Ouest</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-value">193 km</div>
                        <div class="stat-label">Nord-Sud</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-value">2,400 km</div>
                        <div class="stat-label">Frontières</div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Sentiers de trekking -->
        <div class="trekking-info" id="trekking">
            <h3><i class="fas fa-hiking"></i> Principaux sentiers de trekking</h3>
            
            <div class="trekking-list">
                <div class="trek-card">
                    <div class="trek-header">
                        <h4>Circuit des Annapurnas</h4>
                        <span class="trek-difficulty medium">Moyen</span>
                    </div>
                    <div class="trek-details">
                        <p><i class="fas fa-route"></i> <strong>Distance:</strong> 160-230 km</p>
                        <p><i class="fas fa-clock"></i> <strong>Durée:</strong> 15-20 jours</p>
                        <p><i class="fas fa-mountain"></i> <strong>Altitude max:</strong> 5,416m (Thorong La)</p>
                    </div>
                    <div class="trek-description">
                        <p>Le trek le plus populaire du Népal, offrant une diversité culturelle et des paysages spectaculaires.</p>
                    </div>
                </div>
                
                <div class="trek-card">
                    <div class="trek-header">
                        <h4>Everest Base Camp</h4>
                        <span class="trek-difficulty hard">Difficile</span>
                    </div>
                    <div class="trek-details">
                        <p><i class="fas fa-route"></i> <strong>Distance:</strong> 130 km</p>
                        <p><i class="fas fa-clock"></i> <strong>Durée:</strong> 12-14 jours</p>
                        <p><i class="fas fa-mountain"></i> <strong>Altitude max:</strong> 5,545m (Kalapatthar)</p>
                    </div>
                    <div class="trek-description">
                        <p>Randonnée mythique vers le camp de base du plus haut sommet du monde.</p>
                    </div>
                </div>
                
                <div class="trek-card">
                    <div class="trek-header">
                        <h4>Langtang Valley</h4>
                        <span class="trek-difficulty easy">Facile</span>
                    </div>
                    <div class="trek-details">
                        <p><i class="fas fa-route"></i> <strong>Distance:</strong> 80 km</p>
                        <p><i class="fas fa-clock"></i> <strong>Durée:</strong> 7-10 jours</p>
                        <p><i class="fas fa-mountain"></i> <strong>Altitude max:</strong> 4,984m (Tserko Ri)</p>
                    </div>
                    <div class="trek-description">
                        <p>Vallée proche de Katmandou, riche en culture tamang et vues sur le Langtang Lirung.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Transport et accès -->
        <div class="transport-info" id="transport">
            <h3><i class="fas fa-plane"></i> Transport et accès</h3>
            
            <div class="transport-grid">
                <div class="transport-card">
                    <div class="transport-icon">
                        <i class="fas fa-plane"></i>
                    </div>
                    <div class="transport-content">
                        <h4>Par avion</h4>
                        <ul>
                            <li>Aéroport international de Katmandou (KTM)</li>
                            <li>Vols directs depuis l'Europe, l'Asie, le Moyen-Orient</li>
                            <li>Compagnies: Qatar Airways, Turkish Airlines, Air India</li>
                        </ul>
                    </div>
                </div>
                
                <div class="transport-card">
                    <div class="transport-icon">
                        <i class="fas fa-bus"></i>
                    </div>
                    <div class="transport-content">
                        <h4>Par voie terrestre</h4>
                        <ul>
                            <li>Frontières avec l'Inde: Sunauli, Birgunj, Kakarbhitta</li>
                            <li>Bus longue distance depuis l'Inde</li>
                            <li>Réseau routier en développement</li>
                        </ul>
                    </div>
                </div>
                
                <div class="transport-card">
                    <div class="transport-icon">
                        <i class="fas fa-helicopter"></i>
                    </div>
                    <div class="transport-content">
                        <h4>Transport interne</h4>
                        <ul>
                            <li>Vols domestiques vers Pokhara, Lukla, Jomsom</li>
                            <li>Hélicoptères pour les régions reculées</li>
                            <li>Bus locaux et jeeps privées</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<aside class="right-sidebar">
    <div class="map-locations">
        <h3 class="sidebar-title"><i class="fas fa-map-pin"></i> Points d'intérêt</h3>
        
        <div class="locations-search">
            <input type="text" id="locationSearch" placeholder="Rechercher un lieu...">
            <button id="searchBtn"><i class="fas fa-search"></i></button>
        </div>
        
        <div class="locations-list">
            <div class="location-category">
                <h4><i class="fas fa-city"></i> Villes principales</h4>
                <div class="category-items">
                    <button class="location-item" data-location="katmandou" data-lat="27.7172" data-lng="85.3240">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Katmandou (Capitale)</span>
                    </button>
                    <button class="location-item" data-location="pokhara" data-lat="28.2096" data-lng="83.9856">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Pokhara</span>
                    </button>
                    <button class="location-item" data-location="bhaktapur" data-lat="27.6720" data-lng="85.4278">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Bhaktapur</span>
                    </button>
                    <button class="location-item" data-location="lumbini" data-lat="27.4833" data-lng="83.2833">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Lumbini</span>
                    </button>
                </div>
            </div>
            
            <div class="location-category">
                <h4><i class="fas fa-mountain"></i> Sommets célèbres</h4>
                <div class="category-items">
                    <button class="location-item" data-location="everest" data-lat="27.9881" data-lng="86.9253">
                        <i class="fas fa-mountain"></i>
                        <span>Mont Everest (8,848m)</span>
                    </button>
                    <button class="location-item" data-location="annapurna" data-lat="28.5956" data-lng="83.8203">
                        <i class="fas fa-mountain"></i>
                        <span>Annapurna I (8,091m)</span>
                    </button>
                    <button class="location-item" data-location="dhaulagiri" data-lat="28.6967" data-lng="83.4942">
                        <i class="fas fa-mountain"></i>
                        <span>Dhaulagiri (8,167m)</span>
                    </button>
                </div>
            </div>
            
            <div class="location-category">
                <h4><i class="fas fa-tree"></i> Parcs nationaux</h4>
                <div class="category-items">
                    <button class="location-item" data-location="chitwan" data-lat="27.5000" data-lng="84.3333">
                        <i class="fas fa-tree"></i>
                        <span>Parc de Chitwan</span>
                    </button>
                    <button class="location-item" data-location="sagarmatha" data-lat="27.9881" data-lng="86.9253">
                        <i class="fas fa-tree"></i>
                        <span>Parc de Sagarmatha</span>
                    </button>
                    <button class="location-item" data-location="annapurna-conservation" data-lat="28.5956" data-lng="83.8203">
                        <i class="fas fa-tree"></i>
                        <span>Conservation Annapurna</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="map-coordinates">
        <h3 class="sidebar-title"><i class="fas fa-crosshairs"></i> Coordonnées</h3>
        <div class="coordinates-display">
            <div class="coordinate-item">
                <span class="coord-label">Latitude:</span>
                <span id="currentLat" class="coord-value">27.7172°N</span>
            </div>
            <div class="coordinate-item">
                <span class="coord-label">Longitude:</span>
                <span id="currentLng" class="coord-value">85.3240°E</span>
            </div>
            <div class="coordinate-item">
                <span class="coord-label">Zoom:</span>
                <span id="currentZoom" class="coord-value">7</span>
            </div>
        </div>
    </div>
    
    <div class="map-download">
        <h3 class="sidebar-title"><i class="fas fa-download"></i> Ressources</h3>
        <div class="download-options">
            <a href="#" class="download-btn">
                <i class="fas fa-map"></i>
                <span>Carte PDF</span>
            </a>
            <a href="#" class="download-btn">
                <i class="fas fa-file-alt"></i>
                <span>Guide trekking</span>
            </a>
            <a href="#" class="download-btn">
                <i class="fas fa-images"></i>
                <span>Photos aériennes</span>
            </a>
        </div>
    </div>
</aside>

<!-- Script Google Maps - API key disabled. Using fallback display. -->
<!-- To enable real maps: Get API key from https://cloud.google.com/maps-platform -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY_HERE&callback=initMap" async defer></script> -->

<style>
    .map-container {
        padding: 20px;
    }
    
    .map-wrapper {
        position: relative;
        height: 600px;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        margin-bottom: 30px;
        border: 2px solid var(--secondary-color);
    }
    
    .map-visual {
        width: 100%;
        height: 100%;
        background-color: #e9ecef;
    }
    
    .map-loading {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100%;
        color: var(--secondary-color);
    }
    
    .loading-spinner {
        font-size: 3rem;
        margin-bottom: 20px;
    }
    
    .map-loading p {
        font-size: 1.2rem;
        font-weight: 500;
    }
    
    .map-controls {
        position: absolute;
        top: 20px;
        right: 20px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        z-index: 1000;
    }
    
    .map-control-btn {
        width: 40px;
        height: 40px;
        background-color: white;
        border: none;
        border-radius: 8px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.2);
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        color: var(--dark-color);
        transition: all 0.3s ease;
    }
    
    .map-control-btn:hover {
        background-color: var(--primary-color);
        color: white;
        transform: scale(1.1);
    }
    
    .map-legend {
        position: absolute;
        bottom: 20px;
        left: 20px;
        background-color: white;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.2);
        z-index: 1000;
        max-width: 200px;
    }
    
    .map-legend h4 {
        margin-bottom: 10px;
        font-size: 1rem;
        color: var(--dark-color);
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .legend-items {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }
    
    .legend-item {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .legend-color {
        width: 15px;
        height: 15px;
        border-radius: 50%;
    }
    
    .legend-color.capital {
        background-color: var(--primary-color);
    }
    
    .legend-icon {
        width: 15px;
        height: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--secondary-color);
        font-size: 0.9rem;
    }
    
    .legend-text {
        font-size: 0.85rem;
        color: #666;
    }
    
    .map-info {
        background-color: white;
        border-radius: 10px;
        padding: 25px;
        margin-bottom: 30px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        border-left: 4px solid var(--primary-color);
        animation: slideInRight 0.5s ease;
    }
    
    .info-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 2px solid #eee;
    }
    
    .info-header h3 {
        color: var(--secondary-color);
        font-size: 1.4rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .close-btn {
        background: none;
        border: none;
        font-size: 1.8rem;
        color: #666;
        cursor: pointer;
        transition: color 0.3s ease;
        line-height: 1;
    }
    
    .close-btn:hover {
        color: var(--primary-color);
    }
    
    .map-filters {
        background-color: white;
        border-radius: 10px;
        padding: 25px;
        margin-bottom: 30px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .map-filters h3 {
        color: var(--secondary-color);
        margin-bottom: 20px;
        font-size: 1.4rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .filter-options {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }
    
    .filter-checkbox {
        display: flex;
        align-items: center;
        cursor: pointer;
        position: relative;
        padding-left: 35px;
    }
    
    .filter-checkbox input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }
    
    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 25px;
        width: 25px;
        background-color: #eee;
        border-radius: 5px;
        transition: all 0.3s ease;
    }
    
    .filter-checkbox:hover input ~ .checkmark {
        background-color: #ccc;
    }
    
    .filter-checkbox input:checked ~ .checkmark {
        background-color: var(--primary-color);
    }
    
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }
    
    .filter-checkbox input:checked ~ .checkmark:after {
        display: block;
    }
    
    .filter-checkbox .checkmark:after {
        left: 9px;
        top: 5px;
        width: 7px;
        height: 12px;
        border: solid white;
        border-width: 0 3px 3px 0;
        transform: rotate(45deg);
    }
    
    .filter-label {
        font-size: 1rem;
        color: var(--dark-color);
        font-weight: 500;
    }
    
    .geography-info, .trekking-info, .transport-info {
        background-color: white;
        border-radius: 10px;
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .geography-info h3, .trekking-info h3, .transport-info h3 {
        color: var(--secondary-color);
        margin-bottom: 25px;
        font-size: 1.5rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .geography-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 25px;
        margin-bottom: 30px;
    }
    
    .geo-card {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        border-radius: 10px;
        padding: 25px;
        display: flex;
        gap: 20px;
        align-items: center;
        transition: all 0.3s ease;
        border: 1px solid transparent;
    }
    
    .geo-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        border-color: var(--primary-color);
        background: linear-gradient(135deg, white, #f8f9fa);
    }
    
    .geo-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.8rem;
        flex-shrink: 0;
    }
    
    .geo-content h4 {
        color: var(--dark-color);
        margin-bottom: 8px;
        font-size: 1.3rem;
    }
    
    .geo-content p {
        color: #666;
        margin-bottom: 5px;
        font-size: 0.95rem;
    }
    
    .geo-desc {
        font-size: 0.9rem;
        color: #888;
        margin-top: 8px;
        font-style: italic;
    }
    
    .geo-stats {
        margin-top: 30px;
        padding-top: 25px;
        border-top: 2px solid #eee;
    }
    
    .geo-stats h4 {
        color: var(--dark-color);
        margin-bottom: 20px;
        font-size: 1.2rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
    }
    
    .stat-box {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        color: white;
        transition: all 0.3s ease;
    }
    
    .stat-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }
    
    .stat-value {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 5px;
    }
    
    .stat-label {
        font-size: 0.9rem;
        opacity: 0.9;
    }
    
    .trekking-list {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 25px;
    }
    
    .trek-card {
        background: linear-gradient(135deg, #f8f9fa, white);
        border-radius: 10px;
        padding: 25px;
        border: 1px solid #eee;
        transition: all 0.3s ease;
    }
    
    .trek-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        border-color: var(--primary-color);
    }
    
    .trek-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }
    
    .trek-header h4 {
        color: var(--secondary-color);
        font-size: 1.3rem;
    }
    
    .trek-difficulty {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        color: white;
    }
    
    .trek-difficulty.easy {
        background-color: #28a745;
    }
    
    .trek-difficulty.medium {
        background-color: #ffc107;
        color: var(--dark-color);
    }
    
    .trek-difficulty.hard {
        background-color: #dc3545;
    }
    
    .trek-details {
        margin-bottom: 15px;
    }
    
    .trek-details p {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 8px;
        color: #666;
        font-size: 0.95rem;
    }
    
    .trek-description p {
        color: #666;
        line-height: 1.6;
        font-size: 0.95rem;
    }
    
    .transport-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 25px;
    }
    
    .transport-card {
        background: linear-gradient(135deg, #f8f9fa, white);
        border-radius: 10px;
        padding: 25px;
        border: 1px solid #eee;
        transition: all 0.3s ease;
    }
    
    .transport-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        border-color: var(--primary-color);
    }
    
    .transport-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        margin-bottom: 20px;
    }
    
    .transport-content h4 {
        color: var(--dark-color);
        margin-bottom: 15px;
        font-size: 1.3rem;
    }
    
    .transport-content ul {
        list-style: none;
        padding-left: 0;
    }
    
    .transport-content li {
        margin-bottom: 10px;
        padding-left: 25px;
        position: relative;
        color: #666;
        font-size: 0.95rem;
    }
    
    .transport-content li:before {
        content: '✓';
        position: absolute;
        left: 0;
        color: var(--primary-color);
        font-weight: bold;
    }
    
    /* Sidebar spécifique */
    .map-locations {
        background-color: white;
        border-radius: 10px;
        padding: 25px;
        margin-bottom: 25px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .locations-search {
        display: flex;
        gap: 10px;
        margin: 20px 0;
    }
    
    .locations-search input {
        flex: 1;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-family: 'Poppins', sans-serif;
        font-size: 1rem;
    }
    
    .locations-search button {
        background-color: var(--primary-color);
        color: white;
        border: none;
        width: 50px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 1.2rem;
        transition: all 0.3s ease;
    }
    
    .locations-search button:hover {
        background-color: var(--secondary-color);
        transform: scale(1.05);
    }
    
    .locations-list {
        max-height: 400px;
        overflow-y: auto;
        padding-right: 10px;
    }
    
    .location-category {
        margin-bottom: 25px;
    }
    
    .location-category:last-child {
        margin-bottom: 0;
    }
    
    .location-category h4 {
        color: var(--secondary-color);
        margin-bottom: 15px;
        font-size: 1.1rem;
        display: flex;
        align-items: center;
        gap: 10px;
        padding-bottom: 10px;
        border-bottom: 2px solid #eee;
    }
    
    .category-items {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    
    .location-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 15px;
        background-color: #f8f9fa;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-family: 'Poppins', sans-serif;
        font-size: 0.95rem;
        color: var(--dark-color);
        text-align: left;
        transition: all 0.3s ease;
    }
    
    .location-item:hover {
        background-color: var(--primary-color);
        color: white;
        transform: translateX(5px);
    }
    
    .location-item i {
        font-size: 1rem;
        width: 20px;
        text-align: center;
    }
    
    .map-coordinates {
        background-color: white;
        border-radius: 10px;
        padding: 25px;
        margin-bottom: 25px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .coordinates-display {
        margin-top: 20px;
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        padding: 20px;
        border-radius: 10px;
    }
    
    .coordinate-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
        padding-bottom: 15px;
        border-bottom: 1px dashed #ccc;
    }
    
    .coordinate-item:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }
    
    .coord-label {
        font-weight: 600;
        color: var(--dark-color);
        font-size: 0.95rem;
    }
    
    .coord-value {
        font-family: monospace;
        color: var(--primary-color);
        font-weight: 600;
        font-size: 1.1rem;
    }
    
    .map-download {
        background-color: white;
        border-radius: 10px;
        padding: 25px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .download-options {
        display: flex;
        flex-direction: column;
        gap: 15px;
        margin-top: 20px;
    }
    
    .download-btn {
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
    
    .download-btn:hover {
        background-color: var(--secondary-color);
        color: white;
        transform: translateX(5px);
    }
    
    .download-btn i {
        font-size: 1.2rem;
        width: 30px;
        text-align: center;
    }
    
    .download-btn span {
        font-weight: 500;
        font-size: 1rem;
    }
</style>

<script>
    // Variables globales pour la carte
    let map;
    let markers = [];
    let infoWindow;
    let currentZoom = 7;
    let currentCenter = { lat: 28.3949, lng: 84.1240 }; // Centre du Népal
    
    // Données des points d'intérêt
    const locations = {
        katmandou: {
            lat: 27.7172,
            lng: 85.3240,
            title: "Katmandou",
            description: "Capitale du Népal, centre culturel et économique. Population: 1.5 million. Altitude: 1,400m.",
            type: "city",
            icon: "🏙️"
        },
        pokhara: {
            lat: 28.2096,
            lng: 83.9856,
            title: "Pokhara",
            description: "Porte d'entrée des Annapurnas, célèbre pour le lac Phewa et les activités de plein air.",
            type: "city",
            icon: "🏞️"
        },
        bhaktapur: {
            lat: 27.6720,
            lng: 85.4278,
            title: "Bhaktapur",
            description: "Ville médiévale préservée, patrimoine UNESCO, architecture Newar exceptionnelle.",
            type: "heritage",
            icon: "🏛️"
        },
        lumbini: {
            lat: 27.4833,
            lng: 83.2833,
            title: "Lumbini",
            description: "Lieu de naissance de Bouddha, site de pèlerinage majeur, patrimoine UNESCO.",
            type: "heritage",
            icon: "🕉️"
        },
        everest: {
            lat: 27.9881,
            lng: 86.9253,
            title: "Mont Everest",
            description: "Plus haut sommet du monde (8,848m). Situé à la frontière Népal-Tibet.",
            type: "mountain",
            icon: "🏔️"
        },
        annapurna: {
            lat: 28.5956,
            lng: 83.8203,
            title: "Annapurna I",
            description: "Dixième plus haut sommet du monde (8,091m). Région de trekking populaire.",
            type: "mountain",
            icon: "⛰️"
        },
        chitwan: {
            lat: 27.5000,
            lng: 84.3333,
            title: "Parc national de Chitwan",
            description: "Réserve naturelle, habitat des rhinocéros unicornes et tigres du Bengale.",
            type: "park",
            icon: "🌿"
        }
    };
    
    // Données des treks
    const trekkingRoutes = [
        {
            name: "Circuit Annapurna",
            path: [
                {lat: 28.2096, lng: 83.9856}, // Pokhara
                {lat: 28.2939, lng: 83.8215}, // Ghorepani
                {lat: 28.7931, lng: 83.7373}, // Muktinath
                {lat: 28.7794, lng: 83.7224}, // Jomsom
                {lat: 28.3025, lng: 83.8412}  // Tatopani
            ],
            color: "#FF6B6B"
        },
        {
            name: "Everest Base Camp",
            path: [
                {lat: 27.6869, lng: 86.7296}, // Lukla
                {lat: 27.7361, lng: 86.7144}, // Namche Bazar
                {lat: 27.8975, lng: 86.8139}, // Dingboche
                {lat: 27.9896, lng: 86.8299}, // Gorak Shep
                {lat: 28.0064, lng: 86.8522}  // Everest Base Camp
            ],
            color: "#4ECDC4"
        }
    ];
    
    // Initialisation de la carte
    function initMap() {
        // Créer la carte
        map = new google.maps.Map(document.getElementById('nepalMap'), {
            center: currentCenter,
            zoom: currentZoom,
            mapTypeId: 'terrain',
            styles: [
                {
                    "featureType": "administrative",
                    "elementType": "geometry",
                    "stylers": [{"visibility": "off"}]
                },
                {
                    "featureType": "poi",
                    "stylers": [{"visibility": "off"}]
                },
                {
                    "featureType": "road",
                    "stylers": [{"visibility": "off"}]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry.fill",
                    "stylers": [{"color": "#a0d2ff"}]
                }
            ]
        });
        
        // Mettre à jour les coordonnées affichées
        updateCoordinates();
        
        // Écouter les événements de la carte
        map.addListener('zoom_changed', function() {
            currentZoom = map.getZoom();
            updateCoordinates();
        });
        
        map.addListener('center_changed', function() {
            const center = map.getCenter();
            currentCenter = { lat: center.lat(), lng: center.lng() };
            updateCoordinates();
        });
        
        // Créer l'infoWindow
        infoWindow = new google.maps.InfoWindow();
        
        // Ajouter les marqueurs
        addMarkers();
        
        // Ajouter les routes de trekking
        addTrekkingRoutes();
        
        // Masquer le loading
        document.querySelector('.map-loading').style.display = 'none';
        
        // Ouvrir l'infoWindow pour Katmandou par défaut
        setTimeout(() => {
            showLocationInfo('katmandou');
        }, 1000);
    }
    
    // Ajouter les marqueurs sur la carte
    function addMarkers() {
        // Icônes personnalisées
        const icons = {
            city: {
                url: 'data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23DC143C"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>',
                scaledSize: new google.maps.Size(30, 30)
            },
            mountain: {
                url: 'data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23003893"><path d="M14 6l-3.75 5 2.85 3.8-1.6 1.2C9.81 13.75 7 10 7 10l-6 8h22L14 6z"/></svg>',
                scaledSize: new google.maps.Size(30, 30)
            },
            heritage: {
                url: 'data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23FFD700"><path d="M18 10V8h-4V4h-4v4H6v2H4v7h16v-7h-2zm-6 6c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3z"/></svg>',
                scaledSize: new google.maps.Size(30, 30)
            },
            park: {
                url: 'data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%2328a745"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM5.5 7.5h2v-2H9v2h2V9H9v2H7.5V9h-2V7.5zM19 19H5L19 5v14z"/></svg>',
                scaledSize: new google.maps.Size(30, 30)
            }
        };
        
        // Créer les marqueurs
        Object.keys(locations).forEach(key => {
            const location = locations[key];
            
            const marker = new google.maps.Marker({
                position: { lat: location.lat, lng: location.lng },
                map: map,
                title: location.title,
                icon: icons[location.type],
                animation: google.maps.Animation.DROP
            });
            
            // Ajouter l'événement de clic
            marker.addListener('click', function() {
                showLocationInfo(key);
                centerMap(location.lat, location.lng);
            });
            
            markers.push({
                marker: marker,
                type: location.type,
                id: key
            });
        });
    }
    
    // Ajouter les routes de trekking
    function addTrekkingRoutes() {
        trekkingRoutes.forEach(route => {
            const path = new google.maps.Polyline({
                path: route.path,
                geodesic: true,
                strokeColor: route.color,
                strokeOpacity: 0.8,
                strokeWeight: 3,
                map: map
            });
        });
    }
    
    // Afficher les informations d'un lieu
    function showLocationInfo(locationId) {
        const location = locations[locationId];
        if (!location) return;
        
        const content = `
            <div class="map-info-content">
                <h3>${location.icon} ${location.title}</h3>
                <p>${location.description}</p>
                <div class="info-details">
                    <p><strong>Coordonnées:</strong> ${location.lat.toFixed(4)}°N, ${location.lng.toFixed(4)}°E</p>
                    <p><strong>Type:</strong> ${getTypeName(location.type)}</p>
                </div>
                <div class="info-actions">
                    <button onclick="centerMap(${location.lat}, ${location.lng})" class="info-btn">
                        <i class="fas fa-crosshairs"></i> Centrer
                    </button>
                    <button onclick="zoomToLocation(${location.lat}, ${location.lng})" class="info-btn">
                        <i class="fas fa-search-plus"></i> Zoom
                    </button>
                </div>
            </div>
        `;
        
        // Mettre à jour l'infoWindow
        infoWindow.setContent(content);
        infoWindow.open(map, markers.find(m => m.id === locationId).marker);
        
        // Mettre à jour le panneau d'information
        document.querySelector('.info-content').innerHTML = content;
        document.getElementById('mapInfo').style.display = 'block';
    }
    
    // Obtenir le nom du type
    function getTypeName(type) {
        const types = {
            city: 'Ville',
            mountain: 'Montagne',
            heritage: 'Patrimoine UNESCO',
            park: 'Parc national'
        };
        return types[type] || type;
    }
    
    // Centrer la carte sur une position
    function centerMap(lat, lng) {
        map.panTo({ lat: lat, lng: lng });
        currentCenter = { lat: lat, lng: lng };
        updateCoordinates();
    }
    
    // Zoomer sur une position
    function zoomToLocation(lat, lng) {
        map.setCenter({ lat: lat, lng: lng });
        map.setZoom(12);
        currentCenter = { lat: lat, lng: lng };
        currentZoom = 12;
        updateCoordinates();
    }
    
    // Mettre à jour les coordonnées affichées
    function updateCoordinates() {
        document.getElementById('currentLat').textContent = currentCenter.lat.toFixed(4) + '°N';
        document.getElementById('currentLng').textContent = currentCenter.lng.toFixed(4) + '°E';
        document.getElementById('currentZoom').textContent = currentZoom;
    }
    
    // Filtrer les marqueurs
    function filterMarkers() {
        const filters = {
            cities: document.getElementById('filterCities').checked,
            mountains: document.getElementById('filterMountains').checked,
            parks: document.getElementById('filterParks').checked,
            heritage: document.getElementById('filterHeritage').checked
        };
        
        markers.forEach(markerData => {
            const type = markerData.type;
            let visible = false;
            
            if (type === 'city' && filters.cities) visible = true;
            if (type === 'mountain' && filters.mountains) visible = true;
            if (type === 'park' && filters.parks) visible = true;
            if (type === 'heritage' && filters.heritage) visible = true;
            
            markerData.marker.setVisible(visible);
        });
    }
    
    document.addEventListener('DOMContentLoaded', function() {
        // Gestion des contrôles de la carte
        document.getElementById('zoomIn').addEventListener('click', function() {
            map.setZoom(map.getZoom() + 1);
        });
        
        document.getElementById('zoomOut').addEventListener('click', function() {
            map.setZoom(map.getZoom() - 1);
        });
        
        document.getElementById('resetView').addEventListener('click', function() {
            map.setCenter({ lat: 28.3949, lng: 84.1240 });
            map.setZoom(7);
        });
        
        document.getElementById('currentLocation').addEventListener('click', function() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    const pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    map.setCenter(pos);
                    map.setZoom(10);
                });
            } else {
                alert("La géolocalisation n'est pas supportée par votre navigateur.");
            }
        });
        
        // Fermer le panneau d'information
        document.getElementById('closeInfo').addEventListener('click', function() {
            document.getElementById('mapInfo').style.display = 'none';
            infoWindow.close();
        });
        
        // Gestion des filtres
        const filterCheckboxes = document.querySelectorAll('.filter-checkbox input');
        filterCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', filterMarkers);
        });
        
        // Gestion de la recherche
        document.getElementById('searchBtn').addEventListener('click', function() {
            const searchTerm = document.getElementById('locationSearch').value.toLowerCase();
            const foundLocation = Object.keys(locations).find(key => 
                locations[key].title.toLowerCase().includes(searchTerm)
            );
            
            if (foundLocation) {
                showLocationInfo(foundLocation);
                centerMap(locations[foundLocation].lat, locations[foundLocation].lng);
                map.setZoom(10);
            } else {
                alert("Lieu non trouvé. Essayez avec un autre terme.");
            }
        });
        
        // Recherche avec la touche Entrée
        document.getElementById('locationSearch').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                document.getElementById('searchBtn').click();
            }
        });
        
        // Gestion des boutons de localisation
        const locationItems = document.querySelectorAll('.location-item');
        locationItems.forEach(item => {
            item.addEventListener('click', function() {
                const locationId = this.getAttribute('data-location');
                const lat = parseFloat(this.getAttribute('data-lat'));
                const lng = parseFloat(this.getAttribute('data-lng'));
                
                showLocationInfo(locationId);
                centerMap(lat, lng);
                map.setZoom(10);
            });
        });
        
        // Simuler Google Maps si l'API n'est pas disponible
        setTimeout(() => {
            const mapElement = document.getElementById('nepalMap');
            if (!map && mapElement.querySelector('.map-loading').style.display !== 'none') {
                // Simuler une carte
                mapElement.innerHTML = `
                    <div style="width:100%; height:100%; background:linear-gradient(135deg, #4a90e2, #63b3ed); 
                                display:flex; flex-direction:column; align-items:center; justify-content:center; color:white;">
                        <i class="fas fa-map" style="font-size:4rem; margin-bottom:20px;"></i>
                        <h3 style="font-size:1.5rem; margin-bottom:10px;">Carte interactive du Népal</h3>
                        <p style="text-align:center; max-width:400px; margin-bottom:20px;">
                            Pour activer la carte Google Maps: obtenez une clé API sur https://cloud.google.com/maps-platform
                        </p>
                        <div style="display:flex; gap:10px; margin-top:20px; flex-wrap:wrap; justify-content:center;">
                            <button onclick="simulateMapClick('katmandou')" style="padding:10px 20px; background:white; color:#4a90e2; 
                                      border:none; border-radius:5px; cursor:pointer; font-weight:bold;">
                                Voir Katmandou
                            </button>
                            <button onclick="simulateMapClick('everest')" style="padding:10px 20px; background:white; color:#4a90e2; 
                                      border:none; border-radius:5px; cursor:pointer; font-weight:bold;">
                                Voir l'Everest
                            </button>
                            <button onclick="simulateMapClick('pokhara')" style="padding:10px 20px; background:white; color:#4a90e2; 
                                      border:none; border-radius:5px; cursor:pointer; font-weight:bold;">
                                Voir Pokhara
                            </button>
                        </div>
                    </div>
                `;
            }
        }, 500);
        
        // Animation des éléments d'information
        const infoSections = document.querySelectorAll('.geography-info, .trekking-info, .transport-info');
        infoSections.forEach((section, index) => {
            section.style.opacity = '0';
            section.style.transform = 'translateY(30px)';
            
            setTimeout(() => {
                section.style.transition = 'all 0.5s ease';
                section.style.opacity = '1';
                section.style.transform = 'translateY(0)';
            }, 500 + index * 200);
        });
    });
    
    // Fonction de simulation pour la carte
    window.simulateMapClick = function(locationId) {
        const location = locations[locationId];
        if (location) {
            showLocationInfo(locationId);
            
            // Mettre à jour les coordonnées affichées
            currentCenter = { lat: location.lat, lng: location.lng };
            currentZoom = 10;
            updateCoordinates();
            
            // Afficher l'information dans le panneau
            const content = `
                <div class="map-info-content">
                    <h3>${location.icon} ${location.title}</h3>
                    <p>${location.description}</p>
                    <div class="info-details">
                        <p><strong>Coordonnées:</strong> ${location.lat.toFixed(4)}°N, ${location.lng.toFixed(4)}°E</p>
                        <p><strong>Type:</strong> ${getTypeName(location.type)}</p>
                    </div>
                </div>
            `;
            
            document.querySelector('.info-content').innerHTML = content;
            document.getElementById('mapInfo').style.display = 'block';
            
            // Animation
            document.getElementById('mapInfo').style.animation = 'none';
            setTimeout(() => {
                document.getElementById('mapInfo').style.animation = 'slideInRight 0.5s ease';
            }, 10);
        }
    };
</script>

<?php require_once '../includes/footer.php'; ?>