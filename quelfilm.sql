-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 21 mars 2022 à 09:54
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
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `prenom_admin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nom_admin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_admin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_admin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pays_admin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `naissance_admin` date NOT NULL,
  `telephone_admin` int(11) NOT NULL,
  `pseudo_admin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `liste_admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

DROP TABLE IF EXISTS `films`;
CREATE TABLE IF NOT EXISTS `films` (
  `id_film` int(11) NOT NULL AUTO_INCREMENT,
  `nom_film` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `realisateur_film` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `scenariste_film` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `studio_film` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `genre_film` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `annee_film` year(4) NOT NULL,
  `duree_film` time NOT NULL,
  `pays_film` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resume_film` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `recommandation_film` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_film`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
