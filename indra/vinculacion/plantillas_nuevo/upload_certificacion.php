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
			
if(!frm.cert.value != ""){
 window.alert("Favor de seleccionar el archivo de certificacion.");
  		 frm.cert.focus();
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
$sSQL="insert into tbl_movimientos_usuarios (tipo_movimientos, id_trabajador_afectado,  usuario, fecha) values ('UPLOAD CERTIFICACION', '0', '$user', concat(curdate(),' ',curtime())) ";

?>
<form name="upload" method="post" id="upload"  onSubmit="return validar(upload)" action="save_upload_certificacion.php" enctype='multipart/form-data' >
<div align="center">
<fieldset style="width:500px">
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>CARGAR ARCHIVO DE CERTIFICACIÓN DEL MES <? echo $mess;?> DEL <? echo $aniioo;?>, DELEGACION <? echo $nom_delegacion;?></strong></font></legend>
<table width="500px">
<tr>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif">Archivo de Certificación</font></td>
<td><span id="sprytextfield1">
<input type="hidden" name="mess" id="mess" value="<? echo $mess;?>">
<input type="hidden" name="aniioo" id="aniioo" value="<? echo $aniioo;?>">
<input type="file" name="cert" id="cert" size="80"><span class="textfieldRequiredMsg"></span></span></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="Submit"  value="Guardar">
</tr>
</table>
<p>&nbsp;</p>
</fieldset></div>
</form>
</body>
</html>
