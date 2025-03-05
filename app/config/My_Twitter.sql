-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 05 mars 2025 à 15:27
-- Version du serveur : 8.0.41-0ubuntu0.24.04.1
-- Version de PHP : 8.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `My_Twitter`
--

-- --------------------------------------------------------

--
-- Structure de la table `Follows`
--

CREATE TABLE `Follows` (
  `follower_id` int NOT NULL,
  `following_id` int NOT NULL,
  `followed_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Hashtags`
--

CREATE TABLE `Hashtags` (
  `hashtag_id` int NOT NULL,
  `tag` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Media`
--

CREATE TABLE `Media` (
  `media_id` int NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `short_url` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `MessageMedia`
--

CREATE TABLE `MessageMedia` (
  `message_id` int DEFAULT NULL,
  `media_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Messages`
--

CREATE TABLE `Messages` (
  `message_id` int NOT NULL,
  `sender_id` int NOT NULL,
  `receiver_id` int NOT NULL,
  `content` text NOT NULL,
  `sent_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `PostHashtag`
--

CREATE TABLE `PostHashtag` (
  `post_id` int NOT NULL,
  `hashtag_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `PostMedia`
--

CREATE TABLE `PostMedia` (
  `post_id` int DEFAULT NULL,
  `media_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Posts`
--

CREATE TABLE `Posts` (
  `post_id` int NOT NULL,
  `user_id` int NOT NULL,
  `content` varchar(140) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `reply_to` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Reposts`
--

CREATE TABLE `Reposts` (
  `post_id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Themes`
--

CREATE TABLE `Themes` (
  `theme_id` int NOT NULL,
  `theme_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Themes`
--

INSERT INTO `Themes` (`theme_id`, `theme_name`) VALUES
(1, 'Default Theme');

-- --------------------------------------------------------

--
-- Structure de la table `Users`
--

CREATE TABLE `Users` (
  `user_id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `display_name` varchar(100) NOT NULL,
  `password_hash` char(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `bio` text,
  `date_of_birth` date DEFAULT NULL,
  `theme_id` int DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Users`
--

INSERT INTO `Users` (`user_id`, `username`, `display_name`, `password_hash`, `email`, `bio`, `date_of_birth`, `theme_id`, `created_at`) VALUES
(11, 'johndoe', 'John Doe', 'aafdc23870ecbcd3d557b6423a8982134e17927e', 'johndoe@mail.com', 'Amateur de café et code', '1990-05-15', 1, '2025-03-03 12:29:23'),
(12, 'janedoe42', 'Jane Doe', '399d8287e47263fc91c907d42f4ac02910cb8f61', 'janedoe42@mail.com', 'Voyageuse du monde', '1988-08-22', 1, '2025-03-03 12:29:23'),
(13, 'bob_leponge', 'Bob Square', '5355bcb8eab083b19fa56c27fcfb8eb329662215', 'bob@krusty.com', NULL, '1995-02-28', 1, '2025-03-03 12:29:23'),
(14, 'tech_guru', 'Marc Tech', '67f33497e269de7f940d170d2738ab6d68a7a55c', 'marc.tech@mail.com', 'Passionné de nouvelles technologies', '2000-12-01', 1, '2025-03-03 12:29:23'),
(15, 'laura_rose', 'Laura Rose', 'ef0a110cccac95235abb41bccf9d9995c5ea8577', 'laura.rose@mail.com', 'Photographe amateur 🌸', '1999-07-17', 1, '2025-03-03 12:29:23'),
(16, 'mike89', 'Mike Tyson', 'd08f77ee3dee44b988480fd7b3737a123b9cc11a', 'mike.t@mail.com', 'Fan de sport extrême', '1989-11-11', 1, '2025-03-03 12:29:23'),
(17, 'sarah_connor', 'Sarah Connor', '11fee33453c427b3e6ebabb7d2d2120312c0e7c9', 'sarah.c@mail.com', 'En guerre contre les machines', '1985-04-21', 1, '2025-03-03 12:29:23'),
(18, 'zuck42', 'Mark Z', 'e06f3ae857eaac6a0ba8deef51e382f321951475', 'mark.z@meta.com', 'Building the future', '1984-05-14', 1, '2025-03-03 12:29:23'),
(19, 'gamergirl', 'Emma Stone', '7882cd4962d9ba7b38139c3618db4bac7e22c913', 'emma.gamer@mail.com', 'Streamer Fortnite 🎮', '2002-09-30', 1, '2025-03-03 12:29:23'),
(20, 'pythonista', 'Guido Van', '65017033c0e13e2a168bf74103a199f315a31d85', 'guido@python.org', 'Créateur de Python 🐍', '1970-01-01', 1, '2025-03-03 12:29:23'),
(21, 'Jeanjack', 'VAlou', '7b982fa3f2e2605bf6138dbfb5f5c1340700eb9d', 'rigel.Codja@epitech.eu', 'blablanlalzefzegezg', '2025-03-07', 1, '2025-03-04 14:58:50'),
(22, 'JAcki', 'VAlou', '7b982fa3f2e2605bf6138dbfb5f5c1340700eb9d', 'rigel.Codja@epitech.fr', NULL, '2025-03-07', 1, '2025-03-04 15:01:13'),
(23, 'zefzef', 'VAlou', '7b982fa3f2e2605bf6138dbfb5f5c1340700eb9d', 'jack@fed.fr', NULL, '2025-03-20', 1, '2025-03-04 22:13:21'),
(24, 'zefzefqsd', 'VAlou', '7b982fa3f2e2605bf6138dbfb5f5c1340700eb9d', 'rigel.Codja@epitech.com', NULL, '2025-03-15', 1, '2025-03-04 22:14:48'),
(25, 'zefzefqsdqsd', 'VAlou', '7b982fa3f2e2605bf6138dbfb5f5c1340700eb9d', 'Valentin.7887@uzefz.fr', NULL, '2025-03-06', 1, '2025-03-04 22:15:19'),
(26, 'Mavrokai', 'Valentin Verscheure', '7b982fa3f2e2605bf6138dbfb5f5c1340700eb9d', 'valentin.verscheure@epitech.eu', NULL, '1998-09-15', 1, '2025-03-05 15:06:33');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Follows`
--
ALTER TABLE `Follows`
  ADD PRIMARY KEY (`follower_id`,`following_id`),
  ADD KEY `following_id` (`following_id`);

--
-- Index pour la table `Hashtags`
--
ALTER TABLE `Hashtags`
  ADD PRIMARY KEY (`hashtag_id`),
  ADD UNIQUE KEY `tag` (`tag`);

--
-- Index pour la table `Media`
--
ALTER TABLE `Media`
  ADD PRIMARY KEY (`media_id`),
  ADD UNIQUE KEY `file_name` (`file_name`),
  ADD UNIQUE KEY `short_url` (`short_url`);

--
-- Index pour la table `MessageMedia`
--
ALTER TABLE `MessageMedia`
  ADD KEY `message_id` (`message_id`),
  ADD KEY `media_id` (`media_id`);

--
-- Index pour la table `Messages`
--
ALTER TABLE `Messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Index pour la table `PostHashtag`
--
ALTER TABLE `PostHashtag`
  ADD PRIMARY KEY (`post_id`,`hashtag_id`),
  ADD KEY `hashtag_id` (`hashtag_id`);

--
-- Index pour la table `PostMedia`
--
ALTER TABLE `PostMedia`
  ADD KEY `post_id` (`post_id`),
  ADD KEY `media_id` (`media_id`);

--
-- Index pour la table `Posts`
--
ALTER TABLE `Posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `reply_to` (`reply_to`);

--
-- Index pour la table `Reposts`
--
ALTER TABLE `Reposts`
  ADD PRIMARY KEY (`post_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `Themes`
--
ALTER TABLE `Themes`
  ADD PRIMARY KEY (`theme_id`),
  ADD UNIQUE KEY `theme_name` (`theme_name`);

--
-- Index pour la table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `theme_id` (`theme_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Hashtags`
--
ALTER TABLE `Hashtags`
  MODIFY `hashtag_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Media`
--
ALTER TABLE `Media`
  MODIFY `media_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Messages`
--
ALTER TABLE `Messages`
  MODIFY `message_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Posts`
--
ALTER TABLE `Posts`
  MODIFY `post_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Themes`
--
ALTER TABLE `Themes`
  MODIFY `theme_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `Users`
--
ALTER TABLE `Users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Follows`
--
ALTER TABLE `Follows`
  ADD CONSTRAINT `Follows_ibfk_1` FOREIGN KEY (`follower_id`) REFERENCES `Users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `Follows_ibfk_2` FOREIGN KEY (`following_id`) REFERENCES `Users` (`user_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `MessageMedia`
--
ALTER TABLE `MessageMedia`
  ADD CONSTRAINT `MessageMedia_ibfk_1` FOREIGN KEY (`message_id`) REFERENCES `Messages` (`message_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `MessageMedia_ibfk_2` FOREIGN KEY (`media_id`) REFERENCES `Media` (`media_id`);

--
-- Contraintes pour la table `Messages`
--
ALTER TABLE `Messages`
  ADD CONSTRAINT `Messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `Users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `Messages_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `Users` (`user_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `PostHashtag`
--
ALTER TABLE `PostHashtag`
  ADD CONSTRAINT `PostHashtag_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `Posts` (`post_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `PostHashtag_ibfk_2` FOREIGN KEY (`hashtag_id`) REFERENCES `Hashtags` (`hashtag_id`);

--
-- Contraintes pour la table `PostMedia`
--
ALTER TABLE `PostMedia`
  ADD CONSTRAINT `PostMedia_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `Posts` (`post_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `PostMedia_ibfk_2` FOREIGN KEY (`media_id`) REFERENCES `Media` (`media_id`);

--
-- Contraintes pour la table `Posts`
--
ALTER TABLE `Posts`
  ADD CONSTRAINT `Posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `Posts_ibfk_2` FOREIGN KEY (`reply_to`) REFERENCES `Posts` (`post_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `Reposts`
--
ALTER TABLE `Reposts`
  ADD CONSTRAINT `Reposts_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `Posts` (`post_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `Reposts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `Users_ibfk_1` FOREIGN KEY (`theme_id`) REFERENCES `Themes` (`theme_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
