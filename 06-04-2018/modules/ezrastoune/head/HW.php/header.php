<?php
/**
 * НЕТ HTML Вообще (Controller and Model)
 */
include ('header.lib.php');


$data ['title'] = 'Мои ДЗ';

$css [] = 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css';
$css [] = 'my.css';
  $data ['css'] = $css;

$js[] = 'https://code.jquery.com/jquery-3.3.1.slim.min.js';
$js[] = 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js';
$js[] = 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js';
$js[] = 'my.js';
  $data['js'] = $js;

$meta [0]['name'] = 'autor';
$meta [0]['val'] = 'Roman Tarasenko';
  $data['meta']  = $meta;

echoHeader ($data);

//var_dump ($data);
