<?php
include('../../../conexionindra.php'); 
$mysqli = Conectarse();
$link = Conectarse2();
$idcombo = $_POST["id"];
$action = $_POST["combo"];
switch($action){ 
	case "rango_sem":{
	echo "<option value=>Seleccione</option>";	
$res = mysql_query("select id_rango, descripcion_rango from tbl_rango where id_rama = $idcombo and activo_rango='1' order by id_rango ASC");
		while($rs = mysql_fetch_array($res))
		
			echo '<option value="'.$rs["id_rango"].'">'.htmlentities($rs["descripcion_rango"]).'</option>';	
	break;
	}
}
?>