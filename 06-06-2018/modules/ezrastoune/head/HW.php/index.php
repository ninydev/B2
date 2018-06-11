<?php
  include_once 'header.php';
  include_once 'selectForm.html';

  if ($_GET['action'] == "Поиск") {
    include_once 'serch.php';
  }
  if ($_GET['action'] == "Сортировка массива") {
    include_once 'sort.php';
  }
  if ($_GET['action'] == "Пересечение прямых") {
    include_once 'crossingLines.php';
  }
  if ($_GET['action'] == "Массив авто") {
    include_once 'arrayAuto.php';
  }
  if ($_GET['action'] == "Передаём структуру данных") {
    include_once 'json.php';
  }

  if (strlen($_GET['action']) == 0 and strlen($_GET['str']) == 0) {
    include_once 'footer.lib.php';
  }
