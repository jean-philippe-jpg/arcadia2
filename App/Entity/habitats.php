<?php

namespace App\Entity;




class Habitats 
{

protected int $id ;
protected string $name ;
protected  string $description ;
protected string $animals_list = 'null';


public function getId(): int
{
      return $this->id;
}

public function setId(int $id)
{
     $this->id = $id;
}

public function getName():string
{
      return $this->name;
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

public function getAnimalsList(): string
{
      return $this->animals_list;
}

public function setAnimalsList(int $animals_list)
{
     $this->animals_list = $animals_list;
}


}