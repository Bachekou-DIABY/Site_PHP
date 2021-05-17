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
  session_start();
  var_dump($_SESSION);
  ?>
  <header class="container-fluid">
    <div class="row">
      <div class="col-4 logo"></div>
      <div class="col-6">
        <div class="row identifiants position">         
          <?php echo '<p><b>Utilisateur :</b> '.$_SESSION['first_name'].' '.$_SESSION['last_name'].'</p>'; ?> 
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
            <?php if (0 == $_SESSION['first_connexion']) { ?>
              <a class="nav-link" href="../Admin_connexion/first_connexion.php">Retour</a>
            <?php } else {?>
              <a class="nav-link" href="../Admin_connexion/Admin_connected.php">Retour</a>
            <?php }?>
              <a class="nav-link" href="../User_disconnected/index.php">Deconnexion</a>
            </div>
          </div>    
        </div>
      </nav>
    </div>
  </header>
  <main class="container-fluid">
    <div class="row position d-block">
      <h1>Formulaire de modification des informations</h1>
    <div>
    <div class="row position d-flex">
      <form action="modify_info.php" method="POST" >
      
        <label for="first_name">Indiquez votre prénom</label>
        <input class="form-size" type="text" name="first_name" id="first_name" placeholder="Prénom" required>
      
        <label for="last_name">Indiquez votre nom de famille</label>
        <input class="form-size" type="text" name="last_name" id="last_name" placeholder="Nom" required>
      
        <label for="email"> Saisissez votre adresse email</label>
        <input class="form-size" type="email" name="email" id="email" placeholder="Adresse E-mail" required>

        <label for="email_confirm"> Saisissez a nouveau votre adresse email</label>
        <input class="form-size" type="email" name="email_confirm" id="email_confirm" placeholder="Adresse E-mail" required>

        <label for="password">Saisissez l'ancien mot de passe</label>
        <input class="form-size"  type="password" name="password_old" id="password_old" placeholder="Mot de passe" required>
      
        <label for="password">Saisissez le nouveau mot de passe</label>
        <input class="form-size"  type="password" name="password_new" id="password_new" placeholder="Nouveau mot de passe" required>
      
        <button class="btn btn-info" type="submit" >Valider les informations</button>

      </form> 
      <script src="script.js"></script>
    </div>
  </main>
  <footer class="container-fluid">
    <div class="row position">
      <p>Tous droits reservés</p>
    </div>
  </footer>
</body>
</html>