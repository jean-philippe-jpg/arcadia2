<?php

namespace App\Controller;

use App\Entity\Horaires;
use App\Repository\HorairesRepository;




class HorairesController extends Controller{

  public function route(): void {

    try {
      if (isset($_GET['action'])){

          switch($_GET['action']){

              
                 
              case 'create':

                  $this->create();

                  break;
              case 'read':
                  $this->read();
                 
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

                          $raceRrepository = new HorairesRepository();
                          $race = $raceRrepository->findOneById($id);
                          

                          $this->render('/Admin/Race/show', [

                              'race' => $race,
                              
                                       
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
                      $habitatRrepository = new HorairesRepository();
                      $habitatRrepository->create();

                      $this->render('/Admin/Horaires/create', [
                              
                                    
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
                          
                              $habitatRrepository = new HorairesRepository();
                             $read = $habitatRrepository->read();
                              
                              $this->render('/Admin/Horaires/read', [
                                  
                                  'read' => $read
                                  
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
                              $habitatRrepository = new HorairesRepository();
                              $read = $habitatRrepository->delete($id);
                          }
                          
                              $this->render('/Admin/Horaires/read', [

                                  'read' => $read
                                  
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
                              $habitatRrepository = new HorairesRepository();
                              $read = $habitatRrepository->update($id);

                              $this->render('/Admin/Horaires/read', [

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


