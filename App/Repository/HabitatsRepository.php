<?php

namespace App\Repository;


use App\Entity\Habitats;
use App\Entity\Users;
use App\Entity\Animals;
use App\Bdd\Mysql;
use App\Tools\StringTools;
//use PDO;

//use PDO;

//require_once 'App/Entity/Habitats.php';
//require_once 'App/Entity/Habitats.php';
class HabitatsRepository {


    public function findOneById( int $id)
    {
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

       /* $query = $pdo->prepare('SELECT h.id as id, h.name as name, h.description as description, h.animals_list as animals, a.first_name as first_name FROM habitat h
                INNER JOIN animals a ON h.id = a.habitat where h.id = :id');*/
                 $query = $pdo->prepare("SELECT h.id as id, h.name as name_habitat, h.description as description, h.animals_list as animals, a.first_name as name, a.id as animal_id, r.name as race_name, a_s.state as state FROM habitat h
                INNER JOIN animals a ON h.id = a.habitat JOIN race r ON r.id = a.race JOIN animals_state a_s ON a_s.id = a.state  where h.id = :id ");
                $query->bindParam(':id', $id, $pdo::PARAM_INT);
        
            if($query->execute()){

               $query->setFetchMode($pdo::FETCH_CLASS, Habitats::class);

                return $query->fetch();

            } 


        //$habitatEntity = new Habitats();
        
        /*foreach($habitat as $key => $value){

            $habitatEntity->{'set'.StringTools::toPascaleCase($key) } ($value);
            //if(method_exists($habitatEntity, $method)){
                //$habitatEntity->$method($value);
            //}

            //$habitatEntity->{'set' .StringTools::toPascaleCase($key)}($value);

        return $habitat;
        
    }*/


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


        }

    public function createHabitat( ){

                try{
                $mysql = Mysql::getInstance();
                $pdo = $mysql->getPDO();
                  
                
    
                $stmt = $pdo->prepare('INSERT INTO habitat (name, description, animals_list) VALUES (:name, :description, :animals_list)');
                $stmt->bindParam(':name', $_POST['name'], $pdo::PARAM_STR);
                $stmt->bindParam(':description', $_POST['description'], $pdo::PARAM_STR);
                $stmt->bindParam(':animals_list', $_POST['animals_list'], $pdo::PARAM_INT);

                if($stmt->execute()){
                    echo 'insertion reussie';
                } else {
                    echo 'veuillez remplir tous les champs';
                }
    
            } catch(\Exception $e){
                echo 'erreur d\'insertion'. $e->getMessage();
            }

            }

            
    public function images(){

        try {
            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();
        
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (empty($_FILES['images']['tmp_name'])) {
                    
                    echo 'Veuillez sélectionner un fichier.';
                } else {
                    $file_basename = pathinfo($_FILES['images']['name'], PATHINFO_FILENAME);
                    $file_ext = pathinfo($_FILES['images']['name'], PATHINFO_EXTENSION);
        
                    $new_name = $file_basename . '_' . date("Ymd_His") . '.' . $file_ext;
                        
                    $images = $pdo->prepare('INSERT INTO uploads (libele, habitat_id) VALUES (:libele, :habitat_id)');
                    $images->bindParam(':libele', $new_name, $pdo::PARAM_STR);
                    $images->bindParam(':habitat_id', $_POST['habitat_id'], $pdo::PARAM_INT);
        
                    if ($images->execute()) {
                        $target_dir = "uploads/";
                        $target_path = $target_dir . $new_name;
        
                        if (move_uploaded_file($_FILES['images']['tmp_name'], $target_path)) {
                            echo 'Téléchargement réussi : ' . htmlspecialchars($new_name);
                        } else {
                            echo 'Erreur lors du déplacement du fichier.';
                        }
                    } else {
                        echo 'Erreur lors de l\'insertion dans la base de données.';
                    }
                }
            }
        } catch (\Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }

    }

           
    public function readImages(){

        try{
            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();

            $image = $pdo->prepare("SELECT * FROM images ");
        
           
            if($image->execute()){
                $image->fetch($pdo::FETCH_ASSOC);
                return $image->fetchAll();
                
            } else {
                echo 'veuillez remplir tous les champs';
            }
              

            

           

        } catch(\Exception $e){
            echo 'erreur d\'insertion'. $e->getMessage();
        }
    }



           
    public function read(){

        try{

                $mysql = Mysql::getInstance();
                $pdo = $mysql->getPDO();
                $stmt = $pdo->prepare("SELECT h.id as id, h.name as name_habitat, h.description as description, h.animals_list as animals, a.first_name as name FROM habitat h
                INNER JOIN animals a ON h.animals_list = a.id");
                   // $stmt->bindParam(':id', $id, $pdo::PARAM_INT);
                /*$stmt = $pdo->prepare("SELECT * FROM habitat 
                INNER JOIN animals  ON habitat.animals_list = animals.id");*/
                
                if($stmt->execute()){
                    
                    $stmt->setFetchMode($pdo::FETCH_CLASS, Habitats::class);

                    return $stmt->fetchAll();
        
                } else {
                    echo 'erreur';
                }
              
               
        } catch(\Exception $e){
            echo 'erreur d\'insertion'. $e->getMessage();
           

        }
       
    }

    public function createAvis( ){

        try{
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();
          
        

        $stmt = $pdo->prepare('INSERT INTO avis_habitat (avis, etat, habitat_id, images) VALUES (:avis, :etat, :habitat_id, :images)');
        $stmt->bindParam(':avis', $_POST['avis'], $pdo::PARAM_STR);
        $stmt->bindParam(':etat', $_POST['etat'], $pdo::PARAM_STR);
        $stmt->bindParam(':habitat_id', $_POST['habitat_id'], $pdo::PARAM_INT);
        $stmt->bindParam(':images', $_POST['images'], $pdo::PARAM_INT);

     
        if(!$stmt->execute()){
            echo 'erreur d\'insertion';
        } 

        echo 'avis crée';

    } catch(\Exception $e){
        echo 'erreur d\'insertion'. $e->getMessage();
    }
}


    public function updateHabitat(int $id){

        try{

            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();
               
                $name = $_POST['name'];
                $description = $_POST['description'];
                $animals = $_POST['animals'];
            
                //$last_name = $_POST['last_name'];


                $update = $pdo->prepare('UPDATE habitat set name = :name, description = :description, animals_list = :animals  WHERE id = :id');
                $update->bindParam(':id', $id, $pdo::PARAM_INT);
                //$query->bindParam(':name', $name, $pdo::PARAM_STR);
                $update->bindParam(':description', $description, $pdo::PARAM_STR);
                $update->bindParam(':name', $name, $pdo::PARAM_STR);
                $update->bindParam(':animals', $animals, $pdo::PARAM_STR);
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




