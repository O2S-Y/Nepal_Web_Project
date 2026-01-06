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
    case 'view':
        // Voir un message et le marquer comme lu
        if($id > 0) {
            try {
                // Marquer comme lu
                $stmt = $conn->prepare("UPDATE contact SET lu = 1 WHERE id = :id");
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                
                // Récupérer le message
                $stmt = $conn->prepare("SELECT * FROM contact WHERE id = :id");
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                $contact = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if(!$contact) {
                    $error = "Message non trouvé.";
                    $action = 'list';
                }
            } catch(PDOException $e) {
                $error = "Erreur: " . $e->getMessage();
                $action = 'list';
            }
        }
        break;
        
    case 'delete':
        // Supprimer un message
        if($id > 0) {
            try {
                $stmt = $conn->prepare("DELETE FROM contact WHERE id = :id");
                $stmt->bindParam(':id', $id);
                
                if($stmt->execute()) {
                    $message = "Message supprimé avec succès !";
                }
            } catch(PDOException $e) {
                $error = "Erreur: " . $e->getMessage();
            }
        }
        $action = 'list';
        break;
        
    case 'list':
    default:
        // Lister tous les messages
        try {
            // Pagination
            $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
            $per_page = 15;
            $offset = ($page - 1) * $per_page;
            
            // Compter le total
            $stmt = $conn->query("SELECT COUNT(*) as total FROM contact");
            $total_records = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
            $total_pages = ceil($total_records / $per_page);
            
            // Compter les non lus
            $stmt = $conn->query("SELECT COUNT(*) as unread FROM contact WHERE lu = 0");
            $unread_count = $stmt->fetch(PDO::FETCH_ASSOC)['unread'];
            
            // Récupérer les messages
            $stmt = $conn->prepare("SELECT * FROM contact ORDER BY date_envoi DESC LIMIT :limit OFFSET :offset");
            $stmt->bindValue(':limit', $per_page, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
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
    <title>Messages de contact - <?php echo SITE_NAME; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #DC143C;
            --secondary-color: #003893;
            --accent-color: #FFD700;
            --dark-color: #2c3e50;
        }
        
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
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
        
        .nav-btn.secondary { background-color: #6c757d; }
        
        .admin-container {
            max-width: 1200px;
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
        
        .stats-bar {
            display: flex;
            gap: 20px;
            margin-bottom: 25px;
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        
        .stat-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .stat-item .badge {
            background: var(--primary-color);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 600;
        }
        
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
        
        .data-table tr:hover { background-color: #f8f9fa; }
        
        .data-table tr.unread {
            background-color: #fff8e1;
            font-weight: 500;
        }
        
        .data-table tr.unread:hover {
            background-color: #ffecb3;
        }
        
        .status-new {
            display: inline-block;
            background: var(--primary-color);
            color: white;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 0.7rem;
            font-weight: 600;
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
        
        .action-btn.view { background-color: #17a2b8; color: white; }
        .action-btn.delete { background-color: #dc3545; color: white; }
        
        .action-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 10px rgba(0,0,0,0.1);
        }
        
        /* Message view */
        .message-container {
            background: white;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        
        .message-header {
            border-bottom: 2px solid #eee;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        
        .message-header h2 {
            color: var(--secondary-color);
            margin-bottom: 15px;
        }
        
        .message-meta {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
            color: #666;
        }
        
        .message-meta span {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .message-meta i { color: var(--primary-color); }
        
        .message-body {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            line-height: 1.8;
            margin-bottom: 30px;
        }
        
        .message-actions {
            display: flex;
            gap: 15px;
        }
        
        .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .btn-primary {
            background: var(--secondary-color);
            color: white;
        }
        
        .btn-danger {
            background: #dc3545;
            color: white;
        }
        
        .btn:hover { transform: translateY(-2px); }
        
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
    </style>
</head>
<body>
    <header class="admin-header">
        <h1><i class="fas fa-envelope"></i> Messages de contact</h1>
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
        
        <?php if($action == 'view' && isset($contact)): ?>
            <!-- Vue détaillée d'un message -->
            <h1 class="page-title">
                <i class="fas fa-envelope-open"></i> Détail du message
            </h1>
            
            <div class="message-container">
                <div class="message-header">
                    <h2><?php echo htmlspecialchars($contact['sujet']); ?></h2>
                    <div class="message-meta">
                        <span><i class="fas fa-user"></i> <?php echo htmlspecialchars($contact['nom']); ?></span>
                        <span><i class="fas fa-envelope"></i> <?php echo htmlspecialchars($contact['email']); ?></span>
                        <span><i class="fas fa-calendar"></i> <?php echo formatDate($contact['date_envoi'], 'd/m/Y à H:i'); ?></span>
                    </div>
                </div>
                
                <div class="message-body">
                    <?php echo nl2br(htmlspecialchars($contact['message'])); ?>
                </div>
                
                <div class="message-actions">
                    <a href="mailto:<?php echo htmlspecialchars($contact['email']); ?>?subject=Re: <?php echo htmlspecialchars($contact['sujet']); ?>" 
                       class="btn btn-primary">
                        <i class="fas fa-reply"></i> Répondre
                    </a>
                    <a href="contacts.php?action=delete&id=<?php echo $contact['id']; ?>" 
                       class="btn btn-danger"
                       onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce message ?')">
                        <i class="fas fa-trash"></i> Supprimer
                    </a>
                    <a href="contacts.php" class="btn" style="background: #6c757d; color: white;">
                        <i class="fas fa-arrow-left"></i> Retour
                    </a>
                </div>
            </div>
            
        <?php else: ?>
            <!-- Liste des messages -->
            <h1 class="page-title">
                <i class="fas fa-inbox"></i> Boîte de réception
            </h1>
            
            <div class="stats-bar">
                <div class="stat-item">
                    <span>Total:</span>
                    <span class="badge" style="background: var(--secondary-color);"><?php echo $total_records ?? 0; ?></span>
                </div>
                <div class="stat-item">
                    <span>Non lus:</span>
                    <span class="badge"><?php echo $unread_count ?? 0; ?></span>
                </div>
            </div>
            
            <div class="table-container">
                <?php if(isset($contacts) && count($contacts) > 0): ?>
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Statut</th>
                                <th>Expéditeur</th>
                                <th>Sujet</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($contacts as $msg): ?>
                                <tr class="<?php echo $msg['lu'] ? '' : 'unread'; ?>">
                                    <td>
                                        <?php if(!$msg['lu']): ?>
                                            <span class="status-new">NOUVEAU</span>
                                        <?php else: ?>
                                            <i class="fas fa-check-circle" style="color: #28a745;"></i>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <strong><?php echo htmlspecialchars($msg['nom']); ?></strong><br>
                                        <small><?php echo htmlspecialchars($msg['email']); ?></small>
                                    </td>
                                    <td><?php echo shortenText($msg['sujet'], 50); ?></td>
                                    <td><?php echo formatDate($msg['date_envoi'], 'd/m/Y H:i'); ?></td>
                                    <td>
                                        <div class="actions">
                                            <a href="contacts.php?action=view&id=<?php echo $msg['id']; ?>" 
                                               class="action-btn view" title="Voir">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="contacts.php?action=delete&id=<?php echo $msg['id']; ?>" 
                                               class="action-btn delete" 
                                               title="Supprimer"
                                               onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce message ?')">
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
                                <a href="contacts.php?page=<?php echo $page-1; ?>" class="page-link">
                                    <i class="fas fa-chevron-left"></i> Précédent
                                </a>
                            <?php endif; ?>
                            
                            <?php for($i = 1; $i <= $total_pages; $i++): ?>
                                <a href="contacts.php?page=<?php echo $i; ?>" 
                                   class="page-link <?php echo $i == $page ? 'active' : ''; ?>">
                                    <?php echo $i; ?>
                                </a>
                            <?php endfor; ?>
                            
                            <?php if($page < $total_pages): ?>
                                <a href="contacts.php?page=<?php echo $page+1; ?>" class="page-link">
                                    Suivant <i class="fas fa-chevron-right"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    
                <?php else: ?>
                    <div class="empty-state">
                        <i class="fas fa-inbox"></i>
                        <h3>Aucun message</h3>
                        <p>Vous n'avez reçu aucun message pour le moment.</p>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
    
    <footer class="admin-footer">
        <p>© <?php echo date('Y'); ?> - <?php echo SITE_NAME; ?> - Interface d'administration</p>
    </footer>
</body>
</html>
