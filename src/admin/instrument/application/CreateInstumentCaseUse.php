<?php

namespace Src\admin\instrument\application;

use Src\admin\instrument\domain\contracts\InstrumentRepositoryInterface;
use Src\admin\instrument\domain\entities\Instrument;

class CreateInstumentCaseUse
{
    private InstrumentRepositoryInterface $instrumentRepository;

    public function __construct(InstrumentRepositoryInterface $instrumentRepository)
    {
        $this->instrumentRepository = $instrumentRepository;
    }

    public function execute(string $name)
    {
        $instument = new Instrument(null, $name);
        $this->instrumentRepository->save($instument);
    }
}