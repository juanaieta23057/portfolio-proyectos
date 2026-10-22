<?php 
require_once('../connections/connection.php');
?>
<select id="lufiltro" name="lufiltro" onChange="reloadpagefilter()" style="width:50px;">
	<option value="666" disabled>filtro...</option>
    <option value="99" <?php if($optlufilter == 99){echo " selected";}?>>Todos</option>
    <option value="1" <?php if($optlufilter == 1){echo " selected";}?>>Sin</option>
    <option value="0" <?php if($optlufilter == 0){echo " selected";}?>>Con</option>
</select>