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
      require_once("funcionescompras.php");
      $conn = connection();
      $categorias=mostrarCategoria($conn);
    ?>
    <h2>Alta Producto</h2>
    <form method='post' action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for=" name">Nombre Producto</label>
        <input type="text" name="namepro" id="name">
        <br><br>
        <label for=" name">ID Producto</label>
        <input type="text" name="idpro" id="name">
        <br><br>
        <label for=" name">Precio Producto</label>
        <input type="text" name="precio" id="name">
        <br><br>
        <label for="cat">CATEGORIAS:</label>
                <select name="categorias">
                    <?php foreach ($categorias as $categoria => $value) : ?>
                        <option> <?php echo $value['NOMBRE'] ?> </option>
                    <?php endforeach; ?>
                </select>
        <input type="submit" name="altapro" id="submit" value="Dar de alta">
        <?php
        
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             if (isset($_POST["altapro"])) {
               altaProducto($conn);
             }
          }
        ?>
</form>
</body>

</html>

