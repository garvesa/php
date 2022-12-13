<style>
 table,
        tr,
        td {
            border: 1px solid; 
        }
</style>

<?php
  /* Nombre Alumno:                       */
	//$filas=4;
  $cant = $_POST["numcartas"];
  $jug1 = $_POST["nombre1"];
  $jug2 = $_POST["nombre2"];
  $jug3 = $_POST["nombre3"];
  $jug4 = $_POST["nombre4"];		
  
  $arr = [$jug1,$jug2,$jug3,$jug4];
  $filas=count($arr);


//-------------------------------------------------------
$cartas=["1B", "2B", "3B", "4B", "5B","6B", "7B", "SB", "CB","RB","1E", "2E", "3E", "4E", "5E","6E", "7E", "SE", "CE","RE","1C", "2C", "3C", "4C", "5C","6C", "7C", "SC", "CC","RC","1O", "2O", "3O", "4O", "5O","6O", "7O", "SO", "CO","RO"];
$palo = array("B","E","C","O");
$valor = array(
  "SB"=> 0.5,"CB" => 0.5,"RB" => 0.5,"SE" => 0.5,"CE"=> 0.5,"RE" => 0.5,
  "SC"=> 0.5,"CC"=> 0.5,"RC" => 0.5,"SO"=> 0.5,"CO"=> 0.5,"RO" => 0.5,
  "1B"=> 1,"1E"=> 1,"1C" => 1,"1O"=> 1,
  "2B"=> 2,"2E"=> 2,"2C" => 2,"2O"=> 2,
  "3B"=> 3,"3E"=> 3,"3C" => 3,"3O"=> 3,
  "4B"=> 4,"4E"=> 4,"4C" => 4,"4O"=> 4,
  "5B"=> 5,"5E"=> 5,"5C" => 5,"5O"=> 5,
  "6B"=> 6,"6E"=> 6,"6C" => 6,"6O"=> 6,
  "7B"=> 7,"7E"=> 7,"7C" => 7,"7O"=> 7
);



//-------------------------------------------------------------------------------------------------

printf("<table>");	
    for($i=0; $i<$filas;){
       printf("<tr>");
       printf("<td>" . $arr[$i] . "</td>");
       $suma=0;
       
          for($j=0; $j<$cant;){
            $car= array_rand($cartas);
            printf("<td><div> <img src=images/" . $cartas[$car] . ".png width=\"100\" height=\"100\"\/ id = \"image\"></div>");
            $cartaexacta= $cartas[$car];
            $va=$valor[$cartaexacta];
            $suma=+$suma+$va;
            $j++;
            printf("</td>");
          }
          ganador($arr[$i],$suma);
         echo "<br>";
       $i++;
       printf("</tr>");
    }
printf("</table>");
//-----------------------------------------------------------------------------------------------
/*
function puntuacion($exacta){
  $valor = array(
    "SB"=> 0.5,"CB" => 0.5,"RB" => 0.5,"SE" => 0.5,"CE"=> 0.5,"RE" => 0.5,
    "SC"=> 0.5,"CC"=> 0.5,"RC" => 0.5,"SO"=> 0.5,"CO"=> 0.5,"RO" => 0.5,
    "1B"=> 1,"1E"=> 1,"1C" => 1,"1O"=> 1,
    "2B"=> 2,"2E"=> 2,"2C" => 2,"2O"=> 2,
    "3B"=> 3,"3E"=> 3,"3C" => 3,"3O"=> 3,
    "4B"=> 4,"4E"=> 4,"4C" => 4,"4O"=> 4,
    "5B"=> 5,"5E"=> 5,"5C" => 5,"5O"=> 5,
    "6B"=> 6,"6E"=> 6,"6C" => 6,"6O"=> 6,
    "7B"=> 7,"7E"=> 7,"7C" => 7,"7O"=> 7
  );
  $suma=0;
  $va=$valor[$exacta];
  $suma=+$suma+$valor[$exacta];
  printf("vale :". $valor[$exacta] . "<br>");
  printf("vale la suma :". $suma . "<br>");
  
}*/
//--------------------------------------------------------------------------
function ganador($ar,$su){
  $ganador = array(
    $ar=> $su,
    $ar => $su,
    $ar => $su,
    $ar => $su
  );
  $ap = $_POST["apuesta"];
  printf($ar . " ha obtenido " . $ganador[$ar]);
  if($ganador[$ar]==7.5){
      printf(", Siete y Media , " . $ar . " es el ganador , ha obtenido " . $ap . " € ");
  }else{
        
      if($ganador[$ar]<7.5) {
        $menor=0;
        $fgana=$ar;
        printf(" , no ha obtenido 7 y media");
        $ap = $_POST["apuesta"];	
        $menor++;
     //   apuestaMitad($ap,$ar,$menor);

      }else{
        
      }
  }
}

function apuestaMitad($ap,$nom,$num){
   $botin=$ap/$num;
   printf("<br>");
   printf($nom . " ha recibido " . $botin . " € del botin ");
}
//-----------------------------------------------------------------------------





?>