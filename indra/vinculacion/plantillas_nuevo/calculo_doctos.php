<? ini_set("session.gc_maxlifetime","14400");  
session_start();
?>
<html>
<head>
<title>Cálculo de Documentos</title>
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
<form name="calculo" id="calculo">
<div align="center">
<fieldset style="width:1100px">
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>DESGLOSE DE DOCUMENTOS QUE SE TIENEN ARCHIVADOS</strong></font></legend>
<table width="1100px" border="">
<tr bgcolor="#efefef" align="center">
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Delegación</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total de Personal por Delegación</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total de Personal de la SRE por Delegación</strong></font></td>

<td colspan="4"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Personal SRE</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total de Personal Comisionado por Delegación</strong></font></td>
<td colspan="6"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Personal Comisionado</strong></font></td>
</tr>
<tr bgcolor="#efefef" align="center">
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Con Cédula de Identificación</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Sin Cédula de Identificación</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Con Promesa de Confidencialidad</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Sin Promesa de Confidencialidad</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Con Cédula de Identificación</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Sin Cédula de Identificación</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Con Promesa de Confidencialidad</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Sin Promesa de Confidencialidad</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Con Oficio de Comisión</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Sin Oficio de Comisión</strong></font></td>
</tr>
<?
if ($mysqli->multi_query("CALL sp_genera_calculo_doctos_vinculacion('$user')")) {
    do {
        if ($result = $mysqli->store_result()) {
            while ($row = $result->fetch_row()) {

$suma_deleg+=$row[1];
$suma_sre+=$row[2];
$suma_con_cedula_sre+=$row[4];
$suma_sin_cedula_sre+=$row[5];
$suma_con_promesa_sre+=$row[6];
$suma_sin_promesa_sre+=$row[7];
$suma_comisionado+=$row[3];
$suma_con_cedula_comisionado+=$row[8];
$suma_sin_cedula_comisionado+=$row[9];
$suma_con_promesa_comisionado+=$row[10];
$suma_sin_promesa_comisionado+=$row[11];
$suma_con_oficio_comisionado+=$row[12];
$suma_sin_oficio_comisionado+=$row[13];
?>
<tr>
<td bgcolor="#FFFFCC"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $row[0];?></strong></font></td>
<td bgcolor="#FFFFCC" align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $row[1];?></strong></font></td>
<td bgcolor="#FFFFCC" align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $row[2];?></strong></font></td>

<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[4];?></font></td>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[5];?></font></td>   
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[6];?></font></td>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[7];?></font></td>
<td bgcolor="#FFFFCC" align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><STRONG><? echo $row[3];?></STRONG></font></td>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[8];?></font></td>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[9];?></font></td>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[10];?></font></td>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[11];?></font></td>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[12];?></font></td>
<td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[13];?></font></td>
   
</tr> 
            <?
			
				}
            $result->close();
        }
    } while ($mysqli->next_result());
}
else {
    printf("<br />First Error: %s\n", $mysqli->error);
}

$mysqli->close();
?>
<script language="javascript">
function pdf (URL){
   window.open(URL,"ventana1","toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=5,resizable=5,width=300,height=300,scrollbars=YES")
}
</script>

<tr bgcolor="#efefef" align="center">
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>TOTAL</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $suma_deleg;?></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $suma_sre;?></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $suma_con_cedula_sre;?></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $suma_sin_cedula_sre;?></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $suma_con_promesa_sre;?></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $suma_sin_promesa_sre;?></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $suma_comisionado;?></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $suma_con_cedula_comisionado;?></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $suma_sin_cedula_comisionado;?></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $suma_con_promesa_comisionado;?></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $suma_sin_promesa_comisionado;?></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $suma_con_oficio_comisionado;?></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $suma_sin_oficio_comisionado;?></font></td>
</tr>

</table>
<table align="center">
<tr>
<td align="center">
<button type="button" onClick="javascript:pdf('calculo_doctos_pdf.php')"><img src="extras/ico/pdf.jpg" width="40" height="40" /></button>
</td>
<td align="center">
<a href="detalle_calculo_doctos.php" target="_blank"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Ver detalle de Faltantes</font></a></td></tr>
</table>
</fieldset>
</div>
</form>

</body>
</html>
