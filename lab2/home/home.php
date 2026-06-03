<?php
$db = new mysqli('localhost', 'root', '1One.Five.Fifteen15', 'blog1');

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
    GROUP BY
        p.id
    ORDER BY 
        p.publishDate DESC
";

$result = $db->query($sql);
$posts = [];

if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        
        $photoArray = [];
        if (!empty($row['images'])) {
            $photoPaths = explode(',', $row['images']);
            foreach ($photoPaths as $path) {
                $photoArray[] = './' . $path;
            }
        }

        $posts[] = [
            'id'          => $row['id'],
            'authorName'  => $row['fullName'],
            'avatarUrl'   => './' . $row['avatarUrl'], 
            'photos'      => $photoArray,
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
    foreach ($posts as $index => $post) {
        include 'post_preview.php';
    }   
    ?>
    
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