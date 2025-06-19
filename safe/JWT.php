
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

    public function check(string $token, string $secret): bool
     {

        $header = $this->getHeader($token);
        $payload = $this->getPayload($token);

        //vérification de la signature
        $verifToken = $this->generate($header, $payload, $secret, 0);

        return $token === $verifToken;

    }

    public function getHeader(string $token) {

        $array = explode('.', $token);

        $header = json_decode(base64_decode($array[0]), true);

        return $header;

    }

    public function getPayload(string $token) {

         $array = explode('.', $token);

        $payload = json_decode(base64_decode($array[1]), true);

        return $payload;
    }


    public function isExpired(string $token): bool {

        $payload = $this->getPayload($token);

        $now = new DateTime();

        return $payload['exp'] < $now->getTimestamp();

    }


    public function isValid(string $token): bool {


        return preg_match('/^[A-Za-z0-9\-\_\=]+\.[A-Za-z0-9\-\_\=]+\.[A-Za-z0-9\-\_\=]+$/', $token) === 1;

    }
}