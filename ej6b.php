<HTML>
<HEAD><TITLE> EJ6B – Factorial Gabriel</TITLE></HEAD>
<BODY>
<?php
$num="5";
$facto="1";
printf ("$num !=");
for ($i = $num; $i>0; $i--) { 
   if($i==1){
	  printf($i."");
   }else{
      printf($i."x");
   }
$facto=$facto * $i;  
}
printf("=".$facto);
?>
</BODY>
</HTML>
