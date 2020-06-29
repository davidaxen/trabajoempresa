<?php 

include('../bbdd/sqlfacturacion.php');

$dia=date("j",time());
$mes=date("n",time());
$año=date("Y",time());
$mes1=$mes+1;
$fechaactual=date("Y-m-d", mktime (0,0,0,$mes-3,$dia,$año));
$fechafinal=date("Y-m-d", mktime (0,0,0,$mes+10,$dia,$año));

$sql1="SELECT * from aeat where mes between '".$mes."' and '".$mes1."' order by dia,mes"; 
$result1=mysql_query ($sql1) or die ("Invalid result");
$row1=mysql_affected_rows();

$sql="SELECT * from avisos where fechaaviso between '".$fechaactual."' and '".$fechafinal."' and idempresa in (0,".$ide.")"; 
$result=mysql_query ($sql) or die ("Invalid result");
$row=mysql_affected_rows();

$sql2="SELECT * from reunion where dia between '".$fechaactual."' and '".$fechafinal."' and idempresa='".$ide."' and personal='".$user."'"; 
$result2=mysql_query ($sql2) or die ("Invalid result");
$row2=mysql_affected_rows();

?>
<html>
<title>
Central de Avisos
</title>
<!--<link href="../estilo/estilo2.css" rel="stylesheet" type="text/css" />-->
<link rel="stylesheet" href="../estilo/estilo.css">
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
	//font-size:14px;
	line-height:1.5em;
}
	</style>
<SCRIPT LANGUAGE="JavaScript">

//slider's width
var swidth=200

//slider's height
var sheight=160

//slider's speed
var sspeed=2

//messages: change to your own; use as many as you'd like; set up Hyperlinks to URLs as you normally do: <a target=... href="... URL ...">..message..</a>
var singletext=new Array()
singletext[0]='<?if ($avisosh=="1"){;?><table><tr class="subenc"><td colspan="3">Documentos para Hacienda</td></tr><?if ($row1==0){;?><tr class="subenc" colspan="3"><td>No hay avisos</td></tr><?}else{;?><tr class="subenc"><td width="80">dia</td><td width="80">mes</td><td width="400">observaciones</td></tr><? for ($j=0; $j<$row1; $j++){;?><tr><?$dia=mysql_result($result1,$j,"dia");?><?$mes=mysql_result($result1,$j,"mes");?><?$texto=mysql_result($result1,$j,"tema");?><td class="subenc"><?=$dia;?></td><td class="subenc"><?=$mes;?></td><td class="subenc"><?=$texto;?></td></tr><?};?><?};?></table><?};?><table><tr class="subenc"><td colspan="3">Central de Avisos</td></tr><?if ($row==0){;?><tr class="subenc"><td>No hay avisos</td></tr><?}else{;?><tr class="subenc"><td width="80">fecha aviso</td><td width="400">observaciones</td></tr><? for ($i=0; $i<$row; $i++){;?><tr class="subenc"><?$fechaaviso=mysql_result($result,$i,"fechaaviso");?><?$texto=mysql_result($result,$i,"tema");?><td><?=$fechaaviso;?></td><td><?=$texto;?></td></tr><?};?></table><?};?><table><tr class="subenc"><td colspan="3">Central de Reunion / Recordatorio</td></tr><?if ($row2==0){;?><tr class="subenc"><td>No hay reuniones</td></tr><?}else{;?><tr class="subenc"><td>Dia</td><td>observaciones</td></tr><? for ($i=0; $i<$row2; $i++){;?><tr class="subenc"><?$diar=mysql_result($result2,$i,"dia");?><?$horar=mysql_result($result2,$i,"hora");?><?$textor=mysql_result($result2,$i,"observaciones");?><td><?=$diar;?><br><?=$horar;?></td><td><?=$textor;?></td></tr><?};?></table><?};?>'
//singletext[1]='<div align="center"><font face=Arial size=3 color="white">Usalo para tus anuncios<br>e incluso para <font color="#FFFF00"><b><i>imagenes</i></b><p><img src="http://precios10.com/mundojavascript/logo_mundojavascript.gif" border="0"></font></div>'
//singletext[2]='<div align="center"><font face=Arial size=3 color="white">¡Es un buen script!<br>Puedes usar <i>todos</i> los <br><b>codigos base de HTML</b></font></div>'
//singletext[3]='<div align="center"><font face=Arial size=3 color="white"><b>MundoJavascript.com</b><br>Scripts listos para copiar y pegar<br>con <font color="red"><b>decenas</b></font> de javascripts de libre uso<p><img src="http://precios10.com/mundojavascript/logo_mundojavascript.gif" border="0"></font></div>'
if (singletext.length>1)
i=1
else
i=0
function start(){
if (document.all){
ieslider1.style.top=sheight
iemarquee(ieslider1)
}
else if (document.layers){
document.ns4slider.document.ns4slider1.top=sheight
document.ns4slider.document.ns4slider1.visibility='show'
ns4marquee(document.ns4slider.document.ns4slider1)
}
else if (document.getElementById&&!document.all){
document.getElementById('ns6slider1').style.top=sheight
ns6marquee(document.getElementById('ns6slider1'))
}
}
function iemarquee(whichdiv){
iediv=eval(whichdiv)
if (iediv.style.pixelTop>0&&iediv.style.pixelTop<=sspeed){
iediv.style.pixelTop=0
setTimeout("iemarquee(iediv)",200)
}
if (iediv.style.pixelTop>=sheight*-1){
iediv.style.pixelTop-=sspeed
setTimeout("iemarquee(iediv)",200)
}
else{
iediv.style.pixelTop=sheight
iediv.innerHTML=singletext[i]
if (i==singletext.length-1)
i=0
else
i++
}
}
function ns4marquee(whichlayer){
ns4layer=eval(whichlayer)
if (ns4layer.top>0&&ns4layer.top<=sspeed){
ns4layer.top=0
setTimeout("ns4marquee(ns4layer)",200)
}
if (ns4layer.top>=sheight*-1){
ns4layer.top-=sspeed
setTimeout("ns4marquee(ns4layer)",200)
}
else{
ns4layer.top=sheight
ns4layer.document.write(singletext[i])
ns4layer.document.close()
if (i==singletext.length-1)
i=0
else
i++
}
}
function ns6marquee(whichdiv){
ns6div=eval(whichdiv)
if (parseInt(ns6div.style.top)>0&&parseInt(ns6div.style.top)<=sspeed){
ns6div.style.top=0
setTimeout("ns6marquee(ns6div)",200)
}
if (parseInt(ns6div.style.top)>=sheight*-1){
ns6div.style.top=parseInt(ns6div.style.top)-sspeed
setTimeout("ns6marquee(ns6div)",200)
}
else{
ns6div.style.top=sheight
ns6div.innerHTML=singletext[i]
if (i==singletext.length-1)
i=0
else
i++
}
}
//  End -->
</script>

<BODY onLoad="start()">
<div>
<span style="borderWidth:0; borderColor:white; width:200; height:160; background:white">
<ilayer id="ns4slider" width="&{swidth};" height="&{sheight};">
<layer id="ns4slider1" height="&{sheight};" onmouseover="sspeed=0;" onmouseout="sspeed=2">
<script language="JavaScript">
if (document.layers)
document.write(singletext[0])
</script>
</layer></ilayer>
<script language="JavaScript">
if (document.all){
document.writeln('<div style="position:relative;overflow:hidden;width:'+swidth+';height:'+sheight+';clip:rect(0 '+swidth+' '+sheight+' 0);border:0 solid red;" onmouseover="sspeed=0;" onmouseout="sspeed=2">')
document.writeln('<div id="ieslider1" style="position:relative;width:'+swidth+';">')
document.write(singletext[0])
document.writeln('</div></div>')
}
if(document.getElementById&&!document.all){
document.writeln('<div style="position:absolute;overflow:hidden;width:'+swidth+';height:'+sheight+';clip:rect(0 '+swidth+' '+sheight+' 0);border:0px solid red;" onmouseover="sspeed=0;" onmouseout="sspeed=2">')
document.writeln('<div id="ns6slider1" style="position:absolute;width:'+swidth+';">')
document.write(singletext[0])
document.writeln('</div></div>')
}
</script></span>
</div>
</table>
</body>
</html>

