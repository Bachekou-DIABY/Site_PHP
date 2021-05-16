<?php

require_once '../Ressources/db.php';

$db = db_connect();

$sql = "CREATE TABLE banker (
  id int NOT NULL,
  last_name varchar(50) NOT NULL,
  first_name varchar(50) NOT NULL,
  email varchar(50) NOT NULL,
  password varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  first_connexion tinyint NOT NULL DEFAULT '0'
) ";
$stmt = $db->prepare($sql);
$stmt->execute();

$sql = 'CREATE TABLE beneficiary (
  id int NOT NULL,
  last_name varchar(30) NOT NULL,
  first_name varchar(30) NOT NULL,
  email varchar(50) NOT NULL,
  BankID varchar(10) NOT NULL
) ';

$stmt = $db->prepare($sql);
$stmt->execute();

$sql = "CREATE TABLE users (
  id int NOT NULL,
  last_name varchar(50) NOT NULL,
  first_name varchar(50) NOT NULL,
  birthdate date NOT NULL,
  adress varchar(100) NOT NULL,
  email varchar(50) NOT NULL,
  PASSWORD varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  BankID varchar(30) DEFAULT NULL,
  identity varchar(100) DEFAULT NULL,
  is_validated tinyint NOT NULL DEFAULT '0',
  ask_delete tinyint NOT NULL DEFAULT '0',
  amount float NOT NULL DEFAULT '0'
) ";

$stmt = $db->prepare($sql);
$stmt->execute();

$sql = 'ALTER TABLE banker
  ADD PRIMARY KEY (id)';

$stmt = $db->prepare($sql);
$stmt->execute();

$sql = 'ALTER TABLE users
  ADD PRIMARY KEY (id) USING BTREE';

$stmt = $db->prepare($sql);
$stmt->execute();

$sql = 'ALTER TABLE users
  MODIFY id int NOT NULL AUTO_INCREMENT';

$stmt = $db->prepare($sql);
$stmt->execute();
