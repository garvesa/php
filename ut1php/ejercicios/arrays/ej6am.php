<HTML>

<HEAD>
    <TITLE> EJ6	Array Multidimensional Gabriel</TITLE>
</HEAD>
<BODY>
<?php
$arraymulti = [];
$fila = 3;
$col = 3;
$numeros = 0;
$arraymax=array(0,0,0);
$arraypro=array(0,0,0);

    
 for ($i = 0; $i < $fila; $i++) { 
   $max=0;
      for ($j = 0; $j < $col; $j++) {
		    $numeros = rand(1, 100);
            $arraymulti[]=$numeros;
			if($numeros > $max){
				$max = $numeros;
				$arraymax[$i] = $numeros;
			}
			$arraypro[$i] +=$numeros;
      }
	  $arraypro[$i] = $arraypro[$i] / 3;
	  $array[] = $arraymulti;
 }
 print_r($array);
 echo "<br>";
 printf("valor máximo de cada fila <br>");
 print_r($arraymax);
 echo "<br>";
 printf("valor promedio de cada fila <br>");
 print_r($arraypro);
 
 
 
?>
</BODY>

</HTML>