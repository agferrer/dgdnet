<? ini_set("session.gc_maxlifetime","14400");  
session_start();
?>
<html>
<head>
<title>Detalle de Cálculo de Documentos</title>
</head>
<body>
<?
include('../../../conexionindra.php');
$mysqli = Conectarse();
$link = Conectarse2();
$user = $_SESSION["usuariow"];
?>
<script language="javascript">
function pdf (URL){
   window.open(URL,"ventana1","toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=5,resizable=5,width=300,height=300,scrollbars=NO")
}
</script>
<form name="detalle_calculo" id="detalle_calculo">
<div align="center">
<fieldset style="width:1100px">
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>PERSONAL QUE LE FALTA ALGUN TIPO DE DOCUMENTO</strong></font></legend>
<table width="1100px" border="">
<tr bgcolor="#efefef" align="center">
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Nombre</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Delegación</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Comisionado/SRE</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Documento Faltante</strong></font></td>
</tr>
<?
$consulta=mysql_query("select concat(apellido_paterno,' ',apellido_materno,' ',nombre_trabajador), b.nombre, tipo_personal
from tbl_personal a inner join delegaciones b on delegacion=id_delegacion
left join tbl_doctos c on id_trabajador=id_personal where tipo_personal in('PERSONAL SRE','PERSONAL COMISIONADO') and id_delegacion in(1,2,3,4,5,6,7,8,9,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,
30,31,32,33,34,35,36,38,39,40,41,51,54,55,209, 216) and archivo_cip ='' order by b.nombre, apellido_paterno, apellido_materno, nombre_trabajador asc;");
$filas=mysql_num_rows($consulta);
$a=0;
while ($row= mysql_fetch_array($consulta)){
?>
<tr>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $row[0];?></strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $row[1];?></strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $row[2];?></strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Cédula de identificación</strong></font></td>
</tr> 
            <?
			}
$consulta1=mysql_query("select concat(apellido_paterno,' ',apellido_materno,' ',nombre_trabajador), b.nombre, tipo_personal
from tbl_personal a inner join delegaciones b on delegacion=id_delegacion
left join tbl_doctos c on id_trabajador=id_personal where tipo_personal in('PERSONAL SRE','PERSONAL COMISIONADO') and id_delegacion in(1,2,3,4,5,6,7,8,9,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,
30,31,32,33,34,35,36,38,39,40,41,51,54,55,209, 216) and archivo_pc ='' order by b.nombre, apellido_paterno, apellido_materno, nombre_trabajador asc;");
$filas1=mysql_num_rows($consulta1);
while ($row= mysql_fetch_array($consulta1)){
?>
<tr>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $row[0];?></strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $row[1];?></strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $row[2];?></strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Promesa de Confidencialidad</strong></font></td>
</tr> 
            <?
			}
$consulta2=mysql_query("select concat(apellido_paterno,' ',apellido_materno,' ',nombre_trabajador), b.nombre, tipo_personal
from tbl_personal a inner join delegaciones b on delegacion=id_delegacion
left join tbl_doctos c on id_trabajador=id_personal where tipo_personal in('PERSONAL COMISIONADO') and id_delegacion in(1,2,3,4,5,6,7,8,9,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,
30,31,32,33,34,35,36,38,39,40,41,51,54,55,209, 216) and archivo_comision ='' order by b.nombre, apellido_paterno, apellido_materno, nombre_trabajador asc;");
$filas2=mysql_num_rows($consulta2);
while ($row= mysql_fetch_array($consulta2)){
?>
<tr>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $row[0];?></strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $row[1];?></strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $row[2];?></strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Oficio de Comisión</strong></font></td>
</tr> 
            <?
			}
	$total=$filas+$filas1+$filas2;		
?>	
<tr  bgcolor="#efefef">
<td colspan="10"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total de personas que les falta algun tipo de documento: <? echo $total;?></strong></font></td>
</tr>	

<script language="javascript">
function pdf (URL){
   window.open(URL,"ventana1","toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=5,resizable=5,width=300,height=300,scrollbars=NO")
}
</script>

</table>
<table align="center">
<tr>
<td align="center">
<button type="button" onClick="javascript:pdf('detalle_calculo_doctos_pdf.php')"><img src="extras/ico/pdf.jpg" width="40" height="40" /></button>
</td>
</tr></table>
</fieldset>
</div>
</form>

</body>
</html>
