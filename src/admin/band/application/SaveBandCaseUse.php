<?php

namespace Src\admin\band\application;


use Src\admin\band\domain\contracts\BandRepositoryInterface;
use Src\admin\band\domain\entities\Band;

class SaveBandCaseUse
{
    private BandRepositoryInterface $bandRepository;

    public function __construct(BandRepositoryInterface $bandRepository)
    {
        $this->bandRepository = $bandRepository;
    }

    public function execute(Band $band)
    {
        return $this->bandRepository->save($band);
    }
}