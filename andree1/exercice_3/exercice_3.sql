-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 03 sep. 2018 à 16:40
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `exercice_3`
--

-- --------------------------------------------------------

--
-- Structure de la table `movies`
--

CREATE TABLE `movies` (
  `id_movies` int(3) NOT NULL,
  `title` varchar(255) NOT NULL,
  `actors` varchar(255) NOT NULL,
  `director` varchar(255) NOT NULL,
  `producer` varchar(255) NOT NULL,
  `year_of_prod` date NOT NULL,
  `language` varchar(255) NOT NULL,
  `category` enum('fantastique','comique','romantique','historique') NOT NULL,
  `storyline` text NOT NULL,
  `video` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `movies`
--

INSERT INTO `movies` (`id_movies`, `title`, `actors`, `director`, `producer`, `year_of_prod`, `language`, `category`, `storyline`, `video`) VALUES
(1, 'hhhhhhhhhhhhhhhhh', 'hhhhhhhhhhhhhhhhh', 'hhhhhhhhhhhhhhhhh', 'hhhhhhhhhhhhhhh', '0000-00-00', '', 'fantastique', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhh', ''),
(2, 'ffffffffffffffffffffffffff', 'jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 'jjjjjjjjjjjjjjjjjjjjjjjjjjj', 'jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '0000-00-00', '', 'fantastique', 'jjllllllllllllllllllllllllllll', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id_movies`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `movies`
--
ALTER TABLE `movies`
  MODIFY `id_movies` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
