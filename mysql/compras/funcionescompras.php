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


?>