<!-- Declarando una un dictinario phph para los contactos -->
<?php

$contacts = [
  ["name" => "Pedeo", "phon_number" => "+4344421212"],
  ["name" => "Julio", "phon_number" => "+4444421212"],
  ["name" => "Maria", "phon_number" => "+4544421212"],
  ["name" => "Lucas", "phon_number" => "+4644421212"],
  ["name" => "Julian", "phon_number" => "+4744421212"],
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contacts -App PHP</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- Custom Syles -->
  <link rel="stylesheet" href="./statics/css/main.css">

  <!-- Bootstrap Javascript 
        Este javascript se puede poner al finar del documento pero con la keyword defer evitamos que este se cargue primero que el html. esto evita las dependencias    
    -->
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body>
  <!-- Seccion del menu -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand font-weight-bold" href="#">
        <img class="mr-2" src="./statics/img/favicon-2.jpg" />
        ContactsApp PHP
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./contacts-add.html">Add Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Section del main -->
  <main>
    <div class="container pt-4 p3">
      <div class="row">

        <!-- Creando los conntactos dinamicamente con un bucle PHP -->
        <?php foreach ($contacts as $contact) { ?>
          <div class="col-md-4 mb-3">
            <div class="card text-center">
              <div class="card-body">
                <h3 class="card-title text-capitalize"><?= $contact["name"] ?></h3>
                <p class="m-2"><?= $contact["phon_number"] ?></p>
                <a href="#" class="btn btn-secondary mb-2">Edit Contact</a>
                <a href="#" class="btn btn-danger mb-2">Delete Contact</a>
              </div>
            </div>
          </div>
        <?php } ?>

      </div>
    </div>
  </main>



</body>

</html>