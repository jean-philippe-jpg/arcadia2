<?php
namespace App\Entity;

  
class Habitats extends Attributs
{

//public array $animals_list = [];


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

public function getAnimals()
{

return $this->animal;

}


public function getAnimal_id()
{
return $this->id;
}




 
public function getRace(): string
{
return $this->name;
}

public function getPhoto(): string
{
return $this->photo;
}



/*public function getState()
{
return $this->state;
}




/*public function getAvis_id(): int
{
return $this->avis_id;
}*/

}