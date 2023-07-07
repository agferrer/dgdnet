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
<title>Guardar Asistencia</title>
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
$a=0;
$b=0;
while($a<count($id_trabajador) && $b<count($asis))
{
$a++;
$b++;
mysql_query("insert into tbl_asistencia (tipo_asis, fecha_asis, id_trabajador, fecha_captura)
values
('$asis[$b]', '$fecha_consulta', '$id_trabajador[$a]',  concat(curdate(),' ',curtime()));",$link);
$sSQL="insert into tbl_movimientos_usuarios (tipo_movimientos, id_trabajador_afectado,  usuario, fecha) values ('GUARDA LISTA', '$id_trabajador[$a]', '$user', concat(curdate(),' ',curtime())) ";
$result = mysql_query($sSQL,$link);
}

set_time_limit (60);

echo "<div id='progress' style='position:relative;padding:0px;width:500px;height:30px;left:400px;'>";
echo "C A R G A N D O...";
for ($i = 1; $i <= 10; $i++) {
    sleep(1);
	echo "<div align='center' style='float:left;margin:5px 0px 0px 10px;width:40px;height:50px;background:blue;color:blue;'> </div>";
    flush();
    ob_flush();
}
echo "</div>";
echo "<script>document.getElementById('progress').style.display = 'none'</script>";

?>

<div align="center">
<fieldset style="width:350px">
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>LOS DATOS SE GUARDARON CORRECTAMENTE</strong></font></legend>
<table align="center" width="350px" border="">
<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>¿QUÉ DESEAS HACER?</strong></FONT></td>
</tr>
<tr  bgcolor="#e5e5e5">
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><a href="consulta_fecha.php" target="derecho">CONSULTAR ASISTENCIA POR FECHA</a></FONT></td>
</tr>
<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><a href="frame_consulta_trabajador.php" target="derecho">CONSULTAR ASISTENCIA POR TRABAJADOR</a></FONT></td>
</tr>
<tr bgcolor="#e5e5e5">
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><a href="consulta_mensual.php" target="derecho">CONSULTA MENSUAL</a></FONT></td>
</tr>
</table>
</fieldset>
</div>
</body>
</html>
