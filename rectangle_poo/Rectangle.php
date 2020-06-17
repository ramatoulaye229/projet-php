<?php

  class Rectangle extends Figure{
 
            private $largeur; 

              public  function __construct($longueur=null,$largeur=null){
                        if($longueur!=null){
                          $this->longueur=$longueur;
                        }
                        if($largeur!=null){
                          $this->largeur=$largeur;
                        }
              }

           
              public function getLargeur(){
                return $this->largeur;
             }

              public function setLargeur($largeur){
                 $this->largeur=$largeur;
              }
                public function demiPerimetre(){
                     return $this->longueur + $this->largeur;
                }
              
                public function surface(){
                  return $this->longueur * $this->largeur;
                }
                public function diagonale(){
                  return sqrt(pow($this->longueur,2)+pow($this->largeur,2));
                }
              
  }

?>