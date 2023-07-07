<? 
ini_set("session.gc_maxlifetime","14400");  
session_start();
?>
<html>
<head>
<title>Eliminacion de Personal Comicionado</title>
</head>
<link rel="stylesheet" type="text/css" media="all" href="../../calendar-win2k-cold-1.css" title="win2k-cold-1" />
<script type="text/javascript" src="../../calendar.js"></script>
<script type="text/javascript" src="../../lang/calendar-es.js"></script>
<script type="text/javascript" src="../../calendar-setup.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<script src="jqueryy.js"></script>
<script language="javascript">
$(document).ready(function(){
$("select").change(function(){
var combos = new Array();
combos['plaza'] = "nivel";
posicion = $(this).attr("name");
valor = $(this).val()
if(posicion == 'plaza' && valor==0){
$("#nivel").html('	<option  value="" stylw="width:350px" selected="selected">----------------</option>')
}else{
$("#"+combos[posicion]).html('<option style="width:350px" selected="selected" value="">Cargando...</option>')
if(valor!="0" || posicion !='nivel'){
$.post("combo_plaza.php",{
combo:$(this).attr("name"), // Nombre del combo
id:$(this).val() // Valor seleccionado
},function(data){
$("#"+combos[posicion]).html(data);
})
}
}
})
})

$(document).ready(function(){
$("select").change(function(){
var combos = new Array();
combos['area'] = "area_pasaporte";
posicion = $(this).attr("name");
valor = $(this).val()
if(posicion == 'area' && valor==0){
$("#area_pasaporte").html('	<option  value=""  selected="selected">----------------</option>')
}else{
$("#"+combos[posicion]).html('<option  selected="selected" value="">Cargando...</option>')
if(valor!="0" || posicion !='area_pasaporte'){
$.post("combo_area.php",{
combo:$(this).attr("name"), // Nombre del combo
id:$(this).val() // Valor seleccionado
},function(data){
$("#"+combos[posicion]).html(data);
})
}
}
})
})

$(document).ready(function(){
$("select").change(function(){
var combos = new Array();
combos['nestudios'] = "situacion";
posicion = $(this).attr("name");
valor = $(this).val()
if(posicion == 'nestudios' && valor==0){
$("#situacion").html('	<option  value=""  selected="selected">----------------</option>')
}else{
$("#"+combos[posicion]).html('<option  selected="selected" value="">Cargando...</option>')
if(valor!="0" || posicion !='situacion'){
$.post("combo_nestudios.php",{
combo:$(this).attr("name"), // Nombre del combo
id:$(this).val() // Valor seleccionado
},function(data){
$("#"+combos[posicion]).html(data);
})
}
}
})
})

$(document).ready(function(){
$("select").change(function(){
var combos = new Array();
combos['idioma'] = "nidiomas";
posicion = $(this).attr("name");
valor = $(this).val()
if(posicion == 'idioma' && valor==0){
$("#nidiomas").html('	<option  value=""  selected="selected">----------------</option>')
}else{
$("#"+combos[posicion]).html('<option  selected="selected" value="">Cargando...</option>')
if(valor!="0" || posicion !='nidiomas'){
$.post("combo_idioma.php",{
combo:$(this).attr("name"), // Nombre del combo
id:$(this).val() // Valor seleccionado
},function(data){
$("#"+combos[posicion]).html(data);
})
}
}
})
})

$(document).ready(function(){
$("select").change(function(){
var combos = new Array();
combos['delegacion'] = "oe";
posicion = $(this).attr("name");
valor = $(this).val()
if(posicion == 'delegacion' && valor==0){
$("#oe").html('	<option  value=""  selected="selected">----------------</option>')
}else{
$("#"+combos[posicion]).html('<option  selected="selected" value="">Cargando...</option>')
if(valor!="0" || posicion !='oe'){
$.post("combo_delegacion.php",{
combo:$(this).attr("name"), // Nombre del combo
id:$(this).val() // Valor seleccionado
},function(data){
$("#"+combos[posicion]).html(data);
})
}
}
})
})

</script>
<script src="include/forms.js"></script>
<script type="text/javascript">


function validar(frm){

if(!frm.nombre_personal.value != ""){
 window.alert("El nombre del trabajador es obligatorio, \nFavor de capturarlo.");
  		 frm.nombre_personal.focus();
       return false
  	}
if(!frm.apellidop_p.value != ""){
 window.alert("El apellido paterno del trabajador es obligatorio, \nFavor de capturarlo.");
  		 frm.apellidop_p.focus();
       return false
  	}	
if(!frm.apellidom_p.value != ""){
 window.alert("El apellido materno del trabajador es obligatorio, \nFavor de capturarlo.");
  		 frm.apellidom_p.focus();
       return false
  	}		
if(!frm.sexo.value != ""){
 window.alert("Favor de seleccionar el sexo del trabajador.");
  		 frm.sexo.focus();
       return false
  	}		
if(!frm.rfc.value != ""){
 window.alert("El RFC del trabajador es obligatorio, \nFavor de capturarlo.");
  		 frm.rfc.focus();
       return false
  	}			
if(!frm.delegacion.value != ""){
 window.alert("Favor de seleccionar la Delegación.");
  		 frm.delegacion.focus();
       return false
  	}	
if(!frm.oe.value != ""){
 window.alert("Favor de seleccionar la Oficina de Enlace.");
  		 frm.oe.focus();
       return false
  	}					
if(!frm.comisionado_por.value != ""){
 window.alert("Favor de seleccionar quien está comisionado al trabajador.");
  		 frm.comisionado_por.focus();
       return false
  	}		
if(!frm.cargo.value != ""){
 window.alert("Favor de seleccionar el Cargo.");
  		 frm.cargo.focus();
       return false
  	}				
	
if(!frm.area.value != ""){
 window.alert("Favor de seleccionar el Area.");
  		 frm.area.focus();
       return false
  	}	
	
if(!frm.nestudios.value != ""){
 window.alert("Favor de seleccionar el Nivel de Estudios.");
  		 frm.nestudios.focus();
       return false
  	}		

if(!frm.idioma.value != ""){
 window.alert("Favor de seleccionar el Idioma.");
  		 frm.idioma.focus();
       return false
  	}		

if(!frm.num_oficio.value != ""){
 window.alert("Favor de capturar el número de oficio del comisionado.");
  		 frm.num_oficio.focus();
       return false
  	}			

if(!frm.fecha_oficio.value != ""){
 window.alert("Favor de capturar la fecha de oficio del comisionado.");
  		 frm.fecha_oficio.focus();
       return false
  	}			
	
if(!frm.fecha_delegacion.value != ""){
 window.alert("Favor de capturar la fecha de ingreso a la Delegación.");
  		 frm.fecha_delegacion.focus();
       return false
  	}	
if(!frm.baja.value != ""){
 window.alert("Para dar de baja a esta persona tienes que seleccionar el motivo.");
  		 frm.baja.focus();
       return false
  	}				

	return true
}



function conMayusculas(field)
 {
            field.value = field.value.toUpperCase()
}

function acentos(e){
var charCode
charCode= e.keyCode

if (charCode>= 192 && charCode  <=255 ){
alert("Disculpa las molestias pero el sistema no acepta ni Acentos ni Ñ");
return false;
}
return true;
}

function habilitar(form){
if (form.area.options[form.area.selectedIndex].value == '1')
    {
	document.getElementById('pasaporte').style.visibility='visible'
	document.getElementById('area_pasaporte').style.visibility='visible'
    //form.area_pasaporte.disabled = false;
	}
	else {
	document.getElementById('pasaporte').style.visibility='hidden'
	document.getElementById('area_pasaporte').style.visibility='hidden'
//		 form.area_pasaporte.disabled = true;
		 }
		}

function situacion_habilita(form){
if ((form.nestudios.options[form.nestudios.selectedIndex].value == '3') || (form.nestudios.options[form.nestudios.selectedIndex].value == '5') || (form.nestudios.options[form.nestudios.selectedIndex].value == '6'))
    {
	document.getElementById('estudios').style.visibility='visible'
	document.getElementById('situacion').style.visibility='visible'
    //form.area_pasaporte.disabled = false;
	}
	else {
	document.getElementById('estudios').style.visibility='hidden'
	document.getElementById('situacion').style.visibility='hidden'
//		 form.area_pasaporte.disabled = true;
		 }
		}	
		
function situacion_idioma(form){
if ((form.idioma.options[form.idioma.selectedIndex].value == '1') || (form.idioma.options[form.idioma.selectedIndex].value == '2') || (form.idioma.options[form.idioma.selectedIndex].value == '3'))
    {
	document.getElementById('nidioma').style.visibility='visible'
	document.getElementById('nidiomas').style.visibility='visible'
    //form.area_pasaporte.disabled = false;
	}
	else {
	document.getElementById('nidioma').style.visibility='hidden'
	document.getElementById('nidiomas').style.visibility='hidden'
//		 form.area_pasaporte.disabled = true;
		 }
		}				



function Fechas(){
a1 = document.elimina_comisionado.fecha_oficio.value
a2 = document.elimina_comisionado.fecha_delegacion.value
if (a1> a2){
alert("La Fecha de Oficio no puede ser mas antigua que la del Ingreso a la Delegación. \nFavor de verificar los que esta capturando con respecto a las Fechas. Gracias.");
	 elimina_comisionado.Submit.disabled=true;
	 }
	 else{
	 elimina_comisionado.Submit.disabled=false;
	 }
}
function mueveReloj()
    {
     momentoActual = new Date()
     hora = momentoActual.getHours()
     minuto = momentoActual.getMinutes()
     segundo = momentoActual.getSeconds()
     horaImprimible = hora + " : " + minuto + " : " + segundo
     document.elimina_comisionado.reloj.value = horaImprimible
     setTimeout("mueveReloj()",1000)
    }
</script>
<body onLoad="mueveReloj()">
<?
include('../../../conexionindra.php');
$mysqli = Conectarse();
$link = Conectarse2();
$num_delegacion = $_SESSION["cta_direccionw"];
$nom_delegacion = $_SESSION["direccionmw"];
$user = $_SESSION["usuariow"];
//insercion a la tabla de movimientos
$sSQL="insert into tbl_movimientos_usuarios (tipo_movimientos, id_trabajador_afectado,  usuario, fecha) values ('APERTURA DE LA ELIMINACION', '0', '$user', concat(curdate(),' ',curtime())) ";
$result = mysql_query($sSQL,$link);
$consulta=mysql_query("select a.id_personal, a.tipo_personal, a.delegacion, l.nombre, a.lugar_fisico, m.oems, a.rfc, a.nombre_trabajador,
a.apellido_paterno, a.apellido_materno, a.estructura, a.eventual, a.honorarios, a.comisionado_por, n.oems, a.fecha_ingreso_sre,
a.num_oficio, a.fecha_oficio, a.id_nivel, f.descripcion_nivel, a.id_plaza, i.descripcion_plaza, a.id_cargo, d.descripcion_cargo,
a.id_area, b.descripcion_area, a.id_area_pas, c.descripcion_pasaportes, a.id_rango, j.descripcion_rango,
a.fecha_ingreso_delegacion, a.activo, a.id_estudios, g.descripcion_estudios, a.id_situacion, k.descripcion_situacion,
a.id_idioma, e.descripcion_idiomas, a.id_nivel_idioma, h.descripcion, a.sexo, a.observaciones, o.tipo, funciones
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
where a.id_personal='$identificador';");	
while ($row= mysql_fetch_array($consulta)){
?>
<form name="elimina_comisionado" method="post" id="elimina_comisionado" action="eliminar_datos.php"  onSubmit="return validar(elimina_comisionado)">
<div align="center">
<fieldset style="width:1000px">
<?php if (($_SESSION["nivelw"]==4)||($_SESSION["nivelw"]==8)||($_SESSION["nivelw"]==42)||($_SESSION["nivelw"]==43)||($_SESSION["nivelw"]==24)||($_SESSION["nivelw"]==40)||($_SESSION["nivelw"]==35)||($_SESSION["nivelw"]==44)||($_SESSION["nivelw"]==46)){?>
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>ELIMINACIÓN DE PERSONAL COMISIONADO</strong></font></legend>
<? } if (($_SESSION["nivelw"]==9)){?>
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>ELIMINACIÓN DE PERSONAL COMISIONADO DE LA DELEGACION <? echo $nom_delegacion;?><input type="hidden" name="delegacion" id="delegacion" value="<? echo $num_delegacion;?>"> </strong></font></legend>
<? }?>
<table width="1000px">
<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Nombre</FONT></td>
<td><input type="text" name="nombre_personal" id="id_nombre_personal" size="50" maxlength="50" value="<? echo $row[7];?>" onChange="conMayusculas(this)" onKeyPress="return acentos(event)"></td>
</tr>
<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Apellido Paterno</FONT></td>
<td><input type="text" name="apellidop_p" id="id_apellidop_p" size="50" maxlength="50" onChange="conMayusculas(this)" value="<? echo $row[8];?>" onKeyPress="return acentos(event)"> </td>
</tr>
<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Apellido Materno</FONT></td>
<td><input type="text" name="apellidom_p" id="apellidom_p" size="50" maxlength="50" onChange="conMayusculas(this)" value="<? echo $row[9];?>" onKeyPress="return acentos(event)"></td>
</tr>
<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Sexo</FONT></td>
<td><select name="sexo" id "sexo" style="width:350px">
<option value="<? echo $row[40];?>"><? echo $row[40];?></option>
<option value='H'>Hombre</option>
<option value='M'>Mujer</option>
</select></td>
</tr>

<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">RFC</FONT></td>
<td><input type="text" name="rfc" id="rfc" value="<? echo $row[6];?>" size="50" maxlength="15" onChange="conMayusculas(this)"></td>
</tr>
<?php if (($_SESSION["nivelw"]==4)||($_SESSION["nivelw"]==8)||($_SESSION["nivelw"]==42)||($_SESSION["nivelw"]==43)||($_SESSION["nivelw"]==24)||($_SESSION["nivelw"]==40)||($_SESSION["nivelw"]==35)||($_SESSION["nivelw"]==44)||($_SESSION["nivelw"]==46)){?>
<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Delegaci&oacute;n</FONT></td>
<td><select name="delegacion" id "delegacion" style="width:350px">
<option value="<? echo $row[2];?>"><? echo $row[3];?></option>
<?php
$res = mysql_query("select id_delegacion, nombre from delegaciones where tipo_delegg in(10,9) and aactivo='1' order by nombre asc");
$cant =  mysql_num_rows($res);
if($cant>0){
while($rs = mysql_fetch_array($res)){
echo "<option value='$rs[id_delegacion]'>$rs[nombre]</option>";
 }
} ?></select></td></tr><? }?>
<?php if (($_SESSION["nivelw"]==4)||($_SESSION["nivelw"]==8)||($_SESSION["nivelw"]==42)||($_SESSION["nivelw"]==43)||($_SESSION["nivelw"]==24)||($_SESSION["nivelw"]==40)||($_SESSION["nivelw"]==35)||($_SESSION["nivelw"]==44)||($_SESSION["nivelw"]==46)){?>
<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">En Oficina de Enlace</FONT></td>
<td><select id="oe" name="oe" style="width:350px"><option value="<? echo $row[4];?>" selected="selected" ><? echo $row[5];?></option></select></td></tr><? }?>
<?php if ($_SESSION["nivelw"]==9){?>
<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">En Oficina de Enlace</FONT></td>
<td><select name="oe" id "oe" style="width:350px">
<option value="<? echo $row[4];?>"><? echo $row[5];?></option>
<?php
$sql10 = "select id_oems, oems from oems where delegacion='$num_delegacion' and activoo='1' order by oems asc";
$result10 = mysql_query($sql10,$link);
while (list($id_oems,$oems)=mysql_fetch_array($result10))
{
	echo "<option value='$id_oems'>$oems</option>";
} ?></select></td></tr><? }?>
<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Comisionado Por</FONT></td>
<td><select name="comisionado_por" id "comisionado_por" style="width:350px">
<option value="<? echo $row[13];?>"><? echo $row[14];?></option>
<?php
$sql11 = "select id_oems, oems from oems order by oems asc";
$result11 = mysql_query($sql11,$link);
while (list($id_oems,$oems)=mysql_fetch_array($result11))
{
	echo "<option value='$id_oems'>$oems</option>";
} ?></select></td>
</tr>
<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Cargo</FONT></td>
<td><select name="cargo" id "cargo" style="width:350px">
<option value="<? echo $row[22];?>"><? echo $row[23];?></option>
<?php

$sql3 = "select id_cargo, descripcion_cargo from tbl_cargo where activo_cargo='1' and categoria='COMISIONADO' order by descripcion_cargo asc";
$result3 = mysql_query($sql3,$link);
while (list($id_cargo,$descripcion_cargo)=mysql_fetch_array($result3))
		{
		echo "<option value='$id_cargo'>$descripcion_cargo</option>";
		} ?>
</select></td>
</tr>
<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Area</FONT></td>
<td><select name="area" id "area" style="width:350px" onChange="habilitar(this.form);">
<option value="<? echo $row[24];?>"><? echo $row[25];?></option>
<?php

$res = mysql_query("SELECT id_area, descripcion_area FROM tbl_area  WHERE activo_area='1' order by descripcion_area asc  ");
$cant =  mysql_num_rows($res);
if($cant>0){
while($rs = mysql_fetch_array($res)){
echo "<option value='$rs[id_area]' >$rs[descripcion_area]</option>";
 }
} ?>
</select>
&nbsp;&nbsp;
<FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif" id="pasaporte">Area Pasaporte</FONT>
&nbsp;
<select id="area_pasaporte" name="area_pasaporte" style="width:250px"><option value="<? echo $row[26];?>" selected="selected" ><? echo $row[27];?></option></select></td></tr>
<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Nivel de Estudios</FONT></td>
<td><select name="nestudios" id "nestudios" style="width:350px" onChange="situacion_habilita(this.form);">
<option value="<? echo $row[32];?>"><? echo $row[33];?></option>
<?php
$res = mysql_query("SELECT id_estudios, descripcion_estudios FROM tbl_nivel_estudios  WHERE activo_estudios='1' order by id_estudios asc  ");
$cant =  mysql_num_rows($res);
if($cant>0){
while($rs = mysql_fetch_array($res)){
echo "<option value='$rs[id_estudios]' >$rs[descripcion_estudios]</option>";
 }
} 
?>
</select>
&nbsp;&nbsp;
<FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif" id="estudios">Situación</FONT>
&nbsp;
<select id="situacion" name="situacion" style="width:250px"><option value="<? echo $row[34];?>" selected="selected" ><? echo $row[35];?></option></select></td>
</tr>
<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Idioma(s)</FONT></td>
<td><select name="idioma" id "idioma" style="width:350px" onChange="situacion_idioma(this.form);">
<option value="<? echo $row[36];?>"><? echo $row[37];?></option>
<?php
$res = mysql_query("select id_idiomas, descripcion_idiomas from tbl_idiomas where activo_idiomas='1' order by id_idiomas asc");
$cant =  mysql_num_rows($res);
if($cant>0){
while($rs = mysql_fetch_array($res)){
echo "<option value='$rs[id_idiomas]' >$rs[descripcion_idiomas]</option>";
 }
} 
?>
</select>
&nbsp;&nbsp;
<FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif" id="nidioma">Nivel</FONT>
&nbsp;
<select id="nidiomas" name="nidiomas" style="width:250px"><option value="<? echo $row[38];?>" selected="selected" ><? echo $row[39];?></option></select></td>
</tr>
<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Número de Oficio</FONT></td>
<td><input type="text" name="num_oficio" id="num_oficio" size="50" maxlength="50" value="<? echo $row[16];?>" onChange="conMayusculas(this)" onKeyPress="return acentos(event)"></td>
</tr>
<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Fecha de Oficio</FONT></td>
<td colspan="6"><input type="text" name="fecha_oficio" value="<? echo $row[17];?>" id="fecha_oficio"  size="50">
<button type="reset" id="f_trigger_b">
<img src="../../../imagenes/feb.gif" width="16" height="20" border="0"></button>
<script type="text/javascript">
Calendar.setup({
inputField     :    "fecha_oficio",      
ifFormat       :    "%Y-%m-%d",      
showsTime      :    true,            
button         :    "f_trigger_b",   
singleClick    :    false,           
step           :    1 });</script></td>
</tr>
<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Fecha de Ingreso a la Delegaci&oacute;n</FONT></td>
<td colspan="6"><input type="text" name="fecha_delegacion" id="fecha_delegacion" value="<? echo $row[30];?>"  size="50"  onChange="Fechas()">
<button type="reset" id="f_trigger_b2">
<img src="../../../imagenes/feb.gif" width="16" height="20" border="0"></button>
<script type="text/javascript">
Calendar.setup({
inputField     :    "fecha_delegacion",      
ifFormat       :    "%Y-%m-%d",      
showsTime      :    true,            
button         :    "f_trigger_b2",   
singleClick    :    false,           
step           :    1 });</script>
</td>
</tr>
<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Observaciones</FONT></td>
<td><select name="obs" id "obs" style="width:350px">
<option value="<? echo $row[41];?>"><? echo $row[42];?></option>
<?php
$res = mysql_query("select id_tipo, tipo from tbl_tipo_asistencia where categoria='3' order by id_tipo asc");
$cant =  mysql_num_rows($res);
if($cant>0){
while($rs = mysql_fetch_array($res)){
echo "<option value='$rs[id_tipo]' >$rs[tipo]</option>";
 }
} 
?>
</select>
</td></tr>
<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Motivo de la Baja</FONT></td>
<td><select name="baja" id "baja" style="width:350px">
<option value="">Seleccione</option>
<option value="1">Baja Temporal, cambio de Delegación</option>
<option value="2">Baja Definitiva</option>

</select>
</td></tr>
<?php if (($_SESSION["nivelw"]==4)||($_SESSION["nivelw"]==8)||($_SESSION["nivelw"]==42)||($_SESSION["nivelw"]==43)||($_SESSION["nivelw"]==24)||($_SESSION["nivelw"]==40)||($_SESSION["nivelw"]==35)||($_SESSION["nivelw"]==44)||($_SESSION["nivelw"]==46)){?>
<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Funciones</FONT></td>
<td><textarea name="funciones" id="funciones" rows="10" cols="100" onChange="conMayusculas(this)"><? echo $row["funciones"];?></textarea></td>
</tr>
<? }?>
<tr>
<td align="right" colspan="3"><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif">Hora de Registro 
<input type="text" name="reloj" size="10"></font></td>
</tr>


<tr>
<td colspan="2" align="center"><input type="submit" name="Submit"  value="Eliminar Registro" onClick=" javascript:window.alert('Deseas eliminar o dar de baja al trabajador?.');">
<input type="hidden" name="id_p" id="id_p" value="<? echo $row[0]; ?>" /></td>
</tr>
</table>
</fieldset>
</div>
</form>
<? }?>
</body>
</html>
