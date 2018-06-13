<?php
/**
 * Autoload
 * Оперделение собственного метода поиска и подключения классов
 * на основе структуры страны.
 *
 * @link http://php.net/manual/ru/function.spl-autoload-register.php
 *
 * @package IT-Step.BackEnd::PHP('OOP', 'Namespace', 'Autoload')
 * @author  Oleksandr Nykytin <nikitin_a@itstep.org>
 */



/*
spl_autoload_register(
   function ($class) {
   echo '<h1>Try to search :' . $class . '</h1>';
 }
 );
*/

spl_autoload_register(
   function ($class) {
     // Проверить - существует ли такой файл
     require_once ('class/' . $class . '.php');
 }
 );
