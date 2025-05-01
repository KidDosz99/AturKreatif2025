/* setup.sql - Skrip untuk setup database */
-- Buat database jika belum ada
CREATE DATABASE IF NOT EXISTS sqli_ctf;
USE sqli_ctf;

-- Buat jadual users
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
);

-- Masukkan pengguna dummy
INSERT INTO users (username, password) VALUES ('admin', 'a4dm!n+123');