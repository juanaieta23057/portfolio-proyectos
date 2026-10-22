<?php 
// Asegúrate de ajustar la ruta relativa de connection.php según donde se incluya este archivo
require_once('../connections/connection.php');
?>
<select id="cafiltro" name="cafiltro" onChange="reloadpagefilter()" style="width:50px;">
	<option value="666" disabled>filtro...</option>
    <option value="0" <?php if($optcafilter == ""){echo " selected";}?>>Todos</option>
    <?php
    $sqlcontactosquery = "SELECT * FROM alertascats";
    $stmt = $pdo->query($sqlcontactosquery);
    while($cut = $stmt->fetch()){
    ?>
    <option value="<?php echo htmlspecialchars($cut["idcat"]); ?>"<?php if($optcafilter == $cut["idcat"]){echo " selected";}?>><?php echo htmlspecialchars($cut["cat"]); ?></option>
    <?php 
    }
    ?>
</select>