<?php


class RoomB extends Room
{
  public $Balkon;

  function __construct(){
    parent::__construct (); // вызов конструктора предка
    $this->Balkon = $this->do_BuildBalkon ();
  }

  private function do_BuildBalkon(){ /// Метод созадния потолка
    return new Balkon();
  } // Процесс созадния потолка окончен

  public function do_BuildPotolok(){ /// Метод созадния потолка
    echo ' Проверил качество';
    return new Potolok();
  } // Процесс созадния потолка окончен

} // описание класса комната окончено
