<?php

namespace App\Http\Livewire;

use App\Models\Especialidad;
use App\Models\TipoConsulta;
use Livewire\Component;
use Livewire\WithPagination;

class Tipoconsultas extends Component
{
    use WithPagination;
    public  $nombre, $descripcion, $especialidad, $tip_id;
    public $updateMode = false;
    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;
    private $model=TipoConsulta::class;


    public function render()
    {
        $especialidades=Especialidad::getActive();
        return view('livewire.tipoconsultas.tipoconsultas', [
            'data' => $this->model::search($this->search)
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->simplePaginate($this->perPage), 'especialidades'=>$especialidades,
        ]);
    }

    private function resetInputFields(){
        $this->nombre = '';
        $this->descripcion = '';
        $this->especialidad = '';
        $this->tip_id = '';
    }

    public function store()
    {

        $validatedDate = $this->validate([
            'nombre' => 'required',
            'especialidad' => 'required',
        ]);

        $this->model::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'especialidad_id' => $this->especialidad,
        ]);
        session()->flash('message', 'INFORMACIÓN REGISTRADA EXITOSAMENTE.');
        $this->resetInputFields();
        $this->emit('modal');


    }

    public function edit($id)
    {

        $this->updateMode = true;
        $obj = $this->model::where('id',$id)->first();
        $this->tip_id = $id;
        $this->nombre = $obj->nombre;
        $this->descripcion = $obj->descripcion;
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
            'descripcion' => 'required',
        ]);

        if ($this->tip_id) {
            $eps = $this->model::find($this->tip_id);
            $eps->update([
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
                'especialidad_id' => $this->especialidad,
            ]);
            $this->updateMode = false;
             $this->emit('modal');
            session()->flash('message', 'INFORMACION ACTUALIZADA EXITOSAMENTE.');
            $this->resetInputFields();


        }
    }

    public function setId($id){
        $this->tip_id=$id;
    }

    public function delete()
    {

        if($this->tip_id){
            $eps = $this->model::find($this->tip_id);

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
