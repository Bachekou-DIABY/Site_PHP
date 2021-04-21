<!DOCTYPE html>
<html lang="fr">
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
  <div class="subtitle">
    <h1>Ma Banque en ligne</h1>
  </div>
  <div class="navigation">
      <ul class="navbar">
        <li class= "btn btn-primary ">
          <a href="../Accueil/index.html">Accueil</a>
        </li>
      </ul>
    </div>
  <div class="content">
    <h2 class="subtitle-position">Formulaire d'Inscription</h2>
    <?php
    if (array_key_exists('error', $_GET)) {
        if ('file' == $_GET['error']) {
            echo "Le fichier selectionné ne respecte pas le format attendu";
      }
    }
    ?>
    <form method = "POST" action ="../Inscription_success/index.php" enctype="multipart/form-data">

        <label for="first_name">Indiquez votre prénom</label>
        <input type="text" name="first_name" id="first_name" placeholder="Prenom" required>

        <label for="last_name">Indiquez votre nom de famille</label>
        <input type="text" name="last_name" id="last_name" placeholder="Nom de famille"required>

        <label for="birthdate">Indiquez votre date de naissance</label>
        <input type="date" name="birthdate" id="birthdate" >

        <label for="adress">Indiquez votre adresse</label>
        <input type="text" name="adress" id="adress" placeholder="75 rue du pont">

        <label for="email"> Saisissez votre adresse email</label>
        <input type="email" name="email" id="email" placeholder="jeandupont@gmail.com" required>
        
        <label for="password">Saisissez votre mot de passe</label>
        <input type="password" name="password" id="password" placeholder="Mot de passe" required>

        <label for="password">Confirmez votre mot de passe</label>
        <input type="password-confirm" name="password-confirm" id="password-confirm" 
        placeholder="Mot de passe" required>

        <label for="uploaded_file">Selectionnez une pièce d'identité 
        (2 mo maximum, format jpg/png uniquement. 
        Seul les caractères alphanumeriques et les underscores/tirets sont acceptés dans le nom du fichier)</label>
        <input type="file" name="uploaded_file" id="uploaded_file" required>
        
        <button type="submit">Valider l'inscription</button>
    </form>
    <script src="script.js"></script>
  </div>
  <div class="footer">
    <p><b>Tous droits reservés</b></p>
  </div>
</div>
</body>
</html>