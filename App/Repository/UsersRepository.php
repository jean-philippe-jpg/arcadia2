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


    public function addRoles( ){

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

    public function connect(){

        try{

                $mysql = Mysql::getInstance();
                $pdo = $mysql->getPDO();

                //$email = $_POST['email'];
                //$pass = $_POST['password'];
                $statement = $pdo->prepare('SELECT * FROM users WHERE email = :email');
                // On récupère un utilisateur ayant le même login (ici, e-mail)
                $statement->bindParam(':email', $email, $pdo::PARAM_STR);
                $statement->execute();
                $user = $statement->fetchObject( 'Users'::class);

                    if ($user === false) {
                        // Si aucun utilisateur ne correspond au login entré, on affiche une erreur
                        echo 'Identifiants invalide';
                    } else {
                        $pass = $_POST['password'];
                        if(password_verify($pass, $user->getPassword()))  {
                                $userStatement = $pdo->prepare('SELECT * FROM roles_users JOIN roles ON role_id = id WHERE user_id = :id');
                                //echo 'Bienvenue ' . $user->getUsername();
                        };
                        $userStatement->bindValue(':id', $user->getId(), $pdo::PARAM_INT);
                       
                        if($userStatement->execute()){
                            //$roles = $userStatement->fetch($pdo::FETCH_ASSOC);
                            while($roles = $userStatement->fetch($pdo::FETCH_ASSOC)){
                                $user->addRole($roles['name']);
                               
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
    
                    $email = $_POST['usersShow'];
    
                    $statement = $pdo->prepare('SELECT * FROM users WHERE email = :email');
                    // On récupère un utilisateur ayant le même login (ici, e-mail)
                    $statement->bindParam(':email', $email, $pdo::PARAM_STR);
                    $statement->execute();
                    $user = $statement->fetch($pdo::FETCH_ASSOC);
    
                        if ($user === false) {
                            // Si aucun utilisateur ne correspond au login entré, on affiche une erreur
                            echo 'Identifiants invalides';
                        } else {
                               
                           
                            }
                        
                    
                   
            } catch(\Exception $e){
                echo 'erreur d\'insertion'. $e->getMessage();
               
    
            }
           
            }
    }

    