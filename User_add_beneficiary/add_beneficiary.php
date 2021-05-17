<?php

require_once '../Ressources/db.php';

$db = db_connect();
$user_id = $_SESSION['id'];
$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$bankID = $_POST['BankID'];

$stmt = $db->prepare('INSERT INTO beneficiary(user_id,last_name,first_name,BankID)
VALUES(?,?,?,?)');
$stmt->bind_param('isss', $user_id, $last_name, $first_name, $bankID);
$stmt->execute();
