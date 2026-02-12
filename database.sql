
CREATE DATABASE ci3_ecommerce;
USE ci3_ecommerce;

CREATE TABLE products (
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(150),
 price DECIMAL(10,2)
);

CREATE TABLE product_images (
 id INT AUTO_INCREMENT PRIMARY KEY,
 product_id INT,
 image VARCHAR(255)
);

CREATE TABLE carts (
 id INT AUTO_INCREMENT PRIMARY KEY,
 user_id INT,
 product_id INT,
 quantity INT
);
