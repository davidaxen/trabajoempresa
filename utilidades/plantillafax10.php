<?php
date_default_timezone_set('Europe/Madrid');
$dbh=mysql_connect ("localhost", "pisciso_wwwpisc", "jas17011974") or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ("pisciso_facturacion");

$title1=$demp.' '.$cpemp.' '.$lemp.' '.$pemp;
$title2='N.I.F. -'.$nifemp;
$title3=$vemp;
$title4='Telefono/s -'.$telf.' - '.$telm;
$title5='Fax -'.$fax;
$title6=$web;
$title7=$email;
$imgemp='../img/'.$img;
$firmaemp='../img/'.$firma;
$imgplantilla='../img/'.$imgpl;


$today=getdate();
$año=$today['year'];
$mes=$today['mon'];
$d1=date("d");
$ws=strlen($d1);
if ($ws<2){;
$d1='0'.$d1;
};

switch ($mes){;
case '1': $nmes='Enero';$am='01';break;
case '2': $nmes='Febrero';$am='02';break;
case '3': $nmes='Marzo';$am='03';break;
case '4': $nmes='Abril';$am='04';break;
case '5': $nmes='Mayo';$am='05';break;
case '6': $nmes='Junio';$am='06';break;
case '7': $nmes='Julio';$am='07';break;
case '8': $nmes='Agosto';$am='08';break;
case '9': $nmes='Septiembre';$am='09';break;
case '10': $nmes='Octubre';$am='10';break;
case '11': $nmes='Noviembre';$am='11';break;
case '12': $nmes='Diciembre';$am='12';break;
};


define('FPDF_FONTPATH','font/');
require('../fpdf.php');

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
global $imgplantilla;
global $title1;
global $title2;
global $title3;

		$this->Image($imgplantilla,0,0,600,850);
		//$this->Image($imgemp,10,8,0,50);
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
global $title3;
global $fax;
global $asunto;
global $contacto;
global $nfax;
global $datos;
global $d1;
global $nmes;
global $año;
$titulo1=$d1.' de '.$nmes.' de '.$año.' ';


$marg=45;
    $this->SetTextColor(0);
    $this->SetFont('Arial','',10);
    $this->SetFont('Arial','BI',12);  
    $this->SetXY($marg,80);
    $this->Cell(0,16,'De: '.$title3,0,1,'L');
    $this->SetX($marg);
    $this->Cell(0,16,'Fax: '.$fax,0,1,'L');
		$this->Ln();
		$this->SetX($marg);
    $this->Cell(0,16,'Para: '.$contacto,0,1,'L');
    $this->SetX($marg);
    $this->Cell(0,16,'Fax: '.$nfax,0,1,'L');
    $this->Ln();
    $this->SetX($marg);
    $this->Cell(0,16,'Asunto: ',0,1,'L');
    $this->SetX($marg+10);
    $this->MultiCell(500,16,$asunto,0,'J',0);
		$this->Ln();
		$this->SetFont('Arial','',10);
		$this->SetX($marg);
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