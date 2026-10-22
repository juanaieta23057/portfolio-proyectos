<?php 
require_once('../connections/connection.php');
?>
<select id="scfiltro" name="scfiltro" onChange="reloadpagefilter()" style="width:50px;">
	<option value="666" disabled>filtro...</option>
    <option value="99" <?php if($optscfilter == 99){echo " selected";}?>>Todos</option>
    <option value="1" <?php if($optscfilter == 1){echo " selected";}?>>SI</option>
    <option value="0" <?php if($optscfilter == 0){echo " selected";}?>>NO</option>
</select>