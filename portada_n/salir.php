<?php  
extract($_COOKIE);


if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
}
				
		?>
		<div id='content'>
<?php  include('/portada_n/cabecera.php');?>
<p style="text-align:center">
		Gracias por utilizar NATIVECBC, nos vemos pronto<br/>
	si quieres volver a acceder al programa pincha <a href="https://control.nativecbc.com">aqui</a>
	</p>
	</div>			
<script languaje='javascript' type='text/javascript'>
		window.open('<?php  echo $web;?>', '_parent');
		</script>		
