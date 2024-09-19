<?php

namespace App\Repository;



use App\Bdd\Mysql;
use App\Tools\StringTools;


class ContactRepository {


    public function createContact( ){

if(isset($_POST)&& isset($_POST['email']) && isset($_POST['objet']) && isset($_POST['message'])){
        extract($_POST);
        if(!empty($email) && !empty($objet) && !empty($message)){
            $message=str_replace("\'", " ' ", $message);
                $destinataire = "jphilippe.champion@gmail.com";
                $sujet = "Contact";
                $messages = "Email : " . $email . "\n" . "Objet : " . $objet . "\n" . "Message : " . $message."\n \n".'jean-philippe champion';
                $headers = "From: " . $email ."\n" . "Reply-To: " . $email;
        } else {

            echo 'Veuillez remplir tous les champs';
        }

        if(mail($destinataire, $sujet, $messages, $headers)){
          
        } else {
            echo 'Erreur lors de l\'envoi du message';
        }
}

               
    }

}