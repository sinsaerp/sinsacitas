<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class Cita extends Model
{
    protected $table="citas";
    protected $fillable =['paciente', 'medico', 'fecha', 'fechaDeseada', 'fechaCita'
    , 'horaCita', 'hora', 'rips', 'entidad', 'autorizacion', 'observaciones', 'estado'];

    public static  function getHistorialPaciente($paciente, $search){
        return  DB::table('citas as c')
        ->join('citasservicios as cs', 'c.rips', '=', 'cs.rips')
        ->join('medicos as m', 'm.codigo', '=', 'c.medico')
        ->select('m.nombre as medico', 'c.fechaCita', 'c.horaCita', 'c.estado', 'cs.descripcion', 'c.observaciones')
        ->where('c.paciente', $paciente)
        ->orWhere('c.fechaCita', date('Y-m-d' , strtotime($search)));
    }


    public function medico()
    {
        return $this->belongsTo('App\Models\Medico', 'medico');
    }


    public static function getCitasFilter($fecha1, $fecha2){

        return  DB::table('citas as c')
        ->join('citasservicios as cs', 'c.rips', '=', 'cs.rips')
        ->join('medicos as m', 'm.codigo', '=', 'c.medico')
        ->join('users as u', 'c.paciente', '=', 'u.afcodigo')
        ->select('u.codeps', 'u.tipidafil', 'u.afcodigo', 'u.afape1', 'u.afape2', 'u.afnom1', 'u.afnom2',
        'u.fecha_nacimiento', 'u.sexo', 'u.email', 'u.telefono', 'u.direccion', 'u.regimen',
         'm.nombre as medico', 'c.fechaCita', 'c.horaCita','cs.descripcion',
         'c.id', 'm.codigo as medico_id', 'cs.codigo', 'c.created_at as fecha', 'c.estado')
        ->whereBetween('c.fechaCita', [$fecha1, $fecha2])
        ->where('c.estado', 1)
        ->get();

    }

    public static function getCitaServicios($id){

        return  DB::table('citas as c')
        ->join('citasservicios as cs', 'c.rips', '=', 'cs.rips')
        ->join('users as u', 'c.paciente', '=', 'u.afcodigo')
        ->join('medicos as m', 'm.codigo', '=', 'c.medico')
        ->select('c.fechaCita', 'c.horaCita','cs.descripcion', 'u.telefono', 'c.estado', 'm.nombre as medico')
        ->where('c.id', $id)
        ->first();
    }


    public static function envioApi($data){


                $sms="SU CITA DE ".($data['servicio']).
                " FUE PROGRAMADA PARA EL DIA ".($data['fecha']).' A LAS  '.$data['hora']. ' CON EL MEDICO '.$data['medico'].' RECUERDE LLEVAR TODOS SUS DOCUMENTOS';

                $params=[
                    'toNumber'=>'57'.$data['telefono'],
                    'sms'=>$sms,
                    "sc"=>"890202",
                ];

                $response = Http::withHeaders([
                    'account' => '10023571',
                    'apiKey' => 'ozyZl9NXY5ZFcTpELleWbIykhBWHzg',
                    'token'=>'2f074dfb4fafb1f665fbbfce09f1df57'
                ])->withBody(json_encode($params),'aplication/json')
                ->post('https://api103.hablame.co/api/sms/v3/send/priority');
                $body= $response->body();
    }



}
