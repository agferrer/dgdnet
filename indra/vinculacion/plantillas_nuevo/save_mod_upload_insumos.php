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

$result = mysql_query($sSQL,$link);



$conexion = mysql_connect("localhost","root","toshiba09") or die("No se pudo realizar la conexion con el servidor."); 
mysql_select_db("tiempos_movimientos",$conexion) or die("No se puede seleccionar BD"); // tu_bd es el nombre de la Base de datos ... 

$binario_nombre_temporal=$_FILES['ced']['tmp_name'] ; 
$binario_contenido = addslashes(fread(fopen($binario_nombre_temporal, "rb"), filesize($binario_nombre_temporal))); 
          $tamano = $_FILES["ced"]['size']; 
          $tipo = $_FILES["ced"]['type']; 
          $cip_name = $_FILES["ced"]['name']; 
		               
            ($cip_name != "") or die ("Error al subir ".$cip_name);
			($tipo != "pdf") or die ("Sólo se admiten archivos en <b>.pdf</b>"); 
             $destino =  "insumos_upload/MODIFICACION INSUMOS_".$identificador."_".$cip_name; 
            (copy($_FILES['ced']['tmp_name'],$destino)) or die ("Error al subir el archivo ".$cip_name); 

        		
        
$actualizacion="Update tbl_doctos Set archivo_insumos= '$cip_name', url_insumos= '$destino' where id_trabajador='$identificador';";
$resultado_insercion_dos=mysql_query($actualizacion,$link);


?>

<form name="save_upload_sre" method="post" id="save_upload_sre">
<div align="center">
<fieldset style="width:500px">
<legend align="center">
<FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>USTED HA MODIFICADO CORRECTAMENTE EL ARCHIVO</strong></font></legend>
<table width="500px" >



<TR>
<TD colspan="2" align="center">
<input type="button" value="Cerrar" onClick="javascript:window.close()">
</TD>
</TR>
</table>
</fieldset>
</div>
</form>

</body>
</html>
