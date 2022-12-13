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
      $almacenes=mostrarnifCliente($conn);
    ?>
    <h2>Obtener info de las compras de los clientes mediante su nif entre unas fechas concretas</h2>
    <form method='post' action="<?php echo $_SERVER['PHP_SELF']; ?>">

        <label for="cat">Selecciona el NIF del cliente:</label>
                <select name="nifs">
                    <?php foreach ($almacenes as $almacen => $value) : ?>
                        <option> <?php echo $value['NIF'] ?> </option>
                    <?php endforeach; ?>
                    </select>
        <br><br>
        <label for=" name">Fecha desde : </label>
        <input type="date1" name="cantpro" id="name">
        <br><br>
        <label for=" name">Fecha hasta : </label>
        <input type="date2" name="cantpro" id="name">
        <br><br>

        <input type="submit" name="com" id="submit" value="Mostrar Información de las compras">
        <?php
        
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             if (isset($_POST["com"])) {
               mostrarinfoPro($conn);
             }
          }
        ?>
</form>
</body>

</html>