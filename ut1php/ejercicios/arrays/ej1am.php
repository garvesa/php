<HTML>

<HEAD>
    <TITLE> EJ1 Array Multidimensional</TITLE>
</HEAD>
<style>
 table,
        tr,
        td {
            border: 1px solid; 
        }
</style>
<BODY>
<?php

$arr = [];
    $max = 3;
    $count = 0;

    printf("<table>");

    for ($i = 0; $i < $max; $i++) {
        $arr_rows = [];
        printf("<tr>");
        for ($j = 0; $j < $max; $j++) {
            $count += 2;
            $arr_rows[] = $count;
            printf("<td>" . $count . "</td>");
        }
        printf("</tr>");
        $arr[] = $arr_rows;
    }

    printf("</table>");
   
?>
</BODY>

</HTML>