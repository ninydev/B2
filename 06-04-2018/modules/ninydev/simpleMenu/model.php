<?php

//*-----------------------------------------------------------------------------
// Создание базового меню
function createAdminMenu (){

  $res[1]['url'] = 'index_mvc.php?controller=ninydevMenu';
  $res[1]['text'] = 'Управление меню';
  $res[1]['child'] = [2,3];
  $res[1]['parent'] = 0;
//  $res[1]['id'] = 1;

  $res[2]['url'] =  'index_mvc.php?controller=ninydevMenu&action=menuAddElement';
  $res[2]['text'] = 'Добавить элемент';
  $res[2]['child'] = 0;
  $res[2]['parent'] = 1;
//  $res[1]['id'] = 2;

  return $res;
}

function menuAddMenuElementSave ($data){
  $res = loadData ();
  $res[] = $data;
  saveData ($res);
}



//*-----------------------------------------------------------------------------
// часть кода, отвечающая за работу с файлами
function saveData ($data) {
  $str = json_encode($data, JSON_UNESCAPED_UNICODE);
  // Запись в файл
  $writeFile = fopen (dataFile, 'w');

  if (!$writeFile) {
    $res ['error_msg'] = 'Не могу открыть файл ' . dataFile . ' для записи';
    $res ['error_status'] = true;
    return $res;
  }

  fwrite ($writeFile, $str);
  fclose ($writeFile);
  $res ['system_msg'] = 'Вселенная записана в файл ' . dataFile ;
  $res ['error_status'] = false;
  return $res;
}


function loadData (){
  $openFile = fopen(dataFile, "r");
  if (!$openFile) {
//    $ret = createAdminMenu();
    return createAdminMenu();
//    $res ['error_msg'] = 'Не могу открыть файл ' . dataFile . ' для чтения создаю новое меню';
//    $res ['error_status'] = true;
//    return $res;
  }

  $readFile = fread($openFile, filesize(dataFile));
  fclose($openFile);
  // Декодирование строки в массив
  $ret = json_decode($readFile, true);

  return $ret;

}

function modelDelMenu ($id){
  $myMenu = loadData ();
  unset ($myMenu[$id]);
  saveData ($myMenu);
  return true;
}
