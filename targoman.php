<?php

/*
 * Targoman-PHP
 * Simple API wrapper for Targoman.ir
 * By NimaH79
 * http://NimaH79.ir
 */

function targoman($text)
{
    if (empty(trim($text))) {
        return null;
    }
    $ch = curl_init('https://targoman.ir/API/');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, '{"jsonrpc":"2.0","method":"Targoman::translate","id":1,"params":["sSTargomanWUI","'.$text.'","en2fa","127.0.0.10","NMT",true,true,true]}');
    $response = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response, true);
    if (isset($response['result']['tr']['base'][0][1])) {
        return $response['result']['tr']['base'][0][1];
    }

    return null;
}

echo targoman('This is a test.');
