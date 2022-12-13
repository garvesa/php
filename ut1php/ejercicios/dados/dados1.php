<HTML>

<HEAD> 
 
     <title>JUEGO DADOS - PRÁCTICA OBLIGATORIA Gabriel</title>
   
  

</HEAD>
<style>
 table,
        tr,
        td {
            border: 1px solid; 
        }
</style>
<BODY>


<?php

numDados();

          
		  
		 function numDados(){// FUNCION QUE VALIDA EL NUMERO DE DADOS DEBERA SER MINIMO 1 Y MAXIMO 10 PARA REALIZAR LA FUNCION
		       $cant = $_POST["numdados"];
		       if($cant>0 && $cant<11){ 
		         tabla();
				// resultados();
		       }
		 }
		 
		 
		 
		  function tabla(){ //FUNCION PRINCIPAL DONDE VISUALIZAMOS LA TABLA CON LOS JUGADORES Y LOS DADOS QUE HAN SACADO
          printf("<table>");
		  $max = 4;
		  $cant = $_POST["numdados"];
		  $jug1 = $_POST["jug1"];
          $jug2 = $_POST["jug2"];
          $jug3 = $_POST["jug3"];
          $jug4 = $_POST["jug4"];
          $arr = [$jug1,$jug2,$jug3,$jug4];
		 
          for ($fila = 0; $fila < 1; $fila++) {
                printf("<tr>");
			    for($i=0; $i<$max;  $i++){
					printf("<div><td>" . $arr[$i] . "</td></div>");
				
                           for($col = 0; $col < $cant; $col++) {
					           $dado = rand(1, 6);
                               printf("<td><div> <img src=images/" . $dado . ".png width=\"100\" height=\"100\"\/ id = \"image\"></div>");	
							   //almacenarDados($dado);
							 
							   //UTILIZAR SUMARRAY
							   printf("</td>");
						
                            }
							for ($a=0; $a<$cant; $a++){
								$arr_dados[]=array($dado);
								 }
                 printf("</tr>"); 
				 
				}		
					
          }
		  print_r($arr_dados);
          printf("</table>");
		 
		  }
		  
		/*  function almacenarDados($dados){
		   $arraydados=[];
		   $arraydados[$dados];
		 
		  print_r ($arraydados);
		  }*/
		 function almacenarJug(){
			$datos[]=array(
				"jug1"=>"".$_POST["jug1"]."",
				"jug2"=>"".$_POST["jug2"]."",
				"jug3"=>"".$_POST["jug3"]."",
				"jug4"=>"".$_POST["jug4"].""
				);
		 }
		  
		  function sumarDados($arr_dados){
		  $sum = array_sum($arr_dados);
		  printf("$sum");
		  }


		  function ganador(){
			$jugadores = array(
				"Javier" => 9,
				"Sandra" => 4,
				"Daniel" => 7,
				"Maria" => 10,
				"Carlos" =>6
			);
		  }
		  
		  

?>
</BODY>

</HTML>