<?php

$defaultData = array('showpassword' => 'no', 'bgcolor' => '#ffffff');
$defaultCookie = 'MGw7JCQ5OC04PT8jOSpqdmkgJ25nbCorKCEkIzlscm5oKC4qLSgubjY%3D';

function xor_encrypt($data, $key) {
    $result = '';
    $tempData = $data;
    $tempKey = $key;

    for ($i = 0; $i < strlen($data) ; $i++) {
        $result .= $data[$i] ^ $key[$i % strlen($key)];
    }
    return $result;
}

$decodedKey = xor_encrypt(base64_decode($defaultCookie), json_encode($defaultData));

$plaintext = array('showpassword' => 'yes', 'bgcolor' => '#ffffff');

echo base64_encode(xor_encrypt(json_encode($plaintext), $decodedKey)); // cookie is MGw7JCQ5OC04PT8jOSpqdmk3LT9pYmouLC0nICQ8anZpbS4qLSguKmkx
echo "\n";