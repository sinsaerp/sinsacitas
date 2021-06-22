<?php

namespace App\Http\Livewire;

use App\Models\Epssi;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $afape1, $afape2, $afnom1, $afnom2, $afcodigo, $codeps, $tipidafil, $fecha_nacimiento, $sexo, $direccion, $telefono;
    public $email, $password, $password2;
    public $model=User::class;
    public function render()
    {
        $date=Carbon::now();
        $epss=Epssi::getActive();
        if(!empty($this->afcodigo) && !empty($this->tipidafil) ){
           $data=User::validarDuplicado($this->afcodigo, $this->tipidafil);
           if(count($data)>0){
             session()->flash('warning', 'YA EXISTE UN USUARIO CON EL NÚMERO DE IDENTIFICACION INGRESADO.');
        }      

        }
        if(!empty($this->fecha_nacimiento))
        {
            if($this->fecha_nacimiento>$date){
                session()->flash('warning', 'LA FECHA SELECCIONADA NO ES PERMITIDA');
                $this->fecha_nacimiento='';
            }
        }
        return view('livewire.register.register', compact('epss'));
    }

    private function resetInputFields(){
        $this->afape1 = '';
        $this->afape2 = '';
        $this->afnom1 = '';
        $this->afnom2 = '';
        $this->afcodigo = '';
        $this->codeps = '';
        $this->tipidafil = '';
        $this->fecha_nacimiento = '';
        $this->sexo = '';
        $this->direccion = '';
        $this->telefono = '';
        $this->email = '';
        $this->password = '';
        $this->password2 = '';
    }

    public function store()
    {

        $validatedDate = $this->validate([
            'afape1' => 'required|min:3',
            'afnom1' => 'required|min:3',
            'tipidafil' => 'required|min:2',
            'afcodigo' => 'required',
            'fecha_nacimiento' => 'required|date',
            'email' => 'required|email',
            'password2' => 'required|min:5',
            'password' => 'required|min:5',
            'sexo' => 'required',
            'codeps' => 'required',
        ]);
        if($this->password!=$this->password2){
            session()->flash('warning', 'CONTRASEÑAS NO COINCIDEN');
        }else{
            $obj = new User();
            $obj->afape1 = strtoupper($this->afape1) ;
            $obj->afape2 =         strtoupper($this->afape2) ;
            $obj->afnom1 =         strtoupper($this->afnom1) ;
            $obj->afnom2 =         strtoupper($this->afnom2) ;
            $obj->afcodigo =         $this->afcodigo ;
            $obj->codeps =         $this->codeps ;
            $obj->tipidafil =         $this->tipidafil ;
            $obj->fecha_nacimiento =         $this->fecha_nacimiento ;
            $obj->sexo =         $this->sexo ;
            $obj->direccion =         strtoupper($this->direccion) ;
            $obj->telefono =         $this->telefono ;
            $obj->email =         strtoupper($this->email) ;
            $obj->password =         Hash::make($this->password) ;
            $obj->save();

           // session()->flash('message', 'INFORMACIÓN REGISTRADA EXITOSAMENTE.');
            $this->resetInputFields();
            $this->emit('notificacion');

        }

    }

    public function redireccionar(){
        return  redirect()->route('view.login');;
    }
}
