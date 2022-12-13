<HTML>

<HEAD>
    <TITLE> EJ7	Array Multidimensional Gabriel</TITLE>
</HEAD>
<BODY>
<?php

 $asignaturas = array(
    array( "FOL" => 1,5,8,4,6,3,6,8,3,9),
    array( "Lenguaje Marcas" => 2,1,1,9,4,2,8,10,2,4 ),
    array( "Base Datos" => 3,7,4,7,4,3,5,8,7,8 ),
    array( "Programacion" => 4,5,4,3,5,2,6,5,6,0 )

);

function maxValueInArray($array, $keyToSearch){
    $currentMax = NULL;
    foreach($array as $arr){
        foreach($arr as $key => $value){
            if ($key == $keyToSearch && ($value >= $currentMax)){
                $currentMax = $value;
            }
        }
    }
    return $currentMax;
}

$value = maxValueInArray($asignaturas, "FOL" );


 
?>
</BODY>

</HTML>