<?php 
require_once('../connections/connection.php');
?>
<select id="esfiltro" name="esfiltro" onChange="reloadpagefilter()" style="width:50px;">
	<option value="666" disabled>filtro...</option>
    <option value="99" <?php if($optesfilter == 99){echo " selected";}?>>Todos</option>
    <option value="1" <?php if($optesfilter == 1){echo " selected";}?>>Abierto</option>
    <option value="0" <?php if($optesfilter == 0){echo " selected";}?>>Cerrado</option>
</select>