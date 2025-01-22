-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 30, 2024 at 08:11 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `explore_emails`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `type` tinyint DEFAULT '0' COMMENT '0= super_admin, 1 = resellers',
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '0 = inactive, 1 = active',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `email`, `password`, `type`, `status`, `created_at`, `updated_at`) VALUES
(8, 'admin', 'admin@gmail.com', '$2y$10$EAd4rCB1B0dDTUkhkUf9guMfg5ojFlJfwS8gBESwu1gPqakxxArHe', 0, 1, '2020-11-26 05:15:38', '2024-11-04 06:26:28');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

DROP TABLE IF EXISTS `emails`;
CREATE TABLE IF NOT EXISTS `emails` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `interested_in` varchar(255) DEFAULT NULL,
  `aboutus` varchar(255) DEFAULT NULL,
  `user_ip` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `budget` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `name`, `phone`, `email`, `interested_in`, `aboutus`, `user_ip`, `location`, `budget`, `subject`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Test User', '+923122323432', 'testemail@gmail.com', 'Website Design', 'Freelancer', NULL, NULL, '100', 'Website Design ', 'Hello I want to make a website design ', 1, '2024-10-31 14:44:52', '2024-11-04 07:05:24');

-- --------------------------------------------------------

--
-- Table structure for table `projects_portfolio`
--

DROP TABLE IF EXISTS `projects_portfolio`;
CREATE TABLE IF NOT EXISTS `projects_portfolio` (
  `id` int NOT NULL AUTO_INCREMENT,
  `project_title` varchar(255) DEFAULT NULL,
  `project_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `project_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `programming_language` varchar(255) DEFAULT NULL,
  `framework_technology` varchar(255) DEFAULT NULL,
  `database_used` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'MySQL',
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '0=inactive,1=active',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `projects_portfolio`
--

INSERT INTO `projects_portfolio` (`id`, `project_title`, `project_description`, `image`, `project_link`, `programming_language`, `framework_technology`, `database_used`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Explore Logics IT Solutions', 'Explore Logics Website Design Agency, provide services web application development, Website designing, E-commerce solutions, Cheap WordPress.', 'http://localhost/explorelogics/uploads/images/xlLogo-1735309258.png', 'https://explorelogics.com', 'TypeScript', 'Vue.js', 'MySQL', 1, '2024-12-27 13:14:45', '2024-12-27 14:20:58'),
(2, 'Bigbuda', 'We break boundaries to create extraordinary experiences. Together with our team of professionals, we want to help you raise your brand to captivate minds and hearts of your clients.', 'http://localhost/explorelogics/uploads/images/bigbuda-1735306485.png', 'https://www.bigbuda.com', 'PHP', 'WordPress', 'MySQL', 1, '2024-12-27 13:34:45', '2024-12-27 13:34:45'),
(3, 'Action Threat', 'At Action Threat, we know what it takes to succeed in the information security industry – technical aptitude, confidence, and split-second decision making.', 'http://localhost/explorelogics/uploads/images/action-threat-1735309187.png', 'https://actionthreat.com', 'TypeScript', 'React.js', 'MySQL', 1, '2024-12-27 13:38:59', '2024-12-27 14:19:47'),
(4, 'Explore Logics IT Solutions', 'Explore Logics Website Design Agency, provide services web application development, Website designing, E-commerce solutions, Cheap WordPress.', 'http://localhost/explorelogics/uploads/images/xlLogo-1735309035.png', 'https://explorelogics.com', 'PHP', 'WordPress', 'MySQL', 1, '2024-12-27 14:17:15', '2024-12-30 07:55:06');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `meta_tag` varchar(255) DEFAULT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `meta_tag`, `meta_key`, `meta_value`) VALUES
(1, 'project', 'site_title', 'Explore Logics'),
(2, 'project', 'short_site_title', 'E L'),
(3, 'project', 'site_logo', 'logo.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
