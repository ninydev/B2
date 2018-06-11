<?php
function getMenuElement ($data){
  $ret = '';
  $ret.= '<a href="' . $data['url'] . '">' . $data['text'] .  ' </a>';
  return $ret;
}
?>

<pre>
  <?php //var_dump($data);
  ?>
</pre>

<nav>
<ul>
<?php

foreach ($data as $key => $value) {
   echo '<li>' . getMenuElement ( $value ). '</li>' . PHP_EOL;
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
</nav>
