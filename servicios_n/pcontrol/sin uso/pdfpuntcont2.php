<?php
$dbh=mysql_connect ("localhost", "pisciso_wwwpisc", "jas17011974") or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ("pisciso_facturacion");
date_default_timezone_set('Europe/Madrid');

//$idclientes='7';
$imgemp='../../img/'.$img;

$sql="SELECT nombre from clientes where idclientes='".$idclientes."' and idempresas='".$ide."'"; 
$result=mysql_query ($sql) or die ("Invalid result");
$nombre=mysql_result($result,0,'nombre');


$sql2="SELECT * from puntcont where idclientes='".$idclientes."' and idempresas='".$ide."' order by idpuntcont asc"; 
$result2=mysql_query ($sql2) or die ("Invalid result");
$row=mysql_affected_rows();


define('FPDF_FONTPATH','font/');
require('../../fpdf.php');
//require('rotation.php');

class PDF extends FPDF
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
$codserv='2';

$codemp=$ide;
$temp=strlen($codemp);
if ($temp<4){;
for($remp=0;$remp<(4-$temp);$remp++){;
$codemp='0'.$codemp;
};
};


$codcom=$idclientes;
$tcom=strlen($codcom);
if ($tcom<4){;
for($rcom=0;$rcom<(4-$tcom);$rcom++){;
$codcom='0'.$codcom;
};
};

for ($j=0;$j<$row;$j++){;
$i=$j+1;

//izquierda
$descrip=mysql_result($result2,$j,'descripcion');
$idpuntcont=mysql_result($result2,$j,'idpuntcont');

$codpuntcont=$idpuntcont;
$tpunt=strlen($codpuntcont);
if ($tpunt<3){;
for($rpunt=0;$rpunt<(3-$tpunt);$rpunt++){;
$codpuntcont='0'.$codpuntcont;
};
};


$title1=$nombre;
if (($j==0) or ($j==$row-1)){;
$title2=$descrip;
}else{;
$title2='P. C. '.$idpuntcont.': '.$descrip;
};


$codigo=$codserv.$codemp.$codcom.$codpuntcont;


$p0=$x+1;
$p1=$x+4;
$p2=$x+7;
$p3=$x+34;
$p4=$x+50;
$p5=$x+22;
//$pdf->Line(3,$p0,87,$p0);
//$pdf->Line(3,$p4,87,$p4);
//$pdf->Line(3,$p0,3,$p4);
//$pdf->Line(87,$p0,87,$p4);
$pdf->RotatedImage($imgemp,2,$p3,0,12,90);
//$pdf->Image($imgemp,5,$p1,0,15);
$pdf->SetFont('Arial','B',11);
$pdf->SetXY(20,$p0);
$pdf->MultiCell(67,5,strtoupper($title1),0,'C',0);
$pdf->SetFont('Arial','B',8);
$pdf->SetXY(20,$p2);
$pdf->MultiCell(67,5,strtoupper($title2),0,'J',0);
$pdf->EAN13(25,$p5,$codigo,13.5,0.6);
/*derecha
$j=$j+1;
if ($j<$row){;

$descrip=mysql_result($result2,$j,'descripcion');
$idpuntcont=mysql_result($result2,$j,'idpuntcont');

$codpuntcont=$idpuntcont;
$tpunt=strlen($codpuntcont);
if ($tpunt<3){;
for($rpunt=0;$rpunt<(3-$tpunt);$rpunt++){;
$codpuntcont='0'.$codpuntcont;
};
};


$title1=$nombre;
if (($j==0) or ($j==$row-1)){;
$title2=$descrip;
}else{;
$title2='Puesto de Control '.$idpuntcont.': '.$descrip;
};


$codigo=$codserv.$codemp.$codcom.$codpuntcont;

$p0=$x+3;
$p1=$x+4;
$p2=$x+20;
$p3=$x+37;
$p4=$x+50;
$p5=$x+25;
$pdf->Line(103,$p0,187,$p0);
$pdf->Line(103,$p4,187,$p4);
$pdf->Line(103,$p0,103,$p4);
$pdf->Line(187,$p0,187,$p4);
$pdf->Image($imgemp,105,$p1,0,15);
$pdf->SetFont('Arial','B',11);
$pdf->SetXY(105,$p2);
$pdf->MultiCell(80,5,strtoupper($title1),0,'C',0);
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(105,$p5);
$pdf->MultiCell(80,5,strtoupper($title2),0,'J',0);
$pdf->EAN13(115,$p3,$codigo,10,0.6);

};
//fin
*/
if ($i<$row){;
//$x=$x+55;
//$k=10;
//$h=fmod($i, $k);
//if ($h==0){;
$pdf->AddPage();
//$x=0;
//};
};
};

$pdf->Output();
?>

