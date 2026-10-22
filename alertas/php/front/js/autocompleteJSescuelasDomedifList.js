SmartMultiFiled=function(){
	var varTRCount,htmltext,varTBody;
	function handlecomplete(){
		var varDataType,varDataPos,I;
		if(varDataType=$(this).data("type"),varDataPos=function(varDataType){
				var retPos;
				switch(varDataType){
					case"school_id":retPos=0;
					break;
					case"school_address":retPos=1;
					break;
					case"school_code":retPos=2;
					break;
					case"school_ut":retPos=3;
					break;
				}
				return retPos
			}(varDataType),I=$(this),void 0===varDataPos){
			return!1; 
		}else{
			$(this).autocomplete({
				source:function(A,I){
					var E=$.map(multiple,function(A){
						var mappedArray=A.split("|");
						return{label:mappedArray[varDataPos],value:mappedArray[varDataPos],data:A}
					});
					A.term,I($.ui.autocomplete.filter(E,A.term))
				},
				autoFocus:!0,minLength:1,
				select:function(A,varDataPos){
					var recordset,varPrivateElementNumber;
					varPrivateElementNumber=getIdNumber(I),
					recordset=varDataPos.item.data.split("|"),
					$("#school_id_"+varPrivateElementNumber).val(recordset[0]),
					$("#school_address_"+varPrivateElementNumber).val(recordset[1]),
					$("#school_code_"+varPrivateElementNumber).val(recordset[2]),
					$("#school_ut_"+varPrivateElementNumber).val(recordset[3]),
					setDoFiltro(recordset[0])
				}
			})
		}
	}
	function getIdNumber(paramElement){
		var tempIdNumber;
		return(tempIdNumber=paramElement.attr("id").split("_"))[tempIdNumber.length-1]
	}
	return 	{
					init:function(){
						$(document).on("focus",".autocomplete_txt",handlecomplete)
					}
				}
}();
$(document).ready(function(){
	SmartMultiFiled.init()
});
