<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../bootstrap/bootstrap-4.4.1-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.CSS">
  <link rel="stylesheet" href="../CSS/Template.css">
  <title>ECF Banque</title>
</head>
<body>
<?php
require_once '../Ressources/db.php';
$db = db_connect();
session_start();
$admin_id = $_SESSION['id'];

?>
<div class="grid-container">
  <div class="logo"></div>
  <div class="subtitle">
    <h1>Ma Banque en ligne</h1>
  </div>
  <div class="navigation">
      <ul class="navbar">
        <li class= "btn btn-primary">
          <a href="../Homepage/index.html">Accueil</a>
        </li>
      </ul>
    </div>
  <div class="content">
    <h1>Les informations ont bien été modifiées</h1>
    <a href="../User_connexion/index.php">Se connecter a nouveau</a>
  </div>
  <div class="footer">
    <p><b>Tous droits reservés</b></p>
  </div>
</div>
</body>
</html>