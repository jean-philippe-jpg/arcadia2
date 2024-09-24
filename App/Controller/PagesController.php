<?php

  namespace App\Controller;

  use App\Repository\UsersRepository;
    use App\Repository\CommentsRepository;
class PagesController extends Controller{

    public function route(): void {

      try {
        if (isset($_GET['action'])){

            switch($_GET['action']){

                
                case 'home':
                    $this->home();
                   
                    break;
                case 'register':
                    $this->register();
                    break;
                    case 'roles':
                        $this->roles();
                        break;
                    case 'connect':
                        $this->connected();
                        break;
                default:
                throw new \Exception('page introuvable :/');
                  break;
        }
        }  else {

            echo 'erreur de controller';
        }
      } catch(\Exception $e){
        echo $e->getMessage();
        $this->render('errors/errors', [
            'errors' => $e->getMessage()
        ]);

      };

                }

               
                protected function home(): void
                
                {

                    $comments = new CommentsRepository();
                    $comments->createComments();
                    $comments = $comments->readComments();
                
                    $this->render('home', [
                            'avis' => $comments
                    ] );
                    //require_once 'templates/showanimals.php';//
                  
                }

                protected function register(): void
                
                {
                        $register = new UsersRepository();
                        $register->addRegister();
                  
                    $this->render('Admin/Inscription', [
                            
                    ] );
                    //require_once 'templates/showanimals.php';//
                  
                }

                protected function roles(): void
                
                {
                       $roles = new UsersRepository();
                       $roles->addRoles();
                  
                    $this->render('Admin/Roles', [

                        
                            
                    ] );
                    //require_once 'templates/showanimals.php';//
                  
                }

                protected function connected(): void
                
                {    
                    $connected = new UsersRepository();
                    $connected->connect();
                       
                    $this->render('Admin/Connexion', [

                        'user' => $connected
                            
                    ] );
                    //require_once 'templates/showanimals.php';//
                  
                }



}