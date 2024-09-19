<?php


namespace App\Controller;

use App\Repository\ContactRepository;



class ContactController extends Controller{

  public function route(): void {

    try {
      if (isset($_GET['action'])){

            switch($_GET['action']){
    
                case 'formcontact':
    
                    $this->create();
                    
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
                      try {     
                      $habitatRrepository = new ContactRepository();
                      $habitatRrepository->createContact();

                      $this->render('contact', [
                              
                                    
                          ] );

                      } catch(\Exception $e ) {
                          $this->render('errors/errors', [
                              'errors' => $e->getMessage()
  
                          ]);


                      }
                  
                      // charger l'id d'un element avec le repository//

                      
                          //require_once 'templates/showanimals.php';//    
                 
              }

             

                      
                 
              

             

}


