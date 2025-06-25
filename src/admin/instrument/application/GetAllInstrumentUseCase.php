<?php

namespace Src\admin\instrument\application;

use Src\admin\instrument\domain\contracts\InstrumentRepositoryInterface;

class GetAllInstrumentUseCase
{
    private InstrumentRepositoryInterface $instrumentRepository;

    public function __construct(InstrumentRepositoryInterface $instrumentRepository)
    {
        $this->instrumentRepository = $instrumentRepository;
    }

    public function execute()
    {
        return $this->instrumentRepository->getAll();
    }

}