<? 
ini_set("session.gc_maxlifetime","14400");  
session_start();
if (($_SESSION["nivelw"]==4)||($_SESSION["nivelw"]==8)||($_SESSION["nivelw"]==42)||($_SESSION["nivelw"]==43)||($_SESSION["nivelw"]==24)||($_SESSION["nivelw"]==40)||($_SESSION["nivelw"]==35)||($_SESSION["nivelw"]==46)||($_SESSION["nivelw"]==44)){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Busqueda</title>

</head>
<body>
<?
include('../../../conexionindra.php');
$mysqli = Conectarse();
$link = Conectarse2();
$num_delegacion = $_SESSION["cta_direccionw"];
$nom_delegacion = $_SESSION["direccionmw"];
$user = $_SESSION["usuariow"];
$sSQL="insert into tbl_movimientos_usuarios (tipo_movimientos, id_trabajador_afectado,  usuario, fecha) values ('APERTURA DE LA MODIFICACION', '0', '$user', concat(curdate(),' ',curtime()));";
$result = mysql_query($sSQL,$link);
?>
<form name="resultados" method="post">
<div align="center">
<fieldset style="width:1000px">
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>BUSQUEDA DE TRABAJADORES</strong></font></legend>
<table width="1000" border="">
<tr bgcolor="#efefef" align="center">
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>No.</strong></font></td>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Nombre del Trabajador</strong></font></td>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Delegación</strong></font></td>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>SRE/COMISIONADO</strong></font></td>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Cargo</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Verificar y Modificar Documentos</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Modificar</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Cargar Documentos</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Baja</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Historial</strong></font></td>
</tr>
<?
$consulta2=mysql_query("select concat(nombre_trabajador, ' ', apellido_paterno,' ', apellido_materno), b.nombre, id_personal, tipo_personal, c.descripcion_cargo, delegacion_oe from tbl_personal a
left join delegaciones b on a.delegacion=b.id_delegacion left join tbl_cargo c on a.id_cargo=c.id_cargo where b.nombre like '%$delegacion%' and nombre_trabajador like '%$nombre_personal%' and apellido_paterno like '%$apellido_p%' and apellido_materno like '%$apellido_m%' and a.activo like'%1%';");
$filas=mysql_num_rows($consulta2);
if ($filas==''){?>
<legend align="center"><FONT COLOR='#FF0000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>EN LA TABLA PRINCIPAL NO SE ENCUENTRA EL REGISTRO QUE ESTÁ BUSCANDO, <br>PERO ES PROBABLE QUE SE ENCUENTRE EN LA TABLA HISTORIAL <a href="personal_baja.php?nombre_personal=<? echo "$nombre_personal";?>&apellido_p=<? echo "$apellido_p";?>&apellido_m=<? echo "$apellido_m";?>" target='_blank'> DAR CLICK AQUI</a></strong></font></legend>
<? 
}
else 
{


	
	$i=0;
 while ($i<$filas)
	  {
	  
	 		while ($row= mysql_fetch_array($consulta2)){
					$i++;	

?>

<TR>
<TD ALIGN='left'><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'><? echo $i;?></font></TD>
<TD ALIGN='left'><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'><? echo $row[0];?></FONT></TD>
<TD ALIGN='left'><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'><? echo $row[1];?></FONT></TD>
<TD ALIGN='left'><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'><? echo $row[3];?></FONT></TD>
<TD ALIGN='left'><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'><? echo $row[4];?></FONT></TD>


<? 
if ($row[3]=='PERSONAL COMISIONADO'){
?>
<TD ALIGN='left'><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'><a href="estatus_doctos.php?identificador=<? echo "$row[2]";?>" target="area_trabajo">Ver Doctos.</a></FONT></TD>
<TD ALIGN='center'><a href="modificar_comisionado.php?identificador=<? echo "$row[2]";?>" target="area_trabajo"><img src="extras/ico/page_edit.png" alt="Modificar trabajador"></a></td>
<TD ALIGN='center'><a href="agregar_documentos_comisionado.php?identificador=<? echo "$row[2]";?>" target="area_trabajo"><img src="extras/ico/add.png" alt="Agregar datos"></a></td>
<TD ALIGN='center'><a href="eliminar_datos_comisionado.php?identificador=<? echo "$row[2]";?>" target="area_trabajo"><img src="extras/ico/delete.png" alt="Eliminar"></a></td>

<? }
else if ($row[3]=='PERSONAL SRE'){?>
<TD ALIGN='left'><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'><a href="estatus_doctos.php?identificador=<? echo "$row[2]";?>" target="area_trabajo">Ver Doctos.</a></FONT></TD>
<TD ALIGN='center'><a href="modificar_sre.php?identificador=<? echo "$row[2]";?>" target="area_trabajo"><img src="extras/ico/page_edit.png" alt="Modificar trabajador"></a></td>
<TD ALIGN='center'><a href="agregar_documentos_sre.php?identificador=<? echo "$row[2]";?>" target="area_trabajo"><img src="extras/ico/add.png" alt="Agregar datos"></a></td>
<TD ALIGN='center'><a href="eliminar_datos_sre.php?identificador=<? echo "$row[2]";?>" target="area_trabajo"><img src="extras/ico/delete.png" alt="Eliminar"></a></td>

<? }else if ($row[3]=='PERSONAL SRE_DGD'){?>
<TD ALIGN='left'><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'>Ver Doctos.</FONT></TD>
<TD ALIGN='center'><a href="modificar_dgd.php?identificador=<? echo "$row[2]";?>" target="area_trabajo"><img src="extras/ico/page_edit.png" alt="Modificar trabajador"></a></td>
<TD ALIGN='center'><img src="extras/ico/add.png" alt="Agregar datos"></td>
<TD ALIGN='center'><a href="eliminar_datos_dgd.php?identificador=<? echo "$row[2]";?>" target="area_trabajo"><img src="extras/ico/delete.png" alt="Eliminar"></a></td>
<? }?>
<TD ALIGN='center'><a href="historial_gral.php?identificador=<? echo "$row[2]";?>" target="area_trabajo"><img src="extras/ico/historial.png" width='20' height='20' alt="Historial"></a></td>
</TR>

<?
			}
		}	
	}
?>
</table>
</fieldset>
</div>

</form>
</body>
</html>
<? }
if (($_SESSION["nivelw"]==9)){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Busqueda</title>

</head>
<body>
<?
include('../../../conexionindra.php');
$mysqli = Conectarse();
$link = Conectarse2();
$num_delegacion = $_SESSION["cta_direccionw"];
$nom_delegacion = $_SESSION["direccionmw"];
$user = $_SESSION["usuariow"];
$sSQL="insert into tbl_movimientos_usuarios (tipo_movimientos, id_trabajador_afectado,  usuario, fecha) values ('APERTURA DE LA MODIFICACION', '0', '$user', concat(curdate(),' ',curtime()));";
$result = mysql_query($sSQL,$link);
?>
<form name="resultados" method="post">
<div align="center">
<fieldset style="width:1000px">
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>BUSQUEDA DE TRABAJADORES</strong></font></legend>
<table width="1000" border=''>
<tr bgcolor="#efefef" align="center">
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>No.</strong></font></td>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Nombre del Trabajador</strong></font></td>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>SRE/COMISIONADO</strong></font></td>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Cargo</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Verificar y Modificar Documentos</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Modificar</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Cargar Documentos</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Baja</strong></font></td>
</tr>
<?
$consulta2=mysql_query("select concat(nombre_trabajador, ' ', apellido_paterno,' ', apellido_materno), b.nombre, id_personal, tipo_personal, c.descripcion_cargo from tbl_personal a
left join delegaciones b on a.delegacion=b.id_delegacion left join tbl_cargo c on a.id_cargo=c.id_cargo where b.nombre like '$nom_delegacion' and nombre_trabajador like '%$nombre_personal%' and apellido_paterno like '%$apellido_p%' and apellido_materno like '%$apellido_m%' and a.activo like'%1%';");
$filas=mysql_num_rows($consulta2);
if ($filas==''){?>
<legend align="center"><FONT COLOR='#FF0000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>EN LA BASE DE DATOS NO SE ENCUENTRA EL REGISTRO QUE ESTÁ BUSCANDO</strong></font></legend>
<? 
}
else 
{


	
	$i=0;
 while ($i<$filas)
	  {
	  
	 		while ($row= mysql_fetch_array($consulta2)){
					$i++;	

?>
<TR>
<TD ALIGN='left'><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'><? echo $i;?></font></TD>
<TD ALIGN='left'><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'><? echo $row[0];?></FONT></TD>
<TD ALIGN='left'><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'><? echo $row[3];?></FONT></TD>
<TD ALIGN='left'><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'><? echo $row[4];?></FONT></TD>
<TD ALIGN='left'><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'><a href="estatus_doctos.php?identificador=<? echo "$row[2]";?>" target="area_trabajo">Ver Doctos.</a></FONT></TD>
<? 
if ($row[3]=='PERSONAL COMISIONADO'){
?>
<TD ALIGN='center'><a href="modificar_comisionado.php?identificador=<? echo "$row[2]";?>" target="area_trabajo"><img src="extras/ico/page_edit.png" alt="Modificar trabajador"></a></td>
<TD ALIGN='center'><a href="agregar_documentos_comisionado.php?identificador=<? echo "$row[2]";?>" target="area_trabajo"><img src="extras/ico/add.png" alt="Agregar datos"></a></td>
<TD ALIGN='center'><a href="eliminar_datos_comisionado.php?identificador=<? echo "$row[2]";?>" target="area_trabajo"><img src="extras/ico/delete.png" alt="Eliminar"></a></td>

<? }
else {?>
<TD ALIGN='center'><a href="modificar_sre.php?identificador=<? echo "$row[2]";?>" target="area_trabajo"><img src="extras/ico/page_edit.png" alt="Modificar trabajador"></a></td>
<TD ALIGN='center'><a href="agregar_documentos_sre.php?identificador=<? echo "$row[2]";?>" target="area_trabajo"><img src="extras/ico/add.png" alt="Agregar datos"></a></td>
<TD ALIGN='center'><img src="extras/ico/delete.png" alt="Eliminar"></td>

<? }?>
</TR>

<?
			}
		}	
	}
?>
</table>
</fieldset>
</div>

</form>
</body>
</html>
<? }
if (($_SESSION["nivelw"]==45)){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Busqueda</title>

</head>
<body>
<?
include('../../../conexionindra.php');
$mysqli = Conectarse();
$link = Conectarse2();
$num_delegacion = $_SESSION["cta_direccionw"];
$nom_delegacion = $_SESSION["direccionmw"];
$user = $_SESSION["usuariow"];
$sSQL="insert into tbl_movimientos_usuarios (tipo_movimientos, id_trabajador_afectado,  usuario, fecha) values ('APERTURA DE LA MODIFICACION', '0', '$user', concat(curdate(),' ',curtime()));";
$result = mysql_query($sSQL,$link);
?>
<form name="resultados" method="post">
<div align="center">
<fieldset style="width:1000px">
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>BUSQUEDA DE TRABAJADORES</strong></font></legend>
<table width="1000" border="">
<tr bgcolor="#efefef" align="center">
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>No.</strong></font></td>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Nombre del Trabajador</strong></font></td>
<td><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Funciones</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Modificar</strong></font></td>
<td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Baja</strong></font></td>
</tr>
<?
$consulta2=mysql_query("select concat(nombre_trabajador, ' ', apellido_paterno,' ', apellido_materno), b.nombre, id_personal, tipo_personal, c.descripcion_cargo, funciones  from tbl_personal a
left join delegaciones b on a.delegacion=b.id_delegacion left join tbl_cargo c on a.id_cargo=c.id_cargo where a.delegacion like '$num_delegacion' and nombre_trabajador like '%$nombre_personal%' and apellido_paterno like '%$apellido_p%' and apellido_materno like '%$apellido_m%' and a.activo like'%1%';");
$filas=mysql_num_rows($consulta2);
if ($filas==''){?>
<legend align="center"><FONT COLOR='#FF0000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>EN LA BASE DE DATOS NO SE ENCUENTRA EL REGISTRO QUE ESTÁ BUSCANDO</strong></font></legend>
<? 
}
else 
{


	
	$i=0;
 while ($i<$filas)
	  {
	  
	 		while ($row= mysql_fetch_array($consulta2)){
					$i++;	

?>
<TR>
<TD ALIGN='left'><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'><? echo $i;?></font></TD>
<TD ALIGN='left'><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'><? echo $row[0];?></FONT></TD>
<TD ALIGN='left'><FONT size='1' face='Verdana, Arial, Helvetica, sans-serif'><? echo $row["funciones"];?></FONT></TD>

<TD ALIGN='center'><a href="modificar_dgd.php?identificador=<? echo "$row[2]";?>" target="area_trabajo"><img src="extras/ico/page_edit.png" alt="Modificar trabajador"></a></td>
<TD ALIGN='center'><a href="eliminar_datos_dgd.php?identificador=<? echo "$row[2]";?>" target="area_trabajo"><img src="extras/ico/delete.png" alt="Eliminar"></a></td>
</TR>

<?
			}
		}	
	}
?>
</table>
</fieldset>
</div>

</form>
</body>
</html>
<? }?>

