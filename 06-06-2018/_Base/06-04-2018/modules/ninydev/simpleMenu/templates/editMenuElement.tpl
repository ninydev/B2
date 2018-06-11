
<form action="<?=$_SERVER['PHP_SELF']?>" method="get">
  <input type="hidden" name="controller" value="ninydevMenu" />
  <input type="hidden" name="action" value="editMenuElementSave" />
  <input type="hidden" name="id" value="<?=$data['id']?>" />
  <label>Url</label><input type="text" name="url" value="<?=$data['url']?>" /><br />
  <label>Text</label><input type="text" name="text" value="<?=$data['text']?>" /><br />
  <input type="submit" name="doMenuUpdate" />

</form>
В дальнейшем - переписать на любое количество данных

<?php
