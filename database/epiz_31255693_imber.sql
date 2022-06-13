-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql102.byetcluster.com
-- Generation Time: Mar 13, 2022 at 02:19 PM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_31255693_imber`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(255) CHARACTER SET utf8 NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `user_id`, `content`, `time`) VALUES
(113, 108, 120, 'prvi komentar', '2022-03-12 20:13:14'),
(114, 108, 125, 'Dobra slika', '2022-03-13 06:51:09'),
(120, 115, 81, 'tu smoo kolezaa', '2022-03-13 14:18:24');

-- --------------------------------------------------------

--
-- Table structure for table `followings`
--

CREATE TABLE `followings` (
  `follow_id` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL,
  `followed_id` int(11) NOT NULL,
  `datetime` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `followings`
--

INSERT INTO `followings` (`follow_id`, `follower_id`, `followed_id`, `datetime`) VALUES
(54283, 120, 81, '2022-03-12 20:10:44'),
(54284, 81, 120, '2022-03-12 20:14:39'),
(54285, 121, 81, '2022-03-12 20:24:24'),
(54286, 121, 120, '2022-03-12 20:24:26'),
(54287, 122, 81, '2022-03-12 20:25:21'),
(54288, 122, 121, '2022-03-12 20:25:22'),
(54289, 122, 120, '2022-03-12 20:25:23'),
(54290, 120, 121, '2022-03-12 20:28:56'),
(54291, 120, 122, '2022-03-12 20:28:57'),
(54293, 81, 122, '2022-03-12 20:34:53'),
(54294, 81, 121, '2022-03-12 21:56:03'),
(54295, 125, 81, '2022-03-13 06:41:38'),
(54296, 125, 123, '2022-03-13 06:41:43'),
(54297, 81, 123, '2022-03-13 09:03:23'),
(54298, 81, 125, '2022-03-13 09:03:27'),
(54299, 81, 127, '2022-03-13 09:03:28');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`like_id`, `post_id`, `user_id`) VALUES
(81, 108, 120),
(82, 109, 122),
(83, 108, 122),
(84, 108, 125),
(85, 111, 81),
(86, 115, 127),
(87, 115, 81);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `content` longtext COLLATE utf8_bin NOT NULL,
  `datetime` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `sender_id`, `receiver_id`, `content`, `datetime`) VALUES
(170, 81, 120, 'BwyxKh6fYwtxg1yqz6KvFF4BrkAKgxvgd9N+vWe48KdNU5AvtlWF/aYrTwAK1J2lsunKRg0l3ZDO9OrK4GzaEw==', '2022-03-12 20:17:55'),
(171, 120, 81, 'cekTZfgd2prQR1Csza00Uwm35xNvNhQVy0QP3PDemvXKFCDo9mFu4QFdAUmgpIQ908oSWNiDWcTG/thptBCnwQ==', '2022-03-12 20:19:44'),
(172, 120, 81, 'aVDUomAlZigf4LacB46PdirYpVOSYhnthcGaTnBTHdnpcSAm5UY1CteAcIj7JiUvIlVAvj91qaH+/9OkbpELIA==', '2022-03-12 20:19:51'),
(173, 81, 121, 'o2ff50k0eJcV6OBeP9a3+dvXITVPaLFLdTZhpZP2tMLOTubMaf1JkH1vbqoAGigIQGZJu5w43UG1APydylVP8Q==', '2022-03-12 21:55:26'),
(174, 81, 125, 'GPCHJYG7KmzCJovaH2aVhuUAfoMfYMko1BHdfd638Fa8W+NTLa0s4vFGRD9pdbL9YL6FPj6I9zbCQkVP7qHaxQ==', '2022-03-13 09:03:51'),
(175, 81, 125, 'S++hMR5gNCt65o8yiFxRSDtA2GFh6bd6M+uqBJAfDK8DaLJ9T5rCkTUjoIobwiqnQ/GT9dosWEAjZ1XSvOj25nJIoL0Cg+ZtR/J4+AxpFuA=', '2022-03-13 09:03:58');

-- --------------------------------------------------------

--
-- Table structure for table `navlinks`
--

CREATE TABLE `navlinks` (
  `navlink_id` int(11) NOT NULL,
  `name` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `route` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `icon` varchar(45) CHARACTER SET utf8 NOT NULL DEFAULT 'icon1.png',
  `alttag` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `navlinks`
--

INSERT INTO `navlinks` (`navlink_id`, `name`, `route`, `icon`, `alttag`) VALUES
(1, 'Home', 'home.index', 'icon1.png', 'home'),
(21, 'Messages', 'messages', 'icon6.png', 'messages'),
(31, 'Find People', 'profiles.index', 'icon4.png', 'profiles'),
(45, 'Author', 'about', 'icon5.png', 'about');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text CHARACTER SET utf8 DEFAULT NULL,
  `image` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `pin` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `content`, `image`, `created`, `pin`) VALUES
(108, 81, 'Prvi post', '622d3deb82165_1647132139.jpg', '2022-03-12 19:36:51', 0),
(109, 120, '#Iceland', '622d47dbb90ba_1647134683.jpg', '2022-03-12 20:19:15', 0),
(111, 125, 'Chicago skyline', '622dcd54246d4_1647168852.jpg', '2022-03-13 06:48:41', 0),
(115, 127, 'gde ste drustvo', NULL, '2022-03-13 13:24:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'user'),
(2, 'admin'),
(8, 'Nova uloga');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(45) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(45) COLLATE utf8_bin NOT NULL,
  `bio` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8_bin NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `mobile_number` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `work` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `born` datetime DEFAULT NULL,
  `from` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `profile_pic` varchar(50) COLLATE utf8_bin DEFAULT 'default.jpg',
  `background` varchar(45) COLLATE utf8_bin DEFAULT 'cover.jpg',
  `role_id` int(10) DEFAULT 1,
  `active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `bio`, `gender`, `created`, `mobile_number`, `work`, `born`, `from`, `profile_pic`, `background`, `role_id`, `active`) VALUES
(81, 'NikolaGutic', '9c97e6edf783a468d583d709f02f96ca', 'nikola.gutic@gmail.com', NULL, 'male', '2022-02-19 17:30:17', '067812624', NULL, '2000-01-20 00:00:00', 'Rethymno', '622d3a81cf865_1647131265.jpg', '622e1d5f4995a_1647189343.jpg', 2, 0),
(120, 'Ana', '566b1ec748bc237b8c55277ffd35a956', 'neda@gmail.com', 'hmm', 'Female', '2022-03-12 20:09:16', 'no', 'Student', NULL, 'Belgrade', '622d45c6070fd_1647134150.jpg', '622d45d17b08e_1647134161.jpg', 1, 0),
(121, 'Admin Two', '2637a5c30af69a7bad877fdb65fbd78b', 'admin@admin.rs', NULL, 'Other', '2022-03-12 20:23:20', NULL, NULL, NULL, NULL, 'default.jpg', 'cover.jpg', 2, 0),
(122, 'User', '8ccb29db1ea08e210d6d54002ada3c23', 'user@user.rs', NULL, 'Other', '2022-03-12 20:25:06', NULL, NULL, NULL, NULL, 'default.jpg', 'cover.jpg', 1, 0),
(123, 'Milun Nedovic', '61fbe35744694691afd0fd41f5eafcd3', 'mnedovic07@gmail.com', NULL, 'Male', '2022-03-13 04:36:01', NULL, NULL, NULL, NULL, 'default.jpg', 'cover.jpg', 1, 0),
(125, 'Edo', 'aa0cb93d7973ad0a354206cd4c1a9eb7', 'gamer.asd.00@gmail.com', NULL, 'Male', '2022-03-13 06:40:38', NULL, NULL, NULL, NULL, '622dcd17dfcd1_1647168791.webp', 'cover.jpg', 1, 0),
(127, 'Damjan Stojanovic', '3ddcafb812181cb5e98d718018208552', 'damjansto@gmail.com', NULL, 'Male', '2022-03-13 08:04:46', NULL, NULL, NULL, NULL, 'default.jpg', 'cover.jpg', 1, 0),
(129, 'Ime Prezime', '23a76bff0a962850c64ec5c38a2b0a5b', 'pera@gmail.com', NULL, 'Male', '2022-03-13 13:45:26', NULL, NULL, NULL, NULL, 'default.jpg', 'cover.jpg', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `post_id_idx` (`post_id`),
  ADD KEY `post_id_idx1` (`post_id`),
  ADD KEY `index2` (`post_id`),
  ADD KEY `index3` (`user_id`);

--
-- Indexes for table `followings`
--
ALTER TABLE `followings`
  ADD PRIMARY KEY (`follow_id`),
  ADD KEY `follower_user_idx` (`follower_id`),
  ADD KEY `fallowed_user_idx` (`followed_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `like_post_idx` (`post_id`),
  ADD KEY `like_user_idx` (`user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `sender_idx` (`sender_id`),
  ADD KEY `receiver_idx` (`receiver_id`);

--
-- Indexes for table `navlinks`
--
ALTER TABLE `navlinks`
  ADD PRIMARY KEY (`navlink_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_user_idx` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `followings`
--
ALTER TABLE `followings`
  MODIFY `follow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54300;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `navlinks`
--
ALTER TABLE `navlinks`
  MODIFY `navlink_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comment_post` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `followings`
--
ALTER TABLE `followings`
  ADD CONSTRAINT `fallowed_user` FOREIGN KEY (`followed_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `follower_user` FOREIGN KEY (`follower_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `like_post` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `like_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `receiver` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sender` FOREIGN KEY (`sender_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `user_post` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
