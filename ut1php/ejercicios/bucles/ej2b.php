<HTML>
<HEAD><TITLE> EJ2B – Conversor Decimal a base n Gabriel </TITLE></HEAD>
<BODY>
<?php
$num="48";
$base="8";

echo " $num en base $base es: ".baseConverter($num,$base);

function baseConverter ($numero,$base){
    $string = "";
    while ($numero>0){
        $modi = $numero % $base;
        $numero = intdiv($numero,$base);
        $string .= $modi; 
    }
    return strrev($string);
}


  
   
 
?>
</BODY>
</HTML>