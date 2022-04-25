-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 25 avr. 2022 à 20:45
-- Version du serveur :  5.7.24
-- Version de PHP : 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `twotter`
--

-- --------------------------------------------------------

--
-- Structure de la table `twoots`
--

CREATE TABLE `twoots` (
  `userId` int(16) NOT NULL,
  `postId` int(16) NOT NULL,
  `parentId` int(16) NOT NULL,
  `content` varchar(255) NOT NULL,
  `date` varchar(16) NOT NULL,
  `likeCount` int(16) NOT NULL,
  `mediaPath` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `twoots`
--

INSERT INTO `twoots` (`userId`, `postId`, `parentId`, `content`, `date`, `likeCount`, `mediaPath`) VALUES
(9, 1, 0, 'test de julien', '04.25.22', 0, '../images/media/'),
(9, 2, 0, 'test de julien à nouveau', '04.25.22', 0, '../images/media/'),
(9, 3, 0, 'Le gras c est la vie', '04.25.22', 0, '../images/media/revolte.gif'),
(9, 4, 0, 'Git quand il y a un conflit de version :', '04.25.22', 0, '../images/media/quest-ce-a-dire-que-ceci.gif'),
(9, 5, 0, 'Quand tu merge 2 branches, git be like :', '04.25.22', 0, '../images/media/le-nouveau-code.gif');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `nickname` varchar(64) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `id` int(64) NOT NULL,
  `pdpPath` varchar(100) DEFAULT NULL,
  `banPath` varchar(100) DEFAULT NULL,
  `Nom` varchar(100) DEFAULT NULL,
  `desc` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`nickname`, `password`, `id`, `pdpPath`, `banPath`, `Nom`, `desc`) VALUES
('Antoine', 'a55b4047a44f654dec81f4a29d9bece204a4b8e9179f7e282abfc51c8b6c28eb', 9, '../images/pp/revolte.gif', NULL, 'Antoine', 'On est fort ! ...en pommes'),
('AdrVrg', 'db96f67f5285c29f52734693296eeb3f71dff4ae3d18ac2e5d36d0364ced7b4a', 10, '../images/pp/téléchargé.jpg', NULL, 'Patrick V.E', 'J apprécie les fruits au sirop.'),
('Karadoc', 'dc6d0026cfefaac20e111970c06253afed02992f3549126eb781bf969a6ae09b', 11, '../images/pp/karadoc.png', NULL, 'Karadoc de Vannes', 'La neige qui pourdoie dans la solitude de notre enfance');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `twoots`
--
ALTER TABLE `twoots`
  ADD PRIMARY KEY (`postId`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `twoots`
--
ALTER TABLE `twoots`
  MODIFY `postId` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
