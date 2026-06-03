<?php
$postId = isset($_GET['id']) ? (int) $_GET['id'] : null;

$db = new mysqli('127.0.0.1', 'root', '1One.Five.Fifteen15', 'blog1');

$sql = "
    SELECT 
        p.id,
        p.likesCount, 
        p.content, 
        p.publishDate, 
        u.fullName, 
        u.avatarUrl,
        GROUP_CONCAT(pi.imageUrl SEPARATOR ',') as images
    FROM 
        post p 
    JOIN 
        user u ON p.authorId = u.id 
    LEFT JOIN
        post_image pi ON p.id = pi.postId
    WHERE 
        p.id = $postId
    GROUP BY
        p.id
";

$result = $db->query($sql);
$post = [];

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    $photoArray = [];
    if (!empty($row['images'])) {
        $photoPaths = explode(',', $row['images']);
        foreach ($photoPaths as $path) {
            $photoArray[] = './' . $path;
        }
    }

    $post = [
        'id'          => $row['id'],
        'authorName'  => $row['fullName'],
        'avatarUrl'   => './' . $row['avatarUrl'], 
        'photos'      => $photoArray,  
        'description' => $row['content'],
        'time'        => $row['publishDate'],
        'like'        => '💔' . $row['likesCount'] 
    ];
} else {
    die('Пост с таким ID не существует в базе данных.');
}

$db->close();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Страница поста</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div class="header-items">
        <a href="home.php">
            <img class="item-home" src="./item-home.png" alt="На главную страницу">
        </a>
    </div>
    
    <div class="news">
        <div class="news-top">
            <img class="avatar" src="<?= $post['avatarUrl'] ?>" alt="avatar">
            <span class="avatar-name"><?= $post['authorName'] ?></span>
        </div>
        
        <div class="news-photo" style="position: relative;">
            <div class="photo-indicator">1 / <?= count($post['photos']) ?></div>
            
            <div class="slider-wrapper">
                <?php if (!empty($post['photos'])): ?>
                    <?php foreach ($post['photos'] as $index => $photoUrl): ?>
                        <img class="photo" src="<?= $photoUrl ?>" alt="photo" style="display: <?= $index === 0 ? 'block' : 'none' ?>;">
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            
            <img class="photo-slider-left slider-btn-prev" src="./left-slider.png" alt="prev">
            <img class="photo-slider-right slider-btn-next" src="./right-slider.png" alt="next">
        </div>
        
        <div class="like">
            <button class="like_button" type="button">
                <?= $post['like'] ?>
            </button>
        </div>
        
        <div class="news-bottom">
            <p class="bottom-description">
                <?= $post['description'] ?>
            </p>
            <span class="bottom-time"><?= $post['time'] ?></span>
        </div>
    </div>

    <div id="imageModal" class="modal-overlay" style="display: none;">
        <div class="modal-content">
            <span class="modal-close">&times;</span>
            <div class="modal-indicator">1 из 3</div>
            <div class="modal-slider-container">
                <img class="modal-slider-btn modal-btn-prev" src="./left-slider.png" alt="prev">
                <img id="modalImage" src="" alt="modal image">
                <img class="modal-slider-btn modal-btn-next" src="./right-slider.png" alt="next">
            </div>
        </div>
    </div>

    <script src="slider.js"></script>
</body>
</html>