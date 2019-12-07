<?php
namespace Siakad\Penilaian\Application;

use Siakad\Penilaian\Domain\Model\EvaluasiPembelajaran;
use Siakad\Penilaian\Domain\Model\EvaluasiPembelajaranRepository;

class MenyimpanKomponenPenilaianService{
    private $komponenRepository;
    public function __construct(EvaluasiPembelajaranRepository $evaluasiPembelajaranRepository){
        $this->komponenRepository=$evaluasiPembelajaranRepository;
    }

    public function execute(MenyimpanKomponenPenilaianRequest $request){
        $transkrip = $this->komponenRepository->save(
            $request->komponenEvaluasi
        );
        return new MelihatTranskripMahasiswaResponse($transkrip);
    }

}