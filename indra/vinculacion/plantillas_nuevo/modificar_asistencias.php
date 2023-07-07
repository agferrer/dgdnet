<? ini_set("session.gc_maxlifetime","14400");  
session_start();
?>
<html>
<head>
<link rel="stylesheet" type="text/css" media="all" href="../../calendar-win2k-cold-1.css" title="win2k-cold-1" />
<script type="text/javascript" src="../../calendar.js"></script>
<script type="text/javascript" src="../../lang/calendar-es.js"></script>
<script type="text/javascript" src="../../calendar-setup.js"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<title>Consulta por Fecha</title>
</head>
<script type="text/javascript">

function validar(frm){
			
if(!frm.consulta_fecha.value != ""){
 window.alert("Favor de Ingresar la Fecha que desea Consultar la Asistencia.");
  		 frm.consulta_fecha.focus();
       return false
  	}				


	return true
}
function pdf (URL){
   window.open(URL,"ventana1","toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=5,resizable=5,width=300,height=300,scrollbars=NO")
}

</script>
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
<body onLoad="mueveReloj()">
<?
include('../../../conexionindra.php');
$mysqli = Conectarse();
$link = Conectarse2();
$num_delegacion = $_SESSION["cta_direccionw"];
$nom_delegacion = $_SESSION["direccionmw"];
$user = $_SESSION["usuariow"];
if (!isset($fecha_consulta))
	{
?>
<form name="consulta_fecha" id="consulta_fecha"  onSubmit="return validar(consulta_fecha)">
<div align="center">
<fieldset style="width:600px">
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>MODIFICAR ASISTENCIA</strong></font></legend>
<table width="600px">
<tr>
<td align="right"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Fecha a Consultar</FONT></td>
<td align="left"><input type="text" name="fecha_consulta" value="" id="fecha_consulta" />
<button type="reset" id="f_trigger_b"> <img src="../../../imagenes/feb.gif" width="16" height="20" border="0"></button>
<script type="text/javascript">
    Calendar.setup({
        inputField     :    "fecha_consulta",      
        ifFormat       :    "%Y-%m-%d",      
        showsTime      :    true,            
        button         :    "f_trigger_b",   
        singleClick    :    false,           
        step           :    1                
    });
	  </script> </td></tr>
<tr>
<td  colspan="2" align="center"><input type="submit" name="Submit" value="Buscar"></td>
</tr>
</table>
</table>
</fieldset></div>
</form>
<? }
else {
$consulta=mysql_query("select id_personal, delegacion, concat(apellido_paterno,' ', apellido_materno, ' ', nombre_trabajador), descripcion_cargo, tipo_asis, tipo
from tbl_personal a
inner join delegaciones b on id_delegacion=delegacion
inner join tbl_cargo c on c.id_cargo=a.id_cargo
inner join tbl_asistencia d on d.id_trabajador=id_personal
inner join tbl_tipo_asistencia e on e.id_tipo=d.tipo_asis
where fecha_asis='$fecha_consulta' and delegacion='$num_delegacion' and tipo_personal='PERSONAL COMISIONADO' and lugar_fisico='0' and a.activo=1 order by apellido_paterno asc;");
$filas=mysql_num_rows($consulta);

if($filas=='0'){
?>
<form name="pasa_lista" method="post" id="pasa_lista" action=""  onSubmit="return verifica()">
<div align="center">
<fieldset style="width:750px">
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>No existe asistencia capturada en este día</strong></font></legend>
</fieldset>
</div>
</form>
<? } else {?>
<form name="pasa_lista" method="post" id="pasa_lista" action="save_modi_asis.php"  onSubmit="return verifica()">
<div align="center">
<fieldset style="width:750px">
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>MODIFICACIÓN DE ASISTENCIA DEL DÍA <? echo $fecha_consulta;?> DE LA DELEGACIÓN <? echo $nom_delegacion;?></strong></font></legend>
<table width="750px" border="">
<tr>
<td align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>No.</strong></FONT></td>
<td align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>NOMBRE</strong></FONT></td>
<td align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>CARGO</strong></FONT></td>
<td align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>CONCEPTO</strong></FONT></td>
</tr>
<?
$consulta=mysql_query("select id_personal, delegacion, concat(apellido_paterno,' ', apellido_materno, ' ', nombre_trabajador), descripcion_cargo, tipo_asis, tipo, 
id_asistencia
from tbl_personal a
inner join delegaciones b on id_delegacion=delegacion
inner join tbl_cargo c on c.id_cargo=a.id_cargo
inner join tbl_asistencia d on d.id_trabajador=id_personal
inner join tbl_tipo_asistencia e on e.id_tipo=d.tipo_asis
where fecha_asis='$fecha_consulta' and delegacion='$num_delegacion' and tipo_personal='PERSONAL COMISIONADO' and lugar_fisico='0' and a.activo=1 order by apellido_paterno asc;");	
$filas=mysql_num_rows($consulta);
$i=0;

 while ($i<$filas)
	  {
	  
	 		while ($row= mysql_fetch_array($consulta)){
					$i++;	

echo"<tr>";
echo"<td align='center'><FONT COLOR='#000000' size='2' face='Verdana, Arial, Helvetica, sans-serif'>$i</FONT></td>";
echo"<td><FONT COLOR='#000000' size='2' face='Verdana, Arial, Helvetica, sans-serif'>$row[2]</FONT></td>";
echo"<td><FONT COLOR='#000000' size='2' face='Verdana, Arial, Helvetica, sans-serif'>$row[3]</FONT></td>";
echo"<input type='hidden' name='id[$i]' id='id' value='$row[6]'  class='required'>"; 
echo"<td><select name='asis[$i]' id= 'asis' style='width:350px' class='required'>"; 
echo"<option selected='selected' value='$row[4]'>$row[5]</option>";
echo"<option  value=''style='background-color:#eeeeee'>SELECCIONA OTRA</option>";
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
<td><input type="submit" name="Submit" value="Modificar Asistencia"><input type="hidden" name="fecha_consulta" value="<? echo $fecha_consulta;?>"></td>
<td><input type="text" name="reloj" size="10"></td></tr></table>
</fieldset>
</div>
</form>
<? }?>
<? }?> 	
</body>
</html>
