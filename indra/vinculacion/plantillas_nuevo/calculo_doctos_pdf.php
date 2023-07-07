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
$pdf->Cell(331,4,'DESGLOSE DE DOCUMENTOS QUE SE TIENEN ARCHIVADOS',1,1,'C',1);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(51,4,'Delegación',1,0,'C',1);
$pdf->Cell(22,4,'Tot. Personal',1,0,'C',1);
$pdf->Cell(21,4,'Tot. Personal SRE',1,0,'C',1);
$pdf->Cell(22,4,'SRE con C I',1,0,'C',1);
$pdf->Cell(21,4,'SRE sin C I',1,0,'C',1);
$pdf->Cell(22,4,'SRE con Promesa',1,0,'C',1);
$pdf->Cell(21,4,'SRE sin Promesa',1,0,'C',1);
$pdf->Cell(22,4,'Tot. Personal Com.',1,0,'C',1);
$pdf->Cell(21,4,'Com. Con C I',1,0,'C',1);
$pdf->Cell(22,4,'Com. Sin C I',1,0,'C',1);
$pdf->Cell(21,4,'Com. Con Promesa',1,0,'C',1);
$pdf->Cell(22,4,'Com. Sin Promesa',1,0,'C',1);
$pdf->Cell(21,4,'Com. Con Oficio',1,0,'C',1);
$pdf->Cell(22,4,'Com. Sin Oficio',1,0,'C',1);
$pdf->Ln();
$pdf->SetFont('Arial','',6);
if ($mysqli->multi_query("CALL sp_genera_calculo_doctos_vinculacion('$user')")) {
    do {
        if ($result = $mysqli->store_result()) {
            while ($row = $result->fetch_row()) {

$suma_deleg+=$row[1];
$suma_sre+=$row[2];
$suma_con_cedula_sre+=$row[4];
$suma_sin_cedula_sre+=$row[5];
$suma_con_promesa_sre+=$row[6];
$suma_sin_promesa_sre+=$row[7];
$suma_comisionado+=$row[3];
$suma_con_cedula_comisionado+=$row[8];
$suma_sin_cedula_comisionado+=$row[9];
$suma_con_promesa_comisionado+=$row[10];
$suma_sin_promesa_comisionado+=$row[11];
$suma_con_oficio_comisionado+=$row[12];
$suma_sin_oficio_comisionado+=$row[13];

$pdf->Cell(51,4,$row[0],1,0,'L');
$pdf->Cell(22,4,$row[1],1,0,'C');
$pdf->Cell(21,4,$row[2],1,0,'C');
$pdf->Cell(22,4,$row[4],1,0,'C');
$pdf->Cell(21,4,$row[5],1,0,'C');
$pdf->Cell(22,4,$row[6],1,0,'C');
$pdf->Cell(21,4,$row[7],1,0,'C');
$pdf->Cell(22,4,$row[3],1,0,'C');
$pdf->Cell(21,4,$row[8],1,0,'C');
$pdf->Cell(22,4,$row[9],1,0,'C');
$pdf->Cell(21,4,$row[10],1,0,'C');
$pdf->Cell(22,4,$row[11],1,0,'C');
$pdf->Cell(21,4,$row[12],1,0,'C');
$pdf->Cell(22,4,$row[13],1,0,'C');
$pdf->Ln();
}
            $result->close();
        }
    } while ($mysqli->next_result());
}
else {
    printf("<br />First Error: %s\n", $mysqli->error);
}

$pdf->SetFont('Arial','B',8);
$pdf->Cell(51,4,'TOTAL',1,0,'L',1);
$pdf->Cell(22,4,$suma_deleg,1,0,'C',1);
$pdf->Cell(21,4,$suma_sre,1,0,'C',1);
$pdf->Cell(22,4,$suma_con_cedula_sre,1,0,'C',1);
$pdf->Cell(21,4,$suma_sin_cedula_sre,1,0,'C',1);
$pdf->Cell(22,4,$suma_con_promesa_sre,1,0,'C',1);
$pdf->Cell(21,4,$suma_sin_promesa_sre,1,0,'C',1);
$pdf->Cell(22,4,$suma_comisionado,1,0,'C',1);
$pdf->Cell(21,4,$suma_con_cedula_comisionado,1,0,'C',1);
$pdf->Cell(22,4,$suma_sin_cedula_comisionado,1,0,'C',1);
$pdf->Cell(21,4,$suma_con_promesa_comisionado,1,0,'C',1);
$pdf->Cell(22,4,$suma_sin_promesa_comisionado,1,0,'C',1);
$pdf->Cell(21,4,$suma_con_oficio_comisionado,1,0,'C',1);
$pdf->Cell(22,4,$suma_sin_oficio_comisionado,1,0,'C',1);
$mysqli->close();
$pdf->Output();
?>