<?php

namespace App\Repository;


use App\Entity\Habitats;
use App\Bdd\Mysql;
use App\Tools\StringTools;


class HabitatsRepository {


    public function findOneById( int $id)
    {
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('SELECT * FROM habitat WHERE id = :id');
        $query->bindParam(':id', $id, $pdo::PARAM_INT);
        $query->execute();
        $habitat = $query->fetch($pdo::FETCH_ASSOC);
   

        $habitatEntity = new Habitats();
        
        foreach($habitat as $key => $value){

            $habitatEntity->{'set'.StringTools::toPascaleCase($key) } ($value);
            /*if(method_exists($habitatEntity, $method)){
                $habitatEntity->$method($value);*/
            }

            /*$habitatEntity->{'set' .StringTools::toPascaleCase($key)}($value);*/

        return $habitatEntity;
        
    }



    public function createHabitat( ){

                try{
                $mysql = Mysql::getInstance();
                $pdo = $mysql->getPDO();
                  
                $name = $_POST['name'];
                $description = $_POST['description'];
    
    
                $stmt = $pdo->prepare('INSERT INTO habitat (name, description) VALUES (:name, :description)');
                $stmt->bindParam(':name', $name, $pdo::PARAM_STR);
                $stmt->bindParam(':description', $description, $pdo::PARAM_STR);
                $stmt->execute();
             

                
                if($stmt->execute()){
                    echo 'insertion reussie';
                } else {
                    echo 'erreur d\'insertion';
                }
    
            } catch(\Exception $e){
                echo 'erreur d\'insertion'. $e->getMessage();
            }
    }

    public function readHabitat(){

        try{

           

                $mysql = Mysql::getInstance();
                $pdo = $mysql->getPDO();
                $stmt = $pdo->prepare("SELECT * FROM habitat ");    

                if($stmt->execute()){
                    //$stmt->fetchObject('Habitats');
                    $stmt->fetchAll();
                   return $stmt->setFetchMode($pdo::FETCH_CLASS, 'Habitats');
                         

                } else {
                    echo 'erreur';
                }
              
               
               
             



                  
          

        } catch(\Exception $e){
            echo 'erreur d\'insertion'. $e->getMessage();
           

        }
       
        }
    public function updateHabitat(){

        try{

            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();

            $id = $_GET['id'];
            $name = $_GET['name'];
            $description = $_GET['description'];

            $query = $pdo->prepare('UPDATE habitat set name = :name, description = :description WHERE id = :id');
            $query->bindParam(':id', $id, $pdo::PARAM_INT);
            $query->bindParam(':name', $name, $pdo::PARAM_STR);
            $query->bindParam(':description', $description, $pdo::PARAM_STR);
            $query->execute();
            $habitat = $query->setFetchMode($pdo::FETCH_CLASS, 'Habitats');

            $habitatEntity = new Habitats();
            
            return $habitatEntity;
            
           

        } catch(\Exception $e){
            echo 'erreur d\'insertion'. $e->getMessage();
           

        }
       
    }


    public function deleteHabitat(int $id){

        try{

            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();

            $query = $pdo->prepare('DELETE FROM habitat WHERE id = :id');
            $query->bindValue(':id', $id, $pdo::PARAM_INT);
            $query->execute();
            
            return  $query;

        } catch(\Exception $e){
            echo 'erreur d\'insertion'. $e->getMessage();
           

        }
       
    }



}




