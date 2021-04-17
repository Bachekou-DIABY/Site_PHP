<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/ECF-Banque/bootstrap/bootstrap-4.4.1-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/ECF-Banque/CSS/Template.css">
  <link rel="stylesheet" href="style.css">
  <title>ECF Banque</title>
</head>
<body>
<div class="grid-container">
  <div class="logo"></div>
  <div class="subtitle">
    <h1>Ma Banque en ligne</h1>
  </div>
  <div class="navigation">
      <ul class="navbar">
        <li class= "btn btn-secondary"> 
          <a href="/ECF-banque/Connexion_utilisateur/index.php">Connexion</a> 
        </li>
        <li class= "btn btn-dark">
          <a href="/ECF-banque/Connexion_admin/index.php">Connexion administrateur</a> 
        </li>
        <li class= "btn btn-success">
          <a href="/ECF-banque/Inscription/index.php">Inscription</a> 
        </li>
      </ul>
    </div>
    <?php
  require_once 'C:/xampp/htdocs/ECF-Banque/Ressources/db.php';
  class MyDB extends SQLite3
  {
      public function __construct()
      {
          $this->open('C:/xampp/htdocs/ECF-Banque/Ressources/ECF-Banque.db');
      }
  }
  $db = new MyDB();

  $last_name = $_POST['last_name'];
  $first_name = $_POST['first_name'];
  $birthdate = $_POST['birthdate'];
  $adress = $_POST['adress'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $req = $db->prepare('INSERT INTO user(last_name,first_name,birthdate,adress,email,password)
  VALUES(:last_name, :first_name, :birthdate, :adress, :email, :password)');
  $req->bindValue(':last_name', $last_name, SQLITE3_TEXT);
  $req->bindValue(':first_name', $first_name, SQLITE3_TEXT);
  $req->bindValue(':birthdate', $birthdate, SQLITE3_TEXT);
  $req->bindValue(':adress', $adress, SQLITE3_TEXT);
  $req->bindValue(':email', $email, SQLITE3_TEXT);
  $req->bindValue(':password', $pass_hash, SQLITE3_TEXT);
  $req->execute();
  ?>
  <div class="content">
    <p>Inscription réussie !<br>
    Veuillez retourner a la page d'accueil ou a la page de connexion
    </p>
  </div>
  <div class="footer">
    <p><b>Tous droits reservés</b></p>
  </div>
</div>
</body>
</html>