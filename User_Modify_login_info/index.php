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
session_start();
?>
<div class="grid-container">
  <div class="logo"></div>
  <div class="subtitle">
    <h1>Ma Banque en ligne</h1>
  </div>
  <div class="navigation">
      <ul class="navbar">
        <li class= "btn btn-primary">
          <a href="../User_connected/index.php">Retour</a>
        </li>
        <li class= "btn btn-danger">
          <a href="../User_ask_for_delete/User_ask_for_delete.php" onclick="return confirm('Etes vous sur de vouloir supprimer votre compte ?')">Supprimer son compte</a>
        </li>
      </ul>
    </div>
  <div class="content">
  <?php
  var_dump($_SESSION);
  ?>
    <h1 class="subtitle-position">Modifier les informations de connexion</h1>
      <form action="modify_info.php" method="POST" >
      
      <label for="first_name">Indiquez votre prénom</label>
      <input type="text" name="first_name" id="first_name" placeholder="Prénom" required>
      
      <label for="last_name">Indiquez votre nom de famille</label>
      <input type="text" name="last_name" id="last_name" placeholder="Nom" required>
      
      <label for="email"> Saisissez votre adresse email</label>
      <input type="email" name="email" id="email" placeholder="Adresse E-mail" required>

      <label for="email_confirm"> Saisissez a nouveau votre adresse email</label>
      <input type="email" name="email_confirm" id="email_confirm" placeholder="Adresse E-mail" required>

      <label for="password">Saisissez l'ancien mot de passe</label>
      <input type="password" name="password_old" id="password_old" placeholder="Mot de passe" required>
      
      <label for="password">Saisissez le nouveau mot de passe</label>
      <input type="password" name="password_new" id="password_new" placeholder="Nouveau mot de passe" required>
      
      <button class="btn btn-success" type="submit" >Valider les informations</button>
    </form>
  </div>
  <div class="footer">
    <p><b>Tous droits reservés</b></p>
  </div>
</div>
<script src="script.js"></script>
</body>
</html>