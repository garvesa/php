<HTML>

<HEAD>
    <TITLE> EJ6 Array Gabriel</TITLE>
</HEAD>

<BODY>
<?php

$asig1 = ["Bases Datos", "Entornos Desarrollo", "Programación"];
$asig2 = ["Sistemas Informáticos","FOL","Mecanizado"];
$asig3 = ["Desarrollo Web ES","Desarrollo Web EC","Despliegue","Desarrollo Interfaces", "Inglés"];
$modulos=[];


printf("<br>");

printf("Array con merge <br><br>");
$modulosmerge=array_merge( $asig1,$asig2,$asig3);
print_r($modulosmerge);
printf("<br><br>");

printf("Array mecanizado eliminado <br><br>");
unset($modulosmerge[5]);
print_r($modulosmerge);
printf("<br><br>");

printf("Array inverso <br><br>");
$inverso = array_reverse($modulosmerge);
print_r($inverso);

   
?>
</BODY>

</HTML>
