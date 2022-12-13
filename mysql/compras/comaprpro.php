<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
      include("funcionescompras.php");
      $conn = connection();
      $productos=mostrarProducto($conn);
      $num_almas=mostrarnumAlmacen($conn);
    ?>
    <h2>Cantidad de productos en un almacen concreto</h2>
    <form method='post' action="<?php echo $_SERVER['PHP_SELF']; ?>">

        
        <label for="cat">Selecciona el Producto:</label>
                <select name="productos">
                    <?php foreach ($productos as $producto => $value) : ?>
                        <option> <?php echo $value['NOMBRE'] ?> </option>
                    <?php endforeach; ?>
                    </select>
        <br><br>
        <label for="cat">Indica el Numero de Almacén:</label>
                <select name="numAlmacen">
                    <?php foreach ($num_almas as $num_alma => $value) : ?>
                        <option> <?php echo $value['NUM_ALMACEN'] ?> </option>
                    <?php endforeach; ?>
                </select>
        <BR><br>

        <label for=" name">Cantidad del  Producto en el Almacén</label>
        <input type="text" name="cantpro" id="name">
        <br><br>

        <input type="submit" name="altapro" id="submit" value="Dar de alta">
        <?php
        
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             if (isset($_POST["altapro"])) {
               altaproAlmacen($conn);
             }
          }
        ?>
</form>
</body>

</html>

