<?php 
require_once('../connections/connection.php');
?>
<select id="pppfiltro" name="pppfiltro" onChange="reloadpagefilter()" style="width:50px;">
	<option value="666" disabled>filtro...</option>
    <option value="99" <?php if($optpppfilter == 99){echo " selected";}?>>Todos</option>
    <option value="1" <?php if($optpppfilter == 1){echo " selected";}?>>1ro</option>
    <option value="2" <?php if($optpppfilter == 2){echo " selected";}?>>Act</option>
    <option value="3" <?php if($optpppfilter == 3){echo " selected";}?>>Rep</option>
    <option value="4" <?php if($optpppfilter == 4){echo " selected";}?>>Cerr</option>
</select>