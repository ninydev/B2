<?php
   include_once 'index.php';
 ?>
   <p><b>Задача:</b></p>
   <p>На плоскости расположены 4 прямые заданные пользователем. Определить:
   <ol>
     <li>пересекаются ли все 3 первые из них между собой;</li>
     <li>если да, то найти площать образованного треугольника;</li>
     <li>пересекает ли четвертая прямая этот треугольник;</li>
     <li>если да, то найти точки пересечения и длинну отрезка.</li>
   </ol>

<form action="crossingLines.php" method="GET">
  <p><b>Задайте прямые:</b></p>
  <p>Прямая 1</p>
  <p>
    <input type="text" size=1 name="A1" value="<?php echo $_GET['A1']?>">*x +
    <input type="text" size=1 name="B1" value="<?php echo $_GET['B1']?>">*y+
    <input type="text" size=1 name="C1" value="<?php echo $_GET['C1']?>"> = 0;
  </p>
  <p>Прямая 2</p>
  <p>
    <input type="text" size=1 name="A2" value="<?php echo $_GET['A2']?>">*x +
    <input type="text" size=1 name="B2" value="<?php echo $_GET['B2']?>">*y+
    <input type="text" size=1 name="C2" value="<?php echo $_GET['C2']?>"> = 0;
  </p>
  <p>Прямая 3</p>
  <p>
    <input type="text" size=1 name="A3" value="<?php echo $_GET['A3']?>">*x +
    <input type="text" size=1 name="B3" value="<?php echo $_GET['B3']?>">*y+
    <input type="text" size=1 name="C3" value="<?php echo $_GET['C3']?>"> = 0;
  </p>
  <p>Прямая 4</p>
  <p>
    <input type="text" size=1 name="A4" value="<?php echo $_GET['A4']?>">*x +
    <input type="text" size=1 name="B4" value="<?php echo $_GET['B4']?>">*y+
    <input type="text" size=1 name="C4" value="<?php echo $_GET['C4']?>"> = 0;
  </p>
  <input type="submit" name="button" value="Send">
</form>

<?php
  include_once 'crossingLines.lib.php';
  include_once 'inputCheck.lib.php';

  if (is_userInputDataForCrossinglines($_GET)) {                                //Проверяем, ввел ли пользователь все коэффициенты
    echo "<p>Ожидаем корректного ввода данных.<p>";
  }
  elseif (inputCheckIntForArrayValue ($_GET)) {                                 //Все ле введенные коеффициенты являются числами
    echo '<p> Повторите ввод данных, пожалуйста.</p>';
  }
  else {
    $line1 = array('lineName' => 'Прямая 1', 'coeffA' => $_GET['A1'], 'coeffB' => $_GET['B1'], 'coeffC' => $_GET['C1']);  // создаем массивы для всех 4х линий
    $line2 = array('lineName' => 'Прямая 2', 'coeffA' => $_GET['A2'], 'coeffB' => $_GET['B2'], 'coeffC' => $_GET['C2']);
    $line3 = array('lineName' => 'Прямая 3', 'coeffA' => $_GET['A3'], 'coeffB' => $_GET['B3'], 'coeffC' => $_GET['C3']);
    $line4 = array('lineName' => 'Прямая 4', 'coeffA' => $_GET['A4'], 'coeffB' => $_GET['B4'], 'coeffC' => $_GET['C4']);
    if (is_AandBandCequalZero($line1)) {
      echo "<p>Прямая задана не верно. А1 и В1 и С1 не могут быть равны 0 одновременно.</p>";
    }
    elseif (is_AandBandCequalZero($line2)) {
      echo "<p>Прямая задана не верно. А2 и В2 и С2 не могут быть равны 0 одновременно.</p>";
    }
    elseif (is_AandBandCequalZero($line3)) {
      echo "<p>Прямая задана не верно. А3 и В3 и С3 не могут быть равны 0 одновременно.</p>";
    }
    elseif (is_AandBandCequalZero($line4)) {
      echo "<p>Прямая задана не верно. А4 и В4 и С4 не могут быть равны 0 одновременно.</p>";
    }
    elseif (is_AandBequalZero($line1)) {
      echo "<p>А1 и В1 не могут быть равны 0 одновременно.<br>";
      echo "Иначе выходит, что ".$line1['coeffC']." = 0, что неверно.</p>";
    }
    elseif (is_AandBequalZero($line2)) {
      echo "<p>А2 и В2 не могут быть равны 0 одновременно.<br>";
      echo "Иначе выходит, что ".$line2['coeffC']." = 0, что неверно.</p>";
    }
    elseif (is_AandBequalZero($line3)) {
      echo "<p>А3 и В3 не могут быть равны 0 одновременно.<br>";
      echo "Иначе выходит, что ".$line3['coeffC']." = 0, что неверно.</p>";
    }
    elseif (is_AandBequalZero($line4)) {
      echo "<p>А4 и В4 не могут быть равны 0 одновременно.<br>";
      echo "Иначе выходит, что ".$line4['coeffC']." = 0, что неверно.</p>";
    }
    else {
      if (is_matchTwoLines($line1, $line2) and is_matchTwoLines($line2, $line3)){   //если все первые 3 прямые совпадают
        if (is_matchTwoLines($line1, $line4)){                                      //если все 4 прямые совпадают
          echo '<p>Значит все 4 прямые совпадают.</p>';
        }
        else {
          echo '<p>Значит все первые 3 прямые совпадают.</p>';
          if (is_parallel($line1, $line4)){                                         //иначе, проверим не параллельны ли первые 3 и четвертая прямые
            echo '<p>Значит все первые 3 прямых параллельны 4й прямой.</p>';
          }
          else {                                                                    //первые 3 совпадают, 4я пересекает их в одной точке
            $dotA = crossingDot ($line1, $line4);
            echo '<p>Прямая 4 пересекает первые 3 прямые в точке: ('.$dotA['x'].', '.$dotA['y'].').</p>';
          }
        }
      }
      elseif (is_matchTwoLines($line1, $line2)){                                    //если первые 2 прямые совпадают
        if (is_parallel($line1, $line4) or is_parallel($line1, $line3)){            //если первые 2 совпадают, но не совпадают с 3й, а 3я или 4я параллельна первым двум
          echo "<p>Значит решений нет.</p>";
        }
        elseif (is_matchTwoLines($line1, $line4)){                                  //если первые 2 прямые и 4я совпадают
          $dotA = crossingDot ($line1, $line3);
          echo "<p>Все 4 прямые пересекаются в одной точке: (".$dotA['x'].', '.$dotA['y'].').</p>';
        }
        else
        {
          $dotA = crossingDot ($line1, $line3);
          $dotB = crossingDot ($line1, $line4);
          if ($dotA == $dotB) {
            echo "<p>Все 4 прямые пересекаются в одной точке: (".$dotA['x'].', '.$dotA['y'].').</p>';
          }
          else {
            echo "<p>Прямые 1, 3 и 4 не имеют общей точки персечения, значит решений нет.</p>";
          }
        }
      }
      elseif (is_matchTwoLines($line2, $line3)){                                    //если 2я и 3я прямые совпадают
        if (is_parallel($line2, $line4) or is_parallel($line2, $line1)){            //если 2я и 3я прямые совпадают, но не совпадают с 1й, а 1я или 4я параллельна другим двум
          echo "<p>Значит решений нет.</p>";
        }
        elseif (is_matchTwoLines($line2, $line4)){                                  //если 2я, 3я прямые и 4я совпадают
          $dotA = crossingDot ($line1, $line3);
          echo "<p>Все 4 прямые пересекаются в одной точке: (".$dotA['x'].', '.$dotA['y'].').</p>';
        }
        else{
          $dotA = crossingDot ($line1, $line3);
          $dotB = crossingDot ($line3, $line4);
          if ($dotA == $dotB) {
            echo "<p>Все 4 прямые пересекаются в одной точке: (".$dotA['x'].', '.$dotA['y'].').</p>';
          }
          else {
            echo "<p>Прямые 3, 1 и 4 не имеют общей точки персечения, значит решений нет.</p>";
          }
        }
      }
      elseif (is_matchTwoLines($line1, $line3)){                                    //если 1я и 3я прямые совпадают
        if (is_parallel($line1, $line4) or is_parallel($line2, $line1)){            //если 1я и 3я прямые совпадают, но не совпадают с 2й, а 2я или 4я параллельна другим двум
          echo "<p>Значит решений нет.</p>";
        }
        elseif (is_matchTwoLines($line1, $line4)){                                  //если 1я, 3я прямые и 4я совпадают
          $dotA = crossingDot ($line2, $line3);
          echo "<p>Все 4 прямые пересекаются в одной точке: (".$dotA['x'].', '.$dotA['y'].').</p>';
        }
        else{
          $dotA = crossingDot ($line1, $line2);
          $dotB = crossingDot ($line2, $line4);
          if ($dotA == $dotB) {
            echo "<p>Все 4 прямые пересекаются в одной точке: (".$dotA['x'].', '.$dotA['y'].').</p>';
          }
          else {
            echo "<p>Прямые 1, 2 и 4 не имеют общей точки персечения, значит решений нет.</p>";
          }
        }
      }
      elseif (is_parallel($line1, $line2) and is_parallel($line2, $line3)){                //если все первые 3 прямые параллельны
        echo "<p> Первые три прямые не пересекаются между собой. Решений нет.</p>";
      }
      elseif (is_parallel($line1, $line2) or is_parallel($line2, $line3) or is_parallel($line1, $line3)){       //если две из первых трех прямых параллельны
        echo "<p> Значит первые три прямые не образуют искомый треугольник и не имеют одной общей точки пересечения с 4й прямой. Решений нет.</p>";
      }
      else {
        $dotA = crossingDot ($line1, $line2);
        echo "<p>Прямые 1 и 2 пересекаются в точке А(".round($dotA['x'], 2).', '.round($dotA['y'],2).').<p>';
        $dotB = crossingDot ($line2, $line3);
        echo "<p>Прямые 2 и 3 пересекаются в точке B(".round($dotB['x'],2).', '.round($dotB['y'],2).').<p>';
        $dotC = crossingDot ($line3, $line1);
        echo "<p>Прямые 1 и 3 пересекаются в точке C(".round($dotC['x'],2).', '.round($dotC['y'],2).').<p>';
        $triangleSquare = triangleSquareByDots ($dotA, $dotB, $dotC);
        echo "<p>Площадь искомого треугольника равна: ".round($triangleSquare,2).'.<p>';
        if (is_matchTwoLines($line1, $line4)){                                      //Если прямые 1 и 4 совпадают
          $lengthOfLine = lengthOfLinesByDots ($dotA, $dotC);
          echo '<p>Значит точки пересечения Прямой 4 с искомым треуголником совпадают с точками А и С, а длинна искомого отрезка АС равна:'.round($lengthOfLine,2).'.</p>';
        }
        elseif (is_matchTwoLines($line2, $line4)) {                                 //Если прямые 1 и 4 совпадают
          $lengthOfLine = lengthOfLinesByDots ($dotA, $dotB);
          echo '<p>Значит точки пересечения Прямой 4 с искомым треуголником совпадают с точками A и B, а длинна искомого отрезка AB равна:'.round($lengthOfLine,2).'.</p>';
        }
        elseif (is_matchTwoLines($line3, $line4)) {                                 //Если прямые 1 и 4 совпадают
          $lengthOfLine = lengthOfLinesByDots ($dotB, $dotC);
          echo '<p>Значит точки пересечения Прямой 4 с искомым треуголником совпадают с точками B и С, а длинна искомого отрезка BС равна:'.round($lengthOfLine,2).'.</p>';
        }
        else{                                                                       //Если ни одна из прямых не совпадает с другой, и Прямые 1, 2 и 3 не параллельны.
          $dotD = crossingDot ($line1, $line4);
          if ($dotD != NULL) {
            echo "<p>Прямые 1 и 4 пересекаются в точке D(".round($dotD['x'],2).', '.round($dotD['y'],2).').<p>';
          }
          $dotE = crossingDot ($line2, $line4);
          if ($dotE != NULL) {
            echo "<p>Прямые 2 и 4 пересекаются в точке E(".round($dotE['x'],2).', '.round($dotE['y'],2).').<p>';
          }
          $dotF = crossingDot ($line3, $line4);
          if ($dotF != NULL) {
            echo "<p>Прямые 3 и 4 пересекаются в точке F(".round($dotF['x'],2).', '.round($dotF['y'],2).').<p>';
          }

          if (is_dotBetweenDots($dotD, $dotA, $dotC) and is_dotBetweenDots($dotE, $dotA, $dotB)) {
            $lengthOfLine = lengthOfLinesByDots ($dotD, $dotE);
            echo '<p>Значит Прямая 4 пересекает искомую область в точках D и E, а длинна искомого отрезка DE равна: '.round($lengthOfLine,2).'.</p>';
            echo "<p>P.s.: отображаемые значения округлены до 2х знаков после запятой.</p>";
          }
          elseif (is_dotBetweenDots($dotD, $dotA, $dotC) and is_dotBetweenDots($dotF, $dotC, $dotB)) {
            $lengthOfLine = lengthOfLinesByDots ($dotD, $dotF);
            echo '<p>Значит Прямая 4 пересекает искомую область в точках D и F, а длинна искомого отрезка DF равна: '.round($lengthOfLine,2).'.</p>';
            echo "<p>P.s.: отображаемые значения округлены до 2х знаков после запятой.</p>";
          }
          elseif (is_dotBetweenDots($dotF, $dotB, $dotC) and is_dotBetweenDots($dotE, $dotA, $dotB)) {
            $lengthOfLine = lengthOfLinesByDots ($dotE, $dotF);
            echo '<p>Значит Прямая 4 пересекает искомую область в точках F и E, а длинна искомого отрезка FE равна: '.round($lengthOfLine,2).'.</p>';
            echo "<p>P.s.: отображаемые значения округлены до 2х знаков после запятой.</p>";
          }
          else {
            echo "<p>К сожалению, Прямая 4 не пересекает искомую область... И на кой черт я писал весь этот длинный код?<p>";
            echo "<p>P.s.: отображаемые значения округлены до 2х знаков после запятой.</p>";
          }
        }
      }
    }
  }
  include_once 'footer.lib.php';
?>
