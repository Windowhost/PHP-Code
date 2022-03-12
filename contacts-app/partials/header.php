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

  <!-- Main Start Section -->
  <main>