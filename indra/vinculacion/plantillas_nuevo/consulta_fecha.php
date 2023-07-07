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
<body>
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
<?
include('../../../conexionindra.php');
$mysqli = Conectarse();
$link = Conectarse2();
$num_delegacion = $_SESSION["cta_direccionw"];
$nom_delegacion = $_SESSION["direccionmw"];
$user = $_SESSION["usuariow"];
$hoy=strftime("%Y-%m-%d");
if (!isset($fecha_consulta))
	{
?>
<form name="consulta_fecha" id="consulta_fecha"  onSubmit="return validar(consulta_fecha)">
<div align="center">
<fieldset style="width:600px">
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>CONSULTA DE ASISTENCIA POR FECHA</strong></font></legend>
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
else {?>
<form name="consulta_dos" id="_dos">
<div align="center">
<fieldset style="width:700px">
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>CONSULTA DE ASISTENCIA POR FECHA</strong></font></legend>
<table width="700px" border="">
<tr bgcolor="#efefef" align="center">
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>No.</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Nombre</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Cargo</strong></font></td> 
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Tipo de Asistencia</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Fecha</strong></font></td>
</tr>
<tr>
</tr>
<?
$consulta=mysql_query("select a.id_personal, concat(a.apellido_paterno,' ', a.apellido_materno, ' ', a.nombre_trabajador), b.descripcion_cargo, c.tipo, d.fecha_asis
from tbl_personal a inner join tbl_cargo b on a.id_cargo=b.id_cargo inner join tbl_asistencia d on d.id_trabajador=a.id_personal
inner join tbl_tipo_asistencia c on d.tipo_asis=c.id_tipo where a.delegacion='$num_delegacion' and a.tipo_personal='PERSONAL COMISIONADO' and
fecha_asis='$fecha_consulta' and lugar_fisico='0' and a.activo=1;");
$filas=mysql_num_rows($consulta);
$i=0;
while ($i<$filas) {
while ($row= mysql_fetch_array($consulta)){
$i++;
?>
<tr>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $i;?></font></td>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></font></td>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[2];?></font></td>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[3];?></font></td>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[4];?></font></td>
</tr>
<? }}?>
</table>
</fieldset>
</div>
<table align="center">
<tr>
<td align="center">
<button type="button" onClick="javascript:pdf('consulta_fecha_pdf.php?num_delegacion=<?php echo "$num_delegacion"; ?>&fecha_consulta=<?php echo "$fecha_consulta"; ?>')"><img src="extras/ico/pdf.jpg" width="40" height="40" /></button>
</td></tr></table>

</form>
<? }?> 	
</body>
</html>
