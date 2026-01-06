<?php
$page_title = "Toutes les actualités";
require_once 'includes/header.php';
require_once 'includes/functions.php';

// Pagination
$per_page = 10;
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$offset = ($page - 1) * $per_page;

// Filtrage par catégorie (optionnel)
$category = isset($_GET['category']) ? trim($_GET['category']) : '';

// Récupérer le nombre total d'actualités
try {
    $stmt = $conn->prepare("SELECT COUNT(*) as total FROM news");
    $stmt->execute();
    $total = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    $total_pages = ceil($total / $per_page);
} catch(PDOException $e) {
    $total = 0;
    $total_pages = 1;
}

// Récupérer les actualités
try {
    $stmt = $conn->prepare("SELECT * FROM news ORDER BY date_publication DESC LIMIT :offset, :limit");
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindValue(':limit', $per_page, PDO::PARAM_INT);
    $stmt->execute();
    $news_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    $news_list = [];
    $error = "Erreur lors de la récupération des actualités: " . $e->getMessage();
}
?>

<main class="main-content">
    <div class="page-header">
        <h1 class="page-title"><i class="fas fa-newspaper"></i> Toutes les actualités</h1>
        <p class="page-description">Retrouvez ici toutes les actualités sur le Népal</p>
    </div>
    
    <div class="news-container">
        <?php if(isset($error)): ?>
            <div class="alert alert-error"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <?php if(count($news_list) > 0): ?>
            <div class="news-grid">
                <?php foreach($news_list as $news): ?>
                    <article class="news-card">
                        <div class="news-card-header">
                            <span class="news-date">
                                <i class="fas fa-calendar-alt"></i>
                                <?php echo formatDate($news['date_publication'], 'd/m/Y'); ?>
                            </span>
                            <span class="news-reading-time">
                                <i class="fas fa-clock"></i>
                                <?php echo estimateReadingTime($news['contenu']); ?> min
                            </span>
                        </div>
                        <h2 class="news-title"><?php echo htmlspecialchars($news['titre']); ?></h2>
                        <p class="news-excerpt"><?php echo shortenText($news['resume'], 150); ?></p>
                        <a href="news_details.php?id=<?php echo $news['news_id']; ?>" class="news-read-more">
                            Lire la suite <i class="fas fa-arrow-right"></i>
                        </a>
                    </article>
                <?php endforeach; ?>
            </div>
            
            <?php if($total_pages > 1): ?>
                <div class="pagination">
                    <?php if($page > 1): ?>
                        <a href="?page=<?php echo $page - 1; ?>" class="page-link">
                            <i class="fas fa-chevron-left"></i> Précédent
                        </a>
                    <?php endif; ?>
                    
                    <div class="page-numbers">
                        <?php for($i = 1; $i <= $total_pages; $i++): ?>
                            <a href="?page=<?php echo $i; ?>" 
                               class="page-number <?php echo $i == $page ? 'active' : ''; ?>">
                                <?php echo $i; ?>
                            </a>
                        <?php endfor; ?>
                    </div>
                    
                    <?php if($page < $total_pages): ?>
                        <a href="?page=<?php echo $page + 1; ?>" class="page-link">
                            Suivant <i class="fas fa-chevron-right"></i>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            
        <?php else: ?>
            <div class="no-news">
                <i class="fas fa-newspaper"></i>
                <h3>Aucune actualité pour le moment</h3>
                <p>Revenez bientôt pour découvrir les dernières nouvelles sur le Népal.</p>
                <a href="index.php" class="btn btn-primary">
                    <i class="fas fa-home"></i> Retour à l'accueil
                </a>
            </div>
        <?php endif; ?>
    </div>
</main>

<aside class="right-sidebar">
    <div class="news-subscribe-sidebar">
        <h3 class="sidebar-title"><i class="fas fa-envelope"></i> Newsletter</h3>
        <p>Inscrivez-vous pour recevoir les dernières actualités par email.</p>
        <a href="index.php#newsletter" class="btn btn-primary" style="width: 100%;">
            <i class="fas fa-paper-plane"></i> S'inscrire
        </a>
    </div>
    
    <div class="news-stats">
        <h3 class="sidebar-title"><i class="fas fa-chart-bar"></i> Statistiques</h3>
        <div class="stat-list">
            <div class="stat-item">
                <span class="stat-value"><?php echo $total; ?></span>
                <span class="stat-label">Articles publiés</span>
            </div>
        </div>
    </div>
</aside>

<style>
    .news-container {
        padding: 20px;
    }
    
    .news-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 30px;
        margin-bottom: 40px;
    }
    
    .news-card {
        background-color: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        border: 1px solid transparent;
    }
    
    .news-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.1);
        border-color: var(--primary-color);
    }
    
    .news-card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
        font-size: 0.9rem;
        color: #666;
    }
    
    .news-date, .news-reading-time {
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .news-date i, .news-reading-time i {
        color: var(--primary-color);
    }
    
    .news-card .news-title {
        color: var(--secondary-color);
        font-size: 1.4rem;
        margin-bottom: 15px;
        line-height: 1.4;
    }
    
    .news-excerpt {
        color: #666;
        line-height: 1.7;
        margin-bottom: 20px;
    }
    
    .news-read-more {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .news-read-more:hover {
        color: var(--secondary-color);
        gap: 15px;
    }
    
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 20px;
        margin-top: 40px;
        flex-wrap: wrap;
    }
    
    .page-link {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px 20px;
        background-color: white;
        border-radius: 8px;
        text-decoration: none;
        color: var(--dark-color);
        font-weight: 500;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }
    
    .page-link:hover {
        background-color: var(--primary-color);
        color: white;
        transform: translateY(-3px);
    }
    
    .page-numbers {
        display: flex;
        gap: 10px;
    }
    
    .page-number {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: white;
        border-radius: 8px;
        text-decoration: none;
        color: var(--dark-color);
        font-weight: 500;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }
    
    .page-number:hover, .page-number.active {
        background-color: var(--primary-color);
        color: white;
    }
    
    .no-news {
        text-align: center;
        padding: 60px 20px;
        background-color: white;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    }
    
    .no-news i {
        font-size: 4rem;
        color: #ddd;
        margin-bottom: 20px;
    }
    
    .no-news h3 {
        color: var(--dark-color);
        margin-bottom: 15px;
    }
    
    .no-news p {
        color: #666;
        margin-bottom: 25px;
    }
    
    /* Sidebar */
    .news-subscribe-sidebar, .news-stats {
        background-color: white;
        border-radius: 10px;
        padding: 25px;
        margin-bottom: 25px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .news-subscribe-sidebar p {
        color: #666;
        margin: 15px 0;
        line-height: 1.6;
    }
    
    .stat-list {
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
    
    .stat-value {
        font-size: 2rem;
        font-weight: 700;
        color: var(--primary-color);
    }
    
    .stat-label {
        color: #666;
    }
    
    @media (max-width: 768px) {
        .news-grid {
            grid-template-columns: 1fr;
        }
        
        .pagination {
            flex-direction: column;
        }
    }
</style>

<?php require_once 'includes/footer.php'; ?>
