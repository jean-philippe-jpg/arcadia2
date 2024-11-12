<?php

namespace App\Repository;


use App\Entity\Comments;
use App\Bdd\Mysql;
use App\Tools\StringTools;



class CommentsRepository {


    public function create( ){

     try {

        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();
       
            //if(isset($_POST['pseudo']) && isset($_POST['message']) && !empty($_POST['pseudo']) && !empty($_POST['message'])){
               
               

               $comment= $pdo->prepare('INSERT INTO avis (pseudo, message) VALUES (:pseudo, :message)');
                $comment->bindParam(':pseudo', $sanitized_pseudo, $pdo::PARAM_STR);
                $comment->bindParam(':message', $sanitized_message, $pdo::PARAM_STR);
               
                if(!isset($_POST['pseudo']) || !isset($_POST['message'])) {

                } else {
                $pseudo = $_POST['pseudo'];
                $sanitized_pseudo = htmlspecialchars($pseudo, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                $message = $_POST['message'];
                $sanitized_message = htmlspecialchars($message, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                
               $comment->execute();
           

       /* } else {

            echo 'veuillez remplir tous les champs';
     
        }*/
            }
     } catch(\Exception $e){
         echo 'erreur d\'insertion'. $e->getMessage();
     }
               
}

public function read(){

    try{

            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();
            $cmts = $pdo->prepare('SELECT * FROM avis ');
            $cmts->setFetchMode($pdo::FETCH_CLASS,  Comments::class);
            
            if($cmts->execute()){
                


                   return $cmts->fetchAll();


                   
            } else {
                echo 'erreur';
            }
          
           
    } catch(\Exception $e){
        echo 'erreur d\'insertion'. $e->getMessage();
       

    }
}

public function findOneById( int $id)
{
    $mysql = Mysql::getInstance();
    $pdo = $mysql->getPDO();

    $query = $pdo->prepare('SELECT * FROM avis where id = :id');   
    $query->bindParam(':id', $id, $pdo::PARAM_INT);
    
            if($query->execute()) {

                $query->setFetchMode($pdo::FETCH_CLASS, Comments::class);
                return $query->fetch();

            }
    
}


public function update(int $id){

    try{

        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();
           
            //$isValid = $_POST['isValid'];
            
            $update = $pdo->prepare('UPDATE avis set isValid = :isValid WHERE id = :id');
            $update->bindParam(':id', $id, $pdo::PARAM_INT);
            $update->bindParam(':isValid', $sanitized_isvalid, $pdo::PARAM_BOOL);
            $update->fetch($pdo::FETCH_ASSOC);
        

            if(!isset($_POST['isValid'])) {


            } else {
                $isvalid = $_POST['isValid'];
                $sanitized_isvalid = htmlspecialchars($isvalid, ENT_QUOTES | ENT_HTML5, 'UTF-8');

            }
            if($update->execute()){

                $update->setFetchMode($pdo::FETCH_CLASS, Comments::class);
               
        } else {
            echo 'echèque de validation';
        }
        
        return  $update;
     

    
             

    } catch(\Exception $e){
        echo 'erreur d\'insertion'. $e->getMessage();
       

    }
   
}
}

