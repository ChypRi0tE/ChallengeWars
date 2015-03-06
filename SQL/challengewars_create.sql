-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: sql307.byethost12.com
-- Generation Time: Mar 06, 2015 at 06:26 PM
-- Server version: 5.6.22-71.0
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `b12_15918047_challengewars`
--

-- --------------------------------------------------------

--
-- Table structure for table `cw_challenges`
--

CREATE TABLE IF NOT EXISTS `cw_challenges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `champion` int(11) NOT NULL,
  `winner` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

-- --------------------------------------------------------

--
-- Table structure for table `cw_challenges_comments`
--

CREATE TABLE IF NOT EXISTS `cw_challenges_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idChallenge` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `datePost` datetime DEFAULT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

-- --------------------------------------------------------

--
-- Table structure for table `cw_challenges_entries`
--

CREATE TABLE IF NOT EXISTS `cw_challenges_entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idChallenge` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `dateEntry` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

-- --------------------------------------------------------

--
-- Table structure for table `cw_challenges_rankings`
--

CREATE TABLE IF NOT EXISTS `cw_challenges_rankings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `challengeId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `cw_lol_champions`
--

CREATE TABLE IF NOT EXISTS `cw_lol_champions` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `cleanName` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cw_summoners`
--

CREATE TABLE IF NOT EXISTS `cw_summoners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `summonerId` int(11) NOT NULL,
  `summonerName` varchar(50) NOT NULL,
  `nbGames` int(11) NOT NULL,
  `dateValidation` datetime NOT NULL,
  `lastSync` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

-- --------------------------------------------------------

--
-- Table structure for table `cw_summoners_history`
--

CREATE TABLE IF NOT EXISTS `cw_summoners_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `matchId` bigint(20) NOT NULL,
  `championId` int(11) NOT NULL,
  `matchDuration` int(11) NOT NULL,
  `matchCreation` bigint(20) NOT NULL,
  `matchType` varchar(50) NOT NULL,
  `kills` int(11) NOT NULL,
  `deaths` int(11) NOT NULL,
  `assists` int(11) NOT NULL,
  `creeps` int(11) NOT NULL,
  `victory` int(11) NOT NULL,
  `side` int(11) NOT NULL,
  `ally1` int(11) NOT NULL,
  `ally2` int(11) NOT NULL,
  `ally3` int(11) NOT NULL,
  `ally4` int(11) NOT NULL,
  `enemy1` int(11) NOT NULL,
  `enemy2` int(11) NOT NULL,
  `enemy3` int(11) NOT NULL,
  `enemy4` int(11) NOT NULL,
  `enemy5` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

-- --------------------------------------------------------

--
-- Table structure for table `cw_users`
--

CREATE TABLE IF NOT EXISTS `cw_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `avatar` varchar(200) NOT NULL,
  `isAdvanced` tinyint(1) NOT NULL,
  `isValidated` tinyint(1) NOT NULL,
  `rank` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`mail`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

-- --------------------------------------------------------

--
-- Table structure for table `cw_users_friends`
--

CREATE TABLE IF NOT EXISTS `cw_users_friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `friendId` int(11) NOT NULL,
  `dateAdd` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `cw_users_stats`
--

CREATE TABLE IF NOT EXISTS `cw_users_stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `dateInscription` datetime DEFAULT NULL,
  `challEntered` int(11) DEFAULT NULL,
  `challWon` int(11) NOT NULL,
  `challCreated` int(11) NOT NULL,
  `commentPosted` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idUser` (`idUser`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
