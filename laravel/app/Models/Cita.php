<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
        'u.fecha_nacimiento', 'u.sexo', 'u.email', 'u.telefono', 'u.direccion',
         'm.nombre as medico', 'c.fechaCita', 'c.horaCita','cs.descripcion',
         'c.id', 'm.codigo as medico_id', 'cs.codigo', 'c.created_at as fecha')
        ->whereBetween('c.fechaCita', [$fecha1, $fecha2])
        ->where('c.estado', 1)
        ->get();

    }



}
