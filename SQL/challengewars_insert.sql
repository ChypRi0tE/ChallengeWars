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

--
-- Dumping data for table `cw_challenges`
--

INSERT INTO `cw_challenges` (`id`, `title`, `dateCreation`, `dateEnd`, `idCreator`, `idPrize`, `description`, `isAdvanced`, `status`, `cost`, `type`, `champion`, `winner`) VALUES
(1, 'Test challenge 1', '2015-02-08 15:33:00', '2015-02-11 15:33:00', 1, 1, 'Ceci est un challenge de test', 0, 1, 0, 3, 412, 0),
(2, 'Test Featured', '2015-02-09 15:33:00', '2015-02-14 09:44:00', 1, 1, 'Un challenge featuré', 1, 1, 100, 1, 77, 0),
(3, 'Challenge open test2', '2015-02-04 09:33:00', '2015-02-12 06:52:00', 1, 1, 'Test non featured quand memem', 0, 1, 0, 2, 40, 0),
(4, 'Test challenge fermé', '2015-02-08 18:18:00', '2015-02-12 19:26:00', 1, 1, 'Challenge fermé c''est trop triste', 0, 2, 0, 1, 42, 17),
(24, 'Test type', '2015-03-06 01:30:45', '2015-03-12 19:30:45', 1, 1, '', 0, 1, 0, 1, 23, 0),
(23, 'test fin', '2015-03-06 00:53:46', '2015-03-12 18:53:46', 26, 1, '', 0, 1, 0, 3, 43, 0),
(25, 'test de test', '2015-03-06 15:44:48', '2015-03-13 09:44:48', 34, 1, 'yo bitch', 0, 1, 0, 1, 13, 0),
(22, 'War Legend', '2015-03-06 00:51:17', '2015-03-12 18:51:17', 17, 1, 'tes', 0, 1, 0, 3, 1, 0),
(21, 'Against All Authority', '2015-03-06 00:42:43', '2015-03-12 18:42:43', 17, 1, 'Test', 0, 1, 0, 3, 121, 0);

--
-- Dumping data for table `cw_challenges_comments`
--

INSERT INTO `cw_challenges_comments` (`id`, `idChallenge`, `idUser`, `datePost`, `content`) VALUES
(1, 2, 2, '2015-02-13 10:28:16', 'Commentaire de test'),
(7, 2, 17, '2015-02-27 10:38:31', 'Coucou les copains'),
(8, 2, 17, '2015-02-27 10:39:02', 'Teeeeeeeeeeeeeeeeeeeeeeeeeeeeest'),
(9, 2, 17, '2015-02-27 10:39:30', 'caca?'),
(10, 2, 17, '2015-02-27 10:40:30', 'Et lÃ  normalement Ã§a pown'),
(11, 1, 17, '2015-02-27 10:48:55', 'Test'),
(12, 1, 17, '2015-02-27 16:51:10', 'fdqs'),
(13, 1, 17, '2015-02-28 13:05:54', 'Teeeeeeeeeeeeeeest'),
(14, 1, 17, '2015-02-28 13:06:38', 'Caca'),
(15, 2, 26, '2015-03-02 13:26:48', 'et comment on devient advanced member? On suce les admins?'),
(16, 3, 17, '2015-03-04 19:10:50', 'Test'),
(17, 2, 1, '2015-03-06 15:30:51', 'ohlalala'),
(18, 9, 1, '2015-03-04 06:26:00', 'test'),
(19, 2, 3, '2015-03-02 08:49:45', 'caca'),
(20, 1, 26, '2015-03-06 17:29:52', 'prout?\r\n'),
(21, 1, 26, '2015-03-06 17:30:35', 'caca?');

--
-- Dumping data for table `cw_challenges_entries`
--

INSERT INTO `cw_challenges_entries` (`id`, `idChallenge`, `idUser`, `dateEntry`) VALUES
(1, 3, 1, '2015-02-12 00:00:00'),
(28, 3, 26, '2015-03-02 13:26:15'),
(17, 3, 17, '2015-02-27 16:51:40'),
(31, 9, 26, '2015-03-04 19:52:23'),
(32, 11, 26, '2015-03-04 21:11:36'),
(33, 1, 26, '2015-03-05 18:04:44'),
(34, 21, 26, '2015-03-06 00:44:53'),
(37, 1, 34, '2015-03-06 15:44:03'),
(38, 3, 34, '2015-03-06 15:44:06'),
(39, 21, 34, '2015-03-06 15:44:13'),
(40, 22, 34, '2015-03-06 15:44:16'),
(41, 23, 34, '2015-03-06 15:44:23'),
(42, 24, 34, '2015-03-06 15:44:29'),
(43, 25, 34, '2015-03-06 15:44:53');

--
-- Dumping data for table `cw_challenges_rankings`
--

INSERT INTO `cw_challenges_rankings` (`id`, `challengeId`, `userId`, `points`) VALUES
(1, 1, 1, 10),
(2, 1, 23, 5),
(3, 1, 26, 5);

--
-- Dumping data for table `cw_lol_champions`
--

INSERT INTO `cw_lol_champions` (`id`, `name`, `cleanName`) VALUES
(266, 'Aatrox', 'Aatrox'),
(412, 'Thresh', 'Thresh'),
(23, 'Tryndamere', 'Tryndamere'),
(79, 'Gragas', 'Gragas'),
(69, 'Cassiopeia', 'Cassiopeia'),
(78, 'Poppy', 'Poppy'),
(13, 'Ryze', 'Ryze'),
(14, 'Sion', 'Sion'),
(1, 'Annie', 'Annie'),
(43, 'Karma', 'Karma'),
(111, 'Nautilus', 'Nautilus'),
(99, 'Lux', 'Lux'),
(103, 'Ahri', 'Ahri'),
(2, 'Olaf', 'Olaf'),
(112, 'Viktor', 'Viktor'),
(34, 'Anivia', 'Anivia'),
(86, 'Garen', 'Garen'),
(27, 'Singed', 'Singed'),
(127, 'Lissandra', 'Lissandra'),
(57, 'Maokai', 'Maokai'),
(25, 'Morgana', 'Morgana'),
(28, 'Evelynn', 'Evelynn'),
(105, 'Fizz', 'Fizz'),
(238, 'Zed', 'Zed'),
(74, 'Heimerdinger', 'Heimerdinger'),
(68, 'Rumble', 'Rumble'),
(82, 'Mordekaiser', 'Mordekaiser'),
(37, 'Sona', 'Sona'),
(55, 'Katarina', 'Katarina'),
(22, 'Ashe', 'Ashe'),
(117, 'Lulu', 'Lulu'),
(30, 'Karthus', 'Karthus'),
(12, 'Alistar', 'Alistar'),
(122, 'Darius', 'Darius'),
(67, 'Vayne', 'Vayne'),
(110, 'Varus', 'Varus'),
(77, 'Udyr', 'Udyr'),
(126, 'Jayce', 'Jayce'),
(89, 'Leona', 'Leona'),
(134, 'Syndra', 'Syndra'),
(80, 'Pantheon', 'Pantheon'),
(92, 'Riven', 'Riven'),
(42, 'Corki', 'Corki'),
(268, 'Azir', 'Azir'),
(51, 'Caitlyn', 'Caitlyn'),
(76, 'Nidalee', 'Nidalee'),
(3, 'Galio', 'Galio'),
(85, 'Kennen', 'Kennen'),
(45, 'Veigar', 'Veigar'),
(150, 'Gnar', 'Gnar'),
(104, 'Graves', 'Graves'),
(90, 'Malzahar', 'Malzahar'),
(254, 'Vi', 'Vi'),
(10, 'Kayle', 'Kayle'),
(39, 'Irelia', 'Irelia'),
(64, 'Lee Sin', 'LeeSin'),
(60, 'Elise', 'Elise'),
(106, 'Volibear', 'Volibear'),
(20, 'Nunu', 'Nunu'),
(4, 'Twisted Fate', 'TwistedFate'),
(24, 'Jax', 'Jax'),
(102, 'Shyvana', 'Shyvana'),
(429, 'Kalista', 'Kalista'),
(36, 'Dr. Mundo', 'DrMundo'),
(63, 'Brand', 'Brand'),
(131, 'Diana', 'Diana'),
(113, 'Sejuani', 'Sejuani'),
(8, 'Vladimir', 'Vladimir'),
(154, 'Zac', 'Zac'),
(133, 'Quinn', 'Quinn'),
(84, 'Akali', 'Akali'),
(18, 'Tristana', 'Tristana'),
(120, 'Hecarim', 'Hecarim'),
(15, 'Sivir', 'Sivir'),
(236, 'Lucian', 'Lucian'),
(107, 'Rengar', 'Rengar'),
(19, 'Warwick', 'Warwick'),
(72, 'Skarner', 'Skarner'),
(54, 'Malphite', 'Malphite'),
(157, 'Yasuo', 'Yasuo'),
(101, 'Xerath', 'Xerath'),
(17, 'Teemo', 'Teemo'),
(75, 'Nasus', 'Nasus'),
(58, 'Renekton', 'Renekton'),
(119, 'Draven', 'Draven'),
(35, 'Shaco', 'Shaco'),
(50, 'Swain', 'Swain'),
(115, 'Ziggs', 'Ziggs'),
(40, 'Janna', 'Janna'),
(91, 'Talon', 'Talon'),
(61, 'Orianna', 'Orianna'),
(9, 'Fiddlesticks', 'FiddleSticks'),
(114, 'Fiora', 'Fiora'),
(33, 'Rammus', 'Rammus'),
(7, 'LeBlanc', 'Leblanc'),
(26, 'Zilean', 'Zilean'),
(16, 'Soraka', 'Soraka'),
(56, 'Nocturne', 'Nocturne'),
(222, 'Jinx', 'Jinx'),
(83, 'Yorick', 'Yorick'),
(6, 'Urgot', 'Urgot'),
(21, 'Miss Fortune', 'MissFortune'),
(62, 'Wukong', 'Wukong'),
(53, 'Blitzcrank', 'Blitzcrank'),
(98, 'Shen', 'Shen'),
(201, 'Braum', 'Braum'),
(5, 'Xin Zhao', 'XinZhao'),
(29, 'Twitch', 'Twitch'),
(11, 'Master Yi', 'MasterYi'),
(44, 'Taric', 'Taric'),
(32, 'Amumu', 'Amumu'),
(41, 'Gangplank', 'Gangplank'),
(48, 'Trundle', 'Trundle'),
(38, 'Kassadin', 'Kassadin'),
(143, 'Zyra', 'Zyra'),
(267, 'Nami', 'Nami'),
(59, 'Jarvan IV', 'JarvanIV'),
(81, 'Ezreal', 'Ezreal'),
(31, 'Cho''Gath', 'Chogath'),
(421, 'LeBlanc', 'Leblanc'),
(96, 'Kog''Maw', 'KogMaw'),
(121, 'Kha''Zix', 'Khazix');

--
-- Dumping data for table `cw_summoners`
--

INSERT INTO `cw_summoners` (`id`, `userId`, `summonerId`, `summonerName`, `nbGames`, `dateValidation`, `lastSync`) VALUES
(1, 1, 20002219, 'Chypriote', 0, '2015-03-01 19:48:00', '2015-03-05 16:23:00'),
(27, 17, 40662980, 'yaaheeeeee', 0, '2015-03-04 03:44:00', '2015-03-06 01:15:00'),
(17, 23, 20007473, 'TSLee Chokichoc', 0, '2015-03-03 19:55:00', '2015-03-06 22:20:00'),
(35, 27, 24757196, 'Ooredounet', 0, '2015-03-05 10:56:00', '2015-03-05 11:49:00'),
(34, 26, 37996431, 'PsyK0tiKzz', 0, '2015-03-04 14:35:00', '2015-03-06 23:29:00');

--
-- Dumping data for table `cw_summoners_history`
--

INSERT INTO `cw_summoners_history` (`id`, `userId`, `matchId`, `championId`, `matchDuration`, `matchCreation`, `matchType`, `kills`, `deaths`, `assists`, `creeps`, `victory`, `side`, `ally1`, `ally2`, `ally3`, `ally4`, `enemy1`, `enemy2`, `enemy3`, `enemy4`, `enemy5`) VALUES
(1, 1, 123456, 266, 2036, 1425246561690, '', 7, 2, 3, 125, 1, 100, 43, 79, 69, 111, 28, 105, 122, 67, 3),
(50, 1, 1997646251, 25, 1997, 1425417467275, 'RANKED_TEAM_5x5', 0, 6, 10, 32, 0, 100, 14, 157, 1, 42, 89, 127, 254, 104, 105),
(49, 1, 1997580873, 89, 1499, 1425414457539, 'RANKED_TEAM_5x5', 2, 5, 11, 21, 0, 200, 14, 157, 1, 42, 89, 127, 254, 104, 105),
(47, 1, 1996633774, 1, 1911, 1425338595687, 'RANKED_SOLO_5x5', 5, 5, 9, 34, 0, 100, 103, 222, 254, 114, 35, 105, 21, 3, 25),
(48, 1, 1996640389, 15, 2394, 1425341099254, 'RANKED_SOLO_5x5', 5, 12, 13, 288, 0, 200, 91, 69, 12, 104, 53, 101, 150, 11, 15),
(46, 1, 1996544044, 1, 2333, 1425335694601, 'RANKED_SOLO_5x5', 4, 6, 9, 61, 0, 100, 429, 103, 120, 1, 412, 101, 104, 121, 58),
(45, 1, 1996340836, 412, 2093, 1425332009432, 'RANKED_TEAM_5x5', 0, 8, 18, 39, 1, 200, 7, 39, 80, 89, 412, 103, 24, 59, 67),
(44, 1, 1996212113, 89, 2079, 1425328847383, 'RANKED_TEAM_5x5', 0, 9, 8, 36, 0, 100, 101, 421, 236, 39, 53, 20, 120, 4, 15),
(42, 1, 1995214002, 40, 1755, 1425246561690, 'RANKED_TEAM_5x5', 0, 4, 20, 18, 1, 200, 119, 9, 267, 61, 40, 113, 104, 101, 14),
(43, 1, 1996138767, 89, 1421, 1425326627885, 'RANKED_TEAM_5x5', 0, 6, 5, 24, 0, 100, 5, 105, 103, 104, 412, 222, 7, 59, 14),
(41, 17, 1998080557, 85, 2310, 1425433824100, 'RANKED_SOLO_5x5', 4, 10, 4, 175, 0, 200, 222, 254, 53, 55, 40, 101, 64, 81, 85),
(40, 17, 1996609714, 79, 1946, 1425338718259, 'RANKED_SOLO_5x5', 6, 3, 5, 200, 1, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(39, 17, 1995361338, 412, 1341, 1425249712746, 'RANKED_SOLO_5x5', 3, 2, 12, 28, 1, 100, 68, 429, 9, 412, 236, 64, 89, 39, 1),
(38, 17, 1995256260, 429, 1945, 1425247187284, 'RANKED_SOLO_5x5', 8, 8, 8, 141, 1, 100, 254, 58, 53, 429, 90, 104, 122, 12, 32),
(37, 17, 1993289366, 68, 2760, 1425164647968, 'RANKED_TEAM_5x5', 7, 5, 22, 201, 1, 200, 103, 89, 83, 222, 412, 51, 7, 68, 57),
(36, 17, 1993270861, 39, 1698, 1425162498067, 'RANKED_TEAM_5x5', 2, 5, 10, 197, 1, 100, 101, 201, 421, 39, 127, 25, 92, 111, 104),
(35, 17, 1993174958, 85, 3239, 1425158734348, 'RANKED_TEAM_5x5', 7, 13, 14, 195, 0, 200, 37, 80, 42, 90, 18, 76, 25, 238, 85),
(34, 17, 1991701524, 68, 2426, 1425080462493, 'RANKED_TEAM_5x5', 7, 11, 12, 162, 0, 200, 89, 421, 59, 61, 25, 91, 81, 68, 64),
(33, 17, 1991639828, 85, 2223, 1425077786517, 'RANKED_TEAM_5x5', 11, 7, 16, 179, 1, 200, 222, 8, 7, 254, 412, 85, 91, 59, 96),
(32, 17, 1988657772, 429, 2483, 1424900147475, 'RANKED_SOLO_5x5', 5, 14, 11, 227, 0, 100, 80, 117, 429, 103, 150, 55, 254, 51, 1),
(51, 1, 1997756864, 40, 2751, 1425421872298, 'RANKED_SOLO_5x5', 0, 5, 19, 45, 0, 100, 222, 40, 107, 84, 7, 14, 28, 1, 81),
(52, 23, 1996160428, 68, 2369, 1425327018550, 'RANKED_SOLO_5x5', 6, 7, 16, 164, 1, 200, 113, 201, 61, 238, 19, 222, 127, 68, 40),
(53, 23, 1996545170, 61, 2102, 1425335925113, 'RANKED_SOLO_5x5', 11, 5, 19, 175, 1, 200, 222, 150, 55, 89, 22, 81, 113, 39, 61),
(54, 23, 1996608337, 103, 1850, 1425338483168, 'RANKED_SOLO_5x5', 3, 6, 4, 221, 0, 100, 103, 25, 8, 421, 7, 98, 121, 21, 53),
(55, 23, 1996696466, 238, 2152, 1425340885991, 'RANKED_SOLO_5x5', 10, 5, 4, 218, 1, 200, 68, 120, 16, 119, 238, 11, 412, 79, 42),
(56, 23, 1996754570, 103, 2161, 1425343618362, 'RANKED_SOLO_5x5', 5, 3, 23, 209, 1, 200, 119, 69, 64, 92, 103, 104, 8, 43, 80),
(57, 23, 1997638626, 7, 1661, 1425417485872, 'RANKED_SOLO_5x5', 8, 8, 4, 128, 0, 100, 222, 7, 421, 412, 104, 120, 53, 90, 76),
(58, 23, 1997706401, 61, 2201, 1425419822159, 'RANKED_SOLO_5x5', 15, 7, 14, 218, 1, 200, 40, 75, 421, 69, 67, 64, 61, 150, 16),
(59, 23, 1997822176, 412, 1846, 1425422752422, 'RANKED_SOLO_5x5', 1, 9, 9, 38, 0, 200, 222, 238, 59, 25, 105, 81, 57, 7, 412),
(60, 23, 1998977619, 7, 2301, 1425501515203, 'RANKED_SOLO_5x5', 7, 5, 10, 170, 0, 200, 222, 238, 59, 25, 105, 81, 57, 7, 412),
(61, 23, 1999028140, 103, 1717, 1425504309191, 'RANKED_SOLO_5x5', 4, 7, 5, 180, 0, 200, 1, 53, 55, 54, 103, 80, 51, 150, 25);

--
-- Dumping data for table `cw_users`
--

INSERT INTO `cw_users` (`id`, `username`, `mail`, `password`, `avatar`, `isAdvanced`, `isValidated`, `rank`, `points`) VALUES
(1, 'ChypRiotE', 'nicolastem@hotmail.fr', '81dc9bdb52d04dc20036dbd8313ed055', '744', 1, 1, 1, 250),
(2, 'deleted', 'caca@prout.fr', 'ab4f63f9ac65152575886860dde480a1', '0', 0, 0, 0, 20),
(17, 'Cocotier', 'cococ@coco.co', '47481886ae44887ffd5b79fcd9093c48', '581', 0, 1, 0, 80),
(33, 'teste', 'caca', '4', '0', 0, 0, 0, 30),
(26, 'psyk0tikz', 'tzada.rock@gmail.com', 'c4114a9dac62ff2bd705e0fa0d32d199', '548', 0, 1, 1, 60),
(23, 'chokichoc', 'selim093@hotmail.fr', '3ed7dceaf266cafef032b9d5db224717', '781', 0, 1, 0, 20),
(27, 'Coucou', 'coucou@lol.fr', '721a9b52bfceacc503c056e3b9b93cfa', '23', 0, 1, 0, 30),
(34, 'testtoto', 'test@test.com', '4458139ac7c8798a817685818c48b35b', '0', 0, 0, 0, 20);

--
-- Dumping data for table `cw_users_friends`
--

INSERT INTO `cw_users_friends` (`id`, `userId`, `friendId`, `dateAdd`) VALUES
(5, 17, 27, '2015-03-06 05:37:00'),
(7, 26, 17, '2015-03-06 11:31:00'),
(8, 26, 34, '2015-03-06 11:31:00'),
(9, 26, 1, '2015-03-06 11:31:00');

--
-- Dumping data for table `cw_users_stats`
--

INSERT INTO `cw_users_stats` (`id`, `idUser`, `dateInscription`, `challEntered`, `challWon`, `challCreated`, `commentPosted`) VALUES
(1, 1, '2015-02-13 23:06:00', 1, 2, 5, 1),
(2, 2, '2015-02-14 00:03:00', 0, 0, 0, 1),
(3, 17, '2015-02-26 12:05:44', 1, 0, 2, 9),
(4, 26, '2015-03-02 07:12:19', 5, 0, 9, 7),
(5, 23, '2015-03-01 09:34:00', 0, 0, 0, 0),
(6, 27, '2015-03-05 04:51:59', 0, 0, 0, 0),
(7, 33, '2015-03-05 10:49:04', 0, 0, 0, 0),
(8, 34, '2015-03-06 09:43:26', 7, 0, 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
