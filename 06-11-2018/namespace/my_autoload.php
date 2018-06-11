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
namespace Country\USA;

/**
 * Определяем функцию, которая выступит в качестве загрузчика
 * и заменит require
 */
 
 spl_autoload_register(
    function ($class) {
		echo '<h1>Try to search 1</h1>';
	}
	);
 
 spl_autoload_register(
    function ($class) {
		echo '<h2>Try to search 2</h2>';
	}
	);
 
 
spl_autoload_register(
    function ($class) {
        echo '<ul class="info"><li> Try find class: ' . $class . '</li>' . PHP_EOL;

        /**
         * Разбираем имя класса и строим путь к файлу
         */
        $pathParts = explode('\\', $class);
        $filePath = implode('/', $pathParts) . '.php';

        echo '<li> Construct path to file: ' . $filePath . '</li>' . PHP_EOL;

        if (is_file($filePath)) {
            include_once $filePath;
            echo '<li class="success"> Class load </li></ul>' . PHP_EOL;
            return true;
        } else {
            echo '<li class="error"> File: ' . $filePath . ' not found.</li></ul>' . PHP_EOL;
            return false;
        }


    }
);


echo '<h3>Будет создан город, определенный в namespace ' . __NAMESPACE__ .'</h3>';
$cityDef = new Odessa();

echo '<h3>Указать создание города в USA</h3>';
$cityUS = new \Country\USA\Odessa();

echo '<h3>Указать создание города в Ukraine</h3>';
$cityUK = new \Country\Ukraine\Odessa();
