-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 22 mars 2022 à 15:17
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `quelfilm`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `prenom_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nom_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `naissance_user` datetime NOT NULL,
  `telephone_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pays_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `liste_user` tinyint(1) NOT NULL,
  `pseudo_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `prenom_user`, `nom_user`, `email_user`, `password_user`, `naissance_user`, `telephone_user`, `pays_user`, `liste_user`, `pseudo_user`) VALUES
(1, 'charles', 'sanchez', 'charlessans@charge.com', 'ch@rles', '2022-03-22 10:29:34', '5555-785-489', 'USA', 0, 'darles'),
(2, 'Corry', 'Ousse', 'Orc@seco.com', 'Cor3ou', '2022-03-22 10:40:57', '06 24 52 13 16', 'France', 1, 'Corryindahouse'),
(3, 'Victor', 'Zit', 'visitor@aol.com', 'v1s1t0r', '2022-03-22 10:43:19', '06 32 58 78 96', 'France', 0, 'Visitor'),
(4, 'Carmelia', 'Leorride', 'leo@ca.com', 'cam1l30', '2022-03-22 10:44:35', '06 78 48 59 86', 'France', 1, 'zeCameleon'),
(5, 'margareth', 'Cianer', 'cian3rr@aol.com', 'seeannmadj11', '2022-03-22 10:47:36', '06c 75 85 99 41', 'italy', 0, 'themaggieseeanns');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
