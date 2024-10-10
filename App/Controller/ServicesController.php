<?php

namespace App\Controller;

use App\Repository\ServicesRepository;



class ServicesController extends Controller{

  public function route(): void {

    try {
      if (isset($_GET['action'])){

          switch($_GET['action']){

              case 'show':

                  $this->show();
                  
                  break;
              case 'create':

                  $this->create();

                  break;
              case 'read':
                  $this->read();
                 
                  break;
                  case 'readvisiteur':
                    $this->readVisiteur();
                   
                    break;
                  case 'delete':
                     $this->delete();

                  break;
                  case 'update':
                      $this->update();
                     
                  break;
                  case 'delete':
                      var_dump('chargement de pagescontroller');
                     

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


              
              protected function show()
              
              {
                  try {
                      if(isset($_GET['id'])){

                          $id = $_GET['id'];
                          // charger l'id d'un element avec le repository//

                          $serviceRrepository = new ServicesRepository();
                          $service = $serviceRrepository->findOneById($id);

                          $this->render('/Admin/Services/show', [

                              'services' => $service,
                              
                                       
                              ] );
                         

                      } else {
                          throw new \Exception('id introuvable');

                      }
                     

                  } catch(\Exception $e){
                      $this->render('errors/errors', [
                          'errors' => $e->getMessage()

                      ]);}
              
                      
                          //require_once 'templates/showanimals.php';//
                
              }

              protected function create()
              
              {
                      try {     
                      $habitatRrepository = new ServicesRepository();
                      $habitatRrepository->create();

                      $this->render('/Admin/Services/create', [
                              
                                    
                          ] );

                      } catch(\Exception $e ) {
                          $this->render('errors/errors', [
                              'errors' => $e->getMessage()
  
                          ]);


                      }
                  
                      // charger l'id d'un element avec le repository//

                      
                          //require_once 'templates/showanimals.php';//    
                 
              }

              protected function read()
              
              {
                      try {       
                          
                              $servicesRrepository = new ServicesRepository();
                             $services = $servicesRrepository->read();
                              
                              $this->render('/Admin/Services/read', [
                                  
                                  'read' => $services
                                  
                                   ] );
       
                           

                      } catch(\Exception $e ) {
                          $this->render('errors/errors', [
                              'errors' => $e->getMessage()
  
                          ]);


                      }   
                 
              }

              protected function readVisiteur()
              
              {
                      try {       
                          
                              $servicesRrepository = new ServicesRepository();
                             $services = $servicesRrepository->read();
                              
                              $this->render('Services', [
                                  
                                  'service' => $services
                                  
                                   ] );
       
                           

                      } catch(\Exception $e ) {
                          $this->render('errors/errors', [
                              'errors' => $e->getMessage()
  
                          ]);


                      }   
                 
              }

              protected function delete()
              
              {
                      try {       

                          if(isset($_GET['suprimer'])){
                              $id = $_GET['suprimer'];
                              $servicesRrepository = new ServicesRepository();
                              $delete = $servicesRrepository->deleteRace($id);
                          }
                          
                              $this->render('/Admin/Services/read', [

                                  'read' => $delete
                                  
                                   ] );
       
                           

                      } catch(\Exception $e ) {
                          $this->render('errors/errors', [
                              'errors' => $e->getMessage()
  
                          ]);


                      }   
                 
              }
              

              protected function update()
              
              {
                      try {       

                          if(isset($_GET['modify'])){
                              $id = $_GET['modify'];
                              $servicesRrepository = new ServicesRepository();
                              $servicesRrepository->updateRace($id);

                              $this->render('/Admin/Services/read', [

                                  //'read' => $read
                        
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


