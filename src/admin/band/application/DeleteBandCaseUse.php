<?php

namespace Src\admin\band\application;

use Src\admin\band\domain\contracts\BandRepositoryInterface;

class DeleteBandCaseUse
{
    private BandRepositoryInterface $bandRepository;

    public function __construct(BandRepositoryInterface $bandRepository)
    {
        $this->bandRepository = $bandRepository;
    }

    public function execute(int $id)
    {
        return $this->bandRepository->delete($id);
    }
}