-- Script SQL pra la Automatizacion de la creacion de o isercion de los datos en la DB
-- Ejecucion
-- ir al la capeta sql por consola
-- mysql -u root -p
-- Para la ejecucin de este comando hay que estar situado en la carpeta sql
-- source setup.sql

-- Si la DB existe borrala
DROP DATABASE IF EXISTS contacts_app;

-- Crea la base de datos
CREATE DATABASE contacts_app;

-- Usa esta  DB
USE contacts_app;

-- Crea la tabla contactos con los siguientes formato para los datos   
CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
     phone_number VARCHAR(50)
);

-- Insertale los siguientes datos
INSERT INTO contacts (name, phone_number) VALUES (" Esther", "38200000");
INSERT INTO contacts (name, phone_number) VALUES (" Samuel", "38211111");
INSERT INTO contacts (name, phone_number) VALUES (" Ariel", "382222222");

-- Reinicia la base de datos
-- source setup.sql