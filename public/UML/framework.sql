-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 27, 2023 at 01:50 PM
-- Server version: 5.7.24
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `framework`
--
CREATE DATABASE IF NOT EXISTS `framework` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `framework`;
-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `head` text NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `user_id`, `title`, `head`, `content`, `date`) VALUES
(1, 1, 'Futurama', 'Hey, what kinda party is this? There\'s no booze and only one hooker.', 'It must be wonderful. Hey, you add a one and two zeros to that or we walk! Fry, you can\'t just sit here in the dark listening to classical music. No, I\'m Santa Claus! I decline the title of Iron Cook and accept the lesser title of Zinc Saucier, which I just made up. Uhh… also, comes with double prize money.\r\n\r\nThen we\'ll go with that data file!\r\nAnd remember, don\'t do anything that affects anything, unless it turns out you were supposed to, in which case, for the love of God, don\'t not do it!\r\nHey, what kinda party is this? There\'s no booze and only one hooker.', '2023-06-27 14:54:10'),
(2, 1, 'Doctor Who', 'I hate yogurt. It\'s just stuff with bits in.', 'Stop talking, brain thinking. Hush. I am the last of my species, and I know how that weighs on the heart so don\'t lie to me! All I\'ve got to do is pass as an ordinary human being. Simple. What could possibly go wrong?\r\n\r\nI\'m nobody\'s taxi service; I\'m not gonna be there to catch you every time you feel like jumping out of a spaceship.\r\nI\'m nobody\'s taxi service; I\'m not gonna be there to catch you every time you feel like jumping out of a spaceship.\r\nNo… It\'s a thing; it\'s like a plan, but with more greatness.', '2023-06-27 14:54:10'),
(3, 1, 'Dexter', 'Like a sloth. I can do that.', 'I\'m real proud of you for coming, bro. I know you hate funerals. I have a dark side, too. Like a sloth. I can do that. I\'m real proud of you for coming, bro. I know you hate funerals.\r\n\r\nYou\'re a killer. I catch killers. You all right, Dexter? Makes me a … scientist. You all right, Dexter? I feel like a jigsaw puzzle missing a piece. And I\'m not even sure what the picture should be.', '2023-06-27 14:57:37');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `article_id` int(11) DEFAULT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `validation` enum('valid','invalid') NOT NULL DEFAULT 'invalid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `article_id`, `content`, `date`, `validation`) VALUES
(1, 2, 3, 'oh yes I remember. too funny', '2023-06-27 14:59:57', 'valid'),
(2, 3, 1, 'i love futurama', '2023-06-27 15:00:54', 'valid');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `token` varchar(255) NOT NULL,
  `validation` enum('valid','invalid') NOT NULL DEFAULT 'invalid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `role`, `date`, `token`, `validation`) VALUES
(1, 'laurent', '$2y$10$JaMIOulW.k5ZmHuSLXo4OOtcTjqFyEZor16NRKUCE3CqZfDl5jUiu', 'laurent@gmail.com', 'admin', '2023-06-27 14:36:13', '44785a6d31bf365bf9eb3e8d6f0c739d783fa4378516377baa19300adb9acc77', 'valid'),
(2, 'aurélie', '$2y$10$SoleEIsX7B8eir3BG75OwuL1sUTuyUnm37SLVpqH3FP/1OasSN4Q2', 'aurelie@gmail.com', 'user', '2023-06-27 14:49:15', '6f2d085300a1ab5c5fbf326d15acec004ebfabeb97b456cbf31eb70406837be6', 'valid'),
(3, 'sandrine', '$2y$10$ccUkAtkK6fc0tOeBVRR8WemNPRY6xqmrPbL9oLzeTrdxH9u8j6X66', 'sandrine@gmail.com', 'user', '2023-06-27 14:50:09', 'e1ae0e54f7cdd1d665cb7c7423032524f5605fa77ce47a4ec64fb8e076c9b0ca', 'valid');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
