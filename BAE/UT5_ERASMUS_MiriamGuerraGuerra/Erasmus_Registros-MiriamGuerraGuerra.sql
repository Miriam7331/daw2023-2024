-- Miriam Guerra Guerra

/*
HACER:
a) Descripción de la consulta propuesta mediante comentarios
b) Sentencia que resuelve la consulta

Nombre de la carpeta comprimida:

UT5_ERASMUS+_TUNOMBRE
*/
INSERT INTO DOMICILIO (Localidad, Provincia, CodigoPostal) VALUES
('Puerto del Rosario', 'Las Palmas', '35600'),
('Madrid', 'Madrid', '54321');

INSERT INTO DOCENTES (DNI, Nombre, Apellidos, LocalidadDocente, Calle, Numero) VALUES
('12345678A', 'Juan', 'Pérez', 'Puerto del Rosario', 'Calle Principal', 123),
('98765432B', 'María', 'Gómez', 'Madrid', 'Avenida Secundaria', 56);

INSERT INTO TELEFONO (DocentesDNI, Telefono) VALUES
('12345678A', '555123456'),
('98765432B', '555678123');

INSERT INTO EMAIL (DocentesDNI, Email) VALUES
('12345678A', 'juan.perez@email.com'),
('98765432B', 'maria.gomez@email.com');

INSERT INTO PROFESORERASMUS (DocentesDNI, AñosExperiencia) VALUES
('12345678A', 5),
('98765432B', 8);

INSERT INTO TUTOR (DocentesDNI, NHorasSemanales) VALUES
('12345678A', 10),
('98765432B', 15);

INSERT INTO DOCUMENTACIONREQUERIDA (CartaPresentacion, CV, DNI, TarjetaSanitaria) VALUES
('Sí', 'Sí', 'No', 'Sí'),
('No', 'Sí', 'Sí', 'No');

INSERT INTO REUNIONESINFORMATIVAS (FechaHora, Lugar) VALUES
('2024-02-10 09:00:00', 'Aula 101'),
('2024-02-15 14:30:00', 'Salón de Actos');

INSERT INTO CICLOFORMATIVO (Nombre, FechaInicioPracticas, FechaFinPracticas, Tipo) VALUES
('Desarrollo de Aplicaciones Web', '2024-03-01', '2024-09-30', 'GS'),
('Administración y Finanzas', '2024-02-15', '2024-07-31', 'GM');

INSERT INTO DOMICILIOALUMNO (Localidad, Provincia, CodigoPostal) VALUES
('Puerto del Rosario', 'Las Palmas', '35600'),
('Madrid', 'Madrid', '54321');

INSERT INTO ALUMNADO (DNI, FechaNacimiento, Nombre, Apellidos, IdCicloFormativo, Localidad, Calle, Numero) VALUES
('12345678A', '2000-05-15', 'Carlos', 'González', 1, 'Puerto del Rosario', 'Calle Principal', '123'),
('98765432B', '2001-08-22', 'Laura', 'Martínez', 2, 'Madrid', 'Avenida Secundaria', 116);

INSERT INTO TELEFONOALUMNO (AlumnadoDNI, Telefono) VALUES
('12345678A', '555123478'),
('98765432B', '555125678');

INSERT INTO EMAILALUMNO (AlumnadoDNI, EmailAlumno) VALUES
('12345678A', 'carlos.gonzalez@email.com'),
('98765432B', 'laura.martinez@email.com');

INSERT INTO ALUMNOERASMUS (AlumnadoDNI, TutorDocentesDNI) VALUES
('12345678A', '12345678A'),
('98765432B', '98765432B');

INSERT INTO ENTREGA (AlumnoErasmusDNI, TutorDocentesDNI, IdDocumentaciónRequerida, Entrega, Fecha) VALUES
('12345678A', '12345678A', 1, 'Sí', '2024-02-20'),
('98765432B', '98765432B', 2, 'No', '2024-02-22');

INSERT INTO CURSOSIDIOMAS (Duración, Nivel, Idioma) VALUES
('6 meses', 'B2', 'Inglés'),
('12 meses', 'A1', 'Francés');

INSERT INTO MOVILIDAD (NPlazas, Duración, Tipo) VALUES
(10, 8, 'KA103'),
(15, 6, 'KA116');

INSERT INTO USUARIOOLS (NombreUsuario, Contraseña, IdMovilidad, IdCursosIdiomas, AlumnoErasmusDNI, Idioma, EmailAlumno) VALUES
('usuario1', 'contraseña1', 1, 1, '12345678A', 'Inglés', 'usuario1@email.com'),
('usuario2', 'contraseña2', 2, 2, '98765432B', 'Francés', 'usuario2@email.com');

INSERT INTO PRUEBASNIVEL (NivelObtenido, NºPreguntasCorrectas, TipoTest, IdUsuarioOLS, Idioma) VALUES
('B1', 20, 'TestInicial', 1, 'Inglés'),
('A2', 15, 'SegundoTest', 2, 'Francés');

INSERT INTO NOERASMUS (AlumnadoDNI, PromociónErasmus) VALUES
('12345678A', 2023),
('98765432B', 2024);

INSERT INTO CLASEIDIOMAS (Nivel, Horario) VALUES
('Intermedio', '15:30:00'),
('Avanzado', '18:00:00');

INSERT INTO IDIOMACLASES (IdClaseIdiomas, IdiomaClases) VALUES
(1, 'inglés'),
(2, 'francés');

INSERT INTO ENTREVISTA (IdEntrevista, AlumnadoDNI, DocentesDNI, Fecha, Puntuación) VALUES
(1, '12345678A', '12345678A', '2024-03-10', '8.5'),
(2, '98765432B', '98765432B','2024-03-15', '7.9');

INSERT INTO DESTREZASEVALUADAS (AlumnadoDNI, IdEntrevista, Destrezas) VALUES
('12345678A',1, 'Comprensión Oral'),
('98765432B',2, 'Expresión Escrita');

INSERT INTO PAISESMOVILIDAD (IdMovilidad, Paises) VALUES
( 1, 'Francia'),
( 2, 'Italia');

INSERT INTO PRUEBA (Fecha, Lugar, Idioma) VALUES
('2024-04-15', 'Universidad XYZ', 'Inglés'),
('2024-04-20', 'Instituto ABC', 'Francés');

INSERT INTO HACEN (AlumnoErasmusDNI, ProfesorErasmusDNI, IdEntrevista) VALUES
('12345678A', '12345678A', 1),
('98765432B', '98765432B', 2);

INSERT INTO ACUDEN (IdClaseIdiomas, AlumnoErasmusDNI, ProfesorErasmusDNI, Asistencia, Participación) VALUES
(1, '12345678A', '12345678A', 'Puntual', 'Mucha'),
(2, '98765432B', '98765432B', 'Retrasado', 'Moderada');

INSERT INTO OBTIENE (AlumnoErasmusDNI, ProfesorErasmusDNI, IdUsuarioOLS, FechaRegistro) VALUES
('12345678A', '12345678A', 1, '2024-04-25'),
('98765432B', '98765432B', 2, '2024-04-28');

INSERT INTO ASISTEN (ProfesorErasmusDNI, IdReunionesInformativas, AlumnadoDNI, Asistencia) VALUES
('12345678A', 1, '12345678A', 'Sí'),
('98765432B', 2, '98765432B', 'No');

INSERT INTO ASESORA (AlumnoErasmusDNI, AlumnoAsesorDNI) VALUES
('12345678A', '98765432B'),
('98765432B', '12345678A');

INSERT INTO SOLICITA (AlumnoErasmusDNI, IdMovilidad, FechaInicio, FechaFin, Idioma, País) VALUES
('12345678A', 1, '2024-05-01', '2024-08-31', 'Inglés', 'Italia'),
('98765432B', 2, '2024-06-15', '2024-09-15', 'Francés', 'Polonia');

INSERT INTO REALIZAN (AlumnoErasmusDNI, IdPrueba, Calificación) VALUES
('12345678A', 1, 85),
('98765432B', 2, 92);

INSERT INTO FECHAS (IdUsuarioOLS, UsuarioOLSAlumnoErasmusAceptadoDNI) VALUES
(1, '12345678A'),
(2, '98765432B');

