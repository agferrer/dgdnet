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

$pdf=new FPDF('L','mm','Letter');
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
$pdf->Cell(250,4,'PERSONAL QUE LE FALTA ALGUN TIPO DE DOCUMENTO',1,1,'C',1);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(75,4,'Nombre',1,0,'C',1);
$pdf->Cell(75,4,'Delegacion',1,0,'C',1);
$pdf->Cell(50,4,'Comisionado/SRE',1,0,'C',1);
$pdf->Cell(50,4,'Documento Faltante',1,0,'C',1);
$pdf->Ln();
$pdf->SetFont('Arial','',6);
$consulta=mysql_query("select concat(apellido_paterno,' ',apellido_materno,' ',nombre_trabajador), b.nombre, tipo_personal
from tbl_personal a inner join delegaciones b on delegacion=id_delegacion
left join tbl_doctos c on id_trabajador=id_personal where tipo_personal in('PERSONAL SRE','PERSONAL COMISIONADO') and id_delegacion in(1,2,3,4,5,6,7,8,9,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,
30,31,32,33,34,35,36,38,39,40,41,51,54,55,209, 216) and archivo_cip ='' order by b.nombre, apellido_paterno, apellido_materno, nombre_trabajador asc;");
$filas=mysql_num_rows($consulta);
$a=0;
while ($row= mysql_fetch_array($consulta)){

$pdf->Cell(75,4,$row[0],1,0,'L');
$pdf->Cell(75,4,$row[1],1,0,'L');
$pdf->Cell(50,4,$row[2],1,0,'L');
$pdf->Cell(50,4,'Cédula de identificación',1,0,'L');
$pdf->Ln();
}
$consulta1=mysql_query("select concat(apellido_paterno,' ',apellido_materno,' ',nombre_trabajador), b.nombre, tipo_personal
from tbl_personal a inner join delegaciones b on delegacion=id_delegacion
left join tbl_doctos c on id_trabajador=id_personal where tipo_personal in('PERSONAL SRE','PERSONAL COMISIONADO') and id_delegacion in(1,2,3,4,5,6,7,8,9,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,
30,31,32,33,34,35,36,38,39,40,41,51,54,55,209, 216) and archivo_pc ='' order by b.nombre, apellido_paterno, apellido_materno, nombre_trabajador asc;");
$filas1=mysql_num_rows($consulta1);
while ($row= mysql_fetch_array($consulta1)){

$pdf->Cell(75,4,$row[0],1,0,'L');
$pdf->Cell(75,4,$row[1],1,0,'L');
$pdf->Cell(50,4,$row[2],1,0,'L');
$pdf->Cell(50,4,'Promesa de Confidencialidad',1,0,'L');
$pdf->Ln();
}

$consulta2=mysql_query("select concat(apellido_paterno,' ',apellido_materno,' ',nombre_trabajador), b.nombre, tipo_personal
from tbl_personal a inner join delegaciones b on delegacion=id_delegacion
left join tbl_doctos c on id_trabajador=id_personal where tipo_personal in('PERSONAL COMISIONADO') and id_delegacion in(1,2,3,4,5,6,7,8,9,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,
30,31,32,33,34,35,36,38,39,40,41,51,54,55,209, 216) and archivo_comision ='' order by b.nombre, apellido_paterno, apellido_materno, nombre_trabajador asc;");
$filas2=mysql_num_rows($consulta2);
while ($row= mysql_fetch_array($consulta2)){

$pdf->Cell(75,4,$row[0],1,0,'L');
$pdf->Cell(75,4,$row[1],1,0,'L');
$pdf->Cell(50,4,$row[2],1,0,'L');
$pdf->Cell(50,4,'Oficio de Comisión',1,0,'L');
$pdf->Ln();
}
$total=$filas+$filas1+$filas2;
$pdf->SetFont('Arial','B',8);
$pdf->Cell(250,4,'Total de personas que le falta algún tipo de documento '.$total.'.' ,1,0,'L',1);

$pdf->Output();
?>