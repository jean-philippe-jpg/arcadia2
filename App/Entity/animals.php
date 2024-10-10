<?php

namespace App\Entity;
class Animals
{

protected int $id ;
protected string $first_name ;
protected string $namerace ;
protected string $home ;
protected string $state;
protected string $nourriture;
protected float $quantitee;
protected string $date;



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


public function getNourriture(): string
{
return $this->nourriture;
}


public function setNourriture(string $nourriture)
{
$this->nourriture = $nourriture;

return $this;
}


public function getQuantitee()
{
return $this->quantitee;
}


public function setQuantitee($quantitee)
{
$this->quantitee = $quantitee;

return $this;
}

 
public function getDate_heure(): string
{
return $this->date;
}


public function setDate_heure($date)
{
$this->date = $date;

return $this;
}
}