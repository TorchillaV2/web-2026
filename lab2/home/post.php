<?php
$postId = isset($_GET['id']) ? (int) $_GET['id'] : null;

$db = new mysqli('127.0.0.1', 'root', '1One.Five.Fifteen15', 'blog1');

$sql = "
    SELECT 
        p.id,
        p.imageUrl, 
        p.likesCount, 
        p.content, 
        p.publishDate, 
        u.fullName, 
        u.avatarUrl 
    FROM 
        post p 
    JOIN 
        user u ON p.authorId = u.id 
    WHERE 
        p.id = $postId
";

$result = $db->query($sql);
$post = [];

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $post = [
        'id'          => $row['id'],
        'authorName'  => $row['fullName'],
        'avatarUrl'   => './' . $row['avatarUrl'], 
        'photoUrl'    => './' . $row['imageUrl'],  
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
        
        <div class="news-photo">
            <img class="photo" src="<?= $post['photoUrl'] ?>" alt="photo">
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
</body>
</html>