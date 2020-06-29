<script>
function imprimePantalla(){;
window.principal.focus();
parent.window.print();
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
</table>
</div>