<? 
ini_set("session.gc_maxlifetime","14400");  
session_start();
?>
<html>
<head>
<title>Alta de Personal SRE</title>
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
combos['rango_sem'] = "sem";
posicion = $(this).attr("name");
valor = $(this).val()
if(posicion == 'rango_sem' && valor==0){
$("#sem").html('	<option  value=""  selected="selected">----------------</option>')
}else{
$("#"+combos[posicion]).html('<option  selected="selected" value="">Cargando...</option>')
if(valor!="0" || posicion !='sem'){
$.post("combo_rangos.php",{
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
if(!frm.plaza.value != ""){
 window.alert("Favor de seleccionar la Plaza.");
  		 frm.plaza.focus();
       return false
  	}		
if(!frm.nivel.value != ""){
 window.alert("Favor de seleccionar el Nivel.");
  		 frm.nivel.focus();
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

if(!frm.fecha_sre.value != ""){
 window.alert("Favor de capturar la fecha de ingreso a la Secretaría de Relaciones Exteriores.");
  		 frm.fecha_sre.focus();
       return false
  	}			
	
if(!frm.fecha_delegacion.value != ""){
 window.alert("Favor de capturar la fecha de ingreso a la Delegación.");
  		 frm.fecha_delegacion.focus();
       return false
  	}		

if(!frm.obs.value != ""){
 window.alert("Favor de seleccionar una observación .");
  		 frm.obs.focus();
       return false
  	}		

if(!frm.hor_ent.value != ""){
 window.alert("Favor de seleccionar un horario de entrada .");
  		 frm.hor_ent.focus();
       return false
  	}		

if(!frm.hor_sal.value != ""){
 window.alert("Favor de seleccionar un horario de salida.");
  		 frm.hor_sal.focus();
       return false
  	}		

if(!frm.sem_ent.value != ""){
 window.alert("Favor de seleccionar el día inicial de la semana laboral.");
  		 frm.sem_ent.focus();
       return false
  	}		


if(!frm.sem_sal.value != ""){
 window.alert("Favor de seleccionar el día final de la semana laboral.");
  		 frm.sem_sal.focus();
       return false
  	}		

if(!frm.desc_ent.value != ""){
 window.alert("Favor de seleccionar el día inicial de descanso.");
  		 frm.desc_ent.focus();
       return false
  	}		

if(!frm.desc_sal.value != ""){
 window.alert("Favor de seleccionar el día final de descanso.");
  		 frm.desc_sal.focus();
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

function contrato(form){
if (form.ev.checked==true)
{
form.es.disabled = true;
form.hon.disabled = true;
}
else if (form.es.checked==true)
{
form.hon.disabled = true;
form.ev.disabled = true;
}
else if (form.hon.checked==true)
{
form.es.disabled = true;
form.ev.disabled = true;
}
else
{
form.es.disabled = false;
form.ev.disabled = false;
form.hon.disabled = false;
}
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
if ((form.nestudios.options[form.nestudios.selectedIndex].value == '6') || (form.nestudios.options[form.nestudios.selectedIndex].value == '7') || (form.nestudios.options[form.nestudios.selectedIndex].value == '8')|| (form.nestudios.options[form.nestudios.selectedIndex].value == '9'))    {
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


function observaciones(form){
if ((form.obs.options[form.obs.selectedIndex].value == '10'))
    {
	document.getElementById('loe').style.visibility='visible'
	document.getElementById('oe').style.visibility='visible'
    //form.area_pasaporte.disabled = false;
	}
	else {
	document.getElementById('loe').style.visibility='hidden'
	document.getElementById('oe').style.visibility='hidden'
//		 form.area_pasaporte.disabled = true;
		 }
		}	
		function situacion_dos_habilita(form){
if ((form.situacion.options[form.situacion.selectedIndex].value == '28') || (form.situacion.options[form.situacion.selectedIndex].value == '29') || (form.situacion.options[form.situacion.selectedIndex].value == '30'))
    {
	document.getElementById('otra_carrera').style.visibility='visible'
	
    //form.area_pasaporte.disabled = false;
	}
	else {
	document.getElementById('otra_carrera').style.visibility='hidden'
//		 form.area_pasaporte.disabled = true;
		 }
		}						




function Fechas(){
a1 = document.inserta_sre.fecha_sre.value
a2 = document.inserta_sre.fecha_delegacion.value
if (a1> a2){
alert("La Fecha de ingreso a la Delegación no puede ser mas antigua que la del Ingreso a la Secretaría. \nFavor de verificar lo que esta capturando con respecto a las Fechas de Ingreso. Gracias.");
	 inserta_sre.Submit.disabled=true;
	 }
	 else{
	 inserta_sre.Submit.disabled=false;
	 }
}
function mueveReloj()
    {
     momentoActual = new Date()
     hora = momentoActual.getHours()
     minuto = momentoActual.getMinutes()
     segundo = momentoActual.getSeconds()
     horaImprimible = hora + " : " + minuto + " : " + segundo
     document.inserta_sre.reloj.value = horaImprimible
     setTimeout("mueveReloj()",1000)
    }
	
function unidad(form){
if (form.sip.checked==true)
    {
	form.rango_sem.disabled = false;
    form.sem.disabled = false;
	}
	else
	{
	form.rango_sem.disabled = true;
	form.sem.disabled = true;
	}}	
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
$sSQL="insert into tbl_movimientos_usuarios (tipo_movimientos, id_trabajador_afectado,  usuario, fecha) values ('APERTURA DE LA INSERCION', '0', '$user', concat(curdate(),' ',curtime())) ";
$result = mysql_query($sSQL,$link);
if (!isset($nombre_personal))
	{
?>
<form name="inserta_sre" method="post" id="inserta_sre"  onSubmit="return validar(inserta_sre)">
<div align="center">
<fieldset style="width:1000px">
<?php if (($_SESSION["nivelw"]==4)||($_SESSION["nivelw"]==8)||($_SESSION["nivelw"]=='')||($_SESSION["nivelw"]=='42')||($_SESSION["nivelw"]=='35')||($_SESSION["nivelw"]==44)||($_SESSION["nivelw"]==46)){?>
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>REGISTRO DE PERSONAL SRE</strong></font></legend>
<? } if (($_SESSION["nivelw"]==9)){?>
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>REGISTRO DE PERSONAL SRE DE LA DELEGACION <? echo $nom_delegacion;?><input type="hidden" name="delegacion" id="delegacion" value="<? echo $num_delegacion;?>"> </strong></font></legend>
<? }?>
<table width="1000px">
<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Nombre</FONT></td>
<td><input type="text" name="nombre_personal" id="id_nombre_personal" size="50" maxlength="50" onChange="conMayusculas(this)" onKeyPress="return acentos(event)"></td>
</tr>
<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Apellido Paterno</FONT></td>
<td><input type="text" name="apellidop_p" id="id_apellidop_p" size="50" maxlength="50" onChange="conMayusculas(this)" onKeyPress="return acentos(event)"></td>
</tr>
<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Apellido Materno</FONT></td>
<td><input type="text" name="apellidom_p" id="apellidom_p" size="50" maxlength="50" onChange="conMayusculas(this)" onKeyPress="return acentos(event)"></td>
</tr>
<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Sexo</FONT></td>
<td><select name="sexo" id "sexo" style="width:350px">
<option value=>Seleccionar</option>
<option value='H'>Hombre</option>
<option value='M'>Mujer</option>
</select></td>
</tr>
<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">RFC</FONT></td>
<td><input type="text" name="rfc" id="rfc" size="50" maxlength="15" onChange="conMayusculas(this)"></td>
</tr>
<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Tipo de Contrato</FONT></td>
<td>
<FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">Eventual</FONT><input type="checkbox" name="ev" id="ev"  onClick="contrato(this.form);">
<FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">Estructura</FONT><input type="checkbox" name="es" id="es"  onClick="contrato(this.form);">
<FONT COLOR='#000000' size="1" face="Verdana, Arial, Helvetica, sans-serif">Honorarios</FONT><input type="checkbox" name="hon" id="hon"  onClick="contrato(this.form);"></td>
</tr>
<?php if (($_SESSION["nivelw"]==4)||($_SESSION["nivelw"]==8)||($_SESSION["nivelw"]=='42')||($_SESSION["nivelw"]=='35')||($_SESSION["nivelw"]==44)||($_SESSION["nivelw"]==46)){?>
<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Delegaci&oacute;n</FONT></td>
<td><select name="delegacion" id "delegacion" style="width:350px">
<option value=>Seleccionar</option>
<?php
$res = mysql_query("select id_delegacion, nombre from delegaciones where tipo_delegg in(10,9) and aactivo='1' order by nombre asc");
$cant =  mysql_num_rows($res);
if($cant>0){
while($rs = mysql_fetch_array($res)){
echo "<option value='$rs[id_delegacion]'>$rs[nombre]</option>";
 }
} ?></select></td></tr><? }?>
<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Plaza</FONT></td>
<td><select name="plaza" id "plaza" style="width:350px">
<option value=>Seleccionar</option>
<?php
$res = mysql_query("SELECT id_plaza, descripcion_plaza FROM tbl_plaza  WHERE activo_plaza='1' order by descripcion_plaza asc  ");
$cant =  mysql_num_rows($res);
if($cant>0){
while($rs = mysql_fetch_array($res)){
echo "<option value='$rs[id_plaza]'>$rs[descripcion_plaza]</option>";
 }
}
?>
</select></td>
</tr>

<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Nivel</FONT></td>
<td><select id="nivel" name="nivel" style="width:350px" ><option value="0" selected="selected" >Seleccionar</option></select></td>
</tr>

<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Rango SEM</FONT></td>
<td><input type="checkbox" name="sip" id="sip"  onClick="unidad(this.form);">
&nbsp;&nbsp;
<select name="rango_sem" id "rango_sem" disabled="disabled" style="width:315px">
<option value=>Seleccionar</option>
<?php

$res = mysql_query("SELECT id_rama, descripcion_rama from tbl_ramas where activo_rama='1' order by id_rama; ");
$cant =  mysql_num_rows($res);
if($cant>0){
while($rs = mysql_fetch_array($res)){
echo "<option value='$rs[id_rama]' >$rs[descripcion_rama]</option>";
 }
} ?>
</select>
&nbsp;&nbsp;
<select id="sem" name="sem" style='width:250px' disabled="disabled"><option value= selected="selected" >Seleccionar</option></select></td>
</tr>


<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Cargo</FONT></td>
<td><select name="cargo" id "cargo" style="width:350px">
<option value=>Seleccionar</option>
<?php

$sql3 = "select id_cargo, descripcion_cargo from tbl_cargo where activo_cargo='1' and categoria='SRE' order by descripcion_cargo asc";
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
<option value=>Seleccionar</option>
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
<FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif" id="pasaporte" style="visibility:hidden">Area Pasaporte</FONT>
&nbsp;
<select id="area_pasaporte" name="area_pasaporte" style="visibility:hidden; width:250px"><option value= selected="selected" >Seleccionar</option></select></td>
</tr>
<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Nivel de Estudios</FONT></td>
<td><select name="nestudios" id "nestudios" style="width:350px" onChange="situacion_habilita(this.form);">
<option value=>Seleccionar</option>
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
<FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif" id="estudios" style="visibility:hidden">Situación</FONT>
&nbsp;
<select id="situacion" name="situacion" style="visibility:hidden; width:250px" onChange="situacion_dos_habilita(this.form);"><option value= selected="selected" >Seleccionar</option></select>
</td>
</tr>
<tr style="visibility:hidden" id="otra_carrera">
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Especifíque Carrera</FONT></td>
<td><input type="text" name="otracarrera" id="otracarrera" size="30" maxlength="50" onChange="conMayusculas(this)"></td></tr>

<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Idioma(s)</FONT></td>
<td><select name="idioma" id "idioma" style="width:350px" onChange="situacion_idioma(this.form);">
<option value=>Seleccionar</option>
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
<FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif" id="nidioma" style="visibility:hidden">Nivel</FONT>
&nbsp;
<select id="nidiomas" name="nidiomas" style="visibility:hidden; width:250px"><option  selected="selected" >Seleccionar</option></select>
</td>
</tr>
<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Fecha de Ingreso a la Secretar&iacute;a</FONT></td>
<td colspan="6"><input type="text" name="fecha_sre" id="fecha_sre" readonly="readonly" size="50">
<button type="reset" id="f_trigger_b">
<img src="../../../imagenes/feb.gif" width="16" height="20" border="0"></button>
<script type="text/javascript">
Calendar.setup({
inputField     :    "fecha_sre",      
ifFormat       :    "%Y-%m-%d",      
showsTime      :    true,            
button         :    "f_trigger_b",   
singleClick    :    false,           
step           :    1 });</script>
</tr>
<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Fecha de Ingreso a la Delegaci&oacute;n</FONT></td>
<td colspan="6"><input type="text" name="fecha_delegacion" id="fecha_delegacion" readonly="readonly" size="50"  onChange="Fechas()">
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
<td><select name="obs" id "obs" style="width:350px" onChange="observaciones(this.form);">
<option value=>Seleccionar</option>
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
&nbsp;&nbsp;
<FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif" id="loe" style="visibility:hidden">OE</FONT>
&nbsp;
<?php if (($_SESSION["nivelw"]==4)||($_SESSION["nivelw"]==8)||($_SESSION["nivelw"]=='42')||($_SESSION["nivelw"]=='35')||($_SESSION["nivelw"]==44)||($_SESSION["nivelw"]==46)){?>
<select id="oe" name="oe" style="visibility:hidden; width:250px"><option  selected="selected" value=>Seleccionar</option></select><? }?>
<?php if ($_SESSION["nivelw"]==9){?>
<select name="oe" id "oe" style="visibility:hidden; width:250px">
<option selected="selected" value=>Seleccionar</option>
<?php
$sql10 = "select id_oems, oems from oems where delegacion='$num_delegacion' and activoo='1' order by oems asc";
$result10 = mysql_query($sql10,$link);
while (list($id_oems,$oems)=mysql_fetch_array($result10))
{
	echo "<option value='$id_oems'>$oems</option>";
} ?></select><? }?>
</td></tr>
<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Horario Laboral</FONT></td>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">De &nbsp; 
<select name='hor_ent'>
<option value="" selected>Seleccionar</option>
<option value='7:00'>7:00</option>
<option value='7:30'>7:30</option>
<option value='8:00'>8:00</option>
<option value='8:30'>8:30</option>
<option value='9:00'>9:00</option>
<option value='9:30'>9:30</option>
<option value='10:00'>10:00</option>
<option value='10:30'>10:30</option>
<option value='11:00'>11:00</option>
</select>
</select>
&nbsp; 
&nbsp; 
A &nbsp; 

<select name='hor_sal'>
<option value="" selected>Seleccionar</option>
<option value='14:00'>14:00</option>
<option value='14:30'>14:30</option>
<option value='15:00'>15:00</option>
<option value='15:30'>15:30</option>
<option value='16:00'>16:00</option>
<option value='16:30'>16:30</option>
<option value='17:00'>17:00</option>
<option value='17:30'>17:30</option>
<option value='18:00'>18:00</option>
<option value='18:30'>18:30</option>
<option value='19:00'>19:00</option>
<option value='19:30'>19:30</option>
<option value='20:00'>20:00</option>
<option value='20:30'>20:30</option>
<option value='21:00'>21:00</option>
<option value='21:30'>21:30</option>
<option value='22:00'>22:00</option>
</FONT></td></tr>

<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"> Semana Laboral</FONT></td>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">De &nbsp; 
<select name='sem_ent'>
<option value="" selected>Seleccionar</option>
<option value='Domingo'>Domingo</option>
<option value='Lunes'>Lunes</option>
<option value='Martes'>Martes</option>
<option value='Miercoles'>Miercoles</option>
<option value='Jueves'>Jueves</option>
<option value='Viernes'>Viernes</option>
<option value='Sabado'>Sabado</option>
</select>
&nbsp; 
&nbsp; 
A &nbsp; 

<select name='sem_sal'>
<option value="" selected>Seleccionar</option>
<option value='Domingo'>Domingo</option>
<option value='Lunes'>Lunes</option>
<option value='Martes'>Martes</option>
<option value='Miercoles'>Miercoles</option>
<option value='Jueves'>Jueves</option>
<option value='Viernes'>Viernes</option>
<option value='Sabado'>Sabado</option>
</select>
</FONT></td></tr>

<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"> Días de descanso</FONT></td>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
<select name='desc_ent'>
<option value="" selected>Seleccionar</option>
<option value='Domingo'>Domingo</option>
<option value='Lunes'>Lunes</option>
<option value='Martes'>Martes</option>
<option value='Miercoles'>Miercoles</option>
<option value='Jueves'>Jueves</option>
<option value='Viernes'>Viernes</option>
<option value='Sabado'>Sabado</option>
</select>
&nbsp; 
&nbsp; 
Y &nbsp; 

<select name='desc_sal'>
<option value="" selected>Seleccionar</option>
<option value='Domingo'>Domingo</option>
<option value='Lunes'>Lunes</option>
<option value='Martes'>Martes</option>
<option value='Miercoles'>Miercoles</option>
<option value='Jueves'>Jueves</option>
<option value='Viernes'>Viernes</option>
<option value='Sabado'>Sabado</option>
</select>
</FONT></td></tr>



<tr>
<td align="right" colspan="3"><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif">Hora de Registro 
    <input type="text" name="reloj" size="10"></font></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="Submit"  value="Guardar">
</tr>

</table>
</fieldset>
</div>
</form>
<? }
else{

if($obs==10){
$lugar='OFE';}
else {
$lugar='DELEGACION';}

if ($mysqli->multi_query("CALL sp_inserta_trabajador_sre ('$nombre_personal', '$apellidop_p', '$apellidom_p', '$sexo', '$rfc', '$ev', '$es', '$hon', '$delegacion', '$plaza', '$nivel', '$cargo', '$area',  '$area_pasaporte', '$nestudios', '$situacion', '$idioma', '$nidiomas', '$fecha_sre', '$fecha_delegacion', '$user', '$obs', '$sem', '$oe', '$lugar', '$otracarrera', '$hor_ent', '$hor_sal','$sem_ent','$sem_sal','$desc_ent', '$desc_sal');")) {
    do {
        if ($result = $mysqli->store_result()) {
            while ($row = $result->fetch_row()) {?>
<div align="center">			
<fieldset style="width:1000px">
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $row[0].' '.$row[1].' '.$row[2].' '.$row[3].' '.$row[4];?></strong></font></legend>
</fieldset>
<table>
<TR>
<TD>
<a href="alta_sre.php"><img src="../../../imagenes/regresar.gif" width="40" height="40" border="0"></a>
</TD>
</TR>
</table>
</div>
            <?
			
				}
            $result->close();
        }
    } while ($mysqli->next_result());
}
else {
    printf("<br />First Error: %s\n", $mysqli->error);
}

$mysqli->close();
}?>
</body>
</html>
