<? ini_set("session.gc_maxlifetime","14400");  
session_start();
?>
<html>
<head>
<title>Sabana delegados </title>

</head>
<body>
<?
include('../../../../conexionindra.php');
$mysqli = Conectarse();
$link = Conectarse2();
$num_delegacion = $_SESSION["cta_direccionw"];
$nom_delegacion = $_SESSION["direccionmw"];
$user = $_SESSION["usuariow"];
?>
<script language="javascript">
function pdf (URL){
   window.open(URL,"ventana1","toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=5,resizable=5,width=300,height=300,scrollbars=NO")
}
</script>
<form name="desglose_dos" id="desglose_dos">
<div align="center">
<fieldset style="width:1700px">
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>ADMINISTRATIVOS</strong></font></legend>
<table width="1700px" border="">
<tr bgcolor="#efefef" align="center">
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>No.</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Delegación</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Nombre</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Ubicación Física</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Comisionado por</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Número de Oficio</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Fecha del Oficio</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Fecha Ingreso</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Area</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Actividades (Sólo Pasaportes)</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Observaciones</strong></font></td>
</tr>
</tr>
<tr bgcolor="#efefef" align="center">
</tr>
<?
$consulta=mysql_query("select a.id_personal, l.nombre,  m.oems, concat(a.nombre_trabajador,' ',a.apellido_paterno,' ', a.apellido_materno),
a.estructura, a.eventual, a.honorarios, n.oems, a.fecha_ingreso_sre, a.num_oficio, a.fecha_oficio, f.descripcion_nivel,
i.descripcion_plaza, d.descripcion_cargo, f.suedo_neto,  b.descripcion_area, c.descripcion_pasaportes, j.descripcion_rango,
a.fecha_ingreso_delegacion, o.tipo, l.nombre
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
where a.id_cargo='14'  order by l.nombre asc ;");
$filas=mysql_num_rows($consulta);
$i=0;
while ($i<$filas) {
while ($row= mysql_fetch_array($consulta)){
$i++;
$id=$row[0];
?>
<tr align="center">
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $i;?></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $row[20];?></strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[3];?></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[2];?></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[7];?></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[9];?></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[10];?></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[18];?></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[15];?></font></td>
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
</tr>
<?	
		}				
	}
?>
</table>
</fieldset>
</div>
<table align="center">
<tr>
<td align="center">
<button type="button" onClick="javascript:pdf('sabana_administrativos_pdf.php')"><img src="../extras/ico/pdf.jpg" width="40" height="40" /></button></td></tr></table>
</form>
</body>
</html>
