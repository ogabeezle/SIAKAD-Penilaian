<?php
namespace Siakad\Penilaian\Application;

use Siakad\Penilaian\Domain\Model\KelasRepository;

class MelihatKomponenPenilaianKelasService{
    private $kelasRepository;
    public function __construct(KelasRepository $kelasRepository){
        $this->kelasRepository=$kelasRepository;
    }

    public function execute(MelihatKomponenPenilaianKelasRequest $request){
        $nilaiEvaluasiPembelajaranArray=$this->kelasRepository->getKomponen(
            $request->kelasId
        );
        return new MelihatKomponenPenilaianKelasResponse($nilaiEvaluasiPembelajaranArray);
    }
}