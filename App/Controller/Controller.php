<?php




namespace App\Controller;

use App\Entity\Horaires;
use App\Repository\AvisHabitatsRepository;

//use App\Repository\HabitatsRepository;




class Controller{
   
    public function route(): void {

try { 
    
    if (isset($_GET['controller'])){

    switch($_GET['controller']){

        case 'admin':

            $pagecontroller = new VetoController();
            $pagecontroller->route();
            break;
            case 'horaires':

                $pagecontroller = new HorairesController();
                $pagecontroller->route();
                break;

            case 'profil':

                $pagecontroller = new PagesController();
                $pagecontroller->route();
                break;
    
       
            case 'habitats':

                $habitat = new HabitatsController;
                $habitat->route();

                
                break;

                case 'animals':

                    $habitat = new AnimalsController;
                    $habitat->route();

                    break;

                    case 'race':

                        $habitat = new RaceController;
                        $habitat->route();
    
                        break;

                        case 'veto':

                            $veto = new VetoController;
                            $veto->route();
                            break;
                        case 'contact':

                            $pagecontroller = new ContactController();
                            $pagecontroller->route();
                            
                            break;
                            case 'users':

                                $pagecontroller = new PagesController();
                                $pagecontroller->route();
                                
                                break;

                                case 'deconnexion':

                                   $pagecontroller = new PagesController();
                                    $pagecontroller->route();
                                    
                                    break;
                                case 'services':

                                    $pagecontroller = new ServicesController();
                                    $pagecontroller->route();
                                    
                                    break;

                                    case 'comments':

                                        $pagecontroller = new CommentsController();
                                        $pagecontroller->route();
                                        break;

                                        case 'rapportsoignant':

                                            $pagecontroller = new AnimalsController();
                                            $pagecontroller->route();
                                            break;
                                           
                                        /*case 'horaires':

                                            $pagecontroller = new HorairesController();
                                            $pagecontroller->route();
                                            */

                           
        default:
            throw new \Exception('erreur de controller');
            
          break;
            

}
}  else {

    $pagecontroller = new PagesController();
    $pagecontroller->home();
}
} catch(\Exception $e){
$this->render('errors/errors', [
    'errors' => $e->getMessage()
]);

}

                }

                protected function render(string $path, array $params = []): void
                 {
                    $filePath = _ROOTPATH_.'/templates/'.$path.'.php';
                  


                    try{
                        if(!file_exists($filePath)){

                        throw new \Exception('fichier introuvable');
                            } else {
                                extract($params);
                                require_once $filePath;
                            }

                    } catch(\Exception $e) {

                        echo $e->getMessage();
                    }
                          /*require _ROOTPATH_ . '/templates/showanimals.php';*/            
    }
}

                