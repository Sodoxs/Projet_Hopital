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

create sequence MALADIE_seq_AI
  start with 1 increment by 1 nomaxvalue;
create trigger MALADIE_AI before insert on MALADIE for each row
begin
  select MALADIE_seq_AI.nextval into:new.id from dual;
end;

create sequence DATEMALADIE_seq_AI
  start with 1 increment by 1 nomaxvalue;
create trigger DATEMALADIE_AI before insert on DATEMALADIE for each row
begin
  select DATEMALADIE_seq_AI.nextval into:new.id from dual;
end;

create sequence DATEMALADIE_seq_AI
  start with 1 increment by 1 nomaxvalue;
create trigger DATEMALADIE_AI before insert on DATEMALADIE for each row
begin
  select DATEMALADIE_seq_AI.nextval into:new.id from dual;
end;

create sequence DATEMALADIE_seq_AI
  start with 1 increment by 1 nomaxvalue;
create trigger DATEMALADIE_AI before insert on DATEMALADIE for each row
begin
  select DATEMALADIE_seq_AI.nextval into:new.id from dual;
end;

create sequence DATEMALADIE_seq_AI
  start with 1 increment by 1 nomaxvalue;
create trigger DATEMALADIE_AI before insert on DATEMALADIE for each row
begin
  select DATEMALADIE_seq_AI.nextval into:new.id from dual;
end;

create sequence DATEMALADIE_seq_AI
  start with 1 increment by 1 nomaxvalue;
create trigger DATEMALADIE_AI before insert on DATEMALADIE for each row
begin
  select DATEMALADIE_seq_AI.nextval into:new.id from dual;
end;

create sequence DATEMALADIE_seq_AI
  start with 1 increment by 1 nomaxvalue;
create trigger DATEMALADIE_AI before insert on DATEMALADIE for each row
begin
  select DATEMALADIE_seq_AI.nextval into:new.id from dual;
end;

create sequence DATEMALADIE_seq_AI
  start with 1 increment by 1 nomaxvalue;
create trigger DATEMALADIE_AI before insert on DATEMALADIE for each row
begin
  select DATEMALADIE_seq_AI.nextval into:new.id from dual;
end;

create sequence DATEMALADIE_seq_AI
  start with 1 increment by 1 nomaxvalue;
create trigger DATEMALADIE_AI before insert on DATEMALADIE for each row
begin
  select DATEMALADIE_seq_AI.nextval into:new.id from dual;
end;

create sequence DATEMALADIE_seq_AI
  start with 1 increment by 1 nomaxvalue;
create trigger DATEMALADIE_AI before insert on DATEMALADIE for each row
begin
  select DATEMALADIE_seq_AI.nextval into:new.id from dual;
end;
commit;
