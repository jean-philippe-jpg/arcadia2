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
        "email" => "email",
        "password" => "password"
    ];

   
$jwt = new JWT();
$token = $jwt->generate($header, $payload, SECRET, 60);


 //echo $token;



//phpinfo();

//session_start();
define('_ROOTPATH_',__DIR__);
define('_ROOTPATHADMIN_',__DIR__);

spl_autoload_register();


use App\Controller\Controller;


$pages = new Controller();
$pages->route();









      