<?php

namespace Src\admin\instrument\application;


use Src\admin\instrument\domain\contracts\InstrumentRepositoryInterface;
use Src\admin\instrument\domain\entities\Instrument;

class SaveInstrumentCaseUse
{
    private InstrumentRepositoryInterface $instrumentRepository;

    public function __construct(InstrumentRepositoryInterface $instrumentRepository)
    {
        $this->instrumentRepository = $instrumentRepository;
    }

    public function execute(Instrument $instrument)
    {
        return $this->instrumentRepository->save($instrument);
    }
}