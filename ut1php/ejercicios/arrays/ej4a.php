<HTML>
<HEAD><TITLE> Array 3 Gabriel</TITLE></HEAD>
<BODY>
<?php

printf ("<table style=\"border:1px solid black;\">");
printf ("<tr><td style=\"border:1px solid black; width:30px\">");
printf ("Indice");
printf ("</td><td style=\"border:1px solid black; width:30px\">");
printf ("Binario");
printf ("</td><td style=\"border:1px solid black; width:30px\">");
printf ("Octal");
printf("</td></tr>");
$array=[];
$longitud=0;

$binarioreverse=[];
for ($i = 1; $i< 21; $i++) {
        
           
            printf("<tr style=\"border:1px solid black;\"><td style=\"border:1px solid black; width:50px;\"> " );
			printf($i);
            printf("</td><td style=\"border:1px solid black;width:50px;\"> ");
            printf($array[$i]=decbin($i));
			
            printf("</td><td style=\"border:1px solid black; width:50px;\"> ");
			printf(decoct($i));
            printf("</td></tr>");
            $longitud++;
        }
    
    printf("</table>");



?>
</BODY>
</HTML>