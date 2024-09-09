<?php

namespace App\Repository;


use App\Entity\Habitats;
use App\Bdd\Mysql;
use App\Tools\StringTools;


class AdminRepository{


    public function findOneById( int $id)
    {
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare("INSERT INTO habitat (name, description, animals_list) VALUES (:name,:description, : animals_list)");
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

}