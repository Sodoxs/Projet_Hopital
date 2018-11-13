create sequence LIT_seq_AI
  start with 1 increment by 1 nomaxvalue;
create trigger LIT_AI before insert on LIT for each row
begin
  select LIT_seq_AI.nextval into:new.id from dual;
end;
