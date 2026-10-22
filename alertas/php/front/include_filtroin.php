<?php 
require_once('../connections/connection.php');
?>
<select id="infiltro" name="infiltro" onChange="reloadpagefilter()" style="width:40px;">
	<option value="666" disabled>filtro...</option>
    <option value="0" <?php if($optinfilter == ""){echo " selected";}?>>Todos</option>
    <?php
    $sqlinspectoresquery = "SELECT DISTINCT inspector FROM escuelas_res WHERE complan NOT IN ('Natatorios','Pasquare','99','88','GOMR') ORDER BY inspector";
    $stmt = $pdo->query($sqlinspectoresquery);
    while($cut = $stmt->fetch()){
    ?>
    <option value="<?php echo htmlspecialchars($cut["inspector"]); ?>"<?php if($optinfilter == $cut["inspector"]){echo " selected";}?>><?php echo htmlspecialchars($cut["inspector"]); ?></option>
    <?php 
    }
    ?>
</select>