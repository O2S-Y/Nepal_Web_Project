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
    case 'add':
        // Ajouter une news
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $titre = trim($_POST['titre']);
            $resume = trim($_POST['resume']);
            $contenu = trim($_POST['contenu']);
            
            if(empty($titre) || empty($resume) || empty($contenu)) {
                $error = "Tous les champs sont obligatoires.";
            } else {
                try {
                    $stmt = $conn->prepare("INSERT INTO news (titre, resume, contenu, date_publication) 
                                           VALUES (:titre, :resume, :contenu, NOW())");
                    $stmt->bindParam(':titre', $titre);
                    $stmt->bindParam(':resume', $resume);
                    $stmt->bindParam(':contenu', $contenu);
                    
                    if($stmt->execute()) {
                        $message = "Actualité ajoutée avec succès !";
                        // Réinitialiser les champs
                        $titre = $resume = $contenu = '';
                    }
                } catch(PDOException $e) {
                    $error = "Erreur: " . $e->getMessage();
                }
            }
        }
        break;
        
    case 'edit':
        // Modifier une news
        if($id > 0) {
            // Récupérer la news à modifier
            try {
                $stmt = $conn->prepare("SELECT * FROM news WHERE news_id = :id");
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                $news = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if(!$news) {
                    $error = "Actualité non trouvée.";
                    $action = 'list';
                }
            } catch(PDOException $e) {
                $error = "Erreur: " . $e->getMessage();
                $action = 'list';
            }
            
            // Traitement du formulaire de modification
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $titre = trim($_POST['titre']);
                $resume = trim($_POST['resume']);
                $contenu = trim($_POST['contenu']);
                
                if(empty($titre) || empty($resume) || empty($contenu)) {
                    $error = "Tous les champs sont obligatoires.";
                } else {
                    try {
                        $stmt = $conn->prepare("UPDATE news SET titre = :titre, resume = :resume, 
                                               contenu = :contenu WHERE news_id = :id");
                        $stmt->bindParam(':titre', $titre);
                        $stmt->bindParam(':resume', $resume);
                        $stmt->bindParam(':contenu', $contenu);
                        $stmt->bindParam(':id', $id);
                        
                        if($stmt->execute()) {
                            $message = "Actualité modifiée avec succès !";
                            // Recharger les données
                            $stmt = $conn->prepare("SELECT * FROM news WHERE news_id = :id");
                            $stmt->bindParam(':id', $id);
                            $stmt->execute();
                            $news = $stmt->fetch(PDO::FETCH_ASSOC);
                        }
                    } catch(PDOException $e) {
                        $error = "Erreur: " . $e->getMessage();
                    }
                }
            }
        }
        break;
        
    case 'delete':
        // Supprimer une news
        if($id > 0) {
            try {
                $stmt = $conn->prepare("DELETE FROM news WHERE news_id = :id");
                $stmt->bindParam(':id', $id);
                
                if($stmt->execute()) {
                    $message = "Actualité supprimée avec succès !";
                }
            } catch(PDOException $e) {
                $error = "Erreur: " . $e->getMessage();
            }
        }
        $action = 'list';
        break;
        
    case 'list':
    default:
        // Lister toutes les news
        try {
            // Pagination
            $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
            $per_page = 10;
            $offset = ($page - 1) * $per_page;
            
            // Compter le total
            $stmt = $conn->query("SELECT COUNT(*) as total FROM news");
            $total_records = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
            $total_pages = ceil($total_records / $per_page);
            
            // Récupérer les news
            $stmt = $conn->prepare("SELECT * FROM news ORDER BY date_publication DESC LIMIT :limit OFFSET :offset");
            $stmt->bindValue(':limit', $per_page, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            $news_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
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
    <title>Gestion des actualités - <?php echo SITE_NAME; ?></title>
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
            animation: slideInDown 0.5s ease;
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
        
        /* Formulaire */
        .form-container {
            background-color: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            max-width: 800px;
            margin: 0 auto;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: var(--dark-color);
            font-weight: 500;
            font-size: 1rem;
        }
        
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(220, 20, 60, 0.1);
        }
        
        .form-group textarea {
            min-height: 150px;
            resize: vertical;
        }
        
        .form-actions {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }
        
        .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-decoration: none;
            font-size: 1rem;
        }
        
        .btn-primary {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: white;
        }
        
        .btn-primary:hover {
            background: linear-gradient(to right, var(--secondary-color), var(--primary-color));
            transform: translateY(-2px);
            box-shadow: 0 7px 15px rgba(0, 56, 147, 0.3);
        }
        
        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }
        
        .btn-secondary:hover {
            background-color: #5a6268;
            transform: translateY(-2px);
        }
        
        .btn-danger {
            background-color: #dc3545;
            color: white;
        }
        
        .btn-danger:hover {
            background-color: #c82333;
            transform: translateY(-2px);
        }
        
        /* Tableau */
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
            margin-top: 20px;
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
        }
        
        .action-btn.edit {
            background-color: #17a2b8;
            color: white;
        }
        
        .action-btn.delete {
            background-color: #dc3545;
            color: white;
        }
        
        .action-btn.view {
            background-color: #28a745;
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
        
        .page-link:hover {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }
        
        .page-link.active {
            background-color: var(--secondary-color);
            color: white;
            border-color: var(--secondary-color);
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
        
        /* Responsive */
        @media (max-width: 768px) {
            .admin-header {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
            
            .form-actions {
                flex-direction: column;
            }
            
            .actions {
                flex-direction: column;
                gap: 5px;
            }
            
            .action-btn {
                width: 35px;
                height: 35px;
            }
        }
    </style>
</head>
<body>
    <header class="admin-header">
        <h1><i class="fas fa-newspaper"></i> Gestion des actualités</h1>
        <div class="admin-nav">
            <a href="dashboard.php" class="nav-btn secondary">
                <i class="fas fa-tachometer-alt"></i> Tableau de bord
            </a>
            <a href="news_crud.php?action=add" class="nav-btn">
                <i class="fas fa-plus"></i> Ajouter
            </a>
            <a href="news_crud.php" class="nav-btn secondary">
                <i class="fas fa-list"></i> Liste
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
        
        <?php if($action == 'add' || $action == 'edit'): ?>
            <!-- Formulaire d'ajout/modification -->
            <h1 class="page-title">
                <i class="fas fa-<?php echo $action == 'add' ? 'plus' : 'edit'; ?>"></i>
                <?php echo $action == 'add' ? 'Ajouter une actualité' : 'Modifier une actualité'; ?>
            </h1>
            
            <div class="form-container">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="titre">Titre *</label>
                        <input type="text" id="titre" name="titre" 
                               value="<?php echo isset($news['titre']) ? htmlspecialchars($news['titre']) : (isset($titre) ? htmlspecialchars($titre) : ''); ?>" 
                               required>
                    </div>
                    
                    <div class="form-group">
                        <label for="resume">Résumé *</label>
                        <textarea id="resume" name="resume" required><?php echo isset($news['resume']) ? htmlspecialchars($news['resume']) : (isset($resume) ? htmlspecialchars($resume) : ''); ?></textarea>
                        <div class="char-counter">
                            <span id="resumeCount">0</span> / 500 caractères
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="contenu">Contenu *</label>
                        <textarea id="contenu" name="contenu" rows="8" required><?php echo isset($news['contenu']) ? htmlspecialchars($news['contenu']) : (isset($contenu) ? htmlspecialchars($contenu) : ''); ?></textarea>
                        <div class="char-counter">
                            <span id="contentCount">0</span> / 5000 caractères
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i>
                            <?php echo $action == 'add' ? 'Publier' : 'Mettre à jour'; ?>
                        </button>
                        <a href="news_crud.php" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Annuler
                        </a>
                    </div>
                </form>
            </div>
            
        <?php elseif($action == 'list'): ?>
            <!-- Liste des actualités -->
            <h1 class="page-title">
                <i class="fas fa-list"></i> Liste des actualités
                <span style="font-size: 1rem; color: #666; margin-left: 10px;">
                    (<?php echo $total_records ?? 0; ?> actualités)
                </span>
            </h1>
            
            <div class="table-container">
                <?php if(isset($news_list) && count($news_list) > 0): ?>
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Titre</th>
                                <th>Date</th>
                                <th>Résumé</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($news_list as $item): ?>
                                <tr>
                                    <td><?php echo $item['news_id']; ?></td>
                                    <td><strong><?php echo shortenText($item['titre'], 40); ?></strong></td>
                                    <td><?php echo formatDate($item['date_publication'], 'd/m/Y H:i'); ?></td>
                                    <td><?php echo shortenText($item['resume'], 60); ?></td>
                                    <td>
                                        <div class="actions">
                                            <a href="../news_details.php?id=<?php echo $item['news_id']; ?>" target="_blank" 
                                               class="action-btn view" title="Voir">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="news_crud.php?action=edit&id=<?php echo $item['news_id']; ?>" 
                                               class="action-btn edit" title="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="news_crud.php?action=delete&id=<?php echo $item['news_id']; ?>" 
                                               class="action-btn delete" title="Supprimer"
                                               onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette actualité ?')">
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
                                <a href="news_crud.php?page=<?php echo $page-1; ?>" class="page-link">
                                    <i class="fas fa-chevron-left"></i> Précédent
                                </a>
                            <?php endif; ?>
                            
                            <?php for($i = 1; $i <= $total_pages; $i++): ?>
                                <a href="news_crud.php?page=<?php echo $i; ?>" 
                                   class="page-link <?php echo $i == $page ? 'active' : ''; ?>">
                                    <?php echo $i; ?>
                                </a>
                            <?php endfor; ?>
                            
                            <?php if($page < $total_pages): ?>
                                <a href="news_crud.php?page=<?php echo $page+1; ?>" class="page-link">
                                    Suivant <i class="fas fa-chevron-right"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    
                <?php else: ?>
                    <div class="empty-state">
                        <i class="fas fa-newspaper"></i>
                        <h3>Aucune actualité</h3>
                        <p>Commencez par ajouter votre première actualité.</p>
                        <a href="news_crud.php?action=add" class="btn btn-primary" style="margin-top: 20px;">
                            <i class="fas fa-plus"></i> Ajouter une actualité
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
    
    <footer class="admin-footer">
        <p>© <?php echo date('Y'); ?> - <?php echo SITE_NAME; ?> - Interface d'administration</p>
    </footer>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Compteur de caractères
            const resumeTextarea = document.getElementById('resume');
            const contentTextarea = document.getElementById('contenu');
            const resumeCount = document.getElementById('resumeCount');
            const contentCount = document.getElementById('contentCount');
            
            if(resumeTextarea && resumeCount) {
                resumeTextarea.addEventListener('input', function() {
                    const count = this.value.length;
                    resumeCount.textContent = count;
                    
                    if(count > 500) {
                        resumeCount.style.color = 'var(--primary-color)';
                        this.style.borderColor = 'var(--primary-color)';
                    } else {
                        resumeCount.style.color = 'inherit';
                        this.style.borderColor = '#ddd';
                    }
                });
                
                // Initialiser le compteur
                resumeCount.textContent = resumeTextarea.value.length;
            }
            
            if(contentTextarea && contentCount) {
                contentTextarea.addEventListener('input', function() {
                    const count = this.value.length;
                    contentCount.textContent = count;
                    
                    if(count > 5000) {
                        contentCount.style.color = 'var(--primary-color)';
                        this.style.borderColor = 'var(--primary-color)';
                    } else {
                        contentCount.style.color = 'inherit';
                        this.style.borderColor = '#ddd';
                    }
                });
                
                // Initialiser le compteur
                contentCount.textContent = contentTextarea.value.length;
            }
            
            // Confirmation avant suppression
            const deleteButtons = document.querySelectorAll('.action-btn.delete');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    if(!confirm('Êtes-vous sûr de vouloir supprimer cette actualité ? Cette action est irréversible.')) {
                        e.preventDefault();
                    }
                });
            });
            
            // Animation des lignes du tableau
            const tableRows = document.querySelectorAll('.data-table tr');
            tableRows.forEach((row, index) => {
                row.style.opacity = '0';
                row.style.transform = 'translateY(10px)';
                
                setTimeout(() => {
                    row.style.transition = 'all 0.3s ease';
                    row.style.opacity = '1';
                    row.style.transform = 'translateY(0)';
                }, index * 50);
            });
            
            // Auto-sauvegarde (simulation)
            const form = document.querySelector('form');
            if(form) {
                let autoSaveTimer;
                
                const inputs = form.querySelectorAll('input, textarea');
                inputs.forEach(input => {
                    input.addEventListener('input', function() {
                        clearTimeout(autoSaveTimer);
                        autoSaveTimer = setTimeout(() => {
                            // Simulation d'auto-sauvegarde
                            console.log('Auto-sauvegarde...');
                            
                            const saveIndicator = document.createElement('div');
                            saveIndicator.className = 'alert alert-success';
                            saveIndicator.style.position = 'fixed';
                            saveIndicator.style.top = '20px';
                            saveIndicator.style.right = '20px';
                            saveIndicator.style.zIndex = '10000';
                            saveIndicator.style.padding = '10px 20px';
                            saveIndicator.style.fontSize = '0.9rem';
                            saveIndicator.textContent = 'Progression sauvegardée';
                            
                            document.body.appendChild(saveIndicator);
                            
                            setTimeout(() => {
                                saveIndicator.style.opacity = '0';
                                saveIndicator.style.transition = 'opacity 0.5s ease';
                                setTimeout(() => {
                                    document.body.removeChild(saveIndicator);
                                }, 500);
                            }, 2000);
                        }, 2000);
                    });
                });
            }
        });
    </script>
</body>
</html>