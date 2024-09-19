<?php

namespace App\Repository;



use App\Bdd\Mysql;
use App\Tools\StringTools;
use PDO;

class CommentsRepository {


    public function createComments( ){

     try {

        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();
       
            if(isset($_POST['pseudo']) && isset($_POST['message']) && !empty($_POST['pseudo']) && !empty($_POST['message'])){
               
                $pseudo=$_POST['pseudo'];
                $message=$_POST['message'];

               $comment= $pdo->prepare('INSERT INTO avis (pseudo, message) VALUES (:pseudo, :message)');
                $comment->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
                $comment->bindParam(':message', $message, PDO::PARAM_STR);
               $comment->execute();
           

        } else {

            echo 'veuillez remplir tous les champs';
     
        }

   

     } catch(\Exception $e){
         echo 'erreur d\'insertion'. $e->getMessage();
     }
               
}

public function readComments(){

    try {

       $mysql = Mysql::getInstance();
       $pdo = $mysql->getPDO();
      
           $cmts = $pdo->prepare("SELECT * FROM avis");
           $cmts->fetch($pdo::FETCH_ASSOC);

           $cmts->execute();

           return $cmts->fetchAll(); 

    } catch(\Exception $e){
        echo 'erreur d\'affichage'. $e->getMessage();
    }
              
}

}