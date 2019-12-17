<?php
namespace Siakad\Penilaian\Application;

use Siakad\Common\Exception\NilaiKomponenMahasiswaException;
use Siakad\Penilaian\Domain\Model\NilaiEvaluasiPembelajaranRepository;

class MenyimpanNilaiEvaluasiService{
    private $nilaiEvaluasiRepository;
    public function __construct(NilaiEvaluasiPembelajaranRepository $nilaiEvaluasiPembelajaranRepository){
        $this->nilaiEvaluasiRepository=$nilaiEvaluasiPembelajaranRepository;
    }

    public function execute(MenyimpanNilaiEvaluasiRequest $request){

        $transkrip = $this->nilaiEvaluasiRepository->save(
            $request->nilaiEvaluasi
        );
        return new MenyimpanNilaiEvaluasiResponse($transkrip);
    }
}