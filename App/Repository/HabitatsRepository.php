<?php

namespace App\Repository;


use App\Entity\Habitats;
use App\Entity\Users;
use App\Entity\Animals;
use App\Bdd\Mysql;
use App\Tools\StringTools;
class HabitatsRepository {


    public function findOneById( int $id)
    {
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

       
                $query = $pdo->prepare("SELECT a.id as animal_id, a.first_name as name_animals, h.name, h.description FROM habitat h
               INNER JOIN animals a on a.habitat_id = h.id where h.id = :id    ");

                $query->bindParam(':id', $id, $pdo::PARAM_INT);
        
            if($query->execute()){

               $query->setFetchMode($pdo::FETCH_CLASS, Habitats::class);

                return $query->fetch();

            }
        }
        public function findOneByAnimals( int $id)
        {
            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();
    
           
                    $animals = $pdo->prepare("SELECT * FROM animals 
                   where habitat_id = :id    ");
    
                    $animals->bindParam(':id', $id, $pdo::PARAM_INT);
            
                if($animals->execute()){
    
                   $animals->setFetchMode($pdo::FETCH_CLASS, Animals::class);
    
                    return $animals->fetchAll();
    
                }
            }
        
    

    public function createHabitat( ){

                try{
                $mysql = Mysql::getInstance();
                $pdo = $mysql->getPDO();
                  

                if(!isset($_POST['name'])) {


                } else {
               $name = $_POST['name'];
                $description = $_POST['description'];
                
    
                $stmt = $pdo->prepare('INSERT INTO habitat (name, description ) VALUES (:name, :description )');
                $stmt->bindParam(':name',$name , $pdo::PARAM_STR);
                $stmt->bindParam(':description', $description , $pdo::PARAM_STR);
                
                    
                 
                if($stmt->execute()){
                    echo 'insertion reussie';
                } else {
                    echo 'veuillez remplir tous les champs';
                }
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
                $stmt = $pdo->prepare("SELECT  group_concat(a.first_name, '<br>' )as name_animals, h.id as id, h.name as name, h.description as description FROM habitat h
                INNER JOIN animals a ON a.habitat_id = h.id group by h.id"); 
                /*$stmt = $pdo->prepare("SELECT group_concat(animals.first_name as name_animals, '') , habitat.name, habitat.id from habitat left join animals on animals.habitat_id = habitat.id
                group by habitat.id");*/

                
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
          
        

        $stmt = $pdo->prepare('INSERT INTO avis_habitat (avis, etat, habitat_id ) VALUES (:avis, :etat, :habitat_id)');
        $stmt->bindParam(':avis', $_POST['avis'], $pdo::PARAM_STR);
        $stmt->bindParam(':etat', $_POST['etat'], $pdo::PARAM_STR);
        $stmt->bindParam(':habitat_id', $_POST['habitat_id'], $pdo::PARAM_INT);
       
     
        if(!$stmt->execute()){
            echo 'erreur d\'insertion';
        } 
            if(empty($_POST['avis'])) {
                

                } else {
             echo 'avis crée';
            }

    } catch(\Exception $e){
        echo 'erreur d\'insertion'. $e->getMessage();
    }
}


    public function updateHabitat(int $id){

        try{

            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();
               
                if(!isset($_POST['description'])) {


                } else {
                $description = $_POST['description'];
               
            
                //$last_name = $_POST['last_name'];


                $update = $pdo->prepare('UPDATE habitat set description = :description  WHERE id = :id');
                $update->bindParam(':id', $id, $pdo::PARAM_INT);
                $update->bindParam(':description', $description, $pdo::PARAM_STR);
              
                $update->fetch($pdo::FETCH_ASSOC);


                if($update->execute()){
                      
                    $update->fetch();
                  echo 'modification reussie';
            } else {
                echo 'modification echouée';
            }
            
            return  $update;
         
 
        
        }

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




