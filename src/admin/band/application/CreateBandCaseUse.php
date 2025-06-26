<?php

namespace Src\admin\band\application;

use Src\admin\band\domain\contracts\BandRepositoryInterface;
use Src\admin\band\domain\entities\Band;

class CreateBandCaseUse
{
    private BandRepositoryInterface $bandRepository;

    public function __construct(BandRepositoryInterface $bandRepository)
    {
        $this->bandRepository = $bandRepository;
    }

    public function execute(string $name, string $location, string $inviteCode)
    {
        $instument = new Band(null, $name, $location, $inviteCode);
        $this->bandRepository->save($instument);
    }
}