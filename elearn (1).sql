-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 31 août 2022 à 13:18
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `elearn`
--

-- --------------------------------------------------------

--
-- Structure de la table `allusers`
--

CREATE TABLE `allusers` (
  `id` int(11) NOT NULL DEFAULT '0',
  `nom` varchar(70) CHARACTER SET latin1 NOT NULL,
  `prenom` varchar(70) CHARACTER SET latin1 NOT NULL,
  `sex` varchar(10) CHARACTER SET latin1 NOT NULL,
  `email` varchar(70) CHARACTER SET latin1 NOT NULL,
  `phone` bigint(50) NOT NULL,
  `quartier` varchar(70) CHARACTER SET latin1 DEFAULT NULL,
  `ville` varchar(70) CHARACTER SET latin1 NOT NULL,
  `login` varchar(70) CHARACTER SET latin1 NOT NULL,
  `password` varchar(70) CHARACTER SET latin1 NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `role` varchar(70) CHARACTER SET latin1 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `grade` varchar(70) CHARACTER SET latin1 NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `photo` varchar(70) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `allusers`
--

INSERT INTO `allusers` (`id`, `nom`, `prenom`, `sex`, `email`, `phone`, `quartier`, `ville`, `login`, `password`, `date_creation`, `role`, `status`, `grade`, `date_naissance`, `photo`) VALUES
(1, 'DJOUKA', 'Hilary', 'feminin', 'hilary@gmail.com', 693971959, 'essomba', 'yaounde', 'choco', '12345678', '2021-09-13 13:24:40', 'student', 1, '', '2021-08-30', 'img/Madjou.jpg'),
(9, 'MBA', 'Mendes', 'feminin', 'i@gmail.com', 678945123, 'mfou', 'douala', 'love', '12345678', '2021-09-13 09:30:39', 'teacher', 1, 'ingenieur', '2021-07-26', NULL),
(12, 'MADJOU', 'Hilary', 'feminin', 'hilarymadjou02@gmail.com', 693971959, 'essomba', 'yaounde', 'cynthia', 'lovemyself', '2021-09-07 13:04:02', 'admin', 1, '', '2002-02-05', NULL),
(13, 'kana', 'rodrigue', 'masculin', 'Rodrigue@gmail.com', 693157849, 'Mokolo', 'yaounde', 'doux ami', 'rodrigue', '2021-09-13 13:12:15', 'teacher', 1, 'Developpeur Web', '1999-07-03', NULL),
(14, 'chimi', 'steve', 'masculin', 'stevechimi@gmail.com', 651479235, 'Mfou', 'yaounde', 'lechimi', 'chimamelure', '2021-09-13 13:15:16', 'teacher', 1, 'Analyste', '1994-06-13', NULL),
(15, 'kamdem', 'rodrigue', 'masculin', 'rodriguekam@gmail.com', 672147895, 'Nkometou', 'yaounde', 'lerodriguo', 'rodriguez', '2021-09-13 13:17:34', 'teacher', 1, 'Marketiste', '1992-11-13', NULL),
(1, 'DJOUKA', 'Hilary', 'feminin', 'hilary@gmail.com', 693971959, 'essomba', 'yaounde', 'choco', '12345678', '2021-09-13 13:24:40', 'student', 1, '', '2021-08-30', 'img/Madjou.jpg'),
(9, 'MBA', 'Mendes', 'feminin', 'i@gmail.com', 678945123, 'mfou', 'douala', 'love', '12345678', '2021-09-13 09:30:39', 'teacher', 1, 'ingenieur', '2021-07-26', NULL),
(12, 'MADJOU', 'Hilary', 'feminin', 'hilarymadjou02@gmail.com', 693971959, 'essomba', 'yaounde', 'cynthia', 'lovemyself', '2021-09-07 13:04:02', 'admin', 1, '', '2002-02-05', NULL),
(13, 'kana', 'rodrigue', 'masculin', 'Rodrigue@gmail.com', 693157849, 'Mokolo', 'yaounde', 'doux ami', 'rodrigue', '2021-09-13 13:12:15', 'teacher', 1, 'Developpeur Web', '1999-07-03', NULL),
(14, 'chimi', 'steve', 'masculin', 'stevechimi@gmail.com', 651479235, 'Mfou', 'yaounde', 'lechimi', 'chimamelure', '2021-09-13 13:15:16', 'teacher', 1, 'Analyste', '1994-06-13', NULL),
(15, 'kamdem', 'rodrigue', 'masculin', 'rodriguekam@gmail.com', 672147895, 'Nkometou', 'yaounde', 'lerodriguo', 'rodriguez', '2021-09-13 13:17:34', 'teacher', 1, 'Marketiste', '1992-11-13', NULL),
(0, 'kana', 'rodrigue', 'masculin', 'rodriguekana@yahoo.com', 693766521, 'biyem assi', 'douala', 'douxami', 'douxami1234', '2021-09-21 10:49:26', 'student', 1, '', '2021-09-21', '');

-- --------------------------------------------------------

--
-- Structure de la table `billets_forum`
--

CREATE TABLE `billets_forum` (
  `id` int(11) NOT NULL,
  `contenu` varchar(70) CHARACTER SET latin1 NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id` int(11) NOT NULL,
  `libelle` varchar(70) CHARACTER SET latin1 NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cree_par` varchar(70) CHARACTER SET latin1 NOT NULL,
  `fichiers` varchar(70) CHARACTER SET latin1 NOT NULL,
  `id_formation` int(11) NOT NULL,
  `size` varchar(20) CHARACTER SET latin1 NOT NULL,
  `ext` varchar(20) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id`, `libelle`, `date_creation`, `cree_par`, `fichiers`, `id_formation`, `size`, `ext`) VALUES
(1, 'bases de BIRT', '2021-10-06 22:37:35', 'DJOUKA Hilary', 'img/bases de BIRT.pdf', 20, '208426', 'pdf');

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE `formations` (
  `id` int(11) NOT NULL,
  `libelle` varchar(70) CHARACTER SET latin1 NOT NULL,
  `description` varchar(255) NOT NULL,
  `prix` varchar(50) CHARACTER SET latin1 NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nombre_cours` int(11) DEFAULT NULL,
  `cree_par` varchar(70) CHARACTER SET latin1 NOT NULL,
  `type` varchar(70) CHARACTER SET latin1 NOT NULL,
  `duree` varchar(70) CHARACTER SET latin1 NOT NULL,
  `photo` varchar(70) CHARACTER SET latin1 NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `formations`
--

INSERT INTO `formations` (`id`, `libelle`, `description`, `prix`, `date_creation`, `nombre_cours`, `cree_par`, `type`, `duree`, `photo`, `update_date`) VALUES
(13, 'Bureautique', ' Permettre &agrave; l&rsquo;apprenant de ma&icirc;triser l&rsquo;utili', '20 000', '2021-09-12 23:27:21', 0, 'MADJOU Hilary', 'public', '48', 'img/Bureautique.png', '0000-00-00 00:00:00'),
(14, 'Maitrise de l ordinateur', 'Permettre &agrave; l&rsquo;apprenant de ma&icirc;triser l&rsquo;ordina', '20 000', '2021-09-12 23:30:09', 0, 'MADJOU Hilary', 'public', '19', 'img/Maitrise de l ordinateur.jpg', '0000-00-00 00:00:00'),
(15, 'Gestion des projets informatique', 'Ma&icirc;triser les techniques et principes de base pour g&eacute;rer ', '30 000', '2021-09-12 23:33:00', 0, 'MADJOU Hilary', 'personnalisee', '48', 'img/Gestion des projets informatique.png', '0000-00-00 00:00:00'),
(18, 'Developpement app web avec webDevass', 'permettre aux apprenants de pouvoir analyser une situation concr&egrav', '100 000', '2021-09-12 23:39:55', 0, 'MADJOU Hilary', 'personnalisee', '54', 'img/Developpement app web avec webDevass.jpg', '0000-00-00 00:00:00'),
(20, 'Business Intelligent Report', 'Permettre aux apprenants de produire des &eacute;tats et rapports des ', '90 000', '2021-09-13 09:33:55', 0, 'MBA Mendes', 'personnalisee', '26', 'img/Business Intelligent Report.jpg', '0000-00-00 00:00:00'),
(22, 'Gestion de projets avec Microsoft Project', 'Apprendre &agrave; utiliser Microsoft Project pour planifier et suivre', '82 150', '2021-09-13 09:33:55', 0, 'MBA Mendes', 'personnalisee', '72', 'img/Gestion de projets avec Microsoft Project.png', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `formations_students`
--

CREATE TABLE `formations_students` (
  `id_formation` int(11) NOT NULL,
  `id_student` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `formations_students`
--

INSERT INTO `formations_students` (`id_formation`, `id_student`) VALUES
(13, 1),
(13, 1);

-- --------------------------------------------------------

--
-- Structure de la table `forums`
--

CREATE TABLE `forums` (
  `id` int(11) NOT NULL,
  `nom` varchar(70) CHARACTER SET latin1 NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `meeting`
--

CREATE TABLE `meeting` (
  `id` int(11) NOT NULL,
  `formation_id` int(11) DEFAULT NULL,
  `meeting_password` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `meeting`
--

INSERT INTO `meeting` (`id`, `formation_id`, `meeting_password`, `date`) VALUES
(1, 13, 'icFOMvzw28', '2021-10-02 14:09:12'),
(2, 13, '54lrHpDiqs', '2021-10-02 14:09:12'),
(3, 13, 'qBl1Vt8sXN', '2021-10-02 14:09:12'),
(4, 13, 'zWFgIbiun0', '2021-10-02 14:09:12'),
(5, 13, 'PpK2zHdIG9', '2021-10-02 14:09:12'),
(6, 20, 'aIwH9XNrdF', '2021-10-02 14:09:12'),
(7, 20, 'ZFpGePrdJO', '2021-10-02 14:09:12'),
(8, 20, 'j2IRuo48v1', '2021-10-02 14:09:12'),
(9, 18, 'xAh6MHjqVZ', '2021-10-02 14:09:12'),
(10, 13, 'A5ZdHCXMce', '2021-10-02 14:09:12'),
(11, 13, 'J2jvNAHDCd', '2021-10-02 14:09:12'),
(12, 13, 'NiCG4RTBE5', '2021-10-02 14:09:12'),
(13, 13, 'tm0UH2KECl', '2021-10-02 14:09:12'),
(14, 13, 'sAIU07NROy', '2021-10-02 14:09:12'),
(15, 13, 'smaJAdT5Vq', '2021-10-02 14:09:12'),
(16, 13, '2zx9mVMebu', '2021-10-02 14:09:12'),
(17, 13, 'MUc1EyfviK', '2021-10-02 14:09:12'),
(18, 13, 'pQjU2vOg5L', '2021-10-02 14:09:12'),
(19, 13, '8y2aogtAdB', '2021-10-02 14:09:12'),
(20, 13, 'p17NTHLf8J', '2021-10-02 14:09:12'),
(21, 13, 'JjagnfOIQo', '2021-10-02 14:09:12'),
(22, 13, 'hKRst9ZioU', '2021-10-02 14:09:12'),
(23, 13, 'bXDMYPfEvJ', '2021-10-02 14:09:12'),
(24, 13, '1zljh4SJIe', '2021-10-02 14:09:12'),
(25, 13, 'VYxUj0QKuC', '2021-10-02 14:09:12'),
(26, 13, 'EO6nizNhQw', '2021-10-02 14:09:12'),
(27, 13, 'mWXMnKH2UP', '2021-10-02 14:09:12'),
(28, 13, 'nloOh1NLMr', '2021-10-02 14:09:12'),
(29, 13, 'NRnZwT15Vu', '2021-10-02 14:09:12'),
(30, 13, 'tNzGT43gse', '2021-10-02 14:09:12'),
(31, 13, 'u0CiOSJ25j', '2021-10-02 14:11:21'),
(32, 13, 'nHIwfCq2Tk', '2021-10-02 14:20:57'),
(33, 15, 'vpDofxMnmH', '2021-10-03 05:42:49'),
(34, 15, 'KslAEX8yFa', '2021-10-03 05:46:22'),
(35, 15, 'BGpvxMlIju', '2021-10-03 05:47:52'),
(36, 15, 'XiQ0q8V1wN', '2021-10-03 05:50:20'),
(37, 15, '84QUeZM7tq', '2021-10-03 05:50:33'),
(38, 15, 'VDLF3SNCsr', '2021-10-03 05:51:22'),
(39, 15, 'L24qYUjEV7', '2021-10-03 20:53:46'),
(40, 0, 'EYaUx2XPfv', '2021-10-04 05:01:55'),
(41, 0, 'FBCHms1UDq', '2021-10-04 05:02:57'),
(42, 20, 'pB4oZAs8wQ', '2021-10-04 05:06:57'),
(43, 20, 'JoQ5DIl4Za', '2021-10-04 05:08:27'),
(44, 20, 'e1ub3WiLXE', '2021-10-04 05:10:59'),
(45, 20, 'Airbp62feG', '2021-10-04 05:14:10'),
(46, 13, 'sunK2mQBv1', '2021-10-04 05:15:12'),
(47, 20, '0S8v6oWOsH', '2021-10-04 05:23:58'),
(48, 13, 'PGYbjEUB2m', '2021-10-15 11:27:43'),
(49, 13, 'RaLuAEFpO1', '2022-08-30 14:22:49');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `contenu` varchar(70) CHARACTER SET latin1 NOT NULL,
  `date_message` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `receiver` int(11) DEFAULT NULL,
  `sender` int(11) DEFAULT NULL,
  `links` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `contenu`, `date_message`, `receiver`, `sender`, `links`) VALUES
(1, 'Le code pour notre cour par VisioConference est: icFOMvzw28', '2021-09-18 16:15:52', 1, 9, 'video.php'),
(2, 'Le code pour notre cour par VisioConference est: 54lrHpDiqs', '2021-09-18 16:22:36', 1, 9, 'video.php'),
(3, 'Le code pour notre cour par VisioConference est: qBl1Vt8sXN', '2021-09-18 16:45:32', 1, 9, 'video.php'),
(4, 'Le code pour notre cour par VisioConference est: qBl1Vt8sXN', '2021-09-18 16:45:32', 1, 9, 'video.php'),
(5, 'Le code pour notre cour par VisioConference est: zWFgIbiun0', '2021-09-18 16:45:36', 1, 9, 'video.php'),
(6, 'Le code pour notre cour par VisioConference est: zWFgIbiun0', '2021-09-18 16:45:36', 1, 9, 'video.php'),
(7, 'Le code pour notre cour par VisioConference est: PpK2zHdIG9', '2021-09-18 16:53:31', 1, 9, 'video.php'),
(8, 'Le code pour notre cour par VisioConference est: PpK2zHdIG9', '2021-09-18 16:53:31', 1, 9, 'video.php'),
(9, 'Le code pour notre cour par VisioConference est: A5ZdHCXMce', '2021-09-20 15:51:48', 1, 9, 'video.php'),
(10, 'Le code pour notre cour par VisioConference est: A5ZdHCXMce', '2021-09-20 15:51:48', 1, 9, 'video.php'),
(11, 'Le code pour notre cour par VisioConference est: J2jvNAHDCd', '2021-09-20 17:03:01', 1, 9, 'video.php'),
(12, 'Le code pour notre cour par VisioConference est: J2jvNAHDCd', '2021-09-20 17:03:01', 1, 9, 'video.php'),
(13, 'Le code pour notre cour par VisioConference est: NiCG4RTBE5', '2021-09-22 10:31:56', 1, 9, 'video.php'),
(14, 'Le code pour notre cour par VisioConference est: NiCG4RTBE5', '2021-09-22 10:31:56', 1, 9, 'video.php'),
(15, 'Le code pour notre cour par VisioConference est: tm0UH2KECl', '2021-09-22 10:33:52', 1, 9, 'video.php'),
(16, 'Le code pour notre cour par VisioConference est: tm0UH2KECl', '2021-09-22 10:33:52', 1, 9, 'video.php'),
(17, 'Le code pour notre cour par VisioConference est: sAIU07NROy', '2021-09-22 10:34:25', 1, 9, 'video.php'),
(18, 'Le code pour notre cour par VisioConference est: sAIU07NROy', '2021-09-22 10:34:25', 1, 9, 'video.php'),
(19, 'Le code pour notre cour par VisioConference est: smaJAdT5Vq', '2021-09-22 10:36:23', 1, 9, 'video.php'),
(20, 'Le code pour notre cour par VisioConference est: smaJAdT5Vq', '2021-09-22 10:36:23', 1, 9, 'video.php'),
(21, 'Le code pour notre cour par VisioConference est: 2zx9mVMebu', '2021-09-22 10:37:58', 1, 9, 'video.php'),
(22, 'Le code pour notre cour par VisioConference est: 2zx9mVMebu', '2021-09-22 10:37:58', 1, 9, 'video.php'),
(23, 'Le code pour notre cour par VisioConference est: MUc1EyfviK', '2021-09-22 10:41:33', 1, 9, 'video.php'),
(24, 'Le code pour notre cour par VisioConference est: MUc1EyfviK', '2021-09-22 10:41:33', 1, 9, 'video.php'),
(25, 'Le code pour notre cour par VisioConference est: pQjU2vOg5L', '2021-09-22 10:41:50', 1, 9, 'video.php'),
(26, 'Le code pour notre cour par VisioConference est: pQjU2vOg5L', '2021-09-22 10:41:50', 1, 9, 'video.php'),
(27, 'Le code pour notre cour par VisioConference est: 8y2aogtAdB', '2021-09-22 10:56:26', 1, 9, 'video.php'),
(28, 'Le code pour notre cour par VisioConference est: 8y2aogtAdB', '2021-09-22 10:56:26', 1, 9, 'video.php'),
(29, 'Le code pour notre cour par VisioConference est: p17NTHLf8J', '2021-09-22 10:58:49', 1, 9, 'video.php'),
(30, 'Le code pour notre cour par VisioConference est: p17NTHLf8J', '2021-09-22 10:58:49', 1, 9, 'video.php'),
(31, 'Le code pour notre cour par VisioConference est: JjagnfOIQo', '2021-09-22 11:06:13', 1, 9, 'video.php'),
(32, 'Le code pour notre cour par VisioConference est: JjagnfOIQo', '2021-09-22 11:06:13', 1, 9, 'video.php'),
(33, 'Le code pour notre cour par VisioConference est: hKRst9ZioU', '2021-09-22 11:06:18', 1, 9, 'video.php'),
(34, 'Le code pour notre cour par VisioConference est: hKRst9ZioU', '2021-09-22 11:06:18', 1, 9, 'video.php'),
(35, 'Le code pour notre cour par VisioConference est: bXDMYPfEvJ', '2021-09-22 11:14:21', 1, 9, 'video.php'),
(36, 'Le code pour notre cour par VisioConference est: bXDMYPfEvJ', '2021-09-22 11:14:21', 1, 9, 'video.php'),
(37, 'Le code pour notre cour par VisioConference est: 1zljh4SJIe', '2021-09-28 09:58:38', 1, 9, 'video.php'),
(38, 'Le code pour notre cour par VisioConference est: 1zljh4SJIe', '2021-09-28 09:58:38', 1, 9, 'video.php'),
(39, 'Le code pour notre cour par VisioConference est: VYxUj0QKuC', '2021-09-28 09:59:55', 1, 9, 'video.php'),
(40, 'Le code pour notre cour par VisioConference est: VYxUj0QKuC', '2021-09-28 09:59:55', 1, 9, 'video.php'),
(41, 'Le code pour notre cour par VisioConference est: EO6nizNhQw', '2021-09-30 11:14:57', 1, 14, 'video.php'),
(42, 'Le code pour notre cour par VisioConference est: EO6nizNhQw', '2021-09-30 11:14:57', 1, 14, 'video.php'),
(43, 'Le code pour notre cour par VisioConference est: mWXMnKH2UP', '2021-09-30 11:19:16', 1, 14, 'video.php'),
(44, 'Le code pour notre cour par VisioConference est: mWXMnKH2UP', '2021-09-30 11:19:16', 1, 14, 'video.php'),
(45, 'Le code pour notre cour par VisioConference est: nloOh1NLMr', '2021-09-30 11:27:55', 1, 14, 'video.php'),
(46, 'Le code pour notre cour par VisioConference est: nloOh1NLMr', '2021-09-30 11:27:55', 1, 14, 'video.php'),
(47, 'Le code pour notre cour par VisioConference est: NRnZwT15Vu', '2021-09-30 11:32:40', 1, 14, 'video.php'),
(48, 'Le code pour notre cour par VisioConference est: NRnZwT15Vu', '2021-09-30 11:32:40', 1, 14, 'video.php'),
(49, 'Le code pour notre cour par VisioConference est: tNzGT43gse', '2021-10-02 14:05:15', 1, 9, 'video.php'),
(50, 'Le code pour notre cour par VisioConference est: tNzGT43gse', '2021-10-02 14:05:15', 1, 9, 'video.php'),
(51, 'Le code pour notre cour par VisioConference est: u0CiOSJ25j', '2021-10-02 14:11:25', 1, 14, 'video.php'),
(52, 'Le code pour notre cour par VisioConference est: u0CiOSJ25j', '2021-10-02 14:11:25', 1, 14, 'video.php'),
(53, 'Le code pour notre cour par VisioConference est: nHIwfCq2Tk', '2021-10-02 14:21:01', 1, 14, 'video.php'),
(54, 'Le code pour notre cour par VisioConference est: nHIwfCq2Tk', '2021-10-02 14:21:01', 1, 14, 'video.php'),
(55, 'Le code pour votre cours par VisioConference est:JoQ5DIl4Za', '2021-10-04 05:08:30', 1, 1, 'video.php'),
(56, 'Le code pour votre cours par VisioConference est:e1ub3WiLXE', '2021-10-04 05:11:03', 1, 1, 'video.php'),
(57, 'Le code pour votre cours par VisioConference est:Airbp62feG', '2021-10-04 05:14:14', 1, 1, 'video.php'),
(58, 'Le code pour votre cours par VisioConference est:0S8v6oWOsH', '2021-10-04 05:24:01', 1, 1, 'video.php');

-- --------------------------------------------------------

--
-- Structure de la table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `id_formation` int(11) NOT NULL,
  `date_paiement` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `numero` bigint(20) NOT NULL,
  `nom_compte` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `payment`
--

INSERT INTO `payment` (`id`, `id_student`, `id_formation`, `date_paiement`, `numero`, `nom_compte`) VALUES
(1, 1, 20, '2021-10-02 21:26:29', 690971959, 'hilary'),
(2, 1, 14, '2021-10-15 11:25:48', 654123874, 'hilary');

-- --------------------------------------------------------

--
-- Structure de la table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `libelle` varchar(70) CHARACTER SET latin1 NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cree_par` varchar(70) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(70) CHARACTER SET latin1 NOT NULL,
  `prenom` varchar(70) CHARACTER SET latin1 NOT NULL,
  `sex` varchar(10) CHARACTER SET latin1 NOT NULL,
  `email` varchar(70) CHARACTER SET latin1 NOT NULL,
  `phone` bigint(50) NOT NULL,
  `quartier` varchar(70) CHARACTER SET latin1 DEFAULT NULL,
  `ville` varchar(70) CHARACTER SET latin1 NOT NULL,
  `login` varchar(70) CHARACTER SET latin1 NOT NULL,
  `password` varchar(70) CHARACTER SET latin1 NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `role` varchar(70) CHARACTER SET latin1 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `grade` varchar(70) CHARACTER SET latin1 NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `photo` varchar(70) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `sex`, `email`, `phone`, `quartier`, `ville`, `login`, `password`, `date_creation`, `role`, `status`, `grade`, `date_naissance`, `photo`) VALUES
(1, 'DJOUKA', 'Hilary', 'feminin', 'hilary@gmail.com', 693971959, 'essomba', 'yaounde', 'choco', '12345678', '2021-09-13 13:24:40', 'student', 1, '', '2021-08-30', 'img/Madjou.jpg'),
(12, 'MADJOU', 'Hilary', 'feminin', 'hilarymadjou02@gmail.com', 693971959, 'essomba', 'yaounde', 'cynthia', 'lovemyself', '2021-09-07 13:04:02', 'admin', 1, '', '2002-02-05', NULL),
(13, 'kana', 'rodrigue', 'masculin', 'Rodrigue@gmail.com', 693157849, 'Mokolo', 'yaounde', 'doux ami', 'rodrigue', '2021-09-13 13:12:15', 'teacher', 1, 'Developpeur Web', '1999-07-03', NULL),
(14, 'chimi', 'steve', 'masculin', 'hilarymadjou02@gmail.com', 651479235, 'Mfou', 'yaounde', 'lechimi', 'chimamelure', '2021-09-30 11:18:52', 'teacher', 1, 'Analyste', '1994-06-13', NULL),
(15, 'kamdem', 'rodrigue', 'masculin', 'rodriguekam@gmail.com', 672147895, 'Nkometou', 'yaounde', 'lerodriguo', 'rodriguez', '2021-09-13 13:17:34', 'teacher', 1, 'Marketiste', '1992-11-13', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `billets_forum`
--
ALTER TABLE `billets_forum`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_formation` (`id_formation`);

--
-- Index pour la table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `formations_students`
--
ALTER TABLE `formations_students`
  ADD KEY `id_formation` (`id_formation`),
  ADD KEY `id_student` (`id_student`);

--
-- Index pour la table `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_student` (`id_student`),
  ADD KEY `id_formation` (`id_formation`);

--
-- Index pour la table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `billets_forum`
--
ALTER TABLE `billets_forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `formations`
--
ALTER TABLE `formations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `forums`
--
ALTER TABLE `forums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT pour la table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `cours_ibfk_1` FOREIGN KEY (`id_formation`) REFERENCES `formations` (`id`);

--
-- Contraintes pour la table `formations_students`
--
ALTER TABLE `formations_students`
  ADD CONSTRAINT `formations_students_ibfk_1` FOREIGN KEY (`id_formation`) REFERENCES `formations` (`id`),
  ADD CONSTRAINT `formations_students_ibfk_2` FOREIGN KEY (`id_student`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`id_student`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`id_formation`) REFERENCES `formations` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
