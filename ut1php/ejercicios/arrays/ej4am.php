<HTML>

<HEAD>
    <TITLE> EJ4	Array Multidimensional Gabriel</TITLE>
</HEAD>
<style>
table,tr,td{ border: 1px solid black;
}
</style>
<BODY>
<?php
$arr = [];
    $x = 3;
    $y = 5;
    $count = 0;
    $max = 0;
    $arr_max[] = array(0, 0);

    for ($i = 0; $i < $x; $i++) {
        $arr_rows = [];
        for ($j = 0; $j < $y; $j++) {
            $count += 2;
            $arr_rows[] = $count;
            if ($count > $max) {
                $max = $count;
                $arr_max[0] = $i;
                $arr_max[1] = $j;
            }
        }
    }


    printf("(" . $arr_max[0] . "," . $arr_max[1] . ") = " . $max . "<br>");
?>
</BODY>

</HTML>