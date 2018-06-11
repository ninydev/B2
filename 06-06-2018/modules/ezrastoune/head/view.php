<?php
/**
 * Допускается все что угодно :)
 * в том числе - html в php и наоборот
 * Но идеально:
 * @link https://www.smarty.net/docsv2/ru/
 * @link https://laravel.com/docs/5.6/blade
 */

function echoHeader ($data){
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?=$data['title']?></title>

    <!-- CSS -->
<?php
  for ($i = 0; $i < sizeof ($data['css']); $i++){
?>
    <link rel="stylesheet" href="<?=$data['css'][$i] ?>" />
<?php
  }
?>

  <!-- JS -->
<?php
  for ($i = 0; $i < sizeof ($data['js']); $i++){
?>
    <script src="<?=$data['js'][$i] ?>"></script>
<?php
  }
?>

<!-- Meta add -->
<?php
// переносим корень дерева
for ($i = 0; $i < sizeof ($data['meta']); $i++){
  $newKoren = $data['meta'][$i];
?>
<!--  <meta name="<?=$data['meta'][$i]['name'] ?>" content="<?=$data['meta'][$i]['val'] ?>" />  -->
  <meta name="<?=$newKoren['name'] ?>" content="<?=$newKoren['val'] ?>" />

<?php
}
?>


  </head>
  <body>
<?php
}
