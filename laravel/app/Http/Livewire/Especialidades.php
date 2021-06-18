<?php

namespace App\Http\Livewire;

use App\Models\Especialidad;
use Livewire\Component;
use Livewire\WithPagination;

class Especialidades extends Component
{
    use WithPagination;
    public  $nombre, $codigo, $esp_id;
    public $updateMode = false;
    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;
    private $model=Especialidad::class;


    public function render()
    {
        return view('livewire.especialidades.especialidades', [
            'data' => $this->model::search($this->search)
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->simplePaginate($this->perPage),
        ]);
    }

    private function resetInputFields(){
        $this->nombre = '';
        $this->codigo = '';
        $this->esp_id = '';
    }

    public function store()
    {

        $validatedDate = $this->validate([
            'nombre' => 'required',
            'codigo' => 'required',
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
        $this->eps_id = $id;
        $this->nombre = $obj->nombre;
        $this->codigo = $obj->codigo;


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
            'codigo' => 'required',
        ]);

        if ($this->eps_id) {
            $eps = $this->model::find($this->eps_id);
            $eps->update([
                'nombre' => $this->nombre,
                'codigo' => $this->codigo,
            ]);
            $this->updateMode = false;
             $this->emit('modal');
            session()->flash('message', 'INFORMACION ACTUALIZADA EXITOSAMENTE.');
            $this->resetInputFields();


        }
    }

    public function setId($id){
        $this->esp_id=$id;
    }

    public function delete()
    {

        if($this->esp_id){
            $eps = $this->model::find($this->esp_id);

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
