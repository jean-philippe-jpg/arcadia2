<?php

namespace App\Entity;




class Habitats extends Attributs
{

public function getId(): int
{
      return $this->id;
}



public function getName(): string
{     $hab = ucwords($this->name);
      return $hab;
      //return $this->name;
}



public function getDescription(): string
{
      return $this->description;
}


/*public function getAnimalsList(): array
{

      return $this->animals_list = [];
}*/





public function getAnimal_id()
{
return $this->id;
}




 
public function getRace(): string
{
return $this->name;
}



/*public function getState()
{
return $this->state;
}




/*public function getAvis_id(): int
{
return $this->avis_id;
}*/




public function getName_animals()
{
return $this->animal;
}


/*public function getImg_hab()
{
return $this->img_hab;
}*/


}