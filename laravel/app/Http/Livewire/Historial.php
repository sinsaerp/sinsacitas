<?php

namespace App\Http\Livewire;

use App\Models\Cita;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Historial extends Component
{
    use WithPagination;

    public $user;
    public $perPage = 10;
    public $search = '';
    public $orderBy = 'c.id';
    public $orderAsc = true;
    public function render()
    {
        $this->user=Auth::user();
        $data=Cita::getHistorialPaciente($this->user->afcodigo, $this->search)
        ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
        ->simplePaginate($this->perPage);
        return view('livewire.historial.historial', compact('data'));
    }
}
