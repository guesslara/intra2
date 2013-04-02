function ajaxApp(divDestino,url,parametros,metodo){	
    $.ajax({
    async:true,
    type: metodo,
    dataType: "html",
    contentType: "application/x-www-form-urlencoded",
    url:url,
    data:parametros,
    beforeSend:function(){ 
            $("#cargadorGeneral").show(); 
    },
    success:function(datos){ 
            $("#cargadorGeneral").hide();
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
}
function cancelarMensaje(){
    $("#capaMensaje").hide();
}
function enviarMensajeUsuario(){
    var mensaje=$("#txtCapaMensaje").val();
    var paraUsuario1=$("#paraUsuario1").val();
    if(mensaje=="" || mensaje == null){
        alert("Error escriba un mensaje para Enviar");
    }else{
        ajaxApp("usuariosConectados","funciones.php","action=guardarMensaje&mensaje="+mensaje+"&paraUsuario="+paraUsuario1,"POST");
    }
}