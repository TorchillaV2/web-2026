<?php
$db = new mysqli('localhost', 'root', '1One.Five.Fifteen15', 'blog1');

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
    ORDER BY 
        p.publishDate DESC
";

$result = $db->query($sql);
$posts = [];

if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $posts[] = [
            'id'          => $row['id'],
            'authorName'  => $row['fullName'],
            'avatarUrl'   => './' . $row['avatarUrl'], 
            'photoUrl'    => './' . $row['imageUrl'],  
            'description' => $row['content'],
            'time'        => $row['publishDate'],
            'like'        => '💔' . $row['likesCount'] 
        ];
    } 
} 
$db->close();
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
