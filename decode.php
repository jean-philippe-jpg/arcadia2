<?php
const TOKEN = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJoczI1NiJ9.
eyJ1c2VyX2lkIjoyOCwicm9sZXMiOlsiUk9MRV9BRE1JTiIsIlJPTEVfU09JR05BTlQiLCJST0xFX1ZFVE8iXSwiaWF0IjoxNzQ5MDY0NTY4LCJleHAiOjE3NDkwNjQ2Mjh9.
dCRvGONfQ7pKtd2WH_Du8skzzudEj64ln863FIcjWI4';


require_once 'safe/JWT.php';
require_once 'safe/sécurité.php';

$jwt = new JWT();
var_dump($header = $jwt->getheader(TOKEN));
var_dump($payload = $jwt->getpayload(TOKEN));
var_dump($jwt->check(TOKEN, SECRET));