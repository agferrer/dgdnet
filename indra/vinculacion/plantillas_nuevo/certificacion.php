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
if(!frm.anio.value != ""){
 window.alert("Favor de seleccionar el año de Certificación.");
  		 frm.anio.focus();
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
$hoy= date('m', strtotime('-1 month')) ; // resta 1 mes

?>
<form name="certificacion" method="post" id="certificacion"  onSubmit="return validar(certificacion)" action="save_certificacion.php">
<div align="center">
<fieldset style="width:500px">
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>CERTIFICACIÓN DEL PERSONAL DE LA DELEGACIÓN <? echo $nom_delegacion;?><input type="hidden" name="delegacion" value="<? echo $num_delegacion;?> "></strong></font></legend>
<table width="500px">
<tr>
<td width="204" align="right"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Mes a Certificar</FONT></td>
<td width="284" align="left"><select name="mess" id="mess" style="width:200px">
<option selected="selected" value=>Seleccione</option>
<option value="<? switch ($hoy){
	    case 1: print "ENERO"; break;
	    case 2: print "FEBRERO"; break;
	    case 3: print "MARZO"; break;
	    case 4: print "ABRIL"; break;
	    case 5: print "MAYO"; break;
	    case 6: print "JUNIO"; break;
	    case 7: print "JULIO"; break;
	    case 8: print "AGOSTO"; break;
		case 9: print "SEPTIEMBRE"; break;
	    case 10: print "OCTUBRE"; break;
	    case 11: print "NOVIEMBRE"; break;
	    case 12: print "DICIEMBRE"; break;
	    default: print "";}?>"><?
switch ($hoy){
	    case 1: print "ENERO"; break;
	    case 2: print "FEBRERO"; break;
	    case 3: print "MARZO"; break;
	    case 4: print "ABRIL"; break;
	    case 5: print "MAYO"; break;
	    case 6: print "JUNIO"; break;
	    case 7: print "JULIO"; break;
	    case 8: print "AGOSTO"; break;
		case 9: print "SEPTIEMBRE"; break;
	    case 10: print "OCTUBRE"; break;
	    case 11: print "NOVIEMBRE"; break;
	    case 12: print "DICIEMBRE"; break;
	    default: print "";}?></option>
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
<option value="2016">2016</option>
<option value="2015">2015</option>
</select></td></tr>
<tr>
<td align="right"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Nombre del Delegado/Subdelegado que firma certificación</FONT></td>
<td align="left"><input type="text" id="nombre" name="nombre" onChange="conMayusculas(this)" size="40" maxlength="60"> </td></tr>
<tr>
<td align="right"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Cargo</FONT></td>
<td align="left"><select name="cargo" id "cargo" style="width:200px">
<option value=>Seleccionar</option>
<?php
if (($_SESSION["nivelw"]==9)||($_SESSION["nivelw"]==4)){
$sql3 = "select id_cargo, descripcion_cargo from tbl_cargo where activo_cargo='1'and id_cargo in(1,2) order by id_cargo asc";
$result3 = mysql_query($sql3,$link);
while (list($id_cargo,$descripcion_cargo)=mysql_fetch_array($result3))
		{
		echo "<option value='$id_cargo'>$descripcion_cargo</option>";
		} }?>
		<option value="41">DIRECTOR GENERAL ADJUNTO</option>
		<option value="24">DIRECTOR</option>
		<option value="25">SUBDIRECTOR</option>
		<option value="26">JEFE DE DEPARTAMENTO</option>

</select></td>
</tr>
<tr>
<td align="right"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Observaciones</FONT></td>
<td align="left"><textarea name="obs" id="obs"m rows="4" cols="50" onChange="conMayusculas(this)"></textarea></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="Submit"  value="Guardar">
</tr>

</table>
</fieldset></div>
</form>
</body>
</html>
