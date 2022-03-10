<?php
# Declaring a php dict for contacts. (just test)

// $contacts = [
//   ["name" => "Pedeo", "phon_number" => "+4344421212"],
//   ["name" => "Julio", "phon_number" => "+4444421212"],
//   ["name" => "Maria", "phon_number" => "+4544421212"],
//   ["name" => "Lucas", "phon_number" => "+4644421212"],
//   ["name" => "Julian", "phon_number" => "+4744421212"],
// ]; 

# This php logic creates the json when adding a contact.
if (file_exists("contacts.json")) {
  $contacts = json_decode(file_get_contents("contacts.json"), true);
} else {
  $contacts = [];
}

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
       This javascript can be placed at the end of the document but with the defer keyword we prevent it from loading before the html. this avoids dependencies   
    -->
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body>
  <!-- Menu Secction -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand font-weight-bold" href="index.php">
        <img class="mr-2" src="./statics/img/favicon-2.jpg" />
        ContactsApp PHP
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="/contacts-app/index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./contacts-add.php">Add Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Section -->
  <main>
    <div class="container pt-4 p3">
      <div class="row">

        <!-- This logic creates a welcome card if there are no contacts -->
        <?php if (count($contacts) == 0) : ?>
          <div class="col-md-4 mx-auto">
            <div class="card card-body text-center">
              <p>No contacts saved yet</p>
              <a href="contacts-add.php ">Add One!</a>
            </div>
          </div>
        <?php endif ?>

        <!-- This logic creates a card for each contact with their data. This is foreach loop. create a card for each contact-->
        <?php foreach ($contacts as $contact) : ?>
          <div class="col-md-4 mb-3">
            <div class="card text-center">
              <div class="card-body">
                <!-- The strings that come inside the variable must be the same as the name of the contact form input. -->
                <h3 class="card-title text-capitalize"><?= $contact["name"] ?></h3>
                <p class="m-2"><?= $contact["phone_number"] ?></p>
                <a href="#" class="btn btn-secondary mb-2">Edit Contact</a>
                <a href="#" class="btn btn-danger mb-2">Delete Contact</a>
              </div>
            </div>
          </div>
        <?php endforeach ?>

      </div>
    </div>
  </main>

</body>

</html>