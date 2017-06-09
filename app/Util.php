<?php

namespace App;
/**
 * @author Dloaiza <dfloaiza@gmail.com>
 * @since 1.0 08/06/2017 
 * Clase con metodos estaticos que son de utilidad y pueden ser reutilizados
 * a lo largo de la aplicación
 */
class Util {
    
    /**
     * metodo encargado de recibir un indice y restar una unidad a este para 
     * que los valores correspondan en el arreglo respecto a los dados por el
     * problema 
     * @param Integer $index, el tamaño del indice sin dar formato
     * @return Integer $index, el tamaño del indice correcto para el arreglo 
     */
    static public function FORMAT_INDEX($index) {
        return $index-1;
    }
    
     /**
     * metodo encargado de transformar los input a arreglos para que se pueda
     * iterar mas facilmente sobre los datos
     * @param String $input, cadena con los valores ingresados por el usuario
     * @return array, arreglo con los valores separados (uno en cada indice del arreglo)
     */
    static public function GET_INPUT_ARRAY($input) {
        return explode(" ", $input);
    }
}
