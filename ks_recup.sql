-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 29 juin 2020 à 13:46
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ks_recup`
--

-- --------------------------------------------------------

--
-- Structure de la table `operation`
--

DROP TABLE IF EXISTS `operation`;
CREATE TABLE IF NOT EXISTS `operation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `nbrJours` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `operation`
--

INSERT INTO `operation` (`id`, `libelle`, `adresse`, `ville`, `dateDebut`, `dateFin`, `nbrJours`) VALUES
(1, 'Baush lomb ', 'Palemerie PGP', 'Marrakech', '2020-01-10', '2020-01-16', 7),
(2, 'Allmangne', 'palais de congrés', 'Marrakech', '2020-01-17', '2020-01-20', 6),
(3, 'twansa', 'Palemerie PGP', 'Marrakech', '2020-01-21', '2020-01-24', 4),
(4, 'Bonagi Allmangne', 'Chapiteau Bonagui', 'Marrakech', '2020-01-25', '2020-01-26', 2),
(5, 'Mobadara sojon', 'Sofitel ', 'Rabat', '2020-01-28', '2020-01-31', 4),
(7, 'TCC Italy', 'PGP Palmerie', 'Marrakech', '2019-09-18', '2019-09-22', 5),
(8, 'Bay2a', 'Complex Hasna', 'Rabat', '2019-11-06', '2019-11-10', 5),
(9, 'Lmonadara Tacharokiya', 'Place Agadir', 'Agadir', '2019-12-09', '2019-12-15', 7),
(10, 'dakhla with Server-Tour', 'Palais De Congrès', 'Dakhla', '2019-10-11', '2019-10-22', 10),
(11, 'Palais de congre', 'Palais De Congrès', 'Marrakech', '2019-10-04', '2020-02-09', 6),
(12, 'APEC ngalza', 'Palais De Congrès', 'Marrakech', '2020-02-03', '2020-02-06', 4),
(13, 'Fillip Moris Italy', 'Palais De Congrès', 'Marrakech', '2020-02-08', '2020-02-11', 4),
(14, 'Mi Event Doctors', 'Palais De Congrès', 'Marrakech', '2020-02-18', '2020-02-23', 7),
(15, 'Kiam Renault', 'Melloussa Renault Tanger', 'Tanger', '2020-03-02', '2020-03-04', 3);

-- --------------------------------------------------------

--
-- Structure de la table `recuperation`
--

DROP TABLE IF EXISTS `recuperation`;
CREATE TABLE IF NOT EXISTS `recuperation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nbrJours` int(11) NOT NULL,
  `operation` int(11) NOT NULL,
  `etat` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_7yajgshxvcdwqat8fak6hn845` (`operation`),
  KEY `operation` (`operation`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `recuperation`
--

INSERT INTO `recuperation` (`id`, `nbrJours`, `operation`, `etat`) VALUES
(1, 2, 1, 1),
(2, 2, 2, 1),
(3, 2, 4, 1),
(4, 2, 12, 1),
(5, 2, 13, 1),
(6, 2, 14, 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `pass`) VALUES
(1, 'ss', 'ss@gmail.com', 'ss'),
(2, 'aa', 'aa@gmail.com', 'aa');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `recuperation`
--
ALTER TABLE `recuperation`
  ADD CONSTRAINT `recuperation_ibfk_1` FOREIGN KEY (`operation`) REFERENCES `operation` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
