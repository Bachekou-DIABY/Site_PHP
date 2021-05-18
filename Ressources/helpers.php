<?php

function check_admin_session()
{
    if ($_SESSION['id'] > 5 || PHP_SESSION_NONE == session_status()) {
        header('Location: ../Homepage/index.php');

        exit;
    }
}

function check_user_session()
{
    if ($_SESSION['id'] < 5 || PHP_SESSION_NONE == session_status()) {
        header('Location: ../Homepage/index.php');

        exit;
    }
}
