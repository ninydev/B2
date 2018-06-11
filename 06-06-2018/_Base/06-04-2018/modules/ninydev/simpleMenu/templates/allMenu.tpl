
<ul>
<?php

foreach ($data as $key => $value) {
   echo '<li>'. $key . ' ' .  $value ['url'] . ' ' .  $value ['text'];
   echo '<a href="'  .$_SERVER['PHP_SELF'] .
   '?controller=ninydevMenu'.
   '&action=menuEditElement'.
   '&id='. $key .'"> редактировать </a>';
   echo '<a href="'  .$_SERVER['PHP_SELF'] . '?controller=ninydevMenu&action=menuDeleteElement&id='. $key .'"> удалить </a>';

   echo '</li>' . PHP_EOL;
}


/*
for ($i = 1; $i < sizeof($data); $i++){
    echo '<li>';
    echo getMenuElement ($data[$i]);
    echo '</li>';
}
*/
?>


</ul>
