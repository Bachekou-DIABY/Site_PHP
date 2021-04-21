
<?php
require_once '../Ressources/db.php';
$db = new DB();
session_start();

$email = $_SESSION['email'];

require_once 'Admin_connected.php';

?>