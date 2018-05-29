delimiter #
create procedure gt_pais(
in attr varchar(20))
begin

select pais from Agencia
where pais>attr
order by pais;

end #

create procedure lt_pais(
in attr varchar(20))
begin

select pais from Agencia
where pais<attr
order by pais;

end #

create procedure eq_pais(
in attr varchar(20))
begin

select pais from Agencia
where pais=attr
order by pais;

end #

create procedure gtoeq_pais(
in attr varchar(20))
begin

select pais from Agencia
where pais>=attr
order by pais;

end #

create procedure ltoeq_pais(
in attr varchar(20))
begin

select pais from Agencia
where pais<=attr
order by pais;

end #

create procedure neq_pais(
in attr varchar(20))
begin

select pais from Agencia
where pais<>attr
order by pais;

end #
delimiter ;
