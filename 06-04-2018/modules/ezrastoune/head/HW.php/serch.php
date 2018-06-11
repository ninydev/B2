<?php
   include_once 'index.php';
 ?>
<form action="serch.php"  method="GET">
  <p><b>Поиск в массиве.</b></p>
  <p><b>Введите данные:</b></p>
  <p>Минимальное значение случайного элемента:
  <input type="text" name="min" value="<?php echo $_GET['min']?>"></p>
  <p>Максимальное значение случайного элемента:
  <input type="text" name="max" value="<?php echo $_GET['max']?>"></p>
  <p>Количество элементов:
  <input type="text" name="nomber" value="<?php echo $_GET['nomber']?>"></p>
  <p>Какое число будем искать?:
  <input type="text" name="value" value="<?php echo $_GET['value']?>"></p>
  <input type="submit" name="button" value="Send">
</form>

<?php
include_once 'sort.lib.php';
include_once 'serch.lib.php';
include_once 'inputCheck.lib.php';

if (inputCheck ($_GET['min']) or inputCheck ($_GET['max']) or inputCheck ($_GET['nomber']) or inputCheck ($_GET['value']))
{
  echo "Вводите только числа, пожалуйста.";
}
elseif ($_GET['max'] < $_GET['min'])    //
{
  $indexMax = $_GET['max'];
  $indexMin = $_GET['min'];
  echo "$indexMax"." < "."$indexMin";
}
else
{
  for ($i = 0; $i < $_GET['nomber']; $i++)
  {
  	$rost [$i] = rand ($_GET['min'],$_GET['max']);
  }
  $rostNew = insertSort ($rost);
  $count = serchByHalf ($rostNew, $_GET['value']);
  echo 'Количество найденных элементов: '."$count".'<br>';
  echo '<table border="1">';
  echo '<caption>Массивы</caption>';
  echo '<tr><th>Полученный массив:</th><th>Отсортированный массив:</th></tr>';
  for ($i=0; $i<=count($rost)-1; $i++){
    echo '<tr>';
    echo '<td align="center">'. $rost [$i] .'</td>';
    if ($_GET['value'] == $rostNew [$i]){
      echo '<td bgcolor="red", align="center">'. $rostNew [$i] .'</td>';
    }
    else {
      echo '<td align="center">'. $rostNew [$i] .'</td>';
    }
    echo '</tr>';
  }
  echo '</table>';
}
include_once 'footer.lib.php';
?>
