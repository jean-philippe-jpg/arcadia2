<?php

namespace App\Entity;




class Habitats 
{

protected int $id ;
protected string $name_habitat ;
protected  string $description ;
protected string $name ;


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


}