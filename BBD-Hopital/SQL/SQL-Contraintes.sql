create or replace trigger patient_operable before insert or update on PATIENT
for each row
declare
    nameservice VARCHAR2(30);
    num_bloc INT;
begin
    select NUMBLOC into num_bloc FROM LIT WHERE ID = :new.IDLIT;
    select SERVICE into nameservice FROM SERVICE WHERE ID = :new.IDSERVICE;

    if num_bloc is not null and nameservice != 'Chirurgie' then
        raise_application_error(-20666,'Le patient doit être attribué à un lit situé dans un bloc');
    end if;
end;

CREATE TRIGGER ToMajPatient BEFORE INSERT ON PATIENT 
for each row 
begin 
    :new.NOMPATIENT:= UPPER(:new.NOMPATIENT); 
    :new.PRENOMPATIENT := UPPER(:new.PRENOMPATIENT); 
end;/


CREATE TRIGGER ValidNumSecu BEFORE INSERT on PATIENT
for each row
declare
    nb INT;
    cleSecu INT;
begin
    nb := :new.NUMSECU/100;
    cleSecu := (97-MOD(nb,97));
    if(nb*100+cleSecu !=:new.NUMSECU) then
        raise_application_error(-20001,'Le numéro de Securité sociable n''est pas valide.' );  
    end if;
end;
/

create trigger date_prescription before insert on GERER
for each row
declare
p DATE;
begin
select DATEENTREE into p from PATIENT where ID=:new.IDPATIENT;
if(p>:new.DATEPRESCRIPTION)then
    raise_application_error(-20666, 'On peut prescrire un traitement avant l''entrée du patient');
end if;
end;/

create or replace TRIGGER date_prescription_traitement BEFORE INSERT 
ON GERER FOR EACH ROW
declare
p DATE;

BEGIN
SELECT DATETRAITEMENT into p from TRAITEMENT where ID=:new.IDTRAITEMENT;
    IF (p < :new.DATEPRESCRIPTION) THEN
        raise_application_error(-20000, 'La date de traitement n''est pas valide');
    END IF;
END;/



Create trigger patient_inoperable before insert or update on PATIENT
for each row
declare
    num_bloc INT;
    nomservice varchar(30);
begin
    select NUMBLOC into num_bloc from LIT where ID = :new.IDLIT;
    select SERVICE into nomservice from SERVICE where ID = :new.IDSERVICE;
    
    if num_bloc is null and nomservice = 'Chirurgie' then
        raise_application_error(-20551,'Le patient n''est pas attribué a un bloc' );
    end if;
end;/




create trigger Stock_faible after insert on MEDICAMENT
begin
    Count QUANTITEMEDOC into quantite FROM COMPOSER Where (SELECT ID From TRAITEMENT WHERE DATETRAITEMENT > SYSDATE-120)
    
end;

create trigger Stock_faible after insert or update on MEDICAMENT
begin
   Select Count QUANTITEMEDOC into quantite FROM COMPOSER Where IDTRAITEMENT = (SELECT ID From TRAITEMENT WHERE DATETRAITEMENT > SYSDATE-120) AND IDMEDICAMENT = :new.ID;
   if(:new.STOCK < 200)then
        INSERT INTO COMMANDE(IDMEDICAMENT,DATECOMMANDE,QUANTITECOMMANDE,ETAT) VALUES (:new.ID,SYSDATE,quantite/10,0);
   end if; 
end;/

ALTER TABLE PATIENT
ADD CONSTRAINT CHK_Sortie Check (DATESORTIE > DATEENTREE);

ALTER TABLE INFECTION
ADD CONSTRAINT CHK_date_guerison CHECK (DATEGUERISON > DATEDIAGNOSTIC);

ALTER TABLE PATIENT
ADD CONSTRAINT CHK_Urgence Check (NIVURGENCE >=0 AND NIVURGENCE<=10)

ALTER TABLE TRAITEMENT
ADD CONSTRAINT CHK_traitement_finTraitement CHECK (DATEFINTRAITEMENT > DATETRAITEMENT);
