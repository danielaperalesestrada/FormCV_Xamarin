CREATE DATABASE formulario;

USE formulario;

CREATE TABLE datos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    fecha DATE,
    ocupacion VARCHAR(100),
    telefono VARCHAR(20),
    correo VARCHAR(100),
    lugar VARCHAR(100),
    idiomas TEXT,
    nivel VARCHAR(50),
    aptitudes TEXT,
    habilidades TEXT,
    lenguajes TEXT,
    perfil TEXT,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE experiencia_laboral (
    id INT AUTO_INCREMENT PRIMARY KEY,
    puesto VARCHAR(100),
    empresa VARCHAR(100),
    periodo VARCHAR(50),
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE formacion_academica (
    id INT AUTO_INCREMENT PRIMARY KEY,
    grado VARCHAR(100),
    institucion VARCHAR(100),
    periodo_formacion VARCHAR(50),
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
