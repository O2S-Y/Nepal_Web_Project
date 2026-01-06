<?php
session_start();
require_once '../config.php';
require_once '../includes/functions.php';

// Vérifier l'authentification
if(!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit();
}

// Récupérer les statistiques
try {
    // Nombre de news
    $stmt = $conn->query("SELECT COUNT(*) as count FROM news");
    $newsCount = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
    
    // Nombre d'abonnés
    $stmt = $conn->query("SELECT COUNT(*) as count FROM internaute WHERE actif = 1");
    $subscriberCount = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
    
    // Nombre de messages de contact
    $stmt = $conn->query("SELECT COUNT(*) as count FROM contact");
    $contactCount = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
    
    // Récupérer les dernières news
    $stmt = $conn->query("SELECT * FROM news ORDER BY date_publication DESC LIMIT 5");
    $recentNews = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Récupérer les derniers abonnés
    $stmt = $conn->query("SELECT * FROM internaute ORDER BY date_inscription DESC LIMIT 5");
    $recentSubscribers = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch(PDOException $e) {
    $error = "Erreur: " . $e->getMessage();
}

// Traitement de la déconnexion
if(isset($_GET['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - <?php echo SITE_NAME; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #DC143C;
            --secondary-color: #003893;
            --accent-color: #FFD700;
            --dark-color: #2c3e50;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f7fa;
            color: #333;
        }
        
        .admin-header {
            background: linear-gradient(to right, var(--dark-color), #1a252f);
            color: white;
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        .admin-header h1 {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .admin-info {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .admin-welcome {
            font-weight: 500;
        }
        
        .btn-logout {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-logout:hover {
            background-color: #c1121f;
            transform: translateY(-2px);
        }
        
        .admin-container {
            max-width: 1400px;
            margin: 30px auto;
            padding: 0 20px;
        }
        
        .admin-nav {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }
        
        .nav-menu {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            list-style: none;
        }
        
        .nav-item a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 20px;
            background-color: #f8f9fa;
            border-radius: 6px;
            text-decoration: none;
            color: var(--dark-color);
            font-weight: 500;
            transition: all 0.3s ease;
            border: 1px solid transparent;
        }
        
        .nav-item a:hover {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
            transform: translateY(-3px);
        }
        
        .nav-item.active a {
            background-color: var(--secondary-color);
            color: white;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }
        
        .stat-card {
            background-color: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            border-top: 4px solid;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }
        
        .stat-card.news {
            border-top-color: var(--primary-color);
        }
        
        .stat-card.subscribers {
            border-top-color: var(--secondary-color);
        }
        
        .stat-card.contacts {
            border-top-color: var(--accent-color);
        }
        
        .stat-card.visits {
            border-top-color: #28a745;
        }
        
        .stat-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }
        
        .stat-card.news .stat-icon {
            color: var(--primary-color);
        }
        
        .stat-card.subscribers .stat-icon {
            color: var(--secondary-color);
        }
        
        .stat-card.contacts .stat-icon {
            color: var(--accent-color);
        }
        
        .stat-card.visits .stat-icon {
            color: #28a745;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .stat-label {
            color: #666;
            font-size: 1rem;
        }
        
        .admin-sections {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(500px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }
        
        @media (max-width: 1100px) {
            .admin-sections {
                grid-template-columns: 1fr;
            }
        }
        
        .section-card {
            background-color: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }
        
        .section-title {
            font-family: 'Montserrat', sans-serif;
            color: var(--dark-color);
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #eee;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .section-title h3 {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .btn-add {
            background-color: var(--secondary-color);
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 6px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }
        
        .btn-add:hover {
            background-color: var(--primary-color);
        }
        
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        
        .data-table th {
            text-align: left;
            padding: 12px 15px;
            background-color: #f8f9fa;
            color: var(--dark-color);
            font-weight: 600;
            border-bottom: 2px solid #eee;
        }
        
        .data-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
        }
        
        .data-table tr:hover {
            background-color: #f8f9fa;
        }
        
        .actions {
            display: flex;
            gap: 10px;
        }
        
        .btn-action {
            padding: 6px 12px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: all 0.3s ease;
        }
        
        .btn-edit {
            background-color: #17a2b8;
            color: white;
        }
        
        .btn-delete {
            background-color: #dc3545;
            color: white;
        }
        
        .btn-view {
            background-color: #28a745;
            color: white;
        }
        
        .btn-action:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }
        
        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #666;
        }
        
        .empty-state i {
            font-size: 3rem;
            margin-bottom: 15px;
            color: #ddd;
        }
        
        .admin-footer {
            text-align: center;
            padding: 30px 0;
            color: #666;
            border-top: 1px solid #eee;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <header class="admin-header">
        <h1><i class="fas fa-cog"></i> Tableau de bord Admin</h1>
        <div class="admin-info">
            <div class="admin-welcome">
                Bienvenue, <strong><?php echo htmlspecialchars($_SESSION['admin_username']); ?></strong>
            </div>
            <a href="?logout=true" class="btn-logout">
                <i class="fas fa-sign-out-alt"></i> Déconnexion
            </a>
        </div>
    </header>
    
    <div class="admin-container">
        <nav class="admin-nav">
            <ul class="nav-menu">
                <li class="nav-item active"><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Tableau de bord</a></li>
                <li class="nav-item"><a href="news_crud.php"><i class="fas fa-newspaper"></i> Gérer les news</a></li>
                <li class="nav-item"><a href="subscribers.php"><i class="fas fa-users"></i> Abonnés newsletter</a></li>
                <li class="nav-item"><a href="contacts.php"><i class="fas fa-envelope"></i> Messages de contact</a></li>
                <li class="nav-item"><a href="../index.php" target="_blank"><i class="fas fa-external-link-alt"></i> Voir le site</a></li>
            </ul>
        </nav>
        
        <!-- Statistiques -->
        <div class="stats-grid">
            <div class="stat-card news">
                <div class="stat-icon">
                    <i class="fas fa-newspaper"></i>
                </div>
                <div class="stat-number"><?php echo $newsCount; ?></div>
                <div class="stat-label">Actualités publiées</div>
            </div>
            
            <div class="stat-card subscribers">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-number"><?php echo $subscriberCount; ?></div>
                <div class="stat-label">Abonnés newsletter</div>
            </div>
            
            <div class="stat-card contacts">
                <div class="stat-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="stat-number"><?php echo $contactCount; ?></div>
                <div class="stat-label">Messages reçus</div>
            </div>
            
            <div class="stat-card visits">
                <div class="stat-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="stat-number">1,247</div>
                <div class="stat-label">Visites ce mois</div>
            </div>
        </div>
        
        <!-- Sections principales -->
        <div class="admin-sections">
            <!-- Dernières actualités -->
            <div class="section-card">
                <div class="section-title">
                    <h3><i class="fas fa-newspaper"></i> Dernières actualités</h3>
                    <a href="news_crud.php?action=add" class="btn-add">
                        <i class="fas fa-plus"></i> Ajouter
                    </a>
                </div>
                
                <?php if(count($recentNews) > 0): ?>
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($recentNews as $news): ?>
                                <tr>
                                    <td><?php echo shortenText($news['titre'], 40); ?></td>
                                    <td><?php echo formatDate($news['date_publication'], 'd/m/Y'); ?></td>
                                    <td>
                                        <div class="actions">
                                            <a href="../news_details.php?id=<?php echo $news['news_id']; ?>" target="_blank" class="btn-action btn-view" title="Voir">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="news_crud.php?action=edit&id=<?php echo $news['news_id']; ?>" class="btn-action btn-edit" title="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="news_crud.php?action=delete&id=<?php echo $news['news_id']; ?>" 
                                               class="btn-action btn-delete" 
                                               title="Supprimer"
                                               onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette actualité ?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="empty-state">
                        <i class="fas fa-newspaper"></i>
                        <p>Aucune actualité pour le moment</p>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Derniers abonnés -->
            <div class="section-card">
                <div class="section-title">
                    <h3><i class="fas fa-users"></i> Derniers abonnés</h3>
                </div>
                
                <?php if(count($recentSubscribers) > 0): ?>
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($recentSubscribers as $subscriber): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($subscriber['prenom'] . ' ' . $subscriber['nom']); ?></td>
                                    <td><?php echo htmlspecialchars($subscriber['email']); ?></td>
                                    <td><?php echo formatDate($subscriber['date_inscription'], 'd/m/Y'); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="empty-state">
                        <i class="fas fa-users"></i>
                        <p>Aucun abonné pour le moment</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- Actions rapides -->
        <div class="section-card">
            <div class="section-title">
                <h3><i class="fas fa-bolt"></i> Actions rapides</h3>
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
                <a href="news_crud.php?action=add" class="btn-action btn-edit" style="text-decoration: none; text-align: center; padding: 20px;">
                    <i class="fas fa-plus-circle" style="font-size: 2rem; margin-bottom: 10px;"></i>
                    <div>Ajouter une actualité</div>
                </a>
                
                <a href="subscribers.php" class="btn-action btn-view" style="text-decoration: none; text-align: center; padding: 20px;">
                    <i class="fas fa-envelope" style="font-size: 2rem; margin-bottom: 10px;"></i>
                    <div>Envoyer newsletter</div>
                </a>
                
                <a href="contacts.php" class="btn-action" style="text-decoration: none; text-align: center; padding: 20px; background-color: #6c757d; color: white;">
                    <i class="fas fa-comments" style="font-size: 2rem; margin-bottom: 10px;"></i>
                    <div>Voir messages</div>
                </a>
                
                <a href="../index.php" target="_blank" class="btn-action" style="text-decoration: none; text-align: center; padding: 20px; background-color: var(--primary-color); color: white;">
                    <i class="fas fa-external-link-alt" style="font-size: 2rem; margin-bottom: 10px;"></i>
                    <div>Voir le site</div>
                </a>
            </div>
        </div>
    </div>
    
    <footer class="admin-footer">
        <p>© <?php echo date('Y'); ?> - <?php echo SITE_NAME; ?> - Interface d'administration</p>
        <p style="font-size: 0.9rem; margin-top: 5px;">Dernière connexion: Aujourd'hui à <?php echo date('H:i'); ?></p>
    </footer>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animation des cartes de statistiques
            const statCards = document.querySelectorAll('.stat-card');
            statCards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    card.style.transition = 'all 0.5s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 100);
            });
            
            // Confirmation avant suppression
            const deleteButtons = document.querySelectorAll('.btn-delete');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    if(!confirm('Êtes-vous sûr de vouloir supprimer cet élément ? Cette action est irréversible.')) {
                        e.preventDefault();
                    }
                });
            });
            
            // Mise à jour en temps réel des statistiques (simulation)
            setInterval(() => {
                const visitStat = document.querySelector('.stat-card.visits .stat-number');
                if(visitStat) {
                    let currentVisits = parseInt(visitStat.textContent.replace(/,/g, ''));
                    currentVisits += Math.floor(Math.random() * 3);
                    visitStat.textContent = currentVisits.toLocaleString();
                    
                    // Animation
                    visitStat.style.transform = 'scale(1.2)';
                    setTimeout(() => {
                        visitStat.style.transform = 'scale(1)';
                    }, 300);
                }
            }, 30000); // Toutes les 30 secondes
        });
    </script>
</body>
</html>