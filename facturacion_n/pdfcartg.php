<?php 
include('bbdd.php');
include ('../yo.php');

if ($lemp!=$pemp){;
$title1=$demp.' '.$cpemp.' '.$lemp.' '.$pemp;
}else{;
$title1=$demp.' '.$cpemp.' '.$pemp;
};
$title2='N.I.F. -'.$nifemp;
$title3=$vemp;
$title4='Telefono/s -'.$telf.' - '.$telm;
$title5='Fax -'.$fax;
$imgemp='../img/'.$img;
$firmaemp='../img/'.$firma;


$today=getdate();
$a�o=$today['year'];
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

/*
function Header()
{
global $imgemp;
global $nombre;
if ($this->PageNo()!=1){;
    //Logo
$this->Image($imgemp,10,8,0,50);


		$this->SetFont('Arial','B',20);
		$this->SetXY(250,10);
		$this->Cell(100,20,strtoupper($nombre),0,0,'C');
    $this->SetFont('Arial','B',10);
    $this->SetXY(400,35);
    $this->Cell(100,20,'FECHA:  ____________________________________',0,0,'C');
  

	}

}
*/

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

/*
if ($this->PageNo()!=1){;
    $this->SetY(-15);
		$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
};
*/
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




function Fancy()
{
			$this->AddPage();
			$this->SetLeftMargin(25);
    $this->SetFont('Arial','B',12); 
    $this->Ln();
    $this->Cell(550,20,'CONTROL DE ENTRADAS / SALIDAS',0,0,'C');
    $this->Ln();
    $this->SetFont('Arial','B',8); 
		$this->Cell(42,15,'ENTRADA',1,0,'C');
		$this->Cell(42,15,'SALIDA',1,0,'C');
		$this->Cell(200,15,'EMPRESA / NOMBRE APELLIDOS',1,0,'C');
		$this->Cell(66,15,'DNI',1,0,'C');
		$this->Cell(200,15,'CONCEPTOS',1,1,'C');
for ($j=0;$j<20;$j++){;
		$this->Cell(42,18,' ',1,0,'C');
		$this->Cell(42,18,' ',1,0,'C');
		$this->Cell(200,18,' ',1,0,'C');
		$this->Cell(66,18,' ',1,0,'C');
		$this->Cell(200,18,' ',1,1,'C');
};
  	$this->SetFont('Arial','B',12); 
    $this->Ln();
    $this->Cell(550,20,'INCIDENCIAS',0,0,'C');
    $this->Ln();
    $this->SetFont('Arial','B',8); 
		$this->Cell(42,15,'HORA',1,0,'C');
		$this->Cell(508,15,'OBSERVACIONES',1,1,'C');
for ($j=0;$j<15;$j++){;
		$this->Cell(42,18,' ',1,0,'C');
		$this->Cell(508,18,' ',1,1,'C');
};


}

function Portada()
{

global $imgemp;
global $nombre;
//global $apellidop;
//global $apellidos;
global $user;
global $pass;
global $d1;
global $nmes;
global $a�o;
global $firmaemp;
/*
global $entrada;
global $mensajes;
global $accdiarias;
global $accmantenimiento;
global $niveles;
global $productos;
global $revision;
global $trabajo;
*/
global $web;

$title2='Estimado Gestor / a : '.$nombre.' a continuaci�n le adjuntamos su usuario y password para que puede acceder a los datos de los sitios que tenemos en com�n.';
/*
$title3[]='- Cuadrante';
*/
/*
if ($entrada==1){;
$title3[]='- Entrada / Salida';
};
if ($mensajes==1){;
$title3[]='- Mensajes';
};
*/

$titulo1='Madrid, '.$d1.' de '.$nmes.' de '.$a�o.' ';
			$this->AddPage();
if ($imgemp!='../img/'){;
$this->Image($imgemp,10,8,0,50);
};

		$this->SetFont('Arial','B',15);
		$this->SetXY(50,80);
		$this->Cell(100,20,'ASUNTO: CLAVES DE ACCESO AL SISTEMA',0,1,'L');
		//$this->SetXY(100,120);
		//$this->Cell(100,20,'E INCIDENCIAS',0,1,'L');
		   
		$this->SetFont('Arial','B',10);
		 $this->SetXY(350,50);
        		$this->Cell(100,$h,$titulo1,'',1,'L',1);
		$this->SetXY(50,200);
		$this->MultiCell(500,22,strtoupper($title2),0,'J');
		for ($jt=0;$jt<count($title3);$jt++){;
		$this->SetX(80);
		$this->MultiCell(500,22,strtoupper($title3[$jt]),0,'J');
		};
    $this->SetFont('Arial','B',10);
    $this->SetXY(200,400);
    $this->Cell(100,20,'USUARIO:  '.$user,0,0,'L');
     $this->SetXY(200,420);
    $this->Cell(100,20,'CLAVE:  '.$pass,0,0,'L');
    $this->SetXY(200,440);
    $this->Cell(100,20,'PAGINA WEB: '.$web,0,0,'L');
    
    $this->SetXY(50,450);
    $this->Cell(100,20,'Atentamente,',0,0,'L');

if ($firmaemp!='../img/'){;
$this->Image($firmaemp,300,490,0,90);
};

}


}
$pdf=new PDF('P','pt','A4');
//T�tulos de las columnas




//Carga de datos
//$data=$pdf->LoadData('inicio.html');
$pdf->SetFont('Arial','',14);
$pdf->AliasNbPages();

if ($dato=='todo'){;
$sql="SELECT * from gestores where idempresa='".$ide."' and estado='1'";
$result=mysqli_query($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);
for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result,$i);
$resultado=mysqli_fetch_array($result);
$idempl1=$resultado['idgestor'];
$nombre=$resultado['nombregestor'];
$apellidop=$resultado['percontacto'];
//$apellidos=$resultado['2apellido'];
$tele1=$resultado['telefono1'];
/*
$entrada=$resultado['entrada'];
$mensajes=$resultado['mensajes'];
$accdiarias=$resultado['accdiarias'];
$accmantenimiento=$resultado['accmantenimiento'];
$niveles=$resultado['niveles'];
$productos=$resultado['productos'];
$revision=$resultado['revision'];
$trabajo=$resultado['trabajo'];
*/

if ($tele1!=''){;
$sql3="SELECT * from usuarios where idempresas='".$ide."' and user='".$tele1."'"; 
$result3=mysqli_query($conn,$sql3) or die ("Invalid result2");
$row3=mysqli_num_rows($result3);
if ($row3!=0){;
$resultado3=mysqli_fetch_array($result3);
$user=$resultado3['user'];
$pass=$resultado3['password'];

			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_decrypt(base64_decode($pass), METHOD, $key, 0, $iv);
			$pass=$output;

}else{;
$user="HABLE CON EL DEPARTAMENTO DE INFORMATICA";
$pass="HABLE CON EL DEPARTAMENTO DE INFORMATICA";
};
}else{;
$user="HABLE CON EL DEPARTAMENTO DE INFORMATICA";
$pass="HABLE CON EL DEPARTAMENTO DE INFORMATICA";
};

$pdf->Portada();
};
}else{;


$sql="SELECT * from gestores where idempresa='".$ide."' and telefono1='".$dato."'";
$result=mysqli_query($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);
$resultado=mysqli_fetch_array($result);
$idempl1=$resultado['idgestor'];
$nombre=$resultado['nombregestor'];
$apellidop=$resultado['percontacto'];
/*
$entrada=$resultado['entrada'];
$mensajes=$resultado['mensajes'];
$accdiarias=$resultado['accdiarias'];
$accmantenimiento=$resultado['accmantenimiento'];
$niveles=$resultado['niveles'];
$productos=$resultado['productos'];
$revision=$resultado['revision'];
$trabajo=$resultado['trabajo'];
*/

$sql3="SELECT * from usuarios where idempresas='".$ide."' and user='".$dato."'"; 
$result3=mysqli_query($conn,$sql3) or die ("Invalid result2");
$row3=mysqli_num_rows($result3);

if ($row3!=0){;
$resultado3=mysqli_fetch_array($result3);
$user=$resultado3['user'];
$pass=$resultado3['password'];

			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_decrypt(base64_decode($pass), METHOD, $key, 0, $iv);
			$pass=$output;

}else{;
$user="HABLE CON EL DEPARTAMENTO DE INFORMATICA";
$pass="HABLE CON EL DEPARTAMENTO DE INFORMATICA";
};
$pdf->Portada();

};
$pdf->Output();
?>