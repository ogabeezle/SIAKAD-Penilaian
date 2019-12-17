<?php

namespace Siakad\Penilaian\Application;

use Siakad\Penilaian\Domain\Model\SkalaNilai;
use Siakad\Penilaian\Domain\Model\SkalaNilaiRepository;
use Siakad\Penilaian\Domain\Model\SkalaNilaiRoot;

class MenyimpanSkalaNilaiService{
    private $nilaiRepository;

    public function __construct(SkalaNilaiRepository $nilaiRepository)
    {
        $this->nilaiRepository=$nilaiRepository;
    }

    public function execute(MenyimpanSkalaNilaiRequest $menyimpanNilaiRequest){
        $data = $menyimpanNilaiRequest->nilai;
        $skalaNilaiArray = array();
        $dataCount = sizeof($data['id']);
        for ($i=0; $i<$dataCount; $i++){
            $id = $data['id'][$i];
            $nilaiHuruf = $data['nilaiHuruf'][$i];
            $nilaiNumerik = $data['nilaiNumerik'][$i];
            $batasAtas = $data['batasAtas'][$i];
            $batasBawah = $data['batasBawah'][$i];

            $skalaNilai = new SkalaNilai($id, $nilaiNumerik, $nilaiHuruf, $batasAtas, $batasBawah);
            array_push($skalaNilaiArray, $skalaNilai);
        }

        $skalaNilaiRoot = new SkalaNilaiRoot($skalaNilaiArray);
        $skalaNilaiRoot->validate();

        $this->nilaiRepository->save($skalaNilaiRoot);
    }
}