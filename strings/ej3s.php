<HTML>
<HEAD><TITLE> Ejercicio 3 - Gabriel </TITLE></HEAD>
<BODY>
<?php
$ip="192.168.16.100/16";
$numero=$ip;
$ip1=substr($ip,0,strpos($ip,"."));
$ip=substr($ip,strpos($ip,'.')+1);

$ip2=substr($ip,0,strpos($ip,"."));
$ip=substr($ip,strpos($ip,".")+1);

$ip3=substr($ip,0,strpos($ip,"."));
$ip=substr($ip,strpos($ip,".")+1);

$ip4=substr($ip,0);







//Sacamos la IP
$ip=substr($ipinicial,0,strpos($ipinicial,"/"));
echo "IP ".$numero."<br>";
//sacamos la mascara
$mascara = substr($ip, strpos($ip,"/")+1,strlen($ip));
echo "Mascara ".$mascara."<BR>";


$binario=str_pad(decbin($ip1),8,"0",STR_PAD_LEFT).".".str_pad(decbin($ip2),8,"0",STR_PAD_LEFT).".".str_pad(decbin($ip3),8,"0",STR_PAD_LEFT).".".str_pad(decbin($ip4),8,"0",STR_PAD_LEFT);

//lo covertimos a dominio
$pasaradominio = str_pad(substr($binario,0,$mascara),32,"0",STR_PAD_RIGHT);
  
 //lo convertimos a broadcast
$pasarabroadcast = str_pad(substr($binario,0,$mascara),32,"1",STR_PAD_RIGHT);


$broadcast="";
$dominio="";
$dominio.=bindec(substr($pasaradominio , 0,8)).".".bindec(substr($pasaradominio ,8,8)).".".bindec(substr($pasaradominio ,16,8)).".".bindec(substr($pasaradominio ,24,8));
$broadcast.=bindec(substr($pasarabroadcast, 0,8)).".".bindec(substr($pasarabroadcast,8,8)).".".bindec(substr($pasarabroadcast,16,8)).".".bindec(substr($pasarabroadcast,24,8));
$min= bindec(substr($pasaradominio , 0,8)).".".bindec(substr($pasaradominio ,8,8)).".".bindec(substr($pasaradominio ,16,8)).".".(bindec(substr($pasaradominio ,24,8))+1);
$max = bindec(substr($pasarabroadcast, 0,8)).".".bindec(substr($pasarabroadcast,8,8)).".".bindec(substr($pasarabroadcast,16,8)).".".(bindec(substr($pasarabroadcast,24,8))-1);

echo "Direccion Red : ".$dominio."<br>";
echo "Direccion Broadcast : ".$broadcast."<br>";
echo "Rango : ".$min." a ".$max.;





?>
</BODY>
</HTML>


