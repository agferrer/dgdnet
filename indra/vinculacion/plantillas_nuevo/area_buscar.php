<? 
ini_set("session.gc_maxlifetime","14400");  
session_start();
$num_delegacion = $_SESSION["cta_direccionw"];
$nom_delegacion = $_SESSION["direccionmw"];
$user = $_SESSION["usuariow"];
?>
<html>
<head>
</head>	
<title>Busqueda por trabajador</title>
<script>
function acentos(e){
var charCode
charCode= e.keyCode

if (charCode>= 192 && charCode  <=255 ){
alert("Disculpa las molestias pero el sistema no acepta ni Acentos ni Ñ");
return false;
}
return true;
}
function conMayusculas(field)
 {
            field.value = field.value.toUpperCase()
}
</script>
<body>
<div class="menup">
  <ul>
 <form name="busqueda" id="busqueda" action="resultado.php" target="ventana">
                <table width="802" align="center">
                    <tbody>
<?php if (($_SESSION["nivelw"]==4)||($_SESSION["nivelw"]==8)||($_SESSION["nivelw"]=='42')||($_SESSION["nivelw"]=='24')||($_SESSION["nivelw"]==40)||($_SESSION["nivelw"]==35)||($_SESSION["nivelw"]==46)||($_SESSION["nivelw"]==44)){?>
<tr><td colspan="10"><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>BUSQUEDA DE PERSONAL</strong></font></td></tr>
<? } if (($_SESSION["nivelw"]==9)||($_SESSION["nivelw"]==45)){?>
<tr><td colspan="10"><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>BUSQUEDA DE PERSONAL DE LA DELEGACION <? echo $nom_delegacion;?></strong></font></td></tr> <input type="hidden" name="delegacion" id="delegacion" value="<? echo $num_delegacion;?>">
<? }?>					
<tr>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif">Nombre</font></td>
<td><input name="nombre_personal" type="text" id="nombre_personal" onChange="conMayusculas(this)" onKeyPress="return acentos(event)"/></td>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif">Apellido Paterno</font></td>
<td><input name="apellido_p" type="text" id="apellido_p" onChange="conMayusculas(this)" onKeyPress="return acentos(event)" /></td>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif">Apellido Materno</font></td>
<td><input name="apellido_m" type="text" id="apellido_m" onChange="conMayusculas(this)" onKeyPress="return acentos(event)" /></td>	
<?php if (($_SESSION["nivelw"]==4)||($_SESSION["nivelw"]==8)||($_SESSION["nivelw"]=='42')||($_SESSION["nivelw"]=='24')||($_SESSION["nivelw"]==40)||($_SESSION["nivelw"]==35)||($_SESSION["nivelw"]==46)||($_SESSION["nivelw"]==44)){?>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif">Delegaci&oacute;n</font></td>
<td><select name="delegacion" id "delegacion"><option value=>Seleccionar</option>
<?php
include('../../../conexionindra.php');
$mysqli = Conectarse();
$link = Conectarse2();
$sql2 = "select nombre from delegaciones where tipo_delegg in (9,10,11) order by id_delegacion asc";
$result2 = mysql_query($sql2,$link);
while (list($nombre,$nombre)=mysql_fetch_array($result2))
		{
		echo "<option value='$nombre'>$nombre</option>";
		} ?>
</select></td><? } ?>
<td><input type="Submit" value="Buscar" /></td>
<td><input type="reset" value="Limpiar" /></td></tr>
</tbody>
</table>
</form>						
</ul>
</div>
<div style="clear:both"></div>
</body>
</html>
