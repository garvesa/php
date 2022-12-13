<HTML>

<HEAD>
    <TITLE> EJ6B – Factorial</TITLE>

    <style>
        table,
        tr,
        td {
            border: 1px solid;
            border-collapse: collapse;
            font-size: 3rem;
            padding: 1rem;

            text-align: center;
        }

        div {
            width: fit-content;
            display: flex;
            padding: 1rem
        }
    </style>
</HEAD>

<BODY>
    <?php
    $ganador = false;
    printf("<div>");
    $carton1 = createCarton();
    $carton2 = createCarton();
    $carton3 = createCarton();
    printf("</div>");

    while (!$ganador) {
		 printf("<div>");
        generarBolas($carton1, $carton2, $carton3);
        printf("</div>");
    }

    //función para generar arrays
    function createCarton()
    {
        $arr_2d = [];
        $numeros_bolsa = [];
        $numeros_rellenar = [];
        $numeros_rellenar_count = 0;
        $numeros_no_validos = [];
        $rand = 0;
        $vacio = 0;
        $vacio_count = 0;

        printf("<div>");
        printf("<table>");

        //generar números
        for ($i = 1; $i <= 60; $i++) {
            $numeros_bolsa[$i] = $i;
        }

        $numeros_rellenar = $numeros_bolsa;

        for ($i = 0; $i < 3; $i++) {
            $arr_rows = [];
            printf("<tr>");
            unset($numeros_no_validos);
            $numeros_no_validos = [];
            $numeros_rellenar = $numeros_bolsa;
            for ($j = 0; $j < 7; $j++) {
                $vacio = rand(1, 10);
                if ($vacio % 2 == 0 || $vacio_count == 6) {
                    $numeros_rellenar_count++;
                    $rand = rand(1, 60 - $numeros_rellenar_count);
                    while (array_search($rand, $numeros_no_validos)) {
                        $rand = rand(1, 60 - $numeros_rellenar_count);
                    }
					 $numero = $numeros_rellenar[array_search($rand, $numeros_rellenar)];
                    unset($numeros_rellenar[array_search($numero, $numeros_rellenar)]);
                    $numeros_rellenar = array_values($numeros_rellenar);
                    $numeros_no_validos[] = $numero;
                    printf("<td>" . $numero . "</td>");
                    $arr_rows[] = $numero;
                } else {
                    $arr_rows[] = "";
                    printf("<td></td>");
                    $vacio_count++;
                }
            }
            printf("</tr>");
            $arr_2d[] = $arr_rows;
        }

        printf("</table>");
        printf("</div>");

        return $arr_2d;
    }

    //FUNCION GENERAR BOLAS-------------------------------------------------------------------------

    function generarBolas($carton1, $carton2, $carton3)
    {
        $arrayBolas = array();
        $valorRandomPrimero = mt_rand(0, 60);
        array_push($arrayBolas, $valorRandomPrimero);
        $x = 1;
        while ($x <= 60) {
            $siguienteValorRadom = mt_rand(0, 60);
            if (in_array($siguienteValorRadom, $arrayBolas)) {
                continue;
            } else {
                array_push($arrayBolas, $siguienteValorRadom);
                $x++;
            }
			        }
        $bola = array_pop($arrayBolas);
        echo "Ha salido la bola :" . $bola;

        comrpobar($bola, $carton1, $carton2, $carton3);
    }

    // comprobar cartón
    function comrpobar($bola, $carton1, $carton2, $carton3)
    {
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 7; $j++) {
                if ($bola == $carton1[$i][$j]) {
                    $carton1[$i][$j] = true;
                }
            }
        }
    }


    ?>
</BODY>

</HTML>
