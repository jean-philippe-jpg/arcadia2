<?php
$name = 'jeAn-phI';
$pass = 'J25061984c%#';
$host = 'localhost';
$dbname = 'arcadia';

try {

    $bdd = new PDO("mysql:host=$host;dbname=$dbname", $name, $pass);

$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}