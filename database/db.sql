-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2020 at 07:14 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `category_image` varchar(200) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `categories`
--

/*Data for the table `categories` */

insert  into `categories`(`category_id`,`category_name`,`description`,`is_active`,`created_date`,`category_image`,`path`) values (1,'goat','goatDesc',1,'2020-11-25 01:53:01','product-thumbnail.png','/category/category_gallery/1606251181_product-thumbnail.png');
-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `path` varchar(225) NOT NULL,
  `thumb` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `name`, `path`, `thumb`) VALUES
(15, '__opt__aboutcom__coeus__resources__content_migration__mnn__images__2017__01__cow-in-pasture-990e51c0b8da4e839195b85ca92aed9f.jpg', '/product/images/1605900747___opt__aboutcom__coeus__resources__content_migration__mnn__images__2017__01__cow-in-pasture-990e51c0b8da4e839195b85ca92aed9f.jpg', '/product/images/thumb_1605900747___opt__aboutcom__coeus__resources__content_migration__mnn__images__2017__01__cow-in-pasture-990e51c0b8da4e839195b85ca92aed9f.jpg'),
(16, 'brown-Guernsey-cow.jpg', '/product/images/1605900747_brown-guernsey-cow.jpg', '/product/images/thumb_1605900747_brown-guernsey-cow.jpg'),
(17, 'cow.jpg', '/product/images/1605900747_cow.jpg', '/product/images/thumb_1605900747_cow.jpg'),
(18, 'Cow_female_black_white.jpg', '/product/images/1605900747_cow_female_black_white.jpg', '/product/images/thumb_1605900747_cow_female_black_white.jpg'),
(19, 'cow-354428_1280.jpg', '/product/images/1605900747_cow-354428_1280.jpg', '/product/images/thumb_1605900747_cow-354428_1280.jpg'),
(20, 'cow-feature.jpg', '/product/images/1605900748_cow-feature.jpg', '/product/images/thumb_1605900748_cow-feature.jpg'),
(21, 'download.jpg', '/product/images/1605900748_download.jpg', '/product/images/thumb_1605900748_download.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2020_09_09_172352_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `color` varchar(100) DEFAULT NULL,
  `category` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `images` varchar(200) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `featured` int(11) NOT NULL DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

-- INSERT INTO `products` (`product_id`, `name`, `color`, `category`, `weight`, `price`, `description`, `images`, `active`, `featured`) VALUES
-- (1, 'asdasdasd', NULL, 2, 123123, 123123123, 'asdasdasd asdas d', '17', 1, 1),
-- (2, 'product two', '123123', 2, 11233, 123123123, 'dsad asd asda sdas da ds', '17', 1, 1),
-- (3, 'dasd asa', '12312', 2, 213, 123123, 'asdasdasd sada sda das d', '16', 1, 1),
-- (4, 'test', 'test', 2, 123123, 1231222, 'asd asdasda d', '16,17', 1, 1),
-- (5, 'test', '123123', 1, 11233, 1231213, 'asd ad ada ds', '17', 1, 1),
-- (6, '1231232', '123121', 2, 123123, 123123, 'asd asd as d', '17', 1, 1),
-- (7, 'asda dasd', 'asd', 2, 123, 12101, 'asd asdasd as d', '17', 1, 1),
-- (8, 'test', 'asasd a', 1, 123, 12312321, 'asd asd asdas das', '17', 1, 1);

insert  into `products`(`product_id`,`name`,`color`,`category`,`weight`,`price`,`description`,`images`,`active`,`featured`,`updated_at`,`created_at`) values (1,'newProduct11','grey1',5,45,2000000,'ProductDesc1','17',0,1,NULL,NULL),(3,'baba','white',1,213,280000,'babasesc','16',1,1,NULL,NULL),(4,'cat','whitw',4,2,50000,'cat desc','16,17',1,1,NULL,NULL),(5,'d','123123',1,11233,1231213,'asd ad ada ds','17',1,1,NULL,NULL),(6,'okokokok','123121',2,123123,123123,'okokok','17',1,1,NULL,NULL),(7,'f','asd',2,123,12101,'asd asdasd as d','17',1,1,NULL,NULL),(9,'newProduct11','grey1',5,45,2000000,'ProductDesc1','17',0,1,'2020-11-28 21:34:41','2020-11-28 21:34:41'),(10,'f','asd',2,123,12101,'asd asdasd as d','17',1,1,'2020-11-28 21:34:53','2020-11-28 21:34:53');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('gPUx7KT6VUDfbzZe2SLVohDe3ViJU9APgYcV4eTx', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.66 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicGhIMlFZQnFSbkt4b2VYRGVOOUs0U0VaVm9QdTZvdDdxcWJuRnVXZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHA6Ly9xdXJiYW5pLmxvY2FsL2NhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1606068133),
('TDX1Pj6osF8fRvavwsf1hNVYAHDAk7jF2t9IujmD', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.66 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiZUdPbU5WWGg1bjdhRzdTVzRmWFZVUjcwTkROejVmVHFKWjVpZThBRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9xdXJiYW5pLmxvY2FsL3Byb2ZpbGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkazNGc0EvNjBzcTdlVGlGSGRFMXl5ZWVLaHgybm5sN01ienNtZWdVOXVacUZ6RkVkcER1OGEiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJGszRnNBLzYwc3E3ZVRpRkhkRTF5eWVlS2h4Mm5ubDdNYnpzbWVnVTl1WnFGekZFZHBEdThhIjt9', 1606066087),
('ziKlLFTWtAK0qKESTROrVCUzZOR9pyW9wEnjCEh9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.66 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUVRUZGFSMkw2NlZVR1BJaDFwZmJpVTJOdHpBNUxyOXJ0aDJBMHlpNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9xdXJiYW5pLmxvY2FsL3Byb2R1Y3RzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1606061763);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `verification_hash` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `verified`, `email_verified_at`, `verification_hash`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'tasaduq', 'tasaduq@gmail.com', NULL, 1, NULL, NULL, '$2y$10$oJ1KKw5iXZcyGV0cFRjWaezE9SzFSTNfcFK8D8OcYhGZhgxdgYAcG', NULL, NULL, NULL, NULL, NULL, '2020-09-09 12:46:42', '2020-09-09 12:46:42'),
(2, 'Tasaduq H', 'taxaduq@live.com', 'admin', 1, NULL, NULL, '$2y$10$k3FsA/60sq7eTiFHdE1yyeeKhx2nnl7MbzsmegU9uZqFzFEdpDu8a', NULL, NULL, NULL, NULL, NULL, '2020-11-05 12:33:00', '2020-11-05 12:33:00'),
(3, 'tasaduq', 'tasaduq@yopmail.com', NULL, 0, NULL, NULL, '$2y$10$ddrGGFWrh1deAoSw4IL9zeDuIX1rPIEgd/FEqX3pGpDymL4qm5JZO', NULL, NULL, NULL, NULL, NULL, '2020-11-11 13:29:50', '2020-11-11 13:29:50'),
(4, 'test', 'test@test.test', NULL, 0, NULL, NULL, '$2y$10$V1Yrv4oTyFHmHLO95hyiy.SAeqYVEqd0v5TYMXDmve6EmhZjwTFyu', NULL, NULL, NULL, NULL, NULL, '2020-11-11 13:39:39', '2020-11-11 13:39:39'),
(5, 'taasduq', 'tasaduq1@yopmail.com', NULL, 0, NULL, NULL, '$2y$10$2p3ljj7L3TscqWm0pARKLOjkOp7s44jyAVyZOLoKST7QId48KiUza', NULL, NULL, NULL, NULL, NULL, '2020-11-12 12:12:07', '2020-11-12 12:12:07'),
(6, 'tasaduq', 'tasaduq12@yopmail.com', NULL, 0, NULL, NULL, '$2y$10$frQynrcKdR2P9ashm6cD0eGrlin4.9DefVizrPQkz1Gp3crcVFFPW', NULL, NULL, NULL, NULL, NULL, '2020-11-22 11:27:38', '2020-11-22 11:27:38'),
(7, 'tasaduq', 'tasaduq12222@yopmail.com', NULL, 0, NULL, NULL, '$2y$10$ecPKjLzMkiqjGYwHm3UXjumHERbuPhstgzfP1Bu17WHArkf9r7FJK', NULL, NULL, NULL, NULL, NULL, '2020-11-22 11:28:15', '2020-11-22 11:28:15'),
(8, 'tasaduq', 'tasaduq12222x@yopmail.com', NULL, 0, NULL, NULL, '$2y$10$aFuU1Xeuax8Kv3CVvbGj/.W6u3uy7Qvfwpy6TraqgnGAbq0W2lYJC', NULL, NULL, NULL, NULL, NULL, '2020-11-22 11:30:04', '2020-11-22 11:30:04'),
(9, 'tasaduq', 'tasaduasdasd@yopmail.com', NULL, 0, NULL, NULL, '$2y$10$0535GpO/kR4h4w7Rzvu8/.kBVjlBPOm/838BNmK7oT27nNJ6XcRi6', NULL, NULL, NULL, NULL, NULL, '2020-11-22 11:42:03', '2020-11-22 11:42:03'),
(10, 'tasaduq', 'tasaduasdasdasd@yopmail.com', NULL, 0, NULL, NULL, '$2y$10$kYUG..dxebUd4HsNwwdqvORJR0oDIQw8YPta.HJEDY0ikcI2OpUmy', NULL, NULL, NULL, NULL, NULL, '2020-11-22 11:42:35', '2020-11-22 11:42:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


CREATE TABLE `contact`(  
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(200),
  `email` VARCHAR(255),
  `phone` VARCHAR(255),
  `subject` VARCHAR(255),
  `message` TEXT,
  `addedon` TIMESTAMP NOT NULL,
  PRIMARY KEY (`id`)
);


-- --------------------------------------------------------

--
-- Table structure for table `preferences`
--

CREATE TABLE `preferences` (
  `id` int(11) NOT NULL,
  `eid_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `preferences`
--

INSERT INTO `preferences` (`id`, `eid_date`) VALUES
(1, '2021-07-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `preferences`
--
ALTER TABLE `preferences`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `preferences`
--
ALTER TABLE `preferences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;





ALTER TABLE `users` ADD `city` INT NULL AFTER `email`, ADD `address` TEXT NULL AFTER `city`, ADD `phone` TEXT NULL AFTER `address`;



--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_number` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_installments`
--

CREATE TABLE `order_installments` (
  `id` int(11) NOT NULL,
  `instalment_number` int(11) NOT NULL,
  `order_product_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 = paid 0 = unpaid',
  `amount` int(11) NOT NULL,
  `payment_date` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `no_of_installments` int(11) NOT NULL,
  `shipping` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_installments`
--
ALTER TABLE `order_installments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_installments`
--
ALTER TABLE `order_installments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
