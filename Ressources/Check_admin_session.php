<?php

function check_admin_session()
{
    if ($_SESSSION = null) {
        header('Location: ../Homepage/index.php');

        exit;
    }
}
