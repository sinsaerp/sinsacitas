<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table="horariom";
    protected $fillable =['medico', 'fecha', 'hora', 'estado'];

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('id', 'like', '%'.$search.'%')
                ->orWhere('medico', 'like', '%'.$search.'%');

    }

    public static function getHorarioFecha($medico)
    {
        return Horario::where('medico', $medico)->where('estado', 1)->get();
    }


    public function medico()
    {
        return $this->belongsTo('App\Models\Medico', 'medico');
    }


    public static function getHorarioHora($medico, $fecha)
    {
        return Horario::where('medico', $medico)->where('fecha', $fecha)->where('estado', 1)
        ->orderBy('hora', 'asc')
        ->get(['id', 'hora']);
    }

    public static function getActive()
    {
        return Horario::where('estado', 1)->get();
    }

}
