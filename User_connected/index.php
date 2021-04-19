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
  class DB extends SQLite3
  {
      public function __construct()
      {
          $this->open('../Ressources/ECF-Banque.db');
      }
  }
  $db = new DB();
  $email = $_POST['email'];

  $req = $db->prepare('SELECT is_validated FROM user WHERE email = :email');
  $req->bindValue(':email', $email, SQLITE3_TEXT);
  $is_validated = $req->execute()->fetchArray(SQLITE3_ASSOC)['is_validated'];

  if (0 === $is_validated) {
      require_once 'User_not_validated.php';
  } else {
      require_once 'User_validated.php';
  }
  ?>
</body>
</html>