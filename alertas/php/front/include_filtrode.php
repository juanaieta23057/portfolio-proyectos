<?php 
require_once('../connections/connection.php');
?>
<select id="defiltro" name="defiltro" onChange="reloadpagefilter()" style="width:40px;">
	<option value="666" disabled>filtro...</option>
    <option value="0" <?php if($optdefilter == ""){echo " selected";}?>>Todos</option>
    <?php
    $sqldesquery = "SELECT DISTINCT dist, LPAD(dist, 2, '0') AS Leftdist FROM escuelas_res WHERE complan NOT IN ('Natatorios','Pasquare','GOME','99','88','GOMR') ORDER BY Leftdist";
    $stmt = $pdo->query($sqldesquery);
    while($cut = $stmt->fetch()){
    ?>
    <option value="<?php echo htmlspecialchars($cut["dist"]); ?>"<?php if($optdefilter == $cut["dist"]){echo " selected";}?>><?php echo htmlspecialchars($cut["dist"]); ?></option>
    <?php 
    }
    ?>
</select>