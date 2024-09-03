<?php

  namespace App\Controller;

class PagesController extends Controller{

    public function route(): void {

        if (isset($_GET['action'])){

            switch($_GET['action']){

                case 'animals':

                    $this->animals();
                    
                    break;
                case 'habitat':
                    var_dump('chargement de habitatcontroller');
                   
                    break;
                case 'pages':
                    var_dump('chargement de pagescontroller');
                   
                    break;
                default:

                  break;
        }
        }  else {

            echo 'erreur de controller';
        }

                }

                protected function animals(): void {
                    $this->render('showanimals.php');
                    
                }



}