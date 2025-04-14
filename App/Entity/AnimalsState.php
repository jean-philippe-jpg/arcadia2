<?php

namespace App\Entity;

use DateMalformedIntervalStringException;

class AnimalsState extends Attributs {

    
      
     

public function getId(): int
{
      return $this->id;
}




     
      public function getNourriture():string
      {
            return $this->nourriture;
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

     
      public function getState($state = null)
      {
           if($state == null){
                  return $this->state;
            }
      }

     

     
      public function getDetail($detail = null)
      {
            if($detail == null){
                  return $this->detail;
            }
            
      }

      
      

     
      public function getAnimals():string
      {
            return $this->name;
      }

     
      

     
      public function getDate():string
      {
            return $this->date;
      }

     

      
      public function getFirst_name(): string
      {
            return $this->name;
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