<?php 
include('../bbdd/sqlfacturacion.php');


$sql="select sum(total) as value1 from facturas where cobrado='0' and idempresas='".$ide."'";
$result=mysql_query ($sql) or die ("Invalid result1");
$row=mysql_affected_rows();
if($row!=null){;
$cobro=mysql_result($result,'0','value1');
}else{;
$cobro=0;
};

$sql1="select sum(importe) as value1, sum(iva) as value2 from frecibidas where pagado='0' and idempresa='".$ide."'";
$result1=mysql_query ($sql1) or die ("Invalid result1");
$row1=mysql_affected_rows();
if($row1!=null){;
$pago1=mysql_result($result1,'0','value1');
$pago2=mysql_result($result1,'0','value2');
$pago=$pago1+$pago2;
}else{;
$pago=0;
};


include('../bbdd/sqlcontabilidad.php');
$cimp1=0;
$cimp2=0;
$sql22="select subcuenta from cuentas where cuenta='477' and idempresa='".$ide."'";
$result22=mysql_query ($sql22) or die ("Invalid result22");
$row00=mysql_affected_rows();
if ($row00!='0'){;
$cimp1=mysql_result($result22,0,'subcuenta');
};

$sql01="select sum(debe) as value01, sum(haber) as value02 from asientos where  idempresas='".$ide."' and categoria='".$cimp1."'";
$result01=mysql_query ($sql01) or die ("Invalid result01");
$row01=mysql_affected_rows();

if($row01!=null){;
$value01=mysql_result($result01,'0','value01');
$value02=mysql_result($result01,'0','value02');
$ivar=$value02-$value01;
}else{;
$ivar=0;
};


$sql23="select subcuenta from cuentas where cuenta='472' and idempresa='".$ide."'";
$result23=mysql_query ($sql23) or die ("Invalid result23");
$row00=mysql_affected_rows();
if ($row00!='0'){;
$cimp2=mysql_result($result23,0,'subcuenta');
};
$sql02="select sum(debe) as value01, sum(haber) as value02 from asientos where idempresas='".$ide."' and categoria='".$cimp2."'";
$result02=mysql_query ($sql02) or die ("Invalid result02");
$row02=mysql_affected_rows();
if($row02!=null){;
$value10=mysql_result($result02,'0','value01');
$value20=mysql_result($result02,'0','value02');
$ivas=$value10-$value20;
}else{;
$ivas=0;
};

?>

		<style>
	body {
	top:5;
	left:5;
	height: 100%;
	width:100%;
	margin: 0 auto;
	padding:5;
	text-align:left; 
	font-family: Arial, Helvetica, sans-serif;
	font-size:6px;
	line-height:1.5em;
}
table{
font-size:14px;
}
	</style>
<body onload="window.setTimeout('self.location.reload()',100000)">

<table>
<tr><td colspan=3><br><br></td></tr>
<tr><td colspan=3>Cantidades Pendientes</td></tr>
<tr><td>Cobro</td><td>&nbsp;</td><td><?=$cobro;?></td></tr>
<tr><td>Pago</td><td>&nbsp;</td><td><?=$pago;?></td></tr>
</table>
<table><tr><td colspan=3>IVA</td></tr>
<tr><td>Repercutido</td><td>&nbsp;</td><td><?=$ivar;?></td></tr>
<tr><td>Soportado</td><td>&nbsp;</td><td><?=$ivas;?></td></tr>
</table>
</body>