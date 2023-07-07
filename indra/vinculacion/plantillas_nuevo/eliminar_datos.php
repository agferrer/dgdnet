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
     document.save_modificacion_sre.reloj.value = horaImprimible
     setTimeout("mueveReloj()",1000)
    }
</script>
<HEAD>
<TITLE>Guardando la Información</TITLE>
</HEAD>
<BODY>
<? 
if ($baja==2){
//insercion a la tabla de movimientos
$sSQL="insert into tbl_movimientos_usuarios (tipo_movimientos, id_trabajador_afectado,  usuario, fecha) values ('ELIMINACION DE DATOS', '$id_p', '$user', concat(curdate(),' ',curtime()))";
$result = mysql_query($sSQL,$link);
?>

<?
$insercion="insert into tbl_historial_personal(id_personal, tipo_personal, delegacion, lugar_fisico, rfc, nombre_trabajador, apellido_paterno, apellido_materno, estructura, eventual,
honorarios, comisionado_por, id_nivel, id_plaza, fecha_ingreso_sre, num_oficio, fecha_oficio, id_cargo, id_area, id_area_pasaportes,
id_rango, fecha_ingreso_delegacion, activo, id_estudios, id_situacion, id_idioma, id_nivel_idioma, sexo, obs, capacitado, cant_mod,
fecha_ingreso_tabla_primaria, fecha_ingreso_tabla_secundaria, delegacion_oe, funcionamiento, horario_trabajo_de, horario_trabajo_a, labora_de, labora_a, descanso1, descanso2)
select id_personal, tipo_personal, delegacion, lugar_fisico, rfc, nombre_trabajador, apellido_paterno, apellido_materno, estructura,
eventual, honorarios, comisionado_por, id_nivel, id_plaza, fecha_ingreso_sre, num_oficio, fecha_oficio,  id_cargo, id_area, id_area_pas,
id_rango, fecha_ingreso_delegacion, activo, id_estudios, id_situacion, id_idioma, id_nivel_idioma, sexo, observaciones, capacitado, cant_mod, fecha_insercion, concat(curdate(),' ',curtime()), delegacion_oe, funciones, horario_trabajo_de, horario_trabajo_a, labora_de, labora_a, descanso1, descanso2 from tbl_personal where id_personal='$id_p';";

$resultado_insercion=mysql_query($insercion,$link);


$eliminacion="delete from tbl_personal where id_personal = '$id_p'";

$resultado_modificacion = mysql_query($eliminacion, $link);
}
else
{
$insercion="insert into tbl_historial_personal(id_personal, tipo_personal, delegacion, lugar_fisico, rfc, nombre_trabajador, apellido_paterno, apellido_materno, estructura, eventual,
honorarios, comisionado_por, id_nivel, id_plaza, fecha_ingreso_sre, num_oficio, fecha_oficio, id_cargo, id_area, id_area_pasaportes,
id_rango, fecha_ingreso_delegacion, activo, id_estudios, id_situacion, id_idioma, id_nivel_idioma, sexo, obs, capacitado, cant_mod,
fecha_ingreso_tabla_primaria, fecha_ingreso_tabla_secundaria, delegacion_oe, funcionamiento, horario_trabajo_de, horario_trabajo_a, labora_de, labora_a, descanso1, descanso2)
select id_personal, tipo_personal, delegacion, lugar_fisico, rfc, nombre_trabajador, apellido_paterno, apellido_materno, estructura,
eventual, honorarios, comisionado_por, id_nivel, id_plaza, fecha_ingreso_sre, num_oficio, fecha_oficio,  id_cargo, id_area, id_area_pas,
id_rango, fecha_ingreso_delegacion, activo, id_estudios, id_situacion, id_idioma, id_nivel_idioma, sexo, observaciones, capacitado, cant_mod, fecha_insercion, concat(curdate(),' ',curtime()), delegacion_oe, funciones, horario_trabajo_de, horario_trabajo_a, labora_de, labora_a, descanso1, descanso2 from tbl_personal where id_personal='$id_p';";

$resultado_insercion=mysql_query($insercion,$link);


$actualizacion="update  tbl_personal set activo='0' where id_personal='$id_p'";
$resultado_actual=mysql_query($actualizacion,$link);
}
?>
<form name="eliminacion_sre" method="post" id="eliminacion_sre">
<div align="center">
<fieldset style="width:1000px">
<legend align="center">
<FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>EL TRABAJADOR  HA SIDO DADO DE BAJA SATISFACTORIAMENTE</strong></font></legend>
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






