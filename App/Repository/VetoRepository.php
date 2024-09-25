<?php

namespace App\Repository;


use App\Entity\Veto;
use App\Bdd\Mysql;
use App\Tools\StringTools;


//require_once 'App/Entity/Veto.php';
//require_once 'App/Entity/Habitats.php';
class VetoRepository {


    public function findOneById( int $id)
    {
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('SELECT h.id as id, h.name as name, h.description as description, a.first_name as first_name FROM habitat h
                INNER JOIN animals a ON h.animals_list = a.id where h.id = :id');   
        $query->bindParam(':id', $id, $pdo::PARAM_INT);
        $query->execute();
        $habitat = $query->Fetch($pdo::FETCH_ASSOC);
       
   

        //$habitatEntity = new Veto();
        
        //foreach($habitat as $key => $value){

           // $habitatEntity->{'set'.StringTools::toPascaleCase($key) } ($value);
            //if(method_exists($habitatEntity, $method)){
                //$habitatEntity->$method($value);
            //}

            //$habitatEntity->{'set' .StringTools::toPascaleCase($key)}($value);

       // return $habitat;
        
    //}
}

/*public function innerRaceAnimals( ){

    try{
    $mysql = Mysql::getInstance();
    $pdo = $mysql->getPDO();
      
    $stmt = $pdo->prepare('SELECT * FROM habitats INNER JOIN  ON animals.race = race.id') ;
    
    $stmt->fetch($pdo::FETCH_ASSOC);
    if($stmt->execute()){
        return $stmt->fetch();
    } 

} catch(\Exception $e){
    echo 'erreur d\'insertion'. $e->getMessage();
}
}*/


    

    public function createStateAnimals( ){

                try{
                $mysql = Mysql::getInstance();
                $pdo = $mysql->getPDO();
                  
                $stmt = $pdo->prepare('INSERT INTO animals_state (nourriture, quantitee, state, date_de_passage, detail, animal) VALUES (:nourriture, :quantitee, :state, :date_de_passage, :detail, :animal)');
                $stmt->bindParam(':nourriture', $_POST['nourriture'], $pdo::PARAM_STR);
                $stmt->bindParam(':quantitee', $_POST['quantitee'], $pdo::PARAM_INT);
                $stmt->bindParam(':state', $_POST['state'], $pdo::PARAM_STR);
                $stmt->bindParam(':date_de_passage', $_POST['date_de_passage'], $pdo::PARAM_STR);
                $stmt->bindParam(':detail', $_POST['detail'], $pdo::PARAM_STR);
                $stmt->bindParam(':animal', $_POST['animal'], $pdo::PARAM_INT);
                
                //$stmt->execute();
                if($stmt->execute()){
                    echo 'insertion reussie';
                } else {
                    echo 'erreur de rapport';
                }
    
            } catch(\Exception $e){
                echo 'erreur d\'insertion'. $e->getMessage();
            }
    }

    public function readStateAnimal(){

        try{

                $mysql = Mysql::getInstance();
                $pdo = $mysql->getPDO();
                $stmt = $pdo->prepare("SELECT a_s.id as id, a_s.nourriture as nourriture, a_s.quantitee as quantitee, a_s.state as state, a_s.detail as detail, a_s.date_de_passage as date_de_passage, a.first_name as first_name FROM animals_state a_s
                INNER JOIN animals a ON a_s.animal = a.id");
                //$stmt->setFetchMode($pdo::FETCH_CLASS, 'Habitats');
                $stmt->fetch($pdo::FETCH_ASSOC);
                //$stmt->fetchAll();
                //$stmt->execute();


                if($stmt->execute()){
                    
                    //$stmt->fetchObject('Habitats');
                    //$stmt->fetchAll();
                   //return $stmt->setFetchMode($pdo::FETCH_CLASS, 'Habitats::class');
                   return $stmt->fetchAll();
                  
                  
                } else {
                    echo 'erreur d\'affichage des rapport de santé';
                }
              
               
        } catch(\Exception $e){
            echo 'erreur d\'insertion'. $e->getMessage();
           

        }
       
        }


    public function updateStateAnimals(int $id){
       
        try{

            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();
            
            $nourritures = $_POST['nourriture'];
            $quantitee = $_POST['quantitee'];
            $state = $_POST['state'];
            $detail = $_POST['detail'];
            $animal = $_POST['animal'];
            $date = $_POST['date'];  
                               

                $update = $pdo->prepare('UPDATE animals_state set nourriture = :nourriture, quantitee = :quantitee, state = :state, detail = :detail, animal = :animal, date_de_passage = :date  WHERE id = :id');
                $update->bindParam(':id', $id, $pdo::PARAM_INT);
                //$query->bindParam(':name', $name, $pdo::PARAM_STR);
                $update->bindParam(':nourriture', $nourritures, $pdo::PARAM_STR);
                $update->bindParam(':quantitee', $quantitee, $pdo::PARAM_STR);
                $update->bindParam(':state', $state, $pdo::PARAM_STR);
                $update->bindParam(':detail', $detail, $pdo::PARAM_STR);
                $update->bindParam(':animal', $animal, $pdo::PARAM_INT);
                $update->bindParam(':date', $date, $pdo::PARAM_STR);
                $update->fetch($pdo::FETCH_ASSOC);


                if($update->execute()){
                      
                    $update->fetch();
                  echo 'modification reussie';
            } else {
                echo 'modification echouée';
            }
            
            return  $update;
         

        } catch(\Exception $e){
            echo 'erreur d\'insertion'. $e->getMessage();
           

        }
       
    }


    public function deleteStateAnimals(int $id){

        try{

            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();

            $query = $pdo->prepare('DELETE FROM animals_state WHERE id = :id');
            $query->bindValue(':id', $id, $pdo::PARAM_INT);
            $query->execute();
            
            return  $query;

        } catch(\Exception $e){
            echo 'erreur d\'insertion'. $e->getMessage();
           

        }
       
    }



}




