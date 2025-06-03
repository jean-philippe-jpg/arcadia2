
<?php

class JWT {

    public function generate(array $header, array $payload, string $secre) 
    {
        //encodage en base64
$headerbase64 = base64_encode(json_encode($header));
$payloadbase64 = base64_encode(json_encode($payload));

//nettoyage des caractères spéciaux
$headerbase64 = str_replace(['+', '/', '='], ['-', '_', ''], $headerbase64);
$payloadbase64 = str_replace(['+', '/', '='], ['-', '_', ''], $payloadbase64);

//génération de la signature
$secret = base64_encode(SECRET);

//création de la signature
$signature = hash_hmac('sha256', $headerbase64 . '.' . $payloadbase64, $secret, true);
$signature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
  
//création du token
$jwt = $headerbase64 . '.' . $payloadbase64 . '.' . $signature;
    }
}