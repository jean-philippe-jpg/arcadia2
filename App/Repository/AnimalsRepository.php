<?php

namespace App\Repository;


use App\Entity\Animals;
use App\Bdd\Mysql;
use App\Entity\RapportSoignant;
use App\Tools\StringTools;


  class AnimalsRepository {


    public function findOneById( int $id)
    {
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('SELECT a.id as id, a.first_name as first_name, r.name as namerace, h.name as home, a_s.state as state FROM animals a
                INNER JOIN race r ON a.race = r.id JOIN habitat h ON a.habitat = h.id JOIN animals_state a_s ON a.state = a_s.id where a.id = :id');   
        $query->bindParam(':id', $id, $pdo::PARAM_INT);
        
                if($query->execute()) {

                    $query->setFetchMode($pdo::FETCH_CLASS, Animals::class);
                    return $query->fetch();

                }
        
    }

    public function findOnByDate( int $id)
    {
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('SELECT a.id as id, a.first_name as first_name/*, a.nourriture as nourriture*/, /*a.quantitee as quantitee, a.date_heure as date,*/ r.name as namerace, h.name as home, a_s.state as state FROM animals a
                INNER JOIN race r ON a.race = r.id JOIN habitat h ON a.habitat = h.id JOIN animals_state a_s ON a.state = a_s.id where a.id = :id');   
        $query->bindParam(':id', $id, $pdo::PARAM_INT);
        
                if($query->execute()) {

                    $query->setFetchMode($pdo::FETCH_CLASS, Animals::class);
                    return $query->fetch();

                }
        
    }

    public function detail( int $id)
    {
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare("SELECT  a.first_name as first_name, a.race as race, a.habitat as home, a.state as state, r.name as namerace, h.name as home, a_s.state as state FROM animals a
                INNER JOIN race r ON a.race = r.id JOIN habitat h ON a.habitat = h.id JOIN animals_state a_s ON a.state = a_s.id where a.id = :id");
        $query->bindParam(':id', $id, $pdo::PARAM_INT);
        
                if($query->execute()) {

                    $query->setFetchMode($pdo::FETCH_CLASS, Animals::class);
                    return $query->fetch();

                }
        
    }

    



    public function createAnimals( ){

                try{
                    $mysql = Mysql::getInstance();
                    $pdo = $mysql->getPDO();
                      
                
    
                $stmt = $pdo->prepare('INSERT INTO animals (first_name, race, habitat, state) VALUES (:first_name, :race, :habitat, :state)');
                $stmt->bindParam(':first_name', $_POST['name'], $pdo::PARAM_STR);
                $stmt->bindParam(':race', $_POST['race'], $pdo::PARAM_INT);
                $stmt->bindParam(':habitat', $_POST['home'], $pdo::PARAM_INT);
                $stmt->bindParam(':state', $_POST['state'], $pdo::PARAM_INT);
             
                if(!$stmt->execute()){
                    echo 'erreur d\'insertion';
                } 
    
            } catch(\Exception $e){
                echo 'erreur d\'insertion'. $e->getMessage();
            }
    }

    public function createEntrtient( ){

        try{
            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();
              
        

        $stmt = $pdo->prepare('INSERT INTO rapport_soignant (nourriture, quantitee, date_heure) VALUES (:nourriture, :quantitee, :date) FROM animals WHERE id = :id');
        $stmt->bindParam(':first_name', $_POST['name'], $pdo::PARAM_STR);
        $stmt->bindParam(':race', $_POST['race'], $pdo::PARAM_INT);
        $stmt->bindParam(':habitat', $_POST['home'], $pdo::PARAM_INT);
        $stmt->bindParam(':state', $_POST['state'], $pdo::PARAM_INT);
        $stmt->bindParam(':id', $id, $pdo::PARAM_INT);
     
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

    public function read(){

        try{

                $mysql = Mysql::getInstance();
                $pdo = $mysql->getPDO();
                $stmt = $pdo->prepare('SELECT a.id as id, a.first_name as first_name, a.race as race, a.habitat as home, a.state as state, a.ent_animals as rapport, r.name as namerace, h.name as home, a_s.state as state FROM animals a
                INNER JOIN race r ON a.race = r.id JOIN habitat h ON a.habitat = h.id JOIN animals_state a_s ON a.state = a_s.id ');
               
                if($stmt->execute()){

                    $stmt->setFetchMode($pdo::FETCH_CLASS, Animals::class);
                    
                   return $stmt->fetchAll();
                  
                } else {
                    echo 'erreur';
                }
              
               
        } catch(\Exception $e){
            echo 'erreur d\'insertion'. $e->getMessage();
           

        }
       
        }


        public function readSoins(int $id ){

            try{
    
                    $mysql = Mysql::getInstance();
                    $pdo = $mysql->getPDO();

                    $stmt = $pdo->prepare("SELECT a.id as id, a.first_name as first_name , h.name as home /*, r.name = namerace*/ , r_s.nourriture as nourriture, r_s.quantitee as quantitee , r_s.date_heure as date FROM animals a
                    INNER  JOIN rapport_soignant r_s ON r_s.animal = a.id JOIN race r ON a.race = r.id  JOIN habitat h ON a.habitat = h.id WHERE a.id = :id ");
                    $stmt->bindParam(':id', $id, $pdo::PARAM_INT);
                   
                    if($stmt->execute()){
    
                        $stmt->setFetchMode($pdo::FETCH_CLASS, Animals::class);
                        
                       return $stmt->fetchAll();
                      
                    } else {
                        echo 'erreur';
                    }
                  
                   
            } catch(\Exception $e){
                echo 'erreur d\' affichage des soins'. $e->getMessage();
               
    
            }
           
            }

 public function showAnimalSoignant(int $id){

        try{

                $mysql = Mysql::getInstance();
                $pdo = $mysql->getPDO();

                $query = $pdo->prepare('SELECT a.id as id,  a.first_name as first_name,  r.name as namerace, h.name as home FROM animals a
                INNER JOIN race r ON a.race = r.id JOIN habitat h ON a.habitat = h.id where a.id = :id');   
                    $query->bindParam(':id', $id, $pdo::PARAM_INT);
        
                if($query->execute()) {

                    $query->setFetchMode($pdo::FETCH_CLASS, Animals::class);
                    return $query->fetch();

                }
              
               
        } catch(\Exception $e){
            echo 'erreur d\'insertion'. $e->getMessage();
           

        }
       
        }

        


    public function updateAnimals(int $id){

        try{

            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();
            $query = $pdo->prepare('UPDATE animals set first_name = :name, race = :race,  habitat = :home, state = :state WHERE id = :id');
            $query->bindParam(':id',$id, $pdo::PARAM_INT);
            $query->bindParam(':name', $_POST['name'], $pdo::PARAM_STR);
            $query->bindParam(':race', $_POST['race'], $pdo::PARAM_INT);
            $query->bindParam(':home', $_POST['home'], $pdo::PARAM_STR);
            $query->bindParam(':state', $_POST['state'], $pdo::PARAM_INT);
            /*$query->bindParam(':nourriture', $_POST['nourriture'], $pdo::PARAM_INT);
            $query->bindParam(':quantitee', $_POST['quantitee'], $pdo::PARAM_INT);
            $query->bindParam(':date', $_POST['date'], $pdo::PARAM_STR);*/
            //$query->bindParam(':name', $name, $pdo::PARAM_STR);
            //$query->bindParam(':description', $description, $pdo::PARAM_STR);
            if( $query->execute()){

                $query->setFetchMode($pdo::FETCH_CLASS, Animals::class);

            

                echo 'modification éffectuée';

            } else {

                echo 'erreur de modification';
            }
           
            
            return  $query;
         
           

        } catch(\Exception $e){
            echo 'modification impossible'. $e->getMessage();
           

        }
       
    }

    public function updateSoignant(int $id){

        try{

            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();
            $query = $pdo->prepare('UPDATE animals set nourriture = :nourriture, quantitee = :quantitee, date_heure = :date WHERE id = :id');
            $query->bindParam(':id',$id, $pdo::PARAM_INT);
            $query->bindParam(':nourriture', $_POST['nourriture'], $pdo::PARAM_STR);
            $query->bindParam(':quantitee', $_POST['quantitee'], $pdo::PARAM_INT);
            $query->bindParam(':date', $_POST['date'], $pdo::PARAM_STR);
         
            if( $query->execute()){

                $query->setFetchMode($pdo::FETCH_CLASS, Animals::class);

            

                echo 'modification éffectuée';

            } else {

                echo 'erreur de modification';
            }
           
            
            return  $query;
         
           

        } catch(\Exception $e){
            echo 'modification impossible'. $e->getMessage();
           

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




