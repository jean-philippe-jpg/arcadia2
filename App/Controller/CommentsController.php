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
                                    case 'show':
                                        //$this->update();
                                        $this->show();
                                        break;
                                        case 'isValid':
                                            $this->update();
                                            //$this->show();
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

               
               
                protected function read()
                
                {

                        $comments = new CommentsRepository();
                       $toto = $comments->read();

                       
                  
                    $this->render('Admin/Comments/read', [

                        'comments' => $toto
                        
                            
                    ] );
                    //require_once 'templates/showanimals.php';//
                  
                
            }


            protected function show()
                
            {
                    $id = $_GET['id'];
                    $comments = new CommentsRepository();
                   $show = $comments->findOneById($id);

                $this->render('Admin/Comments/show', [

                    'show' => $show
                    
                        
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

                protected function update()
                
                {
                        try {       

                            if(isset($_GET['isValid'])){
                                $id = $_GET['isValid'];
                               
                                $commentRrepository = new CommentsRepository();
                                $commentRrepository->update($id);

                                $this->render('/Admin/Comments/show', [

                                    
                          
                           ] );
                               
                                } else {
                                    throw new \Exception('modification impossible :/');
    
                                }
                            
                          
         
                             
 
                        } catch(\Exception $e ) {
                            $this->render('errors/errors', [
                                'errors' => $e->getMessage()
    
                            ]);


                        }   
                   
                }
                




}