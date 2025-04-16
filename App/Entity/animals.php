<?php

namespace App\Entity;

class Animals extends RapportSoignant
{
      


      

     
public function getId(): int
{
      return $this->id;
}


public function getName():string
{
      return $this->name;
}

public function getRace(): string
{
      return $this->race;
}

public function getHabitat(): string
{
      return $this->hab;
}



     
      public function getState( ) {
      
            return $this->state;
     
}




/*public function setState($state)
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


public function getDate_de_passage()
{
return $this->date_de_passage;
}


public function setDate_de_passage($date_de_passage)
{
$this->date_de_passage = $date_de_passage;

return $this;
}*/


public function getDetail( ) 
{
if($this->detail !== NULL){
return $this->detail;
} else{
return $this->detail = 'aucun detail';
}
}


public function setDetail($detail)
{
$this->detail = $detail;

return $this;
}

 
/*public function getAnimal()
{
return $this->animal;
}


public function setAnimal($animal)
{
$this->animal = $animal;

return $this;
}

public function getImg()
{
return $this->images;
}


public function setImg($images)
{
$this->images = $images;

return $this;
}*/

 


}