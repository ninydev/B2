<?php

//*-----------------------------------------------------------------------------
// часть кода, создающая вселенную
function createOneRecord (){
  $res = Array ();
  $res ['Океанов'] = rand(hmOcean_MIN, hmOcean_MAX);
  $res ['Материков'] = rand (hmMainLand_MIN, hmMainLand_MAX );
  $res ['Сколько лет планете?'] = rand (hmYears_MIN, hmYears_MAX );
  $res ['Население'] = rand (hmYears_MIN, hmYears_MAX );
  return $res;
}

function createData ($size){
  $res = Array ();
  for ($i = 0; $i < $size; $i++){
    $res [$i] = createOneRecord ();
  }
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
    $res ['error_msg'] = 'Не могу открыть файл ' . dataFile . ' для чтения';
    $res ['error_status'] = true;
    return $res;
  }

  $readFile = fread($openFile, filesize(dataFile));
  fclose($openFile);
  // Декодирование строки в массив
  $ret = json_decode($readFile, true);

  return $ret;

}
