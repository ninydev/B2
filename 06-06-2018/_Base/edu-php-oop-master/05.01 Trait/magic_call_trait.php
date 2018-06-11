<?php
/**
 * Использование магических методов
 *
 *
 * @package  edu-php-oop
 * @author   Oleksandr Nykytin <keeper@ninydev.com>
 */

 trait Call_Helper
 {
     public function __call($name, $args)
     {
       var_dump ($args);
         return $name . ' ' . count($args);
     }
 }

 class Foo
 {
     use Call_Helper;
 }

 $foo = new Foo();
 echo $foo->go(1, 2, 3, 4); // echoes 4
 echo $foo->setMy('1, 2, 3, 4'); // echoes 4
