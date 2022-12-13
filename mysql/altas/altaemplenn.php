<?php
$dni_emple=$_POST["dni"];
$salario=$_POST["salario"];
$fecha_nac=$_POST["fecha_nac"];
$nombre_emple=$_POST["nombre"];

$servername= "localhost";
$username = "root";
$password = "";
$dbname = "empleadosnn";
 

try {

    //establecemos conexion
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //perparamos la sentencia sql

    $stmt = $conn->prepare("INSERT INTO emple (dni,nombre,salario,fecha_nac) VALUES (:dni,:nombre,:salario,:fecha_nac)");
    $stmt->bindParam(':dni', $dni_emple);
    $stmt->bindParam(':nombre', $nombre_emple);
    $stmt->bindParam(':salario', $salario);
    $stmt->bindParam(':fecha_nac', $fecha_nac);

    //ejecucion de la sentencia
    $stmt->execute();
    echo "Alta Empleado correcta ";
}
    

 
catch(Throwable $e)
{
    $arrayerror= $e->errorInfo;
   //var_dump($arrayerror);
   if($arrayerror[1]=="1062")
        echo "DNI  duplicado";
   elseif($arrayerror[1]=="1452")
        echo "El Departamento no existe";
   else
        echo $arrayerror;
}

$conn=null;
//1452 dpto no existe
//1062 duplicado el dni
?>