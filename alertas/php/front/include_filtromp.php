<?php include('Connections/conn.php');
mysqli_set_charset($dbconn,'utf8');
;
?>
<select id="mpfiltro" name="mpfiltro" onChange="reloadpagefilter(document.getElementById('focofiltro').value, document.getElementById('cpfiltro').value, document.getElementById('emprefiltro').value,document.getElementById('mesfiltro').value,document.getElementById('domediffiltro').value,this.value,)" style="width:50px;">
	<option value="666" disabled>filtro...</option>
    <option value="99" <?php if($optmpfilter == 99){echo " selected";}?>>Todos</option>
    <option value="1" <?php if($optmpfilter == 1){echo " selected";}?>>SI</option>
    <option value="0" <?php if($optmpfilter == 0){echo " selected";}?>>NO</option>
<?php 

	?>
</select>