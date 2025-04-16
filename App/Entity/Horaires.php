<?php

namespace App\Entity;




class Horaires
{

protected int $id ;

protected string $ouverture  ;
protected string $fermeture  ;
protected string $jour  ;


public function getId(): int
{
      return $this->id;
}

public function setId(int $id)
{
     $this->id = $id;
}



public function getJour()
{
return $this->jour;
}


public function setJour($jour)
{
$this->jour = $jour;

return $this;
}

public function getOuverture(): string
{
       return  $this->ouverture;
}



public function getFermeture()
{
      
            return $this->fermeture ;
}


public function setFermeture($fermeture)
{
$this->fermeture = $fermeture;

return $this;
}
}