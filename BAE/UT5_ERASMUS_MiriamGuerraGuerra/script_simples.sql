-- Indica el nombre y apellidos del alumno que tiene código postal 35600.
select Nombre, Apellidos from alumnado inner join domicilioalumno on domicilioalumno.Localidad=alumnado.Localidad where domicilioalumno.CodigoPostal = 35600;

-- Indica el nombre del alumno y la fecha de entrevista que tuviese una nota superior a 8.
select nombre, apellidos, fecha from alumnado inner join entrevista on entrevista.AlumnadoDNI=alumnado.DNI where puntuación > 8;

-- Indica el nombre y el apellido del alumno más joven y su ciclo formativo.
select alumnado.nombre, alumnado.apellidos, cicloformativo.nombre from alumnado inner join cicloformativo on cicloformativo.idcicloformativo=alumnado.idcicloformativo order by alumnado.fechanacimiento desc limit 1;

-- Indica los datos del alumno que tiene el id de usuario '1' y  que nivel obtuvo en la prueba de nivel.
select DNI, FechaNacimiento, Nombre, Apellidos, IdCicloFormativo, Localidad, Calle, Numero, NivelObtenido from alumnado inner join alumnoerasmus on alumnado.DNI=alumnoerasmus.AlumnadoDNI inner join usuariools on usuariools.AlumnoErasmusDNI=alumnoerasmus.alumnadoDNI inner join pruebasnivel on pruebasnivel.idusuariools=usuariools.idusuariools where usuariools.idusuariools='1';

-- Indica los datos del docente cuyo apellido empieza por 'G' y tiene entre 5 y 10 años de experiencia.
select * from docentes inner join profesorerasmus on profesorerasmus.docentesdni = docentes.dni where apellidos like 'G%' and añosexperiencia between 5 and 10;



