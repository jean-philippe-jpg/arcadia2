<?php

namespace App\Entity;




class Habitats 
{

protected int $id ;
protected string $name_habitat ;
protected  string $description ;
protected string $name ;
protected int $animal_id ;
protected string $race_name ;
protected string $state ;
protected int $avis_id ;



public function getId(): int
{
      return $this->id;
}

public function setId(int $id)
{
     $this->id = $id;
}

public function getName(): string
{
      return $this->name_habitat;
}

public function setName(string $name_habitat)
{
     $this->name_habitat = $name_habitat;
}

public function getDescription(): string
{
      return $this->description;
}

public function setDescription(string $description)
{
     $this->description = $description;
}

public function getAnimalsList(): string
{

      return $this->name;
}

public function setAnimalsList( $name)
{
     $this->name = $name;
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
return $this->race_name;
}


public function setRace($race)
{
$this->race_name = $race;

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
}