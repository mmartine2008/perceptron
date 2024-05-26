<?php
    require_once("Perceptron.php");

    function test1() {
        $salida = [
            [[0, 0], 0],
            [[0, 1], 0],
            [[1, 0], 0],
            [[1, 1], 1],
        ];

        $p = new Perceptron(0.5, [0, 0], $salida);

        $p->aprender();

        foreach ($salida as $row) {
            $x = $row[0];
            $z = $row[1];
            $y = $p->f_x($x);

            echo "A:". $x[0]." B:".$x[1];
            echo " Salida esperada: ".$z;
            echo " Salida obtenida: ".$y;
            echo "\n";
        }
    }

    function test2() {
        $salida = [
            [[0, 0, rand(0, getrandmax()) / getrandmax()], 0],
            [[0, 1, rand(0, getrandmax()) / getrandmax()], 0],
            [[1, 0, rand(0, getrandmax()) / getrandmax()], 0],
            [[1, 1, rand(0, getrandmax()) / getrandmax()], 1],
        ];

        $resultados = [];
        for ($i = 0; $i < 10; $i++) {

            $cant_pruebas = 10;
            $acum = 0;
            for ($pruebas = 0; $pruebas < $cant_pruebas; $pruebas++) {
                $p = new Perceptron(0.5, [0, 0, 0], $salida);
                $p->iterarAprendizaje($i);
                $ratio = $p->obtenerResultados();
                $acum = $acum + $ratio;
            }
            $promedio = $acum / $cant_pruebas;
            $resultados[$i] = $promedio;
    
        }
        print_r($resultados);
    }

    test2();