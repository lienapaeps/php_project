-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 29, 2022 at 07:27 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` datetime NOT NULL,
  `warned` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `following`
--

CREATE TABLE `following` (
  `id` int(11) NOT NULL,
  `user_follower` int(11) NOT NULL,
  `user_following` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_request`
--

CREATE TABLE `password_reset_request` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_requested` datetime NOT NULL,
  `token` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `password_reset_request`
--

INSERT INTO `password_reset_request` (`id`, `user_id`, `date_requested`, `token`) VALUES
(1, 2, '2022-04-05 13:32:01', '26f80839666efe770c2fd157d57f89a9'),
(2, 2, '2022-04-05 14:07:01', '558f8858a92c1cdc30b62016887de472'),
(3, 2, '2022-04-05 14:07:26', '49bc1049663119f35cc71d37a11c8577'),
(4, 2, '2022-04-05 14:12:19', '7228412054f92fb9db99ab675505a6b2'),
(5, 2, '2022-04-05 14:19:32', '2555910018adf7f0c397f70535a26618'),
(6, 2, '2022-04-05 14:21:30', '3d6b546b70ad37f796c29ab76c2ae53d'),
(7, 2, '2022-04-05 14:53:52', '42ee9dba162509120415350359e24165'),
(8, 2, '2022-04-05 14:57:38', '0d40e576f9d24806eafd4658281efb99'),
(9, 2, '2022-04-05 16:21:53', 'd1e1d913727236da64195487b49c5683'),
(10, 2, '2022-04-05 16:24:29', 'bfed329d7ee695e7ba06ccd91dd23161'),
(11, 2, '2022-04-06 11:12:53', '73398b455792d18a1dc7cc5f1aa4e34f'),
(12, 2, '2022-04-08 10:03:59', '1b969a3b5f4fdff4fb731ca5cfba30c6'),
(13, 2, '2022-04-08 10:08:47', '4850a9611a1b9f24bc459b83e2fd910d'),
(14, 2, '2022-04-08 14:00:03', 'e304bfe7efb04a7ac4f38089965b79c4'),
(15, 2, '2022-04-08 14:10:39', '6a8b0602dedd07b57baac983f5b7bef1'),
(16, 2, '2022-04-08 14:17:06', '65d93274ce38cee1fc7a1f82890385fe'),
(17, 2, '2022-04-08 14:20:42', 'e188247610a60fc9a6955fd30ff00333'),
(18, 2, '2022-04-08 14:24:54', '1594c64d7e5c3bfcb41ba2ebd4164921'),
(19, 2, '2022-04-08 14:27:18', '8b84528ed72931d5128ff134197a2b1f'),
(20, 2, '2022-04-08 14:29:54', '818e54f0f6b9acbfcd9fa89328084b64'),
(21, 2, '2022-04-08 14:30:46', '208a14a3ea5d413fa14716a556fac7ea'),
(22, 2, '2022-04-08 17:13:51', 'c439cf2f556ca8dffcedc30e35337a8d'),
(23, 2, '2022-04-08 17:34:15', '04b61b003dababc5994c38aa075fdc28'),
(24, 2, '2022-04-08 17:36:16', '9a7b818edf6eb086e91cbd356522b69a'),
(25, 2, '2022-04-08 17:37:00', '3333b5cc456cc29255afe29dfbc02162'),
(26, 2, '2022-04-08 17:38:46', '5c2d09c5b26e28b626c83bfb07f59912'),
(27, 2, '2022-04-08 17:53:09', '9928657a1dcae774e846a03fcd0b788c'),
(28, 2, '2022-04-08 18:04:51', '36fdbc8cf74bb85be2de49047b29f03f'),
(29, 2, '2022-04-08 18:07:55', '514daad57ea36aeba25a3dbefa647273'),
(30, 2, '2022-04-08 18:09:27', 'a745b9b0e36a792fab9eed06afc85ac7'),
(31, 1, '2022-04-08 18:10:14', '90eaaad218a6f9198e91d52510e72dd5'),
(32, 2, '2022-04-08 18:10:29', '93ac6d1cd92bd1c23600fdf325c358fd'),
(33, 2, '2022-04-08 18:11:48', '1670bca74ff45c38416616b13ad61de7'),
(34, 2, '2022-04-08 18:12:03', '4253e50b3ad103b5eee8130565d919fa'),
(35, 4, '2022-04-08 18:12:21', '00ac22c0485b4d02a2453c43fd6701f9'),
(36, 4, '2022-04-11 08:21:49', 'ccd3a4339769ed7c225e12560c9b653e'),
(37, 4, '2022-04-11 08:32:32', 'd9604db4792a933299a4d161bd00495e'),
(38, 4, '2022-04-11 08:33:02', '03c26ab2d3b635c5c4b99ad7777bfb78'),
(39, 4, '2022-04-11 08:33:48', 'ab6bb8916c678e5366e5520b18de1497'),
(40, 4, '2022-04-11 09:08:49', '165cb20aff683971df396f3124ef95e7'),
(41, 4, '2022-04-11 09:09:03', '37f751df74e89c90b1e0ab3b7997bbcd'),
(42, 1, '2022-04-11 10:05:39', '792fff37653692ecd0e6703ddc0f05db');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `cover_img` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warned` tinyint(1) DEFAULT NULL,
  `showcase` tinyint(1) DEFAULT NULL,
  `amount_views` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `time`, `cover_img`, `warned`, `showcase`, `amount_views`, `user_id`) VALUES
(7, 'test 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vel ex vitae est finibus tristique in at mauris. Praesent pharetra finibus nibh id volutpat. Fusce tincidunt nec lectus et cursus. Nam nec malesuada urna. Morbi hendrerit eros arcu, eget imperdiet diam imperdiet sed. Integer finibus sapien eu suscipit scelerisque. Curabitur fringilla turpis sit amet urna lacinia, eu condimentum arcu aliquet. Curabitur at tellus at eros sagittis placerat nec quis tellus. In laoreet dui at ullamcorper pellentesque. Donec cursus lacinia ex in mollis. Aliquam non ligula quis metus malesuada ultrices. Nullam ut felis eget elit lacinia ultrices.', '2022-04-27 09:04:40', '62690728195bb9.77187818.jpg', NULL, NULL, NULL, 1),
(8, 'test 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vel ex vitae est finibus tristique in at mauris. Praesent pharetra finibus nibh id volutpat. Fusce tincidunt nec lectus et cursus. Nam nec malesuada urna. Morbi hendrerit eros arcu, eget imperdiet diam imperdiet sed. Integer finibus sapien eu suscipit scelerisque. Curabitur fringilla turpis sit amet urna lacinia, eu condimentum arcu aliquet. Curabitur at tellus at eros sagittis placerat nec quis tellus. In laoreet dui at ullamcorper pellentesque. Donec cursus lacinia ex in mollis. Aliquam non ligula quis metus malesuada ultrices. Nullam ut felis eget elit lacinia ultrices.', '2022-04-27 09:04:51', '62690733db66c9.89678542.jpg', NULL, NULL, NULL, 1),
(9, 'test 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vel ex vitae est finibus tristique in at mauris. Praesent pharetra finibus nibh id volutpat. Fusce tincidunt nec lectus et cursus. Nam nec malesuada urna. Morbi hendrerit eros arcu, eget imperdiet diam imperdiet sed. Integer finibus sapien eu suscipit scelerisque. Curabitur fringilla turpis sit amet urna lacinia, eu condimentum arcu aliquet. Curabitur at tellus at eros sagittis placerat nec quis tellus. In laoreet dui at ullamcorper pellentesque. Donec cursus lacinia ex in mollis. Aliquam non ligula quis metus malesuada ultrices. Nullam ut felis eget elit lacinia ultrices.\r\n', '2022-04-27 09:04:59', '6269073b096118.54187154.jpg', NULL, NULL, NULL, 1),
(10, 'test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vel ex vitae est finibus tristique in at mauris. Praesent pharetra finibus nibh id volutpat. Fusce tincidunt nec lectus et cursus. Nam nec malesuada urna. Morbi hendrerit eros arcu, eget imperdiet diam imperdiet sed. Integer finibus sapien eu suscipit scelerisque. Curabitur fringilla turpis sit amet urna lacinia, eu condimentum arcu aliquet. Curabitur at tellus at eros sagittis placerat nec quis tellus. In laoreet dui at ullamcorper pellentesque. Donec cursus lacinia ex in mollis. Aliquam non ligula quis metus malesuada ultrices. Nullam ut felis eget elit lacinia ultrices.', '2022-04-27 09:15:40', '626909bccb9ab7.62359308.jpg', NULL, NULL, NULL, 1),
(11, 'hrttrezerth', 'hgrtesyd,yjthhftgfrgdfgrt', '2022-04-27 09:16:28', '626909ec172ea5.01604395.jpg', NULL, NULL, NULL, 1),
(12, 'azertyhjk', 'azertyuk', '2022-04-27 09:18:05', '62690a4d4f0441.77202976.jpg', NULL, NULL, NULL, 1),
(13, 'jhgfds', 'kjhgfds', '2022-04-27 09:21:35', '62690b1fdbeb13.49512025.jpg', NULL, NULL, NULL, 1),
(14, 'testgwfxb', ',jh,ydyrhhtrdtrthgr', '2022-04-27 09:24:28', '62690bcc0a8fa7.21044081.jpg', NULL, NULL, NULL, 1),
(15, 'dwrxtfcygvuhbijk', 'rwxdtfcygvuhbijnok,l', '2022-04-27 09:26:34', '62690c4a0bbe17.97900136.jpg', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reported`
--

CREATE TABLE `reported` (
  `id` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `message` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` int(11) NOT NULL,
  `url` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `backup_email` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_img` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `muted` tinyint(1) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `warned` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `backup_email`, `profile_img`, `course`, `bio`, `muted`, `admin`, `warned`) VALUES
(1, 'p66liena', 'lienapaeps@thomasmore.be', '$2y$13$qxOtOj3qTUiV5Zf0IDJRluk8l32y32xs4DbaXZdBA31izJTfaVM4a', 'paepsliena@gmail.com', NULL, NULL, NULL, 0, 1, 0),
(2, 'jefke', 'jeffasseur@thomasmore.be', '$2y$13$KcnN7rl.YQPeqdojESug9OxXwk3gcCZhy5rFLqo5lkB6ri.IiAt.i', NULL, NULL, NULL, NULL, 0, 1, 0),
(3, 'rix', 'rickyheylen@thomasmore.be', '$2y$13$ygwBw3.gK7LjnDCrAfL3MuT1Ro5pDjZ6QXQq2.l9QPcn/liMBslUq', NULL, NULL, NULL, NULL, 0, 1, 0),
(4, 'test', 'test@thomasmore.be', '$2y$13$pBNDpJh24YTLTr4K7ca9uO7pl7m9ItE3rUZvVFjUSvUtdzZx3iE9W', NULL, NULL, NULL, NULL, 0, 0, 0),
(5, 'test123', 'test123@thomasmore.be', '$2y$13$39ehXq9gMUzDSUgm1wkceOVw/5KcoIZcEPpQLjppOAsayK2Jj1zPu', NULL, NULL, NULL, NULL, 0, 0, 0),
(6, 'ditiseentest', 'ditiseentest@thomasmore.be', '$2y$13$y9AokDK3dPB3hf19lJBLv.2L/bAyPO9EZaaAIxXMXDyDTfFFW0Rqe', NULL, NULL, NULL, NULL, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `following`
--
ALTER TABLE `following`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `password_reset_request`
--
ALTER TABLE `password_reset_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `reported`
--
ALTER TABLE `reported`
  ADD PRIMARY KEY (`id`),
  ADD KEY `content_id` (`content_id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `following`
--
ALTER TABLE `following`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_reset_request`
--
ALTER TABLE `password_reset_request`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `reported`
--
ALTER TABLE `reported`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `password_reset_request`
--
ALTER TABLE `password_reset_request`
  ADD CONSTRAINT `password_reset_request_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `social_links`
--
ALTER TABLE `social_links`
  ADD CONSTRAINT `social_links_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
