-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 24 mars 2022 à 13:43
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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id_admin`, `prenom_admin`, `nom_admin`, `email_admin`, `password_admin`, `pays_admin`, `naissance_admin`, `telephone_admin`, `pseudo_admin`, `liste_admin`) VALUES
(1, 'jean', 'prune', 'prune@citron.com', 'prunjuic3', 'france', '2005-03-01', 61548978, 'ju1ce', 0),
(2, 'bernadette', 'rummy', 'brunette@aol.fr', 'babacool@urum', 'france', '2005-03-16', 978745878, 'babarumcoco', 1),
(3, 'sherie', 'farinn', 'sheriefaismoi@aol.com', 'sh3ri3', 'france', '2013-03-20', 978745878, 'faismoapeur', 0);

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

DROP TABLE IF EXISTS `films`;
CREATE TABLE IF NOT EXISTS `films` (
  `id_film` int(11) NOT NULL AUTO_INCREMENT,
  `nom_film` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `realisateur_film` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `genre_film` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `annee_film` year(4) NOT NULL,
  `duree_film` datetime NOT NULL,
  `pays_film` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resume_film` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `recommandation_film` tinyint(1) NOT NULL,
  `affiche_film` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_film`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `films`
--

INSERT INTO `films` (`id_film`, `nom_film`, `realisateur_film`, `genre_film`, `annee_film`, `duree_film`, `pays_film`, `resume_film`, `recommandation_film`, `affiche_film`) VALUES
(1, 'No mercy for the rude', 'Cheol-hie Park', 'Action Comédie Thriller', 2006, '2022-03-24 02:01:00', 'Coree', 'Un tueur a gages muet jure de ne tuer que les grossier personnages.', 1, '../collab/img/NoMercyfortherude.jpg'),
(2, 'The Host', 'Bong Joon Ho', 'Drame Horreur', 2006, '2022-03-24 02:00:00', 'Coree', 'An American military base releases toxic chemicals in the drain to the Han River. Six years later, a mutant squid monster leaves the water and attacks people.', 1, '../collab/img/thehost.jpg'),
(3, 'Nowhere to hide ', 'Myung-se Lee', 'action drame policier', 2001, '2022-03-24 01:52:00', 'Coree', 'Detective Woo is on the trail of a mysterious gangster, a master of disguise who always manages to elude his pursuers. ', 0, '../collab/img/Nowheretohide.jpg'),
(4, 'Anna', 'Luc Besson', 'action thriller', 2019, '2022-03-24 01:57:22', 'France', 'Under the guise of a fragile beauty, is hiding the world\'s most dangerous assassin, who has not yet misfired.', 1, '../collab/img/Anna.jpg'),
(5, 'Un homme a la hauteur', 'Laurent Tirard', 'Romance', 2016, '2022-03-24 01:36:23', 'France', 'Diane tries to overcome the prejudices of society and her own fears to experience the best time of her life', 1, '../collab/img/Unhommealahauteur.jpg'),
(6, 'Rec4', 'Jaume Balagueró', 'horreur', 2014, '2022-03-24 02:00:21', 'Espagne', 'Ángela Vidal, is taken to an oil tanker miles off shore which has been especially equipped for a quarantine.', 1, '../collab/img/Rec4.jpg'),
(7, 'Ploy', 'Pen-Ek Ratanaruang', 'drame', 2008, '2022-03-24 01:45:13', 'Thaïlande', ' A highly detailed psychological drama with three strangers inside one hotel.', 1, '../collab/img/ploy.jpg'),
(8, 'The Eye 2', 'Danny Pang Oxide Chun Pang', 'Horreur', 2004, '2022-03-24 01:35:38', 'HK Singapour', 'Pregnant Joey teeters on the brink of madness after several fruitless suicide attempts. She\'s the unwilling recipient of an influx of shadowy images that haunt her pervasively.', 0, '../collab/img/theeye2.jpg');

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
