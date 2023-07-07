<? 
ini_set("session.gc_maxlifetime","14400");  
session_start();
$num_delegacion = $_SESSION["cta_direccionw"];
$nom_delegacion = $_SESSION["direccionmw"];
$user = $_SESSION["usuariow"];
?>
<html>
<head>
</head>	
<title>Busqueda por trabajador</title>
<script>
function acentos(e){
var charCode
charCode= e.keyCode

if (charCode>= 192 && charCode  <=255 ){
alert("Disculpa las molestias pero el sistema no acepta ni Acentos ni Ñ");
return false;
}
return true;
}
function conMayusculas(field)
 {
            field.value = field.value.toUpperCase()
}
function validar(frm){

if(!frm.nombre_personal.value != ""){
 window.alert("El nombre del trabajador es obligatorio, \nFavor de capturarlo.");
  		 frm.nombre_personal.focus();
       return false
  	}
if(!frm.apellido_p.value != ""){
 window.alert("El apellido paterno del trabajador es obligatorio, \nFavor de capturarlo.");
  		 frm.apellido_p.focus();
       return false
  	}	
if(!frm.apellidom_m.value != ""){
 window.alert("El apellido materno del trabajador es obligatorio, \nFavor de capturarlo.");
  		 frm.apellido_m.focus();
       return false
  	}		
	return true	
}
</script>
<body>
<div class="menup">
  <ul>
 <form name="busqueda" id="busqueda" action="resultado_asistencia.php" target="carlos" onSubmit="return validar(busqueda)">
                <table width="802" align="center">
                    <tbody>
<tr><td colspan="10"><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>CONSULTA DE ASISTENCIAS POR PERSONA</strong></font></td></tr>
<tr>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif">Nombre</font></td>
<td><input name="nombre_personal" type="text" id="nombre_personal" onChange="conMayusculas(this)" onKeyPress="return acentos(event)"/></td>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif">Apellido Paterno</font></td>
<td><input name="apellido_p" type="text" id="apellido_p" onChange="conMayusculas(this)" onKeyPress="return acentos(event)" /></td>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif">Apellido Materno</font></td>
<td><input name="apellido_m" type="text" id="apellido_m" onChange="conMayusculas(this)" onKeyPress="return acentos(event)" /></td>	
<td><input type="Submit" value="Buscar" /></td>
<td><input type="reset" value="Limpiar" /></td></tr>
</tbody>
</table>
</form>						
</ul>
</div>
<div style="clear:both"></div>
</body>
</html>
