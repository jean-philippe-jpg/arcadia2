<?php
const TOKEN = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJoczI1NiJ9.eyJ1c2VyX2lkIjoyOCwicm9sZXMiOlsiUk9MRV9BRE1JTiIsIlJPTEVfU09JR05BTlQiLCJST0xFX1ZFVE8iXSwiaWF0IjoxNzQ5MjMzNzI1LCJleHAiOjE3NDkyMzM3ODV9.qYOJe_jPsrZg32BW4O0iPBgMexVN5TWAiWzbg2mBC1g';


require_once 'safe/JWT.php';
require_once 'safe/sécurité.php';

$jwt = new JWT();

//var_dump($jwt->getHeader(TOKEN));
var_dump($jwt->isValid(TOKEN));