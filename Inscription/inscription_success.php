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
  <title>Ma banque en ligne</title>
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
      <nav class="col d-flex navbar navbar-dark navbar-expand-sm">
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
      <p>Inscription réussie !<br>
      Veuillez retourner a la page d'accueil ou a la page de connexion
      </p>
    </div>
  </main>
  <footer class="container-fluid">
    <div class="row position">
      <p>Tous droits reservés</p>
    </div>
  </footer>
  <?php
    $uploadedFile = 'uploads/';
    function isUploadSuccessful(array $uploadedFile): bool
    {
        return isset($uploadedFile['error']) && UPLOAD_ERR_OK === $uploadedFile['error'];
    }

    function isUploadSmallerThan2M(array $uploadedFile): bool
    {
        return $uploadedFile['size'] < 2000000;
    }

    function isMimeTypeAuthorized(array $authorizedMimeTypes, array $uploadedFile): bool
    {
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mimeType = $finfo->file($uploadedFile['tmp_name']);

        return in_array($mimeType, $authorizedMimeTypes, true);
    }

    function getExtensionFromMimeType(array $authorizedMimeTypes, array $uploadedFile): string
    {
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mimeType = $finfo->file($uploadedFile['tmp_name']);

        if ($extension = array_search($mimeType, $authorizedMimeTypes, true)) {
            return $extension;
        }

        throw new RuntimeException('Le type MIME n\'est lié à aucune extension');
    }

    function moveUploadedFile(array $uploadedFile, string $filename, string $extension): bool
    {
        return move_uploaded_file(
            $uploadedFile['tmp_name'],
            sprintf(
                './uploads/%s.%s',
                $filename,
                $extension
            )
        );
    }

    @mkdir('./uploads', 0644);

    // 2
    $authorizedMimeTypes = [
        'png' => 'image/png',
        'jpg' => 'image/jpeg',
        'gif' => 'image/gif',
    ];
    $message = null;

    if ('POST' === $_SERVER['REQUEST_METHOD']) {
        try {
            // 1
            $filename = $_FILES['uploaded_file']['name'] ?? null;
            $filename = preg_replace('/\.[a-z]*/s', '', $filename);
            $uploadedFile = $_FILES['uploaded_file'] ?? [];

            // 3
            if (!isUploadSuccessful($uploadedFile)) {
                throw new RuntimeException('Le téléchargement a échoué');
            }

            if (!isMimeTypeAuthorized($authorizedMimeTypes, $uploadedFile)) {
                throw new RuntimeException('Le type de fichier n\'est pas supporté');
            }

            // 4
            if (!isUploadSmallerThan2M($uploadedFile)) {
                throw new RuntimeException('Le fichier dépasse les 2 Mo');
            }

            // 5
            if (!preg_match('/^[\w-]+$/', $filename)) {
                throw new RuntimeException('Le nom du fichier ne doit pas être vide et ne contenir que des lettres, des chiffres, des tirets ou des underscores');
            }

            if (!moveUploadedFile($uploadedFile, $filename, getExtensionFromMimeType($authorizedMimeTypes, $uploadedFile))) {
                throw new RuntimeException('Le téléchargement a échoué');
            }

            $message = 'Upload réussi';
        } catch (RuntimeException $e) {
            $message = $e->getMessage();
            if ('Upload réussi' != $message) {
                header("Location: ./index.php?error=file&message='{$message}'");

                exit;
            }
        }
    }

  require_once '../Ressources/Bank_ID_Generator.php';

  require_once '../Ressources/db.php';

  $db = db_connect();
  $last_name = $_POST['last_name'];
  $first_name = $_POST['first_name'];
  $birthdate = $_POST['birthdate'];
  $adress = $_POST['adress'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $uploadedFile = $_FILES['uploaded_file']['name'];
  $bankID = generateChain(10, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
  $pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $stmt = $db->prepare("SELECT email FROM users WHERE email = '{$email}'");
  $stmt->execute();
  $stmt->store_result();
  $email_in_db = $stmt->num_rows();
  $stmt->free_result();
  if (1 <= $email_in_db) {
      header('Location: ./index.php?error=email_exists');

      exit;
  }

    $stmt = $db->prepare('INSERT INTO users(last_name,first_name,birthdate,adress,email,password,BankID,identity)
    VALUES(?,?,?,?,?,?,?,?)');
    $stmt->bind_param('ssssssss', $last_name, $first_name, $birthdate, $adress, $email, $pass_hash, $bankID, $uploadedFile);

    $stmt->execute();

  ?>

</body>
</html>
