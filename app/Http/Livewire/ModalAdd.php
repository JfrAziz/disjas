<?php

namespace App\Http\Livewire;

use App\Models\Import;
use Carbon\Carbon;
use LivewireUI\Modal\ModalComponent;

class ModalAdd extends ModalComponent
{

    public $migas, $non_migas;
    
    protected $rules = [
        'migas' => 'required|numeric',
        'non_migas' => 'required|numeric',
    ];

    public function handleForm()
    {
        $this->validate();

        $lastImport = Import::latest('id')->first();

        Import::create([
            'migas' => $this->migas,
            'non_migas' => $this->non_migas,
            'total' => $this->migas+$this->non_migas,
            'month' => Carbon::parse($lastImport->month)->addMonthsNoOverflow()
        ]);

        $this->emit('reloadTable', 'table');
        return $this->emit('closeModal');
    }

    public function render()
    {
        return view('livewire.modal-add');
    }
}