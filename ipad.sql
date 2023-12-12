-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 12 déc. 2023 à 11:10
-- Version du serveur :  8.0.35-0ubuntu0.20.04.1
-- Version de PHP : 7.4.3-4ubuntu2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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

CREATE TABLE `agent` (
  `id_Agent` int UNSIGNED NOT NULL,
  `affectation` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `cp_Agent` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `agent`
--

INSERT INTO `agent` (`id_Agent`, `affectation`, `nom`, `prenom`, `cp_Agent`) VALUES
(1, 'Ligne N&U', 'Dai', 'Johann', '9508900L');

-- --------------------------------------------------------

--
-- Structure de la table `ipad`
--

CREATE TABLE `ipad` (
  `id_ipad` int UNSIGNED NOT NULL,
  `cp_Agent` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `affectation` varchar(30) NOT NULL,
  `Icloud` tinyint NOT NULL,
  `CodeDev` tinyint NOT NULL,
  `date_Reception` date NOT NULL,
  `date_Attribution` date DEFAULT NULL,
  `debut_Rep` date DEFAULT NULL,
  `fin_Rep` date DEFAULT NULL,
  `non_reparable` tinyint NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `ipad`
--

INSERT INTO `ipad` (`id_ipad`, `cp_Agent`, `nom`, `prenom`, `affectation`, `Icloud`, `CodeDev`, `date_Reception`, `date_Attribution`, `debut_Rep`, `fin_Rep`, `non_reparable`) VALUES
(47, '7701210F', 'BELLAMY', 'Johann', 'LigneC', 0, 0, '2023-06-26', '2023-07-10', '2023-07-11', '0000-00-00', 0),
(32, '7904366C', 'YAKOUBI', 'Houcine', 'LigneC', 0, 0, '2023-05-05', '0000-00-00', '2023-05-10', '2023-05-15', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int UNSIGNED NOT NULL,
  `login` varchar(30) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `mdp`, `nom`, `prenom`) VALUES
(2, 'Jdai', 'Jdai78', 'Dai', 'Johann'),
(3, 'Wravary', '123Adm', 'Ravary', 'William'),
(4, 'Jschattel', '123456', 'Schattel', 'Jerome');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`id_Agent`);

--
-- Index pour la table `ipad`
--
ALTER TABLE `ipad`
  ADD PRIMARY KEY (`id_ipad`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `agent`
--
ALTER TABLE `agent`
  MODIFY `id_Agent` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `ipad`
--
ALTER TABLE `ipad`
  MODIFY `id_ipad` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
