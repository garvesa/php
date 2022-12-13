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
      $almacenes=mostrarnumAlmacen($conn);
    ?>
    <h2>Obtener info de los productos de un almacen concreto</h2>
    <form method='post' action="<?php echo $_SERVER['PHP_SELF']; ?>">

        
        <label for="cat">Selecciona el Almacen:</label>
                <select name="almacenes">
                    <?php foreach ($almacenes as $almacen => $value) : ?>
                        <option> <?php echo $value['NUM_ALMACEN'] ?> </option>
                    <?php endforeach; ?>
                    </select>
        <br><br>

        <input type="submit" name="cant" id="submit" value="Mostrar Información de los productos">
        <?php
        
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             if (isset($_POST["cant"])) {
               mostrarinfoPro($conn);
             }
          }
        ?>
</form>
</body>

</html>

