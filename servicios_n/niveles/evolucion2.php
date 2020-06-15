<?php  // content="text/plain; charset=utf-8"
include('bbdd.php');


$fechaa=date("Y-m-d", mktime(0, 0, 0, $m, 1, $y));
$fechab=date("Y-m-d", mktime(0, 0, 0, $m+1, 0, $y));


$sqlsub="SELECT * from puntservicios where idempresas='".$ide."' and idpcsubcat='".$idpunt."' and idpccat='".$idpccat."' ";
$resultsub=mysqli_query ($conn,$sqlsub) or die ("Invalid result sub");
$resultadosub=mysqli_fetch_array($resultsub);
$subcategoria=$resultadosub['subcategoria'];


$sql="SELECT * from almpc where idempresas='".$ide."' and idpiscina='".$idclientes."' and idpccat='".$idpccat."'";
$sql.=" and idpcsubcat='".$idpunt."'";
$sql.=" and tiempo between '".$fechaa."' and '".$fechab."' order by id asc";
//echo $sql.'<br/>';
$result=mysqli_query ($conn,$sql) or die ("Invalid result 0");
$row=mysqli_num_rows($result);

for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result,$i);
$resultado=mysqli_fetch_array($result);
$dia=$resultado['dia'];
$cantidad=$resultado['cantidad'];
$data[] = array($dia, $cantidad);
};
   
include("../../graficos/phplot.php");


$plot = new PHPlot(1000, 300);
$plot->SetImageBorderType('plain');

$plot->SetPlotType('bars');
$plot->SetDataType('text-data');
$plot->SetDataValues($data);
$plot->SetDataColors(array('magenta'));
# Main plot title:
$plot->SetTitle($subcategoria.' entre '.$fechaa.' y '.$fechab);

# No 3-D shading of the bars:
$plot->SetShading(0);

# Make a legend for the 3 data sets plotted:
$plot->SetLegend(array($subcategoria));

# Turn off X tick labels and ticks because they don't apply here:
$plot->SetXTickLabelPos('none');
$plot->SetXTickPos('none');

$plot->DrawGraph();

?>