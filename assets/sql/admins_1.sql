-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 25 mars 2022 à 10:18
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
