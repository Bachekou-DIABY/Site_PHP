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
  check_session($_SESSION);

  if (!session_start()) {
      session_start();
  }
  $id = $_SESSION['id'];

  require_once '../Ressources/db.php';
  $db = db_connect();
  $stmt = $db->prepare("SELECT id,first_name,last_name,BankID FROM beneficiary WHERE user_id='{$id}'");
  ?>
  <header class="container-fluid">
    <div class="row">
      <div class="col-4 logo"></div>
      <div class="col-8">
        <div class="row identifiants">         
          <?php echo '<p><b>Utilisateur :</b> '.$_SESSION['first_name'].' '.$_SESSION['last_name'].'</p>'; ?> 
        </div>
        <div class="row identifiants">         
          <?php echo '<p><b>Identifiant bancaire :</b> '.$_SESSION['BankID'].'</p>'; ?>  
        </div>
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
              <a class="nav-link"href="../User_connected/index.php">Retour</a>
            </div>
          </div>    
        </div>
      </nav>
    </div>
  </header>
  <main class="container-fluid">
    <div class="row position d-block">
      <h5>Gerer les bénéficiaires</h5>
      <table class="table table-dark table-bordered table-sm col-8">
        <thead>
          <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">BankID</th>
            <th scope="col">Montant du virement</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $stmt->execute();
        $stmt->bind_result($id, $first_name, $last_name, $BankID);
        while ($stmt->fetch()) {
            ?>
        <tr>
          <td ><?php echo $last_name; ?></td>
          <td ><?php echo $first_name; ?></td>
          <td ><?php echo $BankID; ?></td>
          <td >
            <form action="./wire.php" method="POST">
              <input type="float" name="wire" placeholder="3.14"> €
              <input type="hidden" name="BankID"  value="<?php echo $BankID; ?>">
              <button class="btn btn-success" type="submit">Valider le virement</button>
            </form>
          </td>
        </tr>
        <?php
        }
        ?>
        </tbody>
      </table>
    </div>
    <?php
      if (array_key_exists('error', $_GET)) {
          if ('negative_amount' == $_GET['error']) {?>
              <p class="error"> <br>Attention : Le montant du transfert ne peut etre negatif </p>
          <?php
          }
      }
    ?>
  </main>
  <footer class="container-fluid">
    <div class="row position">
      <p>Tous droits reservés</p>
    </div>
  </footer>
</body>
</html>