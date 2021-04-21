<?php

  require_once '../Ressources/db.php';

  $db = new DB();
  $email = $_POST['email'];
  $password = $_POST['password'];

  $req = $db->prepare('SELECT * FROM user WHERE email = :email');
  $req->bindValue(':email', $email, SQLITE3_TEXT);
  $res = $req->execute()->fetchArray(SQLITE3_ASSOC);

  if (!$res) {
      header('Location: ../User_connexion/index.php?error=email');

      exit;
  }
  $isPasswordCorrect = password_verify($password, $res['password']);
  if (!$isPasswordCorrect) {
      header('Location: ../User_connexion/index.php?error=password');

      exit;
  }
  session_start();
  $_SESSION['id'] = $res['id'];
  $_SESSION['email'] = $res['email'];
  $_SESSION['first_name'] = $res['first_name'];
  $_SESSION['last_name'] = $res['last_name'];
  $_SESSION['BankID'] = $res['BankID'];
  header('Location: ../User_connected/index.php');

  exit;
