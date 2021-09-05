<?php


class  Person {

   public $prenom = "LUC";
   private $age = 9;
   
   public function sePresenter(){
        return ' Mon nom est Julie ' . $this->prenom .' j\'ai ' .$this->age .'ans';

       // $this->dormir();
    }

    public function manger() {
       return $this->dormir();
    }

    private function dormir() {
        echo "Je dors à 20h";
    }

    public function travailler() {
    }
}



?>