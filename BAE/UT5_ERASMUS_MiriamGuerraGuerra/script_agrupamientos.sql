-- Indica el número de alumnos erasmus por tutor.
select tutordocentesdni as 'Tutor DNI', count(*) as 'Número de alumnos' from alumnoerasmus group by tutordocentesdni;

-- Calcula la puntuación media de las entrevistas del mes de marzo.
select avg(puntuación) as 'Puntuación media de Marzo' from entrevista where month(fecha)=3;

-- Indica el número de plazas de cada tipo de movilidad y suma las cantidades de ambos tipos para hallar el total de plazas.
select if(tipo is null, 'Total plazas', tipo) as Tipo, sum(nplazas) as 'Plazas disponibles' from movilidad group by tipo with rollup;