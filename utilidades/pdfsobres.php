<?php
date_default_timezone_set('Europe/Madrid');
$dbh=mysql_connect ("localhost", "pisciso_wwwpisc", "jas17011974") or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ("pisciso_facturacion");

$title2=$demp;
$title22=$cpemp.' '.$lemp.' '.$pemp;
$title1='N.I.F. -'.$nifemp;
$title3=$vemp;
$title4='Telefono/s -'.$telf.' - '.$telm;
$title5='Fax -'.$fax;
$imgemp='../img/'.$img;
$firmaemp='../img/'.$firma;
$sobreemp='../img/'.$plantillasobre;

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
global $sobreemp;
global $plantillasobre;
global $firmaemp;
global $tipo;

switch  ($tipo){;
case 'sdl':$x=0;$y=0;$x1=5;$y1=90;break;
case 'sc6':$x=0;$y=8;$x1=5;$y1=93;break;
case 'sc5':$x=0;$y=55;$x1=5;$y1=140;break;
case 'scl':$x=0;$y=35;$x1=5;$y1=124;break;
};


		if ($plantillasobre!=''){;
				$this->Image($sobreemp,$x,$y,0,0);
	}else{;
		$this->Image($imgemp,$x1,$y1,50,15);
	};
		
	
	}

function Footer()
{
global $title1;
global $title2;
global $title22;
global $title3;
global $title4;
global $plantillasobre;
global $nemp;
global $nccemp;
		$this->SetTextColor(0);
    $this->SetFont('Arial','B',8);
    $this->SetXY(3,-5);
    $this->Cell(1,0.25,strtoupper($title2).' '.strtoupper($title22),0,0,'L');

}

function FancyTable($idclientes,$ide)
{
global $tipo;

		$this->SetTextColor(0);
		$this->SetFont('Arial','B',10);
		
if($idclientes=='todos'){;
$sql0="select * from clientes where idempresas='".$ide."'";
$result0=mysql_query ($sql0) or die ("Invalid result0");
$row0=mysql_affected_rows();

for ($j=0; $j<$row0; $j++){;
$nombre=mysql_result($result0,$j,'nombre');
$cp=mysql_result($result0,$j,'cp');
$domicilio=mysql_result($result0,$j,'domicilio');
$localidad=mysql_result($result0,$j,'localidad');
$provincia=mysql_result($result0,$j,'provincia');

switch  ($tipo){;
case 'sdl':$x=125;$y=70;break;
case 'sc6':$x=85;$y=70;break;
case 'sc5':$x=95;$y=110;break;
case 'scl':$x=95;$y=95;break;
};


    $this->SetXY($x,$y);
    $this->Cell(1,0.25,'Sr. Presidente ',0,0,'L');
    $this->SetXY($x,$y+5);
    $this->Cell(1,0.25,strtoupper($nombre),0,0,'L');
    $this->SetXY($x,$y+10);
    $this->Cell(1,0.25,strtoupper($domicilio),0,0,'L');
    $this->SetXY($x,$y+15);
    $this->Cell(1,0.25,strtoupper($provincia).' '.strtoupper($cp),0,0,'L');
    if ($j<($row0-1)){;
    $this->AddPage();
    };
};

}else{;
$sql1="select * from clientes where idclientes='".$idclientes."' and idempresas='".$ide."'";
$result1=mysql_query ($sql1) or die ("Invalid result");
$nombre=mysql_result($result1,0,'nombre');
$cp=mysql_result($result1,0,'cp');
$domicilio=mysql_result($result1,0,'domicilio');
$localidad=mysql_result($result1,0,'localidad');
$provincia=mysql_result($result1,0,'provincia');

switch  ($tipo){;
case 'sdl':$x=125;$y=70;break;
case 'sc6':$x=85;$y=70;break;
case 'sc5':$x=95;$y=110;break;
case 'scl':$x=95;$y=95;break;
};


    $this->SetXY($x,$y);
    $this->Cell(1,0.25,'Sr. Presidente ',0,0,'L');
    $this->SetXY($x,$y+5);
    $this->Cell(1,0.25,strtoupper($nombre),0,0,'L');
    $this->SetXY($x,$y+10);
    $this->Cell(1,0.25,strtoupper($domicilio),0,0,'L');
    $this->SetXY($x,$y+15);
    $this->Cell(1,0.25,strtoupper($provincia).' '.strtoupper($cp),0,0,'L');
};

}


function FancyTable2($idclientes,$ide,$cp)
{
global $tipo;

		$this->SetTextColor(0);
		$this->SetFont('Arial','B',10);
		
if($cp!='0'){;


$sql0="select * from propuestas where idempresa='".$ide."'";
if ($cp!='todos'){;
$sql0.=" and cp='".$cp."'";
};
if ($idclientes!='todos'){;
$sql0.=" and id='".$idclientes."'";
};
$sql0.=" order by nombre asc";

$result0=mysql_query ($sql0) or die ("Invalid result0");
$row0=mysql_affected_rows();

for ($j=0; $j<$row0; $j++){;
$nombre=mysql_result($result0,$j,'nombre');
$cp=mysql_result($result0,$j,'cp');
$domicilio=mysql_result($result0,$j,'domicilio');
$provincia=mysql_result($result0,$j,'provincia');

switch  ($tipo){;
case 'sdl':$x=125;$y=70;break;
case 'sc6':$x=85;$y=70;break;
case 'sc5':$x=95;$y=110;break;
case 'scl':$x=95;$y=95;break;
};


    $this->SetXY($x,$y);
    $this->Cell(1,0.25,'Sr. Presidente ',0,0,'L');
    $this->SetXY($x,$y+5);
    $this->Cell(1,0.25,strtoupper($nombre),0,0,'L');
    $this->SetXY($x,$y+10);
    $this->Cell(1,0.25,strtoupper($domicilio),0,0,'L');
    $this->SetXY($x,$y+15);
    $this->Cell(1,0.25,strtoupper($provincia).' '.strtoupper($cp),0,0,'L');
    //$this->SetXY(10,9);
    //$this->Cell(1,0.25,,0,0,'L');
    if ($j<($row0-1)){;
    $this->AddPage();
    };
};
};


}


}

$pdf=new PDF('P','mm',$tipo);
//Títulos de las columnas




//Carga de datos
//$data=$pdf->LoadData('inicio.html');
$pdf->SetFont('Arial','',14);
$pdf->AddPage();

if ($tabla=='propuesta'){;

//if ($propuesta!="todos"){;

$pdf->FancyTable2($propuesta,$ide,$cp);
//}else{;

//$sql="SELECT * from propuestas where idempresa='".$ide."' and cp='".$cp."' order by nombre asc"; 
//$result=mysql_query ($sql) or die ("Invalid result");
//$row=mysql_affected_rows();

//for ($r=0; $r<$row;$r++){;
//$propuesta=mysql_result($result,$r,'id');
//$pdf->FancyTable2($propuesta,$ide,$cp);
//$pdf->AddPage();
//};

//};
      

}else{;
if ($clientes!='0'){;
$pdf->FancyTable($clientes,$ide);
};
};
$pdf->Output();
?>





