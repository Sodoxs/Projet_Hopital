DECLARE
  x NUMBER := 0;
BEGIN
  LOOP
    INSERT INTO MALADIE (ID,NOMMALADIE)
      VALUES(
        dbms_random.value(1,25),
        dbms_random.string('A',100)
        );
    
    INSERT INTO COMMANDE (ID,DATECOMMANDE,QUANTITECOMMANDE,IDETAT)
      VALUES(
        dbms_random.value(1,25),
        to_date('01/01/1980', 'DD/MM/YY') + trunc(dbms_random.value(0, (20*365))),
        dbms_random.value(100,200),
        dbms_random.value(1, 3)
        );
    x := x + 1;  -- prevents infinite loop
    EXIT WHEN x > 5;
  END LOOP;
END;
commit;



// pour un String dbms_random.string('A' ou 'X',taille) 
//a pour Chaine de caractère Majuscule et minuscule
//X pour une Chaine alpha-numériques
