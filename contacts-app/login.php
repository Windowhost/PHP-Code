<?php

require "database.php";

// Si el user ya esta authenticado lo redirige al home  tambien te podria registrar con otro user
// if (isset($_SESSION["user"])) {
//   header("Location: home.php");
//   return;
// }

$error = null;

// la peticion post del form se hara a este mismo archivo. 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //  VALIDACIONES (Aqui hay que validar todos los tipos de datos)
  if (empty($_POST["email"]) || empty($_POST["password"])) {
    $error = "Please fill al the fields.";
  } else if (!str_contains($_POST["email"], "@")) {
    $error = "Email format invalid";
  } else {

    $statemen = $conn->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
    $statemen->bindParam(":email", $_POST["email"]);
    $statemen->execute();

    //logica que comprueba si el user ya esta registrado si no arroja el error
    if ($statemen->rowCount() == 0) {
      $error = "Ivalid Credentials.";
    } else {
      // Aqui usamos el formato asociativo para buscar el user en al db 
      $user = $statemen->fetch(PDO::FETCH_ASSOC);

      // Conprobar que la conteseña coincide con la que tenemos en la deb
      if (!password_verify($_POST["password"], $user["password"])) {
        $error = "Ivalid Credentials";
      } else {
        // Antes de logear el user tenemos que almacenarlo en una secction 
        // si no tines una session asociada te crea una en el servidor y so tienes una el el sistema ya sabe cual tienes porque el navegador te manda la cookies  
        session_start();

        // Almacenando la informacion en la la variable global SESSION
        // esto elimina el password de la session
        unset($user["password"]);
        //contenido de la session. esto contendra todo los datos execto del pass
        $_SESSION["user"] = $user;

        header("Location: home.php");
      }
    }
  }
}

?>

<!-- Reutilizacion del header here  -->
<?php require "partials/header.php" ?>

<div class="container pt-5">
  <div class="row justify-content-center">
    <div class="col-md-8 ">
      <div class="card bg-dark p4 text-white">
        <div class="card-header">Login</div>
        <div class="card-body">

          <?php if ($error) : ?>
            <p class="text-danger">
              <?= $error ?>
            </p>
          <?php endif ?>

          <!-- la peticion post del form se hara a este mismo archivo. -->
          <form method="post" action="login.php ">

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