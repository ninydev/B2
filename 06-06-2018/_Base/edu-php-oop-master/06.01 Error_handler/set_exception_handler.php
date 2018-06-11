<?php
/**
 * Перехват критических ошибок
 *
 * @link http://php.net/manual/ru/function.set-exception-handler.php
 * @package  edu-php-oop
 * @author   Oleksandr Nykytin <keeper@ninydev.com>
 */
 header("Content-type: text/plain");

 function exception_handler($exception)
 {
     echo "Неперехваченное исключение: " , $exception->getMessage(), "\n";
 }

set_exception_handler('exception_handler');

throw new Exception('Неперехваченное исключение');
echo "Не выполнено\n";
