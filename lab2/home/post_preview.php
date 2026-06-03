<div class="news">
    <div class="news-top">
        <img class="avatar" src="<?= $post['avatarUrl'] ?>" alt="avatar">
        <span class="avatar-name"><?= $post['authorName'] ?></span>
        <img class="edit" src="./edit.png" alt="edit">
    </div>
    
    <div class="news-photo" style="position: relative;">
        <div class="photo-indicator">1 / <?= count($post['photos']) ?></div>
    
        <div class="slider-wrapper">
            <a href="post.php?id=<?= $post['id'] ?>">
                <?php if (!empty($post['photos'])): ?>
                    <?php foreach ($post['photos'] as $index => $photoUrl): ?>
                        <img class="photo" src="<?= $photoUrl ?>" alt="photo" style="display: <?= $index === 0 ? 'block' : 'none' ?>;">
                    <?php endforeach; ?>
                <?php else: ?>
                    <?php endif; ?>
            </a>
        </div>
    
        <img class="photo-slider-left slider-btn-prev" src="./left-slider.png" alt="prev">
        <img class="photo-slider-right slider-btn-next" src="./right-slider.png" alt="next">
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