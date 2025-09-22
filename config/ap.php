<?

ob_start();

?>
<html>
<meta http-equiv="refresh" content="2;URL='http://localhost/PTES/'" />    
<body>
 <center><img src="Images/logo.png"></center>

</body>
</html>

<?php

$info = ob_get_contents();
ob_end_clean();

$f = fopen("phpinfo.html","w");
fwrite($f,$info);
fclose($f);
exec("start phpinfo.html");

?>