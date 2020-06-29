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


$pdf=new PDF('L', 'mm','etiqm');

$pdf->AddPage();
$title1="Pegatinas - DYMO - S0722540 - 11354 - Horizontal" ;
$pdf->SetFont('Arial','B',8);
$pdf->SetXY(1,10);
$pdf->MultiCell(30,4,strtoupper($title1),0,'J',0);

$x=0;

$pdf->AddPage();
$p0=$x+1;
$p1=$x+4;
$p2=$x+7;
$p3=$x+26;
$p4=$x+11;
$p5=$x+22;
$p6=$x+63;
$p7=$x+15;
$p8=0;
$p9=$x+19;

$pdf->Image($imgemp,$p8,$p8,32,10);
$pdf->SetFont('Arial','B',7);
$pdf->SetXY($p0,$p4);
$pdf->MultiCell(30,2,'',0,'J',0);
$pdf->SetFont('Arial','B',6);
$pdf->SetXY($p0,$p7);
$pdf->MultiCell(30,2,strtoupper($nombre),0,'J',0);
$pdf->SetXY($p0,$p9);
$pdf->MultiCell(30,2,strtoupper($idenvases),0,'J',0);

$codigo=$ide.';'.$idenvases.';'.strtoupper($nombre);

$mensajeQR =($codigo);
$ini=0;
$pdf->SetXY($p1,$ini);
/*
$pqw=52;
$pqh=-2;	
$pgt=40;	
*/
$pqw=-3;
$pqh=22;	
$pgt=38;
		$qr = new QRcode($mensajeQR, 'L'); // error level: L, M, Q, H 
    	$qr->displayFPDF ($pdf, $pqw, $pqh , $pgt, array(255,255,255), array(0,0,0), $imgemppeq);




$pdf->Output();
?>

