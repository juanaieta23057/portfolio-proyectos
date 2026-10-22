<?php 
require_once('../Connections/connection.php');
?>
<select id="gafiltro" name="gafiltro" onChange="reloadpagefilter()" style="width:50px;">
	<option value="666" disabled>filtro...</option>
    <option value="99" <?php if($optgafilter == 99){echo " selected";}?>>Todos</option>
    <option value="1" <?php if($optgafilter == 1){echo " selected";}?>>Sin</option>
    <option value="0" <?php if($optgafilter == 0){echo " selected";}?>>Con</option>
</select>