<?php

namespace Src\admin\band\domain\contracts;

use Src\admin\band\domain\entities\Band;

interface BandRepositoryInterface
{
    public function getAll(): array;
    public function getById(int $id): ?Band;
    public function save(Band $band): Band;
    public function delete(int $id): void;
}