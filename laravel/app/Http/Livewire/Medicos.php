<?php

namespace App\Http\Livewire;

use App\Models\Especialidad;
use App\Models\Medico;
use Livewire\Component;
use Livewire\WithPagination;

class Medicos extends Component
{
    use WithPagination;
    public  $nombre, $especialidad, $med_id;
    public $updateMode = false;
    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;
    private $model=Medico::class;


    public function render()
    {
        $especialidades=Especialidad::getActive();
        return view('livewire.medicos.medicos', [
            'data' => $this->model::search($this->search)
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->simplePaginate($this->perPage), 'especialidades'=>$especialidades,
        ]);
    }

    private function resetInputFields(){
        $this->nombre = '';
        $this->especialidad = '';
        $this->med_id = '';
    }

    public function store()
    {

        $validatedDate = $this->validate([
            'nombre' => 'required',
            'especialidad' => 'required',
        ]);

        $this->model::create(
            [
                'nombre' =>$this->nombre,
                'especialidad_id' => $this->especialidad,
            ]
        );
        session()->flash('message', 'INFORMACIÓN REGISTRADA EXITOSAMENTE.');
        $this->resetInputFields();
        $this->emit('modal');


    }

    public function edit($id)
    {

        $this->updateMode = true;
        $obj = $this->model::where('id',$id)->first();
        $this->med_id = $id;
        $this->nombre = $obj->nombre;
        $this->especialidad = $obj->especialidad_id;


    }

    public function cancel()
    {

        $this->updateMode = false;
        $this->resetInputFields();



    }

    public function update()
    {

        $validatedDate = $this->validate([
            'nombre' => 'required',
            'especialidad' => 'required',
        ]);

        if ($this->med_id) {
            $eps = $this->model::find($this->med_id);
            $eps->update([
                'nombre' => $this->nombre,
                'especialidad_id' => $this->especialidad,
            ]);
            $this->updateMode = false;
             $this->emit('modal');
            session()->flash('message', 'INFORMACION ACTUALIZADA EXITOSAMENTE.');
            $this->resetInputFields();


        }
    }

    public function setId($id){
        $this->med_id=$id;
    }

    public function delete()
    {

        if($this->med_id){
            $eps = $this->model::find($this->med_id);

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
