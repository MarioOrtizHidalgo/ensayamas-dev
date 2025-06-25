<?php

namespace Src\admin\instrument\domain\contracts;

use Src\admin\instrument\domain\entities\Instrument;

interface InstrumentRepositoryInterface
{
    public function getAll(): array;
    public function getById(int $id): ?Instrument;
    public function save(Instrument $instrument): void;
    public function delete(int $id): void;
}