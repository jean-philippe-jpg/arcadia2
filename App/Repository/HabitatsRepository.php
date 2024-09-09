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



    public function createHabitat(string $name , string $description ){

        

            if(isset($_POST['insert'])){

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

           

       
       
    }


    protected function updateHabitat(string $name, string $description){

        try{
            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();
              
            $query = $pdo->prepare('UPDATE habitat (name, description) VALUES (:name, :description)');
            $query->bindParam(':name', $name, $pdo::PARAM_STR);
            $query->bindParam(':description', $description, $pdo::PARAM_STR);
            $query->execute();
            
            return $query;

        } catch(\Exception $e){
            echo 'erreur d\'insertion'. $e->getMessage();
           

        }
       
    }


    protected function deleteHabitat(string $name, string $description){

        try{
            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();
              
            $query = $pdo->prepare('DELETE FROM habitat (name, description) VALUES (:name, :description)');
            $query->bindParam(':name', $name, $pdo::PARAM_STR);
            $query->bindParam(':description', $description, $pdo::PARAM_STR);
            $query->execute();
            
            return $query;
        } catch(\Exception $e){
            echo 'erreur d\'insertion'. $e->getMessage();
           

        }
       
    }



}




