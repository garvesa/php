<HTML>

<HEAD>
    <TITLE> EJ8 Array Gabriel</TITLE>
</HEAD>

<BODY>
<?php
$alumnos = array(
    "Javier" => 9,
    "Sandra" => 4,
    "Daniel" => 7,
    "Maria" => 10,
	"Carlos" =>6
);
$numnotas=0;
$suma=0;

 //mejor nota
echo max($alumnos);
echo "<br>";
//peor nota
echo min($alumnos);
echo "<br>";

	foreach ($alumnos as $nombre => $nombre_value) {
        echo "Alumno :" . $nombre . ", nota :" . $nombre_value;
		$suma=$suma+$nombre_value;
        echo "<br>";
		$numnotas++;
    }
	echo "<br>";
	echo "la medias es de las notas es :". $suma/$numnotas;
  
?>
</BODY>

</HTML>