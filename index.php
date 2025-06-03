<?php 
require_once 'safe/JWT.php';
require_once 'safe/sécurité.php';




//creation du header
$header = [

  'typ' => 'JWT',
  'alg' => 'hs256',

];

//création du contenue
$payload = [

    'user_id' => 28,
    'roles' => [
        'ROLE_ADMIN',
        'ROLE_SOIGNANT',
        'ROLE_VETO'
    ]
    ];

   
$jwt = new JWT();
$token = $jwt->generate($header, $payload, SECRET);


var_dump($token);



//phpinfo();

//session_start();
define('_ROOTPATH_',__DIR__);
define('_ROOTPATHADMIN_',__DIR__);

spl_autoload_register();


use App\Controller\Controller;


$pages = new Controller();
$pages->route();









      