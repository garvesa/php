<HTML>
<HEAD><TITLE> EJ1-Conversion IP Decimal a Binario Gabriel</TITLE></HEAD>
<BODY>
<?php
$ip="192.18.16.204";
$numero=$ip;
$ip1=substr($ip,0,strpos($ip,"."));
$ip=substr($ip,strpos($ip,'.')+1);

$ip2=substr($ip,0,strpos($ip,"."));
$ip=substr($ip,strpos($ip,".")+1);

$ip3=substr($ip,0,strpos($ip,"."));
$ip=substr($ip,strpos($ip,".")+1);

$ip4=substr($ip,0);

  echo "IP $ip  en binario es ".str_pad(decbin($ip1),8,"0",STR_PAD_LEFT).
  echo ".".str_pad(decbin($ip2),8,"0",STR_PAD_LEFT).
  echo ".".str_pad(decbin($ip3),8,"0",STR_PAD_LEFT).
  echo ".".str_pad(decbin($ip4),8,"0",STR_PAD_LEFT);

?>
</BODY>
</HTML>
