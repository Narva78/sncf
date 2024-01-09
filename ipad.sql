-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 09 jan. 2024 à 10:39
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `ecran`
--

INSERT INTO `ecran` (`id_ecran`, `taille`, `marque`, `types`, `quantite`) VALUES
(6, 45, 'Mac', 'incurvé', 5),
(2, 55, 'Philips', 'incurvé', 20),
(13, 155, 'dell', 'plat', 2),
(5, 95, 'lenovo', 'incurvé', 56),
(7, 90, 'dell', 'incurvé', 14),
(8, 90, 'hp', 'incurvé', 100),
(10, 64, 'huawei', 'plat', 17),
(14, 64, 'samsung', 'incurvé', 47);

-- --------------------------------------------------------

--
-- Structure de la table `ipad`
--

DROP TABLE IF EXISTS `ipad`;
CREATE TABLE IF NOT EXISTS `ipad` (
  `id_ipad` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `cp_Agent` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `inc` varchar(50) NOT NULL,
  `Code_RG` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mytem` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `date_demande` date NOT NULL,
  `type_demande` varchar(40) NOT NULL,
  `type_materiel` varchar(40) NOT NULL,
  `type_panne` varchar(40) NOT NULL,
  `observation` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `Icloud` tinyint NOT NULL,
  `CodeDev` tinyint NOT NULL,
  `imei` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `imei_remp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_ipad`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `ipad`
--

INSERT INTO `ipad` (`id_ipad`, `cp_Agent`, `nom`, `prenom`, `inc`, `Code_RG`, `mytem`, `date_demande`, `type_demande`, `type_materiel`, `type_panne`, `observation`, `Icloud`, `CodeDev`, `imei`, `imei_remp`) VALUES
(71, '9508900L', 'cora', '', 'INC58652565114', 'ETPNU', 'TRACTION78786', '2024-01-30', 'panne', 'Ipad2020', 'casse ecran', '0', 0, 0, '', ''),
(73, '97139', 'kiting leyla', '', 'INC58652561', 'ETPNU', 'TRACTION825452', '2024-01-12', 'casse', 'Ipad2020', 'casse ecran', '0', 26, 127, '256696232620316', '69594941'),
(72, '97129', 'cyrille', '', 'INC39655', 'ETPLC', 'TRACTION825452', '2024-02-09', 'panne', 'Ipad2020', 'Panne tactile', 'lors du passage de m a', 127, 0, '126226326952169', '484454955958499'),
(63, '9962963', 'cora', '', 'INC5865256', 'ETPNU', 'TRACTION78786', '2024-01-21', 'panne', 'Ipad2020', 'ne s\'allume plus', 'ecran noir', 1, 0, '94632152654', '69594941');

-- --------------------------------------------------------

--
-- Structure de la table `pc`
--

DROP TABLE IF EXISTS `pc`;
CREATE TABLE IF NOT EXISTS `pc` (
  `id_pc` int NOT NULL AUTO_INCREMENT,
  `marque` varchar(200) NOT NULL,
  `nSerie` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `modele` varchar(100) NOT NULL,
  `quantite` int NOT NULL,
  PRIMARY KEY (`id_pc`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `pc`
--

INSERT INTO `pc` (`id_pc`, `marque`, `nSerie`, `modele`, `quantite`) VALUES
(4, 'samsung', '4848gfyfiyf7', 'Galaxy book', 55),
(3, 'MacBook', '28LvBT22', 'Pro', 0),
(5, 'samsung', '295237', 'pass', 5),
(6, 'samsung', '04092004', 'Galaxy book', 56),
(7, 'samsung', '12051969', 'Galaxy book pro', 2),
(8, ' dell', '523459', 'pro', 22),
(9, 'lenovo', '263145', 'prod', 65),
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
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
