<?php

namespace App\Http\Controllers;

use App\CoincidenciasCurp;
use App\CoincidenciasNombreFecha;
use App\Coincidencias;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CompararDatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Compara bases de datos
     *
     * @return \Illuminate\Http\Response
     */
    public function comparar(Request $request) {
        $file1 = $request->file('coincidenciasCurp');
        $file2 = $request->file('coincidenciasNomFec');
        $file3 = $request->file('coincidencias');
        
        if(!$file1 || !$file2 || !$file3) {
            return "Error. Seleccione tres archivos para comparar.";
        }

        $this->importar($file1, CoincidenciasCurp::class);
        $this->importar($file2, CoincidenciasNombreFecha::class);
        $this->importar($file3, Coincidencias::class);

        return "Datos importados";
    }

    /**
     * Import data to database.
     *
     * @return void
     */
    private function importar($file, $model) {
        define('CHUNK_SIZE', 1000);

        $path = $file->getRealPath();
        $data = Excel::load($path, function($reader) {})->get();
        $data = $data->toArray();  

        for($i = 0; $i < count($data); $i++) {
            $dataImported[] = $data[$i];
            if($i % CHUNK_SIZE == 0) {
                $model::insert($dataImported);
                $dataImported = null;
            }
        }
        $model::insert($dataImported);
    }
}
