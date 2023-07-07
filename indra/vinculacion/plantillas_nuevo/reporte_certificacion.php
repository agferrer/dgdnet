<? ini_set("session.gc_maxlifetime","14400");  
session_start();
?>
<html>
<head>
<title>CERTIFICACIÓN</title>
<script type="text/javascript">
function conMayusculas(field)
 {
            field.value = field.value.toUpperCase()
}

function validar(frm){
			
if(!frm.mess.value != ""){
 window.alert("Favor de seleccionar el mes de Certificación.");
  		 frm.mess.focus();
       return false
  	}				
if(!frm.aniio.value != ""){
 window.alert("Favor de seleccionar el año de Certificación.");
  		 frm.aniio.focus();
       return false
  	}				
if(!frm.nombre.value != ""){
 window.alert("Favor de capturar el nombre del Responsable\ que firmará la Certificación de las Plantillas.");
  		 frm.nombre.focus();
       return false
  	}				
if(!frm.cargo.value != ""){
 window.alert("Favor de seleccionar el Cargo del Responsable.");
  		 frm.cargo.focus();
       return false
  	}				

	return true
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
$sSQL="insert into tbl_movimientos_usuarios (tipo_movimientos, id_trabajador_afectado,  usuario, fecha) values ('CERTIFICACION', '0', '$user', concat(curdate(),' ',curtime())) ";
if (!isset($mess))
	{
?>
<form name="certificacion" method="post" id="certificacion"  onSubmit="return validar(certificacion)" >
<div align="center">
<fieldset style="width:500px">
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>CERTIFICACIÓN DEL PERSONAL DE TODAS LAS DELEGACIONES <input type="hidden" name="delegacion" value="<? echo $num_delegacion;?>"></strong></font></legend>

<table width="500px">
<tr>
<td width="204" align="right"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Mes a Certificar</FONT></td>
<td width="284" align="left"><select name="mess" id="mess" style="width:200px">
<option selected="selected" value=>Seleccione</option>
<option value="ENERO">ENERO</option>
<option value="FEBRERO">FEBRERO</option>
<option value="MARZO">MARZO</option>
<option value="ABRIL">ABRIL</option>
<option value="MAYO">MAYO</option>
<option value="JUNIO">JUNIO</option>
<option value="JULIO">JULIO</option>
<option value="AGOSTO">AGOSTO</option>
<option value="SEPTIEMBRE">SEPTIEMBRE</option>
<option value="OCTUBRE">OCTUBRE</option>
<option value="NOVIEMBRE">NOVIEMBRE</option>
<option value="DICIEMBRE">DICIEMBRE</option>
</select></td></tr>
<tr>
<td align="right"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Año</FONT></td>
<td align="left"><select name="aniio" id="aniio" style="width:200px">
<option selected="selected" value=>Seleccione</option>
<option value="2023">2023</option>
<option value="2022">2022</option>
<option value="2021">2021</option>
<option value="2020">2020</option>
<option value="2019">2019</option>
<option value="2018">2018</option>
<option value="2017">2017</option>

</select></td></tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="Submit"  value="Consultar">
</tr>
</table>
</fieldset>
</div>
</form>
<?
}
else 
{?>
<form name="resultados" method="post">
<div align="center">
<fieldset style="width:800px">
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>CERTIFICACIÓN DE PLANTILLAS DEL MES <? echo $mess;?> DEL <? echo $aniio;?> </strong></font></legend>
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>ESTADO ACTUAL</strong></font></legend>
<table width="800px" border="">
<tr bgcolor="#efefef" align="center">
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Delegación</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Capturado e Impreso (Oficio de Certificación)</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Upload de Oficio de Certificación</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Fecha del Movimiento</strong></font></td>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Archivo</strong></font></td>
</tr>
<tr>
<td rowspan="2"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong></strong></font></td>
</tr>
<?
if ($mysqli->multi_query("CALL sp_calcula_certificacion_plantillas ('$mess', '$aniio');")) {
    do {
        if ($result = $mysqli->store_result()) {
            while ($row = $result->fetch_row()) {
			$mes= strftime("%m"); // resta 1 mes
			$ano=strftime("%Y");
	$limite=$ano.'-'.$mes.'-21 00:00:00';

			?>
<tr>
<td ><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $row[0];?></strong></font></td>
<? if($row[4]==''){?>
<td align="center" bgcolor="#FF0000" ><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>NO HAN CAPTURADO</strong></font></td>
<? } else {?>
<td align="center" bgcolor="#009966"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>OK</strong></font></td>
<? }?>
<? if($row[3]==''){?>
<td align="center" bgcolor="#FF0000" ><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>NO HAN SUBIDO EL ARCHIVO</strong></font></td>
<? } else {?>
<td align="center" bgcolor="#009966"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>OK</strong></font></td>
<? }?>
<?  if($limite<=$row[2]){ ?>
<td bgcolor="#FFFF00"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $row[2]; ?> </strong></font></td>
<?  } else {?>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $row[2]; ?> </strong></font></td>
<?  }?>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><a href="<? echo $row[3];?>" target="_blank"><? echo $row[1]; ?></a> </strong></font></td>
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
</table>
</fieldset>
</div>
</form>



<?
}
?>

</body>
</html>
