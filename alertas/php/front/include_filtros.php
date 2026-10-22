<?php

$sqlfilter = array();
$optcafilter = "";
$optcofilter = "";
$optdefilter = "";
$optcpfilter = "";
$optemfilter = "";
$optmefilter = "";
$optdofilter = "";
$optnifilter = "";
$optenfilter = "";
$optesfilter = "";
$optpppfilter = "";
$optlufilter = "";
$optagfilter = "";
$optgafilter = "";
$optscfilter = "";
$optsufilter = "";
$optinfilter = "";
$page = "0";

$title = array();

if (isset($_REQUEST['cafil'])) {
	$optcafilter = $_REQUEST['cafil'];
	if($_REQUEST['cafil'] == '' || $_REQUEST['cafil'] == '0'){
		$title[] = "Todas";
	}else{
		$sqlfilter[] = " idcat = " . $optcafilter;
		$title[] = $optcafilter;
	}
}else{
	if(isset($_REQUEST['title'])){
		$title[] = $_REQUEST['title'];
	}
}

if (isset($_REQUEST['cofil'])) {
	$optcofilter = $_REQUEST['cofil'];
		
	if($optcofilter == '' || $optcofilter == '0'){
		$title[] = "Com: x";
	}else{
		$sqlfilter[] = " com LIKE '" . $optcofilter . "'";
		$title[] = "Com: " . $optcofilter;
	}
}else{
	if(isset($_REQUEST['title'])){
		$title[] = $_REQUEST['title'];
	}
}

if (isset($_REQUEST['defil'])) {
	$optdefilter = $_REQUEST['defil'];
		
	if($optdefilter == '' || $optdefilter == '0'){
		$title[] = "DE: x";
	}else{
		$sqlfilter[] = " dist LIKE '" . $optdefilter . "'";
		$title[] = "DE: " . $optdefilter;
	}
}else{
	if(isset($_REQUEST['title'])){
		$title[] = $_REQUEST['title'];
	}
}

if (isset($_REQUEST['cpfil'])) {
	$optcpfilter = $_REQUEST['cpfil'];
		
	if($optcpfilter == '' || $optcpfilter == '0'){
		$title[] = "CP: x";
	}else{
		$sqlfilter[] = " complan LIKE '" . $optcpfilter . "'";
		$title[] = "CP: " . $optcpfilter;
	}
}else{
	if(isset($_REQUEST['title'])){
		$title[] = $_REQUEST['title'];
	}
}

if (isset($_REQUEST['emfil'])) {
	$optemfilter = $_REQUEST['emfil'];
	
	if($optemfilter == '' || $optemfilter == '0'){
		$title[] = "CP: x";
	}else{
		$sqlfilter[] = " empre LIKE '" . $optemfilter . "'";
		$title[] = "CP: " . $optemfilter;
	}
}else{
	if(isset($_REQUEST['title'])){
		$title[] = $_REQUEST['title'];
	}
}
if (isset($_REQUEST['mefil'])) {
	$optmefilter = $_REQUEST['mefil'];
	switch ($_REQUEST['mefil']) {
		case 'ene':
			$sqlfilter[] = " alertas.fecha  BETWEEN CAST('2026-01-01' AS DATE) AND CAST('2026-01-31' AS DATE)";
			$title[] = "Ene";
			break;
		case 'feb':
			$sqlfilter[] = " alertas.fecha  BETWEEN CAST('2026-02-01' AS DATE) AND CAST('2026-02-29' AS DATE)";
			$title[] = "Feb";
			break;
		case 'may':
			$sqlfilter[] = " alertas.fecha  BETWEEN CAST('2026-03-01' AS DATE) AND CAST('2026-03-31' AS DATE)";
			$title[] = "Mar";
			break;
		case 'abr':
			$sqlfilter[] = " alertas.fecha  BETWEEN CAST('2026-04-01' AS DATE) AND CAST('2026-04-30' AS DATE)";
			$title[] = "Jun";
			break;
		case 'may':
			$sqlfilter[] = " alertas.fecha  BETWEEN CAST('2026-05-01' AS DATE) AND CAST('2026-05-31' AS DATE)";
			$title[] = "May";
			break;
		case 'jun':
			$sqlfilter[] = " alertas.fecha  BETWEEN CAST('2026-06-01' AS DATE) AND CAST('2026-06-30' AS DATE)";
			$title[] = "Jun";
			break;
		case 'jul':
			$sqlfilter[] = " alertas.fecha  BETWEEN CAST('2026-07-01' AS DATE) AND CAST('2026-07-31' AS DATE)";
			$title[] = "Jul";
			break;
		case 'ago':
			$sqlfilter[] = " alertas.fecha  BETWEEN CAST('2026-08-01' AS DATE) AND CAST('2026-08-31' AS DATE)";
			$title[] = "Ago";
			break;
		case 'sep':
			$sqlfilter[] = " alertas.fecha  BETWEEN CAST('2026-09-01' AS DATE) AND CAST('2026-09-30' AS DATE)";
			$title[] = "Sep";
			break;
		case 'oct':
			$sqlfilter[] = " alertas.fecha  BETWEEN CAST('2026-10-01' AS DATE) AND CAST('2026-10-31' AS DATE)";
			$title[] = "Oct";
			break;
		case 'nov':
			$sqlfilter[] = " alertas.fecha  BETWEEN CAST('2026-11-01' AS DATE) AND CAST('2026-11-30' AS DATE)";
			$title[] = "Nov";
			break;	
		case 'dic':
			$sqlfilter[] = " alertas.fecha  BETWEEN CAST('2026-12-01' AS DATE) AND CAST('2026-12-31' AS DATE)";
			$title[] = "Dic";
			break;
		case 'dic23':
			$sqlfilter[] = " alertas.fecha  BETWEEN CAST('2026-12-01' AS DATE) AND CAST('2026-12-31' AS DATE)";
			$title[] = "Dic";
			break;
		default:
			$title[] = "Todas";
			break;
	}
}else{
	if(isset($_REQUEST['title'])){
		$title[] = $_REQUEST['title'];
	}
}

if (isset($_REQUEST['dofil'])) {
	$optdofilter = $_REQUEST['dofil'];
	if ($optdofilter=='0' || $optdofilter==''){
		 $title[] = "Todds";
	}else{
		$title[] = $_REQUEST['dofil'];
	$sqlfilter[] = " domedif LIKE '". $_REQUEST['dofil']."'";
	
	}
	
}else{
	if(isset($_REQUEST['title'])){
		$title[] = $_REQUEST['title'];
	}
}

if (isset($_REQUEST['nifil'])) {
	$optnifilter = $_REQUEST['nifil'];
	if ($optnifilter=='0' || $optnifilter==''){
		 $title[] = "Todxs";
	}else{
		$title[] = $_REQUEST['nifil'];
	$sqlfilter[] = " nomtqm LIKE '". $_REQUEST['nifil']."'";
	
	}
	
}else{
	if(isset($_REQUEST['title'])){
		$title[] = $_REQUEST['title'];
	}
}

if (isset($_REQUEST['enfil'])) {
	$optenfilter = $_REQUEST['enfil'];
	if ($optenfilter=='99' || $optenfilter==''){
		 $title[] = "Stat: x";
	}else{
		$title[] = $_REQUEST['enfil'];
	$sqlfilter[] = " enviado = ". $_REQUEST['enfil'];
	
	}
	
}else{
	if(isset($_REQUEST['title'])){
		$title[] = $_REQUEST['title'];
	}
}

if (isset($_REQUEST['esfil'])) {
	$optesfilter = $_REQUEST['esfil'];
	if ($optesfilter=='99' || $optesfilter==''){
		 $title[] = "Stat: x";
	}else{
		$title[] = $_REQUEST['esfil'];
	$sqlfilter[] = " estatus = " . $_REQUEST['esfil'];
	
	}
	
}else{
	if(isset($_REQUEST['title'])){
		$title[] = $_REQUEST['title'];
	}
}

if (isset($_REQUEST['pppfil'])) {
	$optpppfilter = $_REQUEST['pppfil'];
	switch ($_REQUEST['pppfil']) {
		case '1':
			$sqlfilter[] = " ppp  = " . $_REQUEST['pppfil'];
			$title[] = "Ene";
			break;
		case '2':
			$sqlfilter[] = " ppp  = " . $_REQUEST['pppfil'];
			$title[] = "Feb";
			break;
		case '3':
			$sqlfilter[] = " ppp  = " . $_REQUEST['pppfil'];
			$title[] = "Mar";
			break;
		case '4':
			$sqlfilter[] = " ppp  = " . $_REQUEST['pppfil'];
			$title[] = "Jun";
			break;


		default:
			$title[] = "Todas";
			break;
	}
}else{
	if(isset($_REQUEST['title'])){
		$title[] = $_REQUEST['title'];
	}
}
if (isset($_REQUEST['lufil'])) {
	$optlufilter = $_REQUEST['lufil'];
	if ($optlufilter=='99' || $optlufilter==''){
		 $title[] = "LUZ: x";
	}else{
		$title[] = $_REQUEST['lufil'];
	$sqlfilter[] = " conluz = ". $_REQUEST['lufil'];
	
	}
	
}else{
	if(isset($_REQUEST['title'])){
		$title[] = $_REQUEST['title'];
	}
}

if (isset($_REQUEST['agfil'])) {
	$optagfilter = $_REQUEST['agfil'];
	if ($optagfilter=='99' || $optagfilter==''){
		 $title[] = "AGUA: x";
	}else{
		$title[] = $_REQUEST['agfil'];
	$sqlfilter[] = " conagua = ". $_REQUEST['agfil'];
	
	}
	
}else{
	if(isset($_REQUEST['title'])){
		$title[] = $_REQUEST['title'];
	}
}

if (isset($_REQUEST['gafil'])) {
	$optgafilter = $_REQUEST['gafil'];
	if ($optgafilter=='99' || $optgafilter==''){
		 $title[] = "gas: x";
	}else{
		$title[] = $_REQUEST['gafil'];
	$sqlfilter[] = " congas = ". $_REQUEST['gafil'];
	
	}
	
}else{
	if(isset($_REQUEST['title'])){
		$title[] = $_REQUEST['title'];
	}
}






if (isset($_REQUEST['scfil'])) {
	$optscfilter = $_REQUEST['scfil'];
	if ($optscfilter=='99' || $optscfilter==''){
		 $title[] = "SUS: x";
	}else{
		$title[] = $_REQUEST['scfil'];
	$sqlfilter[] = " suspendio = ". $_REQUEST['scfil'];
	
	}
	
}else{
	if(isset($_REQUEST['title'])){
		$title[] = $_REQUEST['title'];
	}
}

if (isset($_REQUEST['sufil'])) {
	$optsufilter = $_REQUEST['sufil'];
		
	if($optsufilter == '' || $optsufilter == '0'){
		$title[] = "Sup: x";
	}else{
		$sqlfilter[] = " sup LIKE '" . $optsufilter . "'";
		$title[] = "Sup: " . $optsufilter;
	}
}else{
	if(isset($_REQUEST['title'])){
		$title[] = $_REQUEST['title'];
	}
}

if (isset($_REQUEST['infil'])) {
	$optinfilter = $_REQUEST['infil'];
		
	if($optinfilter == '' || $optinfilter == '0'){
		$title[] = "Ins: x";
	}else{
		$sqlfilter[] = " inspector LIKE '" . $optinfilter . "'";
		$title[] = "Ins: " . $optinfilter;
	}
}else{
	if(isset($_REQUEST['title'])){
		$title[] = $_REQUEST['title'];
	}
}

if(!isset($_REQUEST['page'])){
	$page = 0;
}else{
	$page = $_REQUEST["page"];
}
/*echo "COunt Filt: ". count($sqlfilter). "</br>";
echo "opt: ". $optffilter. "</br>";
echo "opt: ". $optcfilter. "</br>";
echo "opt: ". $optmfilter. "</br>";
echo "opt: ". $optefilter. "</br>";*/

?>