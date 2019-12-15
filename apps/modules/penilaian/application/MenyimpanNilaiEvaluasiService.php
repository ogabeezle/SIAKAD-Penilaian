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
        var_dump($request->nilaiEvaluasi);
//        die(0);
        foreach ($request->nilaiEvaluasi['nilaiArray'] as $nilai){
            if($nilai<0||$nilai>100) throw new NilaiKomponenMahasiswaException("nilai tidak valid");
        }
        $transkrip = $this->nilaiEvaluasiRepository->save(
            $request->nilaiEvaluasi
        );
        return new MenyimpanNilaiEvaluasiResponse($transkrip);
    }
}