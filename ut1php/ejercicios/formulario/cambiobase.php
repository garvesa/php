<html>
<header>CAMBIO BASE</header>
<body>
<?php


$dec1 = $_POST["decimal"];
printf ("Numero Decimal:");
//printf ($dec1);
printf ("<input type:text; placeholder=$dec1></input>");

    function binario($decimal){
           
	       $bi= decbin($decimal);
		   echo ("<br><br>");
		   printf ("<table style=\"border:1px solid black;\">");
           printf ("<tr><td style=\"border:1px solid black; width:100px\">");
           printf ("Binario");
           printf ("</td><td style=\"border:1px solid black; width:100px\">");
		   printf ("$bi");
		   printf ("</td></table>");
     }
	 function octal($decimal){
           
		   $octal = decoct($decimal);
		  // echo ("<br><br>");
		   printf ("<table style=\"border:1px solid black;\">");
           printf ("<tr><td style=\"border:1px solid black; width:100px\">");
           printf ("Octal");
           printf ("</td><td style=\"border:1px solid black; width:100px\">");
		   printf ("$octal");
		   printf ("</td></table>");
     }
	 function hexa($decimal){
           $hexa= dechex($decimal);
		  // echo ("<br><br>");
		   printf ("<table style=\"border:1px solid black;\">");
           printf ("<tr><td style=\"border:1px solid black; width:100px\">");
           printf ("Hexadecimal");
           printf ("</td><td style=\"border:1px solid black; width:100px\">");
		   printf ("$hexa");
		   printf ("</td></table>");
     } 
	 function sistemas($decimal){
		    $deci = $decimal;
           binario($deci);
		   octal($deci);
		   hexa($deci);
     }
	 
	

if(isset($_POST['enviar'])){
       if($_POST["op"] === "1"){
		   binario( $dec1);
		   
	   }
	   elseif($_POST['op'] === "2"){ 
            octal( $dec1);
			
       }
       elseif($_POST['op'] === "3"){
             hexa( $dec1);
			 
       } 
	   else{
             sistemas( $dec1);
			 
        }
}

 
?>
</body>



</html>