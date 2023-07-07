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

$pdf=new FPDF('P','mm','Letter');
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
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','B',8);
$pdf->SetFillColor(223,223,223);
$pdf->Cell(200,4,'CONSULTA',1,1,'C',1);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(10,4,'No',1,0,'C',1);
$pdf->Cell(70,4,'Nombre',1,0,'C',1);
$pdf->Cell(40,4,'Cargo',1,0,'C',1);
$pdf->Cell(40,4,'Tipo de Asistencia',1,0,'C',1);
$pdf->Cell(40,4,'Fecha',1,0,'C',1);
$pdf->Ln();
$pdf->SetFont('Arial','',6);
$consulta=mysql_query("select a.id_personal, concat(a.apellido_paterno,' ', a.apellido_materno, ' ', a.nombre_trabajador), b.descripcion_cargo, c.tipo, d.fecha_asis
from tbl_personal a inner join tbl_cargo b on a.id_cargo=b.id_cargo inner join tbl_asistencia d on d.id_trabajador=a.id_personal
inner join tbl_tipo_asistencia c on d.tipo_asis=c.id_tipo where a.delegacion='$num_delegacion' and a.tipo_personal='PERSONAL COMISIONADO' and
fecha_asis='$fecha_consulta' and lugar_fisico='0' and a.activo=1 order by apellido_paterno asc;");
$filas=mysql_num_rows($consulta);
$i=0;
while ($i<$filas) {
while ($row= mysql_fetch_array($consulta)){
$i++;
$pdf->Cell(10,4,$i,1,0,'C');
$pdf->Cell(70,4,$row[1],1,0,'C');
$pdf->Cell(40,4,$row[2],1,0,'C');
$pdf->Cell(40,4,$row[3],1,0,'C');
$pdf->Cell(40,4,$row[4],1,0,'C');
$pdf->Ln();
	}
}

$pdf->Output();
?>