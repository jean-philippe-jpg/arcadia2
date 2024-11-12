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
       
            if(isset($_POST['pseudo']) && isset($_POST['message']) && !empty($_POST['pseudo']) && !empty($_POST['message'])){
               
                $pseudo=$_POST['pseudo'];
                $message=$_POST['message'];

               $comment= $pdo->prepare('INSERT INTO avis (pseudo, message) VALUES (:pseudo, :message)');
                $comment->bindParam(':pseudo', $pseudo, $pdo::PARAM_STR);
                $comment->bindParam(':message', $message, $pdo::PARAM_STR);
               
               $comment->execute();
           

        } else {

            echo 'veuillez remplir tous les champs';
     
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
            $update->bindParam(':isValid', $_POST['isValid'], $pdo::PARAM_BOOL);
            $update->fetch($pdo::FETCH_ASSOC);
        
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

