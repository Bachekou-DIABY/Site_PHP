<?php

  require_once '../Ressources/db.php';

  $db = db_connect();
  session_start();
  var_dump($_SESSION);
  $id = $_SESSION['id'];

  $stmt = $db->prepare("UPDATE users SET ask_delete=0 WHERE id='{$id}'");

  $stmt->execute();

  header('Location: ../User_cancel_delete/index.php');

  exit;
