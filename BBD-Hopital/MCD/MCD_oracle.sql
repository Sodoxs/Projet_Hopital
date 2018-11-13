CREATE TABLE SERVICE (
  idservice INTEGER,
  service VARCHAR2(30),
);

CREATE TABLE LIT (
  numlit INTEGER,
  numbloc INTEGER,
  numchambre INTEGER,
  numetage INTEGER,
  nomaile VARCHAR2(10),
);

CREATE TABLE INFECTER (
  idpatient INTEGER,
  iddate INTEGER,
  idmaladie INTEGER,
  login INTEGER,
  datedignostic DATE,
  dateguerison DATE,
);

CREATE TABLE MALADIE (
  idmaladie INTEGER,
  nommaladie VARCHAR2(4096),
  PRIMARY KEY (idmaladie)
);

CREATE TABLE PATIENT (
  idpatient INTEGER,
  numsecu INTEGER,
  nummutuelle INTEGER,
  civilite VARCHAR2(1),
  nompatient VARCHAR2(30),
  prenompatient VARCHAR2(30),
  datenaissance DATE,
  adresse VARCHAR2(70),
  dateentree DATE,
  datesortie DATE,
  telephone VARCHAR2(15),
  numlit INTEGER,
  idstatut INTEGER,
  nivurgence INTEGER,
);

CREATE TABLE EMPLOYE (
  login INTEGER,
  nomemploye VARCHAR2(30),
  prenomemploye VARCHAR2(30),
  mdp VARCHAR2(50),
  idrole INTEGER,
);

CREATE TABLE ROLE (
  idrole INTEGER,
  nomrole VARCHAR2(15),
);

CREATE TABLE GERER (
  login INTEGER,
  idtraitement INTEGER,
);

CREATE TABLE TRAITEMENT (
  idtraitement INTEGER,
  dateprescription DATE,
  dateapplication DATE,
  statut VARCHAR2(15),
  idpatient INTEGER,
);

CREATE TABLE COMPOSER (
  idtraitement INTEGER,
  idmedicament INTEGER,
  quantitemedoc INTEGER,
);

CREATE TABLE MEDICAMENT (
  idmedicament INTEGER,
  nommedicament VARCHAR2(4096),
  principeactif VARCHAR2(4096),
  stock INTEGER,
);

CREATE TABLE DISPONIBLE (
  iddisponible INT,
  disponible VARCHAR(15),
);

CREATE TABLE COMMANDE (
  idcommande INT,
  datecommande DATE,
  quantitecommande INT,
  etat VARCHAR(10),
);

CREATE TABLE STATUT (
  idstatut INT,
  statut VARCHAR(15),
);

CREATE TABLE 

ALTER TABLE STATUT ADD CONSTRAINT pkStatut PRIMARY KEY (idstatut);
ALTER TABLE LIT ADD CONSTRAINT pkLit PRIMARY KEY (numlit);
ALTER TABLE INFECTER ADD CONSTRAINT pkInfecter PRIMARY KEY (idpatient, iddate, idmaladie, login);
ALTER TABLE PATIENT ADD CONSTRAINT pkPatient PRIMARY KEY (idpatient);
ALTER TABLE EMPLOYE ADD CONSTRAINT pkEmploye PRIMARY KEY (login);
ALTER TABLE ROLE ADD CONSTRAINT pkRole PRIMARY KEY (idrole);
ALTER TABLE GERER ADD CONSTRAINT pkRole PRIMARY KEY (login, idtraitement);
ALTER TABLE TRAITEMENT ADD CONSTRAINT pkTraitement PRIMARY KEY (idtraitement);
ALTER TABLE COMPOSER ADD CONSTRAINT pkComposer PRIMARY KEY (idtraitement, idmedicament);
ALTER TABLE MEDICAMENT ADD CONSTRAINT pkMedicament PRIMARY KEY (idmedicament);
ALTER TABLE STATUT_MEDECIN ADD CONSTRAINT pkStatutMedecin PRIMARY KEY (idstatutmedecin);
ALTER TABLE COMMANDE ADD CONSTRAINT pkCommande PRIMARY KEY (idcommande);

ALTER TABLE INFECTER ADD CONSTRAINT fkInfecterEmploye FOREIGN KEY (login) REFERENCES EMPLOYE (login);
ALTER TABLE INFECTER ADD CONSTRAINT fkInfecterMaladie FOREIGN KEY (idmaladie) REFERENCES MALADIE (idmaladie);
ALTER TABLE INFECTER ADD CONSTRAINT fkInfecterPatient FOREIGN KEY (idpatient) REFERENCES PATIENT (idpatient);
ALTER TABLE PATIENT ADD CONSTRAINT fkPatientStatut FOREIGN KEY (idstatut) REFERENCES STATUT (idstatut);
ALTER TABLE PATIENT ADD CONSTRAINT fkPatientLit FOREIGN KEY (numlit) REFERENCES LIT (numlit);
ALTER TABLE EMPLOYE ADD CONSTRAINT fkEmployeRole FOREIGN KEY (idrole) REFERENCES ROLE (idrole);
ALTER TABLE GERER ADD CONSTRAINT fkGererTraitement FOREIGN KEY (idtraitement) REFERENCES TRAITEMENT (idtraitement);
ALTER TABLE GERER ADD CONSTRAINT fkGererEmploye FOREIGN KEY (login) REFERENCES EMPLOYE (login);
ALTER TABLE TRAITEMENT ADD CONSTRAINT fkTraitementPatient FOREIGN KEY (idpatient) REFERENCES PATIENT (idpatient);
ALTER TABLE COMPOSER ADD CONSTRAINT fkComposerMedicament FOREIGN KEY (idmedicament) REFERENCES MEDICAMENT (idmedicament);
ALTER TABLE COMPOSER ADD CONSTRAINT fkComposerTraitement FOREIGN KEY (idtraitement) REFERENCES TRAITEMENT (idtraitement);
ALTER TABLE EMPLOYE ADD CONSTRAINT fkEmployeStatutMedecin FOREIGN KEY (idstatutmedecin) REFERENCES EMPLOYE (idstatutemploye); 
ALTER TABLE COMMANDE ADD CONSTRAINT fkCommandeMedicament FOREIGN KEY (idmedicament) REFERENCES EMPLOYE (idcommande);

ALTER TABLE LIT ADD CONSTRAINT ukLit UNIQUE (numlit);
ALTER TABLE MALADIE ADD CONSTRAINT ukMaladie UNIQUE (nommaladie);
ALTER TABLE PATIENT ADD CONSTRAINT ukPatient UNIQUE (numsecu);
ALTER TABLE EMPLOYE ADD CONSTRAINT ukEmploye UNIQUE (login);
ALTER TABLE MEDICAMENT ADD CONSTRAINT ukMedicament UNIQUE (nommedicament);
ALTER TABLE STATUT_MEDECIN ADD CONSTRAINT ukStatutMedecin UNIQUE (statut);
ALTER TABLE STATUT ADD CONSTRAINT ukStatut UNIQUE (service);

CREATE INDEX IDX_PATIENT ON PATIENT (nompatient, prenompatient);
CREATE INDEX IDX_EMPLOYE ON EMPLOYE (nomemploye, prenomemploye);


