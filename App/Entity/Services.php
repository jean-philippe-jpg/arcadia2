<?php

namespace App\Entity;




class Services
{

protected int $id ;
protected string $name ;
protected string $description ;


public function getId(): int
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



public function getDescription()
{
return $this->description;
}


public function setDescription($description)
{
$this->description = $description;

return $this;
}
}