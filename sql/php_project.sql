-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 26, 2022 at 07:42 AM
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
  `description` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `cover_img` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warned` tinyint(1) DEFAULT NULL,
  `showcase` tinyint(1) DEFAULT NULL,
  `amount_views` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `project_content_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `time`, `cover_img`, `warned`, `showcase`, `amount_views`, `user_id`, `project_content_id`) VALUES
(1, 'Enid', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio.', '2022-04-08 11:02:42', 'https://dummyimage.com/600x400.png/5fa2dd/ffffff', 0, 0, 14, 5, 1),
(2, 'Confession, The', 'Pellentesque at nulla. Suspendisse potenti.', '2021-10-01 07:41:40', 'https://dummyimage.com/600x400.png/5fa2dd/ffffff', 1, 1, 31, 3, 5),
(3, 'Man with an Apartment (Czlowiek z M-3)', 'Duis bibendum.', '2021-12-11 02:07:07', 'https://dummyimage.com/600x400.png/cc0000/ffffff', 1, 0, 96, 4, 3),
(4, 'Little Odessa', 'Aenean auctor gravida sem.', '2021-12-29 09:33:07', 'https://dummyimage.com/600x400.png/5fa2dd/ffffff', 0, 1, 91, 4, 4),
(5, 'Dhoom', 'Suspendisse accumsan tortor quis turpis.', '2022-03-17 22:04:02', 'https://dummyimage.com/600x400.png/cc0000/ffffff', 0, 1, 59, 5, 1),
(6, 'Crossing Guard, The', 'Morbi vel lectus in quam fringilla rhoncus. Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci.', '2021-07-26 19:54:40', 'http://dummyimage.com/600x400.png/5fa2dd/ffffff', 1, 1, 73, 1, 1),
(7, 'Invisible Circus, The', 'Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis.', '2021-10-02 03:27:20', 'http://dummyimage.com/600x400.png/ff4444/ffffff', 1, 1, 82, 1, 2),
(8, 'First Daughter', 'Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo. Aliquam quis turpis eget elit sodales scelerisque.', '2022-04-12 12:55:41', 'http://dummyimage.com/600x400.png/5fa2dd/ffffff', 1, 0, 61, 4, 5),
(9, 'How to Seduce Difficult Women', 'Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.', '2021-08-18 09:46:31', 'http://dummyimage.com/140x100.png/cc0000/ffffff', 1, 0, 73, 2, 4),
(10, 'Oh, Susanna!', 'Vivamus vel nulla eget eros elementum pellentesque. Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla.', '2021-07-06 14:03:06', 'http://dummyimage.com/600x400.png/ff4444/ffffff', 1, 1, 24, 5, 4),
(11, 'Magnificent Seven, The', 'Vestibulum rutrum rutrum neque. Aenean auctor gravida sem. Praesent id massa id nisl venenatis lacinia.', '2022-03-29 06:41:51', 'http://dummyimage.com/600x400.png/ff4444/ffffff', 0, 0, 98, 5, 5),
(12, 'Trap, The (Klopka)', 'Integer ac neque. Duis bibendum. Morbi non quam nec dui luctus rutrum.', '2021-10-26 18:49:36', 'http://dummyimage.com/600x400.png/5fa2dd/ffffff', 1, 1, 87, 1, 2),
(13, 'Scarlet Letter, The', 'Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.', '2021-12-28 19:32:55', 'http://dummyimage.com/600x400.png/cc0000/ffffff', 1, 1, 51, 1, 2),
(14, 'Comic Book: The Movie', 'In hac habitasse platea dictumst. Etiam faucibus cursus urna.', '2021-04-29 15:27:18', 'http://dummyimage.com/600x400.png/5fa2dd/ffffff', 1, 1, 61, 1, 3),
(15, 'Tuareg: The Desert Warrior (Tuareg - Il guerriero del deserto)', 'Etiam faucibus cursus urna.', '2021-05-29 18:21:14', 'https://dummyimage.com/600x400.png/5fa2dd/ffffff', 1, 1, 75, 3, 5),
(16, 'Death Kiss, The', 'Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.', '2021-06-05 03:01:12', 'http://dummyimage.com/600x400.png/ff4444/ffffff', 1, 0, 87, 4, 2),
(17, 'Berserk: The Golden Age Arc - The Egg of the King', 'Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.', '2021-07-20 06:30:50', 'http://dummyimage.com/600x400.png/5fa2dd/ffffff', 1, 0, 30, 4, 3),
(18, 'Mac & Devin Go to High School', 'Nullam varius.', '2021-06-02 16:19:21', 'http://dummyimage.com/600x400.png/5fa2dd/ffffff', 0, 1, 41, 5, 3),
(19, 'Oh, God! Book II', 'Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.', '2022-03-16 00:43:56', 'http://dummyimage.com/600x400.png/cc0000/ffffff', 1, 1, 14, 2, 2),
(20, 'Spirit Trap', 'Proin at turpis a pede posuere nonummy. Integer non velit.', '2021-09-30 07:13:43', 'http://dummyimage.com/600x400.png/ff4444/ffffff', 0, 0, 72, 1, 1),
(21, 'Any Given Sunday', 'Suspendisse potenti. In eleifend quam a odio.', '2021-06-03 04:51:47', 'http://dummyimage.com/600x400.png/dddddd/000000', 1, 0, 38, 5, 1),
(22, 'Eden', 'Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.', '2021-04-30 04:59:18', 'http://dummyimage.com/600x400.png/cc0000/ffffff', 1, 0, 38, 3, 4),
(23, 'Gold', 'Nulla justo. Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros.', '2021-08-12 05:49:31', 'http://dummyimage.com/600x400.png/cc0000/ffffff', 1, 1, 27, 4, 4),
(24, 'Child Is Waiting, A', 'Nullam molestie nibh in lectus. Pellentesque at nulla.', '2021-10-16 01:41:42', 'http://dummyimage.com/600x400.png/5fa2dd/ffffff', 0, 1, 87, 4, 5),
(25, 'Wait Until Dark', 'In hac habitasse platea dictumst.', '2021-05-21 23:53:12', 'http://dummyimage.com/600x400.png/5fa2dd/ffffff', 1, 1, 100, 1, 5),
(26, 'C.O.G.', 'Proin at turpis a pede posuere nonummy.', '2022-01-08 23:54:36', 'http://dummyimage.com/600x400.png/5fa2dd/ffffff', 0, 1, 93, 4, 3),
(27, 'Boss of It All, The (Direktøren for det hele)', 'Morbi non quam nec dui luctus rutrum. Nulla tellus. In sagittis dui vel nisl.', '2021-08-09 13:03:30', 'http://dummyimage.com/600x400.png/cc0000/ffffff', 1, 1, 11, 5, 3),
(28, 'Superheroes', 'Donec quis orci eget orci vehicula condimentum.', '2021-10-11 10:34:22', 'http://dummyimage.com/600x400.png/cc0000/ffffff', 1, 1, 88, 5, 5),
(29, 'Public Eye, The', 'Mauris lacinia sapien quis libero.', '2022-03-16 08:43:06', 'http://dummyimage.com/600x400.png/cc0000/ffffff', 1, 0, 23, 5, 1),
(30, 'Wog Boy, The', 'Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus. Suspendisse potenti.', '2021-09-27 21:17:27', 'http://dummyimage.com/600x400.png/5fa2dd/ffffff', 1, 0, 84, 2, 5),
(31, '20 Seconds of Joy', 'Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros. Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue.', '2022-04-14 06:40:06', 'http://dummyimage.com/600x400.png/dddddd/000000', 0, 1, 7, 4, 5),
(32, 'Veronica Guerin', 'Curabitur convallis. Duis consequat dui nec nisi volutpat eleifend.', '2021-10-12 20:01:28', 'http://dummyimage.com/600x400.png/ff4444/ffffff', 1, 1, 82, 3, 3),
(33, 'Private War of Major Benson, The', 'Fusce consequat. Nulla nisl. Nunc nisl.', '2021-06-10 10:25:34', 'http://dummyimage.com/600x400.png/dddddd/000000', 1, 0, 96, 1, 4),
(34, 'Lightning Jack', 'Integer non velit. Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi.', '2021-06-29 11:15:59', 'http://dummyimage.com/600x400.png/5fa2dd/ffffff', 1, 1, 40, 3, 2),
(35, 'Muppets Most Wanted', 'In sagittis dui vel nisl. Duis ac nibh.', '2021-06-19 13:03:04', 'http://dummyimage.com/600x400.png/dddddd/000000', 1, 0, 98, 3, 3),
(36, 'Grassroots', 'Suspendisse ornare consequat lectus.', '2021-05-23 00:35:54', 'http://dummyimage.com/600x400.png/ff4444/ffffff', 1, 0, 86, 5, 2),
(37, 'Linguini Incident, The', 'Maecenas rhoncus aliquam lacus.', '2022-01-13 02:06:30', 'http://dummyimage.com/600x400.png/ff4444/ffffff', 0, 1, 78, 1, 3),
(38, 'Puppetmaster, The (Xi meng ren sheng)', 'In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.', '2021-10-19 12:53:14', 'http://dummyimage.com/600x400.png/ff4444/ffffff', 0, 0, 76, 5, 4),
(39, 'Starman', 'Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.', '2021-09-07 18:14:19', 'http://dummyimage.com/600x400.png/dddddd/000000', 0, 1, 5, 2, 1),
(40, 'Abendland', 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio.', '2021-09-23 21:22:30', 'http://dummyimage.com/600x400.png/dddddd/000000', 0, 1, 25, 1, 1),
(41, 'Season of the Witch (Hungry Wives) (Jack\'s Wife)', 'Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus. Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis.', '2021-06-15 11:01:44', 'http://dummyimage.com/600x400.png/dddddd/000000', 0, 0, 37, 5, 1),
(42, 'Stardom', 'Pellentesque ultrices mattis odio.', '2021-07-26 02:54:57', 'http://dummyimage.com/600x400.png/dddddd/000000', 1, 0, 2, 2, 2),
(43, 'Salomè', 'Curabitur in libero ut massa volutpat convallis.', '2022-03-03 10:26:41', 'http://dummyimage.com/600x400.png/cc0000/ffffff', 0, 0, 43, 5, 3),
(44, 'Ultrasuede: In Search of Halston', 'Nunc nisl. Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus.', '2022-04-18 21:27:55', 'http://dummyimage.com/600x400.png/cc0000/ffffff', 1, 1, 98, 5, 2),
(45, 'Shark Alarm at Müggelsee (Hai Alarm am Müggelsee)', 'Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci.', '2021-12-24 04:31:30', 'http://dummyimage.com/600x400.png/ff4444/ffffff', 0, 0, 76, 4, 4),
(46, 'Wankers, The (Les branleuses)', 'Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '2021-11-14 11:10:54', 'http://dummyimage.com/600x400.png/ff4444/ffffff', 0, 0, 41, 5, 5),
(47, 'Time Stood Still (Il tempo si è fermato)', 'Nullam molestie nibh in lectus. Pellentesque at nulla. Suspendisse potenti.', '2021-10-16 19:25:45', 'http://dummyimage.com/600x400.png/ff4444/ffffff', 1, 1, 13, 1, 2),
(48, 'Click', 'Proin eu mi.', '2022-01-30 08:50:31', 'http://dummyimage.com/600x400.png/ff4444/ffffff', 1, 0, 15, 3, 3),
(49, 'Mysterians, The (Chikyu Boeigun)', 'Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.', '2021-08-29 21:42:02', 'http://dummyimage.com/600x400.png/cc0000/ffffff', 0, 0, 24, 4, 2),
(50, 'Lost, Lost, Lost ', 'Nam dui.', '2021-11-26 19:27:08', 'http://dummyimage.com/600x400.png/5fa2dd/ffffff', 1, 0, 31, 3, 2),
(51, 'Viridiana', 'Donec vitae nisi.', '2022-03-06 09:23:32', 'http://dummyimage.com/600x400.png/ff4444/ffffff', 0, 1, 96, 2, 4),
(52, 'Three Faces of Eve, The', 'Integer a nibh. In quis justo. Maecenas rhoncus aliquam lacus.', '2021-08-04 23:58:29', 'http://dummyimage.com/600x400.png/5fa2dd/ffffff', 1, 0, 64, 5, 4),
(53, 'Nomad (Köshpendiler)', 'In sagittis dui vel nisl. Duis ac nibh.', '2022-03-14 14:12:53', 'http://dummyimage.com/600x400.png/5fa2dd/ffffff', 0, 0, 46, 1, 5),
(54, 'Good Earth, The', 'Aenean sit amet justo.', '2021-05-19 21:09:21', 'http://dummyimage.com/600x400.png/5fa2dd/ffffff', 0, 1, 32, 1, 5),
(55, 'Tenebre', 'Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.', '2021-11-15 22:55:34', 'http://dummyimage.com/600x400.png/ff4444/ffffff', 0, 0, 96, 3, 4),
(56, 'Note by Note: The Making of Steinway L1037', 'Integer a nibh.', '2021-06-14 11:58:35', 'http://dummyimage.com/600x400.png/ff4444/ffffff', 0, 0, 100, 2, 3),
(57, 'Runaway Train', 'Integer a nibh. In quis justo. Maecenas rhoncus aliquam lacus.', '2021-09-17 18:04:41', 'http://dummyimage.com/600x400.png/cc0000/ffffff', 0, 0, 92, 4, 4),
(58, 'Going Places (Valseuses, Les)', 'Duis at velit eu est congue elementum. In hac habitasse platea dictumst.', '2022-03-22 02:44:32', 'http://dummyimage.com/600x400.png/5fa2dd/ffffff', 1, 1, 72, 3, 3),
(59, '7 Faces of Dr. Lao', 'Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', '2021-05-06 15:01:00', 'http://dummyimage.com/600x400.png/ff4444/ffffff', 0, 1, 67, 4, 2),
(60, 'Battle in Heaven (Batalla en el cielo)', 'Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl.', '2021-09-10 23:25:52', 'http://dummyimage.com/600x400.png/cc0000/ffffff', 1, 1, 44, 3, 2),
(61, 'El Lobo', 'Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '2021-05-08 16:47:50', 'http://dummyimage.com/600x400.png/ff4444/ffffff', 1, 0, 86, 4, 4),
(62, 'Forty Guns', 'Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus.', '2021-07-22 16:35:12', 'http://dummyimage.com/600x400.png/dddddd/000000', 1, 0, 52, 4, 3),
(63, 'Caine (Shark!)', 'Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus.', '2022-03-07 03:21:11', 'http://dummyimage.com/600x400.png/dddddd/000000', 1, 0, 67, 2, 3),
(64, 'Death Race', 'Phasellus sit amet erat. Nulla tempus.', '2021-09-10 09:15:31', 'http://dummyimage.com/600x400.png/ff4444/ffffff', 1, 1, 61, 5, 2),
(65, 'Left Hand of God, The', 'In quis justo. Maecenas rhoncus aliquam lacus.', '2021-07-03 00:34:59', 'http://dummyimage.com/600x400.png/5fa2dd/ffffff', 0, 0, 60, 3, 5),
(66, 'I Have Found It (Kandukondain Kandukondain)', 'Mauris lacinia sapien quis libero.', '2022-01-04 21:52:47', 'http://dummyimage.com/600x400.png/cc0000/ffffff', 0, 0, 52, 4, 3),
(67, 'K-19: The Widowmaker', 'Duis at velit eu est congue elementum. In hac habitasse platea dictumst.', '2021-11-07 10:45:20', 'http://dummyimage.com/600x400.png/5fa2dd/ffffff', 0, 1, 84, 4, 5),
(68, 'Stretch', 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.', '2021-11-01 04:17:45', 'http://dummyimage.com/600x400.png/5fa2dd/ffffff', 0, 0, 64, 4, 2),
(69, 'Barbershop', 'Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.', '2021-12-30 13:13:13', 'http://dummyimage.com/600x400.png/cc0000/ffffff', 1, 1, 4, 1, 2),
(70, 'Wend Kuuni (a.k.a. God\'s Gift)', 'Morbi vel lectus in quam fringilla rhoncus.', '2021-12-16 23:06:16', 'http://dummyimage.com/600x400.png/cc0000/ffffff', 0, 1, 19, 2, 2),
(71, 'Secret Life of Walter Mitty, The', 'In eleifend quam a odio. In hac habitasse platea dictumst. Maecenas ut massa quis augue luctus tincidunt.', '2021-05-09 13:15:40', 'http://dummyimage.com/600x400.png/5fa2dd/ffffff', 0, 1, 78, 3, 1),
(72, 'Clown', 'Suspendisse potenti. Cras in purus eu magna vulputate luctus.', '2021-06-04 05:46:13', 'http://dummyimage.com/600x400.png/cc0000/ffffff', 1, 0, 4, 4, 4),
(73, 'Glory Road', 'Ut tellus.', '2022-02-25 13:41:50', 'http://dummyimage.com/600x400.png/dddddd/000000', 0, 1, 67, 4, 1),
(74, 'Yanco ', 'Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam.', '2022-04-02 11:09:22', 'http://dummyimage.com/600x400.png/cc0000/ffffff', 1, 0, 67, 1, 4),
(75, 'House of Yes, The', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.', '2021-05-08 12:41:13', 'http://dummyimage.com/600x400.png/ff4444/ffffff', 0, 1, 61, 2, 4),
(76, 'Comic Book Confidential', 'Donec posuere metus vitae ipsum. Aliquam non mauris. Morbi non lectus.', '2022-01-23 01:39:01', 'http://dummyimage.com/600x400.png/cc0000/ffffff', 0, 0, 37, 1, 3),
(77, 'Dark Floors', 'In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.', '2021-07-22 22:32:56', 'http://dummyimage.com/600x400.png/cc0000/ffffff', 0, 1, 60, 4, 3),
(78, 'Seeking Asian Female', 'In eleifend quam a odio. In hac habitasse platea dictumst.', '2022-01-29 05:56:48', 'http://dummyimage.com/600x400.png/5fa2dd/ffffff', 0, 0, 57, 1, 2),
(79, 'Doctor X', 'Vestibulum sed magna at nunc commodo placerat. Praesent blandit. Nam nulla.', '2021-07-08 15:38:42', 'http://dummyimage.com/600x400.png/ff4444/ffffff', 1, 1, 99, 3, 5),
(80, 'Counterfeiters, The (Le cave se rebiffe)', 'Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.', '2021-07-20 12:00:37', 'http://dummyimage.com/600x400.png/cc0000/ffffff', 0, 1, 77, 4, 3),
(81, 'Princess Blade, The (Shura Yukihime)', 'Aenean auctor gravida sem. Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo.', '2022-03-02 13:14:25', 'http://dummyimage.com/600x400.png/5fa2dd/ffffff', 1, 0, 5, 1, 3),
(82, 'Under the Cherry Moon', 'Fusce posuere felis sed lacus.', '2021-10-20 10:31:29', 'http://dummyimage.com/600x400.png/5fa2dd/ffffff', 0, 0, 46, 3, 2),
(83, 'Among Wolves (Entrelobos)', 'In hac habitasse platea dictumst.', '2021-05-17 03:30:10', 'http://dummyimage.com/600x400.png/5fa2dd/ffffff', 0, 0, 59, 3, 1),
(84, 'Crimson Kimono, The', 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.', '2021-07-11 15:51:29', 'http://dummyimage.com/600x400.png/5fa2dd/ffffff', 1, 0, 36, 1, 4),
(85, 'What Is It', 'Nunc nisl. Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus.', '2021-10-14 23:24:39', 'http://dummyimage.com/600x400.png/dddddd/000000', 1, 1, 39, 1, 1),
(86, 'Bonjour tristesse', 'Nunc nisl. Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa.', '2021-10-22 15:42:23', 'http://dummyimage.com/600x400.png/dddddd/000000', 0, 0, 18, 2, 2),
(87, 'High and Dry', 'Ut tellus. Nulla ut erat id mauris vulputate elementum. Nullam varius.', '2021-06-27 06:59:44', 'http://dummyimage.com/600x400.png/5fa2dd/ffffff', 1, 1, 45, 4, 5),
(88, 'Nightwatching', 'Nam tristique tortor eu pede.', '2021-05-08 06:32:00', 'http://dummyimage.com/600x400.png/cc0000/ffffff', 1, 1, 88, 4, 5),
(89, 'Agata and the Storm (Agata e la tempesta)', 'Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.', '2021-10-05 08:01:45', 'http://dummyimage.com/600x400.png/ff4444/ffffff', 1, 0, 100, 1, 1),
(90, 'Snowmageddon', 'Donec semper sapien a libero. Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla.', '2022-01-06 20:07:23', 'http://dummyimage.com/600x400.png/ff4444/ffffff', 0, 1, 83, 2, 3),
(91, 'Poltergeist III', 'Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat.', '2021-04-23 10:33:37', 'http://dummyimage.com/600x400.png/cc0000/ffffff', 0, 1, 83, 4, 1),
(92, 'Back in the Saddle (Back in the Saddle Again)', 'Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.', '2021-04-19 09:50:20', 'http://dummyimage.com/600x400.png/cc0000/ffffff', 1, 1, 22, 1, 1),
(93, 'Tatort: Im Schmerz geboren', 'Praesent lectus. Vestibulum quam sapien, varius ut, blandit non, interdum in, ante.', '2022-01-27 07:48:46', 'http://dummyimage.com/600x400.png/5fa2dd/ffffff', 0, 0, 55, 5, 4),
(94, 'Great Sinner, The', 'Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.', '2021-08-27 23:30:35', 'http://dummyimage.com/600x400.png/dddddd/000000', 1, 1, 54, 5, 1),
(95, '24 Hour Party People', 'Pellentesque eget nunc.', '2022-04-16 05:38:12', 'http://dummyimage.com/600x400.png/ff4444/ffffff', 1, 1, 14, 2, 1),
(96, 'Jersey Girl', 'Maecenas pulvinar lobortis est. Phasellus sit amet erat. Nulla tempus.', '2022-03-25 08:54:38', 'http://dummyimage.com/600x400.png/cc0000/ffffff', 1, 1, 47, 4, 1),
(97, 'Devil and Max Devlin, The', 'Phasellus sit amet erat. Nulla tempus.', '2021-05-09 00:40:52', 'http://dummyimage.com/600x400.png/dddddd/000000', 1, 0, 75, 4, 2),
(98, 'Pathology', 'Nam nulla.', '2022-01-27 11:17:29', 'http://dummyimage.com/600x400.png/5fa2dd/ffffff', 0, 1, 24, 3, 2),
(99, 'Moment After, The', 'Sed accumsan felis.', '2022-02-12 06:01:48', 'http://dummyimage.com/600x400.png/ff4444/ffffff', 0, 0, 66, 2, 4),
(100, 'In Time', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam vel augue.', '2021-05-31 02:41:49', 'http://dummyimage.com/600x400.png/cc0000/ffffff', 1, 1, 95, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `project_content`
--

CREATE TABLE `project_content` (
  `id` int(11) NOT NULL,
  `url` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_type` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_content`
--

INSERT INTO `project_content` (`id`, `url`, `alt`, `content_type`) VALUES
(1, 'https://images.pexels.com/photos/326502/pexels-photo-326502.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940', 'This is a test image', 'img'),
(2, 'https://images.pexels.com/photos/163822/color-umbrella-red-yellow-163822.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940', 'This is another test', 'img'),
(3, 'https://images.pexels.com/photos/1194420/pexels-photo-1194420.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940', 'This is another another test', 'img');

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
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `title` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_img` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `title`, `cover_img`) VALUES
(1, 'test', '6266ff2408d977.58933659.jpg'),
(2, 'test 2', '62679d66146577.52109694.jpg'),
(3, 'jyrreysdh', '62679f0e4c9288.12386155.jpg');

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
(5, 'test123', 'test123@thomasmore.be', '$2y$13$39ehXq9gMUzDSUgm1wkceOVw/5KcoIZcEPpQLjppOAsayK2Jj1zPu', NULL, NULL, NULL, NULL, 0, 0, 0);

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
  ADD KEY `user_id` (`user_id`),
  ADD KEY `project_content_id` (`project_content_id`);

--
-- Indexes for table `project_content`
--
ALTER TABLE `project_content`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `upload`
--
ALTER TABLE `upload`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `project_content`
--
ALTER TABLE `project_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- Constraints for table `reported`
--
ALTER TABLE `reported`
  ADD CONSTRAINT `reported_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reported_ibfk_2` FOREIGN KEY (`content_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `reported_ibfk_3` FOREIGN KEY (`content_id`) REFERENCES `comments` (`id`);

--
-- Constraints for table `social_links`
--
ALTER TABLE `social_links`
  ADD CONSTRAINT `social_links_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
