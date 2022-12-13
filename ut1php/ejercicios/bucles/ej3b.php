<HTML>
<HEAD><TITLE> EJ3B – Conversor Decimal a base 16</TITLE></HEAD>
<BODY>
<?php
  $numcopia="48";
  $num="48";
  $base = "16";
  $hexa= "0123456789ABCDEF";
  $string = "";

    while ($num > 0) {
        $mod = $num % $base;
        $string = $hexa[$mod].$string;
        $num = intdiv($num, $base);
       
    }
	echo ("Numero $numcopia en base $base es: ".$string);
?>
</BODY>
</HTML>