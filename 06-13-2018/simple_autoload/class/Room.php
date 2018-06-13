<?php

class Room {

  public $Walls; // Тут бубут храниться стены
  public $Potolok;

  public $wallCount; // Количество стен

  public function __construct (){
    $this->Walls = $this->do_BuildWalls(); // Процесс осздания стен
    $this->Potolok = $this->do_BuildPotolok(); // Созадть потолок
  }



  public function do_BuildPotolok(){ /// Метод созадния потолка
    return new Potolok();
  } // Процесс созадния потолка окончен



  private function do_BuildWalls (){ // Метод создания стен
    $this->wallCount = rand(wall_min,wall_max);
    for ($i = 0; $i < $this->wallCount; $i++){
      $w [$i] = new Wall();
    }
    return $w;
  }// Процесс создания стен закончен


}// End class
