<?php

namespace App\Http\Controllers;

use App\CoincidenciasCurp;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportarDatosController extends Controller
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
     * Import data to database.
     *
     * @return \Illuminate\Http\Response
     */
    public function comparar(Request $request) {

        if($request->file('coincidenciasCurp')) {
            $path = $request->file('coincidenciasCurp')->getRealPath();
            $data = Excel::load($path, function($reader) {
                    })->get();

            if(!empty($data) && $data->count()) {
                $data = $data->toArray();
                
                for($i=0; $i<count($data); $i++) {
                    $dataImported[] = $data[$i];
                    if($i % 1000 == 0) {
                        CoincidenciasCurp::insert($dataImported);
                        $dataImported = null;
                    }
                }
            }
            CoincidenciasCurp::insert($dataImported);
        }
        //return back();
        return "Datos importados";
    }
}
