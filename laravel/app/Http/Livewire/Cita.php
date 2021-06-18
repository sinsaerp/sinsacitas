<?php

namespace App\Http\Livewire;

use App\Models\Cita as ModelsCita;
use App\Models\CitaServicio;
use App\Models\Especialidad;
use App\Models\Horario;
use App\Models\Medico;
use App\Models\TipoConsulta;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Cita extends Component
{
    public $especialidad, $especialidad_id, $nespecialidad,
     $nmedico, $medico, $medico_id, $tipo, $seleccion='', $horario, $user, $autorizacion, $fecha, $fechaFormato;
    public $horas=[];
    public $horarios=[], $tipos=[], $medicos=[], $especialidades=[];
    protected $listeners = ['say-hello' => 'sayHello'];

    public function render()
    {
        $fechas=array();
        
        $this->user=Auth::user();
        if(!empty($this->especialidad)){
        $part = explode("-", $this->especialidad);
        $this->especialidad_id=$part[0];
        $this->nespecialidad=$part[1];
        }


        if(!empty($this->medico)){
            $partM = explode("-", $this->medico);
            $this->medico_id=$partM[0];
            $this->nmedico=$partM[1];
        }
        $this->especialidades=Especialidad::getActive();
        if($this->especialidad_id){
            $this->tipos=TipoConsulta::getByEspecialidad($this->especialidad_id);
        }

        if($this->especialidad && $this->tipo){
            $this->medicos=Medico::getByEspecialidad($this->especialidad_id);            
        }
        if($this->medico){
            $this->horarios=Horario::getHorarioFecha($this->medico_id);
                    
            foreach($this->horarios as $horario){
                array_push($fechas, Carbon::parse($horario->fecha)->format('d-m-Y'));
            }
        }
       if(empty($this->fecha)){
        $this->emit('fecha', $fechas);
       }
        if(!empty($this->fecha)){
            setlocale(LC_ALL,"es_ES");
            $this->fechaFormato='';
        }
       
        return view('livewire.citas.cita');
    }

    public function horaFormat($hora){
        return Carbon::parse($hora)->format('h:i');
    }




    public function sayHello($payload)
    {
        $this->fecha = $payload['name'];
        $this->horas=Horario::getHorarioHora($this->medico_id, $this->fecha);
    }

    public function select($id, $horario){
        if($this->seleccion==$id){
            $this->seleccion='';
        }else{
            $this->seleccion=$id;
            $this->horario=$horario;
        }

    }

    private function resetInputFields(){

        $this->especialidad = '';
        $this->medico = '';
        $this->tipo = '';
        $this->seleccion = '';
        $this->horario = '';
        $this->user = '';
        $this->autorizacion = '';
        $this->nmedico = '';
        $this->medico_id = '';
        $this->especialidad_id = '';
        $this->nespecialidad= '';
        $this->fechaFormato= '';
    }

     public function store()
    {

        $validatedDate = $this->validate([
            'especialidad_id' => 'required',
            'tipo' => 'required',
            'medico_id' => 'required',
            'seleccion' => 'required',
            'horario' => 'required',
        ]);
        try{

            DB::beginTransaction();
            $hor=Horario::find($this->horario);
            $obj=new ModelsCita();
            $obj->paciente=$this->user->afcodigo;
            $obj->rips=random_int(1,100);
            $obj->medico=$this->medico_id;
            $obj->fecha=Carbon::now()->format('Y-m-d');
            $obj->fechaDeseada=Carbon::now()->format('Y-m-d');
            $obj->hora=Carbon::now()->format('H:i:s');
            $obj->fechaCita=$hor->fecha;
            $obj->horaCita=$hor->hora;
            $obj->entidad=$this->user->codeps;
            $obj->autorizacion=$this->autorizacion;
            $obj->save();
            CitaServicio::create([
                'rips'=>$obj->rips,
                'codigo'=>random_int(1,100),
                'descripcion'=>$this->nespecialidad.'-'.$this->tipo,
                'cantidad'=>1,
            ]);
            $hor->estado=0;
            $hor->save();
            DB::commit();
            $this->resetInputFields();
            $this->emit('modal');
            $this->emit('notificacion');
            //session()->flash('message', 'INFORMACIÓN REGISTRADA EXITOSAMENTE.');
        } catch(Exception $e){
            DB::rollBack();
            session()->flash('message', $e->getMessage());
        }

    }




}
