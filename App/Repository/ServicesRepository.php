<?php

namespace App\Repository;

use App\Entity\Service;
use App\Bdd\Mysql;
use App\Entity\Services;
use App\Tools\StringTools;


class ServicesRepository {

    public function findOneById( int $id)
    {
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('SELECT * FROM services WHERE id = :id');   
        $query->bindParam(':id', $id, $pdo::PARAM_INT);
       
        
        if($query->execute()){

            $query->setFetchMode($pdo::FETCH_CLASS, Services::class);

            return $query->fetch(); 
    }
}

    public function create( ){

                try{
                $mysql = Mysql::getInstance();
                $pdo = $mysql->getPDO();
                  
                if(isset($_POST['name'])){

                    $stmt = $pdo->prepare('INSERT INTO services (name, description) VALUES (:name, :description)');
                    $stmt->bindParam(':name', $_POST['name'], $pdo::PARAM_STR);
                    $stmt->bindParam(':description', $_POST['description'], $pdo::PARAM_STR);
    
                 
                    if(!$stmt->execute()){
                        echo 'erreur d\'insertion';
                    } 
                } else {

                    echo 'ajouter d\' un service';
                }
    
               
    
            } catch(\Exception $e){
                echo 'erreur d\'insertion'. $e->getMessage();
            }
    }

    public function read(){

        try{

                $mysql = Mysql::getInstance();
                $pdo = $mysql->getPDO();
                $stmt = $pdo->prepare("SELECT * FROM services ");
                
                if($stmt->execute()){
                    
                    $stmt->setFetchMode($pdo::FETCH_CLASS, Services::class);
                    

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
               
         
            $query = $pdo->prepare('UPDATE services set name = :name, description = :description WHERE id = :id');
            $query->bindParam(':id', $id, $pdo::PARAM_INT);
            $query->bindParam(':name', $_POST['name'], $pdo::PARAM_STR);
            $query->bindParam(':description', $_POST['description'], $pdo::PARAM_STR);
           
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

            $query = $pdo->prepare('DELETE FROM services WHERE id = :id');
            $query->bindValue(':id', $id, $pdo::PARAM_INT);
            $query->execute();
            
            return  $query;

        } catch(\Exception $e){
            echo 'erreur d\'insertion'. $e->getMessage();
           

        }
       
    }



}




