<?php 
include('bbdd.php');
$dia=date("j",time());
//$mes=date("n",time());
//$a�o=date("Y",time());
$lugar=strtok($sitio,"/");
$lat=strtok("/");
$long=strtok("/");
$zenith=90;
$offset=0;
?>
<style>
hr {
    display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 1px;
    text-align: center;
} 
</style>

<?php 
function CalendarioPHP($year, $month, $day_heading_length = 3,$ide,  $idpccat, $idpunt, $idempleado ){
global $conn; 
global $lat;
global $long;
global $offset;
global $zenith;
// Parametros de aspecto del calendario 
$nombreFichero = basename($_SERVER['PHP_SELF']); 
$ColorFondoCelda = '#CCCCCC'; 
$ColorFondoTabla = '#666666'; 
$ColorFondoCeldasDiaSemana = '#fff4bf'; 
$ColorFondoCeldasDiaL = '#444444'; 
$ColorFondoCeldasDiaF = '#444444';
$ColorFondoCeldasDiaA = '#0000ff';  
$ColorFondoCeldasFestivo = '#ee0000'; 
$ColorFondoCeldaDiaActual = '#00ff00';
$ColorDiaLaboralT = '#000000';  
$ColorDiaLaboral = '#ffffff'; 
$ColorDiaFestivo = '#ffffff'; 
$ColorDiaActual = '#00ff00'; 
$TamanioFuente = '3'; 
$TamanioFuentes = '20px';
$TipoFuente = 'Tahoma,Verdana,Arial, Helvetica, sans-serif'; 
$AnchoCalendario = '1180'; 
$AltoCalendario = '400'; 
$AnchoCeldas = '100'; 
$AltoCeldas = '60'; 
$AlineacionHorizontalTexto = 'center'; 
$AlineacionVerticalTexto = 'top'; 

// ----------- INICIO Dias Festivos ---------- 
$sql="select * from diasfestivos where a�o='".$year."' order by mes asc"; 
$result=mysqli_query ($conn,$sql) or die ("Invalid query");
$row=mysqli_num_rows($result);

if ($row==0){;
$DiasFestivos[0] = '1/1'; // 1 de enero 
$DiasFestivos[1] = '6/1'; // 6 de enero 
$DiasFestivos[2] = '19/3'; // 19 de marzo 
$DiasFestivos[3] = '1/5'; // 1 de mayo 
$DiasFestivos[4] = '15/8'; // 15 de agosto 
$DiasFestivos[5] = '12/10'; // 12 de octubre 
$DiasFestivos[6] = '1/11'; // 1 de noviembre 
$DiasFestivos[7] = '6/12'; // 6 de diciembre 
$DiasFestivos[8] = '25/12'; // 25 de diciembre 
// festivos Regionales 
$DiasFestivos[9] = '2/5'; // 2 de mayo 
$DiasFestivos[10] = '15/5'; // 15 de mayo 
$DiasFestivos[11] = '9/9'; // 9 de noviembre 
// Semana Santa 
$DiasFestivos[12] = '17/4'; // Jueves Santo 
$DiasFestivos[13] = '18/4'; // Viernes Santo
$row=14; 
}else{;
for ($l=0;$l<$row;$l++){;
mysqli_data_seek($result,$l);
$resultado=mysqli_fetch_array($result);
$df=$resultado['dia']; 
$mf=$resultado['mes']; 
$DiasFestivos[$l] = $df.'/'.$mf;
};
};


// ----------- FIN Dias Festivos ---------- 

//Calculo la fecha actual 
$dia_actual=date("j",time()); 
$mes_actual=date("n",time()); 
$anio_actual=date("Y",time()); 

$first_of_month = mktime (0,0,0, $month, 1, $year); 
#remember that mktime will automatically correct if invalid dates are entered 
# for instance, mktime(0,0,0,12,32,1997) will be the date for Jan 1, 1998 
# this provides a built in "rounding" feature to generate_calendar() 

static $day_headings = array('Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo'); 
$maxdays = date('t', $first_of_month); #number of days in the month 
$date_info = getdate($first_of_month); #get info about the first day of the month 
$month = $date_info['mon']; 
$year = $date_info['year']; 

//Traduzco los meses de ingles a Espa�ol 
switch ($date_info[month]) { 
case "January" : $mes_info="Enero";break; 
case "February" : $mes_info="Febrero";break; 
case "March" : $mes_info="Marzo";break; 
case "April" : $mes_info="Abril";break; 
case "May" : $mes_info="Mayo";break; 
case "June" : $mes_info="Junio";break; 
case "July" : $mes_info="Julio";break; 
case "August" : $mes_info="Agosto";break; 
case "September": $mes_info="Septiembre";break; 
case "October" : $mes_info="Octubre";break; 
case "November" : $mes_info="Noviembre";break; 
case "December" : $mes_info="Diciembre";break; 
}; 

//Comienzo la tabla que contiene el calendario 
$calendar = ("<table "). 
("border='0' "). 
("height='".$AltoCalendario."' "). 
("width='".$AnchoCalendario."' "). 
("cellspacing='1' cellpadding='2' "). 
("bgcolor='".$ColorFondoTabla."'>\n"); 

//Cabecera de la tabla calendario 
//Use the <caption> tag or just a normal table heading. Take your pick. 
//$calendar .= "<caption class=\\"month\\">$date_info[month], $year</caption>\n"; 
//$calendar .= ("<tr>\n"). 
("<th height='".$AltoCeldas."' colspan='7'>"). 
("<font color='".$ColorDiaFestivo."' size=".$TamanioFuente." face='".$TipoFuente."'>"). 
("$mes_info, $year"). 
("</font>"). 
("</th>\n</tr>\n"); 

// Imprime los dias de la semana "Lun", "Mar", etc. 
// Si day_heading_length es 4, aparecer� el nombre entero del dia 
// si no, solo imprime los n primeros caracteres 
if($day_heading_length > 0 and $day_heading_length <= 4){ 
$calendar .= "<tr>\n"; 
foreach($day_headings as $day_heading){ 
$calendar .= ("<th height='".$AltoCeldas."' abbr='".$day_heading."' class='dayofweek' bgcolor='".$ColorFondoCeldasDiaSemana.
("' align='".$AlineacionHorizontalTexto). 
"'>"). 
("<font color='".$ColorDiaLaboralT."' size='".$TamanioFuente."' face='".$TipoFuente."'>").
($day_heading). 
//($day_heading_length != 4 ? substr($day_heading, 0, $day_heading_length) : $day_heading). 

("</font>"). 
("</th>\n"); 
} 
$calendar .= "</tr>\n"; 
} 
$calendar .= "<tr>\n"; 

//$weekday = $date_info['wday']; //Para que sea el Domingo el primer dia de la semana 
$weekday = $date_info['wday']-1; #weekday (zero based) of the first day of the month 
if ($weekday==-1) $weekday=6; //Por si el Domingo es el dia 1 del mes 
$day = 1; #starting day of the month 

// Cuidadin con los primeros dias "vacios" del mes 
if($weekday > 0){ 
$calendar .= ("<td bgcolor='".$ColorFondoTabla). 
("' colspan='".$weekday."'></td>\n"); 
} 

//Imprimimos los dias del mes 
while ($day <= $maxdays){ 
if($weekday == 7){ //Empieza una nueva semana 
$calendar .= "</tr>\n<tr>\n"; 
$weekday = 0; 
} 

//Miro si el dia que voy a pintar es festivo 
$esFestivo = 0; 
$tmp_date=$day."/".$month; 
for ($i=0;$i<$row;$i++) { 
if ($tmp_date==$DiasFestivos[$i]) {$esFestivo=1;break;} 
} 

$calendar .= ("<td width='".$AnchoCeldas). 
("' height='".$AltoCeldas). 
("' align='".$AlineacionHorizontalTexto). 
("' valign='".$AlineacionVerticalTexto). 
("' "); 

// Coloreo el fondo dependiendo del dia en el que nos encontremos 
$calendar .= "bgcolor='"; 
if (($day==$dia_actual) and 
($month==$mes_actual) and 
($year==$anio_actual)) { //Si el dia es el de hoy 
$calendar .= $ColorFondoCeldaDiaActual; 
} else { // Si el dia no es el de hoy 
if (($weekday == 5) or ($weekday == 6) or ($esFestivo==1)) { // Si estoy en fin de semana weekday=5,6 
$calendar .= $ColorFondoCeldasFestivo; 
} else { 
$calendar .= $ColorFondoCelda; 
}; 
}; 
// Aqui es donde le pongo lo que tiene que hacer en caso de exista enlace 
$calendar .= "'>";


$calendar .= "<div style='padding:15px;font-weight:bold;font-size:$TamanioFuentes;font-family:$TipoFuente;";




if (($day==$dia_actual) and ($month==$mes_actual) and ($year==$anio_actual)) {	 //Si el dia es el de hoy 
$calendar .= "background-color:$ColorFondoCeldasDiaA;color:$ColorDiaActual"; 

} else { // Si el dia no es el de hoy 

if (($weekday == 5) or ($weekday == 6) or ($esFestivo==1)) { // Si estoy en fin de semana weekday=5,6 
$calendar .= "background-color:$ColorFondoCeldasDiaF;color:$ColorDiaFestivo"; 

} else {
$calendar .= "background-color:$ColorFondoCeldasDiaL;color:$ColorDiaLaboral"; 	

	
	}; 
}; 

$calendar .= "' >".$day."</div><br/>";




$fecha_b=$year."-".$month."-".$day;

$sql="SELECT * from almpc where idempresas='".$ide."' and idpccat='".$idpccat."'";
if ($idpunt!='todos'){
$sql.=" and idpcsubcat='".$idpunt."'";
}
$sql.=" and idempleado='".$idempleado."'";
$sql.=" and dia='".$fecha_b."' order by id asc";
//echo $sql.'<br/>';
$result=mysqli_query ($conn,$sql) or die ("Invalid result almpc");
$row=mysqli_num_rows($result);

if($row!=0){;

for ($i=0; $i<$row; $i++){;
mysqli_data_seek($result,$i);
$resultado=mysqli_fetch_array($result);
$idpcsubcat=$resultado['idpcsubcat'];
$cantidad=$resultado['cantidad'];
$idcli=$resultado['idpiscina'];
$hora=$resultado['hora'];


//calculo de horas

if ($idpcsubcat==1){;


if ($controldiaentrada!=$fecha_b){
$controlhoraentrada=0;
}

if ($controlhoraentrada==0){;
$controldiaentrada=$fecha_b;
$controlhoraentrada=$hora;
};



}else{

	
if ($controlhorasalida==0){;

$controldiasalida=$fecha_b;
$controlhorasalida=$hora;


if ($controldiaentrada==0){;
$controldiaentrada=$fecha_b;
$horaa=$controlhorasalida;
$controlhoraentrada=$horaa;
};




$dia1=explode ("-",$controldiaentrada);
$dia2=explode ("-",$controldiasalida);
       $YDesde=$dia1[0];
       $MDesde=$dia1[1];
       $DDesde=$dia1[2];      
       $YHasta=$dia2[0];
       $MHasta=$dia2[1];
       $DHasta=$dia2[2];
$hora1 = explode(":",$controlhoraentrada);
$hora2 = explode(":", $controlhorasalida);
       $HoraDesde=$hora1[0];
       $MinutoDesde=$hora1[1];
       $HoraHasta=$hora2[0];
       $MinutoHasta=$hora2[1];
       
$anterior=mktime($HoraDesde,$MinutoDesde,0,$MDesde,$DDesde,$YDesde);
$actual=mktime($HoraHasta,$MinutoHasta,0,$MHasta,$DHasta,$YHasta);
$diferencia=$actual-$anterior;

    
       $TotHorasTrab=intval($diferencia / 3600);
       $RestaHoras=($diferencia - ($TotHorasTrab*3600) );
       $TotMinTrab=intval($RestaHoras/60);
 if($TotMinTrab<10){
 $TotMinTrab='0'.$TotMinTrab;
 };


$controlhora=$TotHorasTrab;
$controlmin=$TotMinTrab;

//$controlhora=($controlhorasalida - $controlhoraentrada);
$controlhoratotal=$controlhoratotal+$controlhora;
$controlmintotal=$controlmintotal+$controlmin;

$difhoras =$controlhora.":".$controlmin;

$controldiaentrada=0;
$controldiasalida=0;
$controlhoraentrada=0;
$controlhorasalida=0;
};
};

if ($idcli<10){;
switch($idcli){;
case '1':$nombre="Teletrabajo";break;
};
}else{;
$sqlempl="SELECT * from clientes where idempresas='".$ide."' and idclientes='".$idcli."'";
//echo $sqlempl.'<br/>';
$resultempl=mysqli_query ($conn,$sqlempl) or die ("Invalid result empl");
$rowempl=mysqli_num_rows($resultempl);
$resultadoempl=mysqli_fetch_array($resultempl);
if ($rowempl==0){;
$nombre="sin datos";
}else{;
$nombre=$resultadoempl['nombre'];
};
};
//echo $nempleado;

$sqlsub="SELECT * from puntservicios where idempresas='".$ide."' and idpcsubcat='".$idpcsubcat."' and idpccat='".$idpccat."' ";
//echo $sql;
$resultsub=mysqli_query ($conn,$sqlsub) or die ("Invalid result sub");
$resultadosub=mysqli_fetch_array($resultsub);
$subcategoria=$resultadosub['subcategoria'];
if ($idpcsubcat==1){;
$imgdat="../../img/entrada.png";
}else{;
$imgdat="../../img/salida.png";
};
//$calendar. ="<img src='".$imgdat."' width='15px'>";

$calendar .= "<font size='1'>"; 
$calendar .= strtoupper($subcategoria)." - ".$hora."<br/>";
$calendar .= strtoupper($nombre)."</font><hr align='center'>";

if ($idpcsubcat==2){
$calendar .= "<font size='1'>Horas Trabajadas: <b>".$difhoras."</b></font><br/>";
$calendar .= "<hr align='center'>";

}


};
};

//$fecha_a=mktime(0,0,0,$month,$day,$year);
//$ssol=date_sunrise($fecha_a, SUNFUNCS_RET_STRING, $lat, $long, $zenith, $offset);

//$calendar .='<br>Sal Sol:'.date_sunrise($fecha_a, SUNFUNCS_RET_STRING, $lat, $long, $zenith, $offset);
//$calendar .='<br>Pue Sol:'.date_sunset($fecha_a, SUNFUNCS_RET_STRING, $lat, $long, $zenith, $offset);
$calendar .="</td>\n"; 
$day++; 
$weekday++; 
} 

//Cuidadin con los ultimos dias vacios del mes 
if($weekday != 7){ 
$calendar .= '<td bgcolor="'.$ColorFondoTabla.'" colspan="' . (7 - $weekday) . '"></td>'; 
} 

$calendar .='</tr>';


$tiempomt=$controlhoratotal*3600+$controlmintotal*60;
       $THorasTrab=intval($tiempomt / 3600);
       $RHoras=($tiempomt - ($THorasTrab*3600) );
       $TMinTrab=intval($RHoras/60);
 if($TMinTrab<10){
 $TMinTrab='0'.$TMinTrab;
 };


$horatotal=$THorasTrab;
$mintotal=$TMinTrab;

$calendar .="<tr><td colspan='7'>";
$calendar .= "<div style='padding:15px;font-weight:bold;font-size:$TamanioFuentes;font-family:$TipoFuente;";
$calendar .= "background-color:$ColorFondoCeldasDiaA;color:$ColorDiaActual' >";
$calendar .="Horas totales trabajadas: $horatotal h : $mintotal m ";
$calendar .="</div></td>";

//Chinnnnn pon, devolvemos toda la cadena calendario 
return $calendar . "</tr>\n</table>\n"; 
} // Fin de la funcion CalendarioPHP(a�o, mes, caracteres del dia) 




if ($mes==0){;
for($j=1; $j<13; $j++){;
$mes=$j;
echo CalendarioPHP($yea, $mes, $dia,$ide,  $idpccat, $idpunt, $idempleado); 
};
}else{;
echo CalendarioPHP($yea, $mes, $dia,$ide,  $idpccat, $idpunt, $idempleado); 
};
?> 
<hr>

</div>