-- Indica el dni, nombre y apellidos de los alumnos erasmus que han realizado alguna entrega.
select alumnadodni, nombre, apellidos from alumnoerasmus inner join alumnado on alumnado.dni= alumnoerasmus.alumnadodni where alumnadodni in (select alumnoerasmusdni from entrega);

-- Indica el nombre y apellidos de un alumno cuyo tutor tenga el dni: 12345678A.
select nombre, apellidos from alumnado where dni = (select alumnadodni from alumnoerasmus where tutordocentesdni= '12345678A');

-- Indica el nombre y apellidos del alumno que no va a Polonia.
select nombre, apellidos from alumnado where dni not in (select alumnoerasmusdni from solicita where país = 'Polonia');
