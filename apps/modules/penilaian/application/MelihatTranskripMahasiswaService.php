<?php
namespace Siakad\Penilaian\Application;

use Siakad\Penilaian\Domain\Model\Mahasiswa;
use Siakad\Penilaian\Domain\Model\NilaiEvaluasiPembelajaranRepository;

class MelihatTranskripMahasiswaService{
    private $nilaiRepository;
    public function __construct(NilaiEvaluasiPembelajaranRepository $nilaiEvaluasiPembelajaranRepository){
        $this->nilaiRepository=$nilaiEvaluasiPembelajaranRepository;
    }

    public function execute(MelihatTranskripMahasiswaRequest $request){
        $transkrip = $this->nilaiRepository->byMahasiswa(
            $request->mahasiswaId
        );
        return new MelihatTranskripMahasiswaResponse($transkrip);
    }
}