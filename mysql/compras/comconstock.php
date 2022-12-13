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
    ?>
    <h2>Consultar cantidad de un producto concreto en los almacenes</h2>
    <form method='post' action="<?php echo $_SERVER['PHP_SELF']; ?>">

        
        <label for="cat">Selecciona el Producto:</label>
                <select name="productos">
                    <?php foreach ($productos as $producto => $value) : ?>
                        <option> <?php echo $value['NOMBRE'] ?> </option>
                    <?php endforeach; ?>
                    </select>
        <br><br>

        <input type="submit" name="cant" id="submit" value="Mostrar Cantidad">
        <?php
        
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             if (isset($_POST["cant"])) {
               mostrarCantPro($conn);
             }
          }
        ?>
</form>
</body>

</html>

