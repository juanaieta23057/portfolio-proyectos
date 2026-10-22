<?php
// Connections/connection.php o la ruta relativa correspondiente
require_once('../connections/connection.php');
include ("include_filtros.php");
$css = array("columna20","columna40","columna60","columna130","columna250","columna350","columna90","columna90","columna60","columna60","columna60","columna60","columna90","columna40","columna40");

// Manejo de paginación por GET de forma segura
$page = isset($_GET['page']) ? (int)$_GET['page'] : 0;
if ($page < 0) {
    $page = 0;
}
$pagesize = 100;
$offset = $page * $pagesize;

// Construcción dinámica de filtros basada en la implementación previa con $sqlfilter
$sqlfilter = isset($sqlfilter) ? $sqlfilter : [];
$params = [];

if (count($sqlfilter) !== 0) {
    $sqlsuffixtemp = " WHERE " . implode(" AND ", $sqlfilter);
    $sqlsuffix = $sqlsuffixtemp;
} else {
    $sqlsuffix = "";
}

// 1. Consulta para obtener el total de registros (con PDO y consultas preparadas si aplican parámetros)
$sqlCountQuery = "SELECT COUNT(DISTINCT idalerta) as total 
FROM alertas 
LEFT JOIN escuelas_res ON alertas.idesc = escuelas_res.idres 
LEFT JOIN supervisores ON escuelas_res.supervisor = supervisores.supervisor" . $sqlsuffix;

$stmtCount = $pdo->prepare($sqlCountQuery);
$stmtCount->execute($params);
$totalRowsData = $stmtCount->fetch();
$rsalertasQlen = $totalRowsData['total'] ?? 0;
$totalpages = ceil($rsalertasQlen / $pagesize);

// 2. Consulta principal aplicando LIMIT y OFFSET de forma segura con PDO (usando interpolación de enteros para LIMIT/OFFSET)
$sqlEscuelasAlertas = "SELECT alertas.*, escuelas_res.complan, escuelas_res.com, escuelas_res.dist, escuelas_res.domedif, escuelas_res.empre, escuelas_res.inspector, supervisores.sup 
FROM alertas 
LEFT JOIN escuelas_res ON alertas.idesc = escuelas_res.idres 
LEFT JOIN supervisores ON escuelas_res.supervisor = supervisores.supervisor" . $sqlsuffix . " 
GROUP BY idalerta 
ORDER BY fecha DESC, idalerta DESC 
LIMIT " . (int)$pagesize . " OFFSET " . (int)$offset;


$stmt = $pdo->prepare($sqlEscuelasAlertas);
$stmt->execute($params);
$escuelasalertas = $stmt->fetchAll();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<?php 
header("Content-Type: text/html;charset=utf-8");
include("include_filtros.php");
?>
<title>Alertas Lista</title>
<link rel="stylesheet" href="css/style.css" />

<script type="text/javascript" src="js/slidereveal.js"></script>
<script type="text/javascript" src="js/funciones.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="css/jquery-ui.min.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/focos.css"/>
<link rel="stylesheet" type="text/css" href="css/prettify.css"/>
<link rel="stylesheet" type="text/css" href="css/menu.css"/>
<style>
#menu-bar{
	background-color: #BDBDBD;
	color: #fff;
	z-index: 1002;
}
#menu-bar ul li{
	inline-size: 20px;
	background-color: #00FF00;
	color: #fff;
	list-style: none;
	display: inline;
	height:20px;
	max-height:20px;
}
.clsmagenta{
	background-color: magenta;
}
</style>
</head>
<body>
<?php /*include('mem.php');*/ $l=0;

echo "<!-- SQL Query: " . $sqlEscuelasAlertas . " -->"; // Para depuración, mostrar la consulta SQL generada

?>
<div class="tablii">
    <div class="<?php echo $css[$l]; $l++; ?>">-</div>
    <div class="<?php echo $css[$l]; $l++; ?>"><p></p></div>
    <div class="<?php echo $css[$l]; $l++; ?>"><?php include ("include_filtroco.php");?></div>
    <div class="<?php echo $css[$l]; $l++; ?>"><?php include ("include_filtromes.php");?></div>
    <div class="<?php echo $css[$l]; $l++; ?>"><?php include ("include_filtrodomedif.php");?></div>
    <div class="<?php echo $css[$l]; $l++; ?>"></div>
    <div class="<?php echo $css[$l]; $l++; ?>"><?php include ("include_filtrocat.php");?></div>
    <div class="<?php echo $css[$l]; $l++; ?>"><?php include ("include_filtroes.php");?></div>
    <div class="<?php echo $css[$l]; $l++; ?>"><?php include ("include_filtrolu.php");?></div>
    <div class="<?php echo $css[$l]; $l++; ?>"><?php include ("include_filtroag.php");?></div>
    <div class="<?php echo $css[$l]; $l++; ?>"><?php include ("include_filtroga.php");?></div>
    <div class="<?php echo $css[$l]; $l++; ?>"><?php include ("include_filtrosu.php");?></div>
    <div class="<?php echo $css[$l]; $l=0; ?>"><p></p></div>
</div>
<div class="tablii">
	<div class="<?php echo $css[$l]; $l++; ?>">-</div>
    <div class="<?php echo $css[$l]; $l++; ?>"><b>ID</b></div>
    <div class="<?php echo $css[$l]; $l++; ?>"><b>COM</b></div>
    <div class="<?php echo $css[$l]; $l++; ?>"><b>FECHA</b></div>
    <div class="<?php echo $css[$l]; $l++; ?>"><b>DOMICILIO</b></div>
    <div class="<?php echo $css[$l]; $l++; ?>"><b>DESCRIPCION</b></div>
    <div class="<?php echo $css[$l]; $l++; ?>"><b>CAT</b> </div>
    <div class="<?php echo $css[$l]; $l++; ?>"><b>ESTATUS</b></div>
    <div class="<?php echo $css[$l]; $l++; ?>"><b>c/Luz</b></div>
    <div class="<?php echo $css[$l]; $l++; ?>"><b>c/Agua</b></div>
    <div class="<?php echo $css[$l]; $l++; ?>"><b>c/Gas</b></div>
    <div class="<?php echo $css[$l]; $l++; ?>"><b>SUP</b></div>
    <div class="<?php echo $css[$l]; $l=0 ?>">
        <a href="#" onClick="reloadxlsfilter()">
            <img src="images/export.png" width="36" height="28">
        </a>
    </div>
</div>
<?php foreach($escuelasalertas as $put){ 

	if($put["estatus"] == 1){
		$estatus = "Abierto";
        $estatusicon = '<img src="images/ok.png" width="20" height="30">';
		$color='#ff7777';
	}else{
		$estatus = "Cerrado";
        $estatusicon = '<img src="images/pending.png" width="20" height="30">';
		$color='#ffffff';
	}
    
	if($put["conluz"] == 1){
		$luz = "SI";
        $luzicon = '<img src="images/luz.png" width="20" height="30">';
		$lcolor='#ff0000';
	}else{
		$luz = "NO";
        $luzicon = '<img src="images/noluz.png" width="20" height="30">';
		$lcolor=$color;
	}
    
	if($put["conagua"] == 1){
		$agua = "SI";
        $aguaicon = '<img src="images/agua.png" width="20" height="30">';
		$acolor='#ff0000';
	}else{
		$agua = "NO";
        $aguaicon = '<img src="images/noagua.png" width="20" height="30">';
		$acolor=$color;
	}
    
	if($put["congas"] == 1){
		$gas = "SI";
        $gasicon = '<img src="images/gas.png" width="20" height="30">';
		$gcolor='#ff0000';
	}else{
		$gas = "NO";
        $gasicon = '<img src="images/nogas.png" width="20" height="30">';
		$gcolor=$color;
	}

    

    
    $inspector = $put["inspector"];
    $comapos = strpos($inspector, ",");
    $ins = substr($inspector, $comapos + 2, 3) . substr($inspector, 0, 3);
	$classcolor = "";
  ?>
<div class="tablii">
	<div class="<?php echo $css[$l] . $classcolor; $l++;?>">-</div>
  	<div class="<?php echo $css[$l] . $classcolor; $l++;?>"><?php echo htmlspecialchars($put["idalerta"]); ?></div>
  	<div class="<?php echo $css[$l] . $classcolor; $l++;?>"><?php echo htmlspecialchars($put["com"]); ?></div>
    <div class="<?php echo $css[$l] . $classcolor; $l++;?>"><?php echo date("d/m/Y", strtotime($put["fecha"])); ?></div>
  	<div class="<?php echo $css[$l] . $classcolor; $l++;?>" title="<?php echo htmlspecialchars($put["domedif"]); ?>"><?php echo htmlspecialchars($put["domedif"]); ?></div>
    <div class="<?php echo $css[$l] . $classcolor; $l++;?>"><?php echo htmlspecialchars($put["descripcion"]); ?></div>
    <div class="<?php echo $css[$l] . $classcolor; $l++;?>"><img src="images/al<?php echo (int)$put["idcat"]; ?>.png" width="20" height="30"></div>
    <div class="<?php echo $css[$l] . $classcolor; $l++;?>"><?php echo $estatusicon; ?></div>
    <div class="<?php echo $css[$l] . $classcolor; $l++;?>"><?php echo $luzicon; ?></div>
    <div class="<?php echo $css[$l] . $classcolor; $l++;?>"><?php echo $aguaicon; ?></div>
    <div class="<?php echo $css[$l] . $classcolor; $l++;?>"><?php echo $gasicon; ?></div>
    <div class="<?php echo $css[$l] . $classcolor; $l++;?>"><?php echo htmlspecialchars($put["sup"]); ?></div>
    <div class="<?php echo $css[$l] . $classcolor; $l=0;;?>"><a href="mete.php?edit=<?php echo urlencode($put["idalerta"]); ?>&inspec=<?php echo urlencode($ins); ?>"><img src="images/edit.png" width="18" height="18"></a></div>
</div>
  <?php } ?>
  <input id="pagefiltro" name="pagefiltro" type="hidden" value="<?php echo $page; ?>">
  <div class="tablii">
  <table align="center">
	<tr>
	  <?php for($p = 0; $p < $totalpages; $p++){ ?>
			<td><input name="btnpage<?php echo $p; ?>" id="btnpage<?php echo $p; ?>" type="button" value="<?php echo $p + 1; ?>" onClick="setpage(<?php echo $p; ?>)"></td>
	  <?php } ?>
	</tr>
</table>
  </div>
</body>
</html>