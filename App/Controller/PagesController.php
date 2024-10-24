<?php

  namespace App\Controller;

use App\Entity\Habitats;
use App\Repository\UsersRepository;
    use App\Repository\CommentsRepository;
use App\Repository\HabitatsRepository;
use App\Repository\ServicesRepository;
use App\Repository\AnimalsRepository;
use App\Repository\PagesRepository;

class PagesController extends Controller{

    public function route(): void {

      try {
        if (isset($_GET['action'])){

            switch($_GET['action']){

                
                case 'home':
                    $this->home();
                   
                    break;

                    case 'user':
                        $this->profilUser();
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

                        case 'profil':
                            $this->disconnected();
                            break;
                        case 'readusers':
                            $this->readUsers();
                            break;
                            /*case 'collection':
                                $this->readServices();
                                break;*/
                                /*case 'readsusers':
                                    $this->readUsers();
                                    break;*/
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
                    $comments->create();
                    $cmt = $comments->read();
                           
                    $home = new HabitatsRepository();
                    $environement =  $home->read();

                    $home = new HabitatsRepository();
                    $images =  $home->readImages();

                    $service = new ServicesRepository();
                    $prestation =  $service->read();

                    $animals = new AnimalsRepository();
                    $animal =  $animals->read();

                    $this->render('home', [
                            'avis' => $cmt,
                            'habitat' => $environement,
                            'service' => $prestation,
                            'animal' => $animal,
                            'images' => $images
                            
                    ] );
                    //require_once 'templates/showanimals.php';//
                  
                }

               
                protected function register(): void
                
                {
                        $register = new UsersRepository();
                        $register->addRegister();
                        $roles = new UsersRepository();
                        $roles->roles();
                        
                  
                    $this->render('Admin/Inscription', [
                            
                    ] );
                    //require_once 'templates/showanimals.php';//
                  
                }

                protected function profilUser(): void
                
                {
                        $register = new UsersRepository();
                        $register->profil();

                  
                    $this->render('Admin/Profil', [

                        'profil' => $register
                            
                    ] );
                    //require_once 'templates/showanimals.php';//
                  
                }

                protected function roles(): void
                
                {    

                    //if(isset($_GET['addroles'])) {
                        $id = $_GET['addroles'];  
                        $roles = new UsersRepository();
                        $role = $roles->findOneById($id);

                        $roles = new UsersRepository();
                        $roles->Roles();

                     $this->render('Admin/Users', [
                            'roles' => $role
                     ] );
                     //require_once 'templates/showanimals.php';//
                   
                    
                      
                    }

            

                protected function connected(): void
                
                {    
                    $connected = new UsersRepository();
                    $connect = $connected->connect();
                       
                    $this->render('Admin/Connexion', [

                        'user' => $connect
                            
                    ] );
                    //require_once 'templates/showanimals.php';//
                  
                }

                protected function disconnected(): void
                
                {    
                    /*$connected = new UsersRepository();
                    $connect = $connected->connect();*/
                       
                    $this->render('Admin/Profil', [

                        
                            
                    ] );
                    //require_once 'templates/showanimals.php';//
                  
                }

                protected function readUsers(): void
                
                {    
                    $read = new UsersRepository();
                    $users = $read->read();

                       
                    $this->render('Admin/Users', [   
                        'users' => $users,
                        
                            
                    ] );
                    //require_once 'templates/showanimals.php';//
                  
                }

                /*protected function readServices(): void
                
                {    
                    $read = new ServicesRepository();
                    $read->read();
                       
                    $this->render('services', [

                        
                            
                    ] );
                    //require_once 'templates/showanimals.php';//
                  
                }*/




}