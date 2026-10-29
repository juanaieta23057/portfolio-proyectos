<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//ES" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>Alertas Editar</title>
<?php 
header("Content-Type: text/html;charset=utf-8");
require_once('../connections/connection.php');
$idcaso = $_REQUEST['edit'];
$insPEC = $_REQUEST['inspec'];

$sqlarrcaso = "SELECT * FROM alertas LEFT JOIN escuelas_res ON alertas.idesc = escuelas_res.idres LEFT JOIN supervisores  ON escuelas_res.supervisor = supervisores.supervisor WHERE idalerta = :idcaso";
$stmt = $pdo->prepare($sqlarrcaso);
$stmt->execute([':idcaso' => $idcaso]);
$caso = $stmt->fetch();

$domedif = $caso["domedif"];
$nombre = $caso["noms"];
$situacion = $caso["descripcion"];
$sup = $caso["sup"];
$rn = array('C','i','ii','iii','iv','v','vi','vii','viii','ix','x','xi','xii','xiii','xiv','xv','xvi','xvii','xviii','xix','xx','xxi','xxii','xxiii','xxiv','xxv','xxvi','xxvii','xxviii','xxix','xxx','xxx1');
?>
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/menu.css"/>
<script src="js/jquery-3.6.0.min.js"></script>
<script>
    const month = ["ene","feb","mar","abr","may","jun","jul","ago","sep","oct","nov","dic"];
    const fechaDeManana = () => {
        let hoy = new Date();
        let DIA_EN_MILISEGUNDOS = 24 * 60 * 60 * 1000;
        let f = new Date(hoy.getTime() + DIA_EN_MILISEGUNDOS);
        let manana = f.getDate() + "-" + month[f.getMonth()];
        return manana;
    };
    const fechaDeAyer = () => {
        let hoy = new Date();
        let DIA_EN_MILISEGUNDOS = 24 * 60 * 60 * 1000;
        let f = new Date(hoy.getTime() - DIA_EN_MILISEGUNDOS);
        let ayer = f.getDate() + "-" + month[f.getMonth()];
        return ayer;
    }
    const fechaDeHoy = () => {
        let hoy = new Date();
        let f = new Date(hoy.getTime() - 0);
        let hoyform = f.getDate() + "-" + month[f.getMonth()];
        return hoyform;
    }
     
    function addresponder(responder) {
        $("#txtrespuesta").val(responder+$("#txtrespuesta").val());
    }
    function adddate(offz) {
        let fechaform = "";
        if(offz == 'a'){
            fechaform = fechaDeAyer();
        }
        if(offz == 'h'){
            fechaform = fechaDeHoy();
        }
        if(offz == 'm'){
            fechaform = fechaDeManana(); 
        }
    
        $("#txtrespuesta").val(fechaform + ". "+$("#txtrespuesta").val());
    }

    function removeEnter(idControl){
        var el = $("#" + idControl);
        
        var str = el.val();
        var strSinEnter = str.replace(/(^|[^\.])\r?\n/g, '$1 ');
        var strSinDobleEspacio = strSinEnter.replace(/\s{2,}/g, ' ');
        el.val(strSinDobleEspacio.trim());
    }
</script>
    
</head>
<body> 

<form action="metu.php" method="post" name="carlos">
    <input name="txtcaso" type="hidden" value="<?php echo $idcaso; ?>">
    <input name="txtfecha" id="txtfecha" type="text" value="<?php echo $caso["fecha"]; ?>"><br/>
    <input name="txtdomedifwa" id="txtdomedifwa" type="text" value="<?php echo $caso["domedif"]; ?>" readonly="true"><br/>
    <input name="txtnombrewa" id="txtnombrewa" type="text" value="<?php echo $caso["noms"]; ?>" readonly="true"><br/>
    <select name="txtdomedif" id="txtdomedif" style="width:674px;">

        <?php 
        $sqldistinctdomedif = $pdo->query("SELECT * FROM escuelas_res");

        while($put = $sqldistinctdomedif->fetch(PDO::FETCH_ASSOC)) {
            if($caso["idres"] == $put["idres"]){
                $sel = " selected";
            }else{
                $sel = "";
            }
        ?>
        <option value="<?php echo $put["idres"]; ?>"<?php echo $sel ?>><?php echo str_pad($put["domedif"],47,"_",STR_PAD_RIGHT) . $put["noms"]; ?></option>
        <?php } ?>
    </select><br/>
    <textarea name="txtsituacion" id="txtsituacion" cols="93" rows="10"><?php echo $caso["descripcion"]; ?></textarea><br/>
    <input name="btnremoveenter" id="btnremoveenter" type="button" value="||||||" onClick="removeEnter('txtsituacion');" style="width: 700px;height:10px;"><br/>
    <textarea name="txtrespuesta" id="txtrespuesta" cols="80" rows="10"><?php echo $caso["solucion"]; ?></textarea>
    <input name="btnaddresponder" type="button" value="x A!" onClick="addresponder('x Alerta: ')">
    <input name="btnaddresponder" type="button" value="x inspec" onClick="addresponder('<?php echo $insPEC . ": "; ?>')">
    <input name="btnaddayer" id="btnaddayer" type="button" value="-1" onClick="adddate('a')">
    <input name="btnaddhoy" id="btnaddhoy" type="button" value="=" onClick="adddate('h')">
    <input name="btnaddmanana" id="btnaddmanana" type="button" value="+1" onClick="adddate('m')">
    <br/>
    <input name="btnremoveenter" id="btnremoveenter" type="button" value="||||||" onClick="removeEnter('txtrespuesta');" style="width: 700px;height:10px;">
    <br/>
    <select name="radidcat" id="radidcat">
        <?php 
        // Usamos query() directamente ya que no requiere parámetros externos
        $stmt = $pdo->query("SELECT * FROM alertascats ORDER BY cat");
        
        // Iteramos con fetch() dentro del while
        while($cut = $stmt->fetch()){  
            // Comprobamos si coincide con el valor actual del caso
            $checcat = ($cut["idcat"] == $caso["idcat"]) ? " selected" : ""; 
        ?>
            <option value="<?php echo htmlspecialchars($cut['idcat'], ENT_QUOTES, 'UTF-8'); ?>"<?php echo $checcat; ?>>
                <?php echo htmlspecialchars($cut['cat'], ENT_QUOTES, 'UTF-8'); ?>
            </option>
        <?php 
        } 
        ?>
    </select>
    <table border="0">
        <tr>
        <td>
            <fieldset style="width:130px">
            <legend>enviado</legend>
                <label class="block">
            <?php if($caso["enviado"]== 1){$checenv =  " checked";}else{$checenv =  "";} ?>  
                <input type="radio" name="radenviado" id="radenviado" value="1"<?php echo $checenv; ?>>Si
                    
            <?php if($caso["enviado"]== 0){$checenv =  " checked";}else{$checenv =  "";} ?>
                <input type="radio" name="radenviado" id="radenviado" value="0"<?php echo $checenv; ?>>No
                    
            </label>
            </fieldset>  
        </td>
        <td>
            <fieldset style="width:180px">
            <legend>estado</legend>
            <label class="block">
                <?php if($caso["estatus"]== 1){$checest =  " checked";}else{$checest =  "";} ?>  
                <input type="radio" name="radestatus" id="radestatus" value="1"<?php echo $checest; ?>>Abierto
                <?php if($caso["estatus"]== 0){$checest =  " checked";}else{$checest =  "";} ?>  
                <input type="radio" name="radestatus" id="radestatus" value="0"<?php echo $checest; ?>>Cerrado
            </label>
            </fieldset>
        </td>
        <td>

        </td>
        </tr>
    </table>
	<?php 
    if($caso["suspendio"] == 1){
	   $chk =  " checked";
	}else{
	   $chk =  "";
	}
    
    if($caso["conluz"] == 0){
	   $chkluz =  " checked";
	}else{
	   $chkluz =  "";
	}
    
    if($caso["conagua"] == 0){
	   $chkagua =  " checked";
	}else{
	   $chkagua =  "";
	}
    
    if($caso["congas"] == 0){
	   $chkgas =  " checked";
	}else{
	   $chkgas =  "";
	}
    

	?>
    <label><input name="chksuspension" type="checkbox" value=""<?php echo $chk ?>>Clases suspendidas</label>
    <label><input name="chksinluz" type="checkbox" value=""<?php echo $chkluz ?>>Sin luz</label>
    <label><input name="chksinagua" type="checkbox" value=""<?php echo $chkagua ?>>Sin agua</label>
    <label><input name="chksingas" type="checkbox" value=""<?php echo $chkgas ?>>Sin gas</label>

    
    <input name="btncarlos" type="submit" value="Guardar">
</form>
</body>
</html>