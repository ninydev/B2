<?php
  function is_AandBandCequalZero ($line) {                                      //проверяет не равны ли все коэффициенты одной прямой нулю, и если до то возвращает true
    if ($line['coeffA'] == 0 and $line['coeffB'] == 0 and $line['coeffC'] == 0) {
      return true;
    }
    else {
      return false;
    }
  }

  function is_AandBequalZero ($line) {                                          // проверяет, не являются ли А и В одной прямой равны 0 одновременно, и если "да", то возвращает true
    if ($line['coeffA'] == 0 and $line['coeffB'] == 0) {
      return true;
    }
    else {
      return false;
    }
  }

  function is_matchTwoLines ($line1, $line2){                                   //получает 2 прямые и проверяет совпадают ли они
    if (($line1['coeffA'] * $line2['coeffB']) == ($line1['coeffB'] * $line2['coeffA']) and ($line1['coeffA'] * $line2['coeffC']) == ($line1['coeffC'] * $line2['coeffA'])){
      echo '<p>Прямые '. $line1['lineName'] . ' и ' . $line2['lineName'] . ' совпадают.</p>';
      return 1;
    }
    else {
      return 0;
    }
  }

  function is_parallel ($line1, $line2){                                        //получает две прямые и проверяет параллельны ли они
    if (($line1['coeffA'] * $line2['coeffB']) == ($line1['coeffB'] * $line2['coeffA'])){
      echo '<p>Прямые '. $line1['lineName'] . ' и ' . $line2['lineName'] . ' параллельны.</p>';
      return 1;
    }
    else {
      return 0;
    }
  }


  function crossingDot($line1, $line2){                                         // находит точку пересечения двух прямых или возвращает NULL если такой нет
    if (is_parallel ($line1, $line2)){
      return NULL;
    }
    else {
      if ($line1 ['coeffA'] != 0) {
        $dot['y'] = ($line2['coeffA'] * $line1['coeffC'] - $line1['coeffA'] * $line2['coeffC']) / ($line1['coeffA'] * $line2['coeffB'] - $line2['coeffA'] * $line1['coeffB']);
        $dot['x'] = - ($line1['coeffB'] * $dot['y'] + $line1['coeffC']) / $line1['coeffA'];
        return $dot;
      }
      else {
        $dot['x'] = ($line2['coeffB'] * $line1['coeffC'] - $line1['coeffB'] * $line2['coeffC']) / ($line2['coeffA'] * $line1['coeffB'] - $line2['coeffB'] * $line1['coeffA']);
        $dot['y'] = - ($line1['coeffA'] * $dot['x'] + $line1['coeffC']) / $line1['coeffB'];
        return $dot;
      }
    }
  }

  function triangleSquareByDots($dotA, $dotB, $dotC){                           //Находит площадь треугольника по координатам его вершин
    $S = abs((($dotA['x'] - $dotC['x']) * ($dotB['y'] - $dotC['y']) - ($dotB['x'] - $dotC['x']) * ($dotA['y'] - $dotC['y']))/2);
    return $S;
  }

  function lengthOfLinesByDots($dotA, $dotB){                                   //вычисляет длинну отрезка между двумя точками и возвращает её
    $length = sqrt(pow(($dotB['x']-$dotA['x']), 2) + pow(($dotB['y']-$dotA['y']), 2));
    return $length;
  }

  function is_dotBetweenDots($dotB, $dotA1, $dotA2){                            // определяяет, находится ли точка В на прямой между точками А1 и А2 (при условии, что все 3 очки находятся на 1й прямой)

    if ((lengthOfLinesByDots($dotA1, $dotB) + lengthOfLinesByDots($dotA2, $dotB)) == lengthOfLinesByDots($dotA1, $dotA2)){
      return true;
    }
    else {
      return false;
    }
  }
?>
