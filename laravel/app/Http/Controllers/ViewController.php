<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('citas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function eps()
    {
        return view('eps.index');
    }

    public function especialidades()
    {
        return view('especialidades.index');
    }

    public function medicos()
    {
        return view('medicos.index');
    }

    public function tipoConsultas()
    {
        return view('tipo-consultas.index');
    }

    public function citas()
    {
        return view('citas.index');
    }

    public function horarios()
    {
        return view('horarios.index');
    }

    public function historial()
    {
        return view('historial.index');
    }

    public function perfil()
    {
        return view('perfil.index');
    }

}
