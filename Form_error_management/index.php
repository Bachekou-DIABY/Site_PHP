<?php

try {
    processForm();
} catch (Exception $exception) {
    echo $exception->getMessage();
}
function processForm()
{
    require_once 'User.php';
    $user = new User();
    $formFields = ['first_name', 'last_name', 'birthDate', 'email', 'password', 'comment'];

    foreach ($formFields as $field) {
        $user->{'set'.ucfirst($field)}($_POST[$field]);
    }

    echo 'Utilisateur complet';
}
