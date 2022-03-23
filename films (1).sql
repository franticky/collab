-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 23 mars 2022 à 07:48
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
  `affiche_film` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_film`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `films`
--

INSERT INTO `films` (`id_film`, `nom_film`, `realisateur_film`, `scenariste_film`, `studio_film`, `genre_film`, `annee_film`, `duree_film`, `pays_film`, `resume_film`, `recommandation_film`, `affiche_film`) VALUES
(1, 'No mercy for the rude', 'Cheol-hie Park', 'Cheol-hie Park', 'Tubes Pictures', 'Action Comédie Thriller', 2006, '02:01:00', 'Coree', 'Un tueur a gages muet jure de ne tuer que les grossier personnages.', 1, '../collab/img/NoMercyfortherude.jpg'),
(2, 'The Host', 'Bong Joon Ho', 'Bong Joon Ho', '', 'Drame Horreur', 2006, '02:00:00', 'Coree', 'An American military base releases toxic chemicals in the drain to the Han River. Six years later, a mutant squid monster leaves the water and attacks people.', 1, '../collab/img/thehost.jpg'),
(3, 'Nowhere to hide ', 'Myung-se Lee', 'Myung-se Lee', '', 'action drame policier', 2001, '01:52:00', 'Coree', 'Detective Woo is on the trail of a mysterious gangster, a master of disguise who always manages to elude his pursuers. ', 0, '../collab/img/Nowheretohide.jpg'),
(4, 'Anna', 'Luc Besson', 'Luc Besson', 'TF1 ', 'action thriller', 2019, '01:57:22', 'France', 'Under the guise of a fragile beauty, is hiding the world\'s most dangerous assassin, who has not yet misfired.', 1, '../collab/img/Anna.jpg'),
(5, 'Un homme a la hauteur', 'Laurent Tirard', 'Marcos Carnevale(original screenplay Corazon de Leon) Laurent Tirard(adaptation) Grégoire Vigneron', 'M6', 'Romance', 2016, '01:36:23', 'France', 'Diane tries to overcome the prejudices of society and her own fears to experience the best time of her life', 1, '../collab/img/Unhommealahauteur.jpg'),
(6, 'Rec4', 'Jaume Balagueró', 'Jaume Balagueró Manu Díaz', 'filmax', 'horreur', 2014, '02:00:21', 'Espagne', 'Ángela Vidal, is taken to an oil tanker miles off shore which has been especially equipped for a quarantine.', 1, '../collab/img/Rec4.jpg'),
(7, 'Ploy', 'Pen-Ek Ratanaruang', 'Pen-Ek Ratanaruang', 'Five Star', 'drame', 2008, '01:45:13', 'Thaïlande', ' A highly detailed psychological drama with three strangers inside one hotel.', 1, '../collab/img/ploy.jpg'),
(8, 'The Eye 2', 'Danny Pang Oxide Chun Pang', 'Yuet-Jan Hui Lawrence Cheng', 'Film Workshop', 'Horreur', 2004, '01:35:38', 'HK Singapour', 'Pregnant Joey teeters on the brink of madness after several fruitless suicide attempts. She\'s the unwilling recipient of an influx of shadowy images that haunt her pervasively.', 0, '../collab/img/theeye2.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
