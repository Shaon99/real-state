-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2022 at 11:15 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `real_estate`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `image`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', 'admin@gmail.com', '6204f90bd1b001644493067.jpg', '$2y$10$afERxtpTP6KccV0zg9DZJOadTxqVbF9cBtExzws1YkiQOnQIiV9fC', NULL, '2022-01-19 21:51:47', '2022-08-04 12:32:14');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `subject`, `created_at`, `updated_at`) VALUES
(1, 'ABC', 'abc@gmail.com', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available', 'this is subject line', '2022-07-18 08:24:41', '2022-07-18 08:24:41');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meaning` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `name`, `subject`, `template`, `meaning`, `created_at`, `updated_at`) VALUES
(1, 'PASSWORD_RESET', 'Password Reset Code', '<p><b>Hi {username},\r\n                            </b></p>\r\n\r\n                            <p>\r\n                            Here is your password reset code : {code}</p>\r\n\r\n                            <p>\r\n                            Thanks,\r\n                            </p>\r\n\r\n                            <p>\r\n                            {sent_from}</p>', '{\"username\":\"Email Receiver Name\",\"code\":\"Email Verification Code\",\"sent_from\":\"Email Sent from\"}', '2022-01-20 03:51:47', '2022-01-20 03:51:47'),
(13, 'REQUEST_MAIL', 'request query and details', '<p><b>Hi {username},\r\n                            </b></p>\r\n\r\n                            <p>\r\n                          Title : {title}</p>\r\n<p>\r\n                          Name : {name}</p>\r\n<p>\r\n                          Phone : {phone}</p>\r\n<p>\r\n                          Email : {email}</p>\r\n<p>\r\n                          message : {message}</p>\r\n                            <p>\r\n                            Thanks,\r\n                            </p>\r\n\r\n                            <p>\r\n                            {sent_from}</p>', '{\r\n\"username\":\"Admin name\",\r\n\"name\":\"Person Name\",\r\n\"phone\":\"Person Phone\",\r\n\"email\":\"Person email\",\r\n\"title\":\"Apartment title\",\r\n\"message\":\"Person mssage\"\r\n}', '2022-01-20 03:51:47', '2022-08-05 13:05:29');

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
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'php',
  `email_config` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breadcrumbs` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_image` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allow_modal` tinyint(4) DEFAULT NULL,
  `cookie_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twak_allow` tinyint(4) DEFAULT NULL,
  `twak_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `sitename`, `site_email`, `email_method`, `email_config`, `logo`, `breadcrumbs`, `favicon`, `default_image`, `allow_modal`, `cookie_text`, `map_link`, `twak_allow`, `twak_key`, `created_at`, `updated_at`) VALUES
(1, 'Real Estate', 'techdynobd@gmail.com', 'smtp', '{\"smtp_host\":\"smtp.mailtrap.io\",\"smtp_username\":\"2344999d7a4fea\",\"smtp_password\":\"e628bc33189280\",\"smtp_port\":\"2525\",\"smtp_encryption\":\"tls\"}', '62e772a1d15411659335329.png', '62e04729b31a31658865449.jpg', '62e77441d52dd1659335745.png', 'default.png', 0, 'Accept Cookie For This Site', NULL, NULL, NULL, '2022-01-24 04:13:31', '2022-08-04 12:30:27');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `popular_location` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=NO',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `image`, `popular_location`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'Baridhara', '62e81400e444e1659376640.jpg', 1, '2022-08-01 11:57:21', '2022-08-02 07:21:15', NULL),
(5, 'bashundhara', '62e814113f9bb1659376657.jpg', 1, '2022-08-01 11:57:37', '2022-08-02 06:58:48', NULL);

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2021_11_23_044630_create_admins_table', 1),
(6, '2021_11_23_070339_create_admin_password_resets_table', 1),
(7, '2021_11_23_090928_create_general_settings_table', 1),
(13, '2021_12_14_052438_create_section_data_table', 1),
(15, '2021_12_14_064500_create_pages_table', 1),
(16, '2021_12_14_070239_create_email_templates_table', 1),
(34, '2022_02_05_161414_create_subscribers_table', 10),
(40, '2019_12_14_000001_create_personal_access_tokens_table', 14),
(44, '2019_08_19_000000_create_failed_jobs_table', 16),
(54, '2022_07_18_134035_create_contacts_table', 19),
(69, '2022_08_01_044119_create_locations_table', 25),
(70, '2022_08_02_045741_create_property_types_table', 26),
(73, '2022_08_02_054058_create_properties_table', 27),
(74, '2022_08_02_061832_create_properties_galleries_table', 27),
(76, '2022_08_04_113841_create_request_queries_table', 28),
(77, '2022_04_03_103201_create_jobs_table', 29);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_order` int(11) DEFAULT NULL,
  `sections` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_section_data` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_dropdown` tinyint(4) DEFAULT 0,
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `page_order`, `sections`, `custom_section_data`, `seo_description`, `is_dropdown`, `status`, `created_at`, `updated_at`) VALUES
(18, 'home', 'home', 1, '[\"banner\",\"popular_place\",\"feature\",\"why_choose_us\",\"popular_properties\",\"testimonial\",\"team\"]', NULL, 'home', 0, 0, '2022-07-30 02:49:34', '2022-08-04 07:06:33'),
(21, 'about us', 'about-us', 2, '[\"about\",\"why_choose_us\",\"team\",\"testimonial\"]', NULL, 'about us', 0, 1, '2022-07-31 10:22:10', '2022-07-31 10:34:05'),
(22, 'Blog', 'blog', 3, '[\"blog\"]', NULL, 'blog', 0, 1, '2022-07-31 10:36:10', '2022-07-31 10:36:10'),
(23, 'contact US', 'contact-us', 4, '[\"contact\"]', NULL, 'conatct us', 0, 1, '2022-07-31 10:36:52', '2022-07-31 10:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_id` bigint(20) UNSIGNED DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0=ongoing,1=complete',
  `completion_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apartment_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `land_area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_floors` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apartment_floor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bedroom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bathroom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `garages` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `launch_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `floor_plan_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_vedio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_map_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` tinyint(4) DEFAULT 0,
  `is_popular` tinyint(4) NOT NULL DEFAULT 0,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `name`, `slug`, `location_id`, `address`, `property_type_id`, `status`, `completion_date`, `picture`, `apartment_size`, `land_area`, `no_of_floors`, `apartment_floor`, `room`, `bedroom`, `bathroom`, `garages`, `launch_date`, `floor_plan_image`, `property_vedio`, `property_map_link`, `details`, `is_featured`, `is_popular`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'The skyLine', 'the-skyline', 5, '661', 1, 1, '2022-08-25', '62f8f6ab723fd1660483243.jpg', '947 sq ft', '200', '811', '81', '3', '2', '2', '341', '772', '62f8f6d5698a31660483285.jpg', NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1825.5187688782046!2d90.41520240394574!3d23.781677588991364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c79eb84ae2e3%3A0xd4edb9afcd51265b!2sUday%20Tower!5e0!3m2!1sen!2sbd!4v1658857877511!5m', 'This is detais', 1, 1, 1, NULL, '2022-08-02 07:04:23', '2022-08-14 07:21:25'),
(4, 'Kendall Mayo', '344', 4, '641', 1, 1, '538', '62eb54512adc21659589713.jpg', '66', '358', '398', '455', '205', '480', '541', '642', '2', '62eb54520121e1659589714.png', NULL, NULL, 'Cupiditate earum dig.a', 1, 1, 1, NULL, '2022-08-03 23:08:34', '2022-08-03 23:08:48'),
(5, 'Ivana Hart', '63', 5, '512', 1, 1, '289', '62eb58872ce061659590791.jpg', '111', '347', '107', '117', '347', '175', '980', '1000', '571', '62eb58878ac541659590791.jpg', NULL, '395', 'Enim dolor magnam mi.i', 1, 1, 1, NULL, '2022-08-03 23:26:31', '2022-08-03 23:29:33'),
(6, 'Justina Singleton', '634', 4, '85', 1, 0, '470', '62eb58fa67f131659590906.jpg', '973', '430', '245', '195', '546', '230', '382', '193', '749', NULL, NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1825.5187688782046!2d90.41520240394574!3d23.781677588991364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c79eb84ae2e3%3A0xd4edb9afcd51265b!2sUday%20Tower!5e0!3m2!1sen!2sbd!4v1658857877511!5m2!1sen!2sbd', 'Commodo deserunt del.s', 1, 1, 1, NULL, '2022-08-03 23:28:26', '2022-08-03 23:29:06');

-- --------------------------------------------------------

--
-- Table structure for table `properties_galleries`
--

CREATE TABLE `properties_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties_galleries`
--

INSERT INTO `properties_galleries` (`id`, `property_id`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(23, 2, '62f8fae820cd11660484328.jpg', NULL, '2022-08-14 07:38:48', '2022-08-14 07:38:48'),
(24, 2, '62f8fae8bb6db1660484328.jpg', NULL, '2022-08-14 07:38:49', '2022-08-14 07:38:49'),
(25, 2, '62f8fae9402da1660484329.jpg', NULL, '2022-08-14 07:38:49', '2022-08-14 07:38:49'),
(26, 2, '62f8fae9d65401660484329.jpg', NULL, '2022-08-14 07:38:50', '2022-08-14 07:38:50'),
(27, 2, '62f8faea6fbb81660484330.jpg', NULL, '2022-08-14 07:38:51', '2022-08-14 07:38:51'),
(28, 2, '62f8faf89a36d1660484344.jpg', NULL, '2022-08-14 07:39:05', '2022-08-14 07:39:05');

-- --------------------------------------------------------

--
-- Table structure for table `property_types`
--

CREATE TABLE `property_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_types`
--

INSERT INTO `property_types` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Luxury', NULL, '2022-08-01 23:14:09', '2022-08-01 23:20:35'),
(3, 'home', NULL, '2022-08-04 02:13:37', '2022-08-04 02:43:33');

-- --------------------------------------------------------

--
-- Table structure for table `request_queries`
--

CREATE TABLE `request_queries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_queries`
--

INSERT INTO `request_queries` (`id`, `title`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(2, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaaaaaaaaa', '2022-08-04 06:11:37', '2022-08-04 06:11:37'),
(3, 'Justina Singleton', 'Shaon', 'shaon@gmail.com', '013652858357', 'aaaaaaaaaaaaaa', '2022-08-04 13:07:54', '2022-08-04 13:07:54'),
(4, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaa', '2022-08-04 13:10:24', '2022-08-04 13:10:24'),
(5, 'Justina Singleton', 'Uttara', 'admin@gmail.com', '013652858357', 'aaaaaaaaa', '2022-08-05 12:15:43', '2022-08-05 12:15:43'),
(6, 'Justina Singleton', 'aaaaaaaa', 'admin@gmail.com', '013652858357', 'aaaaa', '2022-08-05 12:18:21', '2022-08-05 12:18:21'),
(7, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaaaaaaaa', '2022-08-05 12:20:09', '2022-08-05 12:20:09'),
(8, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaaaaaaaa', '2022-08-05 12:20:24', '2022-08-05 12:20:24'),
(9, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaaaaaaaa', '2022-08-05 12:21:10', '2022-08-05 12:21:10'),
(10, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaaaaaaaa', '2022-08-05 12:21:57', '2022-08-05 12:21:57'),
(13, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaaaaaaaa', '2022-08-05 12:23:49', '2022-08-05 12:23:49'),
(14, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaaaaaaaa', '2022-08-05 12:24:00', '2022-08-05 12:24:00'),
(15, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaaaaaaaa', '2022-08-05 12:27:36', '2022-08-05 12:27:36'),
(16, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaaa', '2022-08-05 12:28:09', '2022-08-05 12:28:09'),
(17, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaaa', '2022-08-05 12:29:33', '2022-08-05 12:29:33'),
(18, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaaaaaaa', '2022-08-05 12:32:02', '2022-08-05 12:32:02'),
(19, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaaaaaaa', '2022-08-05 12:34:57', '2022-08-05 12:34:57'),
(20, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaa', '2022-08-05 12:57:23', '2022-08-05 12:57:23'),
(21, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaa', '2022-08-05 12:57:44', '2022-08-05 12:57:44'),
(22, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaa', '2022-08-05 13:00:07', '2022-08-05 13:00:07'),
(23, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaa', '2022-08-05 13:00:43', '2022-08-05 13:00:43'),
(24, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaa', '2022-08-05 13:01:13', '2022-08-05 13:01:13'),
(25, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaa', '2022-08-05 13:01:53', '2022-08-05 13:01:53'),
(26, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaa', '2022-08-05 13:02:16', '2022-08-05 13:02:16'),
(27, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaa', '2022-08-05 13:02:52', '2022-08-05 13:02:52'),
(28, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaa', '2022-08-05 13:03:08', '2022-08-05 13:03:08'),
(29, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaa', '2022-08-05 13:03:27', '2022-08-05 13:03:27'),
(30, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaa', '2022-08-05 13:03:58', '2022-08-05 13:03:58'),
(31, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaa', '2022-08-05 13:04:59', '2022-08-05 13:04:59'),
(32, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaa', '2022-08-05 13:06:33', '2022-08-05 13:06:33'),
(33, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaaaa', '2022-08-05 13:06:52', '2022-08-05 13:06:52'),
(34, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaaaa', '2022-08-05 13:07:18', '2022-08-05 13:07:18'),
(35, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaaaa', '2022-08-05 13:07:53', '2022-08-05 13:07:53'),
(36, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaaaa', '2022-08-05 13:08:18', '2022-08-05 13:08:18'),
(37, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaaaa', '2022-08-05 13:08:43', '2022-08-05 13:08:43'),
(38, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaaaa', '2022-08-05 13:09:09', '2022-08-05 13:09:09'),
(39, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaaaa', '2022-08-05 13:13:05', '2022-08-05 13:13:05'),
(40, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaaaa', '2022-08-05 13:13:36', '2022-08-05 13:13:36'),
(41, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaaaa', '2022-08-05 13:14:04', '2022-08-05 13:14:04'),
(42, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaaaa', '2022-08-05 13:15:22', '2022-08-05 13:15:22'),
(43, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaaaa', '2022-08-05 13:15:43', '2022-08-05 13:15:43'),
(44, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaaaa', '2022-08-05 13:16:45', '2022-08-05 13:16:45'),
(45, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaaaa', '2022-08-05 13:17:55', '2022-08-05 13:17:55'),
(46, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaaaa', '2022-08-05 13:18:50', '2022-08-05 13:18:50'),
(47, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaaaa', '2022-08-05 13:20:26', '2022-08-05 13:20:26'),
(48, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaaaa', '2022-08-05 13:22:50', '2022-08-05 13:22:50'),
(49, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaaaa', '2022-08-05 13:23:09', '2022-08-05 13:23:09'),
(50, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaaaa', '2022-08-05 13:23:15', '2022-08-05 13:23:15'),
(51, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaaaa', '2022-08-05 13:25:09', '2022-08-05 13:25:09'),
(52, 'Kendall Mayo', 'ABC', 'shaon@gmail.com', '013652858357', 'aaaaaa', '2022-08-05 13:27:41', '2022-08-05 13:27:41'),
(53, 'Kendall Mayo', 'ABC', 'shaon@gmail.com', '013652858357', 'aaaaaa', '2022-08-05 13:27:54', '2022-08-05 13:27:54'),
(54, 'Kendall Mayo', 'ABC', 'shaon@gmail.com', '013652858357', 'aaaaaa', '2022-08-05 13:28:59', '2022-08-05 13:28:59'),
(55, 'Kendall Mayo', 'ABC', 'shaon@gmail.com', '013652858357', 'aaaaaa', '2022-08-05 13:29:45', '2022-08-05 13:29:45'),
(56, 'Kendall Mayo', 'sssssss', 'shaonahmed01@hotmail.com', '013652858357', 'ssasasss', '2022-08-05 13:30:26', '2022-08-05 13:30:26'),
(57, 'Kendall Mayo', 'sssssss', 'shaonahmed01@hotmail.com', '013652858357', 'ssasasss', '2022-08-05 13:30:46', '2022-08-05 13:30:46'),
(58, 'Kendall Mayo', 'sssssss', 'shaonahmed01@hotmail.com', '013652858357', 'ssasasss', '2022-08-05 13:31:04', '2022-08-05 13:31:04'),
(59, 'Kendall Mayo', 'sssssss', 'shaonahmed01@hotmail.com', '013652858357', 'ssasasss', '2022-08-05 13:32:20', '2022-08-05 13:32:20'),
(60, 'Kendall Mayo', 'sssssss', 'shaonahmed01@hotmail.com', '013652858357', 'ssasasss', '2022-08-05 13:32:33', '2022-08-05 13:32:33'),
(61, 'Kendall Mayo', 'sssssss', 'shaonahmed01@hotmail.com', '013652858357', 'ssasasss', '2022-08-05 13:32:50', '2022-08-05 13:32:50'),
(62, 'Kendall Mayo', 'sssssss', 'shaonahmed01@hotmail.com', '013652858357', 'ssasasss', '2022-08-05 13:33:50', '2022-08-05 13:33:50'),
(63, 'Kendall Mayo', 'sssssss', 'shaonahmed01@hotmail.com', '013652858357', 'ssasasss', '2022-08-05 13:34:02', '2022-08-05 13:34:02'),
(64, 'Kendall Mayo', 'sssssss', 'shaonahmed01@hotmail.com', '013652858357', 'ssasasss', '2022-08-05 13:34:13', '2022-08-05 13:34:13'),
(65, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaaa', '2022-08-05 13:38:00', '2022-08-05 13:38:00'),
(66, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaaa', '2022-08-05 13:38:12', '2022-08-05 13:38:12'),
(67, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaaa', '2022-08-05 13:38:26', '2022-08-05 13:38:26'),
(68, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaaa', '2022-08-05 13:38:44', '2022-08-05 13:38:44'),
(69, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaaa', '2022-08-05 13:41:08', '2022-08-05 13:41:08'),
(70, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaaa', '2022-08-05 13:41:20', '2022-08-05 13:41:20'),
(71, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaaa', '2022-08-05 13:41:36', '2022-08-05 13:41:36'),
(72, 'Justina Singleton', 'aaaa', 'admin@gmail.com', '013652858357', 'aaaaaaaa', '2022-08-05 13:55:24', '2022-08-05 13:55:24'),
(73, 'Justina Singleton', 'ABC', 'admin@gmail.com', '013652858357', 'aaaaaaaaa', '2022-08-06 00:55:31', '2022-08-06 00:55:31');

-- --------------------------------------------------------

--
-- Table structure for table `section_data`
--

CREATE TABLE `section_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `section_data`
--

INSERT INTO `section_data` (`id`, `key`, `data`, `category`, `created_at`, `updated_at`) VALUES
(125, 'banner.content', '{\"title\":\"Find Your Dream\",\"short_description\":\"We Have Over Million Properties For You.\",\"image\":\"62e4f8cfa64501659173071.jpg\"}', NULL, '2022-07-30 03:24:32', '2022-07-30 03:36:28'),
(126, 'popular_place.content', '{\"title\":\"Popular Places\",\"short_description\":\"Properties In Most Popular Places\"}', NULL, '2022-07-30 04:00:25', '2022-07-30 04:00:25'),
(127, 'feature.content', '{\"title\":\"Featured Properties\",\"short_description\":\"These are our featured properties\",\"feature_heading\":\"62eb813979a2b1659601209.jpg\"}', NULL, '2022-07-30 04:01:19', '2022-08-04 02:20:09'),
(128, 'why_choose_us.content', '{\"title\":\"Why Choose Us\",\"short_description\":\"We provide full service at every step.\"}', NULL, '2022-07-30 04:06:07', '2022-07-30 04:06:07'),
(129, 'popular_properties.content', '{\"title\":\"Discover Popular Properties\",\"short_description\":\"We provide full service at every step.\"}', NULL, '2022-07-30 04:09:29', '2022-07-30 04:09:29'),
(130, 'agents.content', '{\"title\":\"Meet Our Agents\",\"short_description\":\"Our Agents are here to help you\"}', NULL, '2022-07-30 04:10:39', '2022-07-30 04:10:39'),
(131, 'testimonial.content', '{\"title\":\"Clients Testimonials\",\"short_description\":\"We collect reviews from our customers.\"}', NULL, '2022-07-30 04:12:13', '2022-07-30 04:12:13'),
(132, 'partner.content', '{\"title\":\"Our Partners\",\"short_description\":\"The Companies That Represent Us.\"}', NULL, '2022-07-30 04:13:05', '2022-07-30 04:13:05'),
(133, 'footer.content', '{\"footer_logo\":\"62ec1c3bd7cf81659640891.png\",\"footer_short_description\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum incidunt architecto soluta laboriosam, perspiciatis, aspernatur officiis esse.\"}', NULL, '2022-07-30 04:15:29', '2022-08-04 13:21:32'),
(135, 'newsletter.content', '{\"title\":\"Newsletters\",\"short_description\":\"Sign Up for Our Newsletter to get Latest Updates and Offers. Subscribe to receive news in your inbox.\"}', NULL, '2022-07-30 04:21:58', '2022-07-30 04:21:58'),
(136, 'footer.element', '{\"social_link\":\"https:\\/\\/www.facebook.com\\/\",\"social_icon\":\"fa fa-facebook\"}', NULL, '2022-07-30 04:31:11', '2022-07-30 04:35:08'),
(137, 'footer.element', '{\"social_link\":\"https:\\/\\/twitter.com\\/\",\"social_icon\":\"fa fa-twitter\"}', NULL, '2022-07-30 04:36:14', '2022-07-30 04:36:14'),
(138, 'footer.element', '{\"social_link\":\"https:\\/\\/www.instagram.com\\/\",\"social_icon\":\"fab fa-instagram\"}', NULL, '2022-07-30 04:36:51', '2022-07-30 04:36:51'),
(139, 'footer.element', '{\"social_link\":\"https:\\/\\/www.youtube.com\\/\",\"social_icon\":\"fa fa-youtube\"}', NULL, '2022-07-30 04:37:16', '2022-07-30 04:37:16'),
(140, 'partner.element', '{\"image\":\"62e5447f6a1091659192447.png\"}', NULL, '2022-07-30 08:47:27', '2022-07-30 08:47:27'),
(141, 'partner.element', '{\"image\":\"62e54486c6b031659192454.png\"}', NULL, '2022-07-30 08:47:35', '2022-07-30 08:47:35'),
(142, 'partner.element', '{\"image\":\"62e5448dac1011659192461.png\"}', NULL, '2022-07-30 08:47:42', '2022-07-30 08:47:42'),
(143, 'partner.element', '{\"image\":\"62e544945463e1659192468.png\"}', NULL, '2022-07-30 08:47:48', '2022-07-30 08:47:48'),
(144, 'partner.element', '{\"image\":\"62e5449b2831a1659192475.png\"}', NULL, '2022-07-30 08:47:55', '2022-07-30 08:47:55'),
(145, 'partner.element', '{\"image\":\"62e544a21b7f91659192482.png\"}', NULL, '2022-07-30 08:48:02', '2022-07-30 08:48:02'),
(146, 'partner.element', '{\"image\":\"62e544ab4df011659192491.png\"}', NULL, '2022-07-30 08:48:11', '2022-07-30 08:48:11'),
(147, 'testimonial.element', '{\"image\":\"62e5462e1dba21659192878.jpg\",\"name\":\"Lisa Smith\",\"organisation\":\"New York\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore gna a. Ut enim ad minim veniam\"}', NULL, '2022-07-30 08:54:38', '2022-07-30 08:54:38'),
(148, 'testimonial.element', '{\"image\":\"62e546533e0081659192915.jpg\",\"name\":\"Mark Doe\",\"organisation\":\"New York\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore gna a. Ut enim ad minim veniam,\"}', NULL, '2022-07-30 08:55:15', '2022-07-30 08:55:15'),
(149, 'testimonial.element', '{\"image\":\"62e546b1a25531659193009.jpg\",\"name\":\"Sofia Hayat\",\"organisation\":\"New York\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore gna a. Ut enim ad minim veniam,\"}', NULL, '2022-07-30 08:56:49', '2022-07-30 08:56:49'),
(150, 'testimonial.element', '{\"image\":\"62e546f00c72d1659193072.jpg\",\"name\":\"Jessi Doe\",\"organisation\":\"New York\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore gna a. Ut enim ad minim veniam,\"}', NULL, '2022-07-30 08:57:52', '2022-07-30 08:57:52'),
(151, 'why_choose_us.element', '{\"image\":\"62e54b0b29b991659194123.png\",\"title\":\"Wide Renge Of Properties\",\"short_description\":\"lorem ipsum dolor sit amet, consectetur pro adipisici consectetur debits adipisicing lacus consectetur Business Directory.\"}', NULL, '2022-07-30 09:15:23', '2022-07-30 09:15:23'),
(152, 'why_choose_us.element', '{\"image\":\"62e54b21739791659194145.png\",\"title\":\"Wide Renge Of Properties\",\"short_description\":\"lorem ipsum dolor sit amet, consectetur pro adipisici consectetur debits adipisicing lacus consectetur Business Directory.\"}', NULL, '2022-07-30 09:15:45', '2022-07-30 09:15:45'),
(153, 'why_choose_us.element', '{\"image\":\"62e54b3a0d5e31659194170.png\",\"title\":\"Wide Renge Of Properties\",\"short_description\":\"lorem ipsum dolor sit amet, consectetur pro adipisici consectetur debits adipisicing lacus consectetur Business Directory.\"}', NULL, '2022-07-30 09:16:10', '2022-07-30 09:16:10'),
(154, 'why_choose_us.element', '{\"image\":\"62e5678dd3c261659201421.png\",\"title\":\"Wide Renge Of Properties\",\"short_description\":\"lorem ipsum dolor sit amet, consectetur pro adipisici consectetur debits adipisicing lacus consectetur Business Directory.\"}', NULL, '2022-07-30 09:16:30', '2022-07-30 11:17:02'),
(172, 'team.content', '{\"title\":\"Our Team\",\"short_description\":\"We provide full service at every step.\"}', NULL, '2022-07-31 02:20:29', '2022-07-31 02:20:29'),
(177, 'team.element', '{\"member_name\":\"Sara taylor\",\"designation\":\"CEO\",\"facebook_link\":\"https:\\/\\/www.facebook.com\\/\",\"linkedin_link\":\"https:\\/\\/www.linkedin.com\\/\",\"instagram_link\":\"https:\\/\\/www.instagram.com\\/\",\"image\":\"62e63da1e3d211659256225.png\"}', NULL, '2022-07-31 02:30:26', '2022-07-31 02:41:25'),
(182, 'contact.content', '{\"location\":\"95 South Park Avenue, USA\",\"email\":\"abc@gmail.com\",\"phone\":\"0123456789\",\"map_link\":\"https:\\/\\/www.google.com\\/maps\\/embed?pb=!1m18!1m12!1m3!1d1825.5187688782046!2d90.41520240394574!3d23.781677588991364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c79eb84ae2e3%3A0xd4edb9afcd51265b!2sUday%20Tower!5e0!3m2!1sen!2sbd!4v1658857877511!5m2!1sen!2sbd\",\"header_image\":\"62e76e6e852121659334254.jpg\",\"site_image\":\"62e64c350d3ce1659259957.jpg\"}', NULL, '2022-07-31 03:30:07', '2022-08-01 10:10:54'),
(183, 'blog.content', '{\"header_image\":\"62e66e7b833661659268731.jpg\"}', NULL, '2022-07-31 05:58:52', '2022-07-31 05:58:52'),
(184, 'blog.element', '{\"title\":\"Real Estate News\",\"short_description\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ipsum dolor sit amet, consectetur.\",\"description\":\"<p class=\\\"mb-3\\\" style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: 26px; color: rgb(102, 102, 102); padding: 0px; border: 0px; vertical-align: baseline; font-family: Lato, sans-serif; font-size: 15px;\\\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, ea? Vitae pariatur ab amet iusto tempore neque a, deserunt eaque recusandae obcaecati eos atque delectus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi labore vel enim repellendus excepturi autem. Eligendi cum laboriosam exercitationem illum repudiandae quasi sint dicta consectetur porro fuga ea, perspiciatis aut!<\\/p><p class=\\\"d-none d-sm-none d-lg-block d-md-block\\\" style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: 26px; color: rgb(102, 102, 102); padding: 0px; border: 0px; vertical-align: baseline; font-family: Lato, sans-serif; font-size: 15px;\\\"><\\/p><p style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: 26px; color: rgb(102, 102, 102); padding: 0px; border: 0px; vertical-align: baseline; font-family: Lato, sans-serif; font-size: 15px;\\\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, ea? Vitae pariatur ab amet iusto tempore neque a, deserunt eaque recusandae obcaecati eos atque delectus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi labore vel enim repellendus excepturi autem. Eligendi cum laboriosam exercitationem illum repudiandae quasi sint dicta consectetur porro fuga ea, perspiciatis aut!<\\/p><p style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: 26px; color: rgb(102, 102, 102); padding: 0px; border: 0px; vertical-align: baseline; font-family: Lato, sans-serif; font-size: 15px;\\\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, ea? Vitae pariatur ab amet iusto tempore neque a, deserunt eaque recusandae obcaecati eos atque delectus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi labore vel enim repellendus excepturi autem. Eligendi cum laboriosam exercitationem illum repudiandae quasi sint dicta conse<\\/p><p class=\\\"mb-3\\\" style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: 26px; color: rgb(102, 102, 102); padding: 0px; border: 0px; vertical-align: baseline; font-family: Lato, sans-serif; font-size: 15px;\\\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, ea? Vitae pariatur ab amet iusto tempore neque a, deserunt eaque recusandae obcaecati eos atque delectus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi labore vel enim repellendus excepturi autem. Eligendi cum laboriosam exercitationem illum repudiandae quasi sint dicta consectetur porro fuga ea, perspiciatis aut!<\\/p><p class=\\\"d-none d-sm-none d-lg-block d-md-block\\\" style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: 26px; color: rgb(102, 102, 102); padding: 0px; border: 0px; vertical-align: baseline; font-family: Lato, sans-serif; font-size: 15px;\\\"><\\/p><p style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: 26px; color: rgb(102, 102, 102); padding: 0px; border: 0px; vertical-align: baseline; font-family: Lato, sans-serif; font-size: 15px;\\\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, ea? Vitae pariatur ab amet iusto tempore neque a, deserunt eaque recusandae obcaecati eos atque delectus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi labore vel enim repellendus excepturi autem. Eligendi cum laboriosam exercitationem illum repudiandae quasi sint dicta consectetur porro fuga ea, perspiciatis aut!<\\/p><p style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: 26px; color: rgb(102, 102, 102); padding: 0px; border: 0px; vertical-align: baseline; font-family: Lato, sans-serif; font-size: 15px;\\\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, ea? Vitae pariatur ab amet iusto tempore neque a, deserunt eaque recusandae obcaecati eos atque delectus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi labore vel enim repellendus excepturi autem. Eligendi cum laboriosam exercitationem illum repudiandae quasi sint dicta conse<\\/p>\",\"image\":\"62e66eb771a571659268791.jpg\"}', NULL, '2022-07-31 05:59:51', '2022-07-31 06:45:30'),
(185, 'blog.element', '{\"title\":\"Real Estate News\",\"short_description\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ipsum dolor sit amet, consectetur.\",\"description\":\"<p style=\\\"color:rgb(102,102,102);font-family:Lato, sans-serif;font-size:15px;\\\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, ea? Vitae pariatur ab amet iusto tempore neque a, deserunt eaque recusandae obcaecati eos atque delectus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi labore vel enim repellendus excepturi autem. Eligendi cum laboriosam exercitationem illum repudiandae quasi sint dicta consectetur porro fuga ea, perspiciatis aut!<\\/p><p style=\\\"color:rgb(102,102,102);font-family:Lato, sans-serif;font-size:15px;\\\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, ea? Vitae pariatur ab amet iusto tempore neque a, deserunt eaque recusandae obcaecati eos atque delectus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi labore vel enim repellendus excepturi autem. Eligendi cum laboriosam exercitationem illum repudiandae quasi sint dicta consectetur porro fuga ea, perspiciatis aut!<\\/p>\",\"image\":\"62e67215d577e1659269653.jpg\"}', NULL, '2022-07-31 06:14:14', '2022-07-31 07:25:43'),
(186, 'about.content', '{\"title\":\"FIND HOUSES\",\"vedio_link\":\"https:\\/\\/www.youtube.com\\/watch?v=2xHQqYRcrx4\",\"description\":\"<p style=\\\"line-height: 26px; color: rgb(102, 102, 102); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: Lato, sans-serif; font-size: 15px;\\\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum odio id voluptatibus incidunt cum? Atque quasi eum debitis optio ab. Esse itaque officiis tempora possimus odio rerum aperiam ratione, sunt. Lorem ipsum dolor sit amet, consectetur adipisicing elit sunt.<\\/p><p style=\\\"line-height: 26px; color: rgb(102, 102, 102); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: Lato, sans-serif; font-size: 15px;\\\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum odio id voluptatibus incidunt cum? Atque quasi eum debitis optio ab. Esse itaque officiis tempora possimus odio rerum aperiam ratione, sunt. Lorem ipsum dolor sit amet, consectetur adipisicing elit sunt.<\\/p>\",\"header_image\":\"62e76d39a1e091659333945.jpg\",\"image\":\"62e76d3a0979d1659333946.jpg\"}', NULL, '2022-07-31 10:17:20', '2022-08-01 10:05:46'),
(189, 'photo_gallery.element', '{\"title\":\"Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua Ipsum Dolor Sit Amet, Consectetur.\",\"image\":\"62e7ac3aa93d51659350074.jpg\"}', NULL, '2022-08-01 04:34:35', '2022-08-01 05:13:38'),
(190, 'photo_gallery.content', '{\"header_image\":\"62e7b18a98e481659351434.jpg\"}', NULL, '2022-08-01 04:52:21', '2022-08-01 04:57:15'),
(191, 'photo_gallery.element', '{\"title\":\"Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua Ipsum Dolor Sit Amet, Consectetur.\",\"image\":\"62e7b49f2b9291659352223.jpg\"}', NULL, '2022-08-01 05:10:23', '2022-08-01 05:13:24'),
(192, 'photo_gallery.element', '{\"title\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ipsum dolor sit amet, consectetur.\",\"image\":\"62e7b4fc6aefb1659352316.jpg\"}', NULL, '2022-08-01 05:11:57', '2022-08-01 05:11:57'),
(193, 'vedio_gallery.content', '{\"header_image\":\"62e7c2a8a18f91659355816.jpg\"}', NULL, '2022-08-01 06:10:17', '2022-08-01 06:10:17'),
(194, 'vedio_gallery.element', '{\"title\":\"This is first vedio\",\"vedio_link\":\"https:\\/\\/www.youtube.com\\/watch?v=ST6TMCblvSc\",\"background_image\":\"62e7c318e6d6f1659355928.jpg\"}', NULL, '2022-08-01 06:12:09', '2022-08-01 06:12:09'),
(195, 'vedio_gallery.element', '{\"title\":\"saaaaaaaaa\",\"vedio_link\":\"https:\\/\\/www.youtube.com\\/watch?v=ST6TMCblvSc\",\"background_image\":\"62e7c338507261659355960.png\"}', NULL, '2022-08-01 06:12:41', '2022-08-01 06:12:41');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'shaon@gmail.com', '2022-07-16 13:03:02', '2022-07-16 13:03:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `properties_location_id_foreign` (`location_id`),
  ADD KEY `properties_property_type_id_foreign` (`property_type_id`);

--
-- Indexes for table `properties_galleries`
--
ALTER TABLE `properties_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `properties_galleries_property_id_foreign` (`property_id`);

--
-- Indexes for table `property_types`
--
ALTER TABLE `property_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_queries`
--
ALTER TABLE `request_queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_data`
--
ALTER TABLE `section_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `section_data_category_foreign` (`category`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `properties_galleries`
--
ALTER TABLE `properties_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `property_types`
--
ALTER TABLE `property_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `request_queries`
--
ALTER TABLE `request_queries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `section_data`
--
ALTER TABLE `section_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `properties_property_type_id_foreign` FOREIGN KEY (`property_type_id`) REFERENCES `property_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `properties_galleries`
--
ALTER TABLE `properties_galleries`
  ADD CONSTRAINT `properties_galleries_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
