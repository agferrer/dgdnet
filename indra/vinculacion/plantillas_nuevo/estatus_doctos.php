<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<title>Documento</title>
</head>
<body>
<script>
function pdf (URL){
   window.open(URL,"ventana1","toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=5,resizable=5,width=500,height=200,scrollbars=NO")
}

</script>



<?
include('../../../conexionindra.php');
$mysqli = Conectarse();
$link = Conectarse2();
$num_delegacion = $_SESSION["cta_direccionw"];
$nom_delegacion = $_SESSION["direccionmw"];
$user = $_SESSION["usuariow"];
$sSQL="insert into tbl_movimientos_usuarios (tipo_movimientos, id_trabajador_afectado,  usuario, fecha) values ('APERTURA DE LA MODIFICACION DOCTOS', '0', '$user', concat(curdate(),' ',curtime()));";
$result = mysql_query($sSQL,$link);
$consulta=mysql_query("select a.id_personal, a.tipo_personal, a.delegacion, l.nombre, a.lugar_fisico, m.oems, a.rfc, a.nombre_trabajador,
a.apellido_paterno, a.apellido_materno, a.estructura, a.eventual, a.honorarios, a.comisionado_por, n.oems, a.fecha_ingreso_sre,
a.num_oficio, a.fecha_oficio, a.id_nivel, f.descripcion_nivel, a.id_plaza, i.descripcion_plaza, a.id_cargo, d.descripcion_cargo,
a.id_area, b.descripcion_area, a.id_area_pas, c.descripcion_pasaportes, a.id_rango, j.descripcion_rango,
a.fecha_ingreso_delegacion, a.activo, a.id_estudios, g.descripcion_estudios, a.id_situacion, k.descripcion_situacion,
a.id_idioma, e.descripcion_idiomas, a.id_nivel_idioma, h.descripcion, a.sexo, a.observaciones, o.tipo, otra_carrera, delegacion_oe
from tbl_personal a
left join tbl_area b on b.id_area=a.id_area
left join tbl_area_pasaportes c on c.id_area_pas=a.id_area_pas
left join tbl_cargo d on d.id_cargo=a.id_cargo
left join tbl_idiomas e on e.id_idiomas=a.id_idioma
left join tbl_nivel f on f.id_nivel=a.id_nivel
left join tbl_nivel_estudios g on g.id_estudios=a.id_estudios
left join tbl_nivel_idioma h on h.id=a.id_nivel_idioma
left join tbl_plaza i on i.id_plaza=a.id_plaza
left join tbl_rango j on j.id_rango=a.id_rango
left join tbl_situacion_academica k on k.id_sit_academica=a.id_situacion
left join delegaciones l on l.id_delegacion=a.delegacion
left join oems m on m.id_oems=a.lugar_fisico
left join oems n on n.id_oems=a.comisionado_por
left join tbl_tipo_asistencia o on o.id_tipo=a.observaciones 
where a.id_personal='$identificador';");	
while ($row= mysql_fetch_array($consulta)){
?>
<form name="resultados" method="post">
<div align="center">
<fieldset style="width:1000px">
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>DATOS GENERALES</strong></font></legend>
<table border="" width="550px">
<tr>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Nombre del Trabajador</strong></font></td>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row["nombre_trabajador"].' '. $row["apellido_paterno"].' '. $row["apellido_materno"];?></font></td>
</tr>
<tr>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Cargo</strong></font></td>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row["descripcion_cargo"];?></font></td>
</tr>
<tr>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Fisicamente en</strong></font></td>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row["delegacion_oe"];?></font></td>
</tr>
<tr>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Tipo de Personal</strong></font></td>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row["tipo_personal"];?></font></td>
</tr>
<tr>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Observaciones</strong></font></td>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row["o.tipo"];?></font></td>
</tr>
</table>

<? if($row["id_cargo"]!='23'){?>
<table border="" width="1000px">
<tr bgcolor="#c5c5c5">
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Cedula de Identificación</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Modificar</strong></font></td>

<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Promesa de Confidencialidad</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Modificar</strong></font></td>

<? if (($row["tipo_personal"]=='PERSONAL COMISIONADO')){?>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Oficio de Comision</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Modificar</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Solicitud de Oficio de Comision</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Modificar</strong></font></td>
<? }?>
<? if ($row["descripcion_cargo"]=='DELEGADO'){?>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Nombramiento de Delegado</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Modificar</strong></font></td>
<? }?>
<? if ($row["descripcion_cargo"]=='SUBDELEGADO'){?>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Nombramiento de Subdelegado</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Modificar</strong></font></td>
<? }?>
<? if (($row["id_cargo"]=='18')||($row["id_cargo"]=='20')){?>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Encargado de Archivo</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Modificar</strong></font></td>
<? }?>
<? if (($row["id_cargo"]=='21')||($row["id_cargo"]=='22')){?>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Encargado de Insumos</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Modificar</strong></font></td>
</tr>
<? }?>
<? if (($row["id_cargo"]=='33')){?>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Encargado de Archivo</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Modificar</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Nombramiento de Subdelegado</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Modificar</strong></font></td>
</tr>
<? }?>  
<? if (($row["id_cargo"]=='29')||($row["id_cargo"]=='31')){?>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Encargado de Archivo</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Modificar</strong></font></td>
</tr>
<? }?>  
<?

$consulta3=mysql_query("select * from tbl_doctos where id_trabajador='$identificador';");

while ($a= mysql_fetch_array($consulta3)){
?>
<TR>
<td align="center"><button type="button" style="width:50px" onClick="javascript:pdf('<? echo $a["url_cip"];?>')"><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'><? echo $a["archivo_cip"];?></FONT></button></td>
<td align="center"><button type="button" onClick="javascript:pdf('modificar_cedula.php?identificador=<? echo $identificador; ?>')"><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'>Modificar Archivo</FONT></button></td>

<td align="center"><button type="button" style="width:50px"  onClick="javascript:pdf('<? echo $a["url_pc"];?>')"><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'><? echo $a["archivo_pc"];?></FONT></button></td>
<td align="center"><button type="button" onClick="javascript:pdf('modificar_promesa.php?identificador=<? echo $identificador; ?>')"><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'>Modificar Archivo</FONT></button></td>

<? if ($row["tipo_personal"]=='PERSONAL COMISIONADO'){?>
<td align="center"><button type="button" style="width:50px"  onClick="javascript:pdf('<? echo $a["url_comision"];?>')"><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'><? echo $a["archivo_comision"];?></FONT></button></td>
<td align="center"><button type="button" onClick="javascript:pdf('modificar_comision.php?identificador=<? echo $identificador; ?>')"><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'>Modificar Archivo</FONT></button></td>
<td align="center"><button type="button" style="width:50px"  onClick="javascript:pdf('<? echo $a["url_sol"];?>')"><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'><? echo $a["archivo_sol"];?></FONT></button></td>
<td align="center"><button type="button" onClick="javascript:pdf('modificar_sol_comision.php?identificador=<? echo $identificador; ?>')"><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'>Modificar Archivo</FONT></button></td>
<? }?>

<? if ($row["descripcion_cargo"]=='DELEGADO'){?>
<td align="center"><button type="button" style="width:50px"  onClick="javascript:pdf('<? echo $a["url_del"];?>')"><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'><? echo $a["archivo_del"];?></FONT></button></td>
<td align="center"><button type="button" onClick="javascript:pdf('modificar_del.php?identificador=<? echo $identificador; ?>')"><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'>Modificar Archivo</FONT></button></td>
<? }?>

<? if ($row["descripcion_cargo"]=='SUBDELEGADO'){?>
<td align="center"><button type="button" style="width:50px"  onClick="javascript:pdf('<? echo $a["url_sub"];?>')"><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'><? echo $a["archivo_sub"];?></FONT></button></td>
<td align="center"><button type="button" onClick="javascript:pdf('modificar_sub.php?identificador=<? echo $identificador; ?>')"><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'>Modificar Archivo</FONT></button></td>
<? }?>

<? if (($row["id_cargo"]=='18')||($row["id_cargo"]=='20')){?>
<td align="center"><button type="button" style="width:50px"  onClick="javascript:pdf('<? echo $a["url_archivo"];?>')"><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'><? echo $a["archivo_archivo"];?></FONT></button></td>
<td align="center"><button type="button" onClick="javascript:pdf('modificar_archivo.php?identificador=<? echo $identificador; ?>')"><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'>Modificar Archivo</FONT></button></td>
<? }?>

<? if (($row["id_cargo"]=='21')||($row["id_cargo"]=='22')){?>
<td align="center"><button type="button" style="width:50px"  onClick="javascript:pdf('<? echo $a["url_insumos"];?>')"><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'><? echo $a["archivo_insumos"];?></FONT></button></td>
<td align="center"><button type="button" onClick="javascript:pdf('modificar_insumos.php?identificador=<? echo $identificador; ?>')"><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'>Modificar Archivo</FONT></button></td>
</TR>
<? }?>
<? if (($row["id_cargo"]=='33')){?>
<td align="center"><button type="button" style="width:50px"  onClick="javascript:pdf('<? echo $a["url_archivo"];?>')"><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'><? echo $a["archivo_archivo"];?></FONT></button></td>
<td align="center"><button type="button" onClick="javascript:pdf('modificar_archivo.php?identificador=<? echo $identificador; ?>')"><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'>Modificar Archivo</FONT></button></td>
<td align="center"><button type="button" style="width:50px"  onClick="javascript:pdf('<? echo $a["url_sub"];?>')"><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'><? echo $a["archivo_sub"];?></FONT></button></td>
<td align="center"><button type="button" onClick="javascript:pdf('modificar_sub.php?identificador=<? echo $identificador; ?>')"><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'>Modificar Archivo</FONT></button></td>
</TR>
<? }?>
<? if (($row["id_cargo"]=='29')||($row["id_cargo"]=='31')){?>
<td align="center"><button type="button" style="width:50px"  onClick="javascript:pdf('<? echo $a["url_archivo"];?>')"><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'><? echo $a["archivo_archivo"];?></FONT></button></td>
<td align="center"><button type="button" onClick="javascript:pdf('modificar_archivo.php?identificador=<? echo $identificador; ?>')"><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'>Modificar Archivo</FONT></button></td>
</TR>
<? }?>

</TR>

<?
		}
?>
<tr>
<td align="center" colspan="16">
<input type="button" value="Visualizar Cambios" onClick="javascript:document.location.reload()">
<input type="button" value="Cerrar" onClick="javascript:window.close()">

</td>
</table>
<? }
else
{
?>
<table border="" width="1000px">
<tr bgcolor="#c5c5c5">
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Cedula de Identificación</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Modificar</strong></font></td>

<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Promesa de Confidencialidad</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Modificar</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Oficio de Comisión</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Modificar</strong></font></td>

</tr>

<?

$consulta3=mysql_query("select * from tbl_doctos where id_trabajador='$identificador';");

while ($a= mysql_fetch_array($consulta3)){
?>
<TR>
<td align="center"><button type="button" style="width:50px" onClick="javascript:pdf('<? echo $a["url_cip"];?>')"><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'><? echo $a["archivo_cip"];?></FONT></button></td>
<td align="center"><button type="button" onClick="javascript:pdf('modificar_cedula.php?identificador=<? echo $identificador; ?>')"><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'>Modificar Archivo</FONT></button></td>

<td align="center"><button type="button" style="width:50px"  onClick="javascript:pdf('<? echo $a["url_pc"];?>')"><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'><? echo $a["archivo_pc"];?></FONT></button></td>
<td align="center"><button type="button" onClick="javascript:pdf('modificar_promesa.php?identificador=<? echo $identificador; ?>')"><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'>Modificar Archivo</FONT></button></td>

<td align="center"><button type="button" style="width:50px"  onClick="javascript:pdf('<? echo $a["url_comision"];?>')"><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'><? echo $a["archivo_comision"];?></FONT></button></td>
<td align="center"><button type="button" onClick="javascript:pdf('modificar_comision.php?identificador=<? echo $identificador; ?>')"><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'>Modificar Archivo</FONT></button></td>

</TR>
<? }?>


</TR>

<tr>
<td align="center" colspan="16">
<input type="button" value="Visualizar Cambios" onClick="javascript:document.location.reload()">
<input type="button" value="Cerrar" onClick="javascript:window.close()">

</td>
</table>
<? }?>
</fieldset>
</div>
<? }?>
</form>

</body>
</html>
