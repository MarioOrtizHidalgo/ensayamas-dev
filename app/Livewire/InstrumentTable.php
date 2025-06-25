<?php

// InstrumentTable.php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Instrument;
use Livewire\WithPagination;

class InstrumentTable extends Component
{
    use WithPagination;

    public string $search = '';

    private $fields = [
        'name',
        'created_at',
        'updated_at',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.instrument-table', [
            'instruments' => Instrument::query()
                ->when($this->search, fn ($query) =>
                    $query->where('name', 'like', '%'.$this->search.'%')
                )
                ->paginate(10),
            'fields' => $this->fields,
            'routePrefix' => 'instrument'
        ]);
    }
}