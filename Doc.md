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


# CONEXIONES ENTRE PHP Y MYSQL

# SQL injectio
En el formulario de añadir datos se puede introducir todo tipo de comnado causando daños a la aplicacion 
12345'); DROP DATABASE contacts_app; --
En mi variable '$phoneNumber')"); 
'$phoneNumber --')"); : sustituye todo lo que viene despues de la varName

Esto de lee asi:
' : cierro yo mismo esa cadena
) : Cierro el parenteses
; : Cierro la centencia
DROP DATABASE contacts_app; : sentencia a ejecutar (pude ser otras como obterner acceso rrot)
-- : ignora todo lo que venga deppues con un comentario

Si le pasamos en phon number:
12345'); DROP DATABASE contacts_app; --

Nota: Nunca issertar en la databe una setencia que no haya sido escrita por el developer. es decir hay que verificar todo los datos que nos mandan.

El navegador arrojara algo asi indicando que no existe la db
PDO Connection Error:SQLSTATE[HY000] [1049] Unknown database 'contacts_app'

# Validacion
Note: nunca te fie de lo que te enviara el user
requiere en los input del formulario solo evita que el navegador envie el campo vacio. Pero no solo se haran peticion atraves del navegador se puede hacer con (curl) y otros

Por lo tanto hay que hacer las validaciones pertinentes
Si le pasa por consola:
 curl -X POST -d "name=&phone_number=" http://localhost/myPHPcode/php-mastermain/contacts-app/contacts-add.php

 Eto creara un contacto vacio.


# para la peticion DELETE SQL injct
    Si acedemos a la suguiente peticion dede consola
    curl http://localhost/myPHPcode/php-mastermain/contacts-app/delete.php?id=500;

    si no existe el id arroja:
    HTTP 404 NOT FOUND

    Si existe el id lo borra yarroja toda la cabecera del delete file , HTTP/1.1 200 OK

    pero despues de hacer la validaciones en el codigo arroj:  curl HTTP 404 NOT FOUND 
# Desde la url
    Si le pasamos la siguiente url con un id existente entonces esto borrara el id:
    http://localhost/myPHPcode/php-mastermain/contacts-app/delete.php?id=300

    si no existe el id arroja:
    HTTP 404 NOT FOUND

NOTA: para solucionar esto habria que ha cer un meddeware que proteja la url.