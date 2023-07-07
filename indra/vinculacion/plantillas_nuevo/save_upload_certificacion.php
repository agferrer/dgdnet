<? 
ini_set("session.gc_maxlifetime","14400");  
session_start(); 
?>
<html>
<head>
<title>Cargando Documentos</title>
</head>
<body>
<?
include('../../../conexionindra.php');
$mysqli = Conectarse();
$link = Conectarse2();
$num_delegacion = $_SESSION["cta_direccionw"];
$nom_delegacion = $_SESSION["direccionmw"];
$user = $_SESSION["usuariow"];
$sSQL="insert into tbl_movimientos_usuarios (tipo_movimientos, id_trabajador_afectado,  usuario, fecha) values ('INSERCION UPLOAD CERTIFICACION', '$id_p', '$user', concat(curdate(),' ',curtime())) ";
$result = mysql_query($sSQL,$link);

$consulta=mysql_query("select archivo from tbl_certificacion_plantillas where mes='$mess' and anio='$aniioo' and delegacion='$num_delegacion';");
while ($row= mysql_fetch_array($consulta)){

$fila=$row[0];
}
if($fila!=''){
?>
<form name="save_upload_comisionado" method="post" id="save_upload_comisionado">
<div align="center">
<fieldset style="width:500px">
<legend align="center">
<FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>YA SE HA CERTIFICADO EN ESTE MES</strong></font></legend>
<table>
<TR>
<TD colspan="2" align="center">
<input type="button" value="Cerrar" onClick="javascript:window.close()">
</TD>
</TR>
</table>
</fieldset>
</div>
</form>


<? }
else{

$conexion = mysql_connect("localhost","root","toshiba09") or die("No se pudo realizar la conexion con el servidor."); 
mysql_select_db("tiempos_movimientos",$conexion) or die("No se puede seleccionar BD"); // tu_bd es el nombre de la Base de datos ... 

$binario_nombre_temporal=$_FILES['cert']['tmp_name'] ; 
$binario_contenido = addslashes(fread(fopen($binario_nombre_temporal, "rb"), filesize($binario_nombre_temporal))); 
          $tamano = $_FILES["cert"]['size']; 
          $tipo = $_FILES["cert"]['type']; 
          $cip_name = $_FILES["cert"]['name']; 
		               
            ($cip_name != "") or die ("Error al subir el oficio de certificacion ".$cip_name);
			($tipo != "pdf") or die ("Sólo se admiten archivos en <b>.pdf</b>"); 
             $destino =  "certificacion/".$nom_delegacion."_".$mess."_".$aniioo."_".$cip_name; 
            (copy($_FILES['cert']['tmp_name'],$destino)) or die ("Error al subir el archivo de Certificación ".$cip_name); 

        		
        
$actualizacion="Update tbl_certificacion_plantillas Set archivo= '$cip_name', url_cert= '$destino', fecha_url=concat(curdate(),' ',curtime())
where mes='$mess' and anio='$aniioo' and delegacion='$num_delegacion'";
$resultado_insercion_dos=mysql_query($actualizacion,$link);


?>
<form name="save_upload_sre" method="post" id="save_upload_sre">
<div align="center">
<fieldset style="width:500px">
<legend align="center">
<FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>USTED HA SUBIDO CORRECTAMENTE EL ARCHIVO DE CERTIFICACION</strong></font></legend>
<table width="500px" >
<? $consulta=mysql_query("select archivo, url_cert from tbl_certificacion_plantillas where mes='$mess' and anio='$aniioo' and delegacion='$num_delegacion';");
while ($row= mysql_fetch_array($consulta)){

$fila=$row[0];
$fila2=$row[1];
}?>
<tr>
<td align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong><a href="<? echo $fila2;?>" target="_blank"><? echo $fila;?></a></strong></font>
</td>
</tr>

<TR>
<TD colspan="2" align="center">
<input type="button" value="Cerrar" onClick="javascript:window.close()">

</TD>
</TR>
</table>
</fieldset>
</div>
</form>
<? }?>
</body>
</html>
