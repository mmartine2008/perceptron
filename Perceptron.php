<?php

    class Perceptron {

        private $y = 0;
        private $w = [0, 0];
        private $u = 0.5;

        public function __construct($u) {
            $this->u = $u;
        }

        /**
         * $x es la entrada
         * $z es la salida esperada
         */
        private function ciclar($x, $delta) {
            $this->y = $this->f_x($x);

            for ($i = 0; $i < count($this->w); $i++) {
                $this->w[$i] = $this->w[$i] + $this->u * ($delta - $this->y)*$x[$i];
            }
        }

        private function escalar($v1, $v2) {
            $acumulador = 0;
            for ($i = 0; $i < count($v1); $i++) {
                $acumulador = $acumulador + $v1[$i] * $v2[$i];
            }
            return $acumulador;
        }

        public function f_x($x) {
            $factor = $this->escalar($x, $this->w) - $this->u;
            if ($factor > 0)
            {
                return 1;
            } else {
                return 0;
            }
        }

        public function crearSet() {
            $salida = [
                [[0, 0], 0],
                [[0, 1], 0],
                [[1, 0], 0],
                [[1, 1], 1],
            ];
            return $salida;
        }

        function aprender() {
            $set = $this->crearSet();

            foreach ($set as $row) {
                $x = $row[0];
                $z = $row[1];

                $this->ciclar($x, $z);
            }
        }
    }

