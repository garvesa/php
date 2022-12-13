<html>

<head>
<header>BUSCAR EMPLEADOS DE DEPARTAMENTOS MEDIANTE DESPEGABLE</header>
</head>
<body>
<?php






function desplegable(){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "empleados1n";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT nombre FROM DPTO");

    $stmt->execute();
    // set the resulting array to associative
     $stmt->setFetchMode(PDO::FETCH_ASSOC);
	 $resultado=$stmt->fetchAll();
    // var_dump($resultado);
	/*foreach($resultado as $row) {
        echo "DPTO:" . "- Nombre: " . $row["nombre"].  "<br>";
     }*/
     //bucle que genera el select
     echo("<select name='dptos'>");
     foreach($resultado as $row){
        printf("<option>" .  $row["nombre"] . "</option>");
     }
     echo("</select>");
     
     if(isset($_POST['consultar'])){
          $valor="nombre";
          
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT  emple.dni,emple.nombre,emple.salario,emple.fecha_nac FROM EMPLE,DPTO WHERE emple.cod_dpto=dpto.cod_dpto and dpto.nombre='$valor'");
            $stmt->execute();

            // set the resulting array to associative
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
	        $resultado=$stmt->fetchAll();

            foreach($resultado as $row) {
                echo "EMPLE: " . $row["dni"]. " - Nombre: " . $row["nombre"]. " - Salario: " . $row["salario"]. " - Fecha Nac: " . $row["fecha_nac"]. "<br>";
             }
            $conn = null;
     }
        
    }

catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
}
desplegable();



?>
<main>
  
   <form action="desple.php" method = "POST" name="formulario">
    <br><br>
    
    <label for="dpto">Departamentos </label>
      
	 <input type="submit" name="consultar" value="consultar"></input>
	 

  
	 
    </form>


</main>
</body>


</html>