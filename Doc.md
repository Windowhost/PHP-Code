# Curso de php enfocado en la web y elmprtocolo HTTP
# Usaremos el stack LAMP (Linux, Apache, MySQL, PHP) 
    
    PHP es un lenguaje con el cual se puede hacer cuaquier tipo de programa.

    1 Descargar y ejecutar xampp
    https://www.apachefriends.org/es/index.html

# 2 Desde cosola aceder al los archivos php para ver la versiones de php y mysqul

    3 Ver la version de php
    /c/xampp/php
    ./php.exe --version

# 4 Ver la version de mysql

    /c/xampp/mysql/bin
    ./mysql.exe --version

# 5 Agreagar variable de entorno para aceder a php, mysql dede culcuiera parte del system

    Ahora desde culquier punto de ubicacion con la consolola escribre los siguientes comandos para ver la versiones
    php --version
    mysql --version

# 6 Con el servidor (xampp) iniciado

    En la url escribir localhost
    arroja la pagina de http://localhost/dashboard/
    Los Archivos de mi codigo se guardan en la carpeta htdocs. hay que haceder a esa ruta pra que se puedan visualizar con el servidor.

# NOTA: Instalat en linx (video 3)

# 7 En el settings.json

    Aqui se escribiran una serie de configuraciones que seran utiles para el projecto

    "editor.tabSize" : 2
        Esto indica que hara  2 espacios en la tabulacion ya qye php estara ligado con html

    "files.insertFinalNewLine": true
        Esto inserta una linea en blaco al final cunado se guarda el documento

    file:///C:/Users/windo/w-host/SourceCode/PHP/php-mastermain/index.html
        Esta ruta me llevara al html file que he creado con un hola mundo

    Ruta para ver el documento en el navegador (el server tiene que estar levantado)
        http://localhost/myPHPcode/php-mastermain/contacts-app/

# 8 Para ejecutar un archivo en php (como en python)
    php fileNme.php

# CREAR Y ACEDER A LA DB MYSQL!!!
    mysql --user root -p

    Luego enter para la contraseña (no la exije por defecto)

    SHOW DATABASES;
 # crea la base de datos
    CREATE DATABASE contacts_app;
# Borrar una base de datos o taba
    DROP DATABASE databaseName
    DROP DATABASE tableName

# para usa una base de datos
    USE databaseName

# Creando una tabla con dos campos uno para nombre y otro para telefono
    CREATE TABLE contacts (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(50), phone_number VARCHAR(50));

 # Una ves dentro de una base de datos para ver las tablas
    SHOW TABLES;

 # Para ver la descripcion de la tabla o estructura
    DESCRIBE tableName;

    NOtas: Los campos delas tablas tienen que tener un id para identificar cada campo ya que dos campo pueden ser similar en su contenido

 # Añadir informacion a los campos
    INSERT INTO contacts (name, phone_number) VALUES ("Samuel", "84923456789");

 # para selecionar los campos con la info
    SELECT id,name,phone_number FROM contacts;
    SELECT * FROM contacts; 

 # Para actualizar dattos
    UPDATE contacts SET name = "Antoni" WHERE name = "Samuel";

 # Selecionar un contacto
    SELECT * FROM contacts WHERE id IN = 1;

# Para borraer
    DELETE FROM contacts WHERE id = 2;

# Automatizando la creacion de o isercion de los datos en la DB
    Crea una una carpeta sql
    Dentro un archivo de congiguracio para insertara los datos de forma automatica 
# Ejecucion
    ir al la capeta sql por consola
    mysql -i root -p



