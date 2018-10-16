CREATE TABLE STATUT (
  idstatut INTEGER,
  service VARCHAR2(30),
);

CREATE TABLE DATEDIAG (
  iddate INTEGER,
  datedignostic DATE,
  dateguerison DATE,
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
  dateprescription DATE,
);

CREATE TABLE TRAITEMENT (
  idtraitement INTEGER,
  datetraitement DATE,
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

ALTER TABLE STATUT ADD CONSTRAINT pkStatut PRIMARY KEY (idstatut);
ALTER TABLE DATEDIAG ADD CONSTRAINT pkDateDiag PRIMARY KEY (iddate);
ALTER TABLE LIT ADD CONSTRAINT pkLit PRIMARY KEY (numlit);
ALTER TABLE INFECTER ADD CONSTRAINT pkInfecter PRIMARY KEY (idpatient, iddate, idmaladie, login);
ALTER TABLE PATIENT ADD CONSTRAINT pkPatient PRIMARY KEY (idpatient);
ALTER TABLE EMPLOYE ADD CONSTRAINT pkEmploye PRIMARY KEY (login);
ALTER TABLE ROLE ADD CONSTRAINT pkRole PRIMARY KEY (idrole);
ALTER TABLE GERER ADD CONSTRAINT pkRole PRIMARY KEY (login, idtraitement);
ALTER TABLE TRAITEMENT ADD CONSTRAINT pkTraitement PRIMARY KEY (idtraitement);
ALTER TABLE COMPOSER ADD CONSTRAINT pkComposer PRIMARY KEY (idtraitement, idmedicament);
ALTER TABLE MEDICAMENT ADD CONSTRAINT pkMedicament PRIMARY KEY (idmedicament);

ALTER TABLE INFECTER ADD CONSTRAINT fkInfecterEmploye FOREIGN KEY (login) REFERENCES EMPLOYE (login);
ALTER TABLE INFECTER ADD CONSTRAINT fkInfecterMaladie FOREIGN KEY (idmaladie) REFERENCES MALADIE (idmaladie);
ALTER TABLE INFECTER ADD CONSTRAINT fkInfecterDateDiag FOREIGN KEY (iddate) REFERENCES DATEDIAG (iddate);
ALTER TABLE INFECTER ADD CONSTRAINT fkInfecterPatient FOREIGN KEY (idpatient) REFERENCES PATIENT (idpatient);
ALTER TABLE PATIENT ADD CONSTRAINT fkPatientStatut FOREIGN KEY (idstatut) REFERENCES STATUT (idstatut);
ALTER TABLE PATIENT ADD CONSTRAINT fkPatientLit FOREIGN KEY (numlit) REFERENCES LIT (numlit);
ALTER TABLE EMPLOYE ADD CONSTRAINT fkEmployeRole FOREIGN KEY (idrole) REFERENCES ROLE (idrole);
ALTER TABLE GERER ADD CONSTRAINT fkGererTraitement FOREIGN KEY (idtraitement) REFERENCES TRAITEMENT (idtraitement);
ALTER TABLE GERER ADD CONSTRAINT fkGererEmploye FOREIGN KEY (login) REFERENCES EMPLOYE (login);
ALTER TABLE TRAITEMENT ADD CONSTRAINT fkTraitementPatient FOREIGN KEY (idpatient) REFERENCES PATIENT (idpatient);
ALTER TABLE COMPOSER ADD CONSTRAINT fkComposerMedicament FOREIGN KEY (idmedicament) REFERENCES MEDICAMENT (idmedicament);
ALTER TABLE COMPOSER ADD CONSTRAINT fkComposerTraitement FOREIGN KEY (idtraitement) REFERENCES TRAITEMENT (idtraitement);

ALTER TABLE LIT ADD CONSTRAINT ukLit UNIQUE (numlit);
ALTER TABLE MALADIE ADD CONSTRAINT ukMaladie UNIQUE (nommaladie);
ALTER TABLE PATIENT ADD CONSTRAINT ukPatient UNIQUE (numsecu);
ALTER TABLE EMPLOYE ADD CONSTRAINT ukEmploye UNIQUE (login);
ALTER TABLE MEDICAMENT ADD CONSTRAINT ukMedicament UNIQUE (nommedicament);

CREATE INDEX IDX_PATIENT ON PATIENT (nompatient, prenompatient);
CREATE INDEX IDX_EMPLOYE ON EMPLOYE (nomemploye, prenomemploye);


