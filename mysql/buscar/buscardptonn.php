<?php
/*SELECTs - mysql PDO*/

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "empleadosnn";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT id,cod_dpto, nombre FROM DPTO WHERE id=:id_dpto");

    $valor=$_POST["id"];
    $stmt->bindParam('id_dpto',$valor);
    $stmt->execute();

    // set the resulting array to associative
     $stmt->setFetchMode(PDO::FETCH_ASSOC);
	 $resultado=$stmt->fetchAll();
    // var_dump($resultado);
	foreach($resultado as $row) {
        echo "ID dpto: " . $row["id"]. " - Codigo dpto: " . $row["cod_dpto"]. " - Nombre: " . $row["nombre"]. "<br>";
     }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;

?>
