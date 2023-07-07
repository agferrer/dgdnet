<? 
ini_set("session.gc_maxlifetime","14400");  
session_start();
?>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<script src="forms.js"></script>
<head>
<title>Agregar Documentos Personal Comisionado</title>
</head>
<script language="javascript">

function mueveReloj()
    {
     momentoActual = new Date()
     hora = momentoActual.getHours()
     minuto = momentoActual.getMinutes()
     segundo = momentoActual.getSeconds()
     horaImprimible = hora + " : " + minuto + " : " + segundo
     document.documentos_comisionado.reloj.value = horaImprimible
     setTimeout("mueveReloj()",1000)
    }
</script>
<body onLoad="mueveReloj()">
<?
include('../../../conexionindra.php');
$mysqli = Conectarse();
$link = Conectarse2();
$num_delegacion = $_SESSION["cta_direccionw"];
$nom_delegacion = $_SESSION["direccionmw"];
$user = $_SESSION["usuariow"];
//insercion a la tabla de movimientos
$sSQL="insert into tbl_movimientos_usuarios (tipo_movimientos, id_trabajador_afectado,  usuario, fecha) values ('CARGA DE ARCHIVOS', '0', '$user', concat(curdate(),' ',curtime())) ";
$result = mysql_query($sSQL,$link);
$consulta=mysql_query("select id_nivel, id_plaza, id_cargo, id_area, id_area_pas, id_rango from tbl_personal where id_personal='$identificador';");
while ($row= mysql_fetch_array($consulta)){

$nivel=$row[0];
$plaza=$row[1];
$cargo=$row[2];
$area=$row[3];
$area_pas=$row[4];
$rango=$row[5];

}
?>
<? if($cargo==23){?>
<form name="documentos_comisionado" method="post" id="documentos_comisionado" action="save_upload_vangent.php" enctype='multipart/form-data'>
<div align="center">
<fieldset style="width:1000px">
<?php if (($_SESSION["nivelw"]==4)||($_SESSION["nivelw"]==8)||($_SESSION["nivelw"]==42)||($_SESSION["nivelw"]==43)||($_SESSION["nivelw"]==24)||($_SESSION["nivelw"]==40)||($_SESSION["nivelw"]==35)||($_SESSION["nivelw"]==44)||($_SESSION["nivelw"]==46)){?>
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>CARGA DE DOCUMENTOS DEL PERSONAL COMISIONADO</strong></font></legend>
<? } if (($_SESSION["nivelw"]==9)){?>
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>CARGA DE DOCUMENTOS DEL PERSONAL COMISIONADO DE LA DELEGACION <? echo $nom_delegacion;?>
<input type="hidden" name="delegacion" id="delegacion" value="<? echo $num_delegacion;?>"> </strong></font></legend><? }?>
<table width="1000px">
<tr>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif">Hora de Carga </font></td>
<td><input type="text" name="reloj" size="10"></td>
</tr>

<tr>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif">Cédula de Identificación a Personal</font></td>
<td><span id="sprytextfield2"><input type="file" name="cip" id="cip" size="100"><span class="textfieldRequiredMsg"></span></span>
<input type="hidden" name="num_docto_cip" value="1"></td>
</tr>

<tr>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif">Promesa de Confidencialidad</font></td>
<td><span id="sprytextfield3"><input type="file" name="pc" id="pc" size="100"><span class="textfieldRequiredMsg3"></span></span>
<input type="hidden" name="num_docto_pc" value="2"></td>
</tr>

<tr>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif">Oficio de Comisión a Personal</font></td>
<td><span id="sprytextfield4"><input type="file" name="comision" id="comision" size="100"><span class="textfieldRequiredMsg4"></span></span>
<input type="hidden" name="num_docto_comision" value="3"></td>
</tr>

<tr>
<td colspan="4" align="center"><input type="submit" name="Submit"  value="Guardar"><input type="hidden" name="id_p" id="id_p" value="<? echo $identificador; ?>" />
</tr>
</table>
<script type="text/javascript">
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");


</script>
</fieldset>
</div>
</form>

<? }
 else {?>
<form name="documentos_comisionado" method="post" id="documentos_comisionado" action="save_upload_comisionado.php" enctype='multipart/form-data'>

<div align="center">
<fieldset style="width:1000px">
<?php if (($_SESSION["nivelw"]==4)||($_SESSION["nivelw"]==8)||($_SESSION["nivelw"]==42)||($_SESSION["nivelw"]==43)||($_SESSION["nivelw"]==24)||($_SESSION["nivelw"]==40)||($_SESSION["nivelw"]==35)||($_SESSION["nivelw"]==44)||($_SESSION["nivelw"]==46)){?>
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>CARGA DE DOCUMENTOS DEL PERSONAL COMISIONADO</strong></font></legend>
<? } if (($_SESSION["nivelw"]==9)){?>
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>CARGA DE DOCUMENTOS DEL PERSONAL COMISIONADO DE LA DELEGACION <? echo $nom_delegacion;?>
<input type="hidden" name="delegacion" id="delegacion" value="<? echo $num_delegacion;?>"> </strong></font></legend><? }?>
<table width="1000px">
<tr>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif">Hora de Carga </font></td>
<td><input type="text" name="reloj" size="10"></td>
</tr>

<tr>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif">Cédula de Identificación a Personal</font></td>
<td><span id="sprytextfield2"><input type="file" name="cip" id="cip" size="100"><span class="textfieldRequiredMsg"></span></span>
<input type="hidden" name="num_docto_cip" value="1"></td>
</tr>

<tr>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif">Promesa de Confidencialidad</font></td>
<td><span id="sprytextfield3"><input type="file" name="pc" id="pc" size="100"><span class="textfieldRequiredMsg3"></span></span>
<input type="hidden" name="num_docto_pc" value="2"></td>
</tr>

<tr>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif">Oficio de Comisión a Personal</font></td>
<td><span id="sprytextfield4"><input type="file" name="comision" id="comision" size="100"><span class="textfieldRequiredMsg4"></span></span>
<input type="hidden" name="num_docto_comision" value="3"></td>
</tr>

<tr>
<td colspan="4" align="center"><input type="submit" name="Submit"  value="Guardar"><input type="hidden" name="id_p" id="id_p" value="<? echo $identificador; ?>" />
</tr>
</table>
<script type="text/javascript">
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");


</script>
</fieldset>
</div>
</form>
<? }?>
</body>
</html>
