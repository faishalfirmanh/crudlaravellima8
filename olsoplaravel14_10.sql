-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2020 at 02:07 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olsoplaravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publisher` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `views` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `stock` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `status` enum('PUBLISH','DRAFT') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `title`, `slug`, `description`, `author`, `publisher`, `cover`, `price`, `views`, `stock`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'TITLEEE', '', 'menceritakan tutorial', 'indah', 'publisher', 'book/0Std3IbehPOQcHHeVbkJ7k3aMKYpi0REss2cZTih.jpeg', 10000.00, 0, 32, 'PUBLISH', 12, 14, NULL, '2020-10-08 22:24:42', '2020-10-12 21:30:52', NULL),
(2, 'tutorial moonton', '', 'tutorial menjadi propalyer guinever', 'penulis', 'moontoncok', '', 25000.00, 0, 12, 'DRAFT', 12, 14, NULL, '2020-10-08 22:25:54', '2020-10-13 15:03:45', NULL),
(3, 'cok', '', 'cok', 'cok', 'cok', '', 131331.00, 0, 21, 'PUBLISH', 12, 14, NULL, '2020-10-08 22:27:28', '2020-10-12 21:14:29', NULL),
(4, 'draf', '', 'draf', 'draf', 'draf', 'book/unk2IWZg3bJ9Nyl8MYucmRPNKKL0VLyITbToV2NB.jpeg', 5000.00, 0, 31, 'DRAFT', 12, 14, NULL, '2020-10-08 22:27:51', '2020-10-12 21:29:47', NULL),
(5, 'ada gambar', '', 'guin', 'aripCok', 'moontoncok', 'book/wLgvob3zP3RW649Dhn5IjyPOLcriZgUYtbmpuofE.jpeg', 30000.00, 0, 31, 'PUBLISH', 12, 14, NULL, '2020-10-08 22:30:53', '2020-10-12 21:14:15', NULL),
(7, 'bookCate', '', 'book kateogry select', 'penulis', 'publiserrr', 'book/uRqC2xNjrtvnFUFQfhUMUjQbQfNi5W4KTneuo5zm.jpeg', 50000.00, 0, 23, 'DRAFT', 12, 14, NULL, '2020-10-08 22:58:29', '2020-10-12 21:13:57', NULL),
(8, 'buku kacang', 'buku-kacang', 'kacang e pilip', 'pilip', 'airlangga', 'book/EFzHsVhcpdbEJetvs1mWCxsH5x0eLJR6e4uMqmFa.png', 100000.00, 0, 10, 'PUBLISH', 14, NULL, NULL, '2020-10-12 17:07:48', '2020-10-12 17:07:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `book_category`
--

CREATE TABLE `book_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_category`
--

INSERT INTO `book_category` (`id`, `book_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 8, 9, NULL, NULL),
(2, 8, 10, NULL, NULL),
(3, 8, 6, NULL, NULL),
(4, 1, 9, NULL, NULL),
(5, 1, 3, NULL, NULL),
(6, 1, 10, NULL, NULL),
(7, 7, 6, NULL, NULL),
(8, 7, 7, NULL, NULL),
(9, 5, 1, NULL, NULL),
(10, 3, 3, NULL, NULL),
(11, 4, 6, NULL, NULL),
(12, 2, 10, NULL, NULL),
(13, 2, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'berisi nama file image saja tanpa path',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `image`, `created_by`, `updated_by`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'kategorites2', 'kategorites2', 'images/2BP0i0bVP4hRIs6K0UCv32nq81NS8pCw3WVMZAId.jpeg', 14, NULL, NULL, NULL, '2020-10-07 18:21:49', '2020-10-08 17:33:38'),
(2, 'nama Kategori edit', 'nama-kategori-edit', 'images/c1dsjsNRu29ulbGdUy3cje78P0Z1KNPyPXc08qSL.png', 14, 14, NULL, '2020-10-11 22:14:45', '2020-10-07 18:26:43', '2020-10-11 22:14:45'),
(3, 'tes2tidakAdaGambarr', 'tes2tidakadagambarr', NULL, 14, NULL, NULL, NULL, '2020-10-07 18:55:13', '2020-10-08 04:13:07'),
(5, 'kategori ewewewe', 'kategori-ewewewe', 'images/VFpL2SVbVKIU9Xf3FLQqZSLvBOiGH2560DxhRiYq.png', 12, NULL, NULL, '2020-10-11 22:11:09', '2020-10-08 22:54:13', '2020-10-11 22:11:09'),
(6, 'figter', 'figter', 'images/qTRJwMHqqTQb33wdUjhTtwirMenoyqjfnLXLHXAs.jpeg', 14, NULL, NULL, NULL, '2020-10-11 17:13:19', '2020-10-11 17:13:19'),
(7, 'minuman', 'minuman', 'images/kIkjXXGV3DQpZzk737D4ncTZa5BaIZQKtmTF6Upi.jpeg', 14, NULL, NULL, NULL, '2020-10-11 17:13:36', '2020-10-11 17:13:36'),
(8, 'pengetahuan', 'pengetahuan', NULL, 14, NULL, NULL, NULL, '2020-10-11 22:13:50', '2020-10-11 22:13:50'),
(9, 'sastra', 'sastra', NULL, 14, NULL, NULL, NULL, '2020-10-11 22:13:56', '2020-10-11 22:13:56'),
(10, 'sejarah', 'sejarah', NULL, 14, NULL, NULL, NULL, '2020-10-11 22:14:00', '2020-10-11 22:14:00'),
(11, 'ipetek', 'ipetek', 'images/hx2pDPfBxXP01QYuCv0GS7CIbQYK5cYd5uk0udKL.jpeg', 14, NULL, NULL, NULL, '2020-10-13 17:06:21', '2020-10-13 17:06:21'),
(12, 'novel', 'novel', NULL, 14, NULL, NULL, NULL, '2020-10-13 17:06:28', '2020-10-13 17:06:28'),
(13, 'agama', 'agama', NULL, 14, NULL, NULL, NULL, '2020-10-13 17:06:32', '2020-10-13 17:06:32'),
(15, 'sastra jepang', 'sastra-jepang', NULL, 14, NULL, NULL, NULL, '2020-10-13 17:06:46', '2020-10-13 17:06:46');

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
(3, '2020_10_02_031128_penyesuaian_table_user', 2),
(4, '2020_10_08_000439_create_table_category', 3),
(5, '2020_10_09_003509_crate_table_book', 4),
(6, '2020_10_09_003908_create_relasi_book_category', 5),
(7, '2020_10_13_220513_create_table_order', 6),
(8, '2020_10_13_225256_create_tbl_order', 7),
(9, '2020_10_13_225458_book_order_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `total_price` double(8,2) UNSIGNED NOT NULL,
  `invoice_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('SUBMIT','PROCESS','FINISH','CANCEL') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `pesan_buku`
--

CREATE TABLE `pesan_buku` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `username`, `roles`, `address`, `phone`, `avatar`, `status`) VALUES
(9, 'dasilva', 'fotokososng@gmail.com', NULL, '$2y$10$Ddm4YHjYcFLoXGbF4iNwG.yo9vEAe5CZn0bmeHS.D3KqFS8Vw9uaq', NULL, '2020-10-03 17:11:13', '2020-10-07 06:20:14', 'tesminggu@gmail.com', '[\"ADMIN\"]', 'ini adalah alamat new', '14134234', 'C:\\xampp\\htdocs\\olsop\\public\\images\\1601777493.jpeg', 'INACTIVE'),
(11, 'noFoto', 'nofoto@gmail.com', NULL, '$2y$10$xnvZhdL.t4zZN1V6IwCe4O0YCMkw5vTp.uLryqaiCFVDAyAkMfxqW', NULL, '2020-10-04 02:14:48', '2020-10-07 06:24:17', 'noFoto', '[\"CUSTOMER\"]', 'alamat', '082', 'C:\\xampp\\htdocs\\olsop\\public\\images\\1602077057.jpeg', 'ACTIVE'),
(12, 'gunivener', 'guin@gmail.com', NULL, '$2y$10$OltExVt6zhG1iDKOH3RZbe/LBb2vlObiz9S056dOhpcejo6.cXyPi', NULL, '2020-10-07 04:50:49', '2020-10-07 04:50:49', 'guin@gmail.com', '[\"ADMIN\",\"STAFF\",\"CUSTOMER\"]', 'land of dawn', '2434', 'C:\\xampp\\htdocs\\olsop\\public\\images\\1602071449_guin.jpg', 'ACTIVE'),
(13, 'TES', 'TES@GMAIL.COM', NULL, '$2y$10$41DjNuFoOOyeW5n.hbbpaOL2.YX8dI40ILesUGBuoFuISO13Jjhie', NULL, '2020-10-07 05:53:34', '2020-10-07 05:53:34', 'TES', '[\"ADMIN\",\"STAFF\",\"CUSTOMER\"]', 'TES', 'TES', NULL, 'ACTIVE'),
(14, 'tes2', 'tes2@gmail.com', NULL, '$2y$10$MfANM35WNwsP6m5DMXbtNOzO/t/.G.HVNokDwK/LNznMjhq/bloSa', NULL, '2020-10-07 05:54:07', '2020-10-07 05:54:07', 'tes2', '[\"CUSTOMER\"]', 'tes2', '334', NULL, 'ACTIVE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_category`
--
ALTER TABLE `book_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_category_book_id_foreign` (`book_id`),
  ADD KEY `book_category_category_id_foreign` (`category_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_slug_unique` (`slug`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pesan_buku`
--
ALTER TABLE `pesan_buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesan_buku_order_id_foreign` (`order_id`),
  ADD KEY `pesan_buku_book_id_foreign` (`book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `book_category`
--
ALTER TABLE `book_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesan_buku`
--
ALTER TABLE `pesan_buku`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_category`
--
ALTER TABLE `book_category`
  ADD CONSTRAINT `book_category_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`),
  ADD CONSTRAINT `book_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `pesan_buku`
--
ALTER TABLE `pesan_buku`
  ADD CONSTRAINT `pesan_buku_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`),
  ADD CONSTRAINT `pesan_buku_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
