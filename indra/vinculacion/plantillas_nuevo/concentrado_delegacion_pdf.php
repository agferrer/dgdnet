<?php
require('C:/AppServ/www/stm/indra/fpdf/fpdf.php');

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
include('../../../conexionindra.php');
$mysqli = Conectarse();
$link = Conectarse2(); 

$pdf=new FPDF('P','mm','Legal');
$pdf->SetAutoPageBreak(true,40);
$pdf->AddPage();
$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Arial','B',8);
$pdf->SetFillColor(223,223,223);
if ($delegacion!='TODAS'){
$consulta=mysql_query("select nombre_mayus from delegaciones where id_delegacion='$delegacion';");
$filas=mysql_num_rows($consulta);
while ($row= mysql_fetch_array($consulta)){
$deleg_nom=$row[0];
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

$consulta4=mysql_query("SELECT count(delegacion) from tbl_personal where tipo_personal='PERSONAL COMISIONADO' and delegacion_oe='DELEGACION' and lugar_fisico='0' and delegacion='$delegacion';");
$filas4=mysql_num_rows($consulta4);
while ($row= mysql_fetch_array($consulta4)){
$conteo_comisionado_delegacion=$row[0];
 } 
$consulta5=mysql_query("SELECT count(delegacion) from tbl_personal where tipo_personal='PERSONAL COMISIONADO' and delegacion_oe='OFE' and lugar_fisico!='0' and delegacion='$delegacion';");
$filas5=mysql_num_rows($consulta5);
while ($row= mysql_fetch_array($consulta5)){
$conteo_comisionado_ofe=$row[0];
 } 
$consulta7=mysql_query("SELECT count(delegacion) from tbl_personal where delegacion='$delegacion';");
$filas7=mysql_num_rows($consulta7);
while ($row= mysql_fetch_array($consulta7)){
$total_delegacion=$row[0];
 }

$pdf->Cell(200,4,'DELEGACIÓN: '.$deleg_nom,1,1,'C',1);
$pdf->SetFont('Arial','B',7);
$pdf->Cell(200,4,'Personal SRE en Delegación: '.$conteo_sre,1,1,'L',1);
$pdf->Cell(200,4,'Comisionado SRE en OFE: '.$conteo_comisionado_sre,1,1,'L',1);

$consulta3=mysql_query("select oems, count(id_personal) from tbl_personal a inner join oems on lugar_fisico=id_oems where tipo_personal='PERSONAL SRE'
and a.delegacion='$delegacion' and lugar_fisico!='0' group by lugar_fisico;;");
$filas3=mysql_num_rows($consulta3);
while ($row= mysql_fetch_array($consulta3)){
$desglose_sre_oes=$row[0];
$conteo_sre_oes=$row[1];
$pdf->SetFont('Arial','B',6);
$pdf->Cell(200,4,$desglose_sre_oes. ': '.$conteo_sre_oes,1,1,'L');
}
$pdf->SetFont('Arial','B',7);
$pdf->Cell(200,4,'Comisionado en Delegación: '.$conteo_comisionado_delegacion,1,1,'L',1);
$pdf->Cell(200,4,'Comisionado en OFE: '.$conteo_comisionado_ofe,1,1,'L',1);

$consulta6=mysql_query("select oems, count(id_personal) from tbl_personal a inner join oems on lugar_fisico=id_oems where tipo_personal='PERSONAL COMISIONADO'
and a.delegacion='$delegacion' and lugar_fisico!='0' group by lugar_fisico;;");
$filas6=mysql_num_rows($consulta6);
while ($row= mysql_fetch_array($consulta6)){
$desglose_comisionado_oes=$row[0];
$conteo_comisionado_oes=$row[1];
$pdf->SetFont('Arial','B',6);
$pdf->Cell(200,4,$desglose_comisionado_oes. ': '.$conteo_comisionado_oes,1,1,'L');
}
$total_sre=$conteo_sre+$conteo_comisionado_sre;
$total_comisionado= $conteo_comisionado_delegacion+$conteo_comisionado_ofe;
$pdf->SetFont('Arial','B',7);
$pdf->Cell(200,4,'Total de personal SRE: '.$total_sre,1,1,'L',1);
$pdf->Cell(200,4,'Total de personal Comisionado: '.$total_comisionado,1,1,'L',1);
$pdf->Cell(200,4,'Total General: '.$total_delegacion,1,1,'L',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'DESGLOSE SRE',1,1,'C',1);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'CARGOS',1,0,'C',1);
$pdf->Ln();
$consulta8=mysql_query("select descripcion_cargo, count(a.id_cargo) from tbl_personal a inner join tbl_cargo b on a.id_cargo=b.id_cargo
where tipo_personal='PERSONAL SRE' and delegacion='$delegacion'  group by a.id_cargo order by b.id_cargo;");
$filas8=mysql_num_rows($consulta8);
while ($row= mysql_fetch_array($consulta8)){
$suma8+=$row[1];

$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,$row[0],1,0,'L');
$pdf->Cell(50,4,$row[1],1,0,'C');
$pdf->Ln();
}
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(50,4,'Total',1,0,'L',1);
$pdf->Cell(50,4,$suma8,1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'PLAZA',1,0,'C',1);
$pdf->Ln();
$consulta9=mysql_query("select descripcion_plaza, count(a.id_plaza) from tbl_personal a inner join tbl_plaza b on a.id_plaza=b.id_plaza
where tipo_personal='PERSONAL SRE' and delegacion='$delegacion'  group by a.id_plaza order by b.id_plaza;");
$filas9=mysql_num_rows($consulta9);
while ($row= mysql_fetch_array($consulta9)){
$suma9+=$row[1];

$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,$row[0],1,0,'L');
$pdf->Cell(50,4,$row[1],1,0,'C');
$pdf->Ln();
}
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(50,4,'Total',1,0,'L',1);
$pdf->Cell(50,4,$suma9,1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'DESGLOSE NIVEL',1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'Mandos Medios',1,0,'C',1);
$pdf->Ln();
$consulta10=mysql_query("select descripcion_nivel, count(a.id_nivel),b.suedo_neto from tbl_personal a inner join tbl_nivel b on a.id_nivel=b.id_nivel
where tipo_personal='PERSONAL SRE' and delegacion='$delegacion' and b.id_nivel between '1' and '57'  group by a.id_nivel order by b.id_nivel");
$filas10=mysql_num_rows($consulta10);
while ($row= mysql_fetch_array($consulta10)){
$suma_mandos+=$row[2];
$multiplicacion_mandos=$row[1]*$row[2];
$total_mandos+=$multiplicacion_mandos;
$suma10+=$row[1];

$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(25,4,$row[0],1,0,'L');
$pdf->Cell(25,4,$row[1],1,0,'C');
$pdf->Cell(25,4,'$'.$row[2],1,0,'C');
$pdf->Cell(25,4,'$'.$multiplicacion_mandos,1,0,'C');
$pdf->Ln();
}
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(25,4,'Total',1,0,'L',1);
$pdf->Cell(25,4,$suma10,1,0,'C',1);
$pdf->Cell(25,4,'$'.$suma_mandos,1,0,'C',1);
$pdf->Cell(25,4,'$'.$total_mandos,1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'Operativos Zona II',1,0,'C',1);
$pdf->Ln();
$consulta11=mysql_query("select descripcion_nivel, count(a.id_nivel),suedo_neto from tbl_personal a inner join tbl_nivel b on a.id_nivel=b.id_nivel
where tipo_personal='PERSONAL SRE' and delegacion='$delegacion' and b.id_nivel between '58' and '68'  group by a.id_nivel order by b.id_nivel");
$filas11=mysql_num_rows($consulta11);
while ($row= mysql_fetch_array($consulta11)){
$suma_op2+=$row[2];
$multiplicacion_op2=$row[1]*$row[2];
$total_op2+=$multiplicacion_op2;
$suma11+=$row[1];

$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(25,4,$row[0],1,0,'L');
$pdf->Cell(25,4,$row[1],1,0,'C');
$pdf->Cell(25,4,'$'.$row[2],1,0,'C');
$pdf->Cell(25,4,'$'.$multiplicacion_op2,1,0,'C');
$pdf->Ln();
}
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(25,4,'Total',1,0,'L',1);
$pdf->Cell(25,4,$suma11,1,0,'C',1);
$pdf->Cell(25,4,'$'.$suma_op2,1,0,'C',1);
$pdf->Cell(25,4,'$'.$total_op2,1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'Operativos Zona III',1,0,'C',1);
$pdf->Ln();
$consulta12=mysql_query("select descripcion_nivel, count(a.id_nivel),suedo_neto from tbl_personal a inner join tbl_nivel b on a.id_nivel=b.id_nivel
where tipo_personal='PERSONAL SRE' and delegacion='$delegacion' and b.id_nivel between '69' and '79'  group by a.id_nivel order by b.id_nivel");
$filas12=mysql_num_rows($consulta12);
while ($row= mysql_fetch_array($consulta12)){
$suma_op3+=$row[2];
$multiplicacion_op3=$row[1]*$row[2];
$total_op3+=$multiplicacion_op3;
$suma12+=$row[1];

$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(25,4,$row[0],1,0,'L');
$pdf->Cell(25,4,$row[1],1,0,'C');
$pdf->Cell(25,4,'$'.$row[2],1,0,'C');
$pdf->Cell(25,4,'$'.$multiplicacion_op3,1,0,'C');
$pdf->Ln();
}
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(25,4,'Total',1,0,'L',1);
$pdf->Cell(25,4,$suma12,1,0,'C',1);
$pdf->Cell(25,4,'$'.$suma_op3,1,0,'C',1);
$pdf->Cell(25,4,'$'.$total_op3,1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'NIVEL',1,0,'C',1);
$pdf->Ln();
$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,'Mandos Medios',1,0,'L');
$pdf->Cell(50,4,$suma10,1,0,'C');
$pdf->Ln();
 $a=$suma11+$suma12;
 $b=$suma10+$suma11+$suma12;
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,'Operativos',1,0,'L');
$pdf->Cell(50,4,$a,1,0,'C');
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(50,4,'Total',1,0,'L',1);
$pdf->Cell(50,4,$b,1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'TIPO DE PLAZA',1,0,'C',1);
$pdf->Ln();
$consulta13=mysql_query("select count(estructura) from tbl_personal where tipo_personal='PERSONAL SRE' and delegacion='$delegacion' and estructura='on'");
while ($row= mysql_fetch_array($consulta13)){$estructura=$row[0];}
$consulta14=mysql_query("select count(eventual) from tbl_personal where tipo_personal='PERSONAL SRE' and delegacion='$delegacion' and eventual='on'");
while ($row= mysql_fetch_array($consulta14)){$eventual=$row[0];}
$consulta15=mysql_query("select count(honorarios) from tbl_personal where tipo_personal='PERSONAL SRE' and delegacion='$delegacion' and honorarios='on'");
while ($row= mysql_fetch_array($consulta15)){$honorarios=$row[0];}

$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,'Estructura',1,0,'L');
$pdf->Cell(50,4,$estructura,1,0,'C');
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,'Eventual',1,0,'L');
$pdf->Cell(50,4,$eventual,1,0,'C');
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,'Honorarios',1,0,'L');
$pdf->Cell(50,4,$honorarios,1,0,'C');
$pdf->Ln();
$c=$eventual+$eventual+$honorarios;
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(50,4,'Total',1,0,'L',1);
$pdf->Cell(50,4,$c,1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'SEM',1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'Diplomático-Consular',1,0,'C',1);
$pdf->Ln();
$consulta16=mysql_query("select descripcion_rango, count(a.id_rango) from tbl_personal a inner join tbl_rango b on a.id_rango=b.id_rango
where tipo_personal='PERSONAL SRE' and delegacion='$delegacion' and b.id_rango between '1' and '7'  group by a.id_rango order by b.id_rango;");
$filas16=mysql_num_rows($consulta16);
while ($row= mysql_fetch_array($consulta16)){
$suma16+=$row[1];

$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,$row[0],1,0,'L');
$pdf->Cell(50,4,$row[1],1,0,'C');
$pdf->Ln();
}
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(50,4,'Total',1,0,'L',1);
$pdf->Cell(50,4,$suma16,1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'Técnico Administrativo',1,0,'C',1);
$pdf->Ln();
$consulta17=mysql_query("select descripcion_rango, count(a.id_rango) from tbl_personal a inner join tbl_rango b on a.id_rango=b.id_rango
where tipo_personal='PERSONAL SRE' and delegacion='$delegacion' and b.id_rango between '8' and '14'  group by a.id_rango order by b.id_rango;");
$filas17=mysql_num_rows($consulta17);
while ($row= mysql_fetch_array($consulta17)){
$suma17+=$row[1];

$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,$row[0],1,0,'L');
$pdf->Cell(50,4,$row[1],1,0,'C');
$pdf->Ln();
}
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(50,4,'Total',1,0,'L',1);
$pdf->Cell(50,4,$suma17,1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'N° SEM',1,0,'C',1);
$pdf->Ln();
$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
 $resultado_sem= $suma16+$suma17;
 $d=($conteo_sre+$conteo_comisionado_sre)-$resultado_sem;
 $e=$conteo_sre+$conteo_comisionado_sre;
$pdf->Cell(50,4,'Total de personal del SEM',1,0,'L');
$pdf->Cell(50,4,$resultado_sem,1,0,'C');
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,'Total de personal que no es del SEM',1,0,'L');
$pdf->Cell(50,4,$d,1,0,'C');
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(50,4,'Total',1,0,'L',1);
$pdf->Cell(50,4,$e,1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'ZONA',1,0,'C',1);
$pdf->Ln();
$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
 $f=$suma12+$suma11;
$pdf->Cell(50,4,'II',1,0,'L');
$pdf->Cell(50,4,$suma11,1,0,'C');
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,'III',1,0,'L');
$pdf->Cell(50,4,$suma12,1,0,'C');
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(50,4,'Total',1,0,'L',1);
$pdf->Cell(50,4,$f,1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'AREA',1,0,'C',1);
$pdf->Ln();
$consulta18=mysql_query("select descripcion_area, count(a.id_area) from tbl_personal a inner join tbl_area b on a.id_area=b.id_area
where tipo_personal='PERSONAL SRE' and delegacion='$delegacion'  group by a.id_area order by b.id_area;");
$filas18=mysql_num_rows($consulta18);
while ($row= mysql_fetch_array($consulta18)){
$suma18+=$row[1];

$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,$row[0],1,0,'L');
$pdf->Cell(50,4,$row[1],1,0,'C');
$pdf->Ln();
}
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(50,4,'Total',1,0,'L',1);
$pdf->Cell(50,4,$suma18,1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'ACTIVIDADES PASAPORTES',1,0,'C',1);
$pdf->Ln();
$consulta19=mysql_query("select descripcion_pasaportes, count(a.id_area_pas) from tbl_personal a inner join tbl_area_pasaportes b on a.id_area_pas=b.id_area_pas
where tipo_personal='PERSONAL SRE' and delegacion='$delegacion' and b.id_area_pas between '1' and '8'  group by a.id_area_pas order by b.id_area_pas;");
$filas19=mysql_num_rows($consulta19);
while ($row= mysql_fetch_array($consulta19)){
$suma19+=$row[1];

$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,$row[0],1,0,'L');
$pdf->Cell(50,4,$row[1],1,0,'C');
$pdf->Ln();
}
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(50,4,'Total',1,0,'L',1);
$pdf->Cell(50,4,$suma19,1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'OTROS DENTRO DE PASAPORTES',1,0,'C',1);
$pdf->Ln();
$consulta20=mysql_query("select descripcion_pasaportes, count(a.id_area_pas) from tbl_personal a inner join tbl_area_pasaportes b on a.id_area_pas=b.id_area_pas
where tipo_personal='PERSONAL SRE' and delegacion='$delegacion' and b.id_area_pas between '9' and '16'  group by a.id_area_pas order by b.id_area_pas;");
$filas20=mysql_num_rows($consulta20);
while ($row= mysql_fetch_array($consulta20)){
$suma20+=$row[1];

$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,$row[0],1,0,'L');
$pdf->Cell(50,4,$row[1],1,0,'C');
$pdf->Ln();
}
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(50,4,'Total',1,0,'L',1);
$pdf->Cell(50,4,$suma20,1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'OBSERVACIONES',1,0,'C',1);
$pdf->Ln();
$consulta21=mysql_query("select tipo, count(a.observaciones) from tbl_personal a inner join tbl_tipo_asistencia b on a.observaciones=b.id_tipo
where tipo_personal='PERSONAL SRE' and delegacion='$delegacion' and b.categoria= '3' group by a.observaciones order by b.id_tipo;");
$filas21=mysql_num_rows($consulta21);
while ($row= mysql_fetch_array($consulta21)){
$suma21+=$row[1];

$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,$row[0],1,0,'L');
$pdf->Cell(50,4,$row[1],1,0,'C');
$pdf->Ln();
}
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(50,4,'Total',1,0,'L',1);
$pdf->Cell(50,4,$suma21,1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'DESGLOSE COMISIONADO',1,1,'C',1);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'CARGOS',1,0,'C',1);
$pdf->Ln();
$consulta22=mysql_query("select descripcion_cargo, count(a.id_cargo) from tbl_personal a inner join tbl_cargo b on a.id_cargo=b.id_cargo
where tipo_personal='PERSONAL COMISIONADO' and delegacion='$delegacion'  group by a.id_cargo order by b.id_cargo;");
$fila22=mysql_num_rows($consulta22);
while ($row= mysql_fetch_array($consulta22)){
$suma22+=$row[1];

$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,$row[0],1,0,'L');
$pdf->Cell(50,4,$row[1],1,0,'C');
$pdf->Ln();
}
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(50,4,'Total',1,0,'L',1);
$pdf->Cell(50,4,$suma22,1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'NIVEL',1,0,'C',1);
$pdf->Ln();
$consulta23=mysql_query("select descripcion_cargo, count(a.id_cargo) from tbl_personal a inner join tbl_cargo b on a.id_cargo=b.id_cargo
where tipo_personal='PERSONAL COMISIONADO' and delegacion='$delegacion' and b.id_cargo= '13'  group by a.id_cargo order by b.id_cargo;");
$filas23=mysql_num_rows($consulta23);
while ($row= mysql_fetch_array($consulta23)){
$jefe_oe=$row[1];
}
$auxiliares=$suma22-$jefe_oe;
$h=$jefe_oe+$auxiliares;
$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,'Jefes de OFE',1,0,'L');
$pdf->Cell(50,4,$jefe_oe,1,0,'C');
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,'Auxiliares',1,0,'L');
$pdf->Cell(50,4,$auxiliares,1,0,'C');
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(50,4,'Total',1,0,'L',1);
$pdf->Cell(50,4,$h,1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'AREA',1,0,'C',1);
$pdf->Ln();
$consulta24=mysql_query("select descripcion_area, count(a.id_area) from tbl_personal a inner join tbl_area b on a.id_area=b.id_area
where tipo_personal='PERSONAL COMISIONADO' and delegacion='$delegacion'  group by a.id_area order by b.id_area;");
$filas24=mysql_num_rows($consulta24);
while ($row= mysql_fetch_array($consulta24)){
$suma24+=$row[1];

$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,$row[0],1,0,'L');
$pdf->Cell(50,4,$row[1],1,0,'C');
$pdf->Ln();
}
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(50,4,'Total',1,0,'L',1);
$pdf->Cell(50,4,$suma24,1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'ACTIVIDADES PASAPORTES',1,0,'C',1);
$pdf->Ln();
$consulta25=mysql_query("select descripcion_pasaportes, count(a.id_area_pas) from tbl_personal a inner join tbl_area_pasaportes b on a.id_area_pas=b.id_area_pas
where tipo_personal='PERSONAL COMISIONADO' and delegacion='$delegacion' and b.id_area_pas between '1' and '8'  group by a.id_area_pas order by b.id_area_pas;");
$filas25=mysql_num_rows($consulta25);
while ($row= mysql_fetch_array($consulta25)){
$suma25+=$row[1];

$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,$row[0],1,0,'L');
$pdf->Cell(50,4,$row[1],1,0,'C');
$pdf->Ln();
}
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(50,4,'Total',1,0,'L',1);
$pdf->Cell(50,4,$suma25,1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'OTROS DENTRO DE PASAPORTES',1,0,'C',1);
$pdf->Ln();
$consulta26=mysql_query("select descripcion_pasaportes, count(a.id_area_pas) from tbl_personal a inner join tbl_area_pasaportes b on a.id_area_pas=b.id_area_pas
where tipo_personal='PERSONAL COMISIONADO' and delegacion='$delegacion' and b.id_area_pas between '9' and '16'  group by a.id_area_pas order by b.id_area_pas;");
$filas26=mysql_num_rows($consulta26);
while ($row= mysql_fetch_array($consulta26)){
$suma26+=$row[1];

$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,$row[0],1,0,'L');
$pdf->Cell(50,4,$row[1],1,0,'C');
$pdf->Ln();
}
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(50,4,'Total',1,0,'L',1);
$pdf->Cell(50,4,$suma26,1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'OBSERVACIONES',1,0,'C',1);
$pdf->Ln();
$consulta27=mysql_query("select tipo, count(a.observaciones) from tbl_personal a inner join tbl_tipo_asistencia b on a.observaciones=b.id_tipo
where tipo_personal='PERSONAL COMISIONADO' and delegacion='$delegacion' and b.categoria= '3' group by a.observaciones order by b.id_tipo;");
$filas27=mysql_num_rows($consulta27);
while ($row= mysql_fetch_array($consulta27)){
$suma27+=$row[1];

$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,$row[0],1,0,'L');
$pdf->Cell(50,4,$row[1],1,0,'C');
$pdf->Ln();
}
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(50,4,'Total',1,0,'L',1);
$pdf->Cell(50,4,$suma27,1,0,'C',1);
$pdf->Ln();

}
else
{
$consulta=mysql_query("select nombre_mayus from delegaciones");
$filas=mysql_num_rows($consulta);
while ($row= mysql_fetch_array($consulta)){
$deleg_nom=$row[0];
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

$consulta4=mysql_query("SELECT count(delegacion) from tbl_personal where tipo_personal='PERSONAL COMISIONADO' and delegacion_oe='DELEGACION' and lugar_fisico='0' ;");
$filas4=mysql_num_rows($consulta4);
while ($row= mysql_fetch_array($consulta4)){
$conteo_comisionado_delegacion=$row[0];
 } 
$consulta5=mysql_query("SELECT count(delegacion) from tbl_personal where tipo_personal='PERSONAL COMISIONADO' and delegacion_oe='OFE' and lugar_fisico!='0';");
$filas5=mysql_num_rows($consulta5);
while ($row= mysql_fetch_array($consulta5)){
$conteo_comisionado_ofe=$row[0];
 } 
$consulta7=mysql_query("SELECT count(delegacion) from tbl_personal ;");
$filas7=mysql_num_rows($consulta7);
while ($row= mysql_fetch_array($consulta7)){
$total_delegacion=$row[0];
 }

$pdf->Cell(200,4,'DELEGACIÓN: '.$delegacion,1,1,'C',1);
$pdf->SetFont('Arial','B',7);
$pdf->Cell(200,4,'Personal SRE en Delegación: '.$conteo_sre,1,1,'L',1);
$pdf->Cell(200,4,'Comisionado SRE en OFE: '.$conteo_comisionado_sre,1,1,'L',1);

$consulta3=mysql_query("select oems, count(id_personal) from tbl_personal a inner join oems on lugar_fisico=id_oems where tipo_personal='PERSONAL SRE'
and lugar_fisico!='0' group by lugar_fisico;;");
$filas3=mysql_num_rows($consulta3);
while ($row= mysql_fetch_array($consulta3)){
$desglose_sre_oes=$row[0];
$conteo_sre_oes=$row[1];
$pdf->SetFont('Arial','B',6);
$pdf->Cell(200,4,$desglose_sre_oes. ': '.$conteo_sre_oes,1,1,'L');
}
$pdf->SetFont('Arial','B',7);
$pdf->Cell(200,4,'Comisionado en Delegación: '.$conteo_comisionado_delegacion,1,1,'L',1);
$pdf->Cell(200,4,'Comisionado en OFE: '.$conteo_comisionado_ofe,1,1,'L',1);

$consulta6=mysql_query("select oems, count(id_personal) from tbl_personal a inner join oems on lugar_fisico=id_oems where tipo_personal='PERSONAL COMISIONADO'
and lugar_fisico!='0' group by lugar_fisico;;");
$filas6=mysql_num_rows($consulta6);
while ($row= mysql_fetch_array($consulta6)){
$desglose_comisionado_oes=$row[0];
$conteo_comisionado_oes=$row[1];
$pdf->SetFont('Arial','B',6);
$pdf->Cell(200,4,$desglose_comisionado_oes. ': '.$conteo_comisionado_oes,1,1,'L');
}
$total_sre=$conteo_sre+$conteo_comisionado_sre;
$total_comisionado= $conteo_comisionado_delegacion+$conteo_comisionado_ofe;
$pdf->SetFont('Arial','B',7);
$pdf->Cell(200,4,'Total de personal SRE: '.$total_sre,1,1,'L',1);
$pdf->Cell(200,4,'Total de personal Comisionado: '.$total_comisionado,1,1,'L',1);
$pdf->Cell(200,4,'Total General: '.$total_delegacion,1,1,'L',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'DESGLOSE SRE',1,1,'C',1);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'CARGOS',1,0,'C',1);
$pdf->Ln();
$consulta8=mysql_query("select descripcion_cargo, count(a.id_cargo) from tbl_personal a inner join tbl_cargo b on a.id_cargo=b.id_cargo
where tipo_personal='PERSONAL SRE' group by a.id_cargo order by b.id_cargo;");
$filas8=mysql_num_rows($consulta8);
while ($row= mysql_fetch_array($consulta8)){
$suma8+=$row[1];

$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,$row[0],1,0,'L');
$pdf->Cell(50,4,$row[1],1,0,'C');
$pdf->Ln();
}
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(50,4,'Total',1,0,'L',1);
$pdf->Cell(50,4,$suma8,1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'PLAZA',1,0,'C',1);
$pdf->Ln();
$consulta9=mysql_query("select descripcion_plaza, count(a.id_plaza) from tbl_personal a inner join tbl_plaza b on a.id_plaza=b.id_plaza
where tipo_personal='PERSONAL SRE'  group by a.id_plaza order by b.id_plaza;");
$filas9=mysql_num_rows($consulta9);
while ($row= mysql_fetch_array($consulta9)){
$suma9+=$row[1];

$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,$row[0],1,0,'L');
$pdf->Cell(50,4,$row[1],1,0,'C');
$pdf->Ln();
}
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(50,4,'Total',1,0,'L',1);
$pdf->Cell(50,4,$suma9,1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'DESGLOSE NIVEL',1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'Mandos Medios',1,0,'C',1);
$pdf->Ln();
$consulta10=mysql_query("select descripcion_nivel, count(a.id_nivel),b.suedo_neto from tbl_personal a inner join tbl_nivel b on a.id_nivel=b.id_nivel
where tipo_personal='PERSONAL SRE' and b.id_nivel between '1' and '57'  group by a.id_nivel order by b.id_nivel");
$filas10=mysql_num_rows($consulta10);
while ($row= mysql_fetch_array($consulta10)){
$suma_mandos+=$row[2];
$multiplicacion_mandos=$row[1]*$row[2];
$total_mandos+=$multiplicacion_mandos;
$suma10+=$row[1];

$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(25,4,$row[0],1,0,'L');
$pdf->Cell(25,4,$row[1],1,0,'C');
$pdf->Cell(25,4,'$'.$row[2],1,0,'C');
$pdf->Cell(25,4,'$'.$multiplicacion_mandos,1,0,'C');
$pdf->Ln();
}
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(25,4,'Total',1,0,'L',1);
$pdf->Cell(25,4,$suma10,1,0,'C',1);
$pdf->Cell(25,4,'$'.$suma_mandos,1,0,'C',1);
$pdf->Cell(25,4,'$'.$total_mandos,1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'Operativos Zona II',1,0,'C',1);
$pdf->Ln();
$consulta11=mysql_query("select descripcion_nivel, count(a.id_nivel),suedo_neto from tbl_personal a inner join tbl_nivel b on a.id_nivel=b.id_nivel
where tipo_personal='PERSONAL SRE'  and b.id_nivel between '58' and '68'  group by a.id_nivel order by b.id_nivel");
$filas11=mysql_num_rows($consulta11);
while ($row= mysql_fetch_array($consulta11)){
$suma_op2+=$row[2];
$multiplicacion_op2=$row[1]*$row[2];
$total_op2+=$multiplicacion_op2;
$suma11+=$row[1];

$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(25,4,$row[0],1,0,'L');
$pdf->Cell(25,4,$row[1],1,0,'C');
$pdf->Cell(25,4,'$'.$row[2],1,0,'C');
$pdf->Cell(25,4,'$'.$multiplicacion_op2,1,0,'C');
$pdf->Ln();
}
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(25,4,'Total',1,0,'L',1);
$pdf->Cell(25,4,$suma11,1,0,'C',1);
$pdf->Cell(25,4,'$'.$suma_op2,1,0,'C',1);
$pdf->Cell(25,4,'$'.$total_op2,1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'Operativos Zona III',1,0,'C',1);
$pdf->Ln();
$consulta12=mysql_query("select descripcion_nivel, count(a.id_nivel),suedo_neto from tbl_personal a inner join tbl_nivel b on a.id_nivel=b.id_nivel
where tipo_personal='PERSONAL SRE' and b.id_nivel between '69' and '79'  group by a.id_nivel order by b.id_nivel");
$filas12=mysql_num_rows($consulta12);
while ($row= mysql_fetch_array($consulta12)){
$suma_op3+=$row[2];
$multiplicacion_op3=$row[1]*$row[2];
$total_op3+=$multiplicacion_op3;
$suma12+=$row[1];

$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(25,4,$row[0],1,0,'L');
$pdf->Cell(25,4,$row[1],1,0,'C');
$pdf->Cell(25,4,'$'.$row[2],1,0,'C');
$pdf->Cell(25,4,'$'.$multiplicacion_op3,1,0,'C');
$pdf->Ln();
}
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(25,4,'Total',1,0,'L',1);
$pdf->Cell(25,4,$suma12,1,0,'C',1);
$pdf->Cell(25,4,'$'.$suma_op3,1,0,'C',1);
$pdf->Cell(25,4,'$'.$total_op3,1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'NIVEL',1,0,'C',1);
$pdf->Ln();
$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,'Mandos Medios',1,0,'L');
$pdf->Cell(50,4,$suma10,1,0,'C');
$pdf->Ln();
 $a=$suma11+$suma12;
 $b=$suma10+$suma11+$suma12;
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,'Operativos',1,0,'L');
$pdf->Cell(50,4,$a,1,0,'C');
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(50,4,'Total',1,0,'L',1);
$pdf->Cell(50,4,$b,1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'TIPO DE PLAZA',1,0,'C',1);
$pdf->Ln();
$consulta13=mysql_query("select count(estructura) from tbl_personal where tipo_personal='PERSONAL SRE'  and estructura='on'");
while ($row= mysql_fetch_array($consulta13)){$estructura=$row[0];}
$consulta14=mysql_query("select count(eventual) from tbl_personal where tipo_personal='PERSONAL SRE' and eventual='on'");
while ($row= mysql_fetch_array($consulta14)){$eventual=$row[0];}
$consulta15=mysql_query("select count(honorarios) from tbl_personal where tipo_personal='PERSONAL SRE'  and honorarios='on'");
while ($row= mysql_fetch_array($consulta15)){$honorarios=$row[0];}

$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,'Estructura',1,0,'L');
$pdf->Cell(50,4,$estructura,1,0,'C');
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,'Eventual',1,0,'L');
$pdf->Cell(50,4,$eventual,1,0,'C');
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,'Honorarios',1,0,'L');
$pdf->Cell(50,4,$honorarios,1,0,'C');
$pdf->Ln();
$c=$eventual+$eventual+$honorarios;
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(50,4,'Total',1,0,'L',1);
$pdf->Cell(50,4,$c,1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'SEM',1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'Diplomático-Consular',1,0,'C',1);
$pdf->Ln();
$consulta16=mysql_query("select descripcion_rango, count(a.id_rango) from tbl_personal a inner join tbl_rango b on a.id_rango=b.id_rango
where tipo_personal='PERSONAL SRE' and b.id_rango between '1' and '7'  group by a.id_rango order by b.id_rango;");
$filas16=mysql_num_rows($consulta16);
while ($row= mysql_fetch_array($consulta16)){
$suma16+=$row[1];

$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,$row[0],1,0,'L');
$pdf->Cell(50,4,$row[1],1,0,'C');
$pdf->Ln();
}
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(50,4,'Total',1,0,'L',1);
$pdf->Cell(50,4,$suma16,1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'Técnico Administrativo',1,0,'C',1);
$pdf->Ln();
$consulta17=mysql_query("select descripcion_rango, count(a.id_rango) from tbl_personal a inner join tbl_rango b on a.id_rango=b.id_rango
where tipo_personal='PERSONAL SRE' and b.id_rango between '8' and '14'  group by a.id_rango order by b.id_rango;");
$filas17=mysql_num_rows($consulta17);
while ($row= mysql_fetch_array($consulta17)){
$suma17+=$row[1];

$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,$row[0],1,0,'L');
$pdf->Cell(50,4,$row[1],1,0,'C');
$pdf->Ln();
}
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(50,4,'Total',1,0,'L',1);
$pdf->Cell(50,4,$suma17,1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'N° SEM',1,0,'C',1);
$pdf->Ln();
$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
 $resultado_sem= $suma16+$suma17;
 $d=($conteo_sre+$conteo_comisionado_sre)-$resultado_sem;
 $e=$conteo_sre+$conteo_comisionado_sre;
$pdf->Cell(50,4,'Total de personal del SEM',1,0,'L');
$pdf->Cell(50,4,$resultado_sem,1,0,'C');
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,'Total de personal que no es del SEM',1,0,'L');
$pdf->Cell(50,4,$d,1,0,'C');
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(50,4,'Total',1,0,'L',1);
$pdf->Cell(50,4,$e,1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'ZONA',1,0,'C',1);
$pdf->Ln();
$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
 $f=$suma12+$suma11;
$pdf->Cell(50,4,'II',1,0,'L');
$pdf->Cell(50,4,$suma11,1,0,'C');
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,'III',1,0,'L');
$pdf->Cell(50,4,$suma12,1,0,'C');
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(50,4,'Total',1,0,'L',1);
$pdf->Cell(50,4,$f,1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'AREA',1,0,'C',1);
$pdf->Ln();
$consulta18=mysql_query("select descripcion_area, count(a.id_area) from tbl_personal a inner join tbl_area b on a.id_area=b.id_area
where tipo_personal='PERSONAL SRE'  group by a.id_area order by b.id_area;");
$filas18=mysql_num_rows($consulta18);
while ($row= mysql_fetch_array($consulta18)){
$suma18+=$row[1];

$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,$row[0],1,0,'L');
$pdf->Cell(50,4,$row[1],1,0,'C');
$pdf->Ln();
}
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(50,4,'Total',1,0,'L',1);
$pdf->Cell(50,4,$suma18,1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'ACTIVIDADES PASAPORTES',1,0,'C',1);
$pdf->Ln();
$consulta19=mysql_query("select descripcion_pasaportes, count(a.id_area_pas) from tbl_personal a inner join tbl_area_pasaportes b on a.id_area_pas=b.id_area_pas
where tipo_personal='PERSONAL SRE' and b.id_area_pas between '1' and '8'  group by a.id_area_pas order by b.id_area_pas;");
$filas19=mysql_num_rows($consulta19);
while ($row= mysql_fetch_array($consulta19)){
$suma19+=$row[1];

$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,$row[0],1,0,'L');
$pdf->Cell(50,4,$row[1],1,0,'C');
$pdf->Ln();
}
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(50,4,'Total',1,0,'L',1);
$pdf->Cell(50,4,$suma19,1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'OTROS DENTRO DE PASAPORTES',1,0,'C',1);
$pdf->Ln();
$consulta20=mysql_query("select descripcion_pasaportes, count(a.id_area_pas) from tbl_personal a inner join tbl_area_pasaportes b on a.id_area_pas=b.id_area_pas
where tipo_personal='PERSONAL SRE' and b.id_area_pas between '9' and '16'  group by a.id_area_pas order by b.id_area_pas;");
$filas20=mysql_num_rows($consulta20);
while ($row= mysql_fetch_array($consulta20)){
$suma20+=$row[1];

$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,$row[0],1,0,'L');
$pdf->Cell(50,4,$row[1],1,0,'C');
$pdf->Ln();
}
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(50,4,'Total',1,0,'L',1);
$pdf->Cell(50,4,$suma20,1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'OBSERVACIONES',1,0,'C',1);
$pdf->Ln();
$consulta21=mysql_query("select tipo, count(a.observaciones) from tbl_personal a inner join tbl_tipo_asistencia b on a.observaciones=b.id_tipo
where tipo_personal='PERSONAL SRE' and b.categoria= '3' group by a.observaciones order by b.id_tipo;");
$filas21=mysql_num_rows($consulta21);
while ($row= mysql_fetch_array($consulta21)){
$suma21+=$row[1];

$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,$row[0],1,0,'L');
$pdf->Cell(50,4,$row[1],1,0,'C');
$pdf->Ln();
}
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(50,4,'Total',1,0,'L',1);
$pdf->Cell(50,4,$suma21,1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'DESGLOSE COMISIONADO',1,1,'C',1);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'CARGOS',1,0,'C',1);
$pdf->Ln();
$consulta22=mysql_query("select descripcion_cargo, count(a.id_cargo) from tbl_personal a inner join tbl_cargo b on a.id_cargo=b.id_cargo
where tipo_personal='PERSONAL COMISIONADO'   group by a.id_cargo order by b.id_cargo;");
$fila22=mysql_num_rows($consulta22);
while ($row= mysql_fetch_array($consulta22)){
$suma22+=$row[1];

$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,$row[0],1,0,'L');
$pdf->Cell(50,4,$row[1],1,0,'C');
$pdf->Ln();
}
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(50,4,'Total',1,0,'L',1);
$pdf->Cell(50,4,$suma22,1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'NIVEL',1,0,'C',1);
$pdf->Ln();
$consulta23=mysql_query("select descripcion_cargo, count(a.id_cargo) from tbl_personal a inner join tbl_cargo b on a.id_cargo=b.id_cargo
where tipo_personal='PERSONAL COMISIONADO' and b.id_cargo= '13'  group by a.id_cargo order by b.id_cargo;");
$filas23=mysql_num_rows($consulta23);
while ($row= mysql_fetch_array($consulta23)){
$jefe_oe=$row[1];
}
$auxiliares=$suma22-$jefe_oe;
$h=$jefe_oe+$auxiliares;
$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,'Jefes de OFE',1,0,'L');
$pdf->Cell(50,4,$jefe_oe,1,0,'C');
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,'Auxiliares',1,0,'L');
$pdf->Cell(50,4,$auxiliares,1,0,'C');
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(50,4,'Total',1,0,'L',1);
$pdf->Cell(50,4,$h,1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'AREA',1,0,'C',1);
$pdf->Ln();
$consulta24=mysql_query("select descripcion_area, count(a.id_area) from tbl_personal a inner join tbl_area b on a.id_area=b.id_area
where tipo_personal='PERSONAL COMISIONADO' group by a.id_area order by b.id_area;");
$filas24=mysql_num_rows($consulta24);
while ($row= mysql_fetch_array($consulta24)){
$suma24+=$row[1];

$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,$row[0],1,0,'L');
$pdf->Cell(50,4,$row[1],1,0,'C');
$pdf->Ln();
}
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(50,4,'Total',1,0,'L',1);
$pdf->Cell(50,4,$suma24,1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'ACTIVIDADES PASAPORTES',1,0,'C',1);
$pdf->Ln();
$consulta25=mysql_query("select descripcion_pasaportes, count(a.id_area_pas) from tbl_personal a inner join tbl_area_pasaportes b on a.id_area_pas=b.id_area_pas
where tipo_personal='PERSONAL COMISIONADO' and b.id_area_pas between '1' and '8'  group by a.id_area_pas order by b.id_area_pas;");
$filas25=mysql_num_rows($consulta25);
while ($row= mysql_fetch_array($consulta25)){
$suma25+=$row[1];

$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,$row[0],1,0,'L');
$pdf->Cell(50,4,$row[1],1,0,'C');
$pdf->Ln();
}
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(50,4,'Total',1,0,'L',1);
$pdf->Cell(50,4,$suma25,1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'OTROS DENTRO DE PASAPORTES',1,0,'C',1);
$pdf->Ln();
$consulta26=mysql_query("select descripcion_pasaportes, count(a.id_area_pas) from tbl_personal a inner join tbl_area_pasaportes b on a.id_area_pas=b.id_area_pas
where tipo_personal='PERSONAL COMISIONADO' and b.id_area_pas between '9' and '16'  group by a.id_area_pas order by b.id_area_pas;");
$filas26=mysql_num_rows($consulta26);
while ($row= mysql_fetch_array($consulta26)){
$suma26+=$row[1];

$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,$row[0],1,0,'L');
$pdf->Cell(50,4,$row[1],1,0,'C');
$pdf->Ln();
}
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(50,4,'Total',1,0,'L',1);
$pdf->Cell(50,4,$suma26,1,0,'C',1);
$pdf->Ln();
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(100,4,'OBSERVACIONES',1,0,'C',1);
$pdf->Ln();
$consulta27=mysql_query("select tipo, count(a.observaciones) from tbl_personal a inner join tbl_tipo_asistencia b on a.observaciones=b.id_tipo
where tipo_personal='PERSONAL COMISIONADO' and b.categoria= '3' group by a.observaciones order by b.id_tipo;");
$filas27=mysql_num_rows($consulta27);
while ($row= mysql_fetch_array($consulta27)){
$suma27+=$row[1];

$pdf->SetFont('Arial','',6);
$pdf->Cell(50,5,'',0,0,'C');
$pdf->Cell(50,4,$row[0],1,0,'L');
$pdf->Cell(50,4,$row[1],1,0,'C');
$pdf->Ln();
}
$pdf->Cell(50,5,'',0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(50,4,'Total',1,0,'L',1);
$pdf->Cell(50,4,$suma27,1,0,'C',1);
$pdf->Ln();

}

$pdf->Output();
?>