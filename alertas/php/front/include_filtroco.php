<?php 
require_once('../connections/connection.php');
?>
<select id="cofiltro" name="cofiltro" onChange="reloadpagefilter()" style="width:40px;">
	<option value="666" disabled>filtro...</option>
    <option value="0" <?php if($optcofilter == ""){echo " selected";}?>>Todos</option>
    <?php
    $sqlcomsquery = "SELECT DISTINCT com, LPAD(com, 2, '0') AS Leftcom FROM escuelas_res WHERE complan NOT IN ('Natatorios','Pasquare','GOME','99','88','GOMR') ORDER BY Leftcom";
    $stmt = $pdo->query($sqlcomsquery);
    while($cut = $stmt->fetch()){
    ?>
    <option value="<?php echo htmlspecialchars($cut["com"]); ?>"<?php if($optcofilter == $cut["com"]){echo " selected";}?>><?php echo htmlspecialchars($cut["com"]); ?></option>
    <?php 
    }
    ?>
</select>