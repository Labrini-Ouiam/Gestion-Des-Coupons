-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 25 déc. 2023 à 19:30
-- Version du serveur : 8.0.31
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_coupon`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `password`) VALUES
(1, 'soufiane.kousta@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_cat` int NOT NULL AUTO_INCREMENT,
  `nom_cat` varchar(100) NOT NULL,
  `id_admin` int NOT NULL,
  PRIMARY KEY (`id_cat`),
  KEY `id_admin` (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_cat`, `nom_cat`, `id_admin`) VALUES
(1, 'Electronics', 1),
(2, 'Home & Kitchen', 1),
(3, 'Clothing', 1),
(4, 'Beauty & Personal Care', 1),
(5, 'Sports & Outdoors', 1),
(6, 'Books & Literature', 1),
(7, 'Toys & Games', 1),
(8, 'Health & Fitness', 1),
(9, 'Food & Beverages', 1),
(10, 'Stationery & Office Supplies', 1),
(16, 'BEAUTY', 1);

-- --------------------------------------------------------

--
-- Structure de la table `contient`
--

DROP TABLE IF EXISTS `contient`;
CREATE TABLE IF NOT EXISTS `contient` (
  `id_mark` int NOT NULL,
  `id_cat` int NOT NULL,
  PRIMARY KEY (`id_mark`,`id_cat`),
  KEY `id_cat` (`id_cat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `contient`
--

INSERT INTO `contient` (`id_mark`, `id_cat`) VALUES
(101, 1),
(102, 1),
(112, 1),
(117, 1),
(106, 2),
(103, 3),
(120, 3),
(104, 4),
(113, 4),
(118, 4),
(105, 5),
(108, 5),
(109, 5),
(115, 5),
(110, 6),
(111, 6),
(114, 6),
(116, 6),
(119, 6),
(107, 7);

-- --------------------------------------------------------

--
-- Structure de la table `coupon`
--

DROP TABLE IF EXISTS `coupon`;
CREATE TABLE IF NOT EXISTS `coupon` (
  `id_coupon` int NOT NULL AUTO_INCREMENT,
  `nom_coupon` varchar(50) NOT NULL,
  `poursentage` float NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `id_mark` int NOT NULL,
  PRIMARY KEY (`id_coupon`),
  KEY `id_mark` (`id_mark`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `coupon`
--

INSERT INTO `coupon` (`id_coupon`, `nom_coupon`, `poursentage`, `date_debut`, `date_fin`, `id_mark`) VALUES
(1, 'SummerSale2023', 15, '2023-06-01', '2023-06-30', 101),
(2, 'BackToSchool2023', 20, '2023-08-15', '2023-09-15', 102),
(3, 'HolidaySpecial', 10, '2023-12-01', '2023-12-31', 103),
(4, 'NewYearDeal', 25, '2024-01-01', '2024-01-15', 104),
(5, 'ValentinesDaySale', 18, '2024-02-01', '2024-02-14', 105),
(6, 'SpringClearance', 12, '2024-03-15', '2024-03-31', 106),
(7, 'EasterPromo', 30, '2024-04-01', '2024-04-15', 107),
(8, 'MothersDayOffer', 15, '2024-05-01', '2024-05-15', 108),
(9, 'FlashSale2024', 25, '2024-06-01', '2024-06-15', 109),
(10, 'IndependenceDay', 20, '2024-07-01', '2024-07-10', 110),
(11, 'SummerSpecial', 10, '2024-07-15', '2024-08-15', 111),
(12, 'BackToSchool2024', 22, '2024-08-20', '2024-09-20', 112),
(13, 'HalloweenDeal', 18, '2024-10-01', '2024-10-31', 113),
(14, 'BlackFridaySale', 40, '2024-11-01', '2024-11-30', 114),
(15, 'ChristmasOffer', 15, '2024-12-01', '2024-12-25', 115),
(16, 'NewYearBonanza', 30, '2025-01-01', '2025-01-15', 116),
(17, 'ValentinesDiscount', 20, '2025-02-01', '2025-02-14', 117),
(18, 'SpringSavings', 12, '2025-03-01', '2025-03-31', 118),
(19, 'EasterSpecial', 25, '2025-04-01', '2025-04-15', 119),
(20, 'MothersDayDiscount', 15, '2025-05-01', '2025-05-15', 120),
(22, 'OUIAM LABRIN', 30, '2024-01-01', '2024-01-01', 102);

-- --------------------------------------------------------

--
-- Structure de la table `enregistrer`
--

DROP TABLE IF EXISTS `enregistrer`;
CREATE TABLE IF NOT EXISTS `enregistrer` (
  `id_note` int NOT NULL,
  `id_coupon` int NOT NULL,
  `id_utilisateur` int NOT NULL,
  PRIMARY KEY (`id_note`,`id_coupon`,`id_utilisateur`),
  KEY `id_coupon` (`id_coupon`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `enregistrer`
--

INSERT INTO `enregistrer` (`id_note`, `id_coupon`, `id_utilisateur`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 2),
(4, 4, 3),
(5, 5, 2),
(6, 6, 4);

-- --------------------------------------------------------

--
-- Structure de la table `mark`
--

DROP TABLE IF EXISTS `mark`;
CREATE TABLE IF NOT EXISTS `mark` (
  `id_mark` int NOT NULL AUTO_INCREMENT,
  `nom_mark` varchar(100) NOT NULL,
  PRIMARY KEY (`id_mark`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `mark`
--

INSERT INTO `mark` (`id_mark`, `nom_mark`) VALUES
(101, 'Samsung'),
(102, 'Apple'),
(103, 'Adidas'),
(104, 'Maybelline'),
(105, 'Nike'),
(106, 'Amazon Basics'),
(107, 'LEGO'),
(108, 'Under Armour'),
(109, 'Reebok'),
(110, 'HP'),
(111, 'Canon'),
(112, 'Sony'),
(113, 'L\'Oreal'),
(114, 'Dell'),
(115, 'Puma'),
(116, 'Microsoft'),
(117, 'Philips'),
(118, 'Colgate'),
(119, 'Asus'),
(120, 'Calvin Klein');

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE IF NOT EXISTS `note` (
  `id_note` int NOT NULL AUTO_INCREMENT,
  `value` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id_note`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`id_note`, `value`) VALUES
(1, '0'),
(2, '1'),
(3, '2'),
(4, '3'),
(5, '4'),
(6, '5');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `email`) VALUES
(1, 'Benali', 'Ahmed', 'ahmed.benali@email.com'),
(2, 'El Amrani', 'Fatima', 'fatima.elamrani@email.com'),
(3, 'Zouhair', 'Hassan', 'hassan.zouhair@email.com'),
(4, 'Chakir', 'Amina', 'amina.chakir@email.com'),
(5, 'Bouchra', 'Youssef', 'youssef.bouchra@email.com'),
(6, 'El Fassi', 'Salma', 'salma.elfassi@email.com'),
(7, 'Mansouri', 'Karim', 'karim.mansouri@email.com'),
(8, 'Amrani', 'Khadija', 'khadija.amrani@email.com'),
(9, 'El Khattab', 'Hamza', 'hamza.elkhattab@email.com'),
(10, 'Bouhaddi', 'Noura', 'noura.bouhaddi@email.com');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD CONSTRAINT `categorie_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `contient`
--
ALTER TABLE `contient`
  ADD CONSTRAINT `contient_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categorie` (`id_cat`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `contient_ibfk_2` FOREIGN KEY (`id_mark`) REFERENCES `mark` (`id_mark`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `coupon`
--
ALTER TABLE `coupon`
  ADD CONSTRAINT `coupon_ibfk_1` FOREIGN KEY (`id_mark`) REFERENCES `mark` (`id_mark`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `enregistrer`
--
ALTER TABLE `enregistrer`
  ADD CONSTRAINT `enregistrer_ibfk_1` FOREIGN KEY (`id_coupon`) REFERENCES `coupon` (`id_coupon`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `enregistrer_ibfk_2` FOREIGN KEY (`id_note`) REFERENCES `note` (`id_note`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `enregistrer_ibfk_3` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
