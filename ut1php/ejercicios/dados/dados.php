<HTML>

<HEAD> 
 
     <title>JUEGO DADOS - PRÁCTICA OBLIGATORIA Gabriel</title>
   
  

</HEAD>

<BODY>


<?php
  $ganador = false;
//Extraemos los nombres de los jugadores
$jug1 = $_POST["jug1"];
$jug2 = $_POST["jug2"];
$jug3 = $_POST["jug3"];
$jug4 = $_POST["jug4"];

//Funcion para generar la tabla y que muestre que dados han sacado los jugadores
 function generarTabla($jugador1 , $jugador2 , $jugador3 , $jugador4){
	 //el numero de dados que tiramos
	       $num = $_POST["numdados"];
           $dado = 0;
	       $nom1 = $jugador1;
		   $nom2 = $jugador2;
		   $nom3 = $jugador3;
		   $nom4 = $jugador4;
		   echo ("<br><br>");
		   printf ("<table style=\"border:4px solid black;\">");
           printf ("<tr><th style=\"border:3px solid black; width:100px\">");
              printf ("Nombre");
           printf ("</th><th style=\"border:3px solid black; width:100px\">");
		      printf ("Dados");
		   printf ("</th></tr>");
		   printf ("<tr><th style=\"border:3px solid black; width:100px\">");
              printf ("$nom1");
		  
//FUNCION QUE GENERA LOS DADOS 	Y LOS SUMA-------------------------------------------------------	
                       $sumdado1=0;
					   $sumdado2=0;
					   $sumdado3=0;
					   $sumdado4=0;
					   
                       for($i=0; $i<$num; $i++){
                         $dado = rand(1, 6);
						 printf ("</th><th style=\"border:3px solid black; height:150px; width:150px\">"); 
					     printf("<div> <img src=images/" . $dado . ".png width=\"140\" height=\"140\"\/ id = \"image\"></div>");						
					     $sumdado1=$sumdado1 + $dado;
						  printf ("</th>");
					   } 	   
                        printf("$nom1 = $sumdado1 puntos <br>");
//-------------------------------------------------------------------------------------------------					   
		   printf ("</tr><tr><th style=\"border:3px solid black; width:100px\">");
              printf ("$nom2");
		  
//FUNCION QUE GENERA LOS DADOS Y LOS SUMA-----------------------------------------------------------				 
                      
                       for($i=0; $i<$num; $i++){
                          $dado = rand(1, 6);
						  printf ("</th><th style=\"border:3px solid black; height:150px; width:150px\">");
					      printf("<div> <img src=images/" . $dado . ".png width=\"140\" height=\"140\"\/ id = \"image\"></div>");
					      $sumdado2=$sumdado2 + $dado;
			              printf ("</th>");
					 } 		
                       printf("$nom2 = $sumdado2 puntos <br>");
//-------------------------------------------------------------------------------------------------
		   printf ("</tr><tr><th style=\"border:3px solid black; width:100px\">");
              printf ("$nom3");
		   
//FUNCION QUE GENERA LOS DADOS 	Y LOS SUMA---------------------------------------------			 
                      
                       for($i=0; $i<$num; $i++){
                          $dado = rand(1, 6);
						  printf ("</th><th style=\"border:3px solid black; height:150px; width:150px\">");
					      printf("<div> <img src=images/" . $dado . ".png width=\"140\" height=\"140\"\/ id = \"image\"></div>");
					      $sumdado3=$sumdado3 + $dado;
			              printf ("</th>");
					   } 		
					   printf("$nom3 = $sumdado3 puntos <br>");
                      
//-----------------------------------------------------------------------------------------------				   
		   printf ("</tr><tr><th style=\"border:3px solid black; width:100px\">");
              printf ("$nom4");
		   
//FUNCION QUE GENERA LOS DADOS 	Y LOS SUMA--------------------------------------------------------		 
                      
                       for($i=0; $i<$num; $i++){
                          $dado = rand(1, 6);
						  printf ("</th><th style=\"border:3px solid black; height:150px; width:150px\">");
					      printf("<div> <img src=images/" . $dado . ".png width=\"140\" height=\"140\"\/ id = \"image\"></div>");
					      $sumdado4=$sumdado4 + $dado;
			              printf ("</th>");
					 } 		
                        printf("$nom4 = $sumdado4 puntos <br>");
//MOSTRAR GANADOR O GANADORES-----------------------------------------------------------------------------------------------------
		   
		    printf ("</tr><tr><th style=\"border:3px solid black; width:100px\">");
              printf ("GANADOR");
           printf ("</th><td style=\"border:3px solid black; width:300px\">");
		        if($sumdado1>$sumdado2 &&  $sumdado1>$sumdado3 && $sumdado1>$sumdado4){
					 printf ("$nom1 <br> NUMERO DE GANADORES : 1");
				}elseif($sumdado2>$sumdado1 &&  $sumdado2>$sumdado3 && $sumdado2>$sumdado4){
					printf ("$nom2 <br>NUMERO DE GANADORES : 1");
				}elseif($sumdado3>$sumdado1 &&  $sumdado3>$sumdado2 && $sumdado3>$sumdado4){
					printf ("$nom3 <br> NUMERO DE GANADORES : 1");
				}elseif($sumdado4>$sumdado1 &&  $sumdado4>$sumdado2 && $sumdado4>$sumdado3){
					printf ("$nom4 <br> NUMERO DE GANADORES : 1");
				}elseif($sumdado1=$sumdado2 &&  $sumdado1>$sumdado3 && $sumdado1>$sumdado4){
					printf ("$nom1, $nom2 NUMERO DE GANADORES : 2");
				}elseif($sumdado1=$sumdado3 &&  $sumdado1>$sumdado2 && $sumdado1>$sumdado4){
					printf ("$nom1, $nom3 <br> NUMERO DE GANADORES : 2");
				}elseif($sumdado1=$sumdado4 &&  $sumdado1>$sumdado3 && $sumdado1>$sumdado2){
					printf ("$nom1, $nom4 <br> NUMERO DE GANADORES : 2");
				}elseif($sumdado2=$sumdado3 &&  $sumdado2>$sumdado1 && $sumdado2>$sumdado4){
					printf ("$nom2, $nom3 <br> NUMERO DE GANADORES : 2");
				}elseif($sumdado2=$sumdado4 &&  $sumdado2>$sumdado1 && $sumdado2>$sumdado3){
					printf ("$nom2, $nom4 <br> NUMERO DE GANADORES : 2");
				}elseif($sumdado3=$sumdado4 &&  $sumdado3>$sumdado1 && $sumdado3>$sumdado2){
					printf ("$nom3, $nom4 <br>NUMERO DE GANADORES : 2");
				}
				
				
		   printf ("</td></tr></table>");   
		   
     }

if(isset($_POST['tirar'])){
      generarTabla( $jug1 , $jug2 ,$jug3, $jug4);
}


?>
</BODY>

</HTML>