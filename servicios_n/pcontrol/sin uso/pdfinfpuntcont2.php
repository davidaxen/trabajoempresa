<?php
$dbh=mysql_connect ("localhost", "pisciso_wwwpisc", "jas17011974") or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ("pisciso_facturacion");
date_default_timezone_set('Europe/Madrid');

if ($lemp!=$pemp){;
$title1=$demp.' '.$cpemp.' '.$lemp.' '.$pemp;
}else{;
$title1=$demp.' '.$cpemp.' '.$pemp;
};
$title2='N.I.F. -'.$nifemp;
$title3=$vemp;
$title4='Telefono/s -'.$telf.' - '.$telm;
$title5='Fax -'.$fax;
$imgemp='../../img/'.$img;
$firmaemp='../../img/'.$firma;

$meses=array("0","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

define('FPDF_FONTPATH','font/');
require('../../fpdf.php');

class PDF extends FPDF
{

function Header()
{
global $imgemp;
global $title10;
global $ide;
global $idclientes;
global $tipo;

    //Logo
$this->Image($imgemp,10,8,0,50);

$sql1="select * from clientes where idclientes='".$idclientes."' and idempresas='".$ide."'";
$result1=mysql_query ($sql1) or die ("Invalid result");
$nombre=mysql_result($result1,0,'nombre');


		$this->SetFont('Arial','B',15);
		$this->SetXY(250,10);
		$this->Cell(100,20,strtoupper($nombre),0,0,'C');
    $this->SetFont('Arial','B',25);
    $this->SetXY(250,35);
    $this->Cell(100,20,strtoupper($title10),0,0,'L');
    
  if ($tipo=="dia"){; 
    $this->SetFont('Arial','B',12); 
    $this->Ln();
    $this->Ln();
		$this->Cell(60,20,'HORA',1,0,'C');
		$this->Cell(250,20,'PUNTO DE CONTROL',1,0,'L');
		$this->Cell(200,20,'EMPLEADO',1,1,'L');
	}

}


function Footer()
{

global $title1;
global $title2;
global $title3;
global $title4;
global $title5;


$this->SetTextColor(0);
    $this->SetFont('Arial','B',8);

$title=$title3." ".$title2." ".$title1." ".$title4." ".$title5;
$this->TextWithRotation(10,560,$title,90,0);

    $this->SetY(-15);
		$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');



}



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



function FancyMes($idclientes,$ide,$mes,$año)
{

$dias= array("D","L","M","X","J","V","S");


$sql="SELECT * from puntcont where idempresas='".$ide."' and idclientes='".$idclientes."' order by idpuntcont asc"; 
$result=mysql_query ($sql) or die ("Invalid result");
$row=mysql_affected_rows();

$cabecera="Puntos de Control\Día";

$trdia[0]=1;
$trdia[1]=11;
$trdia[2]=21;
switch ($mes){;
case 4:
case 6:
case 9:
case 11:
$trdia[3]=31;;break;
case 2:
$trdia[3]=29;;break;
default:
$trdia[3]=32;
};


for ($j=0;$j<3;$j++){;
	$this->AddPage();
	$k2=$j+1;
	$this->SetTextColor(0);
	$this->SetFont('Arial','B',8);
	$this->SetXY(20,60);
	$this->Cell(150,20,strtoupper($cabecera),1,0,'C');
					for($tr=$trdia[$j];$tr<$trdia[$k2];$tr++){;
						$this->Cell(60,20,strtoupper($tr)."-".$dias[date("w",mktime(0,0,0,$mes,$tr,$año))],1,0,'C');
					};
		$g=$this->GetX();
		$h=$this->GetY()+20;
		for ($i=0;$i<$row;$i++){;
			$idpuntcont=mysql_result($result,$i,'idpuntcont');
			$descripcion=mysql_result($result,$i,'descripcion');
			$this->SetTextColor(0);
			$this->SetFont('Arial','B',8);
			$this->SetXY(20,$h);
			$this->MultiCell(150,10,strtoupper($descripcion),0,'J',0);
			$l=170;
			$p=$this->GetY();
				for($tr=$trdia[$j];$tr<$trdia[$k2];$tr++){;
				$fec=$año."-".$mes."-".$tr;
				$sql1="select * from datospuntcont where idcomu='".$idclientes."' and idemp='".$ide."' and idpuntcont='".$idpuntcont."' and fecha='".$fec."' order by hora";
				$result1=mysql_query ($sql1) or die ("Invalid result12");
				$row1=mysql_affected_rows();
				$e=$h;
					for ($f=0;$f<$row1;$f++){;
					$hora=mysql_result($result1,$f,'hora');
    			$this->SetXY($l,$e);
					$this->Cell(60,10,$hora,0,0,'C');
					$e=$e+10;
					if ($p<$e){;
					$p=$e;
					};
					
					};
				$l=$l+60;
				};
			$h=$this->GetY(); 
			if ($h<$p){;
			$h=$p;
			};
			$this->Line(20,$h,$g,$h);
			if ($h>=440){;
			
			$ñ=20;
			$this->Line($ñ,80,$ñ,$h);
			$ñ=$ñ+150;
			$this->Line($ñ,80,$ñ,$h);
			for($tr=$trdia[$j];$tr<$trdia[$k2];$tr++){;
			$ñ=$ñ+60;
						$this->Line($ñ,80,$ñ,$h);
					};
			
			$this->AddPage();
			$this->SetTextColor(0);
			$this->SetFont('Arial','B',8);
			$this->SetXY(20,60);
			$this->Cell(150,20,strtoupper($cabecera),1,0,'C');
				for($tr=$trdia[$j];$tr<$trdia[$k2];$tr++){;
					$this->Cell(60,20,strtoupper($tr)."-".$dias[date("w",mktime(0,0,0,$mes,$tr,$año))],1,0,'C');
				};
			$h=$this->GetY()+20;	
			};
		};
		$ñ=20;
			$this->Line($ñ,80,$ñ,$h);
			$ñ=$ñ+150;
			$this->Line($ñ,80,$ñ,$h);
			for($tr=$trdia[$j];$tr<$trdia[$k2];$tr++){;
			$ñ=$ñ+60;
						$this->Line($ñ,80,$ñ,$h);
					};
}

}



function FancyDia($idclientes,$ide,$mes,$año,$dia)
{
			$this->AddPage();
$fec=$año."-".$mes."-".$dia;
$sql1="select * from datospuntcont where idcomu='".$idclientes."' and idemp='".$ide."' and fecha='".$fec."' order by hora";
$result1=mysql_query ($sql1) or die ("Invalid result12");
$row1=mysql_affected_rows();


$this->SetTextColor(0);
$this->SetFont('Arial','B',8);
		for ($i=0;$i<$row1;$i++){;
				$idpuntcont=mysql_result($result1,$i,'idpuntcont');
				$hora=mysql_result($result1,$i,'hora');
				$idempempl=mysql_result($result1,$i,'idempempl');
				$idempl=mysql_result($result1,$i,'idempl');
				$idserv=mysql_result($result1,$i,'idserv');

$sql="SELECT * from puntcont where idempresas='".$ide."' and idclientes='".$idclientes."' and idpuntcont='".$idpuntcont."'"; 
$result=mysql_query ($sql) or die ("Invalid result");
$descripcion=mysql_result($result,0,'descripcion');

$sql2="SELECT * from empleados where idempresa='".$idempempl."' and idempleado='".$idempl."'"; 
$result2=mysql_query ($sql2) or die ("Invalid result");
$nombre=mysql_result($result2,0,'nombre');
$priape=mysql_result($result2,0,'1apellido');
$segape=mysql_result($result2,0,'2apellido');

$empleado=$nombre.", ".$priape." ".$segape;

$this->Cell(60,20,strtoupper($hora),0,0,'C');
$this->Cell(250,20,strtoupper($descripcion),0,0,'L');
$this->Cell(160,20,strtoupper($empleado),0,1,'L');

}

}





}

if ($tipo=="mes"){;
$pdf=new PDF('L','pt','A4');
$title10="INFORME MENSUAL: ".$meses[$m]." ".$y;
}else{;
$pdf=new PDF('P','pt','A4');
$title10="INFORME DIARIO : ".$d."-".$m."-".$y;
};
//Títulos de las columnas




//Carga de datos
//$data=$pdf->LoadData('inicio.html');
$pdf->SetFont('Arial','',14);
$pdf->AliasNbPages();
if ($tipo=="mes"){;
$pdf->FancyMes($idclientes,$ide,$m,$y);
}else{;
$fecha=$y."-".$m."-".$d;
$pdf->FancyDia($idclientes,$ide,$m,$y,$d);
};



$pdf->Output();
?>