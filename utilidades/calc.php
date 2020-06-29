	<style>
	body {
	top:0;
	left:5;
	height: 100%;
	width:100%;
	margin: 0 auto;
	padding:0;
	text-align:left; 
	font-family: Arial, Helvetica, sans-serif;
	//font-size:14px;
	line-height:1.5em;
}
	</style>
<body>
<FORM name="Keypad" action="">
<B>
<TABLE border=2 width=40 cellpadding=0 cellspacing=0 >
<TR><TD colspan="6" align=middle>
<input name="ReadOut" type="Text" size=24 value="0" width=100%  >
</TD></tr>

<TR align="center" >
<TD><input name="btnSeven" type="Button" value=" 7 " onclick="NumPressed(7)"></TD>
<TD><input name="btnEight" type="Button" value=" 8 " onclick="NumPressed(8)"></TD>
<TD><input name="btnNine" type="Button" value=" 9 " onclick="NumPressed(9)"></TD>
<td> </td>
<TD><input name="btnNeg" type="Button" value=" +/- " onclick="Neg()"  ></TD>
<TD><input name="btnPercent" type="Button" value=" % " onclick="Percent()"  ></TD>
</TR>

<TR align="center" >
<TD><input name="btnFour" type="Button" value=" 4 " onclick="NumPressed(4)"  ></TD>
<TD><input name="btnFive" type="Button" value=" 5 " onclick="NumPressed(5)"  ></TD>
<TD><input name="btnSix" type="Button" value=" 6 " onclick="NumPressed(6)"  ></TD>
<td> </td>
<TD align=middle><input name="btnPlus" type="Button" value=" + " onclick="Operation('+')"  ></TD>
<TD align=middle><input name="btnMinus" type="Button" value=" - " onclick="Operation('-')"  ></TD>
</TR>

<TR align="center" >
<TD><input name="btnOne" type="Button" value=" 1 " onclick="NumPressed(1)"  ></TD>
<TD><input name="btnTwo" type="Button" value=" 2 " onclick="NumPressed(2)"  ></TD>
<TD><input name="btnThree" type="Button" value=" 3 " onclick="NumPressed(3)"  ></TD>
<td> </td>
<TD align=middle><input name="btnMultiply" type="Button" value=" * " onclick="Operation('*')"  ></TD>
<TD align=middle><input name="btnDivide" type="Button" value=" / " onclick="Operation('/')"  ></TD>
</TR>

<TR align="center" >
<TD><input name="btnZero" type="Button" value=" 0 " onclick="NumPressed(0)"  ></TD>
<TD><input name="btnDecimal" type="Button" value=" . " onclick="Decimal()"  ></TD>
<TD><input name="btnEquals" type="Button" value=" = " onclick="Operation('=')"  ></TD>
<td> </td>
<TD><input name="btnClear" type="Button" value=" C " onclick="Clear()"  ></TD>
<TD><input name="btnClearEntry" type="Button" value=" CE " onclick="ClearEntry()"  ></TD>
</TR>
</TABLE>
</B>
</FORM>
<SCRIPT LANGUAGE="JavaScript">
<!-- Este script y muchos mas estan disponibles en -->
<!-- Galeria de javaScript http://www16.brinkster.com/galeriajs --> 
<!-- Begin
var FKeyPad = document.Keypad;
var Accum = 0;
var FlagNewNum = false;
var PendingOp = "";
function NumPressed (Num) {
if (FlagNewNum) {
FKeyPad.ReadOut.value = Num;
FlagNewNum = false;
}
else {
if (FKeyPad.ReadOut.value == "0")
FKeyPad.ReadOut.value = Num;
else
FKeyPad.ReadOut.value += Num;
}
}
function Operation (Op) {
var Readout = FKeyPad.ReadOut.value;
if (FlagNewNum && PendingOp != "=");
else
{
FlagNewNum = true;
if ( '+' == PendingOp )
Accum += parseFloat(Readout);
else if ( '-' == PendingOp )
Accum -= parseFloat(Readout);
else if ( '/' == PendingOp )
Accum /= parseFloat(Readout);
else if ( '*' == PendingOp )
Accum *= parseFloat(Readout);
else
Accum = parseFloat(Readout);
FKeyPad.ReadOut.value = Accum;
PendingOp = Op;
}
}
function Decimal () {
var curReadOut = FKeyPad.ReadOut.value;
if (FlagNewNum) {
curReadOut = "0.";
FlagNewNum = false;
}
else
{
if (curReadOut.indexOf(".") == -1)
curReadOut += ".";
}
FKeyPad.ReadOut.value = curReadOut;
}
function ClearEntry () {
FKeyPad.ReadOut.value = "0";
FlagNewNum = true;
}
function Clear () {
Accum = 0;
PendingOp = "";
ClearEntry();
}
function Neg () {
FKeyPad.ReadOut.value = parseFloat(FKeyPad.ReadOut.value) * -1;
}
function Percent () {
FKeyPad.ReadOut.value = (parseFloat(FKeyPad.ReadOut.value) / 100) * parseFloat(Accum);
}
// End -->
</SCRIPT>
</body>