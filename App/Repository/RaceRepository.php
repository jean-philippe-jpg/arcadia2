<?php

namespace App\Repository;

use App\Entity\Habitats;
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
        $query->execute();
        $habitat = $query->Fetch($pdo::FETCH_ASSOC);
       
   

        $habitatEntity = new Habitats();
        
        foreach($habitat as $key => $value){

            $habitatEntity->{'set'.StringTools::toPascaleCase($key) } ($value);
            //if(method_exists($habitatEntity, $method)){
                //$habitatEntity->$method($value);
            //}

            //$habitatEntity->{'set' .StringTools::toPascaleCase($key)}($value);

        return $habitat;
        
    }
}


   
    public function createRace( ){

                try{
                $mysql = Mysql::getInstance();
                $pdo = $mysql->getPDO();
                  
                
    
                $stmt = $pdo->prepare('INSERT INTO race (name) VALUES (:name)');
                $stmt->bindParam(':name', $_POST['name'], $pdo::PARAM_STR);
                //$stmt->bindParam(':race', $_POST['race'], $pdo::PARAM_STR);
               // $stmt->bindParam(':habitat', $_POST['home'], $pdo::PARAM_STR);
               // $stmt->bindParam(':state', $_POST['state'], $pdo::PARAM_STR);
                
                
                //$stmt->execute();
             
                if(!$stmt->execute()){
                    echo 'erreur d\'insertion';
                } 
    
            } catch(\Exception $e){
                echo 'erreur d\'insertion'. $e->getMessage();
            }
    }

    public function readRace(){

        try{

                $mysql = Mysql::getInstance();
                $pdo = $mysql->getPDO();
                $stmt = $pdo->prepare("SELECT * FROM race ");
                //$stmt->setFetchMode($pdo::FETCH_CLASS, 'Habitats');
                $stmt->fetch($pdo::FETCH_ASSOC);
                //$stmt->fetchAll();
                //$stmt->execute();


                if($stmt->execute()){
                    //$stmt->fetchObject('Habitats');
                    //$stmt->fetchAll();
                   //return $stmt->setFetchMode($pdo::FETCH_CLASS, 'Habitats');
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




