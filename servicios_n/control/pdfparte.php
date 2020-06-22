<?php 
include('bbdd.php');

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


define('FPDF_FONTPATH','font/');
require('../../fpdf.php');

class PDF extends FPDF
{
//Cargar los datos



function Header()
{
    //encabezado general
global $plantilla;
global $imgemp;
global $nemp;

  $title='PARTE DE TRABAJO';
	

    //Logo
$plantillap='../../img/'.$plantilla;    
   

$this->Image($plantillap,0,0,600,850);
$this->Image($imgemp,10,8,0,50);	

    //Arial bold 15
    $this->SetFont('Arial','B',14);
    //Movernos a la derecha
    $this->SetXY(150,20);
    //Título
    $this->Cell(200,20,$title,0,0,'L');
    $this->Ln();
    $this->SetXY(150,40);
    $this->Cell(200,20,$nemp,0,0,'L');

    //Salto de línea
    $this->Ln();





}

//Pie de página

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

$this->TextWithRotation(10,660,$title,90,0);




    //Posición: a 1,5 cm del final
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Número de página
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


function FancyTable()
{
global $id;
global $ide;
global $imgemp;
global $conn;

 $this->SetTextColor(0);
    $this->SetFont('Arial','B',8);


//Datos

$sql1="SELECT * from accsiniestros where id='".$id."'";
$result1=$conn->query($sql1);
$resultado1=$result1->fetch();

/*$result1=mysqli_query ($conn,$sql1) or die ("Invalid result");
$resultado1=mysqli_fetch_array($result1);*/
$idsiniestro=$resultado1['idsiniestro'];
$trabajor=$resultado1['trabajorealizado'];
$trabajop=$resultado1['trabajopendiente'];
$descripcion1=$resultado1['descripcion'];
$diaent=$resultado1['diaentrada'];
$horaent=$resultado1['horaentrada'];
$diasal=$resultado1['diasalida'];
$horasal=$resultado1['horasalida'];
$idempleado=$resultado1['idempleado'];
$firmaaseg=$resultado1['firma'];

$sql2="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempleado."'"; 
$result2=$conn->query($sql2);
$resultado2=$result2->fetch();

/*$result2=mysqli_query ($conn,$sql2) or die ("Invalid result");
$resultado2=mysqli_fetch_array($result2);*/
$nombre=$resultado2['nombre'];
$priapellido=$resultado2['1apellido'];
$segapellido=$resultado2['2apellido'];
$trab=$nombre.', '.$priapellido.' '.$segapellido;

$sql="SELECT * from siniestros where idempresa='".$ide."' and idsiniestro='".$idsiniestro."'";
$result=$conn->query($sql);
$resultado=$result->fetch();

/*$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$resultado=mysqli_fetch_array($result);*/
$numsiniestro=$resultado['numsiniestro'];
$contacto=$resultado['contacto'];
$telefono=$resultado['telefono'];
$direccion=$resultado['direccion'];
$localidad=$resultado['localidad'];
$provincia=$resultado['provincia'];
$cp=$resultado['cp'];
$email=$resultado['email'];
$descripcion=$resultado['descripcion'];

if ($firmaaseg!=''){;
//$this->Image('../../img/'.$firmaaseg,400,70,0,50);
//$this->Image($imgemp,400,70,0,50);
};

	 $this->SetXY(400,60);
    $this->MultiCell(180,12,'Firma del Asegurado ',0,'L');
	 $this->SetXY(400,70);
    $this->MultiCell(180,150,' ',1,'L');

$jk=$t+50;
$gt=12;
$at=350;
    $this->SetFont('Arial','B',10);
    $this->SetXY($jk,60);
    $this->MultiCell($at,$gt,'Num. Siniestro '.strtoupper($numsiniestro),0,'L');
    $this->SetX($jk);
    $this->MultiCell($at,$gt,'Persona de Contacto '.strtoupper($contacto),0,'L');
	 $this->SetX($jk);
    $this->MultiCell($at,$gt,'Direccion '.strtoupper($direccion),0,'L');
    $this->SetX($jk);
    $this->MultiCell($at,$gt,'Localidad '.strtoupper($localidad),0,'L');
    $this->SetX($jk);
    $this->MultiCell($at,$gt,'Provincia '.strtoupper($provincia),0,'L');
    $this->SetX($jk);
    $this->MultiCell($at,$gt,'Codigo Postal '.strtoupper($cp),0,'L');
    $this->SetX($jk);
    $this->MultiCell($at,$gt,'Correo Electronico '.strtoupper($email),0,'L');

    $this->Ln();
    $this->SetFont('Arial','B',10);
    $this->SetX($jk);
    $this->MultiCell($at,$gt,'Trabajador '.strtoupper($trab),0,'L');
    $this->SetX($jk);
    $this->MultiCell($at,$gt,'Dia y Hora de Entrada '.strtoupper($diaent).' '.strtoupper($horaent),0,'L');
    $this->SetX($jk);
    $this->MultiCell($at,$gt,'Dia y Hora de Salida '.strtoupper($diasal).' '.strtoupper($horasal),0,'L');
  
    $this->Ln();    
    $this->Ln();
    
$jk=$t+20;   
    $this->SetFont('Arial','B',14);
    $this->SetX($jk);
    $this->Cell(0,20,'Datos facilitados del siniestro ',0,1,'L');
    $this->SetFont('Arial','',10);
    $this->SetX($jk);
    $this->MultiCell(0,20,strtoupper($descripcion),0,'L');

    $this->SetFont('Arial','B',14);
    $this->SetX($jk);
    $this->Cell(0,20,'Descripcion de lo encontrado ',0,1,'L');
    $this->SetFont('Arial','',10);
    $this->SetX($jk);
    $this->MultiCell(0,20,strtoupper($descripcion1),0,'L');    
    
    $this->SetFont('Arial','B',14);
    $this->SetX($jk);
    $this->Cell(0,20,'Trabajos Realizados ',0,1,'L');
    $this->SetFont('Arial','',10);
    $this->SetX($jk);
    $this->MultiCell(0,20,strtoupper($trabajor),0,'L');  
    
    $this->SetFont('Arial','B',14);
    $this->SetX($jk);
    $this->Cell(0,20,'Trabajos Pendientes ',0,1,'L');
    $this->SetFont('Arial','',10);
    $this->SetX($jk);
    $this->MultiCell(0,20,strtoupper($trabajop),0,'L'); 
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