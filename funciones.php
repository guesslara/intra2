<?php
    include("clases/usuarioIntranet.class.php");
    switch($_POST["action"]){
        case "mostrarFormBug":
            verFormBug();
        break;
        case "Accesos":
            verAccesosRapidos();
        break;
        case "Administrativas":
            echo"controlador";
            
        break;
        case "Operativas":
            verOperativas();
        break;
        case "Utilerias":
            verUtilerias();
        break;
        case "Cursos":
            verCursos();
        break;
        case "Directorio":
            verDirectorio();
        break;
        case "listarUsuariosConectados":
            listarUsuariosConectados($_POST["usuarioActual"]);
        break;
        case "guardarMensaje":
            guardarMensaje($_POST["mensaje"],$_POST["paraUsuario"],$_POST["deUsuario"]);
        break;
        case "buscarNuevosMensajes":
            buscarNuevosMensajes($_POST["usuarioMsg"]);
        break;
        case "verPanelMensajes":
            verPanelMsg($_POST["usuarioMsg"]);
        break;
    }
    
    function verFormBug(){
        $estadoUsuario=new usuariosIntranet();
        $estadoUsuario->verFormBug();
    }
    
    function verPanelMsg($usuarioMsg){
        $estadoUsuario=new usuariosIntranet();
        $estadoUsuario->verPanelMsg($usuarioMsg);
    }
    
    function buscarNuevosMensajes($usuarioMsg){
        $estadoUsuario=new usuariosIntranet();
        $estadoUsuario->buscarNuevosMsg($usuarioMsg);
    }
    
    function guardarMensaje($mensaje,$destinatario,$deUsuario){
        $estadoUsuario=new usuariosIntranet();
        $estadoUsuario->guardarMensaje($mensaje,$destinatario,$deUsuario);
    }
    
    function listarUsuariosConectados($usuarioActual){
        $estadoUsuario=new usuariosIntranet();
        $estadoUsuario->verUsuariosConectados($usuarioActual);
    }
    
    function verDirectorio(){
        echo "Directorio";
    }
    
    function verCursos(){
?>
        <div class="opcionesCuadroImgMenu">
            <div class="estiloMenusImg">Opcion 1</div>
        </div>
        <div class="opcionesCuadroImgMenu">
            <div class="estiloMenusImg">Opcion 2</div>
        </div>
        <div class="opcionesCuadroImgMenu">
            <div class="estiloMenusImg">Opcion 3</div>
        </div>
<?         
    }
    
    function verUtilerias(){
?>
        <div class="opcionesCuadroImgMenu">
            <div class="estiloMenusImg">Opcion 1</div>
        </div>
        <div class="opcionesCuadroImgMenu">
            <div class="estiloMenusImg">Opcion 2</div>
        </div>
        <div class="opcionesCuadroImgMenu">
            <div class="estiloMenusImg">Opcion 3</div>
        </div>
<?        
    }
    
    function verOperativas(){
?>
        <div class="opcionesCuadroImgMenu">
            <div class="estiloMenusImg">Opcion 1</div>
        </div>
        <div class="opcionesCuadroImgMenu">
            <div class="estiloMenusImg">Opcion 2</div>
        </div>
        <div class="opcionesCuadroImgMenu">
            <div class="estiloMenusImg">Opcion 3</div>
        </div>
        <div class="opcionesCuadroImgMenu">
            <div class="estiloMenusImg">Opcion 4</div>
        </div>
        <div class="opcionesCuadroImgMenu">
            <div class="estiloMenusImg">Opcion 5</div>
        </div>
 <?        
    }
    
    function verAdministrativas(){
?>
        <div class="opcionesCuadroImgMenu">
            <div class="estiloMenusImg">Opcion 1</div>
            <div class="opcionesCuadroTituloImgMenu">Almac&eacute;n</div>
        </div>
        <div class="opcionesCuadroImgMenu">
            <div class="estiloMenusImg">Opcion 2</div>
            <div class="opcionesCuadroTituloImgMenu">Compras</div>
        </div>
        <div class="opcionesCuadroImgMenu">
            <div class="estiloMenusImg">Opcion 3</div>
            <div class="opcionesCuadroTituloImgMenu">Planeaci&oacute;n Financiera</div>
        </div>
        <div class="opcionesCuadroImgMenu">
            <div class="estiloMenusImg">Opcion 4</div>
            <div class="opcionesCuadroTituloImgMenu">ISO</div>
        </div>
        <div class="opcionesCuadroImgMenu">
            <div class="estiloMenusImg">Opcion 5</div>
            <div class="opcionesCuadroTituloImgMenu">Facturaci&oacute;n</div>
        </div>
        <div class="opcionesCuadroImgMenu">
            <div class="estiloMenusImg">Opcion 6</div>
            <div class="opcionesCuadroTituloImgMenu">Cuentas por Pagar</div>
        </div>        
<?        
    }
    
    function verAccesosRapidos(){
        //print_r($_COOKIE);
?>
        <div class="opcionesCuadroImgMenu">
            <div class="estiloMenusImg">Opcion 1</div>
            <div class="opcionesCuadroTituloImgMenu">Inventario de Productos</div>            
        </div>
        <div class="opcionesCuadroImgMenu">
            <div class="estiloMenusImg">Opcion 2</div>
            <div class="opcionesCuadroTituloImgMenu">Productos en Cosm&eacute;tica</div>
        </div>
        <div class="opcionesCuadroImgMenu">
            <div class="estiloMenusImg">Opcion 3</div>
            <div class="opcionesCuadroTituloImgMenu">Requisiciones de Compra</div>
        </div>
        <div class="opcionesCuadroImgMenu">
            <div class="estiloMenusImg">Opcion 4</div>
            <div class="opcionesCuadroTituloImgMenu">&Oacute;rdenes de Servicio</div>
        </div>
        <div class="opcionesCuadroImgMenu">
            <div class="estiloMenusImg">Opcion 5</div>
            <div class="opcionesCuadroTituloImgMenu">Correo Corporativo</div>
        </div>    
        <div class="opcionesCuadroImgMenu">
            <div class="estiloMenusImg">Opcion 6</div>
            <div class="opcionesCuadroTituloImgMenu">Accesos Sistemas</div>
        </div>
<?
    }
?>