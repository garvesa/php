<?php
/*SELECTs - mysql PDO*/

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "empleados1n";

try {
    $valor=$_POST["nombre_dpto"];
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT  emple.dni,emple.nombre,emple.salario FROM EMPLE,DPTO WHERE emple.cod_dpto=dpto.cod_dpto and dpto.nombre='$valor'");

    // $valor=$_POST["nombre_dpto"];
    //$stmt->bindParam('codigo',$valor);
    $stmt->execute();

    // set the resulting array to associative
     $stmt->setFetchMode(PDO::FETCH_ASSOC);
	 $resultado=$stmt->fetchAll();
    // var_dump($resultado);
	foreach($resultado as $row) {
        echo "EMPLE: " . $row["dni"]. " - Nombre: " . $row["nombre"]. " - Salario: " . $row["salario"]. "<br>";
     }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;

?>
