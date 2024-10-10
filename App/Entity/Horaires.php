<?php

namespace App\Entity;




class Horaires
{

protected int $id ;

protected string $horaires ;


public function getId(): int
{
      return $this->id;
}

public function setId(int $id)
{
     $this->id = $id;
}


public function getHoraires()
{
return $this->horaires;
}


public function setHoraires($horaires)
{
$this->horaires = $horaires;

return $this;
}
}