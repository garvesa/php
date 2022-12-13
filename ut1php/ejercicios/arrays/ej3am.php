<HTML>

<HEAD>
    <TITLE> EJ3	Array Multidimensional Gabriel</TITLE>
</HEAD>
<BODY>
<?php
$cars = array (
  array("Volvo",22,18,"YHUVG686",90),
  array("BMW",15,13,"GHFE5429",140),
  array("Saab",5,2,"HFOD02301",95),
);
printf ("imprimidos por fila <br><br>");

for ($row = 0; $row < 3; $row++) {
  for ($col = 0; $col < 5; $col++) {
	printf ("($row,$col)=( ".$cars[$row][$col]. " pos $row,$col)  - "); 
  }
}

printf (" <br><br> imprimidos por columna <br><br>");

for ($col = 0; $col < 5; $col++) {
  for ($row = 0; $row < 3; $row++) {
	printf ("($row,$col)=( ".$cars[$row][$col]. " pos $row,$col)  - "); 
  }
}
?>
</BODY>

</HTML>