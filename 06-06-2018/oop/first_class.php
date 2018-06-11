<?php

/**
 * Базовый синтаксис
 */

$someVar = 'Out fo Class';

class Dog //extends AnotherClass
{

  public $name; // Кличка
  private $a; // Видны только внутри
  protected $b; // Видны только внутри

  public $someVar = 'In Class';

  public function __construct ($name){
    echo 'Создан экземпляр класса ' . __CLASS__ . ' '. $name . ' <br />';
    $this->name = $name;
  }

  public function __destruct  (){
    echo __CLASS__ . $this->name . ' уничтожен'. ' <br />';
  }


  public function getName (){
    return $this->name;
  }
  public function setName ($name){
    $this->name = $name;
  }
  public function echoSomeVar (){
    $someVar = 'In Function';
    // Внутри метода - без ключевого слова this
    // Отрабатывает переменная внутри метода
    echo $someVar . '<br />';

    // Указание ключеового слова $this->
    // переменная указывает на общеклассовую
    echo $this->someVar . '<br />';

    echo $GLOBALS['someVar'];
  }

  private function setA (){
    echo 'work protected function';
  }

}

$myDog = new Dog ('1');
$myDog->getName ();
$myDog = new Dog ('2');
$myDog->getName ();
$myDog = new Dog ('3');
$myDog->getName ();
$myDog = new Dog ('4');
$myDog->getName ();
