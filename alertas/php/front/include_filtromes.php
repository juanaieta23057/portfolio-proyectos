<?php 
require_once('../connections/connection.php');
?>
<select id="mefiltro" name="mefiltro" onChange="reloadpagefilter()" style="width:60px;">
	<option value="666" disabled>filtro...</option>
    <option value="0" <?php if($optmefilter == ""){echo " selected";}?>>Todos</option>
    <?php
    $sqlcontactosquery = "SELECT * FROM meses ORDER BY idmes";
    $stmt = $pdo->query($sqlcontactosquery);
    while($cut = $stmt->fetch()){
    ?>
    <option value="<?php echo htmlspecialchars($cut["mes"]); ?>"<?php if($optmefilter == $cut["mes"]){echo " selected";}?>><?php echo htmlspecialchars($cut["mes"]); ?></option>
    <?php 
    }
    ?>
</select>