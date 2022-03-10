<!--
Note: with PHP we can define all kinds of lojica.
Here we will be defining the logic of the contact form.
We will be defining a logic that can determine when we are sending data through the form or when we are receiving it, since we will be using the same form to update the data.
--->

<!--
Super global variables are variables that are available anywhere to PHP such as:
$_SERVER, $_POST
-->

<?php
# var_dump prints the value of the variable we passed to it (SERVER)
# var_dump($_SERVER);
# die(); tells PHP to stop here

# SEND DATA Post type request
# If the request method is post do the following
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  # var_dump($_POST);
  # die();

  # Receiving the data that comes from the form
  $contact = [
    "name" => $_POST["name"],
    "phone_number" => $_POST["phone_number"],
  ];

  # saving the data in an associative array
  # $contacts = [];
  #We will define the logic of saving the contacts in this way with this we will avoid overwriting the contacts if there are contacts we already obtain the array of all the contacts and then we add the last one
  if (file_exists("contacts.json")) {
    $contacts = json_decode(file_get_contents("contacts.json"), true);
  } else {
    $contacts = [];
  }

  $contacts[] = $contact;

  # Stored the data in a file. This creates the json file
  file_put_contents("contacts.json", json_encode($contacts));

  # doing the redirection for when a contact is created
  header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contacts -App</title>

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
  <!-- Menu Section -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand font-weight-bold" href="index.php  ">
        <img class="mr-2" src="./statics/img/favicon-2.jpg" />
        ContactsApp
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./contacts-add.php">Add Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Section of the form to add contacts -->
  <main>
    <div class="container pt-5">
      <div class="row justify-content-center">
        <div class="col-md-8 ">
          <div class="card bg-dark p4 text-white">
            <div class="card-header">Add New Contact</div>
            <div class="card-body">
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
                    <input id="phone_number" type="tel" class="form-control" name="phone_number" required autocomplete="phone_number" autofocus>
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
  </main>

</body>

</html>