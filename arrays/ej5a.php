<HTML>

<HEAD>
    <TITLE> EJ5 Array Gabriel</TITLE>
</HEAD>

<BODY>
<?php

$asig1 = ["Bases Datos", "Entornos Desarrollo", "Programación"];
$asig2 = ["Sistemas Informáticos","FOL","Mecanizado"];
$asig3 = ["Desarrollo Web ES","Desarrollo Web EC","Despliegue","Desarrollo Interfaces", "Inglés"];
$modulos=[];
$arrays=[];
printf("array sin función <br>");

foreach($arrays as $key => $array){
	foreach ($array as $modulosfi){
		$modulos[]=$modulosfi;
	}
}
print_r($modulos);
printf("<br>");
printf("array con merge <br>");
$modulosmerge=array_merge( $asig1,$asig2,$asig3);
print_r($modulosmerge);
printf("<br>");
printf("array con push <br>");
$modulospush=array_push($asig1,$asig2,$asig3);
print_r($modulospush);



 

   
?>
</BODY>

</HTML>
