<?php
date_default_timezone_set('Europe/Madrid');
$dbh=mysql_connect ("localhost", "pisciso_wwwpisc", "") or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ("pisciso_aprendo");

$title1=$demp.' '.$cpemp.' '.$lemp.' '.$pemp;
$title2='N.I.F. -'.$nifemp;
$title3=$vemp;
$title4='Telefono/s -'.$telf.' - '.$telm;
$title5='Fax -'.$fax;
$title6=$web;
$title7=$email;
$imgemp=$img;
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

		$this->Image($imgemp,10,8,0,50);
		$t1=$title3.' '.$title2.' '.$title1;
		$this->SetTextColor(0);
    $this->SetFont('Arial','BI',6);
		$this->TextWithRotation(10,700,strtoupper($t1),90,-45);
    $this->SetTextColor(0);
		$this->SetXY(300,30);
                $this->SetFont('Arial','BI',16);
		$this->Cell(0, 10,'PLANTILLA DE FAX',0,0,'L');
	
	
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


		$this->SetFillColor(255,255,255);
    $this->SetTextColor(0);
    $this->SetFont('Arial','I',6);
    $this->SetY(-35);
    $t2=$title1.' '.$title4.' '.$title5;
    $t3=$title6.' - '.$title7;
    $this->Cell(0, 10,strtoupper($t2),0,0,'C');
    $this->SetY(-25);
    $this->Cell(0, 10,strtoupper($t3),0,0,'C');
    //Posición: a 1,5 cm del final
    $this->SetY(-15);
		$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');


}

function FancyTable()
{
global $asunto;
global $contacto;
global $nfax;
global $datos;
    $this->SetTextColor(0);
    $this->SetFont('Arial','',10);
    $this->SetFont('Arial','BI',12);  
    $this->SetXY(28,80);
    $this->Cell(0,10,'De: Admiservi S.L.',0,1,'L');
    $this->Cell(0,10,'Fax: 91 734 40 94',0,1,'L');
		$this->Ln();
		$this->SetX(28);
    $this->Cell(0,10,'Para: '.$contacto,0,1,'L');
    $this->Cell(0,10,'Fax: '.$nfax,0,1,'L');
    $this->Ln();
    $this->SetX(28);
    $this->Cell(0,10,'Asunto: ',0,1,'L');
    $this->MultiCell(500,12,$asunto,0,'J',0);
		$this->Ln();
		$this->SetFont('Arial','',10);
		$this->SetX(28);
    $this->SetFont('Arial','',10);
		$this->MultiCell(500,12,$datos,0,'J',0);


}

}

$pdf=new PDF('P','pt','A4');
//Títulos de las columnas




//Carga de datos
//$data=$pdf->LoadData('inicio.html');
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->FancyTable();


$pdf->Output();
?>








