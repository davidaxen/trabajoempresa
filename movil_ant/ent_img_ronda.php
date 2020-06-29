<?


$rf1="";
$mimagen=basename( $_FILES['img']['name']);
$timagen=strtok(basename( $_FILES['img']['name']), '.');
$tipoimagen=strtok('.');
if ($mimagen!=null){;
$path="../img/";
$dia2=str_replace("/", "_", $diaentrada);
$rf1=$mimagen;
$dat2[0]=$rf1;
//$path = $path . basename( $_FILES['nimagen']['name']);
$path = $path . $rf1;
if(move_uploaded_file($_FILES['img']['tmp_name'], $path)) {;
//echo "El archivo ". basename( $_FILES['nimagen']['name']). " ha sido subido";
echo "1";
}else{;
//si esta mal el envio
echo "0";
};
};



?>
