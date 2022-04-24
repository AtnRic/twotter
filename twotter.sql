-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : Dim 24 avr. 2022 à 14:30
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
(9, 33, 0, 'test de Julien', '04.22.22', 0, '../images/media/35-mirabelles-fesses.gif'),
(9, 34, 0, 'test de julien à nouveau', '04.22.22', 0, '../images/media/en-garde-ma-mignonne.gif'),
(9, 35, 0, 'test', '04.23.22', 0, '../images/media/'),
(9, 36, 0, 'test de julien', '04.23.22', 0, '../images/media/caca-des-canards-cest-caca.gif'),
(9, 37, 0, 'On bute Karadoc', '04.24.22', 0, '../images/media/'),
(9, 38, 0, 'On bute Karadoc', '04.24.22', 0, '../images/media/'),
(9, 39, 0, 'Elle est où la poulette ?', '04.24.22', 0, '../images/media/debile-et-innatendu.gif');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `nickname` varchar(64) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `id` int(64) NOT NULL,
  `pdpPath` varchar(16) DEFAULT NULL,
  `Nom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`nickname`, `password`, `id`, `pdpPath`, `Nom`) VALUES
('AdrVr', 'Verhaeghe10', 1, NULL, ''),
('pokpo', 'Verhaeghe10', 3, NULL, ''),
('pokpopl', 'Verhaeghe10', 4, NULL, ''),
('AdrVrg', 'oijoij', 5, NULL, ''),
('iuhiuh', 'Verhaeghe10', 6, NULL, ''),
('opkpokpg', 'Verhaeghe10', 7, NULL, ''),
('AdrVr', 'Verhaeghe10', 8, NULL, ''),
('Antoine', 'a55b4047a44f654dec81f4a29d9bece204a4b8e9179f7e282abfc51c8b6c28eb', 9, NULL, '');

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
  MODIFY `postId` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
