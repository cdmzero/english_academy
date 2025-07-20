-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Jul 20, 2025 at 07:57 PM
-- Server version: 10.5.29-MariaDB-ubu2004
-- PHP Version: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_master`
--

-- --------------------------------------------------------

--
-- Table structure for table `lines`
--

CREATE TABLE `lines` (
  `id` int(255) NOT NULL,
  `result_id` int(255) DEFAULT NULL,
  `question_title` varchar(255) DEFAULT NULL,
  `user_choice` varchar(255) DEFAULT NULL,
  `Option1` varchar(255) DEFAULT NULL,
  `Option2` varchar(255) DEFAULT NULL,
  `Option3` varchar(255) DEFAULT NULL,
  `Option4` varchar(255) DEFAULT NULL,
  `answerd` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Truncate table before insert `lines`
--

TRUNCATE TABLE `lines`;
--
-- Dumping data for table `lines`
--

INSERT INTO `lines` (`id`, `result_id`, `question_title`, `user_choice`, `Option1`, `Option2`, `Option3`, `Option4`, `answerd`, `created_at`, `updated_at`) VALUES
(1, 1, '¿En que ciudad se encuentra la Torre Eifel?', '1', 'PARIS', 'MADRID', 'BARCELONA', 'POBLETE', '1', NULL, NULL),
(2, 1, '¿Como se llama la capital de Francia?', '3', 'PARIS', 'MADRID', 'PUERTOLLANO', 'POBLETE', '1', NULL, NULL),
(3, 1, '¿Cual es la ciudad mas importante que cruza el Senna?', '1', 'PARIS', 'MADRID', 'MARBELLA', 'POBLETE', '1', NULL, NULL),
(4, 4, 'pepitoa', '4', 'la cara', 'de', 'tu', 'puxx', '4', '2020-06-01 17:48:05', NULL),
(5, 5, '¿En que ciudad se encuentra la Torre Eifel?', '1', 'PARIS', 'MADRID', 'BARCELONA', 'POBLETE', '1', '2020-06-01 18:05:01', NULL),
(6, 5, '¿Cual es la ciudad mas importante que cruza el Senna?', '1', 'PARIS', 'MADRID', 'MARBELLA', 'ARGAMASILLA', '1', '2020-06-01 18:05:01', NULL),
(7, 5, '¿Como se llama la capital de Francia?', '2', 'PARIS', 'PUERTOLLANO', 'BARCELONA', 'MOZAMBIQUE', '1', '2020-06-01 18:05:01', NULL),
(8, 6, '¿Cual es la ciudad mas importante que cruza el Senna?', '1', 'PARIS', 'MADRID', 'MARBELLA', 'ARGAMASILLA', '1', '2020-06-01 18:31:49', NULL),
(9, 6, '¿Como se llama la capital de Francia?', '3', 'PARIS', 'PUERTOLLANO', 'BARCELONA', 'MOZAMBIQUE', '1', '2020-06-01 18:31:49', NULL),
(10, 6, '¿En que ciudad se encuentra la Torre Eifel?', '3', 'PARIS', 'MADRID', 'BARCELONA', 'POBLETE', '1', '2020-06-01 18:31:49', NULL),
(11, 7, '¿En que ciudad se encuentra la Torre Eifel?', '1', 'PARIS', 'MADRID', 'BARCELONA', 'POBLETE', '1', '2020-06-05 13:13:29', NULL),
(12, 7, '¿Cual es la ciudad mas importante que cruza el Senna?', '1', 'PARIS', 'MADRID', 'MARBELLA', 'ARGAMASILLA', '1', '2020-06-05 13:13:29', NULL),
(13, 7, '¿Como se llama la capital de Francia?', '0', 'PARIS', 'PUERTOLLANO', 'BARCELONA', 'MOZAMBIQUE', '1', '2020-06-05 13:13:29', NULL),
(14, 8, '¿En que ciudad se encuentra la Torre Eifel?', '1', 'PARIS', 'MADRID', 'BARCELONA', 'POBLETE', '1', '2020-06-05 13:16:11', NULL),
(15, 8, '¿Cual es la ciudad mas importante que cruza el Senna?', '1', 'PARIS', 'MADRID', 'MARBELLA', 'ARGAMASILLA', '1', '2020-06-05 13:16:11', NULL),
(16, 8, '¿Como se llama la capital de Francia?', '0', 'PARIS', 'PUERTOLLANO', 'BARCELONA', 'MOZAMBIQUE', '1', '2020-06-05 13:16:11', NULL),
(17, 9, '¿Cual es la ciudad mas importante que cruza el Senna?', '3', 'PARIS', 'MADRID', 'MARBELLA', 'ARGAMASILLA', '1', '2025-07-20 20:30:34', NULL),
(18, 9, '¿En que ciudad se encuentra la Torre Eifel?', '4', 'PARIS', 'MADRID', 'BARCELONA', 'POBLETE', '1', '2025-07-20 20:30:34', NULL),
(19, 9, '¿Como se llama la capital de Francia?', '4', 'PARIS', 'PUERTOLLANO', 'BARCELONA', 'MOZAMBIQUE', '1', '2025-07-20 20:30:34', NULL),
(20, 10, 'What’s the correct sentence?', '4', 'She go to school every day.', 'She goes to school every day.', 'She going to school every day.', 'She gone to school every day.', '2', '2025-07-20 20:45:07', NULL),
(21, 10, 'Choose the right option \"If I ___ earlier, I wouldn\'t have missed the train.\"', '0', 'leave', 'had left', 'left', 'have left', '2', '2025-07-20 20:45:07', NULL),
(22, 11, 'What’s the correct sentence?', '3', 'She go to school every day.', 'She goes to school every day.', 'She going to school every day.', 'She gone to school every day.', '2', '2025-07-20 20:47:00', NULL),
(23, 11, 'Choose the right option \"If I ___ earlier, I wouldn\'t have missed the train.\"', '1', 'leave', 'had left', 'left', 'have left', '2', '2025-07-20 20:47:00', NULL),
(24, 12, 'What’s the correct sentence?', '2', 'She go to school every day.', 'She goes to school every day.', 'She going to school every day.', 'She gone to school every day.', '2', '2025-07-20 20:52:36', NULL),
(25, 12, 'Choose the right option \"If I ___ earlier, I wouldn\'t have missed the train.\"', '1', 'leave', 'had left', 'left', 'have left', '2', '2025-07-20 20:52:36', NULL),
(26, 13, 'Choose the most natural and grammatically correct sentence:', '4', 'Hardly he had arrived when it started to rain.', 'No sooner had he arrived than it started to rain.', 'Scarcely he arrived when it started to rain.', 'As soon as he has arrived, it started to rain.', '2', '2025-07-20 21:19:40', NULL),
(27, 13, '\"Despite ___ very tired, she finished the project on time.\"', '2', 'to be', 'be', 'being', 'was', '3', '2025-07-20 21:19:40', NULL),
(28, 13, 'Which sentence uses the subjunctive mood correctly?', '1', 'I wish he comes earlier.', 'If I was you, I would study more.', 'It’s important that he be on time.', 'She suggested that he goes home.', '3', '2025-07-20 21:19:40', NULL),
(29, 14, 'What’s the correct sentence?', '2', 'She go to school every day.', 'She goes to school every day.', 'She going to school every day.', 'She gone to school every day.', '2', '2025-07-20 21:19:49', NULL),
(30, 14, 'Choose the right option \"If I ___ earlier, I wouldn\'t have missed the train.\"', '2', 'leave', 'had left', 'left', 'have left', '2', '2025-07-20 21:19:49', NULL),
(31, 15, '\"One child, two ___.\"', '2', 'childs', 'children', 'childes', 'childrens', '2', '2025-07-20 21:27:39', NULL),
(32, 15, 'Which sentence is correct?', '4', 'It\'s nin o\'clock.', 'It\'s six clock.', 'It\'s twelve o\'cloc.', 'It\'s three o\'clock.', '4', '2025-07-20 21:27:39', NULL),
(33, 15, 'Which sentence expresses a hypothetical situation in the future?', '4', 'If I had studied, I would have passed the test.', 'If I study, I will pass the test.', 'If I were you, I would talk to him.', 'If I won the lottery, I would travel the world.', '4', '2025-07-20 21:27:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(255) NOT NULL,
  `question_id` int(255) DEFAULT NULL,
  `option_number` int(255) DEFAULT NULL,
  `option_title` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Truncate table before insert `options`
--

TRUNCATE TABLE `options`;
--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `question_id`, `option_number`, `option_title`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'I wish he comes earlier.', '2020-06-01 17:44:32', '2025-07-20 21:07:57'),
(2, 1, 2, 'If I was you, I would study more.', '2020-06-01 17:44:32', '2025-07-20 21:07:57'),
(3, 1, 3, 'It’s important that he be on time.', '2020-06-01 17:44:32', '2025-07-20 21:07:57'),
(4, 1, 4, 'She suggested that he goes home.', '2020-06-01 17:44:32', '2025-07-20 21:07:57'),
(5, 2, 1, 'to be', '2020-06-01 17:44:32', '2025-07-20 21:08:35'),
(6, 2, 2, 'be', '2020-06-01 17:44:32', '2025-07-20 21:08:35'),
(7, 2, 3, 'being', '2020-06-01 17:44:32', '2025-07-20 21:08:35'),
(8, 2, 4, 'was', '2020-06-01 17:44:32', '2025-07-20 21:08:35'),
(9, 3, 1, 'Hardly he had arrived when it started to rain.', '2020-06-01 17:44:32', '2025-07-20 21:09:18'),
(10, 3, 2, 'No sooner had he arrived than it started to rain.', '2020-06-01 17:44:32', '2025-07-20 21:09:18'),
(11, 3, 3, 'Scarcely he arrived when it started to rain.', '2020-06-01 17:44:32', '2025-07-20 21:09:18'),
(12, 3, 4, 'As soon as he has arrived, it started to rain.', '2020-06-01 17:44:32', '2025-07-20 21:09:18'),
(13, 4, 1, 'She go to school every day.', '2020-06-01 17:47:53', '2025-07-20 20:38:33'),
(14, 4, 2, 'She goes to school every day.', '2020-06-01 17:47:53', '2025-07-20 20:38:33'),
(15, 4, 3, 'She going to school every day.', '2020-06-01 17:47:53', '2025-07-20 20:38:33'),
(16, 4, 4, 'She gone to school every day.', '2020-06-01 17:47:53', '2025-07-20 20:38:33'),
(17, 5, 1, 'leave', '2025-07-20 20:40:01', '2025-07-20 20:40:58'),
(18, 5, 2, 'had left', '2025-07-20 20:40:01', '2025-07-20 20:40:58'),
(19, 5, 3, 'left', '2025-07-20 20:40:01', '2025-07-20 20:40:58'),
(20, 5, 4, 'have left', '2025-07-20 20:40:01', '2025-07-20 20:40:58'),
(21, 6, 1, 'Where you live?', '2025-07-20 21:22:16', '2025-07-20 21:22:16'),
(22, 6, 2, 'Where do you live?', '2025-07-20 21:22:17', '2025-07-20 21:22:17'),
(23, 6, 3, 'Where are you live?', '2025-07-20 21:22:17', '2025-07-20 21:22:17'),
(24, 6, 4, 'Where does you live?', '2025-07-20 21:22:17', '2025-07-20 21:22:17'),
(25, 7, 1, 'They will finish the project tomorrow.', '2025-07-20 21:22:49', '2025-07-20 21:22:49'),
(26, 7, 2, 'The project finishes tomorrow.', '2025-07-20 21:22:49', '2025-07-20 21:22:49'),
(27, 7, 3, 'The project will be finished tomorrow.', '2025-07-20 21:22:49', '2025-07-20 21:22:49'),
(28, 7, 4, 'They are finishing the project tomorrow.', '2025-07-20 21:22:49', '2025-07-20 21:22:49'),
(29, 8, 1, 'deceived', '2025-07-20 21:23:30', '2025-07-20 21:23:30'),
(30, 8, 2, 'persuaded', '2025-07-20 21:23:30', '2025-07-20 21:23:30'),
(31, 8, 3, 'influenced', '2025-07-20 21:23:30', '2025-07-20 21:23:30'),
(32, 8, 4, 'manipulated', '2025-07-20 21:23:30', '2025-07-20 21:23:30'),
(33, 9, 1, 'It\'s nin o\'clock.', '2025-07-20 21:26:04', '2025-07-20 21:26:04'),
(34, 9, 2, 'It\'s six clock.', '2025-07-20 21:26:04', '2025-07-20 21:26:04'),
(35, 9, 3, 'It\'s twelve o\'cloc.', '2025-07-20 21:26:04', '2025-07-20 21:26:04'),
(36, 9, 4, 'It\'s three o\'clock.', '2025-07-20 21:26:04', '2025-07-20 21:26:04'),
(37, 10, 1, 'If I had studied, I would have passed the test.', '2025-07-20 21:26:38', '2025-07-20 21:26:38'),
(38, 10, 2, 'If I study, I will pass the test.', '2025-07-20 21:26:38', '2025-07-20 21:26:38'),
(39, 10, 3, 'If I were you, I would talk to him.', '2025-07-20 21:26:38', '2025-07-20 21:26:38'),
(40, 10, 4, 'If I won the lottery, I would travel the world.', '2025-07-20 21:26:38', '2025-07-20 21:26:38'),
(41, 11, 1, 'childs', '2025-07-20 21:27:15', '2025-07-20 21:27:15'),
(42, 11, 2, 'children', '2025-07-20 21:27:15', '2025-07-20 21:27:15'),
(43, 11, 3, 'childes', '2025-07-20 21:27:16', '2025-07-20 21:27:16'),
(44, 11, 4, 'childrens', '2025-07-20 21:27:16', '2025-07-20 21:27:16'),
(45, 12, 1, 'so', '2025-07-20 21:32:08', '2025-07-20 21:32:08'),
(46, 12, 2, 'neither', '2025-07-20 21:32:08', '2025-07-20 21:32:08'),
(47, 12, 3, 'either', '2025-07-20 21:32:08', '2025-07-20 21:32:08'),
(48, 12, 4, 'too', '2025-07-20 21:32:08', '2025-07-20 21:32:08'),
(49, 13, 1, 'He let the cat out of the box.', '2025-07-20 21:32:43', '2025-07-20 21:32:43'),
(50, 13, 2, 'He spilled the milk.', '2025-07-20 21:32:43', '2025-07-20 21:32:43'),
(51, 13, 3, 'He let the cat out of the bag.', '2025-07-20 21:32:43', '2025-07-20 21:32:43'),
(52, 13, 4, 'He spilled the beans out of the jar.', '2025-07-20 21:32:43', '2025-07-20 21:32:43'),
(53, 14, 1, 'expensive', '2025-07-20 21:33:38', '2025-07-20 21:33:38'),
(54, 14, 2, 'big', '2025-07-20 21:33:38', '2025-07-20 21:33:38'),
(55, 14, 3, 'small', '2025-07-20 21:33:38', '2025-07-20 21:33:38'),
(56, 14, 4, 'heavy', '2025-07-20 21:33:38', '2025-07-20 21:33:38'),
(57, 15, 1, 'are', '2025-07-20 21:37:24', '2025-07-20 21:37:24'),
(58, 15, 2, 'is', '2025-07-20 21:37:24', '2025-07-20 21:37:24'),
(59, 15, 3, 'am', '2025-07-20 21:37:24', '2025-07-20 21:37:24'),
(60, 15, 4, 'be', '2025-07-20 21:37:24', '2025-07-20 21:37:24'),
(61, 16, 1, 'What', '2025-07-20 21:37:52', '2025-07-20 21:37:52'),
(62, 16, 2, 'Who', '2025-07-20 21:37:52', '2025-07-20 21:37:52'),
(63, 16, 3, 'Where', '2025-07-20 21:37:52', '2025-07-20 21:37:52'),
(64, 16, 4, 'How', '2025-07-20 21:37:52', '2025-07-20 21:37:52'),
(65, 17, 1, 'I can to swim.', '2025-07-20 21:38:58', '2025-07-20 21:38:58'),
(66, 17, 2, 'I can swimming.', '2025-07-20 21:38:58', '2025-07-20 21:38:58'),
(67, 17, 3, 'I can swim.', '2025-07-20 21:38:58', '2025-07-20 21:38:58'),
(68, 17, 4, 'I can swam.', '2025-07-20 21:38:58', '2025-07-20 21:38:58');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Truncate table before insert `password_resets`
--

TRUNCATE TABLE `password_resets`;
-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(255) NOT NULL,
  `test_id` int(255) DEFAULT NULL,
  `question_title` text DEFAULT NULL,
  `answerd` int(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Truncate table before insert `questions`
--

TRUNCATE TABLE `questions`;
--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `test_id`, `question_title`, `answerd`, `created_at`, `updated_at`) VALUES
(1, 1, 'Which sentence uses the subjunctive mood correctly?', 3, '2020-06-01 17:44:32', '2025-07-20 21:07:57'),
(2, 1, '\"Despite ___ very tired, she finished the project on time.\"', 3, '2020-06-01 17:44:32', '2025-07-20 21:08:35'),
(3, 1, 'Choose the most natural and grammatically correct sentence:', 2, '2020-06-01 17:44:32', '2025-07-20 21:09:18'),
(4, 4, 'What’s the correct sentence?', 2, '2020-06-01 17:47:53', '2025-07-20 20:38:33'),
(5, 4, 'Choose the right option \"If I ___ earlier, I wouldn\'t have missed the train.\"', 2, '2025-07-20 20:40:01', '2025-07-20 20:40:18'),
(6, 3, 'Choose the correct question:', 2, '2025-07-20 21:22:16', '2025-07-20 21:22:16'),
(7, 3, 'Which sentence is in the passive voice?', 3, '2025-07-20 21:22:49', '2025-07-20 21:22:49'),
(8, 3, 'Choose the word:\"She was so convincing that she easily ___ them into believing her story.\"', 2, '2025-07-20 21:23:30', '2025-07-20 21:23:30'),
(9, 2, 'Which sentence is correct?', 4, '2025-07-20 21:26:04', '2025-07-20 21:26:04'),
(10, 2, 'Which sentence expresses a hypothetical situation in the future?', 4, '2025-07-20 21:26:38', '2025-07-20 21:26:38'),
(11, 2, '\"One child, two ___.\"', 2, '2025-07-20 21:27:15', '2025-07-20 21:27:15'),
(12, 6, 'Which option is best? \"He didn\'t enjoy the movie, ___ did I.\"', 2, '2025-07-20 21:32:08', '2025-07-20 21:32:08'),
(13, 6, 'Choose the correct usage of an idiom:', 3, '2025-07-20 21:32:43', '2025-07-20 21:32:43'),
(14, 6, 'What’s the opposite of “cheap”?', 1, '2025-07-20 21:33:38', '2025-07-20 21:33:38'),
(15, 5, 'What is the correct form of the verb? \"She ___ happy today.\"', 2, '2025-07-20 21:37:24', '2025-07-20 21:37:24'),
(16, 5, 'Choose the correct question word: \"___ is your name?\"', 1, '2025-07-20 21:37:52', '2025-07-20 21:37:52'),
(17, 5, 'What is the correct sentence?', 3, '2025-07-20 21:38:58', '2025-07-20 21:38:58');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(255) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `test_id` int(255) DEFAULT NULL,
  `total_mark` float DEFAULT NULL,
  `proportion` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Truncate table before insert `results`
--

TRUNCATE TABLE `results`;
--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `user_id`, `test_id`, `total_mark`, `proportion`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 98.99, '3/3', '2020-06-01 17:44:32', NULL),
(2, 1, 1, 78.99, '2/3', '2020-06-01 17:44:32', NULL),
(3, 1, 1, 68.99, '2/3', '2020-06-01 17:44:32', NULL),
(4, 1, 4, 100, '1/1', '2020-06-01 17:48:05', NULL),
(5, 1, 1, 33.33, '2/3', '2020-06-01 18:05:01', '2020-06-05 13:16:53'),
(6, 1, 1, 0.3, '1/3', '2020-06-01 18:31:49', '2020-06-05 13:12:04'),
(7, 1, 1, 66.6667, '2/3', '2020-06-05 13:13:29', NULL),
(8, 1, 1, 66.67, '2/3', '2020-06-05 13:16:11', NULL),
(9, 11, 1, 0, '0/3', '2025-07-20 20:30:34', NULL),
(10, 1, 4, 0, '0/2', '2025-07-20 20:45:07', NULL),
(11, 1, 4, 0, '0/2', '2025-07-20 20:47:00', NULL),
(12, 1, 4, 50, '1/2', '2025-07-20 20:52:36', NULL),
(13, 1, 1, 0, '0/3', '2025-07-20 21:19:40', NULL),
(14, 1, 4, 100, '2/2', '2025-07-20 21:19:49', NULL),
(15, 1, 2, 100, '3/3', '2025-07-20 21:27:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(255) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `test_name` varchar(255) DEFAULT NULL,
  `test_type` varchar(255) DEFAULT NULL,
  `test_level` varchar(255) DEFAULT NULL,
  `num_questions` int(255) DEFAULT NULL,
  `duration` int(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `mark_right` float DEFAULT NULL,
  `mark_wrong` float DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Truncate table before insert `tests`
--

TRUNCATE TABLE `tests`;
--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `user_id`, `test_name`, `test_type`, `test_level`, `num_questions`, `duration`, `status`, `mark_right`, `mark_wrong`, `created_at`, `updated_at`) VALUES
(1, 1, 'University', 'Exam', 'High', 3, 20, 'Public', 1, -1, '2020-06-01 17:44:32', '2025-07-20 21:18:34'),
(2, 1, 'Campus', 'Exam', 'Basic', 3, 20, 'Public', 1, 0, '2020-06-01 17:44:32', '2025-07-20 21:27:19'),
(3, 1, 'London', 'Exam', 'Intermediate', 3, 45, 'Public', 1, 0, '2020-06-01 17:44:32', '2025-07-20 21:23:32'),
(4, 1, 'A1 A2', 'Exercise', 'High', 2, 10, 'Public', 1, 0, '2020-06-01 17:44:32', '2025-07-20 20:41:03'),
(5, 1, 'B1 B2', 'Exercise', 'Basic', 3, 10, 'Public', 1, 0, '2020-06-01 17:44:32', '2025-07-20 21:40:05'),
(6, 1, 'C1 C2', 'Exercise', 'Intermediate', 3, 10, 'Public', 1, -1, '2020-06-01 17:44:32', '2025-07-20 21:35:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `surname` varchar(200) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `nick` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `surname`, `role`, `nick`, `email`, `password`, `image`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'Jose Francisco', 'Funez Arcediano', 'admin', 'cdmzero', 'jose@jose.com', '$2y$10$oXxZR.ynFbwcLLBTOm/g1uSRyb5cW/D/rKsYsxF9nVQnTjGGF6Wjq', NULL, '2020-06-01 17:44:31', '2020-06-05 13:26:40', 'BiTZCcDsmgHM7YzqnRLUpfSdGLIzbcNAb4C1UT6cxE5GJmvCOlHAB2hpsHmq'),
(2, 'Juan', 'Lopez', 'user', 'juanlp', 'jlp@gmail.com', 'pass', NULL, '2020-06-01 17:44:31', NULL, NULL),
(3, 'Manolo', 'Garcia', 'user', 'manlo', 'manolo@gmail.com', 'pass', NULL, '2020-06-01 17:44:31', NULL, NULL),
(4, 'Laura', 'Gutierrez', 'teacher', 'lagu', 'lora@lora.com', '$2y$10$aabvLAiBbo71.oczP8/bjOiKxvzx9XPZf0TTnnD40hCGIL2sAvF7e', NULL, '2020-06-01 17:44:31', '2020-06-05 13:27:21', '3fcgAt1oGlBO3UH3WQye2WjI8PZ2ABBJvllxZWCk0ZXh2x3l3vlEuJowlUBp'),
(11, 'Linkedin', 'User', 'teacher', 'ulinkedin', 'linkedin@test.com', '$2y$10$0B82jVSH9P8RnOZ3YIcXQegv/FxauU0Ef4qOO5QHRYLlNK27gMnti', NULL, '2025-07-20 20:30:04', '2025-07-20 20:34:08', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lines`
--
ALTER TABLE `lines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_result_ids` (`result_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_question` (`question_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_test` (`test_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`),
  ADD KEY `fk_test_id` (`test_id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usertest` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lines`
--
ALTER TABLE `lines`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lines`
--
ALTER TABLE `lines`
  ADD CONSTRAINT `fk_result_ids` FOREIGN KEY (`result_id`) REFERENCES `results` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `fk_question` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `fk_test` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `fk_test_id` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tests`
--
ALTER TABLE `tests`
  ADD CONSTRAINT `fk_usertest` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
