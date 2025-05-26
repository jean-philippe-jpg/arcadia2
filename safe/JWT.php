
<?php


class  JWT 
{
    public function generate(array $payload, array $header, string $secret, int $validate = 1440) 
    
    {

        if($validate > 0) {
            $now = new DateTime();
            $expiration = $now->getTimestamp() + $validate;
            $payload['iat'] = $now->getTimestamp();
            $payload['exp'] = $expiration;
        }
        //encodage en base64

    $base64header = base64_encode(json_encode($header));
    $base64payload = base64_encode(json_encode($payload));

       //suppression de caractères +,/,=
        $base64header = str_replace(['+','/','='],
        ['-','_',''],
        $base64header);
        $base64payload = str_replace(['+', '/', '='],
         [ '-','_','' ],
          $base64payload);

          // generation de la signature
          $secret = base64_encode(SECRET);
            $secret = str_replace(['+','/','='], ['-','_',''], $secret);

            $signature = hash_hmac('sha256',
                $base64header . '.' . $base64payload,
                $secret,
                true
            );
            $signature = base64_encode($signature);

            $signature = str_replace(['+','/','='], ['-','_',''], $signature);
           
            
            //creation du token
            $jwt = $base64header . '.' . $base64payload . '.' . $signature;
          
            return $jwt;
         
    }

    public function check(string $token, string $secret): bool
    {


        $header = $this->getHeader(  $token);
        $payloads = $this->getPayload( $token);

        //verification du token
        $verifToken = $this->generate( $header, $payloads, $secret, 0)  ;

       return $token === $verifToken;
    }


    public function getHeader(string $token) {
        
        //demontage du token
         $array = explode('.', $token);

        //decodage du header
        $header = json_decode(base64_decode($array[0], true));

        return $header;

    }

    public function getPayload(string $token){
 //demontage du token
 $token = explode('.', $token);

 //decodage du header
 $header = json_decode(base64_decode($token[1], true));

 return $header;

        
    }


   public function isValide($token): bool
    {
        return preg_match('/^[A-Za-z0-9\-\_\=]+\.[A-Za-z0-9\-\_\=]+\.[A-Za-z0-9\-\_\=]+$/', $token) === 1;
        
            
    }
  
}