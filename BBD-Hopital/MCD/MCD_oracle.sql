CREATE TABLE STATUT (
  idstatut INTEGER,
  service VARCHAR2(30),
  PRIMARY KEY (idstatut)
);

CREATE TABLE DATEDIAG (
  iddate INTEGER,
  datedignostic DATE,
  dateguerison DATE,
  PRIMARY KEY (iddate)
);

CREATE TABLE LIT (
  numlit INTEGER,
  numbloc INTEGER,
  numchambre INTEGER,
  numetage INTEGER,
  nomaile VARCHAR2(10),
  PRIMARY KEY (numlit)
);

CREATE TABLE INFECTER (
  idpatient INTEGER,
  iddate INTEGER,
  idmaladie INTEGER,
  login INTEGER,
  PRIMARY KEY (idpatient, iddate, idmaladie, login)
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
  PRIMARY KEY (idpatient)
);

CREATE TABLE EMPLOYE (
  login INTEGER,
  nomemploye VARCHAR2(30),
  prenomemploye VARCHAR2(30),
  mdp VARCHAR2(50),
  idrole INTEGER,
  PRIMARY KEY (login)
);

CREATE TABLE ROLE (
  idrole INTEGER,
  nomrole VARCHAR2(15),
  PRIMARY KEY (idrole)
);

CREATE TABLE GERER (
  login INTEGER,
  idtraitement INTEGER,
  dateprescription DATE,
  PRIMARY KEY (login, idtraitement)
);

CREATE TABLE TRAITEMENT (
  idtraitement INTEGER,
  datetraitement DATE,
  dateapplication DATE,
  statut VARCHAR2(15),
  idpatient INTEGER,
  PRIMARY KEY (idtraitement)
);

CREATE TABLE COMPOSER (
  idtraitement INTEGER,
  idmedicament INTEGER,
  quantitemedoc INTEGER,
  PRIMARY KEY (idtraitement, idmedicament)
);

CREATE TABLE MEDICAMENT (
  idmedicament INTEGER,
  nommedicament VARCHAR2(4096),
  principeactif VARCHAR2(4096),
  stock INTEGER,
  PRIMARY KEY (idmedicament)
);

ALTER TABLE INFECTER ADD FOREIGN KEY (login) REFERENCES EMPLOYE (login);
ALTER TABLE INFECTER ADD FOREIGN KEY (idmaladie) REFERENCES MALADIE (idmaladie);
ALTER TABLE INFECTER ADD FOREIGN KEY (iddate) REFERENCES DATEDIAG (iddate);
ALTER TABLE INFECTER ADD FOREIGN KEY (idpatient) REFERENCES PATIENT (idpatient);
ALTER TABLE PATIENT ADD FOREIGN KEY (idstatut) REFERENCES STATUT (idstatut);
ALTER TABLE PATIENT ADD FOREIGN KEY (numlit) REFERENCES LIT (numlit);
ALTER TABLE EMPLOYE ADD FOREIGN KEY (idrole) REFERENCES ROLE (idrole);
ALTER TABLE GERER ADD FOREIGN KEY (idtraitement) REFERENCES TRAITEMENT (idtraitement);
ALTER TABLE GERER ADD FOREIGN KEY (login) REFERENCES EMPLOYE (login);
ALTER TABLE TRAITEMENT ADD FOREIGN KEY (idpatient) REFERENCES PATIENT (idpatient);
ALTER TABLE COMPOSER ADD FOREIGN KEY (idmedicament) REFERENCES MEDICAMENT (idmedicament);
ALTER TABLE COMPOSER ADD FOREIGN KEY (idtraitement) REFERENCES TRAITEMENT (idtraitement);
