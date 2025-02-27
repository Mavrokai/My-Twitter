-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 27 fév. 2025 à 20:18
-- Version du serveur : 8.0.41-0ubuntu0.24.04.1
-- Version de PHP : 8.3.17
SET
    SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
    time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `My_Twitter`
--
-- --------------------------------------------------------
--
-- Structure de la table `Users`
--
CREATE TABLE
    `Users` (
        `user_id` int NOT NULL,
        `username` varchar(50) NOT NULL,
        `display_name` varchar(100) NOT NULL,
        `password_hash` char(40) NOT NULL,
        `email` varchar(100) NOT NULL,
        `bio` text,
        `date_of_birth` date DEFAULT NULL,
        `theme_id` int DEFAULT '1',
        `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;

--
-- Index pour les tables déchargées
--
--
-- Index pour la table `Users`
--
ALTER TABLE `Users` ADD PRIMARY KEY (`user_id`),
ADD UNIQUE KEY `username` (`username`),
ADD UNIQUE KEY `email` (`email`),
ADD KEY `theme_id` (`theme_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--
--
-- AUTO_INCREMENT pour la table `Users`
--
ALTER TABLE `Users` MODIFY `user_id` int NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--
--
-- Contraintes pour la table `Users`
--
ALTER TABLE `Users` ADD CONSTRAINT `Users_ibfk_1` FOREIGN KEY (`theme_id`) REFERENCES `Themes` (`theme_id`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;