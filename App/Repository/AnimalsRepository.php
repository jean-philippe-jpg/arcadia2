<?php

namespace App\Repository;


use App\Entity\Animals;
use App\Bdd\Mysql;
use App\Tools\StringTools;


class AnimalsRepository {


    public function findOneById( int $id)
    {
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('SELECT a.id as id, a.first_name as name, r.name as race_name FROM animals a
                INNER JOIN race r ON a.race = r.id where a.id = :id');   
        $query->bindParam(':id', $id, $pdo::PARAM_INT);
        $query->execute();
        $animals = $query->Fetch($pdo::FETCH_ASSOC);
   

        $animalsEntity = new Animals();
        
        foreach($animals as $key => $value){

            $animalsEntity->{'set'.StringTools::toPascaleCase($key) } ($value);
            //if(method_exists($habitatEntity, $method)){
                //$habitatEntity->$method($value);
            //}

            //$animalsEntity->{'set' .StringTools::toPascaleCase($key)}($value);

        return $animals;
        
    }
}
    

    

    public function createAnimals( ){

                try{
                    $mysql = Mysql::getInstance();
                    $pdo = $mysql->getPDO();
                      
                
    
                $stmt = $pdo->prepare('INSERT INTO animals (first_name, race, habitat) VALUES (:first_name, :race, :habitat)');
                $stmt->bindParam(':first_name', $_POST['name'], $pdo::PARAM_STR);
                $stmt->bindParam(':race', $_POST['race'], $pdo::PARAM_STR);
                $stmt->bindParam(':habitat', $_POST['home'], $pdo::PARAM_STR);
                //$stmt->bindParam(':state', $_POST['state'], $pdo::PARAM_STR);

                //$stmt->execute();
             
                if(!$stmt->execute()){
                    echo 'erreur d\'insertion';
                } 
    
            } catch(\Exception $e){
                echo 'erreur d\'insertion'. $e->getMessage();
            }
    }

    /*public function innerRaceAnimals( ){

        try{
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();
          
        $stmt = $pdo->prepare('SELECT * FROM animals INNER JOIN race ON animals.race = race.id') ;
        
        $stmt->fetch($pdo::FETCH_ASSOC);
        if($stmt->execute()){
            return $stmt->fetch();
        } 

    } catch(\Exception $e){
        echo 'erreur d\'insertion'. $e->getMessage();
    }
}*/

    public function readAnimals(){

        try{

                $mysql = Mysql::getInstance();
                $pdo = $mysql->getPDO();
                $stmt = $pdo->prepare("SELECT a.id as id, a.first_name as first_name, r.name as namerace FROM animals a
                INNER JOIN race r ON a.race = r.id");
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


    public function updateAnimals(){

        try{

            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();
               
         
            $query = $pdo->prepare('UPDATE animals set firs_name = :name, race = :race, habitat = :home, state = :etat WHERE id = :id');
            $query->bindParam(':id', $_POST['id'], $pdo::PARAM_INT);
            $query->bindParam(':name', $_POST['id'], $pdo::PARAM_STR);
            $query->bindParam(':race', $_POST['id'], $pdo::PARAM_INT);
            $query->bindParam(':home', $_POST['id'], $pdo::PARAM_INT);
            $query->bindParam(':state', $_POST['id'], $pdo::PARAM_INT);
            //$query->bindParam(':name', $name, $pdo::PARAM_STR);
            //$query->bindParam(':description', $description, $pdo::PARAM_STR);
            $query->fetch($pdo::FETCH_ASSOC);
            $query->execute();
            
            return  $query;
         
           

        } catch(\Exception $e){
            echo 'erreur d\'insertion'. $e->getMessage();
           

        }
       
    }


    public function deleteAnimals(int $id){

        try{

            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();

            $query = $pdo->prepare('DELETE FROM animals WHERE id = :id');
            $query->bindValue(':id', $id, $pdo::PARAM_INT);
            $query->execute();
            
            return  $query;

        } catch(\Exception $e){
            echo 'erreur d\'insertion'. $e->getMessage();
           

        }
       
    }


    


}




