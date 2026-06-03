USE blog1;
INSERT INTO
    user (
        fullName,
        avatarUrl
    ) 
VALUES (
    'Ваня Денисов',
    'Avatar.png'
);

INSERT INTO
    post (
        authorId,
        imageUrl,
        likesCount,
        content
    ) 
VALUES (
    1,
    'photo.png',
    210,
    'Так красиво сегодня на улице! Настоящая зима)) Вспоминается Бродский: «Поздно ночью, в уснувшей долине, на самом дне, в гор...»'
);

INSERT INTO
    user (
        fullName,
        avatarUrl
    ) 
VALUES (
    'Лиза Дёмина',
    'avatar2.png'
);

INSERT INTO
    post (
        authorId,
        imageUrl,
        likesCount,
        content
    ) 
VALUES (
    2,
    'photo2.jpg',
    67,
    'Какой прелестный день!'
);
SELECT * FROM user;

INSERT INTO
    user (
        fullName,
        avatarUrl
    ) 
VALUES (
    'Дмитрий Дёминов',
    'Dima.jpg'
);

INSERT INTO
    post (
        authorId,
        imageUrl,
        likesCount,
        content
    ) 
VALUES (
    3,
    'Dima.jpg',
    777,
    'Да это ж я)))!!!'
);
USE blog1;
SELECT * FROM post;
DELETE FROM post WHERE id = 7;
DELETE FROM post WHERE id IN (8, 9);
USE blog1;
CREATE TABLE post_image (
    id INT AUTO_INCREMENT PRIMARY KEY,
    postId INT NOT NULL,
    imageUrl VARCHAR(255) NOT NULL,
    FOREIGN KEY (postId) REFERENCES post(id) ON DELETE CASCADE
);
INSERT INTO post_image (postId, imageUrl)
SELECT id, imageUrl FROM post WHERE imageUrl IS NOT NULL AND imageUrl != '';
SELECT * FROM post_image;
ALTER TABLE post DROP COLUMN imageUrl;
SELECT * FROM post;
INSERT INTO post_image (postId, imageUrl) 
VALUES 
    (1, 'images/dop1.jpg'),
    (2, 'images/dop2.jpg'),
    (3, 'images/dop3.jpg'),
    (3, 'images/dop3.jpg');



