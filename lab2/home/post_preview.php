<div class="news">
    <div class="news-top">
        <img class="avatar" src="<?= $post['avatarUrl'] ?>" alt="avatar">
        <span class="avatar-name"><?= $post['authorName'] ?></span>
        <img class="edit" src="./edit.png" alt="edit">
    </div>
    
    <div class="news-photo">
        <img class="photo-indicator" src="./indicator.png" alt="indicator">
        <a href="post.php?id=<?= $post['id'] ?>">
            <img class="photo" src="<?= $post['photoUrl'] ?>" alt="photo">
        </a>
        <img class="photo-slider-left" src="./left-slider.png" alt="slide">
        <img class="photo-slider-right" src="./right-slider.png" alt="slide">
    </div>
    
    <div class="like">
        <button class="like_button" type="like">
        <?= $post['like'] ?>
        </button>
    </div>
    <div class="news-bottom">
        <p class="bottom-description">
            <?= $post['description'] ?>
        </p>
        <span class="bottom-more">ещё</span>
        <span class="bottom-time"><?= $post['time'] ?></span>
    </div>
</div>