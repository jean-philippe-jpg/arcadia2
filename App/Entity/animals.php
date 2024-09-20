<?php

namespace App\Entity;
class Animals
{

protected int $id ;
protected string $first_name ;
protected  string $race ;



public function getId(): int
{
      return $this->id;
}

public function setId(int $id)
{
     $this->id = $id;
}

public function getFirstName():string
{
      return $this->first_name;
}

public function setFirstName(string $first_name)
{
     $this->first_name = $first_name;
}

public function getRace(): string
{
      return $this->race;
}

public function setRace(string $race)
{
     $this->race = $race;
}


}