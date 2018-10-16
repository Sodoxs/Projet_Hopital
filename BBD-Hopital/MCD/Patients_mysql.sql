CREATE DATABASE IF NOT EXISTS `EMPLOYES` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `EMPLOYES`;

CREATE TABLE `STATUT` (
  `idstatut` VARCHAR(42),
  `service` VARCHAR(42),
  PRIMARY KEY (`idstatut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `DATEDIAG` (
  `iddate` VARCHAR(42),
  `datedignostic` VARCHAR(42),
  `dateguerison` VARCHAR(42),
  PRIMARY KEY (`iddate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `LIT` (
  `numlit` VARCHAR(42),
  `numbloc` VARCHAR(42),
  `numchambre` VARCHAR(42),
  `numetage` VARCHAR(42),
  `nomaile` VARCHAR(42),
  PRIMARY KEY (`numlit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `INFECTER` (
  `idpatient` VARCHAR(42),
  `iddate` VARCHAR(42),
  `idmaladie` VARCHAR(42),
  `login` VARCHAR(42),
  PRIMARY KEY (`idpatient`, `iddate`, `idmaladie`, `login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `MALADIE` (
  `idmaladie` VARCHAR(42),
  `nommaladie` VARCHAR(42),
  PRIMARY KEY (`idmaladie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `PATIENT` (
  `idpatient` VARCHAR(42),
  `numsecu` VARCHAR(42),
  `nom` VARCHAR(42),
  `prenom` VARCHAR(42),
  `datenaissance` VARCHAR(42),
  `adresse` VARCHAR(42),
  `dateentree` VARCHAR(42),
  `datesortie` VARCHAR(42),
  `telephone` VARCHAR(42),
  `numlit` VARCHAR(42),
  `idstatut` VARCHAR(42),
  PRIMARY KEY (`idpatient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `EMPLOYE` (
  `login` VARCHAR(42),
  `nom` VARCHAR(42),
  `prenom` VARCHAR(42),
  `mdp` VARCHAR(42),
  `idrole` VARCHAR(42),
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `ROLE` (
  `idrole` VARCHAR(42),
  `nom` VARCHAR(42),
  PRIMARY KEY (`idrole`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `GERER` (
  `login` VARCHAR(42),
  `idtraitement` VARCHAR(42),
  `dateprescription` VARCHAR(42),
  PRIMARY KEY (`login`, `idtraitement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `TRAITEMENT` (
  `idtraitement` VARCHAR(42),
  `datetraitement` VARCHAR(42),
  `dateapplication` VARCHAR(42),
  `statut` VARCHAR(42),
  `idpatient` VARCHAR(42),
  PRIMARY KEY (`idtraitement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `COMPOSER` (
  `idtraitement` VARCHAR(42),
  `nommedicament` VARCHAR(42),
  `quantitemedoc` VARCHAR(42),
  PRIMARY KEY (`idtraitement`, `nommedicament`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `MEDICAMENT` (
  `nommedicament` VARCHAR(42),
  `principeactif` VARCHAR(42),
  `stock` VARCHAR(42),
  PRIMARY KEY (`nommedicament`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `INFECTER` ADD FOREIGN KEY (`login`) REFERENCES `EMPLOYE` (`login`);
ALTER TABLE `INFECTER` ADD FOREIGN KEY (`idmaladie`) REFERENCES `MALADIE` (`idmaladie`);
ALTER TABLE `INFECTER` ADD FOREIGN KEY (`iddate`) REFERENCES `DATEDIAG` (`iddate`);
ALTER TABLE `INFECTER` ADD FOREIGN KEY (`idpatient`) REFERENCES `PATIENT` (`idpatient`);
ALTER TABLE `PATIENT` ADD FOREIGN KEY (`idstatut`) REFERENCES `STATUT` (`idstatut`);
ALTER TABLE `PATIENT` ADD FOREIGN KEY (`numlit`) REFERENCES `LIT` (`numlit`);
ALTER TABLE `EMPLOYE` ADD FOREIGN KEY (`idrole`) REFERENCES `ROLE` (`idrole`);
ALTER TABLE `GERER` ADD FOREIGN KEY (`idtraitement`) REFERENCES `TRAITEMENT` (`idtraitement`);
ALTER TABLE `GERER` ADD FOREIGN KEY (`login`) REFERENCES `EMPLOYE` (`login`);
ALTER TABLE `TRAITEMENT` ADD FOREIGN KEY (`idpatient`) REFERENCES `PATIENT` (`idpatient`);
ALTER TABLE `COMPOSER` ADD FOREIGN KEY (`nommedicament`) REFERENCES `MEDICAMENT` (`nommedicament`);
ALTER TABLE `COMPOSER` ADD FOREIGN KEY (`idtraitement`) REFERENCES `TRAITEMENT` (`idtraitement`);