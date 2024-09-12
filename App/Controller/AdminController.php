<?php

namespace App\Controller;

  use App\Repository\HabitatsRepository;


class AdminController extends Controller{

    public function route(): void {

      try {
        if (isset($_GET['action'])){

            switch($_GET['action']){

                case 'create':
                    
                    $this->create();
                   
                    break;
                    
                        case 'update':

                            $this->update();
                            
                            break;
                            case 'delete':

                                $this->delete();
                                
                                break;
                case 'show':

                    //$this->show();
                    
                    break;

                default:
                throw new \Exception('page introuvable :/');
                  break;
        }
        }  else {
            throw new \Exception('erreur de controller');
            
        }
      } catch(\Exception $e){
        echo $e->getMessage();
        $this->render('errors/errors', [
            'errors' => $e->getMessage()
        ]);

      }

    }

               
                
    protected function create()
                
    {
        $this->render('/Admin/Habitat/create', [
             
            ] );  
    }

    protected function read()
                
    {
        $this->render('/Admin/Habitat/read', [

             
             
            ] );  
    }

    protected function update()
                
    {
        $this->render('/Admin/Habitat/read', [

             
            ] );
    }

    protected function delete()
                
    {
        $this->render('/Admin/Habitat/read', [
             
            ] );  
    }

               
                

}