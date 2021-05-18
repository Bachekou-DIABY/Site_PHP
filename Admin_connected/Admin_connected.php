<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name=" description "  content="">

  <link rel="stylesheet" href="../bootstrap/bootstrap-4.4.1-dist/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="../CSS/style.css">
  <title>ECF-Banque</title>
</head>
<body>
  <?php

  require_once '../Ressources/Check_session.php';
  check_session();
  if (!session_start()) {
      session_start();
  }

  require_once '../Ressources/db.php';
  $db = db_connect();
  $stmt = $db->prepare('SELECT id,first_name,last_name,email,BankID,identity FROM users WHERE is_validated=0');
  ?>
  <header class="container-fluid">
    <div class="row">
      <div class="col-4 logo"></div>
      <div class="col-8">
        <?php echo '<p><b>Utilisateur :</b> '.$_SESSION['first_name'].' '.$_SESSION['last_name'].'</p>'; ?>  
      </div>
    </div>
    <div class="row navbar position">
      <nav class="col d-flex navbar navbar-dark navbar-expand-sm ">
        <div class="container-fluid ">
          <a class="navbar-brand" href=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="navbar-nav nav-justified w-100 ">
              <a class="nav-link" href="../Admin_Modify_login_info/index.php">Gerer le profil</a>
              <a class="nav-link" href="../User_disconnected/index.php">Deconnexion</a>
            </div>
          </div>    
        </div>
      </nav>
    </div>
  </header>
  <main class="container-fluid">
    <div class="row position d-block">
      <h5>Valider un utilisateur</h5>
      <table class="table table-dark table-bordered table-sm col-8">
        <thead>
          <tr>
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
          <td scope="row"><?php echo $last_name; ?></td>
          <td scope="row"><?php echo $first_name; ?></td>
          <td scope="row"><?php echo $email; ?></td>
          <td scope="row"><?php echo $BankID; ?></td>
          <td scope="row">
            <a href="../Inscription/uploads/<?php echo $identity; ?>">Voir la pièce</a>
          </td>
          <td>
            <button class="btn btn-success" type="submit">
              <a href="validate_user.php?user_id=<?php echo $id; ?>">
                Valider
              </a>
            </button>
          </td>
        </tr>
        <?php
        }
        ?>
        </tbody>
      </table>
    </div>
    <div class="row position d-block">
      <h6>Supprimer un utilisateur<h6>
      <table class="table table-dark table-bordered table-sm col-8">
        <thead>
          <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Email</th>
            <th scope="col">Supprimer</th>
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
          <td scope="row"><?php echo $last_name; ?></td>
          <td scope="row"><?php echo $first_name; ?></td>
          <td scope="row"><?php echo $email; ?></td>
          <td>
          <button class="btn btn-danger" type="submit">
            <a href="delete_user.php?user_id=<?php echo $id; ?>"> 
              Valider la suppression
            </a>
          </button>
          </td>
        </tr>
        <?php
        }
        ?>
        </tbody>
      </table>
    </div>
  </main>
  <footer class="container-fluid">
    <div class="row position">
      <p>Tous droits reservés</p>
    </div>
  </footer>
</body>
</html>

