<!-- archivo que maneja la logica de delete  -->
<?php
require "database.php";
session_start();

// Si el user no esta authenticado lo redirige al login y termina todo
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    return;
}

// capturando el id que viene el boton de delete con la super global get
$id = $_GET["id"];

//selecionando todo desde la base de datos y borra ese id
$stetament = $conn->prepare("SELECT * FROM contacts WHERE id = :id LIMIT 1");
$stetament->execute([":id" => $id]);

// validacion para los errores
if ($stetament->rowCount() == 0) {
    http_response_code(404);
    echo ("HTTP 404 NOT FOUND");
    return;
}

// aqui especificamos que un usuario pueda hacerder a sus contactos y no  a los demas 
$contact = $stetament->fetch(PDO::FETCH_ASSOC);
if ($contact["user_id"] !== $_SESSION["user"]["id"]) {
    http_response_code(403);
    echo ("HTTP 403 NO AUTHORIZADO");
    return;
}

$conn->prepare("DELETE FROM contacts WHERE id = :id")->execute([":id" => $id]);

// Añadiendo los mensaje flash
$_SESSION["flash"] = ["message" => "Contct {$_contact['name']} deleted."];
header("Location: home.php");
