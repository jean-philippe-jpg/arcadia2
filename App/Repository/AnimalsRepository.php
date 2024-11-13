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

        $query = $pdo->prepare('SELECT a.id as id, a.first_name as first_name, r.name as namerace FROM animals a
                INNER JOIN race r ON a.race = r.id where a.id = :id');   
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
            
                $stmt = $pdo->prepare('INSERT INTO animals (first_name, race ) VALUES (:first_name, :race )');
                $stmt->bindParam(':first_name', $sanitized_name , $pdo::PARAM_STR);
                $stmt->bindParam(':race',  $sanitized_race , $pdo::PARAM_INT);
              


                    if(!isset($_POST['name']) || !isset($_POST['race']) ) {

                    } else {
                    $name = $_POST['name'];
                    $sanitized_name = htmlspecialchars($name, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                    $race = $_POST['race'];
                    $sanitized_race = htmlspecialchars($race, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                    
             
                if(!$stmt->execute()){
                    echo 'erreur d\'insertion';
                } 
            }
            } catch(\Exception $e){
                echo 'erreur d\'insertion'. $e->getMessage();
            }
    }

    public function createEntrtient( ){

        try{
            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();
              
            $name = $_POST['name'];
            $sanitized_name = htmlspecialchars($name, ENT_QUOTES | ENT_HTML5, 'UTF-8');
            $race = $_POST['race'];
            $sanitized_race = htmlspecialchars($race, ENT_QUOTES | ENT_HTML5, 'UTF-8');
            $habitat = $_POST['home'];
            $sanitized_habitat = htmlspecialchars($habitat, ENT_QUOTES | ENT_HTML5, 'UTF-8');
            $state = $_POST['state'];
            $sanitized_state = htmlspecialchars($state, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        

        $stmt = $pdo->prepare('INSERT INTO rapport_soignant (nourriture, quantitee, date_heure) VALUES (:nourriture, :quantitee, :date) FROM animals WHERE id = :id');
        $stmt->bindParam(':first_name',$sanitized_name, $pdo::PARAM_STR);
        $stmt->bindParam(':race', $sanitized_race , $pdo::PARAM_INT);
        $stmt->bindParam(':habitat', $sanitized_habitat , $pdo::PARAM_INT);
        $stmt->bindParam(':state',  $sanitized_state , $pdo::PARAM_INT);
        $stmt->bindParam(':id', $id, $pdo::PARAM_INT);
     
        if(!$stmt->execute()){
            echo 'erreur d\'insertion';
        } 

    } catch(\Exception $e){
        echo 'erreur d\'insertion'. $e->getMessage();
    }
}

    

    public function read(){

        try{

                $mysql = Mysql::getInstance();
                $pdo = $mysql->getPDO();
                $stmt = $pdo->prepare('SELECT  a.id, a.first_name, r.name as namerace, h.name as home FROM animals a
                INNER JOIN race r ON a.race = r.id JOIN habitat h ON a.id = h.animals_list');
               
                if($stmt->execute()){

                    $stmt->setFetchMode($pdo::FETCH_CLASS, Animals::class);
                    
                   return $stmt->fetchAll();
                  
                } else {
                    echo 'erreur';
                }
              
               
        } catch(\Exception $e){
            echo 'erreur de lecture'. $e->getMessage();
           

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
                INNER JOIN race r ON a.race = r.id JOIN habitat h ON h.animals_list = a.id where a.id = :id');   
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


           
           
            $query = $pdo->prepare('UPDATE animals set first_name = :name, race = :race WHERE id = :id');
            $query->bindParam(':id',$id, $pdo::PARAM_INT);
            $query->bindParam(':name',  $sanitized_name, $pdo::PARAM_STR);
            $query->bindParam(':race', $sanitized_race, $pdo::PARAM_INT);
            
                if(!isset($_POST['name']) || !isset($_POST['race'])){


                } else {

            $name = $_POST['name'];
            $sanitized_name = htmlspecialchars($name, ENT_QUOTES | ENT_HTML5, 'UTF-8');
            $race = $_POST['race'];
            $sanitized_race = htmlspecialchars($race, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                
            if( $query->execute()){

                $query->setFetchMode($pdo::FETCH_CLASS, Animals::class);

                echo 'modification éffectuée';

            } else {

                echo 'erreur de modification';
            }
           
            
            return  $query;
         
        
        }

        } catch(\Exception $e){
            echo 'modification impossible'. $e->getMessage();
           

        }
       
    }

    public function updateSoignant(int $id){

        try{

            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();

            $nourriture = $_POST['nourriture'];
            $sanitized_nourriture = htmlspecialchars($nourriture, ENT_QUOTES | ENT_HTML5, 'UTF-8');
            $quantitee = $_POST['quantitee'];
            $sanitized_quantitee = htmlspecialchars($quantitee, ENT_QUOTES | ENT_HTML5, 'UTF-8');
            $date = $_POST['date'];
            $sanitized_date = htmlspecialchars($date, ENT_QUOTES | ENT_HTML5, 'UTF-8');
            
            $query = $pdo->prepare('UPDATE animals set nourriture = :nourriture, quantitee = :quantitee, date_heure = :date WHERE id = :id');
            $query->bindParam(':id',$id, $pdo::PARAM_INT);
            $query->bindParam(':nourriture', $sanitized_nourriture, $pdo::PARAM_STR);
            $query->bindParam(':quantitee', $sanitized_quantitee, $pdo::PARAM_INT);
            $query->bindParam(':date', $sanitized_date, $pdo::PARAM_STR);
         
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
            echo 'erreur de suppression'. $e->getMessage();
           

        }
       
    }


    


}




