INSERT INTO 

INSERT INTO COMMANDE (ID,DATECOMMANDE,QUANTITECOMMANDE,IDETAT)
      VALUES(
        dbms_random.value(11,25),
        to_date('01/01/1980', 'DD/MM/YY') + trunc(dbms_random.value(0, (20*365))),
        dbms_random.value(100,200),
        dbms_random.value(1, 3)
        );
commit;



// pour un String dbms_random.string('A' ou 'X',taille) 
//a pour Chaine de caractère Majuscule et minuscule
//X pour une Chaine alpha-numériques
