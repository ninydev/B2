<?php
/**
 *
 * @link
 */


 class Neantherhalensis {
   public $height;// 165 см
   public $averagelifeexpectancy;//средний возраст жизни  22.9 лет
   public $skull;// объем черепа 1400-1740 см3
   public $puberty; //половая зрелость 8-10 лет
   public $progenitors;//представители рода макс 60 лет
   static $hands = 2;// кол-во рук
   static $Legs = 2;// кол-во ног
   static $Neantherhalensis;


   function __evolution () {
     echo "<p>Try Evolution Neantherhalensis.</p>";
     if (self::$Legs == 2) {
       self::$Legs = 2;
       echo '<p>Evolution ';
       self::$Neantherhalensis = rand(600000,40000);
       echo self::$Neantherhalensis . '</p>';
       return true;
     } else {
       echo '<p>NoEvolution </p>';
       return false;
     }
   }

   public function __averagelifeexpectancy() {
     echo "<p>averagelifeexpectancy Neantherhalensis.</p>";
     if ($this->averagelifeexpectancy=22) {
         echo 'средний возраст жизни найден,<br/>';
         return true;
     } else {
         echo '<p>Noaveragelifeexpectancy </p>';
         return false;
     }
   }

   public function __skul (){
     echo '<p> определен объем черепа</p>';
     if ($this->skull = 1740) {

       echo '<p>достигнут максимальный уровень развития </p> ';
       $this->skull = rand(1400,1740);
       echo $this->skull . '</p>';
       return true;
     } else {
       echo '<p>придется подождать ещё 100 тыс.лет. </p>';
       return false;
     }
   }


   function setaveragelifeexpectancy ($averagelifeexpectancy) {
     $this->averagelifeexpectancy = $averagelifeexpectancy;
   }
   function getaveragelifeexpectancy (){
     return $this->averagelifeexpectancy;
   }
 } // End Class
