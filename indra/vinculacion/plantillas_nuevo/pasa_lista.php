<? 
ini_set("session.gc_maxlifetime","14400");  
session_start();
?>
<html>
<script>
function mueveReloj()
    {
     momentoActual = new Date()
     hora = momentoActual.getHours()
     minuto = momentoActual.getMinutes()
     segundo = momentoActual.getSeconds()
     horaImprimible = hora + " : " + minuto + " : " + segundo
     document.pasa_lista.reloj.value = horaImprimible
     setTimeout("mueveReloj()",1000)
    }
</script>
<script type="text/javascript">
function verifica(donde){
if(document.getElementById("asis").value==""){
	alert("Debe de especificar que tipo de asistencia tiene el trabajador");
	return false
	}
}
</script>
<head>
<title>Asistencias</title>
</head>
<body onLoad="mueveReloj()">

<?php
include('../../../conexionindra.php');
$mysqli = Conectarse();
$link = Conectarse2();
$num_delegacion = $_SESSION["cta_direccionw"];
$nom_delegacion = $_SESSION["direccionmw"];
$user = $_SESSION["usuariow"];
$hoy=strftime("%Y-%m-%d");
$sSQL="insert into tbl_movimientos_usuarios (tipo_movimientos, id_trabajador_afectado,  usuario, fecha) values ('PASA DE LISTA', '0', '$user', concat(curdate(),' ',curtime())) ";
$result = mysql_query($sSQL,$link);
$consulta=mysql_query("select a.id_trabajador, fecha_asis from tbl_asistencia a inner join tbl_personal b on b.id_personal=a.id_trabajador  where b.delegacion='$num_delegacion' and fecha_asis='$hoy';");
$filas=mysql_num_rows($consulta);

if($filas!=0){
?>
<form name="pasa_lista" method="post" id="pasa_lista" action="save_pasa_lista.php"  onSubmit="return verifica()">
<div align="center">
<fieldset style="width:750px">
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>En el sistema ya existe el registro de que pasaron lista correspondiente a este día</strong></font></legend>
</fieldset>
</div>
</form>
<? } else {?>
<form name="pasa_lista" method="post" id="pasa_lista" action="save_pasa_lista.php"  onSubmit="return verifica()">
<div align="center">
<fieldset style="width:750px">
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>ASISTENCIA DEL DÍA <? echo $hoy;?> DE LA DELEGACIÓN <? echo $nom_delegacion;?></strong></font></legend>
<table width="750px" border="">
<tr>
<td align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>No.</strong></FONT></td>
<td align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>NOMBRE</strong></FONT></td>
<td align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>CARGO</strong></FONT></td>
<td align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>CONCEPTO</strong></FONT></td>
</tr>
<?
$consulta=mysql_query("select id_personal, delegacion, concat(apellido_paterno,' ', apellido_materno, ' ', nombre_trabajador), descripcion_cargo from tbl_personal a
inner join delegaciones b on id_delegacion=delegacion
inner join tbl_cargo c on c.id_cargo=a.id_cargo
where delegacion='$num_delegacion' and tipo_personal='PERSONAL COMISIONADO' and lugar_fisico='0' and activo='1' order by apellido_paterno asc;");

$filas=mysql_num_rows($consulta);
$i=0;
 while ($i<$filas)
	  {
	  
	 		while ($row= mysql_fetch_array($consulta)){
					$i++;	

echo"<tr>";
echo"<td align='center'><FONT COLOR='#000000' size='2' face='Verdana, Arial, Helvetica, sans-serif'>$i</FONT></td>";
echo"<input type='hidden' name='id_trabajador[$i]' id='id_trabajador' value='$row[0]'>";
echo"<td><FONT COLOR='#000000' size='2' face='Verdana, Arial, Helvetica, sans-serif'>$row[2]</FONT></td>";
echo"<td><FONT COLOR='#000000' size='2' face='Verdana, Arial, Helvetica, sans-serif'>$row[3]</FONT></td>";
echo"<td><select name='asis[$i]' id= 'asis' style='width:350px' class='required'>"; 
echo"<option value=>Seleccionar</option>";
$sql3 = "SELECT id_tipo, tipo  FROM tbl_tipo_asistencia where categoria in (1)";
$result3 = mysql_query($sql3,$link);
while (list($id_tipo,$tipo)=mysql_fetch_array($result3))
		{
		echo "<option value='$id_tipo'>$tipo</option>";
		} 
echo "</select></td>";

}
}

?>
</table>
<table>
<tr>
<td><input type="submit" name="Submit" value="Guardar Asistencia"></td>
<td><input type="text" name="reloj" size="10"></td></tr></table>
</fieldset>
</div>
</form>
<? }?>
</body>
</html>
