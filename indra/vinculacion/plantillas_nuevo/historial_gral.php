<? ini_set("session.gc_maxlifetime","14400");  
session_start();?>
<head>
<title>Historial del Trabajador</title>
</head>
<body>
<?
include('../../../conexionindra.php');
$mysqli = Conectarse();
$link = Conectarse2();
$consulta=mysql_query("select concat(nombre_trabajador, ' ', apellido_paterno,' ', apellido_materno), b.nombre, id_personal, tipo_personal, 
c.descripcion_cargo, delegacion_oe, oems, fecha_ingreso_sre, nombre_trabajador, apellido_paterno, apellido_materno from tbl_personal a
left join delegaciones b on a.delegacion=b.id_delegacion left join tbl_cargo c on a.id_cargo=c.id_cargo left join oems on lugar_fisico=id_oems 
where id_personal='$identificador';");
while ($row= mysql_fetch_array($consulta)){	
$nom=$row["nombre_trabajador"];
$ap=$row["apellido_paterno"];
$am=$row["apellido_materno"];
?>
<div align="center">
<fieldset style="width:500px">
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>DATOS DEL TRABAJADOR</strong></font></legend>
<table border='' width="500px">
<tr>
<td><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Nombre Completo</strong></FONT></td>
<td><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[0];?></FONT></td>
</tr>
<tr>
<td><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Ultima Delegación asignada</strong></FONT></td>
<td><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></FONT></td>
</tr>
<tr>
<td><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Tipo de Personal</strong> </FONT></td>
<td><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[3];?></FONT></td>
</tr>
<tr>
<td><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Descripción del Ultimo Cargo</strong></FONT></td>
<td><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[4];?></FONT></td>
</tr>
<tr>
<td><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Fisicamente en </strong></FONT></td>
<td><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[5];?></FONT></td>
</tr>
<tr>
<td><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong> Oficina de Enlace </strong></FONT></td>
<td><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[6];?></FONT></td>
</tr>
<tr>
<td><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Fecha de ingreso</strong></FONT></td>
<td><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[7];?></FONT></td>
</tr>
</table>
</fieldset>
</div>
<? }?>

<div align="center">
<fieldset style="width:700px">
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>HISTORIAL LABORAL </strong></font></legend>
<table border='' width="700px">
<TR>
<td align="center"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Delegación</strong></FONT></td>
<td align="center"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Plaza</strong></FONT></td>
<td align="center"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Cargo</strong></FONT></td>
<td align="center"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Fecha del Movimiento</strong></FONT></td>
</TR>
<?
$consulta1=mysql_query("select  b.nombre, x.descripcion_plaza, c.descripcion_cargo, fecha_ingreso_tabla_secundaria from tbl_historial_personal a
left join delegaciones b on a.delegacion=b.id_delegacion left join tbl_cargo c on a.id_cargo=c.id_cargo
left join oems on lugar_fisico=id_oems left join tbl_plaza x on a.id_plaza=x.id_plaza
where nombre_trabajador = '$nom' and apellido_paterno = '$ap' and apellido_materno = '$am'  order by id_movimiento desc;");
while ($row= mysql_fetch_array($consulta1)){
$total=mysql_num_rows($consulta1);
?>
<TR>
<td align="center"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[0];?></FONT></td>
<td align="center"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></FONT></td>
<td align="center"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[2];?></FONT></td>
<td align="center"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[3];?></FONT></td>
</tr>
<? }?>
</table>
</fieldset>
</div>


<div align="center">
<fieldset style="width:700px">
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>CURSO EN LOS QUE HA PARTICIPADO </strong></font></legend>
<table border='' width="700px">
<TR>
<td align="center"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Evento</strong></FONT></td>
<td align="center"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Calificacion</strong></FONT></td>
<td align="center"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Fecha</strong></FONT></td>
<td align="center"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Constancia</strong></FONT></td>
<td align="center"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Acuse de Recibo</strong></FONT></td>
</TR>
<?
$consulta1=mysql_query("select nombre_evento, calificacion, constancia, acuse_recibo, fecha_evento from cursos_trabajador
inner join evento_curso on id_evento=curso inner join tbl_personal z on id_personal=id_trabajador 
where id_personal='$identificador';");
while ($row= mysql_fetch_array($consulta1)){
$total=mysql_num_rows($consulta1);
?>
<TR>
<td align="center"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[0];?></FONT></td>
<td align="center"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></FONT></td>
<td align="center"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row["fecha_evento"];?></FONT></td>
<? if($row[2]=='on'){?>
<td align="center"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">SI</FONT></td>
<? }else{?>
<td align="center"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">NO</FONT></td><? }?>
<? if($row[3]=='on'){?>
<td align="center"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">SI</FONT></td>
<? }else{?>
<td align="center"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">NO</FONT></td><? }?>
</TR>
<? }?>
<tr>
<td colspan="5" align="right"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total de Cursos Tomados: <? echo $total;?></strong></FONT></td>
</tr>
<tr>
<td colspan="5" align="center"><input type="button" name="cerrar" value="Cerrar" onClick="javascript:window.close();"></td>
</tr>
</table>

</fieldset>
</div>
</body>
</html>
