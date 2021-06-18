<?php
namespace App\Http\Livewire;

use App\Models\Epssi;
use Livewire\Component;
use Livewire\WithPagination;

class Eps extends Component
{
    use WithPagination;
    public $nombre, $codeps, $eps_id;
    public $updateMode = false;


    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;


    public function render()
    {
        return view('livewire.eps.eps', [
            'data' => Epssi::search($this->search)
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->simplePaginate($this->perPage),
        ]);
    }

    private function resetInputFields(){
        $this->emit('tabla');
        $this->nombre = '';
        $this->codeps = '';
    }

    public function store()
    {

        $validatedDate = $this->validate([
            'nombre' => 'required',
            'codeps' => 'required',
        ]);

        Epssi::create($validatedDate);

        session()->flash('message', 'INFORMACIÓN REGISTRADA EXITOSAMENTE.');

        $this->resetInputFields();

        $this->emit('modal');


    }

    public function edit($id)
    {

        $this->updateMode = true;
        $eps = Epssi::where('id',$id)->first();
        $this->eps_id = $id;
        $this->nombre = $eps->nombre;
        $this->codeps = $eps->codeps;


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
            'codeps' => 'required',
        ]);

        if ($this->eps_id) {
            $eps = Epssi::find($this->eps_id);
            $eps->update([
                'nombre' => $this->nombre,
                'codeps' => $this->codeps,
            ]);
            $this->updateMode = false;
             $this->emit('modal');
            session()->flash('message', 'INFORMACION ACTUALIZADA EXITOSAMENTE.');
            $this->resetInputFields();


        }
    }

    public function setId($id){
        $this->eps_id=$id;
    }

    public function delete()
    {

        if($this->eps_id){
            $eps = Epssi::find($this->eps_id);

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
