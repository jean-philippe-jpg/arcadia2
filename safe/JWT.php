
<?php

class JWT {

    public function generate(array $header, array $payload, string $secret, $validity = 86400) : string
    {

        if($validity > 0) {
           $now = new dateTime();
           $expiration = $now->getTimestamp() + $validity;
           $payload['iat'] = $now->getTimestamp();
           $payload['exp'] = $expiration;


        }
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

return $jwt;
    }

    public function check(string $token, string $secret): bool {

        $header = $this->getheader($token);
        $payload = $this->getpayload($token);

        //vérification de la signature
        $verfiToken = $this->generate($header, $payload, $secret, 0);

        return $token === $verfiToken;

    }

    public function getheader(string $token) {

        $array = explode('.', $token);

        $header = json_decode(base64_decode($array[0]), true);

        return $header;

    }

    public function getpayload(string $token) {

         $array = explode('.', $token);

        $header = json_decode(base64_decode($array[1]), true);

        return $header;
    }
}