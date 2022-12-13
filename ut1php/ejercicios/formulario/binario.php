<html>
<header>CONVERSOR BINARIO</header>
<body>

<?php

$dec = $_POST["numdec"];
$binario= decbin($dec);
echo ("<br><br><br>");
printf ("Numero Decimal:");
printf ("<input type:text; placeholder=$dec></input>");
echo ("<br><br><br>");
printf ("Numero Binario:");
printf ("<input type:text; placeholder=$binario></input>");

?>
</body>



</html>