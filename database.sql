-- =============================================
-- Database: quannhau
-- Quán Nhậu Anh Em - Admin Management System
-- =============================================

SET NAMES utf8mb4;
CREATE DATABASE IF NOT EXISTS `quannhau` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `quannhau`;

-- Bảng danh mục (dùng chung cho sản phẩm & tin tức)
CREATE TABLE IF NOT EXISTS `categories` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `slug` VARCHAR(255),
  `type` ENUM('product', 'news') NOT NULL DEFAULT 'product',
  `sort_order` INT DEFAULT 0,
  `is_active` TINYINT(1) DEFAULT 1,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Bảng sản phẩm (món ăn / đồ uống)
CREATE TABLE IF NOT EXISTS `products` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `category_id` INT,
  `name` VARCHAR(255) NOT NULL,
  `slug` VARCHAR(255),
  `price` INT DEFAULT 0,
  `img_thumbnail` VARCHAR(500),
  `overview` TEXT,
  `content` TEXT,
  `is_active` TINYINT(1) DEFAULT 1,
  `sort_order` INT DEFAULT 0,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Bảng tin tức / bài viết
CREATE TABLE IF NOT EXISTS `news` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `category_id` INT,
  `title` VARCHAR(500) NOT NULL,
  `slug` VARCHAR(500),
  `img_thumbnail` VARCHAR(500),
  `overview` TEXT,
  `content` TEXT,
  `is_active` TINYINT(1) DEFAULT 1,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Bảng settings (lưu link contact, thông tin chung)
CREATE TABLE IF NOT EXISTS `settings` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `setting_key` VARCHAR(100) UNIQUE NOT NULL,
  `setting_value` TEXT,
  `setting_label` VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert default settings
INSERT INTO `settings` (`setting_key`, `setting_value`, `setting_label`) VALUES
('zalo_link', '', 'Link Zalo'),
('facebook_link', '', 'Link Facebook'),
('tiktok_link', '', 'Link TikTok'),
('instagram_link', '', 'Link Instagram'),
('youtube_link', '', 'Link YouTube'),
('phone_datban', '0812282282', 'SĐT Đặt bàn'),
('phone_datship', '0835129999', 'SĐT Đặt ship'),
('zalo_oa_id_datban', '', 'Zalo OA ID hoặc SĐT Đặt bàn'),
('zalo_oa_id_datship', '', 'Zalo OA ID hoặc SĐT Đặt ship')
ON DUPLICATE KEY UPDATE `setting_label` = VALUES(`setting_label`);

-- Insert sample categories
INSERT INTO `categories` (`name`, `slug`, `type`, `sort_order`) VALUES
('Đồ ăn', 'do-an', 'product', 1),
('Đồ uống', 'do-uong', 'product', 2),
('Món nướng', 'mon-nuong', 'product', 3),
('Ưu đãi', 'uu-dai', 'news', 1),
('Tin tức', 'tin-tuc', 'news', 2),
('Sự kiện', 'su-kien', 'news', 3);

-- Bảng tài khoản admin / người dùng
CREATE TABLE IF NOT EXISTS `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(100) UNIQUE NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `role` VARCHAR(50) DEFAULT 'admin',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Chèn tài khoản admin mặc định: admin / admin123
INSERT INTO `users` (`username`, `password`, `role`) VALUES
('admin', '$2y$10$wKzW6L71P7u13Z/2q1/B7ex.oWqjA8.s2U7w407h63xN8Xy9GZ/4G', 'admin')
ON DUPLICATE KEY UPDATE `password` = VALUES(`password`);

