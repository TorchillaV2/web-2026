document.addEventListener('DOMContentLoaded', () => {
    const posts = document.querySelectorAll('.news');

    posts.forEach(post => {
        const images = post.querySelectorAll('.slider-wrapper .photo');
        const btnPrev = post.querySelector('.slider-btn-prev');
        const btnNext = post.querySelector('.slider-btn-next');
        const indicator = post.querySelector('.photo-indicator');

        if (images.length <= 1) {
            if (btnPrev) btnPrev.style.display = 'none';
            if (btnNext) btnNext.style.display = 'none';
            if (indicator) indicator.style.display = 'none';
            return; 
        }

        let currentIndex = 0;

        const updateFeedSlider = () => {
            images.forEach((img, index) => {
                img.style.display = index === currentIndex ? 'block' : 'none';
            });
            if (indicator) {
                indicator.textContent = `${currentIndex + 1} / ${images.length}`;
            }
        };

        if (btnNext) {
            btnNext.addEventListener('click', (e) => {
                e.preventDefault(); 
                currentIndex = (currentIndex + 1) % images.length;
                updateFeedSlider();
            });
        }

        if (btnPrev) {
            btnPrev.addEventListener('click', (e) => {
                e.preventDefault(); 
                currentIndex = (currentIndex - 1 + images.length) % images.length;
                updateFeedSlider();
            });
        }

        updateFeedSlider();
    });
});