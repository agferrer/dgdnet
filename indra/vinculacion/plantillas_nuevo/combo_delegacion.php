<?php
include('../../../conexionindra.php'); 
$mysqli = Conectarse();
$link = Conectarse2();
$idcombo = $_POST["id"];
$action = $_POST["combo"];
switch($action){ 
	case "delegacion":{
	echo "<option value=>Seleccione</option>";	
$res = mysql_query("select id_oems, oems from oems where delegacion = $idcombo and activoo='1' order by id_oems ASC");
		while($rs = mysql_fetch_array($res))
		
			echo '<option value="'.$rs["id_oems"].'">'.htmlentities($rs["oems"]).'</option>';	
	break;
	}
}
?>