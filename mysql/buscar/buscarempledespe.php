<html>

<head>
<header>BUSCAR EMPLEADOS DE DEPARTAMENTOS MEDIANTE DESPEGABLE</header>
</head>
<body>
<?php
if(isset($_POST['consultar'])){
if($_POST["dptos"] === "CONTABILIDAD"){
    $valor="CONTABILIDAD";
}elseif($_POST['dptos'] === "FINANZAS"){ 
    $valor="NOMINAS";  
}else{
    $valor="FINANZAS";       
} 

//$valor="CONTABILIDAD";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "empleados1n";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT  emple.dni,emple.nombre,emple.salario,emple.fecha_nac FROM EMPLE,DPTO WHERE emple.cod_dpto=dpto.cod_dpto and dpto.nombre='$valor'");

    // $valor=$_POST["nombre_dpto"];
    //$stmt->bindParam('codigo',$valor);
    $stmt->execute();

    // set the resulting array to associative
     $stmt->setFetchMode(PDO::FETCH_ASSOC);
	 $resultado=$stmt->fetchAll();
    
    // var_dump($resultado);
	foreach($resultado as $row) {
        echo "EMPLE: " . $row["dni"]. " - Nombre: " . $row["nombre"]. " - Salario: " . $row["salario"]. " - Fecha Nac: " . $row["fecha_nac"]. "<br>";
     }
    }
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
}

?>
<main>
  
   <form action="buscarempledespe.php" method = "POST" name="formulario">
    <br><br>
    
    <label for="dpto">Departamentos </label>
      <select name="dptos" >
        <option value="CONTABILIDAD" name="con">CONTABILIDAD</option>
        <option value="FINANZAS" name="con">FINANZAS</option>
        <option value="NOMINAS" name="con" >NOMINAS</option>
      </select>
	 <input type="submit" name="consultar" value="consultar"></input>
	 
	 
    </form>


</main>
</body>


</html>