<?
include('bbdd.php');

$valor="lon ".$lon."-lat ".$lat;
$lon1=strtok($lon,",");
$lon2=strtok(",");
$lon=$lon1.".".$lon2;

$lat1=strtok($lat,",");
$lat2=strtok(",");
$lat=$lat1.".".$lat2;

if ($obs!=null){;
$valor=strtr($obs,"_"," ");
}else{;
$valor="";
};

//$valor=$obs;

if ($cantidad==null){;
$cantidad="0";
};

if ($idotro==null){;
$idotro="";
};

if ($mediciones==null){;
$rep="error";
}else{;

$grupomed = explode('-',$mediciones);

$dia1=strtok($dia,"/");
$dia2=strtok("/");
$dia3=strtok("/");
$diaa=$dia3."-".$dia2."-".$dia1;


for($ty=0;$ty<count($grupomed);$ty++){;

list($idcat,$idsubcat,$cantidad)=split("_",$grupomed[$ty]);
if ($idcat!=''){;
$sql1 = "INSERT INTO almpc (idempresas,idempleado,idpiscina,idpccat,idpcsubcat,dia,hora,lat,lon,obs,cantidad,otro,idpuntomed) VALUES 
('$idempresa','$idempleado','$idcomunidad','$idcat','$idsubcat','$diaa','$hora','$lat','$lon','$valor','$cantidad','$idotro','$idpuntolectura')";
//echo $sql1;
$result1=mysql_query ($sql1) or die ("Invalid result icarnet");
};
};
};


?>
