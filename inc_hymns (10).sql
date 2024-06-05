-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2024 at 10:20 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inc_hymns`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Anibersaryo ng Iglesia', NULL, NULL),
(2, 'Bago Magteksto', NULL, NULL),
(3, 'Bago Manalangin', NULL, NULL),
(4, 'Bago Manalangin/ Panata MT', NULL, '2024-05-07 15:46:09'),
(5, 'Banal na Hapunan', NULL, NULL),
(6, 'Banal na Hapunan (bread)', NULL, NULL),
(7, 'Banal na Pamumuhay', NULL, NULL),
(8, 'Bautismo', NULL, NULL),
(9, 'Kahalagahan ng Iglesia', NULL, NULL),
(10, 'Kahalagahan ng panalangin', NULL, NULL),
(11, 'Kahalalan', NULL, NULL),
(12, 'Katapatan sa pagsunod', NULL, NULL),
(13, 'Ordenasyon', NULL, '2024-05-02 20:17:59'),
(14, 'Pag-asa sa kaligtasan', NULL, '2024-05-02 19:50:24'),
(15, 'Paggunita sa Sugo', NULL, NULL),
(16, 'Paghahandog', NULL, NULL),
(17, 'Paglabas', NULL, NULL),
(18, 'Pagpapahid ng Langis', NULL, NULL),
(19, 'Pagpapasalamat', NULL, NULL),
(20, 'Pagpupuri kay Cristo', NULL, NULL),
(21, 'Pagpupuri sa Diyos', NULL, NULL),
(22, 'Pagpupuri sa Diyos at kay Cristo', NULL, NULL),
(23, 'Pagtatalaga sa bagong Kapilya', NULL, NULL),
(24, 'Pagtatalaga sa pagsamba', NULL, NULL),
(25, 'Pagtatalaga sa Tingkulin', NULL, NULL),
(26, 'Pagtulong sa Pagpapalaganap', NULL, NULL),
(27, 'Pamamahayag', NULL, NULL),
(28, 'Pananalig kay Cristo', NULL, NULL),
(29, 'Pananalig kay Cristo / Paninindigan', NULL, NULL),
(30, 'Panananalig sa Diyos', NULL, NULL),
(31, 'Paninindigan', NULL, NULL),
(32, 'Sa panahon ng Suliranin', NULL, NULL),
(33, 'Taunang Pasalamat', NULL, NULL),
(34, 'Kasal', NULL, NULL),
(35, 'CWS', NULL, NULL),
(36, 'Entrance March', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `church_hymns`
--

CREATE TABLE `church_hymns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `church_hymns`
--

INSERT INTO `church_hymns` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'AWS', NULL, NULL),
(2, 'CWS', NULL, NULL),
(3, 'EM', NULL, NULL),
(4, 'Wedding', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ensemble_types`
--

CREATE TABLE `ensemble_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ensemble_types`
--

INSERT INTO `ensemble_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'SATB', NULL, NULL),
(2, 'TTBB', NULL, NULL),
(3, 'SA', NULL, '2024-05-02 22:27:01'),
(4, 'Adult and Children\'s choir', NULL, NULL),
(5, 'SATB with descant', NULL, NULL);

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
-- Table structure for table `group_permission`
--

CREATE TABLE `group_permission` (
  `group_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `instrumentations`
--

CREATE TABLE `instrumentations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instrumentations`
--

INSERT INTO `instrumentations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Organ', NULL, '2024-05-02 22:22:29'),
(2, 'Organ (four hands)', NULL, '2024-05-02 22:22:35'),
(3, 'Organ with brass', NULL, NULL),
(4, 'Organ and piano', NULL, '2024-05-02 22:25:19'),
(5, 'Organ, piano, and brass', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Filipino', NULL, NULL),
(2, 'English', NULL, NULL),
(3, 'French', NULL, NULL),
(4, 'Italian', NULL, NULL),
(5, 'Japanese', NULL, NULL),
(6, 'Portuguese', NULL, NULL),
(7, 'Spanish', NULL, NULL);

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_04_17_050741_create_music_creators_table', 1),
(6, '2024_04_17_050930_create_church_hymns_table', 1),
(7, '2024_04_17_050938_create_categories_table', 1),
(8, '2024_04_17_051008_create_instrumentations_table', 1),
(9, '2024_04_17_051017_create_ensemble_types_table', 1),
(10, '2024_04_17_051025_create_languages_table', 1),
(11, '2024_04_17_051254_create_musics_table', 1),
(12, '2024_04_17_051910_create_music_lyricist_table', 2),
(13, '2024_04_17_051920_create_music_composer_table', 2),
(14, '2024_04_17_051950_create_music_arranger_table', 2),
(15, '2024_04_21_043736_create_music_category_table', 3),
(16, '2024_04_21_043742_create_music_instrumentation_table', 3),
(17, '2024_04_21_043748_create_music_ensemble_type_table', 3),
(18, '2024_04_21_044619_modify_musics_table', 4),
(19, '2024_06_04_062006_create_permissions_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `musics`
--

CREATE TABLE `musics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `church_hymn_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `song_number` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `music_score_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lyrics_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vocals_mp3_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organ_mp3_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preludes_mp3_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language_id` bigint(20) UNSIGNED DEFAULT NULL,
  `verses_used` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `musics`
--

INSERT INTO `musics` (`id`, `church_hymn_id`, `title`, `song_number`, `music_score_path`, `lyrics_path`, `vocals_mp3_path`, `organ_mp3_path`, `preludes_mp3_path`, `language_id`, `verses_used`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(64, 1, 'DARATING DIN ANG KAGALAKAN', '456', 'music_files/FILIPINO_HYMNS_AWS_1_526_551_594forprinting_23October2023_526.pdf', 'music_files/456.pdf', 'music_files/456 organ.mp3', 'music_files/456.mp3', 'music_files/P456.mp3', 1, 'Gawa 20:28; Roma 16:16', 1, 1, '2024-05-23 21:31:37', '2024-06-02 23:44:48'),
(66, 3, 'Jesus, Iyong Kaawaan, Palakasin Ako', '526', 'music_files/526.pdf', 'music_files/526 Lyrics Only.pdf', 'music_files/526.mp3', NULL, 'music_files/P526.mp3', 1, 'Mateo', 1, 1, '2024-06-04 16:53:27', '2024-06-04 18:23:16');

-- --------------------------------------------------------

--
-- Table structure for table `music_arranger`
--

CREATE TABLE `music_arranger` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `music_id` bigint(20) UNSIGNED NOT NULL,
  `arranger_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `music_arranger`
--

INSERT INTO `music_arranger` (`id`, `music_id`, `arranger_id`, `created_at`, `updated_at`) VALUES
(118, 64, 12, NULL, NULL),
(119, 64, 13, NULL, NULL),
(120, 64, 14, NULL, NULL),
(122, 64, 28, NULL, NULL),
(123, 64, 39, NULL, NULL),
(134, 66, 29, NULL, NULL),
(135, 66, 30, NULL, NULL),
(136, 66, 52, NULL, NULL),
(137, 66, 81, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `music_category`
--

CREATE TABLE `music_category` (
  `music_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `music_category`
--

INSERT INTO `music_category` (`music_id`, `category_id`) VALUES
(64, 1),
(64, 2),
(66, 1),
(66, 2),
(66, 3),
(66, 7),
(66, 8),
(66, 9);

-- --------------------------------------------------------

--
-- Table structure for table `music_composer`
--

CREATE TABLE `music_composer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `music_id` bigint(20) UNSIGNED NOT NULL,
  `composer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `music_composer`
--

INSERT INTO `music_composer` (`id`, `music_id`, `composer_id`, `created_at`, `updated_at`) VALUES
(92, 64, 1, NULL, NULL),
(93, 64, 3, NULL, NULL),
(94, 64, 4, NULL, NULL),
(103, 64, 2, NULL, NULL),
(105, 66, 2, NULL, NULL),
(106, 66, 4, NULL, NULL),
(107, 66, 31, NULL, NULL),
(108, 66, 32, NULL, NULL),
(109, 66, 33, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `music_creators`
--

CREATE TABLE `music_creators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `local` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duty` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` datetime DEFAULT NULL,
  `music_background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `music_creators`
--

INSERT INTO `music_creators` (`id`, `name`, `local`, `district`, `duty`, `birthday`, `music_background`, `designation`, `created_at`, `updated_at`) VALUES
(1, 'Albert Lapuz', 'sagana', 'central', 'Choir Director', '1988-02-07 00:00:00', 'asd', 1, NULL, '2024-05-20 23:44:24'),
(2, 'Alejandro M. Pangulayan', NULL, NULL, '', NULL, NULL, 1, NULL, '2024-05-07 15:38:43'),
(3, 'Acierto', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(4, 'Anthony Jumipit', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(5, 'Antonio T. de Guzman Jr.', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(6, 'Arman Santos', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(7, 'Ariel del Rosario', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(8, 'Arnel Deseo Jr.', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(9, 'Benito M. Pangulayan', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(10, 'Bienvenido C. Santiago', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(11, 'Brandon Rosquites', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(12, 'Carlo Joshua Pineda', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(13, 'Catherine Wetzstein', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(14, 'Cesar Camacho', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(15, 'Cesar Feliciano', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(16, 'Charlyn Rugayan', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(17, 'Christian Sioson', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(18, 'Christian Tolentino', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(19, 'Christine Balbuena', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(20, 'Clifford Kent N. Calaguas', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(21, 'Crisnie C. Villastique', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(22, 'Danilo C. Pantollano', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(23, 'Darren Rubic', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(24, 'Darryl Paloay', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(25, 'Darvin Patio', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(26, 'David M. Magracia', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(27, 'Darl Patrick Macanas', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(28, 'Deborah Potes', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(29, 'Denniel D. Castro', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(30, 'Dennis Zason', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(31, 'Dominador Santos', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(32, 'Donald Pareña', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(33, 'Donald R. Parena', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(34, 'Ed Manguiat', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(35, 'Ednalyn Cayabvab', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(36, 'Eileen A. Pingol', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(37, 'Eileen L. Apostol', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(38, 'Eugen Magbanua', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(39, 'Emiliano P. Magtuto Sr.', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(40, 'Eric Don Velasco', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(41, 'Ernie Magtuto', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(42, 'EVM', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(43, 'Fausto T. Perez', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(44, 'Fe De Santis', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(45, 'Fritz Donnel Basit', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(46, 'Gabriel Along', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(47, 'Gabriel Jason De Borja', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(48, 'Gabriel Nabong', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(49, 'Gail Antolin', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(50, 'Garwin V. Cruz', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(51, 'Gelo Cruz', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(52, 'Gemma Minna M. de Guzman', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(53, 'Gerardo Roldan', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(54, 'Hermes Villados', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(55, 'Hermis Villados', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(56, 'Honesto Engay Jr.', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(57, 'James Hermoso', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(58, 'Jane Manahan', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(59, 'Jedernil Hidrosolo', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(60, 'Jefraem Manalo', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(61, 'Joesel Zosimo', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(62, 'Joan Solitario', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(63, 'Johenes Maghuyop Ill', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(64, 'Joon de Guia', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(65, 'Jose A. Mena Jr.', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(66, 'Jose Marco Valerio', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(67, 'JR Francisco', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(68, 'Katherine Ebido', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(69, 'Katherine Ebido', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(70, 'Kimo Oades', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(71, 'Lenzer Labuguen', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(72, 'Lynn V. Manalo', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(73, 'Marvin Soriano', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(74, 'May Felix', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(75, 'Michael A. Solitario', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(76, 'Michelle Vasquez', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(77, 'Mike Velasco', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(78, 'Nenita Dejan', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(79, 'Nenita Rosanes', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(80, 'Nesson Aguilar', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(81, 'Ramon C. Reyes', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(82, 'Randolf del Rosario', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(83, 'Reynaldo Gendrano', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(84, 'Rhodora A. Megia', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(85, 'Robert Smith', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(86, 'Rod Y. Ramos', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(87, 'Rodolfo C. Sanchez', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(88, 'Rogel P. Flores', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(89, 'Romeo Flores Sr.', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(90, 'Romeo V. Mangandi', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(91, 'Ronald M. Gabatino', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(92, 'Ryan Jomillo', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(93, 'Ryan Solitario', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(94, 'Sanrex Tinda', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(95, 'Santos Cordez', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(96, 'Serafin David Jr.', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(97, 'Tom Catangay', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(98, 'Vince Eduard Quinitio', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(99, 'Virginia Debatian', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(100, 'Von Joshua Flores', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(101, 'Willy Rivera', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL),
(102, 'Zap Rexton Lazaro', NULL, NULL, '', '0000-00-00 00:00:00', NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `music_ensemble_type`
--

CREATE TABLE `music_ensemble_type` (
  `music_id` bigint(20) UNSIGNED NOT NULL,
  `ensemble_type_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `music_ensemble_type`
--

INSERT INTO `music_ensemble_type` (`music_id`, `ensemble_type_id`) VALUES
(64, 1),
(66, 1);

-- --------------------------------------------------------

--
-- Table structure for table `music_instrumentation`
--

CREATE TABLE `music_instrumentation` (
  `music_id` bigint(20) UNSIGNED NOT NULL,
  `instrumentation_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `music_instrumentation`
--

INSERT INTO `music_instrumentation` (`music_id`, `instrumentation_id`) VALUES
(64, 1),
(64, 2),
(66, 1),
(66, 3);

-- --------------------------------------------------------

--
-- Table structure for table `music_lyricist`
--

CREATE TABLE `music_lyricist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `music_id` bigint(20) UNSIGNED NOT NULL,
  `lyricist_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `music_lyricist`
--

INSERT INTO `music_lyricist` (`id`, `music_id`, `lyricist_id`, `created_at`, `updated_at`) VALUES
(84, 64, 1, NULL, NULL),
(85, 64, 2, NULL, NULL),
(93, 66, 1, NULL, NULL),
(94, 66, 2, NULL, NULL),
(95, 66, 12, NULL, NULL),
(96, 66, 13, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('felixpareja.pmdit07@gmail.com', '$2y$12$WuueKTm5hHK2JoLLziCMJefq91GXqDyqYF/KFUkfaR4etjGmVS6p2', '2024-04-16 21:51:21');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'superuser', 'Super User', '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(2, 'admin', 'Admin', '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(3, 'csv_import', 'CSV Import', '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(4, 'dashboard', 'Dashboard', '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(5, 'musics.view', 'View', '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(6, 'musics.create', 'Create', '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(7, 'musics.edit', 'Edit', '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(8, 'musics.delete', 'Delete', '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(9, 'musics.view_hymn', 'View Hymn', '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(10, 'music_details.view', 'View', '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(11, 'music_details.download', 'Download', '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(12, 'music_details.play', 'Play', '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(13, 'categories.view', 'View', '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(14, 'categories.create', 'Create', '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(15, 'categories.edit', 'Edit', '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(16, 'categories.delete', 'Delete', '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(17, 'instrumentations.view', 'View', '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(18, 'instrumentations.create', 'Create', '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(19, 'instrumentations.edit', 'Edit', '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(20, 'instrumentations.delete', 'Delete', '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(21, 'ensemble_types.view', 'View', '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(22, 'ensemble_types.create', 'Create', '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(23, 'ensemble_types.edit', 'Edit', '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(24, 'ensemble_types.delete', 'Delete', '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(25, 'credits.view', 'View', '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(26, 'credits.create', 'Create', '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(27, 'credits.edit', 'Edit', '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(28, 'credits.delete', 'Delete', '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(29, 'groups.view', 'View', '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(30, 'groups.create', 'Create', '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(31, 'groups.edit', 'Edit', '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(32, 'groups.delete', 'Delete', '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(33, 'users.view', 'View', '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(34, 'users.create', 'Create', '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(35, 'users.edit', 'Edit', '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(36, 'users.delete', 'Delete', '2024-06-03 23:56:00', '2024-06-03 23:56:00');

-- --------------------------------------------------------

--
-- Table structure for table `permission_categories`
--

CREATE TABLE `permission_categories` (
  `id` int(11) NOT NULL,
  `permission_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permission_categories`
--

INSERT INTO `permission_categories` (`id`, `permission_id`, `category_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Global', NULL, '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(2, 1, 1, NULL, NULL, NULL, NULL),
(3, 2, 1, NULL, NULL, NULL, NULL),
(4, 3, 1, NULL, NULL, NULL, NULL),
(5, 4, 1, NULL, NULL, NULL, NULL),
(6, NULL, NULL, 'Musics', NULL, '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(7, 5, 6, NULL, NULL, NULL, NULL),
(8, 6, 6, NULL, NULL, NULL, NULL),
(9, 7, 6, NULL, NULL, NULL, NULL),
(10, 8, 6, NULL, NULL, NULL, NULL),
(11, 9, 6, NULL, NULL, NULL, NULL),
(12, NULL, NULL, 'Music Details', NULL, '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(13, 10, 12, NULL, NULL, NULL, NULL),
(14, 11, 12, NULL, NULL, NULL, NULL),
(15, 12, 12, NULL, NULL, NULL, NULL),
(16, NULL, NULL, 'Categories', NULL, '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(17, 13, 16, NULL, NULL, NULL, NULL),
(18, 14, 16, NULL, NULL, NULL, NULL),
(19, 15, 16, NULL, NULL, NULL, NULL),
(20, 16, 16, NULL, NULL, NULL, NULL),
(21, NULL, NULL, 'Instrumentations', NULL, '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(22, 17, 21, NULL, NULL, NULL, NULL),
(23, 18, 21, NULL, NULL, NULL, NULL),
(24, 19, 21, NULL, NULL, NULL, NULL),
(25, 20, 21, NULL, NULL, NULL, NULL),
(26, NULL, NULL, 'Ensemble Types', NULL, '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(27, 21, 26, NULL, NULL, NULL, NULL),
(28, 22, 26, NULL, NULL, NULL, NULL),
(29, 23, 26, NULL, NULL, NULL, NULL),
(30, 24, 26, NULL, NULL, NULL, NULL),
(31, NULL, NULL, 'Credits', NULL, '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(32, 25, 31, NULL, NULL, NULL, NULL),
(33, 26, 31, NULL, NULL, NULL, NULL),
(34, 27, 31, NULL, NULL, NULL, NULL),
(35, 28, 31, NULL, NULL, NULL, NULL),
(36, NULL, NULL, 'Groups', NULL, '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(37, 29, 36, NULL, NULL, NULL, NULL),
(38, 30, 36, NULL, NULL, NULL, NULL),
(39, 31, 36, NULL, NULL, NULL, NULL),
(40, 32, 36, NULL, NULL, NULL, NULL),
(41, NULL, NULL, 'Users', NULL, '2024-06-03 23:56:00', '2024-06-03 23:56:00'),
(42, 33, 41, NULL, NULL, NULL, NULL),
(43, 34, 41, NULL, NULL, NULL, NULL),
(44, 35, 41, NULL, NULL, NULL, NULL),
(45, 36, 41, NULL, NULL, NULL, NULL),
(46, 37, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_groups`
--

CREATE TABLE `permission_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `permissions` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permission_groups`
--

INSERT INTO `permission_groups` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'PMD-IT', '{\"superuser\":\"1\",\"admin\":\"0\",\"csv_import\":\"0\",\"dashboard\":\"0\",\"musics.view\":\"1\",\"musics.create\":\"1\",\"musics.edit\":\"1\",\"musics.delete\":\"1\",\"musics.view_hymn\":\"1\",\"music_details.view\":\"1\",\"music_details.download\":\"1\",\"music_details.play\":\"1\",\"categories.view\":\"1\",\"categories.create\":\"1\",\"categories.edit\":\"1\",\"categories.delete\":\"1\",\"instrumentations.view\":\"1\",\"instrumentations.create\":\"1\",\"instrumentations.edit\":\"1\",\"instrumentations.delete\":\"1\",\"ensemble_types.view\":\"1\",\"ensemble_types.create\":\"1\",\"ensemble_types.edit\":\"1\",\"ensemble_types.delete\":\"1\",\"credits.view\":\"1\",\"credits.create\":\"1\",\"credits.edit\":\"1\",\"credits.delete\":\"1\",\"groups.view\":\"1\",\"groups.create\":\"1\",\"groups.edit\":\"1\",\"groups.delete\":\"1\",\"users.view\":\"1\",\"users.create\":\"1\",\"users.edit\":\"1\",\"users.delete\":\"1\"}', '2024-06-03 18:27:24', '2024-06-03 21:56:42'),
(2, 'VIP', '{\"superuser\":\"0\",\"admin\":\"0\",\"csv_import\":\"0\",\"dashboard\":\"0\",\"musics.view\":\"1\",\"musics.create\":\"0\",\"musics.edit\":\"0\",\"musics.delete\":\"0\",\"musics.view_hymn\":\"1\",\"music_details.view\":\"1\",\"music_details.download\":\"1\",\"music_details.play\":\"1\",\"categories.view\":\"0\",\"categories.create\":\"0\",\"categories.edit\":\"0\",\"categories.delete\":\"0\",\"instrumentations.view\":\"0\",\"instrumentations.create\":\"0\",\"instrumentations.edit\":\"0\",\"instrumentations.delete\":\"0\",\"ensemble_types.view\":\"0\",\"ensemble_types.create\":\"0\",\"ensemble_types.edit\":\"0\",\"ensemble_types.delete\":\"0\",\"credits.view\":\"0\",\"credits.create\":\"0\",\"credits.edit\":\"0\",\"credits.delete\":\"0\",\"groups.view\":\"0\",\"groups.create\":\"0\",\"groups.edit\":\"0\",\"groups.delete\":\"0\",\"users.view\":\"0\",\"users.create\":\"0\",\"users.edit\":\"0\",\"users.delete\":\"0\"}', '2024-06-03 21:30:05', '2024-06-03 21:30:05');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activated` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `permissions`, `activated`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Felix Pareja', 'fmpareja', 'felixpareja.pmdit07@gmail.com', NULL, '$2y$12$oXj7Jb0Mq2ubIdW6FnqIH.Y5QJEWSHNxkImnSGf25eEuMripxrKd.', NULL, 0, NULL, '2024-04-16 21:46:25', '2024-06-02 22:44:47'),
(3, 'Kyrt Jurada', 'kjurada', 'kjurada@gmail.com', NULL, '$2y$12$gdJNOpmcVydXmnStkBxnHe1oPVIpWlFtfNPx9c3GsHA/sycQn94ie', NULL, 0, NULL, '2024-06-02 23:08:48', '2024-06-04 17:58:38'),
(4, 'Roland Kim Amaro', 'rkamaro', 'rkamaro@gmail.com', NULL, '$2y$12$X6mlU56RRbC5zxyy5IVGde/q0Tsr9MgUQt4afweD2JbZKokf1Nbo2', NULL, NULL, NULL, '2024-06-03 19:42:53', '2024-06-03 21:38:36'),
(5, 'Eduardo V. Manalo', 'evm', 'evm@gmail.com', NULL, '$2y$12$Cp0HvJC.wabZ/NtmJ8TyquM0wSDUpNKxblvJix3j1zl0AblSLbyp.', NULL, NULL, NULL, '2024-06-03 21:31:13', '2024-06-03 21:37:47'),
(6, 'Antonio  T. de Guzman', 'atg', 'atg@gmail.com', NULL, '$2y$12$u3ikFSmmBU44bVQ9vK160emXzhh98nLkiGTCnO7Gdo5ClMlOcFcPe', NULL, NULL, NULL, '2024-06-03 21:34:13', '2024-06-03 21:38:06'),
(7, 'Gemma M. de Guzman', 'gmg', 'gmg@gmail.com', NULL, '$2y$12$T7j3WfGYbg7Po9iFTI474epUuzRwS2sFtgLsdQNGD06imTmKxC4Im', NULL, NULL, NULL, '2024-06-03 21:53:50', '2024-06-03 21:53:50');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`user_id`, `group_id`) VALUES
(1, 1),
(3, 1),
(4, 1),
(5, 2),
(6, 2),
(7, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `church_hymns`
--
ALTER TABLE `church_hymns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ensemble_types`
--
ALTER TABLE `ensemble_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `instrumentations`
--
ALTER TABLE `instrumentations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `musics`
--
ALTER TABLE `musics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `musics_church_hymn_id_foreign` (`church_hymn_id`),
  ADD KEY `musics_language_id_foreign` (`language_id`),
  ADD KEY `musics_created_by_foreign` (`created_by`),
  ADD KEY `musics_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `music_arranger`
--
ALTER TABLE `music_arranger`
  ADD PRIMARY KEY (`id`),
  ADD KEY `music_arranger_music_id_foreign` (`music_id`),
  ADD KEY `music_arranger_arranger_id_foreign` (`arranger_id`);

--
-- Indexes for table `music_category`
--
ALTER TABLE `music_category`
  ADD PRIMARY KEY (`music_id`,`category_id`),
  ADD KEY `music_category_category_id_foreign` (`category_id`);

--
-- Indexes for table `music_composer`
--
ALTER TABLE `music_composer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `music_composer_music_id_foreign` (`music_id`),
  ADD KEY `music_composer_composer_id_foreign` (`composer_id`);

--
-- Indexes for table `music_creators`
--
ALTER TABLE `music_creators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `music_ensemble_type`
--
ALTER TABLE `music_ensemble_type`
  ADD PRIMARY KEY (`music_id`,`ensemble_type_id`),
  ADD KEY `music_ensemble_type_ensemble_type_id_foreign` (`ensemble_type_id`);

--
-- Indexes for table `music_instrumentation`
--
ALTER TABLE `music_instrumentation`
  ADD PRIMARY KEY (`music_id`,`instrumentation_id`),
  ADD KEY `music_instrumentation_instrumentation_id_foreign` (`instrumentation_id`);

--
-- Indexes for table `music_lyricist`
--
ALTER TABLE `music_lyricist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `music_lyricist_music_id_foreign` (`music_id`),
  ADD KEY `music_lyricist_lyricist_id_foreign` (`lyricist_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_categories`
--
ALTER TABLE `permission_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_groups`
--
ALTER TABLE `permission_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD UNIQUE KEY `user_id` (`user_id`,`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `church_hymns`
--
ALTER TABLE `church_hymns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ensemble_types`
--
ALTER TABLE `ensemble_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instrumentations`
--
ALTER TABLE `instrumentations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `musics`
--
ALTER TABLE `musics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `music_arranger`
--
ALTER TABLE `music_arranger`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `music_composer`
--
ALTER TABLE `music_composer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `music_creators`
--
ALTER TABLE `music_creators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `music_lyricist`
--
ALTER TABLE `music_lyricist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `permission_categories`
--
ALTER TABLE `permission_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `permission_groups`
--
ALTER TABLE `permission_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `musics`
--
ALTER TABLE `musics`
  ADD CONSTRAINT `musics_church_hymn_id_foreign` FOREIGN KEY (`church_hymn_id`) REFERENCES `church_hymns` (`id`),
  ADD CONSTRAINT `musics_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `musics_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `musics_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `music_arranger`
--
ALTER TABLE `music_arranger`
  ADD CONSTRAINT `music_arranger_arranger_id_foreign` FOREIGN KEY (`arranger_id`) REFERENCES `music_creators` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `music_arranger_music_id_foreign` FOREIGN KEY (`music_id`) REFERENCES `musics` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `music_category`
--
ALTER TABLE `music_category`
  ADD CONSTRAINT `music_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `music_category_music_id_foreign` FOREIGN KEY (`music_id`) REFERENCES `musics` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `music_composer`
--
ALTER TABLE `music_composer`
  ADD CONSTRAINT `music_composer_composer_id_foreign` FOREIGN KEY (`composer_id`) REFERENCES `music_creators` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `music_composer_music_id_foreign` FOREIGN KEY (`music_id`) REFERENCES `musics` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `music_ensemble_type`
--
ALTER TABLE `music_ensemble_type`
  ADD CONSTRAINT `music_ensemble_type_ensemble_type_id_foreign` FOREIGN KEY (`ensemble_type_id`) REFERENCES `ensemble_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `music_ensemble_type_music_id_foreign` FOREIGN KEY (`music_id`) REFERENCES `musics` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `music_instrumentation`
--
ALTER TABLE `music_instrumentation`
  ADD CONSTRAINT `music_instrumentation_instrumentation_id_foreign` FOREIGN KEY (`instrumentation_id`) REFERENCES `instrumentations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `music_instrumentation_music_id_foreign` FOREIGN KEY (`music_id`) REFERENCES `musics` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `music_lyricist`
--
ALTER TABLE `music_lyricist`
  ADD CONSTRAINT `music_lyricist_lyricist_id_foreign` FOREIGN KEY (`lyricist_id`) REFERENCES `music_creators` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `music_lyricist_music_id_foreign` FOREIGN KEY (`music_id`) REFERENCES `musics` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
