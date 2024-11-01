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

        $query = $pdo->prepare('SELECT  u.id FROM roles r
         JOIN users u ON u.id = r.user_id WHERE r.id = :id');
        $query->bindParam(':id', $id, $pdo::PARAM_INT);

        if($query->execute()){

            $query->setFetchMode($pdo::FETCH_CLASS, Users::class);

            return $query->fetch();
        } else {
            echo 'erreur de recherche';
        }
       

        //$habitatEntity = new Habitats();//
        
        //foreach($habitat as $key => $value){

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
          
        

        $stmt = $pdo->prepare('INSERT INTO roles (name, user_id) VALUES (:name, :user_id)');
        $stmt->bindParam(':name', $_POST['name'], $pdo::PARAM_STR);
        $stmt->bindParam(':user_id', $_POST['user_id'], $pdo::PARAM_INT);
        
        
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

public function profil( ){

    try{
    $mysql = Mysql::getInstance();
    $pdo = $mysql->getPDO();
      
    if(isset($_GET['id']) AND $_GET['id'] > 0){

        $takeid = intval($_GET['id']);
        $stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
       // $stmt->bindParam(':id', $_GET['id'], $pdo::PARAM_INT);
        $stmt->execute(array($takeid));

        $takinfo = $stmt->fetch();
        echo $takinfo['username'].'<br>';
        echo $takinfo['email'];
        
       
        //$stmt->execute();
        /*if($stmt->execute()){
            $user = $stmt->fetch($pdo::FETCH_ASSOC);
            echo $user['username'];
        } else {
            echo 'role non attribué';
        }*/
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
                  
                //$user = $_SESSION['roles'] = $user->getRoles();
            
               
                //echo $_SESSION['username'] = $user->getUsername();
                //var_dump($user);

               if ($user === false) {
                        
                // Si aucun utilisateur ne correspond au login entré, on affiche une erreur
                //echo 'Utilisateur non trouvé';
                //$_SESSION['error'][]='Utilisateur non trouvé';

            } else {
                // sinon on vérifie le mot de passe
                $pass = $_POST['password'];
                if(password_verify($pass, $user->getPassword())){
                     $rolesStatement = $pdo->prepare(
                        // Requête pour récupérer les rôles de l'utilisateur
                        'SELECT COUNT(*) as count FROM roles WHERE user_id = :id');

                                $rolesStatement->bindValue(':id', $user->getId(), $pdo::PARAM_INT);
                                if($rolesStatement->execute()){
                                       
                                    $count  = $rolesStatement->fetch($pdo::FETCH_ASSOC);
                                    //var_dump($count);
                                   if($count['count'] > 0 && isset($_GET['admin']) && !isset($_GET['veto']) && !isset($_GET['soignant'])){ 
                                        //echo 'bonjour ADMIN  <br style="margin-top:50px;">';
                                       
                                        $user->addRole('ROLE_SOIGNANT');
                                        $user->addRole('ROLE_ADMIN');
                                        //$_SESSION['user'] = ['pseudo' => $user['username'], 'email' => $user['email'], 'roles' => ['ROLE_ADMIN']];
                                        var_dump($user);
                                        
                                    } elseif  (isset($_GET['veto']) && !isset($_GET['admin']) && !isset($_GET['soignant'])) {

                                        //echo 'bonjour'.'  '.$user->getUsername().'  '. 'vous avez le role VETO  <br style="margin-top:50px;">';
                                        $user->addRole('ROLE_VETO');
                                        var_dump($user);
                                       


                                    } else {

                                        //echo 'bonjour'.'  '.$user->getUsername().'  '. 'vous ètes un soignant  <br style="margin-top:50px;">';
                                        $user->addRole('ROLE_SOIGNANT');

                                       
                                    //var_dump($count);
                                       
                                    }
                                   
                            
                                    /*while($roles = $rolesStatement->fetch($pdo::FETCH_ASSOC)){
                                        $user->addRole($roles['name']);

                                        $_SESSION['id'] = $user->getId();
                                        $_SESSION['email'] = $user->getEmail();
                                        $_SESSION['username'] = $user->getUsername();
                                        $_SESSION['roles'] = $user->getRoles();
                                        header('Location: index.php?controller=profil&action=user&id='.$_SESSION['id']);
                                        //var_dump($user);    
                                        //echo '<div>'.$user->getUsername().'<br>'. $user->getEmail().'<br>';
                                    }*/
                                   
                                
                //} else {
                   // echo 'Mot de passe incorrect';
                //}
               
                                
                
                                }
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

        public function readRoles(){

            try{
    
                    $mysql = Mysql::getInstance();
                    $pdo = $mysql->getPDO();
    
    
                    //$statement = $pdo->prepare('SELECT u.id as id, u.email as email, r.role_id as name FROM users u
                    //INNER JOIN roles_users r ON r. = u.id');
                    
                    $statement = $pdo->prepare('SELECT name as roles FROM roles');
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