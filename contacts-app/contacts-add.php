<?php

require "database.php";
session_start();
// Si el user no esta authenticado lo redirige al login y termina todo
if (!isset($_SESSION["user"])) {
  header("Location: login.php");
  return;
}

$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validacion de los datos paque no te envien datos vacios
  // Si la petion POST viene vacia
  if (empty($_POST["name"]) || empty($_POST["phone_number"])) {
    $error = "Please fill all the fields";

    // Si no hay errores ejecuta lo de abajo.
    // TODO hay que validar el tipo de datos (regexp)
  } else if (strlen($_POST["name"]) < 5) {
    $error = "Error: Name lenght to short";
  } else if (strlen($_POST["phone_number"]) < 9) {
    $error = "Error: Phone Number lenght to short";
  } else {
    $name = $_POST["name"];
    $phoneNumber = $_POST["phone_number"];

    # Relgas de seguiridad para evitar sql injection.
    # (captura lo que viene del form add y comprobarlo con la libreia)
    # preparamos la sentencia a recivir :name, :phoneNumber)" . esto hay que sustituirlo por lo valores verdadero. pero hay que sanear dichos valores antes para evitar una injecion sql
    $statement = $conn->prepare("INSERT INTO contacts (user_id, name, phone_number) VALUES ({$_SESSION['user']['id']}, :name, :phone_number)");

    // Con la siguiente sentencia se sanean los datos a recibir. Esta fucion analiza los dato y reduce el potencial de ataque y lo cambia por el valor
    $statement->bindParam(":name", $_POST["name"]);
    $statement->bindParam(":phone_number", $_POST["phone_number"]);

    $statement->execute();

    header("Location: home.php");
  }
}

?>

<!-- Reutilizacion del header here  -->
<?php require "partials/header.php" ?>

<div class="container pt-5">
  <div class="row justify-content-center">
    <div class="col-md-8 ">
      <div class="card bg-dark p4 text-white">
        <div class="card-header">Add New Contact</div>
        <div class="card-body">

          <!-- Validacion de los datos enviado -->
          <?php if ($error) : ?>
            <p class="text-danger">
              <?= $error ?>
            </p>
          <?php endif ?>

          <form method="post" action="contacts-add.php ">
            <div class="mb-3 row">
              <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

              <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" required autocomplete="name" autofocus>
              </div>
            </div>

            <div class="mb-3 row">
              <label for="phone_number" class="col-md-4 col-form-label text-md-end">Phone Number</label>

              <div class="col-md-6">
                <input id="phone_number" type="tel" class="form-control" name="phone_number" autocomplete="phone_number" autofocus>
              </div>
            </div>

            <div class="mb-3 row">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Reutilizacion del footer here  -->
<?php require "partials/footer.php" ?>