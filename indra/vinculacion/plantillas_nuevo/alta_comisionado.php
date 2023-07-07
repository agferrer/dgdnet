<? 
ini_set("session.gc_maxlifetime","14400");  
session_start();
?>
<html>
<head>
<title>Alta de Personal COMISIONADO</title>
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
if ((form.nestudios.options[form.nestudios.selectedIndex].value == '6') || (form.nestudios.options[form.nestudios.selectedIndex].value == '7') || (form.nestudios.options[form.nestudios.selectedIndex].value == '8')|| (form.nestudios.options[form.nestudios.selectedIndex].value == '9'))
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
a1 = document.inserta_comisionado.fecha_oficio.value
a2 = document.inserta_comisionado.fecha_delegacion.value
if (a1< a2){
alert("La Fecha de Oficio no puede ser mas antigua que la del Ingreso a la Delegación. \nFavor de verificar los que esta capturando con respecto a las Fechas. Gracias.");
	 inserta_comisionado.Submit.disabled=true;
	 }
	 else{
	 inserta_comisionado.Submit.disabled=false;
	 }
}
function mueveReloj()
    {
     momentoActual = new Date()
     hora = momentoActual.getHours()
     minuto = momentoActual.getMinutes()
     segundo = momentoActual.getSeconds()
     horaImprimible = hora + " : " + minuto + " : " + segundo
     document.inserta_comisionado.reloj.value = horaImprimible
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
$sSQL="insert into tbl_movimientos_usuarios (tipo_movimientos, id_trabajador_afectado,  usuario, fecha) values ('APERTURA DE LA INSERCION', '0', '$user', concat(curdate(),' ',curtime())) ";
$result = mysql_query($sSQL,$link);
if (!isset($nombre_personal))
	{
?>
<form name="inserta_comisionado" method="post" id="inserta_comisionado"  onSubmit="return validar(inserta_comisionado)">
<div align="center">
<fieldset style="width:1000px">
<?php if (($_SESSION["nivelw"]==4)||($_SESSION["nivelw"]==8)||($_SESSION["nivelw"]=='42')||($_SESSION["nivelw"]=='35')||($_SESSION["nivelw"]==44)||($_SESSION["nivelw"]==46)){?>
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>REGISTRO DE PERSONAL COMISIONADO</strong></font></legend>
<? } if (($_SESSION["nivelw"]==9)){?>
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>REGISTRO DE PERSONAL COMISIONADO DE LA DELEGACION <? echo $nom_delegacion;?><input type="hidden" name="delegacion" id="delegacion" value="<? echo $num_delegacion;?>"> </strong></font></legend>
<? }?>
<table width="1000px">
<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Nombre</FONT></td>
<td><input type="text" name="nombre_personal" id="id_nombre_personal" size="50" maxlength="50" onChange="conMayusculas(this)" onKeyPress="return acentos(event)"></td>
</tr>
<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Apellido Paterno</FONT></td>
<td><input type="text" name="apellidop_p" id="id_apellidop_p" size="50" maxlength="50" onChange="conMayusculas(this)" onKeyPress="return acentos(event)"> </td>
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
<?php if (($_SESSION["nivelw"]==4)||($_SESSION["nivelw"]==8)||($_SESSION["nivelw"]=='42')||($_SESSION["nivelw"]=='35')||($_SESSION["nivelw"]==44)||($_SESSION["nivelw"]==46)){?>
<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">En Oficina de Enlace</FONT></td>
<td><select id="oe" name="oe" style="width:350px"><option value= selected="selected" >Seleccionar</option></select></td></tr><? }?>
<?php if ($_SESSION["nivelw"]==9){?>
<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">En Oficina de Enlace</FONT></td>
<td><select name="oe" id "oe" style="width:350px">
<option value=>Seleccionar</option>
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
<option value=>Seleccionar</option>
<option value="185">GOBIERNO DEL ESTADO</option>
<option value="186">PRESIDENCIA MUNICIPAL/DELEGACION</option>
<option value="187">AYUNTAMIENTO</option>
<option value="188">GOBIERNO MUNICIPAL</option>
<option value="193">VANGENT</option>
<?php
$sql11 = "select id_oems, oems from oems where activoo='1' order by oems asc";
$result11 = mysql_query($sql11,$link);
while (list($id_oems,$oems)=mysql_fetch_array($result11))
{
	echo "<option value='$id_oems'>$oems</option>";
} ?></select></td>
</tr>
<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Cargo</FONT></td>
<td><select name="cargo" id "cargo" style="width:350px">
<option value=>Seleccionar</option>
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
<select id="area_pasaporte" name="area_pasaporte" style="visibility:hidden; width:250px"><option value= selected="selected" >Seleccionar</option></select></td></tr>
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
<select id="situacion" name="situacion" style="visibility:hidden; width:250px" onChange="situacion_dos_habilita(this.form);"><option value= selected="selected" >Seleccionar</option></select></td>
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
<select id="nidiomas" name="nidiomas" style="visibility:hidden; width:250px" ><option  selected="selected" >Seleccionar</option></select></td>
</tr>
<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Número de Oficio</FONT></td>
<td><input type="text" name="num_oficio" id="num_oficio" size="50" maxlength="50" onChange="conMayusculas(this)" onKeyPress="return acentos(event)"></td>
</tr>
<tr>
<td><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif">Fecha de Oficio</FONT></td>
<td colspan="6"><input type="text" name="fecha_oficio" id="fecha_oficio" readonly="readonly" size="50">
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
<td colspan="6"><input type="text" name="fecha_delegacion" id="fecha_delegacion" readonly="readonly" size="50"  >
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
<option value='22:00'>22:00</option></FONT></td></tr>

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
<td colspan="2" align="center"><input type="submit" name="Submit"  value="Guardar"></td>
</tr>
</table>
</fieldset>
</div>
</form>
<? }
else{

if(($oe=='')||($oe=='0')){
$lugar='DELEGACION';}
else {
$lugar='OFE';}
if ($mysqli->multi_query("CALL sp_inserta_trabajador_comisionado ('$nombre_personal', '$apellidop_p', '$apellidom_p', '$rfc', '$sexo', '$delegacion', '$oe', '$comisionado_por', '$cargo',  '$area', '$area_pasaporte', '$nestudios', '$situacion', '$idioma', '$nidiomas', '$num_oficio', '$obs', '$fecha_oficio', '$fecha_delegacion', '$user', '$lugar', '$otracarrera',  '$hor_ent', '$hor_sal','$sem_ent','$sem_sal','$desc_ent', '$desc_sal');")) {
    do {
        if ($result = $mysqli->store_result()) {
            while ($row = $result->fetch_row()) {?>
<div align="center">			
<fieldset style="width:1000px">
<legend align="center"><FONT COLOR='#000000' size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $row[0].' '.$row[1].' '.$row[2].' '.$row[3].' '.$row[4];?></strong></font></legend>
</fieldset>
<table>
<tr>
<td>
<a href="alta_comisionado.php"><img src="../../../imagenes/regresar.gif" width="40" height="40" border="0"></a></td></tr></table>
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
