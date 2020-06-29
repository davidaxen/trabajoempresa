<?php
date_default_timezone_set('Europe/Madrid');
$dbh=mysql_connect ("localhost", "pisciso_wwwpisc", "") or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ("pisciso_facturacion");

$title1=$demp.' '.$cpemp.' '.$lemp.' '.$pemp;
$title2='N.I.F. -'.$nifemp;
$title3=$vemp;
$title4='Telefono/s -'.$telf.' - '.$telm;
$title5='Fax -'.$fax;
$title6=$web;
$title7=$email;
$imgemp='img/kmmk/kmmk-bn.jpg';
$firmaemp=$firma;


define('FPDF_FONTPATH','font/');
require('fpdf.php');

class PDF extends FPDF
{

function TextWithRotation($x,$y,$txt,$txt_angle,$font_angle=0)
{
	$txt=str_replace(')','\\)',str_replace('(','\\(',str_replace('\\','\\\\',$txt)));

	$font_angle+=90+$txt_angle;
	$txt_angle*=M_PI/180;
	$font_angle*=M_PI/180;

	$txt_dx=cos($txt_angle);
	$txt_dy=sin($txt_angle);
	$font_dx=cos($font_angle);
	$font_dy=sin($font_angle);

	$s=sprintf('BT %.2f %.2f %.2f %.2f %.2f %.2f Tm (%s) Tj ET',
			 $txt_dx,$txt_dy,$font_dx,$font_dy,
			 $x*$this->k,($this->h-$y)*$this->k,$txt);
	if ($this->ColorFlag)
		$s='q '.$this->TextColor.' '.$s.' Q';
	$this->_out($s);
}

function Header()
{
global $imgemp;
global $title1;
global $title2;
global $title3;

		$this->Image($imgemp,20,8,0,150);
		$t1=$title3.' '.$title2.' '.$title1;
		$this->SetTextColor(0);
		$this->SetFillColor(0);
    //$this->SetFont('Futuramc','BI',6);
	//	$this->TextWithRotation(10,700,strtoupper($t1),90,0);
    $this->SetTextColor(255,255,255);
		$this->SetXY(20,170);
                $this->SetFont('Futuramc','BI',16);
		$this->Cell(0, 16,'FAX',0,0,'L',1);
		$this->Ln(20);
		$this->SetX(20);
		$this->Cell(0, 2,'',0,0,'L',1);	
	
	}

function Footer()
{
global $title1;
global $title2;
global $title3;
global $title4;
global $title5;
global $title6;
global $title7;
global $npag;

		$this->SetFillColor(255,255,255);
    $this->SetTextColor(0);
    $this->SetFont('Futuramc','I',6);
    $this->SetY(-35);
    $t2=$title1.' '.$title4.' '.$title5;
    //$t3=$title6.' - '.$title7;
    $this->Cell(0, 10,strtoupper($t2),0,0,'C');
    $this->SetY(-25);
    $this->Cell(0, 10,strtoupper($t3),0,0,'C');
    //Posición: a 1,5 cm del final
    $this->SetY(-15);
		$this->Cell(0,10,'Pagina '.$this->PageNo().'/'.$npag,0,0,'C');


}

function FancyTable()
{
global $title3;
global $asunto;
global $contacto;
global $compañia;
global $npag;
global $nfax;
global $datos;
		$this->SetFillColor(0);
    $this->SetTextColor(0);
    $this->SetFont('Futuramc','',10);
    $this->SetFont('Futuramc','BI',16);  
    $this->SetXY(20,200);
    $this->Cell(350,20,'TO: '.$contacto,0,0,'L');
    $this->Cell(0,20,'FROM: '.$title3,0,1,'L');
    $this->SetX(20);
    $this->Cell(350,20,'COMPANY: '.$compañia,0,0,'L');
    $this->Cell(0,20,'DATE: ',0,1,'L');
    $this->SetX(20); 
    $this->Cell(350,20,'FAX: '.$nfax,0,0,'L');
    $this->Cell(0,20,'PAGES: '.$npag,0,1,'L');
    $this->SetX(20);
    $this->Cell(0, 2,'',0,0,'L',1);	
    $this->Ln(10);
    $this->SetX(28);
    $this->Cell(100,10,'SUBJECT: ',0,0,'L');
    $this->MultiCell(350,12,$asunto,0,'J',0);
$this->Ln(20);
		$this->SetX(20);
		$this->Cell(0, 2,'',0,0,'L',1);	
		$this->Ln(40);
		$this->SetX(28);
    $this->SetFont('Futuramc','',14);
		$this->MultiCell(500,12,$datos,0,'J',0);


}

}

$pdf=new PDF('P','pt','A4');
//Títulos de las columnas

$pdf->AddFont('Futuramc','B','futuramc.php');
$pdf->AddFont('Futuramc','','futuramc.php');
$pdf->AddFont('Futuramc','I','futuramc.php');
$pdf->AddFont('Futuramc','BI','futuramc.php');




//Carga de datos
//$data=$pdf->LoadData('inicio.html');
$pdf->SetFont('Futuramc','',14);
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->FancyTable();


$pdf->Output();
?>




