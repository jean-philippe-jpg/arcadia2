<?php 
require_once 'sécurité.php';
require_once 'safe/JWT.php';


//header
$header = [

  'typ' => 'JWT',
  'alg' => 'hs256',

];

$base64header = base64_encode(json_encode($header));
    //echo $base64header."<br>";

//contenue payload

$payload = [

    'user_id' => 28,
    'roles' => [
        'ROLE_ADMIN',
        'ROLE_SOIGNANT',
        'ROLE_VETO'
    ]
    ];
   


    $base64Payload = base64_encode(json_encode($payload));

    $base64Payload = str_replace(['+','/','='],
    ['-','_',''], $base64Payload);

    //echo $base64Payload;

   $secret = base64_encode(SECRET);
   $secret = str_replace(['+','/','='], ['-','_',''], $secret);
    //$jwt = new JWT();



$signature = hash_hmac('sha256',
    $base64header . '.' . $base64Payload,
    $secret, true);



    $base64signature = base64_encode($signature);
    $base64signature = str_replace(['+','/','='], ['-','_',''], $base64signature);
    //echo $base64signature;

    $jwt = $base64header . '.'.'<br>' . $base64Payload . '.'.'<br>' . $base64signature;
    //echo $jwt;
               //$jwt = new JWT();
               //$token = $jwt->generate($payload,$header, SECRET, 60);
               //echo $signature;



//phpinfo();


define('_ROOTPATH_',__DIR__);
define('_ROOTPATHADMIN_',__DIR__);

spl_autoload_register();

use App\Controller\Controller;


$pages = new Controller();
$pages->route();









      