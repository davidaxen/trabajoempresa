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

$pdf=new PDF('L', 'mm','etiq');

$pdf->AddPage();
$title1="Pegatinas - Address 99012 - DYMO" ;
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(5,20);
$pdf->MultiCell(55,4,strtoupper($title1),0,'J',0);





for ($i=$valor1;$i<($valor2+1);$i++){;
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


$pdf->Image($imgemp,$p0,$p0,32,10);
$pdf->SetFont('Arial','B',10);
$pdf->SetXY($p0,$p4);
$pdf->MultiCell(55,4,'',0,'J',0);
$pdf->SetFont('Arial','B',8);
$pdf->SetXY($p0,$p5);
$pdf->MultiCell(55,3,strtoupper($nombre),0,'J',0);
$pdf->SetXY($p0,$p3);
$pdf->MultiCell(55,3,strtoupper($i),0,'J',0);

$codigo=$ide.';'.$i.';'.strtoupper($nombre);

$mensajeQR =($codigo);
$ini=0;
$pdf->SetXY($p1,$ini);

$pqw=52;
$pqh=-2;	
$pgt=40;	
		$qr = new QRcode($mensajeQR, 'L'); // error level: L, M, Q, H 
    	$qr->displayFPDF ($pdf, $pqw, $pqh , $pgt, array(255,255,255), array(0,0,0), $imgemppeq);

};

$pdf->Output();
?>

