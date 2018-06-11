<?php
include_once 'index.php';
include_once 'configAuto.php'; // Настройки системы
include_once 'modelAuto.php'; // Работа с данными
include_once 'viewAuto.php'; // Работа с отображением
include_once 'prettyPrint.php'; // Библиотека вывода массивов

/**
 * Контроль передачи данных
 */

for ($i=1; $i<5; $i++) {
    $p[$i] = createAuto (); // Создал авто
}
echoAuto ($p); // Отобразил авто

$str = json_encode($p, JSON_UNESCAPED_UNICODE);
echo '<h1> Я подготовил данные к отправке клиенту </h1>';
echo $str . "<br><br><hr>\n";

echo "<a href='get.php?str=" . $str ."'> передать информацию</a>";

include_once 'footer.lib.php';
 ?>
