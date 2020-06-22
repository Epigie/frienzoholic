-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2020 at 07:13 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `frienzoholic`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `post_id`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 20, 'spidey is cool', 1, '2020-03-22 09:18:05', '2020-03-22 09:18:05'),
(2, 1, 17, 'nice photo :)', 1, '2020-03-22 09:18:20', '2020-03-22 09:18:20'),
(3, 1, 11, 'waiting for black widow', 1, '2020-03-22 09:18:48', '2020-03-22 09:18:48'),
(4, 1, 9, 'black is coo', 1, '2020-03-22 09:19:32', '2020-03-22 09:19:32'),
(5, 2, 21, 'nice one', 1, '2020-03-22 09:21:44', '2020-03-22 09:21:44'),
(6, 2, 15, 'star wars', 1, '2020-03-22 09:22:00', '2020-03-22 09:22:00'),
(7, 2, 12, 'cute iron man', 1, '2020-03-22 09:22:15', '2020-03-22 09:22:15'),
(8, 2, 16, 'super green', 1, '2020-03-22 09:23:24', '2020-03-22 09:23:24'),
(9, 2, 11, 'when releasing?', 1, '2020-03-22 09:23:53', '2020-03-22 09:23:53'),
(10, 2, 8, 'an awesome movie', 1, '2020-03-22 09:24:14', '2020-03-22 09:24:14'),
(11, 3, 13, 'perfect manipulation', 1, '2020-03-22 09:25:34', '2020-03-22 09:25:34'),
(12, 4, 21, 'nailed it', 1, '2020-03-22 09:27:00', '2020-03-22 09:27:00'),
(13, 8, 14, 'nice manipulation', 1, '2020-03-22 10:00:11', '2020-03-22 10:00:11'),
(14, 6, 22, 'nice bike', 1, '2020-03-22 11:04:15', '2020-03-22 11:04:15'),
(15, 1, 22, 'nice bike tooo', 1, '2020-03-22 11:07:14', '2020-03-22 11:07:14');

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `follower_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `follows_id` int(11) NOT NULL,
  `accepted` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`follower_id`, `user_id`, `follows_id`, `accepted`, `status`, `created_at`, `updated_at`) VALUES
(1, 7, 5, 1, 1, '2020-03-22 03:49:36', '2020-03-22 03:49:36'),
(2, 7, 3, 1, 1, '2020-03-22 03:49:38', '2020-03-22 03:49:38'),
(3, 7, 1, 1, 1, '2020-03-22 03:49:41', '2020-03-22 03:49:41'),
(4, 6, 5, 1, 1, '2020-03-22 03:50:36', '2020-03-22 03:50:36'),
(5, 6, 7, 1, 1, '2020-03-22 03:50:37', '2020-03-22 03:50:37'),
(6, 6, 1, 1, 1, '2020-03-22 03:50:41', '2020-03-22 03:50:41'),
(7, 1, 7, 1, 1, '2020-03-22 03:51:03', '2020-03-22 03:51:03'),
(8, 1, 5, 1, 1, '2020-03-22 03:51:04', '2020-03-22 03:51:04'),
(9, 1, 3, 1, 1, '2020-03-22 03:51:05', '2020-03-22 03:51:05'),
(10, 1, 2, 1, 1, '2020-03-22 03:51:06', '2020-03-22 03:51:06'),
(11, 1, 6, 1, 1, '2020-03-22 03:51:09', '2020-03-22 03:53:18'),
(12, 2, 1, 1, 1, '2020-03-22 03:51:48', '2020-03-22 03:51:48'),
(13, 2, 3, 1, 1, '2020-03-22 03:51:50', '2020-03-22 03:51:50'),
(14, 2, 5, 1, 1, '2020-03-22 03:51:50', '2020-03-22 03:51:50'),
(15, 2, 7, 1, 1, '2020-03-22 03:51:52', '2020-03-22 03:51:52'),
(16, 3, 5, 1, 1, '2020-03-22 03:52:17', '2020-03-22 03:52:17'),
(17, 3, 7, 1, 1, '2020-03-22 03:52:18', '2020-03-22 03:52:18'),
(18, 3, 2, 1, 1, '2020-03-22 03:52:19', '2020-03-22 03:52:19'),
(19, 3, 1, 1, 1, '2020-03-22 03:52:22', '2020-03-22 03:52:22'),
(20, 4, 6, 1, 1, '2020-03-22 03:52:54', '2020-03-22 03:53:20'),
(21, 4, 1, 1, 1, '2020-03-22 03:52:56', '2020-03-22 03:52:56'),
(22, 4, 2, 1, 1, '2020-03-22 03:52:57', '2020-03-22 03:52:57'),
(23, 5, 7, 1, 1, '2020-03-22 03:53:35', '2020-03-22 03:53:35'),
(24, 5, 3, 1, 1, '2020-03-22 03:53:37', '2020-03-22 03:53:37'),
(25, 5, 1, 1, 1, '2020-03-22 03:53:37', '2020-03-22 03:53:37'),
(26, 8, 1, 1, 1, '2020-03-22 09:59:38', '2020-03-22 09:59:38'),
(27, 8, 4, 1, 1, '2020-03-22 09:59:39', '2020-03-22 09:59:39'),
(28, 8, 5, 1, 1, '2020-03-22 09:59:41', '2020-03-22 09:59:41'),
(29, 8, 7, 1, 1, '2020-03-22 09:59:42', '2020-03-22 09:59:42'),
(30, 8, 3, 1, 1, '2020-03-22 10:01:22', '2020-03-22 10:01:22'),
(31, 8, 6, 1, 1, '2020-03-22 10:01:39', '2020-03-22 11:03:56'),
(32, 6, 8, 1, 1, '2020-03-22 11:04:08', '2020-03-22 11:04:08'),
(33, 1, 8, 1, 1, '2020-03-22 11:07:00', '2020-03-22 11:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`like_id`, `user_id`, `post_id`, `created_at`) VALUES
(1, 1, 20, '2020-03-22 09:17:53'),
(2, 1, 19, '2020-03-22 09:17:54'),
(3, 1, 18, '2020-03-22 09:18:11'),
(4, 1, 17, '2020-03-22 09:18:13'),
(5, 1, 16, '2020-03-22 09:18:25'),
(6, 1, 15, '2020-03-22 09:18:29'),
(7, 1, 13, '2020-03-22 09:18:31'),
(8, 1, 12, '2020-03-22 09:18:34'),
(9, 1, 11, '2020-03-22 09:18:36'),
(10, 1, 10, '2020-03-22 09:18:54'),
(11, 1, 9, '2020-03-22 09:18:57'),
(12, 1, 8, '2020-03-22 09:19:45'),
(13, 1, 7, '2020-03-22 09:19:48'),
(14, 1, 5, '2020-03-22 09:19:50'),
(15, 1, 2, '2020-03-22 09:19:52'),
(16, 1, 1, '2020-03-22 09:19:56'),
(17, 2, 21, '2020-03-22 09:21:37'),
(18, 2, 20, '2020-03-22 09:21:39'),
(19, 2, 16, '2020-03-22 09:21:49'),
(20, 2, 15, '2020-03-22 09:21:53'),
(21, 2, 14, '2020-03-22 09:22:05'),
(22, 2, 12, '2020-03-22 09:22:11'),
(23, 2, 3, '2020-03-22 09:22:27'),
(24, 2, 6, '2020-03-22 09:22:28'),
(25, 2, 11, '2020-03-22 09:23:46'),
(26, 2, 9, '2020-03-22 09:24:00'),
(27, 2, 8, '2020-03-22 09:24:02'),
(28, 3, 21, '2020-03-22 09:24:54'),
(29, 3, 14, '2020-03-22 09:24:55'),
(30, 3, 3, '2020-03-22 09:24:56'),
(31, 3, 6, '2020-03-22 09:24:57'),
(32, 3, 20, '2020-03-22 09:25:09'),
(33, 3, 19, '2020-03-22 09:25:13'),
(34, 3, 15, '2020-03-22 09:25:15'),
(35, 3, 13, '2020-03-22 09:25:22'),
(36, 4, 21, '2020-03-22 09:26:00'),
(37, 4, 19, '2020-03-22 09:26:02'),
(38, 4, 18, '2020-03-22 09:26:04'),
(39, 4, 17, '2020-03-22 09:26:06'),
(40, 4, 14, '2020-03-22 09:26:17'),
(41, 4, 3, '2020-03-22 09:26:18'),
(42, 4, 6, '2020-03-22 09:26:19'),
(43, 5, 21, '2020-03-22 09:28:01'),
(44, 5, 16, '2020-03-22 09:28:08'),
(45, 5, 15, '2020-03-22 09:28:10'),
(46, 6, 21, '2020-03-22 09:29:18'),
(47, 6, 20, '2020-03-22 09:29:33'),
(48, 6, 15, '2020-03-22 09:29:36'),
(49, 6, 14, '2020-03-22 09:29:44'),
(50, 6, 3, '2020-03-22 09:29:46'),
(51, 6, 6, '2020-03-22 09:29:47'),
(52, 5, 14, '2020-03-22 09:30:22'),
(53, 5, 3, '2020-03-22 09:30:24'),
(54, 5, 6, '2020-03-22 09:30:24'),
(55, 7, 21, '2020-03-22 09:32:03'),
(56, 7, 20, '2020-03-22 09:32:05'),
(57, 7, 14, '2020-03-22 09:32:16'),
(58, 7, 3, '2020-03-22 09:32:17'),
(59, 7, 6, '2020-03-22 09:32:18'),
(60, 7, 16, '2020-03-22 09:32:52'),
(61, 7, 12, '2020-03-22 09:32:56'),
(62, 7, 11, '2020-03-22 09:32:59'),
(63, 7, 9, '2020-03-22 09:33:02'),
(64, 7, 8, '2020-03-22 09:33:04'),
(65, 8, 21, '2020-03-22 09:59:52'),
(66, 8, 20, '2020-03-22 09:59:55'),
(67, 8, 15, '2020-03-22 09:59:57'),
(68, 8, 14, '2020-03-22 10:00:01'),
(69, 8, 12, '2020-03-22 10:00:03'),
(70, 8, 11, '2020-03-22 10:00:26'),
(71, 8, 8, '2020-03-22 10:00:28'),
(72, 8, 6, '2020-03-22 10:00:30'),
(73, 8, 4, '2020-03-22 10:00:32'),
(74, 8, 3, '2020-03-22 10:00:34'),
(75, 8, 2, '2020-03-22 10:00:37'),
(76, 8, 9, '2020-03-22 10:01:19'),
(77, 8, 16, '2020-03-22 10:01:20'),
(78, 6, 22, '2020-03-22 11:04:11'),
(79, 8, 18, '2020-03-22 11:05:32'),
(80, 8, 17, '2020-03-22 11:05:35'),
(81, 8, 7, '2020-03-22 11:06:10'),
(82, 8, 5, '2020-03-22 11:06:11'),
(83, 1, 22, '2020-03-22 11:07:08');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `message` varchar(200) NOT NULL,
  `seen` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `from_user_id`, `to_user_id`, `message`, `seen`, `status`, `created_at`) VALUES
(1, 6, 8, 'hai, how are you??', 1, 1, '2020-03-22 11:04:27'),
(2, 8, 6, 'fine, what about you???', 1, 1, '2020-03-22 11:06:35'),
(3, 1, 8, 'hai , there', 1, 1, '2020-03-22 11:07:48'),
(4, 8, 1, 'hai', 1, 1, '2020-03-22 11:08:32'),
(5, 6, 8, 'fine tooo', 0, 1, '2020-03-22 11:09:09'),
(6, 1, 8, 'sollu', 1, 1, '2020-04-12 13:56:31'),
(7, 1, 8, 'sollu', 0, 1, '2020-04-12 13:56:34');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `target_id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `notification` varchar(100) NOT NULL,
  `seen` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `user_id`, `target_id`, `type`, `notification`, `seen`, `status`, `created_at`) VALUES
(1, 5, 7, 'follow', 'disney started following you', 1, 1, '2020-03-22 03:49:36'),
(2, 3, 7, 'follow', 'disney started following you', 1, 1, '2020-03-22 03:49:38'),
(3, 1, 7, 'follow', 'disney started following you', 1, 1, '2020-03-22 03:49:41'),
(4, 5, 6, 'follow', 'vicky started following you', 1, 1, '2020-03-22 03:50:36'),
(5, 7, 6, 'follow', 'vicky started following you', 1, 1, '2020-03-22 03:50:37'),
(6, 1, 6, 'follow', 'vicky started following you', 1, 1, '2020-03-22 03:50:42'),
(7, 7, 1, 'follow', 'benzigar.codes started following you', 1, 1, '2020-03-22 03:51:03'),
(8, 5, 1, 'follow', 'benzigar.codes started following you', 1, 1, '2020-03-22 03:51:04'),
(9, 3, 1, 'follow', 'benzigar.codes started following you', 1, 1, '2020-03-22 03:51:05'),
(10, 2, 1, 'follow', 'benzigar.codes started following you', 1, 1, '2020-03-22 03:51:06'),
(11, 1, 2, 'follow', 'sony_jackson started following you', 1, 1, '2020-03-22 03:51:49'),
(12, 3, 2, 'follow', 'sony_jackson started following you', 1, 1, '2020-03-22 03:51:50'),
(13, 5, 2, 'follow', 'sony_jackson started following you', 1, 1, '2020-03-22 03:51:51'),
(14, 7, 2, 'follow', 'sony_jackson started following you', 1, 1, '2020-03-22 03:51:52'),
(15, 5, 3, 'follow', 'ui_inspiration started following you', 1, 1, '2020-03-22 03:52:17'),
(16, 7, 3, 'follow', 'ui_inspiration started following you', 1, 1, '2020-03-22 03:52:18'),
(17, 2, 3, 'follow', 'ui_inspiration started following you', 1, 1, '2020-03-22 03:52:19'),
(18, 1, 3, 'follow', 'ui_inspiration started following you', 1, 1, '2020-03-22 03:52:22'),
(19, 1, 4, 'follow', 'jebin started following you', 1, 1, '2020-03-22 03:52:56'),
(20, 2, 4, 'follow', 'jebin started following you', 1, 1, '2020-03-22 03:52:57'),
(21, 1, 6, 'follow', 'vicky accepted your request', 1, 1, '2020-03-22 03:53:18'),
(22, 4, 6, 'follow', 'vicky accepted your request', 1, 1, '2020-03-22 03:53:20'),
(23, 7, 5, 'follow', 'marvel started following you', 1, 1, '2020-03-22 03:53:35'),
(24, 3, 5, 'follow', 'marvel started following you', 1, 1, '2020-03-22 03:53:37'),
(25, 1, 5, 'follow', 'marvel started following you', 1, 1, '2020-03-22 03:53:37'),
(26, 5, 20, 'post', 'benzigar.codes liked your post', 1, 1, '2020-03-22 09:17:53'),
(27, 2, 19, 'post', 'benzigar.codes liked your post', 1, 1, '2020-03-22 09:17:55'),
(28, 5, 20, 'post', 'benzigar.codes commented \"spidey is cool\" on your post', 1, 1, '2020-03-22 09:18:05'),
(29, 6, 18, 'post', 'benzigar.codes liked your post', 1, 1, '2020-03-22 09:18:11'),
(30, 6, 17, 'post', 'benzigar.codes liked your post', 1, 1, '2020-03-22 09:18:13'),
(31, 6, 17, 'post', 'benzigar.codes commented \"nice photo :)\" on your post', 1, 1, '2020-03-22 09:18:20'),
(32, 3, 16, 'post', 'benzigar.codes liked your post', 1, 1, '2020-03-22 09:18:25'),
(33, 7, 15, 'post', 'benzigar.codes liked your post', 1, 1, '2020-03-22 09:18:29'),
(34, 2, 13, 'post', 'benzigar.codes liked your post', 1, 1, '2020-03-22 09:18:31'),
(35, 5, 12, 'post', 'benzigar.codes liked your post', 1, 1, '2020-03-22 09:18:34'),
(36, 5, 11, 'post', 'benzigar.codes liked your post', 1, 1, '2020-03-22 09:18:36'),
(37, 5, 11, 'post', 'benzigar.codes commented \"waiting for black widow\" on your post', 1, 1, '2020-03-22 09:18:49'),
(38, 2, 10, 'post', 'benzigar.codes liked your post', 1, 1, '2020-03-22 09:18:54'),
(39, 3, 9, 'post', 'benzigar.codes liked your post', 1, 1, '2020-03-22 09:18:58'),
(40, 3, 9, 'post', 'benzigar.codes commented \"black is coo\" on your post', 1, 1, '2020-03-22 09:19:32'),
(41, 5, 8, 'post', 'benzigar.codes liked your post', 1, 1, '2020-03-22 09:19:45'),
(42, 6, 7, 'post', 'benzigar.codes liked your post', 1, 1, '2020-03-22 09:19:48'),
(43, 6, 5, 'post', 'benzigar.codes liked your post', 1, 1, '2020-03-22 09:19:50'),
(44, 7, 2, 'post', 'benzigar.codes liked your post', 1, 1, '2020-03-22 09:19:52'),
(45, 7, 1, 'post', 'benzigar.codes liked your post', 1, 1, '2020-03-22 09:19:56'),
(46, 1, 21, 'post', 'sony_jackson liked your post', 1, 1, '2020-03-22 09:21:37'),
(47, 5, 20, 'post', 'sony_jackson liked your post', 1, 1, '2020-03-22 09:21:39'),
(48, 1, 21, 'post', 'sony_jackson commented \"nice one\" on your post', 1, 1, '2020-03-22 09:21:44'),
(49, 3, 16, 'post', 'sony_jackson liked your post', 1, 1, '2020-03-22 09:21:49'),
(50, 7, 15, 'post', 'sony_jackson liked your post', 1, 1, '2020-03-22 09:21:53'),
(51, 7, 15, 'post', 'sony_jackson commented \"star wars\" on your post', 1, 1, '2020-03-22 09:22:00'),
(52, 1, 14, 'post', 'sony_jackson liked your post', 1, 1, '2020-03-22 09:22:05'),
(53, 5, 12, 'post', 'sony_jackson liked your post', 1, 1, '2020-03-22 09:22:11'),
(54, 5, 12, 'post', 'sony_jackson commented \"cute iron man\" on your post', 1, 1, '2020-03-22 09:22:15'),
(55, 1, 3, 'post', 'sony_jackson liked your post', 1, 1, '2020-03-22 09:22:27'),
(56, 1, 6, 'post', 'sony_jackson liked your post', 1, 1, '2020-03-22 09:22:28'),
(57, 3, 16, 'post', 'sony_jackson commented \"super green\" on your post', 1, 1, '2020-03-22 09:23:25'),
(58, 5, 11, 'post', 'sony_jackson liked your post', 1, 1, '2020-03-22 09:23:47'),
(59, 5, 11, 'post', 'sony_jackson commented \"when releasing?\" on your post', 1, 1, '2020-03-22 09:23:53'),
(60, 3, 9, 'post', 'sony_jackson liked your post', 1, 1, '2020-03-22 09:24:00'),
(61, 5, 8, 'post', 'sony_jackson liked your post', 1, 1, '2020-03-22 09:24:02'),
(62, 5, 8, 'post', 'sony_jackson commented \"an awesome movie\" on your post', 1, 1, '2020-03-22 09:24:14'),
(63, 1, 21, 'post', 'ui_inspiration liked your post', 1, 1, '2020-03-22 09:24:54'),
(64, 1, 14, 'post', 'ui_inspiration liked your post', 1, 1, '2020-03-22 09:24:55'),
(65, 1, 3, 'post', 'ui_inspiration liked your post', 1, 1, '2020-03-22 09:24:56'),
(66, 1, 6, 'post', 'ui_inspiration liked your post', 1, 1, '2020-03-22 09:24:57'),
(67, 5, 20, 'post', 'ui_inspiration liked your post', 1, 1, '2020-03-22 09:25:09'),
(68, 2, 19, 'post', 'ui_inspiration liked your post', 0, 1, '2020-03-22 09:25:13'),
(69, 7, 15, 'post', 'ui_inspiration liked your post', 1, 1, '2020-03-22 09:25:15'),
(70, 2, 13, 'post', 'ui_inspiration liked your post', 0, 1, '2020-03-22 09:25:22'),
(71, 2, 13, 'post', 'ui_inspiration commented \"perfect manipulation\" on your post', 0, 1, '2020-03-22 09:25:34'),
(72, 1, 21, 'post', 'jebin liked your post', 1, 1, '2020-03-22 09:26:00'),
(73, 2, 19, 'post', 'jebin liked your post', 0, 1, '2020-03-22 09:26:02'),
(74, 6, 18, 'post', 'jebin liked your post', 1, 1, '2020-03-22 09:26:04'),
(75, 6, 17, 'post', 'jebin liked your post', 1, 1, '2020-03-22 09:26:06'),
(76, 1, 14, 'post', 'jebin liked your post', 1, 1, '2020-03-22 09:26:17'),
(77, 1, 3, 'post', 'jebin liked your post', 1, 1, '2020-03-22 09:26:18'),
(78, 1, 6, 'post', 'jebin liked your post', 1, 1, '2020-03-22 09:26:19'),
(79, 1, 21, 'post', 'jebin commented \"nailed it\" on your post', 1, 1, '2020-03-22 09:27:00'),
(80, 1, 21, 'post', 'marvel liked your post', 1, 1, '2020-03-22 09:28:01'),
(81, 3, 16, 'post', 'marvel liked your post', 0, 1, '2020-03-22 09:28:08'),
(82, 7, 15, 'post', 'marvel liked your post', 1, 1, '2020-03-22 09:28:10'),
(83, 1, 21, 'post', 'vicky liked your post', 1, 1, '2020-03-22 09:29:18'),
(84, 5, 20, 'post', 'vicky liked your post', 1, 1, '2020-03-22 09:29:33'),
(85, 7, 15, 'post', 'vicky liked your post', 1, 1, '2020-03-22 09:29:36'),
(86, 1, 14, 'post', 'vicky liked your post', 1, 1, '2020-03-22 09:29:44'),
(87, 1, 3, 'post', 'vicky liked your post', 1, 1, '2020-03-22 09:29:46'),
(88, 1, 6, 'post', 'vicky liked your post', 1, 1, '2020-03-22 09:29:47'),
(89, 1, 14, 'post', 'marvel liked your post', 1, 1, '2020-03-22 09:30:22'),
(90, 1, 3, 'post', 'marvel liked your post', 1, 1, '2020-03-22 09:30:24'),
(91, 1, 6, 'post', 'marvel liked your post', 1, 1, '2020-03-22 09:30:24'),
(92, 1, 21, 'post', 'disney liked your post', 1, 1, '2020-03-22 09:32:03'),
(93, 5, 20, 'post', 'disney liked your post', 0, 1, '2020-03-22 09:32:05'),
(94, 1, 14, 'post', 'disney liked your post', 1, 1, '2020-03-22 09:32:16'),
(95, 1, 3, 'post', 'disney liked your post', 1, 1, '2020-03-22 09:32:17'),
(96, 1, 6, 'post', 'disney liked your post', 1, 1, '2020-03-22 09:32:18'),
(97, 3, 16, 'post', 'disney liked your post', 0, 1, '2020-03-22 09:32:52'),
(98, 5, 12, 'post', 'disney liked your post', 0, 1, '2020-03-22 09:32:56'),
(99, 5, 11, 'post', 'disney liked your post', 0, 1, '2020-03-22 09:32:59'),
(100, 3, 9, 'post', 'disney liked your post', 0, 1, '2020-03-22 09:33:02'),
(101, 5, 8, 'post', 'disney liked your post', 0, 1, '2020-03-22 09:33:04'),
(102, 1, 8, 'follow', 'ligen_raj started following you', 1, 1, '2020-03-22 09:59:38'),
(103, 4, 8, 'follow', 'ligen_raj started following you', 0, 1, '2020-03-22 09:59:40'),
(104, 5, 8, 'follow', 'ligen_raj started following you', 0, 1, '2020-03-22 09:59:41'),
(105, 7, 8, 'follow', 'ligen_raj started following you', 0, 1, '2020-03-22 09:59:42'),
(106, 1, 21, 'post', 'ligen_raj liked your post', 1, 1, '2020-03-22 09:59:52'),
(107, 5, 20, 'post', 'ligen_raj liked your post', 0, 1, '2020-03-22 09:59:55'),
(108, 7, 15, 'post', 'ligen_raj liked your post', 0, 1, '2020-03-22 09:59:57'),
(109, 1, 14, 'post', 'ligen_raj liked your post', 1, 1, '2020-03-22 10:00:01'),
(110, 5, 12, 'post', 'ligen_raj liked your post', 0, 1, '2020-03-22 10:00:03'),
(111, 1, 14, 'post', 'ligen_raj commented \"nice manipulation\" on your post', 1, 1, '2020-03-22 10:00:11'),
(112, 5, 11, 'post', 'ligen_raj liked your post', 0, 1, '2020-03-22 10:00:26'),
(113, 5, 8, 'post', 'ligen_raj liked your post', 0, 1, '2020-03-22 10:00:28'),
(114, 1, 6, 'post', 'ligen_raj liked your post', 1, 1, '2020-03-22 10:00:30'),
(115, 4, 4, 'post', 'ligen_raj liked your post', 0, 1, '2020-03-22 10:00:32'),
(116, 1, 3, 'post', 'ligen_raj liked your post', 1, 1, '2020-03-22 10:00:34'),
(117, 7, 2, 'post', 'ligen_raj liked your post', 0, 1, '2020-03-22 10:00:38'),
(118, 3, 9, 'post', 'ligen_raj liked your post', 0, 1, '2020-03-22 10:01:19'),
(119, 3, 16, 'post', 'ligen_raj liked your post', 0, 1, '2020-03-22 10:01:20'),
(120, 3, 8, 'follow', 'ligen_raj started following you', 0, 1, '2020-03-22 10:01:22'),
(121, 8, 6, 'follow', 'vicky accepted your request', 1, 1, '2020-03-22 11:03:56'),
(122, 8, 6, 'follow', 'vicky started following you', 1, 1, '2020-03-22 11:04:08'),
(123, 8, 22, 'post', 'vicky liked your post', 1, 1, '2020-03-22 11:04:11'),
(124, 8, 22, 'post', 'vicky commented \"nice bike\" on your post', 1, 1, '2020-03-22 11:04:15'),
(125, 6, 18, 'post', 'ligen_raj liked your post', 1, 1, '2020-03-22 11:05:32'),
(126, 6, 17, 'post', 'ligen_raj liked your post', 1, 1, '2020-03-22 11:05:35'),
(127, 6, 7, 'post', 'ligen_raj liked your post', 1, 1, '2020-03-22 11:06:10'),
(128, 6, 5, 'post', 'ligen_raj liked your post', 1, 1, '2020-03-22 11:06:11'),
(129, 8, 1, 'follow', 'benzigar.codes started following you', 1, 1, '2020-03-22 11:07:00'),
(130, 8, 22, 'post', 'benzigar.codes liked your post', 1, 1, '2020-03-22 11:07:09'),
(131, 8, 22, 'post', 'benzigar.codes commented \"nice bike tooo\" on your post', 1, 1, '2020-03-22 11:07:14');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image_url` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `image_url`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 7, '5e76e253555ae.jpg', 'dont miss the movie', 1, '2020-03-22 03:58:11', '2020-03-22 03:58:11'),
(2, 7, '5e76e26734cee.jpg', 'Black Widow coming soon..', 1, '2020-03-22 03:58:31', '2020-03-22 03:58:31'),
(3, 1, '5e76e2a2cf9e8.jpg', 'Smile', 1, '2020-03-22 03:59:30', '2020-03-22 03:59:30'),
(4, 4, '5e76e2c514195.jpg', 'Just a look', 1, '2020-03-22 04:00:05', '2020-03-22 04:00:05'),
(5, 6, '5e76e3005ec77.jpg', 'How is my drawing??', 1, '2020-03-22 04:01:04', '2020-03-22 04:01:04'),
(6, 1, '5e76e304c9d5c.jpg', 'Sit and relax :)', 1, '2020-03-22 04:01:09', '2020-03-22 04:01:09'),
(7, 6, '5e76e31913e46.jpg', 'YUMMY :)', 1, '2020-03-22 04:01:29', '2020-03-22 04:01:29'),
(8, 5, '5e76e34a8d307.jpg', 'Spider man doing well in theatres', 1, '2020-03-22 04:02:18', '2020-03-22 04:02:18'),
(9, 3, '5e76e379f2d1d.jpg', 'Blacky design :)', 1, '2020-03-22 04:03:06', '2020-03-22 04:03:06'),
(10, 2, '5e76e3cca5bac.jpg', 'Cowboy Manipulation', 1, '2020-03-22 04:04:28', '2020-03-22 04:04:28'),
(11, 5, '5e76e3edd5aef.jpg', 'Black Widow coming soon,,,', 1, '2020-03-22 04:05:02', '2020-03-22 04:05:02'),
(12, 5, '5e76e42092c11.jpg', 'Iron Man...', 1, '2020-03-22 04:05:52', '2020-03-22 04:05:52'),
(13, 2, '5e76e47a0a0be.jpg', 'JOKER', 1, '2020-03-22 04:07:22', '2020-03-22 04:07:22'),
(14, 1, '5e76e4cd06914.jpg', 'Manipulation.. ,', 1, '2020-03-22 04:08:45', '2020-03-22 04:08:45'),
(15, 7, '5e76e50915aa1.jpg', 'Guess this movie??', 1, '2020-03-22 04:09:45', '2020-03-22 04:09:45'),
(16, 3, '5e76e53b1c9c8.jpg', 'Nice app design', 1, '2020-03-22 04:10:35', '2020-03-22 04:10:35'),
(17, 6, '5e76e56e41b28.jpg', 'Taj Mahal :)', 1, '2020-03-22 04:11:26', '2020-03-22 04:11:26'),
(18, 6, '5e76e66b99fd8.jpg', '', 1, '2020-03-22 04:15:39', '2020-03-22 04:15:39'),
(19, 2, '5e76e6adc6ebd.jpg', 'JUMANJI Style Manipulation', 1, '2020-03-22 04:16:45', '2020-03-22 04:16:45'),
(20, 5, '5e76e70a6a8de.jpg', 'Spidey', 1, '2020-03-22 04:18:18', '2020-03-22 04:18:18'),
(21, 1, '5e76e762509b3.jpg', 'Kill with your look :)', 1, '2020-03-22 04:19:46', '2020-03-22 04:19:46'),
(22, 8, '5e77379d6af86.jpg', 'Just a photo', 1, '2020-03-22 10:02:06', '2020-03-22 10:02:06');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image_url` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `user_id`, `image_url`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '5e772dd771791.jpg', '2.0 style manipulation', 1, '2020-03-22 09:20:23', '2020-03-22 09:20:23'),
(2, 1, '5e772dfb59bd8.jpg', 'pink T-shirt :)', 1, '2020-03-22 09:20:59', '2020-03-22 09:20:59'),
(3, 2, '5e772e7499b09.jpg', 'FIZZ', 1, '2020-03-22 09:23:00', '2020-03-22 09:23:00'),
(4, 4, '5e772f8b45bf4.jpg', 'dont look back', 1, '2020-03-22 09:27:39', '2020-03-22 09:27:39'),
(5, 5, '5e772fd1969f8.jpg', 'shooting spot', 1, '2020-03-22 09:28:49', '2020-03-22 09:28:49'),
(6, 6, '5e773063e259d.jpg', 'just a look', 1, '2020-03-22 09:31:16', '2020-03-22 09:31:16'),
(7, 7, '5e7730f499a39.jpg', 'get ready for this movie...', 1, '2020-03-22 09:33:40', '2020-03-22 09:33:40'),
(8, 7, '5e773114626ef.jpg', 'black widow coming soon', 1, '2020-03-22 09:34:12', '2020-03-22 09:34:12'),
(9, 8, '5e7745ef5e553.jpg', 'just added a status', 1, '2020-03-22 11:03:11', '2020-03-22 11:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `status_seen`
--

CREATE TABLE `status_seen` (
  `status_seen_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_seen`
--

INSERT INTO `status_seen` (`status_seen_id`, `user_id`, `status_id`, `created_at`) VALUES
(1, 2, 1, '2020-03-22 09:23:08'),
(2, 2, 2, '2020-03-22 09:23:10'),
(3, 3, 1, '2020-03-22 09:25:38'),
(4, 3, 2, '2020-03-22 09:25:40'),
(5, 3, 3, '2020-03-22 09:25:42'),
(6, 4, 3, '2020-03-22 09:27:05'),
(7, 4, 1, '2020-03-22 09:27:08'),
(8, 4, 2, '2020-03-22 09:27:13'),
(9, 5, 1, '2020-03-22 09:28:26'),
(10, 5, 2, '2020-03-22 09:28:27'),
(11, 6, 5, '2020-03-22 09:29:24'),
(12, 6, 1, '2020-03-22 09:29:28'),
(13, 6, 2, '2020-03-22 09:29:29'),
(14, 7, 5, '2020-03-22 09:33:47'),
(18, 8, 7, '2020-03-22 11:02:49'),
(19, 8, 8, '2020-03-22 11:02:50'),
(20, 8, 5, '2020-03-22 11:02:53'),
(21, 8, 4, '2020-03-22 11:02:56'),
(22, 8, 1, '2020-03-22 11:02:58'),
(23, 8, 2, '2020-03-22 11:02:59'),
(24, 6, 9, '2020-03-22 11:04:46'),
(25, 8, 6, '2020-03-22 11:05:27'),
(26, 1, 9, '2020-03-22 11:07:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(40) NOT NULL,
  `bio` varchar(200) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `profile_pic` varchar(40) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `privacy` varchar(10) NOT NULL DEFAULT 'public',
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `bio`, `name`, `phone`, `profile_pic`, `gender`, `privacy`, `status`, `created_at`, `updated_at`) VALUES
(1, 'benzigar.codes', '123456', 'benzigar619@gmail.com', 'I am a web developer, designer and musician								', 'Benzigar Codes', '9791442121', '5e76ccb863fc8.jpg', 'm', 'public', 1, '2020-03-22 02:26:00', '2020-03-22 02:26:00'),
(2, 'sony_jackson', '123456', 'sony@gmail.com', 'I am a photoshop editor, :)								', 'Sony Jackson', '9876543212', '5e76cced1e9e2.jpg', 'm', 'public', 1, '2020-03-22 02:26:53', '2020-03-22 02:26:53'),
(3, 'ui_inspiration', '123456', 'ui@gmail.com', 'This page shows the best ui design out there								', 'UI / UX Inspiration', '9876543212', '5e76cd82aaf89.jpg', 'm', 'public', 1, '2020-03-22 02:29:22', '2020-03-22 02:29:22'),
(4, 'jebin', '123456', 'jebin@gmail.com', 'I am jebin								', 'Jebin', '9876543212', '5e76cdcc112b6.jpg', 'm', 'public', 1, '2020-03-22 02:30:36', '2020-03-22 02:30:36'),
(5, 'marvel', '123456', 'marvel@gmail.com', 'This is the official page of Marvel								', 'Marvel Studios', '9876543212', '5e76ce0b557dd.jpg', 'm', 'public', 1, '2020-03-22 02:31:39', '2020-03-22 02:31:39'),
(6, 'vicky', '123456', 'vicky@gmail.com', 'Iam 😎an 🇮🇳Indo-Bahraini🇧🇭\r\n💖Loves Exploring NATURE 🍃\r\n😍Passionate for DRAWING 💓\r\n📋NOTEBOOK + 📝PENCIL + 📱SMARTPHONE\r\n+ 🎧 HEADPHONE + 🍃NATURE		', 'Vicky', '9876543212', '5e76dd94c3d4b.jpg', 'm', 'private', 1, '2020-03-22 03:37:56', '2020-03-22 03:37:56'),
(7, 'disney', '123456', 'disney@gmail.com', 'This is official disney page								', 'Disney', '9876543212', '5e76df3e84377.jpg', 'm', 'public', 1, '2020-03-22 03:45:02', '2020-03-22 03:45:02'),
(8, 'ligen_raj', '123456', 'ligen@gmail.com', 'Hi there, I am Ligen								', 'Ligen Raj', '9876543212', '5e77468cba1c5.jpg', 'm', 'public', 1, '2020-03-22 09:59:33', '2020-03-22 11:05:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comments_ibfk_1` (`user_id`),
  ADD KEY `comments_ibfk_2` (`post_id`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`follower_id`),
  ADD KEY `ufk` (`user_id`),
  ADD KEY `ffk` (`follows_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `users_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `from_user_id` (`from_user_id`),
  ADD KEY `to_user_id` (`to_user_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `fk` (`user_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `status_seen`
--
ALTER TABLE `status_seen`
  ADD PRIMARY KEY (`status_seen_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `follower_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `status_seen`
--
ALTER TABLE `status_seen`
  MODIFY `status_seen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `followers`
--
ALTER TABLE `followers`
  ADD CONSTRAINT `ffk` FOREIGN KEY (`follows_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ufk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`from_user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`to_user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `status_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `status_seen`
--
ALTER TABLE `status_seen`
  ADD CONSTRAINT `status_seen_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `status_seen_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
