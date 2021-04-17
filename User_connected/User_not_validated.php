<div class="grid-container">
  <div class="logo"></div>
  <div class="subtitle">
    <h1>Ma Banque en ligne</h1>
  </div>
  <div class="navigation">
      <ul class="navbar">
        <li class= "btn btn-primary">
          <a href="/ECF-banque/Accueil/index.html">Accueil</a>
        </li>
      </ul>
    </div>
    <?php
  require_once 'C:/xampp/htdocs/ECF-Banque/Ressources/db.php';
  class MyDB extends SQLite3
  {
      public function __construct()
      {
          $this->open('C:/xampp/htdocs/ECF-Banque/Ressources/ECF-Banque.db');
      }
  }
  $db = new MyDB();

  $email = $_POST['email'];
  $password = $_POST['password'];

  $req = $db->prepare('SELECT * FROM user WHERE email = :email');
  $req->bindValue(':email', $email, SQLITE3_TEXT);
  $res = $req->execute()->fetchArray(SQLITE3_ASSOC);

  if (!$res) {
      echo 'Mauvais identifiant !';
  } else {
      $isPasswordCorrect = password_verify($password, $res['password']);
      if ($isPasswordCorrect) {
          session_start();
          $_SESSION['id'] = $res['email'];
          $_SESSION['email'] = $res['email'];
          $_SESSION['first_name'] = $res['first_name'];
          $_SESSION['last_name'] = $res['last_name'];
          echo 'Vous êtes connecté !';
      } else {
          echo 'Mauvais mot de passe !';
      }
  }
  ?>
  <div class="content">
    <h1>Bienvenue sur votre page d'accueil</h1>
    <div>
      <p> Veuillez patienter le temps qu'un banquier finalise votre inscription</p>
    </div>
  </div>
  <div class="footer">
    <p><b>Tous droits reservés</b></p>
  </div>
</div>