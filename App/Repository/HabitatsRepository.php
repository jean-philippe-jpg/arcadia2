<?php

namespace App\Repository;


use App\Entity\Habitats;
use App\Bdd\Mysql;
use App\Tools\StringTools;


class HabitatsRepository{


    public function findOneById( int $id)
    {
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('SELECT * FROM habitat WHERE id = :id');
        $query->bindParam(':id', $id, $pdo::PARAM_INT);
        $query->execute();
        $habitat = $query->fetch($pdo::FETCH_ASSOC);
   

        $habitatEntity = new Habitats();
        
        foreach($habitat as $key => $value){

            $habitatEntity->{'set'.StringTools::toPascaleCase($key) } ($value);
            /*if(method_exists($habitatEntity, $method)){
                $habitatEntity->$method($value);*/
            }

            /*$habitatEntity->{'set' .StringTools::toPascaleCase($key)}($value);*/

        return $habitatEntity;
        
    }




    public function create(string $name, string $description){
       


        if(isset($_POST['insert'])) {

            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();


            $name = $_POST['name'];
            $description = $_POST['description'];
           
            $create = $pdo->prepare('INSERT INTO `habitat`` (`name`, `description`) VALUES (:name, :description)');
            $create->bindParam(":description", $description);
            $create->bindParam(":name", $name);
            $create->execute();
            //$exec = $create->execute(array(':nom' => $name, ':description' => $description));//
           
                if($create->execute()){

                    echo 'nouvell insertion effectué';

                } else {

                    echo 'echeque d\'insertion';
                }



        }
        
   

    }



}