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
            listarUsuariosConectados();
        break;
    }
    
    function listarUsuariosConectados(){
        $estadoUsuario=new usuariosIntranet();
        $estadoUsuario->verUsuariosConectados();
    }
    
    function verDirectorio(){
        echo "Directorio";
    }
    
    function verCursos(){
?>
        <div class="estiloMenusImg">Opcion 1</div>
        <div class="estiloMenusImg">Opcion 2</div>
        <div class="estiloMenusImg">Opcion 3</div>
<?         
    }
    
    function verUtilerias(){
?>
        <div class="estiloMenusImg">Opcion 1</div>
        <div class="estiloMenusImg">Opcion 2</div>
        <div class="estiloMenusImg">Opcion 3</div>
<?        
    }
    
    function verOperativas(){
?>
        <div class="estiloMenusImg">Opcion 1</div>
        <div class="estiloMenusImg">Opcion 2</div>
        <div class="estiloMenusImg">Opcion 3</div>
        <div class="estiloMenusImg">Opcion 4</div>
        <div class="estiloMenusImg">Opcion 5</div>
 <?        
    }
    
    function verAdministrativas(){
?>
        <div class="estiloMenusImg">Opcion 1</div>
        <div class="estiloMenusImg">Opcion 2</div>
        <div class="estiloMenusImg">Opcion 3</div>
        <div class="estiloMenusImg">Opcion 4</div>
        <div class="estiloMenusImg">Opcion 5</div>
        <div class="estiloMenusImg">Opcion 6</div>
        <div class="estiloMenusImg">Opcion 7</div>
<?        
    }
    
    function verAccesosRapidos(){
?>
        <div class="estiloMenusImg">Opcion 1</div>
        <div class="estiloMenusImg">Opcion 2</div>
        <div class="estiloMenusImg">Opcion 3</div>
        <div class="estiloMenusImg">Opcion 4</div>
        <div class="estiloMenusImg">Opcion 5</div>
        <div class="estiloMenusImg">Opcion 6</div>        
<?
    }
?>