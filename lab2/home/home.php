<?php

$posts = [
    [
        'id' => 1,
        'authorName' => 'Ваня Денисов',
        'avatarUrl' => './Avatar.png',
        'photoUrl' => './photo.png',
        'description' => 'Так красиво сегодня на улице! Настоящая зима)) Вспоминается Бродский: «Поздно ночью, в уснувшей долине, на самом дне, в городке, занесенном снегом по ручку двери...»',
        'time' => '2 часа назад',
        'like' => '💔210',
    ],
    [
        'id'=> 2,
        'authorName' => 'Лиза Дёмина',
        'avatarUrl' => './avatar2.png',
        'photoUrl' => './photo2.jpg',
        'description' => 'Какой прелестный день!',
        'time' => '5 часов назад',
        'like' => '💔67',
    ],
];

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Основная лента</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div class="header-items">
        <a href="home.php">
            <img class="item-home" src="./item-home.png" alt="To home page">
        </a>
        
        <a href="profile/profile.html">
            <img class="item-man" src="./item-man.png" alt="To profile">
        </a>
        
        <a href="#">
            <img class="item-plus" src="./item-plus.png" alt="Plus">
        </a>
    </div>
    <?php
    foreach ($posts as $post) {
        include 'post_preview.php';
    }
    ?>
</body>
</html>
