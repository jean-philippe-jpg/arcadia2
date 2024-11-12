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

        /*$query = $pdo->prepare('SELECT  u.id FROM roles r
         JOIN users u ON u.id = r.user_id WHERE r.id = :id');
        $query->bindParam(':id', $id, $pdo::PARAM_INT);*/

             $query = $pdo->prepare('SELECT * FROM users WHERE id = :id');
        $query->bindParam(':id', $id, $pdo::PARAM_INT);

        if($query->execute()){

            $query->setFetchMode($pdo::FETCH_CLASS, Users::class);

            return $query->fetch();
        } else {
            echo 'erreur d\'attribution';
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

                
                $statement = $pdo->prepare('INSERT INTO users(email, password) VALUES (:email, :password)');

            $statement->bindParam(':email',  $sanitized_email, $pdo::PARAM_STR);

            $email = $_POST['email'];
            $sanitized_email = htmlspecialchars($email, ENT_QUOTES | ENT_HTML5, 'UTF-8');
            $password = $_POST['password'];
            $sanitized_password = htmlspecialchars($password, ENT_QUOTES | ENT_HTML5, 'UTF-8');
         
            // Hash du mot de passe en utilisant BCRYPT //
            $statement->bindParam(':password', password_hash( $sanitized_password, PASSWORD_BCRYPT));

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
          
        

        $stmt = $pdo->prepare('INSERT INTO roles_users (role_id, user_id) VALUES (:role_id, :user_id)');
        $stmt->bindParam(':role_id', $_POST['role_id'], $pdo::PARAM_STR);
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

public function showRoles(){

    try{
    $mysql = Mysql::getInstance();
    $pdo = $mysql->getPDO();
      
    
  
    $stmt = $pdo->prepare('SELECT * FROM roles JOIN users ON roles.user_id = users.id WHERE user_id = :id');
    $stmt->bindParam(':id', $_POST['id'], $pdo::PARAM_INT);
    //$stmt->execute();
    if($stmt->execute()){
        $roles = $stmt->fetch($pdo::FETCH_ASSOC);

        /*while($roles = $stmt->fetch($pdo::FETCH_ASSOC)){
            echo $roles['name'];
        }*/
        var_dump($roles);
           echo 'roles ok';
    } else {
        echo 'erreur de roles';
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

                
                
                //$statement = $pdo->prepare('SELECT * FROM users WHERE email = :email');
                $statement = $pdo->prepare('SELECT * FROM users WHERE email = :email');
              
                // On récupère un utilisateur ayant le même login (ici, e-mail)
                $email = $_POST['email'];
            $sanitized_email = htmlspecialchars($email, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                $statement->bindValue(':email',$sanitized_email, $pdo::PARAM_STR);
                $statement->execute();
                $user = $statement->fetchObject( Users::class);


               if ($user === false) {
                        
                // Si aucun utilisateur ne correspond au login entré, on affiche une erreur
                echo 'Utilisateur non trouvé';
               

            } else {

                $password = $_POST['password'];
                $sanitized_password = htmlspecialchars($password, ENT_QUOTES | ENT_HTML5, 'UTF-8');

                if(password_verify( $sanitized_password , $user->getPassword())){
                    

                        $rolesStatement = $pdo->prepare('SELECT * FROM roles_users 
                        JOIN roles ON role_id = id WHERE user_id = :id');
                        $rolesStatement->bindValue(':id', $user->getId(), $pdo::PARAM_INT);
                        
                        if( $rolesStatement->execute()){
                                
                            while($roles = $rolesStatement->fetch($pdo::FETCH_ASSOC)){
                                $user->addRoles( $roles['name']);
                               
                            }

                            
                            var_dump($user);
                           
                        }
                       
                } else {

                    echo 'identifiant introuvable';
                }
                
            
        /*} else {

            echo 'imposible de récuperer l\'utilisateur';
        }*/
                // sinon on vérifie le mot de passe
                //$pass = $_POST['password'];
                //$username = $_GET['username'];
                //if(password_verify($pass, $user->getPassword())){

                    //echo 'bienvenue';
                    /* $rolesStatement = $pdo->prepare(
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
                    
                    $statement = $pdo->prepare('SELECT u.id as id, u.email as email, r.name as rolesname FROM roles_users 
                    INNER JOIN roles r ON role_id = r.id JOIN users u ON user_id = u.id');
                    /*$statement = $pdo->prepare('SELECT u.id,u.username, u.email FROM users u
                    ');*/
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