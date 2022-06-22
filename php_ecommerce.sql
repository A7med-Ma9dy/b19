-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 22, 2022 at 11:01 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `street` varchar(255) NOT NULL,
  `building` varchar(255) NOT NULL,
  `floor` varchar(255) NOT NULL,
  `flat` varchar(100) NOT NULL,
  `note` tinyint(1) DEFAULT NULL COMMENT '0=> not active, 1=> active',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `verification_code` int(6) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `gender` varchar(1) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(32) NOT NULL,
  `name_en` varchar(32) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.png',
  `status` tinyint(1) DEFAULT 1 COMMENT '1=> active, 0=> not active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name_ar`, `name_en`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'سامسونج', 'Samsung', 'samsung.png', 1, '2021-11-18 07:10:26', '2021-11-18 07:10:26'),
(2, 'ديل', 'DELL', 'dell.png', 1, '2021-11-18 07:10:26', '2021-11-18 07:10:26'),
(3, 'لينوفو', 'Lenovo', 'lenovo.png', 1, '2021-11-18 07:10:26', '2021-11-18 07:10:26'),
(4, 'ابل', 'apple', 'apple.png', 1, '2021-11-18 07:10:26', '2021-11-18 07:10:26'),
(5, 'oppo', 'oppo', 'oppo.png', 1, '2021-11-24 02:57:47', '2021-11-24 02:57:47'),
(6, 'lg', 'lg', 'lg.png', 1, '2021-11-24 02:57:47', '2021-11-24 02:57:47'),
(7, 'HP', 'HP', 'hp.png', 1, '2022-02-23 07:24:06', '2022-02-23 07:24:06'),
(8, 'ASUS', 'ASUS', 'asus.png', 1, '2022-02-23 07:24:06', '2022-02-23 07:24:06');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(32) NOT NULL,
  `name_ar` varchar(32) NOT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1=> active, 0=> not active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `image` varchar(255) NOT NULL DEFAULT 'defualt.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_en`, `name_ar`, `status`, `created_at`, `updated_at`, `image`) VALUES
(1, 'electorinics', 'ادوات كهربائية', 1, '2021-11-17 08:05:23', '2021-11-17 08:10:48', 'default.png'),
(2, 'kitchen', 'مطبخ', 1, '2021-11-18 07:54:51', '2021-11-18 07:54:51', 'default.png'),
(3, 'supermarket', 'سوبرماركت', 1, '2022-02-23 05:26:47', '2022-02-23 05:26:47', 'default.png'),
(4, 'fashion', 'موضة وازياء', 1, '2022-02-23 05:26:47', '2022-02-23 05:26:47', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(32) NOT NULL,
  `name_ar` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1=> active, 0=> not active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` bigint(6) DEFAULT NULL,
  `discount` decimal(4,2) NOT NULL,
  `discount_type` varchar(255) NOT NULL,
  `max_discount` decimal(4,2) DEFAULT NULL,
  `mini_order` int(1) NOT NULL,
  `number_useage` int(1) DEFAULT NULL,
  `max_num_of_useage` int(1) NOT NULL,
  `start_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `favs`
--

CREATE TABLE `favs` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `usr_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_en` text NOT NULL,
  `title_ar` text NOT NULL,
  `start_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `end_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `discount` decimal(4,2) NOT NULL,
  `discount_type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `offer_product`
--

CREATE TABLE `offer_product` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `offer_id` bigint(20) UNSIGNED NOT NULL,
  `price_after_discount` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total_price` decimal(7,2) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0=> not active, 1=> active',
  `delivered_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `cancelled_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `address_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `quantity` smallint(3) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(512) NOT NULL,
  `name_ar` varchar(512) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `quantity` smallint(3) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL COMMENT '1=> avtive , 0=> not avtive',
  `image` varchar(255) NOT NULL,
  `code` bigint(20) NOT NULL,
  `desc_en` longtext NOT NULL,
  `desc_ar` longtext NOT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name_en`, `name_ar`, `price`, `quantity`, `status`, `image`, `code`, `desc_en`, `desc_ar`, `brand_id`, `subcategory_id`, `created_at`, `updated_at`) VALUES
(1, 'laptop', 'لابتوب', '250.00', 1, 0, 'dell.jpg', 12345, 'x', 'ش', 1, 1, '2021-11-18 05:13:16', '2022-06-22 08:03:17'),
(2, 'a 50', 'a 50', '4000.00', 1, 1, 'a50.jpg', 321244, 'x', 'ش', 1, 2, '2021-11-18 05:13:16', '2022-06-22 08:02:51'),
(3, 'tv 55 inch', 'tv 55 inch', '10000.00', 1, 1, 'tv55.jpg', 55525, 'x', 'ش', 1, 4, '2021-11-18 05:13:16', '2022-06-22 05:25:19'),
(4, 'MacBook PRo', 'MacBook PRo', '40000.00', 2, 1, 'mac.jpg', 52524, 'x', 'ش', 4, 1, '2021-09-22 00:07:40', '2022-06-22 05:25:19'),
(5, 's21', 's21', '15000.00', 10, 1, 's21.jpg', 123213, 'x', 'ش', 1, 2, '2021-09-22 00:07:40', '2022-06-22 05:25:19'),
(6, 'iphone 13', 'iphone 13', '25000.00', 20, 1, 'iphone13.jpg', 12525, 'x', 'ش', 4, 2, '2021-09-22 00:07:40', '2022-06-22 05:25:19'),
(7, 'Lenovo Lapttop', 'Lenovo Lapttop', '17000.00', 1, 1, 'lenovo.jpg', 7754, 'x', 'ش', 3, 1, '2021-09-22 00:07:40', '2022-06-22 05:25:19'),
(8, 'Dell Laptop', 'Dell Laptop', '20000.00', 0, 1, 'dell.jpg', 42424, 'x', 'ش', 2, 1, '2021-09-22 00:07:40', '2022-06-22 05:25:19'),
(9, 'Lg TV', 'Lg TV', '12000.00', 3, 1, 'lg.jpg', 5545, 'x', 'ش', 6, 4, '2021-09-22 00:07:40', '2022-06-22 05:25:19'),
(10, 'Samsung Tv', 'Samsung Tv', '15000.00', 7, 1, 'samsung.jpg', 7777, 'x', 'ش', 1, 4, '2021-09-22 00:07:40', '2022-06-22 05:25:19'),
(11, 'Chepsi', 'Chepsi', '10.00', 0, 1, 'chepsi.jpg', 4247, 'x', 'ش', NULL, 5, '2021-09-22 00:07:40', '2022-06-22 05:25:19'),
(12, 'samsung a70', 'سامسونج 70', '2500.00', 5, 1, 'a50.jpg', 29112021, 'x', 'ش', 1, 2, '2021-11-29 02:21:36', '2022-06-22 08:52:41'),
(13, 'feta cheese', 'جبنة فيتا', '5.00', 100, 1, 'feta.png', 1100, 'x', 'ش', NULL, 7, '2022-02-23 05:11:17', '2022-06-22 05:25:19'),
(14, 'Reno 6', 'Reno 6', '10000.00', 5, 1, 'reno.jpg', 4444, 'x', 'ش', 5, 2, '2021-09-22 00:07:40', '2022-06-22 05:25:19');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(50) NOT NULL,
  `name_ar` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1=> active, 0=> not active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `city_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `rate` tinyint(1) NOT NULL DEFAULT 0,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`user_id`, `product_id`, `rate`, `comment`, `created_at`, `updated_at`) VALUES
(5, 4, 1, NULL, '2022-06-22 08:58:30', NULL),
(5, 6, 1, 'bad', '2022-06-22 08:58:30', NULL),
(6, 5, 3, NULL, '2022-06-22 08:58:30', '2022-06-22 08:59:56'),
(8, 4, 5, 'gamed', '2022-06-22 08:57:13', NULL),
(8, 5, 1, NULL, '2022-06-22 08:57:13', '2022-06-22 08:59:29'),
(8, 6, 1, NULL, '2022-06-22 08:57:13', '2022-06-22 08:59:59');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(32) NOT NULL,
  `name_ar` varchar(32) NOT NULL,
  `status` tinyint(1) DEFAULT 1 COMMENT '1=> active, 0=> not active',
  `image` varchar(255) NOT NULL DEFAULT 'defualt.png',
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name_en`, `name_ar`, `status`, `image`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'laptops', 'لابتوبات', 1, 'default.png', 1, '2021-11-18 07:09:38', '2022-06-22 08:50:00'),
(2, 'mobiles', 'موبايلات', 1, 'default.png', 1, '2021-11-18 07:09:38', '2022-06-22 08:50:02'),
(3, 'desktop', 'كمبيوتر', 1, 'default.png', 1, '2021-11-18 07:09:38', '2022-06-22 08:50:03'),
(4, 'tv', 'تلفزيونات', 1, 'default.png', 1, '2021-11-18 07:13:41', '2022-06-22 08:50:04'),
(5, 'chepsi', 'شيبسي', 1, 'default.png', 3, '2021-11-24 02:56:26', '2022-06-22 08:50:06'),
(6, 'makeup', 'ادوات تجميل', 1, '1.png', 4, '2022-02-23 05:28:06', '2022-06-22 08:50:07'),
(7, 'cheese', 'جبن', 1, 'cheese.png', 3, '2022-02-23 07:11:01', '2022-06-22 08:50:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verification_code` int(6) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1 COMMENT '1=> active, 0=> blocked, 2=> banned',
  `image` varchar(64) NOT NULL DEFAULT 'default.jpg',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `gender` varchar(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `password`, `verification_code`, `status`, `image`, `email_verified_at`, `gender`, `created_at`, `updated_at`) VALUES
(5, 'Asmaa', 'Husseny', 'asmaa.husseny@gmail.com', '01000498481', '$2y$10$J3mgJcP5jV5TfbWxV3MtV.HkxPfHEw1eVYhfF7oyMOTjtW2lqSPSO', 914514, 1, '62b1c7c840198.png', '2022-06-20 09:55:06', 'm', '2022-06-20 09:36:48', '2022-06-21 13:29:44'),
(6, 'mohamed', 'Husseny', 'mohamed.husseny@gmail.com', '01000498482', '$2y$10$S1FBNo7WzhX10g0lK5t.UO2DfmGB0pDPIo12E6ugcRueXm0.YQn8O', 754117, 1, 'default.jpg', NULL, 'm', '2022-06-20 11:26:45', '2022-06-21 12:00:56'),
(8, 'galal', 'husseny', 'galal.husseny@gmail.com', '01000498488', '$2y$10$tsWyC/Prj5LJetf.yFnU/e.FoRhM9F0BWuR10ykscOnpqpcZ2RmJu', 81068, 1, '62b1c796b9dc8.png', '2022-06-21 11:41:35', 'f', '2022-06-21 11:36:54', '2022-06-21 13:28:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_id` (`region_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `carts_ibfk_1` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_id` (`order_id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `favs`
--
ALTER TABLE `favs`
  ADD PRIMARY KEY (`product_id`,`usr_id`) USING BTREE,
  ADD KEY `usr_id` (`usr_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer_product`
--
ALTER TABLE `offer_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `offer_id` (`offer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `subcategory_id` (`subcategory_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`user_id`,`product_id`) USING BTREE,
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favs`
--
ALTER TABLE `favs`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offer_product`
--
ALTER TABLE `offer_product`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`),
  ADD CONSTRAINT `addresses_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `coupons`
--
ALTER TABLE `coupons`
  ADD CONSTRAINT `coupons_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `favs`
--
ALTER TABLE `favs`
  ADD CONSTRAINT `favs_ibfk_1` FOREIGN KEY (`usr_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `favs_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `offer_product`
--
ALTER TABLE `offer_product`
  ADD CONSTRAINT `offer_product_ibfk_1` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`),
  ADD CONSTRAINT `offer_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `regions`
--
ALTER TABLE `regions`
  ADD CONSTRAINT `regions_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
