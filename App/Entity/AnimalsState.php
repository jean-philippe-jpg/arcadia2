<?php

namespace App\Entity;

class AnimalsState extends Attributs {

    
      /*protected int $id ;
      protected int $id_state ;
      protected string $animals_id ;
      protected string $animals_name ;
      protected string $nourriture ;
      protected  int $quantitee ;
      protected string $state;
      protected string $detail;
      protected int $animal;
      protected string $first_name;
      protected string $date;
      protected string $date_de_passage;
      protected string $race;*/
     

public function getId(): int
{
      return $this->id;
}

public function setId(int $id)
{
     $this->id = $id;
}


     
      public function getNourriture():string
      {
            return $this->nourriture;
      }

     
      public function setNourriture($nourriture)
      {
            $this->nourriture = $nourriture;

            return $this;
      }

     
      public function getQuantitee():int
      {
            return $this->quantitee;
      }

     
      public function setQuantitee($quantiteé)
      {
            $this->quantitee = $quantiteé;

            return $this;
      }

     
      public function getState():string
      {
            return $this->state;
      }

     

     
      public function getDetail():string
      {
            return $this->detail;
      }

      
      

     
      public function getAnimal():int
      {
            return $this->animal;
      }

     
      

     
      public function getDate():string
      {
            return $this->date;
      }

     

      
      public function getFirst_name(): string
      {
            return $this->name;
      }

      
      public function setFirst_name($first_name)
      {
            $this->name = $first_name;

            return $this;
      }

       
      public function getRace()
      {
            return $this->race;
      }

     

      
      public function getDate_de_passage()
      {
            return $this->date;
      }

      
      public function setDate_de_passage($date_de_passage)
      {
            $this->date = $date_de_passage;

            return $this;
      }

       
      public function getId_state()
      {
            return $this->id;
      }

      
      public function getAnimals_name()
      {
            return $this->name;
      }

      
      public function setAnimals_name($animals_name)
      {
            $this->name = $animals_name;

            return $this;
      }

      
      public function getAnimals_id()
      {
            return $this->id;
      }

      
      public function setAnimals_id($animals_id)
      {
            $this->id = $animals_id;

            return $this;
      }
}