<?php

require_once '../Ressources/db.php';

$db = db_connect();
$user_id = $_SESSION['id'];
$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$bankID = $_POST['BankID'];

$stmt = $db->prepare("INSERT INTO beneficiary(last_name,first_name,BankID)
VALUES(?,?,?) WHERE id='{$user_id}'");
$stmt->bind_param('sss', $last_name, $first_name, $bankID);
$stmt->execute();
