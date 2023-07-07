<html>
<head>
<title>Consulta de Asistencia</title>
</head>
<body>
<?
include('../../../conexionindra.php');
$mysqli = Conectarse();
$link = Conectarse2();
?>
<div align="center">
<fieldset style="width:350px">
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>LOS DATOS SE GUARDARON CORRECTAMENTE</strong></font></legend>
<table align="center" width="350px" border="">
<tr align="center">
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>¿QUÉ DESEAS HACER?</strong></FONT></td>
</tr>
<tr align="center"  bgcolor="#e5e5e5">
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><a href="consulta_fecha.php" target="derecho">CONSULTAR ASISTENCIA POR FECHA</a></FONT></td>
</tr>
<tr align="center">
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><a href="frame_consulta_trabajador.php" target="derecho">CONSULTAR ASISTENCIA POR TRABAJADOR</a></FONT></td>
</tr>
<tr align="center"  bgcolor="#e5e5e5">
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><a href="consulta_mensual.php" target="derecho">CONSULTA MENSUAL</a></FONT></td>
</tr>
<? $consulta2=mysql_query("select id_restriccion,restriccion,activado from restricciones where id_restriccion='4';");
$filas2=mysql_num_rows($consulta2);
while ($row= mysql_fetch_array($consulta2)){
if($row[2]==1){?>
<tr align="center">
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><a href="agregar_asistencias.php" target="derecho">CAPTURAR ASISTENCIA DE DIAS PASADOS</a></FONT></td>
</tr>
<? }}?>
<tr align="center" bgcolor="#e5e5e5">
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><a href="modificar_asistencias.php" target="derecho">MODIFICAR ASISTENCIA</a></FONT></td>
</tr>
</table>
</fieldset>
</div>
</body>
</html>
