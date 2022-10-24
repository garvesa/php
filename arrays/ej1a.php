<HTML>
<HEAD><TITLE> Array 1 Gabriel</TITLE></HEAD>
<BODY>
<?php

printf ("<table style=\"border:1px solid black;\">");
printf ("<tr><td style=\"border:1px solid black; width:30px\">");
printf ("Indice");
printf ("</td><td style=\"border:1px solid black; width:30px\">");
printf ("Valor");
printf ("</td><td style=\"border:1px solid black; width:30px\">");
printf ("Suma");
printf("</td></tr>");
$array=[];
$longitud=0;
$suma=0;
    

for ($i = 1; $longitud< 20; $i++) {
        if ($i % 2 == 1) {
            $array[$longitud] = $i;
            printf("<tr style=\"border:1px solid black;\"><td style=\"border:1px solid black; width:50px;\"> " );
			printf($longitud);
            printf("</td><td style=\"border:1px solid black;width:50px;\"> ");
            printf( $array[$longitud] );
            printf("</td><td style=\"border:1px solid black; width:50px;\"> ");
			$suma= $suma + $array[$longitud];
			printf ($suma);
            printf("</td></tr>");
            $longitud++;
        }
    }

    printf("</table>");

?>
</BODY>
</HTML>
