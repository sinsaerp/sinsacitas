<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{

    protected $table="especialidades";
    protected $fillable =['id','codigo', 'nombre', 'estado'];

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('id', 'like', '%'.$search.'%')
                ->orWhere('nombre', 'like', '%'.$search.'%')
                ->orWhere('codigo', 'like', '%'.$search.'%');
    }
    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] =strtoupper($value);
    }


    public static function getActive()
    {
        return Especialidad::where('estado', 1)->get();
    }


}
