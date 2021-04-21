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
<div class="grid-container">
  <div class="logo"></div>
  <div class="navigation">
      <ul class="navbar">
        <li class= "btn btn-danger">
          <a href="../User_disconnected/index.php">Deconnexion</a>
        </li>
      </ul>
    </div>
<?php
  require_once '../Ressources/db.php';

  $db = new DB();
  session_start();
  var_dump($_SESSION);
  $email = $_SESSION['email'];

  $req = $db->prepare('SELECT is_validated FROM user WHERE email = :email');
  $req->bindValue(':email', $email, SQLITE3_TEXT);
  $is_validated = $req->execute()->fetchArray(SQLITE3_ASSOC)['is_validated'];

  if (0 === $is_validated) {
      require_once 'User_not_validated.php';
  } else {
      require_once 'User_validated.php';
  }
  ?>
    <div class="footer">
    <p><b>Tous droits reservés</b></p>
    </div>
  </div>
</body>
</html>