<?php 
include('bbdd.php');


$imgemp='../../img/'.$img;
$imgemppeq='../../img/'.$imgpeq;

$nombre=$nc;


define('FPDF_FONTPATH','../../font/');
require('../../fpdf.php');
require_once('../../qrcode/qrcode.class.php');



class PDF extends FPDF
{
	
var $angle=0;

function RotatedImage($file,$x,$y,$w,$h,$angle)
{
    //Image rotated around its upper-left corner
    $this->Rotate($angle,$x,$y);
    $this->Image($file,$x,$y,$w,$h);
    $this->Rotate(0);
}

}

$pdf=new PDF('L', 'mm','etiqc');

$pdf->AddPage();
$title1="Pegatinas - DYMO - S0929120 - 25 mm x 25 mm - 30332 - 1 x 1" ;
$pdf->SetFont('Arial','B',6);
$pdf->SetXY(1,2);
$pdf->MultiCell(23,3,strtoupper($title1),0,'J',0);

$x=0;
$pdf->AddPage();

$p0=$x+1;
$p1=$x+4;
$p2=$x+7;
$p3=$x+26;
$p4=$x+12;
$p5=$x+22;
$p6=$x+63;
$p7=$x+15;


$codigo=$ide.';'.$idenvases.';'.strtoupper($nombre);

$mensajeQR =($codigo);
$ini=0;
$pdf->SetXY($p1,$ini);

$pqw=0;
$pqh=-2;	
$pgt=28;	
		$qr = new QRcode($mensajeQR, 'L'); // error level: L, M, Q, H 
    	$qr->displayFPDF ($pdf, $pqw, $pqh , $pgt, array(255,255,255), array(0,0,0), $imgemppeq);


$pdf->Output();
?>

