CREATE DATABASE IF NOT EXISTS `HOPITAL` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `HOPITAL`;

CREATE TABLE `BLOC_OPERATOIRE` (
  `id` int,
  `id_1` int,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `SERVICE` (
  `id` int,
  `nom` Varchar(20),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `LIT` (
  `id` int,
  `num` int,
  `aile_hopital` Varchar(20),
  `id_1` int,
  `id_2` int,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `MALADIE` (
  `id` int,
  `nom` Varchar(30),
  `id_1` int,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `PATIENT` (
  `id` int,
  `nom` Varchar(20),
  `prenom` Varchar(20),
  `date_naissance` Date,
  `statut` Varchar(20),
  `num_secu` int,
  `num_mut` int,
  `id_1` int,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `MEDICAMENT` (
  `id` int,
  `nom` Varchar(50),
  `principe_actif` Varchar(20),
  `quantite` int,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `APPARTENIR` (
  `id` int,
  `id_1` int,
  PRIMARY KEY (`id`, `id_1`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `TRAITEMENT` (
  `id` int,
  `nom` Varchar(20),
  `date` Date,
  `id_1` int,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `INFIRMIER` (
  `id` int,
  `nom` Varchar(20),
  `prenom` Varchar(20),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `PRESCRIPTION` (
  `id` int,
  `id_1` int,
  `date_create` VARCHAR(42),
  PRIMARY KEY (`id`, `id_1`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `MEDECIN` (
  `id` int,
  `nom` Varchar(20),
  `prenom` Varchar(20),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `BLOC_OPERATOIRE` ADD FOREIGN KEY (`id_1`) REFERENCES `SERVICE` (`id`);
ALTER TABLE `LIT` ADD FOREIGN KEY (`id_2`) REFERENCES `SERVICE` (`id`);
ALTER TABLE `LIT` ADD FOREIGN KEY (`id_1`) REFERENCES `PATIENT` (`id`);
ALTER TABLE `MALADIE` ADD FOREIGN KEY (`id_1`) REFERENCES `SERVICE` (`id`);
ALTER TABLE `PATIENT` ADD FOREIGN KEY (`id_1`) REFERENCES `TRAITEMENT` (`id`);
ALTER TABLE `APPARTENIR` ADD FOREIGN KEY (`id_1`) REFERENCES `TRAITEMENT` (`id`);
ALTER TABLE `APPARTENIR` ADD FOREIGN KEY (`id`) REFERENCES `MEDICAMENT` (`id`);
ALTER TABLE `TRAITEMENT` ADD FOREIGN KEY (`id_1`) REFERENCES `INFIRMIER` (`id`);
ALTER TABLE `PRESCRIPTION` ADD FOREIGN KEY (`id_1`) REFERENCES `TRAITEMENT` (`id`);
ALTER TABLE `PRESCRIPTION` ADD FOREIGN KEY (`id`) REFERENCES `MEDECIN` (`id`);