<?php
function inputCheck ($int)
{
  if (preg_match("/^[+-]?[0-9]+[.]?([0-9]+)?$/", $int))
  {
      return 0;
  }
  return 1;
}

function inputCheckIntForArrayValue ($array)
{
  $count = 0;
  foreach ($array as $key => $value) {
    if (strlen($value) == 0) {                          //если элемент массива не определен (первая загрузка) или не задан пользователем
      echo "<p>Заполните значение коэффициента ".$key.", пожалуйста.<p>";
      return true;
    }
    elseif (inputCheck ($value)) {
      echo "<p>Не корректное значение коэффициента ".$key.", вводите только числа, пожалуйста.";
      return true;
    }
    $count ++;
    if ($count == 12) {
      return false;
    }
  }
}

function is_userInputDataForCrossinglines ($array){
  $count = count($array);
  if ($count < 13) {
    return true;
  }
  else return false;
}



 ?>
