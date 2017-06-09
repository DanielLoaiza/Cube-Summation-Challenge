<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cube;
use App\Util;
use App\VALIDATE;
use App\Http\Requests;
/**
 * @author Dloaiza <dfloaiza@gmail.com>
 * @since 1.0 10/04/2016 
 * Controlador encargado de recepcionar los datos ingresados por el usuario
 * y enviarlos al modelo del cubo para finalmente proporcionar los resultados
 * pertinentes
 */
class CubeController extends Controller
{
    
     /**
      * 
     * Recepciona y procesa los datos ingresados por el usuario
     *
     * @param  Request $request, la petición enviada por el usuario,
      * a partir de esta se optienen los datos
     * @return JSON Response, El resultado obtenido de acuerdo a la query enviada
      * por el usuario
     */
    public function processData (Request $request)
    {
        $input = $request->request->get('input');
        // Se obtiene un arreglo separando los elementos por salto de linea
        $cubeInfo = explode("\n",$input);
        $testCases = current($cubeInfo);
        $testCase = 0;
        // Arreglo para almacenar la informacion de todas las consutlas QUERY
        $queryInfo = array();
        
        // Se valida que el numero de casos de prueba cumplan con lo especificado en el problema
        if(VALIDATE::TEST_CASES($testCases) == true) {
            while ( $testCase < $testCases ) {
                $initialData = next($cubeInfo);
                if(VALIDATE::INITIAL_DATA($initialData) == true ) {
                    // Se crea una nueva instancia del cubo
                    $cube = $this->prepareData($initialData);
                    for ( $i = 0; $i < $cube->getTotalOperations(); $i++) {
                        // Se realiza una operacion de acuerdo al tipo de consulta
                        $value = next($cubeInfo);
                        $result = $this->readQueryType($cube, $value );
                        if ( $result !== null ) {
                               $queryInfo[] = $result;
                               $result = null;
                        }  
                    }
                    $testCase++;
                } else {
                    return view('output-show',['error' =>'invalid Data']);
                }
            }
                    return view('output-show',['output' => $queryInfo] );
                
        } else {
              return view('output-show', ['error' => 'invalid Data']);
          }
        
    }
    
    /**
     * Metodo encargado de verificar que tipo de comando ingreso el usuario
     * y de acuerdo a esto invocar al metodo necesario
     * @param Cube $cube, la instancia del cubo con el cual se esta interactuando
     * @param String $input, cadena con los valores ingresados por el usuario,
     * puede contener una query o un update
     * @return Integer, el valor de la query solicitada por el usuario o null
     * si no se ha solicitado una query
     */
    private function readQueryType($cube,$input) {
    
        $queryArray = Util::GET_INPUT_ARRAY($input);
        
        switch ($queryArray[0]) {
            case 'UPDATE':
                $cube->updateMatrix(
                        Util::FORMAT_INDEX($queryArray[1]),
                        Util::FORMAT_INDEX($queryArray[2]),
                        Util::FORMAT_INDEX($queryArray[3]),
                        $queryArray[4]
                       );
            break;
            
            case 'QUERY':
                return $cube->queryMatrix(
                        Util::FORMAT_INDEX($queryArray[1]),
                        Util::FORMAT_INDEX($queryArray[2]),
                        Util::FORMAT_INDEX($queryArray[3]),
                        Util::FORMAT_INDEX($queryArray[4]),
                        Util::FORMAT_INDEX($queryArray[5]),
                        Util::FORMAT_INDEX($queryArray[6])
                       );
        }
        return null;
    }
    
    /**
     * funcion encargada de leer el input enviado por el usuario y crear una
     * instancia formateada del cubo
     * @param $string $input, el input enviado por el usuario
     */
    private function prepareData ($input) {
        $initialData = Util::GET_INPUT_ARRAY($input);
        $cube = new Cube($initialData[0], $initialData[1]);
        
        return $cube;
    }
}
