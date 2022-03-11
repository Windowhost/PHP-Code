 <!-- En este file definiremos la conexion a la DB  -->
 <?php
    $host = "localhost";
    $database = "contacts_app";
    $user = "root";
    $password = "";

    // Usando la libreria PDO para la conexio a la db
    // https://www.php.net/manual/es/book.pdo.php

    try {
        $conn = new PDO("mysql:hosr=$host;dbname=$database", $user, $password);

        // Para conprobar que la db esta funcionado (Le pasamos un query al foreach)
        // foreach ($conn->query("SHOW DATABASES") as $row);
        // print_r($row);
    } catch (PDOException $e) {

        // Encaso de un error a la db matamos el proceso y le concatenamos el error
        die("PDO Connection Error:" . $e->getMessage());
    }
