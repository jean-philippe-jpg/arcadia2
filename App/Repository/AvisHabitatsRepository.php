<?php


namespace App\Repository;

use App\Entity\Races;
use App\Bdd\Mysql;
use App\Tools\StringTools;


class AvisHabitatsRepository {

    public function findOneById( int $id)
    {
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('SELECT h.id as id, h.name as name, h.description as description, a.first_name as first_name FROM habitat h
                INNER JOIN animals a ON h.animals_list = a.id where h.id = :id');   
        $query->bindParam(':id', $id, $pdo::PARAM_INT);
       
        
        if($query->execute()){

            $query->setFetchMode($pdo::FETCH_CLASS, Races::class);

            return $query->fetch(); 
    }
}

    public function createAvis( ){

                try{
                $mysql = Mysql::getInstance();
                $pdo = $mysql->getPDO();
                  
                
    
               
             
                if(!isset($_POST['avis']) || !isset($_POST['etat']) || !isset($_POST['habitat_id'])) {
                    $avis = $_POST['avis'];
                    $sanitized_avis = htmlspecialchars($avis, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                    $etat = $_POST['etat'];
                    $sanitized_etat = htmlspecialchars($etat, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                    $habitat_id = $_POST['habitat_id'];
                    $sanitized_habitat_id = htmlspecialchars($habitat_id, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                   

                    $stmt = $pdo->prepare('INSERT INTO avis_habitat (avis, etat, habitat_id) VALUES (:avis, :etat, :habitat_id)');
                    $stmt->bindParam(':avis', $sanitized_avis , $pdo::PARAM_STR);
                    $stmt->bindParam(':etat',  $sanitized_etat, $pdo::PARAM_STR);
                    $stmt->bindParam(':habitat_id', $sanitized_habitat_id, $pdo::PARAM_INT);
    

                    if(!$stmt->execute()){
                        echo 'erreur d\'insertion';
                    } else {
                        echo 'avis crée';
                    }
    
                    } else {
                        throw new \Exception('créer un avis sur un habitat');
                    }
               
               
               
            
            } catch(\Exception $e){
                echo 'erreur '. $e->getMessage();
            }
        
        }

    public function readRace(){

        try{

                $mysql = Mysql::getInstance();
                $pdo = $mysql->getPDO();
                $stmt = $pdo->prepare("SELECT * FROM race ");
                
                if($stmt->execute()){
                    
                    $stmt->setFetchMode($pdo::FETCH_CLASS, Races::class);
                    

                   return $stmt->fetchAll();
                  
                } else {
                    echo 'erreur';
                }
              
               
        } catch(\Exception $e){
            echo 'erreur d\'insertion'. $e->getMessage();
           

        }
       
        }


    public function updateRace(int $id){

        try{

            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();
               
         
            $query = $pdo->prepare('UPDATE race set name = :name WHERE id = :id');
            $query->bindParam(':id', $id, $pdo::PARAM_INT);
            $query->bindParam(':name', $_POST['name'], $pdo::PARAM_STR);
           
            //$query->bindParam(':name', $name, $pdo::PARAM_STR);
            //$query->bindParam(':description', $description, $pdo::PARAM_STR);
            $query->fetch($pdo::FETCH_ASSOC);
            $query->execute();
            
            return  $query;
         
           

        } catch(\Exception $e){
            echo 'erreur d\'insertion'. $e->getMessage();
           

        }
       
    }


    public function deleteRace(int $id){

        try{

            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();

            $query = $pdo->prepare('DELETE FROM race WHERE id = :id');
            $query->bindValue(':id', $id, $pdo::PARAM_INT);
            $query->execute();
            
            return  $query;

        } catch(\Exception $e){
            echo 'erreur d\'insertion'. $e->getMessage();
           

        }
       
    }



}




