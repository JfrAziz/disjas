<?php

namespace App\Http\Livewire;

use App\Models\Import;
use Illuminate\Database\Eloquent\Builder;
use Magarrent\LaravelCurrencyFormatter\Facades\Currency;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Table extends DataTableComponent
{
    public array $perPageAccepted = [25, 50, 100];

    public function columns(): array
    {
        return [
            Column::make('migas')
                ->sortable()
                ->format(function($value){
                    return Currency::currency("USD")->format($value);
                }),
            Column::make('non migas')
                ->sortable()
                ->format(function($value){
                    return Currency::currency("USD")->format($value);
                }),
            Column::make('total')
                ->sortable()
                ->format(function($value){
                    return Currency::currency("USD")->format($value);
                }),
            Column::make('Bulan-Tahun', 'month')
                ->sortable()
                ->searchable()
                ->format(function($value) {
                    return $value->format('M Y');
                })
        ];
    }

    public function query(): Builder
    {
        return Import::query();
    }
}
