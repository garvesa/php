<HTML>
<HEAD><TITLE> EJ4B – Tabla Multiplicar Gabriel</TITLE></HEAD>
<BODY>
<?php
$num="8";
$res="";//variable que almacena el resultado


for ($i = 1; $i<21; $i++) { //lo he puesto hasta 20
	$res=$num * $i;
    printf ("$num x $i=$res",$res);
    echo "<br>";
}


?>
</BODY>
</HTML>