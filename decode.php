<?php


//require_once 'index.php';



const  TOKEN = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJoczI1NiJ9.
eyJ1c2VyX2lkIjoyOCwicm9sZXMiOlsiUk9MRV9BRE1JTiIsIlJPTEVfU09JR05BTlQiLCJST0xFX1ZFVE8iXSwiaWF0IjoxNzQ4MDM2MzI2LCJleHAiOjE3NDgwMzYzODZ9.
qlvrRKcfmPmL9lby_0gW34s4lGE-hfTVRk3yZdtZ_pM  ';


require_once 'sécurité.php';
require_once 'safe/JWT.php';

$jwt = new JWT();
var_dump($jwt->check(TOKEN, SECRET));

//echo $toto;
//var_dump($jwt->generate($jwt));
//var_dump( $jwt->check(TOKEN));
//var_dump( $jwt->getPayload(TOKEN));
