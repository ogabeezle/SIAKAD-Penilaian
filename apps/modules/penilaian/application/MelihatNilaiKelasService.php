<?php
namespace Siakad\Penilaian\Application;

use Siakad\Penilaian\Domain\Model\KelasRepository;

class MelihatNilaikelasService{
    private $kelasRepository;

    public function __construct(KelasRepository $kelasRepository){
        $this->kelasRepository=$kelasRepository;
    }

    public function execute(MelihatNilaiKelasRequest $request){
        $nilaiKelasArray = $this->kelasRepository->getNilai(
            $request->kelas
        );
        return new MelihatNilaiKelasResponse($nilaiKelasArray);
    }
}