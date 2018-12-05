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


