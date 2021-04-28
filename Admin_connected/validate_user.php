<?php

  require_once '../Ressources/db.php';

  $db = new DB();

  $user_id = $_GET['user_id'];

  $req = $db->prepare('UPDATE user SET is_validated=1 WHERE id=:user_id');
  $req->bindValue(':user_id', $user_id, SQLITE3_INTEGER);
  $req->execute();
  header('Location: ../Admin_connected/index.php');

  exit;
