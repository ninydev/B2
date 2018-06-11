<?php

//*-----------------------------------------------------------------------------
// Создание базового меню
function createAdminMenu (){
  $res[0]['url'] = '?controller=ninydevMenu';
  $res[0]['text'] = 'Управление меню';

//  $res[1]['url'] = '/';
//  $res[2]['text'] = 'Добавить элемент';
  return $res;
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
