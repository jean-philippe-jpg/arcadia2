<?php

namespace App\Entity;
class Habitat
{

protected int $id;
protected string $name;
protected string $description;
protected int $animals_list;

public function getId():string
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

public function getDescription():string
{
      return $this->description;
}

public function setDdescription(string $description)
{
     $this->description = $description;
}

public function getAnimals_list():string
{
      return $this->animals_list;
}

public function setAnimals_list(int $animals_list)
{
       $this->animals_list = $animals_list;
}


}