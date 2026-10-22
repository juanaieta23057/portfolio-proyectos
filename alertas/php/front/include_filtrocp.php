<?php 
require_once('../connections/connection.php');
?>
<select id="cpfiltro" name="cpfiltro" onChange="reloadpagefilter()" style="width:40px;">
	<option value="666" disabled>filtro...</option>
    <option value="0" <?php if($optcpfilter == ""){echo " selected";}?>>Todos</option>
    <?php
    $sqlcontactosquery = "SELECT DISTINCT complan FROM escuelas_res WHERE complan NOT IN ('Natatorios','Pasquare','GOME','99','88','GOMR') ORDER BY cplet";
    $stmt = $pdo->query($sqlcontactosquery);
    while($cut = $stmt->fetch()){
    ?>
    <option value="<?php echo htmlspecialchars($cut["complan"]); ?>"<?php if($optcpfilter == $cut["complan"]){echo " selected";}?>><?php echo htmlspecialchars($cut["complan"]); ?></option>
    <?php 
    }
    ?>
</select>