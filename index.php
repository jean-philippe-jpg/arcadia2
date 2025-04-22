<?php 
require_once 'sécurité.php';
require_once 'safe/JWT.php';


//header
$header = [

  "typ" => "JWT",
  "alg" => "hs256",

];



//contenue payload

$payload = [

    'user_id' => 28,
    'roles' => [
        'ROLE_ADMIN',
        'ROLE_SOIGNANT',
        'ROLE_VETO'
    ]
    ];
   
    //$jwt = new JWT();

//var_dump( $jwt->getHeader($token));
               //$jwt = new JWT();
               //$token = $jwt->generate($payload,$header, SECRET, 60);
               //echo $signature;






define('_ROOTPATH_',__DIR__);
define('_ROOTPATHADMIN_',__DIR__);

spl_autoload_register();

use App\Controller\Controller;


$pages = new Controller();
$pages->route();









      