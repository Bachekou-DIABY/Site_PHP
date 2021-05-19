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
  <header class="container-fluid">
    <div class="row">
      <div class="col-4 logo"></div>
      <div class="col-8">
        <h1>Ma banque en ligne</h1>
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
              <a class="nav-link" href="../Homepage/index.php">Accueil</a>
              <a class="nav-link" href="../User_connexion/index.php">Connexion</a>
              <a class="nav-link" href="../Admin_connexion/index.php">Connexion Administrateur</a>
              <a class="nav-link active" href="../Inscription/index.php">Inscription</a>
            </div>
          </div>    
        </div>
      </nav>
    </div>
  </header>
  <main class="container-fluid">
    <div class="row position d-block">
      <h1>Formulaire d'inscription</h1>
      <?php
      if (array_key_exists('error', $_GET)) {
          if ('email_exists' == $_GET['error']) {?>
              <p class="error"> <br>Attention : L'adresse email indiquée est dejà utilisée </p>
          <?php
          }
      }
      if (array_key_exists('error', $_GET)) {
          if ('file' == $_GET['error']) {?>
          <?php echo '<p><b>'.$message.'</p>'; ?>  
          <?php
          }
      }
      ?>
      
    <div>
    <div class="row position d-flex">
      <form method = "POST" action ="./inscription_success.php" enctype="multipart/form-data">

        <label for="first_name">Indiquez votre prénom</label>
        <input class="form-size" type="text" name="first_name" id="first_name" placeholder="Prenom" required>

        <label for="last_name">Indiquez votre nom de famille</label>
        <input class="form-size"  type="text" name="last_name" id="last_name" placeholder="Nom de famille"required>

        <label for="birthdate">Indiquez votre date de naissance</label>
        <input class="form-size" type="date" name="birthdate" id="birthdate" required>

        <label for="adress">Indiquez votre adresse</label>
        <input class="form-size"  type="text" name="adress" id="adress" placeholder="75 rue du pont" required>

        <label for="email"> Saisissez votre adresse email</label>
        <input class="form-size"  type="email" name="email" id="email" placeholder="jeandupont@gmail.com" required>

        <label for="password">Saisissez votre mot de passe</label>
        <input class="form-size"  type="password" name="password" id="password" placeholder="Mot de passe" required>

        <label for="password">Confirmez votre mot de passe</label>
        <input class="form-size"  type="password" name="password-confirm" id="password-confirm" 
        placeholder="Mot de passe" required>

        <label for="uploaded_file">Selectionnez une pièce d'identité 
        (2 mo maximum, format jpg/png uniquement. 
        Seul les caractères alphanumeriques et les underscores/tirets sont acceptés dans le nom du fichier)</label>
        <input class="form-size"  type="file" name="uploaded_file" id="uploaded_file" required>
        
        <button class="btn btn-info" type="submit">Valider l'inscription</button>
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

