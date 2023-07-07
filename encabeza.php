<?
 ini_set("session.gc_maxlifetime","14400");//variable para tener por 4 horas las variables de session cuando estes inactivas
 session_start(); ?>
<html>
<head>
<title>Encabezado</title>
<script type="text/javascript" src="js/jquery.js"></script>    

<link href="css/whmcs.css" rel="stylesheet">
<script language="JavaScript">
function Fecha()
{
meses = new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
data = new Date();
index = data.getMonth();
diasemana=new Array("Lunes","Martes","Miércoles","Jueves","Viernes","Sábado","Domingo");
indexday =  data.getDay();
if (indexday == 0)
indexday = 7;
any = data.getYear();
if (any < 1900)
any = 1900 + any;
document.write(diasemana[indexday-1]+ "," + ' '+data.getDate()+ " de " + meses[index] + " de " + any);
}
</script>
<?php
include('conexionindra.php');
$mysqli = Conectarse();
$link = Conectarse2();
if ($mysqli->multi_query("select id_restriccion,restriccion,activado from restricciones where id_restriccion='1';")) {
do {
/* store first result set */
if ($result = $mysqli->store_result()) {
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><script type="text/javascript" src="stmenu.js"></script></head>
<body bgcolor="#ffffff" text="#000000" link="#000000" vlink="#000000" alink="#000000" leftmargin="0" topmargin="0" bgproperties="fixed">
<div align="center">
<table width="1041" border="0" cellspacing="0">
<tr><td><div class="footerdivider"><div class="fill"></div></div></td></tr>
<tr><td><h3><font color="#00000" face="Verdana, Arial, Helvetica, sans-serif">Sistema de Gestión de Oficinas de Pasaportes</h3></td></tr>
<tr><td><div class="footerdivider"><div class="fill"></div></div></td></tr>
<tr>
<td height="20" align="center" valign="top" bgcolor="#e5e5e5"><div align="left"><em><font color="000066" face="Tahoma, Arial, Helvetica" size="2"><b>
<font color="#00000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Hoy es:
<script language="javascript">Fecha()</script>
</font></b></font><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="Estilo14"><b>Bienvenido(a):&nbsp;<?php echo $_SESSION["usuariow"]; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dirección/Delegación:<?php echo $_SESSION["direccionw"]; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if (($_SESSION["nivelw"]==4)){?><a href="registro.php" target="derecho">HOME</a><? }?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if (($_SESSION["nivelw"]==4)){?><a href="exit.php" target="_parent">SALIR</a><? }?> </b></span>
</font><font size="1" face="Verdana, Arial, Helvetica, sans-serif"></font></em></div></td></tr>

<tr><td height="380" valign="top" bgcolor="#ffffff"><div align="right">


<?php if (($_SESSION["nivelw"]==4)){
// Menu de uso exclusivo para el administrador?>
<script type="text/javascript">
<!--
stm_bm(["menu61b2",900,"","blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand","",1,25],this);
stm_bp("p0",[0,4,0,0,0,0,0,0,100,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,50,2,2,"#e2e2e2","#e2e2e2","",3,0,0,"#000000"]);
stm_ai("p0i0",[0,"DGD","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",0,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#FFFFF7","#000000","#000000","#000000","bold 8pt Verdana","italic bold 8pt Verdana",0,0,"","","","",0,0,0],148,24);
stm_bp("p1",[1,4,0,0,7,0,10,0,90,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,62,1,2,"#e2e2e2","#e2e2e2","",0,1,1,"#CCCCCC #B2B2B2 #B2B2B2"]);
stm_aix("p1i0","p0i0",[0,"Números de oficio","","",-1,-1,0,"indra/folios/oficios/indice.php","derecho","","","","",10,7,0,"","",0,0,0,0,1,"#e5e5e5",1,"#e5e5e5",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
/**/
stm_aix("p1i0","p0i0",[0,"Números de atentas notas","","",-1,-1,0,"indra/folios/atentasnotas/indice.php","derecho","","","","",10,7,0,"","",0,0,0,0,1,"#e5e5e5",1,"#e5e5e5",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
/**/
stm_aix("p1i1","p1i0",[0,"Copias Marcadas","","",-1,-1,0,"indra/folios/copias/indice.php","derecho","","","","",10,7,0,"","",0,0,0,0,1,"#CCCCCC",1,"#F2F2F2"],40,0);
stm_aix("p1i2","p1i1",[0,"Números de correo","","",-1,-1,0,"indra/folios/correo/indice.php"],40,0);
stm_aix("p1i3","p1i1",[0,"Acuse de Recibo","","",-1,-1,0,"indra/folios/acuse/indice_acuse.php"],40,0);
stm_aix("p1i4","p1i1",[0,"Manual de Usuario","","",-1,-1,0,"indra/folios/manual.pdf","_blank"],40,0);
stm_ep();
stm_ai("p0i1",[6,2,"#ffffff","",-1,-1,0]);
stm_aix("p0i2","p0i0",[0,"DOP"],148,24);
stm_bpx("p2","p1",[1,4,0,0,7,0,10,10]);
stm_aix("p2i0","p1i0",[0,"Puntos de Servicio \r\nen Operación","","",-1,-1,0,"","_self","","","","",10,7,0,"060420arrow3.gif","060420arrow3.gif",10,5],40,0);
stm_bp("p3",[1,2,3,0,3,3,4,0,79,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2","#e2e2e2","",3,1,1,"#B2B2B2"]);
stm_aix("p3i0","p1i0",[0,"Registro Mensual de \r\nCertificación DOP","","",-1,-1,0,"indra/puntos_servicio/agregar_punto.php","derecho","","","","arrow_03.gif",4,7,0,"","",0,0,0,0,1,"#000000",1,"#FFFFFF",1,"","",3]);
stm_aix("p3i1","p3i0",[0,"Modificar Registros de Certificación DOP","","",-1,-1,0,"indra/puntos_servicio/modificar_punto.php"]);
stm_aix("p3i2","p3i0",[0,"Consulta de Certificación por Delegación DOP","","",-1,-1,0,"indra/puntos_servicio/consulta_certificacion.php"]);
stm_aix("p3i3","p3i0",[0,"Registro Mensual de Certificación","","",-1,-1,0,"indra/puntos_servicio/agregar_punto_del.php"]);
stm_aix("p3i4","p3i0",[0,"Adjuntar Oficio de Certificación","","",-1,-1,0,"indra/upload/formsube.php"]);
stm_aix("p3i5","p3i0",[0,"Consulta de Certificación ","","",-1,-1,0,"indra/puntos_servicio/consulta_certificacion_del.php"]);
stm_aix("p3i6","p3i0",[0,"Manual de Usuario","","",-1,-1,0,"indra/puntos_servicio/Manual%20puntos%20de%20servicio.pdf","_blank"]);
stm_ep();
stm_aix("p2i1","p1i0",[0,"Puntos de Servicio \r\nVangent","","",-1,-1,0,"indra/puntos_servicio/vangent/frame_insertar.php"],40,0);
stm_aix("p2i2","p1i1",[0,"Reportes Puntos de\r\nServicio en Operación","","",-1,-1,0,"","_self","","","","",10,7,0,"060420arrow3.gif","060420arrow3.gif",10,5],40,0);
stm_bpx("p4","p3",[]);
stm_aix("p4i0","p3i0",[0,"Reporte de Certificación \r\nMensual DOP","","",-1,-1,0,"indra/puntos_servicio/rep_puntos_general.php"]);
stm_aix("p4i1","p3i0",[0,"Reporte de Certificación \r\npor Delegación - Año","","",-1,-1,0,"indra/puntos_servicio/rep_puntos_general_2008.php"]);
stm_aix("p4i2","p3i0",[0,"Reporte de Archivos \r\nAdjuntos DOP","","",-1,-1,0,"indra/puntos_servicio/consulta_adjuntos.php"]);
stm_aix("p4i3","p3i0",[0,"Reporte Fecha de \r\nCertificación DOP","","",-1,-1,0,"indra/puntos_servicio/consulta_fecha_certifica.php"]);
stm_ep();
stm_aix("p2i3","p2i2",[0,"Indicadores"],40,0);
stm_bpx("p5","p3",[1,2,3,0,3,3,4,10]);
stm_aix("p5i0","p3i0",[0,"Análisis de Tiempos y\r\nMovimientos en Operación","","",-1,-1,0,"","_self","","","","arrow_03.gif",4,7,0,"060420arrow3.gif","060420arrow3.gif",10,5]);
stm_bpx("p6","p3",[1,2,3,0,3,3,4,0,70]);
stm_aix("p6i0","p3i0",[0,"Reporte Global deTrámites con \r\nAutorización","","",-1,-1,0,"indra/generales_autorizacion_mismodia.php"]);
stm_aix("p6i1","p3i0",[0,"Comparativo de Delegaciones \r\nde Trámites con Autorización","","",-1,-1,0,"indra/generales_autorizacion_mismodia_deleg.php"]);
stm_aix("p6i2","p3i0",[0,"Reporte Detallado por Delegación\r\n de Trámites con Autorización","","",-1,-1,0,"indra/generales_autorizacion_detallado.php"]);
stm_aix("p6i3","p3i0",[0,"Tiempos de Producción por\r\nDelegación con Autorización","","",-1,-1,0,"indra/graficas/tiempos_produccion_delegacion.php"]);
stm_aix("p6i4","p3i0",[0,"Comparativo tiempos de \r\nProducción por etapas \r\ncon Autorización","","",-1,-1,0,"indra/graficas/tiempos_produccion_etapas.php"]);
stm_ep();
stm_aix("p5i1","p5i0",[0,"Indicadores en Operación"]);
stm_bpx("p7","p6",[]);
stm_aix("p7i0","p3i0",[0,"Autorizaciones por Delegación","","",-1,-1,0,"indra/indicadores/autoriza_por_deleg.php"]);
stm_aix("p7i1","p3i0",[0,"Autorizaciones por Delegación Global","","",-1,-1,0,"indra/indicadores/autoriza_todos_deleg.php"]);
stm_aix("p7i2","p3i0",[0,"Uso de Servicios del Sistema de\r\nCitas para el Trámite de Pasaportes","","",-1,-1,0,"indra/indicadores/inasistencia.php"]);
stm_aix("p7i3","p3i0",[0,"Producción Diaria","","",-1,-1,0,"indra/indicadores/produccion_diaria.php"]);
stm_ep();
stm_aix("p5i2","p5i0",[0,"Indicadores de Supervisión"]);
stm_bpx("p8","p6",[]);
stm_aix("p8i0","p3i0",[0,"Tiempo promedio de \r\nproducción","","",-1,-1,0,"indra/indicadores/tiempo%20promedio%20de%20produccion.php"]);
stm_aix("p8i1","p3i0",[0,"Tiempo promedio de \r\nautorizacion","","",-1,-1,0,"indra/indicadores/tiempo%20promedio%20de%20autorizacion.php"]);
stm_ep();
stm_ep();
stm_aix("p2i4","p1i1",[0,"Digitalización","","",-1,-1,0,"indra/digitalizacion/indice_digita.php"],40,0);
stm_aix("p2i4","p1i1",[0,"Calculo de Citas","","",-1,-1,0,"indra/indicadores/indice_citas.php"],40,0);
stm_ep();



stm_aix("p0i3","p0i1",[]);
stm_aix("p0i4","p0i0",[0,"Vinculación","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",1],148,24);
stm_bpx("p9","p2",[]);
stm_aix("p9i0","p2i0",[0,"Plantillas y Asistencia"],40,0);
stm_bpx("p10","p3",[]);
stm_aix("p10i0","p3i0",[0,"Alta de Personal","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/frame_insertar.php"],40,0);
stm_aix("p10i1","p3i0",[0,"Consulta Personal\r\nCarga de Documentos\r\nModificaciones","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/frame_buscando.php"],40,0);
stm_aix("p10i7","p3i0",[0,"Trabajadores dados de baja \r\ntemporal por cambio a una Delegación - Dirección","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/temporales.php"],40,0);
stm_aix("p10i2","p3i0",[0,"Asistencia","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/pasa_lista.php"],40,0);
stm_aix("p10i3","p3i0",[0,"Consulta de Asistencia","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/consultas_asistencias.php"],40,0);
stm_aix("p10i4","p3i0",[0,"Consulta de Movimientos","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/frame_consulta_movimientos.php"],40,0);
stm_aix("p10i5","p3i0",[0,"Consultas/Reportes","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/frame_consulta.php"],40,0);
stm_aix("p10i6","p3i0",[0,"Certificación","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/certificacion.php"],40,0);
stm_aix("p10i7","p3i0",[0,"Reporte \r\nCertificación","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/reporte_certificacion.php"],40,0);
stm_ep();
stm_aix("p9i1","p2i2",[0,"Unidad Móvil"],40,0);
stm_bpx("p11","p5",[]);
stm_aix("p11i0","p3i0",[0,"Cargar Unidad Móvil","","",-1,-1,0,"indra/vinculacion/ced/modificar_cd.php"]);
stm_aix("p11i1","p3i0",[0,"Cargar DGD","","",-1,-1,0,"indra/vinculacion/exped/dgdUnid.php"]);
stm_aix("p11i2","p5i0",[0,"Reporte","","",-1,-1,0,"","derecho"]);
stm_bpx("p12","p6",[]);
stm_aix("p12i0","p3i0",[0,"Reporte General","","",-1,-1,0,"indra/vinculacion/exped/repMobl.php"]);
stm_aix("p12i1","p3i0",[0,"Reporte Corto","","",-1,-1,0,"indra/vinculacion/exped/repMoblcrt.php"]);
stm_ep();
stm_ep();
stm_aix("p9i2","p2i2",[0,"Informe Estadístico"],40,0);
stm_bpx("p13","p5",[]);
stm_aix("p13i0","p3i0",[0,"Ingresar Reporte","","",-1,-1,0,"indra/vinculacion/iestadistico/index.php"]);
stm_aix("p13i1","p11i2",[0,"Reportes"]);
stm_bpx("p14","p6",[1,2,3,0,3,3,4,10]);
stm_aix("p14i0","p11i2",[0,"Remesas"]);
stm_bpx("p15","p6",[]);
stm_aix("p15i0","p3i0",[0,"General del año en curso","","",-1,-1,0,"indra/vinculacion/iestadistico/consulta.php"]);
stm_aix("p15i1","p3i0",[0,"Por Delegación y año","","",-1,-1,0,"indra/vinculacion/iestadistico/consultaa.php"]);
stm_ep();
stm_aix("p14i1","p11i2",[0,"Casos de Protección"]);
stm_bpx("p16","p6",[]);
stm_aix("p16i0","p3i0",[0,"General del año en curso","","",-1,-1,0,"indra/vinculacion/iestadistico/consulta2.php"]);
stm_aix("p16i1","p3i0",[0,"Por Delegación y año","","",-1,-1,0,"indra/vinculacion/iestadistico/consultab.php"]);
stm_ep();
stm_aix("p14i2","p11i2",[0,"Cooperación Educativa\r\ny Cultural"]);
stm_bpx("p17","p6",[]);
stm_aix("p17i0","p3i0",[0,"General del año en curso","","",-1,-1,0,"indra/vinculacion/iestadistico/consulta3.php"]);
stm_aix("p17i1","p3i0",[0,"Por Delegación y año","","",-1,-1,0,"indra/vinculacion/iestadistico/consultac.php"]);
stm_ep();
stm_aix("p14i3","p11i2",[0,"Concentrado por Rubros"]);
stm_bpx("p18","p6",[]);
stm_aix("p18i0","p3i0",[0,"General del año en curso","","",-1,-1,0,"indra/vinculacion/iestadistico/consulta4.php"]);
stm_aix("p18i1","p3i0",[0,"Por Delegación y año","","",-1,-1,0,"indra/vinculacion/iestadistico/consultad.php"]);
stm_ep();
stm_aix("p14i4","p11i2",[0,"Concentrado por Delegación"]);
stm_bpx("p19","p6",[]);
stm_aix("p19i0","p3i0",[0,"General del año en curso","","",-1,-1,0,"indra/vinculacion/iestadistico/consulta5.php"]);
stm_aix("p19i1","p3i0",[0,"Por Delegación y año","","",-1,-1,0,"indra/vinculacion/iestadistico/consultae.php"]);
stm_ep();
stm_ep();
stm_aix("p13i2","p3i6",[0,"Manual de Usuario","","",-1,-1,0,"indra/vinculacion/iestadistico/manual_usuario.pdf"]);
stm_ep();
stm_aix("p9i3","p2i2",[0,"Informe Ejecutivo"],40,0);
stm_bpx("p20","p5",[]);
stm_aix("p20i0","p3i0",[0,"Captura","","",-1,-1,0,"indra/vinculacion/iejecutivo/proteccion.php"]);
stm_aix("p20i1","p13i1",[]);
stm_bpx("p21","p6",[]);
stm_aix("p21i0","p3i0",[0,"Reporte General","","",-1,-1,0,"indra/vinculacion/iejecutivo/rep1.php"]);
stm_aix("p21i1","p3i0",[0,"Reporte por Mes","","",-1,-1,0,"indra/vinculacion/iejecutivo/rep2.php"]);
stm_aix("p21i2","p3i0",[0,"Reporte General por Delegación","","",-1,-1,0,"indra/vinculacion/iejecutivo/rep3.php"]);
stm_ep();
stm_aix("p20i2","p3i6",[0,"Manual de Usuario","","",-1,-1,0,"indra/vinculacion/iejecutivo/manual_usuario.pdf"]);
stm_ep();
stm_ep();
stm_aix("p0i5","p0i1",[]);
stm_aix("p0i6","p0i0",[0,"Supervisión"],148,24);
stm_bpx("p22","p2",[]);
stm_aix("p22i0","p2i2",[0,"OE´s"],40,24);
stm_bpx("p23","p5",[]);
stm_aix("p23i0","p3i0",[0,"Análisis de expedientes\r\nde Oficinas de Enlace","","",-1,-1,0,"indra/vinculacion/exped/expe1.php"]);
stm_aix("p23i1","p13i1",[]);
stm_bpx("p24","p6",[]);
stm_aix("p24i0","p3i0",[0,"Reporte general por\r\nDelegación ","","",-1,-1,0,"indra/vinculacion/exped/menrepOEgral.php"]);
stm_aix("p24i1","p3i0",[0,"Reporte de Expedientes\r\npor Oficinas de Enlace","","",-1,-1,0,"indra/vinculacion/expOE/repOEgralporOE.php"]);
stm_aix("p24i2","p3i0",[0,"Reporte de Diferencias","","",-1,-1,0,"indra/vinculacion/exped/diferencias.php"]);
stm_ep();
stm_aix("p23i2","p3i6",[0,"Manual de operación","","",-1,-1,0,"indra/vinculacion/exped/manualoe.pdf"]);
stm_ep();
stm_ep();
stm_aix("p0i7","p0i1",[]);
stm_aix("p0i8","p0i4",[0,"Normatividad"],148,24);
stm_bpx("p25","p2",[]);
stm_aix("p25i0","p2i0",[0,"Gestión de Pasaportes\r\nDiplomáticos y Oficiales"],40,0);
stm_bpx("p26","p3",[]);
stm_aix("p26i0","p3i6",[0,"Sitio WEB","","",-1,-1,0,"indra/normatividad/marco.php"]);
stm_ep();
stm_aix("p25i1","p2i2",[0,"Gestión de Denuncias"],40,0);
stm_bpx("p27","p5",[]);
stm_aix("p27i0","p5i0",[0,"Anomalías en Pasaportes"]);
stm_bpx("p28","p14",[]);
stm_aix("p28i0","p3i0",[0,"Registro de Casos\r\nMúltiples","","",-1,-1,0,"indra/normatividad/denuncias/casos.php"]);
stm_aix("p28i1","p3i0",[0,"Denuncias de Anomalías \r\nen Pasaportes","","",-1,-1,0,"indra/normatividad/denuncias/denuncias_ap.php"]);
stm_aix("p28i2","p3i0",[0,"Registro de la \r\nFicha de Datos","","",-1,-1,0,"indra/normatividad/denuncias/validacion_ficha.php"]);
stm_aix("p28i3","p3i0",[0,"Verificaciones","","",-1,-1,0,"indra/normatividad/denuncias/verificaciones.php"]);
stm_aix("p28i4","p3i0",[0,"Impedimentos","","",-1,-1,0,"indra/normatividad/denuncias/impedimentos.php"]);
stm_aix("p28i5","p3i0",[0,"Notificaciones","","",-1,-1,0,"indra/normatividad/denuncias/notificaciones.php"]);
stm_aix("p28i6","p3i0",[0,"Adjuntar Oficios \r\nde notificaciones","","",-1,-1,0,"indra/normatividad/denuncias/adjuntar_validacion.php"]);
stm_aix("p28i7","p3i0",[0,"Averiguaciones","","",-1,-1,0,"indra/normatividad/denuncias/averiguaciones.php"]);
stm_aix("p28i8","p5i0",[0,"Modificaciones"]);
stm_bpx("p29","p3",[1,2,3,0,3,3,4,0,60]);
stm_aix("p29i0","p3i0",[0,"Modificación de \r\ncasos Múltiples","","",-1,-1,0,"indra/normatividad/denuncias/modificar_caso.php"]);
stm_aix("p29i1","p3i0",[0,"Modificación de \r\nDenuncia AP","","",-1,-1,0,"indra/normatividad/denuncias/modificar_ap.php"]);
stm_aix("p29i2","p3i0",[0,"Modificación de \r\nFicha de Datos","","",-1,-1,0,"indra/normatividad/denuncias/modificar_ficha.php"]);
stm_aix("p29i3","p3i0",[0,"Modificación de\r\nFotografía","","",-1,-1,0,"indra/normatividad/denuncias/modifica_imagen.php"]);
stm_aix("p29i4","p3i0",[0,"Modificación de \r\nVerificaciones","","",-1,-1,0,"indra/normatividad/denuncias/modificar_verificaciones.php"]);
stm_aix("p29i5","p3i0",[0,"Modificación de \r\nImpedimentos","","",-1,-1,0,"indra/normatividad/denuncias/modificar_impedimentos.php"]);
stm_aix("p29i6","p3i0",[0,"Modificación de \r\nNotificaciones","","",-1,-1,0,"indra/normatividad/denuncias/modificar_notif.php"]);
stm_aix("p29i7","p3i0",[0,"Modificación de \r\nAveriguaciones","","",-1,-1,0,"indra/normatividad/denuncias/modificar_averiguaciones.php"]);
stm_ep();
stm_ep();
stm_aix("p27i1","p5i0",[0,"Robo de Insumos"]);
stm_bpx("p30","p14",[]);
stm_aix("p30i0","p3i0",[0,"Denuncias de Robo\r\nde Insumos","","",-1,-1,0,"indra/normatividad/denuncias/denuncias_ri.php"]);
stm_aix("p30i1","p28i5",[]);
stm_aix("p30i2","p28i6",[0,"Ajuntar Oficio \r\nde Notificación"]);
stm_aix("p30i3","p28i7",[]);
stm_aix("p30i4","p28i8",[]);
stm_bpx("p31","p29",[]);
stm_aix("p31i0","p3i0",[0,"Modificación de \r\nDenuncias RI","","",-1,-1,0,"indra/normatividad/denuncias/modificar_ri.php"]);
stm_aix("p31i1","p29i6",[]);
stm_aix("p31i2","p29i7",[]);
stm_ep();
stm_ep();
stm_aix("p27i2","p5i0",[0,"Consultas"]);
stm_bpx("p32","p14",[]);
stm_aix("p32i0","p5i0",[0,"Consulta de Folios"]);
stm_bpx("p33","p29",[]);
stm_aix("p33i0","p3i0",[0,"Consulta de Folios\r\nde Denuncia por Día","","",-1,-1,0,"indra/normatividad/denuncias/consulta_folio_dia.php"]);
stm_aix("p33i1","p3i0",[0,"Consulta de Folios\r\nde Denuncia por Rango \r\nde Fecha","","",-1,-1,0,"indra/normatividad/denuncias/consulta_folio_rango.php"]);
stm_ep();
stm_aix("p32i1","p3i0",[0,"Consulta de Denuncias y\r\nAnomalías en Pasaportes","","",-1,-1,0,"indra/normatividad/denuncias/consulta_ap.php"]);
stm_aix("p32i2","p3i0",[0,"Consulta de Denuncias\r\ny Robo de Insumos","","",-1,-1,0,"indra/normatividad/denuncias/consulta_ri.php"]);
stm_aix("p32i3","p3i0",[0,"Consulta de la\r\nFicha de Datos","","",-1,-1,0,"indra/normatividad/denuncias/consulta_ficha_datos.php"]);
stm_aix("p32i4","p3i0",[0,"Consulta de Documentos\r\nAdjuntos","","",-1,-1,0,"indra/normatividad/denuncias/consulta_doc.php"]);
stm_aix("p32i5","p3i0",[0,"Consulta por Casos","","",-1,-1,0,"indra/normatividad/denuncias/consulta_por_casos.php"]);
stm_ep();
stm_ep();
stm_aix("p25i2","p2i2",[0,"Existencia de \r\nExpedientes de Pasaportes"],40,0);
stm_bpx("p34","p5",[]);
stm_aix("p34i0","p5i0",[0,"Validación Diaria"]);
stm_bpx("p35","p6",[]);
stm_aix("p35i0","p3i0",[0,"Registro de Existencia \r\nde Expedientes","","",-1,-1,0,"indra/normatividad/certificacion/analisis_produccion.php"]);
stm_aix("p35i1","p3i0",[0,"Corrección de Informe \r\nDiario","","",-1,-1,0,"indra/normatividad/certificacion/correccion_porfecha.php"]);
stm_aix("p35i2","p3i0",[0,"Consulta y Reimpresión\r\nde Informes Diarios","","",-1,-1,0,"indra/normatividad/certificacion/consulta_por_fecha.php"]);
stm_ep();
stm_aix("p34i1","p11i2",[0,"Validación \r\nMensual","","",-1,-1,0,"construccion.php"]);
stm_bpx("p36","p14",[]);
stm_aix("p36i0","p11i2",[0,"Concentrados Mensuales"]);
stm_bpx("p37","p6",[]);
stm_aix("p37i0","p3i0",[0,"Existencia de Expedientes","","",-1,-1,0,"indra/normatividad/certificacion/certificacion_mensual/existencias.php"]);
stm_aix("p37i1","p3i0",[0,"Trámites Pendientes","","",-1,-1,0,"indra/normatividad/certificacion/certificacion_mensual/tramites.php"]);
stm_aix("p37i2","p3i0",[0,"Pasaportes Pendientes \r\nde Entrega","","",-1,-1,0,"indra/normatividad/certificacion/certificacion_mensual/pasaportes_pendientes.php"]);
stm_ep();
stm_aix("p36i1","p3i0",[0,"Generación de Oficio \r\nde Certificación Mensual","","",-1,-1,0,"indra/normatividad/certificacion/certificacion_mensual/oficio_certificacion.php"]);
stm_aix("p36i2","p3i0",[0,"Generar Informes \r\nMensuales","","",-1,-1,0,"indra/normatividad/certificacion/certificacion_mensual/menu_concentrados.php"]);
stm_aix("p36i3","p3i0",[0,"Adjuntar Oficio de \r\nCertificación Mensual","","",-1,-1,0,"indra/normatividad/certificacion/certificacion_mensual/adjuntar_oficio.php"]);
stm_ep();
stm_aix("p34i2","p11i2",[0,"Expedientes Extravíados"]);
stm_bpx("p38","p6",[]);
stm_aix("p38i0","p3i0",[0,"Registro de Expediente\r\nExtravíado","","",-1,-1,0,"indra/normatividad/certificacion/expedientes_extraviados.php"]);
stm_aix("p38i1","p3i0",[0,"Generar Informe de\r\nExpedientes \r\nExtravíados","","",-1,-1,0,"indra/normatividad/certificacion/reporte_extraviados.php"]);
stm_aix("p38i2","p3i0",[0,"Baja de Expedientes \r\nExtravíados","","",-1,-1,0,"indra/normatividad/certificacion/baja_extraviados.php"]);
stm_ep();
stm_ep();
stm_ep();
stm_aix("p0i9","p0i1",[]);
stm_aix("p0i10","p0i4",[0,"Ev. y Mejora de\r\n Delegaciones"],148,24);
stm_bpx("p39","p2",[]);
stm_aix("p39i0","p1i0",[0,"Atención ciudadana","","",-1,-1,0,"indra/evaluacion_mejora/opciones_menu.php"],40,0);
stm_aix("p39i1","p2i2",[0,"Capacitación de Personal"],40,0);
stm_bpx("p40","p5",[]);
stm_aix("p40i0","p3i0",[0,"Dar de alta Evento- Curso","","",-1,-1,0,"indra/capacitacion_trabajadores/captura/captura_evento_curso.php"]);
stm_aix("p40i1","p3i0",[0,"Continuar captura \r\nde Curso-Evento","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/continuacion_tramite.php"]);
stm_aix("p40i2","p11i2",[0,"Consultas / Reportes"]);
stm_bpx("p41","p3",[]);
stm_aix("p41i0","p3i0",[0,"Consulta por Curso","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_curso.php"]);
stm_aix("p41i1","p3i0",[0,"Consulta por Delegación","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_delegacion.php"]);
stm_aix("p41i2","p3i0",[0,"Consulta por Puesto","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_puesto.php"]);
stm_aix("p41i3","p3i0",[0,"Consulta por Sexo","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_sexo.php"]);
stm_aix("p41i4","p3i0",[0,"Consulta por Trabajador","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_trabajador.php"]);
stm_aix("p41i5","p3i0",[0,"Trabajadores No Capacitados","","",-1,-1,0,"indra/capacitacion_trabajadores/captura/persona_sin_capacitar/index.php"]);
stm_aix("p41i6","p3i0",[0,"Trabajadores Capacitados\r\npor Delegación","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/indicador_diferencias.php"]);
stm_aix("p41i7","p3i0",[0,"Consulta por Horas","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_horas.php"]);
stm_ep();
stm_ep();
stm_ep();
stm_aix("p0i11","p0i1",[]);
stm_aix("p0i12","p0i4",[0,"Administración"],148,24);
stm_bpx("p42","p2",[1,4,0,0,7,0,0]);
stm_aix("p42i0","p1i0",[0,"Usuarios","","",-1,-1,0,"","_self","","","","",0,0,0,"060420arrow3.gif","060420arrow3.gif",10,5,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"","",3,3,0,0,"#FFFFF7","#000000"],148,24);
stm_bpx("p43","p2",[1,2]);
stm_aix("p43i0","p2i0",[0,"Administración \r\nde Usuarios"],40,0);
stm_bpx("p44","p3",[]);
stm_aix("p44i0","p3i0",[0,"Agregar Usuario","","",-1,-1,0,"indra/usuarios/agregar_usuario.php"]);
stm_aix("p44i1","p3i0",[0,"Consultar Usuario","","",-1,-1,0,"indra/usuarios/rep_usuarios.php"]);
stm_aix("p44i2","p3i0",[0,"Modificar Usuarios","","",-1,-1,0,"indra/usuarios/modificar_usuario.php"]);
stm_ep();
stm_aix("p43i1","p2i0",[0,"Configuración\r\nde Usuarios"],40,0);
stm_bpx("p45","p3",[]);
stm_aix("p45i0","p3i0",[0,"Activar/Desactivar","","",-1,-1,0,"indra/usuarios/actdesc_usuario.php"]);
stm_aix("p45i1","p3i0",[0,"Cambiar Rol\r\nde Usuario","","",-1,-1,0,"indra/usuarios/rol_usuario.php"]);
stm_aix("p45i2","p3i0",[0,"Cambiar Contraseña","","",-1,-1,0,"indra/usuarios/modificar_pass.php"]);
stm_ep();
stm_ep();
stm_aix("p42i1","p42i0",[0,"Configuraciones"],148,24);
stm_bpx("p46","p43",[]);
stm_aix("p46i0","p2i0",[0,"Configuración para\r\nTiempos y \r\nMovimientos"],40,0);
stm_bpx("p47","p3",[]);
stm_aix("p47i0","p3i0",[0,"Parametros del\r\nAnálisis\r\nde Tiempos y \r\nMovimientos","","",-1,-1,0,"indra/configuracion/parametros.php"]);
stm_ep();
stm_aix("p46i1","p2i0",[0,"Configuración de \r\nDirecciones/\r\nDelegaciones"],40,0);
stm_bpx("p48","p3",[]);
stm_aix("p48i0","p3i0",[0,"Agregar Direcciones","","",-1,-1,0,"indra/direcciones/agregar_direccion.php"]);
stm_aix("p48i1","p3i0",[0,"Consultar Direcciones","","",-1,-1,0,"indra/direcciones/rep_direcciones.php"]);
stm_aix("p48i2","p3i0",[0,"Modificar Direcciones","","",-1,-1,0,"indra/direcciones/modificar_direccion.php"]);
stm_ep();
stm_aix("p46i2","p2i0",[0,"Configuración de\r\nRoles"],40,0);
stm_bpx("p49","p3",[]);
stm_aix("p49i0","p3i0",[0,"Agregar Roles","","",-1,-1,0,"indra/roles/agregar_rol.php"]);
stm_aix("p49i1","p3i0",[0,"Consultar Roles","","",-1,-1,0,"indra/roles/rep_roles.php"]);
stm_aix("p49i2","p3i0",[0,"Modificar Roles","","",-1,-1,0,"indra/roles/modificar_rol.php"]);
stm_ep();
stm_aix("p46i3","p2i0",[0,"Activación/\r\nDesactivación\r\nde Módulos"],40,0);
stm_bpx("p50","p3",[]);
stm_aix("p50i0","p3i0",[0,"Activar/\r\nDesactivar","","",-1,-1,0,"indra/restricciones/actdesc_url.php"]);
stm_ep();
stm_ep();
stm_ep();
stm_aix("p0i13","p0i1",[]);
stm_aix("p0i14","p0i4",[0,"Asistencia Citas"],148,24);
stm_bpx("p51","p2",[]);
stm_aix("p51i0","p2i2",[0,"Asistencia \r\n de Usuarios"],40,24);
stm_bpx("p52","p5",[]);
stm_aix("p52i0","p3i0",[0,"Asistencia","","",-1,-1,0,"indra/asistencia/delegaciones/policia.php"]);
stm_aix("p52i1","p3i0",[0,"Informes","","",-1,-1,0,"indra/asistencia/delegaciones/informes.php"]);
stm_ep();
stm_ep();
stm_ep();




stm_sc(1,["transparent","transparent","","",3,3,0,0,"#FFFFF7","#000000","up_disabled.gif","up_enabled.gif",7,9,0,"down_disabled.gif","down_enabled.gif",7,9,0,0,200]);
stm_em();
//-->
</script>
<? }?>

<?php if (($_SESSION["nivelw"]==7)){ // Administrador de  puntos de servicio?>
<script type="text/javascript">
<!--
stm_bm(["menu61b2",900,"","blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand","",1,25],this);
stm_bp("p0",[0,4,0,0,0,0,0,0,100,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,50,2,2,"#e2e2e2","#e2e2e2","",3,0,0,"#000000"]);
stm_ai("p0i0",[0,"DOP","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",0,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#FFFFF7","#000000","#000000","#000000","bold 8pt Verdana","italic bold 8pt Verdana",0,0,"","","","",0,0,0],148,24);
stm_bp("p1",[1,4,0,0,7,0,10,10,90,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,62,1,2,"#e2e2e2","#e2e2e2","",0,1,1,"#CCCCCC #B2B2B2 #B2B2B2"]);
stm_aix("p1i0","p0i0",[0,"Puntos de Servicio \r\nen Operación","","",-1,-1,0,"","_self","","","","",10,7,0,"060420arrow3.gif","060420arrow3.gif",10,5,0,0,1,"#e5e5e5",1,"#e5e5e5",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_bp("p2",[1,2,3,0,3,3,4,0,79,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2","#eeeeee","",3,1,1,"#B2B2B2"]);
stm_aix("p2i0","p1i0",[0,"Registro Mensual de \r\nCertificación DOP","","",-1,-1,0,"indra/puntos_servicio/agregar_punto.php","derecho","","","","arrow_03.gif",4,7,0,"","",0,0,0,0,1,"#000000",1,"#FFFFFF",1,"","",3]);
stm_aix("p2i1","p2i0",[0,"Modificar Registros de Certificación DOP","","",-1,-1,0,"indra/puntos_servicio/modificar_punto.php"]);
stm_aix("p2i2","p2i0",[0,"Consulta de Certificación por Delegación DOP","","",-1,-1,0,"indra/puntos_servicio/consulta_certificacion.php"]);
stm_aix("p2i3","p2i0",[0,"Registro Mensual de Certificación","","",-1,-1,0,"indra/puntos_servicio/agregar_punto_del.php"]);
stm_aix("p2i4","p2i0",[0,"Adjuntar Oficio de Certificación","","",-1,-1,0,"indra/upload/formsube.php"]);
stm_aix("p2i5","p2i0",[0,"Consulta de Certificación ","","",-1,-1,0,"indra/puntos_servicio/consulta_certificacion_del.php"]);
stm_aix("p2i6","p2i0",[0,"Manual de Usuario","","",-1,-1,0,"indra/puntos_servicio/Manual%20puntos%20de%20servicio.pdf","_blank"]);
stm_ep();
stm_aix("p1i1","p1i0",[0,"Reportes Puntos de\r\nServicio en Operación","","",-1,-1,0,"","_self","","","","",10,7,0,"060420arrow3.gif","060420arrow3.gif",10,5,0,0,1,"#CCCCCC",1,"#F2F2F2"],40,0);
stm_bpx("p3","p2",[]);
stm_aix("p3i0","p2i0",[0,"Reporte de Certificación \r\nMensual DOP","","",-1,-1,0,"indra/puntos_servicio/rep_puntos_general.php"]);
stm_aix("p3i1","p2i0",[0,"Reporte de Certificación \r\npor Delegación - Año","","",-1,-1,0,"indra/puntos_servicio/rep_puntos_general_2008.php"]);
stm_aix("p3i2","p2i0",[0,"Reporte de Archivos \r\nAdjuntos DOP","","",-1,-1,0,"indra/puntos_servicio/consulta_adjuntos.php"]);
stm_aix("p3i3","p2i0",[0,"Reporte Fecha de \r\nCertificación DOP","","",-1,-1,0,"indra/puntos_servicio/consulta_fecha_certifica.php"]);
stm_ep();
stm_aix("p1i2","p1i0",[0,"Certificación Equipos \r\ny Dispositivos Vangent","","",-1,-1,0,"indra/puntos_servicio/vangent/frame_insertar.php","derecho","","","","",10,7,0,"","",0,0],40,0);
stm_ep();
stm_ai("p0i1",[6,2,"#ffffff","",-1,-1,0]);
stm_aix("p0i2","p0i0",[0,"Usuarios","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",1],148,24);
stm_bpx("p4","p1",[]);
stm_aix("p4i0","p1i0",[0,"Administración \r\nde Usuarios"],40,0);
stm_bpx("p5","p2",[]);
stm_aix("p5i0","p2i0",[0,"Agregar Usuario","","",-1,-1,0,"indra/usuarios/agregar_usuario.php"]);
stm_aix("p5i1","p2i0",[0,"Consultar Usuario","","",-1,-1,0,"indra/usuarios/rep_usuarios.php"]);
stm_aix("p5i2","p2i0",[0,"Modificar Usuarios","","",-1,-1,0,"indra/usuarios/modificar_usuario.php"]);
stm_ep();
stm_aix("p4i1","p1i0",[0,"Configuración\r\nde Usuarios"],40,0);
stm_bpx("p6","p2",[]);
stm_aix("p6i0","p2i0",[0,"Activar/Desactivar","","",-1,-1,0,"indra/usuarios/actdesc_usuario.php"]);
stm_aix("p6i1","p2i0",[0,"Cambiar Rol\r\nde Usuario","","",-1,-1,0,"indra/usuarios/rol_usuario.php"]);
stm_aix("p6i2","p2i0",[0,"Cambiar Contraseña","","",-1,-1,0,"indra/usuarios/modificar_pass.php"]);
stm_ep();
stm_ep();
stm_aix("p0i3","p0i1",[]);
stm_aix("p0i4","p0i2",[0,"Configuraciones"],148,24);
stm_bpx("p7","p1",[]);
stm_aix("p7i0","p1i0",[0,"Activación/\r\nDesactivación\r\nde Módulos"],40,0);
stm_bpx("p8","p2",[]);
stm_aix("p8i0","p2i0",[0,"Activar/\r\nDesactivar","","",-1,-1,0,"indra/restricciones/actdesc_url.php"]);
stm_ep();
stm_ep();
stm_aix("p0i5","p0i1",[]);
stm_aix("p0i6","p0i2",[0,"Inicio","","",-1,-1,0,"registro.php","derecho","","","","",0,0,0,"","",0,0],148,24);
stm_aix("p0i7","p0i1",[]);
stm_aix("p0i8","p0i0",[0,"Salir","","",-1,-1,0,"exit.php","_parent","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#000000"],148,24);
stm_ep();
stm_sc(1,["transparent","transparent","","",3,3,0,0,"#FFFFF7","#000000","up_disabled.gif","up_enabled.gif",7,9,0,"down_disabled.gif","down_enabled.gif",7,9,0,0,200]);
stm_em();
//-->
</script>

<? }?>



<?php if (($_SESSION["nivelw"]==2)){ // Menu de uso exclusivo para el uso de las Delegaciones para la certificacion de puntos de servicio?>
<script type="text/javascript">
<!--
stm_bm(["menu61b2",900,"","blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand","",1,25],this);
stm_bp("p0",[0,4,0,0,0,0,0,0,100,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,50,2,2,"#e2e2e2","#e2e2e2","",3,0,0,"#000000"]);
stm_ai("p0i0",[0,"DOP","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",0,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#FFFFF7","#000000","#000000","#000000","bold 8pt Verdana","italic bold 8pt Verdana",0,0,"","","","",0,0,0],148,24);
stm_bp("p1",[1,4,0,0,7,0,10,10,90,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,62,1,2,"#e2e2e2","#e2e2e2","",0,1,1,"#CCCCCC #B2B2B2 #B2B2B2"]);
stm_aix("p1i0","p0i0",[0,"Certificación Equipos \r\ny Dispositivos Vangent","","",-1,-1,0,"","_self","","","","",10,7,0,"060420arrow3.gif","060420arrow3.gif",10,5,0,0,1,"#e5e5e5",1,"#e5e5e5",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_bp("p2",[1,2,3,0,3,3,4,0,79,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2","#eeeeee","",3,1,1,"#B2B2B2"]);
stm_aix("p2i0","p1i0",[0,"Manual de Usuario","","",-1,-1,0,"indra/puntos_servicio/vangent/Manual%20puntos%20de%20servicio.pdf","derecho","","","","arrow_03.gif",4,7,0,"","",0,0,0,0,1,"#000000",1,"#FFFFFF",1,"","",3]);

<?php
//while ($row = $result->fetch_row()) {
//if ($row[2]==1){?>
<!--stm_aix("p2i1","p2i0",[0,"Registro Mensual de Certificación","","",-1,-1,0,"indra/puntos_servicio/agregar_punto_del.php"]);
stm_aix("p1i1","p1i0",[0,"Certificación Equipos \r\ny Dispositivos Vangent","","",-1,-1,0,"indra/puntos_servicio/vangent/frame_insertar_dos.php","derecho","","","","",10,7,0,"","",0,0],40,0);<? // }}?>
stm_ep();

stm_ep();
stm_ai("p0i1",[6,2,"#ffffff","",-1,-1,0]);
stm_aix("p0i2","p0i0",[0,"Inicio","","",-1,-1,0,"registro.php","derecho","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1],148,24);
stm_aix("p0i3","p0i1",[]);
stm_aix("p0i4","p0i0",[0,"Salir","","",-1,-1,0,"exit.php","_parent","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#000000"],148,24);
stm_ep();
stm_sc(1,["transparent","transparent","","",3,3,0,0,"#FFFFF7","#000000","up_disabled.gif","up_enabled.gif",7,9,0,"down_disabled.gif","down_enabled.gif",7,9,0,0,200]);
stm_em();
//-->
</script>
<? }?>

<?php if (($_SESSION["nivelw"]==10)){
// Menu de uso exclusivo para los indicadores en operacion?>
<script type="text/javascript">
<!--
stm_bm(["menu61b2",900,"","blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand","",1,25],this);
stm_bp("p0",[0,4,0,0,0,0,0,0,100,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,50,2,2,"#e2e2e2","#e2e2e2","",3,0,0,"#000000"]);
stm_ai("p0i0",[0,"DOP","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",0,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#FFFFF7","#000000","#000000","#000000","bold 8pt Verdana","italic bold 8pt Verdana",0,0,"","","","",0,0,0],148,24);
stm_bp("p1",[1,4,0,0,7,0,10,10,90,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,62,1,2,"#e2e2e2","#e2e2e2","",0,1,1,"#CCCCCC #B2B2B2 #B2B2B2"]);
stm_aix("p1i0","p0i0",[0,"Indicadores","","",-1,-1,0,"","_self","","","","",10,7,0,"060420arrow3.gif","060420arrow3.gif",10,5,0,0,1,"#CCCCCC",1,"#F2F2F2",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_bp("p2",[1,2,3,0,3,3,4,10,79,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2","#eeeeee","",3,1,1,"#B2B2B2"]);
stm_aix("p2i0","p1i0",[0,"Análisis de Tiempos y\r\nMovimientos en Operación","","",-1,-1,0,"","_self","","","","arrow_03.gif",4,7,0,"060420arrow3.gif","060420arrow3.gif",10,5,0,0,1,"#000000",1,"#FFFFFF",1,"","",3]);
stm_bpx("p3","p2",[1,2,3,0,3,3,4,0,70,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2"]);
stm_aix("p3i0","p2i0",[0,"Reporte Global deTrámites con \r\nAutorización","","",-1,-1,0,"indra/generales_autorizacion_mismodia.php","derecho","","","","arrow_03.gif",4,7,0,"","",0,0]);
stm_aix("p3i1","p3i0",[0,"Comparativo de Delegaciones \r\nde Trámites con Autorización","","",-1,-1,0,"indra/generales_autorizacion_mismodia_deleg.php"]);
stm_aix("p3i2","p3i0",[0,"Reporte Detallado por Delegación\r\n de Trámites con Autorización","","",-1,-1,0,"indra/generales_autorizacion_detallado.php"]);
stm_aix("p3i3","p3i0",[0,"Tiempos de Producción por\r\nDelegación con Autorización","","",-1,-1,0,"indra/graficas/tiempos_produccion_delegacion.php"]);
stm_aix("p3i4","p3i0",[0,"Comparativo tiempos de \r\nProducción por etapas \r\ncon Autorización","","",-1,-1,0,"indra/graficas/tiempos_produccion_etapas.php"]);
stm_ep();
stm_aix("p2i1","p2i0",[0,"Indicadores en Operación"]);
stm_bpx("p4","p3",[]);
stm_aix("p4i0","p3i0",[0,"Autorizaciones por Delegación","","",-1,-1,0,"indra/indicadores/autoriza_por_deleg.php"]);
stm_aix("p4i1","p3i0",[0,"Autorizaciones por Delegación Global","","",-1,-1,0,"indra/indicadores/autoriza_todos_deleg.php"]);
stm_aix("p4i2","p3i0",[0,"Uso de Servicios del Sistema de\r\nCitas para el Trámite de Pasaportes","","",-1,-1,0,"indra/indicadores/inasistencia.php"]);
stm_aix("p4i3","p3i0",[0,"Producción Diaria","","",-1,-1,0,"indra/indicadores/produccion_diaria.php"]);
stm_ep();
stm_aix("p2i2","p2i0",[0,"Indicadores de Supervisión"]);
stm_bpx("p5","p3",[]);
stm_aix("p5i0","p3i0",[0,"Tiempo promedio de \r\nproducción","","",-1,-1,0,"indra/indicadores/tiempo%20promedio%20de%20produccion.php"]);
stm_aix("p5i1","p3i0",[0,"Tiempo promedio de \r\nautorizacion","","",-1,-1,0,"indra/indicadores/tiempo%20promedio%20de%20autorizacion.php"]);
stm_ep();
stm_ep();
stm_ep();
stm_ai("p0i1",[6,2,"#ffffff","",-1,-1,0]);
stm_aix("p0i2","p0i0",[0,"Inicio","","",-1,-1,0,"registro.php","derecho","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1],148,24);
stm_aix("p0i3","p0i1",[]);
stm_aix("p0i4","p0i0",[0,"Salir","","",-1,-1,0,"exit.php","_parent","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#000000"],148,24);
stm_ep();
stm_sc(1,["transparent","transparent","","",3,3,0,0,"#FFFFF7","#000000","up_disabled.gif","up_enabled.gif",7,9,0,"down_disabled.gif","down_enabled.gif",7,9,0,0,200]);
stm_em();
//-->
</script>
<? }?>
<?php if (($_SESSION["nivelw"]==13)){
// Menu de uso exclusivo para el administrador del moduloo de denuncias que pertenece a normatividad?>
<script type="text/javascript">
<!--
stm_bm(["menu61b2",900,"","blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand","",1,25],this);
stm_bp("p0",[0,4,0,0,0,0,0,0,100,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,50,1,3,"#e2e2e2","#e2e2e2","",3,0,0,"#000000"]);
stm_ai("p0i0",[0,"Normatividad","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#FFFFF7","#000000","#000000","#000000","bold 8pt Verdana","italic bold 8pt Verdana",0,0,"","","","",0,0,0],148,24);
stm_bp("p1",[1,4,0,0,7,0,10,10,90,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,62,1,2,"#e2e2e2","#e2e2e2","",0,1,1,"#CCCCCC #B2B2B2 #B2B2B2"]);
stm_aix("p1i0","p0i0",[0,"Gestión de Pasaportes\r\nDiplomáticos y Oficiales","","",-1,-1,0,"","_self","","","","",10,7,0,"060420arrow3.gif","060420arrow3.gif",10,5,0,0,1,"#e5e5e5",1,"#e5e5e5",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_bp("p2",[1,2,3,0,3,3,4,0,79,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2","#eeeeee","",3,1,1,"#B2B2B2"]);
stm_aix("p2i0","p1i0",[0,"Sitio WEB","","",-1,-1,0,"indra/normatividad/marco.php","_blank","","","","arrow_03.gif",4,7,0,"","",0,0,0,0,1,"#000000",1,"#FFFFFF",1,"","",3]);
stm_ep();
stm_aix("p1i1","p1i0",[0,"Gestión de Denuncias","","",-1,-1,0,"","_self","","","","",10,7,0,"060420arrow3.gif","060420arrow3.gif",10,5,0,0,1,"#CCCCCC",1,"#F2F2F2"],40,0);
stm_bpx("p3","p2",[1,2,3,0,3,3,4,10]);
stm_aix("p3i0","p2i0",[0,"Anomalías en Pasaportes","","",-1,-1,0,"","_self","","","","arrow_03.gif",4,7,0,"060420arrow3.gif","060420arrow3.gif",10,5]);
stm_bpx("p4","p2",[1,2,3,0,3,3,4,10,70,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2"]);
stm_aix("p4i0","p2i0",[0,"Registro de Casos\r\nMúltiples","","",-1,-1,0,"indra/normatividad/denuncias/casos.php","derecho"]);
stm_aix("p4i1","p4i0",[0,"Denuncias de Anomalías \r\nen Pasaportes","","",-1,-1,0,"indra/normatividad/denuncias/denuncias_ap.php"]);
stm_aix("p4i2","p4i0",[0,"Registro de la \r\nFicha de Datos","","",-1,-1,0,"indra/normatividad/denuncias/validacion_ficha.php"]);
stm_aix("p4i3","p4i0",[0,"Verificaciones","","",-1,-1,0,"indra/normatividad/denuncias/verificaciones.php"]);
stm_aix("p4i4","p4i0",[0,"Impedimentos","","",-1,-1,0,"indra/normatividad/denuncias/impedimentos.php"]);
stm_aix("p4i5","p4i0",[0,"Notificaciones","","",-1,-1,0,"indra/normatividad/denuncias/notificaciones.php"]);
stm_aix("p4i6","p4i0",[0,"Adjuntar Oficios \r\nde notificaciones","","",-1,-1,0,"indra/normatividad/denuncias/adjuntar_validacion.php"]);
stm_aix("p4i7","p4i0",[0,"Averiguaciones","","",-1,-1,0,"indra/normatividad/denuncias/averiguaciones.php"]);
stm_aix("p4i8","p3i0",[0,"Modificaciones"]);
stm_bpx("p5","p2",[1,2,3,0,3,3,4,0,60,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#b7dc61"]);
stm_aix("p5i0","p4i0",[0,"Modificación de \r\ncasos Múltiples","","",-1,-1,0,"indra/normatividad/denuncias/modificar_caso.php"]);
stm_aix("p5i1","p4i0",[0,"Modificación de \r\nDenuncia AP","","",-1,-1,0,"indra/normatividad/denuncias/modificar_ap.php"]);
stm_aix("p5i2","p4i0",[0,"Modificación de \r\nFicha de Datos","","",-1,-1,0,"indra/normatividad/denuncias/modificar_ficha.php"]);
stm_aix("p5i3","p4i0",[0,"Modificación de\r\nFotografía","","",-1,-1,0,"indra/normatividad/denuncias/modifica_imagen.php"]);
stm_aix("p5i4","p4i0",[0,"Modificación de \r\nVerificaciones","","",-1,-1,0,"indra/normatividad/denuncias/modificar_verificaciones.php"]);
stm_aix("p5i5","p4i0",[0,"Modificación de \r\nImpedimentos","","",-1,-1,0,"indra/normatividad/denuncias/modificar_impedimentos.php"]);
stm_aix("p5i6","p4i0",[0,"Modificación de \r\nNotificaciones","","",-1,-1,0,"indra/normatividad/denuncias/modificar_notif.php"]);
stm_aix("p5i7","p4i0",[0,"Modificación de \r\nAveriguaciones","","",-1,-1,0,"indra/normatividad/denuncias/modificar_averiguaciones.php"]);
stm_ep();
stm_ep();
stm_aix("p3i1","p3i0",[0,"Robo de Insumos"]);
stm_bpx("p6","p4",[]);
stm_aix("p6i0","p4i0",[0,"Denuncias de Robo\r\nde Insumos","","",-1,-1,0,"indra/normatividad/denuncias/denuncias_ri.php"]);
stm_aix("p6i1","p4i5",[]);
stm_aix("p6i2","p4i6",[0,"Ajuntar Oficio \r\nde Notificación"]);
stm_aix("p6i3","p4i7",[]);
stm_aix("p6i4","p4i8",[]);
stm_bpx("p7","p5",[]);
stm_aix("p7i0","p4i0",[0,"Modificación de \r\nDenuncias RI","","",-1,-1,0,"indra/normatividad/denuncias/modificar_ri.php"]);
stm_aix("p7i1","p5i6",[]);
stm_aix("p7i2","p5i7",[]);
stm_ep();
stm_ep();
stm_aix("p3i2","p3i0",[0,"Consultas"]);
stm_bpx("p8","p4",[]);
stm_aix("p8i0","p3i0",[0,"Consulta de Folios"]);
stm_bpx("p9","p5",[]);
stm_aix("p9i0","p4i0",[0,"Consulta de Folios\r\nde Denuncia por Día","","",-1,-1,0,"indra/normatividad/denuncias/consulta_folio_dia.php"]);
stm_aix("p9i1","p4i0",[0,"Consulta de Folios\r\nde Denuncia por Rango \r\nde Fecha","","",-1,-1,0,"indra/normatividad/denuncias/consulta_folio_rango.php"]);
stm_ep();
stm_aix("p8i1","p4i0",[0,"Consulta de Denuncias y\r\nAnomalías en Pasaportes","","",-1,-1,0,"indra/normatividad/denuncias/consulta_ap.php"]);
stm_aix("p8i2","p4i0",[0,"Consulta de Denuncias\r\ny Robo de Insumos","","",-1,-1,0,"indra/normatividad/denuncias/consulta_ri.php"]);
stm_aix("p8i3","p4i0",[0,"Consulta de la\r\nFicha de Datos","","",-1,-1,0,"indra/normatividad/denuncias/consulta_ficha_datos.php"]);
stm_aix("p8i4","p4i0",[0,"Consulta de Documentos\r\nAdjuntos","","",-1,-1,0,"indra/normatividad/denuncias/consulta_doc.php"]);
stm_aix("p8i5","p4i0",[0,"Consulta por Casos","","",-1,-1,0,"indra/normatividad/denuncias/consulta_por_casos.php"]);
stm_ep();
stm_ep();
stm_aix("p1i2","p1i1",[0,"Conciliación Diaria\r\nde Expedición"],40,0);
stm_bpx("p10","p3",[]);
stm_aix("p10i0","p3i0",[0,"Validación Diaria de \r\nExpedientes"]);
stm_bpx("p11","p4",[1,2,3,0,3,3,4,0]);
stm_aix("p11i0","p4i0",[0,"Análisis de producción","","",-1,-1,0,"indra/normatividad/certificacion/analisis_produccion.php"]);
stm_aix("p11i1","p4i0",[0,"Consulta por fecha\r\nde producción","","",-1,-1,0,"indra/normatividad/certificacion/consulta_por_fecha.php"]);
stm_ep();
stm_aix("p10i1","p4i0",[0,"Expedientes extravíados","","",-1,-1,0,"indra/normatividad/certificacion/expedientes_extraviados.php"]);
stm_aix("p10i2","p3i0",[0,"Certificación Mensual de \r\nExpedientes","","",-1,-1,0,"construccion.php","derecho"]);
stm_bpx("p12","p11",[]);
stm_aix("p12i0","p4i0",[0,"Pre-validación de Certificación\r\nMensual de Expedientes","","",-1,-1,0,"indra/normatividad/certificacion/certificacion_mensual/concentrado_validacion.php"]);
stm_aix("p12i1","p4i0",[0,"Generar Oficio de Certificación\r\nMensual de Expedientes","","",-1,-1,0,"indra/normatividad/certificacion/certificacion_mensual/oficio_certificacion.php"]);
stm_aix("p12i2","p4i0",[0,"Adjuntar Oficio de Certificación","","",-1,-1,0,"indra/normatividad/certificacion/certificacion_mensual/adjuntar_oficio.php"]);
stm_aix("p12i3","p4i0",[0,"Impresión de Concentrados\r\n Mensuales","","",-1,-1,0,"indra/normatividad/certificacion/certificacion_mensual/menu_concentrados.php"]);
stm_ep();
stm_aix("p10i3","p4i0",[0,"Concentración de Expedientes","","",-1,-1,0,"construccion.php"]);
stm_ep();
stm_ep();
stm_ai("p0i1",[6,2,"#ffffff","",-1,-1,0]);
stm_aix("p0i2","p0i0",[0,"Inicio","","",-1,-1,0,"registro.php","derecho","","","","",0,0,0,"","",0,0],148,24);
stm_aix("p0i3","p0i1",[]);
stm_aix("p0i4","p0i0",[0,"Salir","","",-1,-1,0,"exit.php","_parent","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#000000"],148,24);
stm_ep();
stm_sc(1,["transparent","transparent","","",3,3,0,0,"#FFFFF7","#000000","up_disabled.gif","up_enabled.gif",7,9,0,"down_disabled.gif","down_enabled.gif",7,9,0,0,200]);
stm_em();
//-->
</script>
<? }?>
<?php if (($_SESSION["nivelw"]==16)){
// Menu de uso exclusivo solo consultas al sistema de denuncias?>

<script type="text/javascript">
<!--
stm_bm(["menu61b2",900,"","blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand","",1,25],this);
stm_bp("p0",[0,4,0,0,0,0,0,0,100,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,50,1,3,"#e2e2e2","#e2e2e2","",3,0,0,"#000000"]);
stm_ai("p0i0",[0,"Normatividad","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#FFFFF7","#000000","#000000","#000000","bold 8pt Verdana","italic bold 8pt Verdana",0,0,"","","","",0,0,0],148,24);
stm_bp("p1",[1,4,0,0,7,0,10,10,90,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,62,1,2,"#e2e2e2","#e5e5e5","",0,1,1,"#CCCCCC #B2B2B2 #B2B2B2"]);
stm_aix("p1i0","p0i0",[0,"Gestión de Denuncias","","",-1,-1,0,"","_self","","","","",10,7,0,"060420arrow3.gif","060420arrow3.gif",10,5,0,0,1,"#CCCCCC",1,"#F2F2F2",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_bp("p2",[1,2,3,0,3,3,4,10,79,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2","#eeeeee","",3,1,1,"#B2B2B2"]);
stm_aix("p2i0","p1i0",[0,"Consultas","","",-1,-1,0,"","_self","","","","arrow_03.gif",4,7,0,"060420arrow3.gif","060420arrow3.gif",10,5,0,0,1,"#000000",1,"#FFFFFF",1,"","",3]);
stm_bpx("p3","p2",[1,2,3,0,3,3,4,10,70,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2"]);
stm_aix("p3i0","p2i0",[0,"Consulta de Folios"]);
stm_bpx("p4","p2",[1,2,3,0,3,3,4,0,60,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#b7dc61"]);
stm_aix("p4i0","p2i0",[0,"Consulta de Folios\r\nde Denuncia por Día","","",-1,-1,0,"indra/normatividad/denuncias/consulta_folio_dia.php","derecho","","","","arrow_03.gif",4,7,0,"","",0,0]);
stm_aix("p4i1","p4i0",[0,"Consulta de Folios\r\nde Denuncia por Rango \r\nde Fecha","","",-1,-1,0,"indra/normatividad/denuncias/consulta_folio_rango.php"]);
stm_ep();
stm_aix("p3i1","p4i0",[0,"Consulta de Denuncias y\r\nAnomalías en Pasaportes","","",-1,-1,0,"indra/normatividad/denuncias/consulta_ap.php"]);
stm_aix("p3i2","p4i0",[0,"Consulta de Denuncias\r\ny Robo de Insumos","","",-1,-1,0,"indra/normatividad/denuncias/consulta_ri.php"]);
stm_aix("p3i3","p4i0",[0,"Consulta de la\r\nFicha de Datos","","",-1,-1,0,"indra/normatividad/denuncias/consulta_ficha_datos.php"]);
stm_aix("p3i4","p4i0",[0,"Consulta de Documentos\r\nAdjuntos","","",-1,-1,0,"indra/normatividad/denuncias/consulta_doc.php"]);
stm_aix("p3i5","p4i0",[0,"Consulta por Casos","","",-1,-1,0,"indra/normatividad/denuncias/consulta_por_casos.php"]);
stm_ep();
stm_ep();
stm_ep();
stm_ai("p0i1",[6,2,"#ffffff","",-1,-1,0]);
stm_aix("p0i2","p0i0",[0,"Inicio","","",-1,-1,0,"registro.php","derecho","","","","",0,0,0,"","",0,0],148,24);
stm_aix("p0i3","p0i1",[]);
stm_aix("p0i4","p0i0",[0,"Salir","","",-1,-1,0,"exit.php","_parent","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#000000"],148,24);
stm_ep();
stm_sc(1,["transparent","transparent","","",3,3,0,0,"#FFFFF7","#000000","up_disabled.gif","up_enabled.gif",7,9,0,"down_disabled.gif","down_enabled.gif",7,9,0,0,200]);
stm_em();
//-->
</script>
<? }?>
<?php if (($_SESSION["nivelw"]==17)){
// Menu de uso exclusivo solo para robo de insumos al sistema de denuncias?>

<script type="text/javascript">
<!--
stm_bm(["menu61b2",900,"","blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand","",1,25],this);
stm_bp("p0",[0,4,0,0,0,0,0,0,100,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,50,1,3,"#e2e2e2","#e2e2e2","",3,0,0,"#000000"]);
stm_ai("p0i0",[0,"Normatividad","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#FFFFF7","#000000","#000000","#000000","bold 8pt Verdana","italic bold 8pt Verdana",0,0,"","","","",0,0,0],148,24);
stm_bp("p1",[1,4,0,0,7,0,10,10,90,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,62,1,2,"#e2e2e2","#e5e5e5","",0,1,1,"#CCCCCC #B2B2B2 #B2B2B2"]);
stm_aix("p1i0","p0i0",[0,"Gestión de Denuncias","","",-1,-1,0,"","_self","","","","",10,7,0,"060420arrow3.gif","060420arrow3.gif",10,5,0,0,1,"#CCCCCC",1,"#F2F2F2",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_bp("p2",[1,2,3,0,3,3,4,10,79,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2","#eeeeee","",3,1,1,"#B2B2B2"]);
stm_aix("p2i0","p1i0",[0,"Robo de Insumos","","",-1,-1,0,"","_self","","","","arrow_03.gif",4,7,0,"060420arrow3.gif","060420arrow3.gif",10,5,0,0,1,"#000000",1,"#FFFFFF",1,"","",3]);
stm_bpx("p3","p2",[1,2,3,0,3,3,4,10,70,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2"]);
stm_aix("p3i0","p2i0",[0,"Denuncias de Robo\r\nde Insumos","","",-1,-1,0,"indra/normatividad/denuncias/denuncias_ri.php","derecho","","","","arrow_03.gif",4,7,0,"","",0,0]);
stm_aix("p3i1","p3i0",[0,"Notificaciones","","",-1,-1,0,"indra/normatividad/denuncias/notificaciones.php"]);
stm_aix("p3i2","p3i0",[0,"Ajuntar Oficio \r\nde Notificación","","",-1,-1,0,"indra/normatividad/denuncias/adjuntar_validacion.php"]);
stm_aix("p3i3","p3i0",[0,"Averiguaciones","","",-1,-1,0,"indra/normatividad/denuncias/averiguaciones.php"]);
stm_aix("p3i4","p2i0",[0,"Modificaciones"]);
stm_bpx("p4","p2",[1,2,3,0,3,3,4,0,60,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#b7dc61"]);
stm_aix("p4i0","p3i0",[0,"Modificación de \r\nDenuncias RI","","",-1,-1,0,"indra/normatividad/denuncias/modificar_ri.php"]);
stm_aix("p4i1","p3i0",[0,"Modificación de \r\nNotificaciones","","",-1,-1,0,"indra/normatividad/denuncias/modificar_notif.php"]);
stm_aix("p4i2","p3i0",[0,"Modificación de \r\nAveriguaciones","","",-1,-1,0,"indra/normatividad/denuncias/modificar_averiguaciones.php"]);
stm_ep();
stm_ep();
stm_aix("p2i1","p2i0",[0,"Consultas"]);
stm_bpx("p5","p3",[]);
stm_aix("p5i0","p2i0",[0,"Consulta de Folios"]);
stm_bpx("p6","p4",[]);
stm_aix("p6i0","p3i0",[0,"Consulta de Folios\r\nde Denuncia por Día","","",-1,-1,0,"indra/normatividad/denuncias/consulta_folio_dia.php"]);
stm_aix("p6i1","p3i0",[0,"Consulta de Folios\r\nde Denuncia por Rango \r\nde Fecha","","",-1,-1,0,"indra/normatividad/denuncias/consulta_folio_rango.php"]);
stm_ep();
stm_aix("p5i1","p3i0",[0,"Consulta de Denuncias\r\ny Robo de Insumos","","",-1,-1,0,"indra/normatividad/denuncias/consulta_ri.php"]);
stm_aix("p5i2","p3i0",[0,"Consulta de Documentos\r\nAdjuntos","","",-1,-1,0,"indra/normatividad/denuncias/consulta_doc.php"]);
stm_aix("p5i3","p3i0",[0,"Consulta por Casos","","",-1,-1,0,"indra/normatividad/denuncias/consulta_por_casos.php"]);
stm_ep();
stm_ep();
stm_ep();
stm_ai("p0i1",[6,2,"#ffffff","",-1,-1,0]);
stm_aix("p0i2","p0i0",[0,"Inicio","","",-1,-1,0,"registro.php","derecho","","","","",0,0,0,"","",0,0],148,24);
stm_aix("p0i3","p0i1",[]);
stm_aix("p0i4","p0i0",[0,"Salir","","",-1,-1,0,"exit.php","_parent","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#000000"],148,24);
stm_ep();
stm_sc(1,["transparent","transparent","","",3,3,0,0,"#FFFFF7","#000000","up_disabled.gif","up_enabled.gif",7,9,0,"down_disabled.gif","down_enabled.gif",7,9,0,0,200]);
stm_em();
//-->
</script>
<? }?>
<?php if (($_SESSION["nivelw"]==18)){
// Menu de uso exclusivo  solo para anomalias de pasaportes al sistema de denuncias?>

<script type="text/javascript">
<!--
stm_bm(["menu61b2",900,"","blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand","",1,25],this);
stm_bp("p0",[0,4,0,0,0,0,0,0,100,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,50,1,3,"#e2e2e2","#e2e2e2","",3,0,0,"#000000"]);
stm_ai("p0i0",[0,"Normatividad","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#FFFFF7","#000000","#000000","#000000","bold 8pt Verdana","italic bold 8pt Verdana",0,0,"","","","",0,0,0],148,24);
stm_bp("p1",[1,4,0,0,7,0,10,10,90,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,62,1,2,"#e2e2e2","#e2e2e2","",0,1,1,"#CCCCCC #B2B2B2 #B2B2B2"]);
stm_aix("p1i0","p0i0",[0,"Gestión de Denuncias","","",-1,-1,0,"","_self","","","","",10,7,0,"060420arrow3.gif","060420arrow3.gif",10,5,0,0,1,"#CCCCCC",1,"#F2F2F2",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_bp("p2",[1,2,3,0,3,3,4,10,79,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2","#eeeeee","",3,1,1,"#B2B2B2"]);
stm_aix("p2i0","p1i0",[0,"Anomalías en Pasaportes","","",-1,-1,0,"","_self","","","","arrow_03.gif",4,7,0,"060420arrow3.gif","060420arrow3.gif",10,5,0,0,1,"#000000",1,"#FFFFFF",1,"","",3]);
stm_bpx("p3","p2",[1,2,3,0,3,3,4,10,70,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2"]);
stm_aix("p3i0","p2i0",[0,"Registro de Casos\r\nMúltiples","","",-1,-1,0,"indra/normatividad/denuncias/casos.php","derecho","","","","arrow_03.gif",4,7,0,"","",0,0]);
stm_aix("p3i1","p3i0",[0,"Denuncias de Anomalías \r\nen Pasaportes","","",-1,-1,0,"indra/normatividad/denuncias/denuncias_ap.php"]);
stm_aix("p3i2","p3i0",[0,"Registro de la \r\nFicha de Datos","","",-1,-1,0,"indra/normatividad/denuncias/validacion_ficha.php"]);
stm_aix("p3i3","p3i0",[0,"Verificaciones","","",-1,-1,0,"indra/normatividad/denuncias/verificaciones.php"]);
stm_aix("p3i4","p3i0",[0,"Impedimentos","","",-1,-1,0,"indra/normatividad/denuncias/impedimentos.php"]);
stm_aix("p3i5","p3i0",[0,"Notificaciones","","",-1,-1,0,"indra/normatividad/denuncias/notificaciones.php"]);
stm_aix("p3i6","p3i0",[0,"Adjuntar Oficios \r\nde notificaciones","","",-1,-1,0,"indra/normatividad/denuncias/adjuntar_validacion.php"]);
stm_aix("p3i7","p3i0",[0,"Averiguaciones","","",-1,-1,0,"indra/normatividad/denuncias/averiguaciones.php"]);
stm_aix("p3i8","p2i0",[0,"Modificaciones"]);
stm_bpx("p4","p2",[1,2,3,0,3,3,4,0,60,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2"]);
stm_aix("p4i0","p3i0",[0,"Modificación de \r\ncasos Múltiples","","",-1,-1,0,"indra/normatividad/denuncias/modificar_caso.php"]);
stm_aix("p4i1","p3i0",[0,"Modificación de \r\nDenuncia AP","","",-1,-1,0,"indra/normatividad/denuncias/modificar_ap.php"]);
stm_aix("p4i2","p3i0",[0,"Modificación de \r\nFicha de Datos","","",-1,-1,0,"indra/normatividad/denuncias/modificar_ficha.php"]);
stm_aix("p4i3","p3i0",[0,"Modificación de\r\nFotografía","","",-1,-1,0,"indra/normatividad/denuncias/modifica_imagen.php"]);
stm_aix("p4i4","p3i0",[0,"Modificación de \r\nVerificaciones","","",-1,-1,0,"indra/normatividad/denuncias/modificar_verificaciones.php"]);
stm_aix("p4i5","p3i0",[0,"Modificación de \r\nImpedimentos","","",-1,-1,0,"indra/normatividad/denuncias/modificar_impedimentos.php"]);
stm_aix("p4i6","p3i0",[0,"Modificación de \r\nNotificaciones","","",-1,-1,0,"indra/normatividad/denuncias/modificar_notif.php"]);
stm_aix("p4i7","p3i0",[0,"Modificación de \r\nAveriguaciones","","",-1,-1,0,"indra/normatividad/denuncias/modificar_averiguaciones.php"]);
stm_ep();
stm_ep();
stm_aix("p2i1","p2i0",[0,"Consultas"]);
stm_bpx("p5","p3",[]);
stm_aix("p5i0","p2i0",[0,"Consulta de Folios"]);
stm_bpx("p6","p4",[]);
stm_aix("p6i0","p3i0",[0,"Consulta de Folios\r\nde Denuncia por Día","","",-1,-1,0,"indra/normatividad/denuncias/consulta_folio_dia.php"]);
stm_aix("p6i1","p3i0",[0,"Consulta de Folios\r\nde Denuncia por Rango \r\nde Fecha","","",-1,-1,0,"indra/normatividad/denuncias/consulta_folio_rango.php"]);
stm_ep();
stm_aix("p5i1","p3i0",[0,"Consulta de Denuncias y\r\nAnomalías en Pasaportes","","",-1,-1,0,"indra/normatividad/denuncias/consulta_ap.php"]);
stm_aix("p5i2","p3i0",[0,"Consulta de la\r\nFicha de Datos","","",-1,-1,0,"indra/normatividad/denuncias/consulta_ficha_datos.php"]);
stm_aix("p5i3","p3i0",[0,"Consulta de Documentos\r\nAdjuntos","","",-1,-1,0,"indra/normatividad/denuncias/consulta_doc.php"]);
stm_aix("p5i4","p3i0",[0,"Consulta por Casos","","",-1,-1,0,"indra/normatividad/denuncias/consulta_por_casos.php"]);
stm_ep();
stm_ep();
stm_ep();
stm_ai("p0i1",[6,2,"#ffffff","",-1,-1,0]);
stm_aix("p0i2","p0i0",[0,"Inicio","","",-1,-1,0,"registro.php","derecho","","","","",0,0,0,"","",0,0],148,24);
stm_aix("p0i3","p0i1",[]);
stm_aix("p0i4","p0i0",[0,"Salir","","",-1,-1,0,"exit.php","_parent","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#000000"],148,24);
stm_ep();
stm_sc(1,["transparent","transparent","","",3,3,0,0,"#FFFFF7","#000000","up_disabled.gif","up_enabled.gif",7,9,0,"down_disabled.gif","down_enabled.gif",7,9,0,0,200]);
stm_em();
//-->
</script>
<? }?>
<?php if (($_SESSION["nivelw"]==9)){
// Menu de uso exclusivo  solo para vinculacion en el apartado de plantilla de personal?>
<script type="text/javascript">
<!--
stm_bm(["menu61b2",900,"","blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand","",1,25],this);
stm_bp("p0",[0,4,0,0,0,0,0,0,100,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,50,1,3,"#e2e2e2","#e2e2e2","",3,0,0,"#000000"]);
stm_ai("p0i0",[0,"Plantillas","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#FFFFF7","#000000","#000000","#000000","bold 8pt Verdana","italic bold 8pt Verdana",0,0,"","","","",0,0,0],148,24);
stm_bp("p1",[1,4,0,0,7,0,4,0,90,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,62,1,2,"#e2e2e2","#e2e2e2","",0,1,1,"#CCCCCC #B2B2B2 #B2B2B2"]);
stm_aix("p1i0","p0i0",[0,"Alta de Personal","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/frame_insertar_dos.php","derecho","","","","arrow_03.gif",4,7,0,"","",0,0,0,0,1,"#000000",1,"#FFFFFF",1,"","",3,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_aix("p1i1","p1i0",[0,"Consulta Personal\r\nCarga de Documentos\r\nModificaciones","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/frame_buscando.php"],40,0);
stm_aix("p1i1","p1i0",[0,"Trabajadores dados de baja\r\ntemporal por\r\ncambio a una Delegación - Dirección","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/temporales.php"],40,0);
stm_aix("p1i2","p1i0",[0,"Asistencia","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/pasa_lista.php"],40,0);
stm_aix("p1i3","p1i0",[0,"Consulta de Asistencia","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/consultas_asistencias.php"],40,0);
stm_aix("p1i4","p1i0",[0,"Consultas/Reportes","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/frame_consulta_dos.php"],40,0);
<? 
$consulta2=mysql_query("select id_restriccion,restriccion,activado from restricciones where id_restriccion='2';");

while ($row= mysql_fetch_array($consulta2)){
if($row[2]==1){?>

stm_aix("p1i5","p1i0",[0,"Certificación","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/certificacion.php"],40,0);
stm_aix("p1i5","p1i0",[0,"Continuar Certificación","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/reporceso cert.php"],40,0);
<? }}?>
stm_ep();
stm_ai("p0i1",[6,2,"#ffffff","",-1,-1,0]);
stm_aix("p0i2","p0i0",[0,"Inicio","","",-1,-1,0,"registro.php","derecho","","","","",0,0,0,"","",0,0],148,24);
stm_aix("p0i3","p0i1",[]);
stm_aix("p0i4","p0i0",[0,"Salir","","",-1,-1,0,"exit.php","_parent","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#000000"],148,24);
stm_ep();
stm_sc(1,["transparent","transparent","","",3,3,0,0,"#FFFFF7","#000000","up_disabled.gif","up_enabled.gif",7,9,0,"down_disabled.gif","down_enabled.gif",7,9,0,0,200]);
stm_em();
//-->
</script>
<? }?>
<?php if (($_SESSION["nivelw"]==19)){
// Menu de uso exclusivo  solo para vinculacion en el apartado de plantilla de personal?>
<script type="text/javascript">
<!--
stm_bm(["menu61b2",900,"","blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand","",1,25],this);
stm_bp("p0",[0,4,0,0,0,0,0,0,100,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,50,1,3,"#e2e2e2","#e2e2e2","",3,0,0,"#000000"]);
stm_ai("p0i0",[0,"Supervisión","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",0,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#FFFFF7","#000000","#000000","#000000","bold 8pt Verdana","italic bold 8pt Verdana",0,0,"","","","",0,0,0],148,24);
stm_bp("p1",[1,4,0,0,7,0,10,10,90,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,62,1,2,"#e2e2e2","#e2e2e2","",0,1,1,"#CCCCCC #B2B2B2 #B2B2B2"]);
stm_aix("p1i0","p0i0",[0,"OE´s","","",-1,-1,0,"","_self","","","","",10,7,0,"060420arrow3.gif","060420arrow3.gif",10,5,0,0,1,"#CCCCCC",1,"#F2F2F2",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,24);
stm_bp("p2",[1,2,3,0,3,3,4,10,79,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2","#eeeeee","",3,1,1,"#B2B2B2"]);
stm_aix("p2i0","p1i0",[0,"Análisis de expedientes\r\nde Oficinas de Enlace","","",-1,-1,0,"indra/vinculacion/exped/expe1.php","derecho","","","","arrow_03.gif",4,7,0,"","",0,0,0,0,1,"#000000",1,"#FFFFFF",1,"","",3]);
stm_aix("p2i1","p2i0",[0,"Reportes","","",-1,-1,0,"","derecho","","","","arrow_03.gif",4,7,0,"060420arrow3.gif","060420arrow3.gif",10,5]);
stm_bpx("p3","p2",[1,2,3,0,3,3,4,0,70,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2"]);
stm_aix("p3i0","p2i0",[0,"Reporte general por\r\nDelegación ","","",-1,-1,0,"indra/vinculacion/exped/menrepOEgral.php"]);
stm_aix("p3i1","p2i0",[0,"Reporte de Expedientes\r\npor Oficinas de Enlace","","",-1,-1,0,"indra/vinculacion/expOE/repOEgralporOE.php"]);
stm_aix("p3i2","p2i0",[0,"Reporte de Diferencias","","",-1,-1,0,"indra/vinculacion/exped/diferencias.php"]);
stm_ep();
stm_aix("p2i2","p2i0",[0,"Manual de operación","","",-1,-1,0,"indra/vinculacion/exped/manualoe.pdf","_blank"]);
stm_ep();
stm_ep();
stm_ai("p0i1",[6,2,"#ffffff","",-1,-1,0]);
stm_aix("p0i2","p0i0",[0,"Inicio","","",-1,-1,0,"registro.php","derecho","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1],148,24);
stm_aix("p0i3","p0i1",[]);
stm_aix("p0i4","p0i0",[0,"Salir","","",-1,-1,0,"exit.php","_parent","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#000000"],148,24);
stm_ep();
stm_sc(1,["transparent","transparent","","",3,3,0,0,"#FFFFF7","#000000","up_disabled.gif","up_enabled.gif",7,9,0,"down_disabled.gif","down_enabled.gif",7,9,0,0,200]);
stm_em();
//-->
</script>
<? }?>
<?php if (($_SESSION["nivelw"]==8)){
// Menu de uso exclusivo para realizar solo para vinculacion en el apartado de plantilla de personal?>
<script type="text/javascript">
<!--
stm_bm(["menu61b2",900,"","blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand","",1,25],this);
stm_bp("p0",[0,4,0,0,0,0,0,0,100,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,50,1,3,"#e2e2e2","#e2e2e2","",3,0,0,"#000000"]);
stm_ai("p0i0",[0,"DGD","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",0,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#FFFFF7","#000000","#000000","#000000","bold 8pt Verdana","italic bold 8pt Verdana",0,0,"","","","",0,0,0],148,24);
stm_bp("p1",[1,4,0,0,7,0,10,0,90,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,62,1,2,"#e2e2e2","#e2e2e2","",0,1,1,"#CCCCCC #B2B2B2 #B2B2B2"]);
stm_aix("p1i0","p0i0",[0,"Números de oficio","","",-1,-1,0,"indra/folios/oficios/indice.php","derecho","","","","",10,7,0,"","",0,0,0,0,1,"#e5e5e5",1,"#e5e5e5",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_aix("p1i0","p0i0",[0,"Números de atentas notas","","",-1,-1,0,"indra/folios/atentasnotas/indice.php","derecho","","","","",10,7,0,"","",0,0,0,0,1,"#e5e5e5",1,"#e5e5e5",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_aix("p1i1","p1i0",[0,"Números de correo","","",-1,-1,0,"indra/folios/correo/indice.php","derecho","","","","",10,7,0,"","",0,0,0,0,1,"#CCCCCC",1,"#F2F2F2"],40,0);
stm_aix("p1i2","p1i1",[0,"Manual de Usuario","","",-1,-1,0,"indra/folios/manual.pdf","_blank"],40,0);
stm_ep();
stm_ai("p0i1",[6,2,"#ffffff","",-1,-1,0]);
stm_aix("p0i2","p0i0",[0,"Vinculación","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",1],148,24);
stm_bpx("p2","p1",[1,4,0,0,7,0,10,10]);
stm_aix("p2i0","p1i0",[0,"Plantillas y Asistencia","","",-1,-1,0,"","_self","","","","",10,7,0,"060420arrow3.gif","060420arrow3.gif",10,5],40,0);
stm_bp("p3",[1,2,3,0,3,3,4,0,79,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2","#eeeeee","",3,1,1,"#B2B2B2"]);
stm_aix("p3i0","p1i0",[0,"Alta de Personal","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/frame_insertar.php","derecho","","","","arrow_03.gif",4,7,0,"","",0,0,0,0,1,"#000000",1,"#FFFFFF",1,"","",3],40,0);
stm_aix("p3i1","p3i0",[0,"Consulta Personal\r\nCarga de Documentos\r\nModificaciones","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/frame_buscando.php"],40,0);
stm_aix("p3i1","p3i0",[0,"Trabajadores dados de baja\r\ntemporal por\r\ncambio a una Delegación - Dirección","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/temporales.php"],40,0);
stm_aix("p3i2","p3i0",[0,"Asistencia","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/pasa_lista.php"],40,0);
stm_aix("p3i3","p3i0",[0,"Consulta de Asistencia","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/consultas_asistencias.php"],40,0);
stm_aix("p3i4","p3i0",[0,"Consulta de Movimientos","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/frame_consulta_movimientos.php"],40,0);
stm_aix("p3i5","p3i0",[0,"Consultas/Reportes","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/frame_consulta.php"],40,0);
stm_aix("p3i6","p3i0",[0,"Certificación","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/certificacion.php"],40,0);
stm_aix("p3i7","p3i0",[0,"Reporte \r\nCertificación","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/reporte_certificacion.php"],40,0);
stm_ep();
stm_aix("p2i1","p1i1",[0,"Unidad Móvil","","",-1,-1,0,"","_self","","","","",10,7,0,"060420arrow3.gif","060420arrow3.gif",10,5],40,0);
stm_bpx("p4","p3",[1,2,3,0,3,3,4,10]);
stm_aix("p4i0","p3i0",[0,"Cargar Unidad Móvil","","",-1,-1,0,"indra/vinculacion/ced/modificar_cd.php"]);
stm_aix("p4i1","p3i0",[0,"Cargar DGD","","",-1,-1,0,"indra/vinculacion/exped/dgdUnid.php"]);
stm_aix("p4i2","p3i0",[0,"Reporte","","",-1,-1,0,"","derecho","","","","arrow_03.gif",4,7,0,"060420arrow3.gif","060420arrow3.gif",10,5]);
stm_bpx("p5","p3",[1,2,3,0,3,3,4,0,70,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2"]);
stm_aix("p5i0","p3i0",[0,"Reporte General","","",-1,-1,0,"indra/vinculacion/exped/repMobl.php"]);
stm_aix("p5i1","p3i0",[0,"Reporte Corto","","",-1,-1,0,"indra/vinculacion/exped/repMoblcrt.php"]);
stm_ep();
stm_ep();
stm_aix("p2i2","p2i1",[0,"Informe Estadístico"],40,0);
stm_bpx("p6","p4",[]);
stm_aix("p6i0","p3i0",[0,"Ingresar Reporte","","",-1,-1,0,"indra/vinculacion/iestadistico/index.php"]);
stm_aix("p6i1","p4i2",[0,"Reportes"]);
stm_bpx("p7","p5",[1,2,3,0,3,3,4,10]);
stm_aix("p7i0","p4i2",[0,"Remesas"]);
stm_bpx("p8","p5",[]);
stm_aix("p8i0","p3i0",[0,"General del año en curso","","",-1,-1,0,"indra/vinculacion/iestadistico/consulta.php"]);
stm_aix("p8i1","p3i0",[0,"Por Delegación y año","","",-1,-1,0,"indra/vinculacion/iestadistico/consultaa.php"]);
stm_ep();
stm_aix("p7i1","p4i2",[0,"Casos de Protección"]);
stm_bpx("p9","p5",[]);
stm_aix("p9i0","p3i0",[0,"General del año en curso","","",-1,-1,0,"indra/vinculacion/iestadistico/consulta2.php"]);
stm_aix("p9i1","p3i0",[0,"Por Delegación y año","","",-1,-1,0,"indra/vinculacion/iestadistico/consultab.php"]);
stm_ep();
stm_aix("p7i2","p4i2",[0,"Cooperación Educativa\r\ny Cultural"]);
stm_bpx("p10","p5",[]);
stm_aix("p10i0","p3i0",[0,"General del año en curso","","",-1,-1,0,"indra/vinculacion/iestadistico/consulta3.php"]);
stm_aix("p10i1","p3i0",[0,"Por Delegación y año","","",-1,-1,0,"indra/vinculacion/iestadistico/consultac.php"]);
stm_ep();
stm_aix("p7i3","p4i2",[0,"Concentrado por Rubros"]);
stm_bpx("p11","p5",[]);
stm_aix("p11i0","p3i0",[0,"General del año en curso","","",-1,-1,0,"indra/vinculacion/iestadistico/consulta4.php"]);
stm_aix("p11i1","p3i0",[0,"Por Delegación y año","","",-1,-1,0,"indra/vinculacion/iestadistico/consultad.php"]);
stm_ep();
stm_aix("p7i4","p4i2",[0,"Concentrado por Delegación"]);
stm_bpx("p12","p5",[]);
stm_aix("p12i0","p3i0",[0,"General del año en curso","","",-1,-1,0,"indra/vinculacion/iestadistico/consulta5.php"]);
stm_aix("p12i1","p3i0",[0,"Por Delegación y año","","",-1,-1,0,"indra/vinculacion/iestadistico/consultae.php"]);
stm_ep();
stm_ep();
stm_aix("p6i2","p3i0",[0,"Manual de Usuario","","",-1,-1,0,"indra/vinculacion/iestadistico/manual_usuario.pdf","_blank"]);
stm_ep();
stm_aix("p2i3","p2i1",[0,"Informe Ejecutivo"],40,0);
stm_bpx("p13","p4",[]);
stm_aix("p13i0","p3i0",[0,"Captura","","",-1,-1,0,"indra/vinculacion/iejecutivo/proteccion.php"]);
stm_aix("p13i1","p6i1",[]);
stm_bpx("p14","p5",[]);
stm_aix("p14i0","p3i0",[0,"Reporte General","","",-1,-1,0,"indra/vinculacion/iejecutivo/rep1.php"]);
stm_aix("p14i1","p3i0",[0,"Reporte por Mes","","",-1,-1,0,"indra/vinculacion/iejecutivo/rep2.php"]);
stm_aix("p14i2","p3i0",[0,"Reporte General por Delegación","","",-1,-1,0,"indra/vinculacion/iejecutivo/rep3.php"]);
stm_ep();
stm_aix("p13i2","p6i2",[0,"Manual de Usuario","","",-1,-1,0,"indra/vinculacion/iejecutivo/manual_usuario.pdf"]);
stm_ep();
stm_ep();
stm_aix("p0i3","p0i1",[]);
stm_aix("p0i4","p0i2",[0,"Sistema Nacional de \r\nDelegaciones"],148,24);
stm_bpx("p15","p2",[]);
stm_aix("p15i0","p2i1",[0,"Capacitación de Personal"],40,0);
stm_bpx("p16","p4",[]);
stm_aix("p16i0","p4i2",[0,"Consultas / Reportes"]);
stm_bpx("p17","p3",[]);
stm_aix("p17i0","p3i0",[0,"Consulta por Curso","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_curso.php"]);
stm_aix("p17i1","p3i0",[0,"Consulta por Delegación","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_delegacion.php"]);
stm_aix("p17i2","p3i0",[0,"Consulta por Puesto","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_puesto.php"]);
stm_aix("p17i3","p3i0",[0,"Consulta por Sexo","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_sexo.php"]);
stm_aix("p17i4","p3i0",[0,"Consulta por Trabajador","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_trabajador.php"]);
stm_aix("p17i5","p3i0",[0,"Trabajadores No Capacitados","","",-1,-1,0,"indra/capacitacion_trabajadores/captura/persona_sin_capacitar/index.php"]);
stm_aix("p17i6","p3i0",[0,"Trabajadores Capacitados\r\npor Delegación","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/indicador_diferencias.php"]);
stm_aix("p17i7","p3i0",[0,"Consulta por Horas","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_horas.php"]);
stm_ep();
stm_ep();
stm_ep();
stm_aix("p0i5","p0i1",[]);
stm_aix("p0i6","p0i2",[0,"Cambiar Contraseña","","",-1,-1,0,"indra/usuarios/modificar_pass.php","derecho","","","","",0,0,0,"","",0,0],148,24);
stm_aix("p0i7","p0i1",[]);
stm_aix("p0i8","p0i6",[0,"Inicio","","",-1,-1,0,"registro.php"],148,24);
stm_aix("p0i9","p0i1",[]);
stm_aix("p0i10","p0i0",[0,"Salir","","",-1,-1,0,"index.php","_parent","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#000000"],148,24);
stm_ep();
stm_sc(1,["transparent","transparent","","",3,3,0,0,"#FFFFF7","#000000","up_disabled.gif","up_enabled.gif",7,9,0,"down_disabled.gif","down_enabled.gif",7,9,0,0,200]);
stm_em();
//-->
</script>
<?php } if (($_SESSION["nivelw"]==21)){
// Conciliacion de expedientes?>
<script type="text/javascript">
<!--
stm_bm(["menu61b2",900,"","blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand","",1,25],this);
stm_bp("p0",[0,4,0,0,0,0,0,0,100,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,50,2,2,"#e2e2e2","#e2e2e2","",3,0,0,"#000000"]);
stm_ai("p0i0",[0,"Normatividad","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#FFFFF7","#000000","#000000","#000000","bold 8pt Verdana","italic bold 8pt Verdana",0,0,"","","","",0,0,0],148,24);
stm_bp("p1",[1,4,0,0,7,0,10,10,90,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,62,1,2,"#e2e2e2","#e2e2e2","",0,1,1,"#CCCCCC #B2B2B2 #B2B2B2"]);
stm_aix("p1i0","p0i0",[0,"Existencia de \r\nExpedientes de Pasaportes","","",-1,-1,0,"","_self","","","","",10,7,0,"060420arrow3.gif","060420arrow3.gif",10,5,0,0,1,"#CCCCCC",1,"#F2F2F2",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_bp("p2",[1,2,3,0,3,3,4,10,79,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2","#eeeeee","",3,1,1,"#B2B2B2"]);
stm_aix("p2i0","p1i0",[0,"Validación Diaria","","",-1,-1,0,"","_self","","","","arrow_03.gif",4,7,0,"060420arrow3.gif","060420arrow3.gif",10,5,0,0,1,"#000000",1,"#FFFFFF",1,"","",3]);
stm_bpx("p3","p2",[1,2,3,0,3,3,4,0,70,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2"]);
stm_aix("p3i0","p2i0",[0,"Registro de Existencia \r\nde Expedientes","","",-1,-1,0,"indra/normatividad/certificacion/analisis_produccion.php","derecho","","","","arrow_03.gif",4,7,0,"","",0,0]);
stm_aix("p3i1","p3i0",[0,"Corrección de Informe \r\nDiario","","",-1,-1,0,"indra/normatividad/certificacion/correccion_porfecha.php"]);
stm_aix("p3i2","p3i0",[0,"Consulta y Reimpresión\r\nde Informes Diarios","","",-1,-1,0,"indra/normatividad/certificacion/consulta_por_fecha.php"]);
stm_ep();
stm_aix("p2i1","p2i0",[0,"Validación \r\nMensual","","",-1,-1,0,"","derecho"]);
stm_bpx("p4","p3",[1,2,3,0,3,3,4,10]);
stm_aix("p4i0","p2i1",[0,"Concentrados Mensuales","","",-1,-1,0,""]);
stm_bpx("p5","p3",[]);
stm_aix("p5i0","p3i0",[0,"Existencia de Expedientes","","",-1,-1,0,"indra/normatividad/certificacion/certificacion_mensual/existencias.php"]);
stm_aix("p5i1","p3i0",[0,"Trámites Pendientes","","",-1,-1,0,"indra/normatividad/certificacion/certificacion_mensual/tramites.php"]);
stm_aix("p5i2","p3i0",[0,"Pasaportes Pendientes \r\nde Entrega","","",-1,-1,0,"indra/normatividad/certificacion/certificacion_mensual/pasaportes_pendientes.php"]);
stm_ep();
stm_aix("p4i1","p3i0",[0,"Generación de Oficio \r\nde Certificación Mensual","","",-1,-1,0,"indra/normatividad/certificacion/certificacion_mensual/oficio_certificacion.php"]);
stm_aix("p4i2","p3i0",[0,"Generar Informes \r\nMensuales","","",-1,-1,0,"indra/normatividad/certificacion/certificacion_mensual/menu_concentrados.php"]);
stm_aix("p4i3","p3i0",[0,"Adjuntar Oficio de \r\nCertificación Mensual","","",-1,-1,0,"indra/normatividad/certificacion/certificacion_mensual/adjuntar_oficio.php"]);
stm_ep();
stm_aix("p2i2","p4i0",[0,"Expedientes Extravíados"]);
stm_bpx("p6","p3",[]);
stm_aix("p6i0","p3i0",[0,"Registro de Expediente\r\nExtravíado","","",-1,-1,0,"indra/normatividad/certificacion/expedientes_extraviados.php"]);
stm_aix("p6i1","p3i0",[0,"Generar Informe de\r\nExpedientes \r\nExtravíados","","",-1,-1,0,"indra/normatividad/certificacion/reporte_extraviados.php"]);
stm_aix("p6i2","p3i0",[0,"Baja de Expedientes \r\nExtravíados","","",-1,-1,0,"indra/normatividad/certificacion/baja_extraviados.php"]);
stm_ep();
stm_ep();
stm_ep();
stm_ai("p0i1",[6,2,"#ffffff","",-1,-1,0]);
stm_aix("p0i2","p0i0",[0,"Usuarios"],148,24);
stm_bpx("p7","p1",[]);
stm_aix("p7i0","p1i0",[0,"Configuración\r\nde Usuarios","","",-1,-1,0,"","_self","","","","",10,7,0,"060420arrow3.gif","060420arrow3.gif",10,5,0,0,1,"#e5e5e5",1,"#e5e5e5"],40,0);
stm_bpx("p8","p2",[1,2,3,0,3,3,4,0]);
stm_aix("p8i0","p3i0",[0,"Cambiar Contraseña","","",-1,-1,0,"indra/usuarios/modificar_pass.php"]);
stm_ep();
stm_ep();
stm_aix("p0i3","p0i1",[]);
stm_aix("p0i4","p0i0",[0,"Inicio","","",-1,-1,0,"registro.php","derecho","","","","",0,0,0,"","",0,0],148,24);
stm_aix("p0i5","p0i1",[]);
stm_aix("p0i6","p0i0",[0,"Salir","","",-1,-1,0,"exit.php","_parent","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#000000"],148,24);
stm_ep();
stm_sc(1,["transparent","transparent","","",3,3,0,0,"#FFFFF7","#000000","up_disabled.gif","up_enabled.gif",7,9,0,"down_disabled.gif","down_enabled.gif",7,9,0,0,200]);
stm_em();
//-->
</script>
<? } ?>
<?php if (($_SESSION["nivelw"]==22)){/*digitalizacion*/?>
<script type="text/javascript">
<!--
stm_bm(["menu61b2",900,"","blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand","",1,25],this);
stm_bp("p0",[0,4,0,0,0,0,0,0,100,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,50,2,2,"#e2e2e2","#e2e2e2","",3,0,0,"#000000"]);
stm_ai("p0i0",[0,"DOP","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",0,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#FFFFF7","#000000","#000000","#000000","bold 8pt Verdana","italic bold 8pt Verdana",0,0,"","","","",0,0,0],148,24);
stm_bp("p1",[1,4,0,0,7,0,10,0,90,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,62,1,2,"#e2e2e2","#e2e2e2","",0,1,1,"#CCCCCC #B2B2B2 #B2B2B2"]);
stm_aix("p1i0","p0i0",[0,"Digitalización","","",-1,-1,0,"indra/digitalizacion/indice_digita.php","derecho","","","","",10,7,0,"","",0,0,0,0,1,"#CCCCCC",1,"#F2F2F2",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_ep();
stm_ai("p0i1",[6,2,"#ffffff","",-1,-1,0]);
stm_aix("p0i2","p0i0",[0,"Inicio","","",-1,-1,0,"registro.php","derecho","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1],148,24);
stm_aix("p0i3","p0i1",[]);
stm_aix("p0i4","p0i0",[0,"Salir","","",-1,-1,0,"exit.php","_parent","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#000000"],148,24);
stm_ep();
stm_sc(1,["transparent","transparent","","",3,3,0,0,"#FFFFF7","#000000","up_disabled.gif","up_enabled.gif",7,9,0,"down_disabled.gif","down_enabled.gif",7,9,0,0,200]);
stm_em();
//-->
</script>
<? } ?>

<?php if (($_SESSION["nivelw"]==20)){
// Menu de uso exclusivo para el rol numero 20?>
<script type="text/javascript">
<!--
stm_bm(["menu61b2",900,"","blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand","",1,25],this);
stm_bp("p0",[0,4,0,0,0,0,0,0,100,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,50,1,3,"#e2e2e2","#e2e2e2","",3,0,0,"#000000"]);
stm_ai("p0i0",[0,"Vinculación","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#FFFFF7","#000000","#000000","#000000","bold 8pt Verdana","italic bold 8pt Verdana",0,0,"","","","",0,0,0],148,24);
stm_bp("p1",[1,4,0,0,7,0,10,10,90,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,62,1,2,"#e2e2e2","#e2e2e2","",0,1,1,"#CCCCCC #B2B2B2 #B2B2B2"]);
stm_aix("p1i0","p0i0",[0,"Unidad Móvil","","",-1,-1,0,"","_self","","","","",10,7,0,"060420arrow3.gif","060420arrow3.gif",10,5,0,0,1,"#CCCCCC",1,"#F2F2F2",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_bp("p2",[1,2,3,0,3,3,4,10,79,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2","#eeeeee","",3,1,1,"#B2B2B2"]);
stm_aix("p2i0","p1i0",[0,"Cargar Unidad Móvil","","",-1,-1,0,"indra/vinculacion/ced/modificar_cd.php","derecho","","","","arrow_03.gif",4,7,0,"","",0,0,0,0,1,"#000000",1,"#FFFFFF",1,"","",3]);
stm_aix("p2i1","p2i0",[0,"Reporte","","",-1,-1,0,"","derecho","","","","arrow_03.gif",4,7,0,"060420arrow3.gif","060420arrow3.gif",10,5]);
stm_bpx("p3","p2",[1,2,3,0,3,3,4,0,70,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2"]);
stm_aix("p3i0","p2i0",[0,"Reporte General","","",-1,-1,0,"indra/vinculacion/exped/repMobl.php"]);
stm_aix("p3i1","p2i0",[0,"Reporte Corto","","",-1,-1,0,"indra/vinculacion/exped/repMoblcrt.php"]);
stm_ep();
stm_ep();
stm_ep();
stm_ai("p0i1",[6,2,"#ffffff","",-1,-1,0]);
stm_aix("p0i2","p0i0",[0,"Inicio","","",-1,-1,0,"registro.php","derecho","","","","",0,0,0,"","",0,0],148,24);
stm_aix("p0i3","p0i1",[]);
stm_aix("p0i4","p0i0",[0,"Salir","","",-1,-1,0,"exit.php","_parent","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#000000"],148,24);
stm_ep();
stm_sc(1,["transparent","transparent","","",3,3,0,0,"#FFFFF7","#000000","up_disabled.gif","up_enabled.gif",7,9,0,"down_disabled.gif","down_enabled.gif",7,9,0,0,200]);
stm_em();
//-->
</script>
<? }?>
<?php if (($_SESSION["nivelw"]==23) || ($_SESSION["nivelw"]==29) || ($_SESSION["nivelw"]==30) || ($_SESSION["nivelw"]==31) || ($_SESSION["nivelw"]==32)){
// Registro ciudadanos?>
<script type="text/javascript">
<!--
stm_bm(["menu61b2",900,"","blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand","",1,25],this);
stm_bp("p0",[0,4,0,0,0,0,0,0,100,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,50,2,2,"#e2e2e2","#e2e2e2","",3,0,0,"#000000"]);
stm_ai("p0i0",[0,"Ev. y Mejora de\r\n Delegaciones","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#FFFFF7","#000000","#000000","#000000","bold 8pt Verdana","italic bold 8pt Verdana",0,0,"","","","",0,0,0],148,24);
stm_bp("p1",[1,4,0,0,7,0,10,0,90,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,62,1,2,"#e2e2e2","#e2e2e2","",0,1,1,"#CCCCCC #B2B2B2 #B2B2B2"]);
stm_aix("p1i0","p0i0",[0,"Atención ciudadana","","",-1,-1,0,"indra/evaluacion_mejora/opciones_menu.php","derecho","","","","",10,7,0,"","",0,0,0,0,1,"#e5e5e5",1,"#e5e5e5",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_ep();
stm_ai("p0i1",[6,2,"#ffffff","",-1,-1,0]);
stm_aix("p0i2","p0i0",[0,"Cambiar Contraseña","","",-1,-1,0,"indra/usuarios/modificar_pass.php","derecho","","","","",0,0,0,"","",0,0],148,24);
stm_aix("p0i3","p0i1",[]);
stm_aix("p0i4","p0i2",[0,"Inicio","","",-1,-1,0,"registro.php"],148,24);
stm_aix("p0i5","p0i1",[]);
stm_aix("p0i6","p0i0",[0,"Salir","","",-1,-1,0,"exit.php","_parent","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#000000"],148,24);
stm_ep();
stm_sc(1,["transparent","transparent","","",3,3,0,0,"#FFFFF7","#000000","up_disabled.gif","up_enabled.gif",7,9,0,"down_disabled.gif","down_enabled.gif",7,9,0,0,200]);
stm_em();
//-->
</script>
<? }?>

<?php if (($_SESSION["nivelw"]==24)){
// Rol para la supervision de delegaciones?>
<script type="text/javascript">
<!--
stm_bm(["menu61b2",900,"","blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand","",1,25],this);
stm_bp("p0",[0,4,0,0,0,0,0,0,100,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,50,2,2,"#e2e2e2","#e2e2e2","",3,0,0,"#000000"]);
stm_ai("p0i0",[0,"Supervisión","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",0,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#FFFFF7","#000000","#000000","#000000","bold 8pt Verdana","italic bold 8pt Verdana",0,0,"","","","",0,0,0],148,24);
stm_bp("p1",[1,4,0,0,7,0,10,10,90,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,62,1,2,"#e2e2e2","#e2e2e2","",0,1,1,"#CCCCCC #B2B2B2 #B2B2B2"]);
stm_aix("p1i0","p0i0",[0,"Indicadores","","",-1,-1,0,"","_self","","","","",10,7,0,"060420arrow3.gif","060420arrow3.gif",10,5,0,0,1,"#CCCCCC",1,"#F2F2F2",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_bp("p2",[1,2,3,0,3,3,4,10,79,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2","#eeeeee","",3,1,1,"#B2B2B2"]);
stm_aix("p2i0","p1i0",[0,"Análisis de Tiempos y\r\nMovimientos en Operación","","",-1,-1,0,"","_self","","","","arrow_03.gif",4,7,0,"060420arrow3.gif","060420arrow3.gif",10,5,0,0,1,"#000000",1,"#FFFFFF",1,"","",3]);
stm_bpx("p3","p2",[1,2,3,0,3,3,4,0,70,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2"]);
stm_aix("p3i0","p2i0",[0,"Reporte Global deTrámites con \r\nAutorización","","",-1,-1,0,"indra/generales_autorizacion_mismodia.php","derecho","","","","arrow_03.gif",4,7,0,"","",0,0]);
stm_aix("p3i1","p3i0",[0,"Comparativo de Delegaciones \r\nde Trámites con Autorización","","",-1,-1,0,"indra/generales_autorizacion_mismodia_deleg.php"]);
stm_aix("p3i2","p3i0",[0,"Reporte Detallado por Delegación\r\n de Trámites con Autorización","","",-1,-1,0,"indra/generales_autorizacion_detallado.php"]);
stm_aix("p3i3","p3i0",[0,"Tiempos de Producción por\r\nDelegación con Autorización","","",-1,-1,0,"indra/graficas/tiempos_produccion_delegacion.php"]);
stm_aix("p3i4","p3i0",[0,"Comparativo tiempos de \r\nProducción por etapas \r\ncon Autorización","","",-1,-1,0,"indra/graficas/tiempos_produccion_etapas.php"]);
stm_ep();
stm_aix("p2i1","p2i0",[0,"Indicadores en Operación"]);
stm_bpx("p4","p3",[]);
stm_aix("p4i0","p3i0",[0,"Autorizaciones por Delegación","","",-1,-1,0,"indra/indicadores/autoriza_por_deleg.php"]);
stm_aix("p4i1","p3i0",[0,"Autorizaciones por Delegación Global","","",-1,-1,0,"indra/indicadores/autoriza_todos_deleg.php"]);
stm_aix("p4i2","p3i0",[0,"Uso de Servicios del Sistema de\r\nCitas para el Trámite de Pasaportes","","",-1,-1,0,"indra/indicadores/inasistencia.php"]);
stm_aix("p4i3","p3i0",[0,"Producción Diaria","","",-1,-1,0,"indra/indicadores/produccion_diaria.php"]);
stm_ep();
stm_aix("p2i2","p2i0",[0,"Indicadores de Supervisión"]);
stm_bpx("p5","p3",[]);
stm_aix("p5i0","p3i0",[0,"Tiempo promedio de \r\nproducción","","",-1,-1,0,"indra/indicadores/tiempo%20promedio%20de%20produccion.php"]);
stm_aix("p5i1","p3i0",[0,"Tiempo promedio de \r\nautorizacion","","",-1,-1,0,"indra/indicadores/tiempo%20promedio%20de%20autorizacion.php"]);
stm_ep();
stm_ep();
stm_aix("p1i1","p1i0",[0,"Reportes Puntos de\r\nServicio en Operación"],40,0);
stm_bpx("p6","p2",[1,2,3,0,3,3,4,0]);
stm_aix("p6i0","p3i0",[0,"Reporte de Certificación \r\nMensual DOEP","","",-1,-1,0,"indra/puntos_servicio/rep_puntos_general.php"]);
stm_aix("p6i1","p3i0",[0,"Reporte de Certificación \r\npor Delegación - Año","","",-1,-1,0,"indra/puntos_servicio/rep_puntos_general_2008.php"]);
stm_aix("p6i2","p3i0",[0,"Reporte de Archivos \r\nAdjuntos DOEP","","",-1,-1,0,"indra/puntos_servicio/consulta_adjuntos.php"]);
stm_aix("p6i3","p3i0",[0,"Reporte Fecha de \r\nCertificación DOEP","","",-1,-1,0,"indra/puntos_servicio/consulta_fecha_certifica.php"]);
stm_ep();
stm_aix("p1i2","p1i0",[0,"OE´s"],40,24);
stm_bpx("p7","p2",[]);
stm_aix("p7i0","p3i0",[0,"Análisis de expedientes\r\nde Oficinas de Enlace","","",-1,-1,0,"indra/vinculacion/exped/expe1.php"]);
stm_aix("p7i1","p2i0",[0,"Reportes","","",-1,-1,0,"","derecho"]);
stm_bpx("p8","p3",[]);
stm_aix("p8i0","p3i0",[0,"Reporte general por\r\nDelegación ","","",-1,-1,0,"indra/vinculacion/exped/menrepOEgral.php"]);
stm_aix("p8i1","p3i0",[0,"Reporte de Expedientes\r\npor Oficinas de Enlace","","",-1,-1,0,"indra/vinculacion/expOE/repOEgralporOE.php"]);
stm_aix("p8i2","p3i0",[0,"Reporte de Diferencias","","",-1,-1,0,"indra/vinculacion/exped/diferencias.php"]);
stm_ep();
stm_aix("p7i2","p3i0",[0,"Manual de operación","","",-1,-1,0,"indra/vinculacion/exped/manualoe.pdf","_blank"]);
stm_ep();
stm_ep();
stm_ai("p0i1",[6,2,"#ffffff","",-1,-1,0]);
stm_aix("p0i2","p0i0",[0,"Plantillas","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",1],148,24);
stm_bpx("p9","p1",[1,4,0,0,7,0,4,0]);
stm_aix("p9i0","p3i0",[0,"Consulta Personal\r\nCarga de Documentos\r\nModificaciones","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/frame_buscando.php"],40,0);
stm_aix("p10i7","p3i0",[0,"Trabajadores dados de baja \r\ntemporal por cambio a una Delegación - Dirección","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/temporales.php"],40,0);
stm_aix("p9i1","p3i0",[0,"Consultas/Reportes","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/frame_consulta.php"],40,0);
stm_aix("p9i2","p3i0",[0,"Reporte \r\nCertificación","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/reporte_certificacion.php"],40,0);
stm_ep();
stm_aix("p0i3","p0i1",[]);
stm_aix("p0i4","p0i2",[0,"Capacitación de \r\npersonal Reportes"],148,24);
stm_bpx("p10","p9",[]);
stm_aix("p10i0","p3i0",[0,"Consulta por Curso","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_curso.php"],40,0);
stm_aix("p10i1","p3i0",[0,"Consulta por Delegación","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_delegacion.php"],40,0);
stm_aix("p10i2","p3i0",[0,"Consulta por Puesto","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_puesto.php"],40,0);
stm_aix("p10i3","p3i0",[0,"Consulta por Sexo","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_sexo.php"],40,0);
stm_aix("p10i4","p3i0",[0,"Consulta por Trabajador","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_trabajador.php"],40,0);
stm_aix("p10i5","p3i0",[0,"Trabajadores No Capacitados","","",-1,-1,0,"indra/capacitacion_trabajadores/captura/persona_sin_capacitar/index.php"],40,0);
stm_aix("p10i6","p3i0",[0,"Trabajadores Capacitados\r\npor Delegación","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/indicador_diferencias.php"],40,0);
stm_aix("p10i7","p3i0",[0,"Consulta por Horas","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_horas.php"],40,0);
stm_ep();
stm_aix("p0i5","p0i1",[]);
stm_aix("p0i6","p0i2",[0,"Cambiar Contraseña","","",-1,-1,0,"indra/usuarios/modificar_pass.php","derecho","","","","",0,0,0,"","",0,0],148,24);
stm_aix("p0i7","p0i1",[]);
stm_aix("p0i8","p0i6",[0,"Inicio","","",-1,-1,0,"registro.php"],148,24);
stm_aix("p0i9","p0i1",[]);
stm_aix("p0i10","p0i0",[0,"Salir","","",-1,-1,0,"exit.php","_parent","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#000000"],148,24);
stm_ep();
stm_sc(1,["transparent","transparent","","",3,3,0,0,"#FFFFF7","#000000","up_disabled.gif","up_enabled.gif",7,9,0,"down_disabled.gif","down_enabled.gif",7,9,0,0,200]);
stm_em();
//-->
</script>

<? } ?>
<?php if (($_SESSION["nivelw"]==25)){
// Rol para la informes estadistico vinculacion?>
<script type="text/javascript">
<!--
stm_bm(["menu61b2",900,"","blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand","",1,25],this);
stm_bp("p0",[0,4,0,0,0,0,0,0,100,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,50,2,2,"#e2e2e2","#e2e2e2","",3,0,0,"#000000"]);
stm_ai("p0i0",[0,"Vinculación","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#FFFFF7","#000000","#000000","#000000","bold 8pt Verdana","italic bold 8pt Verdana",0,0,"","","","",0,0,0],148,24);
stm_bp("p1",[1,4,0,0,7,0,10,10,90,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,62,1,2,"#e2e2e2","#e2e2e2","",0,1,1,"#CCCCCC #B2B2B2 #B2B2B2"]);
stm_aix("p1i0","p0i0",[0,"Informe Estadístico","","",-1,-1,0,"","_self","","","","",10,7,0,"060420arrow3.gif","060420arrow3.gif",10,5,0,0,1,"#CCCCCC",1,"#F2F2F2",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_bp("p2",[1,2,3,0,3,3,4,10,79,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2","#eeeeee","",3,1,1,"#B2B2B2"]);
stm_aix("p2i0","p1i0",[0,"Ingresar Reporte","","",-1,-1,0,"indra/vinculacion/iestadistico/index.php","derecho","","","","arrow_03.gif",4,7,0,"","",0,0,0,0,1,"#000000",1,"#FFFFFF",1,"","",3]);
stm_aix("p2i1","p2i0",[0,"Reportes","","",-1,-1,0,"","derecho","","","","arrow_03.gif",4,7,0,"060420arrow3.gif","060420arrow3.gif",10,5]);
stm_bpx("p3","p2",[1,2,3,0,3,3,4,10,70,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2"]);
stm_aix("p3i0","p2i1",[0,"Remesas"]);
stm_bpx("p4","p3",[1,2,3,0,3,3,4,0]);
stm_aix("p4i0","p2i0",[0,"General del año en curso","","",-1,-1,0,"indra/vinculacion/iestadistico/consulta.php"]);
stm_aix("p4i1","p2i0",[0,"Por Delegación y año","","",-1,-1,0,"indra/vinculacion/iestadistico/consultaa.php"]);
stm_ep();
stm_aix("p3i1","p2i1",[0,"Casos de Protección"]);
stm_bpx("p5","p4",[]);
stm_aix("p5i0","p2i0",[0,"General del año en curso","","",-1,-1,0,"indra/vinculacion/iestadistico/consulta2.php"]);
stm_aix("p5i1","p2i0",[0,"Por Delegación y año","","",-1,-1,0,"indra/vinculacion/iestadistico/consultab.php"]);
stm_ep();
stm_aix("p3i2","p2i1",[0,"Cooperación Educativa\r\ny Cultural"]);
stm_bpx("p6","p4",[]);
stm_aix("p6i0","p2i0",[0,"General del año en curso","","",-1,-1,0,"indra/vinculacion/iestadistico/consulta3.php"]);
stm_aix("p6i1","p2i0",[0,"Por Delegación y año","","",-1,-1,0,"indra/vinculacion/iestadistico/consultac.php"]);
stm_ep();
stm_aix("p3i3","p2i1",[0,"Concentrado por Rubros"]);
stm_bpx("p7","p4",[]);
stm_aix("p7i0","p2i0",[0,"General del año en curso","","",-1,-1,0,"indra/vinculacion/iestadistico/consulta4.php"]);
stm_aix("p7i1","p2i0",[0,"Por Delegación y año","","",-1,-1,0,"indra/vinculacion/iestadistico/consultad.php"]);
stm_ep();
stm_aix("p3i4","p2i1",[0,"Concentrado por Delegación"]);
stm_bpx("p8","p4",[]);
stm_aix("p8i0","p2i0",[0,"General del año en curso","","",-1,-1,0,"indra/vinculacion/iestadistico/consulta5.php"]);
stm_aix("p8i1","p2i0",[0,"Por Delegación y año","","",-1,-1,0,"indra/vinculacion/iestadistico/consultae.php"]);
stm_ep();
stm_ep();
stm_ep();
stm_ep();
stm_ai("p0i1",[6,2,"#ffffff","",-1,-1,0]);
stm_aix("p0i2","p0i0",[0,"Inicio","","",-1,-1,0,"registro.php","derecho","","","","",0,0,0,"","",0,0],148,24);
stm_aix("p0i3","p0i1",[]);
stm_aix("p0i4","p0i0",[0,"Salir","","",-1,-1,0,"exit.php","_parent","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#000000"],148,24);
stm_ep();
stm_sc(1,["transparent","transparent","","",3,3,0,0,"#FFFFF7","#000000","up_disabled.gif","up_enabled.gif",7,9,0,"down_disabled.gif","down_enabled.gif",7,9,0,0,200]);
stm_em();
//-->
</script>
<? }?>

<?php if (($_SESSION["nivelw"]==26)){
// Rol para la actualizacion de capacitacion de personal de la sre?>
<script type="text/javascript">
<!--
stm_bm(["menu61b2",900,"","blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand","",1,25],this);
stm_bp("p0",[0,4,0,0,0,0,0,0,100,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,50,2,2,"#e2e2e2","#e2e2e2","",3,0,0,"#000000"]);
stm_ai("p0i0",[0,"Sistema Nacional de \r\nDelegaciones","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#FFFFF7","#000000","#000000","#000000","bold 8pt Verdana","italic bold 8pt Verdana",0,0,"","","","",0,0,0],148,24);
stm_bp("p1",[1,4,0,0,7,0,10,10,90,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,62,1,2,"#e2e2e2","#e2e2e2","",0,1,1,"#CCCCCC #B2B2B2 #B2B2B2"]);
stm_aix("p1i0","p0i0",[0,"Capacitación de Personal","","",-1,-1,0,"","_self","","","","",10,7,0,"060420arrow3.gif","060420arrow3.gif",10,5,0,0,1,"#CCCCCC",1,"#F2F2F2",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_bp("p2",[1,2,3,0,3,3,4,10,79,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2","#eeeeee","",3,1,1,"#B2B2B2"]);
stm_aix("p2i0","p1i0",[0,"Dar de alta Evento- Curso","","",-1,-1,0,"indra/capacitacion_trabajadores/captura/captura_evento_curso.php","derecho","","","","arrow_03.gif",4,7,0,"","",0,0,0,0,1,"#000000",1,"#FFFFFF",1,"","",3]);
stm_aix("p2i1","p2i0",[0,"Continuar captura \r\nde Curso-Evento","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/continuacion_tramite.php"]);
stm_aix("p2i2","p2i0",[0,"Consultas / Reportes","","",-1,-1,0,"","derecho","","","","arrow_03.gif",4,7,0,"060420arrow3.gif","060420arrow3.gif",10,5]);
stm_bpx("p3","p2",[1,2,3,0,3,3,4,0]);
stm_aix("p3i0","p2i0",[0,"Consulta por Curso","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_curso.php"]);
stm_aix("p3i1","p2i0",[0,"Consulta por Delegación","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_delegacion.php"]);
stm_aix("p3i3","p2i0",[0,"Consulta por Puesto","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_puesto.php"]);
stm_aix("p3i4","p2i0",[0,"Consulta por Sexo","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_sexo.php"]);
stm_aix("p3i5","p2i0",[0,"Consulta por Trabajador","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_trabajador.php"]);
stm_aix("p3i6","p2i0",[0,"Trabajadores No Capacitados","","",-1,-1,0,"indra/capacitacion_trabajadores/captura/persona_sin_capacitar/index.php"]);
stm_aix("p3i7","p2i0",[0,"Trabajadores Capacitados\r\npor Delegación","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/indicador_diferencias.php"]);
stm_ep();
stm_ep();
stm_ep();
stm_ai("p0i1",[6,2,"#ffffff","",-1,-1,0]);
stm_aix("p0i2","p0i0",[0,"Cambiar Contraseña","","",-1,-1,0,"indra/usuarios/modificar_pass.php","derecho","","","","",0,0,0,"","",0,0],148,24);
stm_aix("p0i3","p0i1",[]);
stm_aix("p0i4","p0i2",[0,"Inicio","","",-1,-1,0,"registro.php"],148,24);
stm_aix("p0i5","p0i1",[]);
stm_aix("p0i6","p0i0",[0,"Salir","","",-1,-1,0,"exit.php","_parent","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#000000"],148,24);
stm_ep();
stm_sc(1,["transparent","transparent","","",3,3,0,0,"#FFFFF7","#000000","up_disabled.gif","up_enabled.gif",7,9,0,"down_disabled.gif","down_enabled.gif",7,9,0,0,200]);
stm_em();
//-->
</script>
<? }?>

<?php if (($_SESSION["nivelw"]==27)){
// Menu de uso exclusivo  solo para vinculacion en el apartado de informe estadistico?>
<script type="text/javascript">
<!--
stm_bm(["menu61b2",900,"","blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand","",1,25],this);
stm_bp("p0",[0,4,0,0,0,0,0,0,100,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,50,1,3,"#e2e2e2","#e2e2e2","",3,0,0,"#000000"]);
stm_ai("p0i0",[0,"Vinculación","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#FFFFF7","#000000","#000000","#000000","bold 8pt Verdana","italic bold 8pt Verdana",0,0,"","","","",0,0,0],148,24);
stm_bp("p1",[1,4,0,0,7,0,10,10,90,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,62,1,2,"#e2e2e2","#e5e5e5","",0,1,1,"#CCCCCC #B2B2B2 #B2B2B2"]);
stm_aix("p1i0","p0i0",[0,"Informe Ejecutivo","","",-1,-1,0,"","_self","","","","",10,7,0,"060420arrow3.gif","060420arrow3.gif",10,5,0,0,1,"#CCCCCC",1,"#F2F2F2",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_bp("p2",[1,2,3,0,3,3,4,10,79,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2","#eeeeee","",3,1,1,"#B2B2B2"]);
stm_aix("p2i0","p1i0",[0,"Captura","","",-1,-1,0,"indra/vinculacion/iejecutivo/proteccion.php","derecho","","","","arrow_03.gif",4,7,0,"","",0,0,0,0,1,"#000000",1,"#FFFFFF",1,"","",3]);
stm_aix("p2i1","p2i0",[0,"Reportes","","",-1,-1,0,"","derecho","","","","arrow_03.gif",4,7,0,"060420arrow3.gif","060420arrow3.gif",10,5]);
stm_bpx("p3","p2",[1,2,3,0,3,3,4,0,70,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2"]);
stm_aix("p3i0","p2i0",[0,"Reporte General","","",-1,-1,0,"indra/vinculacion/iejecutivo/rep1.php"]);
stm_aix("p3i1","p2i0",[0,"Reporte por Mes","","",-1,-1,0,"indra/vinculacion/iejecutivo/rep2.php"]);
stm_aix("p3i2","p2i0",[0,"Reporte General por Delegación","","",-1,-1,0,"indra/vinculacion/iejecutivo/rep3.php"]);
stm_ep();
stm_aix("p2i2","p2i0",[0,"Manual de Usuario","","",-1,-1,0,"indra/vinculacion/iejecutivo/manual_usuario.pdf","_blank"]);
stm_ep();
stm_ep();
stm_ai("p0i1",[6,2,"#ffffff","",-1,-1,0]);
stm_aix("p0i2","p0i0",[0,"Inicio","","",-1,-1,0,"registro.php","derecho","","","","",0,0,0,"","",0,0],148,24);
stm_aix("p0i3","p0i1",[]);
stm_aix("p0i4","p0i0",[0,"Salir","","",-1,-1,0,"exit.php","_parent","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#000000"],148,24);
stm_ep();
stm_sc(1,["transparent","transparent","","",3,3,0,0,"#FFFFF7","#000000","up_disabled.gif","up_enabled.gif",7,9,0,"down_disabled.gif","down_enabled.gif",7,9,0,0,200]);
stm_em();
//-->
</script>

<? }?>

<?php if (($_SESSION["nivelw"]==28)){
// Menu de uso exclusivo  para el modulo de la DGD reyna?>
<script type="text/javascript">
<!--
stm_bm(["menu61b2",900,"","blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand","",1,25],this);
stm_bp("p0",[0,4,0,0,0,0,0,0,100,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,50,1,3,"#e2e2e2","#e2e2e2","",3,0,0,"#000000"]);
stm_ai("p0i0",[0,"DGD","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",0,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#FFFFF7","#000000","#000000","#000000","bold 8pt Verdana","italic bold 8pt Verdana",0,0,"","","","",0,0,0],148,24);
stm_bp("p1",[1,4,0,0,7,0,10,0,90,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,62,1,2,"#e2e2e2","#e5e5e5","",0,1,1,"#CCCCCC #B2B2B2 #B2B2B2"]);
stm_aix("p1i0","p0i0",[0,"Números de oficio","","",-1,-1,0,"indra/folios/oficios/indice.php","derecho","","","","",10,7,0,"","",0,0,0,0,1,"#e5e5e5",1,"#e5e5e5",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_aix("p1i0","p0i0",[0,"Números de atentas notas","","",-1,-1,0,"indra/folios/atentasnotas/indice.php","derecho","","","","",10,7,0,"","",0,0,0,0,1,"#e5e5e5",1,"#e5e5e5",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_aix("p1i1","p1i0",[0,"Copias Marcadas","","",-1,-1,0,"indra/folios/copias/indice.php","derecho","","","","",10,7,0,"","",0,0,0,0,1,"#CCCCCC",1,"#F2F2F2"],40,0);
stm_aix("p1i2","p1i1",[0,"Números de correo","","",-1,-1,0,"indra/folios/correo/indice.php"],40,0);
stm_aix("p1i3","p1i1",[0,"Acuse de Recibo","","",-1,-1,0,"indra/folios/acuse/indice_acuse.php"],40,0);
stm_aix("p1i4","p1i1",[0,"Bajas de Acuse de Recibo","","",-1,-1,0,"indra/folios/acuse/acuse_elimina.php"],40,0);
stm_aix("p1i5","p1i1",[0,"Manual de Usuario","","",-1,-1,0,"indra/folios/manual.pdf","_blank"],40,0);
stm_ep();
stm_ai("p0i1",[6,2,"#ffffff","",-1,-1,0]);
stm_aix("p0i2","p0i0",[0,"Cambiar Contraseña","","",-1,-1,0,"indra/usuarios/modificar_pass.php","derecho","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1],148,24);
stm_aix("p0i3","p0i1",[]);
stm_aix("p0i4","p0i2",[0,"Inicio","","",-1,-1,0,"registro.php"],148,24);
stm_aix("p0i5","p0i1",[]);
stm_aix("p0i6","p0i0",[0,"Salir","","",-1,-1,0,"exit.php","_parent","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#000000"],148,24);
stm_ep();
stm_sc(1,["transparent","transparent","","",3,3,0,0,"#FFFFF7","#000000","up_disabled.gif","up_enabled.gif",7,9,0,"down_disabled.gif","down_enabled.gif",7,9,0,0,200]);
stm_em();
//-->
</script>
<? }?>

<?php if (($_SESSION["nivelw"]==33)){// Menu de uso exclusivo  para el modulo de la DGD modulo de rreyna y para su asistente de ella?>

<script type="text/javascript">
<!--
stm_bm(["menu61b2",900,"","blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand","",1,25],this);
stm_bp("p0",[0,4,0,0,0,0,0,0,100,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,50,1,3,"#e2e2e2","#e2e2e2","",3,0,0,"#000000"]);
stm_ai("p0i0",[0,"DGD","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",0,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#FFFFF7","#000000","#000000","#000000","bold 8pt Verdana","italic bold 8pt Verdana",0,0,"","","","",0,0,0],148,24);
stm_bp("p1",[1,4,0,0,7,0,10,0,90,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,62,1,2,"#e2e2e2","#e2e2e2","",0,1,1,"#CCCCCC #B2B2B2 #B2B2B2"]);
stm_aix("p1i0","p0i0",[0,"Números de oficio","","",-1,-1,0,"indra/folios/oficios/indice.php","derecho","","","","",10,7,0,"","",0,0,0,0,1,"#e5e5e5",1,"#e5e5e5",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
/**/
stm_aix("p1i0","p0i0",[0,"Números de atentas notas","","",-1,-1,0,"indra/folios/atentasnotas/indice.php","derecho","","","","",10,7,0,"","",0,0,0,0,1,"#e5e5e5",1,"#e5e5e5",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
/**/

stm_aix("p1i1","p1i0",[0,"Números de correo","","",-1,-1,0,"indra/folios/correo/indice.php","derecho","","","","",10,7,0,"","",0,0,0,0,1,"#CCCCCC",1,"#F2F2F2"],40,0);
stm_aix("p1i2","p1i1",[0,"Manual de Usuario","","",-1,-1,0,"indra/folios/manual.pdf","_blank"],40,0);
stm_ep();
stm_ai("p0i1",[6,2,"#ffffff","",-1,-1,0]);
stm_aix("p0i2","p0i0",[0,"Cambiar Contraseña","","",-1,-1,0,"indra/usuarios/modificar_pass.php","derecho","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1],148,24);
stm_aix("p0i3","p0i1",[]);
stm_aix("p0i4","p0i2",[0,"Inicio","","",-1,-1,0,"registro.php"],148,24);
stm_aix("p0i5","p0i1",[]);
stm_aix("p0i6","p0i0",[0,"Salir","","",-1,-1,0,"exit.php","_parent","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#000000"],148,24);
stm_ep();
stm_sc(1,["transparent","transparent","","",3,3,0,0,"#FFFFF7","#000000","up_disabled.gif","up_enabled.gif",7,9,0,"down_disabled.gif","down_enabled.gif",7,9,0,0,200]);
stm_em();
//-->
</script>
<? }?>

<?php if (($_SESSION["nivelw"]==34)){//Combinacion de los roles 33 y 30?>

<script type="text/javascript">
<!--
stm_bm(["menu61b2",900,"","blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand","",1,25],this);
stm_bp("p0",[0,4,0,0,0,0,0,0,100,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,50,2,2,"#e2e2e2","#e2e2e2","",3,0,0,"#000000"]);
stm_ai("p0i0",[0,"DGD","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",0,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#FFFFF7","#000000","#000000","#000000","bold 8pt Verdana","italic bold 8pt Verdana",0,0,"","","","",0,0,0],148,24);
stm_bp("p1",[1,4,0,0,7,0,10,0,90,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,62,1,2,"#e2e2e2","#e2e2e2","",0,1,1,"#CCCCCC #B2B2B2 #B2B2B2"]);
stm_aix("p1i0","p0i0",[0,"Números de oficio","","",-1,-1,0,"indra/folios/oficios/indice.php","derecho","","","","",10,7,0,"","",0,0,0,0,1,"#e5e5e5",1,"#e5e5e5",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_aix("p1i1","p1i0",[0,"Números de correo","","",-1,-1,0,"indra/folios/correo/indice.php","derecho","","","","",10,7,0,"","",0,0,0,0,1,"#CCCCCC",1,"#F2F2F2"],40,0);
stm_aix("p1i2","p1i1",[0,"Manual de Usuario","","",-1,-1,0,"indra/folios/manual.pdf","_blank"],40,0);
stm_ep();
stm_ai("p0i1",[6,2,"#ffffff","",-1,-1,0]);
stm_aix("p0i2","p0i0",[0,"Ev. y Mejora de\r\n Delegaciones","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",1],148,24);
stm_bpx("p2","p1",[]);
stm_aix("p2i0","p1i0",[0,"Atención ciudadana","","",-1,-1,0,"indra/evaluacion_mejora/opciones_menu.php"],40,0);
stm_ep();
stm_aix("p0i3","p0i1",[]);
stm_aix("p0i4","p0i2",[0,"Cambiar Contraseña","","",-1,-1,0,"indra/usuarios/modificar_pass.php","derecho","","","","",0,0,0,"","",0,0],148,24);
stm_aix("p0i5","p0i1",[]);
stm_aix("p0i6","p0i4",[0,"Inicio","","",-1,-1,0,"registro.php"],148,24);
stm_aix("p0i7","p0i1",[]);
stm_aix("p0i8","p0i0",[0,"Salir","","",-1,-1,0,"exit.php","_parent","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#000000"],148,24);
stm_ep();
stm_sc(1,["transparent","transparent","","",3,3,0,0,"#FFFFF7","#000000","up_disabled.gif","up_enabled.gif",7,9,0,"down_disabled.gif","down_enabled.gif",7,9,0,0,200]);
stm_em();
//-->
</script>

<? }?>

<?php if (($_SESSION["nivelw"]==35)){// Rol para Direccion y mejora ?>
<script type="text/javascript">
<!--
stm_bm(["menu61b2",900,"","blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand","",1,25],this);
stm_bp("p0",[0,4,0,0,0,0,0,0,100,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,50,2,2,"#e2e2e2","#e2e2e2","",3,0,0,"#000000"]);
stm_ai("p0i0",[0,"Indicadores","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",0,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#FFFFF7","#000000","#000000","#000000","bold 8pt Verdana","italic bold 8pt Verdana",0,0,"","","","",0,0,0],148,24);
stm_bp("p1",[1,4,0,0,7,0,4,10,90,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,62,1,2,"#e2e2e2","#e5e5e5","",0,1,1,"#CCCCCC #B2B2B2 #B2B2B2"]);
stm_aix("p1i0","p0i0",[0,"Análisis de Tiempos y\r\nMovimientos en Operación","","",-1,-1,0,"","_self","","","","arrow_03.gif",4,7,0,"060420arrow3.gif","060420arrow3.gif",10,5,0,0,1,"#000000",1,"#FFFFFF",1,"","",3,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_bp("p2",[1,2,3,0,3,3,4,0,70,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2","#eeeeee","",3,1,1,"#B2B2B2"]);
stm_aix("p2i0","p1i0",[0,"Reporte Global deTrámites con \r\nAutorización","","",-1,-1,0,"indra/generales_autorizacion_mismodia.php","derecho","","","","arrow_03.gif",4,7,0,"","",0,0]);
stm_aix("p2i1","p2i0",[0,"Comparativo de Delegaciones \r\nde Trámites con Autorización","","",-1,-1,0,"indra/generales_autorizacion_mismodia_deleg.php"]);
stm_aix("p2i2","p2i0",[0,"Reporte Detallado por Delegación\r\n de Trámites con Autorización","","",-1,-1,0,"indra/generales_autorizacion_detallado.php"]);
stm_aix("p2i3","p2i0",[0,"Tiempos de Producción por\r\nDelegación con Autorización","","",-1,-1,0,"indra/graficas/tiempos_produccion_delegacion.php"]);
stm_aix("p2i4","p2i0",[0,"Comparativo tiempos de \r\nProducción por etapas \r\ncon Autorización","","",-1,-1,0,"indra/graficas/tiempos_produccion_etapas.php"]);
stm_ep();
stm_aix("p1i1","p1i0",[0,"Indicadores en Operación"],40,0);
stm_bpx("p3","p2",[]);
stm_aix("p3i0","p2i0",[0,"Autorizaciones por Delegación","","",-1,-1,0,"indra/indicadores/autoriza_por_deleg.php"]);
stm_aix("p3i1","p2i0",[0,"Autorizaciones por Delegación Global","","",-1,-1,0,"indra/indicadores/autoriza_todos_deleg.php"]);
stm_aix("p3i2","p2i0",[0,"Uso de Servicios del Sistema de\r\nCitas para el Trámite de Pasaportes","","",-1,-1,0,"indra/indicadores/inasistencia.php"]);
stm_aix("p3i3","p2i0",[0,"Producción Diaria","","",-1,-1,0,"indra/indicadores/produccion_diaria.php"]);
stm_ep();
stm_aix("p1i2","p1i0",[0,"Indicadores de Supervisión"],40,0);
stm_bpx("p4","p2",[]);
stm_aix("p4i0","p2i0",[0,"Tiempo promedio de \r\nproducción","","",-1,-1,0,"indra/indicadores/tiempo%20promedio%20de%20produccion.php"]);
stm_aix("p4i1","p2i0",[0,"Tiempo promedio de \r\nautorizacion","","",-1,-1,0,"indra/indicadores/tiempo%20promedio%20de%20autorizacion.php"]);
stm_ep();
stm_ep();
stm_ai("p0i1",[6,2,"#ffffff","",-1,-1,0]);
stm_aix("p0i2","p0i0",[0,"Atención Ciudadana","","",-1,-1,0,"indra/evaluacion_mejora/opciones_menu.php","derecho","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1],148,24);
stm_aix("p0i3","p0i1",[]);
stm_aix("p0i4","p0i2",[0,"Plantillas","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1],148,24);
stm_bpx("p5","p1",[1,4,0,0,7,0,4,0]);
stm_aix("p5i0","p2i0",[0,"Alta de Personal","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/frame_insertar.php"],40,0);
stm_aix("p5i1","p2i0",[0,"Consulta Personal\r\nCarga de Documentos\r\nModificaciones","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/frame_buscando.php"],40,0);
stm_aix("p10i7","p3i0",[0,"Trabajadores dados de baja \r\ntemporal por cambio a una Delegación - Dirección","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/temporales.php"],40,0);
stm_aix("p5i2","p2i0",[0,"Asistencia","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/pasa_lista.php"],40,0);
stm_aix("p5i3","p2i0",[0,"Consulta de Asistencia","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/consultas_asistencias.php"],40,0);
stm_aix("p5i5","p2i0",[0,"Consultas/Reportes","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/frame_consulta.php"],40,0);
stm_aix("p5i6","p2i0",[0,"Certificación","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/certificacion.php"],40,0);
stm_aix("p5i7","p2i0",[0,"Reporte \r\nCertificación","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/reporte_certificacion.php"],40,0);
stm_ep();
stm_aix("p0i5","p0i1",[]);
stm_aix("p0i6","p0i4",[0,"Capacitación \r\nde Personal"],148,24);
stm_bpx("p6","p1",[]);
stm_aix("p6i0","p2i0",[0,"Dar de alta Evento- Curso","","",-1,-1,0,"indra/capacitacion_trabajadores/captura/captura_evento_curso.php"],40,0);
stm_aix("p6i1","p2i0",[0,"Continuar captura \r\nde Curso-Evento","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/continuacion_tramite.php"],40,0);
stm_aix("p6i2","p1i0",[0,"Consultas / Reportes","","",-1,-1,0,"","derecho"],40,0);
stm_bpx("p7","p2",[1,2,3,0,3,3,4,0,79,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2"]);
stm_aix("p7i0","p2i0",[0,"Consulta por Curso","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_curso.php"]);
stm_aix("p7i1","p2i0",[0,"Consulta por Delegación","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_delegacion.php"]);
stm_aix("p7i2","p2i0",[0,"Consulta por Puesto","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_puesto.php"]);
stm_aix("p7i3","p2i0",[0,"Consulta por Sexo","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_sexo.php"]);
stm_aix("p7i4","p2i0",[0,"Consulta por Trabajador","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_trabajador.php"]);
stm_aix("p7i5","p2i0",[0,"Trabajadores No Capacitados","","",-1,-1,0,"indra/capacitacion_trabajadores/captura/persona_sin_capacitar/index.php"]);
stm_aix("p7i6","p2i0",[0,"Trabajadores Capacitados\r\npor Delegación","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/indicador_diferencias.php"]);
stm_aix("p7i7","p2i0",[0,"Consulta por Horas","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_horas.php"]);
stm_ep();
stm_ep();
stm_aix("p0i7","p0i1",[]);
stm_aix("p0i8","p0i2",[0,"Cambiar Contraseña","","",-1,-1,0,"indra/usuarios/modificar_pass.php"],148,24);
stm_aix("p0i9","p0i1",[]);
stm_aix("p0i10","p0i2",[0,"Inicio","","",-1,-1,0,"registro.php"],148,24);
stm_aix("p0i11","p0i1",[]);
stm_aix("p0i12","p0i0",[0,"Salir","","",-1,-1,0,"exit.php","_parent","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#000000"],148,24);
stm_ep();
stm_sc(1,["transparent","transparent","","",3,3,0,0,"#FFFFF7","#000000","up_disabled.gif","up_enabled.gif",7,9,0,"down_disabled.gif","down_enabled.gif",7,9,0,0,200]);
stm_em();
//-->
</script>

<? }?>
<?php if (($_SESSION["nivelw"]==36)){// combinacion del rol 33+8 ?>
<script type="text/javascript">
<!--
stm_bm(["menu61b2",900,"","blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand","",1,25],this);
stm_bp("p0",[0,4,0,0,0,0,0,0,100,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,50,2,2,"#e2e2e2","#e2e2e2","",3,0,0,"#000000"]);
stm_ai("p0i0",[0,"DGD","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",0,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#FFFFF7","#000000","#000000","#000000","bold 8pt Verdana","italic bold 8pt Verdana",0,0,"","","","",0,0,0],148,24);
stm_bp("p1",[1,4,0,0,7,0,10,0,90,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,62,1,2,"#e2e2e2","#e5e5e5","",0,1,1,"#CCCCCC #B2B2B2 #B2B2B2"]);
stm_aix("p1i0","p0i0",[0,"Números de oficio","","",-1,-1,0,"indra/folios/oficios/indice.php","derecho","","","","",10,7,0,"","",0,0,0,0,1,"#e5e5e5",1,"#e5e5e5",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_aix("p1i0","p0i0",[0,"Números de atentas notas","","",-1,-1,0,"indra/folios/atentasnotas/indice.php","derecho","","","","",10,7,0,"","",0,0,0,0,1,"#e5e5e5",1,"#e5e5e5",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_aix("p1i1","p1i0",[0,"Números de correo","","",-1,-1,0,"indra/folios/correo/indice.php","derecho","","","","",10,7,0,"","",0,0,0,0,1,"#CCCCCC",1,"#F2F2F2"],40,0);
stm_aix("p1i2","p1i1",[0,"Manual de Usuario","","",-1,-1,0,"indra/folios/manual.pdf","_blank"],40,0);
stm_ep();
stm_ai("p0i1",[6,2,"#ffffff","",-1,-1,0]);
stm_aix("p0i2","p0i0",[0,"Vinculación","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",1],148,24);
stm_bpx("p2","p1",[1,4,0,0,7,0,10,10]);
stm_aix("p2i0","p1i0",[0,"Plantillas y Asistencia","","",-1,-1,0,"","_self","","","","",10,7,0,"060420arrow3.gif","060420arrow3.gif",10,5],40,0);
stm_bp("p3",[1,2,3,0,3,3,4,10,79,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2","#eeeeee","",3,1,1,"#B2B2B2"]);
stm_aix("p3i0","p1i0",[0,"Consulta Plantilla","","",-1,-1,0,"indra/vinculacion/consulta_p.php","derecho","","","","arrow_03.gif",4,7,0,"","",0,0,0,0,1,"#000000",1,"#FFFFFF",1,"","",3]);
stm_aix("p3i1","p3i0",[0,"Consulta Plantillas","","",-1,-1,0,"indra/vinculacion/reportes/menuplantillas.php"]);
stm_aix("p3i2","p3i0",[0,"Agregar Personal","","",-1,-1,0,"","_self","","","","arrow_03.gif",4,7,0,"060420arrow3.gif","060420arrow3.gif",10,5]);
stm_bpx("p4","p3",[1,2,3,0,3,3,4,0,70,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2"]);
stm_aix("p4i0","p3i0",[0,"SRE","","",-1,-1,0,"indra/vinculacion/altasre2.php"]);
stm_aix("p4i1","p3i0",[0,"Comisionado","","",-1,-1,0,"indra/vinculacion/alta2.php"]);
stm_ep();
stm_aix("p3i3","p3i2",[0,"Modificar Personal"]);
stm_bpx("p5","p4",[]);
stm_aix("p5i0","p3i0",[0,"SRE","","",-1,-1,0,"indra/vinculacion/modificarsre.php"]);
stm_aix("p5i1","p3i0",[0,"Comisionado","","",-1,-1,0,"indra/vinculacion/modificar.php"]);
stm_ep();
stm_aix("p3i4","p3i0",[0,"Reporte de Asistencia","","",-1,-1,0,"indra/vinculacion/captura_lista.php"]);
stm_aix("p3i5","p3i0",[0,"Modificar Asistencia","","",-1,-1,0,"indra/vinculacion/reportes/modifica_asis.php"]);
stm_aix("p3i6","p3i0",[0,"Movimientos en Vinculación","","",-1,-1,0,"indra/vinculacion/reportes/menureport.php"]);
stm_aix("p3i7","p3i0",[0,"Carga de Asistencia","","",-1,-1,0,"indra/vinculacion/listas.php"]);
stm_aix("p3i8","p3i0",[0,"Cargar Datos","","",-1,-1,0,"indra/vinculacion/ced/modificar_cd.php"]);
stm_aix("p3i9","p3i0",[0,"Borrar Datos","","",-1,-1,0,"indra/vinculacion/ced/elimina.php"]);
stm_ep();
stm_aix("p2i1","p1i1",[0,"Unidad Móvil","","",-1,-1,0,"","_self","","","","",10,7,0,"060420arrow3.gif","060420arrow3.gif",10,5],40,0);
stm_bpx("p6","p3",[]);
stm_aix("p6i0","p3i8",[0,"Cargar Unidad Móvil"]);
stm_aix("p6i1","p3i0",[0,"Cargar DGD","","",-1,-1,0,"indra/vinculacion/exped/dgdUnid.php"]);
stm_aix("p6i2","p3i2",[0,"Reporte","","",-1,-1,0,"","derecho"]);
stm_bpx("p7","p4",[]);
stm_aix("p7i0","p3i0",[0,"Reporte General","","",-1,-1,0,"indra/vinculacion/exped/repMobl.php"]);
stm_aix("p7i1","p3i0",[0,"Reporte Corto","","",-1,-1,0,"indra/vinculacion/exped/repMoblcrt.php"]);
stm_ep();
stm_ep();
stm_aix("p2i2","p2i1",[0,"Informe Estadístico"],40,0);
stm_bpx("p8","p3",[]);
stm_aix("p8i0","p3i0",[0,"Ingresar Reporte","","",-1,-1,0,"indra/vinculacion/iestadistico/index.php"]);
stm_aix("p8i1","p6i2",[0,"Reportes"]);
stm_bpx("p9","p4",[1,2,3,0,3,3,4,10]);
stm_aix("p9i0","p6i2",[0,"Remesas"]);
stm_bpx("p10","p4",[]);
stm_aix("p10i0","p3i0",[0,"General del año en curso","","",-1,-1,0,"indra/vinculacion/iestadistico/consulta.php"]);
stm_aix("p10i1","p3i0",[0,"Por Delegación y año","","",-1,-1,0,"indra/vinculacion/iestadistico/consultaa.php"]);
stm_ep();
stm_aix("p9i1","p6i2",[0,"Casos de Protección"]);
stm_bpx("p11","p4",[]);
stm_aix("p11i0","p3i0",[0,"General del año en curso","","",-1,-1,0,"indra/vinculacion/iestadistico/consulta2.php"]);
stm_aix("p11i1","p3i0",[0,"Por Delegación y año","","",-1,-1,0,"indra/vinculacion/iestadistico/consultab.php"]);
stm_ep();
stm_aix("p9i2","p6i2",[0,"Cooperación Educativa\r\ny Cultural"]);
stm_bpx("p12","p4",[]);
stm_aix("p12i0","p3i0",[0,"General del año en curso","","",-1,-1,0,"indra/vinculacion/iestadistico/consulta3.php"]);
stm_aix("p12i1","p3i0",[0,"Por Delegación y año","","",-1,-1,0,"indra/vinculacion/iestadistico/consultac.php"]);
stm_ep();
stm_aix("p9i3","p6i2",[0,"Concentrado por Rubros"]);
stm_bpx("p13","p4",[]);
stm_aix("p13i0","p3i0",[0,"General del año en curso","","",-1,-1,0,"indra/vinculacion/iestadistico/consulta4.php"]);
stm_aix("p13i1","p3i0",[0,"Por Delegación y año","","",-1,-1,0,"indra/vinculacion/iestadistico/consultad.php"]);
stm_ep();
stm_aix("p9i4","p6i2",[0,"Concentrado por Delegación"]);
stm_bpx("p14","p4",[]);
stm_aix("p14i0","p3i0",[0,"General del año en curso","","",-1,-1,0,"indra/vinculacion/iestadistico/consulta5.php"]);
stm_aix("p14i1","p3i0",[0,"Por Delegación y año","","",-1,-1,0,"indra/vinculacion/iestadistico/consultae.php"]);
stm_ep();
stm_ep();
stm_aix("p8i2","p3i0",[0,"Manual de Usuario","","",-1,-1,0,"indra/vinculacion/iestadistico/manual_usuario.pdf","_blank"]);
stm_ep();
stm_aix("p2i3","p2i1",[0,"Informe Ejecutivo"],40,0);
stm_bpx("p15","p3",[]);
stm_aix("p15i0","p3i0",[0,"Captura","","",-1,-1,0,"indra/vinculacion/iejecutivo/proteccion.php"]);
stm_aix("p15i1","p8i1",[]);
stm_bpx("p16","p4",[]);
stm_aix("p16i0","p3i0",[0,"Reporte General","","",-1,-1,0,"indra/vinculacion/iejecutivo/rep1.php"]);
stm_aix("p16i1","p3i0",[0,"Reporte por Mes","","",-1,-1,0,"indra/vinculacion/iejecutivo/rep2.php"]);
stm_aix("p16i2","p3i0",[0,"Reporte General por Delegación","","",-1,-1,0,"indra/vinculacion/iejecutivo/rep3.php"]);
stm_ep();
stm_aix("p15i2","p8i2",[0,"Manual de Usuario","","",-1,-1,0,"indra/vinculacion/iejecutivo/manual_usuario.pdf"]);
stm_ep();
stm_ep();
stm_aix("p0i3","p0i1",[]);
stm_aix("p0i4","p0i2",[0,"Cambiar Contraseña","","",-1,-1,0,"indra/usuarios/modificar_pass.php","derecho","","","","",0,0,0,"","",0,0],148,24);
stm_aix("p0i5","p0i1",[]);
stm_aix("p0i6","p0i4",[0,"Inicio","","",-1,-1,0,"registro.php"],148,24);
stm_aix("p0i7","p0i1",[]);
stm_aix("p0i8","p0i0",[0,"Salir","","",-1,-1,0,"exit.php","_parent","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#000000"],148,24);
stm_ep();
stm_sc(1,["transparent","transparent","","",3,3,0,0,"#FFFFF7","#000000","up_disabled.gif","up_enabled.gif",7,9,0,"down_disabled.gif","down_enabled.gif",7,9,0,0,200]);
stm_em();
//-->
</script>

<? }?>

<?php if (($_SESSION["nivelw"]==37)){// combinacion del rol 33+21 ?>


<? }?>
<?php if (($_SESSION["nivelw"]==38)){// combinacion del rol 33 ?>
<script type="text/javascript">
<!--
stm_bm(["menu61b2",900,"","blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand","",1,25],this);
stm_bp("p0",[0,4,0,0,0,0,0,0,100,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,50,2,2,"#e2e2e2","#e2e2e2","",3,0,0,"#000000"]);
stm_ai("p0i0",[0,"DGD","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",0,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#FFFFF7","#000000","#000000","#000000","bold 8pt Verdana","italic bold 8pt Verdana",0,0,"","","","",0,0,0],148,24);
stm_bp("p1",[1,4,0,0,7,0,10,0,90,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,62,1,2,"#e2e2e2","#e5e5e5","",0,1,1,"#CCCCCC #B2B2B2 #B2B2B2"]);
stm_aix("p1i0","p0i0",[0,"Números de oficio","","",-1,-1,0,"indra/folios/oficios/indice.php","derecho","","","","",10,7,0,"","",0,0,0,0,1,"#e5e5e5",1,"#e5e5e5",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_aix("p1i0","p0i0",[0,"Números de atentas notas","","",-1,-1,0,"indra/folios/atentasnotas/indice.php","derecho","","","","",10,7,0,"","",0,0,0,0,1,"#e5e5e5",1,"#e5e5e5",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_aix("p1i1","p1i0",[0,"Números de correo","","",-1,-1,0,"indra/folios/correo/indice.php","derecho","","","","",10,7,0,"","",0,0,0,0,1,"#CCCCCC",1,"#F2F2F2"],40,0);
stm_aix("p1i2","p1i1",[0,"Manual de Usuario","","",-1,-1,0,"indra/folios/manual.pdf","_blank"],40,0);
stm_ep();
stm_ai("p0i1",[6,2,"#ffffff","",-1,-1,0]);
stm_aix("p0i2","p0i0",[0,"Normatividad","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",1],148,24);
stm_bpx("p2","p1",[1,4,0,0,7,0,10,10]);
stm_aix("p2i0","p1i1",[0,"Gestión de Denuncias","","",-1,-1,0,"","_self","","","","",10,7,0,"060420arrow3.gif","060420arrow3.gif",10,5],40,0);
stm_bp("p3",[1,2,3,0,3,3,4,10,79,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2","#eeeeee","",3,1,1,"#B2B2B2"]);
stm_aix("p3i0","p1i0",[0,"Anomalías en Pasaportes","","",-1,-1,0,"","_self","","","","arrow_03.gif",4,7,0,"060420arrow3.gif","060420arrow3.gif",10,5,0,0,1,"#000000",1,"#FFFFFF",1,"","",3]);
stm_bpx("p4","p3",[1,2,3,0,3,3,4,10,70,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2"]);
stm_aix("p4i0","p3i0",[0,"Registro de Casos\r\nMúltiples","","",-1,-1,0,"indra/normatividad/denuncias/casos.php","derecho","","","","arrow_03.gif",4,7,0,"","",0,0]);
stm_aix("p4i1","p4i0",[0,"Denuncias de Anomalías \r\nen Pasaportes","","",-1,-1,0,"indra/normatividad/denuncias/denuncias_ap.php"]);
stm_aix("p4i2","p4i0",[0,"Registro de la \r\nFicha de Datos","","",-1,-1,0,"indra/normatividad/denuncias/validacion_ficha.php"]);
stm_aix("p4i3","p4i0",[0,"Verificaciones","","",-1,-1,0,"indra/normatividad/denuncias/verificaciones.php"]);
stm_aix("p4i4","p4i0",[0,"Impedimentos","","",-1,-1,0,"indra/normatividad/denuncias/impedimentos.php"]);
stm_aix("p4i5","p4i0",[0,"Notificaciones","","",-1,-1,0,"indra/normatividad/denuncias/notificaciones.php"]);
stm_aix("p4i6","p4i0",[0,"Adjuntar Oficios \r\nde notificaciones","","",-1,-1,0,"indra/normatividad/denuncias/adjuntar_validacion.php"]);
stm_aix("p4i7","p4i0",[0,"Averiguaciones","","",-1,-1,0,"indra/normatividad/denuncias/averiguaciones.php"]);
stm_aix("p4i8","p3i0",[0,"Modificaciones"]);
stm_bpx("p5","p3",[1,2,3,0,3,3,4,0,60,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#b7dc61"]);
stm_aix("p5i0","p4i0",[0,"Modificación de \r\ncasos Múltiples","","",-1,-1,0,"indra/normatividad/denuncias/modificar_caso.php"]);
stm_aix("p5i1","p4i0",[0,"Modificación de \r\nDenuncia AP","","",-1,-1,0,"indra/normatividad/denuncias/modificar_ap.php"]);
stm_aix("p5i2","p4i0",[0,"Modificación de \r\nFicha de Datos","","",-1,-1,0,"indra/normatividad/denuncias/modificar_ficha.php"]);
stm_aix("p5i3","p4i0",[0,"Modificación de\r\nFotografía","","",-1,-1,0,"indra/normatividad/denuncias/modifica_imagen.php"]);
stm_aix("p5i4","p4i0",[0,"Modificación de \r\nVerificaciones","","",-1,-1,0,"indra/normatividad/denuncias/modificar_verificaciones.php"]);
stm_aix("p5i5","p4i0",[0,"Modificación de \r\nImpedimentos","","",-1,-1,0,"indra/normatividad/denuncias/modificar_impedimentos.php"]);
stm_aix("p5i6","p4i0",[0,"Modificación de \r\nNotificaciones","","",-1,-1,0,"indra/normatividad/denuncias/modificar_notif.php"]);
stm_aix("p5i7","p4i0",[0,"Modificación de \r\nAveriguaciones","","",-1,-1,0,"indra/normatividad/denuncias/modificar_averiguaciones.php"]);
stm_ep();
stm_ep();
stm_aix("p3i1","p3i0",[0,"Robo de Insumos"]);
stm_bpx("p6","p4",[]);
stm_aix("p6i0","p4i0",[0,"Denuncias de Robo\r\nde Insumos","","",-1,-1,0,"indra/normatividad/denuncias/denuncias_ri.php"]);
stm_aix("p6i1","p4i5",[]);
stm_aix("p6i2","p4i6",[0,"Ajuntar Oficio \r\nde Notificación"]);
stm_aix("p6i3","p4i7",[]);
stm_aix("p6i4","p4i8",[]);
stm_bpx("p7","p5",[]);
stm_aix("p7i0","p4i0",[0,"Modificación de \r\nDenuncias RI","","",-1,-1,0,"indra/normatividad/denuncias/modificar_ri.php"]);
stm_aix("p7i1","p5i6",[]);
stm_aix("p7i2","p5i7",[]);
stm_ep();
stm_ep();
stm_aix("p3i2","p3i0",[0,"Consultas"]);
stm_bpx("p8","p4",[]);
stm_aix("p8i0","p3i0",[0,"Consulta de Folios"]);
stm_bpx("p9","p5",[]);
stm_aix("p9i0","p4i0",[0,"Consulta de Folios\r\nde Denuncia por Día","","",-1,-1,0,"indra/normatividad/denuncias/consulta_folio_dia.php"]);
stm_aix("p9i1","p4i0",[0,"Consulta de Folios\r\nde Denuncia por Rango \r\nde Fecha","","",-1,-1,0,"indra/normatividad/denuncias/consulta_folio_rango.php"]);
stm_ep();
stm_aix("p8i1","p4i0",[0,"Consulta de Denuncias y\r\nAnomalías en Pasaportes","","",-1,-1,0,"indra/normatividad/denuncias/consulta_ap.php"]);
stm_aix("p8i2","p4i0",[0,"Consulta de Denuncias\r\ny Robo de Insumos","","",-1,-1,0,"indra/normatividad/denuncias/consulta_ri.php"]);
stm_aix("p8i3","p4i0",[0,"Consulta de la\r\nFicha de Datos","","",-1,-1,0,"indra/normatividad/denuncias/consulta_ficha_datos.php"]);
stm_aix("p8i4","p4i0",[0,"Consulta de Documentos\r\nAdjuntos","","",-1,-1,0,"indra/normatividad/denuncias/consulta_doc.php"]);
stm_aix("p8i5","p4i0",[0,"Consulta por Casos","","",-1,-1,0,"indra/normatividad/denuncias/consulta_por_casos.php"]);
stm_ep();
stm_ep();
stm_aix("p2i1","p2i0",[0,"Existencia de \r\nExpedientes de Pasaportes"],40,0);
stm_bpx("p10","p3",[]);
stm_aix("p10i0","p3i0",[0,"Validación Diaria"]);
stm_bpx("p11","p4",[1,2,3,0,3,3,4,0]);
stm_aix("p11i0","p4i0",[0,"Registro de Existencia \r\nde Expedientes","","",-1,-1,0,"indra/normatividad/certificacion/analisis_produccion.php"]);
stm_aix("p11i1","p4i0",[0,"Corrección de Informe \r\nDiario","","",-1,-1,0,"indra/normatividad/certificacion/correccion_porfecha.php"]);
stm_aix("p11i2","p4i0",[0,"Consulta y Reimpresión\r\nde Informes Diarios","","",-1,-1,0,"indra/normatividad/certificacion/consulta_por_fecha.php"]);
stm_ep();
stm_aix("p10i1","p3i0",[0,"Validación \r\nMensual","","",-1,-1,0,"construccion.php","derecho"]);
stm_bpx("p12","p4",[]);
stm_aix("p12i0","p10i1",[0,"Concentrados Mensuales","","",-1,-1,0,""]);
stm_bpx("p13","p11",[]);
stm_aix("p13i0","p4i0",[0,"Existencia de Expedientes","","",-1,-1,0,"indra/normatividad/certificacion/certificacion_mensual/existencias.php"]);
stm_aix("p13i1","p4i0",[0,"Trámites Pendientes","","",-1,-1,0,"indra/normatividad/certificacion/certificacion_mensual/tramites.php"]);
stm_aix("p13i2","p4i0",[0,"Pasaportes Pendientes \r\nde Entrega","","",-1,-1,0,"indra/normatividad/certificacion/certificacion_mensual/pasaportes_pendientes.php"]);
stm_ep();
stm_aix("p12i1","p4i0",[0,"Generación de Oficio \r\nde Certificación Mensual","","",-1,-1,0,"indra/normatividad/certificacion/certificacion_mensual/oficio_certificacion.php"]);
stm_aix("p12i2","p4i0",[0,"Generar Informes \r\nMensuales","","",-1,-1,0,"indra/normatividad/certificacion/certificacion_mensual/menu_concentrados.php"]);
stm_aix("p12i3","p4i0",[0,"Adjuntar Oficio de \r\nCertificación Mensual","","",-1,-1,0,"indra/normatividad/certificacion/certificacion_mensual/adjuntar_oficio.php"]);
stm_ep();
stm_aix("p10i2","p12i0",[0,"Expedientes Extravíados"]);
stm_bpx("p14","p11",[]);
stm_aix("p14i0","p4i0",[0,"Registro de Expediente\r\nExtravíado","","",-1,-1,0,"indra/normatividad/certificacion/expedientes_extraviados.php"]);
stm_aix("p14i1","p4i0",[0,"Generar Informe de\r\nExpedientes \r\nExtravíados","","",-1,-1,0,"indra/normatividad/certificacion/reporte_extraviados.php"]);
stm_aix("p14i2","p4i0",[0,"Baja de Expedientes \r\nExtravíados","","",-1,-1,0,"indra/normatividad/certificacion/baja_extraviados.php"]);
stm_ep();
stm_ep();
stm_ep();
stm_aix("p0i3","p0i1",[]);
stm_aix("p0i4","p0i2",[0,"Administración"],148,24);
stm_bpx("p15","p2",[1,4,0,0,7,0,0]);
stm_aix("p15i0","p1i0",[0,"Usuarios","","",-1,-1,0,"","_self","","","","",0,0,0,"060420arrow3.gif","060420arrow3.gif",10,5,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"","",3,3,0,0,"#FFFFF7","#000000"],148,24);
stm_bpx("p16","p2",[1,2]);
stm_aix("p16i0","p1i0",[0,"Configuración\r\nde Usuarios","","",-1,-1,0,"","_self","","","","",10,7,0,"060420arrow3.gif","060420arrow3.gif",10,5],40,0);
stm_bpx("p17","p3",[1,2,3,0,3,3,4,0]);
stm_aix("p17i0","p4i0",[0,"Cambiar Contraseña","","",-1,-1,0,"indra/usuarios/modificar_pass.php"]);
stm_ep();
stm_ep();
stm_ep();
stm_aix("p0i5","p0i1",[]);
stm_aix("p0i6","p0i2",[0,"Inicio","","",-1,-1,0,"registro.php","derecho","","","","",0,0,0,"","",0,0],148,24);
stm_aix("p0i7","p0i1",[]);
stm_aix("p0i8","p0i0",[0,"Salir","","",-1,-1,0,"exit.php","_parent","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#000000"],148,24);
stm_ep();
stm_sc(1,["transparent","transparent","","",3,3,0,0,"#FFFFF7","#000000","up_disabled.gif","up_enabled.gif",7,9,0,"down_disabled.gif","down_enabled.gif",7,9,0,0,200]);
stm_em();
//-->
</script>

<? }?>

<?php if (($_SESSION["nivelw"]==39)){// combinacion del rol 39 que implica el 7,22,33 ?>
<script type="text/javascript">
<!--
stm_bm(["menu61b2",900,"","blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand","",1,25],this);
stm_bp("p0",[0,4,0,0,0,0,0,0,100,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,50,2,2,"#e2e2e2","#e2e2e2","",3,0,0,"#000000"]);
stm_ai("p0i0",[0,"DGD","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",0,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#FFFFF7","#000000","#000000","#000000","bold 8pt Verdana","italic bold 8pt Verdana",0,0,"","","","",0,0,0],148,24);
stm_bp("p1",[1,4,0,0,7,0,10,0,90,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,62,1,2,"#e2e2e2","#e5e5e5","",0,1,1,"#CCCCCC #B2B2B2 #B2B2B2"]);
stm_aix("p1i0","p0i0",[0,"Números de oficio","","",-1,-1,0,"indra/folios/oficios/indice.php","derecho","","","","",10,7,0,"","",0,0,0,0,1,"#e5e5e5",1,"#e5e5e5",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_aix("p1i0","p0i0",[0,"Números de atentas notas","","",-1,-1,0,"indra/folios/atentasnotas/indice.php","derecho","","","","",10,7,0,"","",0,0,0,0,1,"#e5e5e5",1,"#e5e5e5",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_aix("p1i1","p1i0",[0,"Números de correo","","",-1,-1,0,"indra/folios/correo/indice.php","derecho","","","","",10,7,0,"","",0,0,0,0,1,"#CCCCCC",1,"#F2F2F2"],40,0);
stm_aix("p1i2","p1i1",[0,"Manual de Usuario","","",-1,-1,0,"indra/folios/manual.pdf","_blank"],40,0);
stm_ep();
stm_ai("p0i1",[6,2,"#ffffff","",-1,-1,0]);
stm_aix("p0i2","p0i0",[0,"DOP"],148,24);
stm_bpx("p2","p1",[1,4,0,0,7,0,10,10]);
stm_aix("p2i0","p1i0",[0,"Puntos de Servicio \r\nen Operación","","",-1,-1,0,"","_self","","","","",10,7,0,"060420arrow3.gif","060420arrow3.gif",10,5],40,0);
stm_bp("p3",[1,2,3,0,3,3,4,0,79,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2","#eeeeee","",3,1,1,"#B2B2B2"]);
stm_aix("p3i0","p1i0",[0,"Registro Mensual de \r\nCertificación DOP","","",-1,-1,0,"indra/puntos_servicio/agregar_punto.php","derecho","","","","arrow_03.gif",4,7,0,"","",0,0,0,0,1,"#000000",1,"#FFFFFF",1,"","",3]);
stm_aix("p3i1","p3i0",[0,"Modificar Registros de Certificación DOP","","",-1,-1,0,"indra/puntos_servicio/modificar_punto.php"]);
stm_aix("p3i2","p3i0",[0,"Consulta de Certificación por Delegación DOP","","",-1,-1,0,"indra/puntos_servicio/consulta_certificacion.php"]);
stm_aix("p3i3","p3i0",[0,"Registro Mensual de Certificación","","",-1,-1,0,"indra/puntos_servicio/agregar_punto_del.php"]);
stm_aix("p3i4","p3i0",[0,"Adjuntar Oficio de Certificación","","",-1,-1,0,"indra/upload/formsube.php"]);
stm_aix("p3i5","p3i0",[0,"Consulta de Certificación ","","",-1,-1,0,"indra/puntos_servicio/consulta_certificacion_del.php"]);
stm_aix("p3i6","p3i0",[0,"Manual de Usuario","","",-1,-1,0,"indra/puntos_servicio/Manual%20puntos%20de%20servicio.pdf","_blank"]);
stm_ep();
stm_aix("p2i1","p1i1",[0,"Reportes Puntos de\r\nServicio en Operación","","",-1,-1,0,"","_self","","","","",10,7,0,"060420arrow3.gif","060420arrow3.gif",10,5],40,0);
stm_bpx("p4","p3",[]);
stm_aix("p4i0","p3i0",[0,"Reporte de Certificación \r\nMensual DOP","","",-1,-1,0,"indra/puntos_servicio/rep_puntos_general.php"]);
stm_aix("p4i1","p3i0",[0,"Reporte de Certificación \r\npor Delegación - Año","","",-1,-1,0,"indra/puntos_servicio/rep_puntos_general_2008.php"]);
stm_aix("p4i2","p3i0",[0,"Reporte de Archivos \r\nAdjuntos DOP","","",-1,-1,0,"indra/puntos_servicio/consulta_adjuntos.php"]);
stm_aix("p4i3","p3i0",[0,"Reporte Fecha de \r\nCertificación DOP","","",-1,-1,0,"indra/puntos_servicio/consulta_fecha_certifica.php"]);
stm_ep();
stm_aix("p2i2","p1i1",[0,"Digitalización","","",-1,-1,0,"indra/digitalizacion/indice_digita.php"],40,0);
stm_ep();
stm_aix("p0i3","p0i1",[]);
stm_aix("p0i4","p0i0",[0,"Configuraciones","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",1],148,24);
stm_bpx("p5","p2",[]);
stm_aix("p5i0","p2i0",[0,"Activación/\r\nDesactivación\r\nde Módulos"],40,0);
stm_bpx("p6","p3",[]);
stm_aix("p6i0","p3i0",[0,"Activar/\r\nDesactivar","","",-1,-1,0,"indra/restricciones/actdesc_url.php"]);
stm_ep();
stm_ep();
stm_aix("p0i5","p0i1",[]);
stm_aix("p0i6","p0i4",[0,"Cambiar Contraseña","","",-1,-1,0,"indra/usuarios/modificar_pass.php","derecho","","","","",0,0,0,"","",0,0],148,24);
stm_aix("p0i7","p0i1",[]);
stm_aix("p0i8","p0i6",[0,"Inicio","","",-1,-1,0,"registro.php"],148,24);
stm_aix("p0i9","p0i1",[]);
stm_aix("p0i10","p0i0",[0,"Salir","","",-1,-1,0,"exit.php","_parent","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#000000"],148,24);
stm_ep();
stm_sc(1,["transparent","transparent","","",3,3,0,0,"#FFFFF7","#000000","up_disabled.gif","up_enabled.gif",7,9,0,"down_disabled.gif","down_enabled.gif",7,9,0,0,200]);
stm_em();
//-->
</script>

<? }?>
<?php if (($_SESSION["nivelw"]==40)){// combinacion del rol 40 que implica el 33 y 24 ?>
<script type="text/javascript">
<!--
stm_bm(["menu61b2",900,"","blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand","",1,25],this);
stm_bp("p0",[0,4,0,0,0,0,0,0,100,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,50,2,2,"#e2e2e2","#e2e2e2","",3,0,0,"#000000"]);
stm_ai("p0i0",[0,"DGD","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",0,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#FFFFF7","#000000","#000000","#000000","bold 8pt Verdana","italic bold 8pt Verdana",0,0,"","","","",0,0,0],148,24);
stm_bp("p1",[1,4,0,0,7,0,10,0,90,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,62,1,2,"#e2e2e2","#e5e5e5","",0,1,1,"#CCCCCC #B2B2B2 #B2B2B2"]);
stm_aix("p1i0","p0i0",[0,"Números de oficio","","",-1,-1,0,"indra/folios/oficios/indice.php","derecho","","","","",10,7,0,"","",0,0,0,0,1,"#e5e5e5",1,"#e5e5e5",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_aix("p1i0","p0i0",[0,"Números de atentas notas","","",-1,-1,0,"indra/folios/atentasnotas/indice.php","derecho","","","","",10,7,0,"","",0,0,0,0,1,"#e5e5e5",1,"#e5e5e5",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_aix("p1i1","p1i0",[0,"Números de correo","","",-1,-1,0,"indra/folios/correo/indice.php","derecho","","","","",10,7,0,"","",0,0,0,0,1,"#CCCCCC",1,"#F2F2F2"],40,0);
stm_aix("p1i2","p1i1",[0,"Manual de Usuario","","",-1,-1,0,"indra/folios/manual.pdf","_blank"],40,0);
stm_ep();
stm_ai("p0i1",[6,2,"#ffffff","",-1,-1,0]);
stm_aix("p0i2","p0i0",[0,"Supervisión"],148,24);
stm_bpx("p2","p1",[1,4,0,0,7,0,10,10]);
stm_aix("p2i0","p1i1",[0,"Indicadores","","",-1,-1,0,"","_self","","","","",10,7,0,"060420arrow3.gif","060420arrow3.gif",10,5],40,0);
stm_bp("p3",[1,2,3,0,3,3,4,10,79,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2","#eeeeee","",3,1,1,"#B2B2B2"]);
stm_aix("p3i0","p1i0",[0,"Análisis de Tiempos y\r\nMovimientos en Operación","","",-1,-1,0,"","_self","","","","arrow_03.gif",4,7,0,"060420arrow3.gif","060420arrow3.gif",10,5,0,0,1,"#000000",1,"#FFFFFF",1,"","",3]);
stm_bpx("p4","p3",[1,2,3,0,3,3,4,0,70,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2"]);
stm_aix("p4i0","p3i0",[0,"Reporte Global deTrámites con \r\nAutorización","","",-1,-1,0,"indra/generales_autorizacion_mismodia.php","derecho","","","","arrow_03.gif",4,7,0,"","",0,0]);
stm_aix("p4i1","p4i0",[0,"Comparativo de Delegaciones \r\nde Trámites con Autorización","","",-1,-1,0,"indra/generales_autorizacion_mismodia_deleg.php"]);
stm_aix("p4i2","p4i0",[0,"Reporte Detallado por Delegación\r\n de Trámites con Autorización","","",-1,-1,0,"indra/generales_autorizacion_detallado.php"]);
stm_aix("p4i3","p4i0",[0,"Tiempos de Producción por\r\nDelegación con Autorización","","",-1,-1,0,"indra/graficas/tiempos_produccion_delegacion.php"]);
stm_aix("p4i4","p4i0",[0,"Comparativo tiempos de \r\nProducción por etapas \r\ncon Autorización","","",-1,-1,0,"indra/graficas/tiempos_produccion_etapas.php"]);
stm_ep();
stm_aix("p3i1","p3i0",[0,"Indicadores en Operación"]);
stm_bpx("p5","p4",[]);
stm_aix("p5i0","p4i0",[0,"Autorizaciones por Delegación","","",-1,-1,0,"indra/indicadores/autoriza_por_deleg.php"]);
stm_aix("p5i1","p4i0",[0,"Autorizaciones por Delegación Global","","",-1,-1,0,"indra/indicadores/autoriza_todos_deleg.php"]);
stm_aix("p5i2","p4i0",[0,"Uso de Servicios del Sistema de\r\nCitas para el Trámite de Pasaportes","","",-1,-1,0,"indra/indicadores/inasistencia.php"]);
stm_aix("p5i3","p4i0",[0,"Producción Diaria","","",-1,-1,0,"indra/indicadores/produccion_diaria.php"]);
stm_ep();
stm_aix("p3i2","p3i0",[0,"Indicadores de Supervisión"]);
stm_bpx("p6","p4",[]);
stm_aix("p6i0","p4i0",[0,"Tiempo promedio de \r\nproducción","","",-1,-1,0,"indra/indicadores/tiempo%20promedio%20de%20produccion.php"]);
stm_aix("p6i1","p4i0",[0,"Tiempo promedio de \r\nautorizacion","","",-1,-1,0,"indra/indicadores/tiempo%20promedio%20de%20autorizacion.php"]);
stm_ep();
stm_ep();
stm_aix("p2i1","p2i0",[0,"Reportes Puntos de\r\nServicio en Operación"],40,0);
stm_bpx("p7","p3",[1,2,3,0,3,3,4,0]);
stm_aix("p7i0","p4i0",[0,"Reporte de Certificación \r\nMensual DOEP","","",-1,-1,0,"indra/puntos_servicio/rep_puntos_general.php"]);
stm_aix("p7i1","p4i0",[0,"Reporte de Certificación \r\npor Delegación - Año","","",-1,-1,0,"indra/puntos_servicio/rep_puntos_general_2008.php"]);
stm_aix("p7i2","p4i0",[0,"Reporte de Archivos \r\nAdjuntos DOEP","","",-1,-1,0,"indra/puntos_servicio/consulta_adjuntos.php"]);
stm_aix("p7i3","p4i0",[0,"Reporte Fecha de \r\nCertificación DOEP","","",-1,-1,0,"indra/puntos_servicio/consulta_fecha_certifica.php"]);
stm_ep();
stm_aix("p2i2","p2i0",[0,"OE´s"],40,24);
stm_bpx("p8","p3",[]);
stm_aix("p8i0","p4i0",[0,"Análisis de expedientes\r\nde Oficinas de Enlace","","",-1,-1,0,"indra/vinculacion/exped/expe1.php"]);
stm_aix("p8i1","p3i0",[0,"Reportes","","",-1,-1,0,"","derecho"]);
stm_bpx("p9","p4",[]);
stm_aix("p9i0","p4i0",[0,"Reporte general por\r\nDelegación ","","",-1,-1,0,"indra/vinculacion/exped/menrepOEgral.php"]);
stm_aix("p9i1","p4i0",[0,"Reporte de Expedientes\r\npor Oficinas de Enlace","","",-1,-1,0,"indra/vinculacion/expOE/repOEgralporOE.php"]);
stm_aix("p9i2","p4i0",[0,"Reporte de Diferencias","","",-1,-1,0,"indra/vinculacion/exped/diferencias.php"]);
stm_ep();
stm_aix("p8i2","p4i0",[0,"Manual de operación","","",-1,-1,0,"indra/vinculacion/exped/manualoe.pdf","_blank"]);
stm_ep();
stm_ep();
stm_aix("p0i3","p0i1",[]);
stm_aix("p0i4","p0i0",[0,"Plantillas","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",1],148,24);
stm_bpx("p10","p1",[1,4,0,0,7,0,4]);
stm_aix("p10i0","p4i0",[0,"Consulta Personal\r\nCarga de Documentos\r\nModificaciones","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/frame_buscando.php"],40,0);
stm_aix("p10i7","p3i0",[0,"Trabajadores dados de baja \r\ntemporal por cambio a una Delegación - Dirección","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/temporales.php","derecho"],40,0);
stm_aix("p10i1","p4i0",[0,"Consultas/Reportes","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/frame_consulta.php"],40,0);
stm_aix("p10i2","p4i0",[0,"Reporte \r\nCertificación","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/reporte_certificacion.php"],40,0);
stm_ep();
stm_aix("p0i5","p0i1",[]);
stm_aix("p0i6","p0i4",[0,"Capacitación de \r\npersonal Reportes"],148,24);
stm_bpx("p11","p10",[]);
stm_aix("p11i0","p4i0",[0,"Consulta por Curso","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_curso.php"],40,0);
stm_aix("p11i1","p4i0",[0,"Consulta por Delegación","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_delegacion.php"],40,0);
stm_aix("p11i2","p4i0",[0,"Consulta por Puesto","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_puesto.php"],40,0);
stm_aix("p11i3","p4i0",[0,"Consulta por Sexo","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_sexo.php"],40,0);
stm_aix("p11i4","p4i0",[0,"Consulta por Trabajador","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_trabajador.php"],40,0);
stm_aix("p11i5","p4i0",[0,"Trabajadores No Capacitados","","",-1,-1,0,"indra/capacitacion_trabajadores/captura/persona_sin_capacitar/index.php"],40,0);
stm_aix("p11i6","p4i0",[0,"Trabajadores Capacitados\r\npor Delegación","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/indicador_diferencias.php"],40,0);
stm_aix("p11i7","p4i0",[0,"Consulta por Horas","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_horas.php"],40,0);
stm_ep();
stm_aix("p0i7","p0i1",[]);
stm_aix("p0i8","p0i4",[0,"Cambiar Contraseña","","",-1,-1,0,"indra/usuarios/modificar_pass.php","derecho","","","","",0,0,0,"","",0,0],148,24);
stm_aix("p0i9","p0i1",[]);
stm_aix("p0i10","p0i8",[0,"Inicio","","",-1,-1,0,"registro.php"],148,24);
stm_aix("p0i11","p0i1",[]);
stm_aix("p0i12","p0i0",[0,"Salir","","",-1,-1,0,"exit.php","_parent","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#000000"],148,24);
stm_ep();
stm_sc(1,["transparent","transparent","","",3,3,0,0,"#FFFFF7","#000000","up_disabled.gif","up_enabled.gif",7,9,0,"down_disabled.gif","down_enabled.gif",7,9,0,0,200]);
stm_em();
//-->
</script>




<? }?>

<?php if (($_SESSION["nivelw"]==41)){/*digitalizacion*/?>
<script type="text/javascript">
<!--
stm_bm(["menu61b2",900,"","blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand","",1,25],this);
stm_bp("p0",[0,4,0,0,0,0,0,0,100,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,50,2,2,"#e2e2e2","#e2e2e2","",3,0,0,"#000000"]);
stm_ai("p0i0",[0,"DOP","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",0,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#FFFFF7","#000000","#000000","#000000","bold 8pt Verdana","italic bold 8pt Verdana",0,0,"","","","",0,0,0],148,24);
stm_bp("p1",[1,4,0,0,7,0,10,0,90,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,62,1,2,"#e2e2e2","#e5e5e5","",0,1,1,"#CCCCCC #B2B2B2 #B2B2B2"]);
stm_aix("p1i0","p0i0",[0,"Digitalización","","",-1,-1,0,"indra/digitalizacion/indice_digita2.php","derecho","","","","",10,7,0,"","",0,0,0,0,1,"#CCCCCC",1,"#F2F2F2",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_ep();
stm_ai("p0i1",[6,2,"#ffffff","",-1,-1,0]);
stm_aix("p0i2","p0i0",[0,"Inicio","","",-1,-1,0,"registro.php","derecho","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1],148,24);
stm_aix("p0i3","p0i1",[]);
stm_aix("p0i4","p0i0",[0,"Salir","","",-1,-1,0,"exit.php","_parent","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#000000"],148,24);
stm_ep();
stm_sc(1,["transparent","transparent","","",3,3,0,0,"#FFFFF7","#000000","up_disabled.gif","up_enabled.gif",7,9,0,"down_disabled.gif","down_enabled.gif",7,9,0,0,200]);
stm_em();
//-->
</script>
<? } ?>
<?php if (($_SESSION["nivelw"]==42)){/*admin vinculacion capacitacion*/?>
<script type="text/javascript">
<!--
stm_bm(["menu61b2",900,"","blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand","",1,25],this);
stm_bp("p0",[0,4,0,0,0,0,0,0,100,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,50,2,2,"#e2e2e2","#e2e2e2","",3,0,0,"#000000"]);
stm_ai("p0i0",[0,"Vinculación","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#FFFFF7","#000000","#000000","#000000","bold 8pt Verdana","italic bold 8pt Verdana",0,0,"","","","",0,0,0],148,24);
stm_bp("p1",[1,4,0,0,7,0,10,10,90,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,62,1,2,"#e2e2e2","#e5e5e5","",0,1,1,"#CCCCCC #B2B2B2 #B2B2B2"]);
stm_aix("p1i0","p0i0",[0,"Plantillas y Asistencia","","",-1,-1,0,"","_self","","","","",10,7,0,"060420arrow3.gif","060420arrow3.gif",10,5,0,0,1,"#e5e5e5",1,"#e5e5e5",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_bp("p2",[1,2,3,0,3,3,4,0,79,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2","#eeeeee","",3,1,1,"#B2B2B2"]);
stm_aix("p2i0","p1i0",[0,"Alta de Personal","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/frame_insertar.php","derecho","","","","arrow_03.gif",4,7,0,"","",0,0,0,0,1,"#000000",1,"#FFFFFF",1,"","",3],40,0);
stm_aix("p2i1","p2i0",[0,"Consulta Personal\r\nCarga de Documentos\r\nModificaciones","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/frame_buscando.php"],40,0);
stm_aix("p2i1","p2i0",[0,"Trabajadores dados de baja \r\ntemporal por cambio a una Delegación - Dirección","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/temporales.php"],40,0);
stm_aix("p2i2","p2i0",[0,"Asistencia","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/pasa_lista.php"],40,0);
stm_aix("p2i3","p2i0",[0,"Consulta de Asistencia","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/consultas_asistencias.php"],40,0);
stm_aix("p2i5","p2i0",[0,"Consultas/Reportes","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/frame_consulta.php"],40,0);
stm_aix("p2i6","p2i0",[0,"Certificación","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/certificacion.php"],40,0);
stm_aix("p2i7","p2i0",[0,"Reporte \r\nCertificación","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/reporte_certificacion.php"],40,0);
stm_ep();
stm_aix("p1i1","p1i0",[0,"Unidad Móvil","","",-1,-1,0,"","_self","","","","",10,7,0,"060420arrow3.gif","060420arrow3.gif",10,5,0,0,1,"#CCCCCC",1,"#F2F2F2"],40,0);
stm_bpx("p3","p2",[1,2,3,0,3,3,4,10]);
stm_aix("p3i0","p2i0",[0,"Cargar Unidad Móvil","","",-1,-1,0,"indra/vinculacion/ced/modificar_cd.php"]);
stm_aix("p3i1","p2i0",[0,"Cargar DGD","","",-1,-1,0,"indra/vinculacion/exped/dgdUnid.php"]);
stm_aix("p3i2","p2i0",[0,"Reporte","","",-1,-1,0,"","derecho","","","","arrow_03.gif",4,7,0,"060420arrow3.gif","060420arrow3.gif",10,5]);
stm_bpx("p4","p2",[1,2,3,0,3,3,4,0,70,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2"]);
stm_aix("p4i0","p2i0",[0,"Reporte General","","",-1,-1,0,"indra/vinculacion/exped/repMobl.php"]);
stm_aix("p4i1","p2i0",[0,"Reporte Corto","","",-1,-1,0,"indra/vinculacion/exped/repMoblcrt.php"]);
stm_ep();
stm_ep();
stm_aix("p1i2","p1i1",[0,"Informe Estadístico"],40,0);
stm_bpx("p5","p3",[]);
stm_aix("p5i0","p2i0",[0,"Ingresar Reporte","","",-1,-1,0,"indra/vinculacion/iestadistico/index.php"]);
stm_aix("p5i1","p3i2",[0,"Reportes"]);
stm_bpx("p6","p4",[1,2,3,0,3,3,4,10]);
stm_aix("p6i0","p3i2",[0,"Remesas"]);
stm_bpx("p7","p4",[]);
stm_aix("p7i0","p2i0",[0,"General del año en curso","","",-1,-1,0,"indra/vinculacion/iestadistico/consulta.php"]);
stm_aix("p7i1","p2i0",[0,"Por Delegación y año","","",-1,-1,0,"indra/vinculacion/iestadistico/consultaa.php"]);
stm_ep();
stm_aix("p6i1","p3i2",[0,"Casos de Protección"]);
stm_bpx("p8","p4",[]);
stm_aix("p8i0","p2i0",[0,"General del año en curso","","",-1,-1,0,"indra/vinculacion/iestadistico/consulta2.php"]);
stm_aix("p8i1","p2i0",[0,"Por Delegación y año","","",-1,-1,0,"indra/vinculacion/iestadistico/consultab.php"]);
stm_ep();
stm_aix("p6i2","p3i2",[0,"Cooperación Educativa\r\ny Cultural"]);
stm_bpx("p9","p4",[]);
stm_aix("p9i0","p2i0",[0,"General del año en curso","","",-1,-1,0,"indra/vinculacion/iestadistico/consulta3.php"]);
stm_aix("p9i1","p2i0",[0,"Por Delegación y año","","",-1,-1,0,"indra/vinculacion/iestadistico/consultac.php"]);
stm_ep();
stm_aix("p6i3","p3i2",[0,"Concentrado por Rubros"]);
stm_bpx("p10","p4",[]);
stm_aix("p10i0","p2i0",[0,"General del año en curso","","",-1,-1,0,"indra/vinculacion/iestadistico/consulta4.php"]);
stm_aix("p10i1","p2i0",[0,"Por Delegación y año","","",-1,-1,0,"indra/vinculacion/iestadistico/consultad.php"]);
stm_ep();
stm_aix("p6i4","p3i2",[0,"Concentrado por Delegación"]);
stm_bpx("p11","p4",[]);
stm_aix("p11i0","p2i0",[0,"General del año en curso","","",-1,-1,0,"indra/vinculacion/iestadistico/consulta5.php"]);
stm_aix("p11i1","p2i0",[0,"Por Delegación y año","","",-1,-1,0,"indra/vinculacion/iestadistico/consultae.php"]);
stm_ep();
stm_ep();
stm_aix("p5i2","p2i0",[0,"Manual de Usuario","","",-1,-1,0,"indra/vinculacion/iestadistico/manual_usuario.pdf","_blank"]);
stm_ep();
stm_aix("p1i3","p1i1",[0,"Informe Ejecutivo"],40,0);
stm_bpx("p12","p3",[]);
stm_aix("p12i0","p2i0",[0,"Captura","","",-1,-1,0,"indra/vinculacion/iejecutivo/proteccion.php"]);
stm_aix("p12i1","p5i1",[]);
stm_bpx("p13","p4",[]);
stm_aix("p13i0","p2i0",[0,"Reporte General","","",-1,-1,0,"indra/vinculacion/iejecutivo/rep1.php"]);
stm_aix("p13i1","p2i0",[0,"Reporte por Mes","","",-1,-1,0,"indra/vinculacion/iejecutivo/rep2.php"]);
stm_aix("p13i2","p2i0",[0,"Reporte General por Delegación","","",-1,-1,0,"indra/vinculacion/iejecutivo/rep3.php"]);
stm_ep();
stm_aix("p12i2","p5i2",[0,"Manual de Usuario","","",-1,-1,0,"indra/vinculacion/iejecutivo/manual_usuario.pdf"]);
stm_ep();
stm_ep();
stm_ai("p0i1",[6,2,"#ffffff","",-1,-1,0]);
stm_aix("p0i2","p0i0",[0,"Sistema Nacional de \r\nDelegaciones"],148,24);
stm_bpx("p14","p1",[]);
stm_aix("p14i0","p1i1",[0,"Capacitación de Personal"],40,0);
stm_bpx("p15","p3",[]);
stm_aix("p15i0","p2i0",[0,"Dar de alta Evento- Curso","","",-1,-1,0,"indra/capacitacion_trabajadores/captura/captura_evento_curso.php"]);
stm_aix("p15i1","p2i0",[0,"Continuar captura \r\nde Curso-Evento","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/continuacion_tramite.php"]);
stm_aix("p15i2","p3i2",[0,"Consultas / Reportes"]);
stm_bpx("p16","p2",[]);
stm_aix("p16i0","p2i0",[0,"Consulta por Curso","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_curso.php"]);
stm_aix("p16i1","p2i0",[0,"Consulta por Delegación","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_delegacion.php"]);
stm_aix("p16i2","p2i0",[0,"Consulta por Puesto","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_puesto.php"]);
stm_aix("p16i3","p2i0",[0,"Consulta por Sexo","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_sexo.php"]);
stm_aix("p16i4","p2i0",[0,"Consulta por Trabajador","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_trabajador.php"]);
stm_aix("p16i5","p2i0",[0,"Trabajadores No Capacitados","","",-1,-1,0,"indra/capacitacion_trabajadores/captura/persona_sin_capacitar/index.php"]);
stm_aix("p16i6","p2i0",[0,"Trabajadores Capacitados\r\npor Delegación","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/indicador_diferencias.php"]);
stm_aix("p16i7","p2i0",[0,"Consulta por Horas","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_horas.php"]);
stm_ep();
stm_ep();
stm_ep();
stm_aix("p0i3","p0i1",[]);
stm_aix("p0i4","p0i0",[0,"Cambiar Contraseña","","",-1,-1,0,"indra/usuarios/modificar_pass.php","derecho","","","","",0,0,0,"","",0,0],148,24);
stm_aix("p0i5","p0i1",[]);
stm_aix("p0i6","p0i4",[0,"Inicio","","",-1,-1,0,"registro.php"],148,24);
stm_aix("p0i7","p0i1",[]);
stm_aix("p0i8","p0i0",[0,"Salir","","",-1,-1,0,"exit.php","_parent","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#000000"],148,24);
stm_ep();
stm_sc(1,["transparent","transparent","","",3,3,0,0,"#FFFFF7","#000000","up_disabled.gif","up_enabled.gif",7,9,0,"down_disabled.gif","down_enabled.gif",7,9,0,0,200]);
stm_em();
//-->
</script>


<? } ?>

<?php if (($_SESSION["nivelw"]==43)){/*Consulta vinculacion*/?>

<script type="text/javascript">
<!--
stm_bm(["menu61b2",900,"","blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand","",1,25],this);
stm_bp("p0",[0,4,0,0,0,0,0,0,100,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,50,1,3,"#e2e2e2","#e2e2e2","",3,0,0,"#000000"]);
stm_ai("p0i0",[0,"Vinculación","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#FFFFF7","#000000","#000000","#000000","bold 8pt Verdana","italic bold 8pt Verdana",0,0,"","","","",0,0,0],148,24);
stm_bp("p1",[1,4,0,0,7,0,10,10,90,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,62,1,2,"#e2e2e2","#e5e5e5","",0,1,1,"#CCCCCC #B2B2B2 #B2B2B2"]);
stm_aix("p1i0","p0i0",[0,"Plantillas y Asistencia","","",-1,-1,0,"","_self","","","","",10,7,0,"060420arrow3.gif","060420arrow3.gif",10,5,0,0,1,"#e5e5e5",1,"#e5e5e5",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_bp("p2",[1,2,3,0,3,3,4,0,79,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2","#eeeeee","",3,1,1,"#B2B2B2"]);
stm_aix("p2i0","p1i0",[0,"Consulta Personal\r\nCarga de Documentos\r\nModificaciones","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/frame_buscando.php","derecho","","","","arrow_03.gif",4,7,0,"","",0,0,0,0,1,"#000000",1,"#FFFFFF",1,"","",3],40,0);
stm_aix("p2i0","p1i0",[0,"Trabajadores dados de baja \r\ntemporal por cambio a una Delegación - Dirección","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/temporales.php","derecho","","","","arrow_03.gif",4,7,0,"","",0,0,0,0,1,"#000000",1,"#FFFFFF",1,"","",3],40,0);
stm_aix("p2i1","p2i0",[0,"Consulta de Asistencia","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/consultas_asistencias.php"],40,0);
stm_aix("p2i3","p2i0",[0,"Consultas/Reportes","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/frame_consulta.php"],40,0);
stm_aix("p2i4","p2i0",[0,"Reporte \r\nCertificación","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/reporte_certificacion.php"],40,0);
stm_ep();
stm_aix("p1i1","p1i0",[0,"Unidad Móvil","","",-1,-1,0,"","_self","","","","",10,7,0,"060420arrow3.gif","060420arrow3.gif",10,5,0,0,1,"#CCCCCC",1,"#F2F2F2"],40,0);
stm_bpx("p3","p2",[1,2,3,0,3,3,4,10]);
stm_aix("p3i0","p2i0",[0,"Reporte","","",-1,-1,0,"","derecho","","","","arrow_03.gif",4,7,0,"060420arrow3.gif","060420arrow3.gif",10,5]);
stm_bpx("p4","p2",[1,2,3,0,3,3,4,0,70,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2"]);
stm_aix("p4i0","p2i0",[0,"Reporte General","","",-1,-1,0,"indra/vinculacion/exped/repMobl.php"]);
stm_aix("p4i1","p2i0",[0,"Reporte Corto","","",-1,-1,0,"indra/vinculacion/exped/repMoblcrt.php"]);
stm_ep();
stm_ep();
stm_aix("p1i2","p1i1",[0,"Informe Estadístico"],40,0);
stm_bpx("p5","p3",[]);
stm_aix("p5i0","p3i0",[0,"Reportes"]);
stm_bpx("p6","p4",[1,2,3,0,3,3,4,10]);
stm_aix("p6i0","p3i0",[0,"Remesas"]);
stm_bpx("p7","p4",[]);
stm_aix("p7i0","p2i0",[0,"General del año en curso","","",-1,-1,0,"indra/vinculacion/iestadistico/consulta.php"]);
stm_aix("p7i1","p2i0",[0,"Por Delegación y año","","",-1,-1,0,"indra/vinculacion/iestadistico/consultaa.php"]);
stm_ep();
stm_aix("p6i1","p3i0",[0,"Casos de Protección"]);
stm_bpx("p8","p4",[]);
stm_aix("p8i0","p2i0",[0,"General del año en curso","","",-1,-1,0,"indra/vinculacion/iestadistico/consulta2.php"]);
stm_aix("p8i1","p2i0",[0,"Por Delegación y año","","",-1,-1,0,"indra/vinculacion/iestadistico/consultab.php"]);
stm_ep();
stm_aix("p6i2","p3i0",[0,"Cooperación Educativa\r\ny Cultural"]);
stm_bpx("p9","p4",[]);
stm_aix("p9i0","p2i0",[0,"General del año en curso","","",-1,-1,0,"indra/vinculacion/iestadistico/consulta3.php"]);
stm_aix("p9i1","p2i0",[0,"Por Delegación y año","","",-1,-1,0,"indra/vinculacion/iestadistico/consultac.php"]);
stm_ep();
stm_aix("p6i3","p3i0",[0,"Concentrado por Rubros"]);
stm_bpx("p10","p4",[]);
stm_aix("p10i0","p2i0",[0,"General del año en curso","","",-1,-1,0,"indra/vinculacion/iestadistico/consulta4.php"]);
stm_aix("p10i1","p2i0",[0,"Por Delegación y año","","",-1,-1,0,"indra/vinculacion/iestadistico/consultad.php"]);
stm_ep();
stm_aix("p6i4","p3i0",[0,"Concentrado por Delegación"]);
stm_bpx("p11","p4",[]);
stm_aix("p11i0","p2i0",[0,"General del año en curso","","",-1,-1,0,"indra/vinculacion/iestadistico/consulta5.php"]);
stm_aix("p11i1","p2i0",[0,"Por Delegación y año","","",-1,-1,0,"indra/vinculacion/iestadistico/consultae.php"]);
stm_ep();
stm_ep();
stm_aix("p5i1","p2i0",[0,"Manual de Usuario","","",-1,-1,0,"indra/vinculacion/iestadistico/manual_usuario.pdf","_blank"]);
stm_ep();
stm_aix("p1i3","p1i1",[0,"Informe Ejecutivo"],40,0);
stm_bpx("p12","p3",[]);
stm_aix("p12i0","p5i0",[]);
stm_bpx("p13","p4",[]);
stm_aix("p13i0","p2i0",[0,"Reporte General","","",-1,-1,0,"indra/vinculacion/iejecutivo/rep1.php"]);
stm_aix("p13i1","p2i0",[0,"Reporte por Mes","","",-1,-1,0,"indra/vinculacion/iejecutivo/rep2.php"]);
stm_aix("p13i2","p2i0",[0,"Reporte General por Delegación","","",-1,-1,0,"indra/vinculacion/iejecutivo/rep3.php"]);
stm_ep();
stm_aix("p12i1","p5i1",[0,"Manual de Usuario","","",-1,-1,0,"indra/vinculacion/iejecutivo/manual_usuario.pdf"]);
stm_ep();
stm_ep();
stm_ai("p0i1",[6,2,"#ffffff","",-1,-1,0]);
stm_aix("p0i2","p0i0",[0,"Inicio","","",-1,-1,0,"registro.php","derecho","","","","",0,0,0,"","",0,0],148,24);
stm_aix("p0i3","p0i1",[]);
stm_aix("p0i4","p0i0",[0,"Salir","","",-1,-1,0,"exit.php","_parent","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#000000"],148,24);
stm_ep();
stm_sc(1,["transparent","transparent","","",3,3,0,0,"#FFFFF7","#000000","up_disabled.gif","up_enabled.gif",7,9,0,"down_disabled.gif","down_enabled.gif",7,9,0,0,200]);
stm_em();
//-->
</script>

<? } ?>
<?php if (($_SESSION["nivelw"]==44)){/*Consulta vinculacion*/?>
<script type="text/javascript">
<!--
stm_bm(["menu61b2",900,"","blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand","",1,25],this);
stm_bp("p0",[0,4,0,0,0,0,0,0,100,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,50,2,2,"#e2e2e2","#e2e2e2","",3,0,0,"#000000"]);
stm_ai("p0i0",[0,"DGD","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",0,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#FFFFF7","#000000","#000000","#000000","bold 8pt Verdana","italic bold 8pt Verdana",0,0,"","","","",0,0,0],148,24);
stm_bp("p1",[1,4,0,0,7,0,10,0,90,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,62,1,2,"#e2e2e2","#e5e5e5","",0,1,1,"#CCCCCC #B2B2B2 #B2B2B2"]);
stm_aix("p1i0","p0i0",[0,"Números de oficio","","",-1,-1,0,"indra/folios/oficios/indice.php","derecho","","","","",10,7,0,"","",0,0,0,0,1,"#e5e5e5",1,"#e5e5e5",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_aix("p1i0","p0i0",[0,"Números de atentas notas","","",-1,-1,0,"indra/folios/atentasnotas/indice.php","derecho","","","","",10,7,0,"","",0,0,0,0,1,"#e5e5e5",1,"#e5e5e5",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_aix("p1i1","p1i0",[0,"Números de correo","","",-1,-1,0,"indra/folios/correo/indice.php","derecho","","","","",10,7,0,"","",0,0,0,0,1,"#CCCCCC",1,"#F2F2F2"],40,0);
stm_aix("p1i2","p1i1",[0,"Manual de Usuario","","",-1,-1,0,"indra/folios/manual.pdf","_blank"],40,0);
stm_ep();
stm_ai("p0i1",[6,2,"#ffffff","",-1,-1,0]);
stm_aix("p0i2","p0i0",[0,"DOP"],148,24);
stm_bpx("p2","p1",[]);
stm_aix("p2i0","p1i1",[0,"Digitalización","","",-1,-1,0,"indra/digitalizacion/indice_digita2.php"],40,0);
stm_ep();
stm_aix("p0i3","p0i1",[]);
stm_aix("p0i4","p0i0",[0,"Vinculación","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",1],148,24);
stm_bpx("p3","p1",[1,4,0,0,7,0,10,10]);
stm_aix("p3i0","p1i0",[0,"Plantillas y Asistencia","","",-1,-1,0,"","_self","","","","",10,7,0,"060420arrow3.gif","060420arrow3.gif",10,5],40,0);
stm_bp("p4",[1,2,3,0,3,3,4,0,79,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2","#eeeeee","",3,1,1,"#B2B2B2"]);
stm_aix("p4i0","p1i0",[0,"Alta de Personal","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/frame_insertar.php","derecho","","","","arrow_03.gif",4,7,0,"","",0,0,0,0,1,"#000000",1,"#FFFFFF",1,"","",3],40,0);
stm_aix("p4i1","p4i0",[0,"Consulta Personal\r\nCarga de Documentos\r\nModificaciones","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/frame_buscando.php"],40,0);
stm_aix("p4i1","p4i0",[0,"Trabajadores dados de baja \r\ntemporal por cambio a una Delegación - Dirección","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/temporales.php"],40,0);
stm_aix("p4i2","p4i0",[0,"Asistencia","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/pasa_lista.php"],40,0);
stm_aix("p4i3","p4i0",[0,"Consulta de Asistencia","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/consultas_asistencias.php"],40,0);
stm_aix("p4i5","p4i0",[0,"Consultas/Reportes","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/frame_consulta.php"],40,0);
stm_aix("p4i6","p4i0",[0,"Certificación","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/certificacion.php"],40,0);
stm_aix("p4i7","p4i0",[0,"Reporte \r\nCertificación","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/reporte_certificacion.php"],40,0);
stm_ep();
stm_aix("p3i1","p1i1",[0,"Unidad Móvil","","",-1,-1,0,"","_self","","","","",10,7,0,"060420arrow3.gif","060420arrow3.gif",10,5],40,0);
stm_bpx("p5","p4",[1,2,3,0,3,3,4,10]);
stm_aix("p5i0","p4i0",[0,"Cargar Unidad Móvil","","",-1,-1,0,"indra/vinculacion/ced/modificar_cd.php"]);
stm_aix("p5i1","p4i0",[0,"Cargar DGD","","",-1,-1,0,"indra/vinculacion/exped/dgdUnid.php"]);
stm_aix("p5i2","p4i0",[0,"Reporte","","",-1,-1,0,"","derecho","","","","arrow_03.gif",4,7,0,"060420arrow3.gif","060420arrow3.gif",10,5]);
stm_bpx("p6","p4",[1,2,3,0,3,3,4,0,70,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2"]);
stm_aix("p6i0","p4i0",[0,"Reporte General","","",-1,-1,0,"indra/vinculacion/exped/repMobl.php"]);
stm_aix("p6i1","p4i0",[0,"Reporte Corto","","",-1,-1,0,"indra/vinculacion/exped/repMoblcrt.php"]);
stm_ep();
stm_ep();
stm_aix("p3i2","p3i1",[0,"Informe Estadístico"],40,0);
stm_bpx("p7","p5",[]);
stm_aix("p7i0","p4i0",[0,"Ingresar Reporte","","",-1,-1,0,"indra/vinculacion/iestadistico/index.php"]);
stm_aix("p7i1","p5i2",[0,"Reportes"]);
stm_bpx("p8","p6",[1,2,3,0,3,3,4,10]);
stm_aix("p8i0","p5i2",[0,"Remesas"]);
stm_bpx("p9","p6",[]);
stm_aix("p9i0","p4i0",[0,"General del año en curso","","",-1,-1,0,"indra/vinculacion/iestadistico/consulta.php"]);
stm_aix("p9i1","p4i0",[0,"Por Delegación y año","","",-1,-1,0,"indra/vinculacion/iestadistico/consultaa.php"]);
stm_ep();
stm_aix("p8i1","p5i2",[0,"Casos de Protección"]);
stm_bpx("p10","p6",[]);
stm_aix("p10i0","p4i0",[0,"General del año en curso","","",-1,-1,0,"indra/vinculacion/iestadistico/consulta2.php"]);
stm_aix("p10i1","p4i0",[0,"Por Delegación y año","","",-1,-1,0,"indra/vinculacion/iestadistico/consultab.php"]);
stm_ep();
stm_aix("p8i2","p5i2",[0,"Cooperación Educativa\r\ny Cultural"]);
stm_bpx("p11","p6",[]);
stm_aix("p11i0","p4i0",[0,"General del año en curso","","",-1,-1,0,"indra/vinculacion/iestadistico/consulta3.php"]);
stm_aix("p11i1","p4i0",[0,"Por Delegación y año","","",-1,-1,0,"indra/vinculacion/iestadistico/consultac.php"]);
stm_ep();
stm_aix("p8i3","p5i2",[0,"Concentrado por Rubros"]);
stm_bpx("p12","p6",[]);
stm_aix("p12i0","p4i0",[0,"General del año en curso","","",-1,-1,0,"indra/vinculacion/iestadistico/consulta4.php"]);
stm_aix("p12i1","p4i0",[0,"Por Delegación y año","","",-1,-1,0,"indra/vinculacion/iestadistico/consultad.php"]);
stm_ep();
stm_aix("p8i4","p5i2",[0,"Concentrado por Delegación"]);
stm_bpx("p13","p6",[]);
stm_aix("p13i0","p4i0",[0,"General del año en curso","","",-1,-1,0,"indra/vinculacion/iestadistico/consulta5.php"]);
stm_aix("p13i1","p4i0",[0,"Por Delegación y año","","",-1,-1,0,"indra/vinculacion/iestadistico/consultae.php"]);
stm_ep();
stm_ep();
stm_aix("p7i2","p4i0",[0,"Manual de Usuario","","",-1,-1,0,"indra/vinculacion/iestadistico/manual_usuario.pdf","_blank"]);
stm_ep();
stm_aix("p3i3","p3i1",[0,"Informe Ejecutivo"],40,0);
stm_bpx("p14","p5",[]);
stm_aix("p14i0","p4i0",[0,"Captura","","",-1,-1,0,"indra/vinculacion/iejecutivo/proteccion.php"]);
stm_aix("p14i1","p7i1",[]);
stm_bpx("p15","p6",[]);
stm_aix("p15i0","p4i0",[0,"Reporte General","","",-1,-1,0,"indra/vinculacion/iejecutivo/rep1.php"]);
stm_aix("p15i1","p4i0",[0,"Reporte por Mes","","",-1,-1,0,"indra/vinculacion/iejecutivo/rep2.php"]);
stm_aix("p15i2","p4i0",[0,"Reporte General por Delegación","","",-1,-1,0,"indra/vinculacion/iejecutivo/rep3.php"]);
stm_ep();
stm_aix("p14i2","p7i2",[0,"Manual de Usuario","","",-1,-1,0,"indra/vinculacion/iejecutivo/manual_usuario.pdf"]);
stm_ep();
stm_ep();
stm_aix("p0i5","p0i1",[]);
stm_aix("p0i6","p0i4",[0,"Sistema Nacional de \r\nDelegaciones"],148,24);
stm_bpx("p16","p3",[]);
stm_aix("p16i0","p3i1",[0,"Capacitación de Personal"],40,0);
stm_bpx("p17","p5",[]);
stm_aix("p17i0","p4i0",[0,"Dar de alta Evento- Curso","","",-1,-1,0,"indra/capacitacion_trabajadores/captura/captura_evento_curso.php"]);
stm_aix("p17i1","p4i0",[0,"Continuar captura \r\nde Curso-Evento","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/continuacion_tramite.php"]);
stm_aix("p17i2","p5i2",[0,"Consultas / Reportes"]);
stm_bpx("p18","p4",[]);
stm_aix("p18i0","p4i0",[0,"Consulta por Curso","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_curso.php"]);
stm_aix("p18i1","p4i0",[0,"Consulta por Delegación","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_delegacion.php"]);

stm_aix("p18i2","p4i0",[0,"Consulta por Puesto","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_puesto.php"]);
stm_aix("p18i3","p4i0",[0,"Consulta por Sexo","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_sexo.php"]);
stm_aix("p18i4","p4i0",[0,"Consulta por Trabajador","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_trabajador.php"]);
stm_aix("p18i5","p4i0",[0,"Trabajadores No Capacitados","","",-1,-1,0,"indra/capacitacion_trabajadores/captura/persona_sin_capacitar/index.php"]);
stm_aix("p18i6","p4i0",[0,"Trabajadores Capacitados\r\npor Delegación","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/indicador_diferencias.php"]);
stm_aix("p18i7","p4i0",[0,"Consulta por Horas","","",-1,-1,0,"indra/capacitacion_trabajadores/consultas/consulta_por_horas.php"]);
stm_ep();
stm_ep();
stm_ep();
stm_aix("p0i7","p0i1",[]);
stm_aix("p0i8","p0i4",[0,"Cambiar Contraseña","","",-1,-1,0,"indra/usuarios/modificar_pass.php","derecho","","","","",0,0,0,"","",0,0],148,24);
stm_aix("p0i9","p0i1",[]);
stm_aix("p0i10","p0i8",[0,"Inicio","","",-1,-1,0,"registro.php"],148,24);
stm_aix("p0i11","p0i1",[]);
stm_aix("p0i12","p0i0",[0,"Salir","","",-1,-1,0,"exit.php","_parent","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#000000"],148,24);
stm_ep();
stm_sc(1,["transparent","transparent","","",3,3,0,0,"#FFFFF7","#000000","up_disabled.gif","up_enabled.gif",7,9,0,"down_disabled.gif","down_enabled.gif",7,9,0,0,200]);
stm_em();
//-->
</script>



<? }?>
<?php if (($_SESSION["nivelw"]==45)){/*Captura de plantillas DGD*/?>
<script type="text/javascript">
<!--
stm_bm(["menu61b2",900,"","blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand","",1,25],this);
stm_bp("p0",[0,4,0,0,0,0,0,0,100,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,50,1,3,"#e2e2e2","#e2e2e2","",3,0,0,"#000000"]);
stm_ai("p0i0",[0,"Plantillas","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#FFFFF7","#000000","#000000","#000000","bold 8pt Verdana","italic bold 8pt Verdana",0,0,"","","","",0,0,0],148,24);
stm_bp("p1",[1,4,0,0,7,0,4,0,90,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,62,1,2,"#e2e2e2","#e5e5e5","",0,1,1,"#CCCCCC #B2B2B2 #B2B2B2"]);
stm_aix("p1i0","p0i0",[0,"Alta de Personal","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/frame_insertar_tres.php","derecho","","","","arrow_03.gif",4,7,0,"","",0,0,0,0,1,"#000000",1,"#FFFFFF",1,"","",3,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_aix("p1i1","p1i0",[0,"Consulta Personal\r\nCarga de Documentos\r\nModificaciones","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/frame_buscando.php"],40,0);
stm_aix("p1i1","p1i0",[0,"Trabajadores dados de baja \r\ntemporal por cambio a una Delegación - Dirección","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/temporales.php"],40,0);
<? 
$consulta2=mysql_query("select id_restriccion,restriccion,activado from restricciones where id_restriccion='2';");

while ($row= mysql_fetch_array($consulta2)){
if($row[2]==1){?>
stm_aix("p1i2","p1i0",[0,"Certificación","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/certificacion.php"],40,0);
stm_aix("p1i3","p1i0",[0,"Continuacion Certificación","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/reporceso%20cert.php"],40,0);
<? }}?>
stm_aix("p1i4","p1i0",[0,"Consultas/Reportes","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/frame_consulta_tres.php"],40,0);
stm_ep();
stm_ai("p0i1",[6,2,"#ffffff","",-1,-1,0]);
stm_aix("p0i2","p0i0",[0,"Inicio","","",-1,-1,0,"registro.php","derecho","","","","",0,0,0,"","",0,0],148,24);
stm_aix("p0i3","p0i1",[]);
stm_aix("p0i4","p0i0",[0,"Salir","","",-1,-1,0,"exit.php","_parent","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#000000"],148,24);
stm_ep();
stm_sc(1,["transparent","transparent","","",3,3,0,0,"#FFFFF7","#000000","up_disabled.gif","up_enabled.gif",7,9,0,"down_disabled.gif","down_enabled.gif",7,9,0,0,200]);
stm_em();
//-->
</script>
<? }?>
<?php if (($_SESSION["nivelw"]==46)){/*Combinacion de roles de atencion ciudadanA y consulta de vinculación*/?>
<script type="text/javascript">
<!--
stm_bm(["menu61b2",900,"","blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand","",1,25],this);
stm_bp("p0",[0,4,0,0,0,0,0,0,100,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,50,2,2,"#e2e2e2","#e2e2e2","",3,0,0,"#000000"]);
stm_ai("p0i0",[0,"Vinculación","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#FFFFF7","#000000","#000000","#000000","bold 8pt Verdana","italic bold 8pt Verdana",0,0,"","","","",0,0,0],148,24);
stm_bp("p1",[1,4,0,0,7,0,10,10,90,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,62,1,2,"#e2e2e2","#e5e5e5","",0,1,1,"#CCCCCC #B2B2B2 #B2B2B2"]);
stm_aix("p1i0","p0i0",[0,"Plantillas y Asistencia","","",-1,-1,0,"","_self","","","","",10,7,0,"060420arrow3.gif","060420arrow3.gif",10,5,0,0,1,"#e5e5e5",1,"#e5e5e5",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_bp("p2",[1,2,3,0,3,3,4,0,79,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2","#eeeeee","",3,1,1,"#B2B2B2"]);
stm_aix("p2i0","p1i0",[0,"Consulta Personal\r\nCarga de Documentos\r\nModificaciones","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/frame_buscando.php","derecho","","","","arrow_03.gif",4,7,0,"","",0,0,0,0,1,"#000000",1,"#FFFFFF",1,"","",3],40,0);
stm_aix("p2i0","p1i0",[0,"Trabajadores dados de baja \r\ntemporal por cambio a una Delegación - Dirección","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/temporales.php","derecho","","","","arrow_03.gif",4,7,0,"","",0,0,0,0,1,"#000000",1,"#FFFFFF",1,"","",3],40,0);
stm_aix("p2i1","p2i0",[0,"Consulta de Asistencia","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/consultas_asistencias.php"],40,0);
stm_aix("p2i3","p2i0",[0,"Consultas/Reportes","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/frame_consulta.php"],40,0);
stm_aix("p2i4","p2i0",[0,"Reporte \r\nCertificación","","",-1,-1,0,"indra/vinculacion/plantillas_nuevo/reporte_certificacion.php"],40,0);
stm_ep();
stm_aix("p1i1","p1i0",[0,"Unidad Móvil","","",-1,-1,0,"","_self","","","","",10,7,0,"060420arrow3.gif","060420arrow3.gif",10,5,0,0,1,"#CCCCCC",1,"#F2F2F2"],40,0);
stm_bpx("p3","p2",[1,2,3,0,3,3,4,10]);
stm_aix("p3i0","p2i0",[0,"Reporte","","",-1,-1,0,"","derecho","","","","arrow_03.gif",4,7,0,"060420arrow3.gif","060420arrow3.gif",10,5]);
stm_bpx("p4","p2",[1,2,3,0,3,3,4,0,70,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2"]);
stm_aix("p4i0","p2i0",[0,"Reporte General","","",-1,-1,0,"indra/vinculacion/exped/repMobl.php"]);
stm_aix("p4i1","p2i0",[0,"Reporte Corto","","",-1,-1,0,"indra/vinculacion/exped/repMoblcrt.php"]);
stm_ep();
stm_ep();
stm_aix("p1i2","p1i1",[0,"Informe Estadístico"],40,0);
stm_bpx("p5","p3",[]);
stm_aix("p5i0","p3i0",[0,"Reportes"]);
stm_bpx("p6","p4",[1,2,3,0,3,3,4,10]);
stm_aix("p6i0","p3i0",[0,"Remesas"]);
stm_bpx("p7","p4",[]);
stm_aix("p7i0","p2i0",[0,"General del año en curso","","",-1,-1,0,"indra/vinculacion/iestadistico/consulta.php"]);
stm_aix("p7i1","p2i0",[0,"Por Delegación y año","","",-1,-1,0,"indra/vinculacion/iestadistico/consultaa.php"]);
stm_ep();
stm_aix("p6i1","p3i0",[0,"Casos de Protección"]);
stm_bpx("p8","p4",[]);
stm_aix("p8i0","p2i0",[0,"General del año en curso","","",-1,-1,0,"indra/vinculacion/iestadistico/consulta2.php"]);
stm_aix("p8i1","p2i0",[0,"Por Delegación y año","","",-1,-1,0,"indra/vinculacion/iestadistico/consultab.php"]);
stm_ep();
stm_aix("p6i2","p3i0",[0,"Cooperación Educativa\r\ny Cultural"]);
stm_bpx("p9","p4",[]);
stm_aix("p9i0","p2i0",[0,"General del año en curso","","",-1,-1,0,"indra/vinculacion/iestadistico/consulta3.php"]);
stm_aix("p9i1","p2i0",[0,"Por Delegación y año","","",-1,-1,0,"indra/vinculacion/iestadistico/consultac.php"]);
stm_ep();
stm_aix("p6i3","p3i0",[0,"Concentrado por Rubros"]);
stm_bpx("p10","p4",[]);
stm_aix("p10i0","p2i0",[0,"General del año en curso","","",-1,-1,0,"indra/vinculacion/iestadistico/consulta4.php"]);
stm_aix("p10i1","p2i0",[0,"Por Delegación y año","","",-1,-1,0,"indra/vinculacion/iestadistico/consultad.php"]);
stm_ep();
stm_aix("p6i4","p3i0",[0,"Concentrado por Delegación"]);
stm_bpx("p11","p4",[]);
stm_aix("p11i0","p2i0",[0,"General del año en curso","","",-1,-1,0,"indra/vinculacion/iestadistico/consulta5.php"]);
stm_aix("p11i1","p2i0",[0,"Por Delegación y año","","",-1,-1,0,"indra/vinculacion/iestadistico/consultae.php"]);
stm_ep();
stm_ep();
stm_aix("p5i1","p2i0",[0,"Manual de Usuario","","",-1,-1,0,"indra/vinculacion/iestadistico/manual_usuario.pdf","_blank"]);
stm_ep();
stm_aix("p1i3","p1i1",[0,"Informe Ejecutivo"],40,0);
stm_bpx("p12","p3",[]);
stm_aix("p12i0","p5i0",[]);
stm_bpx("p13","p4",[]);
stm_aix("p13i0","p2i0",[0,"Reporte General","","",-1,-1,0,"indra/vinculacion/iejecutivo/rep1.php"]);
stm_aix("p13i1","p2i0",[0,"Reporte por Mes","","",-1,-1,0,"indra/vinculacion/iejecutivo/rep2.php"]);
stm_aix("p13i2","p2i0",[0,"Reporte General por Delegación","","",-1,-1,0,"indra/vinculacion/iejecutivo/rep3.php"]);
stm_ep();
stm_aix("p12i1","p5i1",[0,"Manual de Usuario","","",-1,-1,0,"indra/vinculacion/iejecutivo/manual_usuario.pdf"]);
stm_ep();
stm_ep();
stm_ai("p0i1",[6,2,"#ffffff","",-1,-1,0]);
stm_aix("p0i2","p0i0",[0,"Ev. y Mejora de\r\n Delegaciones"],148,24);
stm_bpx("p14","p1",[1,4,0,0,7,0,10,0]);
stm_aix("p14i0","p1i0",[0,"Atención ciudadana","","",-1,-1,0,"indra/evaluacion_mejora/opciones_menu.php","derecho","","","","",10,7,0,"","",0,0],40,0);
stm_ep();
stm_aix("p0i3","p0i1",[]);
stm_aix("p0i4","p0i0",[0,"Cambiar Contraseña","","",-1,-1,0,"indra/usuarios/modificar_pass.php","derecho","","","","",0,0,0,"","",0,0],148,24);
stm_aix("p0i5","p0i1",[]);
stm_aix("p0i6","p0i4",[0,"Inicio","","",-1,-1,0,"registro.php"],148,24);
stm_aix("p0i7","p0i1",[]);
stm_aix("p0i8","p0i0",[0,"Salir","","",-1,-1,0,"exit.php","_parent","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#000000"],148,24);
stm_ep();
stm_sc(1,["transparent","transparent","","",3,3,0,0,"#FFFFF7","#000000","up_disabled.gif","up_enabled.gif",7,9,0,"down_disabled.gif","down_enabled.gif",7,9,0,0,200]);
stm_em();
//-->
</script>

<? }?>

<?php if (($_SESSION["nivelw"]==48)){/*Combinacion de roles de atencion ciudadanA y consulta de vinculación*/?>
<script type="text/javascript">
<!--
stm_bm(["menu61b2",900,"","blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand","",1,25],this);
stm_bp("p0",[0,4,0,0,0,0,0,0,100,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,50,2,2,"#e2e2e2","#e2e2e2","",3,0,0,"#000000"]);
stm_ai("p0i0",[0,"DGD","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",0,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#FFFFF7","#000000","#000000","#000000","bold 8pt Verdana","italic bold 8pt Verdana",0,0,"","","","",0,0,0],148,24);
stm_bp("p1",[1,4,0,0,7,0,10,0,90,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,62,1,2,"#e2e2e2","#e5e5e5","",0,1,1,"#CCCCCC #B2B2B2 #B2B2B2"]);
stm_aix("p1i0","p0i0",[0,"Números de oficio","","",-1,-1,0,"indra/folios/oficios/indice.php","derecho","","","","",10,7,0,"","",0,0,0,0,1,"#e5e5e5",1,"#e5e5e5",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_aix("p1i0","p0i0",[0,"Números de atentas notas","","",-1,-1,0,"indra/folios/atentasnotas/indice.php","derecho","","","","",10,7,0,"","",0,0,0,0,1,"#e5e5e5",1,"#e5e5e5",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_aix("p1i1","p1i0",[0,"Números de correo","","",-1,-1,0,"indra/folios/correo/indice.php","derecho","","","","",10,7,0,"","",0,0,0,0,1,"#CCCCCC",1,"#F2F2F2"],40,0);
stm_aix("p1i2","p1i1",[0,"Manual de Usuario","","",-1,-1,0,"indra/folios/manual.pdf","_blank"],40,0);
stm_ep();
stm_ai("p0i1",[6,2,"#ffffff","",-1,-1,0]);
stm_aix("p0i2","p0i0",[0,"DOP"],148,24);
stm_bpx("p2","p1",[]);
stm_aix("p2i0","p1i1",[0,"Digitalización","","",-1,-1,0,"indra/digitalizacion/indice_digita.php"],40,0);
stm_ep();
stm_aix("p0i3","p0i1",[]);
stm_aix("p0i4","p0i0",[0,"Cambiar Contraseña","","",-1,-1,0,"indra/usuarios/modificar_pass.php","derecho","","","","",0,0,0,"","",0,0],148,24);
stm_aix("p0i5","p0i1",[]);
stm_aix("p0i6","p0i4",[0,"Inicio","","",-1,-1,0,"registro.php"],148,24);
stm_aix("p0i7","p0i1",[]);
stm_aix("p0i8","p0i0",[0,"Salir","","",-1,-1,0,"exit.php","_parent","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#000000"],148,24);
stm_ep();
stm_sc(1,["transparent","transparent","","",3,3,0,0,"#FFFFF7","#000000","up_disabled.gif","up_enabled.gif",7,9,0,"down_disabled.gif","down_enabled.gif",7,9,0,0,200]);
stm_em();//-->
</script>

<? }?>

<?php  if (($_SESSION["nivelw"]==49)){
// Conciliacion de expedientes?>
<script type="text/javascript">
<!--
stm_bm(["menu61b2",900,"","blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand","",1,25],this);
stm_bp("p0",[0,4,0,0,0,0,0,0,100,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,"progid:DXImageTransform.Microsoft.RandomBars(orientation=horizontal,enabled=0,Duration=0.60)",21,50,2,2,"#e2e2e2","#e2e2e2","",3,0,0,"#000000"]);
stm_ai("p0i0",[0,"Asistencia Citas","","",-1,-1,0,"","_self","","","","",0,0,0,"","",-1,-1,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#FFFFF7","#000000","#000000","#000000","bold 8pt Verdana","italic bold 8pt Verdana",0,0,"","","","",0,0,0],148,24);
stm_bp("p1",[1,4,0,0,7,0,10,10,90,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.48)",5,62,1,2,"#e2e2e2","#e2e2e2","",0,1,1,"#CCCCCC #B2B2B2 #B2B2B2"]);
stm_aix("p1i0","p0i0",[0,"Asistencia\r\nde Usuarios","","",-1,-1,0,"","_self","","","","",10,7,0,"060420arrow3.gif","060420arrow3.gif",10,5,0,0,1,"#CCCCCC",1,"#F2F2F2",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_bp("p2",[1,2,3,0,3,3,4,10,79,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=forward,enabled=0,Duration=0.50)",6,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0,motion=reverse,enabled=0,Duration=0.50)",7,60,1,3,"#e2e2e2","#eeeeee","",3,1,1,"#B2B2B2"]);
stm_aix("p1i0","p0i0",[0,"Asistencia","","",-1,-1,0,"indra/asistencia/delegaciones/policia.php","derecho","","","","",10,7,0,"","",0,0,0,0,1,"#e5e5e5",1,"#e5e5e5",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_aix("p1i1","p0i1",[0,"Informes","","",-1,-1,0,"indra/asistencia/delegaciones/informes.php","derecho","","","","",10,7,0,"","",0,0,0,0,1,"#e5e5e5",1,"#e5e5e5",1,"","",0,0,0,0,"#FFFFCC","#CCCC00","#000000","#000000","8pt Verdana","bold 8pt Verdana"],40,0);
stm_ep();
stm_ep();
stm_ai("p0i1",[6,2,"#ffffff","",-1,-1,0]);
stm_aix("p0i2","p0i0",[0,"Usuarios"],148,24);
stm_bpx("p7","p1",[]);
stm_aix("p7i0","p1i0",[0,"Configuración\r\nde Usuarios","","",-1,-1,0,"","_self","","","","",10,7,0,"060420arrow3.gif","060420arrow3.gif",10,5,0,0,1,"#e5e5e5",1,"#e5e5e5"],40,0);
stm_bpx("p8","p2",[1,2,3,0,3,3,4,0]);
stm_aix("p8i0","p3i0",[0,"Cambiar Contraseña","","",-1,-1,0,"indra/usuarios/modificar_pass.php"]);
stm_ep();
stm_ep();
stm_aix("p0i3","p0i1",[]);
stm_aix("p0i4","p0i0",[0,"Inicio","","",-1,-1,0,"registro.php","derecho","","","","",0,0,0,"","",0,0],148,24);
stm_aix("p0i5","p0i1",[]);
stm_aix("p0i6","p0i0",[0,"Salir","","",-1,-1,0,"exit.php","_parent","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7",1,"#FFFFF7",1,"bg_02[1].gif","bg_02[1].gif",3,3,0,0,"#000000"],148,24);
stm_ep();
stm_sc(1,["transparent","transparent","","",3,3,0,0,"#FFFFF7","#000000","up_disabled.gif","up_enabled.gif",7,9,0,"down_disabled.gif","down_enabled.gif",7,9,0,0,200]);
stm_em();
//-->
</script>
<? } ?>



<?php

	}
		$result->close();
        	}
				while ($mysqli->next_result());
					}
						else {
							printf("<br />First Error: %s\n", $mysqli->error);
								}
									$mysqli->close();
?>
<? 
 if (($_SESSION["nivelw"]==42)||($_SESSION["nivelw"]==9)||($_SESSION["nivelw"]==44)||($_SESSION["nivelw"]==45)) {
$consulta2=mysql_query("select id_restriccion,restriccion,activado from restricciones where id_restriccion='3';");
$filas2=mysql_num_rows($consulta2);
while ($row= mysql_fetch_array($consulta2)){
if($row[2]==1){?>
<h3><STRONG>**DEL DÍA 15 AL 20 DEL PRESENTE MES, EL DIRECTOR O SUBDIRECTOR DE LA OFICINA DE PASAPORTES DEBEARA FIRMAR EL OFICIO DE CERTIFICACIÓN DE PLANTILLA DEL PERSONAL ADSCRITO A LA OFICINA DURANTE EL MES PASADO.</STRONG></h3>
<? }}}?>
</div>
</td>
</tr>
</table>
</div>
</body>
</html>
