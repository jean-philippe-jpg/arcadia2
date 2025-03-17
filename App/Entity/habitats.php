<?php

namespace App\Entity;




class Habitats 
{

protected int $id ;
protected  string $description ;
protected string $name ;
protected int $animal_id ;
protected array $animals_list = [] ;
protected string $race_name ;
protected string $race ;
protected string $state ;
protected string $name_animals ;
protected int $avis_id ;
protected int $img_hab ;



public function getId(): int
{
      return $this->id;
}

public function setId(int $id)
{
     $this->id = $id;
}

public function getName(): string
{     $hab = ucwords($this->name);
      return $hab;
      //return $this->name;
}

public function setName(string $name)
{
     $this->name = $name;
}

public function getDescription(): string
{
      return $this->description;
}

public function setDescription(string $description)
{
     $this->description = $description;
}

public function getAnimalsList(): array
{

      return $this->animals_list = [];
}

public function setAnimalsList( $animals_list)
{
     $this->animals_list = $animals_list;
}




public function getAnimal_id()
{
return $this->animal_id;
}


public function setAnimal_id($animal_id)
{
$this->animal_id = $animal_id;

return $this;
}

 
public function getRace(): string
{
return $this->race;
}


public function setRace($race)
{
$this->race = $race;

return $this;
}

 
public function getState()
{
return $this->state;
}


public function setState($state)
{
$this->state = $state;

return $this;
}


public function getAvis_id(): int
{
return $this->avis_id;
}


public function setAvis_id($avis_id)
{
$this->avis_id = $avis_id;

return $this;
}


public function getName_animals()
{
return $this->name_animals;
}


public function setName_animals($name_animals)
{
$this->name_animals = $name_animals;

return $this;
}

 


public function getImg_hab()
{
return $this->img_hab;
}


public function setImg_hab($img_hab)
{
$this->img_hab = $img_hab;

return $this;
}
}