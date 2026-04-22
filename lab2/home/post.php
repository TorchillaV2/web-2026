<?php

$postId = isset($_GET['id']) ? (int) $_GET['id'] : null;

$post = [
    'id' => 1,
    'authorName' => 'Ваня Денисов',
    'avatarUrl' => './Avatar.png',
    'photoUrl' => './photo.png',
    'description' => 'Так красиво сегодня на улице! Настоящая зима)) Вспоминается Бродский: «Поздно ночью, в уснувшей долине, на самом дне, в городке, занесенном снегом по ручку двери...»',
    'time' => '2 часа назад',
    'like' => '💔210',
];

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