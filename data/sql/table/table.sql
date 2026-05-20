CREATE DATABASE blog1;

USE blog1;

CREATE TABLE 
    user (
        id INT AUTO_INCREMENT PRIMARY KEY,
        fullName VARCHAR(255) NOT NULL,
        avatarUrl VARCHAR(255)
    );

CREATE TABLE 
    post (
        id INT AUTO_INCREMENT PRIMARY KEY,
        authorId INT NOT NULL,
        imageUrl VARCHAR(255) NOT NULL,
        likesCount INT DEFAULT 0,
        content TEXT,
        publishDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (authorId) REFERENCES user(id)
    );
    