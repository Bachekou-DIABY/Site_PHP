<?php

  require_once '../Ressources/db.php';

  $db = db_connect();

  $user_id = $_GET['user_id'];

  $stmt = $db->prepare("UPDATE users SET is_validated=1 WHERE id='{$user_id}'");

  $stmt->execute();

  header('Location: ../Admin_connected/index.php');

  exit;
