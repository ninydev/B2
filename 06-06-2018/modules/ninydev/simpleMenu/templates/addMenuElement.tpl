
<form action="<?=$_SERVER['PHP_SELF']?>" method="get">
  <input type="hidden" name="controller" value="ninydevMenu" />
  <input type="hidden" name="action" value="addMenuElementSave" />
  <label>Url</label><input type="text" name="url" value="" /><br />
  <label>Text</label><input type="text" name="text" value="" /><br />
  <input type="submit" name="doSave" />

</form>
<?php
