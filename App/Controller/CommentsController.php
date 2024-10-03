<?php

  namespace App\Controller;

use App\Entity\Habitats;
use App\Repository\UsersRepository;
    use App\Repository\CommentsRepository;
use App\Repository\HabitatsRepository;
use App\Repository\ServicesRepository;

class CommentsController extends Controller{

    public function route(): void {

      try {
        if (isset($_GET['action'])){

            switch($_GET['action']){

                    
                                case 'read':
                                    $this->read();
                            
                                    break;
                                    /*case 'create':
                                        $this->create();
                                        $this->read();
                                
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

               
                /*protected function home(): void
                
                {

                    $comments = new CommentsRepository();
                    $comments->create();
                    //$comments = $comments->readComments();

                    $home = new HabitatsRepository();
                     $home->readHabitat();

                    $this->render('home', [
                            'avis' => $comments,
                            'habitat' => $home
                            
                    ] );
                    //require_once 'templates/showanimals.php';//
                  
                }*/
                

    
               
                protected function read()
                
                {

                        $comments = new CommentsRepository();
                       $toto = $comments->read();
                  
                    $this->render('Admin/Comments', [

                        'comments' => $toto
                            
                    ] );
                    //require_once 'templates/showanimals.php';//
                  
                
            }


           
                protected function create(): void
                
                {    
                    $read = new CommentsRepository();
                    $read->create();
                    $view = $read->read();
                       
                    $this->render('home', [

                        
         
                    ] );
                    //require_once 'templates/showanimals.php';//
                  
                }




}