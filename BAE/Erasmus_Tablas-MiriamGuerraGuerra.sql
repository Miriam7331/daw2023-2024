-- Miriam Guerra Guerra


drop database if exists erasmus;
create database erasmus character set utf8mb4 collate utf8mb4_0900_as_cs;
use erasmus;

CREATE TABLE DOMICILIO (
Localidad varchar(25) not null primary key,
    Provincia VARCHAR(25) NOT NULL,
    CodigoPostal CHAR(5) NOT NULL   
);


CREATE TABLE DOCENTES (
    DNI CHAR(9) NOT NULL PRIMARY KEY,
    Nombre VARCHAR(15) NOT NULL,
    Apellidos VARCHAR(25) NOT NULL,
    LocalidadDocente varchar (25),
         Calle varchar (45) not null,
     Numero int (3),
    constraint domicilio_docentes foreign key (LocalidadDocente) references Domicilio (Localidad) on delete restrict on update cascade
);

CREATE TABLE TELEFONO (
    DocentesDNI CHAR(9) NOT NULL,
    Telefono CHAR(9) NOT NULL UNIQUE,
    primary key (DocentesDNI, Telefono),
    CONSTRAINT telefono_docentes FOREIGN KEY (DocentesDNI)
        REFERENCES Docentes (DNI)
        ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE EMAIL (
    DocentesDNI CHAR(9) NOT NULL,
    Email VARCHAR(45) NOT NULL UNIQUE,
    primary key (DocentesDNI, Email),
    CONSTRAINT email_docentes FOREIGN KEY (DocentesDNI)
        REFERENCES Docentes (DNI)
        ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE PROFESORERASMUS (
    DocentesDNI CHAR(9) NOT NULL PRIMARY KEY,
    AñosExperiencia TINYINT NOT NULL,
    CONSTRAINT profesorErasmus FOREIGN KEY (DocentesDNI)
        REFERENCES Docentes (DNI)
        ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE TUTOR (
    DocentesDNI CHAR(9) NOT NULL PRIMARY KEY,
    NHorasSemanales TINYINT NOT NULL,
    CONSTRAINT profesorTutor FOREIGN KEY (DocentesDNI)
        REFERENCES Docentes (DNI)
        ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE DOCUMENTACIONREQUERIDA (
    IdDocumentacionRequerida INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    CartaPresentacion ENUM('Sí', 'No') NOT NULL,
    CV ENUM('Sí', 'No') NOT NULL,
    DNI ENUM('Sí', 'No') NOT NULL,
    TarjetaSanitaria ENUM('Sí', 'No') NOT NULL
);

CREATE TABLE REUNIONESINFORMATIVAS (
    IdReunionesInformativas INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FechaHora DATETIME NOT NULL,
    Lugar VARCHAR(45) NOT NULL
);

CREATE TABLE CICLOFORMATIVO (
  IdCicloFormativo INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Nombre VARCHAR(45) NOT NULL,
  FechaInicioPracticas DATE NULL,
  FechaFinPracticas DATE NULL,
  Tipo ENUM('GM', 'GS') NULL);
  
  CREATE TABLE DOMICILIOALUMNO (
 Localidad varchar(25) not null primary key,
    Provincia VARCHAR(25) NOT NULL,
    CodigoPostal CHAR(5) NOT NULL   
);

CREATE TABLE ALUMNADO (
    DNI CHAR(9) NOT NULL PRIMARY KEY,
    FechaNacimiento DATE NULL,
    Nombre VARCHAR(15) NOT NULL,
    Apellidos VARCHAR(25) NOT NULL,
    IdCicloFormativo INT NOT NULL,
     Localidad varchar (25),
     Calle varchar (45) not null,
     Numero int (3),
    CONSTRAINT CicloFormativoAlumno FOREIGN KEY (IdCicloFormativo)
        REFERENCES CICLOFORMATIVO (IdCicloFormativo)
        ON DELETE RESTRICT ON UPDATE CASCADE,
    constraint domicilio_alumnos foreign key (Localidad) references DOMICILIOALUMNO (Localidad) on delete restrict on update cascade
);

CREATE TABLE TELEFONOALUMNO (
    AlumnadoDNI CHAR(9) NOT NULL,
    Telefono VARCHAR(45) NOT NULL UNIQUE,
    primary key (AlumnadoDNI, Telefono),
    CONSTRAINT telefonoAlumno FOREIGN KEY (AlumnadoDNI)
        REFERENCES ALUMNADO (DNI)
        ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE EMAILALUMNO (
    AlumnadoDNI CHAR(9) NOT NULL,
    EmailAlumno VARCHAR(45) NOT NULL UNIQUE,
    primary key (AlumnadoDNI, EmailAlumno),
    CONSTRAINT emailAlumno FOREIGN KEY (AlumnadoDNI)
        REFERENCES ALUMNADO (DNI)
        ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE ALUMNOERASMUS (
    AlumnadoDNI CHAR(9) NOT NULL PRIMARY KEY,
    TutorDocentesDNI CHAR(9) NOT NULL,
    CONSTRAINT AlumnoErasmus_Alumnado1 FOREIGN KEY (AlumnadoDNI)
        REFERENCES ALUMNADO (DNI)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT AlumnoErasmus_Tutor1 FOREIGN KEY (TutorDocentesDNI)
        REFERENCES TUTOR (DocentesDNI)
        ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE ENTREGA (
    AlumnoErasmusDNI CHAR(9) NOT NULL PRIMARY KEY,
    TutorDocentesDNI CHAR(9) NOT NULL,
    IdDocumentaciónRequerida INT NOT NULL,
    Entrega ENUM('Sí', 'No') NOT NULL,
    Fecha DATE NOT NULL,
    CONSTRAINT EntregaAlumnoErasmus1 FOREIGN KEY (AlumnoErasmusDNI)
        REFERENCES ALUMNOERASMUS (AlumnadoDNI)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT DocumentaciónRequerida FOREIGN KEY (IdDocumentaciónRequerida)
        REFERENCES DOCUMENTACIONREQUERIDA (IdDocumentacionRequerida)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT EntregaTutor1 FOREIGN KEY (TutorDocentesDNI)
        REFERENCES TUTOR (DocentesDNI)
        ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE CURSOSIDIOMAS (
    IdCursosIdiomas INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Duración VARCHAR(15) NOT NULL,
    Nivel ENUM('A1', 'A2', 'B1', 'B2', 'C1', 'C2') NOT NULL,
    Idioma ENUM('Inglés', 'Francés', 'Alemán', 'Italiano') NOT NULL
);

CREATE TABLE MOVILIDAD (
    IdMovilidad INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    NPlazas TINYINT UNSIGNED NOT NULL,
    Duración SMALLINT UNSIGNED NULL,
    Tipo ENUM('KA103', 'KA116') NOT NULL
);

CREATE TABLE USUARIOOLS (
    IdUsuarioOLS INT NOT NULL AUTO_INCREMENT,
    NombreUsuario VARCHAR(45) NOT NULL UNIQUE,
    Contraseña VARCHAR(45) NOT NULL,
    IdMovilidad INT NOT NULL,
    IdCursosIdiomas INT NOT NULL,
    AlumnoErasmusDNI CHAR(9) NOT NULL,
    Idioma ENUM('Inglés', 'Francés', 'Alemán', 'Italiano') NOT NULL,
    EmailAlumno VARCHAR(45) NOT NULL UNIQUE,
    PRIMARY KEY (IdUsuarioOLS , AlumnoErasmusDNI),
    CONSTRAINT AceptadoAlumnoErasmus1 FOREIGN KEY (AlumnoErasmusDNI)
        REFERENCES ALUMNOERASMUS (AlumnadoDNI)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT IdCursosIdiomas FOREIGN KEY (IdCursosIdiomas)
        REFERENCES CURSOSIDIOMAS (IdCursosIdiomas)
        ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT IdMovilidad FOREIGN KEY (IdMovilidad)
        REFERENCES MOVILIDAD (IdMovilidad)
        ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE PRUEBASNIVEL (
    IdPruebasNivel INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    NivelObtenido ENUM('A1', 'A2', 'B1', 'B2', 'C1', 'C2') NOT NULL,
    NºPreguntasCorrectas TINYINT NOT NULL,
    TipoTest ENUM('TestInicial', 'SegundoTest') NOT NULL,
    IdUsuarioOLS INT NOT NULL,
    Idioma ENUM('Inglés', 'Francés', 'Alemán', 'Italiano') NOT NULL,
    CONSTRAINT IdUsuarioOLS FOREIGN KEY (IdUsuarioOLS)
        REFERENCES USUARIOOLS (IdUsuarioOLS)
        ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE NOERASMUS (
    AlumnadoDNI CHAR(9) NOT NULL PRIMARY KEY,
    PromociónErasmus YEAR NOT NULL,
    CONSTRAINT AlumnadoDNI FOREIGN KEY (AlumnadoDNI)
        REFERENCES ALUMNADO (DNI)
        ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE CLASEIDIOMAS (
    IdClaseIdiomas INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Nivel VARCHAR(45) NOT NULL,
    Horario TIME NOT NULL
);

CREATE TABLE IDIOMACLASES (
    IdClaseIdiomas INT NOT NULL PRIMARY KEY,
    IdiomaClases ENUM('inglés', 'italiano', 'francés', 'alemán') NOT NULL,
    CONSTRAINT IdClaseIdiomas FOREIGN KEY (IdClaseIdiomas)
        REFERENCES CLASEIDIOMAS (IdClaseIdiomas)
        ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE ENTREVISTA (
 primary key (IdEntrevista, AlumnadoDNI, DocentesDNI),
     IdEntrevista INT NOT NULL AUTO_INCREMENT,
	AlumnadoDNI char(9) not null, 
    DocentesDNI char(9) not null,
    Fecha DATE NOT NULL,
    Puntuación DECIMAL NOT NULL,
        CONSTRAINT AlumnadoDNIEntrevistado FOREIGN KEY (AlumnadoDNI)
        REFERENCES ALUMNADO (DNI)
        ON DELETE CASCADE ON UPDATE CASCADE,
            CONSTRAINT profesorEntrevista FOREIGN KEY (DocentesDNI)
        REFERENCES Docentes (DNI)
        ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE DESTREZASEVALUADAS (
	AlumnadoDNI char(9) not null, 
    IdEntrevista INT NOT NULL,
    Destrezas VARCHAR(45) NOT NULL,
    primary key (AlumnadoDNI, IdEntrevista),
    CONSTRAINT DESTREZASEVALUADAS FOREIGN KEY (IdEntrevista)
        REFERENCES ENTREVISTA (IdEntrevista)
        ON DELETE CASCADE ON UPDATE CASCADE,
            CONSTRAINT AlumnadoDNIEvaluado FOREIGN KEY (AlumnadoDNI)
        REFERENCES ALUMNADO (DNI)
        ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE PAISESMOVILIDAD (
    IdMovilidad INT NOT NULL,
    Paises set('Francia', 'Rumanía', 'Polonia', 'Portugal', 'Italia') NOT NULL,
    primary key (IdMovilidad, Paises),
    CONSTRAINT PAISESMOVILIDAD FOREIGN KEY (IdMovilidad)
        REFERENCES MOVILIDAD (IdMovilidad)
        ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE PRUEBA (
    IdPrueba INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Fecha DATE NOT NULL,
    Lugar VARCHAR(45) NOT NULL,
    Idioma ENUM('Inglés', 'Francés', 'Alemán', 'Italiano') NOT NULL
);

CREATE TABLE HACEN (
    AlumnoErasmusDNI CHAR(9) NOT NULL PRIMARY KEY,
    ProfesorErasmusDNI CHAR(9) NOT NULL,
    IdEntrevista INT NOT NULL,
    CONSTRAINT HACENalumnoErasmus FOREIGN KEY (AlumnoErasmusDNI)
        REFERENCES ALUMNOERASMUS (AlumnadoDNI)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT HACENprofesorErasmus FOREIGN KEY (ProfesorErasmusDNI)
        REFERENCES PROFESORERASMUS (DocentesDNI)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT HACENentrevista FOREIGN KEY (IdEntrevista)
        REFERENCES ENTREVISTA (IdEntrevista)
        ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE ACUDEN (
    IdClaseIdiomas INT NOT NULL,
    AlumnoErasmusDNI CHAR(9) NOT NULL,
    ProfesorErasmusDNI CHAR(9) NOT NULL,
    Asistencia ENUM('Puntual', 'Retrasado', 'NoAsisteInjustificado', 'NoAsisteJustificado') NOT NULL,
    Participación ENUM('Mucha', 'Moderada', 'Poca', 'Nada') NOT NULL,
    PRIMARY KEY (IdClaseIdiomas , AlumnoErasmusDNI),
    CONSTRAINT ACUDENIdClaseIdiomas FOREIGN KEY (IdClaseIdiomas)
        REFERENCES CLASEIDIOMAS (IdClaseIdiomas)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT ACUDENAlumnoErasmusDNI FOREIGN KEY (AlumnoErasmusDNI)
        REFERENCES ALUMNOERASMUS (AlumnadoDNI)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT ACUDENProfesorErasmusDNI FOREIGN KEY (ProfesorErasmusDNI)
        REFERENCES PROFESORERASMUS (DocentesDNI)
        ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE OBTIENE (
    AlumnoErasmusDNI CHAR(9) NOT NULL,
    ProfesorErasmusDNI CHAR(9) NOT NULL,
    IdUsuarioOLS INT NOT NULL UNIQUE,
    FechaRegistro DATE NOT NULL,
    Primary key ( IdUsuarioOLS, AlumnoErasmusDNI),
    CONSTRAINT OBTIENEalumnoErasmusDNI FOREIGN KEY (AlumnoErasmusDNI)
        REFERENCES USUARIOOLS (AlumnoErasmusDNI)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT OBTIENEProfesorErasmusDNI FOREIGN KEY (ProfesorErasmusDNI)
        REFERENCES PROFESORERASMUS (DocentesDNI)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT OBTIENEIdUsuarioOLS FOREIGN KEY (IdUsuarioOLS)
        REFERENCES USUARIOOLS (IdUsuarioOLS)
        ON DELETE CASCADE ON UPDATE CASCADE
);
  
CREATE TABLE ASISTEN (
    ProfesorErasmusDNI CHAR(9) NOT NULL,
    IdReunionesInformativas INT NOT NULL,
    AlumnadoDNI CHAR(9) NOT NULL,
    Asistencia ENUM('Sí', 'No') NOT NULL,
    PRIMARY KEY (ProfesorErasmusDNI , IdReunionesInformativas , AlumnadoDNI),
    CONSTRAINT ASISTENProfesorErasmusDNI FOREIGN KEY (ProfesorErasmusDNI)
        REFERENCES PROFESORERASMUS (DocentesDNI)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT ASISTENIdReunionesInformativas FOREIGN KEY (IdReunionesInformativas)
        REFERENCES REUNIONESINFORMATIVAS (IdReunionesInformativas)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT ASISTENalumnoDNI FOREIGN KEY (AlumnadoDNI)
        REFERENCES ALUMNADO (DNI)
        ON DELETE CASCADE ON UPDATE CASCADE
);
 
CREATE TABLE ASESORA (
    AlumnoErasmusDNI CHAR(9) NOT NULL,
    AlumnoAsesorDNI CHAR(9) NOT NULL,
    PRIMARY KEY (AlumnoErasmusDNI , AlumnoAsesorDNI),
    CONSTRAINT AlumnoErasmusDNI FOREIGN KEY (AlumnoErasmusDNI)
        REFERENCES ALUMNOERASMUS (AlumnadoDNI)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT AlumnoAsesorDNI FOREIGN KEY (AlumnoAsesorDNI)
        REFERENCES ALUMNOERASMUS (AlumnadoDNI)
        ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE SOLICITA (
    AlumnoErasmusDNI CHAR(9) NOT NULL PRIMARY KEY,
    IdMovilidad INT NOT NULL,
    FechaInicio DATE NOT NULL,
    FechaFin DATE NOT NULL,
    Idioma ENUM('Inglés', 'Francés', 'Alemán', 'Italiano') NOT NULL,
    País ENUM('Italia', 'Polonia', 'Rumanía') NOT NULL,
    CONSTRAINT SOLICITAAlumnoErasmusDNI FOREIGN KEY (AlumnoErasmusDNI)
        REFERENCES ALUMNOERASMUS (AlumnadoDNI)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT SOLICITAMOVILIDAD FOREIGN KEY (IdMovilidad)
        REFERENCES MOVILIDAD (IdMovilidad)
        ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE REALIZAN (
    AlumnoErasmusDNI CHAR(9) NOT NULL PRIMARY KEY,
    IdPrueba INT NOT NULL,
    Calificación TINYINT NOT NULL,
    CONSTRAINT REALIZANAlumnoErasmusDNI FOREIGN KEY (AlumnoErasmusDNI)
        REFERENCES ALUMNOERASMUS (AlumnadoDNI)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT REALIZANPrueba FOREIGN KEY (IdPrueba)
        REFERENCES PRUEBA (IdPrueba)
        ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE FECHAS (
    IdUsuarioOLS INT NOT NULL,
    UsuarioOLSAlumnoErasmusAceptadoDNI CHAR(9) NOT NULL,
    PRIMARY KEY (IdUsuarioOLS , UsuarioOLSAlumnoErasmusAceptadoDNI),
    CONSTRAINT FECHASIdUsuarioOLS FOREIGN KEY (IdUsuarioOLS)
        REFERENCES USUARIOOLS (IdUsuarioOLS)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT FECHASUsuarioOLSAlumnoErasmusAceptadoDNI FOREIGN KEY (UsuarioOLSAlumnoErasmusAceptadoDNI)
        REFERENCES USUARIOOLS (AlumnoErasmusDNI)
        ON DELETE CASCADE ON UPDATE CASCADE
);
