<?php

namespace App\Http\Controllers;

// Tiempo máximo de ejecución para el script en segundos
ini_set('max_execution_time', 300);
// Límite de memoria para el script
ini_set('memory_limit','512M');

use App\CoincidenciasCurp;
use App\CoincidenciasNombreFecha;
use App\Asegurados;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CruzarDatosController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cruzar');
    }

    /**
     * Relaciona información de Coincidencias CURP y/o Coincidencias Nombre y Fecha 
     * con el archivo Relación de asegurados basado en el número de afiliación.
     * @param int
     * @return \Illuminate\Http\Response
     */
    public function cruzar($tipo)
    {
        switch($tipo) {
            case 1:
                // Registros que aparecen en "Coincidencias CURP" y en archivo .R con los campos mvto y umf.
                $data = $this->cruzarAsegurados(CoincidenciasCurp::class, 'coincidencias_curps');
                $file_name = "coincidencias_curp_asegurados";
                break;
            case 2:
                // Registros que aparecen en "Coincidencias Nombre y fecha" y en archivo .R con los campos mvto y umf.
                $data = $this->cruzarAsegurados(CoincidenciasNombreFecha::class, 'coincidencias_nombre_fechas');
                $file_name = "coincidencias_nombre_fecha_asegurados";
                break;
            case 3:
                $data = $this->cruzarTodos();
                $file_name = "coincidencias_curp_nombre_fecha_asegurados";
            break;
            default:
                $data = $this->cruzarTodosRemanentes();
                $file_name = "remanentes_curp_nombre_fecha_asegurados";
        }
        
        $data = json_decode( json_encode($data), true);
        Excel::create($file_name, function($excel) use($data) {
            $excel->sheet('Hoja 1', function($sheet) use($data) {
                $sheet->fromArray($data);
            });
        })->download('csv');
    }

    /**
     * Registros relacionados entre un archivo de Coincidencias y Relación de asegurados.
     *
     * @return array
     */
    private function cruzarAsegurados($model, $tabla) {
        return  $model::select(
                $tabla.'.afiliacion', 
                $tabla.'.nombre',  
                'asegurados.mvto', 
                $tabla.'.fec_mvto',
                $tabla.'.curp',
                $tabla.'.matricula',
                $tabla.'.semestre',
                $tabla.'.num_p',
                $tabla.'.nom_p',      
                'asegurados.umf')
                ->join('asegurados', $tabla.'.afiliacion', '=', 'asegurados.afiliacion')
                ->getQuery()
                ->get();
    }

    /**
     * Registros que aparecen en los tres archivos con los campos mvto y umf.
     *
     * @return array
     */
    private function cruzarTodos() {
        return  CoincidenciasCurp::select(
                'coincidencias_curps.afiliacion', 
                'coincidencias_curps.nombre',  
                'asegurados.mvto', 
                'coincidencias_curps.fec_mvto',
                'coincidencias_curps.curp',
                'coincidencias_curps.matricula',
                'coincidencias_curps.semestre',
                'coincidencias_curps.num_p',
                'coincidencias_curps.nom_p',      
                'asegurados.umf')
                ->join('coincidencias_nombre_fechas', 'coincidencias_curps.afiliacion', 
                        '=', 'coincidencias_nombre_fechas.afiliacion')
                ->join('asegurados', 'coincidencias_curps.afiliacion', '=', 'asegurados.afiliacion')
                ->getQuery()
                ->get();
    }

    /**
     * Registros que aparecen en archivo .R pero no en "Coincidencias CURP" ni en "Coincidencias Nombre y fecha".
     *
     * @return array
     */
    private function cruzarTodosRemanentes() {
        return  CoincidenciasCurp::select('*')
                ->join('coincidencias_nombre_fechas', 'coincidencias_curps.afiliacion', 
                        '=', 'coincidencias_nombre_fechas.afiliacion')
                ->rightJoin('asegurados', 'coincidencias_curps.afiliacion', '=', 'asegurados.afiliacion')
                ->whereNull('coincidencias_curps.afiliacion')
                ->getQuery()
                ->get();
    }
}
