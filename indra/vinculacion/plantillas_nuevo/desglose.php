<? ini_set("session.gc_maxlifetime","14400");  
session_start();
?>
<html>
<head>
<title>Desglose SRE/COMISIONADO</title>
<script type="text/javascript">


function validar(frm){
			
if(!frm.delegacion.value != ""){
 window.alert("Favor de seleccionar la Delegación.");
  		 frm.delegacion.focus();
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
if (!isset($delegacion))
	{
?>
<form name="desglose" id="desglose"  onSubmit="return validar(desglose)">
<div align="center">
<fieldset style="width:600px">
<?php if (($_SESSION["nivelw"]==4)||($_SESSION["nivelw"]==8)||($_SESSION["nivelw"]=='42')||($_SESSION["nivelw"]=='43')||($_SESSION["nivelw"]=='24')||($_SESSION["nivelw"]==40)||($_SESSION["nivelw"]==35)||($_SESSION["nivelw"]==46)||($_SESSION["nivelw"]==44)){?>
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>DESGLOSE SRE/COMISIONADO<input type="hidden" name="nom_delegacion" id="nom_delegacion" value="<? echo $nom_delegacion;?>"></strong></font></legend>
<table width="600px">
<tr>
<td align="right"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Delegación</FONT></td>
<td align="left"><select name="delegacion" id="delegacion" style="width:300px">
<option selected="selected" value=>Seleccione</option>
<option value="A">Todas las Delegaciones</option>
<option value="B">Todas las Direcciones</option>
<?php
$sql3 = "select id_delegacion, nombre from delegaciones where tipo_delegg in(10,9,11) and aactivo='1' order by id_delegacion asc";
$result3 = mysql_query($sql3,$link);
while (list($id_delegacion,$nombre)=mysql_fetch_array($result3))
{
echo "<option value='$id_delegacion'>$nombre</option>";
} 
?>
</select></td></tr>
<? } if (($_SESSION["nivelw"]==9)||($_SESSION["nivelw"]==45)){?>
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>DESGLOSE SRE/COMISIONADO DE LA DELEGACION <? echo $nom_delegacion;?><input type="hidden" name="delegacion" id="delegacion" value="<? echo $num_delegacion;?>"> </strong></font></legend>

<table width="600px">
<tr>
<td align="right"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Delegación</FONT></td>
<td align="left"><input type="text" name="delegacion_nombre" id="delegacion_nombre" size='50' value="<? echo $nom_delegacion;?>">
</td>
</tr>
<? }?>

<tr>
<td  colspan="2" align="center"><input type="submit" name="Submit" value="Buscar"></td>
</tr>
</table>
</table>
</fieldset></div>
</form>
<? }
else {
?>
<script language="javascript">
function pdf (URL){
   window.open(URL,"ventana1","toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=5,resizable=5,width=300,height=300,scrollbars=NO")
}
</script>
<? if($delegacion=='A'){ ?>
<form name="desglose_dos" id="desglose_dos">
<div align="center">
<fieldset style="width:1700px">
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>PERSONAL SRE TODAS LAS DELEGACIONES</strong></font></legend>
<table width="1700px" border="">
<tr bgcolor="#efefef" align="center">
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>No.</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Delegación</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Nombre</strong></font></td>
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
<td colspan="6"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Documentos</strong></font></td>
</tr>
<tr bgcolor="#efefef" align="center">
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Estructura</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Eventual</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Honorarios</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Cédula</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Promesa</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>N. Delg</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>N. Sub-Delg</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Resp. Archivo</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Resp. Insumos</strong></font></td>
</tr>
<?
$consulta=mysql_query("select a.id_personal, l.nombre,  m.oems, concat(a.nombre_trabajador,' ',a.apellido_paterno,' ', a.apellido_materno),
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
where a.tipo_personal ='PERSONAL SRE'  order by l.nombre,  a.id_plaza asc ;");
$filas=mysql_num_rows($consulta);
$i=0;
while ($i<$filas) {
while ($row= mysql_fetch_array($consulta)){
$i++;
$id=$row[0];
?>
<tr>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $i;?></font></td>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></font></td>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[3];?></font></td>
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
<? 
$consulta_doctos=mysql_query("select id_documento, id_trabajador, archivo_cip, url_cip, archivo_pc, url_pc, archivo_comision, url_comision, archivo_del, url_del, archivo_sub,
url_sub, archivo_archivo, url_archivo, archivo_insumos, url_insumos, fecha_upload
from tbl_doctos where id_trabajador='$id';");
while ($documentos= mysql_fetch_array($consulta_doctos)){

?>
<? if ($documentos[2]!=''){?>
<td align="center"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><a href="<? echo"$documentos[3]"?>" target="_blank"><? echo $documentos[2];?></a></strong></FONT></td>
<? } else {?>
<td align="center"><FONT COLOR='#ffffff' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>.</strong></FONT></td>
<? }?>
<? if ($documentos[4]!=''){?>
<td align="center"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><a href="<? echo"$documentos[5]"?>" target="_blank"><? echo $documentos[4];?></a></strong></FONT></td>
<? } else {?>
<td align="center"><FONT COLOR='#ffffff' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>.</strong></FONT></td>
<? }?>
<? if ($documentos[8]!=''){?>
<td align="center"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><a href="<? echo"$documentos[9]"?>" target="_blank"><? echo $documentos[8];?></a></strong></FONT></td>
<? } else {?>
<td align="center"><FONT COLOR='#ffffff' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>.</strong></FONT></td>
<? }?>
<? if ($documentos[10]!=''){?>
<td align="center"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><a href="<? echo"$documentos[11]"?>" target="_blank"><? echo $documentos[10];?></a></strong></FONT></td>
<? } else {?>
<td align="center"><FONT COLOR='#ffffff' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>.</strong></FONT></td>
<? }?>
<? if ($documentos[12]!=''){?>
<td align="center"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><a href="<? echo"$documentos[13]"?>" target="_blank"><? echo $documentos[12];?></a></strong></FONT></td>
<? } else {?>
<td align="center"><FONT COLOR='#ffffff' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>.</strong></FONT></td>
<? }?>
<? if ($documentos[14]!=''){?>
<td align="center"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><a href="<? echo"$documentos[15]"?>" target="_blank"><? echo $documentos[14];?></a></strong></FONT></td>
<? } else {?>
<td align="center"><FONT COLOR='#ffffff' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>.</strong></FONT></td>
<? }?>

<? }?>
</tr>
<?	
		}				
	}
?>
</table>
</fieldset>
</div>
&nbsp;&nbsp;&nbsp;&nbsp;
<div align="center">
<fieldset style="width:1700px">
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>PERSONAL COMISIONADO TODAS LAS DELEGACIONES</strong></font></legend>
<table width="1700px" border="">
<tr bgcolor="#efefef" align="center">
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>No.</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Delegación</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Nombre</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Cargo</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Ubicación Física</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Comisionado por</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Tipo de OFE</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Número de Oficio</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Fecha del Oficio</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Fecha Ingreso</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Area</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Actividades (Sólo Pasaportes)</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Observaciones</strong></font></td>
<td colspan="4"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Documentos</strong></font></td>
</tr>
</tr>
<tr bgcolor="#efefef" align="center">
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Cédula</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Promesa</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Oficio de Comisión</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Solicitud de Oficio de Comisión</strong></font></td>
</tr>
<? 
$consulta_comisionado=mysql_query("select a.id_personal, l.nombre,  m.oems, concat(a.nombre_trabajador,' ',a.apellido_paterno,' ', a.apellido_materno),
a.estructura, a.eventual, a.honorarios, n.oems, a.fecha_ingreso_sre, a.num_oficio, a.fecha_oficio, f.descripcion_nivel,
i.descripcion_plaza, d.descripcion_cargo, f.suedo_neto,  b.descripcion_area, c.descripcion_pasaportes, j.descripcion_rango,
a.fecha_ingreso_delegacion, o.tipo,a.lugar_fisico, z.descripcion
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
left join tipo_oems z on n.id_tipo=z.id_tipo_oems 
where  a.tipo_personal='PERSONAL COMISIONADO' and a.activo='1'  order by  l.nombre, m.oems asc ;");
$filas_comisionado=mysql_num_rows($consulta_comisionado);
$a=0;
while ($a<$filas_comisionado) {
while ($row= mysql_fetch_array($consulta_comisionado)){
$a++;
$id=$row[0];
?>
<tr align="center">
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $a;?></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[3];?></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[13];?></font></td>
<? if ($row["lugar_fisico"]==0){?>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">DELEGACIÖN</font></td>
<? } else {?>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[2];?></font></td>
<? }?>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[7];?></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row["descripcion"];?></font></td>


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
<? 
$consulta_dos=mysql_query("select id_documento, id_trabajador, archivo_cip, url_cip, archivo_pc, url_pc, archivo_comision, url_comision, fecha_upload, archivo_sol, url_sol from tbl_doctos where id_trabajador='$id';");
while ($documentos= mysql_fetch_array($consulta_dos)){?>
<td><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><a href="<? echo"$documentos[3]"?>" target="_blank"><? echo $documentos[2];?></a></strong></FONT></td>
<td><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><a href="<? echo"$documentos[5]"?>" target="_blank"><? echo $documentos[4];?></a></strong></FONT></td>
<td><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><a href="<? echo"$documentos[7]"?>" target="_blank"><? echo $documentos[6];?></a></strong></FONT></td>
<td><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><a href="<? echo"$documentos[10]"?>" target="_blank"><? echo $documentos[9];?></a></strong></FONT></td>
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
<button type="button" onClick="javascript:pdf('desglose_pdf.php?nom_delegacion=<?php echo "$nom_delegacion"; ?>&delegacion=<?php echo "$delegacion"; ?>')"><img src="extras/ico/pdf.jpg" width="40" height="40" /></button>
</td>
<td align="center">
<button type="button" onClick="javascript:pdf('desglose_excel.php?nom_delegacion=<?php echo "$nom_delegacion"; ?>&delegacion=<?php echo "$delegacion"; ?>')"><img src="extras/ico/excel.jpg" width="40" height="40" /></button>
</td>
</tr></table>
</form>

<? }
else if($delegacion=='B'){
?>
<form name="desglose_dos" id="desglose_dos">
<div align="center">
<fieldset style="width:1700px">
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>PERSONAL CANCILLERIA</strong></font></legend>
<table width="1700px" border="">
<tr bgcolor="#efefef" align="center">
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>No.</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Dirección</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Nombre</strong></font></td>
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
<td colspan="6"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Documentos</strong></font></td>
</tr>
<tr bgcolor="#efefef" align="center">
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Estructura</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Eventual</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Honorarios</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Cédula</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Promesa</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>N. Delg</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>N. Sub-Delg</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Resp. Archivo</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Resp. Insumos</strong></font></td>
</tr>
<?
$consulta=mysql_query("select a.id_personal, l.nombre,  m.oems, concat(a.nombre_trabajador,' ',a.apellido_paterno,' ', a.apellido_materno),
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
where a.tipo_personal = 'PERSONAL SRE_DGD'  order by l.nombre,  a.id_plaza asc ;");
$filas=mysql_num_rows($consulta);
$i=0;
while ($i<$filas) {
while ($row= mysql_fetch_array($consulta)){
$i++;
$id=$row[0];
?>
<tr>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $i;?></font></td>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></font></td>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[3];?></font></td>
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
<? 
$consulta_doctos=mysql_query("select id_documento, id_trabajador, archivo_cip, url_cip, archivo_pc, url_pc, archivo_comision, url_comision, archivo_del, url_del, archivo_sub,
url_sub, archivo_archivo, url_archivo, archivo_insumos, url_insumos, fecha_upload
from tbl_doctos where id_trabajador='$id';");
while ($documentos= mysql_fetch_array($consulta_doctos)){

?>
<? if ($documentos[2]!=''){?>
<td align="center"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><a href="<? echo"$documentos[3]"?>" target="_blank"><? echo $documentos[2];?></a></strong></FONT></td>
<? } else {?>
<td align="center"><FONT COLOR='#ffffff' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>.</strong></FONT></td>
<? }?>
<? if ($documentos[4]!=''){?>
<td align="center"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><a href="<? echo"$documentos[5]"?>" target="_blank"><? echo $documentos[4];?></a></strong></FONT></td>
<? } else {?>
<td align="center"><FONT COLOR='#ffffff' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>.</strong></FONT></td>
<? }?>
<? if ($documentos[8]!=''){?>
<td align="center"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><a href="<? echo"$documentos[9]"?>" target="_blank"><? echo $documentos[8];?></a></strong></FONT></td>
<? } else {?>
<td align="center"><FONT COLOR='#ffffff' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>.</strong></FONT></td>
<? }?>
<? if ($documentos[10]!=''){?>
<td align="center"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><a href="<? echo"$documentos[11]"?>" target="_blank"><? echo $documentos[10];?></a></strong></FONT></td>
<? } else {?>
<td align="center"><FONT COLOR='#ffffff' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>.</strong></FONT></td>
<? }?>
<? if ($documentos[12]!=''){?>
<td align="center"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><a href="<? echo"$documentos[13]"?>" target="_blank"><? echo $documentos[12];?></a></strong></FONT></td>
<? } else {?>
<td align="center"><FONT COLOR='#ffffff' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>.</strong></FONT></td>
<? }?>
<? if ($documentos[14]!=''){?>
<td align="center"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><a href="<? echo"$documentos[15]"?>" target="_blank"><? echo $documentos[14];?></a></strong></FONT></td>
<? } else {?>
<td align="center"><FONT COLOR='#ffffff' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>.</strong></FONT></td>
<? }?>

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
<button type="button" onClick="javascript:pdf('desglose_pdf.php?nom_delegacion=<?php echo "$nom_delegacion"; ?>&delegacion=<?php echo "$delegacion"; ?>')"><img src="extras/ico/pdf.jpg" width="40" height="40" /></button>
</td>
<td align="center">
<button type="button" onClick="javascript:pdf('desglose_excel.php?nom_delegacion=<?php echo "$nom_delegacion"; ?>&delegacion=<?php echo "$delegacion"; ?>')"><img src="extras/ico/excel.jpg" width="40" height="40" /></button>
</td>
</tr></table>
</form>
<? } else{
    
    $consulta=  mysql_query("select * from delegaciones where id_delegacion='$delegacion';");
    while($cejo= mysql_fetch_array($consulta)){
        $deleg_nom=$cejo[2];
        
    }
    ?>

<form name="desglose_dos" id="desglose_dos">
<div align="center">
<fieldset style="width:1700px">
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>PERSONAL SRE DELEGACION <? echo $deleg_nom;?></strong></font></legend>
<table width="1700px" border="">
<tr bgcolor="#efefef" align="center">
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>No.</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Nombre</strong></font></td>
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
<td colspan="6"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Documentos</strong></font></td>
</tr>
<tr bgcolor="#efefef" align="center">
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Estructura</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Eventual</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Honorarios</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Cédula</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Promesa</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>N. Delg</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>N. Sub-Delg</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Resp. Archivo</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Resp. Insumos</strong></font></td>
</tr>
<?
$consulta=mysql_query("select a.id_personal, l.nombre,  m.oems, concat(a.nombre_trabajador,' ',a.apellido_paterno,' ', a.apellido_materno),
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
where a.delegacion='$delegacion' and a.tipo_personal in ('PERSONAL SRE','PERSONAL SRE_DGD') and a.activo='1' order by a.id_plaza asc ;");
$filas=mysql_num_rows($consulta);
$i=0;
while ($i<$filas) {
while ($row= mysql_fetch_array($consulta)){
$i++;
$id=$row[0];
?>
<tr>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $i;?></font></td>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[3];?></font></td>
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
<? 
$consulta_doctos=mysql_query("select id_documento, id_trabajador, archivo_cip, url_cip, archivo_pc, url_pc, archivo_comision, url_comision, archivo_del, url_del, archivo_sub,
url_sub, archivo_archivo, url_archivo, archivo_insumos, url_insumos, fecha_upload
from tbl_doctos where id_trabajador='$id';");
while ($documentos= mysql_fetch_array($consulta_doctos)){

?>
<? if ($documentos[2]!=''){?>
<td align="center"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><a href="<? echo"$documentos[3]"?>" target="_blank"><? echo $documentos[2];?></a></strong></FONT></td>
<? } else {?>
<td align="center"><FONT COLOR='#ffffff' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>.</strong></FONT></td>
<? }?>
<? if ($documentos[4]!=''){?>
<td align="center"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><a href="<? echo"$documentos[5]"?>" target="_blank"><? echo $documentos[4];?></a></strong></FONT></td>
<? } else {?>
<td align="center"><FONT COLOR='#ffffff' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>.</strong></FONT></td>
<? }?>
<? if ($documentos[8]!=''){?>
<td align="center"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><a href="<? echo"$documentos[9]"?>" target="_blank"><? echo $documentos[8];?></a></strong></FONT></td>
<? } else {?>
<td align="center"><FONT COLOR='#ffffff' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>.</strong></FONT></td>
<? }?>
<? if ($documentos[10]!=''){?>
<td align="center"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><a href="<? echo"$documentos[11]"?>" target="_blank"><? echo $documentos[10];?></a></strong></FONT></td>
<? } else {?>
<td align="center"><FONT COLOR='#ffffff' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>.</strong></FONT></td>
<? }?>
<? if ($documentos[12]!=''){?>
<td align="center"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><a href="<? echo"$documentos[13]"?>" target="_blank"><? echo $documentos[12];?></a></strong></FONT></td>
<? } else {?>
<td align="center"><FONT COLOR='#ffffff' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>.</strong></FONT></td>
<? }?>
<? if ($documentos[14]!=''){?>
<td align="center"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><a href="<? echo"$documentos[15]"?>" target="_blank"><? echo $documentos[14];?></a></strong></FONT></td>
<? } else {?>
<td align="center"><FONT COLOR='#ffffff' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>.</strong></FONT></td>
<? }?>

<? }?>
</tr>
<?	
		}				
	}
?>
</table>
</fieldset>
</div>
&nbsp;&nbsp;&nbsp;&nbsp;
<div align="center">
<fieldset style="width:1700px">
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>PERSONAL COMISIONADO DELEGACION <? echo $deleg_nom;?></strong></font></legend>
<table width="1700px" border="">
<tr bgcolor="#efefef" align="center">
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>No.</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Nombre</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Cargo</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Ubicación Física</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Comisionado por</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Tipo de OFE</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Número de Oficio</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Fecha del Oficio</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Fecha Ingreso</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Area</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Actividades (Sólo Pasaportes)</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Observaciones</strong></font></td>
<td colspan="4"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Documentos</strong></font></td>
</tr>
</tr>
<tr bgcolor="#efefef" align="center">
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Cédula</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Promesa</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Oficio de Comisión</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Solicitud de Oficio de Comisión</strong></font></td>
</tr>
<? 
$consulta_comisionado=mysql_query("select a.id_personal, l.nombre,  m.oems, concat(a.nombre_trabajador,' ',a.apellido_paterno,' ', a.apellido_materno),
a.estructura, a.eventual, a.honorarios, n.oems, a.fecha_ingreso_sre, a.num_oficio, a.fecha_oficio, f.descripcion_nivel,
i.descripcion_plaza, d.descripcion_cargo, f.suedo_neto,  b.descripcion_area, c.descripcion_pasaportes, j.descripcion_rango,
a.fecha_ingreso_delegacion, o.tipo,a.lugar_fisico, z.descripcion
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
left join tipo_oems z on n.id_tipo=z.id_tipo_oems 
where a.delegacion='$delegacion' and a.tipo_personal='PERSONAL COMISIONADO' and a.activo='1'  order by  m.oems asc ;");
$filas_comisionado=mysql_num_rows($consulta_comisionado);
$a=0;
while ($a<$filas_comisionado) {
while ($row= mysql_fetch_array($consulta_comisionado)){
$a++;
$id=$row[0];
?>
<tr align="center">
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $a;?></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[3];?></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[13];?></font></td>
<? if ($row["lugar_fisico"]==0){?>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">DELEGACIÖN</font></td>
<? } else {?>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[2];?></font></td>
<? }?>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[7];?></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row["descripcion"];?></font></td>


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
<? 
$consulta_dos=mysql_query("select id_documento, id_trabajador, archivo_cip, url_cip, archivo_pc, url_pc, archivo_comision, url_comision, fecha_upload, archivo_sol, url_sol from tbl_doctos where id_trabajador='$id';");
while ($documentos= mysql_fetch_array($consulta_dos)){?>
<td><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><a href="<? echo"$documentos[3]"?>" target="_blank"><? echo $documentos[2];?></a></strong></FONT></td>
<td><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><a href="<? echo"$documentos[5]"?>" target="_blank"><? echo $documentos[4];?></a></strong></FONT></td>
<td><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><a href="<? echo"$documentos[7]"?>" target="_blank"><? echo $documentos[6];?></a></strong></FONT></td>
<td><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><a href="<? echo"$documentos[10]"?>" target="_blank"><? echo $documentos[9];?></a></strong></FONT></td>
<? }?>
</tr>
<?	
		}				
	}
?>
</table>

<table align="left">
<tr>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total de Personal SRE</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? $consulta1=mysql_query("SELECT count(delegacion) from tbl_personal where tipo_personal='PERSONAL SRE' and delegacion='$delegacion' and delegacion_oe='DELEGACION' and lugar_fisico='0' ;");
$filas1=mysql_num_rows($consulta1);
while ($row= mysql_fetch_array($consulta1)){
$conteo_sre=$row[0];
 }  echo $conteo_sre ?></strong></font></td>
</tr>
<tr>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total de Personal SRE Comisionado en las OFE's</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? $consulta2=mysql_query("SELECT count(observaciones) from tbl_personal where tipo_personal='PERSONAL SRE' and observaciones='10' and delegacion_oe='OFE' and lugar_fisico!='0' and delegacion='$delegacion';");
$filas2=mysql_num_rows($consulta2);
while ($row= mysql_fetch_array($consulta2)){
$conteo_comisionado_sre=$row[0];
 } echo $conteo_comisionado_sre;?></strong></font></td>
</tr>
<tr>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total de Personal Comisionado</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? $consulta4=mysql_query("SELECT count(delegacion) from tbl_personal where tipo_personal='PERSONAL COMISIONADO'  and delegacion='$delegacion';");
$filas4=mysql_num_rows($consulta4);
while ($row= mysql_fetch_array($consulta4)){
$conteo_comisionado_delegacion=$row[0];
 } 
 
 
 echo $conteo_comisionado_delegacion;
  ?></strong></font></td>
</tr>
<tr>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total de Personal Comisionado por OFE´s estatales</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? $consulta4=mysql_query("SELECT count(a.delegacion) from tbl_personal a left join oems b on id_oems=comisionado_por where tipo_personal='PERSONAL COMISIONADO' and comisionado_por !=0  and a.delegacion='$delegacion' and b.id_tipo='2';");
$filas4=mysql_num_rows($consulta4);
while ($row= mysql_fetch_array($consulta4)){
$conteo_comisionado_estatal=$row[0];
 } echo $conteo_comisionado_estatal;?></strong></font></td>
</tr>
<tr>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total de Personal Comisionado por OFE´s municipales</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? $consulta4=mysql_query("SELECT count(a.delegacion) from tbl_personal a left join oems b on id_oems=comisionado_por where tipo_personal='PERSONAL COMISIONADO'  and comisionado_por!=0 and a.delegacion='$delegacion' and b.id_tipo='1';");
$filas4=mysql_num_rows($consulta4);
while ($row= mysql_fetch_array($consulta4)){
$conteo_comisionado_municipal=$row[0];
 } echo $conteo_comisionado_municipal;?></strong></font></td>
</tr>

<tr>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total de Personal Comisionado en Delegación</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? $consulta999=mysql_query("SELECT count(a.delegacion) from tbl_personal a left join oems b on id_oems=comisionado_por where tipo_personal='PERSONAL COMISIONADO' and delegacion_oe='DELEGACION'  and comisionado_por!=0 and a.delegacion='$delegacion' and b.id_tipo in(1,2);");
$filas999=mysql_num_rows($consulta999);
while ($row= mysql_fetch_array($consulta999)){
$conteo_comisionado_municipal=$row[0];
 } echo $conteo_comisionado_municipal;?></strong></font></td>
</tr>

<!--
<tr>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total de Personal Comisionado por Vangent</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? $consulta4=mysql_query("SELECT count(a.delegacion) from tbl_personal a left join oems b on id_oems=comisionado_por where tipo_personal='PERSONAL COMISIONADO'  and comisionado_por=193 and a.delegacion='$delegacion' ;");
$filas4=mysql_num_rows($consulta4);
while ($row= mysql_fetch_array($consulta4)){
$conteo_comisionado_vangent=$row[0];
 } echo $conteo_comisionado_vangent;?></strong></font></td>
</tr> -->
</table>

</fieldset>
</div>
<table align="center">
<tr>
<td align="center">
<button type="button" onClick="javascript:pdf('desglose_pdf.php?nom_delegacion=<?php echo "$nom_delegacion"; ?>&delegacion=<?php echo "$delegacion"; ?>')"><img src="extras/ico/pdf.jpg" width="40" height="40" /></button>
</td></tr></table>


</form>
<? } }?>
</body>
</html>
