<?php

namespace App\Http\Livewire\Kelompok;

use App\Models\Import;
use App\Models\Unvr;
use LivewireUI\Modal\ModalComponent;

class ModalEdit extends ModalComponent
{

    public Unvr $unvr;
    public $unvr_id, $new_case;
    public $isLastData = false;

    protected $rules = [
        'unvr.unvr' => 'required|numeric',
        'unvr.spesimen' => 'required|numeric|gte:1',
        'new_case' => 'required|numeric',
    ];


    public function mount()
    {
        $lastData = Unvr::latest('id')->first();

        if ($lastData->id !== $this->unvr_id) $this->unvr = Unvr::find($this->unvr_id);
        else {
            $this->unvr = $lastData;
            $this->isLastData = true;
        }
        $this->new_case = round($this->unvr->spesimen * $this->unvr->rasio);
    }

    public function handleForm()
    {
        $this->validate();

        $this->unvr->rasio = $this->new_case / $this->unvr->spesimen;
        $this->unvr->save();

        $this->emit('reloadTable', 'kelompok.table');
        return $this->emit('closeModal');
    }

    public function delete()
    {
        $this->unvr->delete();
        $this->emit('reloadTable', 'kelompok.table');
        return $this->emit('closeModal');
    }

    public function render()
    {
        return view('livewire.kelompok.modal-edit');
    }
}
