-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 03, 2025 at 04:51 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc-oop`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `name`, `img`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'admin ', 'storage/uploads/banners/1739939063-anh4.jpg', 1, '2025-02-19 03:13:29', '2025-02-18 21:24:23'),
(2, 'Cá cảnh', 'storage/uploads/banners/1739939072-anh8.jpg', 0, '2025-02-19 04:24:32', '2025-02-19 04:24:32'),
(3, 'Cá cảnh', 'storage/uploads/banners/1740471809-anh6.jpg', 0, '2025-02-25 08:23:29', '2025-02-25 08:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `img`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 'Cá cảnh', 'storage/uploads/categories/1739888793-anh6.jpg', 1, '2025-02-18 14:26:33', '2025-02-18 14:26:33'),
(4, 'Cá ngừ', 'storage/uploads/categories/1739888817-anh4.jpg', 1, '2025-02-18 14:26:57', '2025-02-22 01:36:37');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `img_thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `overview` text NOT NULL,
  `content` longtext NOT NULL,
  `price` double(10,2) NOT NULL,
  `price_sale` double(10,2) DEFAULT NULL,
  `is_sale` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_show_home` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `img_thumbnail`, `overview`, `content`, `price`, `price_sale`, `is_sale`, `is_active`, `is_show_home`, `created_at`, `updated_at`) VALUES
(1, 4, 'Cá cảnh', 'cá-cảnh-Y3t1MP', 'storage/uploads/products/1740213528-anh2.jpg', '        sdfghj\r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n ', '        sdfghjk\r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n ', 1230000.00, 1000000.00, 0, 0, 0, '2025-02-21 10:53:30', '2025-02-22 01:38:48'),
(2, 2, 'Cá cảnh', 'cá-cảnh-GhlfVF', 'storage/uploads/products/1740135327-ao_hoodie.jpg', ' dfghj\r\n ', ' \r\n sdfgh', 135000.00, 100000.00, 0, 0, 0, '2025-02-21 10:55:27', '2025-02-21 10:55:27'),
(3, 2, 'admin', 'admin-IZGAdj', 'storage/uploads/products/1740135542-anh9.jpg', '  \r\n dfghj\r\n ', '  sdfghnjb\r\n \r\n ', 400000.00, 349000.00, 0, 0, 0, '2025-02-21 10:59:02', '2025-02-21 10:59:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `type` enum('admin','client') NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `type`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$HpVnpbNjZ6njzN5gap81q.att063zdnwI7AU2h6dqSxTcv.E5Ku8y', 'admin', 'storage/uploads/users/1739939215-anh2.jpg', '2025-02-19 04:26:55', '2025-02-19 04:26:55'),
(2, 'Cá cản', 'doanhhv11@gmail.com', '$2y$10$rnLoOGHQI5QvjNh7kIO8GODdS33ICeamlAoje0LVmbEqdNoeGQ9fe', 'client', 'storage/uploads/users/1739939245-anh9.jpg', '2025-02-19 04:27:25', '2025-02-25 00:28:43'),
(3, 'admin17', 'admin17@gmail.com', '$2y$10$qWyxwmuhWkSJOIYUED/87.3Vdrlc6D/fvvBmmk2JDM3HMWwgzvjgS', 'client', 'storage/uploads/users/1740213714-anh4.jpg', '2025-02-19 11:22:19', '2025-02-22 01:41:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
