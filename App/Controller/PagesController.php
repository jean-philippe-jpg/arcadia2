<?php

  namespace App\Controller;

  use App\Repository\CommentsRepository;
class PagesController extends Controller{

    public function route(): void {

      try {
        if (isset($_GET['action'])){

            switch($_GET['action']){

                case 'animals':

                    $this->animals();
                    
                    break;
                case 'home':
                    $this->home();
                   
                    break;
                case 'pages':
                    var_dump('chargement de pagescontroller');
                   
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

                protected function animals(): void
                
                {
                
                    $this->render('showanimals', [

                        'test1' =>'toto'
                    ] );
                    //require_once 'templates/showanimals.php';//
                  
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



}