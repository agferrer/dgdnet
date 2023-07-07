<? 
ini_set("session.gc_maxlifetime","14400");  
session_start();
?>
<HTML>
<?php
include('../../../conexionindra.php');
$mysqli = Conectarse();
$link = Conectarse2();
$num_delegacion = $_SESSION["cta_direccionw"];
$nom_delegacion = $_SESSION["direccionmw"];
$user = $_SESSION["usuariow"];
?>
<script src="include/forms.js"></script>
<script type="text/javascript">
function mueveReloj()
    {
     momentoActual = new Date()
     hora = momentoActual.getHours()
     minuto = momentoActual.getMinutes()
     segundo = momentoActual.getSeconds()
     horaImprimible = hora + " : " + minuto + " : " + segundo
     document.save_modificacion_comisionado.reloj.value = horaImprimible
     setTimeout("mueveReloj()",1000)
    }
</script>
<HEAD>
<TITLE>Guardando la Información</TITLE>
</HEAD>
<BODY>
<?
if(($oe=='')||($oe=='0')){
$lugar='DELEGACION';}
else {
$lugar='OFE';}
//insercion a la tabla de movimientos
$sSQL="insert into tbl_movimientos_usuarios (tipo_movimientos, id_trabajador_afectado,  usuario, fecha) values ('MODIFICACION DE DATOS', '$id_p', '$user', concat(curdate(),' ',curtime()))";
$result = mysql_query($sSQL,$link);
$consulta=mysql_query("select a.id_personal, a.tipo_personal, a.delegacion, l.nombre, a.lugar_fisico, m.oems, a.rfc, a.nombre_trabajador,
a.apellido_paterno, a.apellido_materno, a.estructura, a.eventual, a.honorarios, a.comisionado_por, n.oems, a.fecha_ingreso_sre,
a.num_oficio, a.fecha_oficio, a.id_nivel, f.descripcion_nivel, a.id_plaza, i.descripcion_plaza, a.id_cargo, d.descripcion_cargo,
a.id_area, b.descripcion_area, a.id_area_pas, c.descripcion_pasaportes, a.id_rango, j.descripcion_rango,
a.fecha_ingreso_delegacion, a.activo, a.id_estudios, g.descripcion_estudios, a.id_situacion, k.descripcion_situacion,
a.id_idioma, e.descripcion_idiomas, a.id_nivel_idioma, h.descripcion, a.sexo, a.observaciones, o.tipo
from tbl_personal a
left join tbl_area b on b.id_area=a.id_area
left join tbl_area_pasaportes c on c.id_area_pas=a.id_area_pas
left join tbl_cargo d on d.id_cargo=a.id_cargo
left join tbl_idiomas e on e.id_idiomas=a.id_idioma
left join tbl_nivel f on f.id_nivel=a.id_nivel
left join tbl_nivel_estudios g on g.id_estudios=a.id_estudios
left join tbl_nivel_idioma h on h.id=a.id_nivel_idioma
left join tbl_plaza i on i.id_plaza=a.id_plaza
left join tbl_rango j on j.id_rango=a.id_rango
left join tbl_situacion_academica k on k.id_sit_academica=a.id_situacion
left join delegaciones l on l.id_delegacion=a.delegacion
left join oems m on m.id_oems=a.lugar_fisico
left join oems n on n.id_oems=a.comisionado_por
left join tbl_tipo_asistencia o on o.id_tipo=a.observaciones 
where a.id_personal='$id_p';");	
while ($row= mysql_fetch_array($consulta)){
$base_delegacion=$row[2];
$base_cargo=$row[22];
$base_plaza=$row[20];
$base_nivel=$row[18];
$base_area=$row[24];
$base_area_pasaporte=$row[26];
}
?>
<form name="save_modificacion_comisionado" method="post" id="save_modificacion_comisionado">
<div align="center">
<fieldset style="width:1000px">
<?
if (($delegacion != $base_delegacion) || ($cargo != $base_cargo) || ($area != $base_area) || ($area_pasaporte != $base_area_pasaporte))
{

$insercion="insert into tbl_historial_personal(id_personal, tipo_personal, delegacion, lugar_fisico, rfc, nombre_trabajador, apellido_paterno, apellido_materno, estructura, eventual,
honorarios, comisionado_por, id_nivel, id_plaza, fecha_ingreso_sre, num_oficio, fecha_oficio, id_cargo, id_area, id_area_pasaportes,
id_rango, fecha_ingreso_delegacion, activo, id_estudios, id_situacion, id_idioma, id_nivel_idioma, sexo, obs, capacitado, cant_mod,
fecha_ingreso_tabla_primaria, fecha_ingreso_tabla_secundaria, delegacion_oe, otra_carrera,funciones)
select id_personal, tipo_personal, delegacion, lugar_fisico, rfc, nombre_trabajador, apellido_paterno, apellido_materno, estructura,
eventual, honorarios, comisionado_por, id_nivel, id_plaza, fecha_ingreso_sre, num_oficio, fecha_oficio,  id_cargo, id_area, id_area_pas,
id_rango, fecha_ingreso_delegacion, activo, id_estudios, id_situacion, id_idioma, id_nivel_idioma, sexo, observaciones, capacitado, cant_mod,
fecha_insercion, concat(curdate(),' ',curtime()), delegacion_oe, otra_carrera, funcionamiento from tbl_personal where id_personal='$id_p';";

$resultado_insercion=mysql_query($insercion,$link);

$consulta=mysql_query("select cant_mod from tbl_personal  where id_personal='$id_p';");	
while ($row= mysql_fetch_array($consulta)){
$modificacion= $row[0];
$contador_mod=$modificacion+1;

			}

$actualizacion="Update tbl_personal Set delegacion= '$delegacion', lugar_fisico= '$oe', rfc='$rfc', nombre_trabajador= '$nombre_personal', apellido_paterno= '$apellidop_p', 
apellido_materno= '$apellidom_p', estructura= '$es', eventual= '$ev', honorarios= '$hon', comisionado_por= '$comisionado_por', num_oficio='$num_oficio', fecha_oficio= '$fecha_oficio',  id_cargo= '$cargo', id_area= '$area',  id_area_pas= '$area_pasaporte', fecha_ingreso_delegacion='$fecha_delegacion', id_estudios= '$nestudios', id_situacion= '$situacion', id_idioma= '$idioma', id_nivel_idioma='$nidiomas', sexo= '$sexo', observaciones= '$obs', cant_mod= '$contador_mod', fecha_ult_modificacion= concat(curdate(),' ',curtime()), delegacion_oe='$lugar', otra_carrera='$otracarrera', funciones='$funciones', activo='1'
where id_personal = '$id_p'";

$resultado_modificacion = mysql_query($actualizacion, $link);
}
else
{
$consulta=mysql_query("select cant_mod from tbl_personal  where id_personal='$id_p';");	
while ($row= mysql_fetch_array($consulta)){
$modificacion= $row[0];
$contador_mod=$modificacion+1;

}

$actualizacion="Update tbl_personal Set delegacion= '$delegacion', lugar_fisico= '$oe', rfc='$rfc', nombre_trabajador= '$nombre_personal', apellido_paterno= '$apellidop_p', 
apellido_materno= '$apellidom_p', estructura= '$es', eventual= '$ev', honorarios= '$hon', comisionado_por= '$comisionado_por', num_oficio='$num_oficio', fecha_oficio= '$fecha_oficio',  id_cargo= '$cargo', id_area= '$area',  id_area_pas= '$area_pasaporte', fecha_ingreso_delegacion='$fecha_delegacion', id_estudios= '$nestudios', id_situacion= '$situacion', id_idioma= '$idioma', id_nivel_idioma='$nidiomas', sexo= '$sexo', observaciones= '$obs', cant_mod= '$contador_mod', fecha_ult_modificacion= concat(curdate(),' ',curtime()), delegacion_oe='$lugar', otra_carrera='$otracarrera', funciones='$funciones', activo='1'
where id_personal = '$id_p'";

$resultado_modificacion = mysql_query($actualizacion, $link);

}

$muestra_datos=mysql_query("select concat(nombre_trabajador, ' ', apellido_paterno,' ', apellido_materno) from tbl_personal  where id_personal='$id_p';");	
while ($row= mysql_fetch_array($muestra_datos)){
$personal=$row[0];

}

?>
<legend align="center">
<FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>EL TRABAJADOR <? echo $personal; ?> HA SIDO MODIFICADO SATISFACTORIAMENTE</strong></font></legend>
<table>
<TR>
<TD>
<input type="button" value="Cerrar" onClick="javascript:window.close()">
</TD>
</TR>
</table>
</fieldset>
</div>
</form>
</body>
</html>






