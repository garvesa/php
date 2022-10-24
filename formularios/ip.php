<html>
<header>IPs</header>
<body>

<?php

$ipdec = $_POST["numdec"];

echo ("<br><br><br>");
printf ("IP Notacion Decimal:");
printf ("<input type:text; placeholder=$ipdec></input>");
echo ("<br><br><br>");

$ip1=substr($ipdec,0,strpos($ipdec,'.'));
$ipdec=substr($ipdec,strpos($ipdec,'.')+1);

$ip2=substr($ipdec,0,strpos($ipdec,'.'));
$ipdec=substr($ipdec,strpos($ipdec,'.')+1);

$ip3=substr($ipdec,0,strpos($ipdec,'.'));
$ipdec=substr($ipdec,strpos($ipdec,'.')+1);

$ip4=substr($ipdec,0);
/*
$ip1 = %08b;
$ip2 = %08b;
$ip3 = %08b;
$ip4 = %08b;
$ip1.$ip2.$ip3.$ip4*/

$binario= sprintf ("%08b.%08b.%08b.%08b",$ip1,$ip2,$ip3,$ip4);
printf ("IP Notacion Binaria:");
printf ("<input type:text; placeholder=$binario style=\"width:300px\"></input>");


?>
</body>



</html>
