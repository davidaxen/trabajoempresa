<?php
require('plantillafax.php');

if(isset($_POST['html']))
{
    $pdf =& new createPDF(
        $_POST['html'],   // html text to publish
        $asunto,  // article title
        $_POST['url'],    // article URL
        $_POST['author'], // author name
        time()
    );
    $pdf->run();
}
 



