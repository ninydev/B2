<?php
/**
 * Поручить загрузку классов специальной библиотеке composer
 *
 * @link https://getcomposer.org/doc/01-basic-usage.md#autoloading
 * @link https://it-news.xyz/category/develop/composer-documentation-na-russkom/
 *
 * @package IT-Step.BackEnd::PHP('OOP', 'Namespace', 'Autoload')
 * @author  Oleksandr Nykytin <nikitin_a@itstep.org>
 */
namespace Country\Ukraine;


/**
 * Для правильной работы автозагрузчика, необходимо определить, где искать классы
 * Для этого в файле composer.json мы определяем правило
 *     "psr-4": {
 *       "Country\\": "../Country/"
 *   }
 *
 * @link https://www.php-fig.org/psr/psr-4/
 * @link http://fkn.ktu10.com/?q=node/7221
 */
require_once 'vendor/autoload.php';

echo '<h3>Будет создан город, определенный в namespace ' . __NAMESPACE__ .'</h3>';
$cityDef = new Odessa();

echo '<h3>Указать создание города в USA</h3>';
$cityUS = new \Country\USA\Odessa();

echo '<h3>Указать создание города в Ukraine</h3>';
$cityUK = new \Country\Ukraine\Odessa();
