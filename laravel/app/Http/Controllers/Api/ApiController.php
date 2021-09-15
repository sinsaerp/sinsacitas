<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Livewire\Tipoconsultas;
use App\Models\Cita;
use App\Models\Epssi;
use App\Models\Especialidad;
use App\Models\Horario;
use App\Models\Medico;
use App\Models\TipoConsulta;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function setHorarioM(Request $request)
    {


        if (empty($request->medico) || empty($request->fecha) || empty($request->hora)) {
            return response()->json(['status' => 'No hay data']);
        } else {
            $success = 0;
            $error = 0;

                $data = Horario::updateOrCreate(
                    [

                        'medico' => $request->medico,
                        'fecha' => $request->fecha,
                        'hora' => $request->hora,
                    ],
                    [
                        'medico' => $request->medico,
                        'fecha' => $request->fecha,
                        'hora' => $request->hora,
                    ]
                );



            if ($data) {
                return response()->json(['status' => 'success']);
            } else {
                return response()->json(['status' => 'Error al crear registro']);
            }
        }
    }

    public function setEps(Request $request)
    {
        if(empty($request->codigo) || empty($request->nombre)){
            return response()->json(['status' => 'Datos en blanco']);
        }
            $data = Epssi::updateOrCreate(
            [
                'codeps' => $request->codigo,
                'nombre' => $request->nombre,
            ],
            [
                'codeps' => $request->codigo,
                'nombre' => $request->nombre,
            ]
        );

        if ($data) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'Error al crear registro']);
        }
    }

    public function setEspecialidades(Request $request)
    {
        if(empty($request->codigo) || empty($request->nombre)){
            return response()->json(['status' => 'Datos en blanco']);
        }

                $data = Especialidad::updateOrCreate(
                    [
                        'id' => $request->codigo,
                        'codigo' => $request->codigo,
                        'nombre' => $request->nombre,
                    ],
                    [
                        'id' => $request->codigo,
                        'codigo' => $request->codigo,
                        'nombre' => $request->nombre,
                    ]
                );
            if ($data) {
                return response()->json(['status' => 'success']);
            } else {
                return response()->json(['status' => 'Error al crear registro']);
            }

    }

    public function setMedicos(Request $request)
    {
        if(empty($request->codigo) || empty($request->nombre)){
            return response()->json(['status' => 'Datos en blanco']);
        }
                $data = Medico::updateOrCreate(
                    [

                        'especialidad_id' => $request->codigo,
                        'codigo' => $request->codigo2,
                        'nombre' => $request->nombre,
                    ],
                    [
                        'especialidad_id' => $request->codigo,
                        'codigo' => $request->codigo2,
                        'nombre' => $request->nombre,
                    ]
                );

            if ($data) {
                return response()->json(['status' => 'success']);
            } else {
                return response()->json(['statu' => 'Error al crear registro']);
            }

    }

    public function setTipoConsultas(Request $request)
    {

        if(empty($request->codigo) || empty($request->nombre) || empty($request->codigo2)){
            return response()->json(['status' => 'Datos en blanco']);
        }
                $data = TipoConsulta::updateOrCreate(
                    [
                        'especialidad_id' => $request->codigo,
                        'codigo' => $request->codigo,
                    ],
                    [
                        'especialidad_id' => $request->codigo,
                        'nombre' => $request->nombre,
                        'codigo' => $request->codigo2,
                    ]
                );

            if ($data) {
                return response()->json(['status' => 'success']);
            } else {
                return response()->json(['status' => 'Error al crear registro']);
            }

    }

    public function getCitas(Request $request)
    {
        //return $request;
        if(!empty($request->fecha1) && !empty($request->fecha2)){
            $data = Cita::getCitasFilter($request->fecha1, $request->fecha2);
            return response()->json($data);
        }

    }

    public function estadoCita(Request $request)
    {
        if(!empty($request->id)){
            $params=[];
            $data=Cita::find($request->id);
            $obj = Cita::getCitaServicios($request->id);
            if($request->estado==0){
                $data->estado=0;
                $params=[
                    'servicio'=>$obj->descripcion,
                    'medico'=>$obj->medico,
                    'fecha'=>$obj->fechaCita,
                    'hora'=>$obj->horaCita,
                    'telefono'=>$obj->telefono,
                ];
                Cita::envioApi($params);

            }else{
                $data->estado=2;
            }
            $data->observaciones = $request->observaciones;
            $data->save();
            if ($data) {
                return response()->json(['status' => 'success']);
            } else {
                return response()->json(['status' => 'Error al crear registro']);
            }
        }else{
            return response()->json(['status' => 'Datos en blanco']);
        }


    }
}
