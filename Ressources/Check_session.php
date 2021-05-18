<?php

function check_session($_SESSION)
{
    if ($_SESSSION = null) {
        header('Location: ../Homepage/index.php');

        exit;
    }
}
