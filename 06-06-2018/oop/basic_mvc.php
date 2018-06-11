<?php

/**
 * Описываем все возможные операции с данными
 * для нашего модуля
 */
class basicModel {
  public function loadData (){
  }
  public function saveData (){
  }

}


/**
 * Собиарем все варианты вывода
 */
class basicView {
  public function render ($data,$tpl = 'dump'){
    var_dump ($data);
  }
}

/**
 * Описываем все управляющие конструкции
 */
class basicController {
  protected $model;
  protected $view;
  public $name;

// Конструктор
  public function __construct ($name){
    // описываем обязательные при запуске операции
    $this->model = new basicModel();
    $this->view = new basicView();
    $this->name = $name;
  }

  public function echoMenu (){
    $this->view->render($this->name);
  }

}

$a = new basicController ('Главное меню');
$a->echoMenu ();
$a = new basicController ('Боковое меню');
$a->echoMenu ();
$a = new basicController ('Пользовательское меню');
$a->echoMenu ();
