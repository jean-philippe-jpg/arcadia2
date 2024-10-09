<?php

namespace App\Entity;
class Animals
{

protected int $id ;
protected string $first_name ;
//protected  int $race ;
protected  string $namerace ;
protected string $home ;
protected string $state;



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

/*public function getRace(): string
{
      return $this->race;
}

public function setRace(string $race)
{
     $this->race = $race;
}*/

public function getHabitat() : string
{
return $this->home;
}

public function setHabitat($habitat)
{
$this->home = $habitat;

return $this;
}


public function getState() : string
{
return $this->state;
}

public function setState($state)
{
$this->state = $state;

return $this;
}


public function getNameRace(): string
{
return $this->namerace;
}


public function setNameRace($namerace)
{
$this->namerace = $namerace;

return $this;
}
}