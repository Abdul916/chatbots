-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 31, 2024 at 01:07 PM
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
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `utm_source` varchar(255) DEFAULT NULL,
  `operating_system` varchar(255) DEFAULT NULL,
  `device_type` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `name`, `phone`, `email`, `interested_in`, `aboutus`, `user_ip`, `location`, `budget`, `subject`, `message`, `utm_source`, `operating_system`, `device_type`, `browser`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Test User', '+923122323432', 'testemail@gmail.com', 'Website Design', 'Freelancer', NULL, NULL, '100', 'Website Design ', 'Hello I want to make a website design ', NULL, NULL, NULL, NULL, 1, '2024-10-31 14:44:52', '2024-11-04 07:05:24'),
(2, 'Sebastian Avery', '575-345-9316', 'tufyrany@mailinator.com', 'websiteCustomization', 'Craigslist', '127.0.0.1', ', , ', 'Molestiae aliqua In', 'Tempora qui molestia', 'Dolore excepturi exp', NULL, 'Windows 10', 'Desktop', 'Firefox', 0, '2024-12-30 09:44:16', '2024-12-30 09:44:16'),
(3, 'Test User', '+923112345689', 'mokisoy761@pixdd.com', 'websiteDevelopment', 'Social Media', '127.0.0.1', ', , ', '542130', 'Lorem Ipsum has been the industry\'s standard dummy text ever', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, 'Windows 10', 'Desktop', 'Firefox', 1, '2024-12-30 09:47:43', '2024-12-30 09:49:46');

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
  `featured_project` tinyint NOT NULL DEFAULT '0' COMMENT '1=featured project',
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '0=inactive,1=active',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `projects_portfolio`
--

INSERT INTO `projects_portfolio` (`id`, `project_title`, `project_description`, `image`, `project_link`, `programming_language`, `framework_technology`, `database_used`, `featured_project`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mexican Arte', NULL, 'http://localhost/explorelogics/portal/uploads/images/portfolio-img2.jpg', 'https://mexicanarte.com/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(2, 'Theory Test Pass', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-60.jpg', 'https://theorytestpass.com/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(3, 'Awaken Nutrition', NULL, 'http://localhost/explorelogics/portal/uploads/images/portfolio-img4.jpg', 'https://www.awakennutrition.com/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(4, 'Makeover Pamplona Tours', NULL, 'http://localhost/explorelogics/portal/uploads/images/portfolio-img3.jpg', 'https://makeover.pamplona-tours.com/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(5, 'Xrack', NULL, 'http://localhost/explorelogics/portal/uploads/images/pn-1.jpg', 'https://www.xrack.us/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(6, 'Whagons', NULL, 'http://localhost/explorelogics/portal/uploads/images/pn-2.jpg', 'https://whagons.com/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(7, 'Spectrabygg', NULL, 'http://localhost/explorelogics/portal/uploads/images/pn-3.jpg', 'https://spectrabygg.se/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(8, 'Smartichoices', NULL, 'http://localhost/explorelogics/portal/uploads/images/pn-4.jpg', 'https://smartichoices.com/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(9, 'Revive Med Spa Murphytx', NULL, 'http://localhost/explorelogics/portal/uploads/images/pn-5.jpg', 'https://www.revivemedspamurphytx.com/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(10, 'Okava Pharma', NULL, 'http://localhost/explorelogics/portal/uploads/images/pn-6.jpg', 'https://www.okavapharma.com/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(11, 'Lovetech', NULL, 'http://localhost/explorelogics/portal/uploads/images/pn-7.jpg', 'https://www.lovetech.com.br/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(12, 'Levelx Consulting', NULL, 'http://localhost/explorelogics/portal/uploads/images/pn-8.jpg', 'https://levelxconsulting.com/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(13, 'KW Energy', NULL, 'http://localhost/explorelogics/portal/uploads/images/pn-9.jpg', 'https://explorelogicsit.net/kwenergy/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(14, 'Kingsman Shears', NULL, 'http://localhost/explorelogics/portal/uploads/images/pn-10.jpg', 'https://explorelogicsit.net/kingsmanshears/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(15, 'Eggfarm', NULL, 'http://localhost/explorelogics/portal/uploads/images/pn-11.jpg', 'https://explorelogicsit.net/eggfarm/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(16, 'Enleaf', NULL, 'http://localhost/explorelogics/portal/uploads/images/pn-12.jpg', 'https://enleaf.com/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(17, 'Dxopin', NULL, 'http://localhost/explorelogics/portal/uploads/images/pn-13.jpg', 'https://dxopin.com/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(18, 'Bike-n-Hike Adventures', NULL, 'http://localhost/explorelogics/portal/uploads/images/pn-14.jpg', 'https://bike-n-hike-adventures.com/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(19, 'Ayapunt', NULL, 'http://localhost/explorelogics/portal/uploads/images/portfolio-img5.jpg', 'https://www.ayapunt.com/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(20, 'Caribbean Motel', NULL, 'http://localhost/explorelogics/portal/uploads/images/portfolio-img6.jpg', 'http://caribbeanmotel.com.au/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(21, 'Denise Glee', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-6.jpg', 'https://deniseglee.com/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(22, 'Etravel Maine', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-7.jpg', 'http://www.etravelmaine.com/staging', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(23, 'Grateful Gratitude Attitude', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-56.jpg', 'https://gratefulgratitudeattitude.com/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(24, 'Julius Hembus', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-2.jpg', 'https://www.juliushembus.de/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(25, 'Farr Labs Blog', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-51.jpg', 'https://blog.farrlabs.com/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(26, 'Eliteam Sports', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-4.jpg', 'https://www.eliteamsports.com/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(27, 'Shayona Printing', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-5.jpg', 'https://www.shayonaprinting.com/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(28, 'The Pizza Boys', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-6.jpg', 'https://www.thepizzaboys.com.au/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(29, 'Maryland Pet', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-7.jpg', 'https://marylandpet.com/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(30, 'Aviation Manuals', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-8.jpg', 'https://aviationmanuals.com.au/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(31, 'Sol Blazers', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-42.jpg', 'https://www.solblazers.org/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(32, 'Wakefield Goldens', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-10.jpg', 'http://wakefieldgoldens.com/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(33, 'Nanoleaf', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-38.jpg', 'https://nanoleaf.me/en-HK/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(34, 'Pat Fallon', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-12.jpg', 'https://www.patfallon.com/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(35, 'Food Truck Festivals of America', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-13.jpg', 'https://www.foodtruckfestivalsofamerica.com/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(36, 'Aqarat Dubai', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-14.jpg', 'https://aqaratdubai.ae/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(37, 'Top Steroids Online', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-15.jpg', 'https://top-steroids-online.com/fr/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(38, 'Be Interactive', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-16.jpg', 'https://www.beinteractivepty.com/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(39, 'Amurt Amurtel', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-17.jpg', 'https://amurt-amurtel.eu/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(40, 'Unitronics', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-36.jpg', 'https://www.unitronics.com.de/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(41, 'DKB Despatch', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-26.jpg', 'https://www.dkbdespatch.co.uk/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(42, 'Cuba Exotica', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-20.jpg', 'https://www.cubaexotica.com.au/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(43, 'Rangeley Vacation Rentals', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-21.jpg', 'https://rangeleyvacationrentals.com/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(44, 'Design a Fireplace', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-22.jpg', 'https://www.designafireplace.com/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(45, 'Oxygen Forensic', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-23.jpg', 'https://www.oxygen-forensic.com/en/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(46, 'Fox Manager', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-24.jpg', 'https://foxmanager.com.br/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(47, 'BU', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-27.jpg', 'https://bu.co.ke/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(48, 'Arena QCA', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-28.jpg', 'https://www.arenaqca.com/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(49, 'Prodatix', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-31.jpg', 'https://prodatix.com/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(50, 'Acoustics with Design', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-32.jpg', 'http://acousticswithdesign.com/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(51, 'Online Hard Money', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-33.jpg', 'https://onlinehardmoney.com/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(52, 'My Wealth Q', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-34.jpg', 'https://www.mywealthq.com/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(53, 'Sniper Watch', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-39.jpg', 'https://sniperwatch.com/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(54, 'Bliss Pago', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-40.jpg', 'https://blisspago.com.mx/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(55, 'Imagesco', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-43.jpg', 'https://www.imagesco.com/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(56, 'ML Zukowski FFS', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-44.jpg', 'https://www.mlzukowskiffs.com/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(57, 'Point Load Power', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-45.jpg', 'https://www.pointloadpower.com/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(58, 'Action Threat', 'At Action Threat, we know what it takes to succeed in the information security industry – technical aptitude, confidence, and split-second decision making.', 'http://localhost/explorelogics/portal/uploads/images/p-46.jpg', 'https://actionthreat.com/', 'PHP', 'WordPress', 'MySQL', 1, 1, '2024-12-31 16:26:47', '2024-12-31 11:33:06'),
(59, 'Icare', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-47.jpg', 'https://icare.com/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(60, 'Raise Your Edge', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-48.jpg', 'https://www.raiseyouredge.com/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(61, 'Gig Salad', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-49.jpg', 'https://www.gigsalad.com/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(62, 'Society Web Solutions', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-50.jpg', 'https://societywebsolutions.com/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(63, 'Stabs', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-53.jpg', 'https://stabs.co/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(64, 'Billington Inspections', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-54.jpg', 'https://billingtoninspections.com/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(65, 'Coffee Crafters', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-57.jpg', 'https://coffeecrafters.com/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(66, 'Excel Dental Care', NULL, 'http://localhost/explorelogics/portal/uploads/images/p-58.jpg', 'https://exceldentalcare.co.uk/', 'PHP', 'WordPress', 'MySQL', 0, 1, '2024-12-31 16:26:47', NULL),
(68, 'Bigbuda', 'We break boundaries to create extraordinary experiences. Together with our team of professionals, we want to help you raise your brand to captivate minds and hearts of your clients.', 'http://localhost/explorelogics/portal/uploads/images/bigbuda-1735644815.png', 'https://bigbuda.cl/', 'PHP', 'WordPress', 'MySQL', 1, 1, '2024-12-31 11:33:35', '2024-12-31 11:33:48');

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
