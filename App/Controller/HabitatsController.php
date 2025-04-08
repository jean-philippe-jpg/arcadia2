<?php


  namespace App\Controller;

  use App\Repository\HabitatsRepository;
  use App\Entity\Habitats;
  use App\Repository\AnimalsRepository;



class HabitatsController extends Controller{

    public function route(): void {

      try {
        if (isset($_GET['action'])){

            switch($_GET['action']){

                case 'show':
                    $this->show();
                    break;

                    case 'detailAnimal':
                        $this->readvisiteur();

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
                        if(isset($_GET['id'])) {

                            $id = $_GET['id'];
                            // charger l'id d'un element avec le repository//

                            $habitatRrepository = new HabitatsRepository();
                            $habitation = $habitatRrepository->findOneById($id);
                            //$animals = $habitatRrepository->findOneByAnimals($id);

                            $this->render('/Admin/Habitat/show', [

                                'habitat' => $habitation,
                                //'animals' => $animals      
                                ] );

                            } elseif(isset($_GET['detailAnimal'])) {  
                                $id = $_GET['detailAnimal'];
                            // afficher le detail de l'element//
                            $habitatRrepository = new AnimalsRepository();
                            $animal = $habitatRrepository->findOneById($id);
                            
                           
                            $this->render('showanimals', [
                                'animal' => $animal,
                                 

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
                            
                            if(!isset($_GET['photo'])) {
                        $habitatRrepository = new HabitatsRepository();
                        $habitatRrepository->createHabitat();
                        
                        //$uploadsRrepository = new HabitatsRepository();
                        //$uploadsRrepository->images();

                         $this->render('/Admin/Habitat/create', [

                         ] );
 
                        
                            } elseif(isset($_GET['photo'])) {

                            

                             $id = $_GET['id'];
                             
                             $uploadsRrepository = new HabitatsRepository();
                             $uploadsRrepository->images();

                             $uploadsRrepository = new HabitatsRepository();
                             $hab_id = $uploadsRrepository->findOneById($id);

                         $this->render('/Admin/Habitat/create', [
                                    'hab_id' => $hab_id
                                    
                                      
                            ] );
                         }
                        
                        } catch(\Exception $e ) {
                            $this->render('errors/errors', [
                                'errors' => $e->getMessage()
    
                            ]);


                        }
                    }

                       
                protected function read()
                
                {
                        try {       
                            
                                $habitatRrepository = new HabitatsRepository();
                                $read = $habitatRrepository->read();
                                $img = $habitatRrepository->readImages();
                               
                              
                                 $this->render('/Admin/Habitat/read', [
                                     
                                     'habitat' => $read,
                                     'images' => $img
                                         
                                          ] );     
 
                        } catch(\Exception $e ) {
                            $this->render('errors/errors', [
                                'errors' => $e->getMessage()
    
                            ]);


                        }   
                   
                }

                
                protected function readvisiteur()
                
                {
                        try {       

                            //$id = $_GET['id'];
                            
                                $habitatRrepository = new HabitatsRepository();
                                $habitat = $habitatRrepository->read();
    
                                 $this->render('habitats', [
                                    
                                     'habitat' => $habitat
                                         
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
                                $habitatRrepository = new HabitatsRepository();
                                $read = $habitatRrepository->deleteHabitat($id);
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
                               
                                $habitatRrepository = new HabitatsRepository();
                                $read = $habitatRrepository->updateHabitat($id);

                                $this->render('/Admin/Habitat/read' );
                               
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


