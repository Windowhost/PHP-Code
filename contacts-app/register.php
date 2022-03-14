<?php

require "database.php";
$error = null;

// Capturando los elemnetos del formulario
// la peticion post del form se hara a este mismo archivo. 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //  VALIDACIONES (Aqui hay que validar todos los tipos de datos)
  if (empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["password"])) {
    $error = "Please fill al the fields.";
  } else if (!str_contains($_POST["email"], "@")) {
    $error = "Email format invalid";
  } else {
    //logica para guardar los user
    $statemen = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $statemen->bindParam(":email", $_POST["email"]);
    $statemen->execute();

    //logica que comprueba si el user ya existe
    if ($statemen->rowCount() > 0) {
      $error = "This email is allready in use.";
    } else {
      $conn
        ->prepare("INSERT INTO
      users (name, email, password)
    VALUES
      (:name, :email, :password)")
        ->execute([
          ":name" => $_POST["name"],
          ":email" => $_POST["email"],
          // Aqui hasheamos la contraseña con bcrypt
          ":password" => password_hash($_POST["password"], PASSWORD_BCRYPT),
        ]);

      // si todo va bien redirigir el user al home
      header("Location: home.php");
      // die("Store user");
    }
  }


  // para imprimir por pantalla el valor de variable, en este caso los calores de la peticion POST.
  // var_dump($_POST);
  // die();
}

?>

<!-- Reutilizacion del header here  -->
<?php require "partials/header.php" ?>

<div class="container pt-5">
  <div class="row justify-content-center">
    <div class="col-md-8 ">
      <div class="card bg-dark p4 text-white">
        <div class="card-header">Register</div>
        <div class="card-body">

          <?php if ($error) : ?>
            <p class="text-danger">
              <?= $error ?>
            </p>
          <?php endif ?>

          <!-- la peticion post del form se hara a este mismo archivo. -->
          <form method="post" action="register.php ">
            <div class="mb-3 row">
              <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

              <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" autocomplete="name" placeholder="Name" autofocus require>
              </div>
            </div>

            <div class="mb-3 row">
              <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

              <div div class="col-md-6">
                <input type="email" id="email" class="form-control" name="email" autocomplete="email" placeholder="Email" require>
              </div>
            </div>

            <div class="mb-3 row">
              <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

              <div div class="col-md-6">
                <input type="password" id="password" class="form-control" name="password" autocomplete="password" placeholder="Password" require>
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