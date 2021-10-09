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
        $select = "{$this->column} as import, month";
        $data = Import::selectRaw($select)->get();
        $this->dispatchBrowserEvent('reset-chart', ['data' => json_encode($data), 'attribute' => $this->column]);
    }

    public function render()
    {
        return view('livewire.bar-race');
    }
}
