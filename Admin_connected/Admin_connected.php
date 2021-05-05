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
<div class="grid-container">
  <div class="logo"></div>
  <div class="navigation">
      <ul class="navbar">
        <li class= "btn btn-danger">
          <a href="../User_disconnected/index.php">Deconnexion</a>
        </li>
        <li class= "btn btn-info">
          <a href="../Admin_Modify_login_info/index.php">Gerer le profil</a>
        </li>
      </ul>
    </div>
  <div class="subtitle">
    <div class="top">
    <?php
    echo '<p><b>Utilisateur :</b> '.$_SESSION['first_name'].' '.$_SESSION['last_name'].'</p>';
    ?>  
    </div>
  </div>
  <?php
  require_once '../Ressources/db.php';
  $db = db_connect();
  $stmt = $db->prepare('SELECT id,first_name,last_name,email,BankID,identity FROM users WHERE is_validated=0');
  ?>
  <div class="container content">
    <div class="row">
      <div class="col">
      <h6>Valider un utilisateur<h6>
        <table class="table table-dark table-bordered table-sm">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nom</th>
              <th scope="col">Prenom</th>
              <th scope="col">Email</th>
              <th scope="col">BankID</th>
              <th scope="col">Piece d'identité</th>
              <th scope="col">Valider</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $stmt->execute();
          $stmt->bind_result($id, $first_name, $last_name, $email, $BankID, $identity);
          while ($stmt->fetch()) {
              ?>
          <tr>
            <th scope="row"><?php echo $id; ?></th>
            <td scope="row"><?php echo $first_name; ?></td>
            <td scope="row"><?php echo $last_name; ?></td>
            <td scope="row"><?php echo $email; ?></td>
            <td scope="row"><?php echo $BankID; ?></td>
            <td scope="row">
              <a href="../inscription_success/uploads/<?php echo $identity; ?>">Voir la pièce</a>
            </td>
            <td>
              <button class="btn btn-success" type="submit">
                <a href="validate_user.php?user_id=<?php echo $id; ?>"
                >Valider
                </a>
              </button>
              <?php

              ?>
            </td>
          </tr>
          <?php
          }
          ?>
        </tbody>
        </table>
      </div>
      <div class="col">
      <h6>Supprimer un utilisateur<h6>
        <table class="table table-dark table-bordered table-sm">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nom</th>
              <th scope="col">Prenom</th>
              <th scope="col">Email</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $stmt = $db->prepare('SELECT id,first_name,last_name,email FROM users WHERE ask_delete=1');
          $stmt->execute();
          $stmt->bind_result($id, $first_name, $last_name, $email);
          while ($stmt->fetch()) {
              ?>
          <tr>
            <th scope="row"><?php echo $id; ?></th>
            <td scope="row"><?php echo $first_name; ?></td>
            <td scope="row"><?php echo $last_name; ?></td>
            <td scope="row"><?php echo $email; ?></td>
            <td>
              <button class="btn btn-danger" type="submit">
                <a href="delete_user.php?user_id=<?php echo $id; ?>"
                >Valider la suppression
                </a>
              </button>
              <?php

              ?>
            </td>
          </tr>
          <?php
          }
          ?>
        </tbody>
        </table>
      </div>
      <div class="col">      
      </div>
    </div>
    <div class="row">
      <div class="col">
      <h6>Valider un beneficiaire<h6>
      </div>
    </div>
  </div>
  <div class="footer">
    <p><b>Tous droits reservés</b></p>
  </div>
</div>