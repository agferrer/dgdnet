<? ini_set("session.gc_maxlifetime","14400");  
session_start();
?>
<html>
<head>
<title>Modificación</title>
<script type="text/javascript">
function conMayusculas(field)
 {
            field.value = field.value.toUpperCase()
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
$sSQL="insert into tbl_movimientos_usuarios (tipo_movimientos, id_trabajador_afectado,  usuario, fecha) values ('MODIFICAR ARCHIVO', '0', '$user', concat(curdate(),' ',curtime())) ";

?>
<form name="upload" method="post" id="upload"  onSubmit="return validar(upload)" action="save_mod_upload_archivo.php" enctype='multipart/form-data' >
<div align="center">
<fieldset style="width:300px">
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>DELEGACION <? echo $nom_delegacion;?></strong></font></legend>
<table width="300px">
<tr>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Enc. Archivo</font></td>
<td><span id="sprytextfield1">
<input type="file" name="ced" id="ced" size="30"><span class="textfieldRequiredMsg"></span></span>
<input type="hidden" name="identificador" value="<? echo $identificador;?>" >

</td>
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
