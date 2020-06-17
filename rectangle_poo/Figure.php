<?php
 abstract class Figure{
      protected $longueur; 

     protected static $unite;

       public function getLongueur(){
        return $this->longueur;
       }

    public function setLongueur($longueur){
       $this->longueur=$longueur;
     }
    public static function getUnite(){
         return self::$unite;
    }
    public static function setUnite($unite){
         self::$unite=$unite;
    }


    public abstract function demiPerimetre();
    public function perimetre(){
      return $this->demiPerimetre()*2;

    }
    public abstract function surface();
    public abstract function diagonale();
}
?>