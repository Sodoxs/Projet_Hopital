-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Jeu 21 Mars 2019 à 16:06
-- Version du serveur :  5.5.58-0+deb8u1
-- Version de PHP :  5.6.33-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jmonteyr`
--

-- --------------------------------------------------------

--
-- Structure de la table `COMMANDE`
--

CREATE TABLE `COMMANDE` (
  `id` int(11) NOT NULL,
  `idetat` int(11) DEFAULT NULL,
  `idmedicament` int(11) DEFAULT NULL,
  `datecommande` date NOT NULL,
  `quantitecommande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `composer`
--

CREATE TABLE `composer` (
  `id` int(11) NOT NULL,
  `quantitymedic` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `composer`
--

INSERT INTO `composer` (`id`, `quantitymedic`) VALUES
(1, 10),
(2, 5),
(3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `diagnostiquer`
--

CREATE TABLE `diagnostiquer` (
  `idinfection` int(11) NOT NULL,
  `idemploye` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `DISPONIBLE`
--

CREATE TABLE `DISPONIBLE` (
  `id` int(11) NOT NULL,
  `disponible` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `DISPONIBLE`
--

INSERT INTO `DISPONIBLE` (`id`, `disponible`) VALUES
(1, 'Disponible'),
(2, 'En pause'),
(3, 'Non-disponible');

-- --------------------------------------------------------

--
-- Structure de la table `EMPLOYE`
--

CREATE TABLE `EMPLOYE` (
  `id` int(11) NOT NULL,
  `disponible_id` int(11) DEFAULT NULL,
  `gerer_id` int(11) DEFAULT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomemploye` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenomemploye` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `EMPLOYE`
--

INSERT INTO `EMPLOYE` (`id`, `disponible_id`, `gerer_id`, `username`, `nomemploye`, `prenomemploye`, `password`, `roles`) VALUES
(1, 1, 1, 'accueil', 'Moi', 'Le mien', '$2y$10$f/zJ7QyAHJmoJliYopgIp.gBZBfyUgf5PxV9N5YWg781uFdyy6aVa', 'ROLE_ACCUEIL'),
(2, 2, 2, 'pharmacien', 'plop', 'test', '$2y$10$VLO2fsN.pmOAcqdblSYno.h5rDpdJJ0..D86/SCmaFABmMFA3GEhu', 'ROLE_PHARMACIEN'),
(3, 3, 1, 'gestionnaire', 'Lui', 'Le Sien', '$2y$10$hoYZVDRxdgIIZUlPkR/K5upWyCpWKdgKlVkj2do/sSeqZ.abdgLoC', 'ROLE_GESTIONNAIRE'),
(4, 1, 2, 'medecin', 'Durand', 'Killian', '$2y$10$XUFdBnRL8n5/7OqCU0KXtev1hICJTKWQJp44q2ZQHq0mRDtvB3cfC', 'ROLE_MEDECIN'),
(5, 2, 1, 'infirmier', 'Toi', 'Le tien', '$2y$10$dAGyIzGG5k3HmmBlCy07wuauFnvVfeTEdvia7/BQM2PdFUAYw55dG', 'ROLE_INFIRMIER');

-- --------------------------------------------------------

--
-- Structure de la table `ETATCOMMANDE`
--

CREATE TABLE `ETATCOMMANDE` (
  `id` int(11) NOT NULL,
  `etat` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `GERER`
--

CREATE TABLE `GERER` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `GERER`
--

INSERT INTO `GERER` (`id`) VALUES
(1),
(2);

-- --------------------------------------------------------

--
-- Structure de la table `INFECTION`
--

CREATE TABLE `INFECTION` (
  `id` int(11) NOT NULL,
  `idmaladie` int(11) DEFAULT NULL,
  `idpatient` int(11) DEFAULT NULL,
  `dateGuerison` date DEFAULT NULL,
  `dateDiagnostic` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `LIT`
--

CREATE TABLE `LIT` (
  `id` int(11) NOT NULL,
  `numbloc` int(11) DEFAULT NULL,
  `numchambre` int(11) NOT NULL,
  `numetage` int(11) NOT NULL,
  `nomaile` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `LIT`
--

INSERT INTO `LIT` (`id`, `numbloc`, `numchambre`, `numetage`, `nomaile`, `patient_id`) VALUES
(1, NULL, 1, 1, 'ouest', 1),
(2, NULL, 2, 4, 'est', NULL),
(3, 5, 145, 1, '8', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `MALADIE`
--

CREATE TABLE `MALADIE` (
  `id` int(11) NOT NULL,
  `nommaladie` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `MEDICAMENT`
--

CREATE TABLE `MEDICAMENT` (
  `id` int(11) NOT NULL,
  `nommedicament` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `principeactif` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `composer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `MEDICAMENT`
--

INSERT INTO `MEDICAMENT` (`id`, `nommedicament`, `principeactif`, `stock`, `composer_id`) VALUES
(1, 'Doliprane', 'paracetamol', 5, 1),
(3, 'Adviil', 'ibuprofene', 15, 3),
(4, 'spifen', 'migraine', 35, 2),
(5, 'spedifen', 'je sais pas', 20, 1),
(6, 'medoc4', 'autre medoc', 5, 2);

-- --------------------------------------------------------

--
-- Structure de la table `PATIENT`
--

CREATE TABLE `PATIENT` (
  `id` int(11) NOT NULL,
  `idservice` int(11) DEFAULT NULL,
  `numsecu` int(11) DEFAULT NULL,
  `nummutuelle` int(11) DEFAULT NULL,
  `civilite` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nompatient` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenompatient` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datenaissance` date NOT NULL,
  `adresse` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateentree` date NOT NULL,
  `datesortie` date DEFAULT NULL,
  `telephone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nivurgence` int(11) NOT NULL,
  `etaturgence` char(1) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `PATIENT`
--

INSERT INTO `PATIENT` (`id`, `idservice`, `numsecu`, `nummutuelle`, `civilite`, `nompatient`, `prenompatient`, `datenaissance`, `adresse`, `dateentree`, `datesortie`, `telephone`, `nivurgence`, `etaturgence`) VALUES
(1, NULL, NULL, NULL, 'f', 'Captain', 'guigui', '2019-02-10', NULL, '2019-02-12', '2019-02-13', NULL, 0, ''),
(2, NULL, NULL, NULL, 'm', 'Del', 'Florian', '2019-02-10', NULL, '2019-02-12', '2019-02-13', NULL, 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `SERVICE`
--

CREATE TABLE `SERVICE` (
  `id` int(11) NOT NULL,
  `service` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `STATUT`
--

CREATE TABLE `STATUT` (
  `id` int(11) NOT NULL,
  `statut` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `STATUT`
--

INSERT INTO `STATUT` (`id`, `statut`) VALUES
(2, 'En cours'),
(1, 'Requête');

-- --------------------------------------------------------

--
-- Structure de la table `TRAITEMENT`
--

CREATE TABLE `TRAITEMENT` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `statut_id` int(11) DEFAULT NULL,
  `gerer_id` int(11) DEFAULT NULL,
  `datetraitement` date DEFAULT NULL,
  `datefintraitement` date DEFAULT NULL,
  `composer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `TRAITEMENT`
--

INSERT INTO `TRAITEMENT` (`id`, `patient_id`, `statut_id`, `gerer_id`, `datetraitement`, `datefintraitement`, `composer_id`) VALUES
(1, 1, 2, 1, '2019-02-07', NULL, 2),
(2, 2, 2, 2, '2019-02-14', NULL, 3),
(3, 1, 2, 1, '2019-02-04', NULL, 1),
(4, 1, 1, 2, '2019-02-05', '2019-02-05', 3),
(5, 2, 2, 1, '2019-02-12', NULL, 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `COMMANDE`
--
ALTER TABLE `COMMANDE`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkCommandeEtatCommande` (`idetat`),
  ADD KEY `fkMedicamentCommande` (`idmedicament`);

--
-- Index pour la table `composer`
--
ALTER TABLE `composer`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `diagnostiquer`
--
ALTER TABLE `diagnostiquer`
  ADD PRIMARY KEY (`idinfection`,`idemploye`),
  ADD KEY `IDX_B5E76CEE284A2ED5` (`idinfection`),
  ADD KEY `IDX_B5E76CEE270081D7` (`idemploye`);

--
-- Index pour la table `DISPONIBLE`
--
ALTER TABLE `DISPONIBLE`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `EMPLOYE`
--
ALTER TABLE `EMPLOYE`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `IDX_C7412DA3298C354B` (`gerer_id`),
  ADD KEY `IDX_C7412DA331DFCB7D` (`disponible_id`);

--
-- Index pour la table `ETATCOMMANDE`
--
ALTER TABLE `ETATCOMMANDE`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `etat` (`etat`);

--
-- Index pour la table `GERER`
--
ALTER TABLE `GERER`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `INFECTION`
--
ALTER TABLE `INFECTION`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkInfectionMaladie` (`idmaladie`),
  ADD KEY `fkInfectionPatient` (`idpatient`);

--
-- Index pour la table `LIT`
--
ALTER TABLE `LIT`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_CB7CCC176B899279` (`patient_id`);

--
-- Index pour la table `MALADIE`
--
ALTER TABLE `MALADIE`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nommaladie` (`nommaladie`);

--
-- Index pour la table `MEDICAMENT`
--
ALTER TABLE `MEDICAMENT`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nommedicament` (`nommedicament`),
  ADD KEY `IDX_91036F057A8D2620` (`composer_id`);

--
-- Index pour la table `PATIENT`
--
ALTER TABLE `PATIENT`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numsecu` (`numsecu`),
  ADD KEY `fkPatientService` (`idservice`);

--
-- Index pour la table `SERVICE`
--
ALTER TABLE `SERVICE`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `service` (`service`);

--
-- Index pour la table `STATUT`
--
ALTER TABLE `STATUT`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `statut` (`statut`);

--
-- Index pour la table `TRAITEMENT`
--
ALTER TABLE `TRAITEMENT`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_21AA7018298C354B` (`gerer_id`),
  ADD KEY `IDX_21AA70187A8D2620` (`composer_id`),
  ADD KEY `IDX_21AA70186B899279` (`patient_id`),
  ADD KEY `IDX_21AA7018F6203804` (`statut_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `COMMANDE`
--
ALTER TABLE `COMMANDE`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `composer`
--
ALTER TABLE `composer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `DISPONIBLE`
--
ALTER TABLE `DISPONIBLE`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `EMPLOYE`
--
ALTER TABLE `EMPLOYE`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `ETATCOMMANDE`
--
ALTER TABLE `ETATCOMMANDE`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `GERER`
--
ALTER TABLE `GERER`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `INFECTION`
--
ALTER TABLE `INFECTION`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `LIT`
--
ALTER TABLE `LIT`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `MALADIE`
--
ALTER TABLE `MALADIE`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `MEDICAMENT`
--
ALTER TABLE `MEDICAMENT`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `PATIENT`
--
ALTER TABLE `PATIENT`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `SERVICE`
--
ALTER TABLE `SERVICE`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `STATUT`
--
ALTER TABLE `STATUT`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `TRAITEMENT`
--
ALTER TABLE `TRAITEMENT`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `COMMANDE`
--
ALTER TABLE `COMMANDE`
  ADD CONSTRAINT `FK_A8D93A3157356F00` FOREIGN KEY (`idmedicament`) REFERENCES `MEDICAMENT` (`id`),
  ADD CONSTRAINT `FK_A8D93A31860506C2` FOREIGN KEY (`idetat`) REFERENCES `ETATCOMMANDE` (`id`);

--
-- Contraintes pour la table `diagnostiquer`
--
ALTER TABLE `diagnostiquer`
  ADD CONSTRAINT `FK_B5E76CEE270081D7` FOREIGN KEY (`idemploye`) REFERENCES `EMPLOYE` (`id`),
  ADD CONSTRAINT `FK_B5E76CEE284A2ED5` FOREIGN KEY (`idinfection`) REFERENCES `INFECTION` (`id`);

--
-- Contraintes pour la table `EMPLOYE`
--
ALTER TABLE `EMPLOYE`
  ADD CONSTRAINT `FK_C7412DA331DFCB7D` FOREIGN KEY (`disponible_id`) REFERENCES `DISPONIBLE` (`id`),
  ADD CONSTRAINT `FK_C7412DA3298C354B` FOREIGN KEY (`gerer_id`) REFERENCES `GERER` (`id`);

--
-- Contraintes pour la table `INFECTION`
--
ALTER TABLE `INFECTION`
  ADD CONSTRAINT `FK_129399CF72C05025` FOREIGN KEY (`idmaladie`) REFERENCES `MALADIE` (`id`),
  ADD CONSTRAINT `FK_129399CFC5DE8585` FOREIGN KEY (`idpatient`) REFERENCES `PATIENT` (`id`);

--
-- Contraintes pour la table `LIT`
--
ALTER TABLE `LIT`
  ADD CONSTRAINT `FK_CB7CCC176B899279` FOREIGN KEY (`patient_id`) REFERENCES `PATIENT` (`id`);

--
-- Contraintes pour la table `MEDICAMENT`
--
ALTER TABLE `MEDICAMENT`
  ADD CONSTRAINT `FK_91036F057A8D2620` FOREIGN KEY (`composer_id`) REFERENCES `composer` (`id`);

--
-- Contraintes pour la table `PATIENT`
--
ALTER TABLE `PATIENT`
  ADD CONSTRAINT `FK_259F29F13E99C8BC` FOREIGN KEY (`idservice`) REFERENCES `SERVICE` (`id`);

--
-- Contraintes pour la table `TRAITEMENT`
--
ALTER TABLE `TRAITEMENT`
  ADD CONSTRAINT `FK_21AA7018F6203804` FOREIGN KEY (`statut_id`) REFERENCES `STATUT` (`id`),
  ADD CONSTRAINT `FK_21AA7018298C354B` FOREIGN KEY (`gerer_id`) REFERENCES `GERER` (`id`),
  ADD CONSTRAINT `FK_21AA70186B899279` FOREIGN KEY (`patient_id`) REFERENCES `PATIENT` (`id`),
  ADD CONSTRAINT `FK_21AA70187A8D2620` FOREIGN KEY (`composer_id`) REFERENCES `composer` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
