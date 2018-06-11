<?php
/**
 * Возможности работы с данными
 */

function createAuto(){
  GLOBAL $bodyColor, $bodyTapy, $bodyDors, $engine ;

	$res = Array (); // Результат нашего человека

  $res ['year'] = rand (YEAR_MIN, YEAR_MAX );
  $res ['weight'] = rand (WEIGHT_MIN, WEIGHT_MAX );
  $res ['height'] = rand (HEIGHT_MIN, HEIGHT_MAX );
  $res ['length'] = rand (LENGTH_MIN, LENGTH_MAX );
  $res ['width'] = rand (WIDTH_MIN, WIDTH_MAX );

  $tmp = rand (0, sizeof($bodyTapy) - 1);
  $res ['bodyType'] = $bodyTapy [$tmp];

  $tmp = rand (0, sizeof($bodyColor) - 1);
  $res ['Описание кузова']['bodyColor'] = $bodyColor [$tmp];

  switch ($res ['bodyType']) {
    case 'купе':
      $res ['Описание кузова']['bodyDors'] = $bodyDors ['0'];
    case 'кабриолет':
      $tmp = rand (0, 1);
      $res ['Описание кузова']['bodyDors'] = $bodyDors [$tmp];
    case 'седан':
      $res ['Описание кузова']['bodyDors'] = $bodyDors ['1'];
    case 'хэтчбек' or 'внедорожник':
      $tmp = rand (2, 3);
      $res ['Описание кузова']['bodyDors'] = $bodyDors [$tmp];
    case 'универсал':
      $res ['Описание кузова']['bodyDors'] = $bodyDors ['3'];
  }

  $tmp = rand (0, sizeof($engine) - 1);
  $res ['engine'] = $engine [$tmp];

  if ($res ['engine'] == 'электродвигатель') {
    $tmp = rand (BATTARYCAPACITY_MIN, BATTARYCAPACITY_MAX);
    $res ['Описание двигателя']['battaryCapasyty'] = $tmp;
  }
  elseif ($res ['engine'] == 'гибрид') {
    $tmp = rand (BATTARYCAPACITY_MIN, BATTARYCAPACITY_MAX);
    $res ['Описание двигателя']['battaryCapasyty'] = $tmp;
    $tmp = rand (ENGINEVOLUME_MIN10, ENGINEVOLUME_MAX10) / 10;
    $res ['Описание двигателя']['engineVolume'] = $tmp;
  }
  else {
    $tmp = rand (ENGINEVOLUME_MIN10, ENGINEVOLUME_MAX10) / 10;
    $res ['Описание двигателя']['engineVolume'] = $tmp;
  }


  return $res;
}
