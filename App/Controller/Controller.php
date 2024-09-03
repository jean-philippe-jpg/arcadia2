<?php


namespace App\Controller;


class Controller{

    public function route(): void {

        if (isset($_GET['controller'])){

            switch($_GET['controller']){

                case 'pages':

                    $pagecontroller = new PagesController();
                    $pagecontroller->route();
                    
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

                protected function render(string $path, array $params = []): void
                 {
                    
                    require _ROOTPATH_ . '/templates/showanimals.php';
                }
    }

                