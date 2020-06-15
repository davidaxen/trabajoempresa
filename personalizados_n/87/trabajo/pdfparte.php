<?
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
$imgemp='../../../img/'.$img;
$firmaemp='../../../img/'.$firma;


define('FPDF_FONTPATH','font/');
require('../../../fpdf.php');

class PDF extends FPDF
{
//Cargar los datos



function Header()
{
    //encabezado general
global $plantilla;
global $idsiniestro;
global $ide;
global $imgemp;
global $nemp;
global $conn;

$sql="SELECT * from trabajos where idempresa='".$ide."' and idsiniestro='".$idsiniestro."'"; 
$result=mysqli_query($conn,$sql) or die ("Invalid result");
$resultado=mysqli_fetch_array($result);
$numsiniestro=$resultado['numsiniestro'];



  $title='ORDEN DE TRABAJO : '.$numsiniestro;
	

    //Logo
$plantillap='../../../img/'.$plantilla;    
   

$this->Image($plantillap,0,0,600,850);
$this->Image($imgemp,50,8,0,50);	

    //Arial bold 15
    $this->SetFont('Arial','B',14);
    //Movernos a la derecha
    $this->SetXY(250,20);
    //T�tulo
    $this->Cell(200,20,$title,0,0,'L');
    $this->Ln();
    $this->SetXY(250,40);
    $this->Cell(200,20,strtoupper($nemp),0,0,'L');

    //Salto de l�nea
    $this->Ln();





}

//Pie de p�gina

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




    //Posici�n: a 1,5 cm del final
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //N�mero de p�gina
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
 
global $idsiniestro;
global $ide;
global $imgemp;


 $this->SetTextColor(0);

    $this->Ln(10); 


//Datos
$t=0;
$jk=$t+50;
$gt=12;
$at=350;



$sql1="SELECT * from acctrabajos where idsiniestro='".$idsiniestro."' and idempresa='".$ide."' order by id asc"; 
$result1=mysqli_query($conn,$sql1) or die ("Invalid result");
$tg=mysqli_num_rows($result1);



for ($t=0;$t<$tg;$t++){;
mysqli_data_seek($result1,$t);
$resultado1=mysqli_fetch_array($result1);
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
$result2=mysqli_query($conn,$sql2) or die ("Invalid result");
$resultado2=mysqli_fetch_array($result2);
$nombre=$resultado2['nombre'];
$priapellido=$resultado2['1apellido'];
$segapellido=$resultado2['2apellido'];
$trab=$nombre.', '.$priapellido.' '.$segapellido;


$jk=50;
     
$border=1;
    $this->SetFont('Arial','B',10);
    $this->SetX($jk);
    $this->Cell(295,20,'Trabajador',$border,0,'L');
    $this->Cell(100,20,'Dia Entrada',$border,0,'L'); 
    $this->Cell(100,20,'Dia Fin',$border,0,'L');
    $this->Ln();
    $this->SetX($jk);
    $this->Cell(295,20,$trab,$border,0,'L');
    $this->Cell(100,20,$diaent,$border,0,'L'); 
    $this->Cell(100,20,$diasal,$border,0,'L'); 
    $this->Ln();
    $this->SetX($jk);      
    $this->Cell(165,20,'Trabajo Solicitado',$border,0,'L');
    $this->Cell(165,20,'Trabajo Realizado',$border,0,'L');
    $this->Cell(165,20,'Trabajo Pendiente',$border,0,'L'); 
    $this->Ln();
    $this->SetX($jk);      
    $this->Cell(165,20,$descripcion1,$border,0,'L');
    $this->Cell(165,20,$trabajor,$border,0,'L');
    $this->Cell(165,20,$trabajop,$border,0,'L');
    $this->Ln(); 
    $this->SetX($jk);      
    $this->Cell(495,20,'Firma',$border,0,'L');     
    $this->Ln(); 
    $this->SetX($jk);
    				$yimg=$this->GetY();
    				$yimg=$yimg+10;  
	 if ($firmaaseg!=''){;
			$this->Image('../../../img/'.$firmaaseg,200,$yimg,180,150);
			};    
    $this->Cell(495,200,'',$border,0,'L');    
    $this->Ln(250);
    
    //$this->SetX($jk);
    //$this->MultiCell(0,20,strtoupper($descripcion),0,'L');
				
				$yf=$this->GetY();
				if ($yf>620){;
				$this->AddPage();
				};



}
     
}

}


$pdf=new PDF('P','pt','A4');
//T�tulos de las columnas


//Carga de datos
//$data=$pdf->LoadData('inicio.html');
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->FancyTable();

$pdf->Output();

?>