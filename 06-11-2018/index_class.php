<?php
/**
 *
 * @link
 */


 class Sheep {
   public $l;
   public $name;
   public $color;

   function __construct () {
     echo "<p>Create Sheep.</p>";
   }

   public function __clone () {
     echo "<p>Clone Sheep.</p>";
   }


   function setName ($name) {
     $this->name = $name;
   }
   function getName (){
     return $this->name;
   }
 } // End Class


  class Cows {
    public $l;
    public $name;
    public $color;

    function __construct () {
      echo "<p>Create Cows.</p>";
    }

    public function __clone () {
      echo "<p>Clone Cows.</p>";
    }


    function setName ($name) {
      $this->name = $name;
    }
    function getName (){
      return $this->name;
    }
  } // End Class



 $MySheep = new Sheep ();
 $Dolly = clone $MySheep;



// Fabrika
$globalSC;
function createSheep (){
  GLOBAL $globalSC;
  if ($globalSC < 5){
    $globalSC++;
    return new Sheep();
  } else {
    return new Cows ();
  }
}


for ($i = 0; $i < 100; $i++){
  $nextSheep [$i] = createSheep ();
}
