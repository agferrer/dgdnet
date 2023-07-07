<?php
include('../../../conexionindra.php'); 
$mysqli = Conectarse();
$link = Conectarse2();
$idcombo = $_POST["id"];
$action = $_POST["combo"];
switch($action){ 
	case "nestudios":{
	echo "<option value=>Seleccione</option>";	
$res = mysql_query("select id_sit_academica, descripcion_situacion from tbl_situacion_academica where nivel_act = $idcombo and activo_sit='1' order by id_sit_academica ASC");
		while($rs = mysql_fetch_array($res))
		
			echo '<option value="'.$rs["id_sit_academica"].'">'.htmlentities($rs["descripcion_situacion"]).'</option>';	
	break;
	}
}
?>