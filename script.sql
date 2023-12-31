DROP DATABASE IF EXISTS recipes;
CREATE DATABASE recipes; 
USE recipes;

CREATE TABLE users(
id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
username VARCHAR(15) NOT NULL,
email VARCHAR(80) NOT NULL,
password VARCHAR(80) NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
last_login TIMESTAMP
status ENUM('on', 'off') DEFAULT 
);


CREATE TABLE recipes (
id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
user_id INT,
title VARCHAR(80) NOT NULL,
content TEXT NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
status ENUM('on', 'off')
FOREIGN KEY (user_id) REFERENCES users (id),
);