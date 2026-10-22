<?php 
require_once('../connections/connection.php');
?>
<select id="emfiltro" name="emfiltro" onChange="reloadpagefilter()" style="width:70px;">
	<option value="666" disabled>filtro...</option>
    <option value="0" <?php if($optemfilter == ""){echo " selected";}?>>Todos</option>
    <?php
    $sqlcontactosquery = "SELECT DISTINCT empre FROM escuelas_res WHERE complan NOT IN ('Natatorios','Pasquare','GOME','99','88','GOMR') ORDER BY empre";
    $stmt = $pdo->query($sqlcontactosquery);
    while($cut = $stmt->fetch()){
    ?>
    <option value="<?php echo htmlspecialchars($cut["empre"]); ?>"<?php if($optemfilter == $cut["empre"]){echo " selected";}?>><?php echo htmlspecialchars($cut["empre"]); ?></option>
    <?php 
    }
    ?>
</select>