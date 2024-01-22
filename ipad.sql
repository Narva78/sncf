-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 22 jan. 2024 à 08:38
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ipad`
--

-- --------------------------------------------------------

--
-- Structure de la table `agent`
--

DROP TABLE IF EXISTS `agent`;
CREATE TABLE IF NOT EXISTS `agent` (
  `id_Agent` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `affectation` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `cp_Agent` varchar(30) NOT NULL,
  PRIMARY KEY (`id_Agent`)
) ENGINE=InnoDB AUTO_INCREMENT=2;

--
-- Déchargement des données de la table `agent`
--

INSERT INTO `agent` (`id_Agent`, `affectation`, `nom`, `prenom`, `cp_Agent`) VALUES
(1, 'Ligne N&U', 'Dai', 'Johann', '9508900L');

-- --------------------------------------------------------

--
-- Structure de la table `ecran`
--

DROP TABLE IF EXISTS `ecran`;
CREATE TABLE IF NOT EXISTS `ecran` (
  `id_ecran` int NOT NULL AUTO_INCREMENT,
  `taille` float NOT NULL,
  `marque` varchar(200) NOT NULL,
  `types` varchar(100) NOT NULL,
  `quantite` int NOT NULL,
  PRIMARY KEY (`id_ecran`)
) ENGINE=MyISAM AUTO_INCREMENT=16;

--
-- Déchargement des données de la table `ecran`
--

INSERT INTO `ecran` (`id_ecran`, `taille`, `marque`, `types`, `quantite`) VALUES
(6, 45, 'samsung', 'incurvé', 5),
(2, 55, 'Philips', 'incurvé', 20),
(13, 155, 'dell', 'incurvé', 2),
(5, 95, 'lenovo', 'incurvé', 56),
(7, 90, 'dell', 'incurvé', 14),
(10, 64, 'samsung', 'incurvé', 17),
(14, 64, 'samsung', 'incurvé', 47),
(15, 120, 'samsung', 'plat', 10);

-- --------------------------------------------------------

--
-- Structure de la table `ipad`
--

DROP TABLE IF EXISTS `ipad`;
CREATE TABLE IF NOT EXISTS `ipad` (
  `id_ipad` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `cp_Agent` varchar(15) ,
  `nom` varchar(60) ,
  `residence` varchar(50) NOT NULL,
  `inc` varchar(50) NOT NULL,
  `Code_RG` varchar(30) ,
  `mytem` varchar(40),
  `date_demande` date NOT NULL,
  `type_demande` varchar(40) NOT NULL,
  `type_materiel` varchar(40) NOT NULL,
  `type_panne` varchar(40) NOT NULL,
  `observation` text,
  `Icloud` tinyint NOT NULL,
  `CodeDev` tinyint NOT NULL,
  `imei` varchar(15) ,
  `imei_remp` varchar(15) ,
  `reparable` tinyint NOT NULL,
  PRIMARY KEY (`id_ipad`)
) ENGINE=MyISAM AUTO_INCREMENT=89;

--
-- Déchargement des données de la table `ipad`
--

INSERT INTO `ipad` (`id_ipad`, `cp_Agent`, `nom`, `residence`, `inc`, `Code_RG`, `mytem`, `date_demande`, `type_demande`, `type_materiel`, `type_panne`, `observation`, `Icloud`, `CodeDev`, `imei`, `imei_remp`, `reparable`) VALUES
(71, '9508900L', 'cora', 'Trappe', 'INC58652565114', 'ETPNU', 'TRACTION78478', '2024-01-30', 'perte', 'Ipad2020', 'casse ecran', '', 0, 0, '456971236548658', '655236987835648', 1),
(73, '97139', 'kiting leyla', 'Dreux', 'INC58652561', 'ETPNU', 'TRACTION825452', '2024-01-12', 'casse', 'Ipad2020', 'casse ecran', '', 26, 127, '256696232620316', '69594941', 0),
(72, '97129', 'cyrille', 'Versaille', 'INC39655', 'ETPLC', 'TRACTION825452', '2024-02-09', 'panne', 'Ipad2020', 'Panne tactile', '', 127, 0, '126226326952169', '484454955958499', 1),
(83, '4646148912M', 'Bell MT', 'Versailles ', 'INC39654', 'ETPNU', 'TRACTION78478', '2024-01-29', 'casse', 'Ipad2020', 'probleme connexion wifi', '		Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus nihil sapiente hic blanditiis', 127, 127, '777777777777777', '333333333333333', 1),
(82, '58912M', 'ertyu', 'vanves', 'INC5865', 'ETPNU', NULL, '2024-01-31', 'perte', 'Ipad2020', 'casse ecran', '', 55, 0, '444444444444444', '622222222222222', 0),
(84, '4646458912M', 'Bell cranel', 'Versailles ', 'INC5865', 'ETPNU', NULL, '2024-01-27', 'casse', 'Ipad2020', 'casse ecran', '0', 55, 0, '466464646464646', '236589562346784', 0),
(85, '97139', 'kiting leyla', 'Versailles ', 'INC39655', 'ETPNU', 'TRACTION78786', '7431-03-04', 'casse', 'Ipad2020', 'casse ecran', '0', 127, 0, '789456132354788', '437435354444444', 0),
(88, '97129', 'Etienne', 'vanves', 'INC5865', 'ETPNU', 'TRACTION546646', '2024-02-11', 'perte', 'Ipad2017', 'casse ecran', '', 127, 127, '323659848152365', '946134679845132', 1);

-- --------------------------------------------------------

--
-- Structure de la table `pc`
--

DROP TABLE IF EXISTS `pc`;
CREATE TABLE IF NOT EXISTS `pc` (
  `id_pc` int NOT NULL AUTO_INCREMENT,
  `marque` varchar(200) NOT NULL,
  `nSerie` varchar(50) ,
  `modele` varchar(100) NOT NULL,
  `quantite` int NOT NULL,
  PRIMARY KEY (`id_pc`)
) ENGINE=MyISAM AUTO_INCREMENT=11;

--
-- Déchargement des données de la table `pc`
--

INSERT INTO `pc` (`id_pc`, `marque`, `nSerie`, `modele`, `quantite`) VALUES
(8, ' dell', '523459', 'pro', 22),
(10, ' dell', '848454694', 'torax', 4);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `is_admin` tinyint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `mdp`, `nom`, `prenom`, `is_admin`) VALUES
(2, 'Jdai', 'Jdai78', 'Dai', 'Johann', 0),
(3, 'Wravary', '123Adm', 'Ravary', 'William', 0),
(4, 'Jschattel', '123456', 'Schattel', 'Jerome', 0),
(9, 'ycyrille', 'ipad778', 'Cyrille', 'Yohann', 0),
(47, 'marco', 'victoir375', 'Marie', 'Veloude', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
