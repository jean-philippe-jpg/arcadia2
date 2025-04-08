<?php

//use App\Repository\VetoRepository;
namespace App\Controller;

use App\Entity\Habitats;
use App\Repository\VetoRepository;
use App\Repository\AnimalsRepository;
use App\Repository\HabitatsRepository;
//use App\Repository\VetoRepository;



class VetoController extends Controller{

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
                        //$this->Admin();
                        break;

                        case 'readadmin':
                            //$this->read();
                            $this->Admin();
                            break;

                    case 'animalstate':
                        $this->Admin();
                        break;

                    case 'habitats':
                        $this->readHabitats();
                        $this->createAvisHabitat();
                        break;
                        case 'animals':
                            $this->readAnimals();
                            $this->createAvisAnimal();
                            $this->readSoins();
                            break;

                            case 'soins':
                                //$this->allSoins();
         
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
                            $habitatRrepository = new VetoRepository();
                            $animals_state = $habitatRrepository->findOneById($id);

                            $this->render('/Veto/Show', [

                                'show' => $animals_state,
                                
                                         
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

                            if(!isset($_GET['id'])){
                        $vetoRrepository = new VetoRepository();
                        $vetoRrepository->createStateAnimals();
 
                        $vetoRrepository = new AnimalsRepository();
                        $animals = $vetoRrepository->read();
 
                        $this->render('/Veto/Create', [
                                'animal' => $animals
                                      
                            ] );
                        } else {
                            $id = $_GET['id'];

                            $vetoRrepository = new VetoRepository();
                            $vetoRrepository->createStateAnimals();
                            
                            $vetoRrepository = new AnimalsRepository();
                            $animals = $vetoRrepository->findOneById($id);

                            $this->render('/Veto/Create', [
                                'animals' => $animals
                                      
                            ] );
 
                        }
                        } catch(\Exception $e ) {
                            $this->render('errors/errors', [
                                'errors' => $e->getMessage()
                        
    
                            ]);


                        }
                    
                        // charger l'id d'un element avec le repository//

                        
                            //require_once 'templates/showanimals.php';//    
                   
                }

               

                /*protected function habitats()
                
                {
                        try {     

                            
                       if(isset($_GET['avis_habitat'])){
                            //$habitat = $_GET['avis_habitat'];
                        $habitatRrepository = new HabitatsRepository();
                        $habitat = $habitatRrepository->read(/*$habitat);
 
                        $this->render('/Admin/Veto/Read', [
                                'habitat' => $habitat
                                      
                            ] );

                       }
 
                        } catch(\Exception $e ) {
                            $this->render('errors/errors', [
                                'errors' => $e->getMessage()
    
                            ]);


                        }
                     
                   
                }*/

               

                protected function read()
                
                {
                        try {       

                            if(!isset($_GET['animalslist']) && !isset($_GET['readsoins'])){
                               
                            /*$habitatRrepository = new HabitatsRepository();
                            $habitat = $habitatRrepository->read();
     
                            $this->render('/Admin/Veto/Read', [
                                    'read' => $habitat
                                          
                                ] );*/

                                $vetoRrepository = new VetoRepository();
                                $read = $vetoRrepository->readStateAnimal();
                                $this->render('/Veto/Read', [
                                    
                                    'read' => $read
                                    
                                     ] );
                               
                            } elseif (isset($_GET['animalslist'])){

                                $habitatRrepository = new AnimalsRepository();
                            $habitat = $habitatRrepository->read(/*$habitat*/);
     
                            $this->render('/Veto/Read', [
                                    'animal' => $habitat
                                          
                                ] );


                            } else {

                                    $show = $_GET['readsoins'];
                                $habitatRrepository = new AnimalsRepository();
                            $habitat = $habitatRrepository->readSoins($show);
     
                            $this->render('/Veto/Read', [
                                    'soins' => $habitat
                                          
                                ] );



                            }
                               
                            
                             
 
                        } catch(\Exception $e ) {
                            $this->render('errors/errors', [
                                'errors' => $e->getMessage()
    
                            ]);


                        }   
                   
                }

                protected function Admin()
                
                {
                        try {       
                                if(!isset($_GET['vue'])){
                                    
                                    
                                    $habitatRrepository = new VetoRepository();
                                    $habitat = $habitatRrepository->readStateAnimal();
                           
     
                            $this->render('/Veto/Admin/AnimalsState', [
                                    'animal' => $habitat
                                   
                                          
                                ] );
                                } else {

                                        $vue = $_GET['vue'];
                                       $stateRrepository = new VetoRepository();
                                       $state = $stateRrepository->readStateAdmin($vue);
     
                                    $this->render('/Veto/Admin/AnimalsState', [
                                    'vue' => $state
                                          
                                    ] );    

                                }
                            

 
                        } catch(\Exception $e ) {
                            $this->render('errors/errors', [
                                'errors' => $e->getMessage()
    
                            ]);


                        }   
                   
                }
                protected function readHabitats()
                
                {
                       
                        try {
                              if(!isset($_GET['create'])){
                                $habitatRrepository = new HabitatsRepository();
                                $habitat = $habitatRrepository->read();
                                $this->render('/Veto/AvisHabitats', [
                                    'habitat' => $habitat
                                    
                                     ] );
                                } else {
                                    $id = $_GET['create'];
                                $habitatRrepository = new HabitatsRepository();
                                $habitat = $habitatRrepository->findOneById($id);
                                $this->render('/Veto/AvisHabitats', [
                                    'habitat' => $habitat
                                    
                                     ] );
                                }
                            } catch (\Throwable $e) {
                                $this->render('errors/errors', [
                                    'errors' => $e->getMessage()
        
                                ]);
                              }
                           

                        }   

                        protected function createAvisHabitat()
                
                {
                        try {       
                           
                                    //$create = $_GET['create'];
                                $habitatRrepository = new HabitatsRepository();
                                $habitatRrepository->createAvis();
                                $this->render('/Veto/AvisHabitats', [
                                 
                                    
                                     ] );
    
                            
                           

                        }  catch (\Throwable $e) {
                            $this->render('errors/errors', [
                                'errors' => $e->getMessage()
    
                            ]);
                          } 
                   
                    }
                   
                    protected function readAnimals()
                
                    {
                           
                            try {
                                  if(!isset($_GET['create'])){
                                    $habitatRrepository = new AnimalsRepository();
                                    $habitat = $habitatRrepository->read();
                                    $this->render('/Veto/AvisAnimals', [
                                        'animal' => $habitat
                                        
                                         ] );
                                    } else {
                                        $id = $_GET['create'];
                                    $habitatRrepository = new AnimalsRepository();
                                    $habitat = $habitatRrepository->findOneById($id);
                                    $this->render('/Veto/AvisAnimals', [
                                        'animal' => $habitat
                                        
                                         ] );
                                    }
                                } catch (\Throwable $e) {
                                    $this->render('errors/errors', [
                                        'errors' => $e->getMessage()
            
                                    ]);
                                  }
                               
    
                            }   

                            /*protected function allSoins()
              
              {
                      try {       

                        //if (isset($_GET['readsoins'])){
                               // $id = $_GET['animal_id'];
                          
                              $animalsRrepository = new AnimalsRepository();
                              $animals = $animalsRrepository->readSoins($id);
                              
                              $this->render('/Admin/Veto/Read', [
                                  'soins' => $animals,
                                   
                                   ] );
                              
                           

                      } catch(\Exception $e ) {
                          $this->render('errors/errors', [
                              'errors' => $e->getMessage()
  
                          ]);


                      }   
                 
              }*/

                            
                            protected function readSoins()
                
                            {
                                   
                                    try {


                                                $id = $_GET['id'];
                                          $animalsRepository = new AnimalsRepository();
                                            $animal = $animalsRepository->readSoins($id);
                                            $this->render('/Veto/AvisAnimals', [
                                                //'soins' => $animal
                                                
                                                 ] );
                                        } catch (\Throwable $e) {
                                            $this->render('errors/errors', [
                                                'errors' => $e->getMessage()
                    
                                            ]);
                                          }
                                       
            
                                    }   

                            protected function createAvisAnimal()
                
                                    {
                                         try {       
                                       
                                                //$create = $_GET['create'];
                                            $habitatRrepository = new VetoRepository();
                                            $habitatRrepository->createStateAnimals();
                                            $this->render('/Veto/AvisAnimals', [
                                             
                                                
                                                 ] );
                
                                        
                                       
            
                                    }  catch (\Throwable $e) {
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
                                $habitatRrepository = new VetoRepository();
                                $read = $habitatRrepository->deleteStateAnimals($id);
                            }
                            
                                $this->render('/Veto/read', [

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
                                
                    
                                $habitatRrepository = new VetoRepository();
                                $read = $habitatRrepository->updateStateAnimals($id);

                                $this->render('/Veto/read', [

                                    
                          
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


