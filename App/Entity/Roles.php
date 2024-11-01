<?php 
namespace App\Entity;




class Roles
{

protected int $id ;
protected string $name ;
protected string $user_id ;
protected string $count ;


public function getId(): int
{
      return $this->id;
}

public function setId(int $id)
{
     $this->id = $id;
}

public function getName()
{
return $this->name;
}


public function setName($name)
{
$this->name = $name;

return $this;
}


public function getUser_id()
{
return $this->user_id;
}


public function setUser_id($user_id)
{
$this->user_id = $user_id;

return $this;
}


public function getCount()
{
return $this->count;
}


public function setCount($count)
{
$this->count = $count;

return $this;
}
}