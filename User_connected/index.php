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
        <?php session_start();
        if (1 === $_SESSION['is_validated']) {?>
        <li class= "btn btn-info">
          <a href="../User_Modify_login_info/index.php">Gerer le profil</a>
        </li>
        <?php
}
        ?>
      </ul>
    </div>
<?php
  require_once '../Ressources/db.php';

  $db = db_connect();
  session_start();
  $email = $_SESSION['email'];
  $stmt = $db->prepare("SELECT is_validated FROM users WHERE email = '{$email}'");
  $stmt->execute();
  $stmt->bind_result($is_validated);
  $stmt->fetch();

  if (1 === $_SESSION['ask_delete']) {
      header('Location: ../User_ask_for_delete/index.php');

      exit;
  }
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