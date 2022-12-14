<?php
//funcion de conexion
function connection()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "comprasweb";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    return $conn;
}
//DA DE ALTA A UNA CATEGORIA
function altaCategoria($name,$id,$conn){
    try {
        $sql = $conn->prepare("INSERT INTO CATEGORIA (ID_CATEGORIA,NOMBRE) VALUES (:categoria,:nombre)");

        $sql->bindParam(':nombre', $name);
        $sql->bindParam(':categoria', $id);
        $sql->execute();
        echo "Alta Categoria correcta ";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

}

//DAR ALTA A UN ALMACEN
function altaAlmacen($loca,$conn){
    try {
        $sql = $conn->prepare("INSERT INTO ALMACEN (LOCALIDAD) VALUES (:localidad)");

        $sql->bindParam(':localidad', $loca);
        $sql->execute();
        echo "<br>";
        echo "Alta Almacen correcta ";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
//MUESTRA LA CANTIDAD E PRODUCTOS SELECIONANDO SU NOMBRE DESDE DESPEGABLE
function mostrarCantPro($conn){
    try {
      //DESPEGABLE DE PRODUCTOS NOS DA LOS ID DE ELLOS----------------------
         $nombrepro = $_POST["productos"];
         $stmt3 = $conn->prepare("SELECT ID_PRODUCTO FROM PRODUCTO WHERE NOMBRE=:nombreProducto");
         $stmt3->bindParam("nombreProducto", $nombrepro);
         $stmt3->execute();
         $idpro = "";
         $resultadoCodigo1 = $stmt3->fetchAll();
         foreach ($resultadoCodigo1 as $actual => $value) {
         $idpro = $value["ID_PRODUCTO"];
         }

         
       //mostramos la cantidad
        $stmt3 = $conn->prepare("SELECT CANTIDAD,NUM_ALMACEN FROM ALMACENA WHERE ID_PRODUCTO=:idpro");
        $stmt3->bindParam("idpro", $idpro);
        $stmt3->execute();
        $stmt3->setFetchMode(PDO::FETCH_ASSOC);
        $resultado = $stmt3->fetchAll();
        echo "<br><br>";
        foreach($resultado as $row) {
            echo "Hay  " . $row["CANTIDAD"] . "  en el almacen " . $row["NUM_ALMACEN"] . "<br>";
         }
    } catch (PDOException $e) {
        return [];
    }
}
//MUESTRA LA INFO DE LAS COMPRAS DE UN CLIENTE MEDIANTE DESPEGABLE DE SU NIF Y UNA FECHA
function mostrarinfoCompra($conn){
    try {
      //DESPEGABLE DE NIF CLIENTE  Y FECHA NOS  DA NIF COMPRA ----------------------
         $nifs = $_POST["nifs"];
         $fecha1 = $_POST["fecha1"];
         $fecha2 = $_POST["fecha2"];
         $stmt3 = $conn->prepare("SELECT NIF FROM COMPRA WHERE NIF=:nifs AND (FECHA_COMPRA>:fecha1 AND FECHA_COMPRA<:fecha2)");
         $stmt3->bindParam("nifs", $nifs);
         $stmt3->bindParam("fecha1", $fecha1);
         $stmt3->bindParam("fecha2", $fecha2);
         $stmt3->execute();
         $nifcli = "";
         $resultadoCodigo1 = $stmt3->fetchAll();
         foreach ($resultadoCodigo1 as $actual => $value) {
         $nifcli = $value["NIF"];
         }

         
       //cogemos los id se los productos comprados
        $stmt3 = $conn->prepare("SELECT ID_PRODUCTO FROM COMPRA WHERE NIF=:nifcli");
        $stmt3->bindParam("nifcli", $nifcli);
        $stmt3->execute();
        $stmt3->setFetchMode(PDO::FETCH_ASSOC);
        $idpro="";
        $resultadoCodigo1 = $stmt3->fetchAll();
        foreach ($resultadoCodigo1 as $actual => $value) {
            $idpro = $value["ID_PRODUCTO"];
            }
    } catch (PDOException $e) {
        return [];
    }
}
//MUESTRA LA INFO DE LOS PRODUCTOS EN UN ALMACEN MEDIANTE DESPEGABLE
function mostrarinfoPro($conn){
    try {
      //DESPEGABLE DE PRODUCTOS NOS DA LOS ID DE ELLOS----------------------
         $numAlma = $_POST["almacenes"];
         $stmt3 = $conn->prepare("SELECT ID_PRODUCTO FROM ALMACENA WHERE NUM_ALMACEN=:numAlma");
         $stmt3->bindParam("numAlma", $numAlma);
         $stmt3->execute();
         $idpro = "";
         $resultadoCodigo1 = $stmt3->fetchAll();
         foreach ($resultadoCodigo1 as $actual => $value) {
         $idpro = $value["ID_PRODUCTO"];
         }

         
       //mostramos la cantidad
        $stmt3 = $conn->prepare("SELECT * FROM PRODUCTO WHERE ID_PRODUCTO=:idpro");
        $stmt3->bindParam("idpro", $idpro);
        $stmt3->execute();
        $stmt3->setFetchMode(PDO::FETCH_ASSOC);
        $resultado = $stmt3->fetchAll();
        echo "<br><br>";
        foreach($resultado as $row) {
            echo "ID del producto: " . $row["ID_PRODUCTO"] . "-  Nombre: " . $row["NOMBRE"] . " - Precio " . $row["PRECIO"] . "€ - ID de la categoría " . $row["ID_CATEGORIA"] . "<br>";
         }
    } catch (PDOException $e) {
        return [];
    }
}
//DESPEGABLE QUE MUESTRA LOS NIF DE LOS CLIENTES
function mostrarnifCliente($conn){
    try {

        $stmt = $conn->prepare("SELECT NIF FROM CLIENTES");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $resultado = $stmt;
        return $resultado;
    } catch (PDOException $e) {
        return [];
    }
}



//DESPEGABLE QUE MUESTRA LAS CATEGORIAS
function mostrarCategoria($conn){
    try {

        $stmt = $conn->prepare("SELECT CANTIDAD FROM ALMACENA");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $resultado = $stmt;
        return $resultado;
    } catch (PDOException $e) {
        return [];
    }
}
//DESPEGABLE QUE MUESTRA LOS NOMBRES DE LOS PRODUCTOS
function mostrarProducto($conn){
    try {

        $stmt = $conn->prepare("SELECT NOMBRE FROM PRODUCTO");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $resultado = $stmt->fetchAll();
        return $resultado;
    } catch (PDOException $e) {
        return [];
    }
}
//DESPEGABLE QUE MUESTRA LOS NUMEROS DE LOS ALMACENES
function mostrarnumAlmacen($conn){
    try {

        $stmt = $conn->prepare("SELECT NUM_ALMACEN FROM ALMACEN");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $resultado = $stmt->fetchAll();
        return $resultado;
    } catch (PDOException $e) {
        return [];
    }
}
//DAR ALTA PRODUCTO MEDIANTE DESPEGABLE
function altaProducto($conn){
    try {
        $nombrecat = $_POST["categorias"];
        $idpro = $_POST["idpro"];
        $preciopro = $_POST["precio"];
        $nombrepro = $_POST["namepro"];
        $stmt3 = $conn->prepare("SELECT ID_CATEGORIA FROM CATEGORIA WHERE NOMBRE=:nombreCategoria");
        $stmt3->bindParam("nombreCategoria", $nombrecat);
        $stmt3->execute();
        $idCate = "";
        $resultadoCodigo = $stmt3->fetchAll();
        foreach ($resultadoCodigo as $actual => $value) {
            $idCate = $value["ID_CATEGORIA"];
        }
        $stmt = $conn->prepare("INSERT INTO PRODUCTO (ID_PRODUCTO,NOMBRE,PRECIO,ID_CATEGORIA) 
         VALUES (:idpro,:nombrepro,:preciopro,:idcate)");
        $stmt->bindParam("nombrepro", $nombrepro);
        $stmt->bindParam("idcate", $idCate);
        $stmt->bindParam("idpro", $idpro);
        $stmt->bindParam("preciopro", $preciopro);
        $stmt->execute();
        echo "Nuevo registro dado de alta  ";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}


//DAR ALTA PRODUCTO MEDIANTE DESPEGABLE
function altaproAlmacen($conn){
    try {
        //DESPEGABLE DE PRODUCTOS NOS DA LOS ID DE ELLOS------------------------------------------------
        $nombrepro = $_POST["productos"];
        $stmt3 = $conn->prepare("SELECT ID_PRODUCTO FROM PRODUCTO WHERE NOMBRE=:nombreProducto");
        $stmt3->bindParam("nombreProducto", $nombrepro);
        $stmt3->execute();
        $idpro = "";
        $resultadoCodigo = $stmt3->fetchAll();
        foreach ($resultadoCodigo as $actual => $value) {
            $idpro = $value["ID_PRODUCTO"];
        }
        // DESPEGABLE DE NUM ALMACEN NOS DA EL NUM DEL ALMACEN-----------------------------------------------------
        $numAlma = $_POST["numAlmacen"];
        $stmt3 = $conn->prepare("SELECT NUM_ALMACEN FROM ALMACEN WHERE NUM_ALMACEN=:numAlmacen");
        $stmt3->bindParam("numAlmacen", $numAlma);
        $stmt3->execute();
        $nAlm = "";
        $resultadoCodigo = $stmt3->fetchAll();
        foreach ($resultadoCodigo as $actual => $value) {
            $nAlm = $value["NUM_ALMACEN"];
        }

        //INSERTAMOS LOS VALORES EN LA TABLA------------------------------------------------------------
        $cantpro = $_POST["cantpro"];
        $stmt = $conn->prepare("INSERT INTO ALMACENA (NUM_ALMACEN,ID_PRODUCTO,CANTIDAD) 
         VALUES (:numalma,:idpro,:cantpro)");
        $stmt->bindParam("idpro", $idpro);
        $stmt->bindParam("numalma", $nAlm);
        $stmt->bindParam("cantpro", $cantpro);
       
        $stmt->execute();
        echo "Nuevo registro dado de alta  ";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
//------------------------------------------------------------------------------------------
function ValidoDni($nif)
{
    test_input($nif);
    $valido = true;
    $letra = substr($nif, 8);
    $numeros = substr($nif, 0, 7);
    if (strlen($nif) > 9 || strlen($nif) < 9) {
        echo "Error. La longitud no es la correcta. No es posible dar de alta</br>";
        $valido = false;
    } else if (!ctype_alpha($letra)) {
        echo "Error, el último carácter debe de ser una letra</br>";
        $valido = false;
    } else if (!is_numeric($numeros)) {
        echo "Error, debe de ser 8 digitos.</br>";
        $valido = false;
    }
    return $valido;
}

//-------------------------------------------------------------------------------------------
function anadirCliente($conn, $nif, $nombre, $apellido, $cp, $direc, $ciu)
{
    try {
        test_input($nif);
        test_input($nombre);
        test_input($apellido);
        test_input($cp);
        test_input($direc);
        test_input($ciu);
        $sql = $conn->prepare("INSERT INTO CLIENTE (NIF,NOMBRE,APELLIDO,CP,DIRECCION,CIUDAD) VALUES (:nif,:nombre,:apellido,:cp,
    :direccion,:ciudad)");
        $sql->bindParam('nif', $nif);
        $sql->bindParam('nombre', $nombre);
        $sql->bindParam('apellido', $apellido);
        $sql->bindParam('cp', $cp);
        $sql->bindParam('direccion', $direc);
        $sql->bindParam('ciudad', $ciu);
        $sql->execute();
        echo "Se ha dado de alta al cliente</br>";
    } catch (PDOException $e) {
        $error = $e->getCode();
        if ($error = '2300') {
            echo "DNI EXISTENTE. NO SE PUEDE DAR DE ALTA <BR>";
        }
        //echo "<br>Error: " . $e->getMessage();  
    }
}
//999999------------------------------------------------------------------------------
// siempre que haya disponibilidad del mismo.
function isDniClient($conn,$dni){
    $valid=true;
    test_input($dni);
    $sql = $conn->prepare("SELECT COUNT(NIF) FROM CLIENTE WHERE CLIENTE.NIF=:dni");
    $sql->bindParam('dni', $dni);
    $sql->execute();
    $sql->setFetchMode(PDO::FETCH_NUM);
    $resultado = $sql->fetchAll();
    //var_dump($resultado);
    $resultado= $resultado[0][0];
    if($resultado <= 0){
        $valid=false;
    }
return $valid;
    // mysql_num_rows
}
function buyProduct($conn, $nif, $producto, $cantidad)
{
    $valido=true;
    try {
        
        test_input($cantidad);
        $fecha = new DateTime();
        $stringFecha = $fecha->format("Y-m-d");
        $sql = $conn->prepare("INSERT INTO COMPRA (NIF,ID_PRODUCTO,FECHA_COMPRA,UNIDADES) VALUES (:nif,:idproducto,:fecha,:unidades)");
        $sql->bindParam('nif', $nif);
        $sql->bindParam('idproducto', $producto);
        $sql->bindParam('fecha', $stringFecha);
        $sql->bindParam('unidades', $cantidad);
        $sql->execute();
        echo "Se ha realizado su compra satisfactoriamente</br>";
    } catch (PDOException $e) {
        $valido=false;
        $error = $e->getCode();
        if ($error = '2300') {
            echo "ESTE DNI YA HA REALIZADO COMPRA <BR>";
        }
    }
    return $valido;
}
//------------------------------------------------------------
function isAvailable($conn, $producto, $cantidad)
{
    test_input($cantidad);
    $valid = true;
    $result = getTotalProducts($conn, $producto);
    foreach ($result as $resultado => $value) {
        $quantity = $value['CANTIDAD'];
    }
    if ($quantity <= 0 || !is_numeric($cantidad)) {
        $valid = false;
        echo "Por favor introduzca una cantidad correcta</br>";
    } else if ($cantidad > $quantity) {
        $valid = false;
        echo "No hay existencias suficientes</br>";
    }
    return $valid;
}
//----------------------------------------------------
function getTotalProducts($conn, $product)
{
    try {
        test_input($product);
        $sql = $conn->prepare("SELECT CANTIDAD,LOCALIDAD 
                            FROM PRODUCTO,ALMACENA,ALMACEN 
                            WHERE ALMACENA.ID_PRODUCTO=PRODUCTO.ID_PRODUCTO 
                            AND ALMACENA.NUM_ALMACEN=ALMACEN.NUM_ALMACEN 
                            AND PRODUCTO.ID_PRODUCTO=:producto");
        $sql->bindParam('producto', $product);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $resultado = $sql->fetchAll();
        //echo "<pre>";var_dump($resultado);echo "</pre>";
        return $resultado;
    } catch (PDOException $e) {
        echo "<br>Error: " . $e->getMessage();
    }
}

//----------------------------------------------------------
function updateTableAlmacena($conn, $producto, $cantidad)
{
    try {
        test_input($cantidad);
        //$cantidad_nueva=
        $stmt = $conn->prepare("SELECT CANTIDAD FROM ALMACENA WHERE ALMACENA.ID_PRODUCTO=:producto ");
        $stmt->bindparam('producto', $producto);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_NUM);
        $resultado = $stmt->fetchAll();
        //var_dump($resultado);
        $quantity = $resultado[0][0];
        //echo $quantity;
        $new_quantity = intval($quantity - $cantidad);
        $stmt2 = $conn->prepare("UPDATE ALMACENA  SET CANTIDAD=:new_quantity WHERE ALMACENA.ID_PRODUCTO=:producto");
        $stmt2->bindparam('new_quantity', $new_quantity);
        $stmt2->bindparam('producto', $producto);
        $stmt2->execute();
        echo "Actualizado tabla Almacena con nueva cantidad";
    } catch (PDOException $e) {
        echo "<br>Error: " . $e->getMessage();
    }
}
//funcion para tratar los datos
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}


?>
