-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2024 at 05:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hicutfile`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` text NOT NULL,
  `password_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `email`, `password`, `password_text`) VALUES
(1, 'Hicut', 'admin@Hicut.com', '827ccb0eea8a706c4c34a16891f84e7b', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `block_list`
--

CREATE TABLE `block_list` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `blocked_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `comment`, `created_at`) VALUES
(75, 21, 20, 'look good', '2024-03-28 06:00:05'),
(76, 25, 18, 'asd', '2024-03-28 06:31:22'),
(77, 26, 19, 'asd', '2024-04-12 09:51:42'),
(78, 23, 19, 'asd', '2024-04-12 10:01:58'),
(79, 23, 19, 'asd', '2024-04-12 10:07:21'),
(80, 23, 19, 'hahaha', '2024-04-12 10:08:03'),
(81, 23, 19, 'asdasdasd', '2024-04-12 10:08:17'),
(82, 23, 19, 'ddddd', '2024-04-12 10:10:17'),
(83, 23, 19, 'asd', '2024-04-12 10:10:38'),
(84, 22, 19, 'dddd', '2024-04-12 10:30:44'),
(85, 24, 30, 'af', '2024-05-23 06:14:40'),
(86, 23, 30, 'sdg', '2024-05-23 06:17:29'),
(87, 23, 30, 'dzta', '2024-05-23 06:20:55'),
(88, 29, 30, 'hi', '2024-05-23 06:21:28'),
(89, 29, 32, 'xv', '2024-05-23 06:28:15');

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE `conversation` (
  `conversation_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `messages` text NOT NULL,
  `conversation_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `conversation`
--

INSERT INTO `conversation` (`conversation_id`, `sender_id`, `receiver_id`, `messages`, `conversation_time`) VALUES
(28, 19, 18, 'asdddd', '2024-05-22 16:48:33'),
(29, 18, 22, 'asd', '2024-05-22 16:48:33'),
(30, 18, 19, 'Autism spectrum disorder (ASD) is a developmental disability caused by differences in the brain. People with ASD often have problems with social communication and interaction, and restricted or repetitive behaviors or interests. People with ASD may also have different ways of learning, moving, or paying attention.', '2024-05-22 16:48:33'),
(31, 18, 22, 'asds', '2024-05-22 16:48:33'),
(32, 18, 22, 'asd', '2024-05-22 16:48:33'),
(33, 18, 19, 'asd', '2024-05-22 16:48:33'),
(34, 18, 19, 'asd', '2024-05-22 16:48:33'),
(35, 18, 22, 'asd', '2024-05-22 16:48:33'),
(36, 18, 19, 'asd', '2024-05-22 16:48:33'),
(37, 18, 0, 'asd', '2024-05-22 16:48:33'),
(38, 18, 22, 'sdf', '2024-05-22 16:48:33'),
(39, 18, 22, 'asd', '2024-05-22 16:48:33'),
(40, 18, 19, 'asd', '2024-05-22 16:48:33'),
(41, 18, 22, 'asd', '2024-05-22 16:48:33'),
(42, 18, 22, 'asdddd', '2024-05-22 16:48:33'),
(43, 18, 22, 'asdasdasd', '2024-05-22 16:48:33'),
(44, 18, 22, 'bobo mo', '2024-05-22 16:48:33'),
(45, 18, 22, 'asd', '2024-05-22 16:48:33'),
(46, 18, 22, 'asd', '2024-05-22 16:48:33'),
(47, 18, 19, 'boi', '2024-05-22 16:48:33'),
(48, 19, 18, 'bakit boit?', '2024-05-22 16:48:33'),
(49, 19, 18, 'ano gawa mo boi?', '2024-05-22 16:48:33'),
(50, 18, 19, 'wala boi', '2024-05-22 16:48:33'),
(51, 19, 18, 'asd', '2024-05-22 16:48:33'),
(52, 19, 18, 'asd', '2024-05-22 16:48:33'),
(53, 19, 18, 'asd', '2024-05-22 16:48:33'),
(54, 18, 18, 'asd', '2024-05-22 16:48:33'),
(55, 18, 18, 'asd', '2024-05-22 16:48:33'),
(56, 19, 18, 'hey I like ur post', '2024-05-22 16:48:33'),
(57, 18, 19, 'Thank you so much', '2024-05-22 16:48:33'),
(58, 18, 18, 'asd', '2024-05-22 16:48:33'),
(59, 18, 19, 'asdsa', '2024-05-22 17:01:16'),
(60, 18, 19, 'ghg', '2024-05-22 17:01:19'),
(61, 18, 19, 'asdasdasd', '2024-05-22 17:03:49'),
(62, 18, 19, 'kkkkkkkkkkkkkkkkkkkk', '2024-05-22 17:03:52'),
(63, 30, 30, 'hii', '2024-05-23 14:15:09'),
(64, 34, 32, 'hii', '2024-05-24 15:10:31'),
(65, 34, 32, 'hello', '2024-05-24 16:10:19'),
(66, 34, 30, 'hi', '2024-06-05 10:04:33');

-- --------------------------------------------------------

--
-- Table structure for table `conversation_list`
--

CREATE TABLE `conversation_list` (
  `id` int(11) NOT NULL,
  `messages` text NOT NULL,
  `conversation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `follow_list`
--

CREATE TABLE `follow_list` (
  `id` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `follow_list`
--

INSERT INTO `follow_list` (`id`, `follower_id`, `user_id`) VALUES
(78, 13, 14);

-- --------------------------------------------------------

--
-- Table structure for table `freelance_post`
--

CREATE TABLE `freelance_post` (
  `freelance_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `caption` text NOT NULL,
  `categories` text NOT NULL,
  `time_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `freelance_post`
--

INSERT INTO `freelance_post` (`freelance_id`, `user_id`, `caption`, `categories`, `time_post`) VALUES
(21, 18, 'This my video and images creation', 'Photography', '2024-05-22 16:39:12'),
(22, 18, 'My new video and images work', 'Photography', '2024-05-22 16:39:12'),
(23, 18, 'asdas', 'Video Editor', '2024-05-22 16:39:12'),
(24, 30, 'asd', 'Logo Designer', '2024-05-22 16:39:12'),
(29, 30, 'example', 'Photography', '2024-05-23 14:21:22'),
(30, 32, 'vid', 'Videography', '2024-05-23 14:30:22'),
(32, 38, 'this is my sample shot', 'Photography', '2024-06-05 19:43:46'),
(33, 39, 'My shot', 'Photography', '2024-06-05 19:55:24'),
(34, 40, 'Hi, I am graphic designer ', 'Graphic Designer', '2024-06-05 20:12:21'),
(37, 42, 'My sample editing video picture', 'Video Editor', '2024-06-05 20:44:30'),
(39, 43, 'Im film maker hi', 'Film maker', '2024-06-05 20:53:59');

-- --------------------------------------------------------

--
-- Table structure for table `images_list`
--

CREATE TABLE `images_list` (
  `images_id` int(11) NOT NULL,
  `freelance_id` int(11) NOT NULL,
  `freelance_images` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images_list`
--

INSERT INTO `images_list` (`images_id`, `freelance_id`, `freelance_images`) VALUES
(121, 21, 'upload/66050e4d0b470_65e9429b5a467_img4.png'),
(122, 22, 'upload/66050e4d0c0f9_65e9429b59dd3_img3.png'),
(123, 23, 'upload/66050e4d0cb5b_65e9429b588b4_img1.png'),
(124, 24, 'upload/66050e4d0d385_65e9429b59316_img2.png'),
(132, 26, 'upload/66050f5ababdb_65e98dca87bd7_slide.png'),
(133, 26, 'upload/66050f5abb54f_65e98dca860fe_sample.jpg'),
(134, 26, 'upload/66050f5abbf8e_65e941f5aad53_img3.png'),
(135, 26, 'upload/66050f5abcae2_65e9429b59316_img2.png'),
(136, 26, 'upload/66050f5abd401_65e9415717b99_home-bg.png'),
(137, 26, 'upload/66050f5abdc0f_66050e362a1f3_66050d4fac349_Countdown 5 seconds timer.mp4'),
(138, 26, 'upload/66050f5abb54f_65e98dca860fe_sample.jpg'),
(139, 24, 'upload/66050e4d0d385_65e9429b59316_img2.png'),
(140, 24, 'upload/66050e4d0d385_65e9429b59316_img2.png'),
(141, 29, 'upload/664ee0629dc37_photot.png'),
(142, 30, 'upload/664ee27eef0e1_20770858-hd_1080_1920_30fps.mp4'),
(144, 32, 'upload/66604f720b307_mew.jpg'),
(145, 33, 'upload/6660522ca3a70_xx.jpg'),
(146, 34, 'upload/666056255076c_sss.png'),
(149, 37, 'upload/66605dae7c0cd_vide.jpeg'),
(151, 39, 'upload/66605fe7c4465_download.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `user_id`) VALUES
(145, 26, 22),
(146, 24, 22),
(153, 22, 19),
(154, 22, 18),
(155, 23, 19),
(158, 21, 19),
(159, 29, 30);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `read_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `from_user_id`, `to_user_id`, `msg`, `read_status`, `created_at`) VALUES
(43, 13, 14, 'hiii', 1, '2023-11-01 11:28:27');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `from_user_id` int(11) NOT NULL,
  `read_status` text NOT NULL DEFAULT 'unread',
  `type` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `to_user_id`, `message`, `created_at`, `from_user_id`, `read_status`, `type`) VALUES
(109, 18, 'commented on your post user: 19', '2024-04-12 10:10:38', 19, 'read', NULL),
(110, 18, 'commented on your post user: 19', '2024-04-12 10:30:44', 19, 'read', NULL),
(111, 18, 'Someone heart your post!', '2024-04-12 10:33:23', 19, 'read', NULL),
(112, 18, 'You have a new message!', '2024-04-12 10:34:56', 19, 'read', 'conversation'),
(113, 18, 'You have a new message!', '2024-04-12 11:16:21', 18, 'read', 'conversation'),
(114, 18, 'You have a new message!', '2024-04-12 11:16:26', 18, 'read', 'conversation'),
(115, 18, 'Someone heart your post!', '2024-04-12 11:32:19', 19, 'read', NULL),
(116, 18, 'Someone heart your post!', '2024-04-12 11:33:23', 19, 'read', NULL),
(117, 18, 'You have a new message!', '2024-04-12 11:33:44', 19, 'read', 'conversation'),
(118, 19, 'You have a new message!', '2024-04-12 11:33:59', 18, 'read', 'conversation'),
(119, 18, 'You have a new message!', '2024-04-12 11:40:22', 18, 'read', 'conversation'),
(120, 19, 'You have a new message!', '2024-05-22 09:01:16', 18, 'unread', 'conversation'),
(121, 19, 'You have a new message!', '2024-05-22 09:01:19', 18, 'unread', 'conversation'),
(122, 19, 'You have a new message!', '2024-05-22 09:03:49', 18, 'unread', 'conversation'),
(123, 19, 'You have a new message!', '2024-05-22 09:03:52', 18, 'unread', 'conversation'),
(124, 30, 'commented on your post user: 30', '2024-05-23 06:14:40', 30, 'read', NULL),
(125, 30, 'You have a new message!', '2024-05-23 06:15:09', 30, 'read', 'conversation'),
(126, 18, 'commented on your post user: 30', '2024-05-23 06:17:29', 30, 'unread', NULL),
(127, 18, 'commented on your post user: 30', '2024-05-23 06:20:55', 30, 'unread', NULL),
(128, 30, 'commented on your post user: 30', '2024-05-23 06:21:28', 30, 'read', NULL),
(129, 30, 'Someone heart your post!', '2024-05-23 06:21:33', 30, 'read', NULL),
(130, 30, 'commented on your post user: 32', '2024-05-23 06:28:15', 32, 'unread', NULL),
(131, 32, 'You have a new message!', '2024-05-24 07:10:31', 34, 'unread', 'conversation'),
(132, 32, 'You have a new message!', '2024-05-24 08:10:19', 34, 'unread', 'conversation'),
(133, 30, 'You have a new message!', '2024-06-05 02:04:33', 34, 'unread', 'conversation'),
(134, 43, 'Someone heart your post!', '2024-06-08 13:02:50', 37, 'unread', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_img` text NOT NULL,
  `post_text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `post_img`, `post_text`, `created_at`) VALUES
(15, 14, '1698837740picturee.png', 'hi', '2023-11-01 11:22:20');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `rated_user` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `who_rated` int(11) NOT NULL,
  `descriptions` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `rated_user`, `rating`, `who_rated`, `descriptions`) VALUES
(20, 18, 5, 22, ''),
(21, 18, 3, 22, ''),
(22, 22, 4, 22, ''),
(23, 18, 5, 18, ''),
(24, 18, 1, 18, ''),
(25, 22, 5, 18, ''),
(26, 17, 5, 19, ''),
(27, 17, 1, 18, ''),
(28, 17, 1, 19, ''),
(29, 18, 5, 19, ''),
(44, 30, 5, 18, 'malakas'),
(45, 18, 4, 30, 'sdg'),
(46, 18, 4, 30, 'sdg'),
(47, 30, 4, 30, 'goood'),
(48, 32, 4, 34, 'examopeaa'),
(49, 18, 5, 34, ''),
(50, 18, 5, 34, 'nice\r\n'),
(51, 18, 5, 34, 'nice\r\n'),
(52, 34, 5, 34, 'nice'),
(53, 32, 5, 34, 'nice\r\n'),
(54, 34, 3, 34, ''),
(55, 36, 4, 36, 'asd'),
(56, 38, 5, 38, ''),
(57, 40, 5, 40, ''),
(58, 41, 5, 41, ''),
(59, 42, 5, 42, ''),
(60, 43, 5, 43, ''),
(61, 40, 5, 37, 'nc');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `profile_pic` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ac_status` int(11) NOT NULL COMMENT '0=not verified,1=active,2=blocked',
  `user_role` text NOT NULL,
  `profession` text NOT NULL,
  `location` text NOT NULL,
  `started_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `gender`, `email`, `username`, `password`, `profile_pic`, `created_at`, `updated_at`, `ac_status`, `user_role`, `profession`, `location`, `started_date`) VALUES
(13, 'just', 'serus', 2, 'justineako27@gmail.com', 'yasuo', '537994d24b72f4e0302beb914d9c957d', '1699888653319148189_829781691413143_8744073339891804398_n.jpg', '2023-10-30 08:28:03', '2023-11-13 15:17:33', 1, '', '', '', NULL),
(14, 'pogi', 'just', 1, 'pogijust9@gmail.com', 'pogi', '827ccb0eea8a706c4c34a16891f84e7b', '1699090285picturee.png', '2023-10-30 08:42:34', '2023-11-04 09:31:25', 1, '', '', '', NULL),
(15, 'hu', 'aa', 1, 'yasjas@gmail.com', 'yasjas@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'default_profile.jpg', '2023-11-04 10:10:22', '2023-11-04 10:10:22', 0, '', '', '', NULL),
(16, 'just', 'ros', 1, 'justinerosel28@gmail.com', 'justine', '827ccb0eea8a706c4c34a16891f84e7b', 'default_profile.jpg', '2023-11-14 09:25:01', '2023-11-14 09:25:29', 1, '', '', '', NULL),
(18, 'jay', 'vee', 1, 'jayvee@gmail.com', 'jayvee123', '9890f4e423f1fa56e6eaf13e95bcd590', 's8.png', '2024-03-07 03:37:02', '2024-05-22 08:28:15', 0, 'Freelancer', 'videographer', 'caloocan', NULL),
(37, 'Justine', 'Rosel', 1, 'Justinrosel@gmail.com', 'kaynn', '25d55ad283aa400af464c76d713c07ad', NULL, '2024-06-05 03:09:28', '2024-06-05 03:09:28', 0, 'Freelancer', 'Logo Designer', 'manila', '0000-00-00'),
(38, 'Hanna', 'Ann', 1, 'example1@gmail.com', 'Hannamae', '25d55ad283aa400af464c76d713c07ad', NULL, '2024-06-05 11:24:22', '2024-06-05 11:24:22', 0, 'Freelancer', 'Photography', 'Manila', '0000-00-00'),
(39, 'Ross', 'cruz', 1, 'example3@gmail.com', 'Ross', '25d55ad283aa400af464c76d713c07ad', NULL, '2024-06-05 11:52:41', '2024-06-05 11:52:41', 0, 'Freelancer', 'Photography', 'Bulacan', '0000-00-00'),
(40, 'Eren', 'ching', 1, 'example4@gmail.com', 'Erenn', '25d55ad283aa400af464c76d713c07ad', NULL, '2024-06-05 12:11:18', '2024-06-05 12:11:18', 0, 'Freelancer', 'Graphic Designer', 'Bulacan', '0000-00-00'),
(42, 'Jhamaine', 'solace', 1, 'example6@gmail.com', 'Jham', '25d55ad283aa400af464c76d713c07ad', NULL, '2024-06-05 12:43:09', '2024-06-05 12:43:09', 0, 'Freelancer', 'Video Editor', 'Bulacan', '0000-00-00'),
(43, 'Red', 'Conception', 1, 'example7@gmail.com', 'reddis', '25d55ad283aa400af464c76d713c07ad', NULL, '2024-06-05 12:50:28', '2024-06-05 12:50:28', 0, 'Freelancer', 'Film maker', 'Marilao', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `block_list`
--
ALTER TABLE `block_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`conversation_id`);

--
-- Indexes for table `conversation_list`
--
ALTER TABLE `conversation_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follow_list`
--
ALTER TABLE `follow_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freelance_post`
--
ALTER TABLE `freelance_post`
  ADD PRIMARY KEY (`freelance_id`);

--
-- Indexes for table `images_list`
--
ALTER TABLE `images_list`
  ADD PRIMARY KEY (`images_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `block_list`
--
ALTER TABLE `block_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `conversation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `conversation_list`
--
ALTER TABLE `conversation_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `follow_list`
--
ALTER TABLE `follow_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `freelance_post`
--
ALTER TABLE `freelance_post`
  MODIFY `freelance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `images_list`
--
ALTER TABLE `images_list`
  MODIFY `images_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
