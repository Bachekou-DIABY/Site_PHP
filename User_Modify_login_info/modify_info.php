<?php

require_once '../Ressources/db.php';
$db = db_connect();
session_start();
$admin_id = $_SESSION['id'];
$email = $_POST['email'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$password = $_POST['password_new'];
$pass_hash = password_hash($_POST['password_new'], PASSWORD_DEFAULT);

$stmt = $db->prepare("UPDATE users SET first_name='{$first_name}', last_name='{$last_name}',password='{$pass_hash}', email='{$email}' WHERE id={$admin_id}");

$stmt->execute();

header('Location: ../User_Modify_login_info_success/index.php');

exit;
