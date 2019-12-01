<?php

namespace Siakad\Scheduling\Application;

use Siakad\Scheduling\Domain\Model\PeriodeKuliahRepository;

class MelihatPeriodeKuliahService
{
    private $periodeKuliahRepository;

    public function __construct(
        PeriodeKuliahRepository $periodeKuliahRepository
    )
    {
        $this->periodeKuliahRepository = $periodeKuliahRepository;
    }

    public function execute()
    {
        $listPeriodeKuliah = $this->periodeKuliahRepository->all();
        return $listPeriodeKuliah;
    }
}