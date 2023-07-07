<?php
include('../../../conexionindra.php'); 
$mysqli = Conectarse();
$link = Conectarse2();
$idcombo = $_POST["id"];
$action = $_POST["combo"];
switch($action){ 
	case "area":{
	echo "<option value=>Seleccione</option>";	
$res = mysql_query("select id_area_pas, descripcion_pasaportes from tbl_area_pasaportes where id_area = $idcombo and activo='1' order by descripcion_pasaportes ASC");
		while($rs = mysql_fetch_array($res))
		
			echo '<option value="'.$rs["id_area_pas"].'">'.htmlentities($rs["descripcion_pasaportes"]).'</option>';	
	break;
	}
}
?>