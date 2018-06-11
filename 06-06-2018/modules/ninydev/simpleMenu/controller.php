<?php


function menuContent (){
  if (isset ($_GET['controller']) && ($_GET['controller'] == 'ninydevMenu') ){
    echo 'Выполняю работу контроллера';
    if (!isset ($_GET['action'])){
      menuList ();
    }elseif ($_GET['action'] == 'menuAddElement'){
      menuAddElement ();
    }elseif ($_GET['action'] == 'addMenuElementSave'){
      sendMenuSave ();
    }elseif ($_GET['action'] == 'menuEditElement'){
      sendMenuEdit ($_GET['id']);
    }elseif ($_GET['action'] == 'menuDeleteElement') {
      sendMenuDel($_GET['id']);
    }elseif ($_GET['action'] == 'editMenuElementSave'){
      sendMenuUpdate ($_GET);
    }



  } // окончание меню
}

function sendMenuUpdate ($data){
  $myMenu = loadData ();
  $myMenu[$data['id']]['text'] = $data['text'] ;
  $myMenu[$data['id']]['url'] = $data['url'] ;
  saveData ($myMenu);
  render (loadData(), 'allMenu.tpl');
}

function sendMenuDel ($id){
  echo '<br />проверяем, что мы удаляем';
  modelDelMenu ($id);
  echo '<br /> Элемент удален <br />';
  menuList ();
}

function sendMenuEdit ($id){
  echo 'проверяем, что мы редактируем';
  $myMenu = loadData ();
  $editEl = $myMenu [$id];
  $editEl['id'] = $id;
  render ($editEl, 'editMenuElement.tpl');

}

function sendMenuSave (){
  $data['url'] =  $_GET['url'];
  $data['text'] = $_GET['text'];
  $data['child'] = 0;
  $data['parent'] = 0;

  menuAddMenuElementSave ($data);
}

function menuList (){
  echo 'Сипоск меню всего';
  render (loadData(), 'allMenu.tpl');
}

function menuAddElement (){
  echo 'Работа с добалвением элемента';
  render (loadData(), 'addMenuElement.tpl');

}

function getMenu (){
  return loadData();
}

function echoMenu (){
  render (loadData(), 'menu.tpl');
}



/*
// Пользовательп ришел первый раз
if (!isset($_GET['create']) && !isset($_GET['show'])){
  render ('', 'form.tpl');

// Если пользователь хочет созать вслененную
}elseif(isset($_GET['create']) && isset($_GET['size'])){
  $size = $_GET['size'];

  // Процесс создания вселенной
  if (is_numeric ($size) && $size > 0 ){
    $data = createData ($size);
    $res = saveData ($data);
    // Обработка ошибки в процессе сохранения вселенной
    if ($res['error_status']){
      render ($res, 'error.tpl');
    }else{
      render ($res, 'msg.tpl');
    }
    render ($data, 'vardump.tpl');

  // Обработка ошибки из-за размера вселенной
  }else{
    $outData['error_msg'] = ' Не верный размер вселенной. Повторите ввод';
    render ($outData, 'error.tpl');
    $outData ['size'] = $size ;
    render ($outData, 'form.tpl');
  }

// Пользователь хочет отобразить вселенную
}elseif (isset($_GET['show'])){
  $outData = loadData ();
  render ($outData, 'vardump.tpl');
  render ($outData, 'dataforeach.tpl');
  render ($outData, 'ulli.tpl');
  render ($outData, 'table.tpl');

// Вообще не понятно, что происходит
// Похоже на взлом
}else {
  $outData['error_msg'] = ' Вообще не понял что нужно делать';
  render ($outData, 'error.tpl');
}


echo '<hr>';
render ('', 'form.tpl');
*/
