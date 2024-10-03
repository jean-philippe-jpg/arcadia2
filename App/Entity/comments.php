<?php

namespace App\Entity;




class Comments 
{

protected int $id ;
protected string $pseudo ;
protected string $message;




public function getMessage(): string
{
return $this->message;

}


public function setMessage($message)
{
$this->message = $message;

return $this;
}


public function getPseudo(): string
{
return $this->pseudo;
}


public function setPseudo($pseudo)
{
$this->pseudo = $pseudo;

return $this;
}


public function getId(): int
{
return $this->id;
}


public function setId($id)
{
$this->id = $id;

return $this;
}
}