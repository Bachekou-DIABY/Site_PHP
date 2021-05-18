<?php

function check_admin_session()
{
    if ('admin' != $_SESSION['type']) {
        header('Location: ../Homepage/index.php');

        exit;
    }
}

function check_user_session()
{
    if ('user' != $_SESSION['type']) {
        header('Location: ../Homepage/index.php');

        exit;
    }
}
