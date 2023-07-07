<?php
include('../../../conexionindra.php'); 
$mysqli = Conectarse();
$link = Conectarse2();
$idcombo = $_POST["id"];
$action = $_POST["combo"];
switch($action){ 
	case "plaza":{
	echo "<option value=>Seleccione</option>";	
$res = mysql_query("select id_nivel, descripcion_nivel from tbl_nivel where id_plaza = $idcombo and activo_nivel='1' order by descripcion_nivel ASC");
		while($rs = mysql_fetch_array($res))
		
			echo '<option value="'.$rs["id_nivel"].'">'.htmlentities($rs["descripcion_nivel"]).'</option>';	
	break;
	}
}
?>