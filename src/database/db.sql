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


ALTER TABLE `orders` ADD `payment_method` BOOLEAN NOT NULL DEFAULT FALSE AFTER `status`;


ALTER TABLE `categories` ADD `icon` VARCHAR(220) NOT NULL AFTER `path`;
ALTER TABLE `products` ADD `sold_out` BOOLEAN NOT NULL DEFAULT FALSE AFTER `featured`;
ALTER TABLE `products` ADD `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `sold_out`, ADD `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `created_at`;


ALTER TABLE `orders` ADD `upfront` INT NOT NULL DEFAULT '0' AFTER `status`;

ALTER TABLE `orders` ADD `receipt` BLOB NULL DEFAULT NULL AFTER `payment_method`;
ALTER TABLE `orders` CHANGE `receipt` `receipt` LONGTEXT NULL DEFAULT NULL;


ALTER TABLE `order_products` ADD `product_upfront` VARCHAR(200) NOT NULL DEFAULT '0' AFTER `shipping`;
ALTER TABLE `order_products` ADD `product_then_price` VARCHAR(200) NOT NULL DEFAULT '0' AFTER `product_upfront`;

ALTER TABLE `order_installments` ADD `due_date` DATETIME NULL DEFAULT NULL AFTER `amount`;

UPDATE `orders` SET `status`=1  WHERE 1;
UPDATE `order_installments` SET `status`=1  WHERE 1;

ALTER TABLE `order_products` ADD `status` INT NOT NULL DEFAULT '1' COMMENT 'order_products_status' AFTER `product_then_price`;

UPDATE `order_products` SET `status`=1 WHERE 1

--
-- Table structure for table `order_installments_status`
--

CREATE TABLE `order_installments_status` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_installments_status`
--

INSERT INTO `order_installments_status` (`id`, `name`, `description`) VALUES
(1, 'Pending Payment', 'Pending Payment'),
(2, 'Paid', 'Paid'),
(3, 'Payment Confirmed', 'Payment Confirmed'),
(4, 'Payment Failed', 'Payment Failed');

-- --------------------------------------------------------

--
-- Table structure for table `order_products_status`
--

CREATE TABLE `order_products_status` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_products_status`
--

INSERT INTO `order_products_status` (`id`, `name`, `description`) VALUES
(1, 'Pending', 'Pending'),
(2, 'Confirmed', 'Confirmed'),
(3, 'Due Shipment', 'Due Shipment'),
(4, 'Shipped/Completed', 'Shipped/Completed'),
(5, 'Cancelled', 'Cancelled '),
(6, 'Rejected', 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`, `description`) VALUES
(1, 'Pending Confirmation', 'Pending Confirmation'),
(2, 'Confirmed', 'Confirmed'),
(3, 'Due Shipment', 'Due Shipment'),
(4, 'Shipped/Completed', 'Shipped/Completed'),
(5, 'Cancelled', 'Cancelled '),
(6, 'Rejected', 'Rejected');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_installments_status`
--
ALTER TABLE `order_installments_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products_status`
--
ALTER TABLE `order_products_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_installments_status`
--
ALTER TABLE `order_installments_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_products_status`
--
ALTER TABLE `order_products_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;



INSERT INTO `order_status` (`id`, `name`, `description`) VALUES (NULL, 'Pending Cancellation', 'Pending Cancellation');

INSERT INTO `order_status` (`id`, `name`, `description`) VALUES (NULL, 'Pending Payment', 'Pending Payment'), (NULL, 'Pending Bank Transfer', 'Pending Bank Transfer');
INSERT INTO `order_status` (`id`, `name`, `description`) VALUES (NULL, 'Pending Online Payment', 'Pending Online Payment');

INSERT INTO `order_products_status` (`id`, `name`, `description`) VALUES (NULL, 'Pending Cancellation', 'Pending Cancellation');
UPDATE `order_products_status` SET `name` = 'Pending Confirmation', `description` = 'Pending Confirmation' WHERE `order_products_status`.`id` = 1;


INSERT INTO `order_installments_status` (`id`, `name`, `description`) VALUES (NULL, 'Overdue', 'Overdue');
UPDATE `order_installments_status` SET `description` = 'Pending Confirmation' WHERE `order_installments_status`.`id` = 3;
UPDATE `order_installments_status` SET `name` = 'Pending Confirmation' WHERE `order_installments_status`.`id` = 3;

UPDATE `order_installments_status` SET `name` = 'Upcoming Payment' WHERE `order_installments_status`.`id` = 1;

INSERT INTO `order_installments_status` (`id`, `name`, `description`) VALUES (NULL, 'Installment due', 'Installment due');

INSERT INTO `order_installments_status` (`id`, `name`, `description`) VALUES (NULL, 'Pending Cash Payment', 'Pending Cash Payment');

ALTER TABLE `orders` ADD `cancellation_msg` TEXT NULL AFTER `receipt`;
ALTER TABLE `order_products` ADD `cancellation_msg` TEXT NULL AFTER `status`;

ALTER TABLE `order_installments` ADD `receipt` LONGTEXT NULL AFTER `payment_date`;

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` int(11) NOT NULL,
  `code` varchar(200) NOT NULL,
  `email` longtext NOT NULL,
  `flags` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `installment_status_emails`
--

CREATE TABLE `installment_status_emails` (
  `id` int(11) NOT NULL,
  `installment_status_id` int(11) NOT NULL,
  `email_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_status_emails`
--

CREATE TABLE `order_status_emails` (
  `id` int(11) NOT NULL,
  `order_status_id` int(11) NOT NULL,
  `email_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_status_emails`
--

CREATE TABLE `product_status_emails` (
  `id` int(11) NOT NULL,
  `product_status_id` int(11) NOT NULL,
  `email_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `installment_status_emails`
--
ALTER TABLE `installment_status_emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status_emails`
--
ALTER TABLE `order_status_emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_status_emails`
--
ALTER TABLE `product_status_emails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `installment_status_emails`
--
ALTER TABLE `installment_status_emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_status_emails`
--
ALTER TABLE `order_status_emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_status_emails`
--
ALTER TABLE `product_status_emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;


ALTER TABLE `order_installments` CHANGE `amount` `amount` TEXT NOT NULL;
ALTER TABLE `order_installments` ADD `after_tax_amount` TEXT NOT NULL AFTER `amount`;

-- to fix after_tax_amount in mid way
-- UPDATE `order_installments` SET `after_tax_amount`= `amount`+(`amount` * 0.13)
ALTER TABLE `products` ADD `current_weight` INT NULL AFTER `category`;


INSERT INTO `emails` (`id`, `code`, `email`, `flags`) VALUES (NULL, 'INSTALLMENT_CASH_PAYMENT', 'Dear Customer,\r\n\r\nOne of our agents will get in touch with you in the next 24 hours for collecting the cash payment of {{amount}}\r\n\r\n\r\n{{amount}}\r\n{{tax}}\r\n{{after_tax_amount}}\r\n{{due_date}}\r\n\r\n\r\nFor further help, or queries feel free to call XXX-XXX-XXX\r\n\r\nRegards\r\n\r\nQKP', 'amount,tax,after_tax_amount,due_date\r\n');
INSERT INTO `emails` (`id`, `code`, `email`, `flags`, `admin`) VALUES (NULL, 'INSTALLMENT_CASH_PAYMENT', 'Dear Admin,\r\n\r\nA Customer has requested for collection of cash payment for their installment of amount {{after_tax_amount}}\r\n\r\n\r\n{{amount}}\r\n{{tax}}\r\n{{after_tax_amount}}\r\n{{due_date}}\r\n\r\n<a hred=\"{{link}}\">Click here to view details</a>\r\n\r\n', 'amount,tax,after_tax_amount,due_date,link', '1');


ALTER TABLE `emails` ADD `admin` BOOLEAN NOT NULL COMMENT '0 = user, 1 = admin' AFTER `flags`;


-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2020 at 05:21 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice_templates`
--

CREATE TABLE `invoice_templates` (
  `id` int(11) NOT NULL,
  `type` varchar(200) NOT NULL,
  `status` int(11) NOT NULL COMMENT 'status of installment or order',
  `template` longtext NOT NULL,
  `flags` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_templates`
--

INSERT INTO `invoice_templates` (`id`, `type`, `status`, `template`, `flags`) VALUES
(1, 'INSTALLMENT', 8, 'Invoice details\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<style type=\"text/css\">\r\n.tg  {border-collapse:collapse;border-spacing:0;}\r\n.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;\r\n  overflow:hidden;padding:10px 5px;word-break:normal;}\r\n.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;\r\n  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}\r\n.tg .tg-0lax{text-align:left;vertical-align:top}\r\n</style>\r\n<table class=\"tg\" style=\"undefined;table-layout: fixed; width: 492px\">\r\n<colgroup>\r\n<col style=\"width: 184px\">\r\n<col style=\"width: 92px\">\r\n<col style=\"width: 106px\">\r\n<col style=\"width: 110px\">\r\n</colgroup>\r\n<thead>\r\n  <tr>\r\n    <th class=\"tg-0lax\">Animal</th>\r\n    <th class=\"tg-0lax\">Amount</th>\r\n    <th class=\"tg-0lax\">Tax</th>\r\n    <th class=\"tg-0lax\">Total</th>\r\n    <th class=\"tg-0lax\">Due Date</th>\r\n  </tr>\r\n</thead>\r\n<tbody>\r\n  <tr>\r\n    <td class=\"tg-0lax\"></td>\r\n    <td class=\"tg-0lax\">{{amount}}</td>\r\n    <td class=\"tg-0lax\">{{tax}}</td>\r\n    <td class=\"tg-0lax\">{{after_tax_amount}}</td>\r\n    <td class=\"tg-0lax\">{{due_date}}</td>\r\n  </tr>\r\n</tbody>\r\n</table>', 'amount,tax,after_tax_amount,due_date'),
(2, 'ORDER', 1, 'Invoice details\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<style type=\"text/css\">\r\n.tg  {border-collapse:collapse;border-spacing:0;}\r\n.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;\r\n  overflow:hidden;padding:10px 5px;word-break:normal;}\r\n.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;\r\n  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}\r\n.tg .tg-0lax{text-align:left;vertical-align:top}\r\n</style>\r\n<table class=\"tg\" style=\"undefined;table-layout: fixed; width: 492px\">\r\n<colgroup>\r\n<col style=\"width: 184px\">\r\n<col style=\"width: 92px\">\r\n<col style=\"width: 106px\">\r\n<col style=\"width: 110px\">\r\n</colgroup>\r\n<thead>\r\n  <tr>\r\n    <th class=\"tg-0lax\">Animal</th>\r\n    <th class=\"tg-0lax\">Amount</th>\r\n    <th class=\"tg-0lax\">Tax</th>\r\n    <th class=\"tg-0lax\">Total</th>\r\n    <th class=\"tg-0lax\">Due Date</th>\r\n  </tr>\r\n</thead>\r\n<tbody>\r\n  <tr>\r\n    <td class=\"tg-0lax\"></td>\r\n    <td class=\"tg-0lax\">{{amount}}</td>\r\n    <td class=\"tg-0lax\">{{tax}}</td>\r\n    <td class=\"tg-0lax\">{{after_tax_amount}}</td>\r\n    <td class=\"tg-0lax\">{{due_date}}</td>\r\n  </tr>\r\n</tbody>\r\n</table>', 'amount,tax,after_tax_amount,due_date'),
(3, 'ORDER', 2, 'Invoice details\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<style type=\"text/css\">\r\n.tg  {border-collapse:collapse;border-spacing:0;}\r\n.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;\r\n  overflow:hidden;padding:10px 5px;word-break:normal;}\r\n.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;\r\n  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}\r\n.tg .tg-0lax{text-align:left;vertical-align:top}\r\n</style>\r\n<table class=\"tg\" style=\"undefined;table-layout: fixed; width: 492px\">\r\n<colgroup>\r\n<col style=\"width: 184px\">\r\n<col style=\"width: 92px\">\r\n<col style=\"width: 106px\">\r\n<col style=\"width: 110px\">\r\n</colgroup>\r\n<thead>\r\n  <tr>\r\n    <th class=\"tg-0lax\">Animal</th>\r\n    <th class=\"tg-0lax\">Amount</th>\r\n    <th class=\"tg-0lax\">Tax</th>\r\n    <th class=\"tg-0lax\">Total</th>\r\n    <th class=\"tg-0lax\">Due Date</th>\r\n  </tr>\r\n</thead>\r\n<tbody>\r\n  <tr>\r\n    <td class=\"tg-0lax\"></td>\r\n    <td class=\"tg-0lax\">{{amount}}</td>\r\n    <td class=\"tg-0lax\">{{tax}}</td>\r\n    <td class=\"tg-0lax\">{{after_tax_amount}}</td>\r\n    <td class=\"tg-0lax\">{{due_date}}</td>\r\n  </tr>\r\n</tbody>\r\n</table>', 'amount,tax,after_tax_amount,due_date'),
(4, 'INSTALLMENT', 2, 'Invoice details\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<style type=\"text/css\">\r\n.tg  {border-collapse:collapse;border-spacing:0;}\r\n.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;\r\n  overflow:hidden;padding:10px 5px;word-break:normal;}\r\n.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;\r\n  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}\r\n.tg .tg-0lax{text-align:left;vertical-align:top}\r\n</style>\r\n<table class=\"tg\" style=\"undefined;table-layout: fixed; width: 492px\">\r\n<colgroup>\r\n<col style=\"width: 184px\">\r\n<col style=\"width: 92px\">\r\n<col style=\"width: 106px\">\r\n<col style=\"width: 110px\">\r\n</colgroup>\r\n<thead>\r\n  <tr>\r\n    <th class=\"tg-0lax\">Animal</th>\r\n    <th class=\"tg-0lax\">Amount</th>\r\n    <th class=\"tg-0lax\">Tax</th>\r\n    <th class=\"tg-0lax\">Total</th>\r\n    <th class=\"tg-0lax\">Due Date</th>\r\n  </tr>\r\n</thead>\r\n<tbody>\r\n  <tr>\r\n    <td class=\"tg-0lax\"></td>\r\n    <td class=\"tg-0lax\">{{amount}}</td>\r\n    <td class=\"tg-0lax\">{{tax}}</td>\r\n    <td class=\"tg-0lax\">{{after_tax_amount}}</td>\r\n    <td class=\"tg-0lax\">{{due_date}}</td>\r\n  </tr>\r\n</tbody>\r\n</table>', 'amount,tax,after_tax_amount,due_date'),
(5, 'INSTALLMENT', 7, 'Invoice details\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<style type=\"text/css\">\r\n.tg  {border-collapse:collapse;border-spacing:0;}\r\n.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;\r\n  overflow:hidden;padding:10px 5px;word-break:normal;}\r\n.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;\r\n  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}\r\n.tg .tg-0lax{text-align:left;vertical-align:top}\r\n</style>\r\n<table class=\"tg\" style=\"undefined;table-layout: fixed; width: 492px\">\r\n<colgroup>\r\n<col style=\"width: 184px\">\r\n<col style=\"width: 92px\">\r\n<col style=\"width: 106px\">\r\n<col style=\"width: 110px\">\r\n</colgroup>\r\n<thead>\r\n  <tr>\r\n    <th class=\"tg-0lax\">Animal</th>\r\n    <th class=\"tg-0lax\">Amount</th>\r\n    <th class=\"tg-0lax\">Tax</th>\r\n    <th class=\"tg-0lax\">Total</th>\r\n    <th class=\"tg-0lax\">Due Date</th>\r\n  </tr>\r\n</thead>\r\n<tbody>\r\n  <tr>\r\n    <td class=\"tg-0lax\"></td>\r\n    <td class=\"tg-0lax\">{{amount}}</td>\r\n    <td class=\"tg-0lax\">{{tax}}</td>\r\n    <td class=\"tg-0lax\">{{after_tax_amount}}</td>\r\n    <td class=\"tg-0lax\">{{due_date}}</td>\r\n  </tr>\r\n</tbody>\r\n</table>', 'amount,tax,after_tax_amount,due_date');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice_templates`
--
ALTER TABLE `invoice_templates`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice_templates`
--
ALTER TABLE `invoice_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;


-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2020 at 05:22 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` int(11) NOT NULL,
  `type` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `subject` text NOT NULL,
  `email` longtext NOT NULL,
  `flags` text NOT NULL,
  `admin` tinyint(1) NOT NULL COMMENT '0 = user, 1 = admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `type`, `status`, `subject`, `email`, `flags`, `admin`) VALUES
(1, 'INSTALLMENT', 9, 'Request for Cash Collection', 'Dear Customer,\r\n\r\nOne of our agents will get in touch with you in the next 24 hours for collecting the cash payment of {{amount}}\r\n\r\n\r\n{{amount}}\r\n{{tax}}\r\n{{after_tax_amount}}\r\n{{due_date}}\r\n\r\n\r\nFor further help, or queries feel free to call XXX-XXX-XXX\r\n\r\nRegards\r\n\r\nQKP', 'amount,tax,after_tax_amount,due_date', 0),
(2, 'INSTALLMENT', 9, 'Request for Cash Collection', 'Dear Admin,\r\n\r\nA Customer has requested for collection of cash payment for their installment of amount {{after_tax_amount}}\r\n\r\n\r\n{{amount}}\r\n{{tax}}\r\n{{after_tax_amount}}\r\n{{due_date}}\r\n\r\n<a hred=\"{{link}}\">Click here to view details</a>\r\n\r\n', 'amount,tax,after_tax_amount,due_date,link', 1),
(3, 'INSTALLMENT', 3, 'Bank Transfer Installment Submitted', 'Dear Customer,\r\n\r\nOne of our agents will get in touch with you in the next 24 hours for collecting the cash payment of {{amount}}\r\n\r\n\r\n{{amount}}\r\n{{tax}}\r\n{{after_tax_amount}}\r\n{{due_date}}\r\n\r\n\r\nFor further help, or queries feel free to call XXX-XXX-XXX\r\n\r\nRegards\r\n\r\nQKP', 'amount,tax,after_tax_amount,due_date', 0),
(4, 'INSTALLMENT', 3, 'Bank Transfer Installment Submitted', 'Dear Admin,\r\n\r\nA Customer has uploaded receipt of their bank transfer payment for their installment of amount {{after_tax_amount}}\r\n\r\n\r\n{{amount}}\r\n{{tax}}\r\n{{after_tax_amount}}\r\n{{due_date}}\r\n\r\n<a hred=\"{{link}}\">Click here to view details</a>\r\n\r\n', 'amount,tax,after_tax_amount,due_date,link', 1),
(5, 'INSTALLMENT', 2, 'Paid', '', '', 0),
(6, 'INSTALLMENT', 2, 'Paid', '', '', 1),
(7, 'INSTALLMENT', 4, 'Payment Failed', '', '', 0),
(8, 'INSTALLMENT', 4, 'Payment Failed', '', '', 1),
(9, 'INSTALLMENT', 7, 'Overdue', '', '', 0),
(10, 'INSTALLMENT', 7, 'Overdue', '', '', 1),
(11, 'INSTALLMENT', 8, 'Installment due', '', '', 0),
(12, 'INSTALLMENT', 8, 'Installment due', '', '', 1),
(13, 'ORDER', 1, 'Pending Confirmation', 'Pending Confirmation', '', 0),
(14, 'ORDER', 1, 'Pending Confirmation', 'Pending Confirmation', '', 1),
(15, 'ORDER', 2, 'Confirmed', 'Confirmed', '', 0),
(16, 'ORDER', 2, 'Confirmed', 'Confirmed', '', 1),
(17, 'ORDER', 3, 'Due Shipment', 'Due Shipment', '', 0),
(18, 'ORDER', 3, 'Due Shipment', 'Due Shipment', '', 1),
(19, 'ORDER', 4, 'Shipped/Completed', 'Shipped/Completed', '', 0),
(20, 'ORDER', 4, 'Shipped/Completed', 'Shipped/Completed', '', 1),
(21, 'ORDER', 5, 'Cancelled', 'Cancelled ', '', 0),
(22, 'ORDER', 5, 'Cancelled', 'Cancelled ', '', 1),
(23, 'ORDER', 6, 'Rejected', 'Rejected', '', 0),
(24, 'ORDER', 6, 'Rejected', 'Rejected', '', 1),
(27, 'ORDER', 8, 'Pending Cancellation', 'Pending Cancellation', '', 0),
(28, 'ORDER', 8, 'Pending Cancellation', 'Pending Cancellation', '', 1),
(29, 'ORDER', 9, 'Pending Cash Payment', 'Pending Cash Payment', '', 0),
(30, 'ORDER', 9, 'Pending Cash Payment', 'Pending Cash Payment', '', 1),
(31, 'ORDER', 10, 'Pending Bank Transfer', 'Pending Bank Transfer', '', 0),
(32, 'ORDER', 10, 'Pending Bank Transfer', 'Pending Bank Transfer', '', 1),
(33, 'ORDER', 11, 'Pending Online Payment', 'Pending Online Payment', '', 0),
(34, 'ORDER', 11, 'Pending Online Payment', 'Pending Online Payment', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;


ALTER TABLE `orders` ADD `invoice` VARCHAR(200) NOT NULL AFTER `upfront`;
ALTER TABLE `orders` CHANGE `invoice` `invoice` VARCHAR(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL;

ALTER TABLE `order_installments` ADD `invoice` VARCHAR(200) NOT NULL AFTER `after_tax_amount`;
ALTER TABLE `order_installments` CHANGE `invoice` `invoice` VARCHAR(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL;

ALTER TABLE `preferences` ADD `enable_tax` BOOLEAN NOT NULL AFTER `eid_date`, ADD `tax_value` TEXT NOT NULL AFTER `enable_tax`, ADD `bank_name` TEXT NOT NULL AFTER `tax_value`, ADD `account_title` TEXT NOT NULL AFTER `bank_name`, ADD `account_number` TEXT NOT NULL AFTER `account_title`;
ALTER TABLE `preferences` ADD `overdue_penalty` INT NOT NULL AFTER `enable_tax`;
ALTER TABLE `preferences` ADD `regular_advance` TEXT NOT NULL AFTER `account_number`;
ALTER TABLE `preferences` ADD `final_advance` TEXT NOT NULL AFTER `regular_advance`;
