<?php

  require_once '../Ressources/db.php';

  $db = db_connect();
  $email = $_POST['email'];
  $password = $_POST['password'];

  $stmt = $db->prepare("SELECT id,password,last_name,first_name,birthdate,adress,is_validated,BankID,identity,ask_delete FROM users WHERE email = '{$email}'");
  $stmt->execute();
  $stmt->bind_result($id, $pass_hash, $last_name, $first_name, $birhdate, $adress, $is_validated, $BankID, $identity, $ask_delete);
  $stmt->fetch();

  if (!$id) {
      header('Location: ../User_connexion/index.php?error=email');

      exit;
  }
  $isPasswordCorrect = password_verify($password, $pass_hash);
  if (!$isPasswordCorrect) {
      header('Location: ../User_connexion/index.php?error=password');

      exit;
  }

  session_start();
  $_SESSION['id'] = $id;
  $_SESSION['email'] = $email;
  $_SESSION['first_name'] = $first_name;
  $_SESSION['last_name'] = $last_name;
  $_SESSION['BankID'] = $BankID;
  $_SESSION['password'] = $password;
  $_SESSION['ask_delete'] = $ask_delete;
  $_SESSION['is_validated'] = $is_validated;

  header('Location: ../User_connected/index.php');

  exit;
