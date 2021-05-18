<?php

function check_session()
{
    if ($_SESSSION = null) {
        header('Location: ../Homepage/index.php');

        exit;
    }
}
