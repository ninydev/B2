<?php
/**
 * Namespace
 * Определение пространства имен на примере двух городов Одесса
 * в двух разных странах.
 * Загрузка классов прямым указанием.
 *
 * @link http://php.net/manual/ru/function.spl-autoload-register.php
 *
 * @package IT-Step.BackEnd::PHP('OOP', 'Namespace', 'Autoload')
 * @author  Oleksandr Nykytin <nikitin_a@itstep.org>
 */
namespace Country\USA;

require 'Country/USA/Odessa.php';
require 'Country/Ukraine/Odessa.php';

echo '<h3>Будет создан город, определенный в namespace ' . __NAMESPACE__ .'</h3>';
$cityDef = new Odessa();

echo '<h3>Указать создание города в USA</h3>';
$cityUS = new \Country\USA\Odessa();

echo '<h3>Указать создание города в Ukraine</h3>';
$cityUK = new \Country\Ukraine\Odessa();
