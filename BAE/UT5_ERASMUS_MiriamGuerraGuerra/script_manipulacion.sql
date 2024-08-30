-- Introduce los datos en la tabla entrevista, utilizando el dni del alumno Carlos González, el dni de un docente con más de 6 años de experiencia, la fecha de la entrevista fue el 2024-02-15 y el alumno obtuvo un 7 de puntuación.
insert into entrevista (AlumnadoDNI, DocentesDNI, Fecha, Puntuación) 
values (( select dni from alumnado where nombre='Carlos' and apellidos='González'),(select docentesdni from profesorerasmus where añosexperiencia>6),'2024-02-15',7);

-- Introduce los datos de una nueva estudiante llamada Ana López, con DNI: 23456789C. Nacida en 2002-09-14. Su id de ciclo es 1. Los datos de localidad, calle y número son los mismos que los de la alumna con DNI: 98765432B. 
insert into alumnado(DNI, FechaNacimiento, Nombre, Apellidos, IdCicloFormativo, Localidad, Calle, Numero) select '23456789C', '2002-09-14', 'Ana', 'López', 1, localidad, calle, numero from alumnado where dni= '98765432B'; 

-- Borra de la tabla entrevista al alumno que realizó su entrevista en el mes de febrero y cuyo docente vive en la localidad de Madrid.
delete from entrevista where month(fecha)=2 and docentesdni in (select dni from docentes where localidaddocente='Madrid');