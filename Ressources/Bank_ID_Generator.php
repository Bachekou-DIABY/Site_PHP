<?php

function generateChain($length, $caracters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
{
    $chain = '';
    for ($i = 0; $i < $length; ++$i) {
        $chain .= $caracters[random_int(0, 61)];
    }

    return $chain;
}
