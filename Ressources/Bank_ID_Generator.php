<?php

function generateChain($length, $caracters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
{
    $chain = '';
    $max = mb_strlen($caracters) - 1;
    for ($i = 0; $i < $length; ++$i) {
        $chain .= $caracters[random_int(0, $max)];
    }

    return $chain;
}
