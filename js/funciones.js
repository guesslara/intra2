function ajaxApp(divDestino,url,parametros,metodo){	
    $.ajax({
    async:true,
    type: metodo,
    dataType: "html",
    contentType: "application/x-www-form-urlencoded",
    url:url,
    data:parametros,
    beforeSend:function(){ 
            //$("#cargadorGeneral").show();
            $("#cargadorApp").show().html('<img src="img/cargador (2).gif">');
    },
    success:function(datos){ 
            //$("#cargadorGeneral").hide();
            $("#cargadorApp").show().html('Listo');
            $("#"+divDestino).show().html(datos);		
    },
    timeout:90000000,
    error:function() { $("#"+divDestino).show().html('<center>Error: El servidor no responde. <br>Por favor intente mas tarde. </center>'); }
    });
}
function colocarFocusElemento(elemento){
    var elementos = new Array("Accesos","Administrativas","Operativas","Utilerias","Cursos","Directorio");
    for(i=0;i<elementos.length;i++){
        $("#"+elementos[i]).removeClass("estilosEnlacesOpcionesSeleccionado");
        $("#"+elementos[i]).addClass("estilosEnlacesOpciones");
    }    
    $("#"+elemento).addClass("estilosEnlacesOpcionesSeleccionado");
}
function accionesEnlaces(accion){
    ajaxApp("contenidoAppPrincipal","funciones.php","action="+accion,"POST");
    colocarFocusElemento(accion);
}
function verificarUsuariosConectados(){
    var usuarioActual=$("#txtUsuarioActual").val();
    ajaxApp("usuariosConectados","funciones.php","action=listarUsuariosConectados&usuarioActual="+usuarioActual,"POST");
}
function enviarMensaje(usuarioEnviar){
    //alert(usuarioEnviar);
    $("#capaMensaje").show();
    $("#paraUsuario").html(usuarioEnviar);
    $("#txtCapaMensaje").html("");
    $("#txtCapaMensaje").attr("value","");
    $("#paraUsuarioOculto").attr("value",usuarioEnviar);
}
function cancelarMensaje(){
    $("#capaMensaje").hide();
}
function enviarMensajeUsuario(){
    var mensaje=$("#txtCapaMensaje").val();
    var paraUsuario1=$("#paraUsuarioOculto").val();
    var deUsuario=$("#txtUsuarioActual").val();
    if(mensaje=="" || mensaje == null){
        alert("Error escriba un mensaje para Enviar");
    }else{
        ajaxApp("usuariosConectados","funciones.php","action=guardarMensaje&mensaje="+mensaje+"&paraUsuario="+paraUsuario1+"&deUsuario="+deUsuario,"POST");
    }
}
function verificaMensajesNuevos(){
    var usuarioMsg=$("#txtUsuarioActual").val();
    ajaxApp("msgNuevosUsuario","funciones.php","action=buscarNuevosMensajes&usuarioMsg="+usuarioMsg,"POST");
}
function mostrarCapaVistaMensajes(){
    var usuarioMsg=$("#txtUsuarioActual").val();
    ajaxApp("contenidoAppPrincipal","funciones.php","action=verPanelMensajes&usuarioMsg="+usuarioMsg,"POST");
}
function verificaSesionUsuario(){
    ajaxApp("sesion","vSesion.php","","POST");
}
function abrirFormBug(){
	$("#frmContenedorBug").show();
	ajaxApp("divFormularioBug","funciones.php","action=mostrarFormBug","POST");
}
function cerrarFormbug(){
	$("#frmContenedorBug").hide	();
}