<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Epssi extends Model
{

    protected $table="epssi";
    protected $fillable =['id','codeps', 'nombre', 'estado'];

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('id', 'like', '%'.$search.'%')
                ->orWhere('nombre', 'like', '%'.$search.'%')
                ->orWhere('codeps', 'like', '%'.$search.'%');
    }
    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] =strtoupper($value);
    }

    public static function getActive()
    {
        return Epssi::where('estado', 1)->get();
    }



}
