<?php
$page_title = "Qui sommes-nous";
require_once '../includes/header.php';
?>

<main class="main-content">
    <div class="page-header">
        <h1 class="page-title"><i class="fas fa-users"></i> Qui sommes-nous ?</h1>
        <p class="page-description">Découvrez l'équipe derrière ce projet et notre passion pour le Népal</p>
    </div>
    
    <div class="team-container">
        <div class="team-intro">
            <p>Nous sommes un binôme d'étudiants passionnés par le web, le multimédia et les cultures du monde. Ce projet sur le Népal a été réalisé dans le cadre du module "Techniques Web & Multimédia" de notre formation.</p>
            <p>Notre objectif est de présenter le Népal sous tous ses aspects : culture, tourisme, histoire et actualités, à travers un site web dynamique et moderne.</p>
        </div>
        
        <div class="team-members">
            <!-- Membre 1 -->
            <div class="team-member">
                <div class="member-photo">
                    <img src="../assets/images/yinssi.jpg" alt="Étudiant 1">
                </div>
                <div class="member-info">
                    <h3>Yinssi Oussama</h3>
                    <p class="member-role">Développeur Front-end & Design</p>
                    <div class="member-details">
                        <p><strong>CNE:</strong> SXXXXXXXXX</p>
                        <p><strong>Email:</strong> contact@example.com</p>
                        <p><strong>Tâches:</strong> HTML5, CSS3, JavaScript, Design UI/UX</p>
                    </div>
                    <div class="member-skills">
                        <span class="skill-tag">HTML5</span>
                        <span class="skill-tag">CSS3</span>
                        <span class="skill-tag">JavaScript</span>
                        <span class="skill-tag">UI/UX</span>
                    </div>
                </div>
            </div>
            
            <!-- Membre 2 -->
            <div class="team-member">
                <div class="member-photo">
                    <img src="../assets/images/saad.jpg" alt="Étudiant 2">
                </div>
                <div class="member-info">
                    <h3>Saad Machkour</h3>
                    <p class="member-role">Développeur Back-end & Base de données</p>
                    <div class="member-details">
                        <p><strong>CNE:</strong> DXXXXXXXXX</p>
                        <p><strong>Email:</strong> contact@example.com</p>
                        <p><strong>Tâches:</strong> PHP, MySQL,Api, Newsletter</p>
                    </div>
                    <div class="member-skills">
                        <span class="skill-tag">PHP</span>
                        <span class="skill-tag">MySQL</span>
                        <span class="skill-tag">Newsletter</span>
                        <span class="skill-tag">API</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="project-info">
            <h3><i class="fas fa-info-circle"></i> À propos du projet</h3>
            <div class="project-details">
                <div class="project-detail">
                    <h4><i class="fas fa-book"></i> Module</h4>
                    <p>Techniques Web & Multimédia</p>
                </div>
                <div class="project-detail">
                    <h4><i class="fas fa-calendar"></i> Année</h4>
                    <p>2025 - 2026</p>
                </div>
                <div class="project-detail">
                    <h4><i class="fas fa-university"></i> Établissement</h4>
                    <p>Faculté des Sciences et Techniques de Fès</p>
                </div>
                <div class="project-detail">
                    <h4><i class="fas fa-globe"></i> Technologies</h4>
                    <p>HTML5, CSS3, JavaScript, PHP, MySQL</p>
                </div>
            </div>
        </div>
    </div>
</main>

<aside class="right-sidebar">
    <div class="contact-sidebar">
        <h3 class="sidebar-title"><i class="fas fa-envelope"></i> Nous contacter</h3>
        <p>Vous avez des questions sur notre projet ou souhaitez en savoir plus ?</p>
        
        <div class="contact-info">
            <div class="contact-item">
                <i class="fas fa-envelope"></i>
                <div>
                    <strong>Email projet</strong>
                    <p>projet-nepal@usmba.ac.ma</p>
                </div>
            </div>
            <div class="contact-item">
                <i class="fas fa-calendar"></i>
                <div>
                    <strong>Date de rendu</strong>
                    <p>9 Décembre 2025</p>
                </div>
            </div>
            <div class="contact-item">
                <i class="fas fa-graduation-cap"></i>
                <div>
                    <strong>Encadrant</strong>
                    <p>Prof. ouzzarf mohamed</p>
                </div>
            </div>
        </div>
        
        <a href="contact.php" class="btn btn-primary" style="width: 100%; margin-top: 20px;">
            <i class="fas fa-paper-plane"></i> Envoyer un message
        </a>
    </div>
    
    <div class="project-timeline">
        <h3 class="sidebar-title"><i class="fas fa-tasks"></i> Étapes du projet</h3>
        <div class="timeline">
            <div class="timeline-item completed">
                <div class="timeline-date">Oct 2025</div>
                <div class="timeline-content">
                    <h4>Conception</h4>
                    <p>Maquettes et structure</p>
                </div>
            </div>
            <div class="timeline-item completed">
                <div class="timeline-date">Déc 2025</div>
                <div class="timeline-content">
                    <h4>Partie statique</h4>
                    <p>HTML/CSS/JS</p>
                </div>
            </div>
            <div class="timeline-item current">
                <div class="timeline-date">Déc 2025</div>
                <div class="timeline-content">
                    <h4>Partie dynamique</h4>
                    <p>PHP/MySQL</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-date">Déc 2025</div>
                <div class="timeline-content">
                    <h4>Finalisation</h4>
                    <p>Tests et déploiement</p>
                </div>
            </div>
        </div>
    </div>
</aside>

<style>
    .team-container {
        padding: 20px;
    }
    
    .team-intro {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        padding: 25px;
        border-radius: 10px;
        margin-bottom: 30px;
        border-left: 4px solid var(--secondary-color);
    }
    
    .team-intro p {
        margin-bottom: 15px;
        line-height: 1.8;
    }
    
    .team-intro p:last-child {
        margin-bottom: 0;
    }
    
    .team-members {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        margin-bottom: 40px;
    }
    
    .team-member {
        background-color: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
    }
    
    .team-member:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    }
    
    .member-photo {
        height: 250px;
        overflow: hidden;
    }
    
    .member-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .team-member:hover .member-photo img {
        transform: scale(1.1);
    }
    
    .member-info {
        padding: 25px;
        flex: 1;
    }
    
    .member-info h3 {
        color: var(--secondary-color);
        margin-bottom: 5px;
        font-size: 1.5rem;
    }
    
    .member-role {
        color: var(--primary-color);
        font-weight: 500;
        margin-bottom: 15px;
        font-size: 1.1rem;
    }
    
    .member-details {
        margin-bottom: 20px;
    }
    
    .member-details p {
        margin-bottom: 8px;
        color: #666;
    }
    
    .member-skills {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }
    
    .skill-tag {
        background-color: #e9ecef;
        color: var(--dark-color);
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
    }
    
    .project-info {
        background-color: white;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        margin-top: 30px;
    }
    
    .project-info h3 {
        color: var(--secondary-color);
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 1.5rem;
    }
    
    .project-details {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 25px;
    }
    
    .project-detail {
        text-align: center;
        padding: 20px;
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        border-radius: 8px;
        transition: all 0.3s ease;
    }
    
    .project-detail:hover {
        transform: translateY(-5px);
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
    }
    
    .project-detail:hover h4 {
        color: white;
    }
    
    .project-detail h4 {
        color: var(--secondary-color);
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        font-size: 1rem;
    }
    
    .project-detail p {
        font-size: 0.95rem;
    }
    
    /* Sidebar spécifique */
    .contact-sidebar {
        background-color: white;
        border-radius: 10px;
        padding: 25px;
        margin-bottom: 25px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .contact-info {
        margin: 20px 0;
    }
    
    .contact-item {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 20px;
        padding-bottom: 20px;
        border-bottom: 1px solid #eee;
    }
    
    .contact-item:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }
    
    .contact-item i {
        font-size: 1.5rem;
        color: var(--primary-color);
        width: 40px;
        text-align: center;
    }
    
    .contact-item strong {
        display: block;
        color: var(--dark-color);
        margin-bottom: 5px;
    }
    
    .contact-item p {
        color: #666;
        font-size: 0.95rem;
    }
    
    .project-timeline {
        background-color: white;
        border-radius: 10px;
        padding: 25px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .timeline {
        margin-top: 20px;
        position: relative;
    }
    
    .timeline::before {
        content: '';
        position: absolute;
        left: 20px;
        top: 0;
        bottom: 0;
        width: 2px;
        background-color: #e9ecef;
    }
    
    .timeline-item {
        position: relative;
        margin-bottom: 30px;
        padding-left: 50px;
    }
    
    .timeline-item:last-child {
        margin-bottom: 0;
    }
    
    .timeline-item::before {
        content: '';
        position: absolute;
        left: 16px;
        top: 5px;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background-color: #e9ecef;
        z-index: 1;
    }
    
    .timeline-item.completed::before {
        background-color: var(--secondary-color);
    }
    
    .timeline-item.current::before {
        background-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(220, 20, 60, 0.2);
    }
    
    .timeline-date {
        font-weight: 600;
        color: var(--dark-color);
        margin-bottom: 5px;
        font-size: 0.9rem;
    }
    
    .timeline-content h4 {
        color: var(--secondary-color);
        margin-bottom: 5px;
        font-size: 1.1rem;
    }
    
    .timeline-content p {
        color: #666;
        font-size: 0.9rem;
    }
</style>

<?php require_once '../includes/footer.php'; ?>