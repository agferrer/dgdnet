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


include('../../../../conexionindra.php');
$mysqli = Conectarse();
$link = Conectarse2(); 

$pdf=new FPDF('L','mm','Legal');
$pdf->SetAutoPageBreak(true,40);
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(50,14,'',0,1,'L');
//$pdf->Image('C:/AppServ/www/stm/imagenes/encabeza_oficio.png',10,10,260,70);
$pdf->Cell(50,5,'',0,1,'L');
$pdf->Cell(50,3,'',0,1,'L');
$pdf->Cell(50,3,'',0,1,'L');
$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Arial','B',8);
$pdf->Ln();
$pdf->SetFont('Arial','B',8);
$pdf->SetFillColor(223,223,223);
$pdf->Cell(330,4,'ENLACE',1,1,'C',1);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(5,4,'No',1,0,'C',1);
$pdf->Cell(70,4,'Delegación',1,0,'C',1);
$pdf->Cell(67,4,'Nombre',1,0,'C',1);
$pdf->Cell(25,4,'Plaza',1,0,'C',1);
$pdf->Cell(10,4,'Nivel',1,0,'C',1);
$pdf->Cell(15,4,'Sueldo Neto',1,0,'C',1);
$pdf->Cell(12,4,'Estructura',1,0,'C',1);
$pdf->Cell(12,4,'Eventual',1,0,'C',1);
$pdf->Cell(12,4,'Honorarios',1,0,'C',1);
//$pdf->Cell(20,4,'Rango SEM',1,0,'C',1);
$pdf->Cell(25,4,'F. ingreso SRE',1,0,'C',1);
$pdf->Cell(25,4,'F. ingreso Deleg',1,0,'C',1);
$pdf->Cell(20,4,'Área',1,0,'C',1);
$pdf->Cell(32,4,'Act. (Pasaportes)',1,0,'C',1);
//$pdf->Cell(37,4,'Observaciones',1,0,'C',1);
$pdf->Ln();
$pdf->SetFont('Arial','',6);
$consulta=mysql_query("select a.id_personal, l.nombre,  m.oems, concat(a.nombre_trabajador,' ',a.apellido_paterno,' ', a.apellido_materno),
a.estructura, a.eventual, a.honorarios, n.oems, a.fecha_ingreso_sre, a.num_oficio, a.fecha_oficio, f.descripcion_nivel,
i.descripcion_plaza, d.descripcion_cargo, f.suedo_neto,  b.descripcion_area, c.descripcion_pasaportes, j.descripcion_rango,
a.fecha_ingreso_delegacion, o.tipo, l.nombre
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
where a.id_plaza='6'  order by l.nombre asc ;");
$filas=mysql_num_rows($consulta);
$i=0;
while ($i<$filas) {
while ($row= mysql_fetch_array($consulta)){
$i++;
$id=$row[0];
$pdf->Cell(5,4,$i,1,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Cell(70,4,$row[20],1,0,'C');
$pdf->SetFont('Arial','',6);
$pdf->Cell(67,4,$row[3],1,0,'C');
$pdf->Cell(25,4,$row[12],1,0,'C');
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
//$pdf->Cell(20,4,$row[17],1,0,'C');
$pdf->Cell(25,4,$row[8],1,0,'C');
$pdf->Cell(25,4,$row[18],1,0,'C');
$pdf->Cell(20,4,$row[15],1,0,'C');
$pdf->Cell(32,4,$row[16],1,0,'C');
//$pdf->Cell(37,4,$row[19],1,0,'C');
$pdf->Ln();
	}
}

$pdf->Output();
?>