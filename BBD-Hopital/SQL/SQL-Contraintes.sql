create function f_PATIENT_INOPERABLE()
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
    execute procedure f_PATIENT_INOPERABLE();
end;

