<script>
function imprimePantalla(){;
window.principal.focus();
parent.window.print();
};

function funciones(){
top.document.cerrar=true;
top.document.location.href="<?=$web;?>";
};
</script>
<div id="menu00">
<table>
<tr>
<td width="100"><img border="0" alt="imprimir" src="img/printer.png" onclick="javascript:imprimePantalla()"></td>
<td width="100"><a href="inicio.php" target="_parent"><img alt="inicio" border="0" src="img/home.png"></a></td>
<td width="100"><img alt="volver" border="0" src="img/arrow_cycle.png" onclick="history.back()"></td>
<td width="100"><a href="utilidades/calc.php" target="submenu03"><img alt="calc" border="0" src="img/calculator.png"></a></td>
<td width="100"><a href="utilidades/1a2.php" target="submenu03"><img alt="calc" border="0" src="img/calendar.png"></a></td>
<td width="100"><img alt="agregar a favoritos" border="0" src="img/utilidades.gif" onclick="window.external.AddFavorite('http://facturacion.admiservi.es','Facturación de <?=$nemp;?>')"></td>
</tr>
<tr>
<td width="100"><a href="https://tp.seg-social.es/fs/indexframes.html" target="_black"><img alt="sistema red" border="0" src="img/segsocial.gif"></a></td>
<td width="100"><a href="http://delta.mtin.gob.es" target="_black"><img alt="delta" border="0" src="img/icono_acerca_de.gif"></a></td>
<td width="100"><a href="http://www.sepe.es/contenidos/OficinaVirtual/info_contrata.html" target="_black"><img alt="contrata" border="0" src="img/contrata.jpg"></a></td>
<td width="100"><a href="https://www.redtrabaja.es/es/redtrabaja/static/Redirect.do?page=index_certificados" target="_black"><img alt="certificados" border="0" src="img/certificados.gif"></a></td>
</tr>
</table>
</div>