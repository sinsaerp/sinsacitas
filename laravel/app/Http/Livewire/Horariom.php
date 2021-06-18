<?php

namespace App\Http\Livewire;

use App\Models\Horario;
use App\Models\Medico;
use Livewire\Component;
use Livewire\WithPagination;

class Horariom extends Component
{
    use WithPagination;
    public  $medico, $fecha, $hora,  $hor_id;
    public $updateMode = false;
    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;
    private $model=Horario::class;


    public function render()
    {
        $medicos=Medico::getActive();
        return view('livewire.horariom.horariom', [
            'data' => $this->model::search($this->search)
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->simplePaginate($this->perPage), 'medicos'=>$medicos
        ]);
    }

    private function resetInputFields(){
        $this->medico = '';
        $this->fecha = '';
        $this->hora = '';
        $this->hor_id = '';
    }

    public function store()
    {

        $validatedDate = $this->validate([
            'medico' => 'required',
            'fecha' => 'required|date',
            'hora' => 'required',
        ]);

        $this->model::create($validatedDate);
        session()->flash('message', 'INFORMACIÓN REGISTRADA EXITOSAMENTE.');
        $this->resetInputFields();
        $this->emit('modal');


    }

    public function edit($id)
    {

        $this->updateMode = true;
        $obj = $this->model::where('id',$id)->first();
        $this->hor_id = $id;
        $this->medico = $obj->medico_id;
        $this->fecha = $obj->fecha;
        $this->hora = $obj->hora;


    }

    public function cancel()
    {

        $this->updateMode = false;
        $this->resetInputFields();



    }

    public function update()
    {

        $validatedDate = $this->validate([
            'medico' => 'required',
            'fecha' => 'required',
            'hora' => 'required',
        ]);

        if ($this->hor_id) {
            $eps = $this->model::find($this->hor_id);
            $eps->update([
                'medico_id' => $this->medico,
                'fecha' => $this->fecha,
                'hora' => $this->hora,
            ]);
            $this->updateMode = false;
             $this->emit('modal');
            session()->flash('message', 'INFORMACION ACTUALIZADA EXITOSAMENTE.');
            $this->resetInputFields();


        }
    }

    public function setId($id){
        $this->hor_id=$id;
    }

    public function delete()
    {

        if($this->hor_id){
            $eps = $this->model::find($this->hor_id);

            if($eps->estado==1){
                $eps->estado=0;
                $eps->save();
            }else{
                $eps->estado=1;
                $eps->save();
            }
            $this->render();
            session()->flash('message', 'ESTADO ACTUALIZADO EXITOSAMENTE.');

        }
    }
}
