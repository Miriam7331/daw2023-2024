-- Indica el país e idioma que solicita el alumno, junto a su nombre y apellidos que se indicará como 'nombre completo' indica también el nombre del tutor del alumno.
select solicita.idioma, solicita.país, CONCAT(alumnado.nombre, ' ', alumnado.apellidos) AS 'Nombre completo', docentes.nombre AS 'Nombre docente' from alumnado inner join alumnoerasmus on alumnoerasmus.alumnadoDNI=alumnado.DNI inner join solicita on solicita.alumnoerasmusdni=alumnoerasmus.alumnadodni inner join docentes on alumnoerasmus.tutordocentesdni=docentes.dni;

-- Indica el teléfono y el nombre del alumno que no ha entregado los documentos.
select telefono, nombre from telefonoalumno inner join alumnado on telefonoalumno.alumnadodni=alumnado.dni inner join alumnoerasmus on alumnoerasmus.alumnadoDNI=alumnado.dni inner join entrega on entrega.alumnoerasmusdni=alumnoerasmus.alumnadoDNI where entrega = 'No';

-- Indica el país y el alumno que ha sacado una calificación mayor a 90. 
select dni,  nombre, apellidos, país from alumnado inner join  alumnoerasmus on alumnoerasmus.alumnadoDNI=alumnado.dni inner join realizan on realizan.alumnoerasmusdni=alumnoerasmus.alumnadodni inner join solicita on solicita.alumnoerasmusdni=alumnoerasmus.alumnadodni where realizan.calificación > 90;

