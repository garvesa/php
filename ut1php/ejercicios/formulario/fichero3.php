<HTML>
<header>Datos Alumno</header>
<body>
<?php


$dec1 = $_POST["nombre"];
$ape1 = $_POST["ape1"];
$ape2 = $_POST["ape2"];
$email = $_POST["email"];

//printf ($dec1);


    function generarTabla($nombre1 , $apelli1 , $apelli2 , $email1){
           
	       $nom = $nombre1;
		   $ap1 = $apelli1;
		   $ap2 = $apelli2;
		   $ema = $email1;
		   echo ("<br><br>");
		   printf ("<table style=\"border:1px solid black;\">");
           printf ("<tr><th style=\"border:1px solid black; width:100px\">");
              printf ("Nombre");
           printf ("</th><th style=\"border:1px solid black; width:100px\">");
		      printf ("Apellidos");
		   printf ("</th><th style=\"border:1px solid black; width:250px\">");
		      printf ("Email");
		   printf ("</th><th style=\"border:1px solid black; width:50px\">");
		      printf ("Sexo");
		   printf ("</th></tr>");
		   printf ("<tr><td style=\"border:1px solid black; width:100px\">");
              printf ("$nom");
           printf ("</td><td style=\"border:1px solid black; width:100px\">");
		      printf ("$ap1  $ap2");
		   printf ("</td><td style=\"border:1px solid black; width:100px\">");
		      printf ("$ema");
		   printf ("</td><td style=\"border:1px solid black; width:100px\">");
		      if(isset($_POST['enviar'])){
                    if($_POST["op"] === "1"){
		               printf ("M");
		            }else{
						printf ("H");
	                }
			  }
		   printf ("</td></tr></table>");
		   
		   
     }
	 
if(isset($_POST['enviar'])){
		   generarTabla( $dec1 , $ape1 , $ape2 , $email);       
}



?>
</body>
</HTML>