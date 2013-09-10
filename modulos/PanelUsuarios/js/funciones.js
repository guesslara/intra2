var vwm=0;
var usuval=false;
var susu=0;
var confirmpass=false;
var reseteo=false;
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
function cambio(op){
	/*var active = $( "#accordion" ).accordion( "option", "active" );
	alert("p= "+active);*/
	if(op==1){
		$("#EpnlUsu").animate({
			"width" : "188px",
		},"slow", function() {
			// Animation complete.
			$("#EpnlUsu").css("background","#f0f0f0");
			$("#buskusG").hide();
			$("#btnAU").show();
			$("#pnlUsu").animate({
				opacity : 0.01,
			},"slow")
		});
		$("#pnlMod").animate({
			"width" : "400px",
		},"slow", function() {
			// Animation complete.
			$("#pnlMod").css("background","#fff");
			$("#btnMM").hide();
			$("#otro").show();
			$("#pnlModE").animate({
				opacity : 1,
			},"slow")
		});
	}else{
		$("#pnlMod").animate({
			"width" : "188px",
		},"slow", function() {
			// Animation complete.
			$("#pnlMod").css("background","#f0f0f0");
			$("#otro").hide();
			$("#btnMM").show();
			$("#pnlModE").animate({
				opacity : 0.01,
			},"slow")
		});
		$("#EpnlUsu").animate({
			"width" : "400px",
		},"slow", function() {
			// Animation complete.
			$("#EpnlUsu").css("background","#fff");
			$("#btnAU").hide();
			$("#buskusG").show();
			$("#pnlUsu").animate({
				opacity : 1,
			},"slow")
		});
	}
}
function crece(){
	$("#n").css("font-size","12px");
}
function buscaUsuP(){
	var nombre=$("#busknom").val();
	ajaxApp("pnlUsu","usu.php","nombre="+nombre,"POST");
}
function add(){
	var pagAct=parseInt($("#pagAct").val());
	var limite=$("#limite").val();
	var paginasT=$("#tp").val();
	ajaxApp("pnlGroup","mod.php","pagAct="+(pagAct+1)+"&intervalo="+limite+"&totalpag="+paginasT,"POST");
}
function att(){
	var pagAct=parseInt($("#pagAct").val());
	var limite=$("#limite").val();
	var paginasT=$("#tp").val();
	var limreg=$("#limreg").val();
	nvolimite=limite-(limreg*2);
	parametros="pagAct="+(pagAct-1)+"&intervalo="+(nvolimite)+"&totalpag="+paginasT;
	ajaxApp("pnlGroup","mod.php","pagAct="+(pagAct-1)+"&intervalo="+(nvolimite)+"&totalpag="+paginasT,"POST");
}
function pagdirect(num){
	var pagAct=parseInt($("#pagAct").val());
	var limite=$("#limite").val();
	var paginasT=$("#tp").val();
	var limreg=$("#limreg").val();
	nvolimite=(num*limreg)-limreg;
	ajaxApp("pnlGroup","mod.php","pagAct="+num+"&intervalo="+nvolimite+"&totalpag="+paginasT,"POST");
}
function newGroup(lim){
	nombreg=$("#nomgrupnew").val();
	descripcion=$("#descNG").val();
	var modulos="";
	var cuen=0;
	if(nombreg==""){
		alert("Debe colocar Nombre al nuevo Grupo");
		return 0;
	}
	if(descripcion==""){
		alert("Debe colocar una Descripción al Grupo");
		return 0;
	}
	for(var y=0;y<lim;y++){
		if($("#modulogrup_"+y).is(":checked")){
			modulos+=$("#modulogrup_"+y+":checked").val()+",";
			cuen++;
		}
	}
	if(cuen==0){
		alert("Debe elegir al menos un Modulo");
		return 0;
	}
	//alert("nombre="+nombreg+" modulos="+modulos);
	ajaxApp("contesta","controlador.php","action=nuevoG&nombreG="+nombreg+"&modulos="+modulos+"&descripcion="+descripcion,"POST");
	return 1;
}
function explota(div){
	$("#"+div).slideToggle(900);
}
function remover(div){
	$("#"+div).remove();	
}
function minimizar(){
	id=$("#idUsuW").val();
	remover('usua_'+id);
	var div="<div id='usua_"+id+"' class='vm'><input type='hidden' name='idmin_"+id+"' id='idmin_"+id+"' value='"+id+"'/>";
	div+="<div id='nomum_"+id+"' style='margin-top: 1px; width: 90px; float: left;'></div><div class='btns' onclick='remover(\"usua_"+id+"\");' title='Cerrar Ventana'>";
	div+="<div style='margin: 1px;'><img src='../../img/regre.png' width=23 height=18></div></div>";
	div+="<div class='btns' onclick='maximizar(\""+id+"\");' title='Maximizar Ventana'><div style='margin: 1px;'><img src='../../img/maxi.png' width=23 height=18></div></div></div>";
	$("#mini").append(div);
	esconde('bloqueo');
	ajaxApp("nomum_"+id,"controlador.php","action=nommini&id_usuario="+id,"POST");
}
function maximizar(id){
	remover('usua_'+id);
	$("#VentanaPerfil").css({
		"width":"600px",
		"margin-left":"-300px",
	})
	$("#minimi").attr({
		Onclick: "minimizar()",
		title: "Minimizar Ventana",
	});
	$("#btnmini").show();
	edita(id);
}
function mod(lim,num){
	$("#btnmod"+num).hide();
	$("#tdos"+num).removeAttr("disabled");
	$("#cpis"+num).removeAttr("disabled");
	$("#na"+num).removeAttr("disabled");
	for(var y=0;y<lim;y++){
		$("#moduloact"+num+"_"+y).removeAttr("disabled");
	}
	$("#btngp"+num).show();
}
function edita(id_usuario){	
	caja="<input type='hidden' name='idUsuW' id='idUsuW' value='"+id_usuario+"'/>";
	$("#dpuv").append(caja);
	explota('bloqueo');
	$("#VentanaPerfil").css({
		"width":"600px",
		"margin-left":"-300px",
	})
	$("#minimi").attr({
		Onclick: "minimizar()",
		title: "Minimizar Ventana",
	});
	$("#btnmini").show();
	ajaxApp("todo","vtnaPerfil.php","","POST");
	pesta('7',id_usuario);
}
function buscaUsu(){
	var filtro=$("input[name='filtro']:checked").val();
	op=$("#txtbusk").val();
	if(filtro=="" || filtro==null){
		filtro="nombre";
		op="";
	}
	parametros="action=buskUsu&op="+op+"&filtro="+filtro;
	ajaxApp("medio","controlador.php",parametros,"POST");
	return 1;
}
function pesta(nump,id_usuario){
	esconde('error');
	if(nump<4){
		$("#btn_"+nump).removeClass("off").addClass("on");
		$("#detalle_"+nump).show();
	}else{
		$("#btn_"+nump).removeClass("off").addClass("ono");
		$("#cuerpoP_"+nump).show();
	}
	var agrega="";
	if(id_usuario!=0){
		agrega="&id_usuario="+id_usuario;
	}else if($("#idUsuW").val()){
		id_usuario=$("#idUsuW").val();
		agrega="&id_usuario="+id_usuario;
	}else{
		agrega="&id_usuario=";
	}
	if(nump==1){
		limpia("contesta");
		$("#btn_2").removeClass("on").addClass("off");
		$("#detalle_2").hide();
		$("#btn_3").removeClass("on").addClass("off");
		$("#detalle_3").hide();
		ajaxApp("detalle_"+nump,"frm_alta.php","opcion="+nump+agrega,"POST");
	}else if (nump==2){
		limpia("contesta");
		$("#btn_1").removeClass("on").addClass("off");
		$("#detalle_1").hide();
		$("#btn_3").removeClass("on").addClass("off");
		$("#detalle_3").hide();
	}else if (nump==3){
		$("#btn_1").removeClass("on").addClass("off");
		$("#detalle_1").hide();
		$("#btn_2").removeClass("on").addClass("off");
		$("#detalle_2").hide();
		ajaxApp("UsuIna","controlador.php","action=UsuIna","POST");
	}else if (nump==4){
		$("#btn_5").removeClass("ono").addClass("off");
		$("#cuerpoP_5").hide();
		$("#btn_6").removeClass("ono").addClass("off");
		$("#cuerpoP_6").hide();
		$("#btn_7").removeClass("ono").addClass("off");
		$("#cuerpoP_7").hide();
		//ajaxApp("UsuIna","controlador.php","action=UsuIna","POST");
	}else if (nump==5){
		$("#btn_4").removeClass("ono").addClass("off");
		$("#cuerpoP_4").hide();
		$("#btn_6").removeClass("ono").addClass("off");
		$("#cuerpoP_6").hide();
		$("#btn_7").removeClass("ono").addClass("off");
		$("#cuerpoP_7").hide();
		ajaxApp("DatosU_"+nump,"frm_alta.php","opcion="+nump+agrega,"POST");
	}else if (nump==6){
		$("#btn_4").removeClass("ono").addClass("off");
		$("#cuerpoP_4").hide();
		$("#btn_5").removeClass("ono").addClass("off");
		$("#cuerpoP_5").hide();
		$("#btn_7").removeClass("ono").addClass("off");
		$("#cuerpoP_7").hide();
		ajaxApp("DatosU_"+nump,"frm_alta.php","opcion="+nump+agrega,"POST");
	}else if (nump==7){
		$("#btn_5").removeClass("ono").addClass("off");
		$("#cuerpoP_5").hide();
		$("#btn_6").removeClass("ono").addClass("off");
		$("#cuerpoP_6").hide();
		$("#btn_4").removeClass("ono").addClass("off");
		$("#cuerpoP_4").hide();
		ajaxApp("DatosU_"+nump,"frm_alta.php","opcion=2&"+agrega,"POST");
	}
}
function privilegios(lim,num){
	var ddv=$("#ddv"+num).val();
	var na=$("#na"+num).val();
	if(num!=5){
		var id_usuario=$("#id_usuario").val();	
	}else{
		var id_usuario=$("#idUsuW").val();
	}
	var parametros="action=Updtprivilegios";
	var cpis=0;
	var cuen=0;
	var modulos="";
	if($("#cpis"+num).is(":checked")){
		cpis=0;
	}else{
		cpis=1;
	}
	if(na==""){
		alert("Debe elegir un Nivel de Acceso");
		return 0;
	}
	for(var y=0;y<lim;y++){
		if($("#moduloact"+num+"_"+y).is(":checked")){
			modulos+=$("#moduloact"+num+"_"+y+":checked").val()+",";
			cuen++;
		}
	}
	if(id_usuario==null){
		alert("Ups Hay un error Lo sentimos :(");
		return 0;
	}
	if(cuen==0){
		alert("Debe elegir al menos un Modulo");
		return 0;
	}else if(confirm("Esta seguro de Guardar estos Privilegioso???")){
		parametros+="&id_usuario="+id_usuario+"&na="+na+"&cpis="+cpis+"&modulos="+modulos+"&ddv="+ddv;
		ajaxApp("contesta","controlador.php",parametros,"POST");
	}
	return 1;
}
function confirmar(num){
	var cadena=$("#pass"+num).val();
	var confpass=$("#confpass"+num).val();
	if(cadena==confpass){
		ubica("confpass"+num,"Password Confirmado!!!");
		$("#error").css("background","#80F3BD");
		confirmpass=true;
	}else{
		ubica("confpass"+num,"Password Diferente :(");
		$("#error").css("background","#F0F000");
		confirmpass=false;
	}
}
function checarmod(valor){
	if($("#moduloact_"+valor).is(":checked")){
		$("#moduloact_"+valor).removeAttr("checked");
	}else{
		$("#moduloact_"+valor).attr("checked","checked");
	}
}
function nivel(num) {
	confirmpass=false;
	$("#confpass"+num).attr("value","");
	var minuscula = false;
	var mayuscula = false; 
	var numero = false;
	var caracter = false;
	var cadena=$("#pass"+num).val();
	for(i=0;i<cadena.length;i++){
		if(cadena.charCodeAt(i)>=97 && cadena.charCodeAt(i)<=122){
			minuscula=true;
		}else if(cadena.charCodeAt(i)>=65 && cadena.charCodeAt(i)<=90){  
			mayuscula=true;
		}else if(cadena.charCodeAt(i)>=48 && cadena.charCodeAt(i)<=57){  
			numero=true;
		}else{  
			caracter=true;
		}
	}
	if(caracter==true && numero==true && minuscula==true && mayuscula==true && (cadena.length>=8)){
		ubica("pass"+num,"Seguridad Alta!!!");
		$("#error").css("background","#80F3BD");
		return false; 
	}else if((caracter==true || numero==true) && (minuscula==true || mayuscula==true) && (cadena.length>=8)){
		ubica("pass"+num,"Seguridad MEDIA");
		$("#error").css("background","#F0F000");
		return false; 
	}else{
		ubica("pass"+num,"Seguridad BAJA");
		$("#error").css("background","#FF0000");
		return false;
	}
}  
function up(lugar){
	limpia("contesta");
	esconde('error');
	if(lugar=="Usuario_Gestion"){
		ajaxApp("detalleUsuarios","GestionUsuario.php","lugar="+lugar,"POST");
	}
	if(lugar=="Usuario_Nuevo"){
		ajaxApp("detalleUsuarios","AltaUsuario.php","lugar="+lugar,"POST");
	}
	if(lugar=="Grupo_Nuevo"){
		explota('bloqueo');
		$("#VentanaPerfil").css({
			"width":"800px",
			"margin-left":"-400px",
		})
		$("#minimi").attr({
			Onclick: "",
			title: "",
		});
		$("#btnmini").hide();
		ajaxApp("todo","grpoNuevo.php","","POST");
	}
	if(lugar=="Grupo_Gestion"){
		ajaxApp("detalleUsuarios","PerfilGrupos.php","lugar="+lugar,"POST");
		$( "#accordion" ).accordion({
			"fillSpace": true,
			"active": 1
		});
	}
}
function esconde(div){
	$("#"+div).hide();
	if(div=="error"){
		$("#"+div).css("background","#F0F000");
	}
	if(div=="bloqueo"){
		$("#dpuv").html("");
	}
}
function borra(id_usuario){
	alert(id_usuario);	
}
function muestra(div){
	$("#"+div).show();
}
function crearusuario(op,num){
	var nombre=$("#nombre"+num).val();
	var apa=$("#apa"+num).val();
	var pln="";
	if(nombre=="" || apa==""){
		ubica("Checar"+num,"Debe llenar Primero el Nombre y Apellido!!!");
		return 0;
	}else{
		pln=nombre[0];
		pln=pln.toLowerCase();
		apa=apa.toLowerCase();
		usuario=pln+apa;
		$("#usuario"+num).attr("value",usuario);
	}
	if(op=="check"){
		ajaxApp("contesta","controlador.php","action=verificarUsuario&usuario="+usuario+"&num="+num,"POST");
	}
	return 1;
}
function actdes(num){
	if($("#activacion"+num).is(":checked")){
		$("#activo"+num).hide();
		$("#inactivo"+num).show();
		susu=0;
	}else{
		$("#activo"+num).show();
		$("#inactivo"+num).hide();
		susu=1;
	}
}
function ubica(element,txt){
	var elemento = $("#"+element);
	var dimext = elemento.outerWidth();
	var posicion = elemento.position();
	var otrapos = elemento.offset();
	//alert("izqoff="+otrapos.left+" arribaoff="+otrapos.top+" izqpod="+posicion.left+" arribapos="+posicion.top+" ancho="+dimext);
	$("#error").css({
		"margin-left":""+(otrapos.left+dimext)+"px",
		"margin-top":""+otrapos.top+"px",
	})
	$("#error").show();
	$("#error").html(txt);
}
function checarUsuario(num){
	var usuario=$("#usuario"+num).val();
	if(usuario){
		ajaxApp("contesta","controlador.php","action=verificarUsuario&usuario="+usuario+"&num="+num,"POST");
	}else{
		crearusuario('check',num);
	}
}
function nuevoUsuario(uoi,num){
	limpia("contesta");
	var id_usuario="";
	var parametros="action=UsuarioNuevo";
	var nomina=$("#nomina"+num).val();
	var nombre=$("#nombre"+num).val();
	var apa=$("#apa"+num).val();
	var ama=$("#ama"+num).val();
	var sexo=$("#sexo"+num).val();
	var usuario=$("#usuario"+num).val();
	var depto=$("#depto"+num).val();
	var pass=$("#pass"+num).val();
	if(uoi=="UPDATE"){
		id_usuario="&id_usuario="+$("#id_usuarioU"+num).val();
		usuval=true;
		if(!reseteo && num==6){
			confirmpass=true;
			var arre=[nomina,nombre,apa,ama,sexo,usuario,depto];
			var manda=["nomina","nombre","apa","ama","sexo","usuario","depto"];
		}else if(!reseteo && num!=6){
			confirmpass=true;
			var arre=[nomina,ama,sexo];
			var manda=["nomina","ama","sexo"];
		}else if(reseteo && num==6){
			var arre=[nomina,nombre,apa,ama,sexo,usuario,depto,pass];
			var manda=["nomina","nombre","apa","ama","sexo","usuario","depto","pass"];
		}else if(reseteo && num!=6){
			var arre=[nomina,ama,sexo,pass];
			var manda=["nomina","ama","sexo","pass"];
		}
	}else{
		var arre=[nomina,nombre,apa,ama,sexo,usuario,depto,pass];
		var manda=["nomina","nombre","apa","ama","sexo","usuario","depto","pass"];
	}
	
	for(var i in arre){
		if(arre[i].length==0){
			ubica(manda[i]+num,"<--"+manda[i]+" Falta llenar este Campo!!!");
			return 0;
		}else{
			parametros+="&"+manda[i]+"="+arre[i];
		}
	}
	if(usuval && confirmpass){
		if(confirm("Esta Seguro de Guardar este Usuario???")){
			if(susu==1){
				if(confirm("El Usuario esta INACTIVO asi quiere Guardarlo???")){
					ajaxApp("contesta","controlador.php",parametros+"&activo="+susu+"&uoi="+uoi+id_usuario+"&num="+num,"POST");
				}
			}else{
				ajaxApp("contesta","controlador.php",parametros+"&activo="+susu+"&uoi="+uoi+id_usuario+"&num="+num,"POST");
			}
		}
	}else{
		if(!usuval){
			alert("Revise el Usuario para ver si hay Disponibilidad");
		}
		if(!confirmpass){
			alert("Confirme el Password");
		}
		return 0;
	}
	return 1;
}
function reset(num){
	$("#passwords"+num).show();
	$("#resetp"+num).hide();
	reseteo=true;
	confirmpass=false;
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
		if(confirm("Esta Seguro de Guardar "+cuen+" Usuario(s)???")){
			ajaxApp("contesta","controlador.php","action=insertar&datos="+inser,"POST");
		}
		return 1;
	}
}
function todo(clase,num){
	//alert(clase+"**"+num);
	if($("#tdos"+num).is(":checked")){
	//	alert("if");
		$("."+clase).attr("checked", "checked");
		//$("."+clase+":checkbox:not(:checked)").attr("checked", "checked");
	//	alert("ter if");
	}else{
	//	alert("else");
		$("."+clase+":checkbox:checked").removeAttr("checked");
	//	alert("sal else");
	}
}
function limpia(div){
	$("#"+div).html("");
}