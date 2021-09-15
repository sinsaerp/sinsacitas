<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codeps', 'tipidafil', 'afcodigo', 'afape1', 'afape2', 'afnom1',
        'afnom2', 'fecha_nacimiento', 'sexo', 'telefono', 'direccion', 'regimen', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullNameAttribute()
    {
    return "{$this->afnom1} {$this->afnom2} {$this->afape1} {$this->afape2}";
    }

    public function setAfnom1Attribute($value)
    {
        $this->attributes['afnom1'] = strtoupper($value);
    }

    public function setAfnom2Attribute($value)
    {
        $this->attributes['afnom2'] = strtoupper($value);
    }

    public function setAfape1Attribute($value)
    {
        $this->attributes['afape1'] = strtoupper($value);
    }

    public function setAfape2Attribute($value)
    {
        $this->attributes['afape2'] = strtoupper($value);
    }

    public static function validarDuplicado($codigo, $tipo){
        return User::where('afcodigo', $codigo)->where('tipidafil',$tipo)->where('estado',1)->get();

    }

    public static function obtenerRips(){
        return DB::table('users')->max('id')+1;
    }


}
