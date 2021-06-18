<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $table="medicos";
    protected $fillable =['id', 'especialidad_id', 'nombre', 'codigo', 'foto', 'estado'];

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('id', 'like', '%'.$search.'%')
                ->orWhere('nombre', 'like', '%'.$search.'%')
                ->orWhere('especialidad_ic', 'like', '%'.$search.'%');
    }

    public static function getByEspecialidad($search)
    {
        return Medico::where('especialidad_id', $search)->where('estado', 1)->get();
    }


    public function especialidad()
    {
        return $this->belongsTo('App\Models\Especialidad', 'especialidad_id');
    }

    public static function getActive()
    {
        return Medico::where('estado', 1)->get();
    }

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] =strtoupper($value);
    }

}
