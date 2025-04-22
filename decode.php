<?php


//require_once 'index.php';



const  TOKEN = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJoczI1NiJ9.
eyJ1c2VyX2lkIjoyOCwicm9sZXMiOlsiUk9MRV9BRE1JTiIsIlJPTEVfU09JR05BTlQiLCJST0xFX1ZFVE8iXSwiaWF0IjoxNzQ1MzUwMTM5LCJleHAiOjE3NDUzNTAxOTl9.
d7WdSrXzs6kDn1_tc8m4V3jPLNlLQwM8ZlqJUcP5CEI ';


require_once 'sécurité.php';
require_once 'safe/JWT.php';

$jwt = new JWT();


var_dump($jwt->check(TOKEN, SECRET));
//var_dump( $jwt->getPayload(TOKEN));
