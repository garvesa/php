<HEAD>
    <TITLE> EJ8 Array con Funciones Gabriel</TITLE>
</HEAD>

<BODY>
<?php

$carton=array();
$i=0;  
while($i<15)  
{  
    $numerosCarton=rand(1,60);  
    if(in_array($numerosCarton,$carton)===false) 
    {  
        array_push($carton,$numerosCarton);  
        $i++;  
    }  
}  

var_dump($carton);
    echo "<br>";

$numerosTachados=0;
$fueradelBombo=array();

    while($numerosTachados < count($carton)) { 
        $numeroAleatorio=rand(1,60); 

       if (!in_array($numeroAleatorio,$fueradelBombo)) { 
            array_push($fueradelBombo,$numeroAleatorio);
         
        echo "El numero al azar es: $numeroAleatorio <br>";
            for($i=0; $i<count($carton); $i++){ 
                if($numeroAleatorio===$carton[$i]) { 
                $carton[$i]="X";  
                $numerosTachados++;
                }
             echo("$carton[$i]/");
            }
             echo("<br>");
        }
    }
    echo "Has conseguido el BINGO."; 



?>
<p><input type="button" value="Sacar bola" onclick="sacarBola()"/></p>

</BODY>

</HTML>