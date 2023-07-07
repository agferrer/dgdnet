<? 
ini_set("session.gc_maxlifetime","14400");  
session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<meta name="robots" content="noindex, nofollow" />
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Pragma" content="no-cache" />

<meta>
<title>Certificacion</title>
</head>
<body>
<?php
include('../../../conexionindra.php');
$mysqli = Conectarse();
$link = Conectarse2();
$num_delegacion = $_SESSION["cta_direccionw"];
$nom_delegacion = $_SESSION["direccionmw"];
$user = $_SESSION["usuariow"];
$hoy=strftime("%Y-%m-%d");

 

$consulta=mysql_query("select mes, anio, nombre_responsable, descripcion_cargo, observaciones from tbl_certificacion_plantillas a left join tbl_cargo b on
a.id_cargo=b.id_cargo where delegacion='$num_delegacion' and mes='$mess' and anio='$aniio';");


$filas=mysql_num_rows($consulta);
if($filas!=0)

{
?>
<form name="certificacion" method="post" id="certificacion"  onSubmit="return validar(certificacion)" action="save_certificacion.php">
<div align="center">
<fieldset style="width:500px">
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>CERTIFICACIÓN DEL PERSONAL DE LA DELEGACIÓN <? echo $nom_delegacion;?></strong></font></legend>
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>YA EXISTE UNA CERTIFICACIÓN CON LOS DATOS QUE QUIERE INSERTAR </strong></font></legend>
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong><a href="certificacion.php">Certificar otro mes</a></strong></font></legend>

</fieldset>
</DIV>
</form>
<input type="hidden" name="delegacion" value="<? echo $delegacion;?>">

<?
}
else{?>
<script language="javascript">
function pdf (URL){
   window.open(URL,"ventana1","toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=5,resizable=5,width=300,height=300,scrollbars=NO")
}
</script>
<?
$mysqli = Conectarse();
$link = Conectarse2();
$sSQL2="insert into tbl_certificacion_plantillas (delegacion, mes, anio, nombre_responsable, id_cargo, observaciones, fecha_cert) values ('$num_delegacion', '$mess', '$aniio', '$nombre', '$cargo','$obs', concat(curdate(),' ',curtime()));";
$result = mysql_query($sSQL2,$link);

$sSQL="insert into tbl_movimientos_usuarios (tipo_movimientos, id_trabajador_afectado,  usuario, fecha) values ('CERTIFICACION DE PLANTILLAS', '0', '$user', concat(curdate(),' ',curtime())) ";
$result = mysql_query($sSQL,$link);
$consulta=mysql_query("select mes, anio, nombre_responsable, descripcion_cargo, observaciones from tbl_certificacion_plantillas a left join tbl_cargo b on
a.id_cargo=b.id_cargo where delegacion='$num_delegacion' and mes='$mess' and anio='$aniio';");
while ($row= mysql_fetch_array($consulta)){
?>
<form name="certificacion" method="post" id="certificacion"  onSubmit="return validar(certificacion)" ><input type="hidden" name="delegacion" value="<? echo $delegacion;?>">
<div align="center">
<fieldset style="width:500px">
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>CERTIFICACIÓN DEL PERSONAL DE LA DELEGACIÓN <? echo $nom_delegacion;?></strong></font></legend>
<table width="500px">
<tr>
<td width="204" align="right"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Mes a Certificar</FONT></td>
<td width="284" align="left"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[0];?></FONT></td></tr>
<tr>
<td align="right"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Año</FONT></td>
<td width="284" align="left"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></FONT></td></tr>
<tr>
<td align="right"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Nombre del Responsable</FONT></td>
<td width="284" align="left"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[2];?></FONT></td></tr>
<tr>
<td align="right"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Cargo</FONT></td>
<td width="284" align="left"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[3];?></FONT></td>
</tr>
<tr>
<td align="right"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Observaciones</FONT></td>
<td width="284" align="left"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[4];?></FONT></td>
</tr>
<tr>
<? if ($_SESSION["nivelw"]==45){?>
<td align="center">
<button type="button" onClick="javascript:pdf('certificacion_pdf_dos.php?nom_delegacion=<?php echo "$nom_delegacion"; ?>&delegacion=<?php echo "$delegacion"; ?>&mess=<?php echo "$mess"; ?>&aniioo=<?php echo "$aniio"; ?>')"><img src="extras/ico/pdf.jpg" width="40" height="40" /></button>
</td>
<? } else{?>
<td align="center">
<button type="button" onClick="javascript:pdf('certificacion_pdf.php?nom_delegacion=<?php echo "$nom_delegacion"; ?>&delegacion=<?php echo "$delegacion"; ?>&mess=<?php echo "$mess"; ?>&aniioo=<?php echo "$aniio"; ?>')"><img src="extras/ico/pdf.jpg" width="40" height="40" /></button>
</td>
<? }?>

<td align="center">
<a href='upload_certificacion.php?nom_delegacion=<?php echo "$nom_delegacion"; ?>&delegacion=<?php echo "$delegacion"; ?>&mess=<?php echo "$mess"; ?>&aniioo=<?php echo "$aniio"; ?>' target="_blank"><img src="extras/ico/upload.png" width="40" height="40" /></a></td></tr>
</table>
</fieldset></div>
</form>
<? }
}?>
</body>
</html>