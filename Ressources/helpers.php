<?php

function check_admin_session()
{
    if ($_SESSION['id'] > 5) {
        header('Location: ../Homepage/index.php');

        exit;
    }
}

function check_user_session()
{
    if ($_SESSION['id'] < 5) {
        header('Location: ../Homepage/index.php');

        exit;
    }
}
