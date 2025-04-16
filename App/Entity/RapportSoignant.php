<?php

namespace App\Entity;




class RapportSoignant extends Attributs
{




public function getId(): int
{
      return $this->id;
}


public function getNourriture()
{
return $this->nourriture;
}



public function getQuantitee(): int
{
return $this->quantitee;
}



public function getDate()
{
return $this->date;
}


}