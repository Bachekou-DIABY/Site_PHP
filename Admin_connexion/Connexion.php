<?php

  require_once '../Ressources/db.php';

  $db = db_connect();
  $email = $_POST['email'];
  $password = $_POST['password'];

  $stmt = $db->prepare("SELECT id,password,last_name,first_name,first_connexion FROM banker WHERE email = '{$email}'");
  $stmt->execute();
  $stmt->bind_result($id, $pass_hash, $last_name, $first_name, $first_connexion);
  $stmt->fetch();

  if (!$id) {
      header('Location: ../Admin_connexion/index.php?error=email');

      exit;
  }
  $isPasswordCorrect = password_verify($password, $pass_hash);
  if (!$isPasswordCorrect) {
      header('Location: ../Admin_connexion/index.php?error=password');

      exit;
  }

  session_start();
  $_SESSION['id'] = $id;
  $_SESSION['email'] = $email;
  $_SESSION['first_name'] = $first_name;
  $_SESSION['last_name'] = $last_name;
  $_SESSION['password'] = $password;
  $_SESSION['first_connexion'] = $first_connexion;

  if (0 == $first_connexion) {
      header('Location: ../Admin_connexion/first_connexion.php');

      exit;
  }
    header('Location: ../Admin_connected/index.php');

    exit;
