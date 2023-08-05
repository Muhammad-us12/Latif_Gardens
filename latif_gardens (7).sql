-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2023 at 11:37 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latif_gardens`
--

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `opening_bal` double(12,2) NOT NULL,
  `balance` double(12,2) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `display_on_web` varchar(255) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `client_assigns` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `fname`, `lname`, `opening_bal`, `balance`, `email`, `password`, `picture`, `country`, `city`, `phone`, `address`, `display_on_web`, `user_id`, `status`, `client_assigns`, `created_at`, `updated_at`) VALUES
(1, 'Khashif', 'Ali', 4000.00, 5000.00, 'kashif@gmail.com', '$2y$10$nLff.4k1e9J8rhmqvmmj6e3Fd0QGWzXpf8FWFR4JTmy6H5OSGEqE6', '1768896626127684.jpg', 'PAKISTAN', 'Sheikhupura', '0333-2323232', 'Sheikhupura', '1', 1, 'active', 1, '2023-06-16 16:34:40', '2023-07-26 21:38:49'),
(2, 'Aslam', 'Chohan', 5000.00, 5000.00, 'aslam@gmail.com', '$2y$10$lSsquNrpVjCTrkbPTZluCOzqlbm8Sl4.lcT2WuTlIrhPWtJz5oJVq', '1768896822548539.jpg', 'PAKISTAN', 'Sheikhupura', '0333-2323232', 'Sheikhupura', '1', 1, 'active', 1, '2023-06-16 16:37:48', '2023-06-28 11:33:23'),
(3, 'Muhammad', 'Ali', 20000.00, 100000.00, 'ali@gmail.com', '$2y$10$w0BNDulJZMvCBEndjQ4PL.zPxAMDJ/vo0i/S9Xpk9KwAZ/xm.1mtW', '1769976804314240.jpg', 'PAKISTAN', 'Sheikhupura', '0333-2323232', 'Test Addresst', '1', 1, 'active', 0, '2023-06-28 19:43:38', '2023-08-05 21:05:56');

-- --------------------------------------------------------

--
-- Table structure for table `agent_ledegers`
--

CREATE TABLE `agent_ledegers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment` varchar(50) DEFAULT NULL,
  `received` varchar(50) DEFAULT NULL,
  `commission` varchar(50) DEFAULT NULL,
  `balance` varchar(50) NOT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `recevied_id` int(11) DEFAULT NULL,
  `file_id` int(11) DEFAULT NULL,
  `property_id` int(11) DEFAULT NULL,
  `plot_sale_id` int(11) DEFAULT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agent_ledegers`
--

INSERT INTO `agent_ledegers` (`id`, `payment`, `received`, `commission`, `balance`, `payment_id`, `recevied_id`, `file_id`, `property_id`, `plot_sale_id`, `agent_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, '6000', NULL, NULL, '10000', NULL, 4, NULL, NULL, NULL, 1, 1, '2023-07-26 06:56:58', '2023-07-26 06:56:58'),
(3, NULL, '5000', NULL, '5000', 2, NULL, NULL, NULL, NULL, 1, 1, '2023-07-26 21:38:49', '2023-07-26 21:38:49'),
(4, '160000.00', NULL, NULL, '180000', NULL, NULL, NULL, NULL, 7, 3, 1, '2023-08-05 20:59:44', '2023-08-05 20:59:44'),
(5, NULL, '80000', NULL, '100000', 5, NULL, NULL, NULL, NULL, 3, 1, '2023-08-05 21:05:56', '2023-08-05 21:05:56');

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `block_name` varchar(255) NOT NULL,
  `scoiety` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`id`, `block_name`, `scoiety`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'A Block', 1, 1, '2023-07-22 01:56:58', '2023-07-22 01:56:58'),
(2, 'B block', 1, 1, '2023-07-22 01:57:13', '2023-07-22 01:57:13'),
(3, 'C Block', 1, 1, '2023-07-22 01:57:35', '2023-07-22 01:57:35');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `short_description` text NOT NULL,
  `blog_category` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `picture`, `status`, `description`, `short_description`, `blog_category`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'First Blogs update', '1773009900324967.png', 'publish', '<p><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px;\">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.&nbsp;</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px; background-color: var(--ct-card-bg); font-weight: var(--ct-body-font-weight); text-align: var(--ct-body-text-align);\">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px; background-color: var(--ct-card-bg); font-weight: var(--ct-body-font-weight); text-align: var(--ct-body-text-align);\">&nbsp;</span><br></p>', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.', 1, 1, '2023-06-07 23:09:45', '2023-08-01 07:13:24'),
(2, 'Booking travel during Corona: good advice in an uncertain time', '1770213004442067.png', 'publish', '<h3 class=\"text-20 fw-500\" style=\"margin-top: 0px; margin-bottom: 0px; font-weight: 500; line-height: 1.45; color: rgb(5, 16, 54); font-family: Jost, sans-serif; font-size: var(--text-20) !important;\">What makes a good brand book?</h3><div class=\"text-15 mt-20\" style=\"color: rgb(5, 16, 54); font-family: Jost, sans-serif; font-size: var(--text-15) !important; margin-top: 20px !important;\">Sed viverra ipsum nunc aliquet bibendum enim facilisis gravida. Diam phasellus vestibulum lorem sed risus ultricies. Magna sit amet purus gravida quis blandit. Arcu cursus vitae congue mauris. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Semper risus in hendrerit gravida rutrum quisque non. At urna condimentum mattis pellentesque id nibh tortor. A erat nam at lectus urna duis convallis convallis tellus. Sit amet mauris commodo quis imperdiet massa. Vitae congue eu consequat ac felis.</div><ul class=\"list-disc text-15 mt-30\" style=\"padding: 0px; margin-bottom: 0px; list-style: none; margin-right: 0px; margin-left: 0px; color: rgb(5, 16, 54); font-family: Jost, sans-serif; margin-top: 30px !important; font-size: var(--text-15) !important;\"><li style=\"list-style: inside disc; margin: 0px; padding: 0px;\">Sed viverra ipsum nunc aliquet bibendum enim facilisis gravida.</li><li style=\"list-style: inside disc; margin: 0px; padding: 0px;\">At urna condimentum mattis pellentesque id nibh. Laoreet non curabitur</li><li style=\"list-style: inside disc; margin: 0px; padding: 0px;\">Magna etiam tempor orci eu lobortis elementum.</li><li style=\"list-style: inside disc; margin: 0px; padding: 0px;\">Bibendum est ultricies integer quis. Semper eget duis at tellus.</li></ul><div class=\"quote mt-30 mb-30\" style=\"position: relative; padding: 20px 0px 20px 75px; width: 740px; max-width: 100%; color: rgb(5, 16, 54); font-family: Jost, sans-serif; font-size: 16px; margin-top: 30px !important; margin-bottom: 30px !important;\"><div class=\"quote__line bg-blue-1\" style=\"width: 5px; height: 141.25px; position: absolute; left: 0px; top: 0px; background-color: var(--color-blue-1) !important;\"></div><div class=\"quote__icon\" style=\"position: absolute; top: 12px; left: 22px; z-index: -1;\"><img src=\"https://creativelayers.net/themes/gotrip-html/img/misc/quote-light.svg\" alt=\"icon\" style=\"max-width: 100%; height: auto;\"></div><div class=\"text-18 fw-500\" style=\"font-size: var(--text-18) !important;\">“Sed viverra ipsum nunc aliquet bibendum enim facilisis gravida. Diam phasellus vestibulum lorem sed risus ultricies. Magna sit amet purus gravida quis blandit. Arcu cursus vitae congue mauris.“</div></div><div class=\"text-15 mt-20\" style=\"color: rgb(5, 16, 54); font-family: Jost, sans-serif; font-size: var(--text-15) !important; margin-top: 20px !important;\">Donec purus posuere nullam lacus aliquam egestas arcu. A egestas a, tellus massa, ornare vulputate. Erat enim eget laoreet ullamcorper lectus aliquet nullam tempus id. Dignissim convallis quam aliquam rhoncus, lectus nullam viverra. Bibendum dignissim tortor, phasellus pellentesque commodo, turpis vel eu. Donec consectetur ipsum nibh lobortis elementum mus velit tincidunt elementum. Ridiculus eu convallis eu mattis iaculis et, in dolor. Sem libero, tortor suspendisse et, purus euismod posuere sit. Risus dui ut viverra venenatis ipsum tincidunt non, proin. Euismod pharetra sit ac nisi. Erat lacus, amet quisque urna faucibus. Rhoncus praesent faucibus rhoncus nec adipiscing tristique sed facilisis velit.<br><br>Neque nulla porta ut urna rutrum. Aliquam cursus arcu tincidunt mus dictum sit euismod cum id. Dictum integer ultricies arcu fermentum fermentum sem consectetur. Consectetur eleifend aenean eu neque euismod amet parturient turpis vitae. Faucibus ipsum felis et duis fames.</div>', 'Sed viverra ipsum nunc aliquet bibendum enim facilisis gravida. Diam phasellus vestibulum lorem sed risus ultricies. Magna sit amet purus gravida quis blandit. Arcu cursus vitae congue mauris. Nunc mattis enim ut tellus elementum sagittis vitae et leo.', 1, 1, '2023-07-01 05:17:56', '2023-07-01 05:25:32'),
(3, 'The best times & places to see the Northern Lights in Iceland', '1770213098113975.png', 'publish', '<h3 class=\"text-20 fw-500\" style=\"margin-top: 0px; margin-bottom: 0px; font-weight: 500; line-height: 1.45; color: rgb(5, 16, 54); font-family: Jost, sans-serif; font-size: var(--text-20) !important;\">What makes a good brand book?</h3><div class=\"text-15 mt-20\" style=\"color: rgb(5, 16, 54); font-family: Jost, sans-serif; font-size: var(--text-15) !important; margin-top: 20px !important;\">Sed viverra ipsum nunc aliquet bibendum enim facilisis gravida. Diam phasellus vestibulum lorem sed risus ultricies. Magna sit amet purus gravida quis blandit. Arcu cursus vitae congue mauris. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Semper risus in hendrerit gravida rutrum quisque non. At urna condimentum mattis pellentesque id nibh tortor. A erat nam at lectus urna duis convallis convallis tellus. Sit amet mauris commodo quis imperdiet massa. Vitae congue eu consequat ac felis.</div><ul class=\"list-disc text-15 mt-30\" style=\"padding: 0px; margin-bottom: 0px; list-style: none; margin-right: 0px; margin-left: 0px; color: rgb(5, 16, 54); font-family: Jost, sans-serif; margin-top: 30px !important; font-size: var(--text-15) !important;\"><li style=\"list-style: inside disc; margin: 0px; padding: 0px;\">Sed viverra ipsum nunc aliquet bibendum enim facilisis gravida.</li><li style=\"list-style: inside disc; margin: 0px; padding: 0px;\">At urna condimentum mattis pellentesque id nibh. Laoreet non curabitur</li><li style=\"list-style: inside disc; margin: 0px; padding: 0px;\">Magna etiam tempor orci eu lobortis elementum.</li><li style=\"list-style: inside disc; margin: 0px; padding: 0px;\">Bibendum est ultricies integer quis. Semper eget duis at tellus.</li></ul><div class=\"quote mt-30 mb-30\" style=\"position: relative; padding: 20px 0px 20px 75px; width: 740px; max-width: 100%; color: rgb(5, 16, 54); font-family: Jost, sans-serif; font-size: 16px; margin-top: 30px !important; margin-bottom: 30px !important;\"><div class=\"quote__line bg-blue-1\" style=\"width: 5px; height: 141.25px; position: absolute; left: 0px; top: 0px; background-color: var(--color-blue-1) !important;\"></div><div class=\"quote__icon\" style=\"position: absolute; top: 12px; left: 22px; z-index: -1;\"><img src=\"https://creativelayers.net/themes/gotrip-html/img/misc/quote-light.svg\" alt=\"icon\" style=\"max-width: 100%; height: auto;\"></div><div class=\"text-18 fw-500\" style=\"font-size: var(--text-18) !important;\">“Sed viverra ipsum nunc aliquet bibendum enim facilisis gravida. Diam phasellus vestibulum lorem sed risus ultricies. Magna sit amet purus gravida quis blandit. Arcu cursus vitae congue mauris.“</div></div><div class=\"text-15 mt-20\" style=\"color: rgb(5, 16, 54); font-family: Jost, sans-serif; font-size: var(--text-15) !important; margin-top: 20px !important;\">Donec purus posuere nullam lacus aliquam egestas arcu. A egestas a, tellus massa, ornare vulputate. Erat enim eget laoreet ullamcorper lectus aliquet nullam tempus id. Dignissim convallis quam aliquam rhoncus, lectus nullam viverra. Bibendum dignissim tortor, phasellus pellentesque commodo, turpis vel eu. Donec consectetur ipsum nibh lobortis elementum mus velit tincidunt elementum. Ridiculus eu convallis eu mattis iaculis et, in dolor. Sem libero, tortor suspendisse et, purus euismod posuere sit. Risus dui ut viverra venenatis ipsum tincidunt non, proin. Euismod pharetra sit ac nisi. Erat lacus, amet quisque urna faucibus. Rhoncus praesent faucibus rhoncus nec adipiscing tristique sed facilisis velit.</div>', 'Donec purus posuere nullam lacus aliquam egestas arcu. A egestas a, tellus massa, ornare vulputate. Erat enim eget laoreet ullamcorper lectus aliquet nullam tempus id. Dignissim convallis quam aliquam rhoncus, lectus nullam viverra. Bibendum dignissim tortor, phasellus pellentesque commodo, turpis vel eu.', 1, 1, '2023-07-01 05:19:26', '2023-07-01 05:25:39'),
(4, 'What makes a good brand book?', '1770213164495441.png', 'publish', '<p><span style=\"color: rgb(5, 16, 54); font-family: Jost, sans-serif; font-size: 15px;\">Sed viverra ipsum nunc aliquet bibendum enim facilisis gravida. Diam phasellus vestibulum lorem sed risus ultricies. Magna sit amet purus gravida quis blandit. Arcu cursus vitae congue mauris. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Semper risus in hendrerit gravida rutrum quisque non. At urna condimentum mattis pellentesque id nibh tortor.&nbsp;</span></p><p><span style=\"color: rgb(5, 16, 54); font-family: Jost, sans-serif; font-size: 15px;\">Sed viverra ipsum nunc aliquet bibendum enim facilisis gravida. Diam phasellus vestibulum lorem sed risus ultricies. Magna sit amet purus gravida quis blandit. Arcu cursus vitae congue mauris. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Semper risus in hendrerit gravida rutrum quisque non. At urna condimentum mattis pellentesque id nibh tortor.&nbsp;</span><span style=\"color: rgb(5, 16, 54); font-family: Jost, sans-serif; font-size: 15px;\"><br></span><br></p>', 'Sed viverra ipsum nunc aliquet bibendum enim facilisis gravida. Diam phasellus vestibulum lorem sed risus ultricies. Magna sit amet purus gravida quis blandit. Arcu cursus vitae congue mauris. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Semper risus in hendrerit gravida rutrum quisque non. At urna condimentum mattis pellentesque id nibh tortor.', 1, 1, '2023-07-01 05:20:29', '2023-07-01 05:25:44');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Tour Category', '2023-06-07 23:07:48', '2023-06-07 23:08:07');

-- --------------------------------------------------------

--
-- Table structure for table `cash_accountledgers`
--

CREATE TABLE `cash_accountledgers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment` varchar(50) DEFAULT NULL,
  `received` varchar(50) DEFAULT NULL,
  `balance` varchar(50) NOT NULL,
  `deposit_id` int(11) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `recevied_id` int(11) DEFAULT NULL,
  `file_id` int(11) DEFAULT NULL,
  `property_id` int(11) DEFAULT NULL,
  `expense_id` int(11) DEFAULT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `insevter_name` varchar(300) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cash_accountledgers`
--

INSERT INTO `cash_accountledgers` (`id`, `payment`, `received`, `balance`, `deposit_id`, `payment_id`, `recevied_id`, `file_id`, `property_id`, `expense_id`, `account_id`, `user_id`, `insevter_name`, `created_at`, `updated_at`) VALUES
(1, NULL, '500', '5500', 1, NULL, NULL, NULL, NULL, NULL, 1, 1, 'Test', '2023-06-23 07:12:22', '2023-06-23 07:12:22'),
(2, '3000', NULL, '2500', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, '2023-06-23 07:13:10', '2023-06-23 07:13:10'),
(6, '2500', NULL, '0', NULL, NULL, 4, NULL, NULL, NULL, 1, 1, NULL, '2023-07-26 06:56:58', '2023-07-26 06:56:58'),
(7, NULL, '3008500', '3008500', NULL, NULL, 4, NULL, NULL, NULL, 1, 1, NULL, '2023-07-26 06:56:58', '2023-07-26 06:56:58'),
(8, '1005000', NULL, '2003500', NULL, 2, NULL, NULL, NULL, NULL, 1, 1, NULL, '2023-07-26 21:38:49', '2023-07-26 21:38:49'),
(9, '4000000', NULL, '-1996500', NULL, 3, NULL, NULL, NULL, NULL, 1, 1, NULL, '2023-07-30 20:27:34', '2023-07-30 20:27:34'),
(10, NULL, '8000000', '6003500', NULL, NULL, 6, NULL, NULL, NULL, 1, 1, NULL, '2023-07-30 20:30:54', '2023-07-30 20:30:54'),
(11, NULL, '3000000', '9003500', NULL, NULL, 7, NULL, NULL, NULL, 1, 1, NULL, '2023-07-30 20:36:24', '2023-07-30 20:36:24'),
(12, NULL, '4000000', '13003500', NULL, NULL, 8, NULL, NULL, NULL, 1, 1, NULL, '2023-07-30 20:39:08', '2023-07-30 20:39:08'),
(13, NULL, '7000000', '20003500', NULL, NULL, 9, NULL, NULL, NULL, 1, 1, NULL, '2023-08-01 07:18:20', '2023-08-01 07:18:20'),
(14, '10000', NULL, '19993500', NULL, NULL, NULL, NULL, NULL, 2, 1, 1, NULL, '2023-08-02 06:39:27', '2023-08-02 06:39:27'),
(15, NULL, '3000000', '22993500', NULL, NULL, 10, NULL, NULL, NULL, 1, 1, NULL, '2023-08-05 08:03:50', '2023-08-05 08:03:50'),
(16, NULL, '2000000', '24993500', NULL, NULL, 11, NULL, NULL, NULL, 1, 1, NULL, '2023-08-05 11:38:12', '2023-08-05 11:38:12'),
(17, '500000', NULL, '24493500', NULL, 4, NULL, NULL, NULL, NULL, 1, 1, NULL, '2023-08-05 11:45:12', '2023-08-05 11:45:12'),
(18, '2500.00', NULL, '24491000', NULL, NULL, NULL, NULL, NULL, 3, 1, 1, NULL, '2023-08-05 11:48:25', '2023-08-05 11:48:25'),
(19, '80000', NULL, '24411000', NULL, 5, NULL, NULL, NULL, NULL, 1, 1, NULL, '2023-08-05 21:05:57', '2023-08-05 21:05:57');

-- --------------------------------------------------------

--
-- Table structure for table `cash_accounts`
--

CREATE TABLE `cash_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `opening_bal` double(12,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cash_accounts`
--

INSERT INTO `cash_accounts` (`id`, `account_name`, `account_number`, `opening_bal`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Cash in Hand', '348342342343', 5000.00, 1, '2023-06-23 07:09:10', '2023-06-23 07:09:10'),
(2, 'HBL Account', 'HBL Account', 5000.00, 1, '2023-06-28 19:44:15', '2023-06-28 19:44:15');

-- --------------------------------------------------------

--
-- Table structure for table `cash_accounts_bals`
--

CREATE TABLE `cash_accounts_bals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `balance` double(12,2) NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cash_accounts_bals`
--

INSERT INTO `cash_accounts_bals` (`id`, `balance`, `account_id`, `created_at`, `updated_at`) VALUES
(1, 24411000.00, 1, '2023-06-23 07:09:10', '2023-08-05 21:05:57'),
(2, 5000.00, 2, '2023-06-28 19:44:15', '2023-06-28 19:44:15');

-- --------------------------------------------------------

--
-- Table structure for table `cash_account_deposits`
--

CREATE TABLE `cash_account_deposits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deposit_amount` double(12,2) NOT NULL,
  `deposit_by` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `insevter_name` varchar(300) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cash_account_deposits`
--

INSERT INTO `cash_account_deposits` (`id`, `deposit_amount`, `deposit_by`, `user_id`, `account_id`, `insevter_name`, `created_at`, `updated_at`) VALUES
(1, 500.00, 'Test Person', 1, 1, 'Test', '2023-06-23 07:12:22', '2023-06-23 07:12:22');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `client_type` varchar(255) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `client_resource` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Open',
  `assign_to` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(30) DEFAULT NULL,
  `update_by_id` int(11) DEFAULT NULL,
  `dealer_name` varchar(255) DEFAULT NULL,
  `client_profession` varchar(255) DEFAULT NULL,
  `client_address` varchar(255) DEFAULT NULL,
  `other_phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `first_name`, `last_name`, `phone`, `client_type`, `country`, `city`, `client_resource`, `status`, `assign_to`, `created_by`, `created_at`, `updated_at`, `updated_by`, `update_by_id`, `dealer_name`, `client_profession`, `client_address`, `other_phone`, `email`) VALUES
(15, 'Muhammad', 'Usama', '+9230203499393', 'Dealer', 'PAKISTAN', 'test', 'Personal Client', 'Open', 1, 1, '2023-06-17 05:02:29', '2023-06-17 05:02:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Muhammad', 'Hassan', '+9230203499', 'Dealer', 'PAKISTAN', 'Sheikhupura', 'Personal Client', 'In Progress', 1, 1, '2023-06-17 05:04:27', '2023-06-28 19:26:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Muhammad', 'Hassan', '+9230203499', 'Dealer', 'PAKISTAN', 'Sheikhupura', 'Personal Client', 'Open', 1, 1, '2023-06-17 05:04:58', '2023-06-17 05:04:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Muhammad', 'Farhan', '+9242346456455', 'Dealer', 'PAKISTAN', 'Sarhgodah', 'UAN', 'Lost', 1, 1, '2023-06-17 19:47:20', '2023-06-19 04:12:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'Muhammad', 'Majid', '+92303034934', 'Dealer', 'PAKISTAN', 'Sheikhupura', 'Others', 'In Progress', 1, 1, '2023-06-18 11:08:45', '2023-06-24 19:03:50', NULL, NULL, 'Dealer Name', NULL, NULL, NULL, NULL),
(20, 'Muhammad', 'Ali', '+9230203499393', 'Dealer', 'PAKISTAN', 'Sheikhupura', 'Walk-In', 'Open', 2, 2, '2023-06-22 06:13:45', '2023-06-22 06:13:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'Muhammad', 'Attaullah', '+9230203499393', 'Dealer', 'PAKISTAN', 'Sheikhupura', 'Personal Client', 'Open', 1, 1, '2023-06-23 06:18:52', '2023-06-23 06:18:52', NULL, NULL, 'Dealer Name', 'Web Deveploer', 'Muhammad', '+9230203499393', 'usama.asghar7868@gmail.com'),
(22, 'New', 'Client', '+9242346456455', 'Dealer', 'PAKISTAN', 'Sheikhupura', 'Live Chat', 'In Progress', 1, 1, '2023-06-23 06:24:13', '2023-06-24 19:09:27', 'agent', 1, 'TEst Dealer', 'Laravel Developer', 'This is Cleint Address', '+9230432423423', 'usama.asghar7868@gmail.com'),
(23, 'Muhammad', 'Junaid', '0333-2323232', 'Walk In', 'PAKISTAN', 'Sheikhupura', 'Walk-In', 'Open', 1, 1, '2023-06-28 10:23:21', '2023-06-28 11:30:50', NULL, NULL, NULL, 'Laravel Developer', 'This is Cleint Address', '+9230432423423', 'usama.asghar7868@gmail.com'),
(24, 'Muhammad', 'Saqib', '+9230203499393', 'Walk In', 'PAKISTAN', 'Sheikhupura', 'Personal Client', 'Open', 2, 1, '2023-06-28 10:54:36', '2023-06-28 11:30:50', NULL, NULL, NULL, 'Laravel Developer', 'This is Cleint Address', '+9230432423423', 'usama.asghar78688@gmail.com'),
(25, 'Usama', 'Ali', '0333-2323232', 'Dealer', 'PAKISTAN', 'Sheikhupura', 'Personal Client', 'Lost', 1, 1, '2023-06-28 10:55:11', '2023-06-28 19:29:53', 'agent', 1, 'TEst Dealer', 'Laravel Developer', 'This is Cleint Address', '+9230432423423', 'usama.asghar78688@gmail.com'),
(26, 'Muhammad', 'Awab', '+9230203499393', 'Dealer', 'PAKISTAN', 'Sheikhupura', 'Personal Client', 'Open', 2, 1, '2023-06-28 11:31:31', '2023-06-28 11:31:41', NULL, NULL, 'TEst Dealer', 'Laravel Developer', 'This is Cleint Address', '+9230432423423', 'usama.asghar7868@gmail.com'),
(27, 'Muhammad', 'Aslam Chohan', '+9230203499393', 'Dealer', 'PAKISTAN', 'Sarhgodah', 'Personal Client', 'Mature', 1, 1, '2023-06-28 11:32:12', '2023-06-28 19:28:44', 'agent', 1, NULL, 'Laravel Developer', 'This is Cleint Address', '+9230432423423', 'usama.asghar7868@gmail.com'),
(28, 'Expense', 'Ali', '0333-2323232', 'Dealer', 'PAKISTAN', 'Sheikhupura', 'Personal Client', 'Open', 2, 1, '2023-06-28 11:33:15', '2023-06-28 11:33:23', NULL, NULL, 'TEst Dealer', 'Laravel Developer', 'This is Cleint Address', '+9230432423423', 'usama.asghar78688@gmail.com'),
(29, 'Muhammad', 'Ali', '0333-2323232', 'Dealer', 'PAKISTAN', 'Sarhgodah', 'Others', 'Open', 1, 1, '2023-06-28 19:27:53', '2023-06-28 19:27:53', NULL, NULL, 'TEst Dealer', 'Laravel Developer', 'Thsisi si is is id isd isdfsdjl flsdjfklsd jlsdkfjsdfsdkf dfksdf', '+9230432423423', 'usama.asghar78688@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `clients_follow_ups`
--

CREATE TABLE `clients_follow_ups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `next_follow_up_time` datetime DEFAULT NULL,
  `sub_category_id` int(11) NOT NULL,
  `follow_up_message` text NOT NULL,
  `follow_up_by` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients_follow_ups`
--

INSERT INTO `clients_follow_ups` (`id`, `client_id`, `next_follow_up_time`, `sub_category_id`, `follow_up_message`, `follow_up_by`, `created_at`, `updated_at`) VALUES
(4, 19, '2023-06-19 07:06:00', 1, 'I Have Take Follow Up', '1', '2023-06-19 02:01:48', '2023-06-19 02:01:48'),
(5, 18, NULL, 2, 'Wrong Number Format', '1', '2023-06-19 02:06:50', '2023-06-19 02:06:50'),
(6, 19, '2023-06-19 01:08:00', 3, 'I Take Next Follow Up', '1', '2023-06-19 02:08:06', '2023-06-19 02:08:06'),
(7, 16, '2023-06-29 02:26:00', 3, 'I Follow Up this Client', '1', '2023-06-28 19:26:50', '2023-06-28 19:26:50');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263);

-- --------------------------------------------------------

--
-- Table structure for table `curren_follow_ups`
--

CREATE TABLE `curren_follow_ups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `follow_up_time` datetime NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'false',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `curren_follow_ups`
--

INSERT INTO `curren_follow_ups` (`id`, `client_id`, `follow_up_time`, `status`, `created_at`, `updated_at`) VALUES
(1, 15, '2023-06-17 11:02:29', 'true', NULL, NULL),
(2, 16, '2023-06-17 11:04:27', 'true', NULL, '2023-06-28 19:26:50'),
(3, 17, '2023-06-17 11:04:58', 'false', NULL, NULL),
(4, 18, '2023-06-18 01:47:20', 'true', NULL, '2023-06-19 02:06:50'),
(5, 19, '2023-06-18 17:08:45', 'true', NULL, '2023-06-19 02:01:48'),
(6, 19, '2023-06-19 07:06:00', 'true', NULL, '2023-06-19 02:08:07'),
(7, 19, '2023-06-19 13:08:00', 'false', NULL, NULL),
(8, 20, '2023-06-22 12:13:46', 'false', NULL, NULL),
(9, 21, '2023-06-23 12:18:52', 'false', NULL, NULL),
(10, 22, '2023-06-23 12:24:13', 'false', NULL, NULL),
(11, 16, '2023-06-29 02:26:00', 'false', NULL, NULL),
(12, 29, '2023-06-29 01:27:53', 'false', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customerledgers`
--

CREATE TABLE `customerledgers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment` double(15,2) DEFAULT NULL,
  `received` double(15,2) DEFAULT NULL,
  `balance` double(15,2) NOT NULL,
  `plot_balance` double(15,2) NOT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `recevied_id` int(11) DEFAULT NULL,
  `plot_id` int(11) DEFAULT NULL,
  `plot_balance_id` int(11) DEFAULT NULL,
  `plot_owner_change_id` int(11) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customerledgers`
--

INSERT INTO `customerledgers` (`id`, `payment`, `received`, `balance`, `plot_balance`, `payment_id`, `recevied_id`, `plot_id`, `plot_balance_id`, `plot_owner_change_id`, `customer_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, NULL, 6000000.00, 6000000.00, 6000000.00, NULL, NULL, 1, 2, NULL, 1, 1, '2023-07-23 11:24:35', '2023-07-23 11:24:35'),
(3, NULL, 7000000.00, 7000000.00, 7000000.00, NULL, NULL, 4, 3, NULL, 1, 1, '2023-07-25 05:45:20', '2023-07-25 05:45:20'),
(4, 3000000.00, NULL, 3000000.00, 3000000.00, NULL, 4, 1, 2, NULL, 1, 1, '2023-07-26 06:56:58', '2023-07-26 06:56:58'),
(5, NULL, 1000000.00, 4000000.00, 4000000.00, 2, NULL, 1, 2, NULL, 1, 1, '2023-07-26 21:38:49', '2023-07-26 21:38:49'),
(6, NULL, 4000000.00, 8000000.00, 8000000.00, 3, NULL, 1, 2, NULL, 1, 1, '2023-07-30 20:27:33', '2023-07-30 20:27:33'),
(7, 8000000.00, NULL, 0.00, 0.00, NULL, 6, 1, 2, NULL, 1, 1, '2023-07-30 20:30:54', '2023-07-30 20:30:54'),
(8, 3000000.00, NULL, -3000000.00, -3000000.00, NULL, 7, 1, 3, NULL, 1, 1, '2023-07-30 20:36:24', '2023-07-30 20:36:24'),
(9, 4000000.00, NULL, -7000000.00, -7000000.00, NULL, 8, 1, 3, NULL, 1, 1, '2023-07-30 20:39:08', '2023-07-30 20:39:08'),
(10, 7000000.00, NULL, 0.00, 0.00, NULL, 9, 4, 3, NULL, 1, 1, '2023-08-01 07:18:20', '2023-08-01 07:18:20'),
(11, NULL, 5500000.00, 5500000.00, 5500000.00, NULL, NULL, 3, 4, NULL, 2, 1, '2023-08-05 08:02:31', '2023-08-05 08:02:31'),
(12, 3000000.00, NULL, 2500000.00, 2500000.00, NULL, 10, 3, 4, NULL, 2, 1, '2023-08-05 08:03:50', '2023-08-05 08:03:50'),
(13, NULL, 3500000.00, 3500000.00, 3500000.00, NULL, NULL, 5, 5, NULL, 1, 1, '2023-08-05 11:27:53', '2023-08-05 11:27:53'),
(14, NULL, 3500000.00, 3500000.00, 3500000.00, NULL, NULL, 5, 6, NULL, 2, 1, '2023-08-05 11:36:01', '2023-08-05 11:36:01'),
(15, 2000000.00, NULL, 1500000.00, 1500000.00, NULL, 11, 5, 6, NULL, 2, 1, '2023-08-05 11:38:12', '2023-08-05 11:38:12'),
(16, NULL, 500000.00, 2000000.00, 2000000.00, 4, NULL, 5, 6, NULL, 2, 1, '2023-08-05 11:45:12', '2023-08-05 11:45:12'),
(20, NULL, 2000000.00, 2000000.00, 2000000.00, NULL, NULL, 5, 10, 4, 1, 1, '2023-08-05 19:33:55', '2023-08-05 19:33:55'),
(21, NULL, -7000000.00, -7000000.00, -7000000.00, NULL, NULL, 1, 11, 5, 1, 1, '2023-08-05 19:47:28', '2023-08-05 19:47:28'),
(22, NULL, -7000000.00, -7000000.00, -7000000.00, NULL, NULL, 1, 12, 6, 1, 1, '2023-08-05 19:48:03', '2023-08-05 19:48:03'),
(23, NULL, 2000000.00, 2000000.00, 2000000.00, NULL, NULL, 5, 13, 7, 2, 1, '2023-08-05 19:49:13', '2023-08-05 19:49:13'),
(24, NULL, 4000000.00, 4000000.00, 4000000.00, NULL, NULL, 7, 14, NULL, 1, 1, '2023-08-05 20:59:44', '2023-08-05 20:59:44');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `balance` double(15,2) NOT NULL DEFAULT 0.00,
  `custfname` varchar(255) NOT NULL,
  `custlname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `CNIC` varchar(255) NOT NULL,
  `customer_type` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `balance`, `custfname`, `custlname`, `email`, `CNIC`, `customer_type`, `picture`, `country`, `city`, `phone`, `address`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 0.00, 'Muhammad Usama', 'Asghar up', 'usama.asghar7868@gmail.com', '35404-0417655-7', 'Customer', '1772147619565345.jpeg', 'PAKISTAN', 'Sheikhupura', '+9230203499393', 'Test Address', 1, 'active', '2023-07-22 18:47:49', '2023-07-22 18:49:21'),
(2, 0.00, 'Muhammad', 'Ali', 'ali@gmail.com', '32423482304345', 'Customer', '1772460854117327.png', 'PAKISTAN', 'Sheikhupura', '+9230203499393', 'Test Address', 1, 'active', '2023-07-26 05:46:33', '2023-07-26 05:46:33');

-- --------------------------------------------------------

--
-- Table structure for table `customer_plots`
--

CREATE TABLE `customer_plots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plot_id` int(11) NOT NULL,
  `plot_owner_change_id` int(11) DEFAULT NULL,
  `total_plot_price` double(15,2) NOT NULL,
  `balance` double(15,2) NOT NULL,
  `plot_owner` tinyint(1) NOT NULL DEFAULT 1,
  `customer_id` int(11) NOT NULL,
  `plot_sale_id` int(11) DEFAULT NULL,
  `plot_re_sale_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_plots`
--

INSERT INTO `customer_plots` (`id`, `plot_id`, `plot_owner_change_id`, `total_plot_price`, `balance`, `plot_owner`, `customer_id`, `plot_sale_id`, `plot_re_sale_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 1, 5, 6000000.00, 0.00, 0, 1, 2, NULL, 1, '2023-07-23 11:24:35', '2023-08-05 19:47:28'),
(3, 4, NULL, 7000000.00, 0.00, 1, 1, 3, NULL, 1, '2023-07-25 05:45:20', '2023-08-01 07:18:20'),
(4, 3, NULL, 5500000.00, 2500000.00, 1, 2, 4, NULL, 1, '2023-08-05 08:02:31', '2023-08-05 08:03:50'),
(6, 5, 4, 3500000.00, 0.00, 0, 2, 6, NULL, 1, '2023-08-05 11:36:01', '2023-08-05 19:33:55'),
(10, 5, 7, 3500000.00, 0.00, 0, 1, NULL, NULL, 1, '2023-08-05 19:33:55', '2023-08-05 19:49:13'),
(11, 1, 6, 6000000.00, 0.00, 0, 1, NULL, NULL, 1, '2023-08-05 19:47:28', '2023-08-05 19:48:03'),
(12, 1, 6, 6000000.00, -7000000.00, 1, 1, NULL, NULL, 1, '2023-08-05 19:48:03', '2023-08-05 19:48:03'),
(13, 5, 7, 3500000.00, 2000000.00, 1, 2, NULL, NULL, 1, '2023-08-05 19:49:13', '2023-08-05 19:49:13'),
(14, 7, NULL, 4000000.00, 4000000.00, 1, 1, 7, NULL, 1, '2023-08-05 20:59:44', '2023-08-05 20:59:44');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exp_name` varchar(255) NOT NULL,
  `total_amount` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `exp_name`, `total_amount`, `date`, `account_id`, `category_id`, `sub_category_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'expe', '3000', '2023-06-23', 1, 1, 1, 1, '2023-06-23 07:13:10', '2023-06-23 07:13:10'),
(2, 'New Expense 4', '10000', '2023-08-02', 1, 1, 1, 1, '2023-08-02 06:39:27', '2023-08-02 06:39:27'),
(3, 'New Expense 4', '2500.00', '2023-08-05', 1, 1, 1, 1, '2023-08-05 11:48:25', '2023-08-05 11:48:25');

-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
--

CREATE TABLE `expense_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exp_category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_categories`
--

INSERT INTO `expense_categories` (`id`, `exp_category_name`, `created_at`, `updated_at`) VALUES
(1, 'cat1', '2023-06-23 07:12:38', '2023-06-23 07:12:38'),
(2, 'Mantaince', '2023-06-28 19:51:13', '2023-06-28 19:51:13');

-- --------------------------------------------------------

--
-- Table structure for table `expense_sub_categories`
--

CREATE TABLE `expense_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exp_sub_category` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_sub_categories`
--

INSERT INTO `expense_sub_categories` (`id`, `exp_sub_category`, `category_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'subcat1', 1, 1, '2023-06-23 07:12:50', '2023-06-23 07:12:50'),
(2, 'Sub mantaince meran', 1, 1, '2023-06-28 19:51:22', '2023-06-28 19:51:22');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `follow_up_categories`
--

CREATE TABLE `follow_up_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `follow_up_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `follow_up_categories`
--

INSERT INTO `follow_up_categories` (`id`, `follow_up_name`, `created_at`, `updated_at`) VALUES
(1, 'Follow Up', '2023-06-18 08:11:40', '2023-06-18 10:36:54'),
(2, 'Reject', '2023-06-18 10:37:07', '2023-06-18 10:37:07'),
(3, 'Test', '2023-06-24 19:15:52', '2023-06-24 19:15:52');

-- --------------------------------------------------------

--
-- Table structure for table `follow_up_sub_categories`
--

CREATE TABLE `follow_up_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `follow_up_sub_category` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `follow_up_sub_categories`
--

INSERT INTO `follow_up_sub_categories` (`id`, `follow_up_sub_category`, `category_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Details Shared', 1, 1, '2023-06-18 10:40:59', '2023-06-18 10:40:59'),
(2, 'Not Interseted', 2, 1, '2023-06-18 10:51:21', '2023-06-18 10:51:21'),
(3, 'Seems Interested', 1, 1, '2023-06-18 13:55:08', '2023-06-18 13:55:08'),
(4, 'Need Time to Think', 1, 1, '2023-06-18 13:55:23', '2023-06-18 13:55:23'),
(5, 'Wrong Number', 2, 1, '2023-06-18 13:55:37', '2023-06-18 13:55:37'),
(6, 'Invalid Number', 2, 1, '2023-06-18 13:55:55', '2023-06-18 13:55:55'),
(7, 'Tesst Sub', 3, 1, '2023-06-24 19:16:10', '2023-06-24 19:16:10');

-- --------------------------------------------------------

--
-- Table structure for table `lead_users`
--

CREATE TABLE `lead_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location_name` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location_name`, `picture`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Sheikhupura', '1772083618643312.jpg', '<p>This is Sheikhupura</p>', 1, '2023-07-22 01:50:33', '2023-07-22 01:50:33');

-- --------------------------------------------------------

--
-- Table structure for table `maralas`
--

CREATE TABLE `maralas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `marala` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maralas`
--

INSERT INTO `maralas` (`id`, `marala`, `created_at`, `updated_at`) VALUES
(1, '3', '2023-07-22 02:34:02', '2023-07-22 02:34:02'),
(2, '5', '2023-07-22 02:34:12', '2023-07-22 02:34:12'),
(3, '8', '2023-07-22 02:34:22', '2023-07-22 02:34:22'),
(4, '10', '2023-07-22 02:34:29', '2023-07-22 02:34:29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_13_220654_create_lead_users_table', 2),
(7, '2022_10_26_190435_create_agents_table', 3),
(8, '2023_06_16_223620_create_clients_table', 4),
(9, '2023_06_16_224326_create_curren_follow_ups_table', 4),
(10, '2023_06_18_124909_create_follow_up_categories_table', 5),
(11, '2023_06_18_124933_create_follow_up_sub_categories_table', 5),
(12, '2023_06_18_190329_create_clients_follow_ups_table', 6),
(14, '2023_06_23_103545_add_column_to_clients_table', 7),
(16, '2023_07_22_070400_create_plots_table', 8),
(22, '2022_10_28_051525_create_customers_table', 9),
(23, '2022_10_28_051547_create_customer_balances_table', 9),
(24, '2022_11_21_082027_create_customerledgers_table', 9),
(25, '2023_07_23_125301_create_plot_sales_table', 10),
(26, '2023_08_05_174106_create_plot_owner_changes_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `prev_balance` varchar(50) DEFAULT NULL,
  `updated_balance` varchar(50) DEFAULT NULL,
  `total_payments` varchar(50) NOT NULL,
  `Criteria` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`Criteria`)),
  `Content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`Content`)),
  `Content_Ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`Content_Ids`)),
  `plots_balance_ids` text DEFAULT NULL,
  `Amount` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`Amount`)),
  `remarks` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`remarks`)),
  `payment_from` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `date`, `prev_balance`, `updated_balance`, `total_payments`, `Criteria`, `Content`, `Content_Ids`, `plots_balance_ids`, `Amount`, `remarks`, `payment_from`, `user_id`, `created_at`, `updated_at`) VALUES
(2, '2023-07-27', '3008500', '2003500', '1005000', '[\"Agent\",\"Customer\"]', '[\"Khashif Ali\",\"Muhammad Usama Asghar up\"]', '[\"1\",\"1\"]', '[\"null\",\"2\"]', '[\"5000\",\"1000000\"]', '[\"Agent Payment\",\"Customer Plot Payment Return\"]', 1, 1, '2023-07-26 21:38:49', '2023-07-26 21:38:49'),
(3, '2023-07-31', '2003500', '-1996500', '4000000', '[\"Customer\"]', '[\"Muhammad Usama Asghar up\"]', '[\"1\"]', '[\"2\"]', '[\"4000000\"]', '[\"Sale Complete\"]', 1, 1, '2023-07-30 20:27:33', '2023-07-30 20:27:33'),
(4, '2023-08-05', '24993500', '24493500', '500000', '[\"Customer\"]', '[\"Muhammad Ali\"]', '[\"2\"]', '[\"6\"]', '[\"500000\"]', '[\"Test Remarks\"]', 1, 1, '2023-08-05 11:45:12', '2023-08-05 11:45:12'),
(5, '2023-08-06', '24491000', '24411000', '80000', '[\"Agent\"]', '[\"Muhammad Ali\"]', '[\"3\"]', '[\"null\"]', '[\"80000\"]', '[\"Test Remarks\"]', 1, 1, '2023-08-05 21:05:56', '2023-08-05 21:05:56');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plots`
--

CREATE TABLE `plots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plot_no` varchar(255) NOT NULL,
  `location_id` int(11) NOT NULL,
  `society_id` int(11) NOT NULL,
  `block_id` int(11) NOT NULL,
  `marala_type` int(11) NOT NULL,
  `state_type` varchar(255) NOT NULL,
  `plot_cost_price` double(15,2) NOT NULL,
  `plot_sale_price` double(15,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Not Sale',
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plots`
--

INSERT INTO `plots` (`id`, `plot_no`, `location_id`, `society_id`, `block_id`, `marala_type`, `state_type`, `plot_cost_price`, `plot_sale_price`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 'A1', 1, 1, 1, 1, 'Residentail', 4000000.00, 5000000.00, 'Sale Complete', '<p>This is Residentail</p>', NULL, '2023-07-30 20:30:54'),
(3, 'A2', 1, 1, 1, 2, 'Residentail', 5000000.00, 6000000.00, 'Sale Progress', '<p>This is Residentail</p>', NULL, '2023-08-05 08:02:31'),
(4, 'B1', 1, 1, 2, 2, 'Commerical', 5000000.00, 6000000.00, 'Sale Complete', NULL, NULL, '2023-08-01 07:18:20'),
(5, 'B3', 1, 1, 2, 1, 'Commerical', 3000000.00, 4000000.00, 'Sale Progress', '<p>test</p>', NULL, '2023-08-05 11:36:01'),
(7, 'B4', 1, 1, 2, 1, 'Residentail', 3000000.00, 4000000.00, 'Sale Progress', NULL, NULL, '2023-08-05 20:59:44');

-- --------------------------------------------------------

--
-- Table structure for table `plot_owner_changes`
--

CREATE TABLE `plot_owner_changes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plot_id` int(11) NOT NULL,
  `prev_owner_id` int(11) NOT NULL,
  `new_owner_id` int(11) NOT NULL,
  `plot_balance_id` int(11) NOT NULL,
  `plot_sale_price` double(15,2) NOT NULL,
  `plot_balance` double(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plot_owner_changes`
--

INSERT INTO `plot_owner_changes` (`id`, `plot_id`, `prev_owner_id`, `new_owner_id`, `plot_balance_id`, `plot_sale_price`, `plot_balance`, `created_at`, `updated_at`) VALUES
(4, 5, 2, 1, 6, 3500000.00, 2000000.00, '2023-08-05 19:33:55', '2023-08-05 19:33:55'),
(5, 1, 1, 1, 2, 6000000.00, -7000000.00, '2023-08-05 19:47:28', '2023-08-05 19:47:28'),
(6, 1, 1, 1, 11, 6000000.00, -7000000.00, '2023-08-05 19:48:03', '2023-08-05 19:48:03'),
(7, 5, 1, 2, 10, 3500000.00, 2000000.00, '2023-08-05 19:49:13', '2023-08-05 19:49:13');

-- --------------------------------------------------------

--
-- Table structure for table `plot_sales`
--

CREATE TABLE `plot_sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `society_id` int(11) NOT NULL,
  `block_id` int(11) NOT NULL,
  `plot_id` int(11) NOT NULL,
  `plot_cost_price` double(15,2) NOT NULL,
  `plot_demand` double(15,2) NOT NULL,
  `plot_sale_price` double(15,2) NOT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `agent_commison_perc` float DEFAULT NULL,
  `agent_commison_amount` float DEFAULT NULL,
  `at_booking_perc` double(15,2) NOT NULL,
  `complete_in_years` int(11) NOT NULL,
  `sixth_month_inst` double(15,2) NOT NULL,
  `at_booking_price` double(15,2) NOT NULL,
  `no_of_6_month_inst` int(11) NOT NULL,
  `no_of_monthly_inst` int(11) NOT NULL,
  `monthly_inst_price` double(15,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plot_sales`
--

INSERT INTO `plot_sales` (`id`, `customer_id`, `location_id`, `society_id`, `block_id`, `plot_id`, `plot_cost_price`, `plot_demand`, `plot_sale_price`, `agent_id`, `agent_commison_perc`, `agent_commison_amount`, `at_booking_perc`, `complete_in_years`, `sixth_month_inst`, `at_booking_price`, `no_of_6_month_inst`, `no_of_monthly_inst`, `monthly_inst_price`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 4000000.00, 5000000.00, 6000000.00, NULL, NULL, NULL, 30.00, 3, 400000.00, 1800000.00, 6, 30, 60000.00, 1, '2023-07-23 11:19:52', '2023-07-23 11:19:52'),
(2, 1, 1, 1, 1, 1, 4000000.00, 5000000.00, 6000000.00, NULL, NULL, NULL, 30.00, 3, 300000.00, 1800000.00, 6, 30, 80000.00, 1, '2023-07-23 11:24:35', '2023-07-23 11:24:35'),
(3, 1, 1, 1, 2, 4, 5000000.00, 6000000.00, 7000000.00, NULL, NULL, NULL, 30.00, 4, 600000.00, 2100000.00, 8, 40, 2500.00, 1, '2023-07-25 05:45:19', '2023-07-25 05:45:19'),
(4, 2, 1, 1, 1, 3, 5000000.00, 6000000.00, 5500000.00, NULL, NULL, NULL, 20.00, 2, 200000.00, 1100000.00, 4, 20, 180000.00, 1, '2023-08-05 08:02:31', '2023-08-05 08:02:31'),
(6, 2, 1, 1, 2, 5, 3000000.00, 4000000.00, 3500000.00, NULL, NULL, NULL, 30.00, 3, 200000.00, 1050000.00, 6, 30, 41666.67, 1, '2023-08-05 11:36:01', '2023-08-05 11:36:01'),
(7, 1, 1, 1, 2, 7, 3000000.00, 4000000.00, 4000000.00, 3, 4, 160000, 20.00, 2, 200000.00, 800000.00, 4, 20, 120000.00, 1, '2023-08-05 20:59:44', '2023-08-05 20:59:44');

-- --------------------------------------------------------

--
-- Table structure for table `recevied_payments`
--

CREATE TABLE `recevied_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `prev_balance` varchar(50) DEFAULT NULL,
  `updated_balance` varchar(50) DEFAULT NULL,
  `total_received` varchar(50) NOT NULL,
  `Criteria` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`Criteria`)),
  `Content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`Content`)),
  `Content_Ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`Content_Ids`)),
  `plots_balance_ids` text DEFAULT NULL,
  `Amount` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`Amount`)),
  `remarks` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`remarks`)),
  `received_from` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recevied_payments`
--

INSERT INTO `recevied_payments` (`id`, `date`, `prev_balance`, `updated_balance`, `total_received`, `Criteria`, `Content`, `Content_Ids`, `plots_balance_ids`, `Amount`, `remarks`, `received_from`, `user_id`, `created_at`, `updated_at`) VALUES
(4, '2023-07-26', '2500', '3011000', '3008500', '[\"Account\",\"Agent\",\"Customer\"]', '[\"Cash in Hand\",\"Khashif Ali\",\"Muhammad Usama Asghar up\"]', '[\"1\",\"1\",\"1\"]', '[\"null\",\"null\",\"2\"]', '[\"2500\",\"6000\",\"3000000\"]', '[\"Account Remarks\",\"Agent Remarks\",\"Customer Remarks\"]', 1, 1, '2023-07-26 06:56:58', '2023-07-26 06:56:58'),
(6, '2023-07-31', '-1996500', '6003500', '8000000', '[\"Customer\"]', '[\"Muhammad Usama Asghar up\"]', '[\"1\"]', '[\"2\"]', '[\"8000000\"]', '[\"Sale Completed\"]', 1, 1, '2023-07-30 20:30:54', '2023-07-30 20:30:54'),
(7, '2023-07-31', '6003500', '9003500', '3000000', '[\"Customer\"]', '[\"Muhammad Usama Asghar up\"]', '[\"1\"]', '[\"3\"]', '[\"3000000\"]', '[\"Test Remarks\"]', 1, 1, '2023-07-30 20:36:24', '2023-07-30 20:36:24'),
(8, '2023-07-31', '9003500', '13003500', '4000000', '[\"Customer\"]', '[\"Muhammad Usama Asghar up\"]', '[\"1\"]', '[\"3\"]', '[\"4000000\"]', '[\"Test Remarks\"]', 1, 1, '2023-07-30 20:39:08', '2023-07-30 20:39:08'),
(9, '2023-08-01', '13003500', '20003500', '7000000', '[\"Customer\"]', '[\"Muhammad Usama Asghar up\"]', '[\"1\"]', '[\"3\"]', '[\"7000000\"]', '[\"Test Remarks\"]', 1, 1, '2023-08-01 07:18:19', '2023-08-01 07:18:19'),
(10, '2023-08-05', '19993500', '22993500', '3000000', '[\"Customer\"]', '[\"Muhammad Ali\"]', '[\"2\"]', '[\"4\"]', '[\"3000000\"]', '[\"Test Remarks\"]', 1, 1, '2023-08-05 08:03:50', '2023-08-05 08:03:50'),
(11, '2023-08-05', '22993500', '24993500', '2000000', '[\"Customer\"]', '[\"Muhammad Ali\"]', '[\"2\"]', '[\"6\"]', '[\"2000000\"]', '[\"Test Remarks\"]', 1, 1, '2023-08-05 11:38:12', '2023-08-05 11:38:12');

-- --------------------------------------------------------

--
-- Table structure for table `societies`
--

CREATE TABLE `societies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `society_name` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `location` bigint(20) UNSIGNED NOT NULL,
  `display_on_web` varchar(10) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `societies`
--

INSERT INTO `societies` (`id`, `society_name`, `picture`, `description`, `location`, `display_on_web`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Latif Gardens Phase 1', '1772083752596638.png', '<p>Latif Gardens Phase 1 Project up<br></p>', 1, '1', 1, '2023-07-22 01:52:41', '2023-07-22 01:55:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Usama', 'usama.asghar7868@gmail.com', NULL, '$2y$10$6027dIQgCHsJiYMiKIC0LOk0SiNV2HVibmBIXiFJoNYo.4ayRzrFi', NULL, 'admin', '2023-06-13 17:04:16', '2023-06-13 17:04:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `agents_email_unique` (`email`);

--
-- Indexes for table `agent_ledegers`
--
ALTER TABLE `agent_ledegers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agent_ledegers_agent_id_foreign` (`agent_id`);

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blocks_scoiety_foreign` (`scoiety`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_blog_category_foreign` (`blog_category`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cash_accountledgers`
--
ALTER TABLE `cash_accountledgers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cash_accountledgers_account_id_foreign` (`account_id`);

--
-- Indexes for table `cash_accounts`
--
ALTER TABLE `cash_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cash_accounts_account_name_unique` (`account_name`);

--
-- Indexes for table `cash_accounts_bals`
--
ALTER TABLE `cash_accounts_bals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cash_accounts_bals_account_id_foreign` (`account_id`);

--
-- Indexes for table `cash_account_deposits`
--
ALTER TABLE `cash_account_deposits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cash_account_deposits_account_id_foreign` (`account_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients_follow_ups`
--
ALTER TABLE `clients_follow_ups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `curren_follow_ups`
--
ALTER TABLE `curren_follow_ups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customerledgers`
--
ALTER TABLE `customerledgers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_cnic_unique` (`CNIC`);

--
-- Indexes for table `customer_plots`
--
ALTER TABLE `customer_plots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_account_id_foreign` (`account_id`),
  ADD KEY `expenses_category_id_foreign` (`category_id`),
  ADD KEY `expenses_sub_category_id_foreign` (`sub_category_id`);

--
-- Indexes for table `expense_categories`
--
ALTER TABLE `expense_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_sub_categories`
--
ALTER TABLE `expense_sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expense_sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `follow_up_categories`
--
ALTER TABLE `follow_up_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follow_up_sub_categories`
--
ALTER TABLE `follow_up_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_users`
--
ALTER TABLE `lead_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lead_users_email_unique` (`email`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maralas`
--
ALTER TABLE `maralas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_payment_from_foreign` (`payment_from`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `plots`
--
ALTER TABLE `plots`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `plots_plot_no_unique` (`plot_no`);

--
-- Indexes for table `plot_owner_changes`
--
ALTER TABLE `plot_owner_changes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plot_sales`
--
ALTER TABLE `plot_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recevied_payments`
--
ALTER TABLE `recevied_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recevied_payments_received_from_foreign` (`received_from`);

--
-- Indexes for table `societies`
--
ALTER TABLE `societies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `societies_location_foreign` (`location`);

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
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `agent_ledegers`
--
ALTER TABLE `agent_ledegers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cash_accountledgers`
--
ALTER TABLE `cash_accountledgers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cash_accounts`
--
ALTER TABLE `cash_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cash_accounts_bals`
--
ALTER TABLE `cash_accounts_bals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cash_account_deposits`
--
ALTER TABLE `cash_account_deposits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `clients_follow_ups`
--
ALTER TABLE `clients_follow_ups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `curren_follow_ups`
--
ALTER TABLE `curren_follow_ups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customerledgers`
--
ALTER TABLE `customerledgers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_plots`
--
ALTER TABLE `customer_plots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expense_sub_categories`
--
ALTER TABLE `expense_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `follow_up_categories`
--
ALTER TABLE `follow_up_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `follow_up_sub_categories`
--
ALTER TABLE `follow_up_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lead_users`
--
ALTER TABLE `lead_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `maralas`
--
ALTER TABLE `maralas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plots`
--
ALTER TABLE `plots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `plot_owner_changes`
--
ALTER TABLE `plot_owner_changes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `plot_sales`
--
ALTER TABLE `plot_sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `recevied_payments`
--
ALTER TABLE `recevied_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `societies`
--
ALTER TABLE `societies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agent_ledegers`
--
ALTER TABLE `agent_ledegers`
  ADD CONSTRAINT `agent_ledegers_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blocks`
--
ALTER TABLE `blocks`
  ADD CONSTRAINT `blocks_scoiety_foreign` FOREIGN KEY (`scoiety`) REFERENCES `societies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_blog_category_foreign` FOREIGN KEY (`blog_category`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cash_accountledgers`
--
ALTER TABLE `cash_accountledgers`
  ADD CONSTRAINT `cash_accountledgers_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `cash_accounts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cash_accounts_bals`
--
ALTER TABLE `cash_accounts_bals`
  ADD CONSTRAINT `cash_accounts_bals_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `cash_accounts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `cash_accounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `expenses_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `expense_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `expenses_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `expense_sub_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `expense_sub_categories`
--
ALTER TABLE `expense_sub_categories`
  ADD CONSTRAINT `expense_sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `expense_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_payment_from_foreign` FOREIGN KEY (`payment_from`) REFERENCES `cash_accounts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `recevied_payments`
--
ALTER TABLE `recevied_payments`
  ADD CONSTRAINT `recevied_payments_received_from_foreign` FOREIGN KEY (`received_from`) REFERENCES `cash_accounts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `societies`
--
ALTER TABLE `societies`
  ADD CONSTRAINT `societies_location_foreign` FOREIGN KEY (`location`) REFERENCES `locations` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
