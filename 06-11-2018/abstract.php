<?php
/**
 *
 * @link
 */

/**
 *
 */
abstract class OvceZavr
{
  public $l;
  public $name;
  public $color;
  static $roga = 2;
  static $count = 0;

  function setName ($name) {
    $this->name = $name;
  }
  function getName (){
    return $this->name;
  }

  abstract function Bodatca();

  function bebe(){
    echo 'bebe';
  }

}


 final class Sheep extends OvceZavr {

   function __construct () {
     echo "<p>Try Create Sheep.</p>";
   }

   public function __destruct (){
     echo '<p> Умерла овечка</p>';
   }

   function Bodatca(){
     echo '<p> Бадаться рогами</p>';
   }
   function bebe(){
     parent::bebe();
   }

 } // End Class

 echo Sheep::$roga; // :: - правильное обращение
 // echo Sheep->$roga; // ошибка

// $obg = new OvceZavr();
// echo $obg::$roga;



/*

class NeoSheep extends Sheep
{
}
 */
