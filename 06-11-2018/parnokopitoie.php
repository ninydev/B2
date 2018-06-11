<?php
/**
 *
 * @link
 */


class PK {

  public $l;
  public $name;
  public $color;

  function __construct () {
    echo "<p>Create PK.</p>";
  }

  public function __clone () {
    echo "<p>Clone PK.</p>";
  }


  function setName ($name) {
    $this->name = $name;
  }
  function getName (){ // Metod predka
    return $this->name;
  }


}

/**
 *
 */
class Sheep extends PK
{

  function __construct () {
    echo "<p>Create Sheep.</p>";
    parent::__construct();
  }

  function getName (){ // Metod naslednika
    return '<p>Novi metod - peregrujeni ' . $this->name .   ' </p>';
//    return ' FIO ' . parent::getName(); // Vizval Metod Predka
  }



}

class Cows extends PK
{
  function __construct () {
    echo "<p>Create Cows.</p>";
  }
}



// Fabrika
$globalSC;
function createJiv (){
  GLOBAL $globalSC;
  if ($globalSC < 2){
    $globalSC++;
    return new Sheep();
  } else {
    return new Cows ();
  }
}


for ($i = 0; $i < 4; $i++){
  $nextSheep [$i] = createJiv ();
}

$obj = $nextSheep [0];
$obj->setName ('Dolly');
echo $obj->getName ();

$obj = $nextSheep [3];
$obj->setName ('Murka');
echo $obj->getName ();
