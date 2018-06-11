<?php
   include_once 'index.php';
?>
<form action="sort.php"  method="GET">
  <p><b>Сортировка массива.</b></p>
  <p><b>Введите данные:</b></p>
  <p>Минимальное значение случайного элемента:
  <input type="text" name="min"></p>
  <p>Максимальное значение случайного элемента:
  <input type="text" name="max"></p>
  <p>Количество элементов:
  <input type="text" name="nomber"></p>
  <input type="submit" name="button" value="Send">
</form>

<?php
include_once 'sort.lib.php';
include_once 'inputCheck.lib.php';
//echo $_GET['min'];


if (inputCheck ($_GET['min']) or inputCheck ($_GET['max']) or inputCheck ($_GET['nomber']))
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
?>
<table border="1">
  <caption>Массивы</caption>
  <tr>
    <th>Полученный массив:</th>
    <th>Отсортированный массив:</th>
  </tr>
  <tr><td><?php
  echo '<pre>';
  var_dump ($rost);
  echo '</pre>';
?></td><td><?php
  $rost = insertSort ($rost);
  echo '<pre>';
  var_dump ($rost);
  echo '</pre>';
}
?></td></tr>
</table>
<?php
  include_once 'footer.lib.php';
?>
