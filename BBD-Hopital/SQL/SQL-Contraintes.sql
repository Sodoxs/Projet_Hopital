create function f_PATIENT_INOPERABLE()
AS
    service_actu char;
    patient INT;
    service INT;
  begin
    select into patient ID from PATIENT where IDLIT = new.ID;
    select into service IDSERVICE from PATIENT where IDPATIENT = patient;
    select into service_actu SERVICE from SERVICE where SERVICE.ID = service;

    if new.NUMBLOC != null and service_actu = 'chirugie' then
      raise exception 'numero bloc ne peut pas etre null en service chirugie';
    else if new.NUMBLOC = null and service_actu != 'chirugie' then
      raise exception 'num bloc doit etre null pour a patient n etant pas en chirugie';
    end if;

    return new;
end;

create trigger PATIENT_INOPERABLE before update on  LIT for each row
  declare
  begin
    execute function f_PATIENT_INOPERABLE();
end;/
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

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
    raise_application_error(-20666, 'ca marche pas');
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
    nomservice varchar(50);
begin
    select NUMBLOC into num_bloc from LIT where ID = :new.IDLIT;
    select SERVICE into nomservice from SERVICE where ID = :new.IDSERVICE;
    
    if num_bloc is null and nomservice = 'Chirurgie' then
        raise_application_error(-20551,'Le patient n''est pas attribué a un bloc' );
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
