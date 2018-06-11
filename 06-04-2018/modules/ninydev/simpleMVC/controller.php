<?php

// Пользовательп ришел первый раз
if (!isset($_GET['create']) && !isset($_GET['show'])){
  render ('', 'form.tpl');

// Если пользователь хочет созать вслененную
}elseif(isset($_GET['create']) && isset($_GET['size'])){
  $size = $_GET['size'];

  // Процесс создания вселенной
  if (is_numeric ($size) && $size > 0 ){
    $data = createData ($size);
    $res = saveData ($data);
    // Обработка ошибки в процессе сохранения вселенной
    if ($res['error_status']){
      render ($res, 'error.tpl');
    }else{
      render ($res, 'msg.tpl');
    }
    render ($data, 'vardump.tpl');

  // Обработка ошибки из-за размера вселенной
  }else{
    $outData['error_msg'] = ' Не верный размер вселенной. Повторите ввод';
    render ($outData, 'error.tpl');
    $outData ['size'] = $size ;
    render ($outData, 'form.tpl');
  }

// Пользователь хочет отобразить вселенную
}elseif (isset($_GET['show'])){
  $outData = loadData ();
  render ($outData, 'vardump.tpl');
  render ($outData, 'dataforeach.tpl');
  render ($outData, 'ulli.tpl');
  render ($outData, 'table.tpl');

// Вообще не понятно, что происходит
// Похоже на взлом
}else {
  $outData['error_msg'] = ' Вообще не понял что нужно делать';
  render ($outData, 'error.tpl');
}


echo '<hr>';
render ('', 'form.tpl');
