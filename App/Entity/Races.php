<?php

namespace App\Entity;




class Races extends Attributs
{



public function getId(): int
{
      return $this->id;
}


public function getName():string
{
      return $this->name;
}
 


public function setName($name)
{
      
      $this->name = $name;
}

}