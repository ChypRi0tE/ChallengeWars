-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2015 at 03:47 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `challengewars`
--

-- --------------------------------------------------------

--
-- Table structure for table `cw_challenges`
--

CREATE TABLE IF NOT EXISTS `cw_challenges` (
`id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `dateCreation` datetime DEFAULT NULL,
  `dateEnd` datetime DEFAULT NULL,
  `idCreator` int(11) NOT NULL,
  `idPrize` int(11) NOT NULL,
  `description` text NOT NULL,
  `isAdvanced` tinyint(4) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cw_challenges`
--

INSERT INTO `cw_challenges` (`id`, `title`, `dateCreation`, `dateEnd`, `idCreator`, `idPrize`, `description`, `isAdvanced`, `status`, `cost`, `type`, `image`) VALUES
(1, 'Test challenge 1', '2015-02-08 15:33:00', '2015-02-11 15:33:00', 1, 1, 'Ceci est un challenge de test', 0, 1, 0, 3, ''),
(2, 'Test Featured', '2015-02-09 15:33:00', '2015-02-14 09:44:00', 1, 1, 'Un challenge featuré', 1, 1, 20, 1, ''),
(3, 'Challenge open test2', '2015-02-04 09:33:00', '2015-02-12 06:52:00', 1, 1, 'Test non featured quand memem', 0, 1, 0, 2, ''),
(4, 'Test challenge fermé', '2015-02-08 18:18:00', '2015-02-12 19:26:00', 1, 1, 'Challenge fermé c''est trop triste', 0, 2, 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `cw_challenges_comments`
--

CREATE TABLE IF NOT EXISTS `cw_challenges_comments` (
`id` int(11) NOT NULL,
  `idChallenge` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `datePost` datetime DEFAULT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cw_challenges_comments`
--

INSERT INTO `cw_challenges_comments` (`id`, `idChallenge`, `idUser`, `datePost`, `content`) VALUES
(1, 2, 2, '2015-02-13 00:00:00', 'Commentaire de test');

-- --------------------------------------------------------

--
-- Table structure for table `cw_challenges_entries`
--

CREATE TABLE IF NOT EXISTS `cw_challenges_entries` (
`id` int(11) NOT NULL,
  `idChallenge` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `dateEntry` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cw_challenges_entries`
--

INSERT INTO `cw_challenges_entries` (`id`, `idChallenge`, `idUser`, `dateEntry`) VALUES
(1, 3, 1, '2015-02-12 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cw_users`
--

CREATE TABLE IF NOT EXISTS `cw_users` (
`id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `avatar` varchar(200) NOT NULL,
  `points` int(11) DEFAULT NULL,
  `rank` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cw_users`
--

INSERT INTO `cw_users` (`id`, `username`, `mail`, `password`, `avatar`, `points`, `rank`) VALUES
(1, 'ChypRiotE', 'nicolastem@hotmail.fr', '81dc9bdb52d04dc20036dbd8313ed055', 'avatar.jpg', 1, 1),
(2, 'Test', 'caca@prout.fr', 'ab4f63f9ac65152575886860dde480a1', 'default.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cw_users_stats`
--

CREATE TABLE IF NOT EXISTS `cw_users_stats` (
`id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `dateInscription` datetime DEFAULT NULL,
  `challEntered` int(11) DEFAULT NULL,
  `challWon` int(11) NOT NULL,
  `challCreated` int(11) NOT NULL,
  `commentPosted` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cw_users_stats`
--

INSERT INTO `cw_users_stats` (`id`, `idUser`, `dateInscription`, `challEntered`, `challWon`, `challCreated`, `commentPosted`) VALUES
(1, 1, '2015-02-13 23:06:00', 1, 2, 4, 0),
(2, 2, '2015-02-14 00:03:00', 0, 0, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cw_challenges`
--
ALTER TABLE `cw_challenges`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cw_challenges_comments`
--
ALTER TABLE `cw_challenges_comments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cw_challenges_entries`
--
ALTER TABLE `cw_challenges_entries`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cw_users`
--
ALTER TABLE `cw_users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`,`mail`);

--
-- Indexes for table `cw_users_stats`
--
ALTER TABLE `cw_users_stats`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `idUser` (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cw_challenges`
--
ALTER TABLE `cw_challenges`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cw_challenges_comments`
--
ALTER TABLE `cw_challenges_comments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cw_challenges_entries`
--
ALTER TABLE `cw_challenges_entries`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cw_users`
--
ALTER TABLE `cw_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cw_users_stats`
--
ALTER TABLE `cw_users_stats`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
