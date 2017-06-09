<?php

namespace App;
use App\Util;

/**
 * @author Dloaiza <dfloaiza@gmail.com>
 * @since 1.0 08/06/2017 
 * Clase que contiene las validaciones necesarias para el funcionamiento de
 * la aplicación
 */
class VALIDATE {
    

    /**
     * 
     * @param Integer $T, el numero de casos de prueba
     * @return boolean en caso de no poder ejecutarse la operacion por que ocurrio alguna infracción se retorna false
     */
    static public function TEST_CASES($T) {
         if ( $T < 1 || $T > 50 ) {
            return false;
        }
        return true;
   }
   
   /**
     * 
     * @param String $input, los valores ingresados por el usuario para M Y N separados por un espacio
     * @return boolean en caso de no poder ejecutarse la operacion por que ocurrio alguna infracción se retorna false
     */
    static public function INITIAL_DATA($input) {
        
        $values = Util::GET_INPUT_ARRAY($input);
        $N = $values[0];
        $M = $values[1];
        
        if ( $N < 1 || $N > 100 ) {
            return false;
        }
        
         if ( $M < 1 || $M > 1000 ) {
            return false;
        }
        
        return true;
    }
    
    /**
     * 
     * @param type $min el valor minimo que se quiere consultar
     * @param type $max el valor maximo que se quiere consultar
     * @param type $N el tamaño de la matriz indicado al inicio de la iteraciones
     * @return boolean en caso de no poder ejecutarse la operacion por que ocurrio alguna infracción se retorna false
     */
    static public function VALUES($min , $max, $N) {
         if ( $min > $max || $min < 1 || $max > $N  ) {
            return false;
        }
        return true;
   }
   
}
