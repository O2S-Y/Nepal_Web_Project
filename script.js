// Script principal pour le site web

document.addEventListener('DOMContentLoaded', function() {
    
    // 1. Gestion de la vidéo
    const video = document.getElementById('nepalVideo');
    const playPauseBtn = document.getElementById('playPauseBtn');
    const muteBtn = document.getElementById('muteBtn');
    const volumeSlider = document.getElementById('volumeSlider');
    
    if(video && playPauseBtn) {
        playPauseBtn.addEventListener('click', function() {
            if(video.paused) {
                video.play();
                this.innerHTML = '<i class="fas fa-pause"></i>';
            } else {
                video.pause();
                this.innerHTML = '<i class="fas fa-play"></i>';
            }
        });
        
        video.addEventListener('play', function() {
            playPauseBtn.innerHTML = '<i class="fas fa-pause"></i>';
        });
        
        video.addEventListener('pause', function() {
            playPauseBtn.innerHTML = '<i class="fas fa-play"></i>';
        });
    }
    
    if(muteBtn && video) {
        muteBtn.addEventListener('click', function() {
            if(video.muted) {
                video.muted = false;
                this.innerHTML = '<i class="fas fa-volume-up"></i>';
            } else {
                video.muted = true;
                this.innerHTML = '<i class="fas fa-volume-mute"></i>';
            }
        });
    }
    
    if(volumeSlider && video) {
        volumeSlider.addEventListener('input', function() {
            video.volume = this.value;
            if(video.volume === 0) {
                muteBtn.innerHTML = '<i class="fas fa-volume-mute"></i>';
            } else {
                muteBtn.innerHTML = '<i class="fas fa-volume-up"></i>';
            }
        });
    }
    
    // 2. Galerie interactive
    const galleryItems = document.querySelectorAll('.gallery-item');
    const locationDetail = document.getElementById('locationDetail');
    
    // Données des lieux
    const locationsData = {
        'everest': {
            title: 'Mont Everest',
            description: 'Le Mont Everest, culminant à 8 848 mètres d\'altitude, est le plus haut sommet du monde. Situé à la frontière entre le Népal et le Tibet, il attire des milliers d\'alpinistes chaque année. Le camp de base de l\'Everest est accessible via un trek de 12 jours depuis Lukla.',
            facts: [
                'Altitude: 8,848 mètres',
                'Première ascension: 29 mai 1953 par Edmund Hillary et Tenzing Norgay',
                'Meilleure période: Avril-mai et septembre-octobre',
                'Durée du trek: 12-14 jours'
            ],
            links: [
                {text: 'Guide de trekking', url: '#'},
                {text: 'Agences recommandées', url: '#'},
                {text: 'Préparation physique', url: '#'}
            ]
        },
        'katmandou': {
            title: 'Katmandou',
            description: 'Katmandou, la capitale du Népal, est une ville vibrante où se mêlent traditions ancestrales et modernité. La vallée de Katmandou compte 7 sites classés au patrimoine mondial de l\'UNESCO, dont les places Durbar de Katmandou, Patan et Bhaktapur.',
            facts: [
                'Population: 1.5 million d\'habitants',
                'Altitude: 1,400 mètres',
                'Sites UNESCO: 7 dans la vallée',
                'Climat: Tempéré subtropical'
            ],
            links: [
                {text: 'Circuits culturels', url: '#'},
                {text: 'Hôtels recommandés', url: '#'},
                {text: 'Festivals locaux', url: '#'}
            ]
        },
        'pokhara': {
            title: 'Pokhara',
            description: 'Pokhara, située au pied des Annapurnas, est la porte d\'entrée des treks dans la région des Annapurnas. La ville est célèbre pour son lac Phewa, ses vues spectaculaires sur les montagnes et ses activités de plein air.',
            facts: [
                'Lac principal: Phewa Tal (4.43 km²)',
                'Activités: Trekking, parapente, VTT',
                'Distance de Katmandou: 200 km',
                'Altitude: 822 à 1,740 mètres'
            ],
            links: [
                {text: 'Treks Annapurna', url: '#'},
                {text: 'Activités à Pokhara', url: '#'},
                {text: 'Transport depuis Katmandou', url: '#'}
            ]
        },
        'lumbini': {
            title: 'Lumbini',
            description: 'Lumbini est le lieu de naissance de Siddhartha Gautama, qui devint plus tard Bouddha. C\'est l\'un des sites les plus sacrés du bouddhisme, attirant des pèlerins du monde entier. Le site archéologique comprend le temple Maya Devi et de nombreux monastères.',
            facts: [
                'Fondé: 623 av. J.-C.',
                'Classé UNESCO: 1997',
                'Monastères: Plus de 25',
                'Pèlerins annuels: 1 million'
            ],
            links: [
                {text: 'Circuits bouddhistes', url: '#'},
                {text: 'Histoire du bouddhisme', url: '#'},
                {text: 'Monastères à visiter', url: '#'}
            ]
        }
    };
    
    galleryItems.forEach(item => {
        item.addEventListener('click', function() {
            const locationId = this.getAttribute('data-location');
            const data = locationsData[locationId];
            
            if(data && locationDetail) {
                const detailContent = locationDetail.querySelector('.detail-content');
                
                // Animation de sortie
                detailContent.style.opacity = '0';
                detailContent.style.transform = 'translateY(10px)';
                
                setTimeout(() => {
                    detailContent.innerHTML = `
                        <h4>${data.title}</h4>
                        <p>${data.description}</p>
                        
                        <div class="location-facts">
                            <h5><i class="fas fa-info-circle"></i> Informations clés</h5>
                            <ul>
                                ${data.facts.map(fact => `<li>${fact}</li>`).join('')}
                            </ul>
                        </div>
                        
                        <div class="detail-links">
                            <h5><i class="fas fa-external-link-alt"></i> Pour en savoir plus</h5>
                            <div>
                                ${data.links.map(link => 
                                    `<a href="${link.url}" target="_blank">
                                        <i class="fas fa-external-link-alt"></i> ${link.text}
                                    </a>`
                                ).join('')}
                            </div>
                        </div>
                    `;
                    
                    // Animation d'entrée
                    detailContent.style.opacity = '1';
                    detailContent.style.transform = 'translateY(0)';
                    detailContent.style.transition = 'all 0.5s ease';
                }, 300);
                
                // Animation sur l'élément cliqué
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = 'translateY(-10px) scale(1.02)';
                }, 200);
            }
        });
    });
    
    // 3. Gestion du formulaire d'inscription
    const showSubscribeFormBtn = document.getElementById('showSubscribeForm');
    const hideSubscribeFormBtn = document.getElementById('hideSubscribeForm');
    const subscribeForm = document.getElementById('subscribeForm');
    
    if(showSubscribeFormBtn && subscribeForm) {
        showSubscribeFormBtn.addEventListener('click', function() {
            subscribeForm.style.display = 'block';
            this.style.display = 'none';
            subscribeForm.scrollIntoView({behavior: 'smooth'});
        });
    }
    
    if(hideSubscribeFormBtn && subscribeForm) {
        hideSubscribeFormBtn.addEventListener('click', function() {
            subscribeForm.style.display = 'none';
            if(showSubscribeFormBtn) {
                showSubscribeFormBtn.style.display = 'inline-flex';
            }
        });
    }
    
    // 4. Validation des formulaires
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const emailInputs = this.querySelectorAll('input[type="email"]');
            emailInputs.forEach(input => {
                if(!validateEmail(input.value)) {
                    e.preventDefault();
                    input.style.borderColor = 'var(--error-color)';
                    input.style.boxShadow = '0 0 0 3px rgba(220, 53, 69, 0.1)';
                    
                    // Afficher un message d'erreur
                    let errorMsg = input.nextElementSibling;
                    if(!errorMsg || !errorMsg.classList.contains('error-message')) {
                        errorMsg = document.createElement('div');
                        errorMsg.className = 'error-message';
                        errorMsg.style.color = 'var(--error-color)';
                        errorMsg.style.fontSize = '0.9rem';
                        errorMsg.style.marginTop = '5px';
                        input.parentNode.insertBefore(errorMsg, input.nextSibling);
                    }
                    errorMsg.textContent = 'Veuillez entrer une adresse email valide.';
                }
            });
        });
    });
    
    // 5. Animation au défilement
    let lastScrollTop = 0;
    const mainMenu = document.querySelector('.main-menu');
    
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        
        // Effet de parallaxe sur la bannière
        const banner = document.querySelector('.banner');
        if(banner) {
            const rate = scrolled * -0.3;
            banner.style.backgroundPosition = `center ${rate}px`;
        }
        
        // Masquer/afficher le menu
        if(mainMenu) {
            const currentScrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            if(currentScrollTop > lastScrollTop && currentScrollTop > 100) {
                // Défilement vers le bas - cacher
                mainMenu.style.transform = 'translateY(-100%)';
                mainMenu.style.transition = 'transform 0.3s ease';
            } else {
                // Défilement vers le haut - afficher
                mainMenu.style.transform = 'translateY(0)';
            }
            
            lastScrollTop = currentScrollTop <= 0 ? 0 : currentScrollTop;
        }
        
        // Animation des éléments au scroll
        const animatedElements = document.querySelectorAll('.gallery-item, .stat-item, .news-item');
        animatedElements.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;
            
            if(elementTop < windowHeight - 100) {
                element.style.opacity = '1';
                element.style.transform = 'translateY(0)';
            }
        });
    });
    
    // 6. Simulation de météo
    function updateWeather() {
        const weatherTemp = document.querySelector('.weather-temp');
        const weatherDesc = document.querySelector('.weather-desc');
        const weatherIcon = document.querySelector('.weather-icon i');
        
        if(weatherTemp && weatherDesc && weatherIcon) {
            // Simuler différentes conditions météo
            const conditions = [
                {temp: 22, desc: 'Ensoleillé', icon: 'fa-sun', color: '#FFD700'},
                {temp: 18, desc: 'Nuageux', icon: 'fa-cloud', color: '#A9A9A9'},
                {temp: 15, desc: 'Pluvieux', icon: 'fa-cloud-rain', color: '#4682B4'},
                {temp: 20, desc: 'Partiellement nuageux', icon: 'fa-cloud-sun', color: '#FFA500'}
            ];
            
            const randomCondition = conditions[Math.floor(Math.random() * conditions.length)];
            
            // Animation du changement
            weatherTemp.style.transform = 'scale(0.8)';
            weatherDesc.style.opacity = '0.5';
            
            setTimeout(() => {
                weatherTemp.textContent = `${randomCondition.temp}°C`;
                weatherDesc.textContent = randomCondition.desc;
                weatherIcon.className = `fas ${randomCondition.icon}`;
                weatherIcon.style.color = randomCondition.color;
                
                weatherTemp.style.transform = 'scale(1)';
                weatherDesc.style.opacity = '1';
            }, 300);
        }
    }
    
    // Mettre à jour la météo toutes les 30 secondes (simulation)
    setInterval(updateWeather, 30000);
    
    // 7. Compteur de visiteurs (simulé)
    function updateVisitorCount() {
        const statCards = document.querySelectorAll('.stat-card .number');
        statCards.forEach(card => {
            if(card.textContent.includes('Visiteurs')) {
                const currentCount = parseInt(card.textContent.replace(/\D/g, ''));
                const newCount = currentCount + Math.floor(Math.random() * 10);
                card.textContent = `${newCount} Visiteurs`;
                
                // Animation
                card.style.transform = 'scale(1.2)';
                setTimeout(() => {
                    card.style.transform = 'scale(1)';
                }, 300);
            }
        });
    }
    
    // Mettre à jour le compteur toutes les 20 secondes
    setInterval(updateVisitorCount, 20000);
    
    // 8. Fonction de validation d'email
    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }
    
    // 9. Initialiser les animations
    function initAnimations() {
        const animatedElements = document.querySelectorAll('.gallery-item, .stat-item, .news-item');
        animatedElements.forEach(element => {
            element.style.opacity = '0';
            element.style.transform = 'translateY(20px)';
            element.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        });
        
        // Déclencher l'animation après un délai
        setTimeout(() => {
            animatedElements.forEach((element, index) => {
                setTimeout(() => {
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }, index * 100);
            });
        }, 500);
    }
    
    // Initialiser les animations au chargement
    initAnimations();
    
    // 10. Gestion des onglets (pour les pages avec onglets)
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');
    
    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            const tabId = this.getAttribute('data-tab');
            
            // Retirer la classe active de tous les boutons
            tabButtons.forEach(btn => btn.classList.remove('active'));
            // Ajouter la classe active au bouton cliqué
            this.classList.add('active');
            
            // Cacher tous les contenus d'onglets
            tabContents.forEach(content => {
                content.classList.remove('active');
                content.style.opacity = '0';
                content.style.transform = 'translateY(10px)';
            });
            
            // Afficher le contenu de l'onglet sélectionné
            const activeTab = document.getElementById(tabId);
            if(activeTab) {
                setTimeout(() => {
                    activeTab.classList.add('active');
                    activeTab.style.opacity = '1';
                    activeTab.style.transform = 'translateY(0)';
                }, 50);
            }
        });
    });
    
    // 11. Bouton de retour en haut
    const scrollToTopBtn = document.createElement('button');
    scrollToTopBtn.innerHTML = '<i class="fas fa-chevron-up"></i>';
    scrollToTopBtn.className = 'scroll-to-top';
    scrollToTopBtn.style.cssText = `
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 50px;
        height: 50px;
        background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
        color: white;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        display: none;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        z-index: 1000;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        transition: all 0.3s ease;
    `;
    
    document.body.appendChild(scrollToTopBtn);
    
    scrollToTopBtn.addEventListener('mouseenter', function() {
        this.style.transform = 'scale(1.1)';
    });
    
    scrollToTopBtn.addEventListener('mouseleave', function() {
        this.style.transform = 'scale(1)';
    });
    
    scrollToTopBtn.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    window.addEventListener('scroll', function() {
        if(window.pageYOffset > 300) {
            scrollToTopBtn.style.display = 'flex';
        } else {
            scrollToTopBtn.style.display = 'none';
        }
    });
    
    // 12. Mode sombre/clair (optionnel)
    const themeToggle = document.createElement('button');
    themeToggle.innerHTML = '<i class="fas fa-moon"></i>';
    themeToggle.className = 'theme-toggle';
    themeToggle.style.cssText = `
        position: fixed;
        bottom: 90px;
        right: 30px;
        width: 50px;
        height: 50px;
        background: var(--dark-color);
        color: white;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        z-index: 1000;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        transition: all 0.3s ease;
    `;
    
    document.body.appendChild(themeToggle);
    
    themeToggle.addEventListener('click', function() {
        document.body.classList.toggle('dark-mode');
        
        if(document.body.classList.contains('dark-mode')) {
            this.innerHTML = '<i class="fas fa-sun"></i>';
            this.style.background = 'var(--accent-color)';
            this.style.color = 'var(--dark-color)';
            
            // Sauvegarder la préférence
            localStorage.setItem('theme', 'dark');
        } else {
            this.innerHTML = '<i class="fas fa-moon"></i>';
            this.style.background = 'var(--dark-color)';
            this.style.color = 'white';
            
            // Sauvegarder la préférence
            localStorage.setItem('theme', 'light');
        }
    });
    
    // Charger la préférence de thème
    const savedTheme = localStorage.getItem('theme');
    if(savedTheme === 'dark') {
        document.body.classList.add('dark-mode');
        themeToggle.innerHTML = '<i class="fas fa-sun"></i>';
        themeToggle.style.background = 'var(--accent-color)';
        themeToggle.style.color = 'var(--dark-color)';
    }
    
    // 13. Préchargement des images
    function preloadImages() {
        const images = [
            'https://images.unsplash.com/photo-1548013146-72479768bada?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
            'https://images.unsplash.com/photo-1529333164857-97f5e6e6b342?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
            'https://images.unsplash.com/photo-1581798459210-a1d1d7d18434?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
            'https://images.unsplash.com/photo-1557050544-4e5e9715e7f2?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80'
        ];
        
        images.forEach(src => {
            const img = new Image();
            img.src = src;
        });
    }
    
    // Précharger les images
    preloadImages();
    
    // 14. Gestion des erreurs de chargement d'images
    document.querySelectorAll('img').forEach(img => {
        img.addEventListener('error', function() {
            this.src = 'assets/images/placeholder.jpg';
            this.alt = 'Image non disponible';
        });
    });
    
    // 15. Notification de cookies
    if(!localStorage.getItem('cookiesAccepted')) {
        setTimeout(() => {
            const cookieNotice = document.createElement('div');
            cookieNotice.className = 'cookie-notice';
            cookieNotice.style.cssText = `
                position: fixed;
                bottom: 20px;
                left: 20px;
                right: 20px;
                background: var(--dark-color);
                color: white;
                padding: 20px;
                border-radius: 10px;
                z-index: 1001;
                box-shadow: 0 5px 20px rgba(0,0,0,0.3);
                display: flex;
                justify-content: space-between;
                align-items: center;
                animation: slideInUp 0.5s ease;
            `;
            
            cookieNotice.innerHTML = `
                <div>
                    <p style="margin: 0; font-size: 0.9rem;">
                        <i class="fas fa-cookie-bite" style="margin-right: 10px;"></i>
                        Ce site utilise des cookies pour améliorer votre expérience. En continuant, vous acceptez notre 
                        <a href="#" style="color: var(--accent-color);">politique de cookies</a>.
                    </p>
                </div>
                <button id="acceptCookies" style="
                    background: var(--accent-color);
                    color: var(--dark-color);
                    border: none;
                    padding: 8px 20px;
                    border-radius: 5px;
                    cursor: pointer;
                    font-weight: 600;
                ">
                    Accepter
                </button>
            `;
            
            document.body.appendChild(cookieNotice);
            
            document.getElementById('acceptCookies').addEventListener('click', function() {
                localStorage.setItem('cookiesAccepted', 'true');
                cookieNotice.style.animation = 'slideOutDown 0.5s ease';
                setTimeout(() => {
                    cookieNotice.remove();
                }, 500);
            });
        }, 2000);
    }
});