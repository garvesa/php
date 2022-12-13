<HEAD>
    <TITLE> EJ8 Array con Funciones Gabriel</TITLE>
</HEAD>

<BODY>
<?php


//FUNCION------------------------------------------------------------------
/*function sacarBolas(){	
$numbolas=0;
$bola = 0;	
	for ($i = 0; $i < $numbolas; $i++) { 
	    $bola=rand(1, 61);
		$numbolas++;
    }
	
}*/	


//FUNCION GENERAR BOLAS-------------------------------------------------------------------------


function generarBolas(){
$arrayBolas = array();
$valorRandomPrimero = mt_rand(1,60);
array_push($arrayBolas, $valorRandomPrimero);
$x = 1;
while ($x <= 60) {
    $siguienteValorRadom = mt_rand(0, 60);
    if(in_array($siguienteValorRadom, $arrayBolas)){
        continue;
    }else{
    array_push($arrayBolas, $siguienteValorRadom);
    $x++;
    }
}
print_r($arrayBolas);

$bola=array_pop($arrayBolas);
echo "Ha salido la bola :" .$bola;

}
generarBolas();



	
	
	
	//-----------------------------------------------------------------------
	 
	
	
        

?>
<p><input type="button" value="Sacar bola" onclick="()"/></p>

</BODY>

</HTML>