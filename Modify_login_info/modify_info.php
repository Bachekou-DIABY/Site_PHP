<?php

require_once '../Ressources/db.php';
$db = new DB();
session_start();
$admin_id = $_SESSION['id'];
$email = $_POST['email'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$password = $_POST['password_new'];
$pass_hash = password_hash($_POST['password_new'], PASSWORD_DEFAULT);

$req = $db->prepare('UPDATE banker SET first_name=:first_name, last_name=:last_name,password=:password, email=:email WHERE id=:admin_id');
$req->bindValue(':admin_id', $admin_id, SQLITE3_INTEGER);
$req->bindValue(':email', $email, SQLITE3_TEXT);
$req->bindValue(':first_name', $first_name, SQLITE3_TEXT);
$req->bindValue(':last_name', $last_name, SQLITE3_TEXT);
$req->bindValue(':password', $pass_hash, SQLITE3_TEXT);

$req->execute();

header('Location: ../Modify_login_info_success/index.php');

exit;
