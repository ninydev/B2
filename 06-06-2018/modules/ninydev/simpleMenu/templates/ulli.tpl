<?php
echo '<ol>';
for ($i = 0; $i < sizeof($data); $i++){
  $row = $data [$i];
  echo '<li> ' . '<ul>';
  foreach ($row as $key => $value) {
     echo '<li>' . $key .' => ' . $value . '</li>' . PHP_EOL;
  }
  echo '</ul> </li>' . PHP_EOL  . PHP_EOL;
}
echo '</ol>';
