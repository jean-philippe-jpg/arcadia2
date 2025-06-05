<?php

namespace App\Repository;



use App\Bdd\Mysql;
use App\Tools\StringTools;


class ContactRepository {


    public function createContact( ){

/*if(isset($_POST)&& isset($_POST['email']) && isset($_POST['objet']) && isset($_POST['message'])){
        extract($_POST);
        if(!empty($email) && !empty($objet) && !empty($message)){
            $message=str_replace("\'", " ' ", $message);
                $destinataire = "jphilippe.champion@gmail.com";
                $email = $email ;
                $sujet = "Contact";
                $messages = "Email : " . $email . "\n" . "Objet : " . $objet . "\n" . "Message : " . $message."\n \n".'jean-philippe champion';
                $headers = "From: " . $email ."\n" . "Reply-To: " . $email;
               
        } else {

            echo 'Veuillez remplir tous les champs';
        }
          
          


        if(mail($destinataire, $sujet, $messages)){
          
            echo 'message envoyé';
        } else {
            echo 'Erreur lors de l\'envoi du message';
        }
    }*/
           /* if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //$name = htmlspecialchars($_POST["name"]);
      $destinataire = "jphilippe.champion@gmail.com";
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    // Ici, vous pouvez envoyer un email ou enregistrer les données dans une base de données
    echo "Merci,".$email.", votre message a été envoyé !"; 
}*/
     
    if($_SERVER["REQUEST_METHOD"] == "POST" ) {
        
        $mail = htmlspecialchars(trim($_POST['email']));
        $message = htmlspecialchars(trim($_POST['message']));

        if(empty($mail)  || empty($message)) {
            echo 'Veuillez remplir tous les champs';
            return;
        

        }

        $to = "jphilippe.champion@gmail.com";
        $header = "from: " . $mail . "\r\n";
        $header .= "Reply-To: " . $mail . "\r\n";
        $header .= "Content-Type: text/plain; charset=UTF-8\r\n";
        $subject = "Contact Form: ";
        $body = "Email: " . $mail . "\n";
        $body .=  "Message: " . $message . "\n\n";
        $body .= "Jean-Philippe Champion";


        if(mail($to, $subject, $body, $header)) {
            echo 'Message envoyé avec succès';
        } else {
            echo 'Erreur lors de l\'envoi du message';
        }
    } else {
        echo 'Méthode de requête non prise en charge';
    }
       
}
}
