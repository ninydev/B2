<?php
function insertSort ($array)
{
  for ($i = 1; $i < count($array); $i++)
  {
      $x = $array[$i];
      for ($j = $i - 1; $j >= 0 && $array[$j] > $x; $j--)
  		{
        /* сдвигаем элементы вправо, пока выполняется условие
           $array[$j] > $array[$i] */
        $array[$j + 1] = $array[$j];
      }
      // на оставшееся после сдвига место, ставим $array[$i]
      $array[$j + 1] = $x;
  }
  return $array;
}
