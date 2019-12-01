<?php

namespace Siakad\Scheduling\Application;

use Siakad\scheduling\domain\model\JadwalKelasRepository;

class MelihatJadwalKuliahProdiService
{
    private $jadwalKelasRepository;

    public function __construct(
       JadwalKelasRepository $jadwalKelasRepository
    )
    {
        $this->jadwalKelasRepository = $jadwalKelasRepository;
    }

    public function execute(MelihatJadwalKuliahProdiRequest $request)
    {
        $jadwalKuliahByPeriodeKuliah = $this->jadwalKelasRepository->byPeriodeKuliah(
            $request->periodeKuliahTipe,
            $request->periodeKuliahTahun
        );
        return new MelihatJadwalKuliahProdiResponse($jadwalKuliahByPeriodeKuliah);
    }
}