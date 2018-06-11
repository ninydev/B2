<?php
function serchByHalf ($array, $value)  //$array массив для поиска, $value искомое значение
{
  $indexMax = count($array);     //верхний предел для поиска
  $indexMin = 0;                //нижний предел для поиска

  if ($indexMax == 0)           //если в массиве 0 элеметов
  {
    echo "Массив пуст"."<br>";
    return false;
  }
  else
  {
    $count = serchByHalfRecursion ($array, $indexMin, $indexMax, $value);
    return $count;
  }
}

function serchByHalfRecursion ($array, $indexMin, $indexMax, $value)
{
  $count = 0;                                                  //счетчик обнаруженных искомых значений
  $index = $indexMin + round(($indexMax - $indexMin)/2);       //индекс среднего элемента массива
  /*
  echo 'IndexMax ='."$indexMax".'<br>';
  echo 'IndexMin ='."$indexMin".'<br>';
  echo 'Index ='."$index".'<br>';
  */
  if ($indexMin == $indexMax)                                  //Если нижний предел поиска равен верхнему
  {
    echo "Nothing finded"."<br>";
    return $count;
  }
  if ($index == $indexMin or $index == $indexMax)
  {
    if ($array[$indexMin] == $value)
    {
      $count++;
      if ($array[$indexMax] == $value)
      {
        $count++;
      }
    }
    return $count;
  }
  if ($indexMax < $indexMin)
  {
    echo '$indexMax < $indexMin';
    return 0;
  }
  if ($array[$index] == $value)                                 //если средний элемент в пределах поиска равен искомому значению...
  {
    $count++;                                                   //увеличиваем счетчик
    $index1 = $index - 1;
    while ($array[$index1] == $value)                           //проверяем элементы слева от найденного среднего элемента массива
    {
      $count++;
      $index1--;
    }
    $index1 = $index + 1;
    while ($array[$index1] == $value)                          //проверяем элементы справа от найденного среднего элемента массива
    {
      $count++;
      $index1++;
    }
    return $count;                                              //возвращаем значение счетчика, выходим
  }
  else                                                          // если средний элемент в пределах поиска НЕ равен искомому значению
  {
    if ($array[$index] > $value)                                // Искомое значение меньше текущего среднего элемента?
    {
      $count = serchByHalfRecursion ($array, $indexMin, $index, $value);  //функция вызывает сама себя
      return $count;
    }
    else                                                         // Искомое значение больше текущего среднего элемента?
    {
      $count = serchByHalfRecursion ($array, $index, $indexMax, $value); //функция вызывает сама себя
      return $count;
    }
  }

}


 ?>
