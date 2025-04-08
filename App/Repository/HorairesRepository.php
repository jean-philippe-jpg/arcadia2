<?php
namespace App\Repository;

use App\Entity\Horaires;
use App\Bdd\Mysql;
use App\Tools\StringTools;


class HorairesRepository {

    public function findOneById( int $id)
    {
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('SELECT h.id as id, h.name as name, h.description as description, a.first_name as first_name FROM habitat h
                INNER JOIN animals a ON h.animals_list = a.id where h.id = :id');   
        $query->bindParam(':id', $id, $pdo::PARAM_INT);
       
        
        if($query->execute()){

            $query->setFetchMode($pdo::FETCH_CLASS, Horaires::class);

            return $query->fetch(); 
    }
}

    public function create( ){

                try{
                $mysql = Mysql::getInstance();
                $pdo = $mysql->getPDO();
                  
                
               

                $stmt = $pdo->prepare('INSERT INTO horaires (jour, ouverture, fermeture) VALUES (:jour, :ouverture, :fermeture)');
                $stmt->bindParam(':jour', $jour, $pdo::PARAM_STR);
                $stmt->bindParam(':ouverture', $ouverture, $pdo::PARAM_STR);
                $stmt->bindParam(':fermeture', $fermeture, $pdo::PARAM_STR);

                $jour = $_POST['jour'];
                $ouverture = $_POST['ouverture'];
                $fermeture = $_POST['fermeture'];

                if(!$stmt->execute()){
                    echo 'erreur d\'insertion';
                } else {
                   
                    echo 'horaire!';
                } 
            
            } catch(\Exception $e){
                echo 'erreur d\'insertion'. $e->getMessage();
            }
    }

    public function read(){

        try{

                $mysql = Mysql::getInstance();
                $pdo = $mysql->getPDO();
                $stmt = $pdo->prepare("SELECT * FROM horaires ");
                
                if($stmt->execute()){
                    
                    $stmt->setFetchMode($pdo::FETCH_CLASS, Horaires::class);
                    

                   return $stmt->fetchAll();
                  
                } else {
                    echo 'erreur';
                }
              
               
        } catch(\Exception $e){
            echo 'erreur d\'insertion'. $e->getMessage();
           

        }
       
        }


    public function update(int $id){

        try{

            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();
               
         
            $query = $pdo->prepare('UPDATE horaires set ouverture = :ouverture, fermeture =  :fermeture WHERE id = :id');
            $query->bindParam(':id', $id, $pdo::PARAM_INT);
            $query->bindParam(':ouverture', $_POST['ouverture'], $pdo::PARAM_STR);
            $query->bindParam(':fermeture', $_POST['fermeture'], $pdo::PARAM_STR);
           
           
            //$query->bindParam(':name', $name, $pdo::PARAM_STR);
            //$query->bindParam(':description', $description, $pdo::PARAM_STR);
            $query->fetch($pdo::FETCH_ASSOC);
            $query->execute();
            
            return  $query;
         
           

        } catch(\Exception $e){
            echo 'erreur d\'insertion'. $e->getMessage();
           

        }
       
    }


    public function delete(int $id){

        try{

            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();

            $query = $pdo->prepare('DELETE FROM horaires WHERE id = :id');
            $query->bindValue(':id', $id, $pdo::PARAM_INT);
            $query->execute();
            
            return  $query;

        } catch(\Exception $e){
            echo 'erreur d\'insertion'. $e->getMessage();
           

        }
       
    }



}




