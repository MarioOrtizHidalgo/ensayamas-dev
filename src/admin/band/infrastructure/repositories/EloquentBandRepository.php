<?php

namespace Src\admin\Band\infrastructure\repositories;

use App\Models\Band as EloquentBand;
use Src\admin\band\domain\contracts\BandRepositoryInterface;
use Src\admin\Band\domain\entities\Band;

class EloquentBandRepository implements BandRepositoryInterface
{
    public function getAll(): array
    {
        return EloquentBand::all()
            ->map(fn($band) => new Band(
                $band->id,
                $band->name,
                $band->location,
                $band->inviteCode
            ))
            ->toArray();
    }

    public function getById(int $id): ?Band
    {
        $band = EloquentBand::findOrFail($id);

        return new Band(
            $band->id,
            $band->name,
            $band->location,
            $band->invite_code
        );
    }

    public function save(Band $band): Band
    {
        // Si viene con ID, actualiza; si no, crea
        $model = $band->getId()
            ? EloquentBand::updateOrCreate(
                ['id' => $band->getId()],
                [
                    'name'        => $band->getName(),
                    'location'    => $band->getLocation(),
                    'invite_code' => $band->getInviteCode(),
                ]
            )
            : EloquentBand::create([
                'name'        => $band->getName(),
                'location'    => $band->getLocation(),
                'invite_code' => $band->getInviteCode(),
            ]);

        // Devuelve una nueva entidad de dominio con el ID asignado
        return new Band (
            $model->id,
            $model->name,
            $model->location,
            $model->invite_code
        );
    }


    public function delete(int $id): void
    {
        EloquentBand::destroy($id);
    }
}
