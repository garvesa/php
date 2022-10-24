<html>
<header>CALCULADORA</header>
<body>
<?php


$op1 = $_POST["op1"];
$op2 = $_POST["op2"];


    function suma($num1, $num2){
           $res=0;
	       $res=$num1+$num2;
		   echo ("<br><br><br><br>");
		   echo ("Resultado de la operación :". $num1 ."+". $num2 ."=". $res);
     }
	 function resta($num1, $num2){
           $res=0;
	       $res=$num1-$num2;
		   echo ("<br><br><br><br>");
		   echo ("Resultado de la operación :". $num1 ."-". $num2 ."=". $res);
     }
	 function pro($num1, $num2){
           $res=0;
	       $res=$num1*$num2;
		   echo ("<br><br><br><br>");
		   echo ("Resultado de la operación :". $num1 ."x". $num2 ."=". $res);
     }
	 function divi($num1, $num2){
           $res=0;
	       $res=$num1/$num2;
		   echo ("<br><br><br><br>");
		   echo ("Resultado de la operación :". $num1 ."/". $num2 ."=". $res);
     }
	 
	// suma($op1,$op2);

if(isset($_POST['enviar'])){
       if($_POST["op"] === "1"){
		   suma( $op1 , $op2);
		   
	   }
	   elseif($_POST['op'] === "2"){ 
            resta( $op1 , $op2);
			
       }
       elseif($_POST['op'] === "3"){
             pro( $op1 , $op2);
			 
       } 
	   else{
             divi( $op1 , $op2);
			 
        }
}

 
?>
</body>



</html>
