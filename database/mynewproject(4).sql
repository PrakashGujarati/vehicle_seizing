-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2020 at 04:45 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mynewproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent_views`
--

CREATE TABLE `agent_views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agreement_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prod_n` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region_area` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cycle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allocation_month_grp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tenor_over` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charges` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gv` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regd_num` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chasis_num` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `engine_num` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `make` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rrm_name_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rrm_mail_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coordinator_mail_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `letter_refernce` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dispatch_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `letter_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valid_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agent_views`
--

INSERT INTO `agent_views` (`id`, `agreement_no`, `prod_n`, `region_area`, `office`, `branch`, `customer_name`, `cycle`, `paymode`, `emi`, `tet`, `noi`, `allocation_month_grp`, `tenor_over`, `charges`, `gv`, `model`, `regd_num`, `chasis_num`, `engine_num`, `make`, `rrm_name_no`, `rrm_mail_id`, `coordinator_mail_id`, `letter_refernce`, `dispatch_date`, `letter_date`, `valid_date`, `created_at`, `updated_at`) VALUES
(1, 'agreement_no', 'prod_n', NULL, NULL, NULL, NULL, 'cycle', 'paymode', NULL, NULL, NULL, NULL, 'tenor_over', 'charges', NULL, NULL, NULL, NULL, 'engine_num', 'make', NULL, NULL, NULL, NULL, NULL, 'letter_date', 'valid_date', '2020-09-08 03:27:26', '2020-09-08 03:44:11');

-- --------------------------------------------------------

--
-- Table structure for table `head_offices`
--

CREATE TABLE `head_offices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_code` bigint(20) UNSIGNED DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` text COLLATE utf8mb4_unicode_ci,
  `address2` text COLLATE utf8mb4_unicode_ci,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gst` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `head_offices`
--

INSERT INTO `head_offices` (`id`, `name`, `vendor_code`, `city`, `contact_person`, `address1`, `address2`, `contact`, `gst`, `created_at`, `updated_at`) VALUES
(1, 'google', 123, 'Rajkot', '123456789', 'Rajkot', 'Rajkot', '1234567890', '20', '2020-09-05 22:26:19', '2020-09-05 22:26:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2020_08_14_185904_create_permission_tables', 1),
(4, '2020_09_01_113809_create_head_offices_table', 1),
(5, '2020_09_01_131007_create_offices_table', 1),
(6, '2020_09_05_120851_create_user_assigneds_table', 2),
(7, '2014_10_12_000000_create_users_table', 3),
(8, '2014_10_12_100000_create_password_resets_table', 4),
(14, '2020_09_07_064900_create_agent_views_table', 7),
(15, '2020_08_31_064651_create_vehicles_table', 8),
(16, '2020_09_08_094338_create_user_subscriptions_table', 9),
(17, '2020_09_08_094509_create_subscriptions_table', 9),
(18, '2016_06_01_000001_create_oauth_auth_codes_table', 10),
(19, '2016_06_01_000002_create_oauth_access_tokens_table', 10),
(20, '2016_06_01_000003_create_oauth_refresh_tokens_table', 10),
(21, '2016_06_01_000004_create_oauth_clients_table', 10),
(22, '2016_06_01_000005_create_oauth_personal_access_clients_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('106df0fcec207815ff041cdfd4ffa7d1b0c2fa1e1df856117fe7d0604a588834d2db786b1db38f31', 6, 1, 'Personal Access Token', '[]', 0, '2020-09-19 06:58:05', '2020-09-19 06:58:05', '2021-09-19 12:28:05'),
('1b028ac8047dbd0bd2dfc788c2b92d2414eec082b5edc49007f616eb36b8f1f5994e64fdcef2b72f', 6, 1, 'Personal Access Token', '[]', 0, '2020-09-19 04:32:15', '2020-09-19 04:32:15', '2021-09-19 10:02:15'),
('1b48a10131c34ddb790ee4a98bbcca9756c4cabbd530d5bfab66ce50ea65f7708d688560fa0fad37', 6, 1, 'Personal Access Token', '[]', 0, '2020-09-19 04:14:07', '2020-09-19 04:14:07', '2021-09-19 09:44:07'),
('2459768b873e788757b6820f5fbb768eefe20d9d2cca5d61ab3d33db6949d222929c08943cf3a244', 6, 1, 'token', '[]', 1, '2020-09-19 08:43:17', '2020-09-19 08:43:17', '2021-09-19 14:13:17'),
('304924621e52bb3bf914c50dccea571e15a8b74954ca410570f585666367983c8d90ec3c74e8ab38', 6, 1, 'token', '[]', 0, '2020-09-19 08:28:29', '2020-09-19 08:28:29', '2021-09-19 13:58:29'),
('304f3e44aa84e49a7c349da13c94a22b0336ba599aa841da350b389941e14486f0b31ebe64787d7f', 1, 1, 'Personal Access Token', '[]', 0, '2020-09-19 03:29:58', '2020-09-19 03:29:58', '2021-09-19 08:59:58'),
('3111dadf1171254665e88988e18f214755a8e0dcb1a9cb496a70a4b4d5be1bc352d4c33e9eca8210', 6, 1, 'Personal Access Token', '[]', 0, '2020-09-15 09:48:17', '2020-09-15 09:48:17', '2021-09-15 15:18:17'),
('381aad5c8e4b40644dbe1946018f4e96ebf34166c57cf91e3388542265b402b8f1c8a9fc5e24abed', 6, 1, 'Personal Access Token', '[]', 0, '2020-09-15 09:47:57', '2020-09-15 09:47:57', '2021-09-15 15:17:57'),
('40266e9436172a585ad4945786e203d1503637a5273eb3bf72fdf32d3302c4b639ab9f110357f505', 6, 1, 'Personal Access Token', '[]', 0, '2020-09-19 03:28:51', '2020-09-19 03:28:51', '2021-09-19 08:58:51'),
('48ec638fbbd2bf5d2c2aa17c8047a43326aafe673041253042fc7cc365de24efc1cd76fe34738911', 6, 1, 'token', '[]', 0, '2020-09-19 08:29:27', '2020-09-19 08:29:27', '2021-09-19 13:59:27'),
('4a3f7da77d8f30dbed4e5a943f11befebec34867fb403e6ae1a236592220225918fd4702a6617285', 6, 1, 'token', '[]', 0, '2020-09-19 07:19:11', '2020-09-19 07:19:11', '2021-09-19 12:49:11'),
('4a6aa1b6d4fdaa5e522ce62d1d71b77ea27dbf2fa129a4938be13bb733578a891312b62cf8d8b7d0', 6, 1, 'myApp', '[]', 0, '2020-09-15 09:47:30', '2020-09-15 09:47:30', '2021-09-15 15:17:30'),
('4c32ac68d9dbab60e6b5c893c43c047856ea0d0f6b2384a7721b727b5dff6498b683b65cb7e536f5', 1, 1, 'Personal Access Token', '[]', 0, '2020-09-19 03:38:01', '2020-09-19 03:38:01', '2021-09-19 09:08:01'),
('5876c38d98c81de81861c54f5283f80684e9473ab54c1ef26773d93e1eb9262f61182c96d03475bc', 1, 1, 'Personal Access Token', '[]', 0, '2020-09-19 03:37:42', '2020-09-19 03:37:42', '2021-09-19 09:07:42'),
('589cbc19f0db9819adf9b4fb5f079cf943c27db9f035520716d126c01bfbb94ebaf8204c4f86fcc0', 6, 1, 'Personal Access Token', '[]', 0, '2020-09-19 04:31:40', '2020-09-19 04:31:40', '2021-09-19 10:01:40'),
('5995cc8f8ec5a3dc23e5bf0c512699c5fa1de7571f5b1fca67085c1c34191f4ad959659b4697b02d', 6, 1, 'token', '[]', 1, '2020-09-19 07:37:00', '2020-09-19 07:37:00', '2021-09-19 13:07:00'),
('5a4aab5b50ecb5927552a52d3b7ba3c5e3087962a7563a0f709e4d584b897ec451940d796ebf58d5', 1, 1, 'Personal Access Token', '[]', 0, '2020-09-19 03:47:59', '2020-09-19 03:47:59', '2021-09-19 09:17:59'),
('825e930c5832b1400b165356c2a71621d7c158846b9ba8d74777369a9f5f07a5ddc1979b517fc6ba', 6, 1, 'token', '[]', 0, '2020-09-19 07:15:01', '2020-09-19 07:15:01', '2021-09-19 12:45:01'),
('849a1b1b54104c39d5ce3764e259f492b6151ba89445bd309379814f4fb3096a0049da9e10677826', 6, 1, 'Personal Access Token', '[]', 0, '2020-09-19 03:56:43', '2020-09-19 03:56:43', '2021-09-19 09:26:43'),
('8c34fd2eea058f543d626f8093322d6d9019deb58191f06c7b111e56b7e0621c969aa1464380d4ad', 6, 1, 'Personal Access Token', '[]', 0, '2020-09-19 04:09:56', '2020-09-19 04:09:56', '2021-09-19 09:39:56'),
('95439f1fb9c244ca30bda48185302269183f2cfcf01706862a1b214b95afb8f0d2f3cd0170f21f00', 1, 1, 'Personal Access Token', '[]', 0, '2020-09-19 03:45:01', '2020-09-19 03:45:01', '2021-09-19 09:15:01'),
('9872ea0f29c350cf2c2d2edbf9fc36a30a0d964598c44589d8a443bd7de0f779ae70147fa77e63d3', 6, 1, 'token', '[]', 0, '2020-09-19 08:29:14', '2020-09-19 08:29:14', '2021-09-19 13:59:14'),
('9a2ab27f85f881f2e18c83bd074d054ebc43f0449b07b4b8b923855566542bdb0ee885494ebeba19', 6, 1, 'token', '[]', 0, '2020-09-19 08:29:43', '2020-09-19 08:29:43', '2021-09-19 13:59:43'),
('a8bf484032087267e6282b9e503493b39da3a7336fdf83c629b951d3762bbf4e1c490e636ef6056b', 1, 1, 'Personal Access Token', '[]', 0, '2020-09-19 03:53:31', '2020-09-19 03:53:31', '2021-09-19 09:23:31'),
('a94dcf09858940ec16ddcf5ed0a2b99d243bab524076e37f392b180fea7475d3fe98e6ea43d73470', 6, 1, 'Personal Access Token', '[]', 0, '2020-09-19 04:14:19', '2020-09-19 04:14:19', '2021-09-19 09:44:19'),
('adc95b76d699994d3bea6d2b61b6ee5dece2f944395f76b48fa0a40a0e30b8262bced9c319961cf2', 6, 1, 'token', '[]', 0, '2020-09-19 07:13:58', '2020-09-19 07:13:58', '2021-09-19 12:43:58'),
('af8540d5a47cb6cef2ec59eb6e0874df338e096534aa9fbe5690128ce85c45128bf02e02b6081d41', 6, 1, 'token', '[]', 0, '2020-09-19 08:13:00', '2020-09-19 08:13:00', '2021-09-19 13:43:00'),
('b506078576ca6b4e1202915c465a8a76d360b87b39a616ec5524784726a3d3d6d931685ccf1fc76e', 6, 1, 'Personal Access Token', '[]', 0, '2020-09-19 04:05:17', '2020-09-19 04:05:17', '2021-09-19 09:35:17'),
('b9924d59e958e02267b6ca846a41fda9eab1f7db3f40fb8b3bb9b440f4f6c79b3d42099386c1a92b', 6, 1, 'token', '[]', 0, '2020-09-19 07:14:03', '2020-09-19 07:14:03', '2021-09-19 12:44:03'),
('baae1376960b9002dbe445fcd05077c22d0e317421f13d01b11d4f694351497729b1f0ffb24d522a', 6, 1, 'Personal Access Token', '[]', 0, '2020-09-19 04:10:33', '2020-09-19 04:10:33', '2021-09-19 09:40:33'),
('ca443cbd66950420a71924934b7876ba37b854430fba25ca4787bbf7d31b2fcabd0b82b0607a63c8', 1, 1, 'Personal Access Token', '[]', 0, '2020-09-19 03:52:39', '2020-09-19 03:52:39', '2021-09-19 09:22:39'),
('ca98f0b68425ad72c1afd6be9e3c7324e400608872aae5bd9291dfdbe1117e89a34f1f91d66a8e05', 1, 1, 'Personal Access Token', '[]', 0, '2020-09-19 03:55:03', '2020-09-19 03:55:03', '2021-09-19 09:25:03'),
('d34193ab4f20c656d05d663308399c46d941d942fe8297f76504a22a9f1708ca0406674dc68dfd04', 1, 1, 'Personal Access Token', '[]', 0, '2020-09-19 03:37:54', '2020-09-19 03:37:54', '2021-09-19 09:07:54'),
('f001ed9a9ed8f4143ad54f172ab24be3696508aa33ea0c95f80ea731598d603c240cc5edbd706e2b', 6, 1, 'Personal Access Token', '[]', 0, '2020-09-19 04:21:59', '2020-09-19 04:21:59', '2021-09-19 09:51:59'),
('f32c3182c343af22a2981d0a4afc3b9ceef5b9ded924561a6c3b3dcde24d54a36f3eff844ce2fd21', 6, 1, 'Personal Access Token', '[]', 0, '2020-09-19 04:05:04', '2020-09-19 04:05:04', '2021-09-19 09:35:04'),
('f65054dd57dcc37b91c4e1d1765a2802d8c5bf4993b208177b3bb6fb78f773b8ae27cb244bd30d00', 6, 1, 'Personal Access Token', '[]', 0, '2020-09-19 06:56:21', '2020-09-19 06:56:21', '2021-09-19 12:26:21'),
('fbdd56346fe2346410d4feb41a83ac80b05fb4e1161de1e1c018c6429d6dc8482f06406363a8266e', 6, 1, 'token', '[]', 0, '2020-09-19 07:40:12', '2020-09-19 07:40:12', '2021-09-19 13:10:12');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'EJ6LfbBiVM24ExjvkJjz9me2NVThk4C7I6PmgC1r', NULL, 'http://localhost', 1, 0, 0, '2020-09-15 05:15:06', '2020-09-15 05:15:06'),
(2, NULL, 'Laravel Password Grant Client', '3w3fIDk9CWeCVDZcrWRvzSrcCfDAbkxUWLN3t4ak', 'users', 'http://localhost', 0, 1, 0, '2020-09-15 05:15:06', '2020-09-15 05:15:06');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-09-15 05:15:06', '2020-09-15 05:15:06');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `head_office_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` text COLLATE utf8mb4_unicode_ci,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`id`, `head_office_id`, `name`, `contact_person`, `contact`, `address1`, `city`, `branch_code`, `branch`, `created_at`, `updated_at`) VALUES
(1, 1, 'test', '12345688', '123456789', 'test', 'rajkot', '123', '123', '2020-09-05 22:27:25', '2020-09-05 22:27:25');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'web',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0-Active, 1-disabled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `slug`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'vehicle-create', 'web', 'vehicle-create', 1, NULL, NULL, NULL),
(2, 'vehicle-view', 'web', 'vehicle-view', 1, NULL, NULL, NULL),
(3, 'vehicle-delete', 'web', 'vehicle-delete', 1, NULL, NULL, NULL),
(4, 'vehicle-edit', 'web', 'vehicle-edit', 1, NULL, NULL, NULL),
(5, 'office-create', 'web', 'office-create', 1, NULL, NULL, NULL),
(6, 'office-view', 'web', 'office-view', 1, NULL, NULL, NULL),
(7, 'office-delete', 'web', 'office-delete', 1, NULL, NULL, NULL),
(8, 'office-edit', 'web', 'office-edit', 1, NULL, NULL, NULL),
(9, 'head_offices-create', 'web', 'head_offices-create', 1, NULL, NULL, NULL),
(10, 'head_offices-view', 'web', 'head_offices-view', 1, NULL, NULL, NULL),
(11, 'head_offices-delete', 'web', 'head_offices-delete', 1, NULL, NULL, NULL),
(12, 'head_offices-edit', 'web', 'head_offices-edit', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'web',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0-Active, 1-disabled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `slug`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'web', 'Admin', 1, NULL, NULL, NULL),
(2, 'agent', 'web', 'Agent', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_subscription_id` bigint(20) UNSIGNED DEFAULT NULL,
  `days` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` enum('due','paid') COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_mode` enum('debit','cash','credit','online') COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `user_subscription_id`, `days`, `amount`, `payment_status`, `payment_mode`, `notes`, `created_at`, `updated_at`) VALUES
(1, 6, 1, '2', '20', 'paid', 'cash', 'test', '2020-09-08 08:12:38', '2020-09-08 08:12:38'),
(2, 6, 1, '2', '20', 'paid', 'credit', 'erwer', '2020-09-08 08:17:57', '2020-09-08 08:17:57'),
(3, 7, 2, '2', '20', 'paid', 'online', 'test', '2020-09-08 08:34:11', '2020-09-08 08:34:11'),
(4, 6, 1, '2', '20', 'paid', 'online', 'test', '2020-09-08 09:36:38', '2020-09-08 09:36:38'),
(5, 6, 1, '2', '20', 'paid', 'online', 'tt', '2020-09-08 09:37:35', '2020-09-08 09:37:35'),
(6, 6, 1, '2', '20', 'paid', 'online', 'l', '2020-09-08 09:38:33', '2020-09-08 09:38:33'),
(7, 7, 2, '2', '20', 'due', 'cash', '2', '2020-09-08 09:40:50', '2020-09-08 09:40:50'),
(8, 6, 1, '3', '30', 'paid', 'credit', 'qw', '2020-09-08 23:59:34', '2020-09-08 23:59:34'),
(9, 6, 1, NULL, '0', 'paid', 'credit', 'qw', '2020-09-09 00:01:09', '2020-09-09 00:01:09'),
(10, 7, 2, '2', '20', 'due', 'cash', 'ww', '2020-09-09 00:02:35', '2020-09-09 00:02:35'),
(11, 6, 1, '2', '20', 'paid', 'credit', 'test', '2020-09-09 00:03:22', '2020-09-09 00:03:22'),
(12, 6, 1, '2', '20', 'paid', 'cash', 'test', '2020-09-09 00:06:44', '2020-09-09 00:06:44'),
(13, 6, 1, '2', '20', 'due', 'cash', '33', '2020-09-09 00:09:57', '2020-09-09 00:09:57'),
(14, 6, 1, '2', '20', 'due', 'cash', 'test', '2020-09-09 00:11:34', '2020-09-09 00:11:34'),
(15, 6, 1, '2', '20', 'due', 'cash', 't', '2020-09-15 11:33:19', '2020-09-15 11:33:19'),
(16, 6, 1, '2', '20', 'due', 'debit', 'e', '2020-09-15 11:36:55', '2020-09-15 11:36:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`, `role`, `status`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$10$eNorHZdGOYbB9gG.B3MtHeeetFQpUaKMOPS5Ds23dGiCxASi5OiSS', '1234657890', 'Admin', 'Active', NULL, '2020-09-06 02:35:43', '2020-09-06 02:35:43'),
(6, 'Bhavik', 'Bhavik@gmail.com', '$2y$10$cLkKqPw0e1gWyHRZwWaQsetX3Vf4xH0gWBrXVv68S4M/ftbQ4.CDm', '1234567890', 'agent', 'Active', NULL, '2020-09-08 05:14:07', '2020-09-08 05:14:07'),
(7, 'vivek', 'Vivek@gmail.com', '$2y$10$W6r4sTTEjLaTROKRyjt8OOhO.UzD/yp01mT5xpL6E6xx8wP01gwFa', '12345678', 'agent', 'Inactive', NULL, '2020-09-08 08:20:25', '2020-09-15 10:33:08');

-- --------------------------------------------------------

--
-- Table structure for table `user_assigneds`
--

CREATE TABLE `user_assigneds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vehicle_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_assigneds`
--

INSERT INTO `user_assigneds` (`id`, `user_id`, `vehicle_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2020-09-08 03:33:47', '2020-09-08 03:33:47'),
(2, 2, 2, '2020-09-08 03:33:54', '2020-09-08 03:33:54'),
(3, 6, 3, '2020-09-15 10:39:26', '2020-09-15 10:39:26'),
(4, 6, 5, '2020-09-15 10:56:34', '2020-09-15 10:56:34');

-- --------------------------------------------------------

--
-- Table structure for table `user_subscriptions`
--

CREATE TABLE `user_subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_subscriptions`
--

INSERT INTO `user_subscriptions` (`id`, `user_id`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 6, '2020-09-15', '2020-09-19', '2020-09-08 05:14:07', '2020-09-15 11:36:55'),
(2, 7, '2020-09-09', '2020-09-12', '2020-09-08 08:20:25', '2020-09-09 00:02:35');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agreement_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prod_n` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region_area` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cycle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allocation_month_grp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tenor_over` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charges` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gv` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regd_num` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chasis_num` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `engine_num` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `make` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rrm_name_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rrm_mail_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coordinator_mail_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `letter_refernce` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dispatch_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `letter_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valid_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `agreement_no`, `prod_n`, `region_area`, `office`, `branch`, `customer_name`, `cycle`, `paymode`, `emi`, `tet`, `noi`, `allocation_month_grp`, `tenor_over`, `charges`, `gv`, `model`, `regd_num`, `chasis_num`, `engine_num`, `make`, `rrm_name_no`, `rrm_mail_id`, `coordinator_mail_id`, `letter_refernce`, `dispatch_date`, `letter_date`, `valid_date`, `created_at`, `updated_at`) VALUES
(1, 'XVFPNDA00001385561', 'XVFPNDA00001385561', 'DELHI NCR', 'DELHI WEST', 'DELHI', 'ONN MOHD', '1', 'NACH', '10513', '21026', '2', '7+', 'YES', '0.1938782', '0.21026', '2007', 'DL-1-LG-9424', '19FC7M163458', 'E483CD7L178659', 'EICHER 10.75', 'RAVINDER - 7027071009', 'RAVINDERSR@CHOLA.MURUGAPPA.COM', 'NA', 'FC2502202086002', '43886', '43886', '44066', '2020-09-08 03:29:41', '2020-09-08 03:29:41'),
(2, 'XVFPDLI00001534424', 'XVFPDLI00001534424', 'DELHI NCR', 'DELHI WEST', 'DELHI', 'JITENDER KUMAR SHARMA', '10', 'NPDC', '12671', '177065', '13.974035198485', '7+', 'YES', '2.1563683', '1.77065', '2008', 'DL-1-LK-0533', '25EC8A165014', 'E483CD8A180989', 'EICHER 10.59', 'RAVINDER - 7027071009', 'RAVINDERSR@CHOLA.MURUGAPPA.COM', 'NA', 'FC2502202087963', '43886', '43886', '44066', '2020-09-08 03:29:41', '2020-09-08 03:29:41'),
(3, 'XVFPFBD00000741505', 'XVFPFBD00000741505', 'DELHI NCR', 'DELHI WEST', 'DELHI', 'RAM  BABU', '1', 'ECS', '12613', '24277', '1.9247601680806', '7+', 'YES', '0.7794844', '0.24277', '2006', 'HR-38-M-2227', '25ECSM130078', 'E483CD5M132587', 'EICHER 10.59', 'RAVINDER - 7027071009', 'RAVINDERSR@CHOLA.MURUGAPPA.COM', 'NA', 'FC2502202087983', '43886', '43886', '44066', '2020-09-08 03:29:41', '2020-09-08 03:29:41'),
(4, 'XSHUNDA00000916030', 'XSHUNDA00000916030', 'DELHI NCR', 'DELHI WEST', 'DELHI', 'SUBHASH  RAJ', '10', 'NPDC', '21093', '231102', '10.956336225288', '7+', 'YES', '4.3775336', '2.31102', '2006', 'HR-55-E-3413', '444026KTZ224031', '697TC57KTZ147801', 'TATA HCV', 'RAVINDER - 7027071009', 'RAVINDERSR@CHOLA.MURUGAPPA.COM', 'NA', 'FC2502202087935', '43886', '43886', '44066', '2020-09-08 03:29:41', '2020-09-08 03:29:41'),
(5, 'XVFPDLI00001349641', 'XVFPDLI00001349641', 'DELHI NCR', 'DELHI WEST', 'DELHI', 'SUDESH KUMAR', '10', 'ECS', '12899', '232138', '17.996588882859', '7+', 'YES', '2.9166414', '2.32138', '2006', 'DL-1-LG-3917', '45353DTZ810381', '497TC92DTZ835202', 'TATA SFC 712', 'RAVINDER - 7027071009', 'RAVINDERSR@CHOLA.MURUGAPPA.COM', 'NA', 'FC2502202087951', '43886', '43886', '44066', '2020-09-08 03:29:41', '2020-09-08 03:29:41'),
(6, 'XVFPNDA00001233805', 'XVFPNDA00001233805', 'DELHI NCR', 'DELHI WEST', 'DELHI', 'VED  PRAKASH', '10', 'ECS', '11696', '116960', '10', '7+', 'YES', '2.069952', '1.1696', '2005', 'DL-1-LG-1845', '455021HUZ820674', '497SPTC39HUZ876329', 'TATA SFC 410', 'RAVINDER - 7027071009', 'RAVINDERSR@CHOLA.MURUGAPPA.COM', 'NA', 'FC2502202087995', '43886', '43886', '44066', '2020-09-08 03:29:41', '2020-09-08 03:29:41'),
(7, 'XVFPSKI00001899468', 'XVFPSKI00001899468', 'DELHI NCR', 'DELHI WEST', 'DELHI', 'WAKEEL  AHMAD', '10', 'NPDC', '9421', '9263', '0.98322895658635', '7+', 'YES', '0.1010054', '0.09263', '2017', 'DL-1-LU-8694', 'MA1LD2FGFG5M98499', 'A6M1052371', 'CHAMPION', 'RAVINDER - 7027071009', 'RAVINDERSR@CHOLA.MURUGAPPA.COM', 'NA', 'FC100720203030', '44023', '44022', '44203', '2020-09-08 03:29:41', '2020-09-08 03:29:41'),
(8, 'XVFPDSN00001332871', 'XVFPDSN00001332871', 'DELHI NCR', 'DELHI WEST', 'DELHI', 'GHANSHYAM K', '1', 'NPDC', '6149', '30389.54', '4.9421922263783', '7+', 'YES', '0.9097506', '0.3038954', '2014', 'DL-1-LU-2120', 'MA1LF2FNSE5D21408', 'A4B0804670', 'MAHINDRA ALFA', 'RAVINDER - 7027071009', 'RAVINDERSR@CHOLA.MURUGAPPA.COM', 'NA', 'FC2502202087975', '43886', '43886', '44066', '2020-09-08 03:29:41', '2020-09-08 03:29:41'),
(9, 'XVFPSKI00001281666', 'XVFPSKI00001281666', 'DELHI NCR', 'DELHI WEST', 'DELHI', 'SOURABH KUMAR AGGARWAL', '1', 'NPDC', '8193', '30965', '3.7794458684243', '7+', 'YES', '0.6515714', '0.30965', '2014', 'DL-1-LU-1411', 'MA1LF2FNSE5D21494', 'A4B0804684', 'MAHINDRA ALFA', 'RAVINDER - 7027071009', 'RAVINDERSR@CHOLA.MURUGAPPA.COM', 'NA', 'FC2502202088013', '43886', '43886', '44066', '2020-09-08 03:29:41', '2020-09-08 03:29:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent_views`
--
ALTER TABLE `agent_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `head_offices`
--
ALTER TABLE `head_offices`
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
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_assigneds`
--
ALTER TABLE `user_assigneds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_subscriptions`
--
ALTER TABLE `user_subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agent_views`
--
ALTER TABLE `agent_views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `head_offices`
--
ALTER TABLE `head_offices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_assigneds`
--
ALTER TABLE `user_assigneds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_subscriptions`
--
ALTER TABLE `user_subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
