<?php
echo '<table>';
$key = array_keys ($data[0]);
echo '<thead><tr>';
for ($i = 0; $i < sizeof ($key); $i++){
  echo '<td>' . $key [$i] . '</td>';
}
echo '</tr></thead><tbody>';
for ($i = 0; $i < sizeof($data); $i++){
  $row = $data [$i];
  echo '<tr>';
  foreach ($row as $key => $value) {
     echo '<td>' . $value . '</td>' . PHP_EOL;
  }
  echo '</tr>' . PHP_EOL  . PHP_EOL;
}
echo '</tbody></table>';
