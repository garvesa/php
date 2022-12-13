<HTML>
<HEAD><TITLE> EJ5B – Tabla multiplicar con TD Gabriel</TITLE></HEAD>
<BODY>
<?php
$num="8";
$res="";
printf ("<table style=\"border:1px solid black;\">");
for ($i = 1; $i<21; $i++) { //lo he puesto hasta 20
       
	   printf ("<tr><td style=\"border:1px solid black; width:100px\">");
	       printf ("$num x $i");
	   printf ("</td><td style=\"border:1px solid black; width:50px\">");
           $res=$num * $i;
	       printf($res);
	   printf("</td>");
	   printf("</tr></td>");
}
printf ("</table>");
?>
</BODY>
</HTML