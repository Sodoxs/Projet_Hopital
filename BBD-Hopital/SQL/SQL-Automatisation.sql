drop sequence "L3PRO6"."LIT_SEQ_AI";
drop sequence "L3PRO6"."PATIENT_SEQ_AI";
drop sequence "L3PRO6"."DATEMALADIE_SEQ_AI";
drop sequence "L3PRO6"."MALADIE_SEQ_AI";
drop sequence "L3PRO6"."DISPONIBLE_SEQ_AI";
drop sequence "L3PRO6"."ROLE_SEQ_AI";
drop sequence "L3PRO6"."EMPLOYE_SEQ_AI";
drop sequence "L3PRO6"."SERVICE_SEQ_AI";
drop sequence "L3PRO6"."TRAITEMENT_SEQ_AI";
drop sequence "L3PRO6"."MEDICAMENT_SEQ_AI";
drop sequence "L3PRO6"."COMMANDE_SEQ_AI";
drop sequence "L3PRO6"."ETATCOMMANDE_SEQ_AI";
drop sequence "L3PRO6"."STATUT_SEQ_AI";
commit;

drop trigger "L3PRO6"."LIT_AI";
drop trigger "L3PRO6"."PATIENT_AI";
drop trigger "L3PRO6"."DATEMALADIE_AI";
drop trigger "L3PRO6"."MALADIE_AI";
drop trigger "L3PRO6"."DISPONIBLE_AI";
drop trigger "L3PRO6"."ROLE_AI";
drop trigger "L3PRO6"."EMPLOYE_AI";
drop trigger "L3PRO6"."SERVICE_AI";
drop trigger "L3PRO6"."TRAITEMENT_AI";
drop trigger "L3PRO6"."STATUT_AI";
drop trigger "L3PRO6"."MEDICAMENT_AI";
drop trigger "L3PRO6"."COMMANDE_AI";
drop trigger "L3PRO6"."ETATCOMMANDE_AI";
commit;

create sequence LIT_SEQ_AI
  start with 1 increment by 1 nomaxvalue;
create trigger LIT_AI before insert on LIT for each row
begin
  select LIT_SEQ_AI.nextval into:new.id from dual;
end;

create sequence PATIENT_SEQ_AI
  start with 1 increment by 1 nomaxvalue;
create trigger PATIENT_AI before insert on PATIENT for each row
begin
  select PATIENT_SEQ_AI.nextval into:new.id from dual;
end;

create sequence DATEMALADIE_SEQ_AI
  start with 1 increment by 1 nomaxvalue;
create trigger DATEMALADIE_AI before insert on DATEMALADIE for each row
begin
  select DATEMALADIE_SEQ_AI.nextval into:new.id from dual;
end;

create sequence DISPONIBLE_SEQ_AI
  start with 1 increment by 1 nomaxvalue;
create trigger DISPONIBLE_AI before insert on DISPONIBLE for each row
begin
  select DISPONIBLE_SEQ_AI.nextval into:new.id from dual;
end;

create sequence ROLE_SEQ_AI
  start with 1 increment by 1 nomaxvalue;
create trigger ROLE_AI before insert on ROLE for each row
begin
  select ROLE_SEQ_AI.nextval into:new.id from dual;
end;

create sequence EMPLOYE_SEQ_AI
  start with 1 increment by 1 nomaxvalue;
create trigger EMPLOYE_AI before insert on EMPLOYE for each row
begin
  select EMPLOYE_SEQ_AI.nextval into:new.id from dual;
end;

create sequence SERVICE_SEQ_AI
  start with 1 increment by 1 nomaxvalue;
create trigger SERVICE_AI before insert on SERVICE for each row
begin
  select SERVICE_SEQ_AI.nextval into:new.id from dual;
end;

create sequence TRAITEMENT_SEQ_AI
  start with 1 increment by 1 nomaxvalue;
create trigger TRAITEMENT_AI before insert on TRAITEMENT for each row
begin
  select TRAITEMENT_SEQ_AI.nextval into:new.id from dual;
end;

create sequence STATUT_SEQ_AI
  start with 1 increment by 1 nomaxvalue;
create trigger STATUT_AI before insert on STATUT for each row
begin
  select STATUT_SEQ_AI.nextval into:new.id from dual;
end;

create sequence COMMANDE_SEQ_AI
  start with 1 increment by 1 nomaxvalue;
create trigger COMMANDE_AI before insert on COMMANDE for each row
begin
  select COMMANDE_SEQ_AI.nextval into:new.id from dual;
end;

create sequence MEDICAMENT_SEQ_AI
  start with 1 increment by 1 nomaxvalue;
create trigger MEDICAMENT_AI before insert on MEDICAMENT for each row
begin
  select MEDICAMENT_SEQ_AI.nextval into:new.id from dual;
end;

create sequence ETATCOMMANDE_SEQ_AI
  start with 1 increment by 1 nomaxvalue;
create trigger ETATCOMMANDE_AI before insert on ETATCOMMANDE for each row
begin
  select ETATCOMMANDE_SEQ_AI.nextval into:new.id from dual;
end;

create sequence MALADIE_SEQ_AI
  start with 1 increment by 1 nomaxvalue;
create trigger MALADIE_AI before insert on MALADIE for each row
begin
  select MALADIE_SEQ_AI.nextval into:new.id from dual;
end;
commit;
