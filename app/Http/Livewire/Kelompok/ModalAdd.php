<?php

namespace App\Http\Livewire\Kelompok;

use App\Models\Unvr;
use Carbon\Carbon;
use LivewireUI\Modal\ModalComponent;

class ModalAdd extends ModalComponent
{

    public $unvr, $new_case, $spesimen;

    protected $rules = [
        'unvr' => 'required|numeric',
        'new_case' => 'required|numeric',
        'spesimen' => 'required|numeric|gte:1'
    ];

    public function handleForm()
    {
        $this->validate();

        $lastData = Unvr::latest('id')->first();
        $rasio = $this->new_case / $this->spesimen;
        $reg_unvr = 7061.517 - 104.272 * ($lastData->id + 1);
        $reg_rasio = 11.711 - 0.097 * ($lastData->id + 1);

        Unvr::create([
            'unvr' => $this->unvr,
            'tanggal' => Carbon::parse($lastData->tanggal)->addWeek(),
            'spesimen' => $this->spesimen,
            'rasio' => $rasio,
            'reg_unvr' => $reg_unvr,
            'reg_rasio' => $reg_rasio
        ]);

        $this->emit('reloadTable', 'kelompok.table');
        return $this->emit('closeModal');
    }

    public function render()
    {
        return view('livewire.kelompok.modal-add');
    }
}
