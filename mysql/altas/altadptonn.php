<?php
$cod_dpto=$_POST["cod_dpto"];
$nombre_dpto=$_POST["nombre"];

$servername= "localhost";
$username = "root";
$password = "";
$dbname = "empleadosnn";


try {

    //establecemos conexion
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //perparamos la sentencia sql

    $stmt = $conn->prepare("INSERT INTO dpto (cod_dpto,nombre) VALUES (:cod_dpto,:nombre)");
    $stmt->bindParam(':cod_dpto', $cod_dpto);
    $stmt->bindParam(':nombre', $nombre_dpto);

    //ejecucion de la sentencia
    $stmt->execute();
    echo "Alta Departamento correcta ";
}
    


catch(PDOException $e)
{
    $error= $e->getCode();
    if($error=="23000")
        echo "Departamento duplicado";
    else echo $error;
}

$conn=null;

?>