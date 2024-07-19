<?php
session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . "/bank/config/global.php");

require_once(ROOT_DIR . "/model/CustomersModel.php");
require(ROOT_CORE.'/fpdf/fpdf.php');

class PDF extends FPDF
{
    function convertxt($p_txt)
    {
        return iconv('UTF-8', 'iso-8859-1', $p_txt);
    }
    function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, "Reporte de clientes", 0, 1, 'C');
    }
    function Footer()
    {
        $this->SetY(-15);
        $this->setFont('Arial', 'I', 8);
        $this->Cell(0, 10, $this->convertxt("Página ") . $this->PageNo() . '/{nb}', 0, 0, 'c');
    }
}
$rpt = new CustomersModel();

$records = $rpt->findall();
$records =$records['DATA'];


$pdf = new PDF('L');
$pdf->AliasNbPages();
$pdf->AddPage();
//Header de la tabla
$pdf->SetFont('Arial','B', 12);
$header = array($pdf->convertxt("ID"), $pdf->convertxt("Nombre"), $pdf->convertxt("Apellido"), $pdf->convertxt("Email"), $pdf->convertxt("F. Nac."), $pdf->convertxt("Dirección"), $pdf->convertxt("Ciudad"), $pdf->convertxt("Teléfono"), $pdf->convertxt("F. Registro"));
$widths = array(8, 25, 25, 50, 25, 60, 30, 30, 25);
for($i=0;$i < count($header);$i++)
{
    $pdf->Cell($widths[$i], 7, $header[$i], 1);
}
$pdf->Ln();
//Celdas de la tabla
$pdf->SetFont('Arial','', 10);
foreach($records as $row)
{
    $pdf->Cell($widths[0], 6,$pdf->convertxt($row['id']),1);
    $pdf->Cell($widths[1], 6,$pdf->convertxt($row['name']),1);
    $pdf->Cell($widths[2], 6,$pdf->convertxt($row['lastname']),1);
    $pdf->Cell($widths[3], 6,$pdf->convertxt($row['email']),1);
    $pdf->Cell($widths[4], 6,$pdf->convertxt($row['birthday']),1);
    $pdf->Cell($widths[5], 6,$pdf->convertxt($row['address']),1);
    $pdf->Cell($widths[6], 6,$pdf->convertxt($row['city']),1);
    $pdf->Cell($widths[7], 6,$pdf->convertxt($row['phone']),1);
    $pdf->Cell($widths[8], 6,$pdf->convertxt($row['registration_date']),1);

    $pdf->Ln();
}
$pdf->Output(); 
?>