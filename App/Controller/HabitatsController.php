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
                    //$this->showMore();
                    
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

                            $habitatRrepository = new HabitatsRepository();
                            $habitation = $habitatRrepository->findOneById($id);
                           
                            $this->render('showanimals', [

                                'logement' => $habitation
                                     
                                ] );

                            } elseif(isset($_GET['detailAnimal'])) {  
                                $id = $_GET['detailAnimal'];
                            // afficher le detail de l'element//
                            $habitatRrepository = new HabitatsRepository();
                            $animals = $habitatRrepository->findOneById($id);
                            $this->render('showanimals', [

                                'logement' => $animals,
                                
                                         
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
                        $habitatRrepository = new HabitatsRepository();
                        $habitatRrepository->createHabitat();

                        $uploadsRrepository = new HabitatsRepository();
                         $uploadsRrepository->images();
 
                        $this->render('/Admin/Habitat/create', [
                                
                                      
                            ] );
 
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
                              
                                 $this->render('/Admin/Habitat/read', [
                                     
                                     'habitat' => $read
                                         
                                          ] );     
 
                        } catch(\Exception $e ) {
                            $this->render('errors/errors', [
                                'errors' => $e->getMessage()
    
                            ]);


                        }   
                   
                }

                /*protected function showMore()
                
                {
                        try {       
                            

                            if(isset($_GET['detailAnimal'])) {
                                $id = $_GET['detailAnimal'];

                                $animalsRrepository = new AnimalsRepository();
                                $detail = $animalsRrepository->detail($id);
                              
                                 $this->render('showanimals', [
                                     
                                     'animal' => $detail
                                         
                                          ] );  
                                 
                            }
 
                        } catch(\Exception $e ) {
                            $this->render('errors/errors', [
                                'errors' => $e->getMessage()
    
                            ]);
                        }
                }*/

                protected function readvisiteur()
                
                {
                        try {       
                            
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

                                $this->render('/Admin/Habitat/read', [

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


