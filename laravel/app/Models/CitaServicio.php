<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CitaServicio extends Model
{

    protected $table="citasservicios";
    protected $fillable =['rips', 'codigo', 'descripcion', 'cantidad', 'estado'];


}
