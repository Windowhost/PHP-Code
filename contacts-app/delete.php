<!-- archivo que maneja la logica de delete  -->
<?php
require "database.php";

// capturando el id que viene el boton de delete con la super global get
$id = $_GET["id"];

//selecionando todo desde la base de datos y borra ese id
$stetament = $conn->prepare("SELECT * FROM contacts WHERE id = :id");
$stetament->execute([":id" => $id]);

// validacion para los errores
if ($stetament->rowCount() == 0) {
    http_response_code(404);
    echo ("HTTP 404 NOT FOUND");
    return;
}

$conn->prepare("DELETE FROM contacts WHERE id = :id")->execute([":id" => $id]);

// validaciones para que no te pasen una sql injection
// $stetament->bindParam(":id", $id);
// $stetament->execute();

// ejecutando el statament y le pasamos un arry asociativo con un shorcut y nos evitamos bindParam de arriba
// $stetament->execute([":id" => $id]);

// haciendo la redirecion
header("Location: home.php");
