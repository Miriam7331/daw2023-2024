-- Indica todas las asignaturas de idiomas que tienen clases asociadas.
select claseidiomas.idclaseidiomas, claseidiomas.nivel, claseidiomas.horario, idiomaclases.idiomaclases from claseidiomas left join idiomaclases on claseidiomas.idclaseidiomas=idiomaclases.idclaseidiomas;

-- Indica los datos de las entrevistas realizadas y qué destreza se valoró, de los alumnos que tuviesen una puntuación inferior o igual a 8.
select entrevista.identrevista, entrevista.alumnadodni, docentesdni, fecha, puntuación, destrezas from destrezasevaluadas right join entrevista on entrevista.identrevista= destrezasevaluadas.identrevista where puntuación <= 8;

-- Indica los nombres de los ciclos que tengan menos de dos alumnos junto al nombre y apellidos de los docentes  de cada ciclo.
select cf.nombre as 'Nombre del ciclo', d.nombre as 'Nombre docente', d.apellidos as 'Apellidos docente', count(ae.alumnadodni) as 'Número de alumnos' from cicloformativo cf left join alumnado on cf.idcicloformativo=alumnado.idcicloformativo left join alumnoerasmus ae on alumnado.dni=ae.alumnadodni left join tutor on ae.tutordocentesdni=tutor.docentesdni left join docentes d on tutor.docentesdni=d.dni group by cf.idcicloformativo, d.dni, d.nombre, d.apellidos having count(ae.alumnadodni) <2;