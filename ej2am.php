<HTML>

<HEAD>
    <TITLE> EJ2	Array Multidimensional Gabriel</TITLE>
</HEAD>
<style>
 table, tr,td { border: 1px solid;}
</style>
<BODY>
<?php

$arr = [];
    $max = 3;
    $num = 0;
    $sumafila=array(0,0,0);
	$sumacol=array(0,0,0);
	//array de filas
    printf("<table>");

    for ($i = 0; $i < $max; $i++) {
        $fila = [];
        printf("<tr>");
        for ($j = 0; $j < $max; $j++) {
            $num += 2;
            $fila[] = $num;
			$sumafila[$i] += $fila[$j];
        }
		 printf("<td>" . $sumafila[$i] . "</td>");
         printf("</tr>");
        $arr[] = $fila;
    }

    printf("</table>");
	echo "<br>";
	
	//array de columnas
	
	printf("<table>");
	printf("<tr>");
	for ($i = 0; $i < $max; $i++) {  
        for ($j = 0; $j < $max; $j++) {
			$sumacol[$i] += $arr[$j][$i];          			
        }
		 printf("<td>" . $sumacol[$i] . "</td>");  
    }
    printf("</tr>");
    printf("</table>");	
   
?>
</BODY>

</HTML>
