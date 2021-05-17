<?php

require_once '../Ressources/db.php';
$db = db_connect();

$sql = ' ALTER TABLE `heroku_85e4eb877a354da`.`users` 
AUTO_INCREMENT = 1 ';
$stmt = $db->prepare($sql);
$stmt->execute();

$sql = ' ALTER TABLE `heroku_85e4eb877a354da`.`beneficiary` 
AUTO_INCREMENT = 1 ';
$stmt = $db->prepare($sql);
$stmt->execute();
