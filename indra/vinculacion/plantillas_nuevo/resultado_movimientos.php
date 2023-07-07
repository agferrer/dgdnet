<? 
ini_set("session.gc_maxlifetime","14400");  
session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Busqueda</title>
<script language="javascript">
function pdf (URL){
   window.open(URL,"ventana1","toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=5,resizable=5,width=300,height=300,scrollbars=NO")
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

$consulta1=mysql_query("select concat(nombre_trabajador,' ',apellido_paterno,' ',apellido_materno) from tbl_personal where nombre_trabajador='$nombre_personal' and apellido_paterno='$apellido_p' and apellido_materno='$apellido_m';");
while ($row= mysql_fetch_array($consulta1)){
$trabajador=$row[0];
}

?>
<form name="resultados" method="post">
<div align="center">
<fieldset style="width:1700px">
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>CONSULTA DE ASISTENCIA POR TRABAJADOR</strong></font></legend>
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $trabajador;?></strong></font></legend>
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>ESTADO ACTUAL</strong></font></legend>
<table width="1700px" border="">
<tr bgcolor="#efefef" align="center">
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>No.</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Delegación</strong></font></td>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>OFE</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Cargo</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Plaza</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Nivel</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Sueldo Neto</strong></font></td>
<td colspan="3"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Tipo Plaza</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Rango SEM</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Fecha Ingreso a la SRE</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Fecha ingreso a la Delegación</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Área</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Actividades (Sólo Pasaportes)</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Observaciones</strong></font></td>
</tr>
<tr bgcolor="#efefef" align="center">
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Estructura</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Estructura</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Eventual</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Honorarios</strong></font></td>
</tr>
<?
$consulta2=mysql_query("select a.id_personal, l.nombre,  m.oems, concat(a.nombre_trabajador,' ',a.apellido_paterno,' ', a.apellido_materno),
a.estructura, a.eventual, a.honorarios, n.oems, a.fecha_ingreso_sre, a.num_oficio, a.fecha_oficio, f.descripcion_nivel,
i.descripcion_plaza, d.descripcion_cargo, f.suedo_neto,  b.descripcion_area, c.descripcion_pasaportes, j.descripcion_rango,
a.fecha_ingreso_delegacion, o.tipo
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
where a.nombre_trabajador='$nombre_personal' and a.apellido_paterno='$apellido_p' and a.apellido_materno='$apellido_m';");
$filas=mysql_num_rows($consulta2);
if ($filas==''){?>
<legend align="center"><FONT COLOR='#FF0000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>EN LA BASE DE DATOS NO SE ENCUENTRA EL REGISTRO QUE ESTÁ BUSCANDO</strong></font></legend>
<? 
}
else 
{


	
	$i=0;
 while ($i<$filas)
	  {
	  
	 		while ($row= mysql_fetch_array($consulta2)){
					$i++;	

?>
<tr>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $i;?></font></td>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></font></td>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[2];?></font></td>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[13];?></font></td>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[12];?></font></td>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[11];?></font></td>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[14];?></font></td>
<? if ($row[4]=='on'){?>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">X</font></td>
<? } else {?>
<td><font color="#ffffff" size="1" face="Verdana, Arial, Helvetica, sans-serif">.</font></td>
<? }?>
<? if ($row[5]=='on'){?>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">X</font></td>
<? } else {?>
<td><font color="#ffffff" size="1" face="Verdana, Arial, Helvetica, sans-serif">.</font></td>
<? }?>
<? if ($row[6]=='on'){?>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">X</font></td>
<? } else {?>
<td><font color="#ffffff" size="1" face="Verdana, Arial, Helvetica, sans-serif">.</font></td>
<? }?>
<? if ($row[17]!=''){?>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[17];?></font></td>
<? } else {?>
<td><font color="#ffffff" size="1" face="Verdana, Arial, Helvetica, sans-serif">.</font></td>
<? }?>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[8];?></font></td>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[18];?></font></td>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[15];?></font></td>
<? if ($row[16]!=''){?>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[16];?></font></td>
<? } else {?>
<td><font color="#ffffff" size="1" face="Verdana, Arial, Helvetica, sans-serif">.</font></td>
<? }?>
<? if ($row[19]!=''){?>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[19];?></font></td>
<? } else {?>
<td><font color="#ffffff" size="1" face="Verdana, Arial, Helvetica, sans-serif">.</font></td>
<? }?>
<? } }?>
</TR>
</table>
<br>
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>MOVIMIENTOS</strong></font></legend>
<table width="1700px" border="">
<tr bgcolor="#efefef" align="center">
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>No.</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Delegación</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>OFE</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Cargo</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Plaza</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Nivel</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Sueldo Neto</strong></font></td>
<td colspan="3"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Tipo Plaza</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Rango SEM</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Fecha Ingreso a la SRE</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Fecha ingreso a la Delegación</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Área</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Actividades (Sólo Pasaportes)</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Observaciones</strong></font></td>
</tr>
<tr bgcolor="#efefef" align="center">
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Estructura</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Eventual</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Honorarios</strong></font></td>
</tr>
<? }?>
<?
$consulta2=mysql_query("select a.id_personal, l.nombre,  m.oems, concat(a.nombre_trabajador,' ',a.apellido_paterno,' ', a.apellido_materno),
a.estructura, a.eventual, a.honorarios, n.oems, a.fecha_ingreso_sre, a.num_oficio, a.fecha_oficio, f.descripcion_nivel,
i.descripcion_plaza, d.descripcion_cargo, f.suedo_neto,  b.descripcion_area, c.descripcion_pasaportes, j.descripcion_rango,
a.fecha_ingreso_delegacion, o.tipo
from tbl_historial_personal a
left join tbl_area b on b.id_area=a.id_area
left join tbl_area_pasaportes c on c.id_area_pas=a.id_area_pasaportes
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
left join tbl_tipo_asistencia o on o.id_tipo=a.obs
where a.nombre_trabajador='$nombre_personal' and a.apellido_paterno='$apellido_p' and a.apellido_materno='$apellido_m';");
$filas=mysql_num_rows($consulta2);
if ($filas==''){?>
<legend align="center"><FONT COLOR='#FF0000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>EN LA BASE DE DATOS NO SE ENCUENTRA EL REGISTRO QUE ESTÁ BUSCANDO</strong></font></legend>
<? 
}
else 
{


	
	$i=0;
 while ($i<$filas)
	  {
	  
	 		while ($row= mysql_fetch_array($consulta2)){
					$i++;	

?>
<tr>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $i;?></font></td>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></font></td>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[2];?></font></td>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[13];?></font></td>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[12];?></font></td>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[11];?></font></td>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[14];?></font></td>
<? if ($row[4]=='on'){?>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">X</font></td>
<? } else {?>
<td><font color="#ffffff" size="1" face="Verdana, Arial, Helvetica, sans-serif">.</font></td>
<? }?>
<? if ($row[5]=='on'){?>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">X</font></td>
<? } else {?>
<td><font color="#ffffff" size="1" face="Verdana, Arial, Helvetica, sans-serif">.</font></td>
<? }?>
<? if ($row[6]=='on'){?>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">X</font></td>
<? } else {?>
<td><font color="#ffffff" size="1" face="Verdana, Arial, Helvetica, sans-serif">.</font></td>
<? }?>
<? if ($row[17]!=''){?>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[17];?></font></td>
<? } else {?>
<td><font color="#ffffff" size="1" face="Verdana, Arial, Helvetica, sans-serif">.</font></td>
<? }?>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[8];?></font></td>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[18];?></font></td>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[15];?></font></td>
<? if ($row[16]!=''){?>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[16];?></font></td>
<? } else {?>
<td><font color="#ffffff" size="1" face="Verdana, Arial, Helvetica, sans-serif">.</font></td>
<? }?>
<? if ($row[19]!=''){?>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[19];?></font></td>
<? } else {?>
<td><font color="#ffffff" size="1" face="Verdana, Arial, Helvetica, sans-serif">.</font></td>
<? }?>
<? } }?>
</TR>
</table>
</fieldset>
</div>
<table align="center">
<tr>
<td align="center">
<a href="resultado_movimientos_pdf.php?nombre_personal=<?php echo "$nombre_personal"; ?>&apellido_p=<?php echo "$apellido_p"; ?>&apellido_m=<?php echo "$apellido_m"; ?>" target="_blank"><img src="extras/ico/pdf.jpg" width="40" height="40" /></a>
</td></tr></table>
</form>
<? }?>
</body>
</html>
