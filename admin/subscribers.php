<?php
session_start();
require_once '../config.php';
require_once '../includes/functions.php';

// Vérifier l'authentification
if(!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit();
}

// Variables
$action = isset($_GET['action']) ? $_GET['action'] : 'list';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$message = '';
$error = '';

// Traitement des actions
switch($action) {
    case 'delete':
        // Supprimer un abonné
        if($id > 0) {
            try {
                $stmt = $conn->prepare("DELETE FROM internaute WHERE id = :id");
                $stmt->bindParam(':id', $id);
                
                if($stmt->execute()) {
                    $message = "Abonné supprimé avec succès !";
                }
            } catch(PDOException $e) {
                $error = "Erreur: " . $e->getMessage();
            }
        }
        $action = 'list';
        break;
        
    case 'toggle':
        // Activer/Désactiver un abonné
        if($id > 0) {
            try {
                $stmt = $conn->prepare("UPDATE internaute SET actif = NOT actif WHERE id = :id");
                $stmt->bindParam(':id', $id);
                
                if($stmt->execute()) {
                    $message = "Statut de l'abonné modifié avec succès !";
                }
            } catch(PDOException $e) {
                $error = "Erreur: " . $e->getMessage();
            }
        }
        $action = 'list';
        break;
        
    case 'list':
    default:
        // Lister tous les abonnés
        try {
            // Recherche
            $search = isset($_GET['search']) ? trim($_GET['search']) : '';
            
            // Pagination
            $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
            $per_page = 15;
            $offset = ($page - 1) * $per_page;
            
            // Compter le total
            if($search) {
                $stmt = $conn->prepare("SELECT COUNT(*) as total FROM internaute WHERE nom LIKE :search OR prenom LIKE :search OR email LIKE :search");
                $stmt->bindValue(':search', '%' . $search . '%');
            } else {
                $stmt = $conn->query("SELECT COUNT(*) as total FROM internaute");
            }
            $stmt->execute();
            $total_records = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
            $total_pages = ceil($total_records / $per_page);
            
            // Récupérer les abonnés
            if($search) {
                $stmt = $conn->prepare("SELECT * FROM internaute WHERE nom LIKE :search OR prenom LIKE :search OR email LIKE :search ORDER BY date_inscription DESC LIMIT :limit OFFSET :offset");
                $stmt->bindValue(':search', '%' . $search . '%');
            } else {
                $stmt = $conn->prepare("SELECT * FROM internaute ORDER BY date_inscription DESC LIMIT :limit OFFSET :offset");
            }
            $stmt->bindValue(':limit', $per_page, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            $subscribers = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Statistiques
            $stats = $conn->query("SELECT 
                COUNT(*) as total,
                SUM(CASE WHEN actif = 1 THEN 1 ELSE 0 END) as actifs,
                SUM(CASE WHEN actif = 0 THEN 1 ELSE 0 END) as inactifs
                FROM internaute")->fetch(PDO::FETCH_ASSOC);
            
        } catch(PDOException $e) {
            $error = "Erreur: " . $e->getMessage();
        }
        break;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des abonnés - <?php echo SITE_NAME; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #DC143C;
            --secondary-color: #003893;
            --accent-color: #FFD700;
            --dark-color: #2c3e50;
            --success-color: #28a745;
            --warning-color: #ffc107;
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
        }
        
        .admin-header h1 {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .admin-nav {
            display: flex;
            gap: 15px;
        }
        
        .nav-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background-color: var(--primary-color);
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .nav-btn:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
        }
        
        .nav-btn.secondary {
            background-color: #6c757d;
        }
        
        .admin-container {
            max-width: 1400px;
            margin: 30px auto;
            padding: 0 20px;
        }
        
        .page-title {
            color: var(--secondary-color);
            margin-bottom: 30px;
            font-family: 'Montserrat', sans-serif;
            font-size: 2rem;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .alert {
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 25px;
            border-left: 4px solid;
        }
        
        .alert-success {
            background-color: #d4edda;
            border-color: #28a745;
            color: #155724;
        }
        
        .alert-error {
            background-color: #f8d7da;
            border-color: #dc3545;
            color: #721c24;
        }
        
        /* Stats cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            display: flex;
            align-items: center;
            gap: 20px;
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        
        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }
        
        .stat-icon.total { background: linear-gradient(135deg, var(--secondary-color), var(--primary-color)); }
        .stat-icon.active { background: linear-gradient(135deg, #28a745, #20c997); }
        .stat-icon.inactive { background: linear-gradient(135deg, #ffc107, #fd7e14); }
        
        .stat-info h3 {
            font-size: 2rem;
            color: var(--dark-color);
        }
        
        .stat-info p {
            color: #666;
            font-size: 0.9rem;
        }
        
        /* Search */
        .search-box {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        
        .search-box input {
            flex: 1;
            padding: 12px 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
        }
        
        .search-box input:focus {
            outline: none;
            border-color: var(--primary-color);
        }
        
        .search-box button {
            padding: 12px 25px;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .search-box button:hover {
            background: var(--secondary-color);
        }
        
        /* Table */
        .table-container {
            background-color: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            overflow-x: auto;
        }
        
        .data-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .data-table th {
            text-align: left;
            padding: 15px;
            background-color: #f8f9fa;
            color: var(--dark-color);
            font-weight: 600;
            border-bottom: 2px solid #eee;
        }
        
        .data-table td {
            padding: 15px;
            border-bottom: 1px solid #eee;
            color: #666;
        }
        
        .data-table tr:hover {
            background-color: #f8f9fa;
        }
        
        .status-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        
        .status-badge.active {
            background-color: #d4edda;
            color: #155724;
        }
        
        .status-badge.inactive {
            background-color: #f8d7da;
            color: #721c24;
        }
        
        .actions {
            display: flex;
            gap: 10px;
        }
        
        .action-btn {
            width: 40px;
            height: 40px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .action-btn.toggle {
            background-color: #17a2b8;
            color: white;
        }
        
        .action-btn.delete {
            background-color: #dc3545;
            color: white;
        }
        
        .action-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 10px rgba(0,0,0,0.1);
        }
        
        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 30px;
            flex-wrap: wrap;
        }
        
        .page-link {
            padding: 10px 15px;
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 6px;
            text-decoration: none;
            color: var(--dark-color);
            transition: all 0.3s ease;
        }
        
        .page-link:hover, .page-link.active {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }
        
        .empty-state {
            text-align: center;
            padding: 50px 20px;
            color: #666;
        }
        
        .empty-state i {
            font-size: 3rem;
            margin-bottom: 20px;
            color: #ddd;
        }
        
        .admin-footer {
            text-align: center;
            padding: 30px 0;
            color: #666;
            border-top: 1px solid #eee;
            margin-top: 40px;
        }
        
        @media (max-width: 768px) {
            .admin-header {
                flex-direction: column;
                gap: 15px;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .search-box {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <header class="admin-header">
        <h1><i class="fas fa-users"></i> Gestion des abonnés</h1>
        <div class="admin-nav">
            <a href="dashboard.php" class="nav-btn secondary">
                <i class="fas fa-tachometer-alt"></i> Tableau de bord
            </a>
            <a href="news_crud.php" class="nav-btn secondary">
                <i class="fas fa-newspaper"></i> Actualités
            </a>
        </div>
    </header>
    
    <div class="admin-container">
        <?php if($message): ?>
            <div class="alert alert-success"><?php echo $message; ?></div>
        <?php endif; ?>
        
        <?php if($error): ?>
            <div class="alert alert-error"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <h1 class="page-title">
            <i class="fas fa-envelope-open-text"></i> Abonnés à la newsletter
        </h1>
        
        <!-- Statistiques -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon total">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-info">
                    <h3><?php echo $stats['total'] ?? 0; ?></h3>
                    <p>Total abonnés</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon active">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-info">
                    <h3><?php echo $stats['actifs'] ?? 0; ?></h3>
                    <p>Abonnés actifs</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon inactive">
                    <i class="fas fa-pause-circle"></i>
                </div>
                <div class="stat-info">
                    <h3><?php echo $stats['inactifs'] ?? 0; ?></h3>
                    <p>Abonnés inactifs</p>
                </div>
            </div>
        </div>
        
        <!-- Recherche -->
        <form class="search-box" method="GET" action="">
            <input type="text" name="search" placeholder="Rechercher par nom, prénom ou email..." 
                   value="<?php echo isset($search) ? htmlspecialchars($search) : ''; ?>">
            <button type="submit">
                <i class="fas fa-search"></i> Rechercher
            </button>
            <?php if(isset($search) && $search): ?>
                <a href="subscribers.php" class="nav-btn secondary">
                    <i class="fas fa-times"></i> Réinitialiser
                </a>
            <?php endif; ?>
        </form>
        
        <!-- Liste des abonnés -->
        <div class="table-container">
            <?php if(isset($subscribers) && count($subscribers) > 0): ?>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Date inscription</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($subscribers as $sub): ?>
                            <tr>
                                <td><?php echo $sub['id']; ?></td>
                                <td><strong><?php echo htmlspecialchars($sub['nom']); ?></strong></td>
                                <td><?php echo htmlspecialchars($sub['prenom']); ?></td>
                                <td>
                                    <a href="mailto:<?php echo htmlspecialchars($sub['email']); ?>">
                                        <?php echo htmlspecialchars($sub['email']); ?>
                                    </a>
                                </td>
                                <td><?php echo formatDate($sub['date_inscription'], 'd/m/Y H:i'); ?></td>
                                <td>
                                    <span class="status-badge <?php echo $sub['actif'] ? 'active' : 'inactive'; ?>">
                                        <?php echo $sub['actif'] ? 'Actif' : 'Inactif'; ?>
                                    </span>
                                </td>
                                <td>
                                    <div class="actions">
                                        <a href="subscribers.php?action=toggle&id=<?php echo $sub['id']; ?>" 
                                           class="action-btn toggle" 
                                           title="<?php echo $sub['actif'] ? 'Désactiver' : 'Activer'; ?>">
                                            <i class="fas fa-<?php echo $sub['actif'] ? 'pause' : 'play'; ?>"></i>
                                        </a>
                                        <a href="subscribers.php?action=delete&id=<?php echo $sub['id']; ?>" 
                                           class="action-btn delete" 
                                           title="Supprimer"
                                           onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet abonné ?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                
                <!-- Pagination -->
                <?php if(isset($total_pages) && $total_pages > 1): ?>
                    <div class="pagination">
                        <?php if($page > 1): ?>
                            <a href="subscribers.php?page=<?php echo $page-1; ?><?php echo $search ? '&search='.urlencode($search) : ''; ?>" class="page-link">
                                <i class="fas fa-chevron-left"></i> Précédent
                            </a>
                        <?php endif; ?>
                        
                        <?php for($i = 1; $i <= $total_pages; $i++): ?>
                            <a href="subscribers.php?page=<?php echo $i; ?><?php echo $search ? '&search='.urlencode($search) : ''; ?>" 
                               class="page-link <?php echo $i == $page ? 'active' : ''; ?>">
                                <?php echo $i; ?>
                            </a>
                        <?php endfor; ?>
                        
                        <?php if($page < $total_pages): ?>
                            <a href="subscribers.php?page=<?php echo $page+1; ?><?php echo $search ? '&search='.urlencode($search) : ''; ?>" class="page-link">
                                Suivant <i class="fas fa-chevron-right"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                
            <?php else: ?>
                <div class="empty-state">
                    <i class="fas fa-users"></i>
                    <h3>Aucun abonné</h3>
                    <p><?php echo $search ? 'Aucun résultat pour "' . htmlspecialchars($search) . '"' : 'Personne ne s\'est encore inscrit à la newsletter.'; ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
    
    <footer class="admin-footer">
        <p>© <?php echo date('Y'); ?> - <?php echo SITE_NAME; ?> - Interface d'administration</p>
    </footer>
</body>
</html>
