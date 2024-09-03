<?php


require_once "bdd/connexion.php";

try {
    

    echo "inscription";
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}