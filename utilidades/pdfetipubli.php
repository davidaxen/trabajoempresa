<?php
$dbh=mysql_connect ("localhost", "pisciso_wwwpisc", "jas17011974") or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ("pisciso_facturacion");
date_default_timezone_set('Europe/Madrid');

//$idclientes='7';
$imgemp='../img/'.$img;


define('FPDF_FONTPATH','font/');
require('../fpdf.php');
//require('rotation.php');

class PDF extends FPDF
//class PDF extends PDF_Rotate

{
	var $angle=0;

function Rotate($angle,$x=-1,$y=-1)
{
    if($x==-1)
        $x=$this->x;
    if($y==-1)
        $y=$this->y;
    if($this->angle!=0)
        $this->_out('Q');
    $this->angle=$angle;
    if($angle!=0)
    {
        $angle*=M_PI/180;
        $c=cos($angle);
        $s=sin($angle);
        $cx=$x*$this->k;
        $cy=($this->h-$y)*$this->k;
        $this->_out(sprintf('q %.5F %.5F %.5F %.5F %.2F %.2F cm 1 0 0 1 %.2F %.2F cm',$c,$s,-$s,$c,$cx,$cy,-$cx,-$cy));
    }
}

function _endpage()
{
    if($this->angle!=0)
    {
        $this->angle=0;
        $this->_out('Q');
    }
    parent::_endpage();
}
	
function EAN13($x,$y,$barcode,$h=16,$w=.35)
{
	$this->Barcode($x,$y,$barcode,$h,$w,13);
}

function UPC_A($x,$y,$barcode,$h=16,$w=.35)
{
	$this->Barcode($x,$y,$barcode,$h,$w,12);
}

function GetCheckDigit($barcode)
{
	//Compute the check digit
	$sum=0;
	for($i=1;$i<=11;$i+=2)
		$sum+=3*$barcode{$i};
	for($i=0;$i<=10;$i+=2)
		$sum+=$barcode{$i};
	$r=$sum%10;
	if($r>0)
		$r=10-$r;
	return $r;
}

function TestCheckDigit($barcode)
{
	//Test validity of check digit
	$sum=0;
	for($i=1;$i<=11;$i+=2)
		$sum+=3*$barcode{$i};
	for($i=0;$i<=10;$i+=2)
		$sum+=$barcode{$i};
	return ($sum+$barcode{12})%10==0;
}

function RotatedImage($file,$x,$y,$w,$h,$angle)
{
    //Image rotated around its upper-left corner
    $this->Rotate($angle,$x,$y);
    $this->Image($file,$x,$y,$w,$h);
    $this->Rotate(0);
}


function Barcode($x,$y,$barcode,$h,$w,$len)
{
	//Padding
	$barcode=str_pad($barcode,$len-1,'0',STR_PAD_LEFT);
	if($len==12)
		$barcode='0'.$barcode;
	//Add or control the check digit
	if(strlen($barcode)==12)
		$barcode.=$this->GetCheckDigit($barcode);
	elseif(!$this->TestCheckDigit($barcode))
		$this->Error('Incorrect check digit');
	//Convert digits to bars
	$codes=array(
		'A'=>array(
			'0'=>'0001101','1'=>'0011001','2'=>'0010011','3'=>'0111101','4'=>'0100011',
			'5'=>'0110001','6'=>'0101111','7'=>'0111011','8'=>'0110111','9'=>'0001011'),
		'B'=>array(
			'0'=>'0100111','1'=>'0110011','2'=>'0011011','3'=>'0100001','4'=>'0011101',
			'5'=>'0111001','6'=>'0000101','7'=>'0010001','8'=>'0001001','9'=>'0010111'),
		'C'=>array(
			'0'=>'1110010','1'=>'1100110','2'=>'1101100','3'=>'1000010','4'=>'1011100',
			'5'=>'1001110','6'=>'1010000','7'=>'1000100','8'=>'1001000','9'=>'1110100')
		);
	$parities=array(
		'0'=>array('A','A','A','A','A','A'),
		'1'=>array('A','A','B','A','B','B'),
		'2'=>array('A','A','B','B','A','B'),
		'3'=>array('A','A','B','B','B','A'),
		'4'=>array('A','B','A','A','B','B'),
		'5'=>array('A','B','B','A','A','B'),
		'6'=>array('A','B','B','B','A','A'),
		'7'=>array('A','B','A','B','A','B'),
		'8'=>array('A','B','A','B','B','A'),
		'9'=>array('A','B','B','A','B','A')
		);
	$code='101';
	$p=$parities[$barcode{0}];
	for($i=1;$i<=6;$i++)
		$code.=$codes[$p[$i-1]][$barcode{$i}];
	$code.='01010';
	for($i=7;$i<=12;$i++)
		$code.=$codes['C'][$barcode{$i}];
	$code.='101';
	//Draw bars
	for($i=0;$i<strlen($code);$i++)
	{
		if($code{$i}=='1')
			$this->Rect($x+$i*$w,$y,$w,$h,'F');
	}
	//Print text uder barcode
	$this->SetFont('Arial','',12);
	//$this->Text($x,$y+$h+11/$this->k,substr($barcode,-$len));
}
}

$pdf=new PDF('L', 'mm','etiq');
//$pdf->Open();
$pdf->AddPage();
$x=0;

$p0=$x+2;
$p1=$x+4;
$p2=$x+7;
$p3=$x+34;
$p4=$x+50;
$p5=$x+22;


$pdf->RotatedImage($imgemp,2,$p3,0,8.5,90);
$lineas=3;
if ($list=='a'){;
$sql="SELECT * from destinatario"; 
$dato="Dº./Dª. ";
};
if ($list=='c'){;
$sql="SELECT * from propuestas"; 
$dato="";
};
if ($list=='e'){;
$sql="SELECT * from empresaspub";
$dato=""; 
};
if ($list=='f'){;
$sql="SELECT * from callejero";
$dato=""; 
};
$sql.=" where id='".$id."'"; 


$result=mysql_query ($sql) or die ("Invalid result");
if ($list!='f'){;
$nombre=mysql_result($result,0,'nombre');
$direccion=mysql_result($result,0,'domicilio');
$cp=mysql_result($result,0,'cp');
$localidad=mysql_result($result,0,'localidad');
$provincia=mysql_result($result,0,'provincia');
$linea =array(strtoupper($dato).strtoupper($nombre),strtoupper($direccion),strtoupper($cp.' - '.$localidad.' - '.$provincia));
};

if ($list=='f'){;
$cdtvia=mysql_result($result,0,'cdtvia');
$dspart=mysql_result($result,0,'dspart'); 
$dsvial=mysql_result($result,0,'dsvial'); 
$numero=mysql_result($result,0,'numero');
$cp=mysql_result($result,0,'cp');
$localidad=mysql_result($result,0,'dsmuni');

$linea =array(' ',strtoupper($cdtvia.' '.$dspart.' '.$dsvial.', '.$numero),strtoupper($cp.' - '.$localidad));
};



switch ($lineas) {
    case 6:$p0=2;$j=5;break;
    case 3:$p0=2;$j=10;$letra=10;break;
    case 2:$p0=2;$j=15;break;
};
$pdf->SetFont('Arial','B',$letra);
for($i=0;$i<$lineas;$i++){;
$pdf->SetXY(20,$p0);
$pdf->MultiCell(67,$j-5,$linea[$i],0,'L',0);
$p0=$p0+$j;
};

$pdf->Output();
?>