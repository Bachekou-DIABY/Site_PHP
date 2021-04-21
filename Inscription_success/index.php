<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../bootstrap/bootstrap-4.4.1-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../CSS/Template.css">
  <link rel="stylesheet" href="style.css">
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
        <li class= "btn btn-secondary"> 
          <a href="../User_connexion/index.php">Connexion</a> 
        </li>
        <li class= "btn btn-dark">
          <a href="../Admin_connexion/index.php">Connexion administrateur</a> 
        </li>
        <li class= "btn btn-success">
          <a href="../Inscription/index.php">Inscription</a> 
        </li>
      </ul>
    </div>
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
                header('Location: ../Inscription/index.php?error=file');

                exit;
            }
        }
    }

  require_once '../Ressources/Bank_ID_Generator.php';

  require_once '../Ressources/db.php';

  $db = new DB();

  $last_name = $_POST['last_name'];
  $first_name = $_POST['first_name'];
  $birthdate = $_POST['birthdate'];
  $adress = $_POST['adress'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $uploadedFile = $_FILES['uploaded_file']['name'];
  $bankID = generateChain(10, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
  $pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $req = $db->prepare('INSERT INTO user(last_name,first_name,birthdate,adress,email,password,BankID,identity)
  VALUES(:last_name, :first_name, :birthdate, :adress, :email, :password, :BankID, :identity)');
  $req->bindValue(':last_name', $last_name, SQLITE3_TEXT);
  $req->bindValue(':first_name', $first_name, SQLITE3_TEXT);
  $req->bindValue(':birthdate', $birthdate, SQLITE3_TEXT);
  $req->bindValue(':adress', $adress, SQLITE3_TEXT);
  $req->bindValue(':email', $email, SQLITE3_TEXT);
  $req->bindValue(':password', $pass_hash, SQLITE3_TEXT);
  $req->bindValue(':BankID', $bankID, SQLITE3_TEXT);
  $req->bindValue(':identity', $uploadedFile, SQLITE3_TEXT);

  $req->execute();

?>
  <div class="content">
    <p>Inscription réussie !<br>
    Veuillez retourner a la page d'accueil ou a la page de connexion
    </p>
  </div>
  <div class="footer">
    <p><b>Tous droits reservés</b></p>
  </div>
</div>
</body>
</html>