<?php

namespace App\Entity;




class RapportSoignant 
{

protected int $id ;
protected string $nourriture ;
protected int $quantitee ;
protected string $date_heure ;


public function getId(): int
{
      return $this->id;
}

public function setId(int $id)
{
     $this->id = $id;
}





public function getNourriture()
{
return $this->nourriture;
}


public function setNourriture($nourriture)
{
$this->nourriture = $nourriture;

return $this;
}


public function getQuantitee(): int
{
return $this->quantitee;
}


public function setQuantitee($quantitee)
{
$this->quantitee = $quantitee;

return $this;
}


public function getDate_heure()
{
return $this->date_heure;
}


public function setDate_heure($date_heure)
{
$this->date_heure = $date_heure;

return $this;
}
}