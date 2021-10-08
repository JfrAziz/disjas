<?php

namespace App\Http\Livewire;

use App\Models\Import;
use Livewire\Component;

class BarRace extends Component
{

    public $data, $column;
    public $columnAvailable = ['migas', 'non_migas', 'total'];

    public function mount()
    {
        $this->column = collect($this->columnAvailable)->first();

        $select = "{$this->column} as import, month";
        $this->data = Import::selectRaw($select)->get();
    }

    public function updated()
    {
        $this->emit('stopChart');
        $select = "{$this->column} as import, month";
        $this->data = Import::selectRaw($select)->get();
    }

    public function render()
    {
        return view('livewire.bar-race');
    }
}
