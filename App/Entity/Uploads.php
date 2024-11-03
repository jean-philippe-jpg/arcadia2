<?php

namespace App\Entity;




class Uploads 
{

protected int $id ;
protected string $libele ;
protected int $habitat_id ;


public function getId(): int
{
      return $this->id;
}

public function setId(int $id)
{
     $this->id = $id;
}




public function getLibele()
{
return $this->libele;
}


public function setLibele($libele)
{
$this->libele = $libele;

return $this;
}


public function getHabitat_id()
{
return $this->habitat_id;
}


public function setHabitat_id($habitat_id)
{
$this->habitat_id = $habitat_id;

return $this;
}
}