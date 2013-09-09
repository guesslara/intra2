<div id="izqG" style="width: 100%; height: 7%; font-size: 14px; text-align: center;">Nuevo Grupo</div>
<div style="clear: both;"></div>
<div id="izqG" style="width: 52%; height: 90%; font-size: 10px; float: left; margin-top: 10px;">
    <div style="width: 100%; height: 9%; text-align: center;">
        Nombre del Nuevo Grupo:&nbsp;&#09;<input type="text" id="nomgrupnew" name="nomgrupnew" class="btn_chi"/>
    </div>
    <div style="width: 100%; height: 12%; text-align: center;">
        Descripci&oacute;n:&nbsp;&#09;<textarea name="descNG" id="descNG" cols="33" rows="1"></textarea>
    </div>
    <div style="height: 40px; text-align: center;">
	<div id="usuario" style="width: 100%; height: 40px; background: #E7EAEA;">
	    <div class="divusu up" style="width: 100%;">Modulos Para el Grupo</div>
	</div>
    </div>
    <div id="vntModulos" style="width: 100%; height: 60%; overflow: auto; text-align: center; border-bottom: 1px solid #E7EAEA;">
         <?
    //for($i=0;$i<4;$i++){
            require_once("../../clases/clase_mysql.php");
	    require("../../includes/config.inc.php");
	    $conmod="SELECT id_modulo, nombre FROM modulos;";
	    $DB_mysql=new DB_mysql($db,$servidor,$usuarioDb,$passDb);
	    $DB_mysql->consulta($conmod);$cont=1;
	    while($row=mysql_fetch_row($DB_mysql->registrosConsulta())){
		?>
		<div style="width: 185px; height: 22px; padding-top: 3px; margin: 5px; float: left; border: 1px solid #F0F0F0;">
		    <div style="width: 29px; float: left;">
                        <input type="checkbox" id="modulogrup_<?=$row[0];?>" class="gv" value="<?=$row[0];?>" name="modulogrup_<?=$row[0];?>"/>
                    </div>
		    <div onclick="" style="width: 155px; height: 100%; float: right; margin-top: 3px;"><?=$row[1];?></div>
		</div>
		<?
		$cont++;
	    }
    //}
	    ?>
    </div>
    <div style="width: 100%; height: 9%; text-align: center; margin-top: 2px;">
        <div style="width: 50%; float: left;">
            <div style="margin-left: 10px; float: left; margin-top: 2px;">
                Seleccionar todos
            </div>
            <div style="float: left;">
                <input type="checkbox" name="tdosv" id="tdosv" onclick="todo('gv','v');"/>
            </div>
        </div>
        <div style="width: 50%; float: right; text-align: left;">
            <input type="button" value="Guardar Grupo" class="btn_chi" onclick="newGroup('<?=$cont;?>');" />    
        </div>
    </div>
</div>
<div id="derG" style="width: 47%; height: 90%; font-size: 10px; background: #fff; float: right; border-left: double; margin-top: 10px;">
    <div style="width: 100%; height: 9%; text-align: center; margin-left: 5px;">
       Grupos Existentes
    </div>
    <div style="height: 40px; text-align: center; margin-left: 5px;">
	<div id="usuario" style="width: 100%; height: 40px; background: #E7EAEA;">
	    <div class="divusu up" style="width: 33%;">Nombre del Grupo</div>
	    <div class="divusu up" style="width: 33%;">Modulos Asignados</div>
	    <div class="divusu up" style="width: 33%;">Creado</div>
	</div>	    
    </div>
    <div id="vntModulos" style="height: 65%; overflow: auto; text-align: center; margin-left: 5px;">
         <?
    //for($i=0;$i<6;$i++){
            require_once("../../clases/clase_mysql.php");
	    require("../../includes/config.inc.php");
	    $conmod="SELECT * FROM grupos;";
	    $DB_mysql=new DB_mysql($db,$servidor,$usuarioDb,$passDb);
	    $DB_mysql->consulta($conmod);$cont=1;
	    while($row=mysql_fetch_row($DB_mysql->registrosConsulta())){
		?>
		<div id="usuario" onmouseover="" onmouseout="" title="<?=$row[4];?>" style="width: 99.5%; height: 40px; background: #F1F4F5; border: 1px solid #F6F9FA;">
		    <div class="divusu" style="width: 33%; margin-top: 13px;"><?if($row[1]){echo"$row[1]";}else{echo"-";}?></div>
		    <div class="divusu" style="width: 33%; margin-top: 13px;"><?if($row[2]){echo"$row[2]";}else{echo"-";}?></div>
		    <div class="divusu" style="width: 33%; margin-top: 13px;"><?if($row[3]){echo"$row[3]";}else{echo"-";}?></div>
		</div>
		<?
		$cont++;
	    }
    //}
	    ?>
    </div>
    <div style="height: 40px; text-align: center; margin-left: 5px;">
	<div id="usuario" style="width: 100%; height: 40px; background: #E7EAEA;">
	    <div class="divusu up" style="width: 33%;">Nombre del Grupo</div>
	    <div class="divusu up" style="width: 33%;">Modulos Asignados</div>
	    <div class="divusu up" style="width: 33%;">Creado</div>
	</div>	    
    </div>
</div>