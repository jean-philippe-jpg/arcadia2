<?php

namespace App\Repository;

use App\Entity\Habitats;
use App\Bdd\Mysql;
use App\Tools\StringTools;


class RaceRepository {


   
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


    public function updateRace(){

        try{

            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();
               
         
            $query = $pdo->prepare('UPDATE animals set name = :name WHERE id = :id');
            $query->bindParam(':id', $_POST['id'], $pdo::PARAM_INT);
            $query->bindParam(':name', $_POST['id'], $pdo::PARAM_STR);
           
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




