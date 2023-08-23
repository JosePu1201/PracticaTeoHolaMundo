CREATE DATABASE Modelo;
USE Modelo;

CREATE TABLE Persona (
    cui INT NOT NULL,
    PRIMARY KEY (cui)
);

CREATE  TABLE PartidoPolitico(
    nombre VARCHAR(50),
    cantidad INT,
    PRIMARY KEY (nombre)
);

INSERT INTO PartidoPolitico (nombre,cantidad)
VALUES ('UNE',0);

INSERT INTO PartidoPolitico (nombre,cantidad)
VALUES ('SEMILLA',0);

INSERT INTO PartidoPolitico (nombre,cantidad)
VALUES ('NULO',0);