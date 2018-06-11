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

include_once 'footer.lib.php';
 ?>
