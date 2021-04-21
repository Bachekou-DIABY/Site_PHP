<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../bootstrap/bootstrap-4.4.1-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.CSS">
  <link rel="stylesheet" href="../CSS/Template.css">
  <title>ECF Banque</title>
</head>
<body>
<?php
require_once '../Ressources/db.php';
class MyDB extends SQLite3
{
    public function __construct()
    {
        $this->open('../Ressources/ECF-Banque.db');
    }
}
$db = new MyDB();

$email = $_POST['email'];
$password = $_POST['password'];

$req = $db->prepare('SELECT * FROM banker WHERE email = :email');
$req->bindValue(':email', $email, SQLITE3_TEXT);
$res = $req->execute()->fetchArray(SQLITE3_ASSOC);
var_dump($_POST['password']);
var_dump($res['password']);

if (!$res) {
    echo 'Mauvais identifiant !';
} else {
    $isPasswordCorrect = password_verify($password, $res['password']);
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['id'] = $res['email'];
        $_SESSION['email'] = $res['email'];
        $_SESSION['first_name'] = $res['first_name'];
        $_SESSION['last_name'] = $res['last_name'];
        echo 'Vous êtes connecté !';
    } else {
        echo 'Mauvais mot de passe !';
    }
}
?>