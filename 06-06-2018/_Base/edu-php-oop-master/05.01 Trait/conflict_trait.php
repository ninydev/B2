<?php
/**
 * Разрешение конфликтов
 *
 *
 * @package  edu-php-oop
 * @author   Oleksandr Nykytin <keeper@ninydev.com>
 */

 trait A
 {
     public function smallTalk()
     {
         echo 'a';
     }
     public function bigTalk()
     {
         echo 'A';
     }
 }

trait B
{
    public function smallTalk()
    {
        echo 'b';
    }
    public function bigTalk()
    {
        echo 'B';
    }
}

class Talker
{
    use A, B
     {
        B::smallTalk insteadof A;
        A::bigTalk insteadof B;
    }
}

class Aliased_Talker
{
    use A, B {
        B::smallTalk insteadof A;
        A::bigTalk insteadof B;

//        B::bigTalk as talk;
    }
}

header("Content-type: text/plain");

$tmp = new Aliased_Talker ();
$tmp->smallTalk ();
$tmp->bigTalk ();


class qq
{
    use A, B {
        A::smallTalk insteadof B;
        B::bigTalk insteadof A;

//        B::bigTalk as talk;
    }
}

$tmp = new qq ();
$tmp->smallTalk ();
$tmp->bigTalk ();
