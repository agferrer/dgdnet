<?php
require('C:/AppServ/www/stm/indra/fpdf/fpdf.php');
include('../../../conexionindra.php');
$mysqli = Conectarse();
$link = Conectarse2();
$hoy= date('m', strtotime('-1 month')) ; // resta 1 mes
     if ($hoy=='01'){
     $hoy="ENERO";
	 }
	 else if($hoy=='02'){
	 $hoy="FEBRERO";
	 }
	 else if($hoy=='03'){
	 $hoy="MARZO";
	 }
	 else if($hoy=='04'){
	 $hoy="ABRIL";
	 }
	 else if($hoy=='05'){
	 $hoy="MAYO";
	 }
	 else if($hoy=='06'){
	 $hoy="JUNIO";
	 }
	 else if($hoy=='07'){
	 $hoy="JULIO";
	 }
	 else if($hoy=='08'){
	 $hoy="AGOSTO";
	 }
	 else if($hoy=='09'){
	 $hoy="SEPTIEMBRE";
	 }
	 else if($hoy=='10'){
	 $hoy="OCTUBRE";
	 }
	 else if($hoy=='11'){
	 $hoy="NOVIEMBRE";
	 }
	 else if($hoy=='12'){
	 $hoy="DICIEMBRE";
	 }

class PDF extends FPDF
{
//Cabecera de página
function Header()
{
    //Logo
    //$this->Image('C:/AppServ/www/stm/imagenes/encabeza_oficio.jpg',5,8,200);
}
function Footer()
{
    //Posición: a 3 cm del final
    $this->SetY(-20);
    $this->SetFont('Arial','B',8);
	$this->Cell(50,2,'_________________________________________________________________________________________________________________________',0,1,'L');
	$this->SetFont('Arial','',8);
   // $this->Cell(50,5,'CCP.- Lic. Carlos Altamirano Mota.- Subdirector de Operación.- DGD.- Para su Conocimiento',0,1,'L');
	//$this->Cell(50,2,'CCP.- Ing. Jorge Luis Pedroza Ochoa.- Director de Operación de Pasaportes.- DGD.- Para su Conocimiento',0,1,'L');
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

$pdf=new PDF('P','mm','Letter');
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->Image('C:/AppServ/www/stm/imagenes/encabeza_oficio.png',10,10,180,70);
$pdf->Cell(50,15,'',0,1,'L');
$pdf->SetFont('Arial','B',9);
$pdf->Cell(300,4,'DIRECCIÓN GENERAL DE DELEGACIONES',0,1,'C');
$pdf->SetFont('Arial','B',9);
$pdf->Cell(311.5,2,'DIRECCIÓN GENERAL ADJUNTA DE PLANEACIÓN',0,1,'C');
$pdf->SetFont('Arial','B',8);
/*$pdf->Cell(308.5,4,'DIRECCIÓN DE OPERACIÓN DE PASAPORTES Y',0,1,'C');
$pdf->SetFont('Arial','B',9);
$pdf->Cell(285.5,2,'SUPERVISIÓN A DELEGACIONES',0,1,'C');
$pdf->SetFont('Arial','B',7);*/
$pdf->SetFont('Arial','B',8);
/*$pdf->Cell(313,4,'"2015, Año del Generalísimo José María Morelos y Pavón".',0,1,'C');*/
$pdf->SetFont('Arial','',8);
$pdf->Cell(50,15,'',0,1,'L');
$pdf->Cell(50,5,'Asunto: Certificación de Plantillas del Sistema Nacional de Delegaciones',0,1,'L');
$pdf->SetFont('Arial','B',11);
$pdf->Cell(50,5,'',0,1,'L');
//$pdf->Cell(50,5,'',0,1,'L');
//$pdf->Cell(50,5,'',0,1,'L');
$pdf->Cell(50,4,'Delegación ' . $nom_delegacion . ', ' . $dia_num . ' de ' . $mes . ' de ' . $anio . '.',0,1,'L');
//$pdf->Cell(50,4,'Delegación ' . $nom_delegacion . ', México D.F. a ' . '15' . ' de ' . 'Diciembre' . ' de ' . 2014 . '.',0,1,'L');
$pdf->Cell(50,5,'',0,1,'L');
$pdf->Cell(50,4,'Dirección General de Delegaciones',0,1,'L');
$pdf->Cell(50,3,'Dirección General Adjunta de Planeación',0,1,'L');
$pdf->Cell(50,5,'P R E S E N T E',0,1,'L');
$pdf->Cell(50,5,'',0,1,'L');
$pdf->SetFont('Arial','',11);
$pdf->SetFillColor(255,255,255);
$num_delegacion = $_SESSION["cta_direccionw"];

//$pdf->MultiCell(190,4,'Certifico que la plantilla de personal y los datos en ella contenidos son correctos, completos y veraces al mes de '.$hoy.' del '.$anio.', según reporte anexo. Los datos asentados están debidamente soportados con la documentación suficiente y pertinente que obra en los archivos de esta Delegación, y que se encuentra disponible para cualquier aclaración posterior.',0,'J','J');
$pdf->MultiCell(190,4,'Certifico que la plantilla de personal y los datos en ella contenidos son correctos, completos y veraces al mes de '.$hoy.' del 2018, según reporte anexo. Los datos asentados están debidamente soportados con la documentación suficiente y pertinente que obra en los archivos de esta Delegación, y que se encuentra disponible para cualquier aclaración posterior.',0,'J','J');



$pdf->Ln();
$pdf->SetFont('Arial','B',7);
$pdf->SetFillColor(223,223,223);
$pdf->Cell(200,4,'PERSONAL SRE',1,1,'C',1);
$pdf->Cell(5,4,'No',1,0,'C',1);
$pdf->Cell(50,4,'Nombre',1,0,'C',1);
$pdf->Cell(45,4,'Cargo',1,0,'C',1);
$pdf->Cell(50,4,'Plaza',1,0,'C',1);
$pdf->Cell(50,4,'Actividades',1,0,'C',1);
$pdf->Ln();

$consulta=mysql_query("select concat(apellido_paterno,' ',apellido_materno,' ',nombre_trabajador), descripcion_cargo, descripcion_plaza, descripcion_area,
descripcion_pasaportes from tbl_personal a left join tbl_cargo b on a.id_cargo=b.id_cargo left join tbl_plaza c on c.id_plaza=a.id_plaza
left join tbl_area d on d.id_area=a.id_area left join tbl_area_pasaportes e on a.id_area_pas=e.id_area_pas where a.delegacion='$delegacion' and  tipo_personal='PERSONAL SRE' and a.activo='1' order by a.id_cargo asc;");
$filas=mysql_num_rows($consulta);
$i=0;
while ($i<$filas) {
while ($row= mysql_fetch_array($consulta)){
$i++;
$pdf->SetFont('Arial','',6);
$pdf->Cell(5,4,$i,1,0,'C');
$pdf->Cell(50,4,$row[0],1,0,'C');
$pdf->Cell(45,4,$row[1],1,0,'C');
$pdf->Cell(50,4,$row[2],1,0,'C');
if($row[3]=='PASAPORTES'){
$pdf->Cell(50,4,$row[4],1,0,'C');
}
else {
$pdf->Cell(50,4,$row[3],1,0,'C');
}
$pdf->Ln();
	}
}

$pdf->Ln();
$pdf->SetFont('Arial','B',7);
$pdf->Cell(200,4,'PERSONAL COMISIONADO',1,1,'C',1);
$pdf->Cell(5,4,'No',1,0,'C',1);
$pdf->Cell(50,4,'Nombre',1,0,'C',1);
$pdf->Cell(45,4,'Cargo',1,0,'C',1);
$pdf->Cell(50,4,'Lugar Físico',1,0,'C',1);
$pdf->Cell(50,4,'Actividades',1,0,'C',1);
$pdf->Ln();
$consulta=mysql_query("select concat(apellido_paterno,' ',apellido_materno,' ',nombre_trabajador), descripcion_cargo, descripcion_plaza, descripcion_area,
descripcion_pasaportes, oems, delegacion_oe from tbl_personal a left join tbl_cargo b on a.id_cargo=b.id_cargo left join tbl_plaza c on c.id_plaza=a.id_plaza
left join tbl_area d on d.id_area=a.id_area left join tbl_area_pasaportes e on a.id_area_pas=e.id_area_pas left join oems z on a.lugar_fisico=z.id_oems
where a.delegacion='$delegacion' and  tipo_personal='PERSONAL COMISIONADO'  and a.activo='1' order by oems,apellido_paterno asc;");
$filas=mysql_num_rows($consulta);
$i=0;
while ($i<$filas) {
while ($row= mysql_fetch_array($consulta)){
$i++;
$pdf->SetFont('Arial','',6);
$pdf->Cell(5,4,$i,1,0,'C');
$pdf->Cell(50,4,$row[0],1,0,'C');
$pdf->Cell(45,4,$row[1],1,0,'C');
if($row[5]!=''){
$pdf->Cell(50,4,$row[5],1,0,'C');
}
else
{
$pdf->Cell(50,4,$row[6],1,0,'C');
}
if($row[3]=='PASAPORTES'){
$pdf->Cell(50,4,$row[4],1,0,'C');
}
else {
$pdf->Cell(50,4,$row[3],1,0,'C');
}
$pdf->Ln();
	}
}

$pdf->Ln();

$pdf->Cell(50,3,'',0,1,'L');
$pdf->SetFillColor(255,255,255);
$consulta=mysql_query("select observaciones, nombre_responsable, descripcion_cargo from tbl_certificacion_plantillas a inner join tbl_cargo b on a.id_cargo=b.id_cargo where mes='$mess' and delegacion='$delegacion' and anio='$aniioo';");
while ($row= mysql_fetch_array($consulta)){
$observaciones=$row[0];
$responsable=$row[1];
$cargo=$row[2];

}
$pdf->MultiCell(190,4,'Observaciones: ' . $observaciones,0,'J','L');
$pdf->SetFont('Arial','',11);
$pdf->Cell(50,3,'',0,1,'L');
$pdf->Cell(50,5,'',0,1,'L');
//$pdf->Cell(50,5,'',0,1,'L');
$pdf->SetFont('Arial','B',11);
$pdf->Cell(50,3,'																																Atentamente',0,1,'L');
$pdf->Cell(50,5,'',0,1,'L');
$pdf->Cell(50,5,'',0,1,'L');
$pdf->Cell(50,3,'',0,1,'L');
//$pdf->Cell(50,3,'',0,1,'L');
$pdf->SetFont('Arial','',9);
$pdf->Cell(50,3,'____________________________________________________',0,1,'L');
$pdf->SetTextColor(128);
$pdf->Cell(20,6,'',0,0,'L');
$pdf->Cell(50,6,$responsable,0,1,'L');
$pdf->Cell(35,6,'',0,0,'L');
$pdf->Cell(50,6,$cargo,0,1,'L');
$pdf->SetTextColor(0);
$pdf->Output();
?>