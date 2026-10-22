<?php 
require_once('../connections/connection.php');
?>
<select id="agfiltro" name="agfiltro" onChange="reloadpagefilter()" style="width:50px;">
	<option value="666" disabled>filtro...</option>
    <option value="99" <?php if($optagfilter == 99){echo " selected";}?>>Todos</option>
    <option value="1" <?php if($optagfilter == 1){echo " selected";}?>>Sin</option>
    <option value="0" <?php if($optagfilter == 0){echo " selected";}?>>Con</option>
</select>