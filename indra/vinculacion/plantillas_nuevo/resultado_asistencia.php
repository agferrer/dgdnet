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
<fieldset style="width:400px">
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>CONSULTA DE ASISTENCIA POR TRABAJADOR</strong></font></legend>
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $trabajador;?></strong></font></legend>
<table width="400px">
<tr bgcolor="#efefef" align="center">
<td align="center"><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>No.</strong></font></td>
<td align="center"><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Día de Asistencia</strong></font></td>
<td align="center"><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Tipo de Asistencia</strong></font></td>
</tr>
<?
$consulta2=mysql_query("select a.fecha_asis, b.tipo from tbl_asistencia a
inner join tbl_personal c on a.id_trabajador=c.id_personal
inner join tbl_tipo_asistencia b on b.id_tipo= a.tipo_asis
where c.nombre_trabajador='$nombre_personal' and
c.apellido_paterno='$apellido_p'
and c.apellido_materno='$apellido_m' order by a.fecha_asis asc;");
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
<TR>
<TD ALIGN='center'><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'><? echo $i;?></font></TD>
<TD ALIGN='center'><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'><? echo $row[0];?></FONT></TD>
<TD ALIGN='center'><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'><? echo $row[1];?></FONT></TD>

<? } }?>
</TR>
</table>
</fieldset>
</div>
<table align="center">
<tr>
<td align="center">
<a href="resultado_asistencia_pdf.php?nombre_personal=<?php echo "$nombre_personal"; ?>&apellido_p=<?php echo "$apellido_p"; ?>&apellido_m=<?php echo "$apellido_m"; ?>" target="_blank"><img src="extras/ico/pdf.jpg" width="40" height="40" /></a>
</td></tr></table>
</form>
<? }?>
</body>
</html>
