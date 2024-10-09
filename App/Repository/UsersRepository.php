<?php

namespace App\Repository;

use App\Entity\Users;
use App\Bdd\Mysql;
use App\Tools\StringTools;
use Exception;

require_once './App/Entity/Users.php';
class UsersRepository {


    public function findOneById( int $id)
    {
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        /*$query = $pdo->prepare('SELECT * FROM race WHERE id = :id');
        $query->bindParam(':id', $id, $pdo::PARAM_INT);
        $query->execute();
        $habitat = $query->Fetch($pdo::FETCH_ASSOC);
   

        //$habitatEntity = new Habitats();//
        
        foreach($habitat as $key => $value){

           // $habitatEntity->{'set'.StringTools::toPascaleCase($key) } ($value);
            /*if(method_exists($habitatEntity, $method)){
                $habitatEntity->$method($value);*/
            //}

            //$habitatEntity->{'set' .StringTools::toPascaleCase($key)}($value);

        //return $habitat;
        
    //}*/
}

    

    public function addRegister( ){

                try{
                $mysql = Mysql::getInstance();
                $pdo = $mysql->getPDO();
                $password = $_POST['password'];
                $email = $_POST['email'];
                $username = $_POST['username'];
                $statement = $pdo->prepare('INSERT INTO users(email, username, password) VALUES (:email, :username, :password)');

            $statement->bindParam(':email', $email, $pdo::PARAM_STR);
            $statement->bindParam(':username', $username, $pdo::PARAM_STR);
            // Hash du mot de passe en utilisant BCRYPT //
            $statement->bindParam(':password', password_hash($password, PASSWORD_BCRYPT));
            

            if ($statement->execute()) {

                echo 'L\'utilisateur a bien été créé';

              
            } else {

               throw new Exception('Impossible de créer l\'utilisateur') ;
            }
    
            } catch(\Exception $e){
                echo  $e->getMessage();
            }
    }


    public function Roles( ){

        try{
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();
          
        

        $stmt = $pdo->prepare('INSERT INTO roles_users (user_id, role_id) VALUES (:user, :role)');
        $stmt->bindParam(':user', $_POST['user'], $pdo::PARAM_INT);
        $stmt->bindParam(':role', $_POST['role'], $pdo::PARAM_INT);
        
        
        //$stmt->execute();
        if($stmt->execute()){
            echo 'role attribué';
        } else {
            echo 'role non attribué';
        }

    } catch(\Exception $e){
        echo 'erreur d\'attribution'. $e->getMessage();
    }
}

public function addRoles( ){

    try{
    $mysql = Mysql::getInstance();
    $pdo = $mysql->getPDO();
      
    
  
    $stmt = $pdo->prepare('SELECT * FROM roles_users JOIN roles ON role_id = id WHERE user_id = :id');
    $stmt->bindParam(':id', $_POST['id'], $pdo::PARAM_INT);
    //$stmt->execute();
    if($stmt->execute()){
        $roles = $stmt->fetch($pdo::FETCH_ASSOC);
        while($roles = $stmt->fetch($pdo::FETCH_ASSOC)){
            echo $roles['name'];
        }
           echo 'role attribué';
    } else {
        echo 'role non attribué';
    }

} catch(\Exception $e){
    echo 'erreur d\'attribution'. $e->getMessage();
}
}

    public function connect(){

        try{

                $mysql = Mysql::getInstance();
                $pdo = $mysql->getPDO();

                $email = $_POST['email'];
                //$pass = $_POST['password'];
                $statement = $pdo->prepare('SELECT * FROM users WHERE email = :email');
              
                // On récupère un utilisateur ayant le même login (ici, e-mail)
                $statement->bindValue(':email', $email, $pdo::PARAM_STR);

               if($statement->execute()){
                $user = $statement->fetchObject( Users::class);
               if ($user === false) {
                        
                // Si aucun utilisateur ne correspond au login entré, on affiche une erreur
                echo 'Utilisateur non trouvé';
            } else {
                // sinon on vérifie le mot de passe
                $pass = $_POST['password'];
                if(password_verify($pass, $user->getPassword())){
                     $rolesStatement = $pdo->prepare(
                        // Requête pour récupérer les rôles de l'utilisateur
                        'SELECT * FROM roles_users JOIN roles
                         ON role_id = id WHERE user_id = :id
                         ');
                                $rolesStatement->bindValue(':id', $user->getId(), $pdo::PARAM_INT);
                                if($rolesStatement->execute()){
                                    while($roles = $rolesStatement->fetch($pdo::FETCH_ASSOC)){
                                        $user->addRole($roles['name']);
                                        //var_dump($user);    
                                        echo '<div>'.$user->getEmail().'<br>'. $user->getUsername().'<br>';
                                    }
                                   
                                }
                } else {
                    echo 'Mot de passe incorrect';
                }
               }

                   
                    }
                    
                        
        } catch(\Exception $e){
            echo 'erreur d\'insertion'. $e->getMessage();
           

        }
    }
       
        

        public function read(){

            try{
    
                    $mysql = Mysql::getInstance();
                    $pdo = $mysql->getPDO();
    
    
                    //$statement = $pdo->prepare('SELECT u.id as id, u.email as email, r.role_id as name FROM users u
                    //INNER JOIN roles_users r ON r. = u.id');
                    
                    $statement = $pdo->prepare('SELECT * FROM users');
                    // On récupère un utilisateur ayant le même login (ici, e-mail)
    
                        if ( $statement->execute()) {

                           
                          $statement->setFetchMode($pdo::FETCH_CLASS, Users::class);
                        
                            // Si aucun utilisateur ne correspond au login entré, on affiche une erreur
                            return $statement->fetchAll();
                            
                            
                              echo 'utilisateurs affichés';
                            
                        } else {
                               echo 'erreur d\'affichege des utilisateurs';
                           
                            }
                        
                    
                   
            } catch(\Exception $e){
                echo 'erreur d\'insertion'. $e->getMessage();
               
    
            }
           
            }
    }

    