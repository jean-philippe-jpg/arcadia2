<?php




namespace App\Controller;

use App\Repository\HabitatsRepository;



class Controller{
   
    public function route(): void {

try { 
    
    if (isset($_GET['controller'])){

    switch($_GET['controller']){

       
            case 'Habitats':

                $habitat = new HabitatsController;
                $habitat->route();

                
                break;

                case 'Animals':

                    $habitat = new AnimalsController;
                    $habitat->route();

                    break;

                    case 'Race':

                        $habitat = new RaceController;
                        $habitat->route();
    
                        break;
                        case 'Contact':

                            $pagecontroller = new ContactController();
                            $pagecontroller->route();
                            
                            break;
                           
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

                