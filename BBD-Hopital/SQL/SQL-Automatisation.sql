drop sequence LIT_seq_AI;
drop sequence PATIENT_seq_AI;
drop sequence DATEMALADIE_seq_AI;
drop sequence MALADIE_seq_AI;
drop sequence DISPONIBLE_seq_AI;
drop sequence ROLE_seq_AI;
drop sequence EMPLOYE_seq_AI;
drop sequence SERVICE_seq_AI;
drop sequence TRAITEMENT_seq_AI;
drop sequence STATUT_seq_AI;
drop sequence MEDICAMENT_seq_AI;
drop sequence COMMANDE_seq_AI;
drop sequence ETATCOMMANDE_seq_AI;

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


create sequence LIT_seq_AI
  start with 1 increment by 1 nomaxvalue;
create trigger LIT_AI before insert on LIT for each row
begin
  select LIT_seq_AI.nextval into:new.id from dual;
end;

create sequence PATIENT_seq_AI
  start with 1 increment by 1 nomaxvalue;
create trigger PATIENT_AI before insert on PATIENT for each row
begin
  select PATIENT_seq_AI.nextval into:new.id from dual;
end;

create sequence DATEMALADIE_seq_AI
  start with 1 increment by 1 nomaxvalue;
create trigger DATEMALADIE_AI before insert on DATEMALADIE for each row
begin
  select DATEMALADIE_seq_AI.nextval into:new.id from dual;
end;

create sequence DISPONIBLE_seq_AI
  start with 1 increment by 1 nomaxvalue;
create trigger DISPONIBLE_AI before insert on DISPONIBLE for each row
begin
  select DISPONIBLE_seq_AI.nextval into:new.id from dual;
end;

create sequence ROLE_seq_AI
  start with 1 increment by 1 nomaxvalue;
create trigger ROLE_AI before insert on ROLE for each row
begin
  select ROLE_seq_AI.nextval into:new.id from dual;
end;

create sequence EMPLOYE_seq_AI
  start with 1 increment by 1 nomaxvalue;
create trigger EMPLOYE_AI before insert on EMPLOYE for each row
begin
  select EMPLOYE_seq_AI.nextval into:new.id from dual;
end;

create sequence SERVICE_seq_AI
  start with 1 increment by 1 nomaxvalue;
create trigger SERVICE_AI before insert on SERVICE for each row
begin
  select SERVICE_seq_AI.nextval into:new.id from dual;
end;

create sequence TRAITEMENT_seq_AI
  start with 1 increment by 1 nomaxvalue;
create trigger TRAITEMENT_AI before insert on TRAITEMENT for each row
begin
  select TRAITEMENT_seq_AI.nextval into:new.id from dual;
end;

create sequence STATUT_seq_AI
  start with 1 increment by 1 nomaxvalue;
create trigger STATUT_AI before insert on STATUT for each row
begin
  select STATUT_seq_AI.nextval into:new.id from dual;
end;

create sequence COMMANDE_seq_AI
  start with 1 increment by 1 nomaxvalue;
create trigger COMMANDE_AI before insert on COMMANDE for each row
begin
  select COMMANDE_seq_AI.nextval into:new.id from dual;
end;

create sequence MEDICAMENT_seq_AI
  start with 1 increment by 1 nomaxvalue;
create trigger MEDICAMENT_AI before insert on MEDICAMENT for each row
begin
  select MEDICAMENT_seq_AI.nextval into:new.id from dual;
end;

create sequence ETATCOMMANDE_seq_AI
  start with 1 increment by 1 nomaxvalue;
create trigger ETATCOMMANDE_AI before insert on ETATCOMMANDE for each row
begin
  select ETATCOMMANDE_seq_AI.nextval into:new.id from dual;
end;

create sequence MALADIE_seq_AI
  start with 1 increment by 1 nomaxvalue;
create trigger MALADIE_AI before insert on MALADIE for each row
begin
  select MALADIE_seq_AI.nextval into:new.id from dual;
end;
commit;
