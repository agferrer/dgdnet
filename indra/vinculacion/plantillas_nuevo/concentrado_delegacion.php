<? ini_set("session.gc_maxlifetime","14400");  
session_start();
?>
<html>
<head>
<title>Concentrado de Personal por Delegación</title>
<script type="text/javascript">


function validar(frm){
			
if(!frm.delegacion.value != ""){
 window.alert("Favor de seleccionar la Delegación.");
  		 frm.delegacion.focus();
       return false
  	}				


	return true
}

function pdf (URL){
   window.open(URL,"ventana1","toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=5,resizable=5,width=300,height=300,scrollbars=NO")
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
<form name="concentrado" id="concentrado"  onSubmit="return validar(concentrado)">
<div align="center">
<fieldset style="width:600px">
<?php if (($_SESSION["nivelw"]==4)||($_SESSION["nivelw"]==8)||($_SESSION["nivelw"]=='42')||($_SESSION["nivelw"]=='43')||($_SESSION["nivelw"]=='24')||($_SESSION["nivelw"]==40)||($_SESSION["nivelw"]==35)||($_SESSION["nivelw"]==46)||($_SESSION["nivelw"]==44)){?>
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>CONCENTRADO DEL PERSONAL<input type="hidden" name="nom_delegacion" id="nom_delegacion" value="<? echo $nom_delegacion;?>"></strong></font></legend>
<table width="600px">
<tr>
<td align="right"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Delegación</FONT></td>
<td align="left"><select name="delegacion" id="delegacion" style="width:300px">
<option selected="selected" value=>Seleccione</option>
<option value='TODAS'>Todas</option>

<?php
$sql3 = "select id_delegacion, nombre from delegaciones where tipo_delegg in(10,9) and aactivo='1' order by id_delegacion asc";
$result3 = mysql_query($sql3,$link);
while (list($id_delegacion,$nombre)=mysql_fetch_array($result3))
{
echo "<option value='$id_delegacion'>$nombre</option>";
} 
?>
</select></td></tr>
<? } if (($_SESSION["nivelw"]==9)||($_SESSION["nivelw"]==45)){?>
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>CONCENTRADO DEL PERSONAL POR DELEGACION <? echo $nom_delegacion;?><input type="hidden" name="delegacion" id="delegacion" value="<? echo $num_delegacion;?>"> </strong></font></legend>

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
else
{
if($delegacion!='TODAS'){
$consulta=mysql_query("select nombre_mayus from delegaciones where id_delegacion='$delegacion';");
$filas=mysql_num_rows($consulta);
while ($row= mysql_fetch_array($consulta)){
$deleg_nom=$row[0];
 }
$consulta1=mysql_query("SELECT count(delegacion) from tbl_personal where tipo_personal='PERSONAL SRE' and delegacion='$delegacion' and delegacion_oe='DELEGACION' and lugar_fisico='0' ;");
$filas1=mysql_num_rows($consulta1);
while ($row= mysql_fetch_array($consulta1)){
$conteo_sre=$row[0];
 }
$consulta2=mysql_query("SELECT count(observaciones) from tbl_personal where tipo_personal='PERSONAL SRE' and observaciones='10' and delegacion_oe='OFE' and lugar_fisico!='0' and delegacion='$delegacion';");
$filas2=mysql_num_rows($consulta2);
while ($row= mysql_fetch_array($consulta2)){
$conteo_comisionado_sre=$row[0];
 } 

$consulta4=mysql_query("SELECT count(delegacion) from tbl_personal where tipo_personal='PERSONAL COMISIONADO' and delegacion_oe='DELEGACION' and lugar_fisico='0' and delegacion='$delegacion';");
$filas4=mysql_num_rows($consulta4);
while ($row= mysql_fetch_array($consulta4)){
$conteo_comisionado_delegacion=$row[0];
 } 
$consulta5=mysql_query("SELECT count(delegacion) from tbl_personal where tipo_personal='PERSONAL COMISIONADO' and delegacion_oe='OFE' and lugar_fisico!='0' and delegacion='$delegacion';");
$filas5=mysql_num_rows($consulta5);
while ($row= mysql_fetch_array($consulta5)){
$conteo_comisionado_ofe=$row[0];
 } 
$consulta7=mysql_query("SELECT count(delegacion) from tbl_personal where delegacion='$delegacion';");
$filas7=mysql_num_rows($consulta7);
while ($row= mysql_fetch_array($consulta7)){
$total_delegacion=$row[0];
 }
  
 ?>
		
<form name="concentracion_delegacion" id="concentracion_delegacion">
<div align="center">
<fieldset style="width:1200px">
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>DELEGACIÓN: <? echo $deleg_nom;?></strong></font></legend>
<table width="1200px" border="">
<tr bgcolor="#efefef">
<td colspan="2" align="left"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>PERSONAL SRE EN DELEGACIÓN: <? echo $conteo_sre;?></strong></font></td></tr>	
<tr bgcolor="#efefef">
<td colspan="2" align="left"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>COMISIONADO SRE EN OFE: <? echo $conteo_comisionado_sre;?></strong></font></td></tr>
<? 
$consulta3=mysql_query("select oems, count(id_personal) from tbl_personal a inner join oems on lugar_fisico=id_oems where tipo_personal='PERSONAL SRE'
and a.delegacion='$delegacion' and lugar_fisico!='0' group by lugar_fisico;;");
$filas3=mysql_num_rows($consulta3);
while ($row= mysql_fetch_array($consulta3)){
$desglose_sre_oes=$row[0];
$conteo_sre_oes=$row[1];
?>
<tr>
<td colspan="2" align="left"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $desglose_sre_oes.': '.$conteo_sre_oes;?></strong></font></td></tr><? } ?>
<tr bgcolor="#efefef">
<td colspan="2" align="left"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>COMISIONADO EN DELEGACIÓN: <? echo $conteo_comisionado_delegacion;?></strong></font></td>
</tr>	
<tr bgcolor="#efefef">
<td colspan="2" align="left"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>COMISIONADO EN OFE: <? echo $conteo_comisionado_ofe;?></strong></font></td>
</tr>	
<? 
$consulta6=mysql_query("select oems, count(id_personal) from tbl_personal a inner join oems on lugar_fisico=id_oems where tipo_personal='PERSONAL COMISIONADO'
and a.delegacion='$delegacion' and lugar_fisico!='0' group by lugar_fisico;;");
$filas6=mysql_num_rows($consulta6);
while ($row= mysql_fetch_array($consulta6)){
$desglose_comisionado_oes=$row[0];
$conteo_comisionado_oes=$row[1];
?>
<tr>
<td colspan="2" align="left"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $desglose_comisionado_oes.': '.$conteo_comisionado_oes;?></strong></font></td>
</tr><? } ?>
<tr bgcolor="#efefef">
<td colspan="2" align="left"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>TOTAL PERSONAL SRE: <? echo $conteo_sre+$conteo_comisionado_sre;?></strong></font></td>
</tr>
<tr bgcolor="#efefef">
<td colspan="2" align="left"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>TOTAL PERSONAL COMISIONADO: <? echo $conteo_comisionado_delegacion+$conteo_comisionado_ofe;?></strong></font></td></tr>
<tr bgcolor="#efefef">
<td colspan="2" align="left"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>TOTAL GENERAL: <? echo $conteo_sre+$conteo_comisionado_sre+$conteo_comisionado_delegacion+$conteo_comisionado_ofe;?></strong></font></td></tr>	
</table>
<br>
<table width="1200px" border="">
<tr>
<TD>
	<table width="590px" border="">
	<tr bgcolor="#efefef">
	<td colspan="2" align="CENTER"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>DESGLOSE SRE</strong></font></td></tr>
	<tr>
	<TD>
		<table width="590px" border="">
		<tr bgcolor="#efefef">
		<td colspan="2" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>CARGOS</strong></font></td></tr>
		
<? 
$consulta8=mysql_query("select descripcion_cargo, count(a.id_cargo) from tbl_personal a inner join tbl_cargo b on a.id_cargo=b.id_cargo
where tipo_personal='PERSONAL SRE' and delegacion='$delegacion'  group by a.id_cargo order by b.id_cargo;");
$filas8=mysql_num_rows($consulta8);
while ($row= mysql_fetch_array($consulta8)){
$suma8+=$row[1];
?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[0];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></font></td>
</tr>
<? }?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $suma8;?></strong></font></td>
</tr>
</table>
<BR>
<table width="590px" border="">
		<tr bgcolor="#efefef">
		<td colspan="2" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>PLAZA</strong></font></td></tr>
		
<? 
$consulta9=mysql_query("select descripcion_plaza, count(a.id_plaza) from tbl_personal a inner join tbl_plaza b on a.id_plaza=b.id_plaza
where tipo_personal='PERSONAL SRE' and delegacion='$delegacion'  group by a.id_plaza order by b.id_plaza;");
$filas9=mysql_num_rows($consulta9);
while ($row= mysql_fetch_array($consulta9)){
$suma9+=$row[1];
?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[0];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></font></td>
</tr>
<? }?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $suma9;?></strong></font></td>
</tr>
</table>

<BR>
<table width="590px" border="">
		<tr bgcolor="#efefef">
		<td colspan="4" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>DESGLOSE NIVEL </strong></font></td></tr>
		<tr>
		<td colspan="4" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">MANDOS MEDIOS</font></td></tr>
<? 
$consulta10=mysql_query("select descripcion_nivel, count(a.id_nivel),b.suedo_neto from tbl_personal a inner join tbl_nivel b on a.id_nivel=b.id_nivel
where tipo_personal='PERSONAL SRE' and delegacion='$delegacion' and b.id_nivel between '1' and '57'  group by a.id_nivel order by b.id_nivel");
$filas10=mysql_num_rows($consulta10);
while ($row= mysql_fetch_array($consulta10)){
$suma_mandos+=$row[2];
$multiplicacion_mandos=$row[1]*$row[2];
$total_mandos+=$multiplicacion_mandos;
$suma10+=$row[1];
?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[0];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">$ <? echo $row[2];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">$ <? echo $multiplicacion_mandos;?></font></td>
</tr>
<? }?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $suma10;?></strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>$ <? echo $suma_mandos;?></strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>$ <? echo $total_mandos;?></strong></font></td>
</tr>
<tr>
		<td colspan="4" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">OPERATIVOS ZONA II</font></td></tr>
<? 
$consulta11=mysql_query("select descripcion_nivel, count(a.id_nivel),suedo_neto from tbl_personal a inner join tbl_nivel b on a.id_nivel=b.id_nivel
where tipo_personal='PERSONAL SRE' and delegacion='$delegacion' and b.id_nivel between '58' and '68'  group by a.id_nivel order by b.id_nivel");
$filas11=mysql_num_rows($consulta11);
while ($row= mysql_fetch_array($consulta11)){
$suma_op2+=$row[2];
$multiplicacion_op2=$row[1]*$row[2];
$total_op2+=$multiplicacion_op2;
$suma11+=$row[1];
?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[0];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">$ <? echo $row[2];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">$ <? echo $multiplicacion_op2;?></font></td></tr>
<? }?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $suma11;?></strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>$ <? echo $suma_op2;?></strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>$ <? echo $total_op2;?></strong></font></td>

</tr>
<tr>
		<td colspan="4" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">OPERATIVOS ZONA III</font></td></tr>
<? 
$consulta12=mysql_query("select descripcion_nivel, count(a.id_nivel),suedo_neto from tbl_personal a inner join tbl_nivel b on a.id_nivel=b.id_nivel
where tipo_personal='PERSONAL SRE' and delegacion='$delegacion' and b.id_nivel between '69' and '79'  group by a.id_nivel order by b.id_nivel");
$filas12=mysql_num_rows($consulta12);
while ($row= mysql_fetch_array($consulta12)){
$suma_op3+=$row[2];
$multiplicacion_op3=$row[1]*$row[2];
$total_op3+=$multiplicacion_op3;
$suma12+=$row[1];
?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[0];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">$ <? echo $row[2];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">$ <? echo $multiplicacion_op3;?></font></td></tr>
<? }?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $suma12;?></strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>$ <? echo $suma_op3;?></strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>$ <? echo $total_op3;?></strong></font></td>
</tr>
</table>
<BR>
<table width="590px" border="">
		<tr bgcolor="#efefef">
		<td colspan="2" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>NIVEL</strong></font></td></tr>
	
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">Mandos Medios</font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $suma10;?></font></td>
</tr>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">Operativos</font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $suma11+$suma12;?></font></td>
</tr>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $suma10+$suma11+$suma12;?></strong></font></td>
</tr>
</table>
<BR>
<table width="590px" border="">
		<tr bgcolor="#efefef">
		<td colspan="2" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>TIPO DE PLAZA</strong></font></td></tr>
<? 
$consulta13=mysql_query("select count(estructura) from tbl_personal where tipo_personal='PERSONAL SRE' and delegacion='$delegacion' and estructura='on'");
while ($row= mysql_fetch_array($consulta13)){$estructura=$row[0];}
$consulta14=mysql_query("select count(eventual) from tbl_personal where tipo_personal='PERSONAL SRE' and delegacion='$delegacion' and eventual='on'");
while ($row= mysql_fetch_array($consulta14)){$eventual=$row[0];}
$consulta15=mysql_query("select count(honorarios) from tbl_personal where tipo_personal='PERSONAL SRE' and delegacion='$delegacion' and honorarios='on'");
while ($row= mysql_fetch_array($consulta15)){$honorarios=$row[0];}

?>	
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">Estructura</font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $estructura;?></font></td>
</tr>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">Eventual</font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $eventual;?></font></td>
</tr>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">Honorarios</font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $honorarios;?></font></td>
</tr>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $estructura+$eventual+$honorarios;?></strong></font></td>
</tr>
</table>
<BR>
<table width="590px" border="">
		<tr bgcolor="#efefef">
		<td colspan="2" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>SEM</strong></font></td></tr>
		<tr>
		<td colspan="4" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">DIPLOMÁTICO-CONSULAR</font></td></tr>
		
<? 
$consulta16=mysql_query("select descripcion_rango, count(a.id_rango) from tbl_personal a inner join tbl_rango b on a.id_rango=b.id_rango
where tipo_personal='PERSONAL SRE' and delegacion='$delegacion' and b.id_rango between '1' and '7'  group by a.id_rango order by b.id_rango;");
$filas16=mysql_num_rows($consulta16);
while ($row= mysql_fetch_array($consulta16)){
$suma16+=$row[1];
?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[0];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></font></td>
</tr>
<? }?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $suma16;?></strong></font></td>
</tr>
<tr>
		<td colspan="4" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">TÉCNICO-ADMINISTRATIVO</font></td></tr>
		
<? 
$consulta17=mysql_query("select descripcion_rango, count(a.id_rango) from tbl_personal a inner join tbl_rango b on a.id_rango=b.id_rango
where tipo_personal='PERSONAL SRE' and delegacion='$delegacion' and b.id_rango between '8' and '14'  group by a.id_rango order by b.id_rango;");
$filas17=mysql_num_rows($consulta17);
while ($row= mysql_fetch_array($consulta17)){
$suma17+=$row[1];
?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[0];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></font></td>
</tr>
<? }?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $suma17;?></strong></font></td>
</tr>
</table>
<BR>
<table width="590px" border="">
		<tr bgcolor="#efefef">
		<td colspan="2" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>N° SEM</strong></font></td></tr>

<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">Total de Personal del SEM</font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? $resultado_sem= $suma16+$suma17; echo $resultado_sem;?></font></td>
</tr>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">Total de Personal que no es del SEM</font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo ($conteo_sre+$conteo_comisionado_sre)-$resultado_sem;?></font></td>
</tr>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $conteo_sre+$conteo_comisionado_sre;?></strong></font></td>
</tr>
</table>
<BR>
<table width="590px" border="">
		<tr bgcolor="#efefef">
		<td colspan="2" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>ZONA</strong></font></td></tr>

<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">II</font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $suma11;?></font></td>
</tr>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">III</font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $suma12;?></font></td>
</tr>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $suma12+$suma11;?></strong></font></td>
</tr>
</table>
<BR>
<table width="590px" border="">
		<tr bgcolor="#efefef">
		<td colspan="2" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>AREA</strong></font></td></tr>
		
<? 
$consulta18=mysql_query("select descripcion_area, count(a.id_area) from tbl_personal a inner join tbl_area b on a.id_area=b.id_area
where tipo_personal='PERSONAL SRE' and delegacion='$delegacion'  group by a.id_area order by b.id_area;");
$filas18=mysql_num_rows($consulta18);
while ($row= mysql_fetch_array($consulta18)){
$suma18+=$row[1];
?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[0];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></font></td>
</tr>
<? }?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $suma18;?></strong></font></td>
</tr>
</table>
<BR>
<table width="590px" border="">
		<tr bgcolor="#efefef">
		<td colspan="2" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>ACTIVIDADES DE PASAPORTES</strong></font></td></tr>
		
<? 
$consulta19=mysql_query("select descripcion_pasaportes, count(a.id_area_pas) from tbl_personal a inner join tbl_area_pasaportes b on a.id_area_pas=b.id_area_pas
where tipo_personal='PERSONAL SRE' and delegacion='$delegacion' and b.id_area_pas between '1' and '8'  group by a.id_area_pas order by b.id_area_pas;");
$filas19=mysql_num_rows($consulta19);
while ($row= mysql_fetch_array($consulta19)){
$suma19+=$row[1];
?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[0];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></font></td>
</tr>
<? }?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $suma19;?></strong></font></td>
</tr>
</table>
<BR>
<table width="590px" border="">
		<tr bgcolor="#efefef">
		<td colspan="2" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>OTROS DENTRO DE PASAPORTES</strong></font></td></tr>
		
<? 
$consulta20=mysql_query("select descripcion_pasaportes, count(a.id_area_pas) from tbl_personal a inner join tbl_area_pasaportes b on a.id_area_pas=b.id_area_pas
where tipo_personal='PERSONAL SRE' and delegacion='$delegacion' and b.id_area_pas between '9' and '16'  group by a.id_area_pas order by b.id_area_pas;");
$filas20=mysql_num_rows($consulta20);
while ($row= mysql_fetch_array($consulta20)){
$suma20+=$row[1];
?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[0];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></font></td>
</tr>
<? }?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $suma20;?></strong></font></td>
</tr>
</table>
<BR>
<table width="590px" border="">
		<tr bgcolor="#efefef">
		<td colspan="2" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>OBSERVACIONES</strong></font></td></tr>
		
<? 
$consulta21=mysql_query("select tipo, count(a.observaciones) from tbl_personal a inner join tbl_tipo_asistencia b on a.observaciones=b.id_tipo
where tipo_personal='PERSONAL SRE' and delegacion='$delegacion' and b.categoria= '3' group by a.observaciones order by b.id_tipo;");
$filas21=mysql_num_rows($consulta21);
while ($row= mysql_fetch_array($consulta21)){
$suma21+=$row[1];
?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[0];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></font></td>
</tr>
<? }?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $suma21;?></strong></font></td>
</tr>
</table>
</TD>
</tr>
</table>
</TD>
<TD valign="top">
	<table width="590px" border="">
	<tr bgcolor="#efefef">
	<td align="CENTER"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>DESGLOSE COMISIONADO</strong></font></td></tr>	
	</table>
	<table width="590px" border="">
		<tr bgcolor="#efefef">
		<td colspan="2" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>CARGOS</strong></font></td></tr>
		
<? 
$consulta22=mysql_query("select descripcion_cargo, count(a.id_cargo) from tbl_personal a inner join tbl_cargo b on a.id_cargo=b.id_cargo
where tipo_personal='PERSONAL COMISIONADO' and delegacion='$delegacion'  group by a.id_cargo order by b.id_cargo;");
$fila22=mysql_num_rows($consulta22);
while ($row= mysql_fetch_array($consulta22)){
$suma22+=$row[1];
?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[0];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></font></td>
</tr>
<? }?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $suma22;?></strong></font></td>
</tr>
</table>
<BR>
<table width="590px" border="">
		<tr bgcolor="#efefef">
		<td colspan="2" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>NIVEL</strong></font></td></tr>
		
<? 
$consulta23=mysql_query("select descripcion_cargo, count(a.id_cargo) from tbl_personal a inner join tbl_cargo b on a.id_cargo=b.id_cargo
where tipo_personal='PERSONAL COMISIONADO' and delegacion='$delegacion' and b.id_cargo= '13'  group by a.id_cargo order by b.id_cargo;");
$filas23=mysql_num_rows($consulta23);
while ($row= mysql_fetch_array($consulta23)){
$jefe_oe=$row[1];
}
?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">Jefes de OFE</font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $jefe_oe;?></font></td>
</tr>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">Auxiliares</font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? $auxiliares=$suma22-$jefe_oe; echo $auxiliares;?></font></td>
</tr>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $jefe_oe+$auxiliares;?></strong></font></td>
</tr>
</table>
<BR>
<table width="590px" border="">
		<tr bgcolor="#efefef">
		<td colspan="2" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>AREA</strong></font></td></tr>
		
<? 
$consulta24=mysql_query("select descripcion_area, count(a.id_area) from tbl_personal a inner join tbl_area b on a.id_area=b.id_area
where tipo_personal='PERSONAL COMISIONADO' and delegacion='$delegacion'  group by a.id_area order by b.id_area;");
$filas24=mysql_num_rows($consulta24);
while ($row= mysql_fetch_array($consulta24)){
$suma24+=$row[1];
?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[0];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></font></td>
</tr>
<? }?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $suma24;?></strong></font></td>
</tr>
</table>
<BR>
<table width="590px" border="">
		<tr bgcolor="#efefef">
		<td colspan="2" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>ACTIVIDADES DE PASAPORTES</strong></font></td></tr>
		
<? 
$consulta25=mysql_query("select descripcion_pasaportes, count(a.id_area_pas) from tbl_personal a inner join tbl_area_pasaportes b on a.id_area_pas=b.id_area_pas
where tipo_personal='PERSONAL COMISIONADO' and delegacion='$delegacion' and b.id_area_pas between '1' and '8'  group by a.id_area_pas order by b.id_area_pas;");
$filas25=mysql_num_rows($consulta25);
while ($row= mysql_fetch_array($consulta25)){
$suma25+=$row[1];
?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[0];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></font></td>
</tr>
<? }?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $suma25;?></strong></font></td>
</tr>
</table>
<BR>
<table width="590px" border="">
		<tr bgcolor="#efefef">
		<td colspan="2" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>OTROS DENTRO DE PASAPORTES</strong></font></td></tr>
		
<? 
$consulta26=mysql_query("select descripcion_pasaportes, count(a.id_area_pas) from tbl_personal a inner join tbl_area_pasaportes b on a.id_area_pas=b.id_area_pas
where tipo_personal='PERSONAL COMISIONADO' and delegacion='$delegacion' and b.id_area_pas between '9' and '16'  group by a.id_area_pas order by b.id_area_pas;");
$filas26=mysql_num_rows($consulta26);
while ($row= mysql_fetch_array($consulta26)){
$suma26+=$row[1];
?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[0];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></font></td>
</tr>
<? }?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $suma26;?></strong></font></td>
</tr>
</table>
<BR>
<table width="590px" border="">
		<tr bgcolor="#efefef">
		<td colspan="2" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>OBSERVACIONES</strong></font></td></tr>
		
<? 
$consulta27=mysql_query("select tipo, count(a.observaciones) from tbl_personal a inner join tbl_tipo_asistencia b on a.observaciones=b.id_tipo
where tipo_personal='PERSONAL COMISIONADO' and delegacion='$delegacion' and b.categoria= '3' group by a.observaciones order by b.id_tipo;");
$filas27=mysql_num_rows($consulta27);
while ($row= mysql_fetch_array($consulta27)){
$suma27+=$row[1];
?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[0];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></font></td>
</tr>
<? }?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $suma27;?></strong></font></td>
</tr>
</table>
</TD>
</tr>
</table>	
<table align="center">
<tr>
<td align="center">
<button type="button" onClick="javascript:pdf('concentrado_delegacion_pdf.php?delegacion=<?php echo "$delegacion";?>')"><img src="extras/ico/pdf.jpg" width="40" height="40" /></button>
</td></tr></table>
</fieldset>
</div>
</form>	
	<? }
		else{
		$consulta1=mysql_query("SELECT count(delegacion) from tbl_personal where tipo_personal='PERSONAL SRE'  and delegacion_oe='DELEGACION' and lugar_fisico='0' ;");
$filas1=mysql_num_rows($consulta1);
while ($row= mysql_fetch_array($consulta1)){
$conteo_sre=$row[0];
 }
$consulta2=mysql_query("SELECT count(observaciones) from tbl_personal where tipo_personal='PERSONAL SRE' and observaciones='10' and delegacion_oe='OFE' and lugar_fisico!='0';");
$filas2=mysql_num_rows($consulta2);
while ($row= mysql_fetch_array($consulta2)){
$conteo_comisionado_sre=$row[0];
 } 

$consulta4=mysql_query("SELECT count(delegacion) from tbl_personal where tipo_personal='PERSONAL COMISIONADO' and delegacion_oe='DELEGACION' and lugar_fisico='0';");
$filas4=mysql_num_rows($consulta4);
while ($row= mysql_fetch_array($consulta4)){
$conteo_comisionado_delegacion=$row[0];
 } 
$consulta5=mysql_query("SELECT count(delegacion) from tbl_personal where tipo_personal='PERSONAL COMISIONADO' and delegacion_oe='OFE' and lugar_fisico!='0' ;");
$filas5=mysql_num_rows($consulta5);
while ($row= mysql_fetch_array($consulta5)){
$conteo_comisionado_ofe=$row[0];
 } 
$consulta7=mysql_query("SELECT count(delegacion) from tbl_personal ;");
$filas7=mysql_num_rows($consulta7);
while ($row= mysql_fetch_array($consulta7)){
$total_delegacion=$row[0];
 }?>
 <form name="concentracion_delegacion" id="concentracion_delegacion">
<div align="center">
<fieldset style="width:1200px">
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>DELEGACIÓN: <? echo $delegacion;?></strong></font></legend>
<table width="1200px" border="">
<tr bgcolor="#efefef">
<td colspan="2" align="left"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>PERSONAL SRE EN DELEGACIÓN: <? echo $conteo_sre;?></strong></font></td></tr>	
<tr bgcolor="#efefef">
<td height="31" colspan="2" align="left"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>COMISIONADO SRE EN OFE: <? echo $conteo_comisionado_sre;?></strong></font></td>
</tr>
<? 
$consulta3=mysql_query("select oems, count(id_personal) from tbl_personal a inner join oems on lugar_fisico=id_oems where tipo_personal='PERSONAL SRE'
 and lugar_fisico!='0' group by lugar_fisico;;");
$filas3=mysql_num_rows($consulta3);
while ($row= mysql_fetch_array($consulta3)){
$desglose_sre_oes=$row[0];
$conteo_sre_oes=$row[1];
?>
<tr>
<td colspan="2" align="left"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $desglose_sre_oes.': '.$conteo_sre_oes;?></strong></font></td></tr><? } ?>
<tr bgcolor="#efefef">
<td colspan="2" align="left"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>COMISIONADO EN DELEGACIÓN: <? echo $conteo_comisionado_delegacion;?></strong></font></td>
</tr>	
<tr bgcolor="#efefef">
<td colspan="2" align="left"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>COMISIONADO EN OFE: <? echo $conteo_comisionado_ofe;?></strong></font></td>
</tr>	
<? 
$consulta6=mysql_query("select oems, count(id_personal) from tbl_personal a inner join oems on lugar_fisico=id_oems where tipo_personal='PERSONAL COMISIONADO'
 and lugar_fisico!='0' group by lugar_fisico;;");
$filas6=mysql_num_rows($consulta6);
while ($row= mysql_fetch_array($consulta6)){
$desglose_comisionado_oes=$row[0];
$conteo_comisionado_oes=$row[1];
?>
<tr>
<td colspan="2" align="left"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $desglose_comisionado_oes.': '.$conteo_comisionado_oes;?></strong></font></td>
</tr><? } ?>
<tr bgcolor="#efefef">
<td colspan="2" align="left"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>TOTAL PERSONAL SRE: <? echo $conteo_sre+$conteo_comisionado_sre;?></strong></font></td>
</tr>
<tr bgcolor="#efefef">
<td colspan="2" height="28" align="left"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>TOTAL PERSONAL COMISIONADO: <? echo $conteo_comisionado_delegacion+$conteo_comisionado_ofe;?></strong></font></td>
</tr>
<tr bgcolor="#efefef">
<td colspan="2" align="left"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>TOTAL GENERAL: <? echo $conteo_sre+$conteo_comisionado_sre+$conteo_comisionado_delegacion+$conteo_comisionado_ofe;?></strong></font></td></tr>	
</table>
<br>
<table width="1200px" border="">
<tr>
<TD>
	<table width="590px" border="">
	<tr bgcolor="#efefef">
	<td colspan="2" align="CENTER"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>DESGLOSE SRE</strong></font></td></tr>
	<tr>
	<TD>
		<table width="590px" border="">
		<tr bgcolor="#efefef">
		<td colspan="2" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>CARGOS</strong></font></td></tr>
		
<? 
$consulta8=mysql_query("select descripcion_cargo, count(a.id_cargo) from tbl_personal a inner join tbl_cargo b on a.id_cargo=b.id_cargo
where tipo_personal='PERSONAL SRE'  group by a.id_cargo order by b.id_cargo;");
$filas8=mysql_num_rows($consulta8);
while ($row= mysql_fetch_array($consulta8)){
$suma8+=$row[1];
?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[0];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></font></td>
</tr>
<? }?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $suma8;?></strong></font></td>
</tr>
</table>
<BR>
<table width="590px" border="">
		<tr bgcolor="#efefef">
		<td colspan="2" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>PLAZA</strong></font></td></tr>
		
<? 
$consulta9=mysql_query("select descripcion_plaza, count(a.id_plaza) from tbl_personal a inner join tbl_plaza b on a.id_plaza=b.id_plaza
where tipo_personal='PERSONAL SRE'   group by a.id_plaza order by b.id_plaza;");
$filas9=mysql_num_rows($consulta9);
while ($row= mysql_fetch_array($consulta9)){
$suma9+=$row[1];
?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[0];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></font></td>
</tr>
<? }?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $suma9;?></strong></font></td>
</tr>
</table>

<BR>
<table width="590px" border="">
		<tr bgcolor="#efefef">
		<td colspan="4" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>DESGLOSE NIVEL </strong></font></td></tr>
		<tr>
		<td colspan="4" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">MANDOS MEDIOS</font></td></tr>
<? 
$consulta10=mysql_query("select descripcion_nivel, count(a.id_nivel),b.suedo_neto from tbl_personal a inner join tbl_nivel b on a.id_nivel=b.id_nivel
where tipo_personal='PERSONAL SRE'  and b.id_nivel between '1' and '57'  group by a.id_nivel order by b.id_nivel");
$filas10=mysql_num_rows($consulta10);
while ($row= mysql_fetch_array($consulta10)){
$suma_mandos+=$row[2];
$multiplicacion_mandos=$row[1]*$row[2];
$total_mandos+=$multiplicacion_mandos;
$suma10+=$row[1];
?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[0];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">$ <? echo $row[2];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">$ <? echo $multiplicacion_mandos;?></font></td>
</tr>
<? }?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $suma10;?></strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>$ <? echo $suma_mandos;?></strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>$ <? echo $total_mandos;?></strong></font></td>
</tr>
<tr>
		<td colspan="4" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">OPERATIVOS ZONA II</font></td></tr>
<? 
$consulta11=mysql_query("select descripcion_nivel, count(a.id_nivel),suedo_neto from tbl_personal a inner join tbl_nivel b on a.id_nivel=b.id_nivel
where tipo_personal='PERSONAL SRE' and b.id_nivel between '58' and '68'  group by a.id_nivel order by b.id_nivel");
$filas11=mysql_num_rows($consulta11);
while ($row= mysql_fetch_array($consulta11)){
$suma_op2+=$row[2];
$multiplicacion_op2=$row[1]*$row[2];
$total_op2+=$multiplicacion_op2;
$suma11+=$row[1];
?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[0];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">$ <? echo $row[2];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">$ <? echo $multiplicacion_op2;?></font></td></tr>
<? }?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $suma11;?></strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>$ <? echo $suma_op2;?></strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>$ <? echo $total_op2;?></strong></font></td>

</tr>
<tr>
		<td colspan="4" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">OPERATIVOS ZONA III</font></td></tr>
<? 
$consulta12=mysql_query("select descripcion_nivel, count(a.id_nivel),suedo_neto from tbl_personal a inner join tbl_nivel b on a.id_nivel=b.id_nivel
where tipo_personal='PERSONAL SRE'  and b.id_nivel between '69' and '79'  group by a.id_nivel order by b.id_nivel");
$filas12=mysql_num_rows($consulta12);
while ($row= mysql_fetch_array($consulta12)){
$suma_op3+=$row[2];
$multiplicacion_op3=$row[1]*$row[2];
$total_op3+=$multiplicacion_op3;
$suma12+=$row[1];
?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[0];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">$ <? echo $row[2];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">$ <? echo $multiplicacion_op3;?></font></td></tr>
<? }?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $suma12;?></strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>$ <? echo $suma_op3;?></strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>$ <? echo $total_op3;?></strong></font></td>
</tr>
</table>
<BR>
<table width="590px" border="">
		<tr bgcolor="#efefef">
		<td colspan="2" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>NIVEL</strong></font></td></tr>
	
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">Mandos Medios</font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $suma10;?></font></td>
</tr>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">Operativos</font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $suma11+$suma12;?></font></td>
</tr>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $suma10+$suma11+$suma12;?></strong></font></td>
</tr>
</table>
<BR>
<table width="590px" border="">
		<tr bgcolor="#efefef">
		<td colspan="2" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>TIPO DE PLAZA</strong></font></td></tr>
<? 
$consulta13=mysql_query("select count(estructura) from tbl_personal where tipo_personal='PERSONAL SRE' and estructura='on'");
while ($row= mysql_fetch_array($consulta13)){$estructura=$row[0];}
$consulta14=mysql_query("select count(eventual) from tbl_personal where tipo_personal='PERSONAL SRE'  and eventual='on'");
while ($row= mysql_fetch_array($consulta14)){$eventual=$row[0];}
$consulta15=mysql_query("select count(honorarios) from tbl_personal where tipo_personal='PERSONAL SRE'  and honorarios='on'");
while ($row= mysql_fetch_array($consulta15)){$honorarios=$row[0];}

?>	
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">Estructura</font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $estructura;?></font></td>
</tr>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">Eventual</font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $eventual;?></font></td>
</tr>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">Honorarios</font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $honorarios;?></font></td>
</tr>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $estructura+$eventual+$honorarios;?></strong></font></td>
</tr>
</table>
<BR>
<table width="590px" border="">
		<tr bgcolor="#efefef">
		<td colspan="2" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>SEM</strong></font></td></tr>
		<tr>
		<td colspan="4" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">DIPLOMÁTICO-CONSULAR</font></td></tr>
		
<? 
$consulta16=mysql_query("select descripcion_rango, count(a.id_rango) from tbl_personal a inner join tbl_rango b on a.id_rango=b.id_rango
where tipo_personal='PERSONAL SRE'  and b.id_rango between '1' and '7'  group by a.id_rango order by b.id_rango;");
$filas16=mysql_num_rows($consulta16);
while ($row= mysql_fetch_array($consulta16)){
$suma16+=$row[1];
?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[0];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></font></td>
</tr>
<? }?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $suma16;?></strong></font></td>
</tr>
<tr>
		<td colspan="4" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">TÉCNICO-ADMINISTRATIVO</font></td></tr>
		
<? 
$consulta17=mysql_query("select descripcion_rango, count(a.id_rango) from tbl_personal a inner join tbl_rango b on a.id_rango=b.id_rango
where tipo_personal='PERSONAL SRE'  and b.id_rango between '8' and '14'  group by a.id_rango order by b.id_rango;");
$filas17=mysql_num_rows($consulta17);
while ($row= mysql_fetch_array($consulta17)){
$suma17+=$row[1];
?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[0];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></font></td>
</tr>
<? }?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $suma17;?></strong></font></td>
</tr>
</table>
<BR>
<table width="590px" border="">
		<tr bgcolor="#efefef">
		<td colspan="2" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>N° SEM</strong></font></td></tr>

<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">Total de Personal del SEM</font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? $resultado_sem= $suma16+$suma17; echo $resultado_sem;?></font></td>
</tr>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">Total de Personal que no es del SEM</font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo ($conteo_sre+$conteo_comisionado_sre)-$resultado_sem;?></font></td>
</tr>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $conteo_sre+$conteo_comisionado_sre;?></strong></font></td>
</tr>
</table>
<BR>
<table width="590px" border="">
		<tr bgcolor="#efefef">
		<td colspan="2" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>ZONA</strong></font></td></tr>

<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">II</font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $suma11;?></font></td>
</tr>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">III</font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $suma12;?></font></td>
</tr>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $suma12+$suma11;?></strong></font></td>
</tr>
</table>
<BR>
<table width="590px" border="">
		<tr bgcolor="#efefef">
		<td colspan="2" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>AREA</strong></font></td></tr>
		
<? 
$consulta18=mysql_query("select descripcion_area, count(a.id_area) from tbl_personal a inner join tbl_area b on a.id_area=b.id_area
where tipo_personal='PERSONAL SRE'  group by a.id_area order by b.id_area;");
$filas18=mysql_num_rows($consulta18);
while ($row= mysql_fetch_array($consulta18)){
$suma18+=$row[1];
?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[0];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></font></td>
</tr>
<? }?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $suma18;?></strong></font></td>
</tr>
</table>
<BR>
<table width="590px" border="">
		<tr bgcolor="#efefef">
		<td colspan="2" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>ACTIVIDADES DE PASAPORTES</strong></font></td></tr>
		
<? 
$consulta19=mysql_query("select descripcion_pasaportes, count(a.id_area_pas) from tbl_personal a inner join tbl_area_pasaportes b on a.id_area_pas=b.id_area_pas
where tipo_personal='PERSONAL SRE' and b.id_area_pas between '1' and '8'  group by a.id_area_pas order by b.id_area_pas;");
$filas19=mysql_num_rows($consulta19);
while ($row= mysql_fetch_array($consulta19)){
$suma19+=$row[1];
?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[0];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></font></td>
</tr>
<? }?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $suma19;?></strong></font></td>
</tr>
</table>
<BR>
<table width="590px" border="">
		<tr bgcolor="#efefef">
		<td colspan="2" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>OTROS DENTRO DE PASAPORTES</strong></font></td></tr>
		
<? 
$consulta20=mysql_query("select descripcion_pasaportes, count(a.id_area_pas) from tbl_personal a inner join tbl_area_pasaportes b on a.id_area_pas=b.id_area_pas
where tipo_personal='PERSONAL SRE'  and b.id_area_pas between '9' and '16'  group by a.id_area_pas order by b.id_area_pas;");
$filas20=mysql_num_rows($consulta20);
while ($row= mysql_fetch_array($consulta20)){
$suma20+=$row[1];
?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[0];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></font></td>
</tr>
<? }?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $suma20;?></strong></font></td>
</tr>
</table>
<BR>
<table width="590px" border="">
		<tr bgcolor="#efefef">
		<td colspan="2" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>OBSERVACIONES</strong></font></td></tr>
		
<? 
$consulta21=mysql_query("select tipo, count(a.observaciones) from tbl_personal a inner join tbl_tipo_asistencia b on a.observaciones=b.id_tipo
where tipo_personal='PERSONAL SRE'  and b.categoria= '3' group by a.observaciones order by b.id_tipo;");
$filas21=mysql_num_rows($consulta21);
while ($row= mysql_fetch_array($consulta21)){
$suma21+=$row[1];
?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[0];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></font></td>
</tr>
<? }?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $suma21;?></strong></font></td>
</tr>
</table>
</TD>
</tr>
</table>
</TD>
<TD valign="top">
	<table width="590px" border="">
	<tr bgcolor="#efefef">
	<td colspan="2" align="CENTER"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>DESGLOSE COMISIONADO</strong></font></td></tr>	
	</table>
	<table width="590px" border="">
		<tr bgcolor="#efefef">
		<td colspan="2" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>CARGOS</strong></font></td></tr>
		
<? 
$consulta22=mysql_query("select descripcion_cargo, count(a.id_cargo) from tbl_personal a inner join tbl_cargo b on a.id_cargo=b.id_cargo
where tipo_personal='PERSONAL COMISIONADO'   group by a.id_cargo order by b.id_cargo;");
$fila22=mysql_num_rows($consulta22);
while ($row= mysql_fetch_array($consulta22)){
$suma22+=$row[1];
?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[0];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></font></td>
</tr>
<? }?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $suma22;?></strong></font></td>
</tr>
</table>
<BR>
<table width="590px" border="">
		<tr bgcolor="#efefef">
		<td colspan="2" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>NIVEL</strong></font></td></tr>
		
<? 
$consulta23=mysql_query("select descripcion_cargo, count(a.id_cargo) from tbl_personal a inner join tbl_cargo b on a.id_cargo=b.id_cargo
where tipo_personal='PERSONAL COMISIONADO'  and b.id_cargo= '13'  group by a.id_cargo order by b.id_cargo;");
$filas23=mysql_num_rows($consulta23);
while ($row= mysql_fetch_array($consulta23)){
$jefe_oe=$row[1];
}
?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">Jefes de OFE</font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $jefe_oe;?></font></td>
</tr>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">Auxiliares</font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? $auxiliares=$suma22-$jefe_oe; echo $auxiliares;?></font></td>
</tr>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $jefe_oe+$auxiliares;?></strong></font></td>
</tr>
</table>
<BR>
<table width="590px" border="">
		<tr bgcolor="#efefef">
		<td colspan="2" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>AREA</strong></font></td></tr>
		
<? 
$consulta24=mysql_query("select descripcion_area, count(a.id_area) from tbl_personal a inner join tbl_area b on a.id_area=b.id_area
where tipo_personal='PERSONAL COMISIONADO'   group by a.id_area order by b.id_area;");
$filas24=mysql_num_rows($consulta24);
while ($row= mysql_fetch_array($consulta24)){
$suma24+=$row[1];
?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[0];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></font></td>
</tr>
<? }?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $suma24;?></strong></font></td>
</tr>
</table>
<BR>
<table width="590px" border="">
		<tr bgcolor="#efefef">
		<td colspan="2" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>ACTIVIDADES DE PASAPORTES</strong></font></td></tr>
		
<? 
$consulta25=mysql_query("select descripcion_pasaportes, count(a.id_area_pas) from tbl_personal a inner join tbl_area_pasaportes b on a.id_area_pas=b.id_area_pas
where tipo_personal='PERSONAL COMISIONADO'  and b.id_area_pas between '1' and '8'  group by a.id_area_pas order by b.id_area_pas;");
$filas25=mysql_num_rows($consulta25);
while ($row= mysql_fetch_array($consulta25)){
$suma25+=$row[1];
?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[0];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></font></td>
</tr>
<? }?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $suma25;?></strong></font></td>
</tr>
</table>
<BR>
<table width="590px" border="">
		<tr bgcolor="#efefef">
		<td colspan="2" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>OTROS DENTRO DE PASAPORTES</strong></font></td></tr>
		
<? 
$consulta26=mysql_query("select descripcion_pasaportes, count(a.id_area_pas) from tbl_personal a inner join tbl_area_pasaportes b on a.id_area_pas=b.id_area_pas
where tipo_personal='PERSONAL COMISIONADO'  and b.id_area_pas between '9' and '16'  group by a.id_area_pas order by b.id_area_pas;");
$filas26=mysql_num_rows($consulta26);
while ($row= mysql_fetch_array($consulta26)){
$suma26+=$row[1];
?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[0];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></font></td>
</tr>
<? }?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $suma26;?></strong></font></td>
</tr>
</table>
<BR>
<table width="590px" border="">
		<tr bgcolor="#efefef">
		<td colspan="2" align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>OBSERVACIONES</strong></font></td></tr>
		
<? 
$consulta27=mysql_query("select tipo, count(a.observaciones) from tbl_personal a inner join tbl_tipo_asistencia b on a.observaciones=b.id_tipo
where tipo_personal='PERSONAL COMISIONADO'  and b.categoria= '3' group by a.observaciones order by b.id_tipo;");
$filas27=mysql_num_rows($consulta27);
while ($row= mysql_fetch_array($consulta27)){
$suma27+=$row[1];
?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[0];?></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $row[1];?></font></td>
</tr>
<? }?>
<tr>
<td align="LEFT"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
<td align="CENTER"><FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $suma27;?></strong></font></td>
</tr>
</table>
</TD>
</tr>
</table>	
<table align="center">
<tr>
<td align="center">
<button type="button" onClick="javascript:pdf('concentrado_delegacion_pdf.php?delegacion=<?php echo "$delegacion";?>')"><img src="extras/ico/pdf.jpg" width="40" height="40" /></button>
</td></tr></table>
</fieldset>
</div>
</form>	

 
 <?
 }
	    ?>

<? }?>
</body>
</html>
