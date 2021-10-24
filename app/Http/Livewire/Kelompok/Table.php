<?php

namespace App\Http\Livewire\Kelompok;

use App\Models\Unvr;
use Illuminate\Database\Eloquent\Builder;
use Magarrent\LaravelCurrencyFormatter\Facades\Currency;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Table extends DataTableComponent
{
    public array $perPageAccepted = [25, 50, 100];
    public bool $showSearch = false;

    public string $defaultSortColumn = 'tanggal';
    public string $defaultSortDirection = 'desc';

    public function columns(): array
    {
        return [
            Column::make('tanggal')
                ->sortable()
                ->format(function ($value) {
                    return $value->format('d M Y');
                }),
            Column::make('harga saham unvr', 'unvr')
                ->sortable(),
            Column::make('rasio kasus baru', 'rasio')
                ->sortable(),
            Column::make('spesimen', 'spesimen')
                ->sortable(),
            Column::make('action')
                ->format(function ($value, $column, $row) {
                    return view('column.actions-unvr')->with('unvr', $row);
                }),
        ];
    }

    public function query(): Builder
    {
        return Unvr::query();
    }
}
