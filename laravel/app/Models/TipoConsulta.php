<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoConsulta extends Model
{
    protected $table="tipoconsulta";
    protected $fillable =['id','nombre', 'codigo', 'descripcion', 'especialidad_id', 'estado'];

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('id', 'like', '%'.$search.'%')
                ->orWhere('nombre', 'like', '%'.$search.'%')
                ->orWhere('especialidad', 'like', '%'.$search.'%')
                ->orWhere('descripcion', 'like', '%'.$search.'%');
    }

    public static function getByEspecialidad($search)
    {
        return TipoConsulta::where('especialidad_id', $search)->where('estado', 1)->get();
    }
    public static function getActive()
    {
        return TipoConsulta::where('estado', 1)->get();
    }

    public function especialidad()
    {
        return $this->belongsTo('App\Models\Especialidad', 'especialidad_id');
    }


    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] =strtoupper($value);
    }
}
