<?php
    include("clases/usuarioIntranet.class.php");
    switch($_POST["action"]){
        case "Accesos":
            verAccesosRapidos();
        break;
        case "Administrativas":
            verAdministrativas();
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
            guardarMensaje($_POST["mensaje"],$_POST["paraUsuario"]);
        break;
    }
    
    function guardarMensaje($mensaje,$destinatario){
        $estadoUsuario=new usuariosIntranet();        
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
            <div class="opcionesCuadroTituloImgMenu"></div>
        </div>
        <div class="opcionesCuadroImgMenu">
            <div class="estiloMenusImg">Opcion 2</div>
            <div class="opcionesCuadroTituloImgMenu"></div>
        </div>
        <div class="opcionesCuadroImgMenu">
            <div class="estiloMenusImg">Opcion 3</div>
            <div class="opcionesCuadroTituloImgMenu"></div>
        </div>
        <div class="opcionesCuadroImgMenu">
            <div class="estiloMenusImg">Opcion 4</div>
            <div class="opcionesCuadroTituloImgMenu"></div>
        </div>
        <div class="opcionesCuadroImgMenu">
            <div class="estiloMenusImg">Opcion 5</div>
            <div class="opcionesCuadroTituloImgMenu"></div>
        </div>
        <div class="opcionesCuadroImgMenu">
            <div class="estiloMenusImg">Opcion 6</div>
            <div class="opcionesCuadroTituloImgMenu"></div>
        </div>
        <div class="opcionesCuadroImgMenu">
            <div class="estiloMenusImg">Opcion 7</div>
            <div class="opcionesCuadroTituloImgMenu"></div>
        </div>
<?        
    }
    
    function verAccesosRapidos(){
?>
        <div class="opcionesCuadroImgMenu">
            <div class="estiloMenusImg">Opcion 1</div>
            <div class="opcionesCuadroTituloImgMenu">Inventario de Productos</div>            
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
        <div class="opcionesCuadroImgMenu">
            <div class="estiloMenusImg">Opcion 6</div>
        </div>
<?
    }
?>