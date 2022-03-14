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


-- Crea la tabla ususarios con los siguientes formato para los datos
CREATE TABLE users (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255),
email VARCHAR(255) UNIQUE,
password VARCHAR(255)
);
-- Crea la tabla contactos con los siguientes formato para los datos
-- Añadiendo las lleves foraneas. Eto le indica a la base de datos que cualquier contacto que añadimos estara asociada a un user usan do la clave ajena
CREATE TABLE contacts (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(250),
user_id INT NOT NULL,
phone_number VARCHAR(250) NOT NULL,
FOREIGN KEY (user_id) REFERENCES users(id)
);
