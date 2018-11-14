drop sequence LIT_SEQ_AI;
drop sequence PATIENT_SEQ_AI;
drop sequence DATEMALADIE_SEQ_AI;
drop sequence MALADIE_SEQ_AI;
drop sequence DISPONIBLE_SEQ_AI;
drop sequence ROLE_SEQ_AI;
drop sequence EMPLOYE_SEQ_AI;
drop sequence SERVICE_SEQ_AI;
drop sequence TRAITEMENT_SEQ_AI;
drop sequence STATUT_SEQ_AI;
drop sequence MEDICAMENT_SEQ_AI;
drop sequence COMMANDE_SEQ_AI;
drop sequence ETATCOMMANDE_SEQ_AI;

drop trigger LIT_AI;
drop trigger PATIENT_AI;
drop trigger DATEMALADIE_AI;
drop trigger MALADIE_AI;
drop trigger DISPONIBLE_AI;
drop trigger ROLE_AI;
drop trigger EMPLOYE_AI;
drop trigger SERVICE_AI;
drop trigger TRAITEMENT_AI;
drop trigger STATUT_AI;
drop trigger MEDICAMENT_AI;
drop trigger COMMANDE_AI;
drop trigger ETATCOMMANDE_AI;


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
