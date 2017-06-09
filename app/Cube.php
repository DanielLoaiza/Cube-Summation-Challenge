<?php

namespace App;

/**
 * @author Dloaiza <dfloaiza@gmail.com>
 * @since 1.0 08/06/2016 
 * clase que representa el cubo el cual contiene los valores indicados en las
 * queries
 */
class Cube {

    /**
     *
     * @var array[][], este atributo representa la estructura de almacenamiento de 
     * los datos, se define como un arreglo  multidimensional de 3 niveles
     */
    private $matrix;

    /**
     *
     * @var Integer, este atributo representa el total de operaciones que se 
     * aplicaran sobre el cubo 
     */
    private $totalOperations;

    /**
     *
     * @var Integer, este atributo representa el tamaño del cubo para x, y , z 
     */
    private $size;

    /**
     * metodo encargado de inicializar el cubo
     * @param type $size, el tamaño del cubo
     * @param type $totalOperations, la cantidad de operaciones a emplear sobre
     * el cubo
     */
    public function __construct($size, $totalOperations) {

        $this->size = $size;
        $this->totalOperations = $totalOperations;
        $this->fillMatrix($size);
    }

    /**
     * metodo encargado de inicializar la matriz segun el tamaño dado
     * @param Integer $size, el tamaño del cubo establecido
     */
    public function fillMatrix($size) {

        for ($x = 0; $x < $size; $x++) {
            for ($y = 0; $y < $size; $y++) {
                for ($z = 0; $z < $size; $z++) {
                    $this->matrix[$x][$y][$z] = 0;
                }
            }
        }
    }

    /**
     * método encargado de actualizar un valores en la matriz segun los valores
     * recibidos
     * @param type $x, la coordenada x 
     * @param type $y, la coordenada y
     * @param type $z, la coordenada en z
     * @param type $value, el valor a almacenar 
     */
    function updateMatrix($x, $y, $z, $value) {
        $this->matrix[$x][$y][$z] = $value;
    }

    /**
     * 
     * @param Integer $x1 el valor en x desde donde se empieza a consultar
     * @param Integer $y1 el valor en y desde donde se empieza a consultar
     * @param Integer $z1 el valor en z desde donde se empieza a consultar
     * @param Integer $x2 el valor en x desde donde se finaliza la consulta
     * @param Integer $y2 el valor en y desde donde se finaliza la consulta
     * @param Integer $z2 el valor en z desde donde se finaliza la consulta
     * @return Integer $cont, el resultado de la sumatoria de los valores entre
     * los rangos de valores establecidos
     */
    function queryMatrix($x1, $y1, $z1, $x2, $y2, $z2) {
        $cont = 0;

        for ($x = $x1; $x <= $x2; $x++) {
            for ($y = $y1; $y <= $y2; $y++) {
                for ($z = $z1; $z <= $z2; $z++) {
                    $cont += $this->matrix[$x][$y][$z];
                }
            }
        }

        return $cont;
    }

    /**
     * metodo get para obtener el total de operaciones sobre el cubo
     * @return Integer totalOperations, el total de operaciones a emplear sobre el cubo
     */
    function getTotalOperations() {
        return $this->totalOperations;
    }



}
