<?php

require_once '../Ressources/db.php';
if (!session_start()) {
    session_start();
}
$wire = $_POST['wire'];
if ($wire < 0) {
    header('Location: ./index.php?error=negative_amount');

    exit;
}

$BankID = $_POST['BankID'];
$db = db_connect();
$stmt = $db->prepare("UPDATE users SET amount = amount+{$wire} WHERE BankID='{$BankID}'");
$stmt->execute();

$stmt = $db->prepare("UPDATE users SET amount = amount-{$wire} WHERE id={$_SESSION['id']}");
$stmt->execute();

header('Location: ../User_connected/index.php');

exit;
