<?php
require('d:/AppServ/www/stm/indra/fpdf/fpdf.php');

class PDF extends FPDF
{
//Cabecera de página
function Header()
{
    //Logo
    //$this->Image('C:/AppServ/www/stm/imagenes/encabeza_oficio.png',5,8,200);
}
function Footer()
{
    //Posición: a 3 cm del final
    $this->SetY(-30);
    $this->SetFont('Arial','B',8);
	$this->Cell(50,2,'_________________________________________________________________________________________________________________________',0,1,'L');
	$this->SetFont('Arial','B',10);
    $this->Cell(50,5,'                                                                                                                                                         Secretaría de Relaciones Exteriores',0,1,'C');
	$this->SetFont('Arial','',9);
	$this->Cell(50,2,'',0,1,'L');
	$this->Cell(50,2,'',0,1,'L');
	$this->Cell(50,5,'                                                                                                  Plaza Juárez 20, piso 12  Col. Centro, Del. Cuauhtémoc México, DF 06010',0,1,'L');
	$this->Cell(50,2,'                                                                                                  Tel.  (55) 3686 5100   www.sre.gob.mx',0,1,'L');
}
}

function mes_espa($mes) {
If ($mes == "January") { $mes = "enero";
} Elseif ($mes == "February") { $mes = "febrero";
} Elseif ($mes == "March") { $mes = "marzo";
} Elseif ($mes == "April") { $mes = "abril";
} Elseif ($mes == "May") { $mes = "mayo";
} Elseif ($mes == "June") { $mes = "junio";
} Elseif ($mes == "July") { $mes = "julio";
} Elseif ($mes == "August") { $mes = "agosto";
} Elseif ($mes == "September") { $mes = "septiembre";
} Elseif ($mes == "October") { $mes = "octubre";
} Elseif ($mes == "November") { $mes = "noviembre";
} Elseif ($mes == "December") { $mes = "diciembre";
}
Return $mes; }

function Dia_Espa($dia) {
If ($dia == "Sunday") { $dia = "Domingo";
} Elseif ($dia == "Monday") { $dia = "Lunes";
} Elseif ($dia == "Tuesday") { $dia = "Martes";
} Elseif ($dia == "Wednesday") { $dia = "Miércoles";
} Elseif ($dia == "Thursday") { $dia = "Jueves";
} Elseif ($dia == "Friday") { $dia = "Viernes";
} Elseif ($dia == "Saturday") { $dia = "Sábado";
}
Return $dia; }

$fecha = getdate();
$dia_let = $fecha['weekday'];
$dia_let = Dia_espa($dia_let);
$dia_num = $fecha['mday'];
$mes = $fecha['month'];
$mes = mes_espa($mes);
$anio = $fecha['year'];
$anioant = $anio;


include('../../../conexionindra.php');
$mysqli = Conectarse();
$link = Conectarse2(); 

$pdf=new FPDF('L','mm','Legal');

/*inicia encabezado y formato de oficio*/
/*
$pdf->SetFont('Arial','B',10);
$pdf->Image('C:/AppServ/www/stm/imagenes/encabeza_oficio.png',10,10,260,70);
$pdf->Cell(50,15,'',0,1,'L');
$pdf->SetFont('Arial','B',9);
$pdf->Cell(300,4,'DIRECCIÓN GENERAL DE DELEGACIONES',0,1,'C');
$pdf->SetFont('Arial','B',9);
$pdf->Cell(311.5,2,'DIRECCIÓN GENERAL ADJUNTA DE PLANEACIÓN',0,1,'C');
$pdf->SetFont('Arial','B',8);
/*$pdf->Cell(308.5,4,'DIRECCIÓN DE OPERACIÓN DE PASAPORTES Y',0,1,'C');
$pdf->SetFont('Arial','B',9);
$pdf->Cell(285.5,2,'SUPERVISIÓN A DELEGACIONES',0,1,'C');
$pdf->SetFont('Arial','B',7);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(313,4,'"2015, Año del Generalísimo José María Morelos y Pavón".',0,1,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(50,15,'',0,1,'L');
$pdf->Cell(50,5,'Asunto: Certificación de Plantillas del Sistema Nacional de Delegaciones',0,1,'L');
$pdf->SetFont('Arial','B',11);
$pdf->Cell(50,5,'',0,1,'L');
//$pdf->Cell(50,5,'',0,1,'L');
//$pdf->Cell(50,5,'',0,1,'L');
//$pdf->Cell(50,4,'Delegación ' . $nom_delegacion . ', ' . $dia_num . ' de ' . $mes . ' de ' . $anio . '.',0,1,'L');
//$pdf->Cell(50,4,'Delegación ' . $nom_delegacion . ', México D.F. a ' . '15' . ' de ' . 'Diciembre' . ' de ' . 2014 . '.',0,1,'L');
$pdf->Cell(50,5,'',0,1,'L');
$pdf->Cell(50,4,'Dirección General de Delegaciones',0,1,'L');
$pdf->Cell(50,3,'Dirección General Adjunta de Planeación',0,1,'L');
$pdf->Cell(50,5,'P R E S E N T E',0,1,'L');
$pdf->Cell(50,5,'',0,1,'L');
$pdf->SetFont('Arial','',11);
$pdf->SetFillColor(255,255,255);
*/


/*termina encabezado y formato de oficio*/









$pdf->SetAutoPageBreak(true,40);
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(50,0,'',0,1,'L');
$pdf->Image('d:/AppServ/www/stm/imagenes/encabeza_oficio.png',8,3,190,70);
$pdf->Cell(50,5,'',0,1,'L');
$pdf->Cell(50,3,'',0,1,'L');
$pdf->Cell(50,3,'',0,1,'L');
$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Arial','B',8);

$pdf->Cell(50,1,'',0,1,'L');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(631,2,'OFICIALIA MAYOR',0,1,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(590,7,'DIRECCIÓN GENERAL DE DELEGACIONES',0,1,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(578,2,'DIRECCIÓN GENERAL ADJUNTA DE PLANEACIÓN',0,1,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(313,15,'"2015, Año del Generalísimo José María Morelos y Pavón".',0,1,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(50,0,'',0,1,'L');



$pdf->Ln();

if($delegacion=='A'){
$pdf->SetFont('Arial','B',8);
$pdf->SetFillColor(223,223,223);
$pdf->Cell(331,4,'PERSONAL SRE TODAS DELEGACIONES',1,1,'C',1);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(5,4,'No',1,0,'C',1);
$pdf->Cell(60,4,'Nombre',1,0,'C',1);
$pdf->Cell(40,4,'Cargo',1,0,'C',1);
$pdf->Cell(35,4,'Plaza',1,0,'C',1);
$pdf->Cell(10,4,'Nivel',1,0,'C',1);
$pdf->Cell(15,4,'Sueldo Neto',1,0,'C',1);
$pdf->Cell(12,4,'Estructura',1,0,'C',1);
$pdf->Cell(12,4,'Eventual',1,0,'C',1);
$pdf->Cell(12,4,'Honorarios',1,0,'C',1);
$pdf->Cell(20,4,'Rango SEM',1,0,'C',1);
$pdf->Cell(20,4,'F. ingreso SRE',1,0,'C',1);
$pdf->Cell(20,4,'F. ingreso Deleg',1,0,'C',1);
$pdf->Cell(30,4,'Área',1,0,'C',1);
$pdf->Cell(40,4,'Act. (Pasaportes)',1,0,'C',1);

$pdf->Ln();
$pdf->SetFont('Arial','',6);
$consulta=mysql_query("select a.id_personal, l.nombre,  m.oems, concat(a.nombre_trabajador,' ',a.apellido_paterno,' ', a.apellido_materno),
a.estructura, a.eventual, a.honorarios, n.oems, a.fecha_ingreso_sre, a.num_oficio, a.fecha_oficio, f.descripcion_nivel,
i.descripcion_plaza, d.descripcion_cargo, f.suedo_neto,  b.descripcion_area, c.descripcion_pasaportes, j.descripcion_rango,
a.fecha_ingreso_delegacion, o.tipo
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
where a.tipo_personal='PERSONAL SRE'  order by a.id_plaza asc ;");
$filas=mysql_num_rows($consulta);
$i=0;
while ($i<$filas) {
while ($row= mysql_fetch_array($consulta)){
$i++;
$id=$row[0];
$pdf->Cell(5,4,$i,1,0,'C');
$pdf->Cell(60,4,$row[3],1,0,'L');
$pdf->Cell(40,4,$row[13],1,0,'L');
$pdf->Cell(35,4,$row[12],1,0,'L');
$pdf->Cell(10,4,$row[11],1,0,'C');
$pdf->Cell(15,4,$row[14],1,0,'C');
if($row[4]=='on'){
$pdf->Cell(12,4,'X',1,0,'C');
}
else{
$pdf->Cell(12,4,'',1,0,'C');
}
if($row[5]=='on'){
$pdf->Cell(12,4,'X',1,0,'C');
}
else{
$pdf->Cell(12,4,'',1,0,'C');
}
if($row[6]=='on'){
$pdf->Cell(12,4,'X',1,0,'C');
}
else{
$pdf->Cell(12,4,'',1,0,'C');
}
$pdf->Cell(20,4,$row[17],1,0,'C');
$pdf->Cell(20,4,$row[8],1,0,'C');
$pdf->Cell(20,4,$row[18],1,0,'C');
$pdf->Cell(30,4,$row[15],1,0,'L');
$pdf->Cell(40,4,$row[16],1,0,'L');

$pdf->Ln();
	}
}
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','B',8);
$pdf->SetFillColor(223,223,223);
$pdf->Cell(330,4,'PERSONAL COMISIONADO TODAS LAS DELEGACIONES ',1,1,'C',1);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(5,4,'No',1,0,'C',1);
$pdf->Cell(60,4,'Nombre',1,0,'C',1);
$pdf->Cell(30,4,'Cargo',1,0,'C',1);
$pdf->Cell(25,4,'Ubicación Física',1,0,'C',1);
$pdf->Cell(40,4,'Comisionado por',1,0,'C',1);
$pdf->Cell(30,4,'Tipo de OFE',1,0,'C',1);
$pdf->Cell(20,4,'Número de Oficio',1,0,'C',1);
$pdf->Cell(25,4,'F. Oficio',1,0,'C',1);
$pdf->Cell(25,4,'F. ingreso',1,0,'C',1);
$pdf->Cell(30,4,'Área',1,0,'C',1);
$pdf->Cell(40,4,'Act. (Pasaportes)',1,0,'C',1);
$pdf->Ln();
$pdf->SetFont('Arial','',6);
$consulta=mysql_query("select a.id_personal, l.nombre,  m.oems, concat(a.nombre_trabajador,' ',a.apellido_paterno,' ', a.apellido_materno),
a.estructura, a.eventual, a.honorarios, n.oems, a.fecha_ingreso_sre, a.num_oficio, a.fecha_oficio, f.descripcion_nivel,
i.descripcion_plaza, d.descripcion_cargo, f.suedo_neto,  b.descripcion_area, c.descripcion_pasaportes, j.descripcion_rango,
a.fecha_ingreso_delegacion, o.tipo, a.lugar_fisico, z.descripcion
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
left join tipo_oems z on n.id_tipo=z.id_tipo_oems 
where a.tipo_personal='PERSONAL COMISIONADO' and a.activo='1'  order by m.oems asc ;");
$filas=mysql_num_rows($consulta);
$i=0;
while ($i<$filas) {
while ($row= mysql_fetch_array($consulta)){
$i++;
$id=$row[0];
$pdf->Cell(5,4,$i,1,0,'C');
$pdf->Cell(60,4,$row[3],1,0,'L');
$pdf->Cell(30,4,$row[13],1,0,'L');
if($row["lugar_fisico"]==0){
$pdf->Cell(25,4,'DELEGACIÖN',1,0,'L');
}else {
$pdf->Cell(25,4,$row[2],1,0,'L');
}
$pdf->Cell(40,4,$row[7],1,0,'L');
$pdf->Cell(30,4,$row["descripcion"],1,0,'L');
$pdf->Cell(20,4,$row[9],1,0,'L');
$pdf->Cell(25,4,$row[10],1,0,'C');
$pdf->Cell(25,4,$row[18],1,0,'C');
$pdf->Cell(30,4,$row[15],1,0,'C');
$pdf->Cell(40,4,$row[16],1,0,'C');
$pdf->Ln();
	}
}

$consulta1=mysql_query("SELECT count(delegacion) from tbl_personal where tipo_personal='PERSONAL SRE' and delegacion_oe='DELEGACION' and lugar_fisico='0' ;");
$filas1=mysql_num_rows($consulta1);
while ($row= mysql_fetch_array($consulta1)){
$conteo_sre=$row[0];
 }
 $consulta2=mysql_query("SELECT count(observaciones) from tbl_personal where tipo_personal='PERSONAL SRE' and observaciones='10' and delegacion_oe='OFE' and lugar_fisico!='0';");
$filas2=mysql_num_rows($consulta2);
while ($row= mysql_fetch_array($consulta2)){
$conteo_comisionado_sre=$row[0];
 } 
$consulta4=mysql_query("SELECT count(delegacion) from tbl_personal where tipo_personal='PERSONAL COMISIONADO';");
$filas4=mysql_num_rows($consulta4);
while ($row= mysql_fetch_array($consulta4)){
$conteo_comisionado_delegacion=$row[0];
 } 
 
$consulta4=mysql_query("SELECT count(a.delegacion) from tbl_personal a left join oems b on id_oems=comisionado_por where tipo_personal='PERSONAL COMISIONADO' and comisionado_por !=0  and b.id_tipo='2';");
$filas4=mysql_num_rows($consulta4);
while ($row= mysql_fetch_array($consulta4)){
$conteo_comisionado_estatal=$row[0];
 } 
 $consulta4=mysql_query("SELECT count(a.delegacion) from tbl_personal a left join oems b on id_oems=comisionado_por where tipo_personal='PERSONAL COMISIONADO'  and comisionado_por!=0 and b.id_tipo='1';");
$filas4=mysql_num_rows($consulta4);
while ($row= mysql_fetch_array($consulta4)){
$conteo_comisionado_municipal=$row[0];
 }
$consulta4=mysql_query("SELECT count(a.delegacion) from tbl_personal a left join oems b on id_oems=comisionado_por where tipo_personal='PERSONAL COMISIONADO' and delegacion_oe='DELEGACION'  and comisionado_por!=0 and b.id_tipo='1';");
$filas4=mysql_num_rows($consulta4);
while ($row= mysql_fetch_array($consulta4)){
$conteo_comisionado_en_delegacion=$row[0];
 }
 $consulta4=mysql_query("SELECT count(a.delegacion) from tbl_personal a left join oems b on id_oems=comisionado_por where tipo_personal='PERSONAL COMISIONADO'  and comisionado_por=193  ;");
$filas4=mysql_num_rows($consulta4);
while ($row= mysql_fetch_array($consulta4)){
$conteo_comisionado_vangent=$row[0];
 } 
 
 $pdf->Cell(100,4,'RESUMEN ',1,1,'C',1);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(70,4,'TOTAL PERSONAL SRE',1,0,'L',1);
$pdf->Cell(30,4,$conteo_sre,1,1,'C',1);
$pdf->Cell(70,4,'TOTAL DE PERSONAL SRE COMISIONADO',1,0,'L',1);
$pdf->Cell(30,4,$conteo_comisionado_sre,1,1,'C',1);
$pdf->Cell(70,4,'TOTAL DE PERSONAL COMISIONADO',1,0,'L',1);
$pdf->Cell(30,4,$conteo_comisionado_delegacion,1,1,'C',1);
$pdf->Cell(70,4,'TOTAL DE PERSONAL COMISIONADO POR OFE´s ESTATALES',1,0,'L',1);
$pdf->Cell(30,4,$conteo_comisionado_estatal,1,1,'C',1);
$pdf->Cell(70,4,'TOTAL DE PERSONAL COMISIONADO POR OFE´s MUNICIPALES',1,0,'L',1);
$pdf->Cell(30,4,$conteo_comisionado_municipal,1,1,'C',1); 
$pdf->Cell(70,4,'TOTAL DE PERSONAL COMISIONADO EN DELEGACION',1,0,'L',1);
$pdf->Cell(30,4,$conteo_comisionado_en_delegacion,1,1,'C',1); 
$pdf->Cell(70,4,'TOTAL DE PERSONAL COMISIONADO POR VANGENT',1,0,'L',1);
$pdf->Cell(30,4,$conteo_comisionado_vangent,1,1,'C',1);  
}
else if($delegacion=='B'){
$pdf->SetFont('Arial','B',8);
$pdf->SetFillColor(223,223,223);
$pdf->Cell(331,4,'PERSONAL DE CANCILLERIA ',1,1,'C',1);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(5,4,'No',1,0,'C',1);
$pdf->Cell(80,4,'Nombre',1,0,'C',1);
$pdf->Cell(60,4,'Dirección',1,0,'C',1);
$pdf->Cell(45,4,'Plaza',1,0,'C',1);
$pdf->Cell(30,4,'Nivel',1,0,'C',1);
$pdf->Cell(15,4,'Sueldo Neto',1,0,'C',1);
$pdf->Cell(12,4,'Estructura',1,0,'C',1);
$pdf->Cell(12,4,'Eventual',1,0,'C',1);
$pdf->Cell(12,4,'Honorarios',1,0,'C',1);
$pdf->Cell(20,4,'Rango SEM',1,0,'C',1);
$pdf->Cell(40,4,'F. ingreso SRE',1,0,'C',1);

$pdf->Ln();
$pdf->SetFont('Arial','',6);
$consulta=mysql_query("select a.id_personal, l.nombre,  m.oems, concat(a.nombre_trabajador,' ',a.apellido_paterno,' ', a.apellido_materno),
a.estructura, a.eventual, a.honorarios, n.oems, a.fecha_ingreso_sre, a.num_oficio, a.fecha_oficio, f.descripcion_nivel,
i.descripcion_plaza, d.descripcion_cargo, f.suedo_neto,  b.descripcion_area, c.descripcion_pasaportes, j.descripcion_rango,
a.fecha_ingreso_delegacion, o.tipo, funciones
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
where a.tipo_personal = 'PERSONAL SRE_DGD'  order by l.nombre,  a.id_plaza asc  ;");
$filas=mysql_num_rows($consulta);
$i=0;
while ($i<$filas) {
while ($row= mysql_fetch_array($consulta)){
$i++;
$id=$row[0];

$pdf->Cell(5,4,$i,1,0,'C');
$pdf->Cell(80,4,$row[3],1,0,'L');
$pdf->Cell(60,4,$row[1],1,0,'L');
$pdf->Cell(45,4,$row[12],1,0,'L');
$pdf->Cell(30,4,$row[11],1,0,'C');
$pdf->Cell(15,4,$row[14],1,0,'C');
if($row[4]=='on'){
$pdf->Cell(12,4,'X',1,0,'C');
}
else{
$pdf->Cell(12,4,'',1,0,'C');
}
if($row[5]=='on'){
$pdf->Cell(12,4,'X',1,0,'C');
}
else{
$pdf->Cell(12,4,'',1,0,'C');
}
if($row[6]=='on'){
$pdf->Cell(12,4,'X',1,0,'C');
}
else{
$pdf->Cell(12,4,'',1,0,'C');
}
$pdf->Cell(20,4,$row[17],1,0,'C');
$pdf->Cell(40,4,$row[8],1,0,'C');
$pdf->Ln();
	}
}
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();    
}
else{

if(($delegacion=='10')||($delegacion=='48')||($delegacion=='49')||($delegacion=='214')||($delegacion=='215')||($delegacion=='213')){
$consulta=mysql_query(" select nombre_mayus from delegaciones where id_delegacion='$delegacion';");
while ($row= mysql_fetch_array($consulta)){
$nom=$row[0];
}
$pdf->SetFont('Arial','B',8);
$pdf->SetFillColor(223,223,223);
$pdf->Cell(331,4,'PERSONAL SRE DE LA DIRECCION '.$nom,1,1,'C',1);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(5,4,'No',1,0,'C',1);
$pdf->Cell(80,4,'Nombre',1,0,'C',1);
$pdf->Cell(60,4,'Cargo',1,0,'C',1);
$pdf->Cell(45,4,'Plaza',1,0,'C',1);
$pdf->Cell(30,4,'Nivel',1,0,'C',1);
$pdf->Cell(15,4,'Sueldo Neto',1,0,'C',1);
$pdf->Cell(12,4,'Estructura',1,0,'C',1);
$pdf->Cell(12,4,'Eventual',1,0,'C',1);
$pdf->Cell(12,4,'Honorarios',1,0,'C',1);
$pdf->Cell(20,4,'Rango SEM',1,0,'C',1);
$pdf->Cell(40,4,'F. ingreso SRE',1,0,'C',1);

$pdf->Ln();
$pdf->SetFont('Arial','',6);
$consulta=mysql_query("select a.id_personal, l.nombre,  m.oems, concat(a.nombre_trabajador,' ',a.apellido_paterno,' ', a.apellido_materno),
a.estructura, a.eventual, a.honorarios, n.oems, a.fecha_ingreso_sre, a.num_oficio, a.fecha_oficio, f.descripcion_nivel,
i.descripcion_plaza, d.descripcion_cargo, f.suedo_neto,  b.descripcion_area, c.descripcion_pasaportes, j.descripcion_rango,
a.fecha_ingreso_delegacion, o.tipo, funciones
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
where a.delegacion='$delegacion'   order by a.id_plaza asc ;");
$filas=mysql_num_rows($consulta);
$i=0;
while ($i<$filas) {
while ($row= mysql_fetch_array($consulta)){
$i++;
$id=$row[0];

$pdf->Cell(5,4,$i,1,0,'C');
$pdf->Cell(80,4,$row[3],1,0,'L');
$pdf->Cell(60,4,$row[13],1,0,'L');
$pdf->Cell(45,4,$row[12],1,0,'L');
$pdf->Cell(30,4,$row[11],1,0,'C');
$pdf->Cell(15,4,$row[14],1,0,'C');
if($row[4]=='on'){
$pdf->Cell(12,4,'X',1,0,'C');
}
else{
$pdf->Cell(12,4,'',1,0,'C');
}
if($row[5]=='on'){
$pdf->Cell(12,4,'X',1,0,'C');
}
else{
$pdf->Cell(12,4,'',1,0,'C');
}
if($row[6]=='on'){
$pdf->Cell(12,4,'X',1,0,'C');
}
else{
$pdf->Cell(12,4,'',1,0,'C');
}
$pdf->Cell(20,4,$row[17],1,0,'C');
$pdf->Cell(40,4,$row[8],1,0,'C');
$pdf->Ln();
	}
}
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
}
else{
$consulta=mysql_query(" select nombre_mayus from delegaciones where id_delegacion='$delegacion';");
while ($row= mysql_fetch_array($consulta)){
$nom=$row[0];
}
$pdf->SetFont('Arial','B',8);
$pdf->SetFillColor(223,223,223);
$pdf->Cell(331,4,'PERSONAL SRE DELEGACION '.$nom,1,1,'C',1);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(5,4,'No',1,0,'C',1);
$pdf->Cell(60,4,'Nombre',1,0,'C',1);
$pdf->Cell(40,4,'Cargo',1,0,'C',1);
$pdf->Cell(35,4,'Plaza',1,0,'C',1);
$pdf->Cell(10,4,'Nivel',1,0,'C',1);
$pdf->Cell(15,4,'Sueldo Neto',1,0,'C',1);
$pdf->Cell(12,4,'Estructura',1,0,'C',1);
$pdf->Cell(12,4,'Eventual',1,0,'C',1);
$pdf->Cell(12,4,'Honorarios',1,0,'C',1);
$pdf->Cell(20,4,'Rango SEM',1,0,'C',1);
$pdf->Cell(20,4,'F. ingreso SRE',1,0,'C',1);
$pdf->Cell(20,4,'F. ingreso Deleg',1,0,'C',1);
$pdf->Cell(30,4,'Área',1,0,'C',1);
$pdf->Cell(40,4,'Act. (Pasaportes)',1,0,'C',1);

$pdf->Ln();
$pdf->SetFont('Arial','',6);
$consulta=mysql_query("select a.id_personal, l.nombre,  m.oems, concat(a.nombre_trabajador,' ',a.apellido_paterno,' ', a.apellido_materno),
a.estructura, a.eventual, a.honorarios, n.oems, a.fecha_ingreso_sre, a.num_oficio, a.fecha_oficio, f.descripcion_nivel,
i.descripcion_plaza, d.descripcion_cargo, f.suedo_neto,  b.descripcion_area, c.descripcion_pasaportes, j.descripcion_rango,
a.fecha_ingreso_delegacion, o.tipo
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
where a.delegacion='$delegacion' and a.tipo_personal='PERSONAL SRE'  order by a.id_plaza asc ;");
$filas=mysql_num_rows($consulta);
$i=0;
while ($i<$filas) {
while ($row= mysql_fetch_array($consulta)){
$i++;
$id=$row[0];
$pdf->Cell(5,4,$i,1,0,'C');
$pdf->Cell(60,4,$row[3],1,0,'L');
$pdf->Cell(40,4,$row[13],1,0,'L');
$pdf->Cell(35,4,$row[12],1,0,'L');
$pdf->Cell(10,4,$row[11],1,0,'C');
$pdf->Cell(15,4,$row[14],1,0,'C');
if($row[4]=='on'){
$pdf->Cell(12,4,'X',1,0,'C');
}
else{
$pdf->Cell(12,4,'',1,0,'C');
}
if($row[5]=='on'){
$pdf->Cell(12,4,'X',1,0,'C');
}
else{
$pdf->Cell(12,4,'',1,0,'C');
}
if($row[6]=='on'){
$pdf->Cell(12,4,'X',1,0,'C');
}
else{
$pdf->Cell(12,4,'',1,0,'C');
}
$pdf->Cell(20,4,$row[17],1,0,'C');
$pdf->Cell(20,4,$row[8],1,0,'C');
$pdf->Cell(20,4,$row[18],1,0,'C');
$pdf->Cell(30,4,$row[15],1,0,'L');
$pdf->Cell(40,4,$row[16],1,0,'L');

$pdf->Ln();
	}
}
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','B',8);
$pdf->SetFillColor(223,223,223);
$pdf->Cell(330,4,'PERSONAL COMISIONADO DELEGACION '.$nom,1,1,'C',1);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(5,4,'No',1,0,'C',1);
$pdf->Cell(60,4,'Nombre',1,0,'C',1);
$pdf->Cell(30,4,'Cargo',1,0,'C',1);
$pdf->Cell(25,4,'Ubicación Física',1,0,'C',1);
$pdf->Cell(40,4,'Comisionado por',1,0,'C',1);
$pdf->Cell(30,4,'Tipo de OFE',1,0,'C',1);
$pdf->Cell(20,4,'Número de Oficio',1,0,'C',1);
$pdf->Cell(25,4,'F. Oficio',1,0,'C',1);
$pdf->Cell(25,4,'F. ingreso',1,0,'C',1);
$pdf->Cell(30,4,'Área',1,0,'C',1);
$pdf->Cell(40,4,'Act. (Pasaportes)',1,0,'C',1);
$pdf->Ln();
$pdf->SetFont('Arial','',6);
$consulta=mysql_query("select a.id_personal, l.nombre,  m.oems, concat(a.nombre_trabajador,' ',a.apellido_paterno,' ', a.apellido_materno),
a.estructura, a.eventual, a.honorarios, n.oems, a.fecha_ingreso_sre, a.num_oficio, a.fecha_oficio, f.descripcion_nivel,
i.descripcion_plaza, d.descripcion_cargo, f.suedo_neto,  b.descripcion_area, c.descripcion_pasaportes, j.descripcion_rango,
a.fecha_ingreso_delegacion, o.tipo, a.lugar_fisico, z.descripcion
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
left join tipo_oems z on n.id_tipo=z.id_tipo_oems 
where a.delegacion='$delegacion' and a.tipo_personal='PERSONAL COMISIONADO' and a.activo='1'  order by m.oems asc ;");
$filas=mysql_num_rows($consulta);
$i=0;
while ($i<$filas) {
while ($row= mysql_fetch_array($consulta)){
$i++;
$id=$row[0];
$pdf->Cell(5,4,$i,1,0,'C');
$pdf->Cell(60,4,$row[3],1,0,'L');
$pdf->Cell(30,4,$row[13],1,0,'L');
if($row["lugar_fisico"]==0){
$pdf->Cell(25,4,'DELEGACIÖN',1,0,'L');
}else {
$pdf->Cell(25,4,$row[2],1,0,'L');
}
$pdf->Cell(40,4,$row[7],1,0,'L');
$pdf->Cell(30,4,$row["descripcion"],1,0,'L');
$pdf->Cell(20,4,$row[9],1,0,'L');
$pdf->Cell(25,4,$row[10],1,0,'C');
$pdf->Cell(25,4,$row[18],1,0,'C');
$pdf->Cell(30,4,$row[15],1,0,'C');
$pdf->Cell(40,4,$row[16],1,0,'C');
$pdf->Ln();
	}
}

$consulta1=mysql_query("SELECT count(delegacion) from tbl_personal where tipo_personal='PERSONAL SRE' and delegacion='$delegacion' and delegacion_oe='DELEGACION' and lugar_fisico='0' ;");
$filas1=mysql_num_rows($consulta1);
while ($row= mysql_fetch_array($consulta1)){
$conteo_sre=$row[0];
 }
 $consulta2=mysql_query("SELECT count(observaciones) from tbl_personal where tipo_personal='PERSONAL SRE' and observaciones='10' and delegacion_oe='OFE' and lugar_fisico!='0' and delegacion='$delegacion';");
$filas2=mysql_num_rows($consulta2);
while ($row= mysql_fetch_array($consulta2)){
$conteo_comisionado_sre=$row[0];
 } 
$consulta4=mysql_query("SELECT count(delegacion) from tbl_personal where tipo_personal='PERSONAL COMISIONADO'  and delegacion='$delegacion';");
$filas4=mysql_num_rows($consulta4);
while ($row= mysql_fetch_array($consulta4)){
$conteo_comisionado_delegacion=$row[0];
 } 
 
$consulta4=mysql_query("SELECT count(a.delegacion) from tbl_personal a left join oems b on id_oems=comisionado_por where tipo_personal='PERSONAL COMISIONADO' and comisionado_por !=0  and a.delegacion='$delegacion' and b.id_tipo='2';");
$filas4=mysql_num_rows($consulta4);
while ($row= mysql_fetch_array($consulta4)){
$conteo_comisionado_estatal=$row[0];
 } 
 $consulta4=mysql_query("SELECT count(a.delegacion) from tbl_personal a left join oems b on id_oems=comisionado_por where tipo_personal='PERSONAL COMISIONADO'  and comisionado_por!=0 and a.delegacion='$delegacion' and b.id_tipo='1';");
$filas4=mysql_num_rows($consulta4);
while ($row= mysql_fetch_array($consulta4)){
$conteo_comisionado_municipal=$row[0];
 }
$consulta4=mysql_query("SELECT count(a.delegacion) from tbl_personal a left join oems b on id_oems=comisionado_por where tipo_personal='PERSONAL COMISIONADO' and delegacion_oe='DELEGACION'  and comisionado_por!=0 and a.delegacion='$delegacion' and b.id_tipo in(1,2);");
$filas4=mysql_num_rows($consulta4);
while ($row= mysql_fetch_array($consulta4)){
$conteo_comisionado_delegacion=$row[0];
}
 $consulta4=mysql_query("SELECT count(a.delegacion) from tbl_personal a left join oems b on id_oems=comisionado_por where tipo_personal='PERSONAL COMISIONADO'  and comisionado_por=193 and a.delegacion='$delegacion' ;");
$filas4=mysql_num_rows($consulta4);
while ($row= mysql_fetch_array($consulta4)){
$conteo_comisionado_vangent=$row[0];
 } 
 
 $pdf->Cell(100,4,'RESUMEN ',1,1,'C',1);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(70,4,'TOTAL PERSONAL SRE',1,0,'L',1);
$pdf->Cell(30,4,$conteo_sre,1,1,'C',1);
$pdf->Cell(70,4,'TOTAL DE PERSONAL SRE COMISIONADO',1,0,'L',1);
$pdf->Cell(30,4,$conteo_comisionado_sre,1,1,'C',1);
$pdf->Cell(70,4,'TOTAL DE PERSONAL COMISIONADO',1,0,'L',1);
$pdf->Cell(30,4,$conteo_comisionado_delegacion,1,1,'C',1);
$pdf->Cell(70,4,'TOTAL DE PERSONAL COMISIONADO POR OFE´s ESTATALES',1,0,'L',1);
$pdf->Cell(30,4,$conteo_comisionado_estatal,1,1,'C',1);
$pdf->Cell(70,4,'TOTAL DE PERSONAL COMISIONADO POR OFE´s MUNICIPALES',1,0,'L',1);
$pdf->Cell(30,4,$conteo_comisionado_municipal,1,1,'C',1); 
$pdf->Cell(70,4,'TOTAL DE PERSONAL COMISIONADO EN LAS DELEGACIONES',1,0,'L',1);
$pdf->Cell(30,4,$conteo_comisionado_delegacion,1,1,'C',1); 
//$pdf->Cell(70,4,'TOTAL DE PERSONAL COMISIONADO POR VANGENT',1,0,'L',1);
//$pdf->Cell(30,4,$conteo_comisionado_vangent,1,1,'C',1); 
}}
$pdf->Output();

?>