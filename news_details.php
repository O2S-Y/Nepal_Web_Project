<?php
require_once 'config.php';
require_once 'includes/functions.php';

// Récupérer l'ID de la news depuis l'URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if($id <= 0) {
    header('Location: index.php');
    exit();
}

// Récupérer la news depuis la base de données
try {
    $stmt = $conn->prepare("SELECT * FROM news WHERE news_id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $news = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if(!$news) {
        // Si la news n'existe pas, rediriger vers l'accueil
        header('Location: index.php');
        exit();
    }
} catch(PDOException $e) {
    // En cas d'erreur, afficher un message et rediriger
    error_log("Erreur DB news_detail: " . $e->getMessage());
    header('Location: index.php');
    exit();
}

// Mettre à jour le titre de la page
$page_title = $news['titre'] . ' - Actualités Népal';
require_once 'includes/header.php';
?>

<main class="main-content">
    <div class="news-detail-container">
        <!-- Fil d'Ariane -->
        <nav class="news-breadcrumb">
            <a href="index.php"><i class="fas fa-home"></i> Accueil</a> / 
            <a href="all_news.php">Actualités</a> / 
            <span><?php echo htmlspecialchars($news['titre']); ?></span>
        </nav>
        
        <!-- Article principal -->
        <article class="news-article">
            <header class="news-header">
                <div class="news-meta">
                    <div class="news-date">
                        <i class="fas fa-calendar-alt"></i>
                        <?php echo formatDate($news['date_publication'], 'd F Y'); ?>
                    </div>
                    <div class="news-category">
                        <i class="fas fa-tag"></i>
                        Actualité
                    </div>
                    <div class="news-reading-time">
                        <i class="fas fa-clock"></i>
                        <?php echo estimateReadingTime($news['contenu']); ?> min de lecture
                    </div>
                </div>
                
                <h1 class="news-title"><?php echo htmlspecialchars($news['titre']); ?></h1>
                
                <div class="news-excerpt">
                    <?php echo htmlspecialchars($news['resume']); ?>
                </div>
            </header>
            
            <div class="news-content">
                <?php 
                // Convertir les retours à la ligne en paragraphes
                $content = nl2br(htmlspecialchars($news['contenu']));
                echo '<div class="news-text">' . $content . '</div>';
                ?>
            </div>
            
            <footer class="news-footer">
                <div class="news-actions">
                    <button class="action-btn share-btn" onclick="shareNews()">
                        <i class="fas fa-share-alt"></i> Partager
                    </button>
                    <button class="action-btn print-btn" onclick="window.print()">
                        <i class="fas fa-print"></i> Imprimer
                    </button>
                    <button class="action-btn bookmark-btn" onclick="bookmarkNews(<?php echo $news['news_id']; ?>)">
                        <i class="fas fa-bookmark"></i> Sauvegarder
                    </button>
                </div>
                
                <?php if(isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true): ?>
                    <div class="admin-actions">
                        <a href="admin/news_crud.php?action=edit&id=<?php echo $news['news_id']; ?>" 
                           class="btn btn-primary">
                            <i class="fas fa-edit"></i> Modifier
                        </a>
                        <a href="admin/news_crud.php?action=delete&id=<?php echo $news['news_id']; ?>" 
                           class="btn btn-danger"
                           onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette actualité ?')">
                            <i class="fas fa-trash"></i> Supprimer
                        </a>
                    </div>
                <?php endif; ?>
            </footer>
        </article>
        
        <!-- Navigation entre articles -->
        <div class="news-navigation">
            <?php
            // Récupérer l'article précédent
            try {
                $stmt = $conn->prepare("SELECT * FROM news WHERE news_id < :id ORDER BY news_id DESC LIMIT 1");
                $stmt->bindParam(':id', $news['news_id']);
                $stmt->execute();
                $prev_news = $stmt->fetch(PDO::FETCH_ASSOC);
            } catch(PDOException $e) {
                $prev_news = null;
            }
            
            // Récupérer l'article suivant
            try {
                $stmt = $conn->prepare("SELECT * FROM news WHERE news_id > :id ORDER BY news_id ASC LIMIT 1");
                $stmt->bindParam(':id', $news['news_id']);
                $stmt->execute();
                $next_news = $stmt->fetch(PDO::FETCH_ASSOC);
            } catch(PDOException $e) {
                $next_news = null;
            }
            ?>
            
            <?php if($prev_news): ?>
                <a href="news_details.php?id=<?php echo $prev_news['news_id']; ?>" class="nav-link prev">
                    <i class="fas fa-arrow-left"></i>
                    <div>
                        <span class="nav-label">Article précédent</span>
                        <h4><?php echo shortenText($prev_news['titre'], 40); ?></h4>
                    </div>
                </a>
            <?php endif; ?>
            
            <?php if($next_news): ?>
                <a href="news_details.php?id=<?php echo $next_news['news_id']; ?>" class="nav-link next">
                    <div>
                        <span class="nav-label">Article suivant</span>
                        <h4><?php echo shortenText($next_news['titre'], 40); ?></h4>
                    </div>
                    <i class="fas fa-arrow-right"></i>
                </a>
            <?php endif; ?>
        </div>
        
        <!-- Articles similaires -->
        <div class="related-news">
            <h3><i class="fas fa-newspaper"></i> D'autres actualités</h3>
            
            <?php
            try {
                $stmt = $conn->prepare("SELECT * FROM news WHERE news_id != :id ORDER BY date_publication DESC LIMIT 3");
                $stmt->bindParam(':id', $news['news_id']);
                $stmt->execute();
                $related_news = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch(PDOException $e) {
                $related_news = [];
            }
            ?>
            
            <?php if(count($related_news) > 0): ?>
                <div class="related-grid">
                    <?php foreach($related_news as $related): ?>
                        <div class="related-card">
                            <div class="related-date">
                                <?php echo formatDate($related['date_publication'], 'd/m/Y'); ?>
                            </div>
                            <h4><?php echo shortenText($related['titre'], 60); ?></h4>
                            <p><?php echo shortenText($related['resume'], 100); ?></p>
                            <a href="news_details.php?id=<?php echo $related['news_id']; ?>" class="read-more">
                                Lire la suite <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="no-related-news">
                    <p>Aucune autre actualité pour le moment.</p>
                    <a href="all_news.php" class="btn btn-primary">Voir toutes les actualités</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>

<aside class="right-sidebar">
    <!-- Informations sur l'article -->
    <div class="news-info">
        <h3 class="sidebar-title"><i class="fas fa-info-circle"></i> À propos</h3>
        <div class="info-content">
            <div class="info-item">
                <i class="fas fa-calendar"></i>
                <div>
                    <strong>Publié le</strong>
                    <p><?php echo formatDate($news['date_publication'], 'd/m/Y à H:i'); ?></p>
                </div>
            </div>
            <div class="info-item">
                <i class="fas fa-clock"></i>
                <div>
                    <strong>Temps de lecture</strong>
                    <p><?php echo estimateReadingTime($news['contenu']); ?> minutes</p>
                </div>
            </div>
            <div class="info-item">
                <i class="fas fa-eye"></i>
                <div>
                    <strong>Vues</strong>
                    <p id="viewCount"><?php echo rand(100, 500); ?></p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Catégories -->
    <div class="news-categories">
        <h3 class="sidebar-title"><i class="fas fa-tags"></i> Catégories</h3>
        <div class="categories-list">
            <a href="all_news.php?category=culture" class="category-tag">
                <i class="fas fa-landmark"></i> Culture
            </a>
            <a href="all_news.php?category=trekking" class="category-tag">
                <i class="fas fa-hiking"></i> Trekking
            </a>
            <a href="all_news.php?category=festivals" class="category-tag">
                <i class="fas fa-calendar-alt"></i> Festivals
            </a>
            <a href="all_news.php?category=nature" class="category-tag">
                <i class="fas fa-leaf"></i> Nature
            </a>
        </div>
    </div>
    
    <!-- Newsletter -->
    <div class="news-subscribe">
        <h3 class="sidebar-title"><i class="fas fa-envelope"></i> Newsletter</h3>
        <p>Ne manquez pas les prochaines actualités sur le Népal.</p>
        <form class="subscribe-form" id="sidebarSubscribeForm">
            <input type="email" placeholder="Votre email" required>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-paper-plane"></i> S'abonner
            </button>
        </form>
    </div>
    
    <!-- Articles populaires -->
    <div class="popular-articles">
        <h3 class="sidebar-title"><i class="fas fa-fire"></i> Populaires</h3>
        <div class="popular-list">
            <?php
            try {
                $stmt = $conn->prepare("SELECT * FROM news WHERE news_id != :id ORDER BY RAND() LIMIT 3");
                $stmt->bindParam(':id', $news['news_id']);
                $stmt->execute();
                $popular_articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                foreach($popular_articles as $article):
            ?>
                <a href="news_details.php?id=<?php echo $article['news_id']; ?>" class="popular-item">
                    <div class="popular-content">
                        <h4><?php echo shortenText($article['titre'], 50); ?></h4>
                        <div class="popular-meta">
                            <span><?php echo formatDate($article['date_publication'], 'd/m/Y'); ?></span>
                            <span>•</span>
                            <span><?php echo estimateReadingTime($article['contenu']); ?> min</span>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
            <?php } catch(PDOException $e) { ?>
                <p class="no-popular">Chargement des articles...</p>
            <?php } ?>
        </div>
    </div>
</aside>

<style>
    .news-detail-container {
        padding: 20px;
    }
    
    .news-breadcrumb {
        margin-bottom: 30px;
        font-size: 0.9rem;
        color: #666;
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
    }
    
    .news-breadcrumb a {
        color: var(--secondary-color);
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 5px;
        transition: var(--transition);
    }
    
    .news-breadcrumb a:hover {
        color: var(--primary-color);
        text-decoration: underline;
    }
    
    .news-breadcrumb span {
        color: var(--primary-color);
        font-weight: 500;
    }
    
    .news-article {
        background-color: white;
        border-radius: 15px;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        margin-bottom: 40px;
    }
    
    .news-header {
        margin-bottom: 40px;
        padding-bottom: 30px;
        border-bottom: 2px solid #eee;
    }
    
    .news-meta {
        display: flex;
        gap: 30px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }
    
    .news-date, .news-category, .news-reading-time {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #666;
        font-size: 0.95rem;
    }
    
    .news-meta i {
        color: var(--primary-color);
    }
    
    .news-title {
        color: var(--secondary-color);
        font-size: 2.5rem;
        line-height: 1.3;
        margin-bottom: 20px;
    }
    
    .news-excerpt {
        font-size: 1.2rem;
        line-height: 1.6;
        color: #666;
        font-style: italic;
        border-left: 4px solid var(--accent-color);
        padding-left: 20px;
    }
    
    .news-content {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #333;
        margin-bottom: 40px;
    }
    
    .news-text {
        max-width: 800px;
        margin: 0 auto;
    }
    
    .news-text p {
        margin-bottom: 20px;
    }
    
    .news-footer {
        padding-top: 30px;
        border-top: 2px solid #eee;
    }
    
    .news-actions {
        display: flex;
        gap: 15px;
        margin-bottom: 30px;
        flex-wrap: wrap;
    }
    
    .action-btn {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px 20px;
        background-color: #f8f9fa;
        border: 1px solid #ddd;
        border-radius: 8px;
        cursor: pointer;
        font-family: 'Poppins', sans-serif;
        font-size: 1rem;
        color: var(--dark-color);
        transition: var(--transition);
    }
    
    .action-btn:hover {
        background-color: var(--primary-color);
        color: white;
        border-color: var(--primary-color);
        transform: translateY(-3px);
    }
    
    .admin-actions {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }
    
    .news-navigation {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 40px;
    }
    
    .nav-link {
        flex: 1;
        display: flex;
        align-items: center;
        gap: 20px;
        padding: 25px;
        background-color: white;
        border-radius: 10px;
        text-decoration: none;
        color: var(--dark-color);
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        border: 1px solid transparent;
    }
    
    .nav-link:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        border-color: var(--primary-color);
    }
    
    .nav-link.prev {
        text-align: left;
    }
    
    .nav-link.next {
        text-align: right;
        flex-direction: row-reverse;
    }
    
    .nav-label {
        display: block;
        font-size: 0.9rem;
        color: var(--primary-color);
        font-weight: 500;
        margin-bottom: 5px;
    }
    
    .nav-link h4 {
        color: var(--secondary-color);
        font-size: 1.2rem;
        line-height: 1.3;
    }
    
    .nav-link i {
        font-size: 1.5rem;
        color: var(--primary-color);
        flex-shrink: 0;
    }
    
    .related-news {
        background-color: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    }
    
    .related-news h3 {
        color: var(--secondary-color);
        margin-bottom: 25px;
        font-size: 1.5rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .related-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 25px;
    }
    
    .related-card {
        background: linear-gradient(135deg, #f8f9fa, white);
        border-radius: 10px;
        padding: 25px;
        border: 1px solid #eee;
        transition: all 0.3s ease;
    }
    
    .related-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        border-color: var(--primary-color);
    }
    
    .related-date {
        color: var(--primary-color);
        font-weight: 500;
        font-size: 0.9rem;
        margin-bottom: 10px;
    }
    
    .related-card h4 {
        color: var(--dark-color);
        margin-bottom: 15px;
        font-size: 1.2rem;
        line-height: 1.3;
    }
    
    .related-card p {
        color: #666;
        line-height: 1.6;
        margin-bottom: 20px;
        font-size: 0.95rem;
    }
    
    .read-more {
        color: var(--secondary-color);
        text-decoration: none;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }
    
    .read-more:hover {
        color: var(--primary-color);
        gap: 12px;
    }
    
    .no-related-news {
        text-align: center;
        padding: 40px;
        color: #666;
    }
    
    .no-related-news a {
        margin-top: 20px;
    }
    
    /* Sidebar spécifique */
    .news-info {
        background-color: white;
        border-radius: 10px;
        padding: 25px;
        margin-bottom: 25px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .info-content {
        margin-top: 20px;
    }
    
    .info-item {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 20px;
        padding-bottom: 20px;
        border-bottom: 1px solid #eee;
    }
    
    .info-item:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }
    
    .info-item i {
        font-size: 1.5rem;
        color: var(--primary-color);
        width: 40px;
        text-align: center;
        flex-shrink: 0;
    }
    
    .info-item strong {
        display: block;
        color: var(--dark-color);
        margin-bottom: 5px;
        font-size: 0.95rem;
    }
    
    .info-item p {
        color: #666;
        font-size: 0.9rem;
    }
    
    .news-categories {
        background-color: white;
        border-radius: 10px;
        padding: 25px;
        margin-bottom: 25px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .categories-list {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 20px;
    }
    
    .category-tag {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 15px;
        background-color: #f8f9fa;
        border-radius: 20px;
        text-decoration: none;
        color: var(--dark-color);
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }
    
    .category-tag:hover {
        background-color: var(--primary-color);
        color: white;
        transform: translateY(-3px);
    }
    
    .news-subscribe {
        background-color: white;
        border-radius: 10px;
        padding: 25px;
        margin-bottom: 25px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .news-subscribe p {
        color: #666;
        line-height: 1.6;
        margin-top: 10px;
        font-size: 0.95rem;
    }
    
    .subscribe-form {
        margin-top: 20px;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    
    .subscribe-form input {
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-family: 'Poppins', sans-serif;
        font-size: 1rem;
    }
    
    .popular-articles {
        background-color: white;
        border-radius: 10px;
        padding: 25px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .popular-list {
        margin-top: 20px;
        display: flex;
        flex-direction: column;
        gap: 15px;
    }
    
    .popular-item {
        display: block;
        padding: 15px;
        background-color: #f8f9fa;
        border-radius: 8px;
        text-decoration: none;
        color: var(--dark-color);
        transition: all 0.3s ease;
        border-left: 3px solid transparent;
    }
    
    .popular-item:hover {
        background-color: var(--primary-color);
        color: white;
        transform: translateX(5px);
        border-left-color: var(--accent-color);
    }
    
    .popular-item:hover h4,
    .popular-item:hover .popular-meta {
        color: white;
    }
    
    .popular-content h4 {
        color: var(--dark-color);
        font-size: 0.95rem;
        line-height: 1.4;
        margin-bottom: 5px;
        transition: color 0.3s ease;
    }
    
    .popular-meta {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 0.8rem;
        color: #666;
        transition: color 0.3s ease;
    }
    
    .no-popular {
        text-align: center;
        color: #666;
        font-style: italic;
        padding: 20px;
    }
    
    /* Responsive */
    @media (max-width: 1100px) {
        .news-navigation {
            flex-direction: column;
        }
        
        .related-grid {
            grid-template-columns: 1fr;
        }
        
        .news-article {
            padding: 30px;
        }
    }
    
    @media (max-width: 768px) {
        .news-article {
            padding: 25px;
        }
        
        .news-title {
            font-size: 2rem;
        }
        
        .news-meta {
            flex-direction: column;
            gap: 15px;
        }
        
        .news-actions {
            flex-direction: column;
        }
        
        .action-btn {
            justify-content: center;
        }
        
        .admin-actions {
            flex-direction: column;
        }
        
        .nav-link {
            padding: 20px;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fonction pour estimer le temps de lecture
        function estimateReadingTime(text) {
            const wordsPerMinute = 200;
            const words = text.trim().split(/\s+/).length;
            return Math.max(1, Math.ceil(words / wordsPerMinute));
        }
        
        // Fonction de partage
        window.shareNews = function() {
            const title = document.querySelector('.news-title').textContent;
            const url = window.location.href;
            const text = document.querySelector('.news-excerpt').textContent;
            
            if(navigator.share) {
                navigator.share({
                    title: title,
                    text: text,
                    url: url
                }).then(() => {
                    console.log('Partage réussi');
                }).catch(err => {
                    console.log('Erreur de partage:', err);
                    fallbackShare(title, url);
                });
            } else {
                fallbackShare(title, url);
            }
        };
        
        // Fallback pour le partage
        function fallbackShare(title, url) {
            const shareUrl = `https://twitter.com/intent/tweet?text=${encodeURIComponent(title)}&url=${encodeURIComponent(url)}`;
            window.open(shareUrl, '_blank', 'width=600,height=400');
        }
        
        // Fonction de sauvegarde
        window.bookmarkNews = function(newsId) {
            const title = document.querySelector('.news-title').textContent;
            const url = window.location.href;
            const date = new Date().toISOString();
            
            // Récupérer les signets existants
            let bookmarks = JSON.parse(localStorage.getItem('newsBookmarks')) || [];
            
            // Vérifier si déjà sauvegardé
            const existingIndex = bookmarks.findIndex(b => b.id === newsId);
            
            if(existingIndex === -1) {
                // Ajouter aux signets
                bookmarks.push({
                    id: newsId,
                    title: title,
                    url: url,
                    date: date
                });
                
                // Mettre à jour le localStorage
                localStorage.setItem('newsBookmarks', JSON.stringify(bookmarks));
                
                // Mettre à jour le bouton
                const btn = document.querySelector('.bookmark-btn');
                if(btn) {
                    btn.innerHTML = '<i class="fas fa-check"></i> Sauvegardé';
                    btn.style.backgroundColor = 'var(--success-color, #28a745)';
                    btn.style.color = 'white';
                    btn.disabled = true;
                }
                
                // Notification
                showNotification('Article sauvegardé avec succès !');
            } else {
                // Retirer des signets
                bookmarks.splice(existingIndex, 1);
                localStorage.setItem('newsBookmarks', JSON.stringify(bookmarks));
                
                // Mettre à jour le bouton
                const btn = document.querySelector('.bookmark-btn');
                if(btn) {
                    btn.innerHTML = '<i class="fas fa-bookmark"></i> Sauvegarder';
                    btn.style.backgroundColor = '';
                    btn.style.color = '';
                }
                
                showNotification('Article retiré des signets');
            }
        };
        
        // Vérifier si l'article est déjà sauvegardé
        const newsId = <?php echo $news['news_id']; ?>;
        const bookmarks = JSON.parse(localStorage.getItem('newsBookmarks')) || [];
        const isBookmarked = bookmarks.some(b => b.id === newsId);
        
        if(isBookmarked) {
            const btn = document.querySelector('.bookmark-btn');
            if(btn) {
                btn.innerHTML = '<i class="fas fa-check"></i> Sauvegardé';
                btn.style.backgroundColor = 'var(--success-color, #28a745)';
                btn.style.color = 'white';
            }
        }
        
        // Fonction de notification
        function showNotification(message) {
            // Créer l'élément de notification
            const notification = document.createElement('div');
            notification.className = 'notification';
            notification.textContent = message;
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: var(--primary-color);
                color: white;
                padding: 15px 25px;
                border-radius: 8px;
                box-shadow: 0 5px 15px rgba(0,0,0,0.2);
                z-index: 10000;
                animation: slideInRight 0.3s ease;
            `;
            
            document.body.appendChild(notification);
            
            // Retirer après 3 secondes
            setTimeout(() => {
                notification.style.animation = 'slideOutRight 0.3s ease';
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 3000);
        }
        
        // Gestion du formulaire de newsletter
        const subscribeForm = document.getElementById('sidebarSubscribeForm');
        if(subscribeForm) {
            subscribeForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const email = this.querySelector('input[type="email"]').value;
                
                // Validation basique
                if(validateEmail(email)) {
                    // Simulation d'envoi
                    this.querySelector('button').innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
                    
                    setTimeout(() => {
                        this.querySelector('button').innerHTML = '<i class="fas fa-check"></i> Inscrit';
                        this.querySelector('button').style.backgroundColor = '#28a745';
                        this.querySelector('input[type="email"]').value = '';
                        
                        showNotification('Merci pour votre inscription à la newsletter !');
                        
                        // Réinitialiser après 3 secondes
                        setTimeout(() => {
                            this.querySelector('button').innerHTML = '<i class="fas fa-paper-plane"></i> S\'abonner';
                            this.querySelector('button').style.backgroundColor = '';
                        }, 3000);
                    }, 1500);
                } else {
                    showNotification('Veuillez entrer une adresse email valide.');
                }
            });
        }
        
        // Validation d'email
        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }
        
        // Incrémenter le compteur de vues
        function incrementViewCount() {
            const viewCountElement = document.getElementById('viewCount');
            if(viewCountElement) {
                let currentCount = parseInt(viewCountElement.textContent);
                currentCount++;
                viewCountElement.textContent = currentCount;
                
                // Animation
                viewCountElement.style.transform = 'scale(1.2)';
                viewCountElement.style.color = 'var(--primary-color)';
                
                setTimeout(() => {
                    viewCountElement.style.transform = 'scale(1)';
                    viewCountElement.style.color = '';
                }, 300);
            }
        }
        
        // Simuler l'incrémentation des vues
        setTimeout(incrementViewCount, 2000);
        
        // Animation des éléments au chargement
        const articleElements = document.querySelectorAll('.news-article, .news-navigation, .related-news');
        articleElements.forEach((element, index) => {
            element.style.opacity = '0';
            element.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                element.style.transition = 'all 0.5s ease';
                element.style.opacity = '1';
                element.style.transform = 'translateY(0)';
            }, index * 200);
        });
        
        // Animation des catégories
        const categoryTags = document.querySelectorAll('.category-tag');
        categoryTags.forEach(tag => {
            tag.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px) rotate(2deg)';
            });
            
            tag.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) rotate(0)';
            });
        });
    });
</script>

<?php 
require_once 'includes/footer.php'; 
?>