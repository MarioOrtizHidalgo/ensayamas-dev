<?php

namespace Src\admin\instrument\application;

use Src\admin\instrument\domain\contracts\InstrumentRepositoryInterface;

class DeleteInstrumentCaseUse
{
    private InstrumentRepositoryInterface $instrumentRepository;

    public function __construct(InstrumentRepositoryInterface $instrumentRepository)
    {
        $this->instrumentRepository = $instrumentRepository;
    }

    public function execute(int $id)
    {
        return $this->instrumentRepository->delete($id);
    }
}