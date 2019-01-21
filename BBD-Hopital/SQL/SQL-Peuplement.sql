INSERT INTO DISPONIBLE (DISPONIBLE) VALUES ('Disponible');
INSERT INTO DISPONIBLE (DISPONIBLE) VALUES ('En pause');
INSERT INTO DISPONIBLE (DISPONIBLE) VALUES ('Indisponible');

INSERT INTO ROLE (NOMROLE) VALUES ('Accueil');
INSERT INTO ROLE (NOMROLE) VALUES ('Medecin');
INSERT INTO ROLE (NOMROLE) VALUES ('Infirmier');
INSERT INTO ROLE (NOMROLE) VALUES ('Pharmacien');
INSERT INTO ROLE (NOMROLE) VALUES ('Gestionnaire');

INSERT INTO ETATCOMMANDE (ETAT) VALUES ('À faire');
INSERT INTO ETATCOMMANDE (ETAT) VALUES ('En cours');
INSERT INTO ETATCOMMANDE (ETAT) VALUES ('Livré');

INSERT INTO STATUT (STATUT) VALUES ('Requête');
INSERT INTO STATUT (STATUT) VALUES ('Disponible');
INSERT INTO STATUT (STATUT) VALUES ('Livré');
INSERT INTO STATUT (STATUT) VALUES ('Appliqué');

DECLARE
  x NUMBER := 0;
  b NUMBER := 0;
  strResult NUMBER;
  str VARCHAR2(20);
  
BEGIN
  LOOP
  
    INSERT INTO LIT (NUMCHAMBRE, NUMBLOC, NUMETAGE, NOMAILE)
    VALUES
    (
      dbms_random.value(1,500),
      dbms_random.value(1,50),
      dbms_random.value(1, 20),
      dbms_random.string('A',10)
    );
    
    b := 0; 
    WHILE (b = 0) LOOP
       str := dbms_random.string('A',20);
       SELECT COUNT (NOMMALADIE) INTO strResult FROM MALADIE WHERE NOMMALADIE = str;
       if strResult = 0 then
        b := 1;
       end if; 
    END LOOP;
    INSERT INTO MALADIE (NOMMALADIE) VALUES (str);
   
    b := 0;
    WHILE (b = 0) LOOP
       str := dbms_random.string('A',20);
       SELECT COUNT (SERVICE) INTO strResult FROM SERVICE WHERE SERVICE = str;
       if strResult = 0 then
        b := 1;
       end if; 
    END LOOP;
    INSERT INTO SERVICE (SERVICE) VALUES (str);
    
    x := x + 1;  -- prevents infinite loop
    EXIT WHEN x > 299;
  END LOOP;
END;
-- lancer un nouveau script en adaptant la valeur max d'id commande.
    
DECLARE
  x NUMBER := 0;
  b NUMBER := 0;
  strResult NUMBER;
  str VARCHAR2(20);
  num NUMBER;
BEGIN
  LOOP
  
    b := 0;
    WHILE (b = 0) LOOP
       str := dbms_random.string('A',20);
       SELECT COUNT (NOMMEDICAMENT) INTO strResult FROM MEDICAMENT WHERE NOMMEDICAMENT = str;
       if strResult = 0 then
        b := 1;
       end if; 
    END LOOP;
    INSERT INTO MEDICAMENT (NOMMEDICAMENT, PRINCIPEACTIF, STOCK)
    VALUES
    (
      dbms_random.string(str),
      dbms_random.string('A',500),
      dbms_random.value(0,10000)
    );
    
    b := 0;
    WHILE (b = 0) LOOP
       num := dbms_random.value(1,9999999999);
       SELECT COUNT (NUMSECU) INTO intResult FROM PATIENT WHERE NUMSECU = num;
       if intResult = 0 then
        b := 1;
       end if; 
    END LOOP;
    INSERT INTO PATIENT (NUMSECU, NUMMUTUELLE, CIVILITE, NOMPATIENT, PRENOMPATIENT, DATENAISSANCE, 
                         ADRESSE, DATEENTREE, DATESORTIE, TELEPHONE, IDLIT, IDSERVICE, NIVURGENCE, ETATURGENCE)
    VALUES
    (
      num,
      dbms_random.value(1,9999999999),
      dbms_random.string('A',1),
      dbms_random.string('A',30),
      dbms_random.string('A',30),
      to_date('01/01/1980', 'DD/MM/YY') + trunc(dbms_random.value(0, (20*365))),
      dbms_random.string('A',20),
      SYSDATE,
      SYSDATE,
      dbms_random.string('A',15),
      dbms_random.value(1,300),
      dbms_random.value(1,300),
      dbms_random.value(1,10),
      'F'
    );
    
    b := 0;
    WHILE (b = 0) LOOP
       str := dbms_random.string('P',30);
       SELECT COUNT (LOGIN) INTO strResult FROM EMPLOYE WHERE LOGIN = str;
       if strResult = 0 then
        b := 1;
       end if; 
    END LOOP;                                                                
    INSERT INTO EMPLOYE (LOGIN, NOMEMPLOYE, PRENOMEMPLOYE, MDP, IDROLE, IDDISPONIBLE)
    VALUES
    (
      dbms_random.string(str),
      dbms_random.string('A',30),
      dbms_random.string('A',30),
      dbms_random.string('P',50),
      dbms_random.value(1,5),
      dbms_random.value(1,3)
    );
    
    x := x + 1;  -- prevents infinite loop
    EXIT WHEN x > 299;
  END LOOP;
END;
-- lancer un nouveau script en adaptant la valeur max d'id commande.
    
DECLARE
  x NUMBER := 0;
BEGIN
  LOOP
       
    INSERT INTO COMMANDE (DATECOMMANDE,QUANTITECOMMANDE,IDETAT, IDMEDICAMENT)
    VALUES
    (
      SYSDATE,
      dbms_random.value(100,200),
      dbms_random.value(1, 3),
      dbms_random.value(1, 300)
    );
    
    INSERT INTO INFECTER (IDPATIENT, IDMALADIE, IDEMPLOYE, IDDATE, DATEGUERISON)
    VALUES
    (
      dbms_random.value(1,300),
      dbms_random.value(1,300),
      dbms_random.value(1,300),
      dbms_random.value(1,300),
      SYSDATE
    );
    
    INSERT INTO TRAITEMENT (DATETRAITEMENT, DATEFINTRAITEMENT, IDPATIENT, IDSTATUT)
    VALUES
    (
      SYSDATE,
      SYSDATE,
      dbms_random.value(1,300),
      dbms_random.value(1,4)
    );
    
    x := x + 1;  -- prevents infinite loop
    EXIT WHEN x > 299;
  END LOOP;
END;
-- lancer un nouveau script en adaptant la valeur max d'id commande.
    
DECLARE
  x NUMBER := 0;
BEGIN
  LOOP
  
    INSERT INTO COMPOSER (IDMEDICAMENT, IDTRAITEMENT, QUANTITEMEDOC)
    VALUES
    (
      dbms_random.value(1,300),
      dbms_random.value(1,300),
      dbms_random.value(0,1000)
    );
    
    INSERT INTO GERER (IDEMPLOYE, IDTRAITEMENT, DATEPRESCRIPTION)
    VALUES
    (
      dbms_random.value(1,300),
      dbms_random.value(1,300),
      SYSDATE
    );
    
    x := x + 1;  -- prevents infinite loop
    EXIT WHEN x > 49;
  END LOOP;
END;



--SYSDATE (pour mettre la date actuel)
--to_date('01/01/1980', 'DD/MM/YY') + trunc(dbms_random.value(0, (20*365)))(date random)
-- pour un String dbms_random.string('A' ou 'X',taille) 
--a pour Chaine de caractère Majuscule et minuscule
--X pour une Chaine alpha-numériques
--P N'importe quelle caractère
