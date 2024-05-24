<?php
    require_once("Perceptron.php");
    require_once("Perceptron2.php");

    function test1() {
        $p = new Perceptron(0.5);

        $p->aprender();

        $set = $p->crearSet();
        foreach ($set as $row) {
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
        $p = new Perceptron2(0.5);

        for ($i = 0; $i<4; $i++) {
            $p->aprender();
        }      

        $set = $p->crearSet();
        foreach ($set as $row) {
            $x = $row[0];
            $z = $row[1];
            $y = $p->f_x($x);

            echo "A:". $x[0]." B:".$x[1];
            echo " Salida esperada: ".$z;
            echo " Salida obtenida: ".$y;
            echo "\n";
        }
    }

    test2();