<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


  <!-- Bootstrap Javascript 
       This javascript can be placed at the end of the document but with the defer keyword we prevent it from loading before the html. this avoids dependencies   
    -->
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Custom Syles -->
  <link rel="stylesheet" href="./statics/css/main.css">

  <!-- js script -->
  <!-- Identificando la ruta del js script para que lolo carge en el archivo index -->
  <!-- A las rutas se le pueden psar query. Aqui validamos que si se le pasa un query a la ruta que se elimine -->

  <!-- 1 Guardando la URI donde estamos. parse_url le pasamos una url y esta nos extrae los ditintos componente que esta tiene (REQUEST_URI). PHP_URL_PATH , esta funcoin extrae solo el path-->
  <?php $uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH); ?>

  <!-- 2 validacion de la uri a cargar  -->
  <?php
  if ($uri == "/myPHPcode/php-mastermain/contacts-app/" || $uri == "/myPHPcode/php-mastermain/contacts-app/index.php") :
  ?>
    <script defer src="./statics/js/welcome.js"></script>
  <?php endif ?>

  <title>Contacts -App PHP</title>

</head>

<body>
  <!-- Reutilizacion del header here  -->
  <?php require "navbar.php" ?>

  <!-- Añadiendo los mensajes flash -->
  <?php if (isset($_SESSION["flash"])) : ?>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
      </symbol>
    </svg>

    <div class="container mt-4">
      <div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
          <use xlink:href="#check-circle-fill" />
        </svg>
        <div class="ml-2">
          <?= $_SESSION["flash"]["message"] ?>
        </div>
      </div>
    </div>

    <!-- Despues que sale el message lo borramos  -->
    <?php unset($_SESSION["flash"]) ?>
  <?php endif ?>

  <!-- Main Start Section -->
  <main>