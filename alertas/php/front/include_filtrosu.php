<?php 
require_once('../connections/connection.php');
?>
<select id="sufiltro" name="sufiltro" onChange="reloadpagefilter()" style="width:40px;">
	<option value="666" disabled>filtro...</option>
    <option value="0" <?php if($optsufilter == ""){echo " selected";}?>>Todos</option>
    <?php
    $sqlsupervisoresquery = "SELECT supervisor, sup FROM supervisores ORDER BY sup";
    $stmt = $pdo->query($sqlsupervisoresquery);
    while($cut = $stmt->fetch()){
    ?>
    <option value="<?php echo htmlspecialchars($cut["sup"]); ?>"<?php if($optsufilter == $cut["sup"]){echo " selected";}?>><?php echo htmlspecialchars($cut["sup"]); ?></option>
    <?php 
    }
    ?>
</select>