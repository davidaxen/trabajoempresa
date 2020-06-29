<?php 
include('bbdd.php');
$dia=date("j",time());
//$mes=date("n",time());
//$año=date("Y",time());
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
function CalendarioPHP($year, $month, $day_heading_length = 3,$ide,  $idpccat, $idpunt, $idclientes     ){ 
global $lat;
global $long;
global $offset;
global $zenith;
global $conn;
// Parametros de aspecto del calendario 
$nombreFichero = basename($_SERVER['PHP_SELF']); 
$ColorFondoCelda = '#CCCCCC'; 
$ColorFondoTabla = '#666666'; 
$ColorFondoCeldasDiaSemana = '#fff4bf'; 
$ColorFondoCeldasFestivo = '#ee0000'; 
$ColorFondoCeldaDiaActual = '#00ff00'; 
$ColorDiaLaboral = '#444444'; 
$ColorDiaFestivo = '#ffffff'; 
$ColorDiaActual = '#0000ff'; 
$TamanioFuente = '3'; 
$TipoFuente = 'Tahoma,Verdana,Arial, Helvetica, sans-serif'; 
$AnchoCalendario = '1180'; 
$AltoCalendario = '400'; 
$AnchoCeldas = '100'; 
$AltoCeldas = '60'; 
$AlineacionHorizontalTexto = 'center'; 
$AlineacionVerticalTexto = 'center'; 

// ----------- INICIO Dias Festivos ---------- 
$sql="select * from diasfestivos where año='".$year."' order by mes asc"; 

$result=$conn->query($sql);
$fetchAll=$result->fetchAll();
$row=count($fetchAll);
//$result=mysqli_query ($conn,$sql) or die ("Invalid query");
//$row=mysqli_num_rows($result);

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
}else{

foreach ($result as $row) {
	$df=$row['dia']; 
	$mf=$row['mes'];
//for ($l=0;$l<$row;$l++){;
//mysqli_data_seek($result, $l);
//$resultado=mysqli_fetch_array($result);
//$df=$resultado['dia']; 
//$mf=$resultado['mes']; 
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

//Traduzco los meses de ingles a Español 
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
// Si day_heading_length es 4, aparecerá el nombre entero del dia 
// si no, solo imprime los n primeros caracteres 
if($day_heading_length > 0 and $day_heading_length <= 4){ 
$calendar .= "<tr>\n"; 
foreach($day_headings as $day_heading){ 
$calendar .= ("<th height='".$AltoCeldas."' abbr='".$day_heading."' class='dayofweek' bgcolor='".$ColorFondoCeldasDiaSemana."'>"). 
("<font color='".$ColorDiaLaboral."' size='".$TamanioFuente."' face='".$TipoFuente."'>"). 
($day_heading_length != 4 ? substr($day_heading, 0, $day_heading_length) : $day_heading). 
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

$calendar .= "<font color='"; 

if (($day==$dia_actual) and ($month==$mes_actual) and ($year==$anio_actual)) { //Si el dia es el de hoy 
$calendar .= $ColorDiaActual; 
} else { // Si el dia no es el de hoy 
if (($weekday == 5) or ($weekday == 6) or ($esFestivo==1)) { // Si estoy en fin de semana weekday=5,6 
$calendar .= $ColorDiaFestivo; 
} else {$calendar .= $ColorDiaLaboral;}; 
}; 
$calendar .= ("' "). 
("size='".$TamanioFuente."' "). 
("face='".$TipoFuente."'><strong>".$day). 
("</strong></font><br/>");




$fecha_b=$year."-".$month."-".$day;

$sql="SELECT * from almpcronda where idempresas='".$ide."' and idcliente='".$idclientes."' ";
/*
if ($idpunt!='todos'){
$sql.=" and idpcsubcat='".$idpunt."'";
}
if ($idclientes!='todos'){
$sql.=" and idpiscina='".$idclientes."'";
}
*/
$sql.=" and (texto!='' or img!='') and dia='".$fecha_b."' order by id asc";
//echo $sql;

$result=$conn->query($sql);
$fetchAll=$result->fetchAll();
$row=count($fetchAll);

//$result=mysqli_query ($conn,$sql) or die ("Invalid result0");
//$row=mysqli_num_rows($result);

if($resultado!=0){

foreach ($result as $row) {
	$hora=$row['hora'];
	$idpcronda=$row['id'];	

//for ($i=0; $i<$row; $i++){;
//mysqli_data_seek($result, $i);
//$resultado=mysqli_fetch_array($result);
//$hora=$resultado['hora'];
//$idpcronda=$resultado['id'];
$year."-".$month."-".$day;
$calendar .= "<font size='1'>";
$calendar .= "<a href='ipcdhorai.php?idpcronda=".$idpcronda."&hora=".$hora."&d=".$day."&m=".$month."&y=".$year."&idclientes=".$idclientes."&ide=".$ide."'>";
$calendar .=$hora;
$calendar .="</a>&nbsp;&nbsp;";

$jk=fmod($i,3);
if($jk==0){;
$calendar .="<br/>";
};

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

//Chinnnnn pon, devolvemos toda la cadena calendario 
return $calendar . "</tr>\n</table>\n"; 
} // Fin de la funcion CalendarioPHP(año, mes, caracteres del dia) 




if ($mes==0){;
for($j=1; $j<13; $j++){;
$mes=$j;
echo CalendarioPHP($yea, $mes, $dia,$ide,  $idpccat, $idpunt, $idclientes  ); 
};
}else{;
echo CalendarioPHP($yea, $mes, $dia,$ide,  $idpccat, $idpunt, $idclientes     ); 
};
?> 
</div>