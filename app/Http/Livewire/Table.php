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
    public bool $showSearch = false;

    public string $defaultSortColumn = 'month';
    public string $defaultSortDirection = 'desc';

    public function columns(): array
    {
        return [
            Column::make('migas')
                ->sortable()
                ->format(function ($value) {
                    return Currency::currency("USD")->format($value);
                }),
            Column::make('non migas')
                ->sortable()
                ->format(function ($value) {
                    return Currency::currency("USD")->format($value);
                }),
            Column::make('total')
                ->sortable()
                ->format(function ($value) {
                    return Currency::currency("USD")->format($value);
                }),
            Column::make('Bulan-Tahun', 'month')
                ->sortable()
                ->format(function ($value) {
                    return $value->format('M Y');
                }),
            Column::make('action')
                ->format(function ($value, $column, $row) {
                    return view('column.actions')->with('import', $row);
                }),
        ];
    }

    public function query(): Builder
    {
        return Import::query();
    }
}
