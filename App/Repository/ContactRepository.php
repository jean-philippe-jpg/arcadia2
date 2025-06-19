<?php

namespace App\Repository;


use PHPMailer\PHPMailer\PHPMailer;
use \sendmail_config\EnvoieMail;
use App\Bdd\Mysql;
use App\Tools\StringTools;


class ContactRepository {


    public function createContact( ){
   
    /*$mailToSend = $_POST['email'];
    $message = $_POST['message'];
    $btn = $_POST['envoyer'];*/


        $mailToSend = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $btn = filter_input(INPUT_POST, 'envoyer', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

         
       require_once './sendmail_config.php';
       if(isset($btn) && $btn == 'Envoyer') {
           
        $mail = new PHPMailer(true);

        EnvoieMail($mail, $mailToSend, $message);
        echo "Votre message a été envoyé avec succès.";
    
           /* if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //$name = htmlspecialchars($_POST["name"]);
      $destinataire = "jphilippe.champion@gmail.com";
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    // Ici, vous pouvez envoyer un email ou enregistrer les données dans une base de données
    echo "Merci,".$email.", votre message a été envoyé !"; 
}*/
     
    /*if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $mailToSend = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Validation des données (exemple simple)
    if (empty($name) || empty($mailToSend) || empty($subject) || empty($message)) {
        echo "Tous les champs sont obligatoires.";
    } else {
        // Envoi de l'e-mail
        $to = "jphilippe.champion@gmail.com";
        $headers = "From: $name, $mailToSend";
        mail($to, $subject, $message, $headers);
        echo "Votre message a été envoyé avec succès.";
    }
}*/
    }
    }
}
