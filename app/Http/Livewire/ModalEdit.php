<?php

namespace App\Http\Livewire;

use App\Models\Import;
use Carbon\Carbon;
use LivewireUI\Modal\ModalComponent;

class ModalEdit extends ModalComponent
{

    public Import $import;
    public $import_id;
    public $isLastImport = false;

    protected $rules = [
        'import.migas' => 'required|numeric',
        'import.non_migas' => 'required|numeric',
    ];

    public function mount()
    {
        $lastImport = Import::latest('id')->first();

        if ($lastImport->id !== $this->import_id) $this->import = Import::find($this->import_id);
        else {
            $this->import = $lastImport;
            $this->isLastImport = true;
        }
    }

    public function handleForm()
    {
        $this->validate();
        $this->import->total = $this->import->migas + $this->import->non_migas;
        $this->import->save();

        $this->emit('reloadTable', 'table');
        return $this->emit('closeModal');
    }

    public function delete()
    {
        $this->import->delete();
        $this->emit('reloadTable', 'table');
        return $this->emit('closeModal');
    }

    public function render()
    {
        return view('livewire.modal-edit');
    }
}
