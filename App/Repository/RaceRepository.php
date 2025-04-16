<?php

namespace App\Repository;

use App\Entity\Races;
use App\Bdd\Mysql;
use App\Tools\StringTools;


class RaceRepository {

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

    public function createRace( ){

                try{
                $mysql = Mysql::getInstance();
                $pdo = $mysql->getPDO();
                  
                if(isset($_POST['name'])) {
                
                $stmt = $pdo->prepare('INSERT INTO race (name) VALUES (:name)');
                $stmt->bindParam(':name', $sanitized_name, $pdo::PARAM_STR);
                $name = $_POST['name'];
                $sanitized_name = htmlspecialchars($name, ENT_QUOTES | ENT_HTML5, 'UTF-8');

                if(!$stmt->execute()){
                    echo 'erreur de création';
                } 
                    } else {
                      echo 'ajouter d\' une race';
                    }
               
            
            } catch(\Exception $e){
                echo 'erreur d\'insertion'. $e->getMessage();
            }
    }

    public function readRace(){

        try{

                $mysql = Mysql::getInstance();
                $pdo = $mysql->getPDO();
                $stmt = $pdo->prepare("SELECT id as id, name as name FROM race ");
                
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
            
           
            $name = $_POST['name'];
            
            $race = new Races();
            $query = $pdo->prepare('UPDATE race set name = :name WHERE id = :id');
            $query->bindParam(':id', $id, $pdo::PARAM_INT);
            $query->bindParam(':name', $race->setName(':name')/*$name*/ , $pdo::PARAM_STR);
           
            $query->setFetchMode($pdo::FETCH_CLASS, Races::class);
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




