<?php

namespace Src\admin\instrument\infrastructure\repositories;

use App\Models\Instrument as EloquentInstrument;
use Src\admin\instrument\domain\contracts\InstrumentRepositoryInterface;
use Src\admin\instrument\domain\entities\Instrument;

class EloquentInstrumentRepository implements InstrumentRepositoryInterface
{
    public function getAll(): array
    {
        return EloquentInstrument::all()
            ->map(fn($instrument) => new Instrument(
                $instrument->id,
                $instrument->name
            ))
            ->toArray();
    }

    public function getById(int $id): ?Instrument
    {
        $instrument = EloquentInstrument::findOrFail($id);

        return new Instrument(
            $instrument->id,
            $instrument->name
        );
    }

    public function save(Instrument $instrument): void
    {

        if ($instrument->getId()) {
            EloquentInstrument::updateOrCreate(
                ['id' => $instrument->getId()],
                ['name' => $instrument->getName()]
            );
        } else {
            EloquentInstrument::create([
                'name' => $instrument->getName()
            ]);
        }
    }

    public function delete(int $id): void
    {
        EloquentInstrument::destroy($id);
    }
}
