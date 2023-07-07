<? 
ini_set("session.gc_maxlifetime","14400");  
session_start();
?>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<script src="forms.js"></script>
<head>
<title>Agregar Documentos Personal SRE</title>
</head>
<script language="javascript">

function mueveReloj()
    {
     momentoActual = new Date()
     hora = momentoActual.getHours()
     minuto = momentoActual.getMinutes()
     segundo = momentoActual.getSeconds()
     horaImprimible = hora + " : " + minuto + " : " + segundo
     document.documentos_sre.reloj.value = horaImprimible
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
<? if($cargo==1){?>
<form name="documentos_sre" method="post" id="documentos_sre" action="save_upload_sre_del.php" enctype='multipart/form-data'>
<? }
 else if($cargo==2){?>
<form name="documentos_sre" method="post" id="documentos_sre" action="save_upload_sre_sub.php" enctype='multipart/form-data'>
<? }
else if(($area==1) &&($area_pas==15)){?>
<form name="documentos_sre" method="post" id="documentos_sre" action="save_upload_archivo.php" enctype='multipart/form-data'>
<? }
 else if(($area==1) &&($area_pas==16)){?>
<form name="documentos_sre" method="post" id="documentos_sre" action="save_upload_sre_insumos.php" enctype='multipart/form-data'>
<? }
 else{?>
<form name="documentos_sre" method="post" id="documentos_sre" action="save_upload_sre.php" enctype='multipart/form-data'>
<? }?>

<div align="center">
<fieldset style="width:1000px">
<?php if (($_SESSION["nivelw"]==4)||($_SESSION["nivelw"]==8)||($_SESSION["nivelw"]==42)||($_SESSION["nivelw"]==43)||($_SESSION["nivelw"]==24)||($_SESSION["nivelw"]==40)||($_SESSION["nivelw"]==35)||($_SESSION["nivelw"]==44)||($_SESSION["nivelw"]==46)){?>
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>CARGA DE DOCUMENTOS DEL PERSONAL SRE</strong></font></legend>
<? } if (($_SESSION["nivelw"]==9)){?>
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>CARGA DE DOCUMENTOS DEL PERSONAL SRE DE LA DELEGACION <? echo $nom_delegacion;?>
<input type="hidden" name="delegacion" id="delegacion" value="<? echo $num_delegacion;?>"> </strong></font></legend><? }?>
<table width="1000px">
<tr>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif">Hora de Carga </font></td>
<td><input type="text" name="reloj" size="10"></td>
</tr>

<tr>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif">Cédula de Identificación a Personal</font></td>
<td><span id="sprytextfield1"><input type="file" name="cip" id="cip" size="100"><span class="textfieldRequiredMsg"></span></span></td>
</tr>

<tr>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif">Promesa de Confidencialidad</font></td>
<td><span id="sprytextfield2"><input type="file" name="pc" id="pc" size="100"><span class="textfieldRequiredMsg"></span></span></td>
</tr>

<? if($cargo==1){?>
<tr>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif">Nombramiento Delegado</font></td>
<td><span id="sprytextfield3"><input type="file" name="nd" id="nd" size="100"><span class="textfieldRequiredMsg"></span></span></td>
</tr>
<? }
if($cargo==2){
?>
<tr>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif">Nombramiento Subdelegado</font></td>
<td><span id="sprytextfield4"><input type="file" name="nsub" id="nsub" size="100"><span class="textfieldRequiredMsg"></span></span></td>
</tr>
<? }
if (($area==1) &&($area_pas==15)){
?>
<tr>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif">Responsable de Archivo</font></td>
<td><span id="sprytextfield5"><input type="file" name="ra" id="ra" size="100"><span class="textfieldRequiredMsg"></span></span></td>
</tr>
<? }
if (($area==1) &&($area_pas==16)){?>
<tr>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif">Responsable de Insumos</font></td>
<td><span id="sprytextfield6"><input type="file" name="ri" id="ri" size="100"><span class="textfieldRequiredMsg"></span></span></td>
</tr>
<? }?>
<tr>
<td colspan="2" align="center"><input type="submit" name="Submit"  value="Guardar"><input type="hidden" name="id_p" id="id_p" value="<? echo $identificador; ?>" />
</tr>
</table>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6");

</script>
</fieldset>
</div>
</form>
</body>
</html>
