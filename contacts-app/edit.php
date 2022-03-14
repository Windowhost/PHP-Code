<?php

require "database.php";

// Si el user no esta authenticado lo redirige al login y termina todo
if (!isset($_SESSION["user"])) {
  header("Location: login.php");
  return;
}

// Esta peticion get maneja la logica de renderizado de los dos form
$id = $_GET["id"];

//selecionando el id desde la base de datos para editarlo y le decimo que devuelva un solo con LIMIT. Ahunque la base de datos no guarda do id identico esto es para que PDO::FETCH_ASSOC trabaje mejor.
$stetament = $conn->prepare("SELECT * FROM contacts WHERE id = :id LIMIT 1");
$stetament->execute([":id" => $id]);

// validacion para los errores por si no existe el id
if ($stetament->rowCount() == 0) {
  http_response_code(404);
  echo ("HTTP 404 NOT FOUND");
  return;
}

// pero si existe el id hacemos un fetch y se lo pedimos en formato asociativo
$contact = $stetament->fetch(PDO::FETCH_ASSOC);

$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validacion de los datos paque no te envien datos vacios
  // Si la petion POST viene vacia
  if (empty($_POST["name"]) || empty($_POST["phone_number"])) {
    $error = "Please fill all the fields";

    // Si no hay errores ejecuta lo de abajo.
  } else if (strlen($_POST["name"]) < 5) {
    $error = "Error: Name lenght to short";
  } else if (strlen($_POST["phone_number"]) < 9) {
    $error = "Error: Phone Number lenght to short";
  } else {
    $name = $_POST["name"];
    $phoneNumber = $_POST["phone_number"];

    // codigo que ejecuta el actualizado del contacto con query strim
    $stetament = $conn->prepare("UPDATE contacts SET name = :name, phone_number = :phone_number WHERE id = :id");
    $stetament->execute([
      // Si se quiere usae el envio de los datos con input hieen devberiamos qui implemetar alguna logica de if else.
      // ":id" => $_POST["id"],
      ":id" => $id,
      ":name" => $_POST["name"],
      ":phone_number" => $_POST["phone_number"]
    ]);

    // codigo para la actualizacion del contacto 
    header("Location: home.php");
  }
}

?>

<!-- Reutilizacion del header here  -->
<?php require "partials/header.php" ?>

<!-- Section of the form to add contacts -->
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
          <!-- NOTA. Este formulario es para editar el contacto esto se debe hacer con el metodo PUT pero usaremos post ya que en el html solo se puede usar get y post methods en php. cuando los datos llegan a la logica del post se tratan como una actualizacion y problem resuelt
              Aqui hay que mandarle el id denuevo para que php sepa de que proceso se trata,

              Enviar los datos al backen se puede hacer de dos manera:
               # 1 Primera forma: lo eviamo como querystram en la url: ?id=<?= $contact["id"] ?>

               # 2 segunda forma:  <input type="hiedden" >
            -->
          <form method="post" action="edit.php?id=<?= $contact["id"] ?>">

            <!-- <input type="hiedden" value="<?= $contact["id"] ?>" name="id"> -->
            <div class="mb-3 row">
              <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

              <!-- Aqui tenemos que añadirle un value al imput y sera el que viene de la database -->
              <div class="col-md-6">
                <input value="<?= $contact["name"] ?>" id="name" type="text" class="form-control" name="name" required autocomplete="name" autofocus>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="phone_number" class="col-md-4 col-form-label text-md-end">Phone Number</label>

              <div class="col-md-6">
                <input value="<?= $contact["phone_number"] ?>" id="phone_number" type="tel" class="form-control" name="phone_number" autocomplete="phone_number" autofocus>
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