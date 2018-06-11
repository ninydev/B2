<?php
for ($i = 0; $i < sizeof($data); $i++){
  $row = $data [$i];
  echo '<p>' . $i . '<br>';
  foreach ($row as $key => $value) {
     echo $key .' => ' . $value . '<br>';
  }
  echo '</p>';
}
