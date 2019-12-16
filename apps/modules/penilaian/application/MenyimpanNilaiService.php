<?php

namespace Siakad\Penilaian\Application;

use Siakad\Common\Exception\NilaiKomponenMahasiswaException;
use Siakad\Penilaian\Domain\Model\NilaiRepository;

class MenyimpanNilaiService{
    private $nilaiRepository;

    public function __construct(NilaiRepository $nilaiRepository)
    {
        $this->nilaiRepository=$nilaiRepository;
    }

    public function execute(MenyimpanNilaiRequest $menyimpanNilaiRequest){
        $result = $this->nilaiRepository->save(
            $menyimpanNilaiRequest->nilai
        );
    }
}