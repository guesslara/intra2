var usuval=false;
var susu=0;
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
function privilegios(lim){
	var na=$("#na").val();
	var id_usuario=$("#id_usuario").val();
	var parametros="action=Updtprivilegios";
	var cpis=0;
	var cuen=0;
	var modulos="";
	if($("#cpis").is(":checked")){
		cpis=0;
	}else{
		cpis=1;
	}
	if(na==""){
		alert("Debe elegir un Nivel de Acceso");
		return 0;
	}
	for(var y=0;y<lim;y++){
		if($("#moduloact_"+y).is(":checked")){
			modulos+=$("#moduloact_"+y+":checked").val()+",";
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
		parametros+="&id_usuario="+id_usuario+"&na="+na+"&cpis="+cpis+"&modulos="+modulos;
		ajaxApp("contesta","controlador.php",parametros,"POST");
	}
	return 1;
}
function confirmar(){
	var cadena=$("#pass").val();
	var confpass=$("#confpass").val();
	if(cadena==confpass){
		ubica("confpass","Password Confirmado!!!");
		$("#error").css("background","#80F3BD");
	}else{
		ubica("confpass","Password Diferente :(");
	}
}
function checarmod(valor){
	if($("#moduloact_"+valor).is(":checked")){
		$("#moduloact_"+valor).removeAttr("checked");
	}else{
		$("#moduloact_"+valor).attr("checked", "checked");
	}
}
function nivel() {
	var cont=0;
	var minuscula = false;
	var mayuscula = false; 
	var numero = false;
	var caracter = false;
	var cadena=$("#pass").val();
	for(i=0;i<cadena.length;i++){
		if(cadena.charCodeAt(i)>=97 && cadena.charCodeAt(i)<=122){
			minuscula=true;cont++;
		}else if(cadena.charCodeAt(i)>=65 && cadena.charCodeAt(i)<=90){  
			mayuscula=true;cont++; 
		}else if(cadena.charCodeAt(i)>=48 && cadena.charCodeAt(i)<=57){  
			numero=true;cont+=2;
		}else{  
			caracter=true;cont+=3;
		}
	}
	if(caracter==true && numero==true && minuscula==true && mayuscula==true && (cadena.length>=8)){
		ubica("pass","Seguridad Alta!!!");
		$("#error").css("background","#80F3BD");
		return false; 
	}else if((caracter==true || numero==true) && (minuscula==true || mayuscula==true) && (cadena.length>=8)){
		ubica("pass","Seguridad MEDIA");
		$("#error").css("background","#F0F000");
		return false; 
	}else{
		ubica("pass","Seguridad BAJA");
		$("#error").css("background","#FF0000");
		return false;
	}
}  
function up(lugar){
	limpia("contesta");
	if(lugar=="Usuarios_Perfil"){
		ajaxApp("detalleUsuarios","PerfilUsuario.php","lugar="+lugar,"POST");
	}else{
		ajaxApp("detalleUsuarios","AltaUsuario.php","lugar="+lugar,"POST");
	}
}
function esconde(div){
	$("#"+div).hide();
	if(div=="error"){
		$("#"+div).css("background","#F0F000");
	}
}
function muestra(div){
	$("#"+div).show();
}
function crearusuario(op){
	var nombre=$("#nombre").val();
	var apa=$("#apa").val();
	var pln="";
	if(nombre=="" || apa==""){
		ubica("Checar","Debe llenar Primero el Nombre y Apellido!!!");
		return 0;
	}else{
		pln=nombre[0];
		pln=pln.toLowerCase();
		apa=apa.toLowerCase();
		usuario=pln+apa;
		$("#usuario").attr("value",usuario);
	}
	if(op=="check"){
		ajaxApp("error","controlador.php","action=verificarUsuario&usuario="+usuario,"POST");
	}
	return 1;
}
function actdes(){
	if($("#activacion").is(":checked")){
		$("#activo").hide();
		$("#inactivo").show();
		susu=0;
	}else{
		$("#activo").show();
		$("#inactivo").hide();
		susu=1;
	}
}
function ubica(element,txt){
	var elemento = $("#"+element);
	var dimext = elemento.outerWidth();
	var posicion = elemento.position();
	$("#error").css({
		"margin-left":""+(posicion.left+dimext)+"px",
		"margin-top":""+posicion.top+"px",
	})
	$("#error").show();
	$("#error").html(txt);
}
function checarUsuario(){
	var usuario=$("#usuario").val();
	if(usuario){
		ajaxApp("error","controlador.php","action=verificarUsuario&usuario="+usuario,"POST");
	}else{
		crearusuario("check");
	}
}
function nuevoUsuario(){
	limpia("contesta");
	var parametros="action=UsuarioNuevo";
	var nomina=$("#nomina").val();
	var nombre=$("#nombre").val();
	var apa=$("#apa").val();
	var sexo=$("#sexo").val();
	var usuario=$("#usuario").val();
	var depto=$("#depto").val();
	var pass=$("#pass").val();
	var manda=["nomina","nombre","apa","sexo","usuario","depto","pass"];
	var arre=[nomina,nombre,apa,sexo,usuario,depto,pass];
	for(var i in arre){
		if(arre[i].length==0){
			ubica(manda[i],"<-- Falta llenar este Campo!!!")
			return 0;
		}else{
			parametros+="&"+manda[i]+"="+arre[i];
		}
	}
	if(usuval){
		if(confirm("Esta Seguro de Guardar este Usuario???")){
			if(susu==1){
				if(confirm("El Usuario esta INACTIVO asi quiere Guardarlo???")){
					ajaxApp("contesta","controlador.php",parametros+"&activo="+susu,"POST");
				}
			}else{
				ajaxApp("contesta","controlador.php",parametros+"&activo="+susu,"POST");
			}
		}
	}else{
		alert("Revise el Usuario para ver si hay Disponibilidad");
		return 0;
	}
	return 1;
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
function todo(clase){
	if($("#tdos").is(":checked")){
		$("."+clase+":checkbox:not(:checked)").attr("checked", "checked");
	}else{
		$("."+clase+":checkbox:checked").removeAttr("checked");
	}
}
function limpia(div){
	$("#"+div).html("");
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
		//ajaxApp("detalle_"+nump,"frm_alta.php","opcion="+nump,"POST");
	}
}