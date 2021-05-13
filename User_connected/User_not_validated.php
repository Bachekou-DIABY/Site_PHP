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
              <a class="nav-link" href="../User_disconnected/index.php">Deconnexion</a>
            </div>
          </div>    
        </div>
      </nav>
    </div>
  </header>
  <main class="container-fluid">
    <div class="row position d-block">
      <h2>Bienvenue sur votre page d'accueil</h2>
      <p> Veuillez patienter qu'un administrateur valide votre compte</p>
    </div>
  </main>
  <footer class="container-fluid">
    <div class="row position">
      <p>Tous droits reservés</p>
    </div>
  </footer>
</body>
</html>