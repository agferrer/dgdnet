<?php
include('../../../conexionindra.php'); 
$mysqli = Conectarse();
$link = Conectarse2();
$idcombo = $_POST["id"];
$action = $_POST["combo"];
switch($action){ 
	case "idioma":{
	echo "<option value=>Seleccione</option>";	
$res = mysql_query("select id, descripcion from tbl_nivel_idioma where id_idioma = $idcombo and activo='1' order by id ASC");
		while($rs = mysql_fetch_array($res))
		
			echo '<option value="'.$rs["id"].'">'.htmlentities($rs["descripcion"]).'</option>';	
	break;
	}
}
?>