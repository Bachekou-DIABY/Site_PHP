
<?php
require_once '../Ressources/db.php';
$db = db_connect();
session_start();

$email = $_SESSION['email'];

require_once 'Admin_connected.php';

?>