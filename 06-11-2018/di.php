<?php
/**
 *
 * @link
 */


abstract class Sotrudnik {
  abstract function DI ();
  function NP (){
    echo ' / NP - obshie po firme / ';
  }
}

/**
 *
 */
class Receptant extends Sotrudnik
{
  function DI (){
    echo 'DI - posilat ';
  }
}

/**
 *
 */
class Uborchica extends Sotrudnik
{
  function DI (){
    echo 'DI - mesti ';
  }
}


/**
 *
 */
class BOSS extends Sotrudnik
{
  function DI (){
    echo 'DI - dumat o Natashe ';
  }
  function NP (){
    echo ' / NP - svoi normi / ';
  }

}


$babaManya = new Receptant ();
$babaManya->DI();
$babaManya->NP();

echo '<hr />';

$babaTanya = new Uborchica ();
$babaTanya->DI();
$babaTanya->NP();


echo '<hr />';

$b = new BOSS ();
$b->DI();
$b->NP();
