<?php
/**
 *
 * @link
 */


 class Sheep {
   public $l;
   public $name;
   public $color;
   static $roga = 2;
   static $count = 0;


   function __construct () {
     echo "<p>Try Create Sheep.</p>";
     if (self::$count == 0) {
       self::$count = 1;
       echo '<p>Create ';
       self::$roga = rand(0,10000);
       echo self::$roga . '</p>';
       return true;
     } else {
       echo '<p>NoCraete </p>';
       return false;
     }
   }

   public function __clone () {
     echo "<p>Clone Sheep.</p>";
   }

   public function __destruct (){
     echo '<p> Умерла овечка</p>';
   }


   function setName ($name) {
     $this->name = $name;
   }
   function getName (){
     return $this->name;
   }
 } // End Class

 echo Sheep::$roga; // :: - правильное обращение
 // echo Sheep->$roga; // ошибка

 $obg = new Sheep();
 echo $obg::$roga;
 $obj = new Sheep();
 echo $obj::$roga;
 $obf = new Sheep();
 echo $obf::$roga;
