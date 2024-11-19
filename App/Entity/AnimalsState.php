<?php

namespace App\Entity;

class AnimalsState {

    
      protected int $id ;
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
      protected string $race;
     

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

     
      public function setState($state)
      {
            $this->state = $state;

            return $this;
      }

     
      public function getDetail():string
      {
            return $this->detail;
      }

      
      public function setDetail($detail)
      {
            $this->detail = $detail;

            return $this;
      }

     
      public function getAnimal():int
      {
            return $this->animal;
      }

     
      public function setAnimal($animal)
      {
            $this->animal = $animal;

            return $this;
      }

     
      public function getDate():string
      {
            return $this->date;
      }

      public function setDate($date)
      {
            $this->date = $date;

            return $this;
      }

      
      public function getFirst_name(): string
      {
            return $this->first_name;
      }

      
      public function setFirst_name($first_name)
      {
            $this->first_name = $first_name;

            return $this;
      }

       
      public function getRace()
      {
            return $this->race;
      }

      public function setRace($race)
      {
            $this->race = $race;

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
      }

       
      public function getId_state()
      {
            return $this->id_state;
      }

      
      public function setId_state($id_state)
      {
            $this->id_state = $id_state;

            return $this;
      }

       
      public function getAnimals_name()
      {
            return $this->animals_name;
      }

      
      public function setAnimals_name($animals_name)
      {
            $this->animals_name = $animals_name;

            return $this;
      }

      
      public function getAnimals_id()
      {
            return $this->animals_id;
      }

      
      public function setAnimals_id($animals_id)
      {
            $this->animals_id = $animals_id;

            return $this;
      }
}