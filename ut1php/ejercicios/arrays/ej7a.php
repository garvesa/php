<HTML>

<HEAD>
    <TITLE> EJ7 Array Gabriel</TITLE>
</HEAD>

<BODY>
<?php
$alumnos = array(
    "Javier" => 14,
    "Sandra" => 18,
    "Daniel" => 16,
    "Maria" => 19
);

 foreach ($alumnos as $nombre => $nombre_value) {
        echo "Alumno :" . $nombre . ", edad :" . $nombre_value;
        echo "<br>";
    }
   // muestra la edad de Sandra
    echo next($alumnos);
    echo "<br>";
	// muestra la edad de Daniel
    echo next($alumnos);
    echo "<br>";
	// ultima posición
    echo end($alumnos);
    echo "<br>";

    //lo ordenamos al reves
    asort($alumnos);
	
	echo current($alumnos);
	echo "<br>";
	echo end($alumnos);
	
  
?>
</BODY>

</HTML>