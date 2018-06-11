<?php
include_once 'index.php';
include ('prettyPrint.php'); // Библиотека вывода массивов
echo '<h2> Клиент принял информацию</h2>';
$str = $_GET ['str'];
//$str = utf8_encode ($str);
$arr = json_decode ($str);
pretty_print ($arr);

include_once 'footer.lib.php';
