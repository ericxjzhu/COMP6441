<?php

$defaultData = array('showpassword' => 'no', 'bgcolor' => '#ffffff');
$defaultCookie = 'MGw7JCQ5OC04PT8jOSpqdmkgJ25nbCorKCEkIzlscm5oKC4qLSgubjY%3D';

function xor_encrypt($data, $key) {
    $result = '';

    for ($i = 0; $i < strlen($data) ; $i++) {
        $result .= $data[$i] ^ $key[$i % strlen($key)];
    }
    return $result;
}

echo xor_encrypt(base64_decode($defaultCookie), json_encode($defaultData));
echo "\n";
// decodedKey is KNHLKNHLKNHLKNHLKNHLKNHLKNHLKNHLKNHLKNHLKL
// since repeated, the key is just KNHL

$plaintext = array('showpassword' => 'yes', 'bgcolor' => '#ffffff');

echo base64_encode(xor_encrypt(json_encode($plaintext), 'KNHL')); // cookie is MGw7JCQ5OC04PT8jOSpqdmk3LT9pYmouLC0nICQ8anZpbS4qLSguKmkx
echo "\n";