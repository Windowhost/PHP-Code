<!--LOGOUT
 Aqui tomamos la session que nos manda el navegador y la destruimos. -->
<?php
session_start();
session_destroy();
header("Location: index.php");
