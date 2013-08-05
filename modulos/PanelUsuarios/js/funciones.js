function ajaxApp(divDestino,url,parametros,metodo){
	var buscador="detalleUsuarios";
	$.ajax({
	async:true,
	type: metodo,
	dataType: "html",
	contentType: "application/x-www-form-urlencoded",
	url:url,
	data:parametros,
	beforeSend:function(){ 
		if(divDestino != "detalleUsuarios1"){
			$("#cargando").show();		
		}
	},
	success:function(datos){
		$("#cargando").hide();
		if(divDestino == "detalleUsuarios1"){
			$("#"+buscador).show().html(datos);
		}else{
			$("#"+divDestino).show().html(datos);
		}
	},
	timeout:90000000,
	error:function() { $("#"+divDestino).show().html('<center>Error: El servidor no responde. <br>Por favor intente mas tarde. </center>'); }
	});
}
function up(lugar){
	limpia("contesta");
	if(lugar=="Usuarios_Perfil"){
		ajaxApp("detalleUsuarios","PerfilUsuario.php","lugar="+lugar,"POST");
	}else{
		ajaxApp("detalleUsuarios","AltaUsuario.php","lugar="+lugar,"POST");
	}
}
function insertar(lim){
	limpia("contesta");
	var inser="";
	var cuen=0;
	for(var y=0;y<lim;y++){
		if($("#ins_"+y).is(":checked")){
			inser+=$("#ins_"+y+":checked").val()+",";
			cuen++;
		}
	}
	if(cuen==0){
		alert("Debe elegir al menos un registro");
		return 0;
	}else{
		ajaxApp("contesta","controlador.php","action=insertar&datos="+inser,"POST");
		return 1;
	}
}
function todo(lim){
	if($("#tdos").is(":checked")){
		$(".ck:checkbox:not(:checked)").attr("checked", "checked");
	}else{
		$(".ck:checkbox:checked").removeAttr("checked");
	}
}
function pesta(nump){
	limpia("contesta");
	$("#btn_"+nump).removeClass("off").addClass("on");
	$("#detalle_"+nump).show();
	if(nump==1){
		$("#btn_2").removeClass("on").addClass("off");
		$("#detalle_2").hide();
		$("#btn_3").removeClass("on").addClass("off");
		$("#detalle_3").hide();
		ajaxApp("detalle_"+nump,"frm_alta.php","opcion="+nump,"POST");
	}else if (nump==2){
		$("#btn_1").removeClass("on").addClass("off");
		$("#detalle_1").hide();
		$("#btn_3").removeClass("on").addClass("off");
		$("#detalle_3").hide();
	}else{
		$("#btn_1").removeClass("on").addClass("off");
		$("#detalle_1").hide();
		$("#btn_2").removeClass("on").addClass("off");
		$("#detalle_2").hide();
		ajaxApp("detalle_"+nump,"frm_alta.php","opcion="+nump,"POST");
	}
}
function limpia(div){
	$("#"+div).html("");
}