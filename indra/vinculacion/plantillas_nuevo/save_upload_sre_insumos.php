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
$sSQL="insert into tbl_movimientos_usuarios (tipo_movimientos, id_trabajador_afectado,  usuario, fecha) values ('INSERCION UPLOAD', '$id_p', '$user', concat(curdate(),' ',curtime())) ";
$result = mysql_query($sSQL,$link);

$consulta=mysql_query("select id_trabajador from tbl_doctos where id_trabajador='$id_p';");
while ($row= mysql_fetch_array($consulta)){
//$filas_verificacion=mysql_num_rows($consulta_verificacion);
$fila=$row[0];}
if($fila==$id_p){
?>
<form name="save_upload_comisionado" method="post" id="save_upload_comisionado">
<div align="center">
<fieldset style="width:500px">
<legend align="center">
<FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>EL TRABAJADOR <? echo $personal; ?>  YA TIENE CARGADOS, IMPOSIBLE DE CARGAR LOS ACTUALES:</strong></font></legend>
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

$consulta=mysql_query("select tipo_personal from tbl_personal  where id_personal='$id_p';");	
while ($row= mysql_fetch_array($consulta)){
$tipo_personal= $row[0];
			}
$conexion = mysql_connect("localhost","root","toshiba09") or die("No se pudo realizar la conexion con el servidor."); 
mysql_select_db("tiempos_movimientos",$conexion) or die("No se puede seleccionar BD"); // tu_bd es el nombre de la Base de datos ... 

$binario_nombre_temporal=$_FILES['cip']['tmp_name'] ; 
$binario_contenido = addslashes(fread(fopen($binario_nombre_temporal, "rb"), filesize($binario_nombre_temporal))); 
          $tamano = $_FILES["cip"]['size']; 
          $tipo = $_FILES["cip"]['type']; 
          $cip_name = $_FILES["cip"]['name']; 
		               
            ($cip_name != "") or die ("Error al subir el archivo de Cédula de Identidad ".$cip_name);
			($tipo != "pdf") or die ("Sólo se admiten archivos en <b>.pdf</b>"); 
             $destino =  "cedulas_upload/".$tipo_personal."_".$id_p."_".$cip_name; 
            (copy($_FILES['cip']['tmp_name'],$destino)) or die ("Error al subir el archivo de Cédula de Identidad ".$cip_name); 

        
$binario_nombre_temporal_dos=$_FILES['pc']['tmp_name'] ; 
$binario_contenido_dos = addslashes(fread(fopen($binario_nombre_temporal_dos, "rb"), filesize($binario_nombre_temporal_dos))); 
          $tamano_dos = $_FILES["pc"]['size']; 
          $tipo_dos = $_FILES["pc"]['type']; 
          $pc_name = $_FILES["pc"]['name']; 
		               
            ($pc_name != "") or die ("Error al subir el archivo de Promesa de Confidencialidad".$pc_name); 
			($tipo_dos != "pdf") or die ("Sólo se admiten archivos en <b>.pdf</b>"); 
             $destino_dos =  "promesas_upload/".$tipo_personal."_".$id_p."_".$pc_name; 
            (copy($_FILES['pc']['tmp_name'],$destino_dos)) or die ("Error al subir el archivo de Promesa de Confidencialidad ".$pc_name); 
			
			
$binario_nombre_temporal_tres=$_FILES['ri']['tmp_name'] ; 
$binario_contenido_tres = addslashes(fread(fopen($binario_nombre_temporal_tres, "rb"), filesize($binario_nombre_temporal_tres))); 
          $tamano_tres = $_FILES["ri"]['size']; 
          $tipo_tres = $_FILES["ri"]['type']; 
          $ri_name = $_FILES["ri"]['name']; 
		               
            ($ri_name != "") or die ("Error al subir el archivo del Responsable de Insumos".$ri_name); 
			($tipo_tres != "pdf") or die ("Sólo se admiten archivos en <b>.pdf</b>"); 
             $destino_tres =  "insumos_upload/".$tipo_personal."_".$id_p."_".$ri_name; 
            (copy($_FILES['ri']['tmp_name'],$destino_tres)) or die ("Error al subir el archivo del Responsable de Insumos ".$ri_name); 			
        
$inserta_upload_dos="insert into tbl_doctos(id_trabajador, archivo_cip, url_cip, archivo_pc, url_pc, archivo_insumos, url_insumos,  fecha_upload) values
('$id_p', '$cip_name', '$destino', '$pc_name', '$destino_dos', '$ri_name', '$destino_tres',  concat(curdate(),' ',curtime()));";

$resultado_insercion_dos=mysql_query($inserta_upload_dos,$link);


$muestra_datos=mysql_query("select concat(nombre_trabajador, ' ', apellido_paterno,' ', apellido_materno) from tbl_personal  where id_personal='$id_p';");	
while ($row= mysql_fetch_array($muestra_datos)){
$personal=$row[0];
			}	     
?>
<form name="save_upload_sre" method="post" id="save_upload_sre">
<div align="center">
<fieldset style="width:500px">
<legend align="center">
<FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>EL TRABAJADOR <? echo $personal; ?>  LE FUE CARGADO LO SIGUIENTE:</strong></font></legend>
<table width="500px" >

<tr>
<td align="left"><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif">Cédula de Identificación a Personal: </font></td>
<td align="right"><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $cip_name;?></strong> </font></td>
</tr>

<tr>
<td align="left"><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif">Promesa de Confidencialidad: </font></td>
<td align="right"><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $pc_name;?></strong> </font></td>
</tr>

<tr>
<td align="left"><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif">Responsable de Insumos: </font></td>
<td align="right"><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $ri_name;?></strong> </font></td>
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
