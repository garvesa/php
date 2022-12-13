<HTML>
<header>Poker Gabriel</header>
<body>
<?php
$nom1 = $_POST["nombre1"];
$nom2 = $_POST["nombre2"];
$nom3= $_POST["nombre3"];
$nom4 = $_POST["nombre4"];
$nom5 = $_POST["nombre5"];
$nom6 = $_POST["nombre6"];
$nom7 = $_POST["nombre7"];
$nom8 = $_POST["nombre8"];
$minjug=4;
$maxjug=8;
$numjug=4;



$arr=[$nom1,$nom2,$nom3,$nom4,$nom5,$nom6,$nom7,$nom8];
$cont=sizeof($arr);
echo $cont;
$str = print_r($arr);
echo $str;
/*$array = array(
    $nom => $_POST["nombre1"],
    $nom => $_POST["nombre2"],
	$nom => $_POST["nombre3"],
	$nom => $_POST["nombre4"],
	$nom => $_POST["nombre5"],
	$nom => $_POST["nombre6"],
	$nom => $_POST["nombre7"],
	$nom => $_POST["nombre8"]
);
$str = print_r($array(array($nom));
echo $str;
*/

function cartas($array1){
	   $baraja = ["1C1","1C2","1D1","1D2","1P1","1P2","1T1","1T2","JC1","JC2","JD1","JD2","JP1","JP2","JT1","JT2","KC1","KC2","KD1","KD2","KP1","KP2","KT1","KT2","QC1","QC2","QD1","QD2","QP1","QP2","QT1","QT2"];
       for ($i=0; $i<4; ){
	       $carta = rand($baraja);
	       printf("<div> <img src=images/" . $carta . ".png width=\"140\" height=\"140\"\/ id = \"image\"></div>");
	       $i++;
       }
  
}

if(isset($_POST['jugar'])){
		  cartas();       
}



?>
</body>
</HTML>