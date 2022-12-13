<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Alta Almacén</h2>
    <form method='post' action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for=" name">Localidad Almacén</label>
        <input type="text" name="loca" id="name">
        <br><br>
        <input type="submit" name="submit" id="submit" value="Dar de alta">
    </form>
</body>

</html>

<?php
include 'funcionescompras.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $connection = connection();
    altaAlmacen($_POST['loca'],$connection);
}
?>