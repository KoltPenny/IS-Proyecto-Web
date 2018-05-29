delimiter #
create procedure gt_nombreAgencia(
in attr varchar(20))
begin

select nombreAgencia from Agencia
where nombreAgencia>attr
order by nombreAgencia;

end #

create procedure lt_nombreAgencia(
in attr varchar(20))
begin

select nombreAgencia from Agencia
where nombreAgencia<attr
order by nombreAgencia;

end #

create procedure eq_nombreAgencia(
in attr varchar(20))
begin

select nombreAgencia from Agencia
where nombreAgencia=attr
order by nombreAgencia;

end #

create procedure gtoeq_nombreAgencia(
in attr varchar(20))
begin

select nombreAgencia from Agencia
where nombreAgencia>=attr
order by nombreAgencia;

end #

create procedure ltoeq_nombreAgencia(
in attr varchar(20))
begin

select nombreAgencia from Agencia
where nombreAgencia<=attr
order by nombreAgencia;

end #

create procedure neq_nombreAgencia(
in attr varchar(20))
begin

select nombreAgencia from Agencia
where nombreAgencia<>attr
order by nombreAgencia;

end #
delimiter ;
