<?php
# haciendo uso de los datos que vienen de la base de datos
require "database.php";

// para iniciar la session
session_start();

// Si el user no esta authenticado lo redirige al login y termina todo
if (!isset($_SESSION["user"])) {
  header("Location: login.php");
  return;
}

// var_dump($_COOKIE);
// var_dump($HTTP_RAW_POST_DATA);
// var_dump($_SERVER);
// var_dump($_ENV);
// die();
#Usando los datos de la tabla contactos
$contacts = $conn->query("SELECT * FROM contacts");
?>

<!-- Reutilizacion del header here  -->
<?php require "partials/header.php" ?>

<div class="container mt-5 p3">
  <div class="row">
    <!-- This logic creates a welcome card if there are no contacts -->
    <?php if ($contacts->rowCount() == 0) : ?>
      <div class="col-md-4 mx-auto ">
        <div class="card card-body text-center bg-info">
          <h3>No contacts saved yet</h3>
          <a href="contacts-add.php">Add One!</a>
        </div>
      </div>
    <?php endif ?>

    <?php foreach ($contacts as $contact) : ?>
      <div class="col-md-4 mb-3">
        <div class="card text-center">
          <div class="card-body">

            <h3 class="card-title text-capitalize"><?= $contact["name"] ?></h3>
            <p class="m-2"><?= $contact["phone_number"] ?></p>
            <!-- Aqui le pasamos al noton edit por query srtran los valores de la base de datos pra editarloso. Al dar click en edit captura los datos -->
            <a href="edit.php?id=<?= $contact["id"] ?>" class="btn btn-secondary mb-2">Edit Contact</a>
            <a href="delete.php?id=<?= $contact["id"] ?>" class="btn btn-danger mb-2">Delete Contact</a>
          </div>
        </div>
      </div>
    <?php endforeach ?>
  </div>
</div>

<!-- Reutilizacion del footer here  -->
<?php require "partials/footer.php" ?>