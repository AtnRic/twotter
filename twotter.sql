-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : sam. 07 mai 2022 à 14:29
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
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `userId` int(64) NOT NULL,
  `postId` int(64) NOT NULL,
  `id` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`userId`, `postId`, `id`) VALUES
(10, 42, 22),
(10, 40, 23),
(10, 34, 24);

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
(9, 4, 0, 'Git quand il y a un conflit de version :', '04.25.22', 0, '../images/media/quest-ce-a-dire-que-ceci.gif'),
(9, 5, 0, 'Quand tu merge 2 branches, git be like :', '04.25.22', 0, '../images/media/le-nouveau-code.gif'),
(9, 7, 0, 'Mais vous êtes des MALAAAAAAAADES !', '04.27.22', 0, '../images/media/vous-etes-des-malades.webp'),
(9, 9, 0, 'Ce twoot est péremptoire par rapport au sol', '04.27.22', 0, '../images/media/'),
(9, 10, 0, 'J\'ai le droit d\'être deux jours pas chez moi puis deux jours chez moi', '04.27.22', 0, '../images/media/'),
(9, 11, 0, 'Tatan elle fait des flans', '04.27.22', 0, '../images/media/'),
(10, 12, 0, 'Un pain trop cuit.', '04.27.22', 0, '../images/media/merde-kaamelott.gif'),
(9, 15, 0, 'Il faut utiliser la partie sporadique ou boulière du fenouil', '04.27.22', 0, '../images/media/eventualite-battre-fenouil.gif'),
(10, 16, 0, 'Pardon ?', '04.27.22', 0, '../images/media/tumblr_o8mnuj9wZg1t36e8uo5_400.webp'),
(9, 17, 0, 'On s\'entraîne à trouver les objets redondants', '04.27.22', 0, '../images/media/'),
(10, 19, 0, 'Les notes de partiel.', '04.27.22', 0, '../images/media/télécharg.jpg'),
(9, 20, 0, 'Quand t\'as 14 au partiel de prog alors que ton code fonctionne', '04.27.22', 0, '../images/media/revolte.gif'),
(10, 21, 0, 'La classe après la découverte des notes.', '04.27.22', 0, '../images/media/mecreant.gif'),
(9, 22, 0, 'Quand tu vois le sujet de partiel de maths', '04.27.22', 0, '../images/media/moi-jai-toujours-dit.gif'),
(10, 23, 0, 'En cours de maths après le partiel de maths.', '04.27.22', 0, '../images/media/heretique-demon.gif'),
(9, 24, 0, 'les pc be like', '04.27.22', 0, '../images/media/trois-porcs.gif'),
(10, 25, 0, 'Le classement des élèves dans la classe.', '04.27.22', 0, '../images/media/impression-etre-insipide.gif'),
(9, 28, 0, 'l\'entropie est une dégradation de la qualité de l\'énergie', '04.27.22', 0, '../images/media/'),
(9, 29, 0, 'Je ne sais pas compter', '04.28.22', 0, '../images/media/ben-moi-non-plus.gif'),
(12, 32, 0, 'Merde.', '04.29.22', 0, '../images/media/'),
(9, 33, 0, 'Je vais vous découper le gras du cul, ça vous fera ça de moins à trimbaler', '05.02.22', 0, '../images/media/en-garde-ma-mignonne.gif'),
(9, 34, 0, 'Le plus important c\'est les valeurs', '05.02.22', 0, '../images/media/'),
(9, 35, 0, 'Quand t\'essaie de regarder toutes les branches d\'un arbre binaire :', '05.02.22', 0, '../images/media/téléchargé.jpg'),
(9, 36, 0, 'Les températures, c\'est rassurant', '05.02.22', 0, '../images/media/'),
(9, 37, 0, 'yolooo !', '05.07.22', 0, '../images/media/debile-et-innatendu.gif');

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
('Antoine', 'a55b4047a44f654dec81f4a29d9bece204a4b8e9179f7e282abfc51c8b6c28eb', 9, '../images/pp/vous-etes-des-malades.webp', '../images/ban/en-garde-ma-mignonne.gif', 'Antoine', 'On est fort ! ...en pommes'),
('AdrVrg', 'db96f67f5285c29f52734693296eeb3f71dff4ae3d18ac2e5d36d0364ced7b4a', 10, '../images/pp/merde-kaamelott.gif', NULL, 'Patrick Balkany', 'J\'apprécie les fruits au sirop. ON EST FORT... en pommes.'),
('Karadoc', 'dc6d0026cfefaac20e111970c06253afed02992f3549126eb781bf969a6ae09b', 11, '../images/pp/karadoc.png', NULL, 'Karadoc de Vannes', 'La neige qui pourdoie dans la solitude de notre enfance'),
('Léodagan', 'a55b4047a44f654dec81f4a29d9bece204a4b8e9179f7e282abfc51c8b6c28eb', 12, '../images/pp/léodagan2.PNG', NULL, 'Léodagan de Carmélide', 'Merde.');

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
  MODIFY `postId` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
