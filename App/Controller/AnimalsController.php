<?php

namespace App\Controller;

use App\Entity\RapportSoignant;
use App\Repository\AnimalsRepository;
use App\Repository\RapportSoignantRepository;



class AnimalsController extends Controller{

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
                  case 'soins':
                    $this->animalSoignant();
                    $this->soins();
                    break;
                  case 'delete':
                     $this->delete();

                  break;
                  case 'update':
                      $this->update();
                     $this->updateSoignant();
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

                          $animalsRrepository = new AnimalsRepository();
                          $animals = $animalsRrepository->findOneById($id);

                          $this->render('/Admin/Animals/show', [

                              'animals' => $animals,
                              
                                       
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
                      $habitatRrepository = new AnimalsRepository();
                      $habitatRrepository->createAnimals();

                      $this->render('/Admin/Animals/create', [
                              
                                    
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
                          
                              $animalsRrepository = new AnimalsRepository();
                             $animals = $animalsRrepository->read();
                              
                              $this->render('/Admin/Animals/read', [
                                  'animal' => $animals
                                  
                                   ] );
       
                           

                      } catch(\Exception $e ) {
                          $this->render('errors/errors', [
                              'errors' => $e->getMessage()
  
                          ]);


                      }   
                 
              }

              protected function animalSoignant()
              
              {
                      try {       

                       
                        
                                if(isset($_GET['id'])){

                                    $id = $_GET['id'];
                                    $animalsRrepository = new AnimalsRepository();
                                    $animals = $animalsRrepository->showAnimalSoignant($id);
                                    
                                   
                                     $this->render('/Admin/Animals/soins', [
                                         'soin' => $animals
                                         
                                          ] );
              
                                  

                                }


                      } catch(\Exception $e ) {
                          $this->render('errors/errors', [
                              'errors' => $e->getMessage()
  
                          ]);


                      }   
                 
              }

              protected function soins()
              
              {
                      try {       
                               
                                    $rapportSoignantRrepository = new RapportSoignantRepository();
                                   $rapportSoignantRrepository->createRapportSoignant();
                                     
                                     $this->render('/Admin/Animals/soins', [
                                        
                                         
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
                              $habitatRrepository = new AnimalsRepository();
                              $read = $habitatRrepository->deleteAnimals($id);
                          }
                          
                              $this->render('/Admin/Habitat/read', [

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
                              $animalsRrepository = new AnimalsRepository();
                              $animalsRrepository->updateAnimals($id);

                              $this->render('/Admin/Animals/read', [

                               
                        
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

              protected function updateSoignant()
              
              {
                      try {       

                          if(isset($_GET['soignant'])){
                              $id = $_GET['soignant'];
                              $animalsRrepository = new AnimalsRepository();
                              $animalsRrepository->updateSoignant($id);

                              $this->render('/Admin/Animals/read', [
                               
                        
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


