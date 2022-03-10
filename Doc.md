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
