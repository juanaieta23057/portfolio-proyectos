
function golistpage(url){
	window.location = url;
}
function setpage(val){
	document.getElementById("pagefiltro").value = val;
	reloadpagefilter();
}
function reloadpagefilter() {

    let caurl = document.getElementById("cafiltro")?.value || "";
    let courl = document.getElementById("cofiltro")?.value || "";
    let deurl = document.getElementById("defiltro")?.value || "";
    let cpurl = document.getElementById("cpfiltro")?.value || "";
    let emurl = document.getElementById("emfiltro")?.value || "";
    let meurl = document.getElementById("mefiltro")?.value || "";
    let dourl = document.getElementById("dofiltro")?.value || "";
    let enurl = document.getElementById("enfiltro")?.value || "";
    let esurl = document.getElementById("esfiltro")?.value || "";
    let pppurl = document.getElementById("pppfiltro")?.value || "";
    let luurl = document.getElementById("lufiltro")?.value || "";
    let agurl = document.getElementById("agfiltro")?.value || "";
    let gaurl = document.getElementById("gafiltro")?.value || "";
    let scurl = document.getElementById("scfiltro")?.value || "";
    let suurl = document.getElementById("sufiltro")?.value || "";
    let inurl = document.getElementById("infiltro")?.value || "";
    let pageurl = document.getElementById("pagefiltro")?.value || "";

    window.location = "list.php?cafil="+caurl+"&cofil="+courl+"&defil="+deurl+"&cpfil="+cpurl+"&emfil="+emurl+"&mefil="+meurl+"&dofil="+dourl+"&enfil="+enurl+"&esfil="+esurl+"&pppfil="+pppurl+"&lufil="+luurl+"&agfil="+agurl+"&gafil="+gaurl+"&scfil="+scurl+"&sufil="+suurl+"&infil="+inurl+"&page="+pageurl;
}
function reloadxlsfilter() {
    let caurl = document.getElementById("cafiltro").value;
    let courl = document.getElementById("cofiltro").value;
    let deurl = document.getElementById("defiltro").value;
    let cpurl = document.getElementById("cpfiltro").value;
    let emurl = document.getElementById("emfiltro").value;
    let meurl = document.getElementById("mefiltro").value;
    let dourl = document.getElementById("dofiltro").value;
    //let niurl = document.getElementById("nifiltro").value;
    let enurl = document.getElementById("enfiltro").value;
    let esurl = document.getElementById("esfiltro").value;
    let pppurl = document.getElementById("pppfiltro").value;
    let scurl = document.getElementById("scfiltro").value;
    let suurl = document.getElementById("sufiltro").value;
    let inurl = document.getElementById("infiltro").value;
    
    //alert(cpurl);
	window.location = "metlistxls.php?cafil="+caurl+"&cofil="+courl+"&defil="+deurl+"&cpfil="+cpurl+"&emfil="+emurl+"&mefil="+meurl+"&dofil="+dourl+"&enfil="+enurl+"&esfil="+esurl+"&pppfil="+pppurl+"&scfil="+scurl+"&sufil="+suurl+"&infil="+inurl;

	//window.location = "metlistxls.php?cafil="+caurl+"&cofil="+courl+"&defil="+deurl+"&cpfil="+cpurl+"&emfil="+emurl+"&mefil="+meurl+"&dofil="+dourl+"&nifil="+niurl+"&enfil="+enurl+"&esfil="+esurl+"&pppfil="+pppurl+"&scfil="+scurl+"&sufil="+suurl+"&infil="+inurl;
}


function reloadmtomsfilter(furl,curl,eurl,murl,durl,mpurl) {
	//alert("furl"+furl+" curl"+curl+" eurl"+eurl+" murl"+murl+" durl"+durl+" mpurl"+mpurl);
	window.location = "lista_mtoms.php?focofiltro="+furl+"&cpfiltro="+curl+"&emprefiltro="+eurl+"&mesfiltro="+murl+"&domediffiltro="+durl+"&mpfiltro="+mpurl;
}

function focosexport(furl,curl,eurl,murl,durl,mpurl) {
	//alert("furl"+furl+" curl"+curl+" eurl"+eurl+" murl"+murl+" durl"+durl+" mpurl"+mpurl);
	window.location = "focosreport.php?focofiltro="+furl+"&cpfiltro="+curl+"&emprefiltro="+eurl+"&mesfiltro="+murl+"&domediffiltro="+durl+"&mpfiltro="+mpurl;
}
function focosmap(furl,curl,eurl,murl,durl,mpurl) {
	//alert("furl"+furl+" curl"+curl+" eurl"+eurl+" murl"+murl+" durl"+durl+" mpurl"+mpurl);
	window.location = "heat2.php?focofiltro="+furl+"&cpfiltro="+curl+"&emprefiltro="+eurl+"&mesfiltro="+murl+"&domediffiltro="+durl+"&mpfiltro="+mpurl;
}
function reloadpagesubfilter(furl) {
	window.location = "focoslista.php?subfiltro="+furl;
}

function reloadpagesubfilterFxC(ele) {
	var furl = $("#subfiltro").val();
	var selected = $("#subfiltro").find('option:selected');
    var extra = selected.data('foo'); 
	window.location = "focoslista.php?subfiltro="+furl+"&title="+extra;
}
function checkobra(obra){
	//alert(obra);
	var lowobra = obra.toLowerCase();
	
	var arrobra = lowobra.split(' ');
	var nuevoAlb = "";
	var nuevoCar= "";
	var nuevoHer= "";
	var nuevoCub= "";	
	var nuevoSol= "";		
	var nuevoPin= "";	
	var nuevoEle= "";	
	var nuevoSan= "";
	var nuevoGas= "";	
	var nuevoTer= "";		
	var nuevoAcc= "";	
	var nuevoSdf= "";
	const arralb = ["revoque", "cemento", "revoq.", "ladillo", "ladrill"];
	const arrcar = ["vuerta", "ventana", "carpi.", "carp", "carpinterias"];
	const arrher = ["herreria", "rejas", "reja"];
	const arrcub = ["imperm", "impermeabilizacion", "membrana"];
	const arrsol = ["solado", "baldosa", "piso"];
	const arrpin = ["pintura", "pint", "Pint."];
	const arrele = ["Elect", "IE", "Elec"];
	const arrsan = ["baño", "sanit", "canilla"];
	const arrgas = ["metrogas", "gas", "solenoide"];
	const arrter = ["calef", "caldera", "estufa"];
	const arracc = ["ascensor", "ifci", "matafuego"];
	const arrsdf = ["sdf", "futuro"];
	
	for (var i = 0; i < arrobra.length; ++i) {		
		if(arralb.includes(arrobra[i])){
			nuevoAlb = "s";
			$('#chkalb').prop('checked',true);
		}
		if(arrcar.includes(arrobra[i])){
			nuevoCar = "s";
			$('#chkcar').prop('checked',true);
		}
		if(arrher.includes(arrobra[i])){
			nuevoHer = "s";
			$('#chkher').prop('checked',true);
		}
		if(arrcub.includes(arrobra[i])){
			nuevoCub = "s";
			$('#chkcar').prop('checked',true);
		}
		if(arrsol.includes(arrobra[i])){
			nuevoSol = "s";
			$('#chksol').prop('checked',true);
		}
		if(arrpin.includes(arrobra[i])){
			nuevoPin = "s";
			$('#chkpin').prop('checked',true);
		}
		if(arrele.includes(arrobra[i])){
			nuevoEle = "s";
			$('#chkele').prop('checked',true);
		}
		if(arrsan.includes(arrobra[i])){
			nuevoSan = "s";
			$('#chksan').prop('checked',true);
			
		}
		if(arrgas.includes(arrobra[i])){
			nuevoGas = "s";
			$('#chkgas').prop('checked',true);
		}
		if(arrter.includes(arrobra[i])){
			nuevoTer = "s";
			$('#chkter').prop('checked',true);
			
		}
		if(arracc.includes(arrobra[i])){
			nuevoAcc = "s";
			$('#chkacc').prop('checked',true);
			
		}
		if(arrsdf.includes(arrobra[i])){
			nuevoSdf = "s";
			$('#chksdf').prop('checked',true);
			
		}
		
		
		
	}
	//alert(lowobra+arrobra[0]);
}
function checkmp(text){
    if(text==""){
		alert("debe haber un monto estimado");
	}else{
		$('#txtmac').val(text);
		$('#txtmc').val(0);
	}
	 
}
function checkmc(text){
var orimp = $('#txtmp').val();
 var isNumeric=text.match(/^\d+$/);
	$('#txtmac').val(parseFloat(orimp)-parseFloat(text));
 
}
function checkmtom(text){

 var isNumeric=text.match(/^\d+$/);
 var pretext = text.substr(0,2);
 
switch (pretext) {
  case '20':
	if(text.length==9){
		$('#radestatus'+1).prop('checked',true);
		$('#txtmtom').removeClass("errRedClass");
	}else{
		alert("Hay algo raro en numero de Aviso (9cifras!)");
		$('#txtmtom').addClass("errRedClass");
	}
    break;
	
  case '34':
	if(text.length==8){
		$('#radestatus'+2).prop('checked',true);
		$('#txtsap').val('SPRe');
		$('#txtmtom').removeClass("errRedClass");
	}else{
		alert("Hay algo raro en numero de MTOM (8cifras!)");
		$('#txtmtom').addClass("errRedClass");
	}
    break;
	
  case '42':
  	if(text.length==9){
		$('#radestatus'+2).prop('checked',true);
		$('#txtsap').val('SPRe');
		$('#txtmtom').removeClass("errRedClass");
	}else{
		alert("Hay algo raro en numero de MTOM (9cifras!)");
		$('#txtmtom').addClass("errRedClass");
	}
    break;
	
  default:
   $('#radestatus'+0).prop('checked',true);
}
 
}
function checksap(sap){

var presap = sap.substr(0,4);
   	if(presap == 'SPRE' || presap == 'PRES' || presap == 'AEJE' || presap == 'EJEC' || presap == 'AINS' || presap == 'FINA' || presap == 'CANC'){
		switch (presap) {
		  case 'SPRE':
				$('#radestatus'+2).prop('checked',true);
				$('#txtsap').removeClass("errRedClass");
			break;
			
		  case 'PRES':
				$('#radestatus'+3).prop('checked',true);
				$('#txtsap').removeClass("errRedClass");
			break;
			
		  case 'AEJE':
				$('#radestatus'+4).prop('checked',true);
				$('#txtsap').removeClass("errRedClass");
			break;
		  case 'EJEC':
				$('#radestatus'+5).prop('checked',true);
				$('#txtsap').removeClass("errRedClass");
			break;	
		  case 'AINS':
				$('#radestatus'+6).prop('checked',true);
				$('#txtsap').removeClass("errRedClass");
			break;	
		  case 'FINA':
				$('#radestatus'+7).prop('checked',true);
				$('#txtsap').removeClass("errRedClass");
			break;	
		  case 'CANC':
				$('#radestatus'+8).prop('checked',true);
				$('#txtsap').removeClass("errRedClass");
			break;	
		  default:
		   $('#radestatus'+0).prop('checked',true);
		}
}else{
		alert("Hay algo raro en letras de sap (4 1ras letras!)");
		$('#txtsap').addClass("errRedClass");
	}
 
}
function setAjaxDomedif(domedif) {
	$.ajax({
	type: "POST",
	url: "focoload_xrange_inc.php",
	data:{domedif: domedif},
	success: function(data){
		$('#divajaxobras').html(data);
	}
	});
}
function submitautoedit() {
	if($("#chkcont").is(':checked') && $("#txtnom").val() == ''){
		//si chk es checked y text vacio
		alert("No puede dar de alta un contacto o un remis sin NOM");	
	}else{
		$("#frmautoedit").submit();
	}
}
function submitAvisos() {
		$("#frmAvisos0").submit();
}
function submitMtoms() {
		$("#frmMtoms0").submit();
}
function submitNoMtoms1() {
		$("#frmNoMtoms0").submit();
}
function submitDrive() {
		$("#frmDrive").submit();
}
function settxtandstat(idx) {
	$("#hidsapmtom"+idx).val($("#selmtom"+idx+" option:selected").attr('data-othervalue'));
	$("#hidsaptextobreve"+idx).val($("#selmtom"+idx+" option:selected").val());
}
function sendMtom(idx) {
	var dmtom = $("#txtdrivemtom"+idx).val();
	txtidfoco = $("#txtidfoco"+idx).val();
	$.ajax({
	type: "POST",
	url: "SAPDrive_UpdateMTOM.php",
	data:{dmtom: dmtom, txtidfoco: txtidfoco},
	success: function(data){
		$('#txtfocomtom'+idx).val(data);
	}
	});
}

function setDoFiltro(val) {


    $.ajax({
	type: "POST",
	url: "getDomedif.php",
	data:'idesc='+val,
	success: function(data){
		$("#dofiltrodiv").html(data);
		reloadpagefilter();
	}
    });
	

}
function getEscTable(val) {
	var idcat = '%';
    $.ajax({
	type: "POST",
	url: "getEscTable.php",
	data:'idesc='+val,
	success: function(data){
		$("#ajaxEscTable").html(data);
	}
    });

}