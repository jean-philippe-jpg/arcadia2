<?php

namespace App\Entity;
class Animals
{

protected int $id ;
protected string $first_name ;
protected  int $race ;
protected int $home ;
protected int $state;



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

public function getHabitat() :int
{
return $this->home;
}

public function setHabitat($habitat)
{
$this->home = $habitat;

return $this;
}


public function getState() : int
{
return $this->state;
}

public function setState($state)
{
$this->state = $state;

return $this;
}
}