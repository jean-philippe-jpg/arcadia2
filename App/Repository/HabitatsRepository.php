<?php

namespace App\Repository;

use App\Entity\Habitat;

class HabitatsRepository{


    public function findOneById( int $id)
    {
        
        $habitat = ['id' => 1];
        $habitatEntity = new Habitat();
        $habitatEntity->setId($habitat[1]);

        return $habitatEntity;

    }

}