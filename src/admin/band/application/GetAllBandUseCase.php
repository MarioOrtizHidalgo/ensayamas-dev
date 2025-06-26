<?php

namespace Src\admin\band\application;

use Src\admin\band\domain\contracts\BandRepositoryInterface;

class GetAllBandUseCase
{
    private BandRepositoryInterface $bandRepository;

    public function __construct(BandRepositoryInterface $bandRepository)
    {
        $this->bandRepository = $bandRepository;
    }

    public function execute()
    {
        return $this->bandRepository->getAll();
    }

}