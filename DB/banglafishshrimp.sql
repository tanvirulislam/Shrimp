-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2021 at 06:53 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `advanceadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'superadmin@gmail.com', 'superadmin', NULL, '$2y$10$P7XKbcdy.V46KeuF1PljgOoXXfAQvqjuZkPg71AyMlNUkdcWbBXjS', 'user-photo/1616652976.png', NULL, '2021-03-24 05:29:53', '2021-03-25 00:16:16'),
(2, 'admin', 'admin@gmail.com', NULL, NULL, '$2y$10$oKyZWZD/FsdnA47iBH36hO6pWRTwXVf.kQiOUyaPlu.xY7ZE4beW6', NULL, NULL, '2021-03-24 06:14:00', '2021-03-24 06:14:00');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `product_id`, `image`, `title`, `desp`, `status`, `created_at`, `updated_at`) VALUES
(3, '4', 'public/upload/1618165748.jpg', 'This shrimp are very fresh to eat', 'The fish is very fresh. Is stored without any formalin. You can safely take the fish. There are different sizes of small and big.', '1', '2021-04-11 12:29:08', '2021-04-11 12:29:08'),
(4, '3', 'public/upload/1618165812.jpg', 'This fish are very fresh to eat', 'The fish is very fresh. Is stored without any formalin. You can safely take the fish. There are different sizes of small and big.', '1', '2021-04-11 12:30:12', '2021-04-11 12:30:12'),
(5, '1', 'public/upload/1618166175.jpg', 'Ilish is on of te delicious fish of deshi fish', 'The fish is very fresh. Is stored without any formalin. You can safely take the fish. There are different sizes of small and big.', '1', '2021-04-11 12:36:15', '2021-04-11 12:36:15'),
(6, '64', 'public/upload/1621786298.jpg', 'Fresh Fish', 'The fish is very fresh. Is stored without any formalin. You can safely take the fish. There are different sizes of small and big.', '1', '2021-05-23 10:11:38', '2021-05-23 10:11:38'),
(7, '67', 'public/upload/1621786314.jpg', 'Fresh Fish', 'The fish is very fresh. Is stored without any formalin. You can safely take the fish. There are different sizes of small and big.', '1', '2021-05-23 10:11:54', '2021-05-23 10:11:54'),
(8, '68', 'public/upload/1621786441.jpg', 'Fresh Fish', 'The fish is very fresh. Is stored without any formalin. You can safely take the fish. There are different sizes of small and big.', '1', '2021-05-23 10:14:01', '2021-05-23 10:14:01');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `status`, `image`, `created_at`, `updated_at`) VALUES
(9, 'Deshi fish', 'deshi-fish', '1', 'public/upload/1622022016.jpg', '2021-04-08 00:08:37', '2021-05-26 03:40:16'),
(10, 'Sea fish', 'sea-fish', '1', 'public/upload/1617862232.jpg', '2021-04-08 00:10:32', '2021-05-24 06:55:15'),
(12, 'Imported fish', 'imported-fish', '1', 'public/upload/1618208075.jpg', '2021-04-12 00:14:35', '2021-04-12 00:14:35'),
(13, 'Fresh fish', 'fresh-fish', '1', 'public/upload/1618208091.jpg', '2021-04-12 00:14:51', '2021-04-12 00:14:51'),
(14, 'Live fish', 'live-fish', '1', 'public/upload/1618208105.jpg', '2021-04-12 00:15:05', '2021-04-12 00:15:05'),
(15, 'Aquarium', 'aquarium', '1', 'public/upload/1618208146.jpg', '2021-04-12 00:15:46', '2021-04-12 00:15:46'),
(16, 'Dry fish', 'dry-fish', '1', 'public/upload/1618208166.jpg', '2021-04-12 00:16:06', '2021-04-12 00:16:06');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logo__offers`
--

CREATE TABLE `logo__offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_offer` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logo__offers`
--

INSERT INTO `logo__offers` (`id`, `image`, `logo_offer`, `status`, `created_at`, `updated_at`) VALUES
(2, 'public/upload/1618139514.jpg', '0', '1', '2021-04-11 05:11:54', '2021-04-11 05:11:54'),
(3, 'public/upload/1621684351.png', '1', '1', '2021-04-11 11:23:42', '2021-05-22 05:52:31');

-- --------------------------------------------------------

--
-- Table structure for table `main_orders`
--

CREATE TABLE `main_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_total` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_orders`
--

INSERT INTO `main_orders` (`id`, `shipping_id`, `user_id`, `pin`, `order_total`, `status`, `created_at`, `updated_at`) VALUES
(17, 40, 4, 'Fish and Shrimp-35610693', 14, 1, '2021-05-21 22:36:41', '2021-05-21 22:36:41'),
(18, 41, 4, 'Fish and Shrimp-41727327', 180, 0, '2021-05-22 14:30:00', '2021-05-22 14:30:00'),
(19, 42, 8, 'Fish and Shrimp-98653928', 180, 0, '2021-05-23 01:23:52', '2021-05-23 01:23:52'),
(20, 43, 8, 'Fish and Shrimp-42455652', 1200, 0, '2021-05-23 21:28:26', '2021-05-23 21:28:26');

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
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2021_03_18_095906_create_permission_tables', 1),
(13, '2021_03_24_112406_create_admins_table', 2),
(14, '2021_04_07_101455_create_categories_table', 3),
(15, '2021_04_07_180826_create_subcategories_table', 4),
(16, '2021_04_08_064159_create_products_table', 5),
(17, '2021_04_08_085554_create_stocks_table', 6),
(18, '2021_04_10_083135_create_stores_table', 7),
(19, '2021_04_11_095614_create_logo__offers_table', 8),
(20, '2021_04_11_111809_create_banners_table', 9),
(21, '2021_04_17_103408_create_shippings_table', 10),
(22, '2021_04_17_103444_create_orders_table', 10),
(23, '2021_04_17_103623_create_order_details_table', 10),
(24, '2021_05_19_064555_create_wishlists_table', 11),
(25, '2021_05_19_093115_create_main_orders_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 1),
(1, 'App\\User', 1),
(2, 'App\\Models\\Admin', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_total` int(11) DEFAULT NULL,
  `product_price` int(100) NOT NULL,
  `product_quantity` int(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `shipping_id`, `order_id`, `product_name`, `order_total`, `product_price`, `product_quantity`, `status`, `created_at`, `updated_at`) VALUES
(6, '8', 'ilish', 42, 19, 'Ilish', 180, 180, 1, 0, '2021-05-23 01:23:52', '2021-05-23 01:23:52'),
(7, '8', 'ilish', 43, 20, 'Ilish', 1200, 1200, 1, 0, '2021-05-23 21:28:26', '2021-05-23 21:28:26');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'dashboard.view', 'admin', 'dashboard', '2021-03-24 02:04:15', '2021-03-24 02:04:15'),
(2, 'dashboard.edit', 'admin', 'dashboard', '2021-03-24 02:04:15', '2021-03-24 02:04:15'),
(3, 'blog.create', 'admin', 'blog', '2021-03-24 02:04:15', '2021-03-24 02:04:15'),
(4, 'blog.view', 'admin', 'blog', '2021-03-24 02:04:15', '2021-03-24 02:04:15'),
(5, 'blog.edit', 'admin', 'blog', '2021-03-24 02:04:15', '2021-03-24 02:04:15'),
(6, 'blog.delete', 'admin', 'blog', '2021-03-24 02:04:15', '2021-03-24 02:04:15'),
(7, 'blog.approve', 'admin', 'blog', '2021-03-24 02:04:15', '2021-03-24 02:04:15'),
(8, 'admin.create', 'admin', 'admin', '2021-03-24 02:04:16', '2021-03-24 02:04:16'),
(9, 'admin.view', 'admin', 'admin', '2021-03-24 02:04:16', '2021-03-24 02:04:16'),
(10, 'admin.edit', 'admin', 'admin', '2021-03-24 02:04:16', '2021-03-24 02:04:16'),
(11, 'admin.delete', 'admin', 'admin', '2021-03-24 02:04:16', '2021-03-24 02:04:16'),
(12, 'admin.approve', 'admin', 'admin', '2021-03-24 02:04:16', '2021-03-24 02:04:16'),
(13, 'role.create', 'admin', 'role', '2021-03-24 02:04:16', '2021-03-24 02:04:16'),
(14, 'role.view', 'admin', 'role', '2021-03-24 02:04:16', '2021-03-24 02:04:16'),
(15, 'role.edit', 'admin', 'role', '2021-03-24 02:04:17', '2021-03-24 02:04:17'),
(16, 'role.delete', 'admin', 'role', '2021-03-24 02:04:17', '2021-03-24 02:04:17'),
(17, 'role.approve', 'admin', 'role', '2021-03-24 02:04:17', '2021-03-24 02:04:17'),
(18, 'profile.view', 'admin', 'profile', '2021-03-24 02:04:17', '2021-03-24 02:04:17'),
(19, 'profile.edit', 'admin', 'profile', '2021-03-24 02:04:17', '2021-03-24 02:04:17'),
(20, 'permission.create', 'admin', 'permission', NULL, NULL),
(21, 'permission.view', 'admin', 'permission', NULL, NULL),
(22, 'permission.edit', 'admin', 'permission', NULL, NULL),
(23, 'permission.delete', 'admin', 'permission', NULL, NULL),
(25, 'category.create', 'admin', 'Category', NULL, NULL),
(26, 'category.view', 'admin', 'Category', NULL, NULL),
(27, 'category.edit', 'admin', 'Category', NULL, NULL),
(28, 'category.delete', 'admin', 'Category', NULL, NULL),
(29, 'subcategory.create', 'admin', 'Subcategory', NULL, NULL),
(30, 'subcategory.view', 'admin', 'Subcategory', NULL, NULL),
(31, 'subcategory.edit', 'admin', 'Subcategory', NULL, NULL),
(32, 'subcategory.delete', 'admin', 'Subcategory', NULL, NULL),
(33, 'product.create', 'admin', 'Product', NULL, NULL),
(34, 'product.edit', 'admin', 'Product', NULL, NULL),
(35, 'product.view', 'admin', 'Product', NULL, NULL),
(36, 'product.delete', 'admin', 'Product', NULL, NULL),
(37, 'store.create', 'admin', 'store', NULL, NULL),
(38, 'store.view', 'admin', 'store', NULL, NULL),
(39, 'store.edit', 'admin', 'store', NULL, NULL),
(40, 'store.delete', 'admin', 'store', NULL, NULL),
(41, 'stock.create', 'admin', 'stock', NULL, NULL),
(42, 'stock.view', 'admin', 'stock', NULL, NULL),
(43, 'stock.edit', 'admin', 'stock', NULL, NULL),
(44, 'stock.delete', 'admin', 'stock', NULL, NULL),
(46, 'banner.create', 'admin', 'banner', NULL, NULL),
(47, 'banner.view', 'admin', 'banner', NULL, NULL),
(48, 'banner.edit', 'admin', 'banner', NULL, NULL),
(49, 'banner.delete', 'admin', 'banner', NULL, NULL),
(50, 'logo_offer.create', 'admin', 'logo_offer', NULL, NULL),
(51, 'logo_offer.view', 'admin', 'logo_offer', NULL, NULL),
(52, 'logo_offer.edit', 'admin', 'logo_offer', NULL, NULL),
(53, 'logo_offer.delete', 'admin', 'logo_offer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sell_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_slug`, `subcategory_slug`, `store_id`, `name`, `product_slug`, `desp`, `weight`, `purchase_price`, `sell_price`, `stock`, `image`, `status`, `created_at`, `updated_at`) VALUES
(64, 'deshi-fish', 'panghas', 'khulna-store selected', 'Pangas', 'pangas', 'The fish is very fresh. Is stored without any formalin. You can safely take the fish. There are different sizes of small and big.', '1', '160', '180', '7', 'public/upload/1621864341.jpg', '1', '2021-05-23 09:50:55', '2021-05-24 07:52:21'),
(65, 'deshi-fish', 'panghas', 'khulna-store', 'Goroi', 'goroi', 'The fish is very fresh. Is stored without any formalin. You can safely take the fish. There are different sizes of small and big.', '2', '161', '181', '7', 'public/upload/1621785398.jpg', '1', '2021-05-23 09:56:38', '2021-05-23 09:56:38'),
(66, 'sea-fish', 'churi-mach', 'khulna-store', 'CHURI', 'churi', 'The fish is very fresh. Is stored without any formalin. You can safely take the fish. There are different sizes of small and big.', '3', '163', '183', '7', 'public/upload/1621785726.jpg', '1', '2021-05-23 10:02:06', '2021-05-23 10:02:06'),
(67, 'deshi-fish', 'ilish', 'khulna-store', 'Ilish', 'ilish', 'The fish is very fresh. Is stored without any formalin. You can safely take the fish. There are different sizes of small and big.', '1', '1000', '1200', '3', 'public/upload/1621786056.jpg', '1', '2021-05-23 10:07:36', '2021-05-23 10:07:36'),
(68, 'deshi-fish', 'shrimp', 'khulna-store selected', 'golda', 'golda', 'The fish is very fresh. Is stored without any formalin. You can safely take the fish. There are different sizes of small and big.', '2', '165', '185', '7', 'public/upload/1621786360.jpg', '1', '2021-05-23 10:12:40', '2021-05-23 10:13:36'),
(69, 'sea-fish', 'churi-mach', 'khulna-store', 'Gold fish', 'gold-fish', 'The fish is very fresh. Is stored without any formalin. You can safely take the fish. There are different sizes of small and big.', '1', '160', '280', '56', 'public/upload/1621861236.jpg', '1', '2021-05-24 07:00:36', '2021-05-24 07:00:36');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'admin', '2021-03-24 02:04:14', '2021-03-24 02:04:14'),
(2, 'admin', 'admin', '2021-03-24 02:04:14', '2021-03-24 02:04:14'),
(3, 'editor', 'admin', '2021-03-24 02:04:14', '2021-03-24 02:04:14'),
(4, 'user', 'admin', '2021-03-24 02:04:14', '2021-03-24 02:04:14'),
(5, 'test2', 'admin', '2021-03-24 02:13:05', '2021-03-24 02:17:07');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(5, 5),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(7, 1),
(7, 2),
(7, 3),
(7, 4),
(7, 5),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(16, 1),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(18, 3),
(19, 1),
(19, 2),
(19, 3),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(29, 2),
(30, 1),
(30, 2),
(31, 1),
(31, 2),
(32, 1),
(32, 2),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_num` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `customer_name`, `email`, `phone_num`, `address`, `message`, `user_id`, `created_at`, `updated_at`) VALUES
(37, 'mizan', 'mizan@gmail.com', 22, 'dd', 'dd', '4', '2021-05-21 20:42:18', '2021-05-21 20:42:18'),
(38, 'mizan', 'mizan@gmail.com', 22, 'dd', 'dd', '4', '2021-05-21 22:32:18', '2021-05-21 22:32:18'),
(39, 'mizan', 'mizan@gmail.com', 22, 'dd', 'dd', '4', '2021-05-21 22:32:38', '2021-05-21 22:32:38'),
(40, 'mizan', 'mizan@gmail.com', 44, 'kk', 'kk', '4', '2021-05-21 22:36:41', '2021-05-21 22:36:41'),
(41, 'sohan', 'x@gmail.com', 8888, 'h', 'h', '4', '2021-05-22 14:29:59', '2021-05-22 14:29:59'),
(42, 'mizan', 'mizan@gmail.com', 1756819542, 'mirpur', 'mirpur', '8', '2021-05-23 01:23:52', '2021-05-23 01:23:52'),
(43, 'mizan', 'mizan@gmail.com', 232, '3r3r', '323', '8', '2021-05-23 21:28:26', '2021-05-23 21:28:26');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `name`, `slug`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Khulna store', 'khulna-store', 'khulna', NULL, '2021-04-10 23:37:56'),
(2, 'Rajshahi store', 'rajshahi-store', 'rajshahi', NULL, '2021-04-10 23:37:44'),
(3, 'Dhaka store', 'dhaka-store', 'Dhaka', '2021-04-10 23:31:08', '2021-04-10 23:31:08');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `slug`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'deshi-fish', 'panghas', 'Panghas', '1', '2021-04-08 00:09:03', '2021-04-08 04:27:30'),
(3, 'deshi-fish', 'katol', 'Katol', '1', '2021-04-08 00:09:16', '2021-04-08 04:27:54'),
(4, 'deshi-fish', 'rui', 'Rui', '1', '2021-04-08 00:09:23', '2021-04-08 04:28:03'),
(5, 'sea-fish', 'churi-mach', 'Churi mach', '1', '2021-04-08 00:11:19', '2021-04-08 04:28:15'),
(6, 'deshi-fish', 'ilish', 'Ilish', '1', '2021-04-11 12:32:22', '2021-04-11 12:32:22'),
(7, 'deshi-fish', 'shrimp', 'Shrimp', '1', '2021-05-23 10:13:17', '2021-05-23 10:13:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(100) NOT NULL DEFAULT 2,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `role_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 'mizan', 'mizan@gmail.com', NULL, 2, NULL, '$2y$10$E7qDfhoAgDqunzwY2Q1mMOG/Upogn5AckseGIgsbFdMBI5w/K90kq', NULL, '2021-05-23 01:02:06', '2021-05-23 01:02:06');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo__offers`
--
ALTER TABLE `logo__offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_orders`
--
ALTER TABLE `main_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logo__offers`
--
ALTER TABLE `logo__offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `main_orders`
--
ALTER TABLE `main_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
