<?php
echo ini_get('display_errors') . '<br>';

if (!ini_get('display_errors')) {
    ini_set('display_errors', '1');
}

echo ini_get('display_errors');
?>
