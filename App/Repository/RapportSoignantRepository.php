<?php

namespace App\Repository;

use App\Entity\RapportSoignant;
use App\Bdd\Mysql;
use App\Tools\StringTools;


class RapportSoignantRepository {

    public function findOneById( int $id)
    {
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('SELECT h.id as id, h.name as name, h.description as description, a.first_name as first_name FROM habitat h
                INNER JOIN animals a ON h.animals_list = a.id where h.id = :id');   
        $query->bindParam(':id', $id, $pdo::PARAM_INT);
       
        
        if($query->execute()){

            $query->setFetchMode($pdo::FETCH_CLASS, RapportSoignant::class);

            return $query->fetch(); 
    }
}

    public function createRapportSoignant( ){

                try{
                $mysql = Mysql::getInstance();
                $pdo = $mysql->getPDO();
                  
                $stmt = $pdo->prepare('INSERT INTO rapport_soignant (nourriture, quantitee, date_heure,  animal) VALUES (:nourriture, :quantitee, :date_heure, :animal)');
                $stmt->bindParam(':nourriture', $_POST['nourriture'], $pdo::PARAM_STR);
                $stmt->bindParam(':quantitee', $_POST['quantitee'], $pdo::PARAM_INT);
                $stmt->bindParam(':date_heure', $_POST['date_heure'], $pdo::PARAM_STR);
                $stmt->bindParam(':animal', $_POST['animal'], $pdo::PARAM_INT);

             
                if(!$stmt->execute()){
                    echo 'erreur de creation des soins';
                } else {
                    echo 'soins crée';
                }
    
            } catch(\Exception $e){
                echo 'erreur de création de rapport'. $e->getMessage();
            }
    }

    public function readRace(){

        try{

                $mysql = Mysql::getInstance();
                $pdo = $mysql->getPDO();
                $stmt = $pdo->prepare("SELECT * FROM race ");
                
                if($stmt->execute()){
                    
                    $stmt->setFetchMode($pdo::FETCH_CLASS, RapportSoignant::class);
                    
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




