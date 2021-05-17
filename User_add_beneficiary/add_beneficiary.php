<?php

require_once '../Ressources/db.php';
if (!session_start()) {
    session_start();
}
$db = db_connect();
$user_id = $_SESSION['id'];
$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$bankID = $_POST['BankID'];

$stmt = $db->prepare("SELECT id FROM beneficiary WHERE BankID = '{$bankID}' AND user_id={$user_id}");
$stmt->execute();
$stmt->store_result();
$id_in_db = $stmt->num_rows();
$stmt->free_result();
if (1 <= $id_in_db) {
    header('Location: ./index.php?error=id_exists');

    exit;
}

$stmt = $db->prepare("SELECT BankID FROM users WHERE BankID = '{$bankID}'");
$stmt->execute();
$stmt->store_result();
$BankID_in_db = $stmt->num_rows();
$stmt->free_result();
if (1 != $BankID_in_db) {
    header('Location: ./index.php?error=BankID_doesn\'t_exists');

    exit;
}

$stmt = $db->prepare('INSERT INTO beneficiary(user_id,last_name,first_name,BankID)
VALUES(?,?,?,?)');
$stmt->bind_param('isss', $user_id, $last_name, $first_name, $bankID);
$stmt->execute();

header('Location: ../User_connected/index.php');

exit;
