<?php 
require_once('../connections/connection.php');
?>
<select id="enfiltro" name="enfiltro" onChange="reloadpagefilter()" style="width:50px;">
	<option value="666" disabled>filtro...</option>
    <option value="99" <?php if($optenfilter == 99){echo " selected";}?>>Todos</option>
    <option value="1" <?php if($optenfilter == 1){echo " selected";}?>>SI</option>
    <option value="0" <?php if($optenfilter == 0){echo " selected";}?>>NO</option>
</select>