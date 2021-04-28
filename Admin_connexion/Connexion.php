<?php

  require_once '../Ressources/db.php';

  $db = new DB();
  $email = $_POST['email'];
  $password = $_POST['password'];
  var_dump($password);
  var_dump($email);

  $req = $db->prepare('SELECT * FROM banker WHERE email = :email');
  $req->bindValue(':email', $email, SQLITE3_TEXT);
  $res = $req->execute()->fetchArray(SQLITE3_ASSOC);

  if (!$res) {
      header('Location: ../Admin_connexion/index.php?error=email');

      exit;
  }
  $isPasswordCorrect = password_verify($password, $res['password']);
  if (!$isPasswordCorrect) {
      header('Location: ../Admin_connexion/index.php?error=password');

      exit;
  }

  session_start();
  $_SESSION['id'] = $res['id'];
  $_SESSION['email'] = $res['email'];
  $_SESSION['first_name'] = $res['first_name'];
  $_SESSION['last_name'] = $res['last_name'];
  $_SESSION['password'] = $res['password'];
  if (0 == $res['first_connexion']) {
      header('Location: ../Admin_connexion/first_connexion.php');

      exit;
  }
    header('Location: ../Admin_connected/index.php');

    exit;
