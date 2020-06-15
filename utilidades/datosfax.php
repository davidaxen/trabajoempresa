<html>
<head>
<link rel="stylesheet" href="../estilo/estilo.css">
<title>Fax</title>
</head>
<body>
<table>
<tr><td rowspan="2"><img src="../img/<?=$img;?>" height=80></td><td>&nbsp;</td><td class="enc">Datos para Fax</td></tr>
</table>
<form method="post" action="plantillafax<?=$ide;?>.php">
  <table>
<tr><td>Asunto:</td><td><input type="text" maxlength="100" name="asunto"></td></tr>
<tr><td>Persona de Contacto:</td><td><input type="text" maxlength="100" name="contacto"></td></tr>
<tr><td>Compañia:</td><td><input type="text" maxlength="30" name="compañia"></td></tr>
<tr><td>Nº de Paginas:</td><td><input type="text" maxlength="30" name="npag" value="1"></td></tr>
<tr><td>Nº fax:</td><td><input type="text" maxlength="30" name="nfax"></td></tr>
<tr><td>Texto:</td></tr>
<tr><td colspan="2"><textarea name="datos" cols="50" rows="15"></textarea></td></tr>
<tr><td><input  class="envio" type="submit" value="Enviar"></td></tr>
  </div>
  </form>
</body>
</html>






