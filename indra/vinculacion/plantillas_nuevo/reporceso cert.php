<? ini_set("session.gc_maxlifetime","14400");  
session_start();
?>
<html>
<head>
<title>CERTIFICACIÓN</title>
<script type="text/javascript">
function conMayusculas(field)
 {
            field.value = field.value.toUpperCase()
}

function validar(frm){
			
if(!frm.mess.value != ""){
 window.alert("Favor de seleccionar el mes de Certificación.");
  		 frm.mess.focus();
       return false
  	}				
if(!frm.anio.value != ""){
 window.alert("Favor de seleccionar el año de Certificación.");
  		 frm.anio.focus();
       return false
  	}				
if(!frm.nombre.value != ""){
 window.alert("Favor de capturar el nombre del Responsable\ que firmará la Certificación de las Plantillas.");
  		 frm.nombre.focus();
       return false
  	}				
if(!frm.cargo.value != ""){
 window.alert("Favor de seleccionar el Cargo del Responsable.");
  		 frm.cargo.focus();
       return false
  	}				

	return true
}
</script>
</head>
<body>
<?
include('../../../conexionindra.php');
$mysqli = Conectarse();
$link = Conectarse2();
$num_delegacion = $_SESSION["cta_direccionw"];
$nom_delegacion = $_SESSION["direccionmw"];
$user = $_SESSION["usuariow"];
$sSQL="insert into tbl_movimientos_usuarios (tipo_movimientos, id_trabajador_afectado,  usuario, fecha) values ('CERTIFICACION', '0', '$user', concat(curdate(),' ',curtime())) ";
$hoy= date('m', strtotime('-1 month')) ; // resta 1 mes
if (!isset($mess))
	{
?>
<form name="certificacion" method="post" id="certificacion"  onSubmit="return validar(certificacion)" >
<div align="center">
<fieldset style="width:500px">
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>CERTIFICACIÓN DEL PERSONAL DE LA DELEGACIÓN <? echo $nom_delegacion;?></strong></font></legend> <input type="hidden" name="delegacion" value="<? echo $num_delegacion;?>">
<table width="500px">
<tr>
<td width="204" align="right"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Mes a Certificar</FONT></td>
<td width="284" align="left"><select name="mess" id="mess" style="width:200px">
<option selected="selected" value=>Seleccione</option>
<option value="ENERO">ENERO</option>
<option value="FEBRERO">FEBRERO</option>
<option value="MARZO">MARZO</option>
<option value="ABRIL">ABRIL</option>
<option value="MAYO">MAYO</option>
<option value="JUNIO">JUNIO</option>
<option value="JULIO">JULIO</option>
<option value="AGOSTO">AGOSTO</option>
<option value="SEPTIEMBRE">SEPTIEMBRE</option>
<option value="OCTUBRE">OCTUBRE</option>
<option value="SEPTIEMBRE">SEPTIEMBRE</option>
<option value="OCTUBRE">OCTUBRE</option>
<option value="NOVIEMBRE">NOVIEMBRE</option>
<option value="DICIEMBRE">DICIEMBRE</option>
</select></td></tr>
<tr>
<td align="right"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Año</FONT></td>
<td align="left"><select name="aniio" id="aniio" style="width:200px">
<option selected="selected" value=>Seleccione</option>
<option value="2023">2023</option>
<option value="2022">2022</option>
<option value="2021">2021</option>
<option value="2020">2020</option>
<option value="2019">2019</option>
<option value="2018">2018</option>
<option value="2017">2017</option>
<option value="2016">2016</option>
<option value="2015">2015</option>
<option value="2014">2014</option>
<option value="2013">2013</option>
<option value="2012">2012</option>
</select></td></tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="Submit"  value="Consultar">
</tr>
</table>
</fieldset>
</div>
</form>
<?
}
else 
{
$consulta=mysql_query("select mes, anio, nombre_responsable, descripcion_cargo, observaciones from tbl_certificacion_plantillas a left join tbl_cargo b on
a.id_cargo=b.id_cargo where delegacion='$num_delegacion' and mes='$mess' and anio='$aniio';");
$filas=mysql_num_rows($consulta);
if($filas=='')

{
?>
<form name="certificacion" method="post" id="certificacion"  onSubmit="return validar(certificacion)" action="save_certificacion.php">
<div align="center">
<fieldset style="width:500px">
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>CERTIFICACIÓN DEL PERSONAL DE LA DELEGACIÓN <? echo $nom_delegacion;?></strong></font></legend>
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>NO EXISTE CERTIFICACION </strong></font></legend>
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong><a href="reporceso cert.php">Consultar otro mes</a></strong></font></legend>

</fieldset>
</DIV>
</form>
<input type="hidden" name="delegacion" value="<? echo $delegacion;?>">

<?
}
else{



$consulta=mysql_query("select mes, anio, nombre_responsable, descripcion_cargo, observaciones from tbl_certificacion_plantillas a left join tbl_cargo b on
a.id_cargo=b.id_cargo where delegacion='$num_delegacion' and mes='$mess' and anio='$aniio';");
while ($row= mysql_fetch_array($consulta)){
?>
<script language="javascript">
function pdf (URL){
   window.open(URL,"ventana1","toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=5,resizable=5,width=300,height=300,scrollbars=NO")
}
</script>
<form name="certificacion" method="post" id="certificacion"  onSubmit="return validar(certificacion)" >
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
</fieldset>
</div>
</form>



<?
}}}
?>

</body>
</html>
