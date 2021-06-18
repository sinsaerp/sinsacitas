<?php

namespace App\Http\Livewire;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Perfil extends Component
{
    public $user, $fecha_nacimiento, $telefono, $direccion, $email;
    public $updateMode = false;

    public function render()
    {
        $this->user=Auth::user();
        return view('livewire.perfil.perfil');
    }

    public function update(){
        $validatedDate = $this->validate([
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'required|max:10',
            'direccion' => 'required',
            'email' => 'required|email',
        ]);
        $obj=User::find($this->user->id);



            $obj->update([
                'fecha_nacimiento' => $this->fecha_nacimiento,
                'telefono' => $this->telefono,
                'direccion' => $this->direccion,
                'email' => $this->email,
            ]);
            session()->flash('message', 'INFORMACION ACTUALIZADA EXITOSAMENTE.');

        $this->updateMode = false;
    }

    public function edit(){
        $this->updateMode = true;
        $this->fecha_nacimiento=$this->user->fecha_nacimiento;
        $this->telefono=$this->user->telefono;
        $this->direccion=$this->user->direccion;
        $this->email=$this->user->email;
    }
}
