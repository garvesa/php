<HTML>
<HEAD><TITLE> EJ1B – Conversor decimal a binario Gabriel</TITLE></HEAD>
<BODY>
<?php
$num="168";

$dec=floatval($num);
 
   while (is_float($dec) )
   {
     
	 printf("Numero $dec  en binario como %b <br/>",$num);
	 echo "<br>";
	 break;
   }
   
?>
</BODY>
</HTML>