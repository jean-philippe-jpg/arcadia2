<?php 
require_once 'sécurité.php';
require_once 'safe/JWT.php';


//header
$header = [

  'typ' => 'JWT',
  'alg' => 'hs256',

];


$payload = [

    'user_id' => 28,
    'roles' => [
        'ROLE_ADMIN',
        'ROLE_SOIGNANT',
        'ROLE_VETO'
    ]
    ];

    /*$base64Payload = str_replace(['+','/','='],
    ['-','_',''], $base64Payload);*/

    //echo $base64Payload;

    $jwt = new JWT();

    $token = $jwt->generate($payload,$header, SECRET, 60);

    //echo $token;

    //$jwt = $base64header . '.'.'<br>' . $base64Payload . '.'.'<br>' . $base64signature;
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









      